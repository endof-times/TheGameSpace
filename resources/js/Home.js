const GamesCard = $(".gamesCard");
const GamesCardImg = $(".gamesCardImg");
const GamesCardText = $(".gamesCardText");

const appUrl = window.location.origin;

GamesCard.on("mouseenter", function(){
    $(this).find(GamesCardImg).animate({
        "margin-inline-start": "2%"
    },100)
    $(this).addClass("gamesCardHover")
}).on("mouseleave", function(){
    $(this).find(GamesCardImg).animate({
        "margin-inline-start": "-10px"
    },100)
    $(this).removeClass("gamesCardHover")
}).on("click", function(){
    window.open(appUrl + `/game/?game=${$(this).find(".name").text()}&platform=${$(this).find(".platform").text()}`, "_self")

})
