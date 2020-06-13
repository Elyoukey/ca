<form action="<?php echo BASE_PATH; ?>/user/actions/login.php" method="POST">

    <div class="hname">
        <input type="text" name="hname" />
    </div>
    <div class="row">
        <div class="col-12">
            <label for="login-name">Login</label><input type="text" id="login-name" name="name"/>

        </div>

    </div>
    <div class="row">
        <div class="col-12">
            <label for="login-password">Password</label><input type="password" name="password"/>

        </div>

    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>

<div class="newaccount">
    <a href="<?php echo BASE_PATH;?>/user/newaccount.php">Créer un nouveau compte</a>
</div>

<div class="resetpassword">
    <a href="<?php echo BASE_PATH;?>/user/resetpassword_1.php">Mot de passe perdu</a>
</div>



