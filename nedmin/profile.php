<?php
include 'sidebar.php';
include 'header.php';
?>


<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Kullanıcı/</span> Profil İşlemleri</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="mb-0"><?php echo $usercek['user_name'] ?> ile ilgili genel ayarlar <h6><small><?php
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
                    <form action="./netting/islem.php" method="post" enctype="multipart/form-data">
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Kullanıcı Resmi</label>

                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <!-- <span class="input-group-text"><i class="bx bx-link"></i></span> -->

                                    <?php if (strlen($usercek['user_avatar']) > 0) { ?>
                                        <img src="./<?php echo $usercek['user_avatar'] ?>" alt="" width="20%" height="20%">
                                    <?php } else { ?>
                                        <img src="./../images/logo-yok.png" alt="" width="30%" height="10%">
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Kullanıcı Resim</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-link"></i></span>
                                    <input type="file" name="user_avatar" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="avatar_eskiyol" value="<?php echo $usercek['user_avatar'] ?>">
                        <input type="hidden" name="user_id" value="<?php echo $usercek['user_id'] ?>">
                        <div class="row justify-content-end right">
                            <div class="col-sm-10">
                                <button type="submit" name="avatar_update" class="btn btn-primary">Güncelle</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <form action="./netting/islem.php" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $usercek['user_id'] ?>">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Kullanıcı Adı</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text "><i class="bx bx-link"></i></span>
                                    <input type="text" name="user_name" class="form-control" value="<?php echo $usercek['user_name'] ?>" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">İsim Soyisim</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-detail"></i></span>
                                    <input type="text" name="user_adsoyad" class="form-control" value="<?php echo $usercek['user_adsoyad'] ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Kullanıcı Şifre</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-globe"></i></span>
                                    <input type="password" name="user_pass" class="form-control" placeholder="············"  />
                                </div>
                            </div>
                        </div>
                      


                        <div class="row justify-content-end right">
                            <div class="col-sm-10">
                                <button type="submit" name="user_update" class="btn btn-primary">Güncelle</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<?php include 'footer.php'; ?>