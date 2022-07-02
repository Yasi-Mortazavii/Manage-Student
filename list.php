<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lib/bootstrap.min.css">
    <script src="lib/bootstrap.min.js"></script>
    <script src="lib/jQuery.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h3 class="mt-5">student list</h3>
        <?php
        if(isset($_GET['delete_msg'])){
         ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong><?= $_GET['delete_msg']?></strong>  Row/s Effected.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
       <?php   
          }
       ?> 
    <table class="table mt-5">
      <form action="delete.php" method="post">
    <thead>
        <tr>
        <th scope="col"></th>
        <th scope="col">name</th>
        <th scope="col">age</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $constr = mysqli_connect("127.0.0.1", "root", "", "university");
            $q = "select * from student";
            $query = mysqli_query($constr, $q);

            while($res = mysqli_fetch_assoc($query)){
        ?>
        <tr>
            <td>
              <input type="checkbox" name="st_id[]"  value="<?= $res['id']?>">
            </td>
            <td><?= $res['name']?></td>
            <td><?= $res['age']?></td>
        </tr>

        <?php 

            }
        ?>
    </tbody>
   </table>
   <input type="submit" class="btn btn-danger" value="delete">
   </form>
   <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add New Student 
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD NEW</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="row g-3 needs-validation" novalidate action="add.php" method="post">
  <div class="col-md-6">
    <label for="validationCustom01" class="form-label">Name</label>
    <input type="text" class="form-control" id="validationCustom01" name="name"  required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">Age</label>
    <input type="text" class="form-control" name="age" id="validationCustom02" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
</div>
<div class="modal-footer">
  <button class="btn btn-primary" name="save" type="submit">Submit form</button>
  </form>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    </div>
</body>
</html>