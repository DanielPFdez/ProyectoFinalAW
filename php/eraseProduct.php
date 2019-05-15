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

    $result = mysqli_query($con,"DELETE FROM skins WHERE idSkins={$_POST['eliminar']}");
    header("Location: ./editProducts.php");
?>
