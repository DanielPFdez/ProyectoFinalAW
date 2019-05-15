<?PHP
  session_start();

  if(!isset($_SESSION['sess_user'])){
    header("Location:../index.php");
  }else{
    $admin = $_SESSION['sess_user'];
    if($admin != 'admin@danielpf.com'){
        header("Location:../index.php");
    }
  }

    $con = mysqli_connect('localhost','danielpf','Kaizen30','pfinal');

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $c_almacen = $_POST['c_almacen'];
    $fabricante = $_POST['fabricante'];
    $origen = $_POST['origen'];
    $campeon = $_POST['campeon'];

    $result = mysqli_query($con,"UPDATE skins SET nombre='$nombre', descripcion='$descripcion', precio=$precio, c_almacen=$c_almacen, fabricante='$fabricante', origen='$origen', campeon='$campeon' WHERE idskins={$_POST['idskins']}");
    header("Location: ./modifyProducts.php");
?>
