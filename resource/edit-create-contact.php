<?php
    foreach ($_POST as &$items) {
        $items = htmlspecialchars(strip_tags($items));
    }
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Edit Contact</title>
</head>
<body>
    <div class="container">
        <?php
        if(empty($_POST['id'])){
            echo "<h1 class='text-info'>Novo Contato</h1>";
        } else {
            echo "<h1 class='text-info'>Editar Contato</h1>";
        }
        ?>
        <form id="new-contact" method="post" action="handlePost.php" class="NewContactForm">
            <div class="form-group">
                <input name="id" type="hidden" value="<?php if (isset($_POST['id'])) {echo $_POST['id'];} ?>"/>
            </div>
            <div class="form-group">
                <input placeholder="John Doe" id ="name" name="name" class="textInput" type="text" value="<?php if(isset($_POST['name'])){echo $_POST['name']?:null;} ?>"/>
            </div>
            <div class="form-group">
                <input placeholder="50" id"age" name="age" class="textInput" type="number" value="<?php if(isset($_POST['age'])){echo $_POST['age'];} ?>"/>
            </div>
            <div class="form-group">
                <input placeholder="999999999" id="phoneNumber" name="phoneNumber" class="textInput" type="text" value="<?php if(isset($_POST['phoneNumber'])){echo $_POST['phoneNumber'];} ?>"/>
            </div>
            <div class="form-group">
                <input placeholder="john@doe.com" id="email" name="email" class="textInput" type="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>"/>
            </div>
            <div class="form-group">
                <button class="btn bg-info text-white" type="submit">Enviar</button>
            </div>

        </form>
    </div>
</body>
</html>
