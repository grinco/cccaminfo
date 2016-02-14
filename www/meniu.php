<HTML><HEAD><LINK HREF="cccam.css" REL="Stylesheet" TYPE="text/css"></HEAD><BODY>
<?php
	include "update.php";

	
	$cccam_version = "";
	if (file_exists($caminfo_file))
	{
		$caminfo_data = file ($caminfo_file);
	
		if (count($caminfo_data)>0)
		foreach ($caminfo_data as $currentline) 
		{
			$liniesplit = explode("H2>", $currentline);
			foreach ($liniesplit as $linie) 
			{
				if (strstr($linie,"Welcome to CCcam")) 
				{
					$cccam_version = $linie;
				}
			}
		}
	}

?>

<script type="text/javascript" language="Javascript"> 
function toggleDisplay(nod) { 
if( document.getElementById(nod).style.display == "none" ) {
    document.getElementById(nod).style.display = "block"; 
  } else { 
    document.getElementById(nod).style.display = "none"; }
}
function NewProfile()
{
	location.href="meniu.php?profile=new";
}
function DeleteProfile(server,port,user,pass)
{
	var answer = confirm("Are you sure?");
	if (answer)
	{
		location.href="configserver.php?profile=delete&server=" + server + "&port=" + port + "&user=" + user + "&pass=" + pass;
	}
}
</script>

<BR>
<font face='Arial' size=4 color=white>
<?php
$pagina = basename($pagina);

if ($cccam_version != "")
{
	echo "<b>".$cccam_version."b>";
}

$idtable = "profiles";

echo "( <font size=3 color=gray><SPAN onclick='toggleDisplay(\"".$idtable."\");' style='cursor:hand;'>";
if ($cccam_host != "")
	echo $cccam_host;
else
	echo "CCcamInfoPHP";
echo "</SPAN></font> )";


?>
</font>



<font size="1" color="#494949">&nbsp;&nbsp;<B>
<?php echo $versiune
?>
</B>&nbsp; BY TOOGOODY&nbsp;&nbsp;</font>
<?php
if ($password!=""){?>
<A HREF="<?=$_SERVER['PHP_SELF']?>?action=LOGOUT"><SPAN class="meniuLogOut"> (Sign Out)</SPAN></A>
<?php } ?>
<BR><BR>
<?php
	if ($cccam_host == "" && $_GET['profile'] != "new")
	{
		include "getconfigserver.php";
		exit;
	}

	
	echo "<table id=\"".$idtable."\" style='display:none;' border=0 cellpadding=0 cellspacing=0>";
	echo "<tr><td>Select active profile or click <input type='button' name='NewProfile' value='New' style='width:40px;height:18px;font-family: Tahoma;font-size : 9px' onclick=\"NewProfile()\"</A> to define new server:</td></tr>";
	
	echo "<tr>";
	echo "<td>";
	
	foreach ($CCCamWebInfo as $cccam_host_profil => $cccam_profil_hostname) 
	{
		$ccamhost_path        = $work_path.$cccam_profil_hostname[0]."/";
   	$ccamhost_update_log  = $ccamhost_path."update.log";
   		
		$ccamhost_TIMP_Update= "";
      if (file_exists($ccamhost_update_log)) 
   	{
      	$ccamhost_update_log_data = file ($ccamhost_update_log);
      	$ccamhost_timp_lastupdate = $ccamhost_update_log_data[0];
      	$diff = time() - $ccamhost_timp_lastupdate;
      	$ccamhost_TIMP_Update = "Last update : ".get_formatted_timediff($ccamhost_timp_lastupdate)." ago";
      	if ( $diff > (3* INT_DAY))
      		$ccamhost_TIMP_Update = "<FONT color=red>".$ccamhost_TIMP_Update."</FONT>";
      	if ( $diff < (12* INT_HOUR))
      		$ccamhost_TIMP_Update = "<FONT color=green>".$ccamhost_TIMP_Update."</FONT>";
   	}
   	
	$server = $cccam_profil_hostname[0];
	$port = $cccam_profil_hostname[1];
	$user = $cccam_profil_hostname[2];
	$pass = $cccam_profil_hostname[3];
   	
	if ($cccam_host == $cccam_profil_hostname[0])
	{
		$linkprofil = "<A class=\"tabel_param\" HREF=".$pagina."?setProfil=".$cccam_host_profil.">"; 
	   	$linkprofil = $linkprofil."Current&nbsp;&nbsp;"."<FONT color=red>(".$cccam_host_profil.") ".$cccam_profil_hostname[0]."</FONT></A>"; 
   	}
	else
	{
		$linkprofil = "<input type='button' name='DeleteProfile' value='Delete' style='width:50px;height:18px;font-family: Tahoma;font-size : 9px' onclick=\"DeleteProfile('$server','$port','$user','$pass')\"</A><A class=\"server_profile\" HREF=".$pagina."?setProfil=".$cccam_host_profil.">"; 
		$linkprofil = $linkprofil."(".$cccam_host_profil.") ".$cccam_profil_hostname[0]."</A>"; 
	}

   	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$linkprofil;   
   	echo "&nbsp;";
   	echo $ccamhost_TIMP_Update;   
   	echo "<BR>";

	}

	echo "</td>";
	echo "</tr>";
	
	echo "<tr><td><BR></td></tr>";
	
	echo "</table>";
