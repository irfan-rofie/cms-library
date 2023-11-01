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
            <li><a href="#">Buku</a></li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption"><i class="icon-table"></i>Data Buku</div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                    <thead>
                        <tr style="background-color: #8B0000; font-weight: bold; font-size: 15px;">
                            <td align="center">No</td>
                            <td align="center">ID Buku</td>
                            <td align="center">Judul</td>
                            <td align="center">Pengarang</td>
                            <td align="center">Penerbit</td>
                            <td align="center">Kategori</td>
                            <td align="center">Cover</td>
                            <td align="center">
                                <a href="#portlet-config" class="tambah" data-toggle="modal" class="config" id="0"><i class="icon-plus"></i>Tambah</a>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../config/database.php';
                        $no=0;
                        $sql = mysql_query("SELECT * FROM mst_buku");
                        while ($row = mysql_fetch_array($sql)) {
//                            $a = date('mdYHis');
                            ?>
                            <tr>
                                <td align="center"><?php echo ++$no; ?></td>
                                <td align="center"><?php echo $row['id_buku']; ?></td>
                                <td align="center"><?php echo $row['judul']; ?></td>
                                <td align="center"><?php echo $row['pengarang']; ?></td>
                                <td align="center"><?php echo $row['penerbit']; ?></td>
                                <td align="center"><?php echo $row['id_kategori']; ?></td>
                                <td align="center"><?php echo "<img src='cover/".$row['cover']."' width='50px' height='50px'/>"; ?></td>
                                <td align="center">
                                        <a href="#portlet-config" id="<?php echo $row['id_buku']; ?>" class="ubah" data-toggle="modal"><i class="icon-edit"></i>Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="#portlet-config" id="<?php echo $row['id_rak'] . "1"; ?>" class="detail" data-toggle="modal"><i class="icon-check"></i>Detail</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a class="#" href="#" onclick="yes('proses/pros_buku.php?aksi=hapus&id_buku=<?php echo $row['id_buku'] ?>')"><i class="icon-trash"></i>Delete</a>
                                </td>
                            </tr>
                            <?php } ?>
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
                <h4 class = "modal-title">Form Buku</h4>
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
            var url = "form/form_buku.php";
            $.post(url, {id: id}, function(data) {
                $(".modal-body").html(data).show();
            });
        });
    });
</script>
<script src="../assets/plugins/bootstrap/js/bootstrap2-typeahead.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../assets/plugins/fuelux/js/spinner.min.js"></script>
<script type="text/javascript" src="../assets/plugins/ckeditor/ckeditor.js"></script>  
<script type="text/javascript" src="../assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>

<script type="text/javascript" src="../assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
<script type="text/javascript" src="../assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="../assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="../assets/plugins/clockface/js/clockface.js"></script>


<script type="text/javascript" src="../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>  
<script type="text/javascript" src="../assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script type="text/javascript" src="../assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>   
<script type="text/javascript" src="../assets/plugins/jquery.input-ip-address-control-1.0.min.js"></script>
<script type="text/javascript" src="../assets/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="../assets/plugins/jquery-multi-select/js/jquery.quicksearch.js"></script>   
<script src="../assets/plugins/jquery.pwstrength.bootstrap/src/pwstrength.js" type="text/javascript" ></script>
<script src="../assets/plugins/bootstrap-switch/static/js/bootstrap-switch.min.js" type="text/javascript" ></script>
<script src="../assets/plugins/jquery-tags-input/jquery.tagsinput.min.js" type="text/javascript" ></script>
<script src="../assets/plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript" ></script>
<script src="../assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript" ></script>
