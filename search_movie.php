<?include('header.php');

if (!empty ($_POST['submit'])){

	if(!empty($_POST['search'])){
	
		$movie_search_exp = 'SELECT * FROM movies WHERE title LIKE "%'.$_POST['search'].'%" ';
		$q_search = mysql_query($movie_search_exp) or die(mysql_error());
		$nr = mysql_num_rows($q_search);
		
		
	}else{ echo "cel putin o litera !";}
	
}	




include('subheader.php');
?>


<h2>Search Results</h2><br><hr>


<?if($nr == 0){echo "nu s-a gasit nici un rezultat ! <a href ='index.php' >back</a>";}?>

<?while($search_row  = mysql_fetch_array($q_search)){?>
			
		<p><a href='movie.php?movie_title=<?=$search_row['id']?>'><?=$search_row['title']?></a></p><hr>
		
		
		
<?}?>



<?include('footer.php');?>	