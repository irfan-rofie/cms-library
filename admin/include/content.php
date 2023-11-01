<div class="page-container">
    <div class="page-content">
        <?php
        $menu = $_GET['menu'];
        switch ($menu) {
            case "dashboard":
                $content = "module/dashboard.php";
                break;
            case "petugas":
                $content = "module/petugas.php";
                break;
            case "anggota":
                $content = "module/anggota.php";
                break;
            case "buku":
                $content = "module/buku.php";
                break;
            case "kategori":
                $content = "module/kategori.php";
                break;            
            case "rak":
                $content = "module/rak.php";
                break;            
            case "peminjaman":
                $content = "module/peminjaman.php";
                break;
            case "pengembalian":
                $content = "module/pengembalian.php";
                break;
            default:
                $content = "module/dashboard.php";
                break;
        }
        include $content;
        ?>
    </div>
</div>
