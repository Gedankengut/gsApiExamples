<?php

$intStart = microtime(true);


// Enable and generate API key in your gSales Installation: left main navi -> "Administration" -> "API"
$strAPIKey = 'xxx';

// Replace with your gSales installation URL
$strApiWsdlUrl = 'http://meine_gsales_url/api/api.php?wsdl';

ini_set("soap.wsdl_cache_enabled", "0");
$client = new soapclient($strApiWsdlUrl);

// Helper

function pre_print_r($arr){
	echo '<pre>';
		print_r($arr);
	echo '</pre>';
}


///////////////////////
// CUSTOMER
///////////////////////


echo '<h1>Customer examples</h1>';


echo '<h3>getCustomer()</h3>';
$arrResult = array();
# $arrResult = $client->getCustomer($strAPIKey, 4);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>getCustomers()</h3>';
$arrResult = array();
$arrFilter[] = array('field'=>'id', 'operator'=>'bigger', 'value'=>20);
$arrSort = array('field'=>'customerno', 'direction'=>'asc');
# $arrResult = $client->getCustomers($strAPIKey, $arrFilter,$arrSort,10,0);
pre_print_r($arrResult);
unset($arrResult, $arrFilter, $arrSort);


echo '<h3>getCustomersCount()</h3>';
$arrResult = array();
$arrFilter[] = array('field'=>'id', 'operator'=>'bigger', 'value'=>20);
# $arrResult = $client->getCustomersCount($strAPIKey, $arrFilter);
pre_print_r($arrResult);
unset($arrResult, $arrFilter);


echo '<h3>getCustomersRepayable()</h3>';
$arrResult = array();
# $arrResult = $client->getCustomersRepayable($strAPIKey);
pre_print_r($arrResult);
unset($arrCustomers);


echo '<h3>createCustomer()</h3>';
$arrResult = array();
$arrCreateCustomer = array('company'=>'API GmbH ('.rand(100,999).')', 'useDefaultDiscount'=>false, 'discount'=>5);
# $arrResult = $client->createCustomer($strAPIKey, $arrCreateCustomer);
pre_print_r($arrResult);
unset($arrResult, $arrCreateCustomer);


echo '<h3>deleteCustomer()</h3>';
$arrResult = array();
# $arrResult = $client->deleteCustomer($strAPIKey, 9999);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>updateCustomer()</h3>';
$arrResult = array();
$arrUpdateCustomer = array('print_contactperson'=>true, 'salestaxfree'=>false, 'mailInvoices'=>true, 'mailPaymentReminders'=>false, 'title'=>'Frau', 'address'=>'Neue Straße 2', 'zip'=>'98765', 'city'=>'Neustadt', 'country'=>'Deutschland', 'taxnumber'=>'T500', 'phone'=>'987654', 'fax'=>'9876544', 'email'=>'max@musterfrau.de', 'homepage'=>'http://www.neuehomepage.de', 'bank_account_no'=>'0103200', 'bank_code'=>'987654', 'bank_name'=>'Neue Bank', 'bank_account_owner'=>'Musterfrau', 'bank_iban'=>'DEDBPFK2345643', 'bank_bic'=>'BIC12458967945641', 'custom1'=>'c1', 'custom2'=>'c2', 'custom3'=>'c3', 'custom4'=>'c4', 'custom5'=>'c5', 'useDefaultDiscount'=>false, 'discount'=>5);
# $arrResult = $client->updateCustomer($strAPIKey, 4, $arrUpdateCustomer);
pre_print_r($arrResult);
unset($arrResult, $arrUpdateCustomer);


echo '<h3>updateCustomerProposal()</h3>';
$arrResult = array();
$arrUpdateCustomerProposal = array('print_contactperson'=>false, 'salestaxfree'=>false, 'mailInvoices'=>false, 'mailPaymentReminders'=>false);
# $arrResult = $client->updateCustomerProposal($strAPIKey, 4, $arrUpdateCustomerProposal);
pre_print_r($arrResult);
unset($arrResult, $arrUpdateCustomerProposal);


echo '<h3>enableCustomerFrontendLoginById()</h3>';
$arrResult = array();
# $arrResult = $client->enableCustomerFrontendLoginById($strAPIKey, 4);
pre_print_r($arrResult);
#var_dump($arrResult['result']);
unset($arrResult);


echo '<h3>changeCustomerFrontendPassword()</h3>';
$arrResult = array();
# $arrResult = $client->changeCustomerFrontendPassword($strAPIKey, 4, md5('neuespasswort'));
pre_print_r($arrResult);
#var_dump($arrResult['result']);
unset($arrResult);


echo '<h3>disableCustomerFrontendLoginById()</h3>';
$arrResult = array();
# $arrResult = $client->disableCustomerFrontendLoginById($strAPIKey, 4);
pre_print_r($arrResult);
#var_dump($arrResult['result']);
unset($arrResult);


echo '<h3>enableCustomerFrontendLogin()</h3>';
$arrResult = array();
# $arrResult = $client->enableCustomerFrontendLogin($strAPIKey, 'max@mustermann.de');
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>disableCustomerFrontendLogin()</h3>';
$arrResult = array();
# $arrResult = $client->disableCustomerFrontendLogin($strAPIKey, 'max@mustermann.de');
pre_print_r($arrResult);
unset($arrResult);


///////////////////////
// DOCUMENT
///////////////////////


echo '<h1>Documents examples</h1>';


echo '<h3>getCustomerDocuments()</h3>';
$arrResult = array();
$arrFilter[] = array('field'=>'public', 'operator'=>'is', 'value'=>1);
$arrSort = array('field'=>'customers_id', 'direction'=>'asc');
# $arrResult = $client->getCustomerDocuments($strAPIKey, $arrFilter, $arrSort,30,0);
pre_print_r($arrResult);
unset($arrResult, $arrFilter, $arrSort);


