import * as SearchElements from './Search.js'
const NavLink = $("#Navigation a");

const SettingsButton = $("#Settings>button");
const SettingsMenu = $("#SettingsMenu");

const Footer = $("#Footer");

//Navigation buttons animation
NavLink.on("mouseover", function () {
    $(this).addClass("textGlow").css("color", "var(--purple)")
}).on("mouseleave", function () {
    $(this).removeClass("textGlow").css("color", "var(--white)")
})

//Settings button animation
SettingsButton.on("mousedown", function () {
    $(this).css("color", "var(--purple)");
}).on("mouseup", function () {
    $(this).css("color", "var(--white)");
}).on("click", function () {
    if (SettingsMenu.css("display") == "none") {
        SettingsMenu.css({
            "display": "flex",
        })
        $(this).css("color", "var(--purple)")

    } else {
        SettingsMenu.css({
            "display": "none",
        })
        $(this).css("color", "var(--white)")
    }
})

$(window).on("click", function (event) {
    if (!event.target.matches("#Settings>button")) {
        SettingsMenu.css("display", "none")
        SettingsButton.css("color", "white")
    }

    if (!event.target.matches("#SearchBar *") && !event.target.matches("#SearchResults *")) {
        SearchElements.SearchResults.css("display", "none")
        SearchElements.SearchBar.removeClass("searchBarFocus")
    }
})
