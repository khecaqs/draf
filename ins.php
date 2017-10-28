<?php


include_once("conn/c.php");
//$cae=oci_connect("ae","1","192.168.90.78:1521/xe");

// query area


?>

<h2> List server dari database </h2>

<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">ID </div></th>
    <th width="160"> <div align="center">Nama </div></th>
	<th width="97"> <div align="center">DNS</div></th>
    <th width="198"> <div align="center">IP</div></th>
    <th width="50"> <div align="center">Kegunaan</div></th>
    <th width="97"> <div align="center">Description</div></th>
  </tr>
  <?php 
    $query = "select s.svrid,s.svrname,s.svrdns,s.svrip,u.svrusagename,s.svrdesc
from SVRIDENT s, SVRUSAGE u
where 
s.SVRUSAGEID = u.SVRUSAGEID ";
	
	
	$stid = oci_parse($cae, $query);
	oci_execute($stid);
		while ($row=oci_fetch_array($stid))
		 {
			echo "<tr>";
			echo 	"<th width=91> <div align=center> <a href='editsvr.php?edit=$row[0]'>$row[0] </a></div></th>";
			echo 	"<th width=160> <div align=center>$row[1] </div></th>";
			echo 	"<th width=97> <div align=center>$row[2]</div></th>";
			echo 	"<th width=198> <div align=center>$row[3]</div></th>";
			echo 	"<th width=300> <div align=center>$row[4]</div></th>";
			echo 	"<th width=300> <div align=center>$row[5]</div></th>";
			
			echo "</tr> ";
		 }
  ?>
</table>

<H2> form input </H2>
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



<form action="add.php" name="frmAddOra" method="POST">
<table width="600" border="1">
  <tr>
    <th width="100%"> <div align="center">Login </div></th>
    <th width="100%"> <div align="center">Password </div></th>
    <th width="100%"> <div align="center">Server</div></th>
    <th width="100%"> <div align="center">SID</div></th>
  </tr>
  <tr>
    <td><div align="center"><input name="txtOraID" type="text" size="20" maxlength="50" id="txtOraID">
    </div></td>
    <td><input name="txtOraPass" type="text" size="20" maxlength="50"></td>
    <td width="100%">
    
    <?php
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
		
	
	 ?>

		<select id="svrid" name="svrid">
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

	
	</td>
    <td align="right"><input name="txtOraSid" type="text" size="20" maxlength="50" id="txtOraSid"></td>
  </tr>
</table>
<input type="submit" name="oraident-submit" value="submit">
</form>
