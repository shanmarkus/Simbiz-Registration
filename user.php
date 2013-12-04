<?php
session_start();
include 'participant.php';
include 'payment.php';
?>
<html>
    <head>
        <link href="../Bootstrap/dist/css/bootstrap.css" rel="stylesheet">
        <link href="main.css" rel="stylesheet">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>User Account</title>
    </head>
    <body>
        <div class="container theme-showcase">
            <?php
            $participant = unserialize($_SESSION['participant']);
            $payment=unserialize($_SESSION['payment']);
            //$refCode=$payment[0]->getRefCode();
            $ID = $participant[0]->getID();
            $tName = $participant[0]->getTName();
            $school = $participant[0]->getSchool();
            $p1Name = $participant[0]->getP1Name();
            $p1Gender = $participant[0]->getP1Gender();
            $p1DOB = $participant[0]->getP1DOB();
            $p1Email = $participant[0]->getP1Email();
            $p1PhoneNo = $participant[0]->getP1PhoneNumber();
            $p2Name = $participant[0]->getP2Name();
            $p2Gender = $participant[0]->getP2Gender();
            $p2DOB = $participant[0]->getP2DOB();
            $p2Email = $participant[0]->getP2Email();
            $p2PhoneNo = $participant[0]->getP2PhoneNumber();
            $status = $participant[0]->getStatus();
            
            if(isset($_GET['newPass'])){
                if($_GET['newPass']=='true'){
                    $pass=$participant[0]->getPassword();
                    echo "<div class='alert alert-success'><b>New password generated!</b><br/>
                   Please store your login details below!<br/>
                   Login ID : $ID<br/>
                   Password : $pass<br/><br/></div>";
                }
            }
            
            if (isset($_GET['register'])) {
                if ($_GET['register']) {
                    $ID = $participant[0]->getID();
                    $pass = $participant[0]->getPassword();

                    echo "
                        <div class='alert alert-success'><b>Registration successful!</b><br/>
                   Please store your login details below!<br/>
                   Login ID : $ID<br/>
                   Password : $pass<br/><br/></div>";
                }
            }
            

            echo "<h1>Team $tName <small>from $school</small></h1>";

            echo "
                <table border=1 class='table table-hover table-bordered'>
                <tr cellhalign='center'>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                </tr>
                <tr cellhalign='center'>
                    <td>$p1Name</td>
                    <td>$p1Gender</td>
                    <td>$p1DOB</td>
                    <td>$p1Email</td>
                    <td>$p1PhoneNo</td>
                </tr>
                <tr cellhalign='center'>
                    <td>$p2Name</td>
                    <td>$p2Gender</td>
                    <td>$p2DOB</td>
                    <td>$p2Email</td>
                    <td>$p2PhoneNo</td>
                </tr>
                </table>
                
            ";
            
            if ($status == 'a') {
                $refCode=$payment[0]->getRefCode();
                echo "<div class='alert alert-success'>Payment Status : <b>Approved</b><br/><br/>";
                echo "Welcome to Simbiz 2014!<br/>
                    Here is your payment reference number : $refCode</div>";
            } else if ($status == 'p') {
                echo "<div class='alert alert-warning'>Payment Status : <b>Pending</b><br/><br/>";
                echo "
                    Your payment confirmation is now being processed.<br/>
                    If you have any questions, please contact our registration team.</div>
                    ";
            } else if ($status == 'n') {
                echo "<div class='alert alert-danger'>Payment Status : <b>Not yet paid<br/><br/></b>";
                echo "
                    Thank you for registering to Simbiz 2014!<br/>
                    Please finish your registration by doing your payment.<br/><br/>
                    If you have done your payment, please confirm your payment <a href=confirm.php>here</a><br/>
                    If you have any questions, please contact our registration team.</div>
                    ";
            }
            
            $_SESSION['participant']=serialize($participant);
            ?>
            <p align="right">
                <a class ="btn btn-primary btn-lg" href="logout.php"">Logout and go back to homepage >></a>
            </p>
            
        </div>
    </body>
</html>