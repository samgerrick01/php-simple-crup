<?php
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Toaster -->
  <style>
    .toast {
      display: none;
      position: fixed;
      top: 70px;
      left: 50%;
      transform: translateX(-50%);
      /* background-color: #5CFF5C !important; */
      color: #000;
      font-weight: 500;
      padding: 10px 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
  </style>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Web & Integrative Programming</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    Web & Integrative Programming
  </nav>

  <div class="container">
    <?php



    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      $showToast = "
      <div id='toast-container' class='toast'></div>
      <script>
      function showToast(msg) {
      var toastContainer = document.getElementById('toast-container');

      toastContainer.style.display = 'block';

      if(msg.includes('deleted')){
        toastContainer.style.backgroundColor = '#FF5C5C';
      } else {
        toastContainer.style.backgroundColor = '#5CFF5C';
      }
     
      toastContainer.innerText = msg;

      setTimeout(function() {
      toastContainer.style.display = 'none';
      }, 3000);
      }
      showToast('$msg');
      </script>";

      echo $showToast;
    }
    ?>
    <a href="add-new.php" class="btn btn-dark mb-3">Add New</a>

    <table class="table table-hover">
      <thead class="table-dark">
        <tr class="w-100">
          <th scope="col" style="width:30%">Members</th>
          <th scope="col" style="width:40%">Title</th>
          <th scope="col" style="width:10%">Department/Course</th>
          <th scope="col" style="width:10%">Year</th>
          <th scope="col" style="width:10%">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `tbl_list`";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {

          $allMembers = ($row['member3'] == '') ? $row['leader'] . " | " . $row['member1'] . " | " . $row['member2'] : $row['leader'] . " | " . $row['member1'] . " | " . $row['member2'] . " | " . $row['member3'];

        ?>
          <tr>

            <td><?php echo $allMembers ?></td>
            <td><?php echo $row["title"] ?></td>
            <td><?php echo $row["department"] ?></td>
            <td><?php echo $row["year"] ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <a href="delete.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>

      </tbody>
    </table>
    <?php $isEmpty = ($result->num_rows == 0) ? true : false;

    if ($isEmpty) {
      echo '<div style="display:flex; justify-content:center; font-weight:500; font-size:x-large;">No Data!</div>';
    } ?>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
  </script>


</body>

</html>