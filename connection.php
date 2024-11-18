<?php //Database connection string
$conn = new mysqli("localhost", "root", "", "db_usermgmt");
if(!$conn) die("Oops! database connection is failed.");
