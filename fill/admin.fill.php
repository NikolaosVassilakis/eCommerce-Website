<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <!-- <link rel="stylesheet" href="css/style.css">  -->
  


    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">ADMINISTRACION DE PRODUCTOS</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>

    </ul>
  </div> 
</nav>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
  
        <hr>
        <?php if(isset($_SESSION['response'])){
        ?>
        <div class="alert alert-<?= $_SESSION['res_type'] ?> alert-dismissible text-center">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
 <b><?= $_SESSION['response']; ?></b>
</div>
<?php } unset($_SESSION['response']); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">



<h3 class="text-center text-info">Add Product</h3>
<form action="includes/action.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $id; ?>">
    <div class="form-group">
        <input type="text" name="name" value="<?= $name; ?>" class="form-control" placeholder="Enter name" required>
    </div>
    <div class="form-group">
        <input type="text" name="detail" value="<?= $detail; ?>" class="form-control" placeholder="Enter details" required>
    </div>
    <!--PONER REGLA DE SOLO NUMERO -->
    <div class="form-group">
        <input type="number" name="price" step=".01" value="<?= $price; ?>" class="form-control" placeholder="Enter price" required>
    </div>


    <div class="form-group">
          <select  id="category" name="category" class="form-control" >
        <option value="select">..Selecciona categoria..</option>
        <option value="accesorios">accesorios para el cabello</option>
        <option value="anillos">anillos</option>
        <option value="aretes">aretes</option>
        <option value="collares">collares</option>
        <option value="pearcings">pearcings</option>
        <option value="pulseras">pulseras</option>
        <option value="tobilleras">tobilleras</option>
        </select>
    </div>




    <div class="form-group">
        <input type="hidden" name="oldimage" value="<?= $photo; ?>">
        <input type="file" name="image"  class="custom-file">
        <img src="<?= $photo; ?>" width="120" class="img-thumbnail">
    </div>


    <!-- BOTON DE SUBIR O ACTUALIZAR -->
    <div class="form-group">

    <?php if($update==true){ ?>
      <a href="admin.php" name="cancelar" class="btn btn-danger btn-block" >Cancelar edicion</a>

      <input type="submit" name="update" class="btn btn-success btn-block" value="Update product"> 

        <?php } else{ ?>

        <input type="submit" name="add" class="btn btn-primary btn-block" value="Upload">

        <?php } ?>

    </div>
</form>
        </div>
        <div class="col-md-8">
            <?php
            $query="SELECT * FROM crud";
            $stmt=$conn->prepare($query);
            $stmt->execute();
            $result=$stmt->get_result();
            ?>



        <h3 class="text-center text-info">Product List</h3>
        <table class="table table-hover">
    <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Details</th>
        <th>Price</th>
        <th>Category</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php while($row=$result->fetch_assoc()){ ?>
      <tr>
        <td><img src="<?= $row['photo']; ?>" width="50"></td>
        <td><?= $row['name']; ?></td>
        <td><?= $row['detail']; ?></td>
        <td><?= $row['price']; ?></td>
        <td><?= $row['category']; ?></td>
        <td>
             
            <a href="includes/action.php?delete=<?= $row['id']; ?>" class="badge badge-danger p-2" onclick="return confirm('Do you want to delete this product?');">Delete</a> | 
            <a href="admin.php?edit=<?= $row['id']; ?>" class="badge badge-success p-2">Edit</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
        </div>
    </div>
</div>

        </body>
        </html>