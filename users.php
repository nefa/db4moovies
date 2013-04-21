<?include('header.php');


$show_users = 'SELECT id, name FROM users ';

$q_show_users = mysql_query($show_users) or die (mysql_error());


include('subheader.php');
?>


<div>
	<h2>Users</h2>
	<?while($user_row = mysql_fetch_array($q_show_users)){?>
	
		<div class="entry">
			<p><a><?=$user_row['name']?></a></p>
		</div>
	<?}?>
</div>

<?include('footer.php');?>