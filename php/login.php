<?php 

    if (isset($_POST['DN'])) {
        $email = "";
        $password1 = "";
        if ($_POST['email'] == NULL) {
            echo "Email khong duoc de trong!";
            echo "</br>";
        } else {
            $email = $_POST['email'];
            echo "</br>";}

        if ($_POST['password1'] == NULL) {
            echo "Password khong duoc de trong!";
            echo "</br>";
        } else {
            $password1 = $_POST['password1'];
            echo "</br>";
        }
        if ($email == "" && $password1 == "") {
            echo "Khong duoc de trong";
            echo "</br>";

        } else {

        $username = "root"; // Khai báo username
        $password = "";      // Khai báo password
        $server   = "localhost";   // Khai báo server
        $dbname   = "QLPH";      // Khai báo database
        // Kết nối database
        $connect = new mysqli($server, $username, $password, $dbname);
        //Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
        if ($connect->connect_error) {
        die("Không kết nối :" . $conn->connect_error);
        exit();}
        // dang nhap
        $sql = "SELECT email,password FROM user";
        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          $email1;
          $password2;
          $a = 'tc';
          $b = '';
        if ($a == 'tc') {
          while($row = mysqli_fetch_assoc($result)) {
                $email1 = $row["email"];
                $password2 = $row["password"];
            if ($email1 == $email && $password2 == $password1) {
                if (!$loggedIn) {
                    header("Location: index.php");
                    die();
            }
                $b = 'a';
            } else{
                $a = 'tc2';
            }        
        }
        }
        if ($a == 'tc2' && $b !== 'a') {
            
                $message = "Sai mat khau hoac user";
                echo "<script type='text/javascript'>alert('$message');</script>";
                echo "<center><a class='btn1 btn_a'href='javascript: history.go(-1)'>Trở lại</a></center>";
        }
        } else {
          echo "saii";
        }
        $connect->close();
    }
    }
 ?>

 <?php
        // if ($email == 'admin' && $password1 == '123') {
        //          if (!$loggedIn) {
        //              header("Location: index.php");
        //              die();
        //      }
