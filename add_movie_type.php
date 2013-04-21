<?include('header.php');

	if(empty($_SESSION['allow'])){header('Location:index.php'); exit;}
	if(empty($_SESSION['id_film'])){header('Location:add_movie.php'); exit;}
	
	
		$select_id_exp = 'SELECT id, title FROM movies WHERE id ='.$_SESSION['id_film'].' ';
		$q_select_id = mysql_query($select_id_exp) or die (mysql_error());
		
	
	

include('subheader.php');
?>


<div id="interior" style="width:400px; float:left;">
<h3>Editare</h3>

<hr>
<?while ($rowzz = mysql_fetch_array($q_select_id)){?>

	<p>Adaugati detaliile filmului "<span style="color:blue;"><?=$rowzz['title']?></span>" cu id = <?=$rowzz['id']?></p>
<?}?>	
	<form method="post" action="process_movie_type.php">
	<a style="color:blue;">Synopsis</a><br><textarea name="synop" rows="2" cols="40"></textarea></p>
	
	<p style="color:blue;"><a>Genere</a></p>
		<?mysql_data_seek($q_categories, 0);?>
		<?while ($row = mysql_fetch_array($q_categories)){?>
	
			<input type="checkbox" name="genere[]" value="<?=$row['id']?>"/><?=$row['type_category']?> <br/>
		
		<?}?>
	<?if(!empty($_GET['mesaj_check'])){echo "<span style='color:red;'>Selectati cel putin un gen !</span>";}?>	
		
	<br/>	
	<input type="submit" name="submit" value="salveaza!">
	</form>
</div>	


<?include('footer.php');?>	