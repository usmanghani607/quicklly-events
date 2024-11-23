<?php   
ob_start();
@session_start();
error_reporting(0);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ERROR);

define('SITE_URL',"https://www.dev.goquicklly.com/");
define('SITE_TITLE',"Buy Groceries & Food Online | Same Day Delivery - Quicklly");
define('SITE_AUTHOR',"Quicklly.com, Quicklly Inc");
define('SITE_NAME',"Quicklly.com");
define('RECIPES',false);
define('SITE_KEYWORD', "quicklly, buy groceries, food online, buy food online, buy groceries online, local grocery stores, local restaurants, BBQ Kit, indian market near me, indian marketplace");
define('SITE_DESC', "Find local Grocery Stores & Restaurants online on Quicklly. Buy Groceries & Food online and get it delivered to your doorstep. Enjoy Free & Same Day Delivery.");

define('seller_url',"https://www.dev.goquicklly.com/seller");
define('seller_key',"sell groceries online, near by grocery store, sell products in online supermarket");
define('seller_desc',"Are you looking for an Online platform to sell Indian Groceries & Foods in USA? Your search ends here. Just create your account and start selling.");
define('seller_title',"Seller Portal - Login - Quicklly");
define('SHOW_QUERY_ERROR',true); // true for local and false for dev or uat or prod
define('GOOGLE_RECAPCHA_API','6LdsnYkaAAAAANxKtW6Zr8qHphwL5WvQCCp8sBLU'); 

define('API_URL',"https://apidev.goquicklly.com");
define('API_KEY',"sowcpdmrdqaxwip658khzovhonskbrhb");
define('callFrom',"WEBSITE");
define('WEBAPI_URL',"https://devrestapi.goquicklly.com/");
### Instacart SFTP details For Instacart SFTP###
define('INSTA_SFTP_HOST','sftp.instacart.com');
define('INSTA_SFTP_USER','quicklly-catalog');
define("INSTA_SFTP_PWD","vx=<gvbSbpCP6vq\\");
define('WEBAPI_URL_NEW',"https://devrestapi.goquicklly.com/");
define('WEBAPI_EMAIL',"web-app@quicklly.com");
define('WEBAPI_PASS',"cgcptcu97b");
define('MEALME_API_KEY',"quicklly:b062cd2f-df38-4653-91b9-d5e482d5f150");
$domain=$_SERVER['HTTP_HOST'];
$website_currency_code="Dollar";
$website_currency_symbol="$";


$hashurl=$_SERVER['REQUEST_URI'];
if(strpos($hashurl, '//') !== false || strpos($hashurl, '##') !== false || strpos($hashurl, '??') !== false || strpos($hashurl, ':') !== false || strpos($hashurl, '--') !== false) { 
$hashurl=str_replace('//', '/', $hashurl);
$hashurl=str_replace('##', '#', $hashurl);
$hashurl=str_replace('??', '?', $hashurl);
$hashurl=str_replace(':', '', $hashurl);
$hashurl=str_replace('--', '-', $hashurl);
$hashurl=ltrim(rtrim($hashurl,'/'),'/');
header("HTTP/1.1 301 Moved Permanently");
header("Location:" . SITE_URL . $hashurl);
exit;
}

/*
$price_zone1="3"; //leave blank if not applicable, this is only for local
$price_zone2="30"; //leave blank if not applicable
$price_zone3="40"; //leave blank if not applicable
$price_zone4="60"; //leave blank if not applicable
$price_zone5="60"; //leave blank if not applicable
*/
$wholesale_url="https://www.wholesale.myvalue365.com/";

//removing trailling / and reloading page without slash
if(basename($_SERVER['SCRIPT_NAME'])!='index.php' ){
if(($_SERVER['REQUEST_URI'] != "/") and preg_match('{/$}',$_SERVER['REQUEST_URI'])) {
    header ('Location: '.preg_replace('{/$}', '', $_SERVER['REQUEST_URI']));
    exit();
}
}


        $host = 'localhost';

        $username = 'devgoquicklly_quickllyusr';
#       $username = 'devgoquick';

#       $password ='%WDoa33ZegjLdeb!';
        $password ='%WDoa33ZegjL';

