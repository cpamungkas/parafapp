<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"></script>
<script>
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.worker.min.js';
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.3.0/fabric.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.2.0/jspdf.umd.min.js"></script>
<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.js"></script>
<script src="<?= base_url('assets'); ?>/js/pdfsign/arrow.fabric.js"></script>
<script src="<?= base_url('assets'); ?>/js/pdfsign/pdfannotate.js"></script>
<!-- <script src="< ?= base_url('assets'); ?>/js/pdfsign/script.js"></script> -->
<!--  -->

<script>
    //var pdf = new PDFAnnotate("pdf-container", "pdf.pdf", {
    //var pdfFile = "./pdf/belum_ttd/" + "< ?= $fullpath; ?> ";
    var pdf = new PDFAnnotate("pdf-container", "<?= $fullpath; ?>", {
        onPageUpdated(page, oldData, newData) {
            console.log(page, oldData, newData);
        },
        ready() {
            console.log("Plugin initialized successfully");
        },
        scale: 1.5,
        pageImageCompression: "MEDIUM", // FAST, MEDIUM, SLOW(Helps to control the new PDF file size)
    });

    function changeActiveTool(event) {
        var element = $(event.target).hasClass("tool-button") ?
            $(event.target) :
            $(event.target).parents(".tool-button").first();
        $(".tool-button.active").removeClass("active");
        $(element).addClass("active");
    }

    function enableSelector(event) {
        event.preventDefault();
        changeActiveTool(event);
        pdf.enableSelector();
    }

    function enablePencil(event) {
        event.preventDefault();
        changeActiveTool(event);
        var width = 5;
        pdf.setBrushSize(width);
        pdf.enablePencil();
    }

    function enableAddText(event) {
        event.preventDefault();
        changeActiveTool(event);
        pdf.enableAddText();
    }

    function enableAddArrow(event) {
        event.preventDefault();
        changeActiveTool(event);
        pdf.enableAddArrow();
    }

    function addImage(event) {
        event.preventDefault();
        pdf.addImageToCanvas()
    }

    function enableRectangle(event) {
        event.preventDefault();
        changeActiveTool(event);
        pdf.setColor('rgba(255, 0, 0, 0.3)');
        pdf.setBorderColor('blue');
        pdf.enableRectangle();
    }

    function deleteSelectedObject(event) {
        event.preventDefault();
        pdf.deleteSelectedObject();
    }

    function savePDF() {
        // var file_name = $("#savepdfname").val();
        pdf.savePdf();
        //pdf.savePdf('sample.pdf'); // save with given file name
    }

    function cancelPDF() {
        document.location.href = "<?= base_url(); ?>";
    }

    function clearPage() {
        pdf.clearActivePage();
    }

    function showPdfData() {
        var string = pdf.serializePdf();
        $('#dataModal .modal-body pre').first().text(string);
        PR.prettyPrint();
        $('#dataModal').modal('show');
    }

    $(function() {
        $('.color-tool').click(function() {
            $('.color-tool.active').removeClass('active');
            $(this).addClass('active');
            color = $(this).get(0).style.backgroundColor;
            pdf.setColor(color);
        });

        $('#brush-size').change(function() {
            var width = $(this).val();
            pdf.setBrushSize(width);
        });

        $('#font-size').change(function() {
            var font_size = $(this).val();
            pdf.setFontSize(font_size);
        });
    });
</script>
</body>

</html>