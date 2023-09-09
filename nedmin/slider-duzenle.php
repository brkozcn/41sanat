<?php
$page = 'slider';
include 'sidebar.php';
include 'header.php';
$slidercek = $db->prepare("SELECT * FROM slider WHERE slider_id=:sliderid");
$slidercek->execute(array(
    'sliderid' => $_GET['slider_id']
));
$slidercek = $slidercek->fetch(PDO::FETCH_ASSOC);

?>


<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="col-md-10 d-md-inline-flex fw-bold py-3 mb-4"><span class="text-muted fw-light d-md-inline-flex ">Slider/</span>Slider Düzenle</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Slider Düzenle <h6><small><?php
                                                                if (isset($_GET['update'])) {
                                                                    if ($_GET['update'] == "ok") { ?>
                                        <b style="color:green"> İşlem Başarılı...</b>
                                    <?php } else if ($_GET['update'] == "no") { ?>
                                        <b style="color:red"> İşlem Başarısız...</b>
                                <?php }
                                                                } ?></small></h6>
                    </h4><a class="d-md-inline-flex justify-content-end right" href="./slider.php"><button class=" btn btn-danger"><b> <i class="fa fa-undo" aria-hidden="true"></i> Geri Dön </b></button></a>
                    <!-- <small class="text-muted float-end">Merged input group</small> -->
                </div>
                <div class="card-body">
                    <form action="./netting/islem.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="slider_id" value="<?php echo $slidercek['slider_id'] ?>">
                        <input type="hidden" name="slider_resimyol" value="<?php echo $slidercek['slider_resimyol'] ?>">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Yüklü Resim </label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-link"></i></span>
                                    <img src="./../<?php echo $slidercek['slider_resimyol'] ?>" width="80%" height="60%" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Slider Resim</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-link"></i></span>
                                    <input type="file" name="slider_resimyol" class="form-control" placeholder="Slider Resmini Ekleyiniz" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Slider Ad <span class="required">*</span></label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-link"></i></span>
                                    <input type="text" name="slider_ad" class="form-control" value="<?php echo $slidercek['slider_ad'] ?>" required="required" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Slider Link <span class="required">*</span></label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-link"></i></span>
                                    <input type="text" name="slider_link" class="form-control" value="<?php echo $slidercek['slider_link'] ?>" required="required" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Slider Sıra <span class="required">*</span></label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-link"></i></span>
                                    <input type="text" name="slider_sira" class="form-control" value="<?php echo $slidercek['slider_sira'] ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Slider Durum <span class="required">*</span></label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-hash"></i></span>
                                    <select class="form-select" name="slider_durum">
                                        <!-- <option selected>Seçiniz</option> -->
                                        <?php if ($slidercek['slider_durum'] == 1) {
                                        } ?>
                                        <option <?php if ($slidercek['slider_durum'] == 1) {
                                                    echo "selected";
                                                } ?> value="1">Aktif</option>
                                        <option <?php if ($slidercek['slider_durum'] == 0) {
                                                    echo "selected";
                                                } ?> value="0">Pasif</option>

                                    </select>
                                    <!-- <input type="text" name="slider_sıra" class="form-control" value="0" placeholder="Slider Link Giriniz" /> -->
                                </div>
                            </div>
                        </div>





                        <div class="row justify-content-end right">
                            <div class="col-sm-10">
                                <button type="submit" name="slider_edit" class="btn btn-primary"><i class='bx bx-save'></i> Ekle</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<?php include 'footer.php'; ?>