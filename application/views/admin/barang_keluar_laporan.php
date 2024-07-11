<?php 
// session_start();
// if ($_SESSION['status'] != "admin") {
//     header("location:login.php?pesan=belum_login");
//     exit;
// }

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Barang_Keluar.xls");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Export Data Ke Excel</title>
    <style type="text/css">
        body{
            font-family: sans-serif;
        }
        table{
            margin: 20px auto;
            border-collapse: collapse;
        }
        table th, table td{
            border: 1px solid #3c3c3c;
            padding: 3px 8px;
        }
        .back {
            text-decoration: none;
            color: white;
            background: red;
            border-radius: 10px;
            padding: 8px 10px;
            margin: 10px;
        }
        .export {
            text-decoration: none;
            color: white;
            background: blue;
            border-radius: 10px;
            padding: 8px 10px;
        }
    </style>
</head>
<body>
    <!-- <a class="back" href="clear_tamper.php">KEMBALI</a>

    <center>
        <h1>Export Data Ke Excel</h1>
    </center>

    <center>
        <a class="export" href="">EXPORT SETING</a>
        <a class="export" href="clear_tamper_export.php">EXPORT KE EXCEL</a>
    </center> -->

    <table id="tabel_js" class="table table-primary">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah Barang Keluar</th>
                <th>Tanggal Barang Keluar</th>
                <th>Kondisi Barang Keluar</th>
                <th>Sumber Barang</th>                
            </tr>
        </thead>
        <tbody>

       <?php
        $no = 1;
        foreach ($tampil as $row) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row->nama_barang ?></td>
            <td><?= $row->jumlah_barang_keluar ?></td>
            <td><?= $row->tgl_barang_keluar ?></td>
            <td><?= $row->kondisi_barang_keluar ?></td>
            <td><?= $row->nama_ruangan ?></td>
            <!-- Ensure 'No HP' is treated as text -->
            
        </tr>
        <?php 
        }
        ?>
        </tbody>
    </table>
</body>
</html>