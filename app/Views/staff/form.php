<?= view('layout/header') ?><?= view('layout/nav') ?>
<h1>Save Staf</h1>
<form method="post" action="<?= $user ? site_url('staff/' . $user['id']) : site_url('staff') ?>">
    <?= csrf_field() ?>
    <label>username</label><input name="username" value="<?= old('username', $user['username'] ?? '') ?>" required>
    <label>full_name</label><input name="full_name" value="<?= old('full_name', $user['full_name'] ?? '') ?>" required>
    <label>password</label><input type="password" name="password" value="">
    <button type="submit">Save</button>
</form>
<?= view('layout/footer') ?>
