<div class="modal fade" id="users_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="padding:35px 50px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name, surname, patronymic</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($data as $key => $value) {
                            ?>
                            <tr>
                                <td><?php echo $value["fio"] ?></td>
                                <td><?php echo $value["email"] ?></td>
                                <td><?php echo $value["adress"] ?></td>
                            </tr>
                            <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>