<?
	$count_exp = 'SELECT COUNT(title) AS totalfilme FROM movies ';
	$q_count = mysql_query($count_exp) or die (mysql_error());
	$rezult_movies = mysql_fetch_row($q_count);


	
	$c2_exp = 'SELECT COUNT(synopsis) AS totalsynopsis FROM movies ';
	$q_c2 = mysql_query($c2_exp) or die (mysql_error());
	$rezult_synopsis = mysql_fetch_row($q_c2); /**/

	
		$q_categories_exp = 'SELECT type_category, id FROM categories ORDER BY type_category ';
		$q_categories = mysql_query ($q_categories_exp ) or die (mysql_error());
			while($categories_row = mysql_fetch_array($q_categories)){$matrice_categories[] = $categories_row;}
			
	$uploaded_by_user_exp = '';		
			
			
	
	$subscribed_in_subheader ='';
	$standard_mess ='To add a new movie please go to... ';
	
	if(isset($_SESSION['allow'])){
	
		$subscribed_in_subheader .= 'Signed id as <b>'.$_SESSION['username'].'</b> | <a href="logout.php">Logout</a><br /> ';
		
		$standard_mess .= '<a href="add_movie.php"> Add new movie ! </a>';
	}
	
	else {$standard_mess.= '<a href="signin.php">"Sign in !"</a> | <a href="signup.php">sign up!</a> ';}
	
	
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Oil Painting 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20120825

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Movies DB</title>
<link href="http://fonts.googleapis.com/css?family=Arvo" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Coda:400,800" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="menu-wrapper">
	<div id="menu">
		<ul>
			<li class="current_page_item"><a href="index.php" style="">LOGO</a></li>
			<li><a href="#">Movies</a></li>
			<li><a href="#">Blog</a></li>
			<li><a href="users.php">users</a></li>
			
			<li><a href="#">Contact</a></li>
		</ul>			
			

	</div>
	<!-- end #menu --> 
</div>
<div id="header-wrapper">
	<!--<div id="header">
		<div id="logo">
			<h1><a href="#">Oil Painting</a></h1>
			<p>Template design by <a href="http://www.freecsstemplates.org">FCT</a></p>
		</div>
	</div>-->
</div>
<div style="float:left; ">

	<span style='font-size:10px' ><?=$subscribed_in_subheader?></span><br>
	<span style='font-size:10px' ><?=$standard_mess?> ||  There are a total of  <?=$rezult_movies[0]?> movies in the database and <?=$rezult_synopsis[0]?> completed synopsis
			
		<br>
		Today <a><?=date("d-m-Y",time())?></a>
	</span>
</div>
<!-- end #header -->
<div id="banner"><img src="images/pics01.jpg" width="1000" height="200" alt="" /></div>
<div id="wrapper">
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<div class="post">
<!-- end #nefa's subheader -->					