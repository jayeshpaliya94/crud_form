<?php
include("header.php");
ini_set('display_errors', 1);
error_reporting(E_ALL);
    if($_SERVER["REQUEST_METHOD"] == "POST"){   
     
    $fname = mysqli_real_escape_string($mysqli, $_POST['fname']);
    $lname = mysqli_real_escape_string($mysqli, $_POST['lname']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
    $city = mysqli_real_escape_string($mysqli, $_POST['city']);
    $country1 = mysqli_real_escape_string($mysqli, $_POST['country']);
    $zip = mysqli_real_escape_string($mysqli, $_POST['zip']);
    $hobbies = isset($_POST['hobbies']) ? implode(", ", $_POST['hobbies']) : "";
    $address = mysqli_real_escape_string($mysqli, $_POST['address']);
    $password = $_POST['password']; 
    $profile_pic = "";
    if (!empty($_FILES["profile_pic"]["name"])) {
        $target_dir = "uploads/"; // Folder where files will be stored
        $profile_pic = $target_dir . basename($_FILES["profile_pic"]["name"]);
        move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $profile_pic);
    }

    $query = "INSERT INTO users (fname, lname, email, gender, country, profile_pic, hobbies, city, zip, address, password) 
    VALUES ('$fname', '$lname', '$email', '$gender', '$country1', '$profile_pic', '$hobbies', '$city', '$zip', '$address', '$password')";
    $result = mysqli_query($mysqli, $query);
    if($result){
            $success = "saved";
            // echo '<script>window.location.href = "index.php";</script>';
            session_start();
            $_SESSION['success_message'] = 'Data was successful!';
        } else {
            echo "<p>Error: " . mysqli_error($mysqli) . "</p>";
        }
    }


?>
<div class="container">
  </br></br>
    <p><center><h2>User Register</h2></center></p>
    <?php 
        if (isset($_SESSION['success_message'])) {
          echo '<div class="success-message">' . $_SESSION['success_message'] . '</div>';
          unset($_SESSION['success_message']); 
        }?>
    <form action=""  class="needs-validation" novalidate  method="post" name="add" enctype="multipart/form-data">
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="validationTooltip001">First name</label>
      <input type="text" class="form-control" id="validationTooltip001" name="fname" placeholder="firstname" required>
      <div class="invalid-tooltip">
        Please provide a valid Firs tname.
      </div>
    </div>
    <div class="form-group col-md-6">
      <label for="inputlname1">Last name</label>
      <input type="text" class="form-control" id="inputlname1" name="lname" placeholder="last name" required>
      <div class="invalid-tooltip">
        Please provide a valid Last name.
      </div>
    </div>
  </div>
 
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="validationTooltip01">Email</label>
      <input type="email" class="form-control" id="validationTooltip01" name="email" placeholder="Email" required>
      <div class="invalid-tooltip">
        Please provide a valid Email.
      </div>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" name="password" placeholder="Password" required>
    </div>
  </div>
  <div class="custom-control custom-radio">
    
    <input type="radio" class="custom-control-input" id="customControlValidation2" value="male" name="gender" checked required>
    <label class="custom-control-label" for="customControlValidation2">male</label>
  </div>
  <div class="custom-control custom-radio mb-3">
    <input type="radio" class="custom-control-input" id="customControlValidation3" value="female"name="gender" required>
    <label class="custom-control-label" for="customControlValidation3">Female</label>
    <div class="invalid-feedback">More example invalid feedback text</div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="1234 Main St" required>
  </div>
   
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity" name="city" required>
      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">country</label>
      <select id="inputState" class="form-control" name="country">
        <option selected value="India">India</option>
        <option value="USA">USA</option>
        <option value="UK">UK</option>
        <option value="Canada">Canada</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" name="zip" id="inputZip">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-2">Checkbox</div>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="hobbies[]" value="reading" id="gridCheck1">
        <label class="form-check-label" for="gridCheck1">
          reading
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="hobbies[]" value="sport" id="gridCheck2">
        <label class="form-check-label" for="gridCheck2">
          sport
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="hobbies[]" value="music" id="gridCheck3">
        <label class="form-check-label" for="gridCheck3">
          music
        </label>
      </div>
    </div>
  </div>

  <div class="custom-file">
    <input type="file" class="custom-file-input" id="validatedCustomFile" name="profile_pic" required>
    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
    <div class="invalid-feedback">Example invalid custom file feedback</div>
  </div>

  <br>
  <br>
  <button type="submit" name="submit" class="btn btn-primary">save</button>
</form>

<script>
(function() {
  'use strict';
  window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

</div> 
<?php
include("footer.php");
?>

