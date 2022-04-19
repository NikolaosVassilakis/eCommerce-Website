<div class="spacemaker"></div>
<table class="order-table">
  <caption>
      <?php
      if($_SESSION["usertype"] == "admin"){
          echo 'Archivo de ordenes';

      } else if($_SESSION["usertype"] == "user"){
          echo 'Historial de ordenes';

      } else {
          echo 'Si lees esto por favor contactanos ERROR: Orden Sin Derecho!';

      }
      ?>
   </caption>
  <thead>
    <tr>
      <th colspan="3" scope="col">Shipping Details</th>
      <th colspan="2" scope="col">Products</th>
      <th colspan="1" scope="col">Payment</th>
      <th colspan="1" scope="col">Payment Date</th>
      <th colspan="1" scope="col">Reference</th>

    </tr>
  </thead>
  <tbody>

  <?php
  $usersID = $_SESSION["userid"];
  if($_SESSION["usertype"] == "admin"){
    $sql = "SELECT * FROM orders;";
    $stmt = mysqli_stmt_init($conn);
  } else if($_SESSION["usertype"] == "user") {
    $sql = "SELECT * FROM orders WHERE users_id=$usersID;";
    $stmt = mysqli_stmt_init($conn);
  } else {
      header("Location: index.php?message=nohayderechosaqui");
      exit();
  }
  
  if(!mysqli_stmt_prepare($stmt, $sql)){
      echo "SQL statement order failed";
    } else {
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      while ($row = mysqli_fetch_assoc($result)){
        $list = str_replace(',', '</p><p>', $row['oProducts']);


  ?>
    <tr>

      <td colspan="3" data-label="Shipping Details">

          <p><span>Name: </span><?= $row["oFirstName"] ?> <?= $row["oLastName"] ?></p>
          <p><span>Company: </span><?= $row["oCompany"] ?></p>
          <p><span>Address 1: </span><?= $row["oAddress1"] ?></p>
          <p><span>Address 2: </span><?= $row["oAddress2"] ?></p>
          <p><span>Number: </span><?= $row["oASU"] ?></p>
          <p><span>Country: </span><?= $row["oCountry"] ?></p>
          <p><span>City: </span><?= $row["oCity"] ?></p>
          <p><span>State: </span><?= $row["oState"] ?></p>
          <p><span>Postcode: </span><?= $row["oPostcode"] ?></p>
          <?php

          if($_SESSION['usertype'] == "admin"){
            echo '<p><span>Email: </span>'.$row["order_email"].'</p>';
          } else {
            echo '';
          }

          ?>
          <p><span>Telephone: </span><?= $row["oTelephone"] ?></p>
          
      </td>

      <td colspan="2" data-label="Products">
        <p><?= $list ?></p>
        

      </td>

      <td colspan="1" data-label="Payment"><p><span>Type: </span><?= $row["payment_type"] ?></p><p><span>Price: </span>$ <?= $row["oPrice"] ?></p></td>

      <td colspan="1" data-label="Payment Date"><?= $row["oDate"] ?></td>

      <td colspan="1" data-label="Reference"><p><span>Payment ID:</span></p><p><?= $row["payment_id"] ?></p><p><span>Order ID:</span></p><p><?= $row["order_id"] ?></p></td>

    </tr>
  


  <?php
        }
    }
  ?>











  

  </tbody>
</table>
<div class="spacemaker"></div>