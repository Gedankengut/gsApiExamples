<?php

$strAPIKey = 'xxxxxxxxxxxxxxxxxxxxx'; // Enable and generate API key in your gSales Installation: left main navi -> "Administration" -> "API"
$strApiWsdlUrl = 'http://meine_gsales_url/api/api.php?wsdl'; // Replace with your gSales installation URL

ini_set("soap.wsdl_cache_enabled", "0");
$client = new soapclient($strApiWsdlUrl);

$arrFilter[] = array('field'=>'active', 'operator'=>'is', 'value'=>1); // filter by active contracts
$arrFilter[] = array('field'=>'customers_id', 'operator'=>'is', 'value'=>32); // filter by customers_id  = 32
$arrSort = array('field'=>'id', 'direction'=>'asc');
$arrResult = $client->getContracts($strAPIKey, $arrFilter, $arrSort,999,0); // get first 999 contracts
unset($arrFilter, $arrSort);

foreach($arrResult['result'] as $key => $obj){
	foreach($obj->pos as $key2 => $obj2){
		$intContractId = $obj2->invoices_id;
		$intPosId = $obj2->id;
		$intNewPrice = $obj2->price * 1.2; // raise 20%
		#$client->updateContractPosition($strAPIKey, $intContractId, $intPosId, array('price'=>$intNewPrice)); // save changes/new raised price
	}
}
