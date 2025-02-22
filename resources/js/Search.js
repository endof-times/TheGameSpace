export const SearchBar = $("#SearchBar");
export const SearchBox = $("#SearchBox");
export const SearchResults = $("#SearchResults");
const appURL = window.location.origin;

//Searchbar animation and functions
SearchBox.on("keyup", function (event) {
    if ($(this).val() != "") {
        SearchResults.css({ "display": "unset" })
        SearchBar.addClass("searchBarFocus")
    } else {
        SearchResults.css({ "display": "none" })
        SearchBar.removeClass("searchBarFocus")
    }

    Search()

})

function Search(){
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
}