///////////////////////
// OFFER
///////////////////////


echo '<h1>Offer examples</h1>';


echo '<h3>getOffer()</h3>';
$arrResult = array();
# $arrResult = $client->getOffer($strAPIKey, 28);
pre_print_r($arrResult);
unset($arrResult);	


echo '<h3>getOffers()</h3>';
$arrResult = array();
$arrFilter[] = array('field'=>'amount', 'operator'=>'bigger', 'value'=>100);
$arrSort = array('field'=>'amount', 'direction'=>'desc');
# $arrResult = $client->getOffers($strAPIKey, $arrFilter, $arrSort,3,0);
pre_print_r($arrResult);
unset($arrFilter, $arrSort, $arrResult);	


echo '<h3>getOffersCount()</h3>';
$arrResult = array();
$arrFilter[] = array('field'=>'amount', 'operator'=>'bigger', 'value'=>400);
# $arrResult = $client->getOffersCount($strAPIKey, $arrFilter);
pre_print_r($arrResult);
unset($arrFilter, $arrResult);


echo '<h3>setOfferStateAccepted()</h3>';
$arrResult = array();
# $arrResult = $client->setOfferStateAccepted($strAPIKey, 58);
pre_print_r($arrResult);
unset($arrResult);	


echo '<h3>setOfferStateDeclined()</h3>';
$arrResult = array();
# $arrResult = $client->setOfferStateDeclined($strAPIKey, 58);
pre_print_r($arrResult);
unset($arrResult);	


echo '<h3>setOfferStateOpen()</h3>';
$arrResult = array();
# $arrResult = $client->setOfferStateOpen($strAPIKey, 58);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>setOfferStateBilled()</h3>';
$arrResult = array();
# $arrResult = $client->setOfferStateBilled($strAPIKey, 28);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>createOfferPosition()</h3>';
$arrResult = array();
$arrCreateOfferPosition = array('quantity'=>1, 'unit'=>'x', 'pos_txt'=>'Programmierung API', 'price'=>100, 'useDefaultTax'=>true, 'discount'=>2.5);
# $arrResult = $client->createOfferPosition($strAPIKey, 40, $arrCreateOfferPosition);
pre_print_r($arrResult);
unset($arrResult, $arrCreateOfferPosition);


echo '<h3>createOfferPositionHeadline()</h3>';
$arrResult = array();
# $arrResult = $client->createOfferPositionHeadline($strAPIKey, 54, 'Headline 1');
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>updateOfferPosition()</h3>';
$arrResult = array();
$arrUpdateOfferPosition = array('pos_txt'=>'Programmierung API III', 'price'=>100, 'optional'=>false);
# $arrResult = $client->updateOfferPosition($strAPIKey, 40, 127, $arrUpdateOfferPosition);
pre_print_r($arrResult);
unset($arrResult, $arrUpdateOfferPosition);


echo '<h3>deleteOfferPosition()</h3>';
$arrResult = array();
# $arrResult = $client->deleteOfferPosition($strAPIKey, 66, 210);
pre_print_r($arrResult);
unset($arrResult);	


echo '<h3>deleteOffer()</h3>';
$arrResult = array();
# $arrResult = $client->deleteOffer($strAPIKey, 62);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>createOfferForCustomer()</h3>';
$arrResult = array();
# $arrResult = $client->createOfferForCustomer($strAPIKey, 6);
pre_print_r($arrResult);
unset($arrResult);	


echo '<h3>createOffer()</h3>';
$arrResult = array();
$arrCreateOffer = array('customer_company'=>'API GmbH', 'useDefaultValidUntil'=>true, 'useDefaultPostTxt'=>true, 'useDefaultPreTxt'=>true, 'useDefaultTemplate'=>true);
# $arrResult = $client->createOffer($strAPIKey, $arrCreateOffer);
pre_print_r($arrResult);
unset($arrResult, $arrCreateOffer);		


echo '<h3>updateOffer()</h3>';
$arrResult = array();
$arrUpdateOffer = array('customer_lastname'=>'Mustermann', 'print_contactperson'=>1, 'validuntil'=>'2011-01-01');
# $arrResult = $client->updateOffer($strAPIKey, 63, $arrUpdateOffer);
pre_print_r($arrResult);
unset($arrResult, $arrUpdateOffer);	


echo '<h3>addOfferToMailspool()</h3>';
$arrResult = array();
# $arrResult = $client->addOfferToMailspool($strAPIKey, 68);
pre_print_r($arrResult);
unset($arrResult);


///////////////////////
// SALE
///////////////////////


echo '<h1>Sale examples</h1>';


echo '<h3>getSale()</h3>';
$arrResult = array();
# $arrResult = $client->getSale($strAPIKey, 1);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>getSales()</h3>';
$arrResult = array();
$arrFilter[] = array('field'=>'amount', 'operator'=>'bigger', 'value'=>100);
$arrSort = array('field'=>'amount', 'direction'=>'desc');
# $arrResult = $client->getSales($strAPIKey, $arrFilter, $arrSort,3,0);
pre_print_r($arrResult);
unset($arrFilter, $arrSort, $arrResult);


echo '<h3>getSalesCount()</h3>';
$arrResult = array();
$arrFilter[] = array('field'=>'amount', 'operator'=>'bigger', 'value'=>400);
# $arrResult = $client->getSalesCount($strAPIKey, $arrFilter);
pre_print_r($arrResult);
unset($arrFilter, $arrResult);


