<?php
$page = 'menu';
include 'sidebar.php';
include 'header.php';

if (isset($_POST['arama'])) {
    $aranan = $_POST['aranan'];
    $menusor = $db->prepare("SELECT * FROM menu Where menu_ad LIKE '%$aranan%' ORDER BY menu_id DESC");
    $menusor->execute();
    $say = $menusor->rowCount();
} else {
    $menusor = $db->prepare("SELECT * FROM menu WHERE menu_ust=:menu_id ORDER BY menu_id DESC limit 25");
    $menusor->execute(array(
        'menu_id' => 0
    ));
    $say = $menusor->rowCount();

    $amenusor = $db->prepare("SELECT * FROM menu WHERE menu_ust!=:menu_id ");
    $amenusor->execute(array(
        'menu_id' => 0
    ));
    $say1 = $amenusor->rowCount();
    $top = $say + $say1;
}
?>




<div id="mail-ayar" class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menü/</span> Menü Ayarları</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-md-1"></div>
        <div class=" col-md-10 ">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Menü Ayarları <h6 class="mb-1 left"><small>
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
                    <div class="col-md-3"><small><span class="text-muted"><?php echo $top . " kayıt listelendi." ?></span></small></div>
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
                    <a href="./menu-ekle.php"><button class="btn btn-success"> <b><i class="fa fa-plus" aria-hidden="true"></i> Yeni ekle </b></button></a>

                    <!-- <small class="text-muted float-end">Merged input group</small> -->
                </div>
                <!-- Basic Bootstrap Table -->
                <div class="card">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="100">Menü Ad</th>

                                    <th class="text-center">Üst Menü</th>
                                    <th class="text-center">Sıra</th>
                                    <th width="100" class="text-center">Durum</th>
                                    <th width="100">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">

                                <?php


                                while ($menucek = $menusor->fetch(PDO::FETCH_ASSOC)) {

                                    $menu_id = $menucek['menu_id'];

                                ?>

                                    <tr>
                                        <td><?php echo $menucek['menu_ad'] ?></td>
                                        <td class="text-center"><?php echo $menucek['menu_ust'] ?></td>
                                        <td class="text-center"><?php echo $menucek['menu_sira'] ?></td>
                                        <?php if ($menucek['menu_durum'] == 1) {
                                        ?>
                                            <td class="text-center"><span style="font-size: 100%" class="badge bg-label-success me-1">Aktif</span></td>

                                        <?php } else { ?>

                                            <td class="text-center"><span style="font-size: 100%" class="badge bg-label-primary me-1 ">Pasif</span></td>

                                        <?php } ?>


                                        <td>
                                            <a href="./menu-duzenle.php?menu_id=<?php echo $menucek['menu_id'] ?>"><button class="btn btn-primary" type="submit"><i class="justify-content-center bx bx-edit-alt me-1"></i></button></a>
                                            <a href="./netting/islem.php?menusil=ok&menu_id=<?php echo $menucek['menu_id'] ?>"><button class="btn btn-danger" type="submit"><i class="justify-content-center bx bx-trash me-1"></i></button></a>
                                        </td>
                                    </tr>
                                    <?php
                                    $altmenusor = $db->prepare("SELECT * FROM menu WHERE menu_ust=:menu_id ORDER BY menu_sira");
                                    $altmenusor->execute(array(
                                        ':menu_id' => $menu_id
                                    ));
                                    while ($altmenucek = $altmenusor->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <td><b>---</b>&nbsp;&nbsp; <?php echo $altmenucek['menu_ad'] ?></td>
                                            <td class="text-center"><?php echo $altmenucek['menu_ust'] ?></td>
                                            <td class="text-center"><?php echo $altmenucek['menu_sira'] ?></td>
                                            <?php if ($menucek['menu_durum'] == 1) {
                                            ?>
                                                <td class="text-center"><span style="font-size: 100%" class="badge bg-label-success me-1">Aktif</span></td>

                                            <?php } else { ?>

                                                <td class="text-center"><span style="font-size: 100%" class="badge bg-label-primary me-1 ">Pasif</span></td>

                                            <?php } ?>


                                            <td>
                                                <a href="./menu-duzenle.php?menu_id=<?php echo $menucek['menu_id'] ?>"><button class="btn btn-primary" type="submit"><i class="justify-content-center bx bx-edit-alt me-1"></i></button></a>
                                                <a href="./netting/islem.php?menusil=ok&menu_id=<?php echo $menucek['menu_id'] ?>"><button class="btn btn-danger" type="submit"><i class="justify-content-center bx bx-trash me-1"></i></button></a>
                                            </td>
                                        </tr>

                                <?php }
                                } ?>


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