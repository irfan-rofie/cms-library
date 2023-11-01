<?php
include '../../config/database.php';
$kode = mysql_num_rows(mysql_query("SELECT*FROM mst_anggota WHERE kd_agt='" . substr($_POST['id'], 0, 7) . "'"));
if ($kode > 0) {
    if (substr($_POST['id'], 7, 1) != 0) {
        $title = "Detail Data Anggota";
        $disabled = "disabled";
    } else {
        $title = "Ubah Data Anggota";
        $icon = "icon-pencil";
        $submit = "&nbsp;Edit";
        $aksi = "ubah";
    }
    $sql = mysql_fetch_array(mysql_query("SELECT*FROM mst_anggota WHERE kd_agt='" . substr($_POST['id'], 0, 7) . "'"));
    $kd_agt = $sql['kd_agt'];
} else {
    $title = "Tambah Anggota Baru";
    $icon = "icon-save";
    $submit = "&nbsp;Simpan";
    $aksi = "tambah";
    $query = mysql_fetch_array(mysql_query("SELECT max(kd_agt) as max_id FROM mst_anggota"));
    $result = substr($query['max_id'], 4, 4) + 1;
    $length = strlen($result);
    if ($length == 1) {
        $max = "agt-000" . $result;
    } else if ($length == 2) {
        $max = "agt-00" . $result;
    } else if ($length == 3) {
        $max = "agt-0" . $result;
    } else if ($length == 4) {
        $max = "agt-" . $result;
    }
    $kd_agt = $max;
}
?>
<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i><?php echo $title; ?>
        </div>
    </div>
    <div class="portlet-body form">
        <form class = "form-horizontal" role = "form" method="post" action="proses/pros_adm.php?aksi=<?php echo $aksi; ?>">
            <div class = "form-body">
                <div class = "form-group">
                    <label class = "col-md-3 control-label">Kode Anggota</label>
                    <div class = "col-md-9">
                        <input type = "text" class = "form-control" name="kd_agt" id="kd_agt" value="<?php echo $kd_agt; ?>" readonly <?php echo $disabled; ?> >
                    </div>
                </div>
                <div class = "form-group">
                    <label class = "col-md-3 control-label">Nama</label>
                    <div class = "col-md-9">
                        <input type = "text" class = "form-control" placeholder="Nama" name="nama" id="nama" value="<?php echo $sql['nama']; ?>" <?php echo $disabled; ?> >
                    </div>
                </div>
                <div class = "form-group">
                    <label class = "col-md-3 control-label">Alamat</label>
                    <div class = "col-md-9">
                        <input type = "text" class = "form-control" placeholder="Alamat" name="alamat" id="alamat" value="<?php echo $sql['alamat']; ?>" <?php echo $disabled; ?> >
                    </div>
                </div>
                <div class = "form-group">
                    <label class = "col-md-3 control-label">Pekerjaan</label>
                    <div class = "col-md-9">
                        <input type = "text" class = "form-control" placeholder = "Pekerjaan" name="pekerjaan" id="pekerjaan" value="<?php echo $sql['pekerjaan']; ?>" <?php echo $disabled; ?> >
                    </div>
                </div>
                <div class = "form-group">
                    <label class = "col-md-3 control-label">Umur</label>
                    <div class = "col-md-9">
                        <input type = "text" class = "form-control" placeholder = "Umur" name="umur" id="pekerjaan" autofocus="" value="<?php echo $sql['umur']; ?>" <?php echo $disabled; ?> >
                    </div>
                </div>
                <div class = "form-group">
                    <label class = "col-md-3 control-label">Password</label>
                    <div class = "col-md-9">
                        <input type = "password" class = "form-control" placeholder = "Password" name="password" id="pass" value="<?php echo $sql['password']; ?>" <?php echo $disabled; ?> >
                    </div>
                </div>
            </div>
            <?php if (substr($_POST['id'], 7, 1) != 0) { ?>
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