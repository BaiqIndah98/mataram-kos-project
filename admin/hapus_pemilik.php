<?php 
session_start();
if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'function/all_function.php';

$id = $_GET["id"];

if(hapus_pemilik($id) > 0){
    echo "
        <script>
            alert('Data berhasil dihapus');
            document.location.href = 'kelola_pemilik.php';
        </script>
    ";
}else{
    echo "
    <script>
        alert('Data gagal dihapus');
        document.location.href = 'kelola_pemilik.php';
    </script>
    ";
}

?>