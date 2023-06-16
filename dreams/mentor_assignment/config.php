<?php

$conn = mysqli_connect('localhost','root','','db_admin');

if (!$conn) {

    echo "Connection failed!";

}