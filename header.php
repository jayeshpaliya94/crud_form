<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Php CRUD </title>
  </head>
  <body> 
    <?php 
      session_start();

      echo $_SESSION['email'];
    ?>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Blog System Management</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="container">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add.php">Add New User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">View User List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">AboutUS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">ContactUS</a>
          </li>
          <li class="nav-item">
            <?php if($_SESSION['email']){ ?>
              <button type="button" class="btn btn-primary"><a href="logout.php">Logout</a></button>
              <?php } else { ?>
                <a class="nav-link" href="login.php">Login</a>
              <?php } ?>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
    <div class="container">

    <?php 
  $databaseHost = 'localhost';
  $databaseName = 'apex_global';
  $databaseUsername = 'newuser';
  $databasePassword = 'test@123';
  $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
?>

<!-- CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(100) NOT NULL,
    lname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    gender VARCHAR(10),
    country VARCHAR(50),
    profile_pic VARCHAR(255),
    hobbies TEXT,
    city VARCHAR(10),
    zip VARCHAR(10),
    address TEXT,
    password VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
); -->
  