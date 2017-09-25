<?php
include_once dirname(__DIR__) . '/bootstrap/autoload.php';

if (isset($_POST['link'])) {
	$links = new Links\Links();
	$key = $_POST['link'];
	if ($links->remove($key) and $links->saveFile()) {
		header('Location: .');
	} else {
		throw new Exception('Link not found.');
	}
} else {
	header('Location: .');
}
?>
