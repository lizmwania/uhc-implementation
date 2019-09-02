<?Php
$file_upload_flag="true"; // Flag to check conditions
$file_up_size=$_FILES['file_up']['75px'];

echo "File Name:".$_FILES[file_up][name];
echo "<br>File Size:".$_FILES[file_up][size];
echo "<br>File Type:".$_FILES[file_up][type];
echo "<br>File tmp_name:".$_FILES[file_up][tmp_name];
echo "<br>File error:".$_FILES[file_up][error];
echo "<br>---End of uploaded file details---<br><br>";

if ($_FILES[file_up][size]>250000){
$msg=$msg."Your uploaded file size is more than 250KB ";
$msg.=" so please reduce the file size and then upload.<BR>";
$file_upload_flag="false";
}

// allow only jpeg or gif files, remove this if not required //
if (!($_FILES[file_up][type] =="image/jpeg" OR $_FILES[file_up][type] =="image/gif"))
{$msg=$msg."Your uploaded file must be of JPG or GIF. ";
$msg.="Other file types are not allowed<BR>";
$file_upload_flag="false";}

$file_name=$_FILES[file_up][name];
$add="upload/$file_name"; // the path with the file name where the file will be stored

if($file_upload_flag=="true"){ // checking the Flag value 

if(move_uploaded_file ($_FILES[file_up][tmp_name], $add)){
// do your coding here to give a thanks message or any other thing.
$msg="File successfully uploaded";
}else{
echo "Failed to upload file Contact Site admin to fix the problem";
}
}else{
$msg .= " Failed to upload file ";
}
echo " $msg <br><br> <a href=upload.php>Return to File upload </a>";
?>