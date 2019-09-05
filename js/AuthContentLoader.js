var ContentLoader = {

    LoadRegions: function(callback) {
        this.BaseLoad("regions", callback);
    },

    LoadTowns: function(callback, region) {
        this.BaseLoad("towns&region=" + region, callback);
    },

    LoadAreas: function(callback, region) {
        this.BaseLoad("areas&region=" + region, callback);
    },

    BaseLoad: function(action, callback) {
        $.ajax({
            url: $("#HTTP_HOST").val() + "auth/ajax?action=" + action,
            success: function (msg) {
                callback(JSON.parse(msg));
            }
        });
    }
};