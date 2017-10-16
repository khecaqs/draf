
<?php


include_once("conn/c.php");
//$cae=oci_connect("ae","1","192.168.90.78:1521/xe") or die( "Error connect to database" );
// query area

if (!$cae) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$query = "select svrid,svrname from svrident";
$stid = oci_parse($cae, $query);

if( $stid === false )
	echo "SQL silap";

if( !oci_execute($stid) )
	echo "Xleh execute";

//echo "Record count: " . oci_fetch_all( $stid, $data ) . "<BR>";
//echo "<PRE>";
//var_dump( $data );
?>

<select name="Svrid" id="Svrid">
			<?php
			while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
				
				$svrid = $row[0];
				$svrname = $row[1];
			  ?>
			  
			  <option value="<?php echo $svrid ; ?>"><?php echo $svrname ; ?> </option>
				
			<?php  
			}
			oci_free_statement($stid);
			oci_close($cae);

			?>
</select>
