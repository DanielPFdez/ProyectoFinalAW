<?php include './hf/header.php';?>

  <?PHP
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    if(!isset($_SESSION['sess_user'])){
      header("Location:../index.php");
    }else {
      $admin = $_SESSION['sess_user'];
      if($admin != 'admin@danielpf.com'){
          header("Location:../index.php");
      }
    }
   ?>


    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-5">Administration Page</h1>
        <h3>Select an Option</h3>


      <div class="row">
        <div class="col-lg-6 col-sm-6 portfolio-item ">
          <div class="card card text-center">
            <div class="align-middle" style="width: 200px; height: 200px; margin:auto; padding-top:10px;">
              <a href="./addProducts.php"><img class="card-img-top" src="../images/new.png" alt=""></a>
            </div>
            <div class="card-body">
              <h4 class="card-title">
                <a href="./addProducts.php">Add Products</a>
              </h4>
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-sm-6 portfolio-item text-center">
          <div class="card card text-center">
            <div class="align-middle" style="width: 200px; height: 200px; margin:auto; padding-top: 10px;">
              <a href="./editProducts.php"><img class="card-img-top" src="../images/erase.png" alt=""></a>
            </div>
            <div class="card-body">
              <h4 class="card-title">
                <a href="./editProducts.php">Remove Products</a>
              </h4>
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-sm-6 portfolio-item text-center">
          <div class="card card text-center">
            <div class="align-middle" style="width: 200px; height: 200px; margin:auto; padding-top: 10px;">
              <a href="./modifyProducts.php"><img class="card-img-top" src="../images/update.png" alt=""></a>
            </div>
            <div class="card-body">
              <h4 class="card-title">
                <a href="./modifyProducts.php">Modify Products</a>
              </h4>
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-sm-6 portfolio-item text-center">
          <div class="card card text-center">
            <div class="align-middle" style="width: 200px; height: 200px; margin:auto; padding-top: 10px;">
              <a href="./adminhistory.php"><img class="card-img-top" src="../images/hist.png" alt=""></a>
            </div>
            <div class="card-body">
              <h4 class="card-title">
                <a href="./adminhistory.php">Purchase history</a>
              </h4>
            </div>
          </div>
        </div>

    </div>
    <!-- /.container -->

<?php include './hf/footer.php';?>
