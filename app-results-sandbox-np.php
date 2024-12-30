<?php
session_start();
define('WEBAPI_URL_NEW',"https://devrestapi.goquicklly.com/");
define('SITE_URL',"https://www.dev.goquicklly.com/events-web");
	include("include/config.php");
	include("include/function.php");
//	include "qrcode.php";
include("national_processing.php");
 $subtotal=$_POST['subtotal'];
 $discount=$_POST['discount'];
 if($discount=='')
 {
     $discount=0;
 }
 else
 {
     $discount=$_POST['discount'];
 }
$delivery_charges=$_POST['delivery_charges'];
$eservicefee=$_POST['eservicefee'];
$taxtotal=$_POST['taxtotal'];
$_SESSION['cart_events'];


	$arr_cat_prods=array();
	$add_on_sizeids='';
	$addOnQtys='';
	$customize='';
	$deliveryDate='';
	$deliveryFromTime='';
	$deliveryToTime='';
	$pid='';
	$qty='';
	$remarks='';
	foreach($_SESSION['cart_events'] as $key => $item)
	{
	    
	    
	   if($key=='add_on_sizeids')
	    {
	       $add_on_sizeids=$item;
	    }
	    if($key=='addOnQtys')
	    {
	        $addOnQtys=$item;
	    }
	    if($key=='customize')
	    {
	        $customize=$item;
	    }
	    if($key=='deliveryDate')
	    {
	        $deliveryDate=$item;
	    }
	    if($key=='deliveryFromTime')
	    {
	        $deliveryFromTime=$item;
	    }
	    if($key=='deliveryToTime')
	    {
	        $deliveryToTime=$item;
	    }
	    if($key=='pid')
	    {
	        $pid=$item;
	    }
	    if($key=='qty')
	    {
	        $qty=$item;
	    }
	    if($key=='remarks')
	    {
	        $remarks=$item;
	    }
	    //echo $add_on_sizeids;
	    if($add_on_sizeids!='' AND $addOnQtys!='' AND $customize!='' AND $deliveryDate!='' AND $deliveryFromTime!='' AND $deliveryToTime!='' AND $pid!='' AND $qty!='' AND $remarks!='')
	    {
	       
	    }
	}
	 array_push($arr_cat_prods, array(
	                             "addOnIDs"=>$add_on_sizeids,
                                 "addOnQtys"=>$addOnQtys,
                                 "addOnSizeIDs"=>$add_on_sizeids,
                                 "customize"=>$customize,
                                 "deliveryDate"=>$deliveryDate,
                                 "deliveryFromTime"=>$deliveryFromTime,
                                 "deliveryToTime"=>$deliveryToTime,
                                 "pid"=>$pid,
                                 "qty"=>$qty,
                                 "remarks"=>$remarks,
                                 "replaceOption"=>'',
                                 "rid"=>0,
                                 "section"=>'events',
                                 "sizeID"=>'',
                                 "subscriptiontypef"=>'',
                                 "sectionType"=>'',
	        ));
	
	$tokenData = callAPI('POST', WEBAPI_URL_NEW.'login',array("email"=>"web-app@quicklly.com", "password"=>"cgcptcu97b"));
	$apitoken = $tokenData->token;
   $token=$apitoken;

	$userarr=callAPI('POST', WEBAPI_URL_NEW.'miniWebsite/order-review-user', array('user_id' =>$_SESSION['value_user_id']));
   foreach($userarr->lstuser as $resultuser){}
   
$todayorrderlistarray['domain']=SITE_URL;
$todayorrderlistarray['addr']=$resultuser->full_address;
$todayorrderlistarray['apartment']= $resultuser->complex;
$todayorrderlistarray['app_ver']='';
$todayorrderlistarray['city']=$resultuser->city_id;
$todayorrderlistarray['coupon']='';
$todayorrderlistarray['delivery']='1';
$todayorrderlistarray['deliveryNotes']='hello';
$todayorrderlistarray['discount']=$discount;
$todayorrderlistarray['discountPopUp']=0;
$todayorrderlistarray['discountType']='';
$todayorrderlistarray['email']=$resultuser->email;
$todayorrderlistarray['firstName']=$resultuser->fname;
$todayorrderlistarray['lastName']=$resultuser->lname;
$todayorrderlistarray['latitude']=$resultuser->latitude;
$todayorrderlistarray['longitude']=$resultuser->longitude;
$todayorrderlistarray['memberSaving']='0.00';
$todayorrderlistarray['minStoreCharge']='0.0';
$todayorrderlistarray['packingCharge']='0.00';
$todayorrderlistarray['phone']= $resultuser->mobile;

