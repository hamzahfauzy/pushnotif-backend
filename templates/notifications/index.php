<?php 
load_templates('layouts/top');
$auth = auth();
?>
<div class="card">
    <div class="card-header">
        <h4 class="m-0">List Notifikasi <?=$type?></h4>
    </div>
    <div class="card-body">
        <?php if($auth->role_name == 'Admin'): ?>
        <p></p>
        <a href="index.php?r=notifications/create" class="btn btn-success btn-sm"><i class="ti ti-plus"></i> Buat Baru</a>
        <?php endif ?>
        <p></p>
        <?php if($msg): ?>
        <div class="alert alert-success">
            <?= $msg ?>
        </div>
        <?php endif ?>
        <div class="table-responsive">
            <table class="table table-hover notifdatatable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Konten</th>
                        <th>Dikirim Pada</th>
                        <th>Penerima</th>
                        <th>Berulang</th>
                        <th>Enable</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Konten</th>
                        <th>Dikirim Pada</th>
                        <th>Penerima</th>
                        <th>Berulang</th>
                        <th>Enable</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
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