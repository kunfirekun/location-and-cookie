<?php
      //whether ip is from share internet
if (!empty($_SERVER['HTTP_CLIENT_IP']))   
  {
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
  }
//whether ip is from proxy
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
  {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
//whether ip is from remote address
else
  {
    $ip_address = $_SERVER['REMOTE_ADDR'];
  }
  
$ip =  $ip_address;
$ip_info = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));  

if($ip_info && $ip_info->geoplugin_countryName != null){
//  echo 'Country = '.$ip_info->geoplugin_countryName.'<br/>';
//  echo 'Country Code = '.$ip_info->geoplugin_countryCode.'<br/>';
//  echo 'City = '.$ip_info->geoplugin_city.'<br/>';
//  echo 'Region = '.$ip_info->geoplugin_region.';<br/>';
//  echo 'Latitude = '.$ip_info->geoplugin_latitude.'<br/>';
//  echo 'Longitude = '.$ip_info->geoplugin_longitude.'<br/>';
//  echo 'Timezone = '.$ip_info->geoplugin_timezone.'<br/>';
//  echo 'Continent Code = '.$ip_info->geoplugin_continentCode.'<br/>';
//  echo 'Continent Name = '.$ip_info->geoplugin_continentName.'<br/>';
//  echo 'Timezone = '.$ip_info->geoplugin_timezone.'<br/>';
//  echo 'Currency Code = '.$ip_info->geoplugin_currencyCode.'<br/>';
    
 

}

$city=$ip_info->geoplugin_city;
  $name = $city;
  $value = $ip_address;
  setcookie($name, $value, time() + (86400 * 80), '/','finkosuppliesagencies.com', 1);
  // 86400 = 1 day
  
  
  
  
  
  
?>
<html>
  <body>
    <?php
      if (!isset($_COOKIE[$name])) {    
        echo "Cookie called '" . $name . "' has not been set!";
      } else { 
        echo "Cookie '" . $name  . "' has been set!<br>";    
        echo "Value in cookie is: " . $_COOKIE[$name];
      }
    ?>
  </body>
</html>