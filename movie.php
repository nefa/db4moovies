<?include('header.php');
//-must be numerical -or hack
if(!intval($_GET['movie_title'])){header('Location:index.php'); exit;}
	
//-if isset user allow delete button
$delete_button = '';
$update_picture ='';

if(isset($_SESSION['allow'])){
	$delete_button ='<a href="delete_movie.php?movie_title='.$_GET['movie_title'].'" class="posted" style="float:right; font-size:10px; color:red;">delete this movie</a>';
	$update_picture='<a href="upload_image.php?movie_title='.$_GET['movie_title'].'"  class="posted" style="float:right; font-size:10px;">update image for this movie</a>';
}	

//-show movie from the database --style="font-size:11; font-weight:bold; color:blue; float:right;"
	$movie_exp= 'SELECT title, synopsis, image_name, user_id FROM movies WHERE id='.$_GET['movie_title'];
						
	$q_movie = mysql_query($movie_exp) or die (mysql_error());

//-joined category form the database
	$movie_cat_exp = 'SELECT categories.type_category, categories.id FROM
				  merge1
					LEFT JOIN categories ON merge1.category_id = categories.id
					LEFT JOIN movies ON merge1.movie_id= movies.id 
						WHERE merge1.movie_id = '.$_GET['movie_title'].' ORDER BY categories.type_category ';

	$q_movie_cat = mysql_query($movie_cat_exp) or die(mysql_error()) ;
	
//also in category.php - use function next time !	
	$uploaded_by_user = 'SELECT users.name 
						FROM users
						INNER JOIN movies
							ON users.id = movies.user_id 
						WHERE movies.id = '.$_GET['movie_title'];

	$q_uploaded_by_user = mysql_query($uploaded_by_user ) or die(mysql_error());							

	

// fetch_row = movie image?
include('subheader.php');
?>

<h6>Movie Title</h6><br>


<?while($rows = mysql_fetch_array($q_movie)){
	
	$img = 'images/movies_cover/' . $rows['image_name'];
	if(file_exists($img) && is_file($img)){
?>

		<img src="<?=$img?>" style="width:120px;"></img>
<?}?>
														<?=$update_picture?>
<hr>



<div>
		<b style="padding-right:10px;"> <?=$rows['title']?></b> 
			<span style="font-size:10px;">uploaded by
				<a><?while($other_rows= mysql_fetch_assoc($q_uploaded_by_user)){echo $other_rows['name'];}?></a></span>
					<br>
					<br />
		
		
			<?$numar = mysql_num_rows($q_movie_cat); $i=0;//echo $numar; ?>
			<?while ($sub_rows = mysql_fetch_array($q_movie_cat)){?>
			<?$i++;?>
		<a href="category.php?categorie=<?=$sub_rows['id']?>" style="font-size:11; "><?=$sub_rows['type_category']?></a> <?if($i<$numar){echo'|';}?>
				
			
			<?}?>	
		<a href="edit_movie_type.php?movie_title=<?=$_GET['movie_title']?>" class="posted" style="float:right; font-size:10px; " >update this movie</a>
			<div><?=$delete_button?></div>
		<hr>
		<br><span style= "font-size:14; text-decoration:underline; color:blue;">Synopsis</span><br/> <span style= "font-size:12; "><?=$rows['synopsis']?></span>	
	<?}?>



</div>


<?include('footer.php');?>	