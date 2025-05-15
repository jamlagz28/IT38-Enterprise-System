<?php
require 'dash_classes/admin.class.php';
$admin = new  Adminstrator;
$res = $admin->delete_user($_GET['id']);
if($res){
    header('location:User.php');
}   