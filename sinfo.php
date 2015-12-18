<head>
	<title>Site Info</title>
	<link type="text/css" rel="stylesheet" href="style/main.css" >
        <link rel="shortcut icon" href="logo.png">
</head>
<body >
<div class="top">
    <a href="index.php"><img src="images/logo.png" style="margin-left:42%; margin-right:auto; height:100%;"></a>
</div>
<div class="main" style="background-color:#BDBDBD; margin:0 -.6% 0 -.6%; padding-bottom:10%;">
<br>
<div class="container" style="margin:5% 33% 3% 33%; padding:2.5%; background-color:white;">
     <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">
       <img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/88x31.png" />
     </a> 
     <br />
     <span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">Way of life</span> by <a xmlns:cc="http://creativecommons.org/ns#" href="http://evanwarren.ml" property="cc:attributionName" rel="cc:attributionURL">Evan Warren</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Attribution-ShareAlike 4.0 International License</a>.
     <br />Based on a work at <a xmlns:dct="http://purl.org/dc/terms/" href="http://w-o-l.ml" rel="dct:source">http://w-o-l.ml</a>.
</div>
</div>
<div class="bottom">
     <a href="memberpage.php"><h6 style="display:inline;">My Account</h6></a>
     <a href="help.php"><h6 style="display:inline; margin-left:5%;">Help</h6></a>
     <a href="devs.php"><h6 style="display:inline;">Developers</h6></a>
     <a href="sinfo.php"><h6 style="display:inline;">Site Info</h6></a>
     <a href="translate.php"><h6 style="display:inline;">Translate</h6></a>
<div style="font-size:12px; margin-top:.75%;">
	 <?php
	 $load = microtime();
	 echo 'Page generated in ';
	 print ( number_format($load,2));
	 echo 's';
	 ?>
</div>
</div>
</body>