echo '<h3>setSaleStateOpen()</h3>';
$arrResult = array();
# $arrResult = $client->setSaleStateOpen($strAPIKey, 2);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>setSaleStateSent()</h3>';
$arrResult = array();
# $arrResult = $client->setSaleStateSent($strAPIKey, 2);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>createSalePosition()</h3>';
$arrResult = array();
$arrCreateSalePosition = array('quantity'=>1, 'unit'=>'x', 'pos_txt'=>'Programmierung API', 'price'=>100, 'useDefaultTax'=>true, 'discount'=>2.5);
# $arrResult = $client->createSalePosition($strAPIKey, 16, $arrCreateSalePosition);
pre_print_r($arrResult);
unset($arrResult, $arrCreateSalePosition);


echo '<h3>createSalePositionHeadline()</h3>';
$arrResult = array();
# $arrResult = $client->createSalePositionHeadline($strAPIKey, 25, 'Headline 1');
pre_print_r($arrResult);
unset($arrResult);



echo '<h3>updateSalePosition()</h3>';
$arrResult = array();
$arrUpdateSalePosition = array('pos_txt'=>'Programmierung API III', 'price'=>110);
# $arrResult = $client->updateSalePosition($strAPIKey, 16, 29, $arrUpdateSalePosition);
pre_print_r($arrResult);
unset($arrResult, $arrUpdateSalePosition);


echo '<h3>deleteSalePosition()</h3>';
$arrResult = array();
# $arrResult = $client->deleteSalePosition($strAPIKey, 16, 29);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>deleteSale()</h3>';
$arrResult = array();
# $arrResult = $client->deleteSale($strAPIKey, 16);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>createSaleForCustomer()</h3>';
$arrResult = array();
# $arrResult = $client->createSaleForCustomer($strAPIKey, 35);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>createSale()</h3>';
$arrResult = array();
$arrCreateSale = array('customer_company'=>'API GmbH', 'useDefaultPostTxt'=>true, 'useDefaultPreTxt'=>true, 'useDefaultTemplate'=>true);
# $arrResult = $client->createSale($strAPIKey, $arrCreateSale);
pre_print_r($arrResult);
unset($arrResult, $arrCreateSale);


echo '<h3>updateSale()</h3>';
$arrResult = array();
$arrUpdateSale = array('customer_lastname'=>'Mustermann', 'print_contactperson'=>1);
# $arrResult = $client->updateSale($strAPIKey, 18, $arrUpdateSale);
pre_print_r($arrResult);
unset($arrResult, $arrUpdateSale);


echo '<h3>addSaleToMailspool()</h3>';
$arrResult = array();
# $arrResult = $client->addSaleToMailspool($strAPIKey, 4);
pre_print_r($arrResult);
unset($arrResult);


///////////////////////
// DELIVERY
///////////////////////


echo '<h1>Delivery examples</h1>';


echo '<h3>getDelivery()</h3>';
$arrResult = array();
# $arrResult = $client->getDelivery($strAPIKey, 4);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>getDeliveries()</h3>';
$arrResult = array();
# $arrFilter[] = array('field'=>'id', 'operator'=>'bigger', 'value'=>10);
$arrSort = array('field'=>'id', 'direction'=>'desc');
# $arrResult = $client->getDeliveries($strAPIKey, $arrFilter, $arrSort,3,0);
pre_print_r($arrResult);
unset($arrFilter, $arrSort, $arrResult);


echo '<h3>getDeliveriesCount()</h3>';
$arrResult = array();
$arrFilter[] = array('field'=>'id', 'operator'=>'bigger', 'value'=>10);
# $arrResult = $client->getDeliveriesCount($strAPIKey, $arrFilter);
pre_print_r($arrResult);
unset($arrFilter, $arrResult);


echo '<h3>setDeliveryStateOpen()</h3>';
$arrResult = array();
# $arrResult = $client->setDeliveryStateOpen($strAPIKey, 4);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>setDeliveryStateSent()</h3>';
$arrResult = array();
# $arrResult = $client->setDeliveryStateSent($strAPIKey, 4);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>createDeliveryPosition()</h3>';
$arrResult = array();
$arrCreateDeliveryPosition = array('quantity'=>1, 'unit'=>'x', 'pos_txt'=>'Kamera-Gehäuse');
# $arrResult = $client->createDeliveryPosition($strAPIKey, 23, $arrCreateDeliveryPosition);
pre_print_r($arrResult);
unset($arrResult, $arrCreateDeliveryPosition);


echo '<h3>createDeliveryPositionHeadline()</h3>';
$arrResult = array();
# $arrResult = $client->createDeliveryPositionHeadline($strAPIKey, 30, 'Headline 1');
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>updateDeliveryPosition()</h3>';
$arrResult = array();
$arrUpdateDeliveryPosition = array('pos_txt'=>'Kamera-Gehäuse v2');
# $arrResult = $client->updateDeliveryPosition($strAPIKey, 23, 50, $arrUpdateDeliveryPosition);
pre_print_r($arrResult);
unset($arrResult, $arrUpdateDeliveryPosition);


echo '<h3>deleteDeliveryPosition()</h3>';
$arrResult = array();
# $arrResult = $client->deleteDeliveryPosition($strAPIKey, 23, 50);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>deleteDelivery()</h3>';
$arrResult = array();
# $arrResult = $client->deleteDelivery($strAPIKey, 23);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>createDeliveryForCustomer()</h3>';
$arrResult = array();
# $arrResult = $client->createDeliveryForCustomer($strAPIKey, 11);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>createDelivery()</h3>';
$arrResult = array();
$arrCreateDelivery = array('customer_company'=>'API GmbH', 'useDefaultPostTxt'=>true, 'useDefaultPreTxt'=>true, 'useDefaultTemplate'=>true);
# $arrResult = $client->createDelivery($strAPIKey, $arrCreateDelivery);
pre_print_r($arrResult);
unset($arrResult, $arrCreateDelivery);


echo '<h3>updateDelivery()</h3>';
$arrResult = array();
$arrUpdateDelivery = array('customer_lastname'=>'Mustermann', 'print_contactperson'=>1);
# $arrResult = $client->updateDelivery($strAPIKey, 25, $arrUpdateDelivery);
pre_print_r($arrResult);
unset($arrResult, $arrUpdateDelivery);


