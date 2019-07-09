<?php

class main_controller extends controller
{

    function __construct()
    {
        parent::__construct();
        $this->model = new main_model();
    }

    function action_index()
    {
        $posts = $this->model->get_posts();
        $users = $this->model->get_users();
        $data = array(
            'posts' => $posts,
            'users' => $users
        );

        $this->view->generate('main_view.php', 'template_view.php', $data);
    }

    function action_new()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->file_upload();
        } else {
            $this->view->generate('new_post_view.php', 'template_view.php');
        }
    }

    /*public function file_upload()
    {
        if (isset($_POST['image'])) {
            $user_id = $this->model->get_user_id($_SESSION['userName']);
            $directory = 'uploads';
            $randomNum = time();
            $imageName = str_replace(' ', '-', strtolower($_FILES['image']['name']));
            $imageType = $_FILES['image']['type'];
            $imageExt = substr($imageName, strrpos($imageName, '.'));
            $imageExt = str_replace('.', '', $imageExt);
            $imageName = preg_replace("/\.[^.\s]{3,4}$/", "", $imageName);
            $newImageName = $imageName . '-' . $randomNum . '.' . $imageExt;
            move_uploaded_file($_FILES['image']['tmp_name'], $directory . '/' . $newImageName);
            $data = array(
                'image' => $newImageName,
                'user_id' => $user_id
            );
            $this->model->insert('main', $data);
        }
        //header('Location: http://localhost/pictures/main/index');
    }*/

    function file_upload()
    {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
// Check if file already exists
        /*if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }*/
// Check file size
        if ($_FILES["image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" && $imageFileType != "jfif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        $user_id = $this->model->get_user_id($_SESSION['userName']);
        $data = array(
            'image' => "'" . $target_file . "'",
            'user_id' => $user_id
        );

// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $this->model->insert('main', $data);
               //header('Location: http://localhost/pictures/main/index');
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}