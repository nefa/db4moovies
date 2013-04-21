<?include('header.php');

if(empty($_SESSION['allow'])){header('Location:index.php'); exit;}
if(empty($_POST['genere'])){header('Location:add_movie_type.php?mesaj_check=1'); exit;}

// - procesare synopsis field
	if(empty($_POST['synop'])){
	
		$qexp_22= 'UPDATE movies SET synopsis = "No synopse added for this movie!"  WHERE id ='.$_SESSION['id_film'].' ';
		}else{$qexp_22='UPDATE movies SET synopsis = "'.$_POST['synop'].'" WHERE id = '.$_SESSION['id_film'].' ';}
		mysql_query($qexp_22) or die (mysql_error());
 
// - procesare  in baza
	foreach($_POST['genere'] as $v){ 
	
		$qexp_merge = 'INSERT INTO merge1 VALUES (" ","'.$v.'","'.$_SESSION['id_film'].'")';
		mysql_query($qexp_merge) or die (mysql_error());
	}
	$mesaj_confirmare_editare = " s-a adaugat in baza de date ! <a href='index.php'>back </a>";
	
// - afisare  nume film dupa procesare	
		$select_id_exp = 'SELECT id, title FROM movies WHERE id ='.$_SESSION['id_film'].' ';
		$q_select_id = mysql_query($select_id_exp) or die (mysql_error());
	
	
unset($_SESSION['id_film']);

include('subheader.php');
 ?>
<?while($rowzz = mysql_fetch_array($q_select_id)){?>

	<a href="movie.php?movie_title=<?=$rowzz['id']?>"><?=$rowzz['title']?></a> <?=$mesaj_confirmare_editare?>

 <?}?>
 
<?include('footer.php');?>	