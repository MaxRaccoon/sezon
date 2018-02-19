$(document).ready(function () {
    moment.locale();

    $('.slick-gallery').slick({
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 1,
        adaptiveHeight: true,
        variableWidth: true,
        infinite: true
    });
    scheduleInfo();

    selectProgram();
    $("[data-program-link]").click(function () {
        selectProgram($(this).data("program-link"));
    });
    $("[data-trainer-link]").click(function () {
        selectTrainer($(this).data("trainer-link"));
    });
    $("[data-schedule-link]").click(function () {
        showSchedule();
    });
});


ymaps.ready(init);
var myMap, myPlacemark;

function init(){
    myMap = new ymaps.Map("yMap", {
        center: [52.286477, 104.288107],
        zoom: 16,
        scroll: false
    });

    myPlacemark = new ymaps.Placemark(
        [52.286477, 104.288107],
        {
            hintContent: 'Спортивный клуб "Сезон"',
            balloonContent: 'г.Иркутск, ул. Свердлова, 36, ТЦ «Сезон», 3 этаж'
        });
    // Создаем метку.
    var placemark = new ymaps.Placemark(
        [52.286477, 104.288107],
        {
            balloonContent: "г.Иркутск, ул. Свердлова, 36, ТЦ «Сезон», 3 этаж",
            iconContent: 'Спортивный клуб "Сезон"'
        }, {
            preset: "twirl#yellowStretchyIcon",
            // Отключаем кнопку закрытия балуна.
            balloonCloseButton: false,
            // Балун будем открывать и закрывать кликом по иконке метки.
            hideIconOnBalloonOpen: true
        });
    myMap.geoObjects.add(myPlacemark);

    $("#gallery").unitegallery({
        tiles_type:"justified"
    });
}

function scheduleInfo(index) {
    if (typeof index == typeof undefined) {
        var index = $("[data-schedule-index]").first().data("schedule-index");
    }

    $("[data-schedule-index]").removeClass("active");
    $("[data-schedule-index='" + index + "']").addClass("active");
    $(".dynamic-schedule-program .info-block > div").height($(".dynamic-schedule-program .program-list").height() - 20);
}

function showFullInfo() {
    $("#about-us .container a").hide();
    $("#about-us .container p.full").show();
}

/**
 * Отображение блоков с информацие по программе
 * @param index
 */
function selectProgram(index) {
    if (typeof index == typeof undefined) {
        index = $("#programs .menu-list > div.active").data("program-link");
    } else {
        $("#programs .menu-list > div.active").removeClass("active");
        $("#programs .menu-list > div[data-program-link='" + index + "']").addClass("active");
    }

    $("#programs .program-info > div").not("[data-program-index='" + index + "']").hide();
    $("#programs .program-info > div[data-program-index='" + index + "']").show();
    if ($("#programs .program-info > div[data-program-index='" + index + "'] .photo")
            .data("gallery-init") == 0) {
        $("#program-photo-" + index).unitegallery({
            tiles_type:"justified"
        });
        $("#programs .program-info > div[data-program-index='" + index + "'] .photo")
            .data("gallery-init", 1);
    }

    menuAutoHeight();
}
/**
 * Информация о тренере
 * @param index
 */
function selectTrainer(index) {
    $("#programs .program-info > div").not("[data-trainer-index='" + index + "']").hide();
    $("#programs .program-info > div[data-trainer-index='" + index + "']").show();
    scrollToAnchor("programs");
    menuAutoHeight();
}

function showSchedule() {
    $("#programs .program-info > div").not("[data-schedule-index='0']").hide();
    $("#programs .program-info > div[data-schedule-index='0']").show();
    scrollToAnchor("programs");
    menuAutoHeight();
}
function scrollToAnchor(id){
    var tag = $("#" + id);
    $('html,body').animate({scrollTop: tag.offset().top},'slow');
}
function menuAutoHeight() {
    var height = $("#programs .program-info > div[data-program-index='" + index + "']").height() + 150;
    if (height < 800) {
        height = 800;
    }
    $("#programs .menu-list").height(height);
    scrollToAnchor("programs");
}