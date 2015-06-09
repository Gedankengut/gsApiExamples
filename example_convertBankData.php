<?php

/**
 *
 * Konvertiert deutsche Bankverbindung in gSales2 über die API mit Hilfe der API des Portals http://www.iban-bic.com/ nach IBAN+BIC zur Verwendunt mit SEPA Lastschriften.
 * Ein ggf. kostenpflichtiges Nutzerkonto bei http://www.iban-bic.com/ wird hierfür benötigt! Die ersten 10 Berechnungen sind derzeit kostenlos.
 *
 */

$strAPIKey = 'xxxxxxxxxxxxxxxxxxxxx'; // gSales2 API KEY : Enable and generate API key in your gSales Installation: left main navi -> "Administration" -> "API"
$strApiWsdlUrl = 'http://meine_gsales_url/api/api.php?wsdl'; // gSales 2 API URL : Replace with your gSales installation URL
$strUsername = 'xxx'; // iban-bic.com username
$strPassword = 'xxx';// iban-bic.com password

ini_set("soap.wsdl_cache_enabled", "0");
$client = new soapclient($strApiWsdlUrl);
$arrCustomers = $client->getCustomers($strAPIKey, array(array('field'=>'dtaus', 'operator'=>'is', 'value'=>1)), array('field'=>'id', 'direction'=>'asc'), 999,0); // get first 999 customers with dtaus=1 sorted by id

echo '<pre>';

foreach($arrCustomers['result'] as $key => $objCustomer){
	echo "RECORDSET\n";
	echo 'cust. no   : '.$objCustomer->customerno."\n";
	echo 'company    : '.$objCustomer->company."\n";
	echo 'lastname   : '.$objCustomer->lastname."\n";
	echo 'cust. id   : '.$objCustomer->id."\n";
	echo 'account no : '.$objCustomer->bank_account_no."\n";
	echo 'blz        : '.$objCustomer->bank_code."\n";
	echo 'bank_bic   : '.$objCustomer->bank_bic."\n";
	echo 'bank_iban  : '.$objCustomer->bank_iban."\n";
	echo 'bank_name  : '.$objCustomer->bank_name."\n";

	if ($objCustomer->bank_bic == '' && $objCustomer->bank_iban == ''){

		echo "\n~~ CALLING IBAN-BIC.COM API ~~\n";

		$client_iban = new SoapClient('https://ssl.ibanrechner.de/soap/?wsdl');
		$result = $client_iban->calculate_iban('DE', $objCustomer->bank_code, $objCustomer->bank_account_no, $strUsername, $strPassword);

		echo "\nRESULT : ".$result->result."\n";
		echo "RETURN CODE: ".$result->return_code."\n";

		if (trim($result->return_code) == ''){
			echo "\nNO API RESULT RECEIVED\n";
			echo "\n-----------------------------------------\n";
			continue;
		}

		if ($result->return_code < 32) echo "RETURN CODE: OK, SAVING\n";
		if ($result->return_code >= 32 && $result->return_code <= 127) echo "RETURN CODE: SHOULD BE OK, SAVING, BUT PLEASE VERIFY DATA !!!\n";
		if ($result->return_code >= 128) echo "ERROR - NOT SAVING !!!\n";

		if ($result->return_code < 127){
			$intCustomerId = $objCustomer->id;
			$strIBAN = $result->iban;
			$strBIC = $result->bic_candidates[0]->bic;
			$strBankName = $result->bank;
			echo 'bank_iban  : '.$strIBAN."\n";
			echo 'bank_bic   : '.$strBIC."\n";
			echo 'bank_name  : '.$strBankName."\n";
			echo "\nSAVING DATA\n";
			$arrUpdateCustomer = array('bank_iban'=>$strIBAN, 'bank_bic'=>$strBIC);
			$client->updateCustomer($strAPIKey, $intCustomerId, $arrUpdateCustomer);

			// bank aktualisieren wenn nicht vorhanden
			if  ($objCustomer->bank_name==''){
				$arrUpdateCustomer = array('bank_name'=>$strBankName);
				$client->updateCustomer($strAPIKey, $intCustomerId, $arrUpdateCustomer);
				echo "\nSAVING BANK NAME\n";
			}

		}

	} else {
		echo "\nSKIPPING: IBAN OR BIC ALREADY SET\n";
	}

	echo "\n-----------------------------------------\n";

}
