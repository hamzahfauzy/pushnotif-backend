<?php load_templates('layouts/top') ?>
<div class="card">
    <div class="card-header">
        <h4 class="m-0">Buat Notifikasi</h4>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="form-group">
                <label for="">Konten</label>
                <textarea name="notifications[contents]" class="form-control" rows="10" placeholder="Konten Notifikasi"><?=$notification->contents?></textarea>
            </div>
            <div class="form-group">
                <label for="">URL</label>
                <input type="url" name="notifications[url]" class="form-control" placeholder="URL" value="<?=$notification->url?>">
            </div>
            <div class="form-group">
                <label for="">Jadwal Kirim</label>
                <input type="datetime-local" value="<?= date('Y-m-d\TH:i',strtotime($notification->sent_at)) ?>" name="notifications[sent_at]" id="sent_at" class="form-control">
                <br>
                <label for="is_loop">
                    <input id="is_loop" type="checkbox" name="notifications[is_loop]" value="1" <?=$notification->is_loop?'checked=""':''?>> Berulang
                </label>
            </div>
            <!-- <div class="form-group">
                <label for="">Pilih OPD <small>(Kosongkan untuk mengirim ke semua OPD)</small></label>
                <select name="receivers[]" id="" class="select2" data-placeholder="Pilih OPD">
                    <option value="">- Pilih OPD -</option>
                    <?php foreach($opds as $opd): ?>
                    <option value="<?= $opd->id_skpd ?>"><?= $opd->nama_skpd ?></option>
                    <?php endforeach ?>
                </select>
            </div> -->
            <div class="form-group">
                <label for="">Enable</label>
                <select name="notifications[active_status]" class="form-control">
                    <option value="1" <?=$notification->active_status?'selected=""':''?>>Ya</option>
                    <option value="0" <?=!$notification->active_status?'selected=""':''?>>Tidak</option>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-success btn-sm">Simpan</button>
                <a href="index.php" class="btn btn-warning btn-sm">Kembali</a>
            </div>
        </form>
    </div>
</div>
<script>
function toggleSentAt()
{
    var select_sent_at = document.querySelector('#select_sent_at').value
    var sent_at_group = document.querySelector('#sent_at_group')
    if(select_sent_at == 1)
        sent_at_group.removeAttribute('style')
    else
        sent_at_group.setAttribute('style','height:0;overflow:hidden;margin-bottom:0;')
}
</script>
<?php load_templates('layouts/bottom') ?>