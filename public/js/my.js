$(document).ready(function () {

    $(".linebox").hover(
        function () {
            $(this).addClass('hover');
        },
        function () {
            $(this).removeClass("hover");
        });
        $(".matchdetail").click(function() {
            window.location.href = '/match/' + $(this).attr('id');
        });

});
