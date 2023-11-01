<?php
include '../../config/database.php';
$query = mysql_query("SELECT*FROM mst_petugas WHERE nik='" . substr($_POST['id'], 0, 6) . "'");
$kode = mysql_num_rows($query);
if ($kode > 0) {
    $sql = mysql_fetch_array($query);
    if (substr($_POST['id'], 6, 1) != 0) {
        $title = "Detail Petugas";
        $disabled = "disabled";
    } else {
        $title = "Ubah Data Petugas";
        $icon = "icon-pencil";
        $submit = "&nbsp;Edit";
        $aksi = "ubah";
        $readonly = "readonly";
    }
} else {
    $title = "Tambah Petugas Baru";
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
        <form class = "form-horizontal" role = "form" enctype="multipart/form-data" method="post" action="proses/pros_petugas.php?aksi=<?php echo $aksi; ?>">
            <div class = "form-body">
                <div class = "form-group">
                    <label class = "col-md-3 control-label">NIK</label>
                    <div class = "col-md-9">
                        <input type = "text" class = "form-control" placeholder = "NIK" name="nik" value="<?php echo $sql['nik']; ?>" <?php echo $disabled." ".$readonly; ?> >
                    </div>
                </div>
                <div class = "form-group">
                    <label class = "col-md-3 control-label">Nama Lengkap</label>
                    <div class = "col-md-9">
                        <input type = "text" class = "form-control" placeholder = "Nama Lengkap" name="nama_lengkap" autofocus="" value="<?php echo $sql['nama_lengkap']; ?>" <?php echo $disabled; ?> >
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-md-3 control-label">Alamat</label>
                    <div class="col-md-9">
                        <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat"><?php echo $sql['alamat']; ?></textarea>
                    </div>
                </div>   
                <div class = "form-group">
                    <label class = "col-md-3 control-label">Jenis Kelamin</label>
                    <div class="col-md-9">
                        <label class="radio-inline">
                            <input type="radio" name="jenis_kelamin" value="0"> Laki- Laki
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="jenis_kelamin" value="1"> Perempuan
                        </label>
                    </div>
                </div>
                <div class = "form-group">
                    <label class = "col-md-3 control-label">Penerbit</label>
                    <div class = "col-md-9">
                        <input type = "text" class = "form-control" placeholder = "Penerbit" name="penerbit" autofocus="" value="<?php echo $sql['penerbit']; ?>" <?php echo $disabled; ?> >
                    </div>
                </div>
                <div class = "form-group">
                    <label class = "col-md-3 control-label">Tahun Tertbit</label>
                    <div class = "col-md-9">
                        <input type = "text" class = "form-control" placeholder = "Tahun Terbit" name="tahun_terbit" autofocus="" value="<?php echo $sql['tahun_terbit']; ?>" <?php echo $disabled; ?> >
                    </div>
                </div>
                <div class = "form-group">
                    <label class = "col-md-3 control-label">Kategori</label>
                    <div class = "col-md-9">
                        <select name="id_kategori" class="form-control">
                            <option value="-" disabled selected>--- Pilih ---</option>
                            <?php
                            include '../../config/database.php';
                            $query = mysql_query("SELECT * FROM mst_kategori");
                            while ($rows = mysql_fetch_array($query)) { 
                                if($rows['id_kategori']==$sql['id_kategori']){ $selected="selected"; }else{$selected="";}
                                ?>
                            <option value="<?php echo $rows['id_kategori']; ?>" <?php echo $selected; ?> ><?php echo $rows['kategori']; ?></option>    
                            <?php }?>
                        </select>
                    </div>
                </div>     
                <div class = "form-group">
                    <label class = "col-md-3 control-label">Rak</label>
                    <div class = "col-md-9">
                        <select name="id_rak" class="form-control">
                            <option value="-" disabled selected>--- Pilih ---</option>
                            <?php
                            include '../../config/database.php';
                            $query = mysql_query("SELECT * FROM mst_rak");
                            while ($rows = mysql_fetch_array($query)) { 
                                if($rows['id_rak']==$sql['id_rak']){ $selected="selected"; }else{$selected="";}
                                ?>
                            <option value="<?php echo $rows['id_rak']; ?>" <?php echo $selected; ?> ><?php echo $rows['nama_rak']; ?></option>    
                            <?php }?>
                        </select>
                    </div>
                </div>   
                <div class="form-group">
                    <label class="control-label col-md-3">Tanggal Masuk</label>
                    <div class="col-md-3">
                        <div class="input-group input-medium date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" class="form-control" name="waktu_entry" placeholder="Tanggal Masuk">
                            <span class="input-group-btn">
                                <button class="btn default" type="button"><i class="icon-calendar"></i></button>
                            </span>
                        </div>
                    </div>
                </div> 
                <div class = "form-group">
                    <label class = "col-md-3 control-label">Jumlah Buku</label>
                    <div class = "col-md-9">
                        <input type = "text" class = "form-control" placeholder = "Jumlah Buku" name="jumlah" autofocus="" value="<?php echo $sql['jumlah']; ?>" <?php echo $disabled; ?> >
                    </div>
                </div>   
                <div class="form-group">
                    <label for="exampleInputFile" class="col-md-3 control-label">Cover Buku</label>
                    <div class="col-md-9">
                        <input type="file" name="cover">
                        <p class="help-block">browse file.</p>
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
