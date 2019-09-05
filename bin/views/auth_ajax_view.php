<div class="form-body">
    <div class="form-container">
        <div class="form-element">
            <input type="text" id="fio" placeholder="Put your name, surname and patronymic here">
        </div>
        <div class="form-element">
            <input type="text" id="email" placeholder="Put your email here">
        </div>
        <div class="form-element">
            <select id="region" class="chosen-select">
                <option value="default">--Select--</option>
            </select>
        </div>
        <div class="form-element" style="display: none">
            <select id="town">
                <option value="default">--Select--</option>
            </select>
        </div>
        <div class="form-element" style="display: none">
            <select id="area"">
                <option value="default">--Select--</option>
            </select>
        </div>
        <div class="form-element">
            <button class="btn" id="register-btn">Register now</button>
        </div>
        <div class="form-element">
            <button class="btn" id="users-btn">Show user list</button>
        </div>
    </div>
</div>


<script src="<?php echo $settings->routerSettings->HTTP_HOST ?>js/AuthObserver.js"></script>
<script src="<?php echo $settings->routerSettings->HTTP_HOST ?>js/chosen.jquery.js"></script>
