<?include('header.php');

if(empty($_SESSION['allow'])){header('Location:signin.php'); exit;}
//if(empty($_GET['movie_title'])){header('Location:index.php'); exit;}
if(!isset( $_SERVER['HTTP_REFERER'])){header('Location:index.php');}
//- mai multe detalii pt securizare... 'HTTP_REFERER', 

	


//-select this specific movie	to be updated		
		$select_id_exp = 'SELECT id, title FROM movies WHERE id ='.$_GET['movie_title'];
		$q_select_id = mysql_query($select_id_exp) or die (mysql_error());

//-select synopsis din baza
		$select_synopsis = 'SELECT synopsis FROM movies WHERE id='.$_GET['movie_title'];
		$q_select_synopsis = mysql_query($select_synopsis) or die(mysql_error());

//-select checkboxes din baza
		$select_checkboxes = 'SELECT category_id FROM merge1 WHERE movie_id ='.$_GET['movie_title'];	
		$q_select_checkboxes = mysql_query($select_checkboxes) or die (mysql_error());
			while($checked_box = mysql_fetch_array($q_select_checkboxes)){
				$which_box[] = $checked_box['category_id'];
			} 

		
include('subheader.php');
?>



<div id="interior" style="width:400px; float:left;">
<h3>Editare</h3>

<hr>
<?while ($rowzz = mysql_fetch_array($q_select_id)){?>

	<p>Adaugati detaliile filmului "<span style="color:blue;"><?=$rowzz['title']?></span>" cu id = <?=$rowzz['id']?></p>
<?}?>	
<form method="post" action="process_edit_movie_type.php">

	<a style="color:blue;">Synopsis</a><br><?while($synopsis = mysql_fetch_array($q_select_synopsis)){?><textarea name="synop" rows="2" cols="40"><?=$synopsis['synopsis']?><?}?></textarea></p>
	
	<p style="color:blue;"><a>Genere</a></p>
		<? $reset_pointer = mysql_data_seek($q_categories, 0);?>
		
			
				<?while ($row = mysql_fetch_array($q_categories)){?>
						
				<input type="checkbox" name="genere[]" value="<?=$row['id']?>"<?foreach($which_box as $id_category => $box){if($row['id'] == $box){echo'checked';}else{echo' ';}?><?}?> /><?=$row['type_category']?> <br/>
				
			<?}?>
		
	<?if(!empty($_GET['mesaj_check'])){echo "<span style='color:red;'>Selectati cel putin un gen !</span>";}?>	
		
	<br/>	
	<input type="hidden" name="movie_title" value="<?=$_GET['movie_title']?>">
	<input type="submit" name="submit" value="salveaza!">
</form>
<??>
</div>	



<?include('footer.php');?>	