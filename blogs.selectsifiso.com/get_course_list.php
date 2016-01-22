<?php
require_once "config.php";
$q = strtolower($_GET["q"]);
$sessq = 0;
if (!$q) return;

//$sql = "select DISTINCT AlbumName as course_name from tblalbum where AlbumName LIKE '%$q%'";
//$sql = "select DISTINCT ArtistName as course_name from tblartist where ArtistName LIKE '%$q%'";
//$sql = "select DISTINCT title as course_name from tbllyrics where title LIKE '%$q%' AND albumID = '".$_GET['group']."'";
$sesssql = "select dropdownval from tbldropdown where sessionid = $sessq";
$sessrsd = mysql_query($sesssql);
while($sessrs = mysql_fetch_array($sessrsd)) {
    $sesscname = $sessrs['dropdownval'];
}

if ($sesscname == "artist")
{
        $sql = "select DISTINCT ArtistName as course_name from tblartist where ArtistName LIKE '%$q%'";
        $rsd = mysql_query($sql);
}
elseif ($sesscname == "album")
{
        $sql = "select DISTINCT AlbumName as course_name from tblalbum where AlbumName LIKE '%$q%'";
        $rsd = mysql_query($sql);
}
else 
{
        $sql = "select DISTINCT title as course_name from tbllyrics where title LIKE '%$q%'";
        $rsd = mysql_query($sql);
};  

while($rs = mysql_fetch_array($rsd)) {
    $cname = $rs['course_name'];
    echo "$cname\n";
}

?>