echo '<h3>addDeliveryToMailspool()</h3>';
$arrResult = array();
# $arrResult = $client->addDeliveryToMailspool($strAPIKey, 10);
pre_print_r($arrResult);
unset($arrResult);


///////////////////////
// INVOICE
///////////////////////


echo '<h1>Invoice examples</h1>';


echo '<h3>updateInvoice()</h3>';
$arrResult = array();
$arrUpdateInvoice = array('customer_lastname'=>'Mustermann', 'print_contactperson'=>1);
# $arrResult = $client->updateInvoice($strAPIKey, 1441, $arrUpdateInvoice);
pre_print_r($arrResult);
unset($arrResult, $arrUpdateInvoice);	


echo '<h3>createInvoice()</h3>';
$arrResult = array();
$arrCreateInvoice = array('customer_company'=>'API GmbH', 'useDefaultPayable'=>true, 'useDefaultPostTxt'=>true, 'useDefaultPreTxt'=>true, 'useDefaultTemplate'=>true);
# $arrResult = $client->createInvoice($strAPIKey, $arrCreateInvoice);
pre_print_r($arrResult);
unset($arrResult);		


echo '<h3>createInvoiceForCustomer()</h3>';
$arrResult = array();
# $arrResult = $client->createInvoiceForCustomer($strAPIKey, 6);
pre_print_r($arrResult);
unset($arrResult);	


echo '<h3>deleteInvoice()</h3>';
$arrResult = array();
# $arrResult = $client->deleteInvoice($strAPIKey, 5);
pre_print_r($arrResult);
unset($arrResult);	


echo '<h3>deleteInvoicePosition()</h3>';
$arrResult = array();
# $arrResult = $client->deleteInvoicePosition($strAPIKey, 4, 68);
pre_print_r($arrResult);
unset($arrResult);	


echo '<h3>updateInvoicePosition()</h3>';
$arrResult = array();
$arrUpdateInvoicePosition = array('pos_txt'=>'Programmierung bearbeiten', 'price'=>200);
# $arrResult = $client->updateInvoicePosition($strAPIKey, 4, 68, $arrUpdateInvoicePosition);
pre_print_r($arrResult);
unset($arrResult, $arrUpdateInvoicePosition);	


echo '<h3>createInvoicePosition()</h3>';
$arrResult = array();
$arrCreateInvoicePosition = array('quantity'=>5, 'unit'=>'h', 'pos_txt'=>'Programmierung', 'price'=>120, 'useDefaultTax'=>true);
# $arrResult = $client->createInvoicePosition($strAPIKey, 4, $arrCreateInvoicePosition);
pre_print_r($arrResult);
unset($arrResult, $arrCreateInvoicePosition);


echo '<h3>createInvoicePositionHeadline()</h3>';
$arrResult = array();
# $arrResult = $client->createInvoicePositionHeadline($strAPIKey, 1326, 'Headline 1');
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>setInvoiceStateCanceled()</h3>';
$arrResult = array();
# $arrResult = $client->setInvoiceStateCanceled($strAPIKey, 4);
pre_print_r($arrResult);
unset($arrResult);		


echo '<h3>setInvoiceStateOpen()</h3>';
$arrResult = array();
# $arrResult = $client->setInvoiceStateOpen($strAPIKey, 4);
pre_print_r($arrResult);
unset($arrResult);		


echo '<h3>setInvoiceStatePaid()</h3>';
$arrResult = array();
# $arrResult = $client->setInvoiceStatePaid($strAPIKey, 4);
pre_print_r($arrResult);
unset($arrResult);		


echo '<h3>getInvoicesCount()</h3>';
$arrResult = array();
$arrFilter[] = array('field'=>'amount', 'operator'=>'bigger', 'value'=>400);
# $arrResult = $client->getInvoicesCount($strAPIKey, $arrFilter);
pre_print_r($arrResult);
unset($arrFilter, $arrResult);		


echo '<h3>getInvoices()</h3>';
$arrResult = array();
$arrFilter[] = array('field'=>'amount', 'operator'=>'bigger', 'value'=>400);
$arrSort = array('field'=>'created', 'direction'=>'desc');
# $arrResult = $client->getInvoices($strAPIKey, $arrFilter, $arrSort,5,0);
pre_print_r($arrResult);
unset($arrFilter, $arrSort, $arrResult);	


echo '<h3>getInvoice()</h3>';
$arrResult = array();
# $arrResult = $client->getInvoice($strAPIKey, 114);
pre_print_r($arrResult);
unset($arrResult);		


echo '<h3>addInvoiceToMailspool()</h3>';
$arrResult = array();
# $arrResult = $client->addInvoiceToMailspool($strAPIKey, 97);
pre_print_r($arrResult);
unset($arrResult);


///////////////////////
// REFUND
///////////////////////


echo '<h1>Refund examples</h1>';


echo '<h3>getRefund()</h3>';
$arrResult = array();
# $arrResult = $client->getRefund($strAPIKey, 16);
pre_print_r($arrResult);
unset($arrResult);	


echo '<h3>getRefunds()</h3>';
$arrResult = array();
$arrFilter[] = array('field'=>'amount', 'operator'=>'bigger', 'value'=>100);
$arrSort = array('field'=>'amount', 'direction'=>'desc');
# $arrResult = $client->getRefunds($strAPIKey, $arrFilter, $arrSort,3,0);
pre_print_r($arrResult);
unset($arrFilter, $arrSort, $arrResult);	


echo '<h3>getRefundsCount()</h3>';
$arrResult = array();
$arrFilter[] = array('field'=>'amount', 'operator'=>'bigger', 'value'=>100);
# $arrResult = $client->getRefundsCount($strAPIKey, $arrFilter);
pre_print_r($arrResult);
unset($arrFilter, $arrResult);	


