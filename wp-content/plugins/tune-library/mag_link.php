<?php

function downloadFile ($url, $path) {

  $newfname = $path;
  $file = fopen ($url, "rb");
  if ($file) {
    $newf = fopen ($newfname, "wb");

    if ($newf)
    while(!feof($file)) {
      fwrite($newf, fread($file, 1024 * 8 ), 1024 * 8 );
    }
  }

  if ($file) {
    fclose($file);
  }

  if ($newf) {
    fclose($newf);
  }
 }

if (isset($_REQUEST['part_name'])){
downloadFile('https://aws-publicdatasets.s3.amazonaws.com/'.$_REQUEST['part_name'],'tmp.gz');} else {echo "test_is_test";}

if (!file_exists('tmp.gz')) {exit;}

$handle = gzopen('tmp.gz', 'r');
while (!gzeof($handle)) {
   $buffer = gzgets($handle, 4096);

if (strpos($buffer, 'WARC-Target-URI: ') !== false) {
$url=trim(str_replace("WARC-Target-URI: ", "", $buffer));

if (preg_match('/(^.*?)(\/index.php|)(\/catalogsearch\/|\/catalog\/seo_sitemap\/|\/review\/product\/list\/|\/quickview\/index\/)/',$url,$match)) {
$list[$match[1]]='';
}
} 
}

foreach ($list as $key=>$value) {
file_put_contents('out_d.txt','<gd>'.$key.'</gd>'."\n",FILE_APPEND);
$i++;
}

gzclose($handle);
unlink('tmp.gz');

$file = 'out_d.txt';

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
unlink($file);
}

?>