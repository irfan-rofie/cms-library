<div class="row">
    <div class="col-md-12">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="index.html">Home</a> 
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="#">Master</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="#">Master Anggota</a></li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption"><i class="icon-table"></i>Data Anggota</div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                    <thead>
                        <tr style="background-color: #8B0000; font-weight: bold; font-size: 15px;">
                            <td align="center">Kode Anggota</td>
                            <td align="center">Nama</td>
                            <td align="center">Alamat</td>
                            <td align="center">Pekerjaan</td>
                            <td align="center">Umur</td>
                            <td align="center">Password</td>
                            <td align="center">
                                <a href="#portlet-config" class="tambah" data-toggle="modal" class="config" id="0"><i class="icon-plus"></i>Tambah</a>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../config/database.php';
                        $sql = mysql_query("SELECT * FROM mst_anggota");
                        while ($row = mysql_fetch_array($sql)) {
                            ?>
                            <tr>
                                <td align="center"><?php echo $row['kd_agt']; ?></td>
                                <td align="center"><?php echo $row['nama']; ?></td>
                                <td align="center"><?php echo $row['alamat']; ?></td>
                                <td align="center"><?php echo $row['pekerjaan']; ?></td>
                                <td align="center"><?php echo $row['umur'] . " Tahun"; ?></td>
                                <td align="center"><?php echo md5($row['pass']); ?></td>
                                <td align="center">
                                    <a href="#portlet-config" id="<?php echo $row['kd_agt']; ?>" class="ubah" data-toggle="modal"><i class="icon-edit"></i>Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="#portlet-config" id="<?php echo $row['kd_agt'] . "1"; ?>" class="detail" data-toggle="modal"><i class="icon-check"></i>Detail</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a class="#" href="#" onclick="yes('proses/pros_adm.php?aksi=hapus&id=<?php echo $row['id'] ?>')"><i class="icon-trash"></i>Delete</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class = "modal fade" id = "portlet-config" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
    <div class = "modal-dialog">
        <div class = "modal-content">
            <div class = "modal-header">
                <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true"></button>
                <h4 class = "modal-title">Form Anggota</h4>
            </div>
            <div class = "modal-body">
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(e) {
        $('.ubah, .tambah, .detail').live("click", function() {
            var id = this.id;
            var url = "form/form_anggota.php";
            $.post(url, {id: id}, function(data) {
                $(".modal-body").html(data).show();
            });
        });
    });
</script>