echo '<h3>setRefundStatePaid()</h3>';
$arrResult = array();
# $arrResult = $client->setRefundStatePaid($strAPIKey, 16);
pre_print_r($arrResult);
unset($arrResult);	


echo '<h3>setRefundStateCanceled()</h3>';
$arrResult = array();
# $arrResult = $client->setRefundStateCanceled($strAPIKey, 16);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>setRefundStateOpen()</h3>';
$arrResult = array();
# $arrResult = $client->setRefundStateOpen($strAPIKey, 16);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>createRefund()</h3>';
$arrResult = array();
$arrCreateRefund = array('customer_company'=>'API GmbH', 'useDefaultValidUntil'=>true, 'useDefaultPostTxt'=>true, 'useDefaultPreTxt'=>true, 'useDefaultTemplate'=>true);
# $arrResult = $client->createRefund($strAPIKey, $arrCreateRefund);
pre_print_r($arrResult);
unset($arrResult, $arrCreateRefund);		


echo '<h3>createRefundForCustomer()</h3>';
$arrResult = array();
# $arrResult = $client->createRefundForCustomer($strAPIKey, 6);
pre_print_r($arrResult);
unset($arrResult);	


echo '<h3>updateRefund()</h3>';
$arrResult = array();
$arrUpdateRefund = array('customer_lastname'=>'Mustermann', 'print_contactperson'=>1);
# $arrResult = $client->updateRefund($strAPIKey, 19, $arrUpdateRefund);
pre_print_r($arrResult);
unset($arrResult, $arrUpdateRefund);	


echo '<h3>deleteRefund()</h3>';
$arrResult = array();
# $arrResult = $client->deleteRefund($strAPIKey, 19);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>createRefundPosition()</h3>';
$arrResult = array();
$arrCreateRefundPosition = array('quantity'=>5, 'unit'=>'h', 'pos_txt'=>'Programmierung', 'price'=>120, 'useDefaultTax'=>true, 'discount'=>2.5);
# $arrResult = $client->createRefundPosition($strAPIKey, 21, $arrCreateRefundPosition);
pre_print_r($arrResult);
unset($arrResult, $arrCreateRefundPosition);


echo '<h3>createRefundPositionHeadline()</h3>';
$arrResult = array();
# $arrResult = $client->createRefundPositionHeadline($strAPIKey, 19, 'Headline 1');
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>deleteRefundPosition()</h3>';
$arrResult = array();
# $arrResult = $client->deleteRefundPosition($strAPIKey, 18, 64);
pre_print_r($arrResult);
unset($arrResult);	


echo '<h3>updateRefundPosition()</h3>';
$arrResult = array();
$arrUpdateRefundPosition = array('pos_txt'=>'Programmierung bearbeiten', 'price'=>200);
# $arrResult = $client->updateRefundPosition($strAPIKey, 18, 65, $arrUpdateRefundPosition);
pre_print_r($arrResult);
unset($arrResult, $arrUpdateRefundPosition);


echo '<h3>addRefundToMailspool()</h3>';
$arrResult = array();
# $arrResult = $client->addRefundToMailspool($strAPIKey, 21);
pre_print_r($arrResult);
unset($arrResult);


///////////////////////
// CONTRACT
///////////////////////


echo '<h1>Contract examples</h1>';


echo '<h3>getContract()</h3>';
$arrResult = array();
# $arrResult = $client->getContract($strAPIKey, 16);
pre_print_r($arrResult);
unset($arrResult);	


echo '<h3>getContracts()</h3>';
$arrResult = array();
$arrFilter[] = array('field'=>'amount', 'operator'=>'bigger', 'value'=>100);
$arrSort = array('field'=>'amount', 'direction'=>'desc');
# $arrResult = $client->getContracts($strAPIKey, $arrFilter, $arrSort,3,0);
pre_print_r($arrResult);
unset($arrFilter, $arrSort, $arrResult);	


echo '<h3>getContractsCount()</h3>';
$arrResult = array();
$arrFilter[] = array('field'=>'amount', 'operator'=>'bigger', 'value'=>100);
# $arrResult = $client->getContractsCount($strAPIKey, $arrFilter);
pre_print_r($arrResult);
unset($arrFilter, $arrResult);	


echo '<h3>setContractStateEnabled()</h3>';
$arrResult = array();
# $arrResult = $client->setContractStateEnabled($strAPIKey, 77);
pre_print_r($arrResult);
unset($arrResult);	


echo '<h3>setContractStateDisabled()</h3>';
$arrResult = array();
# $arrResult = $client->setContractStateDisabled($strAPIKey, 77);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>deleteContract()</h3>';
$arrResult = array();
# $arrResult = $client->deleteContract($strAPIKey, 81);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>deleteContractPosition()</h3>';
$arrResult = array();
# $arrResult = $client->deleteContractPosition($strAPIKey, 80, 361);
pre_print_r($arrResult);
unset($arrResult);	


echo '<h3>createContractPosition()</h3>';
$arrResult = array();
$arrCreateContractPosition = array('quantity'=>5, 'unit'=>'h', 'pos_txt'=>'Programmierung', 'price'=>120, 'useDefaultTax'=>true, 'discount'=>2.5, 'not_per_interval'=>1);
# $arrResult = $client->createContractPosition($strAPIKey, 80, $arrCreateContractPosition);
pre_print_r($arrResult);
unset($arrResult, $arrCreateContractPosition);


echo '<h3>updateContractPosition()</h3>';
$arrResult = array();
$arrUpdateContractPosition = array('pos_txt'=>'Programmierung bearbeiten', 'price'=>200, 'not_per_interval'=>1);
# $arrResult = $client->updateContractPosition($strAPIKey, 80, 368, $arrUpdateContractPosition);
pre_print_r($arrResult);
unset($arrResult, $arrUpdateContractPosition);