$todayorrderlistarray['lstProds']=$arr_cat_prods;
$todayorrderlistarray['shippingCharge']=$delivery_charges;
$todayorrderlistarray['state']=$resultuser->state;
$todayorrderlistarray['streetAddr1']=$resultuser->full_address;
$todayorrderlistarray['streetAddr2']=$resultuser->full_address;
$todayorrderlistarray['subTotal']=$subtotal;
$todayorrderlistarray['tip']='0';//number_format($subtotal*$_COOKIE['tip']/100,2);
$todayorrderlistarray['uid']=$_SESSION['value_user_id'];
$todayorrderlistarray['callFrom']='event-website';
$todayorrderlistarray['zipcode']=$resultuser->pincode;
$todayorrderlistarray["eServiceFees"]=$eservicefee;
$todayorrderlistarray['token']=$token;
$todayorrderlistarray['tax']=$taxtotal;

$data=json_encode($todayorrderlistarray);
$url = WEBAPI_URL_NEW.'checkout/store-order';
// Create a new cURL resource
$ch = curl_init($url);
// Setup request to send json via POST
$payload =$data;
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BEARER);
curl_setopt($ch,CURLOPT_XOAUTH2_BEARER,$token);
// Attach encoded JSON string to the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
// Return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Execute the POST request
$result = curl_exec($ch);
//return $result;
 $arr = json_decode($result, true);
 
 $tempIOD = $arr['oid'];
    setcookie('tempOID', $tempIOD, time() + (86400 * 30 * 12), "/"); // 86400 = 1 day
 if($arr["success"] == 1)
 {
     $_SESSION['value_order_id']=$array['oid'];
     //header("Location:".$arr['url']); exit();
 }
 else
 {
     //echo $array['msg'];
 }
// Close cURL resource
 curl_close($ch);

//$fetchuserdata=$obj->query("select * from tbl_order where user_id='".$_POST['userid']."' and id='".$_POST['orderid']."'");
//$udata=$obj->fetchNextObject($fetchuserdata);

//if(SITE_URL=='https://www.justbyquicklly.com/'){
  //prod
$national_payment_security_key='2f2V28-923J23-42TRvc-F6t5K3';
$authkey="M7vas4zs9Mhe5c9KTWwtv5Xd3H4Qg7QA";
$payment_token=$_POST['ptoken'];
/*}else{
  //sandbox
$national_payment_security_key='5mN8N7-jhr55W-N22pxX-uAW2s9';
$authkey="7M8DV8D2S5C4DfH357F5UX785eUpxQW9";
$payment_token="00000000-000000-000000-000000000000";
}*/

$orderdescription='';
$tax='';
$shipping='';
$ponumber='';
$ipaddress='';
$orderid=$arr['oid'];
//$amount='18.25';
$np_cnumber=substr($_POST['np_cnumber'], -4);
//$orderid=$_SESSION['value_order_id'];
  $amount=number_format(getFieldWhere('total_amount','tbl_order','id',$orderid),2,'.', '');

//$amount='1.07';
$vaultstatus='';
/*$ccnumber="5431111111111111";
$ccexp='1025';
$cvv='125';*/ 
$fname=$resultuser->fname;//getFieldWhere('ship_fname','tbl_order','id',$orderid);//$udata->ship_fname;
$lname=$resultuser->lname;//getFieldWhere('ship_lname','tbl_order','id',$orderid);//$udata->ship_lname;
$full_address=$resultuser->full_address;//getFieldWhere('ship_full_address','tbl_order','id',$orderid);//$udata->ship_full_address;
$city=$resultuser->city_id;//getFieldWhere('ship_city_id','tbl_order','id',$orderid);//$udata->ship_city_id;
$state=$resultuser->state;//getFieldWhere('ship_state','tbl_order','id',$orderid);//$udata->ship_state;
$pincode=$resultuser->pincode;//getFieldWhere('ship_pincode','tbl_order','id',$orderid);//$udata->ship_pincode;
$value_user_id=$_SESSION['value_user_id'];
$shipemail=$resultuser->email;//getFieldWhere('ship_email','tbl_order','id',$orderid);//$udata->ship_email;

