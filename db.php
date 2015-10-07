<?php
/**
 * @Author: Mwai
 * @Date:   2015-10-07 14:52:51
 * @Last Modified by:   Mwai
 * @db.php
 */

function getDB() {
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "braint";
	$dbConn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
	$dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbConn;
}

// user session
session_start();
$session_user_id = $_SESSION['user_id'];
?>