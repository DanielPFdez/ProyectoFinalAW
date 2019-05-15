<meta charset="UTF-8">
<?php include './hf/header.php';?>

    <!-- Page Content -->
    <div class="container">
      <div class="row my-3">
          <h2>Site Purchase History</h2>
      </div>

      <table class="table" style="text-align: center;">
        <thead class="thead-dark">
          <tr>
			<th>User</th>
            <th>Skin</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Date of purchase</th>
          </tr>
        </thead>
        <tbody>

        <!-- Product -->
        <?PHP
          // Check connection
          if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }

          if(!isset($_SESSION['sess_user'])){
            header("Location:../index.php");
          }else {
          $result = mysqli_query($con,"SELECT DISTINCT u.correo,s.foto, s.nombre, s.precio, h.cantidad, h.idskin, h.fecha_compra FROM historial h, skins s, usuarios u WHERE h.idskin=s.idskins AND u.correo=h.u_correo AND pagado=1;");
            while($row = mysqli_fetch_array($result)) {
              echo "<tr>";
			    echo "<td class='align-middle'> <h4>{$row['correo']} </h4></td>";
                echo "<td class='align-middle'> <img src='../images/skins/{$row['foto']}' style='height:130px;'> </td>";
                echo "<td class='align-middle'> <h4>{$row['nombre']} </h4></td>";
                echo '<td class="align-middle"> <h4>$'. $row["precio"] .'</h4></td>';
                echo "<td class='align-middle'> <h4>{$row['cantidad']} </h4></td>";
                echo "<td class='align-middle'> <h4>{$row['fecha_compra']} </h4></td>";
              echo "</tr>";
            }
          }
        ?>

        </tbody>
      </table>
      <div class='form-group'>
        <div class='col-sm-offset-2 col-sm-12'>
        <a href='./admin.php' class='button'>Return to Admin</a>
      </div>
    </div>
    </div>
    <!-- /.container -->
<?php include './hf/footer.php';?>
