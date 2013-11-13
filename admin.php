<?php
    session_start();
   // <link href="../Bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    //<link href="main.css" rel="stylesheet">
?>

<html>
    <head>
        <link href="../Bootstrap/dist/css/bootstrap.css" rel="stylesheet">
        <link href="main.css" rel="stylesheet">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Admin</title>
    </head>
    <body> 
        <div class="jumbotron"><?php
    include 'participant.php';
    include 'payment.php';
    echo "<h1>Welcome ADMIN!</h1>";
    
    $data=  unserialize($_SESSION['data']);
    $data2=  unserialize($_SESSION['data2']);
    echo "<form action='controller.php' method='POST'>";
    echo "<table border='1' class='table table-hover table-bordered'>
        <tr>
            <th>ID</th>
            <th>Password</th>
            <th>Team Name</th>
            <th>School</th>
            <th>Name</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>Email</th>
            <th>PhoneNo</th>
            <th>Status</th>
        </tr>";
    
    for($i=0;$i<count($data);$i++){
        $ID=$data[$i]->getID();
        $pass=$data[$i]->getPassword();
        $tName=$data[$i]->getTName();
        $school=$data[$i]->getSchool();
        $p1Name=$data[$i]->getP1Name();
        $p1Gender=$data[$i]->getP1Gender();
        $p1DOB=$data[$i]->getP1DOB();
        $p1Email=$data[$i]->getP1Email();
        $p1PhoneNo=$data[$i]->getP1PhoneNumber();
        $p2Name=$data[$i]->getP2Name();
        $p2Gender=$data[$i]->getP2Gender();
        $p2DOB=$data[$i]->getP2DOB();
        $p2Email=$data[$i]->getP2Email();
        $p2PhoneNo=$data[$i]->getP2PhoneNumber();
        $status=$data[$i]->getStatus();
        
       echo "
            <tr>
                <td>$ID</td>
                <td>$pass</td>
                <td>$tName</td>
                <td>$school</td>
                <td>$p1Name<br/>$p2Name</td>
                <td>$p1Gender<br/>$p2Gender</td>
                <td>$p1DOB<br/>$p2DOB</td>
                <td>$p1Email<br/>$p2Email</td>
                <td>$p1PhoneNo<br/>$p2PhoneNo</td>
                    ";
         
        echo "<td><select name='status$ID'>";
        echo "
            <option value='n' ";
        if($status=='n') echo "selected";
        echo ">Not yet paid</option>
        ";
        echo "
            <option value='p' ";
        if($status=='p') echo "selected";
        echo ">Pending</option>
        ";
        echo "
            <option value='a' ";
        if($status=='a') echo "selected";
        echo ">Approved</option>
        ";
        
        echo "
            </select></td>
            ";
        echo "</tr>";
    }
    echo "</table>";
    
    echo "<br/><br/>Payment Confirmations<br/><br/>";
    echo "<table border=1 class='table table-hover table-bordered'>
        <tr>
            <th>ID</th>
            <th>Reference Code</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Account Owner</th>
            <th>Payment Data</th>
            <th>File Name</th>
        </tr>
    ";
    
    for($i=0;$i<count($data2);$i++){
        $ID=$data2[$i]->getID();
        $refCode=$data2[$i]->getRefCode();
        $fullName=$data2[$i]->getFullName();
        $email=$data2[$i]->getEmail();
        $accOwner=$data2[$i]->getAccOwner();
        $paymentDate=$data2[$i]->getPaymentDate();
        $fileName=$data2[$i]->getFileName();
        echo "
            <tr>
                <td>$ID</td>
                <td>$refCode</td>
                <td>$fullName</td>
                <td>$email</td>
                <td>$accOwner</td>
                <td>$paymentDate</td>
                <td><a href='upload/$fileName'>$fileName</a></td>
            </tr>
            ";
    }
    echo "</table>";
    echo "<input type='hidden' name='act' value='update'/><input class='btn btn-lg btn-primary' type='submit' value='Save'/></form>";
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
        </div></body></html>
