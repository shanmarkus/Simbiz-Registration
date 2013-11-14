<?php

session_start();
include 'participantDAO.php';
include 'paymentDAO.php';
$act = $_POST['act'];
$ctrl = new Controller();
$ctrl->run($act);

class Controller {

    private $partDAO;
    private $payDAO;

    function Controller() {
        $this->partDAO = new participantDAO();
        $this->payDAO = new paymentDAO();
    }

    function admin() {
        $ID = $_POST['ID'];
        $pass = $_POST['password'];
        if ($ID == 'SB000' && $pass == $this->partDAO->retrieveAdminPass()) {
            $result = $this->partDAO->retrieveAllData();
            $result2 = $this->payDAO->retrieveAllData();
            $_SESSION['data'] = serialize($result);
            $_SESSION['data2'] = serialize($result2);
            header("Location: admin.php");
        }
        else
            header('Location: loginAdmin.php?login=failed');
    }

    function login() {
        $ID = addslashes($_POST['ID']);
        $pass = addslashes($_POST['password']);
        $result = $this->partDAO->loginCheck($ID, $pass);
        if ($result != false) {
            $_SESSION['participant'] = serialize($result);
            if ($result[0]->getStatus() == 'a') {
                $result2=$this->payDAO->retrievePayment($ID);
                $_SESSION['payment'] = serialize($result2);
            }
            header("Location: user.php");
        } else {
            header('Location: login.php?login=failed');
        }
    }

    function register() {
        $tName = addslashes($_POST['tName']);
        $school = addslashes($_POST['school']);
        $p1Name = addslashes($_POST['p1Name']);
        $p1Gender = $_POST['p1Gender'];
        $p1DOB = addslashes($_POST['p1DOB']);
        $p1Email = $_POST['p1Email'];
        $p1PhoneNo = addslashes($_POST['p1PhoneNo']);
        $p2Name = addslashes($_POST['p2Name']);
        $p2Gender = $_POST['p2Gender'];
        $p2DOB = addslashes($_POST['p2DOB']);
        $p2Email = $_POST['p2Email'];
        $p2PhoneNo = addslashes($_POST['p2PhoneNo']);
        $result = $this->partDAO->register($tName, $school, $p1Name, $p1Gender, $p1DOB, $p1Email, $p1PhoneNo, $p2Name, $p2Gender, $p2DOB, $p2Email, $p2PhoneNo);
        if ($result != false) {
            $_SESSION['participant'] = serialize($result);
            header("Location: user.php?register=true");
        }
        else
            header("Location: register.php?registration=failed");
    }

    function update() {
        $data = $this->partDAO->retrieveAllData();
        $success[count($data)];
        for ($i = 0; $i < count($data); $i++) {
            $ID = $data[$i]->getID();
            $statusInput = $_POST["status$ID"];
	    $statusUser = $data[$i]->getStatus();
            if ($statusInput == 'n'){
                $this->payDAO->removeConfirmation($ID);
            }
	    elseif($statusInput =='a' && $statusUser!='a'){
		$refCode=rand(10000,99999);
	    	$insertResult=$this->payDAO->insertPayment($ID,$refCode,"","","","","");
	    }
            $success[$i] = $this->partDAO->updateStatus($ID, $statusInput);
        }
        $_SESSION['success'] = serialize($success);
        $_SESSION['data'] = serialize($data);
        header("Location: updateStatus.php");
    }

    function forgot() {
        $p1Email = $_POST['p1Email'];
        $p2Email = $_POST['p2Email'];
        $found = $this->partDAO->findParticipant($p1Email, $p2Email);
        if (!$found) {
            header("Location: forgot.php?found=false");
        } else {
            $_SESSION['participant'] = serialize($found);
            header("Location: user.php?newPass=true");
        }
    }

    function confirm() {
        $ID = addslashes($_POST['ID']);
        $refCode = rand(10000, 99999);
        $fullName = addslashes($_POST['name']);
        $email = $_POST['email'];
        $accOwner = addslashes($_POST['owner']);
        $paymentDate = $_POST['paymentDate'];
        $file = $_FILES['bill'];
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".", $file["name"]);
        $extension = end($temp);
        $fileName = "$ID" . "inv." . $extension;
        if ((($file["type"] == "image/gif") || ($file["type"] == "image/jpeg") || ($file["type"] == "image/jpg") || ($file["type"] == "image/pjpeg") || ($file["type"] == "image/x-png") || ($file["type"] == "image/png")) && in_array($extension, $allowedExts)) {
            if ($file["error"] > 0) {
//                echo "Error: " . $file["error"] . "<br>";
                header("Location: confirm.php?upload=failed");
            } else {
//                echo "Upload: " . $file["name"] . "<br>";
//                echo "Type: " . $file["type"] . "<br>";
//                echo "Size: " . ($file["size"] / 1024) . " kB<br>";
//                echo "Stored in: " . $file["tmp_name"];
                move_uploaded_file($file["tmp_name"], "upload/" . $fileName);
                $insertSuccess = $this->payDAO->insertPayment($ID, $refCode, $fullName, $email, $accOwner, $paymentDate, $fileName);
                if ($insertSuccess) {
                    $this->partDAO->updateStatus($ID, 'p');
                    $participant = $this->partDAO->retrieveParticipant($ID);
                    $_SESSION['participant'] = serialize($participant);
                    header("Location: user.php");
                }
                else
                    echo "insert failed";
            }
        }
        else
            header("Location: confirm.php?invalidFile=true");
    }

    function run($act) {
        if ($act == 'login') {
            $this->login();
        } else if ($act == 'admin') {
            $this->admin();
        } else if ($act == 'register') {
            $this->register();
        } else if ($act == 'update') {
            $this->update();
        } else if ($act == 'forgot') {
            $this->forgot();
        } else if ($act == 'confirm') {
            $this->confirm();
        }
        else
            echo "<div class='alert alert-danger'>Function not implemented. <a href='index.php'>Go back to home</a>.</div>";
    }

}

?>
