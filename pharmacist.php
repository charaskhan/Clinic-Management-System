<!DOCTYPE html>
<html>
<head>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>
<table width="1350" height="640" border="1" >
    <tr> <td colspan="2" style="background-color:#102445;"> <h1 style="color: #e6e6e6">CLINIC MANAGEMENT SYSTEM</h1>

            <h3 style="color: #e6e6e6 " align="center">Pharmacist PANEL</h3>
        </td>
    </tr>
    <tr>
        <td style="background-color:#01A1DB;width:50px;height:400px;">
            <table align="center" height="100px" weight="50px">


                <tr>
                    <td>
                        <form action="email.php" align="center">
                            <input type="submit" align="center" value=" Email ">
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
                        <form action="doctorList.php" align="center">
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
                        <form action="../../Desktop/Software%20Engineering%20Project/Calendar/changePass.php" align="center">
                            <input type="submit" align="center" value=" Change Password ">
                        </form>
                    </td>
                </tr>
            </table>
        </td>

        <td><div class="content"><table>
                    <tr>
                        <td>Username:</td>
                        <td><?=$_SESSION["username"]?></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><?=$_SESSION["pass"]?></td>
                    </tr>
                    <tr> <script>
                            fetch_user_login_data();
                            setInterval(function(){
                                fetch_user_login_data();
                            }, 3000);

                            function fetch_user_login_data() {
                                var action = "fetch_data";
                                $.ajax({
                                    url: "authentication.php",
                                    method: "POST",
                                    data: {action: action},
                                    success: function (data) {
                                        $('#user_login_status').html(data);
                                    }
                                });
                            };

                            </tr>

                        </script>
                </table></div></td>


    </tr></table></body></html>