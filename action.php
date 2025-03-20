<?php
include("header.php");

if(isset($_GET['edit_id'])) {

  $id = $_GET['edit_id']; 
  $sql = "SELECT * FROM users where id=$id";  
  $result = mysqli_query($mysqli, $sql);  
  $res = mysqli_fetch_assoc($result);
  $hobbies = explode(", ", $res['hobbies']);  

  if(isset($_POST['SubmitButton'])){ 
    
    $fname = mysqli_real_escape_string($mysqli, $_POST['fname']);
    $lname = mysqli_real_escape_string($mysqli, $_POST['lname']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
    $city = mysqli_real_escape_string($mysqli, $_POST['city']);
    $country1 = mysqli_real_escape_string($mysqli, $_POST['country']);
    $zip = mysqli_real_escape_string($mysqli, $_POST['zip']);
    $hobbies = isset($_POST['hobbies']) ? implode(", ", $_POST['hobbies']) : "";
    $address = mysqli_real_escape_string($mysqli, $_POST['address']);

    // File upload handling

    $profile_pic = "";
    if (!empty($_FILES["profile_pic"]["name"])) {  
        $target_dir = "uploads/";
        $profile_pic = $target_dir . basename($_FILES["profile_pic"]["name"]);
        move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $profile_pic);
    } else {  
        $oldPicQuery = mysqli_query($mysqli, "SELECT profile_pic FROM users WHERE id=$id");
        $row = mysqli_fetch_assoc($oldPicQuery);
        $profile_pic = $row['profile_pic'];
    }

    $query = "UPDATE users SET fname='$fname', lname='$lname', email='$email', gender='$gender', city='$city', country='$country1', zip='$zip', profile_pic='$profile_pic', hobbies='$hobbies', address='$address' WHERE id=$id";

		if (mysqli_query($mysqli, $query)) {
			echo "<p>Data updated successfully!</p>";
			echo "<a href='index.php'>View Result</a>";
			header('location:index.php');
		} else {
			echo "<p>Error: " . mysqli_error($mysqli) . "</p>";
		}

  }  

?>

  <div class="container">
  <p><center><h2><?php echo $res['fname'].' '.$res['lname']; ?> User Data. </h2></center></p>

  <form action=""  class="needs-validation" novalidate  method="post" name="add" enctype="multipart/form-data">
    <div class="form-row">
    <div class="form-group col-md-6">
    <input type="hidden" name="id" value="<?php echo $res['id']; ?>">

      <label for="validationTooltip001">First name</label>
      <input type="text" class="form-control" id="validationTooltip001" value="<?php echo $res['fname'];?>" name="fname" placeholder="firstname" required>
      <div class="invalid-tooltip">
        Please provide a valid First name.
      </div>
    </div>
    <div class="form-group col-md-6">
      <label for="inputlname1">Last name</label>
      <input type="text" class="form-control" id="inputlname1" value="<?php echo $res['lname'];?>"name="lname" placeholder="last name" required>
      <div class="invalid-tooltip">
        Please provide a valid Last name.
      </div>
    </div>
  </div>
 
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="validationTooltip01">Email</label>
      <input type="email" class="form-control" id="validationTooltip01" name="email" value="<?php echo $res['email'];?>" placeholder="Email" required>
      <div class="invalid-tooltip">
        Please provide a valid Email.
      </div>
    </div>
  </div>
  <div class="form-group1 custom-radio row">
    <div class="col-sm-2">Gender</div>
    <div class="col-sm-10">
      
      <div class="form-check1">
        <input type="radio" class="custom-control-input" id="customControlValidation2" value="male" name="gender" <?php if($res['gender'] == 'male') echo "checked";  ?> required>
        <label class="custom-control-label" for="customControlValidation2">male</label>
      </div>
      <div class="form-check1">
        <input type="radio" class="custom-control-input" id="customControlValidation3" value="female"name="gender" <?php if($res['gender'] == 'female') echo 'checked'; ?> required>
        <label class="custom-control-label" for="customControlValidation3">Female</label>
      </div>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity" name="city" value="<?php echo $res['city']?>" required>
      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">country</label>
      <select id="inputState" class="form-control" name="country">
        <option selected value="India">India</option>
        <option value="USA" <?php if($res['country'] == 'USA') echo 'selected=selected'; ?> >USA</option>
        <option value="UK" <?php if($res['country'] == 'UK') echo 'selected=selected'; ?> >UK</option>
        <option value="Canada" <?php if($res['country'] == 'Canada') echo 'selected=selected';?> >Canada</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" name="zip" id="inputZip" value="<?php echo $res['zip']?>">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-2">Checkbox</div>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="hobbies[]" value="reading" <?php if(in_array("reading",$hobbies)) echo 'checked';?> id="gridCheck1">
        <label class="form-check-label" for="gridCheck1">
          reading
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="hobbies[]" value="sport" <?php if(in_array("sport",$hobbies)) echo 'checked'; ?>id="gridCheck2">
        <label class="form-check-label" for="gridCheck2">
          sport
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="hobbies[]" value="music" <?php if(in_array("music",$hobbies)) echo 'checked';?>id="gridCheck3">
        <label class="form-check-label" for="gridCheck3">
          music
        </label>
      </div>
    </div>
  </div>

  <div class="custom-file">
      <input type="file" class="custom-file-input" id="validatedCustomFile" name="profile_pic" required>
      <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
     </br></br>
     <img src="<?php echo $res['profile_pic']; ?>" height="100px" width="100px"> </br></br>
    <div class="invalid-feedback">Invalid file.</div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <textarea name="address" class="form-control" id="inputAddress" rows="4" placeholder="1234 Main St" cols="30"><?php echo $res['address']; ?></textarea>
  </div>

  

  </br></br>
  <input type="submit" name="SubmitButton" class="btn btn-primary"/>
</form>

  </div>

<?php 
}

if(isset($_GET['delete_id'])) {
  $id = $_GET['delete_id']; 
  $sql = "DELETE FROM users WHERE id=$id";
  if (mysqli_query($mysqli, $sql)) {
    echo "Record deleted successfully";
    header("location:index.php");
  } else {
    echo "Error deleting record: " . mysqli_error($mysqli);
  }

  }
 
include("footer.php");
?>

 