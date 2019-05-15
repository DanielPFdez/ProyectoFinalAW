<?php include './hf/header.php';?>


    <div class="site-section">
      <div class="container">
        <div class="row mb-5">

          <div class="col-xl-1">
            <h2>Cart</h2>
          </div>

          <div class="col-xl-2">
            <form action="./history.php" method="post">
              <button type='submit' class='btn btn-outline-primary align-middle'>Shopping history</button>
            </form>
          </div>


        </div>

          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Skin</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-remove">Remove</th>
                  </tr>
                </thead>
                <tbody>

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
                          echo "<button type='submit' class='btn btn-primary align-middle'>Remove</button></form></td>";
                        echo "</tr>";
                      }
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </form>

          <div class="col-xl-2">
            <form action="./buyAction.php" method="post">
              <button type='submit' class='btn btn-lg btn-primary btn-block align-middle' style="border-radius: 25px;">Buy</button>
            </form>
          </div>
        </div>



      </div>
    </div>


  </div>

  <?php include './hf/footer.php';?>
