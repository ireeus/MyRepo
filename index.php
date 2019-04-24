<!DOCTYPE html>
<html lang="en">
<head>
  <title>Repo stsyem installation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
.button {
  display: inline-block;
  padding: 2px 13px;
  font-size: 15px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 3px #999;
}
/* Full-width inputs */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}


    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">MyRepo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Installation</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid text">    
  <div class="row content">
    <div class="col-sm-5 ">

<form action="" method="post" enctype="multipart/form-data">  <div style="margin-left: 10px; width: 400px"  > 
                <font color="blue">Repository url: </font><?php $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; 
$actual_link = explode('/index.php',$actual_link);
echo $actual_link[0];?><br><br><font color="green"><b>Enter the following repo details:</b></font><br><br>
                <input type="hidden" value="<?php echo  $actual_link[0]; ?>"readonly  name="repository_domain" >
                Repository id:
                <input type="text" value="myrepo"  name="repo_id" >
                Repository name:
                <input type="text" value="MyRepo"  name="repo_name" > 
                Repository summary:
                <input type="text" value="This is my repo"  name="repo_summary" >
                Repository owner's anme:
                <input type="text" value="Ireneusz Wójcik"  name="repo_provider_name" >
                Repository description:
                <input type="text" value="The first easy to use repository."  name="repo_description" >
                
            <br>
                <input type="submit" class="button" value="Install Repository system" name="submit">
            </form>



<?php 
$repository_domain = $_POST['repository_domain'];
$repo_id= $_POST['repo_id'];
$repo_name=$_POST['repo_name'];
$repo_summary=$_POST['repo_summary'];
$repo_provider_name=$_POST['repo_provider_name'];
$repo_description = $_POST['repo_description'];

//1. creating config file
$config_file = '<?php
//////////////////////////////////Repo config//////////////////////////////////////////////////////////////

//Repository adddress - forward slash on the end
$repository_domain = "'.$repository_domain.'";

// Repo id - it is used as repo packages folder
$repo_id="'.$repo_id.'";

//Repo name displayed in kodi
$repo_name="'.$repo_name.'" ;

//Repo summary
$repo_summary ="'.$repo_summary.'";

// Nname of the repo owner
$repo_provider_name="'.$repo_provider_name.'";

//Description of the repo 
$repo_description = "'.$repo_description.'";

//////////////////////////////////////Do not change below///////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////

//Repository details
$addon_header_1=\'    <addon id="'.$repo_id.'" name="\'.$repo_name.\'" version="\';


$addon_header_2=\'" provider-name="\'.$repo_provider_name.\'">
        <requires>
            <import addon="xbmc.addon" version="12.0.0"/>
        </requires>
        <extension point="xbmc.addon.repository" name="\'.$repo_name.\'">
            <info compressed="false">\'.$repository_domain .\'/_\'.$repo_id.\'/addons.xml</info>
            <checksum>\'.$repository_domain .\'/_\'.$repo_id.\'/addons.xml.md5</checksum>
            <datadir zip="true">\'.$repository_domain .\'/_\'.$repo_id.\'/</datadir>
            <hashes>false</hashes>
        </extension>
        <extension point="xbmc.addon.metadata">
            <summary>\'.$repo_summary.\'</summary>
            <description>\'.$repo_description.\'</description>
            <platform>all</platform>
    </extension>
</addon>\';
/////////////////////////////////////////////////////
';
$info_file = '<p> <h2>'.$repo_name.'</h2>
<p>'.$repo_summary.'</p>
<p>'.$repo_description.'</p>

<p></p>
<p></p>';
if (isset($_POST['repository_domain']) and $_POST['repository_domain']!=='' and isset($_POST['repository_domain']) and $_POST['repository_domain']!==''){
//1.1 - Creating config file
$my_ver = 'config.php';
$handle = fopen($my_ver, 'w') or die('<br><br>f11110-You don\'t have suficient permission to write in the directory');
fwrite($handle, $config_file);

//2.0 unziping folders
 $zip = new ZipArchive;
        if ($zip->open('lib.zip') == TRUE) {
            $zip->extractTo('.');
            $zip->close();
            chmod("./uploads/", 0775);
}

//2.1 unziping folders for packages storage
 $zip = new ZipArchive;
        if ($zip->open('lib_repo.zip') == TRUE) {
            $zip->extractTo('./_'.$repo_id);
            $zip->close();
            chmod('./_'.$repo_id, 0775);
}
//3.1 - Creating repo info file
mkdir('_'.$repo_id.'/'.$repo_id, 0775);
mkdir(''.$repo_id, 0775);

$my_ver = '_'.$repo_id.'/info.html';
$handle = fopen($my_ver, 'w') or die('f11111');
fwrite($handle, $info_file);
$repoversion = file_get_contents($repository_domain.'/_'.$repo_id.'/zip.php');

unlink('lib.zip');
unlink('lib_repo.zip');
header("Refresh:0; url=registration.php");

}

?>
    </div>
</div>
</div><br><br><br><br><br>
<footer class="container-fluid text-center">
  <p>MyRepo - installer</p>
</footer>

</body>
</html>

