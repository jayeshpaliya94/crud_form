<?php
include("header.php");
?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">hobbies</th>
      <th scope="col">Gender</th>
      <th scope="col">Country</th>
      <th scope="col">City</th>
      <th scope="col">Zipcode</th>
      <th scope="col">Address</th>
      <th scope="col">Profile</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  <?php 

$sql = "SELECT * FROM users";
$result = mysqli_query($mysqli, $sql);  
if (mysqli_num_rows($result) > 0) {
  $i = 1;
  while($row = mysqli_fetch_assoc($result)) {

			$p_url = "<img src='".$row['profile_pic']."' height='65px'  />";
    ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['fname']; ?></td>
        <td><?php echo $row['lname']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['hobbies']; ?></td>
        <td><?php echo $row['gender']; ?></td>
        <td><?php echo $row['country']; ?></td>
        <td><?php echo $row['city']; ?></td>
        <td><?php echo $row['zip']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td><?php echo $p_url; ?></td>
        <td><a href="action.php?edit_id=<?php echo $row['id'];?> ">Edit</a>&nbsp;&nbsp;<a onclick="return confirm('Delete entry?')" href="action.php?delete_id=<?php echo $row['id'];?>" onclick="document.getElementById('id01').style.display='block'">Delete</a></td>
      </tr>

    <?php
  $i++;
  }
}

?>
  </tbody>
</table>

<?php
include("footer.php");
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
