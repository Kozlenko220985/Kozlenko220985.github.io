<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<?php include_once 'logic.php' ?>

<div class="container">
    <div class="row">
        <?php if (isset($_POST['input'][0])): ?>
            <?php echo validation($_POST['input'][0]) ?>
        <?php endif; ?>
    </div>
    <form <?= $_SERVER['SCRIPT_NAME'] ?> method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="inputName" class="col-sm-4 col-form-label"></label>
            <div class="col-sm-4">
                <input type="email" class="form-control" name="input[]" id="inputName" placeholder="input your email">
                <input type="file" class="form-control" name="input[]" id="">
                <input type="file" class="form-control" name="input[]" id="">
                <input type="file" class="form-control" name="input[]" id="">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-4 col-sm-4">
                <button type="submit" class="btn btn-primary">Load</button>
            </div>
        </div>
    </form>
    <div class="row link">
        <div class="col-sm-4 offset-sm-4 gallery">
            <a href="gallery.php" target="_blank">Gallery</a>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
</body>
</html>