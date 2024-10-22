<?php
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/51hMCqz5HgZc42ZxV7C7VVVhEzSeybW6B5y7h38" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>PHP CRUD Application</title>
  <style>
    body {
      background-color: #f8f9fa;
    }
    .navbar {
      background-color: #007bff;
    }
    .alert {
      margin-top: 20px;
    }
    .table {
      border-radius: 0.5rem;
      overflow: hidden;
    }
    th, td {
      vertical-align: middle;
    }
    .action-icons a {
      margin: 0 5px;
      color: #007bff;
    }
    .action-icons a:hover {
      color: #0056b3;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5 text-white">
    CRUD APPLICATION
  </nav>

  <div class="container">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . htmlspecialchars($msg) . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <a href="add-new.php" class="btn btn-primary mb-3">Add New</a>

    <table class="table table-hover text-center">
      <thead class="table-light">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Email</th>
          <th scope="col">Gender</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `crud`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo htmlspecialchars($row["id"]); ?></td>
            <td><?php echo htmlspecialchars($row["first_name"]); ?></td>
            <td><?php echo htmlspecialchars($row["last_name"]); ?></td>
            <td><?php echo htmlspecialchars($row["email"]); ?></td>
            <td><?php echo htmlspecialchars($row["gender"]); ?></td>
            <td class="action-icons">
              <a href="edit.php?id=<?php echo $row["id"]; ?>" class="fs-5" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
              <a href="delete.php?id=<?php echo $row["id"]; ?>" class="fs-5" title="Delete"><i class="fa-solid fa-trash"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pZyB08n3WrIkF7+I3sTR3/AkT/ERqzR/P0J+xzy+qG74fR3N+WZn1/T3pG3iXkVg" crossorigin="anonymous"></script>
</body>

</html>
