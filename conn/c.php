<?php
$db = "(DESCRIPTION =
    (ADDRESS_LIST =
      (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
    )
    (CONNECT_DATA =
      (SID = XE)
      (SERVER = DEDICATED)
    )
  )" ;


  $chr = oci_connect("hr","1",$db);
  $cae = oci_connect("ae","1",$db);
 // $cae = 'OCI_Logon("ae","1", $db)';
/*  
  If (!$chr)
        echo 'Failed to connect to Oracle';
    else
        echo 'Succesfully connected with Oracle DB HR';
 
oci_close($chr); 


  If (!$cae)
        echo 'Failed to connect to Oracle' ; 
    else
        echo 'Succesfully connected with Oracle DB AE';
 
oci_close($cae); 
*/

?>