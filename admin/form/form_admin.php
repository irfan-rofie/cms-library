<?php
include '../../config/database.php';
$query = mysql_query("SELECT*FROM mst_admin WHERE id='" . substr($_POST['id'], 0, 14) . "'");
$kode = mysql_num_rows($query);
if ($kode > 0) {
    if (substr($_POST['id'], 14, 1) != 0) {
        $title = "Detail Data Admin";
        $disabled = "disabled";
    } else {
        $title = "Ubah Data Admin";
        $icon = "icon-pencil";
        $submit = "&nbsp;Edit";
        $aksi = "ubah";
    }
    $sql = mysql_fetch_array(mysql_query("SELECT*FROM mst_admin WHERE id=" . substr($_POST['id'], 0, 14)));
    $id = $sql['id'];
} else {
    $title = "Tambah Admin Baru";
    $icon = "icon-save";
    $submit = "&nbsp;Simpan";
    $aksi = "tambah";
    $id = date('dmYHis');
//    $query = mysql_fetch_array(mysql_query("SELECT max(kd_user) as max_id FROM mst_user"));
//    $result = substr($query['max_id'], 4, 4) + 1;
//    $length = strlen($result);
//    if ($length == 1) {
//        $max = "adm-000" . $result;
//    } else if ($length == 2) {
//        $max = "adm-00" . $result;
//    } else if ($length == 3) {
//        $max = "adm-0" . $result;
//    } else if ($length == 4) {
//        $max = "adm-" . $result;
//    }
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
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
            <div class = "form-body">
                <div class = "form-group">
                    <label class = "col-md-3 control-label">Kode Admin</label>
                    <div class = "col-md-9">
                        <input type = "text" class = "form-control" name="id" id="id" value="<?php echo $id; ?>" readonly <?php echo $disabled; ?> >
                    </div>
                </div>
                <div class = "form-group">
                    <label class = "col-md-3 control-label">Username</label>
                    <div class = "col-md-9">
                        <input type = "text" class = "form-control" placeholder = "Username" name="username" id="username" autofocus="" value="<?php echo $sql['username']; ?>" <?php echo $disabled; ?> >
                    </div>
                </div>
                <div class = "form-group">
                    <label class = "col-md-3 control-label">Password</label>
                    <div class = "col-md-9">
                        <input type = "password" class = "form-control" placeholder = "Password" name="password" id="password" value="<?php echo $sql['password']; ?>" <?php echo $disabled; ?> >
                    </div>
                </div>
                <?php if($kode > 0){ ?>
                <div class = "form-group">
                    <label class = "col-md-3 control-label">Nama Lengkap</label>
                    <div class = "col-md-9">
                        <input type = "text" class = "form-control" placeholder = "Nama Lengkap" name="nama_lengkap" id="nama_lengkap" value="<?php echo $sql['nama_lengkap']; ?>" <?php echo $disabled; ?> >
                    </div>
                </div>   
                <div class="form-group">
                    <label  class="col-md-3 control-label">Jenis Kelamin</label>
                    <div class="col-md-9">
                        <label class="radio-inline">
                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="laki-laki"> Laki- Laki
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="perempuan"> Perempuan
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Tanggal Lahir</label>
                    <div class="col-md-3">
                        <div class="input-group input-medium date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" class="form-control" readonly>
                            <span class="input-group-btn">
                                <button class="btn default" type="button"><i class="icon-calendar"></i></button>
                            </span>
                        </div>
                    </div>
                </div>                
                <div class="form-group">
                    <label  class="col-md-3 control-label">Alamat</label>
                    <div class="col-md-9">
                        <textarea class="form-control" rows="3" name="alamat"></textarea>
                    </div>
                </div>               
                <div class = "form-group">
                    <label class = "col-md-3 control-label">No Kontak</label>
                    <div class = "col-md-9">
                        <input type = "text" class = "form-control" placeholder = "No Kontak" name="no_kontak" id="no_kontak" value="<?php echo $sql['no_kontak']; ?>" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Tanggal Masuk</label>
                    <div class="col-md-3">
                        <div class="input-group input-medium date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" class="form-control" readonly name="tanggal_masuk">
                            <span class="input-group-btn">
                                <button class="btn default" type="button"><i class="icon-calendar"></i></button>
                            </span>
                        </div>
                    </div>
                </div> 
                <div class="form-group">
                    <label for="exampleInputFile" class="col-md-3 control-label">Foto</label>
                    <div class="col-md-9">
                        <input type="file" id="exampleInputFile" name="foto">
                    </div>
                </div>                
                <?php }?>
                <div class = "form-group">
                    <label class = "col-md-3 control-label">Status</label>
                    <div class = "col-md-9">
                        <select name="id_status" class="form-control">
                            <option value="-" disabled selected>--- Pilih ---</option>
                            <?php
                            include '../../config/database.php';
                            $query = mysql_query("SELECT * FROM mst_status");
                            while ($rows = mysql_fetch_array($query)) { 
                                if($rows['id_status']==$sql['id_status']){ $selected="selected"; }else{$selected="";}
                                ?>
                            <option value="<?php echo $rows['id_status']; ?>" <?php echo $selected; ?> ><?php echo $rows['status']; ?></option>    
                            <?php }?>
                        </select>
                    </div>
                </div>                
            </div>
            <?php if (substr($_POST['id'], 14, 1) != 0) { ?>
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
