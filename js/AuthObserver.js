$(function(){
   $(document).ready(function(){
       $("#region").change(function(){
            ContentLoader.LoadTowns(AuthScripts.AcceptTowns, $("#region").val());
       });
       $("#town").change(function(){
           ContentLoader.LoadAreas(AuthScripts.AcceptArea, $("#region").val());
       });
       $("#fio").keyup(function(){
           var reg=/[a-zA-Zа-яА-ЯҐґЄєІіЇї]+\s[a-zA-Zа-яА-ЯҐґЄєІіЇї]+\s[a-zA-Zа-яА-ЯҐґЄєІіЇї]+$/gi;
           if(!reg.test($("#fio").val())) {
               $("#fio").addClass("error");
           }else{
               $("#fio").removeClass("error");
           }
       });
       $("#email").keyup(function(){
           var reg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
           if(!reg.test($("#email").val())) {
               $("#email").addClass("error");
           }else{
               $("#email").removeClass("error");
           }
       });
       
       $("#register-btn").click(function () {
           if($("#fio").hasClass("error")) {
               $("#fio").focus();
               return;
           }
           if($("#email").hasClass("error")) {
               $("#email").focus();
               return;
           }
           if($("#region").val() == "default") {
               $("#region").focus();
               return;
           }
           if($("#town").val() == "default") {
               $("#town").focus();
               return;
           }
           if($("#area").val() == "default") {
               $("#area").focus();
               return;
           }
           var data = {
               fio: $("#fio").val(),
               email: $("#email").val(),
               region: $("#region").val(),
               town: $("#town").val(),
               area: $("#area").val()
           };
           $.ajax({
               url: $("#HTTP_HOST").val() + "register/ajax/?data=" + JSON.stringify(data),
               success: function(msg) {
                    var data = JSON.parse(msg);
                    if(data["message_type"] === "user_registered") {
                        AuthScripts.ShowLoader(data["message"]);
                        AuthLoader.LoadPage("user/ajax?email=" + data["userEmail"], AuthScripts.ShowUserInfo);
                    }else{
                        alert(data["message"]);
                    }
               }
           });
       })

       $("#users-btn").click(function(){
           AuthLoader.LoadPage("users/ajax", AuthScripts.ShowUsersInfo);
       })
   });
});