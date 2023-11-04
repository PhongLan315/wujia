<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="crud.php">PHP CRUD OPERATION</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="crud.php">Home</a>
            </li>
            <li class="nav-item">
              <a type="button" class="btn btn-primary nav-link active" href="create.php">Add New</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container my-4">
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>PHONE</th>
            <th>JOINING DATE</th>
            <th>ACTIONS</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include "connection.php";
            $sql = "select * from crud";
            $result = $conn->query($sql);
            if(!$result){
              die("Invalid query!");
            }
            while($row=$result->fetch_assoc()){
              echo "  
          <tr>
            <th>$row[id]</th>
            <td>$row[name]</td>
            <td>$row[email]</td>
            <td>$row[phone]</td>
            <td>$row[join_date]</td>
            <td>
              <a class='btn btn-success' href='edit.php?id=$row[id]'>Edit</a>
              <a class='btn btn-danger' href='delete.php?id=$row[id]'>Delete</a>
            </td>
          </tr>
          ";
            }
          ?>
        </tbody>
      </table>
    </div>
  </body>
</html>