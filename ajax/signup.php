<?php
    include('connection.php');
    if(isset($_POST['token']) && password_verify('signuptoken', $_POST['token'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        // $cpassword = $_POST['confirmPass'];
        $name = $_POST['name'];
        if(($email !='' && $password !='' && $name !='')){
    
            $query = $db->prepare('INSERT INTO users(name, email, password) values(?,?,?)');
            $data = array($name, $email, password_hash($password, PASSWORD_DEFAULT));
            $execute = $query->execute($data);
            if($execute){
                echo "user created successfully";
            }
            else {
                echo "something went wrong";
            }
        }
    }
    else {
        echo "token not generated";
    }
?>