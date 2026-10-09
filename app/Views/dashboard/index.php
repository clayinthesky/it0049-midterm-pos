<?= view('layout/header') ?><?= view('layout/nav') ?>
<h1>Complete Point of Sale System</h1>
<section class="grid">
    <div class="card"><h2>Total Products</h2><p><?= esc($productCount) ?> active products</p></div>
    <div class="card"><h2>Sales Recorded</h2><p><?= esc($saleCount) ?> transactions</p></div>
    <div class="card"><h2>Stock Control</h2><p>Sales above stock are rejected.</p></div>
</section>
<?= view('layout/footer') ?>
