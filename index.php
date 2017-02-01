<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('src/templateFunctions.php');
include_once('src/fileFunctions.php');

define('THEMES_PATH', 'templates/');
define('DATA_PATH', 'data/');


$pages = array(
    'root' => 'Wozu gibt\'s diese Seite?',
    'grazwahl17' => 'Gemeinderatswahl Graz 2017',
    'partei' => 'Landesparteikonto 2015-2017',
    'anlagenv' => 'Anlagenverzeichnis (über 100 €)',
    '2015-klubf' => 'Klubförderungskonto Graz 2015',
    '2015-parteienf' => 'Parteienförderungskonto Graz 2015',
    '2016-klubf' => 'Klubförderungskonto Graz 2016',
    '2016-parteienf' => 'Parteienförderungskonto Graz 2016',
    '2017-klubf' => 'Klubförderungskonto Graz 2017',
    '2017-parteienf' => 'Parteienförderungskonto Graz 2017'
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
} else if ($page === 'grazwahl17') {
    echo loadTemplate('grazwahl17', array('title' => $pages[$page]));
} else if ($page === 'anlagenv') {
    echo loadTemplate('anlagenv', array('title' => $pages[$page]));
} else {
    $data = loadFileData($fileNames[$page]);
    $stats = groupData($data);
    echo loadTemplate('table', array(
        'title' => $pages[$page],
        'fileName' => $fileNames[$page],
        'data' => $data,
        'stats' => $stats
    ));
}
