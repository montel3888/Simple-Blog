<div class="container">
<div class="login-container">
    <div id="output"></div>
    <div class="avatar"></div>
    <div class="form-box">
        <form action="admin/admin/login" method="post">
        <!--<input type="hidden" name="login" value="true" />-->
                <label for="username">Пользователь</label>
                <input type="text" name="username" id="username" placeholder="Admin" required autofocus maxlength="20" />

                <label for="password">Пароль</label>
                <input type="password" name="password" id="password" placeholder="Password" required maxlength="20" />    
                <input type="submit" class="btn btn-dark login" name="login" value="Войти" />
        </form>
    </div>
    <?php if ( isset( $_SESSION['error']) ): ?>
      <div class="alert alert-danger" role="alert"><strong><?= $_SESSION['error']; unset($_SESSION['error'])?></strong></div>
    <?php endif; ?>    
</div>
</div>