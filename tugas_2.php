<?php

class Matematika {
    public static function kali($a, $b) {
        return $a * $b;
    }

    public static function bagi($a, $b) {
        return $a / $b;
    }

    public static function tambah($a, $b) {
        return $a + $b;
    }

    public static function kurang($a, $b) {
        return $a - $b;
    }

    public static function luasPersegi($sisi) {
        return $sisi * $sisi;
    }
}

$hasil = "";
if (isset($_POST['hitung'])) {
    $a = floatval($_POST['a']);
    $b = floatval($_POST['b']);
    $sisi = floatval($_POST['sisi']);

    $hasil .= "<div class='result-item'>";
    $hasil .= " Tambah: <strong>" . Matematika::tambah($a, $b) . "</strong>";
    $hasil .= "</div>";
    
    $hasil .= "<div class='result-item'>";
    $hasil .= " Kurang: <strong>" . Matematika::kurang($a, $b) . "</strong>";
    $hasil .= "</div>";
    
    $hasil .= "<div class='result-item'>";
    $hasil .= " Kali: <strong>" . Matematika::kali($a, $b) . "</strong>";
    $hasil .= "</div>";
    
    $hasil .= "<div class='result-item'>";
    $hasil .= " Bagi: <strong>" . Matematika::bagi($a, $b) . "</strong>";
    $hasil .= "</div>";
    
    $hasil .= "<div class='result-item'>";
    $hasil .= " Luas Persegi: <strong>" . Matematika::luasPersegi($sisi) . "</strong>";
    $hasil .= "</div>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator OOP</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Times New Roman', sans-serif;
            background: linear-gradient(135deg, #cac9c8);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: #f0ff6c;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            max-width: 500px;
            width: 100%;
            border: 5px solid #f1c40f;
        }

        h1 {
            text-align: center;
            color: #d68910;
            margin-bottom: 30px;
            font-size: 2.5em;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #b7950b;
            font-weight: bold;
            font-size: 1.1em;
        }

        input[type="number"] {
            width: 100%;
            padding: 15px;
            border: 3px solid #f1c40f;
            border-radius: 10px;
            font-size: 1.2em;
            text-align: center;
            background: white;
            transition: all 0.3s ease;
        }

        input[type="number"]:focus {
            outline: none;
            border-color: #d68910;
            box-shadow: 0 0 10px rgba(243, 156, 18, 0.5);
        }

        button {
            width: 100%;
            padding: 18px;
            background: linear-gradient(45deg, #f39c12, #e67e22);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.3em;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.3);
        }

        .results {
            margin-top: 30px;
            padding: 25px;
            background: rgba(255,255,255,0.9);
            border-radius: 15px;
            border: 3px solid #f1c40f;
        }

        .result-item {
            padding: 12px 0;
            border-bottom: 2px solid #f1c40f;
            font-size: 1.2em;
            color: #b7950b;
        }

        .result-item:last-child {
            border-bottom: none;
        }

        .result-item strong {
            color: #d68910;
            font-size: 1.3em;
        }

        .no-result {
            text-align: center;
            color: #b7950b;
            font-style: italic;
            font-size: 1.1em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Kalkulator</h1>
        
        <form method="post">
            <div class="form-group">
                <label>Bilangan Pertama:</label>
                <input type="number" name="a" step="0.01" required>
            </div>
            
            <div class="form-group">
                <label>Bilangan Kedua:</label>
                <input type="number" name="b" step="0.01" required>
            </div>

            <div class="form-group">
    <label> Sisi Persegi:</label>
    <input type="number" name="sisi" step="0.01" required>
</div>
            
            <button type="submit" name="hitung"> Hitung Sekarang!</button>
        </form>

        <?php if ($hasil): ?>
            <div class="results">
                <h3 style="text-align: center; color: #ffffff; margin-bottom: 20px;">📊 Hasil Perhitungan:</h3>
                <?php echo $hasil; ?>
            </div>
        <?php else: ?>
            <div class="results">
                <p class="no-result">Masukkan angka dan klik "Hitung Sekarang!"</p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>