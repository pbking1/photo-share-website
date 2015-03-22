<?php
include('session.php');
?>
<?php 
mysql_connect("localhost","root","xxxxxx") or die(mysql_error());
mysql_select_db("web_bug_db") or die(mysql_error());  // Let your database will be db1
?>

<h1> UPLOAD IMAGE </h1>
<br><br>

<p>Note: The picture should not be more than 400K</p>
<p>Or change the setting in php.ini to make the maximum size larger</p>
<p>Also the name of the file should not contain space(may cause the failure of the upload)</p>
<form name="myform" method="POST" action="upload_img.php" enctype="multipart/form-data">
<input type='file' name='image'><p></p>
<input type='text' name='des'>
<input type='submit' name='upload'>
</form>
<a href="gallery.php">back</a>

<?php
if(isSet($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
    
	 $k = $_FILES['image']['name'];
	 $j = $_FILES['image']['size'];
	 $n = $_FILES['image']['type'];
	 $t = $_FILES['image']['tmp_name'];
	 
	 $path = "pics/";    // create a folder with name upload  
	 
     $a = array('jpg','png','JPG','PNG','JPEG','GIF','BMP','gif','bmp','jpeg');  // Valid formats 
	 
     $i = explode('/',$n);    // finding the image format from type
	 
     if(in_array($i[1],$a)){
	 
	 $new_name = md5($t).''.time().''.$k;   // New name for the image (which we will save in database table)
	 $des = $_POST['des'];

	if(move_uploaded_file($t,$path.$new_name)){
	
	    if(mysql_query("insert into imagetable (username, image, des, dt) values ('" . $login_session . "', '" . $new_name . "', '" . $des . "', now())")){
	    	//insert into imagetable (username, image, des, dt) values ('pb', 'aaa', 'aaa', now());
			echo "Successfully uploaded <br><br>";
			echo "<img src=pics/".$new_name." height=400px>";
		}
	}
}
else{
	echo "Invalid format";
}
}

?>
