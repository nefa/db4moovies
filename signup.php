<?include('header.php');

function validate_email($e){
    return (bool)preg_match("`^[a-z0-9!#$%&'*+\/=?^_\`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_\`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$`i", trim($e));
}

$bad_formfileds = '';
if(!empty($_POST['submit'])){
		$user = $_POST['username'];
		$pass = $_POST['pass'];  
		$e = $_POST['email'];
		
		
		if(empty($_POST['username'])){$bad_formfileds = "introduceti numele";}
		elseif(empty($_POST['pass'])){$bad_formfileds = "introduceti parola";}
		elseif(empty($_POST['email'])){$bad_formfileds = "introduceti email";} 
		elseif(validate_email($e) == FALSE){$bad_formfileds = "format email incorect";}
		elseif(!empty($_SESSION['security_code']) && $_SESSION['security_code'] == $_POST['security_code'] && isset($_POST['username']) && isset($_POST['pass']) && isset($_POST['email'])){
				/*Insert you code for processing the form here, e.g emailing the submission, entering it into a database. 
					1) create an activated field in database (default to inactive)
					2) upon registration, the email is sent
					3) populate a link in the email, to include... 
						a) user unique identifier 
						b) activation to active
						so it would look something like this potentially
						[code]
						Welcome __username___. Thanks for registering, please click on the link below to activate your account
						domain.com/register.php?uid=100&activate=1

					4) is your registration script attempt to grab the user by the id
					5) update the activated field to true

					and there u have a new and active user.
				
				*/
				$subiect ="validare cont Movies db" ;

				$to = $_POST['email'];

				$mesaj = 'Va rugam sa confirmati inreistrarea accesand acest link:';
				$from = 'nefa';
				$headers = 'de la '.$from;
				mail($to,$subiect,$mesaj,$headers);
				
									$bad_formfileds = 'Thank you. the notification has beensent to "'.$_POST['email'];
			unset($_SESSION['security_code']);
		} else {
			// Insert your code for showing an error message here

									$bad_formfileds= 'Sorry, you have provided an invalid security code';
		}

		
} else {
}
unset($_SESSION['security_code']);
include('subheader.php');
?>

<div>
	<?=$bad_formfileds?>
	<form method="post" action="<??>">
	<p>Inregistrare gatuita pe site-ul nostru de filme ! | Ai cont deja ? <a href="signin.php">Log in</a></p> 
		
		nume*:<input type="text" name="username" value="<?=isset($_POST['submit'])?$_POST['username'] : ''?>"/><br />
		pass*:<input type="password" name="pass" value="<?=isset($_POST['submit'])?$_POST['pass']: ''?>"/><br />
		email*:<input type="" name="email" value="<?=isset($_POST['submit'])?$_POST['email'] : ''?>"/><br /><br />
		<label for="security_code">Security Code: </label><input id="security_code" name="security_code" type="text" />
		<img src="CaptchaSecurityImages.php?width=100&height=40&characters=5" />
		<br />
		<input type="submit" name="submit" />
	</form>
</div>



<?include('footer.php')?>