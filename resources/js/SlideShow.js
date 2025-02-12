const GlideSlide = $(".glide__slide")
const GlideSlideText = $(".glide__slide__text");

for(let i=0; i < GlideSlide.length; i++){

    $(GlideSlide[i]).on("mouseover", function(){
        $(GlideSlideText[i]).animate({
            "block-size": "40%"
        }, 70)
    }).on("mouseleave", function(){
        $(GlideSlideText[i]).animate({
            "block-size": "0"
        }, 70)
    })
}



