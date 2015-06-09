<?php

$strAPIKey = 'xxxxxxxxxxxxxxxxxxxxx';

$strApiWsdlUrl = 'http://meine_gsales_url/api/api.php?wsdl';

ini_set("soap.wsdl_cache_enabled", "0");
$client = new soapclient($strApiWsdlUrl); 

// Rechnungen
$arrResult = $client->getInvoicePDF($strAPIKey, 5);

// Angebote
#$arrResult = $client->getOfferPDF($strAPIKey, 21);

// Gutschriften
#$arrResult = $client->getRefundPDF($strAPIKey, 10);

// Dokumente
#$arrResult = $client->getDocumentFile($strAPIKey, 3);

if (is_string($arrResult['result']->content)){
	$arrFileNameParts = explode('/',$arrResult['result']->name);
	header('Content-type: application/pdf');
	header('Content-Disposition: attachment; filename="'.$arrFileNameParts[count($arrFileNameParts)-1].'"');
	echo base64_decode($arrResult['result']->content);
	return;
}

echo 'Ein Fehler ist aufgetreten';
echo '<pre>';
	print_r($arrResult);
echo '</pre>';
