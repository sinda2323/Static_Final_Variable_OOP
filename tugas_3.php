<?php
// Class Produk
class Produk {
    public static $jumlahProduk = 0;
    public $nama;
    public $harga;

    public function __construct($nama, $harga) {
        $this->nama = $nama;
        $this->harga = $harga;
        self::$jumlahProduk++;
    }

    public function tambahProduk() {
        echo "<div class='product-card'>";
        echo "<h3 class='product-name'>" . $this->nama . "</h3>";
        echo "<p class='product-price'>Rp " . number_format($this->harga, 0, ',', '.') . "</p>";
        echo "</div>";
    }

    public static function tampilkanTotalProduk() {
        echo "<div class='total-card'>";
        echo "<h4>Total Produk</h4>";
        echo "<span class='total-number'>" . self::$jumlahProduk . "</span>";
        echo "</div>";
    }
}

// Class Transaksi
class Transaksi {
    final public function prosesTransaksi($produkList) {
        $total = 0;
        echo "<div class='transaction-header'>=== Detail Transaksi ===</div>";
        echo "<div class='transaction-list'>";
        
        foreach ($produkList as $produk) {
            echo "<div class='transaction-item'>";
            echo "<span class='item-name'>" . $produk->nama . "</span>";
            echo "<span class='item-price'>Rp " . number_format($produk->harga, 0, ',', '.') . "</span>";
            echo "</div>";
            $total += $produk->harga;
        }
        
        echo "</div>";
        echo "<div class='total-pay'>";
        echo "<h3>Total Bayar</h3>";
        echo "<div class='final-amount'>Rp " . number_format($total, 0, ',', '.') . "</div>";
        echo "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASATU ATK - Sistem Kasir</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #ede9ff);
            min-height: 100vh;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            box-shadow: 0 32px 64px rgba(30, 58, 138, 0.25);
            max-width: 650px;
            width: 100%;
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 24px;
            border-bottom: 3px solid #3b82f6;
        }

        .header h1 {
            font-size: 2.4em;
            font-weight: 700;
            background: linear-gradient(135deg, #1e40af, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 8px;
        }

        .header p {
            color: #64748b;
            font-weight: 500;
            font-size: 1.1em;
        }

        .content {
            display: grid;
            gap: 32px;
        }

        .section {
            background: white;
            border-radius: 20px;
            padding: 28px;
            box-shadow: 0 12px 40px rgba(0,0,0,0.08);
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .section:hover {
            box-shadow: 0 20px 50px rgba(59, 130, 246, 0.15);
        }

        .section-title {
            font-size: 1.4em;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 3px solid #3b82f6;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .product-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: linear-gradient(135deg, #f8fafc, #f1f5f9);
            border-radius: 16px;
            margin-bottom: 16px;
            border-left: 5px solid #3b82f6;
            transition: all 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 16px 32px rgba(59, 130, 246, 0.12);
        }

        .product-card:last-child {
            margin-bottom: 0;
        }

        .product-name {
            font-weight: 600;
            color: #1e293b;
            font-size: 1.15em;
        }

        .product-price {
            font-weight: 700;
            color: #059669;
            font-size: 1.25em;
        }

        .total-card {
            text-align: center;
            padding: 32px;
            background: linear-gradient(135deg, #1e40af, #3b82f6);
            color: white;
            border-radius: 20px;
            font-weight: 600;
        }

        .total-card h4 {
            font-size: 1.2em;
            margin-bottom: 12px;
            opacity: 0.95;
        }

        .total-number {
            font-size: 3em;
            font-weight: 800;
            text-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }

        .transaction-header {
            font-size: 1.5em;
            font-weight: 700;
            color: #1e293b;
            text-align: center;
            margin-bottom: 28px;
            padding: 20px;
            background: linear-gradient(135deg, #dbeafe, #bfdbfe);
            border-radius: 16px;
            border: 2px solid #3b82f6;
        }

        .transaction-list {
            background: #f8fafc;
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 28px;
            border: 1px solid #e2e8f0;
        }

        .transaction-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 0;
            border-bottom: 1px solid #e2e8f0;
            font-size: 1.05em;
        }

        .transaction-item:last-child {
            border-bottom: none;
        }

        .item-name {
            font-weight: 500;
            color: #374151;
        }

        .item-price {
            font-weight: 700;
            color: #059669;
            font-size: 1.15em;
        }

        .total-pay {
            background: linear-gradient(135deg, #059669, #10b981);
            color: white;
            padding: 32px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 16px 40px rgba(5, 150, 105, 0.3);
        }

        .total-pay h3 {
            font-size: 1.4em;
            margin-bottom: 16px;
            opacity: 0.98;
        }

        .final-amount {
            font-size: 2.5em;
            font-weight: 800;
            letter-spacing: -1px;
            text-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        .thank-you {
            background: linear-gradient(135deg, #fef3c7, #fdfdfd);
            border: 2px solid #e4b159;
            border-radius: 20px;
            padding: 28px;
            text-align: center;
            margin-top: 24px;
            box-shadow: 0 12px 32px rgba(245, 158, 11, 0.2);
        }

        .thank-you i {
            font-size: 2.5em;
            color: #f59e0b;
            margin-bottom: 16px;
            display: block;
        }

        .thank-you h4 {
            font-size: 1.4em;
            font-weight: 700;
            color: #92400e;
            margin-bottom: 8px;
        }

        .thank-you p {
            color: #a16207;
            font-weight: 500;
            font-size: 1.1em;
        }

        @media (max-width: 480px) {
            .container {
                padding: 28px;
                margin: 20px;
            }
            
            .header h1 {
                font-size: 2em;
            }
            
            .total-number {
                font-size: 2.5em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-store"></i> ASATU ATK</h1>
            <p><i class="fas fa-receipt"></i> Sistem Kasir Digital</p>
        </div>

        <div class="content">
            <!-- Daftar Produk -->
            <div class="section">
                <h3 class="section-title">
                    <i class="fas fa-boxes"></i> Inventory Produk
                </h3>
                <?php
                $p1 = new Produk("Pensil 2B", 2000);
                $p2 = new Produk("Buku Tulis", 5000);
                $p3 = new Produk("Pulpen Pilot", 3000);
                
                $p1->tambahProduk();
                $p2->tambahProduk();
                $p3->tambahProduk();
                ?>
            </div>

            <!-- Total Produk -->
            <div class="section">
                <?php Produk::tampilkanTotalProduk(); ?>
            </div>

            <!-- Transaksi -->
            <div class="section">
                <h3 class="section-title">
                    <i class="fas fa-credit-card"></i> Proses Transaksi
                </h3>
                <?php
                $transaksi = new Transaksi();
                $transaksi->prosesTransaksi([$p1, $p2, $p3]);
                ?>
            </div>
        </div>

        <!-- Terima Kasih -->
        <div class="thank-you">
            <h4>Terima Kasih</h4>
            <p>Sudah Berbelanja di ASATU ATK!</p>
            <p style="font-size: 0.95em; margin-top: 8px; opacity: 0.8;">
            </p>
        </div>
    </div>
</body>
</html>