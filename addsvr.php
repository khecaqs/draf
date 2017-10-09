<?php
//*** Connection to Oracle ***//
//include_once(conn/c.php);
$cae=oci_connect("ae","1","localhost:1521/xe");

//*** Insert Data Command ***//
$strSQL = "INSERT INTO svrident ";
$strSQL .="(SVRID,SVRNAME,SVRDNS,SVRIP,SVRDESC) ";
$strSQL .="VALUES ";
$strSQL .="('".$_POST["txtSvrID"]."','".$_POST["txtSvrNama"]."','".$_POST["txtSvrDNS"]."','".$_POST["txtSvrIP"]."','".$_POST["txtSvrDesc"]."') ";


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