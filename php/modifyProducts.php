<meta charset="UTF-8">
<?php include './hf/header.php';?>

  <?PHP
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    if(!isset($_SESSION['sess_user'])){
      header("Location:../index.php");
    }else{
      $admin = $_SESSION['sess_user'];
      if($admin != 'admin@danielpf.com'){
          header("Location:../index.php");
      }
    }
   ?>
    <style>
      .box {
        padding-top: 3px;
        border:1px;
        border-style: solid;
        border-color:#DDD;
        border-radius: 5px;
        word-wrap: break-word;
        font-size: 15px;
        text-align: center;
      }
      .titlebox {
        color:white;
        background-color: #222;
      }
    </style>


   <div class="container">
     <!-- Page Heading -->
     <h1 class="my-3">Skins in Existence</h1>
       <div class='row my-6' >
         <div class="col-xl-1 titlebox box">
           Name
         </div>

         <div class="col-xl-3 titlebox box">
           Description
         </div>

         <div class="col-xl-1 titlebox box">
           Photo
         </div>

         <div class="col-xl-1 titlebox box">
           Price
         </div>

         <div class="col-xl-1 titlebox box" style="font-size:13px">
          Stock
         </div>

         <div class="col-xl-1 titlebox box" style="font-size:14px">
           Breed
         </div>

         <div class="col-xl-1 titlebox box">
           Origin
         </div>

         <div class="col-xl-1 titlebox box" style="font-size:14px">
           Champion
         </div>

     </div>
     <?php
         if (mysqli_connect_errno()) {
           echo "Failed to connect to MySQL: " . mysqli_connect_error();
         }


           $result = mysqli_query($con,"SELECT * FROM skins");


           while($row = mysqli_fetch_array($result)) {
             echo "<form action='./updateProduct.php' method='post'>";
             echo "<div class='row my-6' >";
             echo "<textarea class='col-xl-1 box' name='nombre'>{$row['nombre']}</textarea>";
             echo "<textarea class='col-xl-3 box' name='descripcion'>{$row['descripcion']}</textarea>";
             echo "<div class='col-xl-1 box'><img src='../images/skins/{$row['foto']}' style='max-width:100%; display:block; max-height:100%;'></img></div>";
             echo "<textarea class='col-xl-1 box' name='precio'>{$row['precio']}</textarea>";
             echo "<textarea class='col-xl-1 box' name='c_almacen'>{$row['c_almacen']}</textarea>";
             echo "<textarea class='col-xl-1 box' name='fabricante'>{$row['fabricante']}</textarea>";
             echo "<textarea class='col-xl-1 box' name='origen'>{$row['origen']}</textarea>";
             echo "<textarea class='col-xl-1 box' name='campeon'>{$row['campeon']}</textarea>";
             echo "<div> <button class='btn btn-primary btn-sm' name='idskins' value ={$row['idskins']} type='submit'>Update</div>";
             echo "</div>";
             echo "</form>";
           }
     ?>
     <div class='form-group'>
       <div class='col-sm-offset-2 col-sm-12'>
       <a href='./admin.php' class='button'>Return to Admin</a>
     </div>
   </div>

         </div>
       </div>
<?php include './hf/footer.php';?>
