<?php
$page = 'social';
include 'sidebar.php';
include 'header.php';
?>


<div class="container-xxl flex-grow-1 container-p-y">
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
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">İnstagram</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-link"></i></span>
                                    <input type="text" name="ayar_instagram" class="form-control" value="<?php echo $ayarcek['ayar_instagram']; ?>" placeholder="<?php echo $ayarcek['ayar_instagram'] ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Twitter</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-globe"></i></span>
                                    <input type="text" name="ayar_twitter" class="form-control" value="<?php echo $ayarcek['ayar_twitter'] ?>" placeholder="<?php echo $ayarcek['ayar_twitter'] ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Facebook</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-detail"></i></span>
                                    <input type="text" name="ayar_facebook" class="form-control" value="<?php echo $ayarcek['ayar_facebook'] ?>" placeholder="<?php echo $ayarcek['ayar_facebook'] ?>" />
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-end right">
                            <div class="col-sm-10">
                                <button type="submit" name="sosmed_update" class="btn btn-primary">Güncelle</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<?php include 'footer.php'; ?>