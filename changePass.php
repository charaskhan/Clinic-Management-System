
<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <style type="text/css">
        fieldset {
            width:500px;
            border:5px dashed #CCCCCC;
            margin:0 auto;
            border-radius:5px;
        }

        legend {
            color: blue;
            font-size: 25px;
        }

        dl {
            float: right;
            width: 390px;
        }

        dt {
            width: 180px;
            color: brown;

        }

        dd {
            width:200px;
            float:left;
        }

        dd input {
            width: 200px;
            border: 2px dashed #DDD;
            font-size: 15px;
            text-indent: 5px;
            height: 28px;
        }

        .btn {
            color: #fff;
            background-color: dimgrey;
            height: 38px;
            border: 2px solid #CCC;
            border-radius: 10px;
            float: right;
        }

    </style>
</head>

<body>
<fieldset>
    <legend>Change Password</legend>

    <?php
    session_start();
    $id= $_SESSION["id"];
    $db = new mysqli("localhost", "pnako16", "epoka123", "web18_pnako16");
    if(isset($_POST['re_password']))
    {
//        $_POST['old_pass']=$_SESSION["pass"];

        //echo $_SESSION["pass"];
        $old_pass=$_POST['old_pass'];
        $new_pass=$_POST['new_pass'];
        $new_pass=md5($new_pass);
        $re_pass=$_POST['re_pass'];
        $re_pass=md5($re_pass);
//        $chg_pwd=$db->prepare("select * from patients where id='$id'");
//        $chg_pwd1=$chg_pwd->fetch();
//        $data_pwd=$chg_pwd1['password'];
        if($_SESSION["pass"]==md5($old_pass)){
            if($new_pass==$re_pass){
                $update_pwd="UPDATE patients set password='$re_pass' where id='$id'";
                $stm = $db->prepare($update_pwd)->execute();
                echo "<script>alert('Update Sucessfully'); //window.location='patient.php'</script>";
            }
            else{
                echo "<script>alert('Your new and Retype Password is not match'); window.location='changePass.php'</script>";
            }
        }
        else
        {
            echo "<script>alert('Your old password is wrong'); window.location='changePass.php'</script>";
        }}
    ?>

    <form method="post">
        <dl>
            <dt>
                Old Password
            </dt>
            <dd>
                <input type="password" name="old_pass" placeholder="Old Password..." value="" required />
            </dd>
        </dl>
        <dl>
            <dt>
                New Password
            </dt>
            <dd>
                <input type="password" name="new_pass" placeholder="New Password..." value=""  required />
            </dd>
        </dl>
        <dl>
            <dt>
                Retype New Password
            </dt>
            <dd>
                <input type="password" name="re_pass" placeholder="Retype New Password..." value="" required />
            </dd>
        </dl>

        <p align="center">
            <input type="submit" class="btn" value="Reset Password" name="re_password" />
        </p>

        <input type="button" onclick="location.href='homepage.html';" value="Home Page" />

    </form>



</fieldset>
</body>
</html>
