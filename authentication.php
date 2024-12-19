<?php
session_start();

$usnameErr = $passErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"])) {
        $connection = mysqli_connect("localhost", "pnako16", "epoka123", "web18_pnako16");

        if (empty($_POST["username"])) {
            $usnameErr = "Username is required!";
        } else {
            $username = mysqli_real_escape_string($connection, $_POST["username"]);
            $_SESSION["username"] = $username;
            $usnameErr = "";
        }


        if (empty($_POST["password"])) {
            $passErr = "Password is required!";
        } else {
            $pass = $_POST["password"];
            $pass = md5($pass);
            $passErr = "";
            $query = mysqli_query($connection, "select * from patients where username ='$username'and password='$pass'");
            if (mysqli_num_rows($query) == 1 && count($_POST) > 0) {
                $row = mysqli_fetch_assoc($query);
                $_SESSION["id"] = $row["id"];
                $_SESSION["image"] = $row['img_dir'];
                $_SESSION["pass"] = $pass;
                if ($row["level"] == 0 && $_POST["captcha_code"] == $_SESSION["captcha_code"]) {
                    header("Location: patient.php"); // Receptionist
                } else {
                    $passErr = "Incorrect username or password";
                }
            }

        }
        if(isset($_SESSION['id'])){
            if($_SESSION['level']==0) {
                (header("location:patient.php"));
                }
        }

    }
}
?>


<html>
<head>
    <title>LOGIN</title>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link rel = "stylesheet" type = "text/css" href = "style.css" />
    <style>
        #error{
            text-decoration: underline;
            color: lightcoral;
            margin-top: 2px;
            margin-left: 5px;
        }
    </style>


</head>
<body>

<div class = login>

    <div  = "loginForm">
        <form action = "<?php echo $_SERVER["PHP_SELF"]?>" method = "POST">
           <label for="username">
                <i class="fas fa-user"></i>
            </label>
            <input name = "username" type = "text" placeholder="Username"><br>

            <span id = "error"><?php echo $usnameErr;?></span><br>

            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input  name = "password" type = "password" placeholder="Password"><br>

            <span id = "error"><?php echo $passErr;?></span><br>

            <input id = "loginBtn" type = "submit" name = "login" value = "Log In">
            <input name="captcha_code" type="text"><br>
                <img src="captcha.php" />




        </form>





    </div>
</div>
</body>
</html>