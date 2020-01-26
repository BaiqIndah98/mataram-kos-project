<?php 

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "mtrm_kos");

// function untuk pemilik 
function tampil_pemilik($query_pemilik){
    global $conn;
    $result = mysqli_query($conn, $query_pemilik);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah_pemilik($data_pemilik){
    global $conn;

    $nama = htmlspecialchars($data_pemilik["Nama_pemilik"]);
    $noKtp = htmlspecialchars($data_pemilik["No_ktp"]);
    $noHp = htmlspecialchars($data_pemilik["No_hp"]);
    $noRek = htmlspecialchars($data_pemilik["No_rek"]);
    $fotoKtp = upload_foto_ktp_pemilik();
    if(!$fotoKtp){
        return false;
    }
    $query_pemilik = "INSERT INTO pemilik
                                    VALUES
                                ('', '$nama', '$noKtp','$noHp', '$noRek', '$fotoKtp')
                            ";
    mysqli_query($conn, $query_pemilik);
    return mysqli_affected_rows($conn);
}

function upload_foto_ktp_pemilik(){
    $namaFile = $_FILES['Foto']['name'];
    $ukuranFile = $_FILES['Foto']['size'];
    $error = $_FILES['Foto']['error'];
    $tmpName = $_FILES['Foto']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload asa 
    if($error === 4){
        echo "
            <script>
                alert('Pilih gambar dulu');
            </script>
        ";
        return false;
    }
    // cek apakah yang di upload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "
            <script>
                alert('yang anda upload bukan gambar');
            </script>
        ";
        return false;
    }
    // cek ukuran gambar
    if($ukuranFile > 1000000){
        echo "
            <script>
                alert('ukuran gambar terlalu besar');
            </script>
        ";
        return false;
    }
    // lolos cek, gambar siap di upload dan generate nama gambar baru dengan uniqid
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/pemilik/' . $namaFileBaru);
    return $namaFileBaru;
}

function hapus_pemilik($id_pemilik){
    global $conn;
    
    mysqli_query($conn, "DELETE FROM pemilik WHERE Id_pemilik = $id_pemilik");
    return mysqli_affected_rows($conn);
}

function ubah_pemilik($data_pemilik){
    global $conn;

    $id = $data_pemilik["Id_pemilik"];
    $nama = htmlspecialchars($data_pemilik["Nama_pemilik"]);
    $noKtp = htmlspecialchars($data_pemilik["No_ktp"]);
    $noHp = htmlspecialchars($data_pemilik["No_hp"]);
    $noRek = htmlspecialchars($data_pemilik["No_rek"]);
    $fotoLama = htmlspecialchars($data_pemilik["fotoLama"]);

    // cek apakah user memilih gambar baru
    if($_FILES['Foto']['error'] === 4){
        $foto = $fotoLama;
    }else{
        $foto = upload_foto_ktp_pemilik();
    }

    $query_pemilik = "UPDATE pemilik SET
                                    Nama_pemilik = '$nama',
                                    No_ktp = '$noKtp',
                                    No_hp = '$noHp',
                                    No_rek = '$noRek',
                                    Foto = '$foto'
                            WHERE Id_pemilik = $id
    ";
    mysqli_query($conn, $query_pemilik);
    return mysqli_affected_rows($conn);
}

// akhir function pemilik

// awal function kosan
function tampil_kos($query_kosan){
    global $conn;
    $result = mysqli_query($conn, $query_kosan);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}
function tambah_kos($data_kos){
    global $conn;

    $nama = htmlspecialchars($data_kos["Nama_kos"]);
    $kategori = $data_kos["Kategori"];
    $fasilitas = htmlspecialchars($data_kos["Fasilitas"]);
    $jenis = $data_kos["Jenis_kos"];
    $harga = htmlspecialchars($data_kos["Harga"]);

    $alamat = htmlspecialchars($data_kos["Alamat"]);
    $gambar = upload_gambar_kos();
    if(!$gambar){
        return false;
    }
    $kampusTerdekat = $data_kos["Kampus_terdekat"];
    $idPemilik = $data_kos["Id_pemilik"];

    $query_kosan = "INSERT INTO kos VALUES ('', '$nama', '$kategori', '$fasilitas', '$jenis', '$harga', '$alamat', '$gambar', '$kampusTerdekat', '$idPemilik')";

    mysqli_query($conn, $query_kosan);

    return mysqli_affected_rows($conn);
}
function upload_gambar_kos(){
    $namaFile = $_FILES['Gambar']['name'];
    $ukuranFile = $_FILES['Gambar']['size'];
    $error = $_FILES['Gambar']['error'];
    $tmpName = $_FILES['Gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload asa 
    if($error === 4){
        echo "
            <script>
                alert('Pilih gambar dulu');
            </script>
        ";
        return false;
    }
    // cek apakah yang di upload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "
            <script>
                alert('yang anda upload bukan gambar');
            </script>
        ";
        return false;
    }
    // cek ukuran gambar
    if($ukuranFile > 1000000){
        echo "
            <script>
                alert('ukuran gambar terlalu besar');
            </script>
        ";
        return false;
    }
    // lolos cek, gambar siap di upload dan generate nama gambar baru dengan uniqid
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/kosan/' . $namaFileBaru);
    return $namaFileBaru;
}
function hapus_kos($idKos){
    global $conn;

    mysqli_query($conn, "DELETE FROM kos WHERE Id_kos = $idKos");
    return mysqli_affected_rows($conn);
}
function ubah_kos($data_kos){
    global $conn;

    $idKos = $data_kos["Id_kos"];
    $nama = htmlspecialchars($data_kos["Nama_kos"]);
    $kategori = $data_kos["Kategori"];
    $fasilitas = htmlspecialchars($data_kos["Fasilitas"]);
    $jenis = $data_kos["Jenis_kos"];
    $harga = htmlspecialchars($data_kos["Harga"]);
    $alamat = htmlspecialchars($data_kos["Alamat"]);
    $gambarLama = htmlspecialchars($data_kos["gambarLama"]);

    // cek apakah admin memasukkan gambar baru
    if($_FILES['Gambar']['error'] === 4){
        $gambar = $gambarLama;
    }else{
        $gambarLama = upload_gambar_kos();
    }

    $kampusTerdekat = $data_kos["Kampus_terdekat"];

    $idPemilik = $data_kos["Id_pemilik"];



    $query_kosan = "UPDATE kos SET 
                            Nama_kos = '$nama',
                            Kategori = '$kategori',
                            Fasilitas = '$fasilitas',
                            Jenis_kos = '$jenis',
                            Harga = '$harga',
                            Alamat = '$alamat',
                            Gambar = '$gambar',
                            Kampus_terdekat = '$kampusTerdekat',
                            Id_pemilik = '$idPemilik'
                        WHERE Id_kos = $idKos
    ";



    mysqli_query($conn, $query_kosan);

    return mysqli_affected_rows($conn);

}
function tampil_pemilik_combobox($query_pemilik){
    global $conn;
    $result = mysqli_query($conn, $query_pemilik);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}
// akhir funtion kosan

// awal function pengguna
function tampil_pengguna($query_pengguna){
    global $conn;

    $result = mysqli_query($conn, $query_pengguna);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function hapus_pengguna($idPengguna){
    global $conn;

    mysqli_query($conn, "DELETE FROM users WHERE Id_users = $idPengguna");
    return mysqli_affected_rows($conn);
}


?>