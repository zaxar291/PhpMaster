$(function(){
   $(document).ready(function(){
        AuthScripts.Init();
   });
});

var AuthScripts = {
    Init: function() {
        AuthLoader.LoadPage("auth/ajax");
        ContentLoader.LoadRegions(this.AcceptRegions);
    },

    AcceptRegions: function(data) {
        for(var i in data) {
            $("#region").append("<option value=\""+data[i]['reg_id']+"\">"+data[i]['ter_name']+"</option>");
        }
        AuthScripts.UpdateChosen();
    },

    AcceptTowns: function(data) {
        AuthScripts.ClearSelect("#town");
        for(var i in data) {
            $("#town").append("<option value=\""+data[i]['ter_name']+"\">"+data[i]['ter_name']+"</option>");
        }

        if($("#town").parent()[0].style.display === "none") {
            AuthScripts.Show($("#town").parent()[0]);
        }
        $("#town").addClass('chosen-select');
        AuthScripts.UpdateChosen();
    },

    AcceptArea: function (data) {
        AuthScripts.ClearSelect("#area");
        for(var i in data) {
            $("#area").append("<option value=\""+data[i]['ter_name']+"\">"+data[i]['ter_name']+"</option>");
        }
        if($("#area").parent()[0].style.display === "none") {
            AuthScripts.Show($("#area").parent()[0]);
        }
    },

    Show: function(element) {
        $(element).slideToggle("fast");
    },

    Hide: function(element) {
        $(element).slideToggle("fast");
    },

    ClearSelect: function (select) {
        $(select).find('option').remove();
        $(select).append("<option value=\"default\">--Select--</option>");
    },

    UpdateChosen: function() {
        var config = {
            '.chosen-select'           : {},
            '.chosen-select-deselect'  : { allow_single_deselect: true },
            '.chosen-select-no-single' : { disable_search_threshold: 10 },
            '.chosen-select-no-results': { no_results_text: 'Oops, nothing found!' },
            '.chosen-select-rtl'       : { rtl: true },
            '.chosen-select-width'     : { width: '95%' }
        };
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }
    },

    ShowLoader: function(loaderText) {
        if(loaderText === undefined) {
            loaderText = $("#loader_text").text();
        }else {
            $("#loader_text").text(loaderText);
        }

        $("#loader_body").animate({opacity : 1}, 1000);

        setTimeout(function(){
            $("#loader_body").css("display", "flex");
        }, 1000);
    },

    HideLoader: function() {
        $("#loader_body").animate({opacity : 0}, 1000);

        setTimeout(function(){
            $("#loader_body").css("display", "none");
        }, 1000);
    },

    ShowUserInfo: function() {
        AuthScripts.HideLoader();
        $("#user_modal").modal();
    },

    ShowUsersInfo: function() {
        AuthScripts.HideLoader();
        $("#users_modal").modal();
    }
};