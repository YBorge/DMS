<?php
ini_set('display_errors','0');
include("../../Connection/MyCon.php");
$tbl_name="menu";
$_SESSION['type'];
if($_SESSION['type']=='a')
{
$q = "SELECT * FROM $tbl_name where module!='ax' and menu_id!='14' order by menu_order";
}
elseif($_SESSION['type']=='s')
{
$q = "SELECT * FROM $tbl_name where module in ('s', 'n') order by menu_order";
}
elseif($_SESSION['type']=='n')
{
$q = "SELECT * FROM $tbl_name where module='n' order by menu_order";
}
$r = mysqli_query($conn,$q);
?>
<style>
ul#menu li {
display:inline;
font-size:12px;
padding-left: 30px;
}

#padding
{
padding-top: 0px;
padding-bottom: 0px;
}
</style>
<div id="padding" style="background-color:black">
<ul id="menu">
<li></font><b><font color="white">&nbsp;&nbsp;<?php echo strtoupper($_SESSION['username']);?></font></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
while($data = mysqli_fetch_array($r))
{
$m_action=$data['menu_action'];
$m_caption=$data['menu_caption'];
?>
<li><a href="<?php echo '../../WebPages/'.$m_action; ?>"><font color="white"><?php echo $m_caption; ?></font></a></li>&nbsp;&nbsp;&nbsp;
<?php
} ?>		
</ul>		
</div>