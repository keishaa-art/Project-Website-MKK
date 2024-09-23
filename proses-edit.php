<?php

include 'connection1.php';

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $brand = $_POST['brand'];
    $deskripsi = $_POST['deskripsi'];
    $foto = $_FILES['foto'];

    // buat query update
    $sql = "UPDATE products SET nama='$nama', harga='$harga', stok='$stok', brand='$brand', deskripsi='$deskripsi', foto='$foto' WHERE id=$id";
    $query = mysqli_query($koneksi1, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: dashboard.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>