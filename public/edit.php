<?php
include_once dirname(__DIR__) . '/bootstrap/autoload.php';

if (isset($_GET['link'])) {
    $links = new Links\Links();
    $key = $_GET['link'];
    $link = $links->get($key);
    if (isset($_POST['key'])) {
        if ($_POST['key'] != $key) {
        } else {
            $links->edit($key, $_POST);
        }
        if ($links->saveFile()) {
            header('Location: .');
        } else {
            echo view('edit', compact('key', 'link'));
        }
    } else {
        echo view('edit', compact('key', 'link'));
    }
} else {
    header('Location: .');
}
