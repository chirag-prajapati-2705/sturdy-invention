/**
 * Created by Chirag-Chiku on 1/27/2017.
 */
$(document).ready(function () {
    $(".memenu").memenu();
    $("#slider").responsiveSlides({
        auto: true,
        speed: 500,
        namespace: "callbacks",
        pager: true
    });
});
function hideURLbar() {
    window.scrollTo(0, 1);
}