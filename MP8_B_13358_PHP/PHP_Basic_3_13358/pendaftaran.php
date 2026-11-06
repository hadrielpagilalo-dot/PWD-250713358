<?php

$pesanError = [];
$jadwalWawancara = '';
$nama = '';
$npm = '';
$loker = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namaInput = $_POST['nama'] ?? '';
    $npmInput = $_POST['npm'] ?? '';
    $lokerInput = $_POST['loker'] ?? '';
    $nama = is_string($namaInput) ? trim($namaInput) : '';
    $npm = is_string($npmInput) ? trim($npmInput) : '';
    $loker = is_string($lokerInput) ? $lokerInput : '';

    if ($nama === '' || $npm === '' || $loker === '') {
        $pesanError[] = 'Nama, NPM, dan pilihan staff wajib diisi.';
    }

    if ($nama !== '' && !preg_match('/^[\p{L} ]+$/u', $nama)) {
        $pesanError[] = 'Nama hanya boleh mengandung huruf dan spasi.';
    }

    if ($npm !== '' && !preg_match('/^[0-9]+$/', $npm)) {
        $pesanError[] = 'NPM hanya boleh mengandung angka.';
    }

    if (!in_array($loker, ['kasir', 'merchandiser'], true)) {
        $pesanError[] = 'Pilihan staff tidak valid.';
    }

    if (empty($pesanError)) {
        $jadwalWawancara = $loker === 'kasir'
            ? 'besok pukul 10.00 WIB di market'
            : 'lusa pukul 12.00 WIB di market';
    }
}
?>


<h2>Pendaftaran Staff</h2>
<form method="post">
    <p>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($nama, 'UTF-8') ?>" />
    </p>
    <p>
        <label for="npm">NPM:</label>
        <input type="text" id="npm" name="npm" value="<?= htmlspecialchars($npm, 'UTF-8') ?>" />
    </p>
    <p>
        <label for="loker">Pilihan staff:</label>
        <select id="loker" name="loker">
            <option value="">-- Pilih staff --</option>
            <option value="kasir" <?= $loker === 'kasir' ? 'selected' : '' ?>>Kasir</option>
            <option value="merchandiser" <?= $loker === 'merchandiser' ? 'selected' : '' ?>>Merchandiser</option>
        </select>
    </p>
    <button type="submit">Daftar</button>
</form>


<?php if ($_SERVER['REQUEST_METHOD'] !== 'POST'): ?>
    <p>Silahkan lengkapi formulir di atas.</p>
<?php elseif (!empty($pesanError)): ?>
    <?php foreach ($pesanError as $pesan): ?>
        <p style="color: red;"><?= htmlspecialchars($pesan, 'UTF-8') ?></p>
    <?php endforeach; ?>
<?php else: ?>
    <h2>Informasi Pendaftaran</h2>
    <p><strong>Nama:</strong> <?= htmlspecialchars($nama, 'UTF-8') ?></p>
    <p><strong>NPM:</strong> <?= htmlspecialchars($npm, 'UTF-8') ?></p>
    <p><strong>Pilihan staff:</strong> <?= htmlspecialchars($loker, 'UTF-8') ?></p>
    <p><strong>Jadwal wawancara:</strong> <?= htmlspecialchars($jadwalWawancara, 'UTF-8') ?></p>
    <p>
        Anda mendaftar sebagai "<?= htmlspecialchars($loker, 'UTF-8') ?>".
        Selanjutnya, Anda dapat hadir "<?= htmlspecialchars($jadwalWawancara, 'UTF-8') ?>"
        untuk wawancara.
    </p>
<?php endif; ?>