echo '<h3>createContractForCustomer()</h3>';
$arrResult = array();
$arrCreateContract = array('start'=>'2010-10-15', 'series_art'=>1, 'interval'=>6, 'endInMonths'=>24);
# $arrResult = $client->createContractForCustomer($strAPIKey, 4, $arrCreateContract);
pre_print_r($arrResult);
unset($arrResult, $arrCreateContract);	


echo '<h3>updateContract()</h3>';
$arrResult = array();
$arrUpdateContract = array('interval'=>6, 'series_art'=>0); // sechs monate im voraus
# $arrResult = $client->updateContract($strAPIKey, 103, $arrUpdateContract);
pre_print_r($arrResult);
unset($arrResult, $arrUpdateContract);


echo '<h3>updateContractEndDate()</h3>';
$arrResult = array();
# $arrResult = $client->updateContractEndDate($strAPIKey, 104, 6, 2011);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>removeContractEndDate()</h3>';
$arrResult = array();
# $arrResult = $client->removeContractEndDate($strAPIKey, 85);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>getContractsRepayable()</h3>';
$arrResult = array();
# $arrResult = $client->getContractsRepayable($strAPIKey);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>processContractsRepayable()</h3>';
$arrResult = array();
# $arrResult = $client->processContractsRepayable($strAPIKey);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>processContractsRepayableForCustomerId()</h3>';
$arrResult = array();
# $arrResult = $client->processContractsRepayableForCustomerId($strAPIKey,91);
pre_print_r($arrResult);
unset($arrResult);

echo '<h3>processContractRepayableNow()</h3>';
$arrResult = array();
# $arrResult = $client->processContractRepayableNow($strAPIKey,41);
pre_print_r($arrResult);
unset($arrResult);


///////////////////////
// QUEUE
///////////////////////


echo '<h1>Queue examples</h1>';


echo '<h3>deleteQueueEntry()</h3>';
$arrResult = array();
# $arrResult = $client->deleteQueueEntry($strAPIKey, 395);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>updateQueueEntry()</h3>';
$arrResult = array();
$arrUpdateQueueEntry = array('quantity'=>15);
# $arrResult = $client->updateQueueEntry($strAPIKey, 301, $arrUpdateQueueEntry);
pre_print_r($arrResult);
unset($arrResult, $arrUpdateQueueEntry);


echo '<h3>createQueueEntry()</h3>';
$arrResult = array();
$arrCreateQueueEntry = array('customers_id'=>1, 'quantity'=>10, 'unit'=>'x', 'pos_txt'=>'API Position', 'useDefaultTax'=>true, 'approval'=>0, 'price'=>3.99);
# $arrResult = $client->createQueueEntry($strAPIKey, $arrCreateQueueEntry);
pre_print_r($arrResult);
unset($arrCreateQueueEntry, $arrResult);


echo '<h3>getQueueEntriesCount()</h3>';
$arrResult = array();
$arrFilter[] = array('field'=>'approval', 'operator'=>'is', 'value'=>2);
# $arrResult = $client->getQueueEntriesCount($strAPIKey, $arrFilter);
pre_print_r($arrResult);
unset($arrFilter, $arrResult);


echo '<h3>getQueueEntries()</h3>';
$arrResult = array();
$arrFilter[] = array('field'=>'approval', 'operator'=>'is', 'value'=>2);
$arrSort = array('field'=>'price', 'direction'=>'asc');
# $arrResult = $client->getQueueEntries($strAPIKey, $arrFilter, $arrSort, 2, 0);
pre_print_r($arrResult);
unset($arrFilter, $arrSort, $arrResult);


echo '<h3>getQueueEntry()</h3>';
$arrResult = array();
# $arrResult = $client->getQueueEntry($strAPIKey, 58);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>setQueueEntryStateAuto()</h3>';
$arrResult = array();
# $arrResult = $client->setQueueEntryStateAuto($strAPIKey, 6);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>setQueueEntryStateManual()</h3>';
$arrResult = array();
# $arrResult = $client->setQueueEntryStateManual($strAPIKey, 6);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>setQueueEntryStateNoApproval()</h3>';
$arrResult = array();
# $arrResult = $client->setQueueEntryStateNoApproval($strAPIKey, 6);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>createInvoiceFromQueueForCustomer()</h3>';
$arrResult = array();
# $arrResult = $client->createInvoiceFromQueueForCustomer($strAPIKey, 6);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>createInvoicesFromQueueForAll()</h3>';
$arrResult = array();
# $arrResult = $client->createInvoicesFromQueueForAll($strAPIKey);
pre_print_r($arrResult);
unset($arrResult);


///////////////////////
// MAILSPOOL
///////////////////////


echo '<h1>Mailspool examples</h1>';


echo '<h3>sendMailspool()</h3>';
$arrResult = array();
# $arrResult = $client->sendMailspool($strAPIKey);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>getMailspoolEntry()</h3>';
$arrResult = array();
# $arrResult = $client->getMailspoolEntry($strAPIKey, 232);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>getMailspoolEntries()</h3>';
$arrResult = array();
$arrFilter[] = array('field'=>'subject', 'operator'=>'like', 'value'=>'Rechnung re-');
$arrSort = array('field'=>'created', 'direction'=>'desc');
# $arrResult = $client->getMailspoolEntries($strAPIKey, $arrFilter, $arrSort,3,0);
pre_print_r($arrResult);
unset($arrFilter, $arrSort, $arrResult);


echo '<h3>getMailspoolEntriesCount()</h3>';
$arrResult = array();
$arrFilter[] = array('field'=>'subject', 'operator'=>'like', 'value'=>'Rechnung re-');
# $arrResult = $client->getMailspoolEntriesCount($strAPIKey, $arrFilter);
pre_print_r($arrResult);
unset($arrFilter, $arrSort, $arrResult);


