<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <title>Mid Project</title>

    <script>
        function checkEmail() {
            if (document.getElementById("email").value == "") {
                document.getElementById("emailErr").innerHTML = "*The Email field is required.";
                document.getElementById("email").style.borderColor = "red";
            } else {
                document.getElementById("emailErr").innerHTML = "";
                document.getElementById("email").style.borderColor = "purple";
            }
        }

        function checkPass() {
            if (document.getElementById("pass").value == "") {
                document.getElementById("passErr").innerHTML = "*The Password field is required.";
                document.getElementById("pass").style.borderColor = "red";
            } else {
                document.getElementById("passErr").innerHTML = "";
                document.getElementById("pass").style.borderColor = "purple";
            }
        }
    </script>
   
</head>

<body>
    <?php
    include 'Header.php';
    require_once 'Model/db_connect.php';
    ?>

    <?php

    session_start();

    $msg = '';

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $conn = db_conn();
        $selectQuery = "SELECT * FROM `Plane_manager` where tm_email = ?";

        try {
            $stmt = $conn->prepare($selectQuery);
            $stmt->execute([$_POST['email']]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row["tm_email"] == $_POST['email'] && $row["tm_password"] == $_POST['password']) {
            $_SESSION['email'] = $row["tm_email"];
            $_SESSION['password'] = $row["tm_password"];

            if (!empty($_POST['rememberMe'])) {
                setcookie("email", $_POST['email'], time() + 60);
                setcookie("password", $_POST['password'], time() + 60);
                echo "Cookie set successfully";
            } else {
                setcookie("email", "");
                setcookie("password", "");
                echo "Cookie not set";
            }

            header("location:Plane_Manager_Home.php");
        } else {
            $msg = "Username or password invalid";
        }
    }

    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <fieldset>
            <legend><b>LOGIN</b></legend>
            Email: <input type="text" name="email" id="email" onblur="validEmail()" onkeyup="validEmail()" value="<?php if (isset($_COOKIE['email'])) {
                                                                                                                    echo $_COOKIE['email'];
                                                                                                                } ?>">
                <span class="red">
                    <p id="emailErr"></p>
                </span>
                <br>

            Password:  <input type="password" name="password" id="pass" onblur="validPass()" onkeyup="validPass()" value="<?php if (isset($_COOKIE['password'])) {
                                                                                                                        echo $_COOKIE['password'];
                                                                                                                    } ?>">
                <span class="red">
                    <p id="passErr"></p>
                </span>
                <br>
            <input type="checkbox" onclick="showPass()"> Show password <br>

            <span class="error"> <?php echo $msg; ?></span><br>
            <hr>

            <input type="checkbox" name="rememberMe" value="rememberMe">
            <label>Remember me for a mintute</label><br><br>

            <input type="submit" name="submit" value="Login">
            <a href="Forget_Password.php">Forgot password?</a>
        </fieldset>
        <script>
            function showPass() {
                var x = document.getElementById("pass");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
    </form>

    <?php include 'Footer.php'; ?>

</body>

</html>