<?php
$filterCategory = "computers & accessories"; 
$imageSize = "311x100";
$apikey = "274ab56313562fc993a85d25a957ae8e"; 

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, "http://api.cnet.com/restApi/v1.0"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_POST, true); 
$data = array( 
        'api_key' => $apikey,  
        'filterCategory'   => $filterCategory, 
		'imageSize'   => $imageSize, 
		'limit' => '10', 

		
); 

var_dump($data);

echo "<br>";
echo "<br>";
echo "<br>";

curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
$output = curl_exec($ch); 
$info = curl_getinfo($ch); 

curl_close($ch); 

//echo($output); 
$return = json_decode( $output ); 
var_dump($return);
die;
foreach ( $return->data as $trend ) 
{ 
     
    $cid = $trend->couponId; 
    $affurl = $trend->affiliate_url; 
    $keyword = $trend->keyword; 
    $keywords = $trend->keywords; 
    $description = $trend->description; 
    $catgory = $trend->category; 
    $merchant = $trend->merchant; 
    $coupon = $trend->coupon_code; 
    $restrictions = $trend->restrictions; 
    $startdate = $trend->start_date; 
    $expiration = $trend->expiration_date; 
    $image = $trend->image_url; 
    $city = $trend->city; 
    $state = $trend->state; 
    $promo = $trend->promo; 
     
}  
var_dump($return);
?>