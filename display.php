<?php
$file = 'data_usaha.json';
if (file_exists($file)) {
    $current_data = file_get_contents($file);
    $array_data = json_decode($current_data, true);
} else {
    $array_data = array();
}

$search = isset($_GET['search']) ? $_GET['search'] : '';
$filter_year = isset($_GET['tahun']) ? $_GET['tahun'] : '';

function search_data($data, $search, $filter_year) {
    if (empty($search) && empty($filter_year)) {
        return true;
    }
    $match_search = empty($search) || stripos($data['nama_usaha'], $search) !== false;
    $match_year = empty($filter_year) || $data['tahun_lulus'] == $filter_year;
    return $match_search && $match_year;
}

$filtered_data = array_filter($array_data, function ($data) use ($search, $filter_year) {
    return search_data($data, $search, $filter_year);
});

// Pagination
$per_page = 2;
$total_data = count($filtered_data);
$total_pages = ceil($total_data / $per_page);
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$current_page = max(1, min($total_pages, $current_page)); // Ensure current page is within bounds
$start_index = ($current_page - 1) * $per_page;

$paginated_data = array_slice($filtered_data, $start_index, $per_page);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Usaha Alumni</title>
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
        .usaha-card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .usaha-card h3 {
            margin: 0;
            margin-bottom: 12px;
            color: #333;
            font-size: 24px;
        }
        .usaha-card p {
            margin: 6px 0;
            color: #555;
        }
        .usaha-card p a {
            color: #0066cc;
            text-decoration: none;
        }
        .usaha-card p a:hover {
            text-decoration: underline;
        }
        .usaha-card p strong {
            color: #333;
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
        .search-container input[type="submit"]:hover {
            background: #555;
        }
        .add-container a {
            background: #333;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
        }
        .pagination {
            text-align: center;
            margin-top: 20px;
        }
        .pagination a {
            margin: 0 5px;
            text-decoration: none;
            color: #333;
            padding: 5px 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .pagination a.disabled {
            background: #f4f4f4;
            color: #ccc;
            cursor: not-allowed;
        }
        
        .pagination a:hover:not(.disabled) {
            background: #555;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Data Usaha Alumni</h1>
    </div>
    <div class="container">
        <div class="search-container">
            <h2>Cari Data Usaha</h2>
            <form action="display.php" method="get">
                <input type="text" name="search" placeholder="Cari berdasarkan nama usaha..." value="<?php echo htmlspecialchars($search); ?>">
                <select name="tahun">
                    <option value="">Semua Tahun</option>
                    <?php
                    $current_year = date('Y');
                    for ($year = $current_year; $year >= 2000; $year--) {
                        $selected = ($year == $filter_year) ? 'selected' : '';
                        echo '<option value="' . $year . '" ' . $selected . '>' . $year . '</option>';
                    }
                    ?>
                </select>
                <input type="submit" value="Cari">
            </form>
        </div>
        <div class="add-container">
            <a href="index.php">Tambah Data Alumni</a>
        </div>
        <?php if (empty($paginated_data)): ?>
            <p style="text-align: center;">Tidak ada hasil yang sesuai dengan kriteria pencarian.</p>
        <?php else: ?>
            <?php foreach ($paginated_data as $data): ?>
                <div class="usaha-card">
                    <h3><?php echo htmlspecialchars($data['nama_usaha']); ?></h3>
                    <p><strong>NIM:</strong> <?php echo htmlspecialchars($data['nim']); ?></p>
                    <p><strong>Nama Lengkap:</strong> <?php echo htmlspecialchars($data['nama']); ?></p>
                    <p><strong>Tahun Masuk:</strong> <?php echo htmlspecialchars($data['tahun_masuk']); ?></p>
                    <p><strong>Tahun Lulus:</strong> <?php echo htmlspecialchars($data['tahun_lulus']); ?></p>
                    <p><strong>Nama Usaha:</strong> <?php echo htmlspecialchars($data['nama_usaha']); ?></p>
                    <p><strong>Alamat Usaha:</strong> <?php echo htmlspecialchars($data['alamat_usaha']); ?></p>
                    <p><strong>Website:</strong> <a href="<?php echo htmlspecialchars($data['website']); ?>" target="_blank"><?php echo htmlspecialchars($data['website']); ?></a></p>
                    <p><strong>Link ke marketplace:</strong> <a href="<?php echo htmlspecialchars($data['marketplace']); ?>" target="_blank"><?php echo htmlspecialchars($data['marketplace']); ?></a></p>
                    <p><strong>No. Telepon Bisnis:</strong> <?php echo htmlspecialchars($data['telepon_bisnis']); ?></p>
                    <p><strong>Instagram:</strong> <a href="https://instagram.com/<?php echo htmlspecialchars($data['instagram']); ?>" target="_blank"><?php echo htmlspecialchars($data['instagram']); ?></a></p>
                    <p><strong>TikTok:</strong> <a href="https://tiktok.com/@<?php echo htmlspecialchars($data['tiktok']); ?>" target="_blank"><?php echo htmlspecialchars($data['tiktok']); ?></a></p>
                    <p><strong>Facebook:</strong> <a href="https://facebook.com/<?php echo htmlspecialchars($data['facebook']); ?>" target="_blank"><?php echo htmlspecialchars($data['facebook']); ?></a></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="pagination">
            <?php if ($current_page > 1): ?>
                <a href="?page=<?php echo $current_page - 1; ?>&search=<?php echo htmlspecialchars($search); ?>&tahun=<?php echo htmlspecialchars($filter_year); ?>">Previous</a>
            <?php else: ?>
                <span class="disabled">Previous</span>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <?php if ($i == $current_page): ?>
                    <span class="active"><?php echo $i; ?></span>
                <?php else: ?>
                    <a href="?page=<?php echo $i; ?>&search=<?php echo htmlspecialchars($search); ?>&tahun=<?php echo htmlspecialchars($filter_year); ?>"><?php echo $i; ?></a>
                <?php endif; ?>
            <?php endfor; ?>
            <?php if ($current_page < $total_pages): ?>
                <a href="?page=<?php echo $current_page + 1; ?>&search=<?php echo htmlspecialchars($search); ?>&tahun=<?php echo htmlspecialchars($filter_year); ?>">Next</a>
            <?php else: ?>
                <span class="disabled">Next</span>
            <?php endif; ?>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2024 Alumni Network</p>
    </div>
</body>
</html>
