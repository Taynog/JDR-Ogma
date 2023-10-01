<?php
$debut_url='http://localhost/';
$db = new PDO('mysql:host=localhost;dbname=ogma', "root");
$db->exec("set names utf8");