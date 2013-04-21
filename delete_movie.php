<?include('header.php');

//trecen GET prin referinta -----

	$mesaj= " ";
	$movie_id = $_GET['movie_title'];
	
	$delete_movie_exp = 'DELETE FROM movies WHERE id = '.$movie_id;
	$q_delete_exp = mysql_query($delete_movie_exp) or die (mysql_error());
	
	$delete_joined_exp = 'DELETE FROM merge1 WHERE movie_id ='.$movie_id;
	$q_delete_joined_exp = mysql_query($delete_joined_exp ) or die(mysql_error());
	
	$mesaj= "filmul s-a shters din baza de date! <a href='index.php' > Back</a>";

include('subheader.php');	
?>

<div>
  <?=$mesaj?>
</div>

<?include('footer.php');?>	