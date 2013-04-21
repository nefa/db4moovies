<?include('header.php');


if(!intval($_GET['categorie'])){header('Location:index.php');}

$q_category_join_exp = 'SELECT movies.title, movies.id, users.name
						FROM merge1
							LEFT JOIN movies ON merge1.movie_id = movies.id
							LEFT JOIN categories ON merge1.category_id = categories.id
							LEFT JOIN users ON merge1.user_id  = users.id
							WHERE merge1.category_id = '.$_GET['categorie'];
	
$q_category_join = mysql_query($q_category_join_exp) or die (mysql_error());

$count_movie_exp = 'SELECT COUNT(movies.title) AS totalfilmecategorie 
						FROM merge1
							LEFT JOIN movies ON merge1.movie_id = movies.id
							LEFT JOIN categories ON merge1.category_id = categories.id
							WHERE merge1.category_id = '.$_GET['categorie'];

$q_count_movie = mysql_query($count_movie_exp) or die(mysql_error());
$count_rezult = mysql_fetch_row($q_count_movie);



//	also in movie.php - use function next time !	


//$q_uploaded_by_user = mysql_query($uploaded_by_user ) or die(mysql_error());	


							
include('subheader.php');
?>
<h2>categories</h2>
	<span style='font-size:10px'>There are <?=$count_rezult[0]?> movies in this category</span>
	<?//=$_GET['categorie']?>
<hr>


	<? while($row = mysql_fetch_array ($q_category_join)) {?> 
	
			 <p><a href="movie.php?movie_title=<?=$row['id']?>" style="color:green"><?=$row['title']?></a>|  
				<span style="float:right; font-size:10px;">uploaded by <a href= 'users.php' ><?=$row['name']?></a>
					<a class="posted" ><??></a></span></p><hr>
		
	
	
	<?}?>
	



<?include('footer.php');?>	
