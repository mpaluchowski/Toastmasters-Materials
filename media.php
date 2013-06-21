<?php

require_once './AccessGuardian.php';

$guardian = new AccessGuardian();

if (null == $guardian->getUser($_GET['checkId'])
	die;

$file = './data/' . ltrim($_GET['mediaPath'], '.');

header("Content-length: " . filesize($file));
header("Content-type: " . mime_content_type($file));

$lastModified = filemtime($file);
$etagFile = md5_file($file);
$ifModifiedSince = (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) ? $_SERVER['HTTP_IF_MODIFIED_SINCE'] : false);
$etagHeader = (isset($_SERVER['HTTP_IF_NONE_MATCH']) ? trim($_SERVER['HTTP_IF_NONE_MATCH']) : false);
header("Last-Modified: " . gmdate("D, d M Y H:i:s", $lastModified) . " GMT");
header("Etag: $etagFile");
header('Cache-Control: public');
if (@strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) == $lastModified || $etagHeader == $etagFile) {
    header("HTTP/1.1 304 Not Modified");
    exit;
}

readfile($file);