const Comment = $("#Comment");

Comment.on("keydown", function(event){
    if(event.code == "Enter"){
        this.form.submit()
    }
})
