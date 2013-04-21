<?
//imputare parametru
function verificare_email ($text){
// initiere expersii folosite (doar pt function -> metoda non regular expression)
$error = '';
$final_message = '';
$pas1 = strpbrk($text,'@');
$points = explode('.', $pas1);
$domain = end($points);
//echo substr($text, 1);

if(strstr($text,'@') == FALSE){$error = "format incorect, trebuie sa contina @";}
elseif (strstr($text,'.') == FALSE){$error = "format incorect, trebuie sa contina (.)";}
elseif(strstr($text,' ')){$error = "nu poate contine spatiu ";}
elseif ($text[0]=='@') {$error = "format incorect: nu poate sa inceapca cu @";}	
elseif (strpbrk(substr($pas1, 1) ,'@')){$error = "format incorect: multiple @";}
elseif (count($points) > 3){$error = "format incorect: prea multe subdomenii";}
elseif (count($domain) < 2 || count($domain) > 3 ){$error = "nu exista acest tip de domeniu";}
else{$error = " totul este cwl !";
	 $final_message = "formatul emailului ".$text.' este corect';	
	}
 return $error ;
}
?>