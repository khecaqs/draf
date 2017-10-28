<?php
	include_once('conn/c.php');
 
	if( isset($_GET['edit']) )
	{
		$svrid = $_GET['edit'];
		$res= mysql_query("SELECT * FROM apple WHERE id='$id'");
		$row= mysql_fetch_array($res);
		
    $query = "select s.svrid,s.svrname,s.svrdns,s.svrip,u.svrusagename,s.svrdesc
			  from SVRIDENT s, SVRUSAGE u
			  where s.svrid ='$svrid'";
			  $stid = oci_parse($cae, $query);
			oci_execute($stid);
			while ($row=oci_fetch_array($stid))
	}
 
	if( isset($_POST['newName']) )
	{
		$newName = $_POST['newName'];
		$id  	 = $_POST['id'];
		$sql     = "UPDATE apple SET name='$newName' WHERE id='$id'";
		$res 	 = mysql_query($sql) 
                                    or die("Could not update".mysql_error());
		echo "<meta http-equiv='refresh' content='0;url=index.php'>";
	}
 
?>
<form action="edit.php" method="POST">
Name: <input type="text" name="newName" value="<?php echo $row[1]; ?/>"><br />
<input type="hidden" name="id" value="<?php echo $row[0]; ?/>">
<input type="submit" value=" Update "/>
</form>

<form action="add.php" name="frmAddSvr" method="POST">
<table width="600" border="1">
  <tr>
    <th width="160"> <div align="center">Nama </div></th>
	<th width="97"> <div align="center">DNS</div></th>
    <th width="198"> <div align="center">IP</div></th>
    <th width="198"> <div align="center">Kegunaan</div></th>
    <th width="97"> <div align="center">Description</div></th>
  </tr>
  <tr>
    <td><input name="txtSvrNama" type="text" size="20" maxlength="30"></td>
	<td><div align="center"><input name="txtSvrDNS" type="text" size="20" maxlength="50" id="txtSvrDNS"></div></td>
    <td><input name="txtSvrIP" type="text" size="15" maxlength="15" id="txtServer"></td>
    <td>
	
		<select name="txtSvrGuna" id="txtSvrGuna">
									<?php
																		
										if (!$cae) {
											$e = oci_error();
											trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
										}

										$query = "select svrusageid,svrusagename from svrusage";
										$stid = oci_parse($cae, $query);
										
										if( $stid === false )
										echo "SQL silap";

										if( !oci_execute($stid) )
										echo "Xleh execute";
										
										while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
											
											$svrusageid = $row[0];
											$svrusagename = $row[1];
										  ?>
										  
										  <option value="<?php echo $svrusageid ; ?>"><?php echo $svrusagename ; ?> </option>
											
										<?php  
										}
										oci_free_statement($stid);
										oci_close($cae);

									?>
						</select>
	
	</td>
	    <td><div align="center"><input name="txtSvrDesc" type="text" size="20" maxlength="50" id="txtSvrDesc"></div></td>
  </tr>
</table>
<input type="submit" name="svrident-submit" value="submit">
</form>