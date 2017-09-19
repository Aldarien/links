<?php
include_once dirname(__DIR__) . '/bootstrap/autoload.php';

if (isset($_POST['key'])) {
    $links = new Links\Links();
    $key = $_POST['key'];
    $link = new Links\Link($_POST);
    $links->add($key, $link);
    if ($links->saveFile()) {
        header('Location: .');
    } else {
        view('add');
    }
} else {
    echo view('add');
}
?>
