<?php
//*** Connection to Oracle ***//
include_once("conn/c.php");
//$cae=oci_connect("ae","1","192.168.90.78:1521/xe");

$svrid = $_POST["svrid"];

echo $svrid;
//*** Insert Data Command ***//
$strSQL = "INSERT INTO oraident ";
$strSQL .="(SVRID,ORAID,ORAPASS,SID) ";
$strSQL .="VALUES ";
$strSQL .="('$svrid','".$_POST["txtOraID"]."', '".$_POST["txtOraPass"]."','".$_POST["txtOraSid"]."') ";


//*** Define Variable $objParse and $objExecute ***//
$objParse = oci_parse($cae, $strSQL);
$objExecute = oci_execute($objParse, OCI_DEFAULT);


var_dump ($strSQL);

if($objExecute)
{
	oci_commit($cae); //*** Commit Transaction ***//
	echo "Save completed.";
}
else
{
	oci_rollback($cae); //*** RollBack Transaction ***//
	$m = oci_error($objParse); 
	echo "Error Save [".$m['message']."]";
}

//*** Close Connection to Oracle ***//
oci_close($cae);
?>