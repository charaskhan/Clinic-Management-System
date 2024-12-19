<?php
require_once 'file.php';


if(ISSET($_POST['submit'])){
    if($_FILES['upload']['name'] != "") {
        $file = $_FILES['upload'];

        $file_name = $file['name'];
        $file_temp = $file['tmp_name'];
        $name = explode('.', $file_name);
        $path = "images/".$file_name;

       $conn->query("INSERT INTO `file` VALUES('','', '$name[0]', '$path','','attachment','application/octet-stream','')") or die(mysqli_error($conn));

        move_uploaded_file($file_temp, $path);
        header("location:indexFile.php");

    }else{
        echo "<script>alert('Required Field!')</script>";
        echo "<script>window.location='indexFile.php'</script>";
    }
}
?>