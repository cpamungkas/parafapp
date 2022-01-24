<!-- Dashboard breadcome area start -->
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <!-- <form role="search" class="sr-input-func">
                                    <input type="text" placeholder="Search..." class="search-int form-control">
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </form> -->
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="#"><?= $breadTitle; ?></a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod"><?= $desclabel; ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Dashboard breadcome area end -->


<!-- <div class="contacts-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <?php
            foreach ($dataMySigninDraw as $MySigninDraw) {
            ?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="student-inner-std mg-t-30">
                        <div class="student-img">
                            <img src="<?= base_url('assets/img/signin/draw/') . $MySigninDraw['file_sign']; ?>" alt="" />
                        </div>
                        <div class="student-dtl">
                            <h2><?= $MySigninDraw['sign_name']; ?></h2>
                            <input class="form-check-input" type="checkbox" <?= check_default_sign($MySigninDraw['id_sign'], $MySigninDraw['user_id'], $MySigninDraw['type_sign']); ?> data-userid="<?= $MySigninDraw['user_id']; ?>" data-signid="<?= $MySigninDraw['id_sign']; ?>" data-typesign="<?= $MySigninDraw['type_sign']; ?>"> <?php echo $MySigninDraw['default_sign'] ? 'Default' : 'Set default'; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div> -->

<div class="single-pro-review-area mt-t-30 mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <ul id="myTab4" class="tab-review-design">
                        <li><a href="#draw">Draw</a></li>
                        <li><a href="#type">Type</a></li>
                        <li><a href="#upload">Upload</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="draw">
                            <div class="row">
                                <?php
                                foreach ($dataMySigninDraw as $MySigninDraw) {
                                ?>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" style="border: thin silver solid; margin: 0.2em; padding: 0.2em;text-align: center; font-style: italic; font-size: smaller; text-indent: 0;">
                                        <div class="student-inner-std mg-t-30">
                                            <div class="student-img">
                                                <img src="<?= base_url('assets/img/signin/draw/') . $MySigninDraw['file_sign']; ?>" alt="" />
                                            </div>
                                            <div class="student-dtl">
                                                <h2><?= $MySigninDraw['sign_name']; ?></h2>
                                                <input class="form-check-input" type="checkbox" <?= check_default_sign($MySigninDraw['id_sign'], $MySigninDraw['user_id'], $MySigninDraw['type_sign']); ?> data-userid="<?= $MySigninDraw['user_id']; ?>" data-signid="<?= $MySigninDraw['id_sign']; ?>" data-typesign="<?= $MySigninDraw['type_sign']; ?>"> <?php echo $MySigninDraw['default_sign'] ? 'Default' : 'Set default'; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>

                        <div class="product-tab-list tab-pane fade" id="type">
                            <div class="row">
                                <?php
                                foreach ($dataMySigninType as $MySigninType) {
                                ?>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" style="border: thin silver solid; margin: 0.2em; padding: 0.2em;text-align: center; font-style: italic; font-size: smaller; text-indent: 0;">
                                        <div class="student-inner-std mg-t-30">
                                            <div class="student-img">
                                                <img src="<?= base_url('assets/img/signin/type/') . $MySigninType['file_sign']; ?>" alt="" />
                                            </div>
                                            <div class="student-dtl">
                                                <h2><?= $MySigninType['sign_name']; ?></h2>
                                                <input class="form-check-input" type="checkbox" <?= check_default_sign($MySigninType['id_sign'], $MySigninType['user_id'], $MySigninType['type_sign']); ?> data-userid="<?= $MySigninType['user_id']; ?>" data-signid="<?= $MySigninType['id_sign']; ?>" data-typesign="<?= $MySigninType['type_sign']; ?>"> <?php echo $MySigninType['default_sign'] ? 'Default' : 'Set default'; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>

                        <div class="product-tab-list tab-pane fade" id="upload">
                            <div class="row">
                                <?php
                                foreach ($dataMySigninUpload as $MySigninUpload) {
                                ?>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" style="border: thin silver solid; margin: 0.2em; padding: 0.2em;text-align: center; font-style: italic; font-size: smaller; text-indent: 0;">
                                        <div class="student-inner-std mg-t-30">
                                            <div class="student-img">
                                                <img src="<?= base_url('assets/img/signin/upload/') . $MySigninUpload['file_sign']; ?>" alt="" />
                                            </div>
                                            <div class="student-dtl">
                                                <h2><?= $MySigninUpload['sign_name']; ?></h2>
                                                <input class="form-check-input" type="checkbox" <?= check_default_sign($MySigninUpload['id_sign'], $MySigninUpload['user_id'], $MySigninUpload['type_sign']); ?> data-userid="<?= $MySigninUpload['user_id']; ?>" data-signid="<?= $MySigninUpload['id_sign']; ?>" data-typesign="<?= $MySigninUpload['type_sign']; ?>"> <?php echo $MySigninUpload['default_sign'] ? 'Default' : 'Set default'; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>