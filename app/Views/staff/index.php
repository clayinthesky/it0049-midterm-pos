<?= view('layout/header') ?><?= view('layout/nav') ?>
<h1>Staff</h1><p><a class="button" href="<?= site_url('staff/new') ?>">Add Staf</a></p>
<table><tbody>
<?php foreach ($staff as $user): ?><tr>
    <td><?= esc($user['username']) ?></td><td><?= esc($user['full_name'] ?? '') ?></td>
    <td class="actions"><a href="<?= site_url('staff/' . $user['id'] . '/edit') ?>">Edit</a><form method="post" action="<?= site_url('staff/' . $user['id'] . '/delete') ?>"><?= csrf_field() ?><button class="danger" type="submit">Archive</button></form></td>
</tr><?php endforeach; ?></tbody></table>
<?= view('layout/footer') ?>
