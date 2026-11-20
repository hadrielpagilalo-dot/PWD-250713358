var suhuSekarang = 24;

function ubahSuhu(perubahan) {
    var suhuBaru = suhuSekarang + perubahan;

    if (suhuBaru < 16 || suhuBaru > 30) {
        alert("Batas suhu AC tercapai! (Rentang 16°C - 30°C)");
        return;
    }

    suhuSekarang = suhuBaru;
    updateTampilan();
}

function setModeHujan() {
    suhuSekarang = 22;
    updateTampilan();
}

function updateTampilan() {
    var panel = document.getElementById("panelAC");
    var spanAngka = document.getElementById("angkaSuhu");
    var teksMode = document.getElementById("modeCuaca");

    // Memperbarui angka suhu melalui DOM text node
    spanAngka.firstChild.data = suhuSekarang;

    // Mengubah background dan keterangan mode sesuai rentang suhu
    if (suhuSekarang <= 20) {
        panel.style.backgroundColor = "#b3e5fc";
        teksMode.firstChild.data = "Mode: Dingin Ekstrem";
    } else if (suhuSekarang >= 26) {
        panel.style.backgroundColor = "#ffe0b2";
        teksMode.firstChild.data = "Mode: Hangat / Cuaca Dingin";
    } else {
        panel.style.backgroundColor = "#e0f7fa";
        teksMode.firstChild.data = "Mode: Sejuk Normal";
    }
}