<?= $this->include('layout/header') ?>
<table class="table">
    <thead>
        <tr>
            <th>Username</th>
            <th>Status</th>
            <th>Tanggal Dibuat</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data['users'] as $index=>$user): ?>
            <tr>
                <td><?= $user->username ?></td>
                <td><?php if($user->role == 0){ echo 'User'; }else{ echo 'Admin'; } ?></td>
                <td><?= $user->created_at ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?= $data['pager']->links('default', 'full_pager'); ?>
<?= $this->include('layout/footer') ?>