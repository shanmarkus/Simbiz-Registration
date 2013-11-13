<!DOCTYPE html>
<html>
    <head>
        <link href="../Bootstrap/dist/css/bootstrap.css" rel="stylesheet">
        <link href="main.css" rel="stylesheet">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Login</title>
    </head>
    <body>

        <form action="controller.php" method="POST" class="form-signin">
            <h1>Log In</h2>
                <?php
                if (isset($_GET['login'])) {
                    if ($_GET['login'] == "failed")
                        echo "<font color=red>Invalid ID/Password!</font>";
                } else echo ("<script>console.log('ehe ehe');</script>");
                ?>
                <input type="text" name="ID" class="form-control" placeholder="ID/Username"/>

                <input type="password" name="password" name="password" class="form-control" placeholder="Password"/>

                <br/>
                <input type="hidden" name="act" value="login"/>
                <input type="submit" value="Login" class="btn btn-lg btn-primary btn-block"/>           
                <a href="register.php" class="btn btn-lg btn-success btn-block">Register</a>
                <a href="forgot.php">Forget password?</a>
        </form>
        <br/>

    </body>
</html>
