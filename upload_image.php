<?include('header.php');

if(empty($_GET['movie_title'])){header('Location:index.php'); exit;}
if(empty($_SESSION['allow'])){header('Location:index.php'); exit;}
if(!isset( $_SERVER['HTTP_REFERER'])){header('Location:index.php');}
	
	$eroare_extensie = '';
    $mesaj_preupload = '';
	$mesaj_if_file_exists ='';
	$mesaj_confirmare_salvare_imagine='';

if(isset($_POST['submit_image'])){
	$extensii_admise = array('jpg','bmp','gif','jpeg');
	$separare_extensie = explode('.',$_FILES['file']['name']);
	$rezultat_extensie = end($separare_extensie);
	$rezultat_final = strtolower($rezultat_extensie);

		
	if (in_array($rezultat_final,$extensii_admise)){
		
		$mesaj_preupload = 'This image was selected for upload: '.$_FILES['file']["name"].'<br /> Type of file: '.$_FILES['file']["type"];
		
		if(file_exists('images/movies_cover'.$_FILES['file']['name'])){
			
			$mesaj_if_file_exists='<span style="color:red">Please change the name of the image file, '.$_FILES['file']["name"].'</span>';
		
		}
		else{ move_uploaded_file ($_FILES["file"]["tmp_name"], 'images/movies_cover/'.$_FILES['file']['name']);
			  $add_pic_to_db_exp = 'UPDATE movies SET image_name="'.$_FILES['file']['name'].'" WHERE id='.$_GET['movie_title'];
			  $q_add_pic_to_db_exp = mysql_query($add_pic_to_db_exp) or die (mysql_error()); 
			  $mesaj_confirmare_salvare_imagine = 'Noua imagine a fost atasata <a href="movie.php?movie_title='.$_GET['movie_title'].'">Back</a>';
					
			}
		
	//continuare
	}
	else{$eroare_extensie=' only pictures pls !';}

}


include('subheader.php');
?>




<div id="interior" style="width:400px; float:left;">

		<form action="" method="POST" enctype="multipart/form-data">
			<div>
				<?=$eroare_extensie?>
				<?=$mesaj_preupload?>
				<?=$mesaj_if_file_exists?>
			</div>
			<label for="FILE" >Upload image for movie ??<??></label>
			<input type="FILE" name="file" id="file" /> | 
			
			<br><br />
			<input type="submit" name="submit_image" value="upload"/>
			<?=$mesaj_confirmare_salvare_imagine?>
			
		</form>
	
</div>


<?include('footer.php');?>