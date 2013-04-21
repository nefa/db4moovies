<?include('header.php');

if (empty($_SESSION['allow'])){header('Location:index.php'); exit;}


 if(!empty($_POST['submit'])){

		if (!empty($_POST['nume_film'])){ 
		
		
			$insert_movie_exp= 'INSERT INTO movies VALUES (""," '.$_POST['nume_film'].' ","")';
			$q_insert_movie = mysql_query($insert_movie_exp) or die (mysql_error());
			$id_film = mysql_insert_id();		// se inregistreaza ultimul id inserat in baza de date ...
			$_SESSION['id_film'] = $id_film;
		
		
		
	header('Location:add_movie_type.php');
	exit; 
	
		} else{echo "<p style='color:red'>completati cu cel putin un caracter</p>";}
 }
include('subheader.php');	
?>


<h3>Adauga un film</h3><hr><?=$_SESSION['userid']?>
<form method="post" >
	Title:<br>
	<input type="text" name="nume_film" />
	
	
	<input type="submit" name="submit" value="baga" />
	
</form>
<?=$_SESSION['userid']?>

</html>








<?include('footer.php');?>	