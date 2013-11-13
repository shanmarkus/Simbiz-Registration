<?php

include 'config.php';
include 'participant.php';

class participantDAO {

    private $conf;

    function participantDAO() {
        $this->conf = new Config();
    }

    function connectDB() {
        $this->conf->dbConnect();
    }

    function loginCheck($ID, $pass) {
        $this->connectDB();
        $result = $this->conf->dbQuery("SELECT * FROM participants where (ID='$ID') AND (password='$pass');");
        if (mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
                $resultArray[] = new Participant($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[14]);
            }
            return $resultArray;
        }
        else
            return false;
    }

    function register($tName, $school, $p1Name, $p1Gender, $p1DOB, $p1Email, $p1PhoneNumber, $p2Name, $p2Gender, $p2DOB, $p2Email, $p2PhoneNumber) {
        $this->connectDB();
        $registered = $this->conf->dbQuery("SELECT * FROM participants;");
        $IDUsed = mysql_num_rows($registered);
        if ($IDUsed < 10) {
            $ID = "SB00$IDUsed";
        } else if ($IDUsed < 100) {
            $ID = "SB0$IDUsed";
        } else {
            $ID = "SB$IDUsed";
        }
        $pass = rand(10000, 99999);
        $resultInsert = $this->conf->dbQuery("INSERT INTO participants VALUES('$ID','$pass','$tName','$school', '$p1Name', '$p1Gender', '$p1DOB', '$p1Email', '$p1PhoneNumber','$p2Name', '$p2Gender', '$p2DOB', '$p2Email', '$p2PhoneNumber','n');");
        if ($resultInsert == true) {
            $result = $this->conf->dbQuery("SELECT * FROM participants where (ID='$ID');");
            while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
                $resultArray[] = new Participant($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[14]);
            }
            return $resultArray;
        }
        else
            return false;
    }

    function retrieveAllData() {
        $this->connectDB();
        $data = $this->conf->dbQuery("SELECT * FROM participants;");
        while ($row = mysql_fetch_array($data, MYSQL_NUM)) {
            $resultArray[] = new Participant($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[14]);
        }
        return $resultArray;
    }

    function retrieveAdminPass() {
        $this->connectDB();
        $pass = $this->conf->dbQuery("SELECT password FROM participants WHERE (ID='SB000');");
        while ($row = mysql_fetch_array($pass, MYSQL_NUM)) {
            $resultArray[] = $row[0];
        }
        return $resultArray[0];
    }

    function updateStatus($ID, $status) {
        $this->connectDB();
        $result = $this->conf->dbQuery("UPDATE participants SET status = '$status' WHERE ID= '$ID';");
        return $result;
    }

    function findParticipant($p1Email, $p2Email) {
        $this->connectDB();
        $found = $this->conf->dbQuery("SELECT * FROM participants WHERE (p1Email='$p1Email') AND (p2Email='$p2Email');");
        if (mysql_num_rows($found) > 0) {
            while ($row = mysql_fetch_array($found, MYSQL_NUM)) {
                $resultArray[] = new Participant($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[14]);
            }
            $ID = $resultArray[0]->getID();
            $newPass = rand(10000, 99999);
            $result = $this->conf->dbQuery("UPDATE participants SET password = '$newPass' WHERE ID= '$ID';");
            if ($result) {
                return $resultArray;
            }
            else
                return false;
        }
        else
            return false;
    }

    function retrieveParticipant($ID) {
        $this->connectDB();
        $result = $this->conf->dbQuery("SELECT * FROM participants where (ID='$ID');");
        while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
            $resultArray[] = new Participant($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[14]);
        }
        return $resultArray;
    }

}

?>
