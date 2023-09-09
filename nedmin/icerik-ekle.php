<?php
$page = 'content';
include 'sidebar.php';
include 'header.php';
date_default_timezone_set('Europe/Istanbul');
?>


<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">İçerik/</span>İçerik Ekle</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">icerik Ekle <h6><small><?php
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
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">İçerik Resim <span class="required">*</span></label>
                            <div class="col-sm-8">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-link"></i></span>
                                    <input type="file" name="icerik_resimyol" class="form-control" placeholder="İçerik Resmini Ekleyiniz" />
                                </div>
                                <div class="form-text">830x426</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">İçerik Tarih <span class="required">*</span></label>


                            <div class="col-md-3 input-group-merge">
                                <input type="date" name="icerik_tarih" class="form-control" value="<?php echo date('Y-m-d') ?>" />
                            </div>

                            <div class="col-md-3  input-group-merge">
                                <input type="time" name="icerik_saat" class="form-control" required="required" value="<?php echo date('H:i:s')  ?>" />
                            </div>


                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">İçerik Ad <span class="required">*</span></label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-link"></i></span>
                                    <input type="text" name="icerik_ad" class="form-control" placeholder="İçerik Adını Giriniz" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">İçerik Detay <span class="required">*</span></label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge ">
                                    <textarea id="editor" name="icerik_detay" class="ckeditor" placeholder="İçerik Detay Giriniz" /></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">İçerik Keywords <span class="required">*</span></label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-link"></i></span>
                                    <input type="text" name="icerik_keywords" class="form-control" placeholder="İçerik Anahtar Kelime Giriniz" />
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">İçerik Durum <span class="required">*</span></label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-hash"></i></span>
                                    <select class="form-select" name="icerik_durum">
                                        <!-- <option selected>Seçiniz</option> -->
                                        <option value="1">Aktif</option>
                                        <option value="0">Pasif</option>

                                    </select>
                                    <!-- <input type="text" name="slider_sıra" class="form-control" value="0" placeholder="Slider Link Giriniz" /> -->
                                </div>
                            </div>
                        </div>





                        <div class="row justify-content-end right">
                            <div class="col-sm-10">
                                <button type="submit" name="icerik_add" class="btn btn-primary"><i class='bx bx-save'></i> Kaydet</button>
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