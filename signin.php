<?include('header.php');

if(empty($_SESSION['allow'])){
	
	if(!empty($_POST['submit'])){
		$user = $_POST['username'];
		$pass = $_POST['pass'];
	
	}

	$bad_formfileds = '';
	if (isset($user) && isset($pass)){ 
		
		$authentif_exp = 'SELECT * FROM users WHERE name = "'.$user.'" AND pass = "'.$pass.'" ';
		$q_authentif = mysql_query($authentif_exp) or die (mysql_error());
		$numrows = mysql_num_rows($q_authentif);
		
		if($numrows !=0){
		
			//$userrow = mysql_fetch_array($q_authentif); ??
			$_SESSION['allow'] = 1;
			$_SESSION['username'] = $user;
				//While($user_row = mysql_fetch_row($q_authentif)){$_SESSION['userid'] = $user_row['id'] ;} ??
			
			header('location:index.php');
			
		} else {$bad_formfileds .= "incorect user or password !";}	
	}else {$bad_formfileds .= "completati ambele campuri !";}
?>

<?}else{echo "Already loged in. Wanna <a href='logout.php'>log out</a> ? ";} ?>
<?include('subheader.php');?>


<?=$bad_formfileds?>
	<form  action="" method="post">
	
		name:<input type = "text" name="username" /><br>
		pass:<input type = "password" name="pass" />
		<input type = "submit" name="submit" value="Login" />
	
	</form>




<?include('footer.php');?>	