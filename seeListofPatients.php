<?php
/**
 * Created by PhpStorm.
 * User: Nada Nako
 * Date: 23/05/2019
 * Time: 19:51
 */

$db=mysqli_connect("local_host", "pnako16" , "epoka123" , "web18_pnako16
");
$query = "SELECT * FROM apt WHERE dct_id='$aptid'";
$doctor->viewApt($query);
$apts=$this->db->prepare($query);
$apts -> execute();

if($apts->rowCount() > 0)
{
    while($row=$apts->fetch(PDO::FETCH_ASSOC))
    {
        ?>
        <div class="modal-body">
            <table class="table table-bordered table-responsive">
                <tbody>
                <tr>
                    <td><?php echo $row['ptnt_fname']; ?></td>
                    <td><?php echo $row['ptnt_ds']; ?></td>
                    <td><?php echo $row['apt_day']; ?></td>
                    <td><?php echo $row['apt_time']; ?></td>
                    <td><button type="button" name="confirm" class="btn btn-info btn-sm"></button></td>
                </tr>
                </tbody>
            </table>
        </div>
        <?php
    }
    ?>
    <?php
}
?>