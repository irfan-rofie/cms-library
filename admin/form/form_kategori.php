<?php
include '../../config/database.php';
$query = mysql_query("SELECT*FROM mst_kategori WHERE id_kategori='" . substr($_POST['id'], 0, 6) . "'");
$kode = mysql_num_rows($query);
if ($kode > 0) {
    $sql = mysql_fetch_array($query);
    if (substr($_POST['id'], 6, 1) != 0) {
        $title = "Detail Kategori Buku";
        $disabled = "disabled";
    } else {
        $title = "Ubah Kategori Buku";
        $icon = "icon-pencil";
        $submit = "&nbsp;Edit";
        $aksi = "ubah";
        $readonly = "readonly";
    }
} else {
    $title = "Tambah Kategori Buku";
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
        <form class = "form-horizontal" role = "form" method="post" action="proses/pros_kat.php?aksi=<?php echo $aksi; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
            <div class = "form-body">
                <div class = "form-group">
                    <label class = "col-md-3 control-label">ID Kategori</label>
                    <div class = "col-md-9">
                        <input type = "text" class = "form-control" placeholder = "ID Kategori" name="id_kategori" value="<?php echo $sql['id_kategori']; ?>" <?php echo $disabled." ".$readonly; ?> >
                    </div>
                </div>
                <div class = "form-group">
                    <label class = "col-md-3 control-label">Kategori Buku</label>
                    <div class = "col-md-9">
                        <input type = "text" class = "form-control" placeholder = "Kategori Buku" name="kategori" autofocus="" value="<?php echo $sql['kategori']; ?>" <?php echo $disabled; ?> >
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
