<?include('header.php');

if(empty($_SESSION['allow'])){header('Location:index.php'); exit;}
if(empty($_POST['movie_title'])){header('Location:index.php'); exit;}
if(empty($_POST['genere'])){header('Location:edit_movie_type.php?mesaj_check=1'); exit;}




//- procesare synopsis field for update 
	if(empty($_POST['synop'])){
	
		$qexp_22= 'UPDATE movies SET synopsis = "No synopse added for this movie!"  WHERE id ='.$_POST['movie_title'].'';
	}	else{$qexp_22= 'UPDATE movies SET synopsis = "'.$_POST['synop'].'" WHERE id = '.$_POST['movie_title'].'';
			}
		mysql_query($qexp_22) or die (mysql_error());
	
// - procesare  in baza -- mai intai stergem randurile cu id = 

	$del_exp = 'DELETE FROM merge1 WHERE movie_id='.$_POST['movie_title'].' ';
	$q_del_exp = mysql_query($del_exp) or die(mysql_error());
	
// - inseram din nou id urile si legaturile 	
	
	foreach($_POST['genere'] as $v){
		
		$qexp_merge = 'INSERT INTO merge1 VALUES (" ","'.$v.'","'.$_POST['movie_title'].'")';
		mysql_query($qexp_merge) or die(mysql_error());
	
	}
	$mesaj_confirmare_editare = " s-a modificat in baza de date ! <a href='index.php'>back </a>";

	
// - afisare  nume film dupa procesare	
		$select_id_exp = 'SELECT id, title FROM movies WHERE id ='.$_POST['movie_title'].' ';
		$q_select_id = mysql_query($select_id_exp) or die (mysql_error());
		
		
unset($_POST['movie_title']);

include('subheader.php');
 ?>
<?while($rowzz = mysql_fetch_array($q_select_id)){?>

	<a href="movie.php?movie_title=<?=$rowzz['id']?>"><?=$rowzz['title']?></a> <?=$mesaj_confirmare_editare?>

 <?}?>
 
<?include('footer.php');?>	