$gw = new gwapi;
$gw->setLogin($authkey);
$gw->setBilling($fname,$lname,"",$full_address,"",$city,
        $state,$pincode,"US","224-366-0987","224-366-0987",$shipemail,
        "www.quicklly.com");
$gw->setShipping($fname,$lname,"",$full_address,"", $city,$state,$pincode,"US",$shipemail );

		$vaultstatus='New';
        $vaultid = $value_user_id;
		
$gw->setOrder($orderid,$orderdescription,$tax,$shipping,$ponumber,$ipaddress);

$orderAuth=$gw->doSale($amount, $payment_token,$orderid);

$transactionid=$gw->responses['transactionid'];
$responsetext=$gw->responses['responsetext'];
$response_code=$gw->responses['response_code'];
$cvvresponse=$gw->responses['cvvresponse'];
$request_array = array(
		'orderId' => $orderid,
		'user_id' => $value_user_id,
		'callFrom'=>"events",
		'amount' => $amount,
		'VaultAction' => $vaultstatus,
		'customerId' => $cusomervault1,
		'transactionid' => $transactionid,
		'responsetext' => $responsetext,
		'responsecode' => $response_code,
		);

$transaction_status_np=$gw->responses['response'];

		debug_logs(json_encode($request_array));
		debug_logs(json_encode($gw), 'responses');
	function debug_logs($string, $type='request')
	{
		$fp = fopen(__DIR__."/nplogs/". date("Ymd").".txt", "a+");
		fwrite($fp, date("Y-m-d H:i:s") . "--------------------" . $type . " start ---------------------\n");
		fwrite($fp, date("Y-m-d H:i:s") . " " . $string . "\n");
		fwrite($fp, date("Y-m-d H:i:s") . "--------------------" . $type . " end ---------------------\n");
		fclose($fp);
	}
//$obj->query("insert into tbl_transacttion set orderid='$orderid', transaction_id='$transactionid',transaction_date=now(),transaction_status='$transaction_status_np', customer_id='".$value_user_id."', transaction_type='sale',transaction_processor='NP',transaction_by='APP'");
$paymentStatus=$transaction_status_np;
$transaction_status_np=1;
if(trim($transaction_status_np)==1){
//$obj->query("update tbl_order set payment_status=1,order_status=1 where id='".$orderid."'");
	$tokenData = callAPI('POST', WEBAPI_URL_NEW.'login',array("email"=>"web-app@quicklly.com", "password"=>"cgcptcu97b"));
$apitoken = $tokenData->token;
$token=$apitoken;
	$results = callAPI('POST', WEBAPI_URL_NEW.'checkout/Checkout-Step2',array("oid"=>$orderid,'uid'=>$value_user_id,'status'=>'success','token'=>$token,'callFrom'=>'JUSTBYQUICKLLY','sitename'=>'justbyquicklly.com','vendoremail'=>'niitpuneetkumar@gmail.com'));
	echo json_encode(array('success'=>true, 'message'=> 'Successfully','oid'=>$orderid));
	} else {
//	$obj->query("update tbl_order set payment_status=0, order_status=5 where id='".$orderid."'");
			$tokenData = callAPI('POST', WEBAPI_URL_NEW.'login',array("email"=>"web-app@quicklly.com", "password"=>"cgcptcu97b"));
$apitoken = $tokenData->token;
$token=$apitoken;
	$results = callAPI('POST', WEBAPI_URL_NEW.'checkout/Checkout-Step2',array("oid"=>$orderid,'uid'=>$value_user_id,'status'=>'fail','token'=>$token,'callFrom'=>'JUSTBYQUICKLLY','sitename'=>'justmeal.com','vendoremail'=>'niitpuneetkumar@gmail.com'));
	    if(trim($transaction_status_np)==2 && $cvvresponse!='M' && $cvvresponse!=''){
			echo json_encode(array('success'=>false, 'message'=> 'Transaction declined. Invalid CVV or expiry date!'));
		} else if(trim($transaction_status_np)==3 && $cvvresponse!='M' && $cvvresponse!='') {
			echo json_encode(array('success'=>false, 'message'=> 'Transaction declined. Invalid CVV or expiry date!'));
		} else {
			echo json_encode(array('success'=>false, 'message'=> 'Transaction Unsuccessful! Please try again or try using another card.'));
		} 	
	}
?>


