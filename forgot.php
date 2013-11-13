<!DOCTYPE html>
<html>
    <head>
        <link href="../Bootstrap/dist/css/bootstrap.css" rel="stylesheet">
        <link href="main.css" rel="stylesheet">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Password Recovery</title>
    </head>
    <body>
        <form action="controller.php" method="POST" class="form-signin">
            <h4>Verify yourself by entering the two e-mail addresses your team entered in registration</h4>
            <input type="email" name="p1Email" class="form-control" placeholder="E-mail of participant 1"/>

            <input type="email" name="p2Email" class="form-control" placeholder="E-mail of participant 2"/>

            <br/>
            <input type="hidden" name="act" value="forgot"/>
            <input type="submit" value="Submit" class="btn btn-lg btn-primary btn-block"/>  
            <a href="index.php" class="btn btn-lg btn-success btn-block">Go back to homepage</a>
            <?php
            if (isset($_GET['found'])) {

                if ($_GET['found'] == "false") {
                    echo "<p align='center'><font color=red>Incorrect e-mail addresses</font>";
                }
            }
            ?>
            
        </form>
        <br/>

    </body>
</html>
