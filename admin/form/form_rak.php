<?php
include '../../config/database.php';
$query = mysql_query("SELECT*FROM mst_rak WHERE id_rak='" . substr($_POST['id'], 0, 6) . "'");
$kode = mysql_num_rows($query);
if ($kode > 0) {
    $sql = mysql_fetch_array($query);
    if (substr($_POST['id'], 6, 1) != 0) {
        $title = "Detail Rak Buku";
        $disabled = "disabled";
    } else {
        $title = "Ubah Rak Buku";
        $icon = "icon-pencil";
        $submit = "&nbsp;Edit";
        $aksi = "ubah";
        $readonly = "readonly";
    }
} else {
    $title = "Tambah Rak Buku";
    $icon = "icon-save";
    $submit = "&nbsp;Simpan";
    $aksi = "tambah";
}
?>
<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i><?php echo $title; ?>
        </div>
    </div>
    <div class="portlet-body form">
        <form class = "form-horizontal" role = "form" method="post" action="proses/pros_rak.php?aksi=<?php echo $aksi; ?>">
            <div class = "form-body">
                <div class = "form-group">
                    <label class = "col-md-3 control-label">ID Rak</label>
                    <div class = "col-md-9">
                        <input type = "text" class = "form-control" placeholder = "ID Rak" name="id_rak" value="<?php echo $sql['id_rak']; ?>" <?php echo $disabled." ".$readonly; ?> >
                    </div>
                </div>
                <div class = "form-group">
                    <label class = "col-md-3 control-label">Nama Rak</label>
                    <div class = "col-md-9">
                        <input type = "text" class = "form-control" placeholder = "Nama Rak" name="nama_rak" autofocus="" value="<?php echo $sql['nama_rak']; ?>" <?php echo $disabled; ?> >
                    </div>
                </div>
            </div>
            <?php if (substr($_POST['id'], 6, 1) != 0) { ?>
                <div class = "form-actions fluid">
                    <div class = "col-md-offset-3 col-md-9">
                        <button  data-dismiss="modal" aria-hidden="true" class = "btn red" style="background-color: #8B0000"><i class="icon-backward">&nbsp;Kembali</i></button>
                    </div>
                </div>
            <?php } else { ?>
                <div class = "form-actions fluid">
                    <div class = "col-md-offset-3 col-md-9">
                        <button type = "submit" id="simpan" class = "btn red" style="background-color: #8B0000"><i class="<?php echo $icon; ?>"><?php echo $submit; ?></i></button>
                        <button class = "btn default" data-dismiss="modal" aria-hidden="true">Batal</button>
                    </div>
                </div>
            <?php } ?>
        </form>
    </div>
</div>
