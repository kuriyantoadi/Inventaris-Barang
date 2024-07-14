<?php 
// session_start();
// if ($_SESSION['status'] != "admin") {
//     header("location:login.php?pesan=belum_login");
//     exit;
// }

// header("Content-type: application/vnd-ms-excel");
// header("Content-Disposition: attachment; filename=Laporan_Barang.xls");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Barang</title>
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
    <h3><center>Laporan Data Barang</center></h3>

    <table id="tabel_js" class="table table-primary">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kategori Barang</th>
                <th>Jumlah Barang</th>
                <th>Kondisi Barang</th>
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
            <td><?= $row->nama_kategori_barang ?></td>
            <td><?= $row->jumlah_barang ?></td>
            <td><?= $row->kondisi_barang ?></td>
            <!-- Ensure 'No HP' is treated as text -->
            
        </tr>
        <?php 
        }
        ?>
        </tbody>
    </table>
    <script>
        print();
    </script>
</body>
</html>