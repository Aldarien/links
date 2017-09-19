<?php
include_once dirname(__DIR__) . '/bootstrap/autoload.php';

$links = new Links\Links();
echo view('index', compact('links'));
?>
