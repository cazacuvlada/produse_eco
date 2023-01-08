
<?php

$categorie="";
$produse="";
$pret_med="";

//create connection

@include '../php/config.php';

$conn = mysqli_connect('localhost','root','','produse_eco');

$errorMessage="";
$successeMessage ="";

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $categorie=$_POST["categorie"];
    $produse=$_POST["produse"];
    $pret_med=$_POST["pret_med"];
   
   

    do{
        if(empty($categorie)||empty ($produse) ||empty ($pret_med)){
            $errorMessage = "All the fields are required";
            break;
        }
       
        //add a new book to DB
        $sql = "INSERT INTO biantti (categorie,produse,pret_med)
        VALUES ('$categorie' ,'$produse','$pret_med')";
        $result = mysqli_query($conn, $sql);
        # or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
        #die(mysqli_error($analiz_econom_bucuria));
        #$result=$conn->query($sql);
        if(!$result){
            $errorMessage = "Invalid query:".$conn->error;
            break;
              }
       
              
              $categorie="";
              $produse="";
              $pret_med="";


$successeMessage = "Row added correctly";
header("location:../menu/biantti_admin.php");
exit;

    }while(false);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/eco.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<title>Create a new row registration </title>
</head>
<body style="font-family: 'Garamond', sans-serif;">
<div class="home-btn">
    <a href="../php/admin.php">Producatori de produse ECO din R.M.</a>
</div>
<div class="home-btn">
    <a href="../menu/biantti_admin.php">Biantti </a>
</div>
    <div class="container my-5">
        <h2 style="position:relative;top:-40vh;left:20vh;">New Row</h2>
<?php
if(!empty($errorMessage)){
    echo"
    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>$errorMessage</strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>
    
    ";
}


?>
        <form method="post">
       
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Categorie</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="categorie" value="<?php echo $categorie; ?>">
</div>
            </div>
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Produse</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="produse" value="<?php echo $produse; ?>">
</div>
            </div>
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Pret mediu</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="pret_med" value="<?php echo $pret_med; ?>">
</div>
            </div>
            
            
           
<?php
if(!empty($successeMessage)){
    echo"
    div class='row mb-3'>
    <div class='offset-sm-3 col-sm-6'>
    <div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>$successeMessage</strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>
    </div>
    </div>
    ";
    
}


?>


            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button style="color:white;background-color:lightslategray;"type="submit" class="btn btn-primary">Submit</button>
</div>
<div class="col-sm-3 d-grid">
    <a style="color:lightslategray;background-color:white;" class="btn btn-outline-primary" href="../menu/biantti_admin.php" role="button">Cancel</a>
</div>
            </div>
        </form>
    </div>
</body>
</head>
</html>
