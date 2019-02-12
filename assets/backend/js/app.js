var api_url = "";
var container = $("#main-container");

toastr.options = {
    "closeButton": !1,
    "debug": !1,
    "newestOnTop": !1,
    "progressBar": !0,
    "positionClass": "toast-top-right",
    "preventDuplicates": !1,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "3000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

$(".nav-link").click(function (e) {
    e.preventDefault();
    var url = $(this).attr('href');
    render(url);
})
function render(link, notification = false) {
    var targetURL = base_url + "administrator/" + link;
    if (link != "") {
        $.ajax({
            url: targetURL,
            type: "POST",
            data: {
                ajax: true
            },
            success: function (result) {
                container.html(result);
                if (notification != false) {
                    if (notification.success == true) {
                        toastr["success"](notification.message, "Berhasil");
                    } else {
                        toastr["error"](notification.message, "Gagal");
                    }
                }
            },
            error: function () {
                toastr["error"]("Halaman Tidak Ditemukan", "Gagal");
            }
        });
    }
}

var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
var date = new Date();
var day = date.getDate();
var month = date.getMonth();
var thisDay = date.getDay(),
    thisDay = myDays[thisDay];
var yy = date.getYear();
var year = (yy < 1000) ? yy + 1900 : yy;
var tanggalan = thisDay + ', ' + day + ' ' + months[month] + ' ' + year;
$("#sekarang").html(tanggalan);