echo '<h3>duplicateMailspoolEntry()</h3>';
$arrResult = array();
# $arrResult = $client->duplicateMailspoolEntry($strAPIKey, 225);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>setMailspoolSendApprovalForEntry()</h3>';
$arrResult = array();
# $arrResult = $client->setMailspoolSendApprovalForEntry($strAPIKey, 215);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>setMailspoolReadForEntry()</h3>';
$arrResult = array();
# $arrResult = $client->setMailspoolReadForEntry($strAPIKey, 256);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>removeMailspoolSendApprovalForEntry()</h3>';
$arrResult = array();
# $arrResult = $client->removeMailspoolSendApprovalForEntry($strAPIKey, 225);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>createMailspoolEntry()</h3>';
$arrResult = array();
$arrCreateMailspoolEntry = array('useDefaultFrom'=>true, 'subject'=>'Testbetreff', 'body_plain'=>'Plaintext body', 'body'=>'HTML bodytext', 'to_email'=>'info@domain.local', 'send_approval'=>0);
# $arrResult = $client->createMailspoolEntry($strAPIKey, $arrCreateMailspoolEntry);
pre_print_r($arrResult);
unset($arrResult, $arrCreateMailspoolEntry);


echo '<h3>updateMailspoolEntry()</h3>';
$arrResult = array();
$arrUpdateMailspoolEntry = array('subject'=>'Testbetreff bearbeiten', 'body_plain'=>'Plaintext body bearbeiten', 'body'=>'HTML bodytext bearbeiten');
# $arrResult = $client->updateMailspoolEntry($strAPIKey, 266, $arrUpdateMailspoolEntry);
pre_print_r($arrResult);
unset($arrResult, $arrUpdateMailspoolEntry);


echo '<h3>deleteMailspoolEntry()</h3>';
$arrResult = array();
# $arrResult = $client->deleteMailspoolEntry($strAPIKey, 243);
pre_print_r($arrResult);
unset($arrResult);


///////////////////////
// NEWSLETTER
///////////////////////


echo '<h1>Newsletter examples</h1>';


echo '<h3>getNewsletter()</h3>';
$arrResult = array();
# $arrResult = $client->getNewsletter($strAPIKey, 1);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>getNewsletterRecipients()</h3>';
$arrResult = array();
# $arrResult = $client->getNewsletterRecipients($strAPIKey, 3);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>createNewsletter()</h3>';
$arrResult = array();
$arrCreateNewsletter = array('useDefaultFrom'=>true, 'subject'=>'Testbetreff', 'body_plain'=>'Plaintext body', 'body'=>'HTML bodytext');
# $arrResult = $client->createNewsletter($strAPIKey, $arrCreateNewsletter);
pre_print_r($arrResult);
unset($arrResult, $arrCreateNewsletter);


echo '<h3>updateNewsletter()</h3>';
$arrResult = array();
$arrUpdateNewsletter = array('subject'=>'Testbetreff bearbeiten', 'body_plain'=>'Plaintext body bearbeiten', 'body'=>'HTML bodytext bearbeiten');
# $arrResult = $client->updateNewsletter($strAPIKey, 3, $arrUpdateNewsletter);
pre_print_r($arrResult);
unset($arrResult, $arrUpdateNewsletter);


echo '<h3>deleteNewsletter()</h3>';
$arrResult = array();
# $arrResult = $client->deleteNewsletter($strAPIKey, 1);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>getNewsletters()</h3>';
$arrResult = array();
$arrFilter[] = array('field'=>'info_recipients', 'operator'=>'bigger', 'value'=>'0');
$arrSort = array('field'=>'created', 'direction'=>'desc');
# $arrResult = $client->getNewsletters($strAPIKey, $arrFilter, $arrSort,3,0);
pre_print_r($arrResult);
unset($arrFilter, $arrSort, $arrResult);


echo '<h3>getNewslettersCount()</h3>';
$arrResult = array();
$arrFilter[] = array('field'=>'info_recipients', 'operator'=>'bigger', 'value'=>'0');
# $arrResult = $client->getNewslettersCount($strAPIKey, $arrFilter);
pre_print_r($arrResult);
unset($arrFilter, $arrResult);


echo '<h3>addNewsletterRecipient()</h3>';
$arrResult = array();
$arrAddNewsletterRecipient = array('to_name'=>'API Test', 'to_email'=>'info@domain.local');
# $arrResult = $client->addNewsletterRecipient($strAPIKey, 3, $arrAddNewsletterRecipient);
pre_print_r($arrResult);
unset($arrResult, $arrAddNewsletterRecipient);


echo '<h3>addNewsletterRecipientByCustomerId()</h3>';
$arrResult = array();
# $arrResult = $client->addNewsletterRecipientByCustomerId($strAPIKey, 3, 20);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>removeNewsletterRecipient()</h3>';
$arrResult = array();
# $arrResult = $client->removeNewsletterRecipient($strAPIKey, 16);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>spoolNewsletter()</h3>';
$arrResult = array();
# $arrResult = $client->spoolNewsletter($strAPIKey, 3);
pre_print_r($arrResult);
unset($arrResult);


///////////////////////
// ARTICLE
///////////////////////


echo '<h1>Article examples</h1>';


echo '<h3>updateArticle()</h3>';
$arrResult = array();
$arrUpdateArticle = array('custom2'=>'test 123','custom1'=>'free stuff II');
# $arrResult = $client->updateArticle($strAPIKey, 8,$arrUpdateArticle);
pre_print_r($arrResult);
unset($arrUpdateArticle, $arrResult);


