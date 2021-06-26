<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CityModel;
use App\Entities\Users;
use App\Entities\City;
use App\Tools\FormatUtil;

class UserController extends BaseController

{
    protected static $loggedInUser;

    public function connection()
    {
        $data["slug"] = "users"; //routes pour savoir ou on va
        if (isset($_POST['user']['login'])) {
            $login =  sanitize_filename($_POST['user']['login']);
            $password =  sanitize_filename($_POST['user']['password']);
            $userModel = new userModel();
            $user = $userModel->findUserLogin($login);
            if ($user != null && $user->isPassword($password)) {
                self::setLoggedInUser($user);
                return redirect()->to(base_url(''));
                exit();
            } else {
                $data["message"] = "failed";
            }
        }

        $this->twig->display('user/connection', $data);
    }

    public function registration()
    {
        $data["slug"] = "users"; //routes pour savoir ou on va
        $userModel = new UserModel();

        if (isset($_POST['login'])) {

            $userRules = [
                'lastName'  => "required|max_length[150]",
                'firstName' => "required|max_length[150]",
                'address1'  => "required|max_length[150]",
                'address2'  => 'max_length[150]',
                'city'      => "required|max_length[50]",

                'zipCode'   => [
                    "rules" => "required|max_length[5]|numeric",
                    "errors" => [
                        "numeric" => "Le code postal est incorrect, veuillez vérifier votre saisie."
                    ]
                ],

                "email" => [
                    'rules' => 'required|valid_email|is_unique[users.email]',
                    "errors" => [
                        "is_unique" => "Un compte utilisateur ayant cette adresse email existe déjà.",
                        "valid_email" => "Le format de l'email est incorrect."
                    ]
                ],

                "login" =>  [
                    "rules" => "required|is_unique[users.login]|max_length[50]",
                    "errors" => [
                        "is_unique" => "Le nom d'utilisateur existe déjà, merci d'en choisir un autre."
                    ]
                ],

                "password" => [
                    "rules" =>  "required|regex_match[^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$]",
                    "errors" => [
                        "regex_match" => "Le mot de passe doit contenir au moins 8 caractères dont une majuscule, une minuscule, un chiffre et un caractère spécial."
                    ]
                ],
            ];

            if ($this->validate($userRules)) {

                $user = new Users();
                $user->setPasswordHashFromPlaintext($this->request->getPost("password",FILTER_SANITIZE_STRING));
                $user->flag = "a";
                $user->lastName = $this->request->getPost("lastName",FILTER_SANITIZE_STRING);
                $user->firstName =$this->request->getPost("firstName",FILTER_SANITIZE_STRING);
                $user->adress1 =$this->request->getPost("address1",FILTER_SANITIZE_STRING);
                $user->adress2 =$this->request->getPost("address2",FILTER_SANITIZE_STRING);
                $user->zipCode =$this->request->getPost("zipCode",FILTER_SANITIZE_STRING);
                $user->email =$this->request->getPost("email",FILTER_SANITIZE_STRING);
                $user->login =$this->request->getPost("login",FILTER_SANITIZE_STRING);

                $citymodel = new CityModel();
                $city = $citymodel->findCity($_POST["city"]);

                if ($city == null) {
                    $city = new City();
                    $city->name = $_POST["city"];
                    $citymodel->save($city);
                    $user->idCity = $citymodel->insertID();
                } else {
                    $user->idCity = $city->idCity;
                }

                $userModel->save($user);

                $this->data['message'] = "success";
            } else {
                $data['validation'] = $this->validator;
                $data["isSubmitted"] = true;
                $data["message"] = "error_login";
            };
        }

        $this->twig->display('user/registration', $data);
    }

    public static function getLoggedInUser()
    {
        $user = new Users();
       
        if (session('iduser')) {
            $user->idUsers = session("iduser");
            $user->login = session("login");
        }

        return $user;
    }

    public static function setLoggedInUser(Users $users)
    {
        self::$loggedInUser = $users;
        $session = session();
        $session->set("iduser", $users->idUsers);
        $session->set("login",  $users->login);
    }

    public function deconnection()
    {
        $data["message"] = "logout";
        $session = session();
        $session->destroy();
        $this->twig->display('user/connection', $data);
    }
}
