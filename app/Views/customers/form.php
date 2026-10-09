<?= view('layout/header') ?><?= view('layout/nav') ?>
<h1>Save Customer</h1>
<form method="post" action="<?= $customer ? site_url('customers/' . $customer['id']) : site_url('customers') ?>">
    <?= csrf_field() ?>
    <label>full_name</label><input name="full_name" value="<?= old('full_name', $customer['full_name'] ?? '') ?>" required>
    <label>email</label><input name="email" value="<?= old('email', $customer['email'] ?? '') ?>" required>
    <label>phone</label><input  name="phone" value="">
    <button type="submit">Save</button>
</form>
<?= view('layout/footer') ?>
