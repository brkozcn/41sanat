<?php
$page = 'content';
include 'sidebar.php';
include 'header.php';

if (isset($_POST['arama'])) {
    $aranan = $_POST['aranan'];
    $iceriksor = $db->prepare("SELECT * FROM icerik Where icerik_ad LIKE '%$aranan%' ORDER BY icerik_id DESC");
    $iceriksor->execute();
    $say = $iceriksor->rowCount();
} else {
    $iceriksor = $db->prepare("SELECT * FROM icerik ORDER BY icerik_id DESC limit 25");
    $iceriksor->execute();
    $say = $iceriksor->rowCount();
}
?>




<div id="mail-ayar" class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">İçerik/</span> İçerik Ayarları</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-md-1"></div>
        <div class=" col-md-10 ">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">İçerik Ayarları <h6 class="mb-1 left"><small>
                                <?php
                                if (isset($_GET['update'])) {
                                    if ($_GET['update'] == "ok") { ?>
                                        <b style="color:green"> İşlem Başarılı...</b>
                                    <?php } else if ($_GET['update'] == "no") { ?>
                                        <b style="color:red"> İşlem Başarısız...</b>
                                <?php  }
                                }
                                ?>
                            </small></h6>
                    </h4>
                    <div class="col-md-3"><small><span class="text-muted"><?php echo $say . " kayıt listelendi." ?></span></small></div>
                    <div class="col-md-3">
                        <form action="" method="post">
                            <div class="input-group ">
                                <style>
                                    input:focus {
                                        border: none !important;
                                        box-shadow: none !important;
                                        text-shadow: none !important;
                                    }
                                </style>
                                <input type="text" name="aranan" class="form-control innput" placeholder="Anahtar Kelime Giriniz">
                                <span class="input-group-btn">

                                    <button class="btn btn-default" type="submit" name="arama"><i class="fa fa-search"></i></button>

                                </span>
                            </div>
                        </form>
                    </div>
                    <a href="./content-add"><button class="btn btn-success"> <b><i class="fa fa-plus" aria-hidden="true"></i> Yeni ekle </b></button></a>

                    <!-- <small class="text-muted float-end">Merged input group</small> -->
                </div>
                <!-- Basic Bootstrap Table -->
                <div class="card">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="100" class="text-center">İcerik Tarih</th>
                                    <th>İcerik Ad</th>
                                    <!-- <th class="text-center">Sıra</th> -->
                                    <th width="100" class="text-center">Durum</th>
                                    <th width="100">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">

                                <?php


                                while ($icerikcek = $iceriksor->fetch(PDO::FETCH_ASSOC)) {
                                ?>

                                    <tr>
                                        <!-- $uploads_dir="../../images/slides"; -->
                                        <!-- <td class="text-center"><img width="200" height="100" src="./../<?php echo $icerikcek['icerik_resimyol'] ?>"></td> -->
                                        <td class="text-center"><?php echo $icerikcek['icerik_zaman'] ?></td>
                                        <td><?php echo $icerikcek['icerik_ad'] ?></td>
                                        <?php if ($icerikcek['icerik_durum'] == 1) {
                                        ?>
                                            <td class="text-center"><span style="font-size: 100%" class="badge bg-label-success me-1">Aktif</span></td>

                                        <?php } else { ?>

                                            <td class="text-center"><span style="font-size: 100%" class="badge bg-label-primary me-1 ">Pasif</span></td>

                                        <?php } ?>


                                        <td>
                                            <a href="./content-edit?icerik_id=<?php echo $icerikcek['icerik_id'] ?>"><button class="btn btn-primary" type="submit"><i class="justify-content-center bx bx-edit-alt me-1"></i></button></a>
                                            <a href="./netting/islem.php?icerik_del=ok&icerik_id=<?php echo $icerikcek['icerik_id'] ?>"><button class="btn btn-danger" type="submit"><i class="justify-content-center bx bx-trash me-1"></i></button></a>
                                        </td>
                                    </tr>
                                <?php } ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="dropdown">
    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
        <i class="bx bx-dots-vertical-rounded"></i>
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
    </div>
</div> -->






<?php include 'footer.php'; ?>