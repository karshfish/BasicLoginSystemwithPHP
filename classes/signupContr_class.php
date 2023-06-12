<?php
class SignupContr extends Signup {
    private $uid;
    private $pwd;
    private $pwd_repeat;
    private $email;
    public function __construct($uid,$pwd,$pwd_repeat,$email){
        $this->uid=$uid;
        $this->pwd=$pwd;
        $this->pwd_repeat=$pwd_repeat;
        $this->email=$email;
    }
   public function signUpUser(){
        if($this->emptyInput()== false){
            header("location:../index.php?error=emptyinput");
            exit();
        }
        if($this->InvalidUsername()== false){
            header("location:../index.php?error=invalidUsername");
            exit();
        }
        if($this->InvalidEmail()== false){
            header("location:../index.php?error=invalidEmail");
            exit();
        }
        if($this->pwdMatch()== false){
            header("location:../index.php?error=passwordNoMatch");
            exit();
        }
        if($this->userExist()== false){
            header("location:../index.php?error=AlreadyExist");
            exit();
        }
        $this->setUser($this->uid,$this->pwd,$this->email);
    }
    private function emptyInput(){
        $result=true;
        if(empty($this->uid)||empty($this->pwd)||empty($this->pwd_repeat)||empty($this->email)){
            $result= false;
        }
        else{
            $result=true;
        }
    return $result;
    }

    private function InvalidUsername(){
        $result=false;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)){
            $result=false;
        }
        else{
            $result=true;
        }
        return $result;
    }
    private function InvalidEmail(){
        $result=false;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result=false;
        }
        else{
            $result=true;
        }
        return $result;
    }
    private function pwdMatch(){
        $result=false;
        if ($this->pwd!==$this->pwd_repeat){
            $result=false;
        }
        else{
            $result=true;
        }
        return $result;
    }
    private function userExist(){
        $result=false;
        if (!$this->checkUser($this->uid,$this->email)){
            $result=false;
        }
        else{
            $result=true;
        }
        return $result;
    }
}
