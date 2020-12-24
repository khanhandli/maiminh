<?php 

    if (isset($_POST['DN'])) {
        $user = "";
        $password1 = "";
        if ($_POST['user'] == NULL) {
            echo "user khong duoc de trong!";
            echo "</br>";
        } else {
            $user = $_POST['user'];
            echo "</br>";}

        if ($_POST['password1'] == NULL) {
            echo "Password khong duoc de trong!";
            echo "</br>";
        } else {
            $password1 = $_POST['password1'];
            echo "</br>";
        }
        if ($user == "" && $password1 == "") {
            echo "Khong duoc de trong";
            echo "</br>";

        } else {

        $username = "root"; // Khai báo username
        $password = "";      // Khai báo password
        $server   = "localhost";   // Khai báo server
        $dbname   = "QLTT";      // Khai báo database
        // Kết nối database
        $connect = new mysqli($server, $username, $password, $dbname);
        //Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
        if ($connect->connect_error) {
        die("Không kết nối :" . $conn->connect_error);
        exit();}
        // dang nhap
        $sql = "SELECT user,password FROM users";
        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          $user1;
          $password2;
          $a = 'tc';
          $b = '';
        if ($a == 'tc') {
          while($row = mysqli_fetch_assoc($result)) {
                $user1 = $row["user"];
                $password2 = $row["password"];
            if ($user1 == $user && $password2 == $password1) {
                if (!$loggedIn) {
                    header("Location: ../php/QA.php");
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
        // if ($user == 'admin' && $password1 == '123') {
        //          if (!$loggedIn) {
        //              header("Location: index.php");
        //              die();
        //      }
