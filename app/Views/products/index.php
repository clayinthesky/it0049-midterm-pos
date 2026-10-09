<?= view('layout/header') ?><?= view('layout/nav') ?>
<h1>Product Management</h1><p><a class="button" href="<?= site_url('products/new') ?>">Add Product</a></p>
<?php if (session('message')): ?><div class="message"><?= esc(session('message')) ?></div><?php endif; ?>
<table><thead><tr><th>Image</th><th>Name</th><th>Price</th><th>Stock</th><th>Action</th></tr></thead><tbody>
<?php foreach ($products as $product): ?><tr>
    <td><?php if ($product['image']): ?><img class="thumb" src="<?= base_url('uploads/products/' . $product['image']) ?>"><?php else: ?>No image<?php endif; ?></td>
    <td><?= esc($product['name']) ?></td><td><?= number_format((float) $product['price'], 2) ?></td><td><?= esc($product['stock_quantity']) ?></td>
    <td class="actions"><a href="<?= site_url('products/' . $product['id'] . '/edit') ?>">Edit</a><form method="post" action="<?= site_url('products/' . $product['id'] . '/delete') ?>"><?= csrf_field() ?><button class="danger" type="submit">Archive</button></form></td>
</tr><?php endforeach; ?></tbody></table>
<?= view('layout/footer') ?>
