<?php session_start(); include 'participant.php';?>
<!DOCTYPE html>
<html>
    <head>
        <link href="../Bootstrap/dist/css/bootstrap.css" rel="stylesheet">
        <link href="main.css" rel="stylesheet">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Payment Confirmation</title>
    </head>
    <body>
        <?php   
        $participant = unserialize($_SESSION['participant']); 
        $ID=$participant[0]->getID();
        $tName=$participant[0]->getTName();
        ?>
        <form action="controller.php" method="POST" enctype="multipart/form-data" class="form-signin">
            <h1>Payment Confirmation<br/></h1><h4 align='center'><?php echo "for team $tName"; ?></h4>
                <input type="text" name="name" class="form-control" placeholder="Full name"/>
                <input type="email" name="email" class="form-control" placeholder="E-mail"/>
                <input type="text" name="owner" class="form-control" placeholder="Account owner"/>
                <input type="date" name="paymentDate" class="form-control" placeholder="Payment Date"/>
                <input type="file" name="bill" class="form-control"/>
                <?php 
                if(isset($_GET['invalidFile'])){
                    if ($_GET['invalidFile']=='true'){
                        echo "<font color='red'><p align=center>Invalid File!</p></font>";
                    }
                }
                if(isset($_GET['upload'])){
                    if ($_GET['upload']=='failed'){
                        echo "<font color='red'><p align=center>Upload failed! Try again!</p></font>";
                    }
                }
                    ?>
                <br/>
                <input type="hidden" name="act" value="confirm"/>
                <?php echo "<input type='hidden' name='ID' value='$ID'/>"; ?>
                <input type="submit" value="Confirm" class="btn btn-lg btn-primary btn-block"/>           
                
        </form>
        <br/>

    </body>
</html>
