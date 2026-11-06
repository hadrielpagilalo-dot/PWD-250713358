<h2>Belanja</h2>
<h3>Daftar Kategori:</h3>
<form action="" method="POST">
    <p>Makanan dan Minuman: <br />
        <select name="mamin">
            <option value="">-- Pilih Makanan/Minuman --</option>
            <option value="pop mie">Pop Mie</option>
            <option value="air mineral">Air Mineral</option>
        </select>
    </p>
    <p>Alat Tulis: <br />
        <select name="alattulis">
            <option value="">-- Pilih Alat Tulis --</option>
            <option value="pulpen">Pulpen</option>
            <option value="tipe-x">Tipe-X</option>
        </select>
    </p>
    <button type="submit">Kirim</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mamin = $_POST['mamin'] ?? '';
    $alattulis = $_POST['alattulis'] ?? '';
    $message = [];

    // Validasi form tidak boleh kosong
    if (empty($mamin) || empty($alattulis)) {
        $message[] = "Harap pilih produk makanan/minuman dan alat tulis.";
    }

    // Harga Makanan dan Minuman
    $hargaMamin = 0;
    if ($mamin == 'pop mie') {
        $hargaMamin = 5000;
    } elseif ($mamin == 'air mineral') {
        $hargaMamin = 4000;
    }

    // Harga Alat Tulis
    $hargaAlatTulis = 0;
    if ($alattulis == 'pulpen') {
        $hargaAlatTulis = 2000;
    } elseif ($alattulis == 'tipe-x') {
        $hargaAlatTulis = 8000;
    }

    $totalBayar = $hargaMamin + $hargaAlatTulis;

    // Fungsi diskon
    function dapatDiskon($totalBayar) {
        if ($totalBayar >= 10000) {
            return 0.05;
        } else {
            return 0;
        }
    }

    // Fungsi total harga akhir setelah diskon
    function totalHarga($diskon, $totalBayar) {
        return $totalBayar - ($totalBayar * $diskon);
    }

    $diskon = dapatDiskon($totalBayar);
    $hargaAkhir = totalHarga($diskon, $totalBayar);

    // Menampilkan pesan error atau output informasi
    if (!empty($message)) {
        foreach ($message as $msg) {
            echo "<p style='color:red;'>!! " . htmlspecialchars($msg) . " !!</p>";
        }
    } else {
        echo "<h3>Informasi Belanja</h3>";
        echo "<p><strong>Makanan dan Minuman:</strong> " . htmlspecialchars($mamin) . " (Rp " . $hargaMamin . ")</p>";
        echo "<p><strong>Alat Tulis:</strong> " . htmlspecialchars($alattulis) . " (Rp " . $hargaAlatTulis . ")</p>";
        echo "<p><strong>Total Harga:</strong> Rp " . htmlspecialchars($hargaAkhir) . "</p>";
        echo "<p><strong>Diskon:</strong> " . ($diskon * 100) . "%</p>";

        if ($diskon == 0) {
            echo "<p>Maaf tidak ada diskon yang diberikan.</p>";
        } else {
            echo "<p>Selamat! Anda mendapatkan diskon " . htmlspecialchars($diskon * 100) . "%.</p>";
        }
    }
} else {
    echo "<p>Silahkan pilih produk yang ingin dibeli.</p>";
}
?>