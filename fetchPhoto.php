<?php
//fetch.php
if(isset($_POST["id"]))
{
    $output = '';
    $connect = mysqli_connect("localhost", "pnako16", "epoka123", "web18_pnako16");
    $query = "SELECT * FROM patients WHERE id='".$_POST["id"]."'";
    $result = mysqli_query($connect, $query);
    while($row = mysqli_fetch_array($result))
    {
        $output = '  
                <p><img src="'.($row['img_dir']).'" class="img-responsive img-thumbnail" /></p>  
                <p><label>Name : '.$row['FirstName'].'</label></p>  
                <p><label>Surname : </label><br />'.$row['LastName'].'</p>  
                <p><label>Address : </label><br />'.$row['home_adress'].'</p>  
                <p><label>Gender : </label>'.$row['gender'].'</p>  
               
                
                
           ';
    }
    echo $output;
}
?>