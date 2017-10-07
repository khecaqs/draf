<?php
include_once("conn/c.php");

// query area

$query = 'select table_name from user_tables';
$stid = oci_parse($chr, $query);
oci_execute($stid, OCI_DEFAULT);


?>

<html>
<body>

<H2> select box </H2>

Select tname from user table : 
<select>
<?php
while ($row = oci_fetch_array($stid, OCI_ASSOC)) {
  foreach ($row as $item) { ?>
  
  <option value="<?php echo $item ; ?>"><?php echo $item ; ?> </option>
<?php  }
}
oci_free_statement($stid);
oci_close($chr);

?>
</select>






</body>
</html>