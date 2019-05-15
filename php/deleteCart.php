
<?php
  session_start();

  if(!isset($_SESSION['sess_user'])){
    header("Location:../index.php");
  }else {
    $product = $_POST['product'];
    $conn = mysqli_connect('localhost','danielpf','Kaizen30','pfinal');
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $result = mysqli_query($conn,"DELETE FROM historial WHERE idskin=$product AND u_correo='{$_SESSION['sess_user']}';");
    header("Location:./micart.php");
  }
?>
