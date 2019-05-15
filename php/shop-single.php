<?php include './hf/header.php';?>


    <div class="site-section">
      <div class="container">

        <!-- Product -->
        <?PHP

          if (!isset($_POST['id'])){
            header("Location:../index.php");
          }else{
            $id = $_POST['id'];
            $result = mysqli_query($con,"SELECT * FROM skins WHERE idskins = $id");

            $row = mysqli_fetch_array($result);
            echo "<div class='row'>";
              echo "<div class='col-md-6'>";
                echo "<img src='../images/skins/{$row['foto']}' alt='Image' class='img-fluid'>";
              echo "</div>";
              echo "<div class='col-md-6'>";
                echo "<h2 class='text-black'>".$row['nombre']."</h2>";
                echo "<p>".$row['descripcion']."</p>";
                echo "<p class='mb-4'>{$row['fabricante']} - {$row['origen']}</p>";
                echo "<p><strong class='text-primary h4'>RP: ". $row['precio'] ."</strong></p>";
                echo "<h5 style='color: gray;'> Stock: ". $row['c_almacen'] ."</h5><br>";
                if(isset($_SESSION['sess_user'])){
                  if($row['c_almacen']>0){
                    echo "<form class='form-inline' action='./addCart.php' method='post'>";
                    echo "<input type='hidden' name='product' value='{$row['idskins']}'</input>";
                    echo "<button type='submit' class='btn btn-primary'>Add to cart</button>";
                    echo "<div class='form-group'><h5>&nbsp&nbsp&nbsp&nbspQuantity: &nbsp</h5><input type='number' name='cantidad' min=1 max={$row['c_almacen']} value=1 class='form-control'></div></form>";
                  }
                }
              echo "</div>";
            echo "</div>";
          }
        ?>

      </div>
    </div>

  </div>
  <?php include './hf/footer.php';?>
