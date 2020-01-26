<?php 

$conn = mysqli_connect("localhost", "root", "", "mtrm_kos");

function tampil_kos($query_kos){
    global $conn;

    $result = mysqli_query($conn, $query_kos);
    $row = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function register_user($data_user){
    global $conn;

    $namaUser = htmlspecialchars($data_user["Nama"]);
    $emailUser = htmlspecialchars($data_user["Email"]);
    $noHp = htmlspecialchars($data_user["No_hp"]);
    $jenisKelamin = $data_user["Jenis_kelamin"];
    $alamat = htmlspecialchars($data_user["Alamat"]);
    $username = strtolower(stripslashes($data_user["Username"]));
    $password = mysqli_real_escape_string($conn, $data_user["Password"]);
    $password2 = mysqli_real_escape_string($conn, $data_user["Password2"]);

    // cek apakah username sudah ada atau belum

    $result = mysqli_query($conn, "SELECT username FROM users WHERE Username = '$username'");

    if(mysqli_fetch_assoc($result)){
        echo "
            <script>
                alert('username sudah ada');
            </script>
        ";
        return false;
    }

    // cek konfirmasi password
    if($password !== $password2){
        echo "
            <script>
                alert('Konfirmasi password tidak sesuai');
            </script>
        ";
        return false;
    }
    // enkripsi password terlebih dahulu
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO users VALUES ('', '$namaUser', '$emailUser', '$noHp', '$jenisKelamin', '$alamat', '$username', '$password')");

    return mysqli_affected_rows($conn);

}

?>