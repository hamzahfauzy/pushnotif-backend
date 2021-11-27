<?php load_templates('layouts/top') ?>
<div class="card">
    <div class="card-header">
        <h4 class="m-0">List Penerima Notifikasi : <?=$notification->contents?></h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover datatable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Diterima Pada</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($receivers as $key => $receiver): ?>
                    <tr>
                        <td><?=$key+1?></td>
                        <td><?=$receiver->user_name ?></td>
                        <td><?=$receiver->status?></td>
                        <td><?=$receiver->receive_at?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php load_templates('layouts/bottom') ?>