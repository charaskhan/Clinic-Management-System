<?php
session_start();


$connect = mysqli_connect("localhost", "pnako16", "epoka123", "web18_pnako16");
$query = "SELECT * FROM receptionist WHERE id ='".$_SESSION["id"] ."'" ;
$result = mysqli_query($connect, $query);


?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>
<table width="1350" height="640" border="1" >
    <tr> <td colspan="2" style="background-color:#102445;"> <h1 style="color: #e6e6e6">CLINIC MANAGEMENT SYSTEM</h1>

            <h3 style="color: #e6e6e6 " align="center">Receptionist PANEL</h3>
        </td>
    </tr>
    <tr>
        <td style="background-color:#01A1DB;width:50px;height:400px;">
            <table align="center" height="100px" weight="50px">
                <tr>
                    <td>
                        <form action="../../Desktop/Software%20Engineering%20Project/Calendar/Calendar.html" align="center"> <input type="submit" align="center" value="Enter an Appointment"> </form>
                    </td>
                </tr>

                <tr>
                    <td>
                        <form action="indexFile.php" align="center">
                            <input type="submit" align="center" value=" Medicine Record ">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form action="logout.php" align="center">
                            <input type="submit" align="center" value=" Log out ">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form action="patientList.php" align="center">
                            <input type="submit" align="center" value="List of Patients">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form action="doctorListforRecep.php" align="center">
                            <input type="submit" align="center" value=" List of Doctors ">
                        </form>
                    </td>
                </tr>

                <tr>
                    <td>
                        <form action="homepage.html" align="center">
                            <input type="submit" align="center" value=" Home ">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form action="changePass.php" align="center">
                            <input type="submit" align="center" value=" Change Password ">
                        </form>
                    </td>
                </tr>
            </table>
        </td>

        <td><table>

                <br /><br />
                <div class="container" style="width:800px;">

                    <h3 align="center">Receptionist Data</h3>
                    <br /><br />
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th width="20%">ID</th>
                                <th width="80%">Name</th>
                            </tr>
                            <?php
                            while($row = mysqli_fetch_array($result))
                            {
                                ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><a href="#" class="hover" id="<?php echo $row["id"]; ?>"><?php echo $row["username"]; ?></a></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>

            </table></td>


    </tr></table></body></html>
<script>
    $(document).ready(function(){
        $('.hover').popover({
            title:fetchData,
            html:true,
            placement:'right'
        });
        function fetchData(){
            var fetch_data = '';
            var element = $(this);
            var id = element.attr("id");
            $.ajax({
                url:"fetchPhoto.php",
                method:"POST",
                async:false,
                data:{id:id},
                success:function(data){
                    fetch_data = data;
                }
            });
            return fetch_data;
        }
    });
</script>