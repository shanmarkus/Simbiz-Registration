<?php

include 'participant.php';
session_start();
$success = unserialize($_SESSION['success']);
$data = unserialize($_SESSION['data']);
for ($i = 0; $i < count($success); $i++) {
    $ID = $data[$i]->getID();
    if ($success[$i]) {
        echo "<link href='../Bootstrap/dist/css/bootstrap.css' rel='stylesheet'>
                                <link href='main.css' rel='stylesheet'>";
        echo "<div class='alert alert-success'>Data has been saved for ID: $ID!<br/></div>";
    } else {
        echo "<link href='../Bootstrap/dist/css/bootstrap.css' rel='stylesheet'>
                            <link href='main.css' rel='stylesheet'>";
        echo "<div class='alert alert-warning'>Data for ID $ID failed to be saved. Try again next time!<br/></div>";
    }
    
}
echo "<a class ='btn btn-primary btn-lg' href='logout.php'>Logout and go back to home</a>.";
?>
