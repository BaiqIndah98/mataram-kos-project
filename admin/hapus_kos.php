<?php 
session_start();
if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}
require_once 'function/all_function.php';

$idKos = $_GET["id"];

if(hapus_kos($idKos) > 0){
    echo "
        <script>
            alert('Data berhasil dihapus');
            document.location.href = 'kelola_kos.php';
        </script>
    ";
}else{
    echo "
        <script>
            alert('Data gagal dihapus');
            document.location.href = 'kelola_kos.php';
        </script>
    ";
}

?>