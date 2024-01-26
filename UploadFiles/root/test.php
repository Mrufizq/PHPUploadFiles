<?php

require('BasicFileManager.php');

$folder = '';
if(isset($_POST['folder'])) {
    $folder = $_POST['folder'];
}
if($folder == '') {
    $folder = '.';
}

$bfm = new BasicFileManager();
$result = $bfm->set('file', 'root/' . $folder);
//header('Location: https://carmelo.ieszaidinvergeles.es/exercises/first/index.php?result=' . $result);
header('Location: index.php?result=' . $result);