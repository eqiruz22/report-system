var rupiah1 = document.getElementById("rupiah1");
rupiah1.addEventListener("keyup", function (e) {
    rupiah1.value = formatRupiah(this.value, "");
});
var rupiah2 = document.getElementById("rupiah2");
rupiah2.addEventListener("keyup", function (e) {
    rupiah2.value = formatRupiah(this.value, "");
});
var rupiah3 = document.getElementById("rupiah3");
rupiah3.addEventListener("keyup", function (e) {
    rupiah3.value = formatRupiah(this.value, "");
});
var rupiah4 = document.getElementById("rupiah4");
rupiah4.addEventListener("keyup", function (e) {
    rupiah4.value = formatRupiah(this.value, "");
});
var rupiah5 = document.getElementById("rupiah5");
rupiah5.addEventListener("keyup", function (e) {
    rupiah5.value = formatRupiah(this.value, "");
});

// var topI = document.getElementById("rupiahtop1");
// topI.addEventListener("keyup", function (e) {
//     topI.value = formatRupiah(this.value, "");
// });
// var topII = document.getElementById("rupiahtop2");
// topII.addEventListener("keyup", function (e) {
//     topII.value = formatRupiah(this.value, "");
// });
// var topIII = document.getElementById("rupiahtop3");
// topIII.addEventListener("keyup", function (e) {
//     topIII.value = formatRupiah(this.value, "");
// });
// var topIV = document.getElementById("rupiahtop4");
// topIV.addEventListener("keyup", function (e) {
//     topIV.value = formatRupiah(this.value, "");
// });

function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? "" + rupiah : "";
}

var marginFormat1 = document.getElementById("marginFormat1");
marginFormat1.addEventListener("keyup", function (e) {
    marginFormat1.value = formatPercentMargin(this.value, "");
});
var marginFormat2 = document.getElementById("marginFormat2");
marginFormat2.addEventListener("keyup", function (e) {
    marginFormat2.value = formatPercentMargin(this.value, "");
});
var marginFormat3 = document.getElementById("marginFormat3");
marginFormat3.addEventListener("keyup", function (e) {
    marginFormat3.value = formatPercentMargin(this.value, "");
});

var marginFormat1 = document.getElementById("marginFormat1");
marginFormat1.addEventListener("click", function (e) {
    marginFormat1.value = formatPercentMargin(this.value, "");
});
var marginFormat2 = document.getElementById("marginFormat2");
marginFormat2.addEventListener("click", function (e) {
    marginFormat2.value = formatPercentMargin(this.value, "");
});
var marginFormat3 = document.getElementById("marginFormat3");
marginFormat3.addEventListener("click", function (e) {
    marginFormat3.value = formatPercentMargin(this.value, "");
});

function formatPercentMargin(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 2,
        rupiah = split[0].substr(0, sisa),
        duaDigit = split[0].substr(sisa).match(/\d{2}/gi);

    if (duaDigit) {
        separator = sisa ? "." : "";
        rupiah += separator + duaDigit.join(",");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? "" + rupiah : "";
}
