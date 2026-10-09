<?= view('layout/header') ?><?= view('layout/nav') ?>
<h1>Sales History</h1>
<?php if (session('message')): ?><div class="message"><?= esc(session('message')) ?></div><?php endif; ?>
<table><thead><tr><th>Date</th><th>Product</th><th>Customer</th><th>Staff</th><th>Qty</th><th>Total</th></tr></thead><tbody>
<?php foreach ($sales as $sale): ?><tr><td><?= esc($sale['created_at']) ?></td><td><?= esc($sale['product_name']) ?></td><td><?= esc($sale['customer_name'] ?? 'Walk-in') ?></td><td><?= esc($sale['staff_name']) ?></td><td><?= esc($sale['quantity']) ?></td><td><?= number_format((float) $sale['total_price'], 2) ?></td></tr><?php endforeach; ?>
</tbody></table>
<?= view('layout/footer') ?>
