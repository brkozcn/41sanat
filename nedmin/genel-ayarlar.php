<?php
$page = 'settings';
include 'sidebar.php';
include 'header.php';
?>


<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Ayarlar/</span> Genel Ayarlar</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Logo Ayarları <h6><small><?php
                                                                if (isset($_GET['update'])) {
                                                                    if ($_GET['update'] == "logo-ok") { ?>
                                        <b style="color:green"> İşlem Başarılı...</b>
                                    <?php } else if ($_GET['update'] == "logo-no") { ?>
                                        <b style="color:red"> İşlem Başarısız...</b>
                                <?php  }
                                                                }
                                ?></small></h6>
                    </h4>
                    <!-- <small class="text-muted float-end">Merged input group</small> -->
                </div>
                <div class="card-body">
                    <form action="./netting/islem.php" method="post" enctype="multipart/form-data">

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Header Logo<br><b> 191x51px*</b></label>

                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-link"></i></span>

                                    <?php if (strlen($ayarcek['ayar_logo']) > 32) { ?>
                                        <img src="./../<?php echo $ayarcek['ayar_logo'] ?>" alt="" width="50%" height="50%">
                                    <?php } else { ?>
                                        <img src="./../images/logo-yok.png" alt="" width="30%" height="10%">
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Logo Resim</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-link"></i></span>
                                    <input type="file" name="logo_resimyol" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="logo_eskiyol" value="<?php echo $ayarcek['ayar_logo'] ?>">
                        <div class="row justify-content-end right">
                            <div class="col-sm-10">
                                <button type="submit" name="logo_update" class="btn btn-primary">Güncelle</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <form action="./netting/islem.php" method="post" enctype="multipart/form-data">

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Footer Logo<br><b> 191x51px*</b></label>

                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-link"></i></span>

                                    <?php if (strlen($ayarcek['ayar_logo']) > 32) { ?>
                                        <img src="./../<?php echo $ayarcek['ayar_logo'] ?>" alt="" width="50%" height="50%">
                                    <?php } else { ?>
                                        <img src="./../images/logo-yok.png" alt="" width="30%" height="10%">
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Logo Resim</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-link"></i></span>
                                    <input type="file" name="logo_resimyol" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="logo_eskiyol" value="<?php echo $ayarcek['ayar_logo'] ?>">
                        <div class="row justify-content-end right">
                            <div class="col-sm-10">
                                <button type="submit" name="logo_update" class="btn btn-primary">Güncelle</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Genel Ayarlar <h6><small><?php
                                                                if (isset($_GET['update'])) {
                                                                    if ($_GET['update'] == "ok") { ?>
                                        <b style="color:green"> İşlem Başarılı...</b>
                                    <?php } else if ($_GET['update'] == "no") { ?>
                                        <b style="color:red"> İşlem Başarısız...</b>
                                <?php  }
                                                                }
                                ?></small></h6>
                    </h4>
                    <!-- <small class="text-muted float-end">Merged input group</small> -->
                </div>
                <div class="card-body">
                    <!-- <form action="./netting/islem.php" method="post" enctype="multipart/form-data">
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Geçerli Logo <br><b> 191x51px*</b></label>

                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-link"></i></span>

                                    <?php if (strlen($ayarcek['ayar_logo']) > 0) { ?>
                                        <img src="./../<?php echo $ayarcek['ayar_logo'] ?>" alt="">
                                    <?php } else { ?>
                                        <img src="./../images/logo-yok.png" alt="" width="30%" height="10%">
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Logo Resim</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-link"></i></span>
                                    <input type="file" name="logo_resimyol" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="logo_eskiyol" value="<?php echo $ayarcek['ayar_logo'] ?>">
                        <div class="row justify-content-end right">
                            <div class="col-sm-10">
                                <button type="submit" name="logo_update" class="btn btn-primary">Güncelle</button>
                            </div>
                        </div>
                    </form>
                    <hr> -->
                    <form action="./netting/islem.php" method="post">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Site Adresi</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-link"></i></span>
                                    <input type="text" name="ayar_siteurl" class="form-control" value="<?php echo $ayarcek['ayar_siteurl'] ?>" placeholder="<?php echo $ayarcek['ayar_siteurl'] ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Site Başlığı</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-globe"></i></span>
                                    <input type="text" name="ayar_title" class="form-control" value="<?php echo $ayarcek['ayar_title']; ?>" placeholder="<?php echo $ayarcek['ayar_title'] ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Site Açıklaması</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-detail"></i></span>
                                    <input type="text" name="ayar_description" class="form-control" value="<?php echo $ayarcek['ayar_description'] ?>" placeholder="<?php echo $ayarcek['ayar_description'] ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Site Anahtar Kelime</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-key"></i></span>
                                    <input type="text" name="ayar_keywords" class="form-control" value="<?php echo $ayarcek['ayar_keywords'] ?>" placeholder="<?php echo $ayarcek['ayar_keywords'] ?>" />
                                </div>
                                <div class="form-text">Lütfen <b>", (virgül)"</b> ile ayırınız.</div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Site Yazar</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" name="ayar_author" class="form-control" value="<?php echo $ayarcek['ayar_author'] ?>" placeholder="<?php echo $ayarcek['ayar_author'] ?>" />
                                </div>
                            </div>
                        </div>


                        <div class="row justify-content-end right">
                            <div class="col-sm-10">
                                <button type="submit" name="ayar_update" class="btn btn-primary">Güncelle</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<?php include 'footer.php'; ?>