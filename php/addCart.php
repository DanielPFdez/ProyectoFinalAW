<meta charset="UTF-8">
<?php
  session_start();

  if(!isset($_SESSION['sess_user'])){
    header("Location:../index.php");
  }else {
    $product = $_POST['product'];
    $cantidad = $_POST['cantidad'];

    $con = mysqli_connect('localhost','danielpf','Kaizen30','pfinal');
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $quantity = mysqli_query($con,"SELECT cantidad FROM historial WHERE u_correo='{$_SESSION['sess_user']}' AND idskin=$product AND pagado=0");

    $resul_cant = mysqli_fetch_array($quantity);
    if($resul_cant['cantidad']>0){
      echo "act";
      $cantidad = $cantidad + $resul_cant['cantidad'];
      mysqli_query($con,"UPDATE historial SET cantidad = $cantidad WHERE u_correo='{$_SESSION['sess_user']}' AND idskin=$product AND pagado=0");
    }else{
      echo "ins";
      $insert = "INSERT INTO historial (idskin, pagado, cantidad, u_correo, fecha_compra) VALUES ($product, 0, $cantidad,'{$_SESSION['sess_user']}', NULL)";
      $result = mysqli_query($con,$insert);
    }

    header("Location:./micart.php");

  }
?>