echo '<h3>deleteArticle()</h3>';
$arrResult = array();
# $arrResult = $client->deleteArticle($strAPIKey, 52);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>createArticle()</h3>';
$arrResult = array();
$arrCreateArticle = array('artno'=>3, 'title'=>'Artikeltitel', 'unit'=>'h', 'pos_txt'=>"Positionstext für Artikel", 'price'=>5.2, 'custom1'=>'free stuff');
# $arrResult = $client->createArticle($strAPIKey, $arrCreateArticle);
pre_print_r($arrResult);
unset($arrResult, $arrCreateArticle);


echo '<h3>getArticlesCount()</h3>';
$arrResult = array();
$arrFilter[] = array('field'=>'price', 'operator'=>'bigger', 'value'=>20);
# $arrResult = $client->getArticlesCount($strAPIKey, $arrFilter);
pre_print_r($arrResult);
unset($arrResult, $arrFilter);


echo '<h3>getArticles()</h3>';
$arrResult = array();
$arrFilter[] = array('field'=>'price', 'operator'=>'bigger', 'value'=>20);
$arrSort = array('field'=>'price', 'direction'=>'desc');
# $arrResult = $client->getArticles($strAPIKey, $arrFilter, $arrSort,2,0);
pre_print_r($arrResult);
unset($arrResult, $arrFilter, $arrSort);


echo '<h3>getArticle()</h3>';
$arrResult = array();
# $arrResult = $client->getArticle($strAPIKey, 5);
pre_print_r($arrResult);
unset($arrResult);


///////////////////////
// USER
///////////////////////


echo '<h1>User examples</h1>';


echo '<h3>unlockUser()</h3>';
$arrResult = array();
# $arrResult = $client->unlockUser($strAPIKey, 2);
pre_print_r($arrResult);
unset($arrResult);	


echo '<h3>lockUser()</h3>';
$arrResult = array();
# $arrResult = $client->lockUser($strAPIKey, 2);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>updateUser()</h3>';
$arrResult = array();
$arrUpdateUserData = array('password'=>'geheimespasswort', 'fullname'=>'Max Mustermann');
# $arrResult = $client->updateUser($strAPIKey, 2, $arrUpdateUserData);
pre_print_r($arrResult);
unset($arrResult, $arrUpdateUserData);	


echo '<h3>createUser()</h3>';
$arrResult = array();
# $arrNewUserData = array('login'=>'maxmustermann', 'password'=>'geheimespasswort');
# $arrResult = $client->createUser($strAPIKey, $arrNewUserData);
pre_print_r($arrResult);
unset($arrResult, $arrNewUserData);	


echo '<h3>deleteUser()</h3>';
$arrResult = array();
# $arrResult = $client->deleteUser($strAPIKey, 58);
pre_print_r($arrResult);
unset($arrResult);	


echo '<h3>getUser()</h3>';
$arrResult = array();
# $arrResult = $client->getUser($strAPIKey,1);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>getUsers()</h3>';
$arrResult = array();
$arrFilter[] = array('field'=>'locked', 'operator'=>'is', 'value'=>0);
$arrSort = array('field'=>'login', 'direction'=>'asc');
# $arrResult = $client->getUsers($strAPIKey, $arrFilter, $arrSort,2,0);
pre_print_r($arrResult);
unset($arrFilter, $arrSort, $arrResult);


echo '<h3>getUsersCount()</h3>';
$arrResult = array();
$arrFilter[] = array('field'=>'locked', 'operator'=>'is', 'value'=>0);
# $arrResult = $client->getUsersCount($strAPIKey, $arrFilter);
pre_print_r($arrResult);
unset($arrFilter, $arrResult);


///////////////////////
// USER ROLES
///////////////////////


echo '<h1>User roles examples</h1>';


echo '<h3>addRoleToUser()</h3>';
$arrResult = array();
# $arrResult = $client->addRoleToUser($strAPIKey,1,2);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>removeRoleFromUser()</h3>';
$arrResult = array();
# $arrResult = $client->removeRoleFromUser($strAPIKey,1,2);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>getAvailableRoles()</h3>';
$arrResult = array();
# $arrResult = $client->getAvailableRoles($strAPIKey);
pre_print_r($arrResult);
unset($arrResult);


echo '<h3>getRolesOfUser()</h3>';
$arrResult = array();
# $arrResult = $client->getRolesOfUser($strAPIKey,2);
pre_print_r($arrResult);
unset($arrResult);



///////////////////////
// COMMENTS
///////////////////////


echo '<h1>Comments</h1>';


echo '<h3>createComment()</h3>';
$arrResult = array();
$arrCreateCommentData = array('sub'=>'subletter', 'recordid'=>'19', 'comment'=>'neuer kommentar 123');
# $arrResult = $client->createComment($strAPIKey, $arrCreateCommentData);
pre_print_r($arrResult);
unset($arrCreateCommentData, $arrResult);

echo '<h3>getComment()</h3>';
$arrResult = array();
# $arrResult = $client->getComment($strAPIKey, 20);
pre_print_r($arrResult);
unset($arrResult);

echo '<h3>getComments()</h3>';
$arrResult = array();
# $arrResult = $client->getComments($strAPIKey, 'subletter', 19);
pre_print_r($arrResult);
unset($arrResult);

echo '<h3>deleteComment()</h3>';
$arrResult = array();
# $arrResult = $client->deleteComment($strAPIKey, 20);
pre_print_r($arrResult);
unset($arrResult);



///////////////////////
// MISC
///////////////////////


echo '<h1>Misc examples</h1>';


echo '<h3>getConfigurationValue()</h3>';
$arrResult = array();
#$arrResult = $client->getConfigurationValue($strAPIKey,'me_owner'); # bezeichner findest du in der gSales Tabelle configuration (Spalte "id")
pre_print_r($arrResult);
unset($arrResult);


$intStop = microtime(true);
echo round($intStop-$intStart,4).' sec';
