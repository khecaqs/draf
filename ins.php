<?php


include_once('conn/c.php');
//$cae=oci_connect("ae","1","localhost:1521/xe");

// query area


?>


<H2> form input </H2>


<form action="addsvr.php" name="frmAdd" method="POST">
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">Kod ID </div></th>
    <th width="160"> <div align="center">Nama </div></th>
	<th width="97"> <div align="center">DNS</div></th>
    <th width="198"> <div align="center">IP</div></th>
    <th width="97"> <div align="center">Description</div></th>
  </tr>
  <tr>
    <td><div align="center"><input name="txtSvrID" type="text" size="4" maxlength="4" id="txtSvrID"></div></td>
    <td><input name="txtSvrNama" type="text" size="20" maxlength="30"></td>
	<td><div align="center"><input name="txtSvrDNS" type="text" size="20" maxlength="50" id="txtSvrDNS"></div></td>
    <td><input name="txtSvrIP" type="text" size="15" maxlength="15" id="txtServer"></td>
    <td><div align="center"><input name="txtSvrDesc" type="text" size="20" maxlength="50" id="txtSvrDesc"></div></td>
  </tr>
</table>
<input type="submit" name="submit" value="submit">
</form>



<form action="addora.php" name="frmAdd" method="POST">
<table width="100%" border="1">
  <tr>
    <th width="100%"> <div align="center">oracle id </div></th>
    <th width="100%"> <div align="center">password </div></th>
    <th width="100%"> <div align="center">server</div></th>
    <th width="100%"> <div align="center">port</div></th>
    <th width="100%"> <div align="center">SID/Service_name</div></th>
    <th width="100%"> <div align="center">IP</div></th>
  </tr>
  <tr>
    <td><div align="center"><input name="txtOraID" type="text" size="20" maxlength="50" id="txtOraID">
    </div></td>
    <td><input name="txtPass" type="text" size="20" maxlength="50"></td>
    <td width="100%">
	
		<select>
		
			<?php
			$q = 'select svrid,svrname from svrident';
			$st = oci_parse($cae,$q);
			$rs = oci_execute($st);
			
			
			while ($row = oci_fetch_array($st, OCI_ASSOC)) {
			  foreach ($row as $item) { ?>
			  
			  <option value="<?php $item['svrid'] ; ?>"><?php echo $item['svrname'] ; ?> </option>
			<?php  }
			}
			oci_free_statement($st);
			oci_close($cae);

			
			
			?>
		</select>
		<?php //echo var_dump($cae); ?>
	
	
	</td>
    <td><div align="center"><input name="txtPort" type="text" size="4" maxlength="50" id="txtPort">
    </div></td>
    <td align="right"><input name="txtSid" type="text" size="20" maxlength="50" id="txtSid"></td>
    <td align="right"><input name="txtIP" type="text" size="20" maxlength="50" id="txtIP"></td>
  </tr>
</table>
<input type="submit" name="submit" value="submit">
</form>
