<?php load_templates('layouts/top') ?>
<div class="card">
    <div class="card-header">
        <h4 class="m-0">List Notifikasi</h4>
    </div>
    <div class="card-body">
        <p></p>
        <a href="index.php?r=notifications/create" class="btn btn-success btn-sm"><i class="ti ti-plus"></i> Buat Baru</a>
        <p></p>
        <?php if($msg): ?>
        <div class="alert alert-success">
            <?= $msg ?>
        </div>
        <?php endif ?>
        <div class="table-responsive">
            <table class="table table-hover datatable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Konten</th>
                        <th>Dikirim Pada</th>
                        <th>Penerima</th>
                        <th>Berulang</th>
                        <th>Enable</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($notifications)): ?>
                    <tr>
                        <td colspan="5" class="text-center"><i>Tidak ada Data</i></td>
                    </tr>
                    <?php endif;
                    foreach($notifications as $key => $notification): ?>
                    <tr>
                        <td><?=$key+1?></td>
                        <td><?=$notification->contents ?></td>
                        <td><?=$notification->sent_at??$notification->created_at?></td>
                        <td><?=$notification->user_name != null ? $notification->user_name : 'Semua Pengguna' ?></td>
                        <td><?=$notification->is_loop ? 'Ya' : 'Tidak' ?></td>
                        <td>
                            <select class="form-control" onchange="updateStatus(<?=$notification->id?>,this.value)">
                                <option value="1" <?=$notification->active_status?'selected=""':''?>>Ya</option>
                                <option value="0" <?=!$notification->active_status?'selected=""':''?>>Tidak</option>
                            </select>
                        </td>
                        <td>
                            <?php if($notification->sent_at): ?>
                            <a href="index.php?r=notifications/update&id=<?=$notification->id?>" class="btn btn-warning text-strong"><i class="ti ti-pencil"></i></a>
                            <?php endif ?>
                            <a href="index.php?action=notifications/delete&id=<?=$notification->id?>" class="btn btn-danger text-strong"><i class="ti ti-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
function updateStatus(id, value)
{
    var formData = new FormData;
    formData.append('id',id)
    formData.append('active_status',value)
    fetch('index.php?r=notifications/update-status',{
        method:'POST',
        body:formData
    })
    .then(res => res.json())
    .then(res => console.log(res))
}
</script>
<?php load_templates('layouts/bottom') ?>