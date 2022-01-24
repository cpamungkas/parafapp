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

<div class="single-pro-review-area mt-t-30 mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <ul id="myTab4" class="tab-review-design">
                        <!-- <li class="active"><a href="#description">Credit Card</a></li>
                        <li><a href="#reviews"> Debit Card</a></li>
                        <li><a href="#INFORMATION">EMI</a></li>
                        <li><a href="#netbanking">Banking</a></li>
                        <li><a href="#cod">Address</a></li> -->
                        <li><a href="#draw">Draw</a></li>
                        <li><a href="#type">Type</a></li>
                        <li><a href="#upload">Upload</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <!-- <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="demo-container">
                                            <div class="card-wrapper" data-jp-card-initialized="true">
                                                <div class="jp-card-container">
                                                    <div class="jp-card">
                                                        <div class="jp-card-front">
                                                            <div class="jp-card-logo jp-card-elo">
                                                                <div class="e">e</div>
                                                                <div class="l">l</div>
                                                                <div class="o">o</div>
                                                            </div>
                                                            <div class="jp-card-logo jp-card-visa">visa</div>
                                                            <div class="jp-card-logo jp-card-mastercard">MasterCard</div>
                                                            <div class="jp-card-logo jp-card-maestro">Maestro</div>
                                                            <div class="jp-card-logo jp-card-amex"></div>
                                                            <div class="jp-card-logo jp-card-discover">discover</div>
                                                            <div class="jp-card-logo jp-card-dinersclub"></div>
                                                            <div class="jp-card-logo jp-card-dankort">
                                                                <div class="dk">
                                                                    <div class="d"></div>
                                                                    <div class="k"></div>
                                                                </div>
                                                            </div>
                                                            <div class="jp-card-lower">
                                                                <div class="jp-card-shiny"></div>
                                                                <div class="jp-card-cvc jp-card-display">•••</div>
                                                                <div class="jp-card-number jp-card-display">•••• •••• •••• ••••</div>
                                                                <div class="jp-card-name jp-card-display">Full Name</div>
                                                                <div class="jp-card-expiry jp-card-display" data-before="month/year" data-after="valid thru">••/••</div>
                                                            </div>
                                                        </div>
                                                        <div class="jp-card-back">
                                                            <div class="jp-card-bar"></div>
                                                            <div class="jp-card-cvc jp-card-display">•••</div>
                                                            <div class="jp-card-shiny"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <form class="payment-form mg-t-30">
                                                <div class="form-group">
                                                    <input name="number" type="tel" class="form-control" placeholder="Card Number">
                                                </div>
                                                <div class="form-group">
                                                    <input name="name" type="text" class="form-control" placeholder="Full Name">
                                                </div>
                                                <div class="form-group">
                                                    <input name="expiry" type="tel" class="form-control" placeholder="MM/YY">
                                                </div>
                                                <div class="form-group">
                                                    <input name="cvc" type="number" class="form-control" placeholder="CVC">
                                                </div>
                                                <div class="text-center credit-card-custom">
                                                    <a href="#!" class="btn btn-primary waves-effect waves-light">Submit</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="product-tab-list tab-pane fade" id="reviews">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="devit-card-custom">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Type your Full Name">
                                                    </div>
                                                    <div class="form-group CVV">
                                                        <input type="text" class="form-control" id="cvv" placeholder="CVV">
                                                    </div>
                                                    <div class="form-group" id="card-number-field">
                                                        <input type="text" name="name" class="form-control" id="cardNumber" placeholder="Card Number">
                                                    </div>
                                                    <select class="form-control mg-b-15">
                                                        <option>Select Month</option>
                                                        <option value="01">January</option>
                                                        <option value="02">February </option>
                                                        <option value="03">March</option>
                                                        <option value="04">April</option>
                                                        <option value="05">May</option>
                                                        <option value="06">June</option>
                                                        <option value="07">July</option>
                                                        <option value="08">August</option>
                                                        <option value="09">September</option>
                                                        <option value="10">October</option>
                                                        <option value="11">November</option>
                                                        <option value="12">December</option>
                                                    </select>
                                                    <select class="form-control">
                                                        <option>Select Year</option>
                                                        <option value="16"> 2016</option>
                                                        <option value="17"> 2017</option>
                                                        <option value="18"> 2018</option>
                                                        <option value="19"> 2019</option>
                                                        <option value="20"> 2020</option>
                                                        <option value="21"> 2021</option>
                                                    </select>
                                                    <div class="payment-method-ht">
                                                        <span><i class="fa fa-cc-paypal" aria-hidden="true"></i></span>
                                                        <span><i class="fa fa-cc-visa" aria-hidden="true"></i></span>
                                                        <span><i class="fa fa-credit-card" aria-hidden="true"></i></span>
                                                        <span><i class="fa fa-cc-mastercard" aria-hidden="true"></i></span>
                                                    </div>
                                                    <a href="#!" class="btn btn-primary waves-effect waves-light">Submit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="product-tab-list tab-pane fade" id="INFORMATION">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <select class="form-control mg-b-15">
                                            <option>Select Card</option>
                                            <option>ICICI Credit Card</option>
                                            <option>AXIS Credit Card</option>
                                            <option>HSBC Credit Card</option>
                                            <option>KOTAK Credit Card</option>
                                            <option>INDUSIND Credit Card</option>
                                            <option>HDFC Credit Card</option>
                                            <option>ICICI Debit Card</option>
                                            <option>SBI Credit Card</option>
                                            <option>CITIBANK Credit Card</option>
                                            <option>AXIS Credit Card</option>
                                        </select>
                                        <select class="form-control mg-b-15">
                                            <option>Select Duration</option>
                                            <option>1 month</option>
                                            <option>2 year</option>
                                            <option>5 month</option>
                                            <option>3 week</option>
                                            <option>5 year</option>
                                            <option>7 month</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="product-tab-list tab-pane fade" id="netbanking">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <select class="form-control mg-b-15">
                                                    <option>Select Bank</option>
                                                    <option>State bank of india</option>
                                                    <option>Bank of baroda</option>
                                                    <option>Central bank of india</option>
                                                    <option>Punjab national bank</option>
                                                    <option>Yes bank</option>
                                                    <option>Kotak mahindra bank</option>
                                                </select>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="product-tab-list tab-pane fade" id="cod">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input name="number" type="text" class="form-control" placeholder="First Name">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Last Name">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Address">
                                                </div>
                                                <div class="form-group">
                                                    <input type="number" class="form-control" placeholder="Pincode">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <select class="form-control">
                                                        <option>Select country</option>
                                                        <option>India</option>
                                                        <option>Pakistan</option>
                                                        <option>Amerika</option>
                                                        <option>China</option>
                                                        <option>Dubai</option>
                                                        <option>Nepal</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <select class="form-control">
                                                        <option>Select state</option>
                                                        <option>Gujarat</option>
                                                        <option>Maharastra</option>
                                                        <option>Rajastan</option>
                                                        <option>Maharastra</option>
                                                        <option>Rajastan</option>
                                                        <option>Gujarat</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <select class="form-control">
                                                        <option>Select city</option>
                                                        <option>Surat</option>
                                                        <option>Baroda</option>
                                                        <option>Navsari</option>
                                                        <option>Baroda</option>
                                                        <option>Surat</option>
                                                    </select>
                                                </div>
                                                <input type="number" class="form-control" placeholder="Mobile no.">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="payment-adress">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <div class="product-tab-list tab-pane fade active in" id="draw">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> -->
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <div id="signArea" style="margin-top: 15px; margin-right: auto; margin-bottom: 15px; margin-left: auto;">
                                                <h2 class="tag-ingo" style="font-family: cursive; font-size: 12px; text-align: left;font-style: oblique;">Put signature below,</h2>
                                                <div class="sig sigWrapper" style="height: auto;">
                                                    <div class="typed">sdsdsd</div>
                                                    <canvas class="sign-pad" id="sign-pad" width="325" height="100"></canvas>
                                                </div>
                                                <hr>
                                                <input type="text" id="signUserName" name="signUserName" class="form-control" placeholder="Type Your Name Sign">
                                                <br>
                                                <div class="button-style-four btn-mg-b-10">
                                                    <button type="button" class="btn btn-custon-rounded-four btn-success" id="btn-save">Save</button>
                                                    <button type="button" class="btn btn-custon-rounded-four btn-info" id="btn-clear">Clear</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="product-tab-list tab-pane fade" id="type">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> -->
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <div id="signArea">
                                                <div class="wrapper-typed">
                                                    <h2 class="tag-ingo">Type your name then enter</h2>
                                                    <input id=" names" type="text" placeholder="Type your name then enter" class="form-control" style="width: 300px;" maxlength="40" />
                                                    <hr style="width: 300px;text-align:left;margin-left:0">
                                                    <canvas id="signature-pad" class="signatures-pad-typed" height=100 width=300></canvas>
                                                    <br><br>
                                                    <div class="button-style-four btn-mg-b-10">
                                                        <button type="button" class="btn btn-custon-rounded-four btn-success " id="btn-save-typed">Save</button>
                                                        <button type="button" class="btn btn-custon-rounded-four btn-info" id="btn-preview-typed">Preview</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="product-tab-list tab-pane fade" id="upload">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <form action="<?= base_url('Createsignin/savesignin'); ?>" method="post" enctype="multipart/form-data">
                                                <div id="signAreaUpload">
                                                    <input hidden type="hidden" class="form-control" placeholder="Upload File" id="file">
                                                    <div id="dropifyalert">Upload File</div>
                                                    <hr>
                                                    <div class="dropify">
                                                        <input type="file" id="fileuploadSignature" name="fileuploadSignature" style="height: 150px;" accept="image/png" />
                                                    </div>
                                                    <small><span class="error mt-2 text-danger">File size max 1MB</span></small>
                                                    <br>
                                                    <button class="btn btn-custon-rounded-four btn-success  " id="btn-save-upload">Upload</button>
                                                    <input type="hidden" id="signatureType" name="signatureType" value="3">
                                                    <br><br>
                                                </div>

                                            </form>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            <div class="signAreaUpload">
                                                <img id="preview">
                                            </div>
                                            <div id="dropifyalert"></div>
                                            <canvas id="preview2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--<div class="single-pro-review-area mt-t-10 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="profile-info-inner">
                    <div class="profile-img">
                        <img src="<?= base_url(); ?>assets/img/profile/1.jpg" alt="">
                    </div>
                    <div class="profile-details-hr">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                <div class="address-hr">
                                    <p><b>Name</b><br> <?= $user['name']; ?></p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                    <p><b>User Type</b><br> <?= $role['role']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="address-hr">
                                    <p><b>Email ID</b><br> <?= $user['email']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->