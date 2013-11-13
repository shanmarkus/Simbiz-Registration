<?php
include 'payment.php';

class paymentDAO {

    private $conf;

    function paymentDAO() {
        $this->conf = new Config();
    }

    function connectDB() {
        $this->conf->dbConnect();
    }
    
    function insertPayment($ID, $refCode, $fullName, $email, $accOwner, $paymentDate, $fileName){
        $this->connectDB();
        $insertResult=$this->conf->dbQuery("INSERT INTO payments VALUES('$ID','$refCode','$fullName','$email','$accOwner','$paymentDate','$fileName');");
        return $insertResult;
    }
    
    function retrieveAllData() {
        $this->connectDB();
        $data = $this->conf->dbQuery("SELECT * FROM payments ORDER BY ID;");
        while ($row = mysql_fetch_array($data, MYSQL_NUM)) {
            $resultArray[] = new Payment($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
        }
        return $resultArray;
    }
    
    function removeConfirmation($ID){
        $this->connectDB();
        $this->conf->dbQuery("DELETE FROM payments WHERE ID = '$ID';");
    }
    
    function retrievePayment($ID){
        $this->connectDB();
        $data=$this->conf->dbQuery("SELECT * FROM payments WHERE ID='$ID';");
        while ($row = mysql_fetch_array($data, MYSQL_NUM)) {
            $resultArray[] = new Payment($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
        }
        return $resultArray;
    }
}
?>
