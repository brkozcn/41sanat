<?php

$page = 'mainpage';
include 'sidebar.php';
include 'header.php';

$ticketcek = $db->prepare("SELECT * FROM ticket WHERE ticket_id=:id");
$ticketcek->bindValue(':id', $_GET['ticket_id']);
$ticketcek->execute();




$ticketcek = $ticketcek->fetch(PDO::FETCH_ASSOC);

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
                    </h4><a class="d-md-inline-flex justify-content-end right" href="./"><button class=" btn btn-danger"><b> <i class="fa fa-undo" aria-hidden="true"></i> Geri Dön </b></button></a>
                    <!-- <small class="text-muted float-end">Merged input group</small> -->
                </div>
                <div class="card-body">
                    <form action="ticketislem.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="ticket_id" value="<?php echo $ticketcek['ticket_id'] ?>">

                        <div class="row mb-3">

                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Yüklü Resim </label>
                            <div class="col-sm-10">
                                <?php
                                $galerisor = $db->prepare("SELECT * FROM ticket_galeri where ticket_id=:id");
                                $galerisor->bindValue(':id', $_GET['ticket_id']);
                                $galerisor->execute();
                                $say = $galerisor->rowCount();

                                while ($galericek = $galerisor->fetch(PDO::FETCH_ASSOC)) { ?>

                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-link"></i></span>
                                        <img src="./<?php echo $galericek['galeri_resimyol'] ?>" width="80%" height="60%" alt="">
                                    </div>
                                <?php } ?>
                                <input type="hidden" name="ticket_id" value="<?php echo $ticketcek['ticket_id'] ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Ticket Başlık <span class="required">*</span></label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-link"></i></span>
                                    <input type="text" name="ticket_baslik" class="form-control" value="<?php echo $ticketcek['ticket_baslik'] ?>" required="required" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Ticket Detay <span class="required">*</span></label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-link"></i></span>
                                    <input type="text" name="ticket_detay" class="form-control" value="<?php echo $ticketcek['ticket_detay'] ?>" required="required" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Ticket Link <span class="required"><br><small>(Yoksa "-" koyunuz)</small></span></label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-link"></i></span>
                                    <input type="text" name="ticket_url" class="form-control" value="<?php echo $ticketcek['ticket_url'] ?>" required="required" />
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Ticket Durum <span class="required">*</span></label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-hash"></i></span>
                                    <select class="form-select" name="ticket_durum">
                                        <!-- <option selected>Seçiniz</option> -->
                                        <?php if ($ticketcek['ticket_durum'] == 1) {
                                        } ?>
                                        <option <?php if ($ticketcek['ticket_durum'] == 1) {
                                                    echo "selected";
                                                } ?> value="1">Aktif</option>
                                        <option <?php if ($ticketcek['ticket_durum'] == 0) {
                                                    echo "selected";
                                                } ?> value="0">Pasif</option>

                                    </select>
                                    <!-- <input type="text" name="slider_sıra" class="form-control" value="0" placeholder="Slider Link Giriniz" /> -->
                                </div>
                            </div>
                        </div>





                        <div class="row justify-content-end right">
                            <div class="col-sm-10">
                                <button type="submit" name="ticket_update" class="btn btn-primary"><i class='bx bx-save'></i> Güncelle</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

</script>




<?php include 'footer.php'; ?>