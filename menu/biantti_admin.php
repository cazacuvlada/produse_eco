<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BianttiADMIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/eco.css">
</head>
<body >
<div class="home-btn">
    <a href="../php/admin.php">Porducatori de produse ECO din R.M.</a>
</div>

<div class="container_2 my-5">
    <h2 style="text-align:center;"  >Biantti</h2>
    <a  style="color:white;background-color:lightslategray; position:relative; left:6vh;"  class="btn btn-primary" href="../php/create_biantti.php" role="button">New Row</a>
    <br>
    <table class="new_row">
        <thead>
        <tr>
            <td>Id</td>
            <td>Categorie</td>
            <td>Produse</td>
            <td>Pret Mediu</td>
          
           
           
        </tr>
        </thead>
        <tbody>
        <?php

        @include '../php/config.php';
        //check connection to db
        if($conn->connect_error){
            die("Connection failed:".$conn->connect_error);
        }
        //read all row from db table
        $sql = "SELECT * FROM biantti";
        $result =mysqli_query($conn,$sql);
        if(!$result){
            die("Invalid query:".$conn->error);
        }
        //read data of each row
        while($row = $result->fetch_assoc()){
            echo " 
            <tr>
           <td>$row[id]</td>
            <td>$row[categorie]</td>
            <td>$row[produse]</td>
            <td>$row[pret_med]</td>
          
            <td>
                <a style='color:white;background-color:lightslategray;' class= 'btn btn-primary  btn-sm' href='../php/edit_biantti.php?id=$row[id]'>Edit</a>
                <a  style='color:white;background-color:lightslategray;'  class= 'btn btn-danger btn-sm'  href='../php/delete_biantti.php?id=$row[id]'>Delete</a>

                </td>
           </tr>";
           }
        ?>

        </tbody>
    </table>


</div>





</body>
</html>
