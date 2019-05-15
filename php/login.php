<?php include './hf/header.php';?>

<meta charset="UTF-8">
   <div class="container">
     <!-- Page Heading -->

     <div class="col-lg-12">
       <div class="card mt-4">
       <div class="card-body">
         <h1 class="my-1">User Login</h1>

         <?php
           if(isset($_POST["submit"])){
             if(!empty($_POST['mail']) && !empty($_POST['pass'])){
               $mail = $_POST['mail'];
               $pass = $_POST['pass'];

               //Selecting Database
               $statement = "SELECT * FROM usuarios WHERE correo='$mail' AND password='$pass'";
               $result = mysqli_query($con, $statement);
               $numrows = mysqli_num_rows($result);

               if($numrows !=0){
                 while($row = mysqli_fetch_array($result)){
                   $dbcorreo=$row['correo'];
                   $dbpassword=$row['password'];
                 }
                 if($mail == $dbcorreo && $pass == $dbpassword){
                    session_start();
                    $_SESSION['sess_user']=$mail;
                    //Redirect Browser


                    if($mail == 'admin@danielpf.com'){
                        header("Location:../php/admin.php");
                    }else{
                      header("Location:../index.php");
                    }
               }
               }else{
                 echo "Invalid Username or Password!";
               }

           }else{
             ?>
             <!--Javascript Alert -->
             <script>alert('Required all fields');</script>
             <?php
           }
         }
         ?>

         <form class="form-horizontal" action="" method="post">
           <br>
           <!-- User -->
           <div class="form-group">
             <label class="control-label col-sm-2">Email:</label>
             <div class="col-sm-12">
               <input type="email" name="mail" class="form-control" id="email" placeholder="Enter email">
             </div>
           </div>
           <!-- Password -->
           <div class="form-group">
             <label class="control-label col-sm-2">Password:</label>
             <div class="col-sm-12">
               <input type="password" name="pass" class="form-control" id="pwd" placeholder="Enter password">
             </div>
           </div>

           <!-- Submit -->
           <div class="form-group">
             <div class="col-sm-offset-2 col-sm-12">
               <button type="submit" name="submit" class="btn btn-primary">Submit</button> &nbsp &nbsp
               <a href="./register.php" class="button">Register</a>
             </div>
           </div>
         </form>
       </div>
     </div>

<?php include './hf/footer.php';?>
