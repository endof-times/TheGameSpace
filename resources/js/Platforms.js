const PlatformsCard = $(".platformsCard");
const baseUrl = window.location.origin;


PlatformsCard.on("mouseenter", function () {
    $(this).addClass("gamesCardHover");
}).on("mouseleave", function () {
    $(this).removeClass("gamesCardHover")
}).on("click", function () {
    const currentPlat = $(this).text()
    window.open(baseUrl + `/platform/?plat=${currentPlat}`, "_self")
})

const PlatformSort = $("#PlatformSort");

PlatformSort.on("change", function () {
    const selectedSortOrder = $(this).val();
    if (selectedSortOrder) {
        const currentUrl = baseUrl + `/platform/?plat=${PlatformSort.attr("name")}&sortorder=${selectedSortOrder}`;
        window.open(currentUrl, "_self")
    }else{
        window.open(baseUrl + `/platform/?plat=${PlatformSort.attr("name")}`, "_self")
    }
})
