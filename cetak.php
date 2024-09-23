<?php
include 'connection1.php';
$koneksi1 = mysqli_connect("localhost", "root", "" , "dashboard");
session_start();
if(!isset($_SESSION['user'])){
  header('Location: login-user.php');
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pembelian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .header, .footer {
            text-align: center;
            margin-bottom: 20px;
        }
        .header p, .footer p {
            margin: 0;
            font-size: 14px;
            color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f9f9f9;
        }
        .total {
            font-weight: bold;
            text-align: right;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            text-align: center;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container" style="width: 65%">
    <?php
    include 'connection1.php';
    $koneksi1 = mysqli_connect("localhost", "root", "", "dashboard");
    $id = $_GET['id'];

    $trans = "SELECT * FROM view
    INNER JOIN tb_transaksi on view.id_transaksi = tb_transaksi.id_transaksi
    where view.id_transaksi='$id'";
   $query = mysqli_query($koneksi1, $trans);
   $data = mysqli_fetch_array($query); 

   $res = "SELECT * FROM tb_transaksi
   INNER JOIN user on tb_transaksi.id_pelanggan = user.id
   where tb_transaksi.id_transaksi='$id'";
   $query = mysqli_query($koneksi1, $res);
   $user = mysqli_fetch_array($query);

   ?>
   <div class="container">
        <div class="header">
            <h1>Nota Pembelian</h1>
            <p><strong>No. Invoice:</strong> INV-<?= $id ?></p>
            <p><strong>Tanggal:</strong><?= $data['tanggal'] ?></p>
        </div>

        <div class="details">
            <p><strong>Nama Pelanggan:</strong><?= $user['nama'] ?></p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
  
<?php
$prod = "SELECT * FROM view
INNER JOIN products on view.id_produk = products.id
where view.id_transaksi='$id'";
   $query2 = mysqli_query($koneksi1, $prod);
   while ($row = mysqli_fetch_array($query2)) { ?>
    <tr>
        <td><?= $row['nama'] ?></td>
        <td>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
        <td><?= $row['jumlah'] ?></td>
        <td>Rp <?php echo number_format($row['harga'] * $row['jumlah'], 0, ',', '.'); ?></td>
   </tr>
 <?php  } ?>
 <tr> 
    <td>Grand Total</td>
    <td align="right">Rp <?php echo number_format($data['total'], 2); ?></td>
   </tr>
   </table>
   </div>
   </div>
   <script>
    window.print();
    </script>