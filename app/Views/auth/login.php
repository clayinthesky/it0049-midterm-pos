<?= view('layout/header') ?>
<h1>POS Login</h1>
<?php if (session('error')): ?><div class="error"><?= esc(session('error')) ?></div><?php endif; ?>
<form method="post" action="<?= site_url('login') ?>">
    <?= csrf_field() ?>
    <label>Username</label><input name="username" value="<?= old('username') ?>" required>
    <label>Password</label><input type="password" name="password" required>
    <button type="submit">Log In</button>
</form>
<?= view('layout/footer') ?>
