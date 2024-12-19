<?php

//delete.php

if(isset($_POST["id"]))
{
    $connect =  new PDO('mysql:host=localhost;dbname=web18_pnako16', 'pnako16', 'epoka123');
    $query = "
 DELETE from events WHERE id=:id
 ";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':id' => $_POST['id']
        )
    );
}

?>
