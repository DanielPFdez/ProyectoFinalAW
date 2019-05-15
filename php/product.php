<?php include './hf/header.php';?>

    <!-- Page Content -->
    <div class="container">

      <!-- Product -->
      <?PHP

        if (!isset($_POST['id'])){
          header("Location:../index.php");
        }else{
          $id = $_POST['id'];
          $result = mysqli_query($con,"SELECT * FROM skins WHERE idSkins = $id");

          $row = mysqli_fetch_array($result);
            echo "<br><h1 class='my-0'>". $row['nombre'] ."  ";
            echo "<small> - ". $row['fabricante'] ."</small></h1>";
            echo "<div class='row'>";
            echo "<div class='col-md-6'>";
            echo "<a href='#'>";
            echo "<img class='img-fluid rounded mb-0 mb-md-0' src='../images/skins/{$row['foto']}' alt=''>";
            echo "</a></div>";
            echo "<div class='col-md-5'><br><br><br>";
            echo "<p style='font-size: 30px;'>". $row['descripcion'] ."</p>";
            echo "<h3> $". $row['precio'] ."</h3><br>";
            echo "<h5 style='color: gray;'> Almacen: ". $row['c_almacen'] ."</h5><br>";
            if(isset($_SESSION['sess_user'])){
              if($row['c_almacen']>0){
                echo "<form class='form-inline' action='./addCart.php' method='post'>";
                echo "<input type='hidden' name='product' value='{$row['idSkins']}'</input>";
                echo "<button type='submit' class='btn btn-primary'>Agregar al Carrito</button>";
                echo "<div class='form-group'><h5> &nbsp&nbsp&nbsp Cantidad: &nbsp</h5><input type='number' name='cantidad' min=1 max={$row['c_almacen']} value=1 class='form-control'></div></form>";
              }
            }
            echo "</div></div>";
        }
      ?>
    </div>
    <!-- /.container -->

<?php include './hf/footer.php';?>
