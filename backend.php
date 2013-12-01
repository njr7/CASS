<?php

session_start();

$connect = mysql_connect("sql.njit.edu","njr7","QEXNEA1E") or die("Could not connect to database.");
mysql_select_db("njr7") or die("Could not find database.");

$assignment_xml = $_SESSION['assignment_xml'];

$query = mysql_query("INSERT INTO CASS VALUES ('','$assignment_xml')");

header('Location: view.php');

?>