<?php
$page = 'mail';
include 'sidebar.php';
include 'header.php';
?>




<div id="mail-ayar" class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Ayarlar/</span> Sosyal Medya Ayarları</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Sosyal Medya Ayarları <h6><small>
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
                    <!-- <small class="text-muted float-end">Merged input group</small> -->
                </div>
                <div class="card-body">
                    <form action="./netting/islem.php" method="post">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Mail Smtp Host</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-link"></i></span>
                                    <input type="text" name="ayar_smtphost" class="form-control" value="<?php echo $ayarcek['ayar_smtphost']; ?>" placeholder="<?php echo $ayarcek['ayar_smtphost'] ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Mail Adresiniz</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-globe"></i></span>
                                    <input type="text" name="ayar_smtpuser" class="form-control" value="<?php echo $ayarcek['ayar_smtpuser'] ?>" placeholder="<?php echo $ayarcek['ayar_smtpuser'] ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Mail Şifreniz</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-detail"></i></span>
                                    <input type="text" name="ayar_smtppass" class="form-control" value="<?php echo $ayarcek['ayar_smtppass'] ?>" placeholder="<?php echo $ayarcek['ayar_smtppass'] ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Smtp Port </label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-detail"></i></span>
                                    <input type="text" name="ayar_smtpport" class="form-control" value="<?php echo $ayarcek['ayar_smtpport'] ?>" placeholder="<?php echo $ayarcek['ayar_smtpport'] ?>" />
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-end right">
                            <div class="col-sm-10">
                                <button type="submit" name="mail_update" class="btn btn-primary">Güncelle</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include 'footer.php'; ?>