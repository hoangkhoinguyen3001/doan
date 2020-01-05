<?php
    require_once "header_common.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<link rel="stylesheet" href="../css/style.css">
<title>Title</title>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-light">
    <a class="navbar-brand align-self-start" href="http://localhost:8080/doanhk2/doanhk2/index.php">WINT ZOO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex " id="navbarSupportedContent">
        
        <?php echo display_menu()?>
        <!--<ul class="navbar-nav ml-auto ">
        <li class="nav-item">
            <a class="nav-link" href="http://localhost:8080/doanhk2/doanhk2/client/experience.php">EXPERIENCE <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="http://localhost:8080/doanhk2/doanhk2/client/leisure.php">LEISURE AND DINNING</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">PARKS CHARACTERS</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">WHAT'S UP</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">PARK INFORMATION</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="http://localhost:8080/doanhk2/doanhk2/client/busi.php">BUSSINESS OPPORTUNITIES</a>
        </li>
        </ul>-->
    </div>
</nav>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>