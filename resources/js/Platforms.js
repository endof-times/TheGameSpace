const PlatformsCard = $(".platformsCard");
const baseUrl = window.location.origin;

PlatformsCard.on("mouseenter", function(){
    $(this).addClass("gamesCardHover");
}).on("mouseleave", function(){
    $(this).removeClass("gamesCardHover")
}).on("click", function(){
    const currentPlat = $(this).text()
    window.open(baseUrl + `/platform/?plat=${currentPlat}`, "_self")
})
