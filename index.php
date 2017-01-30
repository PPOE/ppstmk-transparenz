<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('src/templateFunctions.php');
include_once('src/fileFunctions.php');

define('THEMES_PATH', 'templates/');
define('DATA_PATH', 'data/');


$pages = array(
    'root' => 'root',
    'partei' => 'Landesparteikonto',
    '2015-klubf' => 'Klubförderungskonto 2015',
    '2015-parteienf' => 'Parteienförderungskonto 2015',
    '2016-klubf' => 'Klubförderungskonto 2016',
    '2016-parteienf' => 'Parteienförderungskonto 2016',
    '2017-klubf' => 'Klubförderungskonto 2017',
    '2017-parteienf' => 'Parteienförderungskonto 2017'
);

$fileNames = array(
    'partei' => DATA_PATH . 'Landeskonto.csv',
    '2015-klubf' => DATA_PATH . '2015-Klubförderung.csv',
    '2015-parteienf' => DATA_PATH . '2015-Parteienförderung.csv',
    '2016-klubf' => DATA_PATH . '2016-Klubförderung.csv',
    '2016-parteienf' => DATA_PATH . '2016-Parteienförderung.csv',
    '2017-klubf' => DATA_PATH . '2017-Klubförderung.csv',
    '2017-parteienf' => DATA_PATH . '2017-Parteienförderung.csv'
);

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'root';
}

if (!array_key_exists($page, $pages)) {
    $page = 'root';
}

if ($page === 'root') {
    echo loadTemplate('root', array('title' => $pages[$page]));
} else {
    $data = loadFileData($fileNames[$page]);
    echo loadTemplate('table', array('title' => $pages[$page], 'data' => $data));
}
