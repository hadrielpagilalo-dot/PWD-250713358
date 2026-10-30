function fn_ValForm(){
    
    alert();

    var validasiEmail = /^[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9]@[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9][\.][a-z0-9]{2,4}$/;
    var emailPeserta = document.getElementById("email").value;
    var umurPeserta = document.getElementById("umur").value;
    var memberPeserta = document.getElementById("member").value;

    if(!validasiEmail.test(emailPeserta)){
        emailMessage += "\n* Format Email Tidak Benar";
    }

    if(umurPeserta >= 17 && umurPeserta <= 65){
        if(umurPeserta <= 25){
            alert("Paket Pelajar");
        }else if(umurPeserta > 25){
            alert("Paket Umum");
        }else{
            alert("Tidak ada Paket");
        }
    }else{
        alert("Tidak memenuhi syarat");
    }

    switch(memberPeserta){
        case "S":
            alert("Silver");
            break;
        case "G":
            alert("Gold");
            break;
        case "P":
            alert("Platinum");
            break;
        default:
            alert("Member tidak tersedia");
    }
}









