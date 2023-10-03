<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$html = '';
$dir = './';
$files = scandir($dir, SCANDIR_SORT_ASCENDING);
$files = array_diff($files, array('..', '.', 'config.ini', 'render.php'));

$config = parse_ini_file('config.ini');

//print_r($files);



$html.='

<!DOCTYPE html>
<html>
<head>
<title>'.$config['title'].'</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../styles.css">
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <a href="#home" class="w3-bar-item w3-button">'.$config['home_title'].'</a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="#sect1" class="w3-bar-item w3-button">'.$config['sect1'].'</a>
      <a href="#sect2" class="w3-bar-item w3-button">'.$config['sect2'].'</a>
    </div>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <img class="w3-image" src="../images/'.$config['banner'].'" alt="Banner" width="1500" height="800">
  <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-white w3-hide-small"><span class="w3-padding w3-black w3-opacity-min">'.$config['home_title'].'</span></h1>
  </div>
</header>

<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px">

  <!-- FAME Section -->
  <div class="w3-container w3-padding-32" id="sect1">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">'.$config['sect1'].'</h3>
    <p>
    '.$config['description'].'
    </p>
  </div>

<div class="w3-row-padding w3-grayscale">';
foreach($files as $file)
{
	$ending=".ini";
	if (0 === substr_compare($file, $ending, -strlen($ending)))
	{
		//echo "file: ".$file." ini found<br>";
		$ini = parse_ini_file($file);
		
		$html.='<div class="w3-col l3 m6 w3-margin-bottom">
      <img src="../images/standard.png" alt="Image of'.$ini['name'].'" style="width:100%">
      <h3>'.$ini['name'].'</h3>
      <p class="w3-opacity">'.$ini['text1'].'</p>
      <p>'.$ini['text2'].'</p>
    </div>';
	}
}
$html.='
	</div>
</div>




<!-- Footer -->
<footer class="w3-center w3-black w3-padding-16" id="sect2">
  <p>Powered by <a href="https://www.berliner-ringerverband.de/" title="BRV" target="_blank" class="w3-hover-text-green">Berliner Ringerverband</a></p>
</footer>

</body>
</html>


';

//$ini = parse_ini_file('app.ini');

//echo $ini['db_name'];     // mydatabase
//echo $ini['db_user'];     // myuser
//echo $ini['db_password']; // mypassword
//echo $ini['app_email'];   // mailer@myapp.com

echo $html;


/*
<div id="add-tag" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('add-tag').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">Laura Kühn</h2>
      <p>Ein netter Hinweis kann nie schaden</p>
    <p>
		
      <button type="button" class="w3-button w3-padding-large w3-grey w3-margin-bottom" onclick="document.getElementById('add-tag').style.display='none'">Schließen</button>
    </div>
  </div>
</div>
*/
