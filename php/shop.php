<?php include './hf/header.php';?>


    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-9 order-2">

            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="float-md-left mb-4"><h2 class="text-black h5">Shop</h2></div>
              </div>
            </div>

            <div class="row mb-5">

              <?PHP
                if (isset($_POST['submit']) && isset($_POST['category'])  && !isset($_POST['sort'])){
                  $categoria = $_POST['category'];
                  $result = mysqli_query($con,"SELECT * FROM skins WHERE campeon = '$categoria'");
                }else if (isset($_POST['submit']) && !isset($_POST['category'])  && isset($_POST['sort'])){
                  $sort = $_POST['sort'];
                  $result = mysqli_query($con,"SELECT * FROM skins ORDER BY $sort");
                }else if (isset($_POST['submit']) && isset($_POST['category'])  && isset($_POST['sort'])){
                  $categoria = $_POST['category'];
                  $sort = $_POST['sort'];
                  $result = mysqli_query($con,"SELECT * FROM skins WHERE campeon = '$categoria' ORDER BY $sort");
                }else{
                  $result = mysqli_query($con,"SELECT * FROM skins");
                }

                while($row = mysqli_fetch_array($result)) {
                  echo "<div class='col-sm-6 col-lg-4 mb-4' data-aos='fade-up´''>";
                    echo "<div class='block-4 text-center border'>";
                      echo "<figure class='block-4-image'>";
                        echo "<img src='../images/skins/{$row['foto']}' alt='Image placeholder' class='img-fluid'>";
                      echo "</figure>";
                      echo "<div class='block-4-text p-4'>";
                        echo "<h3>{$row['nombre']}</h3>";
                        echo "<p class='mb-0'>{$row['fabricante']} - {$row['origen']}</p>";
                        echo "<p class='text-primary font-weight-bold'>RP: ". $row['precio'] ."</p>";

                        echo "<p><form action='./shop-single.php' method='post'>";
                          echo "<button class='btn btn-primary' type='submit' name='id' value={$row['idskins']} > Ver Skin </button>";
                        echo "</form></p>";

                      echo "</div>";
                    echo "</div>";
                  echo "</div>";
                }
              ?>
            </div>
          </div>

          <div class="col-md-3 order-1 mb-5 mb-md-0">
            <div class="border p-4 rounded mb-4">
              <form action='' method='post'>
                <?php include './menu.php';?>
              </form>
            </div>
        </div>

      </div>
    </div>

<?php include './hf/footer.php';?>
