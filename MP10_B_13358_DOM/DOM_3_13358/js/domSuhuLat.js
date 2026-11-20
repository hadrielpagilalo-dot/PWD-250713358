var spanSuhu;
var statusCuaca;

function init() {
    spanSuhu = document.getElementById("outputSuhu");
    statusCuaca = document.getElementById("statusCuaca");
}

function konversiSuhu(id) {
    var c = parseFloat(document.getElementById(id).value);
    var f = (c * 9 / 5) + 32;

    spanSuhu.firstChild.data = f;

    if (f > 86) {
        spanSuhu.style.color = "red";
        spanSuhu.style.fontWeight = "bold";

        statusCuaca.firstChild.data = "Status: Panas";
    } else {
        spanSuhu.style.color = "blue";
        spanSuhu.style.fontWeight = "normal";

        statusCuaca.firstChild.data = "Status: Sejuk";
    }
}

function resetForm() {
    document.getElementById("celcius").value = "";

    spanSuhu.firstChild.data = "0";
    spanSuhu.style.color = "black";
    spanSuhu.style.fontWeight = "normal";

    statusCuaca.firstChild.data = "Status: -";
}