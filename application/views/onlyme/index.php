<!-- Dashboard breadcome area start -->
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <?= $label; ?>
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
<!-- </div> -->
<!-- Dashboard breadcome area end -->
<script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>
<form id="frmPDFFileUpload" name="frmPDFFileUpload" action="<?= base_url('Onlyme/uploadonlyme'); ?>" method="post" enctype="multipart/form-data">
    <div class="single-pro-review-area mt-t-30 mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="profile-info-inner">
                        <!-- <div class="profile-details-hr"> -->
                        <div class="row">
                            <div>Upload file</div>
                            <div class="dropify">
                                <input type="file" id="filepdf" name="filepdf" style="height: 150px;" accept="application/pdf" />
                            </div>
                            <small><span class="error mt-2 text-danger">File size max 10MB</span></small>
                            <div id="dropifyalert"></div>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="interactModal__documentNavigation-wrapper" style="height: 350px;">
                                <p class=" interactModal__documentNavigation-title" id="page-count-container">Page
                                    <span id="pdf-current-page"></span> of
                                    <span id="pdf-total-pages"></span> Pages
                                </p>
                                <div id='pdf-viewer' class="interactModal__documentNavigation-item"></div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                        <div>Document Title</div>
                        <input type="text" id="judulPDF" name="judulPDF" class="form-control" placeholder="A document title to identify your document."></br>
                        <div> Optional Message</div>
                        <textarea id="pdfOptionalMsg" name="pdfOptionalMsg" class="form-control" placeholder="Add an optional message for the document signers." style="height: 110px;"></textarea></br>
                        <div class="input-group control-group after-add-more">
                            <input type="text" id="addRecipient[]" name="addRecipient[]" class="form-control" placeholder="Recipients" value="<?= $this->session->userdata('email'); ?>">
                            <div class="input-group-btn">
                                <button class="btn btn-success add-more" type="button">
                                    <i class="glyphicon glyphicon-plus"></i> Add Viewers
                                </button>
                            </div>
                        </div>
                        <input type="text" id="DataBase64" name="DataBase64" style="display:none;" class="form-control">
                        <textarea name="hideDataBase64" id="hideDataBase64" style="display:none;"></textarea>

                        <div class="control-group text-center">
                            <br>
                            <!-- <button class="btn btn-success" type="submit">Submit</button> -->
                            <button class="btn btn-primary btn-custon-rounded-four" id="fillOutSign">Fill Out & Sign</button>
                        </div>
</form>
<!-- Copy Fields -->
<div class="copy hide">
    <div class="control-group input-group" style="margin-top:10px">
        <input type="text" id="addRecipient[]" name="addRecipient[]" class="form-control" placeholder="Recipients">
        <div class="input-group-btn">
            <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
        </div>
    </div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>