#        $db_name = 'devgoquicklly_quickllydb';
	$db_name = 'devgoquicklly_live_240214';
date_default_timezone_set("America/Chicago");

require_once("db.class.php");
require_once("variable.php");
$obj = new DB($db_name, $host, $username, $password);

if (isset($_COOKIE['postalcode']) && $_COOKIE['postalcode'] != '') {
    $postal_code = $_COOKIE['postalcode'];
    $zipState = $obj->query("SELECT state FROM tbl_store_zip WHERE tbl_store_zip.zip='$postal_code'");

    $record = $obj->numRows($zipState);

    if ($record > 0) {
        $ziprec = $obj->fetchNextObject($zipState);
        $postal_state = $ziprec->state;
        if ($postal_state == 'CA') {
            date_default_timezone_set("America/Los_Angeles");
        }
        if ($postal_state == 'PA' || $postal_state == 'NY' || $postal_state == 'NJ' || $postal_state == 'CONNECTICUT') {
            date_default_timezone_set("America/New_York");
        }
        if ($postal_state == 'IL') {
            date_default_timezone_set("America/Chicago");
        }
    }
}


$urlstring = $_SERVER['QUERY_STRING'];
parse_str($urlstring, $urlparam);
//print_r($urlparam); 

/*if($urlparam['url_slug'] != ''){
$location = strtolower(trim($urlparam['url_slug']));
}else{
$location = ''; 
}
if($location!=''){
$urltocheck = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if(!filter_var($urltocheck, FILTER_VALIDATE_URL) === false){
$urltocheckvalue=true;
}else{
$urltocheckvalue=false;
} 
if($urltocheckvalue){    
$urlarr = explode('-', $location);
if(isset($urlarr) && count($urlarr) == 3){
$city = $urlarr[0]. ' ' . $urlarr[1];
$state = $urlarr[2];
} if(isset($urlarr) && count($urlarr) == 4){
$city = $urlarr[0]. ' ' . $urlarr[1]. ' ' . $urlarr[2];
$state = $urlarr[3];
} elseif(count($urlarr) > 4){
setcookie('postalcode', '60610', time() + (86400 * 30 * 12), "/"); // 86400 = 1 day 
setcookie('url', 'chicago,il', time() + (86400 * 30 * 12), "/"); // 86400 = 1 day 
$_COOKIE['postalcode']='60610';
$_COOKIE['url']='chicago,il';
header("HTTP/1.1 301 Moved Permanently");
header("Location:" . SITE_URL ."indian-grocery-delivery/near-me-in-chicago-il");
exit;
}else {
$city = $urlarr[0];
$state = $urlarr[1];
} 
if(isset($_COOKIE['postalcode']) && $_COOKIE['postalcode']!=''){
$sqlcity=$obj->query("select LOWER(z.city),LOWER(z.state),z.zip,z.zip_area from tbl_store_zip z join stores s on s.storeid=z.storeid where s.status=1 and z.status=1 and z.city='$city' and z.state='$state' and z.zip='".$_COOKIE['postalcode']."' limit 1");
if($obj->numRows($sqlcity)>0){ 
}else{
// $sqlcity=$obj->query("select LOWER(z.city),LOWER(z.state),z.zip,z.zip_area from tbl_store_zip z join stores s on s.storeid=z.storeid where s.status=1 and z.status=1 and z.city='$city' and z.state='$state' limit 1");
// $ziprec=$obj->fetchNextObject($sqlcity);
// $zip=$ziprec->zip;
// $zipcity=str_replace(' ','-',$ziprec->city.','.$ziprec->state);
// setcookie('postalcode', $zip, time() + (86400 * 30 * 12), "/"); // 86400 = 1 day 
// setcookie('url', $zipcity, time() + (86400 * 30 * 12), "/"); // 86400 = 1 day 
// $_COOKIE['postalcode']=$zip;
// $_COOKIE['url']=str_replace(' ','-',$ziprec->city).','.$ziprec->state;
?>
<!--<script> sessionStorage.zipcodepop = 1;</script>-->
<?php
}
}
}
}*/
 
?>
