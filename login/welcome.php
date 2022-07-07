<?php

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
  header('location: login.php');
  exit;
}
include 'Partials/_dbconnect.php';
$sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Home! <?php echo $_SESSION['username']?></title>
    <style>
        
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th{
            font-size: 120%;
            font-family: 'Oswald', sans-serif;
        }
        tr{
            font-size: 100%;
            font-family: 'Poppins', sans-serif;
        }
        .edit{
            background: rgba(0, 172, 255, 0.19);
            color: rgba(0, 49, 255, 1);
            width: 80%;
            height: 30px;
            border: none;
            border-radius: 10px;
            font-size: 100%;
            font-family: 'Poppins', sans-serif;
        }
        .edit:hover{
            background: rgba(0, 49, 255, 1);
            color: white;
        }
        h1{
            font-size: 350%;
            font-family: 'Poppins', sans-serif;
        }
        .acc_a{
            color: green;
        }
        .acc_d{
            color: red;
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
  <?php
  require 'Partials/_nav.php'
  ?>
    <center>
    <h1>
        Control All
    </h1>


        <table>
            <tr>
                <th>
                    Username
                </th>
                <th>
                    Email
                </th>
                <th>
                    Phone Number
                </th>
                <th>
                    College
                </th>
                <th>
                    Action
                </th>
            </tr>
                <?php

                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){

                ?>
            <tr>
                <td>
                    <?php echo($row['username']); ?>
                </td>
                <td>
                    <?php echo($row['email']); ?>
                </td>
                <td>
                    <?php echo($row['pno']);
                    ?>
                </td>
                <td>
                    <?php echo($row['college']);
                    ?>
                </td>
                <td>
                   <a href="form_edit.php?id=<?php echo($row['id']); ?>"><button class="edit">Edit</button></a>
                </td>
            </tr>
            <?php }
            }
            ?>

        </table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>