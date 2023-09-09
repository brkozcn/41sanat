<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Ayarlar/</span> Genel Ayarlar</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Hata Bildir <h6><small><?php
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
                    <form action="./ticketislem.php" method="post" enctype="multipart/form-data">

                        <input hidden type="text" name="ticket_sid" class="form-control" value="<?php echo $usercek['user_id'] ?>" />

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Hata Başlık</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" name="ticket_baslik" class="form-control" placeholder="Hata Başlığı (örn: Blog Foto HK.) " />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Hata Açıklaması</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" name="ticket_detay" class="form-control" placeholder="Hata Açıklatınız " />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Hata Sayfa</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" name="ticket_url" class="form-control" placeholder="Hata Aldığınız Sayfa Url Giriniz." />
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Varsa Resimler</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-link"></i></span>
                                    <input type="file" name="galeri_resimyol[]" class="form-control" multiple />
                                </div>
                            </div>
                        </div>




                        <div class="row justify-content-end right">
                            <div class="col-sm-10">
                                <button type="submit" name="ticket" class="btn btn-primary">Güncelle</button>
                            </div>
                        </div>

                    </form>
                    <br>

                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Bildirdiğin Hatalar<h6></h6>
                    </h4>
                    <!-- <small class="text-muted float-end">Merged input group</small> -->
                </div>
                <div class="card-body">
                    <table class="table">
                        <?php
                        if ($usercek['user_id'] == 1) {

                            $ticketsor = $db->prepare("SELECT * FROM ticket ORDER BY ticket_id DESC limit 25");
                            $ticketsor->execute();
                            $say = $ticketsor->rowCount();
                        ?>
                            <thead>
                                <tr>
                                    <th width="200">Ticket Başlık</th>
                                    <th>Ticket Detay</th>

                                    <th width="80" class="text-center">Durum</th>
                                    <th width="80">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">

                                <?php
                                while ($ticketcek = $ticketsor->fetch(PDO::FETCH_ASSOC)) {
                                ?>


                                    <tr>
                                        <!-- $uploads_dir="../../images/slides"; -->
                                        <!-- <td class="text-center"><img width="200" height="100" src="./../<?php echo $ticketcek['ticket_resimyol'] ?>"></td> -->
                                        <td class="text-center"><?php echo $ticketcek['ticket_baslik'] ?></td>
                                        <td><?php echo $ticketcek['ticket_detay'] ?></td>
                                        <?php if ($ticketcek['ticket_durum'] == 1) {
                                        ?>
                                            <td class="text-center">
                                                <span style="font-size: 100%" class="badge bg-label-success me-1">
                                                    <a style="text-decoration: none; color:#71dd37 !important; " href="./ticket-edit.php?ticket_id=<?php echo $ticketcek['ticket_id'] ?>">
                                                        Aktif


                                                    </a>
                                                </span>
                                            </td>

                                        <?php } else { ?>

                                            <td class="text-center"><span style="font-size: 100%" class="badge bg-label-primary me-1 ">Pasif</span></td>

                                        <?php } ?>


                                        <td>
                                            <a href="./ticketislem.php?ticket_id=<?php echo $ticketcek['ticket_id'] ?>"><button class="btn btn-primary" type="submit"><i class="justify-content-center bx bx-edit-alt me-1"></i></button></a>
                                            <a href="./ticketislem.php?ticket_del=ok&ticket_id=<?php echo $ticketcek['ticket_id'] ?>"><button class="btn btn-danger" type="submit"><i class="justify-content-center bx bx-trash me-1"></i></button></a>
                                        </td>

                                    </tr>
                                <?php }
                            } else {
                                $id = $usercek['user_id'];
                                $ticketsor = $db->prepare("SELECT * FROM ticket Where ticket_sid LIKE '%$id%' ORDER BY ticket_id DESC limit 20  ");
                                $ticketsor->execute();
                                $say = $ticketsor->rowCount();
                                ?>
                                <thead>
                                    <tr>
                                        <th width="200">Ticket Başlık</th>
                                        <th>Ticket Detay</th>

                                        <th width="80" class="text-center">Durum</th>

                                    </tr>
                                </thead>
                            <tbody class="table-border-bottom-0">
                                <?php

                                while ($ticketcek = $ticketsor->fetch(PDO::FETCH_ASSOC)) {
                                ?>



                                    <tr>
                                        <!-- $uploads_dir="../../images/slides"; -->
                                        <!-- <td class="text-center"><img width="200" height="100" src="./../<?php echo $ticketcek['ticket_resimyol'] ?>"></td> -->
                                        <td class="text-center"><?php echo $ticketcek['ticket_baslik'] ?></td>
                                        <td><?php echo $ticketcek['ticket_detay'] ?></td>
                                        <?php if ($ticketcek['ticket_durum'] == 1) {
                                        ?>
                                            <td class="text-center"><span style="font-size: 100%" class="badge bg-label-success me-1">Aktif</span></td>

                                        <?php } else { ?>

                                            <td class="text-center"><span style="font-size: 100%" class="badge bg-label-primary me-1 ">Pasif</span></td>

                                        <?php } ?>



                                    </tr>
                            <?php }
                            } ?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>