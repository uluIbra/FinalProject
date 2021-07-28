<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/styleone.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">


    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand gamefont fs-2" href="#">Manager</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="mainone.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="managers.php">Listing</a>
        </li>
        <?php if (is_logged_in()) { ?>
        <li class="nav-item">
          <a class="nav-link" href="manager.php">Add Manager</a>
        </li>
        <?php } ?>
        </ul>
        <ul class="navbar-nav d-flex">
        <?php if (is_logged_in()) { ?>
            <li class="nav-item">
                 <a class="btn btn-warning" href="logout-m.php"> Exit <i class="bi bi-x-square-fill"></i></a>    
            </li>   
            <?php } else { ?>
              <li class="nav-item">
          <a class="nav-link" href="login-m.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register-m.php">Register</a>
        </li>

              <?php } ?>
        </ul>
    </div>
  </div>
</nav>
    </header>
