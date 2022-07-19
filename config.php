<?php
    //Database connection
    $conn = new mysqli('localhost', 'root', '', 'floram');
    if($conn->connect_error){
        die('Connection failed : '.$conn->connect_error);
    }else{
        session_start();

        $user = $_POST['username'];
        $password = $_POST['pass'];
        $mail = $_POST['email'];
        $fullname = $_POST['full'];

        
        $statement = $conn->prepare("SELECT username, email FROM users WHERE username =? or email = ?");
        $statement->bind_param("ss", $user, $mail);


        $statement->execute();
        $statement->bind_result($username, $email);

        $statement->fetch();

        if ($username != null){

            session_destroy();
            echo "Invalid data, someone might be using this username or email";
        }
        
        elseif ($email != null){
            session_destroy();
            echo "Invalid data, someone might be using this username or email";
        }else{
            $_SESSION['name'] = $user;

            $stmt = $conn->prepare("INSERT INTO users(username, password, email, fullname)
            values(?,?,?,?)");
            $stmt->bind_param("ssss", $user, $password, $mail, $fullname);
            $stmt->execute();
            echo"Registration successful";
            $stmt->close();
            $conn->close();
        }

        
    }

?>