?>


<input class="normalbutton" type="button" value="Home" onclick="parent.location='index.php'">
<input class="normalbutton" type="button" value="Clients" onclick="parent.location='clientstats.php'">
<input class="normalbutton" type="button" value="Servers" onclick="parent.location='serverstats.php'">
<input class="normalbutton" type="button" value="Pairs" onclick="parent.location='pairstats.php'">
<input class="normalbutton" type="button" value="Shares" onclick="parent.location='nodestats.php'">
<input class="normalbutton" type="button" value="Providers" onclick="parent.location='providerstats.php'">
<input class="normalbutton" type="button" value="Entitlements" onclick="parent.location='entitlementstats.php'">
<!--
&nbsp;&nbsp;
<input class="updatebutton" type="button" value="Profile" onclick="parent.location='profiles.php'">
-->
<?php
if ($update_from_button)
{
	echo "&nbsp;&nbsp;";
	echo "<input class=\"updatebutton\" type=\"button\" value=\"Update\" ";

	if ($sort!="")
		echo "onclick=\"parent.location='index.php?forceupdate=1&page=".$pagina."&sort=".$sort."'\">";
	else
		echo "onclick=\"parent.location='index.php?forceupdate=1&page=".$pagina."'\">";
		
}

	$idtable = "timpupdate";
	echo "<SPAN onclick='toggleDisplay(\"".$idtable."\");' style='cursor:hand;'> ".$TIMP_Update."</SPAN>";
	//echo " ".$TIMP_Update;

	echo "<table id=\"".$idtable."\" style='display:none;' border=0 cellpadding=0 cellspacing=0>";
	echo "<tr>";
		echo "<BR>";
		echo "<td><B>Update times :</B><BR>";
		if (file_exists($update_log)) 
   	{
      	$update_log_data = file ($update_log);
			if (isset($update_log_data))
			foreach ($update_log_data as $update_log) 
			{
				if ($update_log != $update_log_data[0]) 
				{
					list($text1,$text2) = explode(":", $update_log);
					format1($text1,$text2);
				}
			}
		}
		echo "</td>";
	echo "</table>";

if ($server_offline == true)
{
	echo "<BR><BR>";
	
	if ($_GET['profile'] == "new")
	{
		include "getconfigserver.php";
		exit;
	}
	else
	echo $update_failed;
	
	if ($cccam_host == "")
		include "getconfigserver.php";
}
else
{
	UpdateHitProviders();
}

unset($update_log_data);
?>

<BR><BR>
