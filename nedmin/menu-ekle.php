<?php
$page = 'menu';
include 'sidebar.php';
include 'header.php';
date_default_timezone_set('Europe/Istanbul');
?>

<head>
    <link rel="stylesheet" href="./assets/vendor/libs/select2/select2.css" />
    <script src="./assets/vendor/libs/jquery/jquery.js"></script>

</head>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menü/</span>Menü Ekle</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Menu Ekle <h6><small><?php
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
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Menü Üst <span class="required">*</span></label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-hash"></i></span>
                                    <select id="select2Basic" name="menu_ust" class="select2 form-select form-select-lg" data-allow-clear="true">

                                        <option value="0">Üst Menü</option>
                                        <?php
                                        $menusor = $db->prepare("SELECT * FROM menu Where menu_ust=:menu_id ORDER BY menu_ad ASC");
                                        $menusor->execute(array(
                                            'menu_id' => 0
                                        ));

                                        while ($menucek = $menusor->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <option value="<?php echo $menucek['menu_id'] ?>"><?php echo $menucek['menu_ad'] ?></option>


                                        <?php } ?>
                                    </select>
                                    select2Basic gelecek
                                </div>
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Menü Ad <span class="required">*</span></label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-link"></i></span>
                                    <input type="text" name="menu_ad" class="form-control" placeholder="Menü Adını Giriniz" />
                                </div>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Menü Detay <span class="required">*</span></label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge ">
                                    <textarea id="editor" name="menu_detay" class="ckeditor" placeholder="Menü Detay Giriniz" /></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Menü URL<span class="required">*</span></label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-link"></i></span>
                                    <input type="text" name="menu_url" class="form-control" placeholder="Menü URL Giriniz" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Menü Sıra<span class="required">*</span></label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-link"></i></span>
                                    <input type="text" name="menu_sira" class="form-control" placeholder="Menü Sıra Giriniz" value="0" />
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Menü Durum <span class="required">*</span></label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-hash"></i></span>
                                    <select class="form-select" name="menu_durum">
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
                                <button type="submit" name="menu_add" class="btn btn-primary"><i class='bx bx-save'></i> Kaydet</button>
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

<script src="./assets/vendor/libs/select2/select2.js"></script>
<!-- <script src="./assets/js/forms-selects.js"></script> -->

<?php include 'footer.php'; ?>