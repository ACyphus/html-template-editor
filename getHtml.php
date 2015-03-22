<?php

if ($_POST) {

  $url = $_POST['url'];

  $data = file_get_contents($url);

  echo $data;

  die;
}

echo 'error';
