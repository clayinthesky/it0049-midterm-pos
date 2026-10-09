<?= view('layout/header') ?><?= view('layout/nav') ?>
<h1>Record Sale</h1>
<?php if (session('error')): ?><div class="error"><?= esc(session('error')) ?></div><?php endif; ?>
<form method="post" action="<?= site_url('sales') ?>">
    <?= csrf_field() ?>
    <label>Product</label><select name="product_id" required><?php foreach ($products as $product): ?><option value="<?= esc($product['id']) ?>"><?= esc($product['name']) ?> - stock <?= esc($product['stock_quantity']) ?></option><?php endforeach; ?></select>
    <label>Customer</label><select name="customer_id"><option value="">Walk-in customer</option><?php foreach ($customers as $customer): ?><option value="<?= esc($customer['id']) ?>"><?= esc($customer['full_name']) ?></option><?php endforeach; ?></select>
    <label>Quantity</label><input type="number" name="quantity" min="1" required>
    <button class="success" type="submit">Save Sale</button>
</form>
<?= view('layout/footer') ?>
