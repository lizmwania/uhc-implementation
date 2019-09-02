<?Php
echo " Maximum allowed file size is : ".ini_get('upload_max_filesize');
echo "<br>";
echo "Maximum input time is : ".ini_get('max_input_time');
echo "<br>";
echo "Maximum execution time is : ".ini_get('max_execution_time');
echo "<br>";
echo "Maximum Post size is : ".ini_get('post_max_size');
?>

<?


?>
<form action='uploadck.php' method=post  >
<input type=submit value='Upload Image'></FORM>