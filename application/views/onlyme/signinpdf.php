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
                                <h4 class="bread-slash" style="font-family: cursive; font-size: 16px; text-align: left;font-style: oblique;"><?= $judulPDF; ?></h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li>Page <span class="page-current" id="pdf-current-page">1</span></li>
                                <li>of <span class="page-of" id="pdf-total-pages"> Pages</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>
<!-- <div class="single-pro-review-area mt-t-30 mg-b-30"> -->
    
<div class="content-header">
    <button id="pdf-prev" class="interactModal__header-bar-button interactModal__header-navigate-button">
        <div class="interactModal__header-bar-button-icon">
            <!--previous icon-->
            <!-- <div> -->
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="16" viewBox="0 0 18 16" fill="none" class="injected-svg" data-src="/static/media/navigate-icon-left.c97fbc4a.svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <path d="M4.93258 1L1 4.93258L4.93258 8.86517M1.31496 4.93264H12.0116C14.7791 4.93264 17.0453 7.22337 17.0453 9.99093C17.0453 12.7585 14.7791 15.0001 12.0116 15.0001H8.86552" stroke="#5E869D" stroke-width="1.4"></path>
            </svg>
            <!-- </div> -->
        </div>Prev
    </button>

    <button id="pdf-next" class="interactModal__header-bar-button interactModal__header-navigate-button  interactModal__header-navigate-button--next">
        <div class="interactModal__header-bar-button-icon" width="50" height="16">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="16" viewBox="0 0 19 16" fill="none" class="injected-svg" data-src="/static/media/navigate-icon-right.de31fea7.svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <path d="M13.1123 1L17.0448 4.93258L13.1123 8.86516M16.7303 4.93263H6.0337C3.26615 4.93263 1 7.22336 1 9.99091C1 12.7585 3.26615 15 6.0337 15H9.17976" stroke="#5E869D" stroke-width="1.4"></path>
                </svg>
            </div>
        </div>Next
    </button>
</div><!-- .content-header -->
<div class="document-toolbar-container-sticky">
    <div class="document-toolbar">
        <div class="d-flex justify-content-between">

        </div><!-- .justify-content-between -->
    </div><!-- .document-toolbar -->
</div><!-- .document-toolbar -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 ">
            <!-- <div class="d-block text-primary">
                <strong>Page</strong> <span class="page-current" id="pageCurrent">1</span>of<span class="page-of" id="pageOf"> Pages</span>
            </div> -->
            <!-- <div class="document-container interactModal__documentNavigation-wrapper"> -->
            <!-- <div class="document-render " id="documentRender"> -->
            <div id="digitalSignature" class="digital-signature interactModal__documentNavigation-item">
                <img src="<?= base_url(); ?>assets/img/signature.png" class="img-fluid signature-item">
            </div><!-- .digital-signature -->
            <!-- </div>  -->
            <!-- .document-render -->
            <!-- </div>.document-container -->
        </div><!-- .col-## -->
    </div>
</div>
<!-- </div> -->