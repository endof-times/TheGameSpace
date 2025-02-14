const NavLink = $("#Navigation a");
const SearchBar = $("#SearchBar");
const SearchBox = $("#SearchBox");
const SearchResults = $("#SearchResults");

const SettingsButton = $("#Settings>button");
const SettingsMenu = $("#SettingsMenu");

const Footer = $("#Footer");
const appURL = window.location.origin;

//Navigation buttons animation
NavLink.on("mouseover", function () {
    $(this).addClass("textGlow").css("color", "var(--purple)")
}).on("mouseleave", function () {
    $(this).removeClass("textGlow").css("color", "var(--white)")
})

//Searchbar animation and functions
SearchBox.on("keyup", function (event) {
    if ($(this).val() != "") {
        SearchResults.css({ "display": "unset" })
        SearchBar.addClass("searchBarFocus")
    } else {
        SearchResults.css({ "display": "none" })
        SearchBar.removeClass("searchBarFocus")
    }

    $.ajax({
        url: appURL + `/search/?term=${SearchBox.val()}`,
        type: "GET",
        success: function (response) {
            SearchResults.empty()
            if ( response.length != 0 ) {
                for (let i = 0; i < response.length; i++) {
                    const searchItem = $(`<p> + ${response[i].Name} - ${response[i].Platform}</p>`)
                    SearchResults.append(searchItem)
                    searchItem.on("click", function () {
                        window.open(appURL + `/game/?game=${response[i].Name}&platform=${response[i].Platform}`, "_self")
                    })

                }
            }else{
                const searchItem = $(`<p>No results found</p>`);
                SearchResults.append(searchItem);
            }
        },
        error: function (error) {
            console.log(error.statusText + `: ${appURL}`);
        }
    })
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
        SearchResults.css("display", "none")
        SearchBar.removeClass("searchBarFocus")
    }
})
