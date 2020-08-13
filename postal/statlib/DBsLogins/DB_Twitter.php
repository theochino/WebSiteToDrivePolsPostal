<?php
$databasename = "Twitter";
$databaseserver = "data.theochino.us";
$databaseuser = "usracct";
$databasepassword = "usracct";
$databaseport = "3306";

$DBErrorsFilename = "/tmp/DBErrors_" . $_SERVER["SERVER_ADDR"] . ".txt";

$sslkeys["srvkey"] = "";
$sslkeys["srvcert"] = "";
$sslkeys["srvca"] = "";

#$sslkeys["srvkey"] = $_SERVER["DOCUMENT_ROOT"] . "/../../configuration/sslcerts/db/client-devmysql-key.pem";
#$sslkeys["srvcert"] = $_SERVER["DOCUMENT_ROOT"] . "/../../configuration/sslcerts/db/client-devmysql-cert.pem";
#$sslkeys["srvca"] = $_SERVER["DOCUMENT_ROOT"] . "/../../configuration/sslcerts/db/ca-devmysql-cert.pem";
?>
