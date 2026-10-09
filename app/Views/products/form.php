<?= view('layout/header') ?><?= view('layout/nav') ?>
<h1><?= $product ? 'Edit Product' : 'Add Product' ?></h1>
<form method="post" enctype="multipart/form-data" action="<?= $product ? site_url('products/' . $product['id']) : site_url('products') ?>">
    <?= csrf_field() ?>
    <label>Name</label><input name="name" value="<?= old('name', $product['name'] ?? '') ?>" required>
    <label>Price</label><input type="number" step="0.01" name="price" value="<?= old('price', $product['price'] ?? '') ?>" required>
    <label>Stock Quantity</label><input type="number" name="stock_quantity" value="<?= old('stock_quantity', $product['stock_quantity'] ?? 0) ?>" required>
    <label>Product Image</label><input type="file" name="image" accept="image/png,image/jpeg,image/webp">
    <button type="submit">Save Product</button>
</form>
<?= view('layout/footer') ?>
