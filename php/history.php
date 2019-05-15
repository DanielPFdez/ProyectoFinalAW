<?php include './hf/header.php';?>

    <!-- Page Content -->
    <div class="container">
      <div class="row my-3">
          <h2>Shopping history</h2>
      </div>

      <table class="table" style="text-align: center;">
        <thead class="thead-dark">
          <tr>
            <th>Skin</th>
            <th>Product</th>
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
          $query = "SELECT DISTINCT u.correo, s.foto, s.nombre, s.precio, h.cantidad, h.idskin, h.fecha_compra FROM historial h, skins s, usuarios u WHERE h.idskin=s.idskins AND u.correo=h.u_correo AND h.u_correo='{$_SESSION['sess_user']}' AND h.pagado=1;";
          $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($result)) {
              echo "<tr>";
                echo "<td class='align-middle'> <img src='../images/skins/{$row['foto']}' style='height:200px;'> </td>";
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
    </div>
    <!-- /.container -->
<?php include './hf/footer.php';?>
