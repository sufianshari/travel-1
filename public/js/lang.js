$(document).ready(function () {
    var itaImgLink = "/img/flag/ita_40.jpg";
    var engImgLink = "/img/flag/eng_40.jpg";
    var deuImgLink = "/img/flag/deu_40.jpg";
    var fraImgLink = "/img/flag/fra_40.jpg";

    $(".language").on("click", function (event) {
        var lang = $(this).attr('data-lang');

        document.location.href = '/?lang=' + lang;
    });
});