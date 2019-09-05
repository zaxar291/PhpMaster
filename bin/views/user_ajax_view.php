<div class="modal fade" id="user_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="padding:35px 50px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Information about <?php echo $data[0]["fio"] ?></h4>
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
                        <tr>
                            <td><?php echo $data[0]["fio"] ?></td>
                            <td><?php echo $data[0]["email"] ?></td>
                            <td><?php echo $data[0]["adress"] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>