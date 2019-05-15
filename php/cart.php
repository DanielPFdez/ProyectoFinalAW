<?php include './hf/header.php';?>

    <!-- Page Content -->
    <div class="container">
      <div class="row my-3">

        <div class="col-xl-1">
          <h2>Carro</h2>
        </div>

        <div class="col-xl-2">
          <form action="./history.php" method="post">
            <button type='submit' class='btn btn-outline-primary align-middle'>Historial de Compras</button>
          </form>
        </div>

        <div class="col-xl-7">
        </div>

        <div class="col-xl-2">
          <form action="./buyAction.php" method="post">
            <button type='submit' class='btn btn-lg btn-primary btn-block align-middle' style="border-radius: 25px;">Buy</button>
          </form>
        </div>
      </div>

      <table class="table" style="text-align: center;">
        <thead class="thead-dark">
          <tr>
            <th>Juego</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Borrar</th>
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

            $result = mysqli_query($con,"SELECT DISTINCT u.correo, s.foto, s.nombre, s.precio, h.cantidad, h.idskin FROM historial h, skins s, usuarios u WHERE h.idskin=s.idskins AND u.correo=h.u_correo AND h.u_correo='{$_SESSION['sess_user']}' AND h.pagado=0;");

            while($row = mysqli_fetch_array($result)) {
              echo "<tr>";
                echo "<td class='align-middle'> <img src='../images/skins/{$row['foto']}' style='height:130px;'> </td>";
                echo "<td class='align-middle'> <h4>{$row['nombre']} </h4></td>";
                echo '<td class="align-middle"> <h4>$'. $row['precio'] .'</h4></td>';
                echo "<td class='align-middle'> <h4>{$row['cantidad']} </h4></td>";
                echo "<td class='align-middle'> <form action='./deleteCart.php' method='post'>";
                echo "<input type='hidden' name='product' value='{$row['idskin']}'</input>";
                echo "<button type='submit' class='btn btn-primary align-middle'>Eliminar</button></form></td>";
              echo "</tr>";
            }
          }
        ?>

        </tbody>
      </table>
    </div>
    <!-- /.container -->
  <?php include './hf/footer.php';?>
