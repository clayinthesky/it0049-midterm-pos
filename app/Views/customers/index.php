<?= view('layout/header') ?><?= view('layout/nav') ?>
<h1>Customers</h1><p><a class="button" href="<?= site_url('customers/new') ?>">Add Customer</a></p>
<table><tbody>
<?php foreach ($customers as $customer): ?><tr>
    <td><?= esc($customer['full_name']) ?></td><td><?= esc($customer['email'] ?? '') ?></td>
    <td class="actions"><a href="<?= site_url('customers/' . $customer['id'] . '/edit') ?>">Edit</a><form method="post" action="<?= site_url('customers/' . $customer['id'] . '/delete') ?>"><?= csrf_field() ?><button class="danger" type="submit">Archive</button></form></td>
</tr><?php endforeach; ?></tbody></table>
<?= view('layout/footer') ?>
