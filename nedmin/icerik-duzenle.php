<?php
$page = 'content';
include 'sidebar.php';
include 'header.php';
$icerikcek = $db->prepare("SELECT * FROM icerik WHERE icerik_id=:icerikid");
$icerikcek->execute(array(
    'icerikid' => $_GET['icerik_id']
));
$icerikcek = $icerikcek->fetch(PDO::FETCH_ASSOC);

$zaman = date_parse($icerikcek['icerik_zaman']);
$tarih = new DateTime($zaman['year'] . "-" . $zaman['month'] . "-" . $zaman['day']);
$saat = new DateTime($zaman['hour'] . ":" . $zaman['minute'] . ":" . $zaman['second']);

?>


<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="col-md-10 d-md-inline-flex fw-bold py-3 mb-4"><span class="text-muted fw-light d-md-inline-flex ">İçerik/</span>İçerik Düzenle</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">İçerik Düzenle <h6><small><?php
                                                                if (isset($_GET['update'])) {
                                                                    if ($_GET['update'] == "ok") { ?>
                                        <b style="color:green"> İşlem Başarılı...</b>
                                    <?php } else if ($_GET['update'] == "no") { ?>
                                        <b style="color:red"> İşlem Başarısız...</b>
                                <?php }
                                                                } ?></small></h6>
                    </h4><a class="d-md-inline-flex justify-content-end right" href="./icerik.php"><button class=" btn btn-danger"><b> <i class="fa fa-undo" aria-hidden="true"></i> Geri Dön </b></button></a>
                    <!-- <small class="text-muted float-end">Merged input group</small> -->
                </div>
                <div class="card-body">
                    <form action="./netting/islem.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="icerik_id" value="<?php echo $icerikcek['icerik_id'] ?>">
                        <input type="hidden" name="icerik_resimyol" value="<?php echo $icerikcek['icerik_resimyol'] ?>">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Yüklü Resim </label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-link"></i></span>
                                    <img src="./../<?php echo $icerikcek['icerik_resimyol'] ?>" width="80%" height="60%" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">İçerik Resim</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-link"></i></span>
                                    <input type="file" name="icerik_resimyol" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">İçerik Tarih <span class="required">*</span></label>


                            <div class="col-md-3 input-group-merge">
                                <input type="date" name="icerik_tarih" class="form-control" value="<?php echo $tarih->format('Y-m-d') ?>" />
                            </div>

                            <div class="col-md-3  input-group-merge">
                                <input type="time" name="icerik_saat" class="form-control" required="required" value="<?php echo $saat->format('H:i:s')  ?>" />
                            </div>


                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">İçerik Ad <span class="required">*</span></label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-link"></i></span>
                                    <input type="text" name="icerik_ad" class="form-control" value="<?php echo $icerikcek['icerik_ad'] ?>" required="required" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">İçerik Detay <span class="required">*</span></label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge ">
                                    <textarea style="height: 20px;" id="editor" name="icerik_detay" class="ckeditor" /><?php echo $icerikcek['icerik_detay'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">İçerik Keyword <span class="required">*</span></label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-link"></i></span>
                                    <input type="text" name="icerik_keyword" class="form-control" value="<?php echo $icerikcek['icerik_keyword'] ?>" />
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
                                        <?php if ($icerikcek['icerik_durum'] == 1) {
                                        } ?>
                                        <option <?php if ($icerikcek['icerik_durum'] == 1) {
                                                    echo "selected";
                                                } ?> value="1">Aktif</option>
                                        <option <?php if ($icerikcek['icerik_durum'] == 0) {
                                                    echo "selected";
                                                } ?> value="0">Pasif</option>

                                    </select>
                                    <!-- <input type="text" name="icerik_sıra" class="form-control" value="0" placeholder="icerik Link Giriniz" /> -->
                                </div>
                            </div>
                        </div>





                        <div class="row justify-content-end right">
                            <div class="col-sm-10">
                                <button type="submit" name="icerik_edit" class="btn btn-primary"><i class='bx bx-save'></i> Ekle</button>
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

        })
        .then(editor => {
            window.editor = editor;
        })
        .catch(err => {
            console.error(err.stack);
        });
</script>



<?php include 'footer.php'; ?>