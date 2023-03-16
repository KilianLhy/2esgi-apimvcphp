<?php

namespace Controller;

class UserController
{
    private $userManager;

    public function __construct()
    {
        $this->userManager = new \Model\User();
    }

    function getAll()
    {
        echo json_encode($this->userManager->getAll());
    }

    function getOne($id)
    {
        echo json_encode($this->userManager->getOne($id));
    }

    function create()
    {
        $user = new \stdClass();
        $user->firstname = $_POST["firstname"];
        $user->lastname = $_POST["lastname"];
        $user->birthday = $_POST["birthday"];
        $this->userManager->create($user);
        echo '{"message":"Utilisateur créé"}';
    }

    function update($id)
    {
        $data = json_decode(file_get_contents("php://input"));
        $user = new \stdClass();
        $user->id = $id;
        $user->firstname = $data->firstname;
        $user->lastname = $data->lastname;
        $user->birthday = $data->birthday;
        if ($this->userManager->update($user)) {
            echo '{"message":"Utilisateur mis à jour"}';
        } else {
            return '{"message":"Utilisateur non trouvé"}';
        }
    }

    function delete($id)
    {
        if ($this->userManager->delete($id)) {
            echo '{"message":"Utilisateur supprimé"}';
        } else {
            return '{"message":"Utilisateur non trouvé"}';
        }
    }
}
