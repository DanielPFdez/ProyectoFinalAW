<meta charset="UTF-8">
<?PHP
  session_start();

  if(!isset($_SESSION['sess_user'])){
    header("Location:index.php");
  }else {
    $con = mysqli_connect('localhost','danielpf','Kaizen30','pfinal');

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    //From here
    $valido = true;
    $borrar=mysqli_query($con,"SELECT s.idskins, s.c_almacen, h.cantidad FROM skins s, historial h WHERE s.idskins=h.idskin AND h.u_correo='{$_SESSION['sess_user']}' AND h.pagado=0;");

    while($row = mysqli_fetch_array($borrar)){
      echo "Producto: {$row['idskins']}<br>";
      echo "Carrito: {$row['c_almacen']}<br>";
      echo "Usuario: {$row['cantidad']}<br>";

      $stock = $row['c_almacen'] - $row['cantidad'];
      if($stock < 0){
        $valido = false;
      }
      echo "Resultado: $stock<br><br><br>";
    }

    if($valido == true){
      // echo "Compra valida<br><br>";

      $ejecutar=mysqli_query($con,"SELECT s.idskins, s.c_almacen, h.cantidad FROM skins s, historial h WHERE s.idskins=h.idskin AND h.u_correo='{$_SESSION['sess_user']}' AND h.pagado=0;");
      while($fila = mysqli_fetch_array($ejecutar)){
        $stock = $fila['c_almacen'] - $fila['cantidad'];
        mysqli_query($con,"UPDATE skins SET c_almacen=$stock WHERE idskins={$fila['idskins']}");
      }

      $result = mysqli_query($con,"UPDATE historial SET pagado=1, fecha_compra=Date_format(now(),'%Y/%M/%d %h:%i:%s %p') WHERE u_correo='{$_SESSION['sess_user']}' AND pagado=0");
      header("Location: ./history.php");
    }else{
      header("Location: ./buyError.php");
    }

    //to here
  }
?>
