<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="../Bootstrap/dist/css/bootstrap.css" rel="stylesheet">
        <link href="main.css" rel="stylesheet">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Registration</title>
        <script>
            function registerValidation()
            {
                var x = document.forms["registration"]["tName"].value;
                
                if (x == null || x == "")
                {
                    alert("Team name must be filled out");
                    return false;
                }
            }
        </script>
    </head>
    <body>

        <div class="container theme-showcase">
            <h1>Registration Form</h1>

            <form name="registration" action="controller.php" method="POST" class="form-horizontal" onsubmit="return registerValidation()">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Team Info</h3>
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Team Name :</label>
                            <div class="col-sm-5">
                                <input class="form-control" type="text" name="tName"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">School :</label>
                            <div class="col-sm-5">
                                <input class="form-control" type="text" name="school"/>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-6">
                    <h3>Participant 1</h3>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Name :</label>
                        <div class="col-md-7">
                            <input class="form-control" type="text" name="p1Name"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Gender :</label>
                        <div class="col-md-7">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="p1Gender" value="Male"/>Male<br/></label>
                            </div>
                            <div class="radio">    
                                <label>
                                    <input type='radio' name='p1Gender' value='Female'/>Female<br/></label>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">DOB :</label>
                        <div class="col-md-7">
                            <input class="form-control" type="date" name="p1DOB"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">E-mail :</label>
                        <div class="col-md-7">
                            <input class="form-control" type="email" name="p1Email"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Phone Number:</label>
                        <div class="col-md-7">
                            <input class="form-control" type="tel" name="p1PhoneNo"/>
                        </div>
                    </div>



                </div>
                <div class="col-sm-6">
                    <h3>Participant 2</h3>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Name :</label>
                        <div class="col-md-7">
                            <input class="form-control" type="text" name="p2Name"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Gender :</label>
                        <div class="col-md-7">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="p2Gender" value="Male"/>Male<br/></label>
                            </div>
                            <div class="radio">    
                                <label>
                                    <input type='radio' name='p2Gender' value='Female'/>Female<br/></label>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">DOB :</label>
                        <div class="col-md-7">
                            <input class="form-control" type="date" name="p2DOB"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">E-mail :</label>
                        <div class="col-md-7">
                            <input class="form-control" type="email" name="p2Email"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Phone Number:</label>
                        <div class="col-md-7">
                            <input class="form-control" type="tel" name="p2PhoneNo"/>
                        </div>
                    </div>

                </div>
                <input type="hidden" name="act" value="register"/>

                <p align="center"><input class="btn btn-lg btn-primary" type="submit" value="Register >>"/>

            </form>
            <?php
            if (isset($_GET['registration'])) {

                if ($_GET['registration'] == "failed") {
                    echo "<p align='center'><font color=red>Registration failed! Try again.</font>";
                }
            }
            ?>
        </div>
        <p align="center">Got your account? <a href="login.php">Login here</a>.  

    </body>
</html>
