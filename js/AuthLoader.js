var AuthLoader = {
    LoadPage: function(page, callback) {
        AuthLoader.BaseLoad(page, callback);
    },

    BaseLoad: function(action, callback) {
        $.ajax({
            url: $("#HTTP_HOST").val() + action,
            success: function (msg) {
                $(document.body).append(msg);

                $("#loader_body").animate({opacity : 0}, 1000);

                setTimeout(function(){
                    $("#loader_body").css("display", "none");
                }, 1000);

                if(callback !== undefined) {
                    callback();
                }
            }
        });
    }
};