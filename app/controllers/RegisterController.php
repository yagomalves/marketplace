<?php
namespace app\controllers;

use SignupController;
use ProfileInfoController;

class RegisterController
{
    public function store()
    {
        
    if($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            // PEGAR DADOS
            $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
            $password = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');
            $passwordRepeat = htmlspecialchars($_POST["passwordRepeat"], ENT_QUOTES, 'UTF-8');
            $firstName = htmlspecialchars($_POST["firstName"], ENT_QUOTES, 'UTF-8');
            $lastName = htmlspecialchars($_POST["lastName"], ENT_QUOTES, 'UTF-8');
            $phone = preg_replace("/[^0-9]/", "", htmlspecialchars($_POST["phone"], ENT_QUOTES, 'UTF-8'));
            date_default_timezone_set("America/Sao_Paulo");
            $signupDate = date("Y-m-d H:i:s");
            $uniqueId = rand(time(), 100000000);
            $status = "Offline now";

            if(isset($_FILES['image']))
            {
                $img_name = $_FILES['image']['name'];
                $img_type = $_FILES['image']['type'];
                $tmp_name = $_FILES['image']['tmp_name'];
                $img_explode = explode('.',$img_name);
                $img_ext = end($img_explode);
                $extensions = ["jpeg", "png", "jpg"];
                if(in_array($img_ext, $extensions) === true){
                $types = ["image/jpeg", "image/jpg", "image/png"];
                    if(in_array($img_type, $types) === true){
                    $time = time();
                    $new_img_name = $time.$img_name;
                    move_uploaded_file($tmp_name,"images/".$new_img_name);
                    }
                }
            }


            // INSTANCIAR SIGNUPCONTROLLER CLASS
            include '../app/classes/Dbh.classes.php';
            include '../app/classes/Signup.classes.php';
            include '../app/controllers/Signup_controller.classes.php';

            $signUp = new SignupController($password, $passwordRepeat, $email, $firstName, $lastName, $phone, $signupDate, $uniqueId, $status, $new_img_name);
            
            // RUN ERRORS HANDLERS
            $signUp->SignupUser();

            $userId = $signUp->FetchUserId($email);
        
            // INSTANTIATE PROFILE INFO CONTROLLER
            include '../app/classes/Profileinfo.classes.php';
            include '../app/controllers/Profileinfo_controller.classes.php';
            $profileInfo = new ProfileInfoController($userId, $firstName);
            $profileInfo->DefaultProfileInfo();

            // VOLTAR PARA HOME PAGE
            header("Location: /");
        }
    }
}