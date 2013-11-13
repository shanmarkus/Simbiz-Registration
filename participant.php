<?php
class Participant{
    private $ID;
    private $password;
    private $tName;
    private $school;
    private $p1Name;
    private $p1Gender;
    private $p1DOB;
    private $p1Email;
    private $p1PhoneNumber;
    private $p2Name;
    private $p2Gender;
    private $p2DOB;
    private $p2Email;
    private $p2PhoneNumber;
    private $status;
    
    function Participant($ID, $password, $tName, $school, $p1Name, $p1Gender, $p1DOB, $p1Email, $p1PhoneNumber, $p2Name, $p2Gender, $p2DOB, $p2Email, $p2PhoneNumber, $status) {
        $this->ID = $ID;
        $this->password = $password;
        $this->tName = $tName;
        $this->school = $school;
        $this->p1Name = $p1Name;
        $this->p1Gender = $p1Gender;
        $this->p1DOB = $p1DOB;
        $this->p1Email = $p1Email;
        $this->p1PhoneNumber = $p1PhoneNumber;
        $this->p2Name = $p2Name;
        $this->p2Gender = $p2Gender;
        $this->p2DOB = $p2DOB;
        $this->p2Email = $p2Email;
        $this->p2PhoneNumber = $p2PhoneNumber;
        $this->status = $status;
    }

    public function getID() {
        return $this->ID;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getTName() {
        return $this->tName;
    }

    public function setTName($tName) {
        $this->tName = $tName;
    }

    public function getSchool() {
        return $this->school;
    }

    public function setSchool($school) {
        $this->school = $school;
    }

    public function getP1Name() {
        return $this->p1Name;
    }

    public function setP1Name($p1Name) {
        $this->p1Name = $p1Name;
    }

    public function getP1Gender() {
        return $this->p1Gender;
    }

    public function setP1Gender($p1Gender) {
        $this->p1Gender = $p1Gender;
    }

    public function getP1DOB() {
        return $this->p1DOB;
    }

    public function setP1DOB($p1DOB) {
        $this->p1DOB = $p1DOB;
    }

    public function getP1Email() {
        return $this->p1Email;
    }

    public function setP1Email($p1Email) {
        $this->p1Email = $p1Email;
    }

    public function getP1PhoneNumber() {
        return $this->p1PhoneNumber;
    }

    public function setP1PhoneNumber($p1PhoneNumber) {
        $this->p1PhoneNumber = $p1PhoneNumber;
    }

    public function getP2Name() {
        return $this->p2Name;
    }

    public function setP2Name($p2Name) {
        $this->p2Name = $p2Name;
    }

    public function getP2Gender() {
        return $this->p2Gender;
    }

    public function setP2Gender($p2Gender) {
        $this->p2Gender = $p2Gender;
    }

    public function getP2DOB() {
        return $this->p2DOB;
    }

    public function setP2DOB($p2DOB) {
        $this->p2DOB = $p2DOB;
    }

    public function getP2Email() {
        return $this->p2Email;
    }

    public function setP2Email($p2Email) {
        $this->p2Email = $p2Email;
    }

    public function getP2PhoneNumber() {
        return $this->p2PhoneNumber;
    }

    public function setP2PhoneNumber($p2PhoneNumber) {
        $this->p2PhoneNumber = $p2PhoneNumber;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }


    

}
?>
