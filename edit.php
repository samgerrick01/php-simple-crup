<?php
include "db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $leader = $_POST['leader'];
  $member1 = $_POST['member1'];
  $member2 = $_POST['member2'];
  $member3 = $_POST['member3'];
  $title = $_POST['title'];
  $department = $_POST['department'];
  $year = $_POST['year'];

  $sql = "UPDATE `members` SET `leader`='$leader',`member1`='$member1',`member2`='$member2',`member3`='$member3',`title`='$title',`department`='$department',`year`='$year' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: index.php?msg=Data updated successfully!");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>PHP CRUD Application</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    PHP Complete CRUD Application
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit User Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM `members` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Members:</label>
            <input required type="text" class="form-control" name="leader" value="<?php echo $row['leader'] ?>">
            <input required type="text" class="form-control mt-1" name="member1" value="<?php echo $row['member1'] ?>">
            <input required type="text" class="form-control mt-1" name="member2" value="<?php echo $row['member2'] ?>">
            <input type="text" class="form-control mt-1" name="member3" value="<?php echo $row['member3'] ?>">
          </div>

          <div class="col">
            <label class="form-label">Title:</label>
            <input required type="text" class="form-control" name="title" value="<?php echo $row['title'] ?>">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Department/Course:</label>
          <input required type="text" class="form-control" name="department" value="<?php echo $row['department'] ?>">
        </div>

        <div class="form-group mb-3">
          <label>Year:</label>
          &nbsp;

          <select id="year" name="year">
            <?php
            $currentYear = date("Y");
            $startYear = $currentYear - 5;
            $endYear = $currentYear;

            $defaultYear = $row['year'];

            for ($Syear = $startYear; $Syear <= $endYear; $Syear++) {

              $isSelected = ($defaultYear == $Syear) ? 'selected' : '';
              echo "<option value='$Syear' $isSelected>$Syear</option>";
            }
            ?>
          </select>

        </div>

        <div>
          <button type=" submit" class="btn btn-success" name="submit">Update</button>
          <a href="index.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>