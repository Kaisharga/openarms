<?php

INCLUDE("header.php");
?>
<script>
function customReset()
{
    document.getElementById("search").value = "";
		document.getElementById("page").value = "1";
}
function incrementPage()
{
	let pageNum = document.getElementById("page").value;
	document.getElementById("page").value = parseInt(pageNum) + 1;
}
function decrementPage()
{
	let pageNum = parseInt(document.getElementById("page").value);
	pageNum = pageNum > 1 ? pageNum - 1 : pageNum;
	document.getElementById("page").value = pageNum;
}
function resetPage()
{
	document.getElementById("page").value = 1;
}
</script>
<div>
<table>
<tr>
	<td>
		<h2 valign=top>MEMBERS</h2>
	</td>
</tr>
<form action=index.php method=GET style='display:inline-block'>
<tr>
	<td>
			<input type="text" id='search' name='search' style='width:200px;' autofocus value="<?php echo (!empty($_GET['search'])) ? htmlspecialchars($_GET['search']) : ''; ?>" />
			<button type="submit" onclick="resetPage();">Search</button>
			<button type="submit" onclick="customReset();">Clear</button>
	</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
	<td>
		<input type='hidden' id='page' name='page' value="<?php echo (!empty($_GET['page'])) ? $_GET['page'] : '1'; ?>" />
		<button type='submit' onclick='decrementPage();'>&lt;&lt;</button>
		Page: <?php echo (!empty($_GET['page'])) ? $_GET['page'] : '1'; ?>
		<button type='submit' onclick='incrementPage();'>&gt;&gt;</button>
	</td>
</tr>
</form>
</table>	
</div>
<br>
<?php

INCLUDE("member_list.php");
INCLUDE("footer.php");
  
?> 