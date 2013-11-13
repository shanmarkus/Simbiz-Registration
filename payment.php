<?php
class Payment{
    private $ID;
    private $refCode;
    private $fullName;
    private $email;
    private $accOwner;
    private $paymentDate;
    private $fileName;
    
    function Payment($ID, $refCode, $fullName, $email, $accOwner, $paymentDate, $fileName) {
        $this->ID = $ID;
        $this->refCode = $refCode;
        $this->fullName = $fullName;
        $this->email = $email;
        $this->accOwner = $accOwner;
        $this->paymentDate = $paymentDate;
        $this->fileName = $fileName;
    }
    
    public function getID() {
        return $this->ID;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    public function getRefCode() {
        return $this->refCode;
    }

    public function setRefCode($refCode) {
        $this->refCode = $refCode;
    }

    public function getFullName() {
        return $this->fullName;
    }

    public function setFullName($fullName) {
        $this->fullName = $fullName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getAccOwner() {
        return $this->accOwner;
    }

    public function setAccOwner($accOwner) {
        $this->accOwner = $accOwner;
    }

    public function getPaymentDate() {
        return $this->paymentDate;
    }

    public function setPaymentDate($paymentDate) {
        $this->paymentDate = $paymentDate;
    }

    public function getFileName() {
        return $this->fileName;
    }

    public function setFileName($fileName) {
        $this->fileName = $fileName;
    }

}

?>
