<div class="modal fade" id="install_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="padding:35px 50px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Database installation</h4>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <p align="center">Host</p>
                <input type="text" class="form-control" id="host" value="<?php echo $settings->dbSettings->db_host ?>">
                <p align="center">User name</p>
                <input type="text" class="form-control" id="user" value="<?php echo $settings->dbSettings->db_user ?>">
                <p align="center">Password</p>
                <input type="password" class="form-control" id="pass" value="<?php echo $settings->dbSettings->db_pass ?>">
                <p align="center">Database name</p>
                <input type="text" class="form-control" id="name" value="<?php echo $settings->dbSettings->db_name ?>">
                <button class="btn" id="confirm-settings" style="width:100%;margin-top: 15px">Confirm settings</button>
            </div>
        </div>
    </div>
</div>

<script>
    $("#install_modal").modal();

    $("#confirm-settings").click(function(){
        var data = {
          host: $("#host").val(),
          uName: $("#user").val(),
          pass: $("#pass").val(),
          dbName: $("#name").val()
        };
        if(data.host === "") {
            $("#host").focus();
            return;
        }
        if(data.uName === "") {
            $("#user").focus();
            return;
        }
        if(data.dbName === "") {
            $("#name").focus();
            return;
        }
       $.ajax({
           url: $("#HTTP_HOST").val() + "install/ajax?data="+JSON.stringify(data),
           success: function(msg) {
               var data = JSON.parse(msg);
               if(data["is_success"]) {
                   location.href = $("#HTTP_HOST").val() + "auth";
               }else{
                   alert(data["message"]);
               }
           }
       });
    });
</script>