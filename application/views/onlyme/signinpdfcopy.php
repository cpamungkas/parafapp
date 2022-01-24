<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/signaturepdf/style.css">
</head>

<body>

    <div class="wrapper">
        <div class="sidebar">
            <div class="sidebar-header">
                <a href="<?= base_url(); ?>Onlyme">
                    <ion-icon name="arrow-back"></ion-icon> Back
                </a>
            </div><!-- .sidebar-header -->
            <div class="sidebar-nav">
                <div class="btn-group btn-group-rounded justify-content-center d-flex mt-4 mb-5" role="group">
                    <button id="btnContinue" type="button" class="btn btn-uppercase btn-info px-4" style="background-color:#5cb85c;border-color: #4cae4c; ">Continue</button>
                    <button id="btnCancel" type="button" class="btn btn-uppercase btn-info px-4" style="background-color: #f0ad4e; border-color: #eea236;">Cancel</button>
                </div><!-- .btn-group -->
                <ul class="nav flex-column">
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">
                            <ion-icon name="information-circle"></ion-icon> Document Info
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <ion-icon name="people"></ion-icon> Recipient(s)
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <ion-icon name="key"></ion-icon> My Signature
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <ion-icon name="timer"></ion-icon> Log
                        </a>
                    </li> -->
                </ul><!-- .nav -->
            </div><!-- .sidebar-nav -->
        </div><!-- .sidebar -->
        <script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>
        <div class="content">
            <div class="content-header">
                <!-- <a href="javascript:;" class="btn btn-rounded btn-sm btn-uppercase btn-primary float-right px-4 py-2">Download</a> -->
                <h2><?= $judulPDF; ?></h2>
            </div><!-- .content-header -->
            <div class="document-toolbar-container-sticky">
                <div class="document-toolbar">
                    <div class="d-flex justify-content-between">
                        <div class="d-block text-primary">Go to page
                            <span class="go-page">
                                <input type="number" value="1" min="1" max="4">
                                <button type="button" class="arrow-dropup" onclick="this.parentNode.querySelector('[type=number]').stepUp();">
                                    <ion-icon name="arrow-dropup"></ion-icon>
                                </button>
                                <button type="button" class="arrow-dropdown" onclick="this.parentNode.querySelector('[type=number]').stepDown();">
                                    <ion-icon name="arrow-dropdown"></ion-icon>
                                </button>
                            </span>
                        </div><!-- .d-block -->
                        <div class="d-block text-primary">
                            <button id="prev" class="btn btn-primary btn-toolbar-rounded btn-sm">
                                <ion-icon name="add"></ion-icon>
                            </button>
                            <button id="next" class="btn btn-primary btn-toolbar-rounded btn-sm">
                                <ion-icon name="remove"></ion-icon>
                            </button>
                            <button class="btn btn-primary btn-toolbar-rounded btn-sm">
                                <ion-icon name="expand"></ion-icon>
                            </button>
                            <button class="btn btn-primary btn-toolbar-rounded btn-sm">
                                <ion-icon name="sync"></ion-icon>
                            </button>
                        </div><!-- .d-block -->
                        <div class="d-block text-primary">
                            <strong>Page</strong> <span class="page-current" id="pdf-current-page">1 </span> / <span class="page-of" id="pdf-total-pages"></span> pages
                        </div><!-- .d-block -->
                    </div><!-- .justify-content-between -->
                </div><!-- .document-toolbar -->
            </div><!-- .document-toolbar -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="document-container">
                            <div class="document-render" id="documentRender">
                                <div class="digital-signature" id="digitalSignature">
                                    <img src="<?= base_url(); ?>assets/img/signature.png" class="img-fluid signature-item">
                                </div><!-- .digital-signature -->
                            </div><!-- .document-render -->
                        </div><!-- .document-container -->
                    </div><!-- .col-## -->
                </div><!-- .row -->
            </div><!-- .container-fluid -->
        </div><!-- .content -->
    </div><!-- .wrapper -->

    <script src="<?= base_url(); ?>assets/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- <script src="<?= base_url(); ?>assets/js/jquery/jquery-3.3.1.min.js"></script> -->
    <!-- <script src="vendor/bootstrap-4.1.3/dist/js/bootstrap.min.js"></script> -->
    <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
    <!-- <script src="<?= base_url(); ?>assets/js/pdfjs/pdf.js"></script> -->
    <script src="<?= base_url(); ?>assets/js/interact/interact.min.js"></script>
    <script src="https://unpkg.com/ionicons@4.4.2/dist/ionicons.js"></script>
    <!-- <script src="<?= base_url(); ?>assets/js/signaturepdf/pdf.config.js"></script> -->

    <script type="text/javascript">
        /* --- Jquery Dropify Start --*/
        $(document).ready(function() {
            $("#btnCancel").click(function() {
                alert("cancel");
            });
            $("#btnContinue").click(function() {
                alert("Continue");
                renderPage(4, document.getElementById('documentRender'))
            });


        });
    </script>


    <script>
        var BASE64_MARKER = ';base64,';

        function convertDataBase64ToBinary(dataBase64) {
            var base64Index = dataBase64.indexOf(BASE64_MARKER) + BASE64_MARKER.length;
            var base64 = dataBase64.substring(base64Index);
            var raw = window.atob(base64);
            var rawLength = raw.length;
            var array = new Uint8Array(new ArrayBuffer(rawLength));

            for (var i = 0; i < rawLength; i++) {
                array[i] = raw.charCodeAt(i);
            }
            return array;
        }

        function renderPDF(url, canvasContainer, options) {
            var pdfjs = window['pdfjs-dist/build/pdf']
            // PDFJS.getDocument(pdfAsArray).then((pdf) => {
            var pdfjsLib = window['pdfjs-dist/build/pdf'];

            // The workerSrc property shall be specified.
            pdfjsLib.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.js';

            var options = options || {
                scale: 1
            }

            url = convertDataBase64ToBinary(url)
            var loadingTask = pdfjsLib.getDocument(url),
                numPage = 1,
                scale = 1;
            loadingTask.promise.then(function(pdf) {
                thePdfs = pdf;
                viewer = canvasContainer;
                viewer.setAttribute('dataPage', pdf.numPages)

                for (page = 1; page <= pdf.numPages; page++) {
                    canvas = document.createElement("canvas");
                    canvas.className = 'pdf-page-canvas';
                    canvas.setAttribute('id', 'canvas' + page);
                    canvas.setAttribute('data-page', page);
                    viewer.appendChild(canvas);
                    renderPage(page, canvas);
                }
                document.querySelector("#pdf-current-page").innerHTML = 1;
                document.querySelector("#pdf-total-pages").innerHTML = pdf.numPages;
                var xPages = viewer.getAttribute("datapage");
                //alert(xPages);
                for (let xPage = 1; xPage <= xPages; xPage++) {
                    var cvsdata = document.getElementById('canvas' + xPage);
                    //alert(xPage);
                    cvsdata.onclick = function() {
                        // alert("Halaman " + xPage);
                        document.querySelector("#pdf-current-page").innerHTML = xPage;
                    }
                }
            });

            function renderPage(pageNumber, canvas) {
                thePdfs.getPage(pageNumber).then(function(page) {
                    viewport = page.getViewport({
                        scale: 1.7
                    });
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;
                    page.render({
                        canvasContext: canvas.getContext('2d'),
                        viewport: viewport
                    });
                });
            }


            function pageNumber(pdfDoc) {
                for (var page = 1; page <= pdfDoc.numPages; page++)
                    pdfDoc.getPage(page).then(renderPage);
                document.getElementById('pdf-total-pages').innerHTML += pdfDoc.numPages
            }

            function render() {
                thePdfs.pdf.getPage(thePdfs.currentPage).then((page) => {
                    var _canvas = document.getElementsByClassName("pdf-page-canvas"); // document.getElementById("pdf_renderer");
                    var ctx = _canvas.getContext('2d');

                    var viewport = page.getViewport(thePdfs.zoom);

                    _canvas.width = viewport.width;
                    _canvas.height = viewport.height;

                    page.render({
                        canvasContext: ctx,
                        viewport: viewport
                    });
                });
            }

            document.getElementById('prev').addEventListener('click', (e) => {
                if (thePdfs.pdf == null || thePdfs.currentPage == 1)
                    return;
                thePdfs.currentPage -= 1;
                document.getElementById("pdf-current-page").innerHTML = thePdfs.currentPage;
                render();
            });

            document.getElementById('next').addEventListener('click', (e) => {
                if (thePdfs.pdf == null || thePdfs.currentPage > thePdfs.pdf.numPages)
                    return;
                thePdfs.currentPage += 1;
                document.getElementById("pdf-current-page").innerHTML = thePdfs.currentPage;
                render();
            });




            // var setPDF = pdfjs.getDocument(url);
            // setPDF.then(pageNumber)
        }


        let pdfData = '<?= $Base64; ?>';
        renderPDF(pdfData, document.getElementById('documentRender'), {
            scale: 1.55
        });
    </script>
    <script src="<?= base_url(); ?>assets/js/signaturepdf/signature.config.js"></script>
    <script src="<?= base_url(); ?>assets/js/signaturepdf/app.js"></script>
</body>

</html>