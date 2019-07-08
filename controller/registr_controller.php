<?php

class registr_controller extends controller
{
    public function __construct()
    {
        $this->model = new registr_model();
        $this->view = new View();
    }

    public function action_index()
    {
        $this->view->generate('registr_view.php', 'template_view.php');
    }

    public function action_registration(){
        $userName = $_POST['user-name'];
        $userPassword = $_POST['user-password'];
        $userEmail = $_POST['user-email'];
        if ($this->model->check_user($userName, $userEmail) != 0){
            echo 'User already exists!';
        } else {
            $data = array(
              'user_name' => $userName,
                'password' => password_hash($userPassword, PASSWORD_DEFAULT),
                'email' => $userEmail
            );
            $this->model->insert_user($data);
        }
    }

   /* public function file_upload(){
        if (isset($_POST['image'])){
            $directory = 'uploads';
            $randomNum = time();
            $imageName = str_replace(' ', '-', strtolower($_FILES['image']['name']));
            $imageType = $_FILES['image']['type'];
            $imageExt = substr($imageName, strrpos($imageName, '.'));
            $imageExt = str_replace('.', '', $imageExt);
            $imageName = preg_replace("/\.[^.\s]{3,4}$/", $imageName);
            $newImageName = $imageName . '-' . $randomNum . '.' . $imageExt;
            move_uploaded_file($_FILES['image']['tmp_name'], $directory . '/' . $newImageName);
            $data = array(
                'image' => $newImageName;
            )
        }
    } */

}