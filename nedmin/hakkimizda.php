<?php
$page = 'about';
include 'sidebar.php';
include 'header.php';
?>


<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">İçerik/</span> Hakkımızda Ayarları</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Hakkımızda Ayarları <h6><small>
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
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Hakkımızda Başlık</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-link"></i></span>
                                    <input type="text" name="hakkimizda_baslik" class="form-control" value="<?php echo $hakkimizdacek['hakkimizda_baslik']; ?>" placeholder="<?php echo $hakkimizdacek['hakkimizda_baslik'] ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Hakkımızda İçerik</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">

                                    <textarea id="editor" name="hakkimizda_icerik" class="ckeditor form-control" placeholder="<?php echo $hakkimizdacek['hakkimizda_icerik']; ?>" /><?php echo $hakkimizdacek['hakkimizda_icerik']; ?></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Hakkımızda Başlık 2</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-detail"></i></span>
                                    <input type="text" name="hakkimizda_baslik2" class="form-control" value="<?php echo $hakkimizdacek['hakkimizda_baslik2']; ?>" placeholder="<?php echo $hakkimizdacek['hakkimizda_baslik2']; ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Hakkımızda İçerik 2</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-detail"></i></span>
                                    <input type="text" name="hakkimizda_icerik2" class="form-control" value="<?php echo $hakkimizdacek['hakkimizda_icerik2']; ?>" placeholder="<?php echo $hakkimizdacek['hakkimizda_icerik2']; ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Vizyon</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-detail"></i></span>
                                    <input type="text" name="hakkimizda_vizyon" class="form-control" value="<?php echo $hakkimizdacek['hakkimizda_vizyon']; ?>" placeholder="<?php echo $hakkimizdacek['hakkimizda_vizyon']; ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Misyon</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-detail"></i></span>
                                    <input type="text" name="hakkimizda_misyon" class="form-control" value="<?php echo $hakkimizdacek['hakkimizda_misyon']; ?>" placeholder="<?php echo $hakkimizdacek['hakkimizda_misyon']; ?>" />
                                </div>
                            </div>
                        </div>


                        <div class="row justify-content-end right">
                            <div class="col-sm-10">
                                <button type="submit" name="hakkimizda_update" class="btn btn-primary ">Güncelle</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
        })
        .then(editor => {
            window.editor = editor;
        })
        .catch(err => {
            console.error(err.stack);
        });
</script>




<?php include 'footer.php'; ?>