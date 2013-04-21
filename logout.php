<?include('header.php');
if(!isset( $_SERVER['HTTP_REFERER'])){header('Location:index.php');}
unset($_SESSION['allow']);
header('Location:index.php');



?>