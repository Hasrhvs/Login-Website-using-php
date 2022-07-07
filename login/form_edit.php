<?php
  session_start();
  if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
    header('location: login.php');
    exit;
  }
  include 'Partials/_dbconnect.php';

    if(isset($_POST['update'])){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $id = $_POST['id'];
            $user = $_POST['user'];
            $email = $_POST['email'];
            $number = $_POST['number'];
            $college = $_POST['college'];
            $sql = " UPDATE `user` SET `username` = '$user', `email` = '$email' , `pno` = '$number', `college` = '$college', WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);

            if(!$result){
                $error = "ERROR ";
            }else{
                header("location:form.php");
            }
        }
    }
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql1 = "SELECT * FROM user WHERE id='$id'";

        $result = mysqli_query($conn, $sql1);

        while($row = mysqli_fetch_assoc($result)){
            $username = $row['username'];
            $email = $row['email'];
            $number = $row['pno'];
            $college = $row['college'];

        }


    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Gothic&family=Oswald:wght@500&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        
    <style>
        form{
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
            background: #fff;
            width: 75%;
            font-family: 'Poppins', sans-serif;
            
        }
        .update{
            background: rgba(0, 172, 255, 0.19);
            color: rgba(0, 49, 255, 1);
            width: 80%;
            height: 30px;
            border: none;
            border-radius: 10px;
            font-size: 100%;
            font-family: 'Poppins', sans-serif;
        }
        .update:hover{
            background: rgba(0, 49, 255, 1);
            color: white;
        }
        .back{
            background: rgba(0, 172, 255, 0.19);
            color: rgba(0, 49, 255, 1);
            width: 10%;
            height: 30px;
            border: none;
            border-radius: 10px;
            font-size: 100%;
            font-family: 'Poppins', sans-serif;
        }
        .back:hover{
            background: rgba(0, 49, 255, 1);
            color: white;
        }
        p{
            font-size: 100%;
            font-family: 'Poppins', sans-serif;  
        }
    </style>

</head>
<body>
<center>
                <form action="" method="POST">
                <table border="0">

                    <tr>
                        <td>
                            Username  
                        </td>
                        <td>&nbsp&nbsp : &nbsp&nbsp</td>
                        <td>
                            <input type="text" name="user" value="<?php echo $username; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Email  
                        </td>
                        <td>&nbsp&nbsp : &nbsp&nbsp</td>
                        <td>
                        <input type="text" name="email" value="<?php echo $email; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Phone Number
                        </td>
                        <td>&nbsp&nbsp : &nbsp&nbsp</td>
                        <td>
                        <input type="number" name="number" value="<?php echo $number; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            College
                        </td>
                        <td>&nbsp&nbsp : &nbsp&nbsp</td>
                        <td>
                        <input type="text" name="college" value="<?php echo $college; ?>">
                        </td>
                    </tr>
                    <tr>
                        <input type="submit" value="Update" name="update" class="update">
                    </tr>
                </table>
            </form>
            <br><br>
            <p> <a href="welcome.php"><button class="back">Back</button></a> Without Updating </p>

</body>
</html>