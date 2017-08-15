<?php
session_start();
/**
 * 1.include init file
 * 2.create instance of Bootstrap class
 * 3.url request is SUPERGLOBAL $_GET
 */

require 'init.php';
$db = new Model();
$app = new Bootrstrap($_GET);
$controller = $app->createController();
if($controller){
    $controller->executeMethod();
}