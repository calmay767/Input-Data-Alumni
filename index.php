<!DOCTYPE html>
<html>
<head>
    <title>Input Data Usaha Alumni</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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
        .form-container {
            background: #fff;
            padding: 20px;
            margin-top: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            margin: 0 0 20px 0;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="url"],
        .form-group input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group input[type="submit"] {
            background: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group input[type="submit"]:hover {
            background: #555;
        }
        .search-container {
            margin-top: 20px;
            text-align: center;
        }
        .search-container input[type="text"] {
            width: 300px;
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .search-container select {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .search-container input[type="submit"] {
            background: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .view-data a {
            background: #333;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
        }
        .search-container input[type="submit"]:hover {
            background: #555;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Input Data Usaha Alumni</h1>
    </div>
    <div class="container">
        <div class="form-container">
            <h2>Form Input Data</h2>
            <form action="submit.php" method="post">
                <div class="form-group">
                    <label for="nim">NIM:</label>
                    <input type="text" id="nim" name="nim" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Lengkap:</label>
                    <input type="text" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="tahun_masuk">Tahun Masuk:</label>
                    <input type="number" id="tahun_masuk" name="tahun_masuk" required>
                </div>
                <div class="form-group">
                    <label for="tahun_lulus">Tahun Lulus:</label>
                    <input type="number" id="tahun_lulus" name="tahun_lulus" required>
                </div>
                <div class="form-group">
                    <label for="nama_usaha">Nama Usaha:</label>
                    <input type="text" id="nama_usaha" name="nama_usaha" required>
                </div>
                <div class="form-group">
                    <label for="alamat_usaha">Alamat Usaha:</label>
                    <input type="text" id="alamat_usaha" name="alamat_usaha">
                </div>
                <div class="form-group">
                    <label for="website">Website:</label>
                    <input type="url" id="website" name="website">
                </div>
                <div class="form-group">
                    <label for="marketplace">Link ke marketplace:</label>
                    <input type="url" id="marketplace" name="marketplace">
                </div>
                <div class="form-group">
                    <label for="telepon_bisnis">No. Telepon Bisnis:</label>
                    <input type="tel" id="telepon_bisnis" name="telepon_bisnis" required>
                </div>
                <div class="form-group">
                    <label for="instagram">Instagram:</label>
                    <input type="text" id="instagram" name="instagram">
                </div>
                <div class="form-group">
                    <label for="tiktok">TikTok:</label>
                    <input type="text" id="tiktok" name="tiktok">
                </div>
                <div class="form-group">
                    <label for="facebook">Facebook:</label>
                    <input type="text" id="facebook" name="facebook">
                </div>
                <div class="form-group">
                    <input type="submit" value="Submit">
                </div>
                <div class="view-data">
                    <a href="display.php">Lihat Data Usaha Alumni</a>
                </div>
            </form>
        </div>
        
    </div>
    
</body>
</html>
