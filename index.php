<?php 

function generatePassword($passwordLenght){

    $lowercase = 'abcdefghijklmnopqrstuvwxyz';
    $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numbers = '0123456789';
    $symbols = '!@#$%^&*()_-+=;:<>/?';

    $allChars = $lowercase . $uppercase . $numbers . $symbols;

    $generatedPassword = '';

    for($i = 0; $i < $passwordLenght; $i++){

        $newRandomChar = $allChars[rand(0,strlen($allChars) - 1)];

        $generatedPassword = $generatedPassword . $newRandomChar;
    }

    return $generatedPassword;
}

$generatedPassword = '';

if(isset($_GET['passwordLenght']) && $_GET['passwordLenght'] >= 4 ) {

   $generatedPassword = generatePassword($_GET['passwordLenght']);
    
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- link bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>Password generator</title>
</head>
<body>
    <div class="container pt-2">
        <h1>Password generator</h1>

        <form action="index.php" method="GET">

            <div class="mb-3">
                <label for="passwordLenght" class="form-label">Lunghezza password</label>
                <input name="passwordLenght" id="passwordLenght" type="number" min="4" step="1" placeholder="lunghezza password">
            
                <button type="submit" class="btn btn-primary">Genera</button>
            </div>

        </form>

        <hr>

        <?php 
        
        if($generatedPassword != ''){

            ?>

            <h2>Password generata:</h2>
            <h3><?= $_GET['passwordLenght'] ?> caratteri</h3>

            <pre><?= $generatedPassword ?></pre>

            <?php
        }
        
        
        ?>

    </div>
    
    <!-- link bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>