<?php
// Ambil data dari form
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$tahun_masuk = $_POST['tahun_masuk'];
$tahun_lulus = $_POST['tahun_lulus'];
$nama_usaha = $_POST['nama_usaha'];
$alamat_usaha = $_POST['alamat_usaha'];
$website = $_POST['website'];
$marketplace = $_POST['marketplace'];
$telepon_bisnis = $_POST['telepon_bisnis'];
$instagram = $_POST['instagram'];
$tiktok = $_POST['tiktok'];
$facebook = $_POST['facebook'];

// Simpan data ke file JSON atau database (contoh menggunakan file JSON)
$data_usaha = array(
    "nim" => $nim,
    "nama" => $nama,
    "tahun_masuk" => $tahun_masuk,
    "tahun_lulus" => $tahun_lulus,
    "nama_usaha" => $nama_usaha,
    "alamat_usaha" => $alamat_usaha,
    "website" => $website,
    "marketplace" => $marketplace,
    "telepon_bisnis" => $telepon_bisnis,
    "instagram" => $instagram,
    "tiktok" => $tiktok,
    "facebook" => $facebook
);

$file = 'data_usaha.json';
if(file_exists($file)){
    $current_data = file_get_contents($file);
    $array_data = json_decode($current_data, true);
    $array_data[] = $data_usaha;
    $final_data = json_encode($array_data, JSON_PRETTY_PRINT);
    file_put_contents($file, $final_data);
} else {
    $array_data[] = $data_usaha;
    $final_data = json_encode($array_data, JSON_PRETTY_PRINT);
    file_put_contents($file, $final_data);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Submit Data Usaha Alumni</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        .header, .footer {
            background: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        .message-container {
            background: #fff;
            padding: 20px;
            margin-top: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .message-container p {
            font-size: 18px;
            color: #333;
        }
        .message-container .success {
            color: green;
        }
        .message-container a {
            display: inline-block;
            margin-top: 20px;
            background: #333;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
        }
        .message-container a:hover {
            background: #555;
        }
    </style>
</head>
<body>
   
    <div class="container">
        <div class="message-container">
            <p class="success">Data usaha berhasil disimpan!</p>
            <a href="display.php">Lihat Data Usaha</a>
        </div>
    </div>
    
</body>
</html>
