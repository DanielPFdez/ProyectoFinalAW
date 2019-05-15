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


   <div class="container">
     <!-- Page Heading -->

     <div class="col-lg-12">
       <div class="card mt-4">
       <div class="card-body">
         <h1 class="my-2">New Product</h1>

         <h6 style="color:red">
           <?php
             if(!isset($_POST['nombre']) || !isset($_POST['precio']) || !isset($_POST['c_almacen']) || !isset($_POST['fabricante']) || !isset($_POST['origen']) || !isset($_POST['campeon']) || !isset($_POST['descripcion'])){
               echo "Fill all the inputs.";
             }else{
               $nombre = $_POST['nombre'];
               $precio = $_POST['precio'];
               $c_almacen = $_POST['c_almacen'];
               $fabricante = $_POST['fabricante'];
               $origen = $_POST['origen'];
               $campeon = $_POST['campeon'];
               $descripcion = $_POST['descripcion'];

               $result = mysqli_query($con,"SELECT * FROM skins ORDER BY idSkins DESC");
               $row = mysqli_fetch_array($result);

               $target_dir = "../img/skins/";
               $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
               $uploadOk = 1;
               $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
               // Check if image file is a actual image or fake image
               if(isset($_POST["submit"])) {
                   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                   if($check !== false) {
                       $uploadOk = 1;
                   } else {
                       echo "File is not an image.<br>";
                       $uploadOk = 0;
                   }
               }
               // Check if file already exists
               if (file_exists($target_file)) {
                   echo "Sorry, file already exists.<br>";
                   $uploadOk = 0;
               }
               // Check file size
               if ($_FILES["fileToUpload"]["size"] > 500000) {
                   echo "Sorry, your file is too large.<br>";
                   $uploadOk = 0;
               }
               // Allow certain file formats
               if($imageFileType != "jpg") {
                   echo "Sorry, only JPG files are allowed.<br>";
                   $uploadOk = 0;
               }
               // Check if $uploadOk is set to 0 by an error
               if ($uploadOk == 0) {
                   echo "Sorry, your file was not uploaded.<br>";

               // if everything is ok, try to upload file
               } else {
                 $foto = basename($_FILES["fileToUpload"]["name"]);
                 $query =  "INSERT INTO skins (nombre, descripcion, foto, precio, c_almacen, fabricante, origen, campeon) VALUES ('$nombre' , '$descripcion', '$foto', $precio, $c_almacen, '$fabricante', '$origen', '$campeon')";
                 $result = mysqli_query($con, $query);

                 if($result){
                     echo "The product '$nombre' with the image file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded to the Data Base.<br>";
                     echo "<div class='form-group'>";
                       echo "<div class='col-sm-offset-2 col-sm-12'>";
                       echo "<a href='./admin.php' class='button'>Retrun to Admin</a>";
                     echo "</div>";
                   echo "</div>";
                 }else{
                    echo "Fill all the inputs.";
                 }
               }
             }

           ?>
         </h6>

         <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

           <div class="row">

            <!-- nombre -->
             <div class="col-xl-6">
               <div class="form-group">
                 <label class="control-label col-sm-12">Skin Name</label>
                 <div class="col-sm-12">
                   <input type="text" maxlength="30" name="nombre" class="form-control" placeholder="Enter name">
                 </div>
               </div>
             </div>

             <!-- precio -->
              <div class="col-xl-6">
                <div class="form-group">
                  <label class="control-label col-sm-12">Price</label>
                  <div class="col-sm-12">
                    <input type="number" maxlength="11" name="precio" class="form-control" placeholder="Enter price">
                  </div>
                </div>
              </div>

              <!-- cantidad -->
               <div class="col-xl-6">
                 <div class="form-group">
                   <label class="control-label col-sm-12">Stock</label>
                   <div class="col-sm-12">
                     <input type="number" maxlength="11" name="c_almacen" class="form-control" placeholder="Enter Stock">
                   </div>
                 </div>
               </div>

               <!-- fabricante -->
                <div class="col-xl-6">
                  <div class="form-group">
                    <label class="control-label col-sm-12">Breed</label>
                    <div class="col-sm-12">
                      <input type="text" maxlength="20" name="fabricante" class="form-control" placeholder="Enter Company">
                    </div>
                  </div>
                </div>

            <!-- origen -->
             <div class="col-xl-6">
               <div class="form-group">
                 <label class="control-label col-sm-12">Origin</label>
                 <div class="col-sm-12">
                   <input type="text" maxlength="20" name="origen" class="form-control" placeholder="Enter country">
                 </div>
               </div>
             </div>

            <!-- categoria -->
             <div class="col-xl-6">
               <div class="form-group">
                 <label class="control-label col-sm-12">Champion</label>
                 <div class="col-sm-12">
                   <select  class="form-control" name="campeon">
                     <option value="Ahri">Ahri</option>
                     <option value="Kindred">Kindred</option>
                     <option value="Irelia">Irelia</option>
                     <option value="Janna">Janna</option>
                     <option value="RekSai">Rek'Sai</option>
                     <option value="Leona">Leona</option>
                     <option value="Orianna">Orianna</option>
                     <option value="Urgot">Urgot</option>
                     <option value="Ashe">Ashe</option>
                   </select>
                 </div>
               </div>
             </div>

             <!-- file upload-->
              <div class="col-xl-6">
                <div class="form-group">
                  <label class="control-label col-sm-12">Select image to upload:</label>
                  <div class="col-sm-12">
                      <input type="file" name="fileToUpload" id="fileToUpload">
                  </div>
                </div>
              </div>

            <!-- descripcion -->
             <div class="col-xl-12">
               <div class="form-group">
                 <label class="control-label col-sm-12">Description</label>
                 <div class="col-sm-12">
                   <textarea type="textarea" rows="5" maxlength="500" name="descripcion" class="form-control" placeholder="Enter a brief description"></textarea>
                 </div>
               </div>
             </div>

            <!-- Submit -->
             <div class="col-xl-12">
               <div class="form-group">
                 <div class="col-sm-12">
                   <button type="submit" name="submit" class="btn btn-primary btn-block">Insert Product</button>
                 </div>
               </div>
             </div>

           </div>
         </form>
       </div>
     </div>
     <div class='form-group'>
       <div class='col-sm-offset-2 col-sm-12'>
       <a href='./admin.php' class='button'>Retrun to Admin</a>
     </div>
   </div>
    <!-- /.container -->

<?php include './hf/footer.php';?>
