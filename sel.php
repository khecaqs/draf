
<?php


include_once("conn/c.php");

// query area

$query = 'select svrid,svrname from SEVERLIST';
$stid = oci_parse($cae, $query);
oci_execute($stid, OCI_DEFAULT);

echo var_dump ($stid);
?>

<select>
			<?php
			while ($row = oci_fetch_array($stid, OCI_ASSOC)) {
			  foreach ($row as $item) { ?>
			  
			  <option value="<?php echo $item ; ?>"><?php echo $item ; ?> </option>
			<?php  }
			}
			oci_free_statement($stid);
			oci_close($cae);

			?>
</select>