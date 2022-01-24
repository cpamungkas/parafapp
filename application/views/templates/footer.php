<div class="footer-copyright-area">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="footer-copy-right">
					<p>Copyright SYSDEV GoRP © <?= date('Y'); ?>. All rights reserved. </p>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<!-- jquery ============================================ -->
<script src="<?= base_url(); ?>assets/js/vendor/jquery-1.12.4.min.js"></script>
<!-- bootstrap JS ============================================ -->
<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
<!-- wow JS ============================================ -->
<script src="<?= base_url(); ?>assets/js/wow.min.js"></script>
<!-- price-slider JS ============================================ -->
<script src="<?= base_url(); ?>assets/js/jquery-price-slider.js"></script>
<!-- meanmenu JS ============================================ -->
<script src="<?= base_url(); ?>assets/js/jquery.meanmenu.js"></script>
<!-- owl.carousel JS ============================================ -->
<script src="<?= base_url(); ?>assets/js/owl.carousel.min.js"></script>
<!-- sticky JS ============================================ -->
<script src="<?= base_url(); ?>assets/js/jquery.sticky.js"></script>
<!-- scrollUp JS ============================================ -->
<script src="<?= base_url(); ?>assets/js/jquery.scrollUp.min.js"></script>
<!-- counterup JS ============================================ -->
<script src="<?= base_url(); ?>assets/js/counterup/jquery.counterup.min.js"></script>
<script src="<?= base_url(); ?>assets/js/counterup/waypoints.min.js"></script>
<script src="<?= base_url(); ?>assets/js/counterup/counterup-active.js"></script>
<!-- mCustomScrollbar JS ============================================ -->
<script src="<?= base_url(); ?>assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?= base_url(); ?>assets/js/scrollbar/mCustomScrollbar-active.js"></script>
<!-- metisMenu JS ============================================ -->
<script src="<?= base_url(); ?>assets/js/metisMenu/metisMenu.min.js"></script>
<script src="<?= base_url(); ?>assets/js/metisMenu/metisMenu-active.js"></script>
<!-- morrisjs JS ============================================ -->
<!-- <script src="<?= base_url(); ?>assets/js/morrisjs/raphael-min.js"></script>
<script src="<?= base_url(); ?>assets/js/morrisjs/morris.js"></script>
<script src="<?= base_url(); ?>assets/js/morrisjs/morris-active.js"></script> -->
<!-- morrisjs JS ============================================ -->
<script src="<?= base_url(); ?>assets/js/sparkline/jquery.sparkline.min.js"></script>
<script src="<?= base_url(); ?>assets/js/sparkline/jquery.charts-sparkline.js"></script>
<script src="<?= base_url(); ?>assets/js/sparkline/sparkline-active.js"></script>
<!-- calendar JS ============================================ -->
<script src="<?= base_url(); ?>assets/js/calendar/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/js/calendar/fullcalendar.min.js"></script>
<script src="<?= base_url(); ?>assets/js/calendar/fullcalendar-active.js"></script>
<!-- tab JS ============================================ -->
<script src="<?= base_url(); ?>assets/js/tab.js"></script>
<!-- payment away JS ============================================ -->
<!-- <script src="<?= base_url(); ?>assets/js/card.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.payform.min.js"></script>
<script src="<?= base_url(); ?>assets/js/e-payment.js"></script> -->
<!-- plugins JS	============================================ -->
<script src="<?= base_url(); ?>assets/js/plugins.js"></script>
<!-- main JS ============================================ -->
<script src="<?= base_url(); ?>assets/js/main.js"></script>
<!-- tawk chat JS ============================================ -->
<!-- <script src="<?= base_url(); ?>assets/js/tawk-chat.js"></script> -->

<!-- Signature Pad JS ============================================ -->
<script src="<?= base_url(); ?>assets/js/jsSignPad/html2canvas.min.js"></script>
<script src="<?= base_url(); ?>assets/js/jsSignPad/numeric-1.2.6.min.js"></script>
<script src="<?= base_url(); ?>assets/js/jsSignPad/bezier.js"></script>
<script src="<?= base_url(); ?>assets/js/jsSignPad/json2.min.js"></script>
<script src="<?= base_url(); ?>assets/js/jsSignPad/jquery.signaturepad.js"></script>
<!-- Signature Pad JS Scripts End -->

<script src="<?= base_url(); ?>assets/js/dropify/dist/dropify.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		<?php if ($this->session->flashdata('loginsuccessmsg')) : ?>
			let timerInterval
			Swal.fire({
				position: 'top-end',
				//icon: 'success',
				title: 'Success',
				html: '<?php echo $this->session->flashdata('loginsuccessmsg'); ?>',
				timer: 3000,
				timerProgressBar: true,
				//showConfirmButton: false,
				didOpen: () => {
					Swal.showLoading()
					//const b = Swal.getHtmlContainer().querySelector('b')
					timerInterval = setInterval(() => {
						//b.textContent = Swal.getTimerLeft()
					}, 100)
				},
				willClose: () => {
					clearInterval(timerInterval)
				}
			}).then((result) => {
				/* Read more about handling dismissals below */
				if (result.dismiss === Swal.DismissReason.timer) {
					console.log('I was closed by the timer')
				}
			})
		<?php endif; ?>
	});
</script>

<script type="text/javascript">
	/* --- Jquery Dropify Start --*/
	$(document).ready(function() {
		$('.dropify').dropify({
			messages: {
				default: 'Click or Drop files here',
				replace: 'Change',
				remove: 'Remove',
				error: 'error'
			}
		});

		/*--- Signature Draw Scripts Start ---*/
		// $(document).ready(function() {
		$('.sigPad').signaturePad();
		// });

		// $(document).ready(function() {
		$('#signArea').signaturePad({
			drawOnly: true,
			drawBezierCurves: true,
			lineTop: 0,
			lineColour: 'transparent',
			bgColour: 'transparent',
			penColour: 'Black',
			penWidth: 3
		});
		// });


		/*-- event add input viewer receipt --*/
		$(".add-more").click(function() {
			var html = $(".copy").html();
			$(".after-add-more").after(html);
		});
		// saat tombol remove dklik control group akan dihapus 
		$("body").on("click", ".remove", function() {
			$(this).parents(".control-group").remove();
			/*-- event add input viewer receipt --*/
		});


		// When user chooses a PDF file
		$("#filepdf").on('change', function() {
			// Validate whether PDF
			if (['application/pdf'].indexOf($("#filepdf").get(0).files[0].type) == -1) {
				//alert('Error : Not a PDF');
				showSwalertNotPDF();
				$("#dropifyalert").html('<small><span class="error mt-2 text-danger">Only PDF format is allowed</span></small>');
				return;
			}
			//var pdfName = e.target.files[0].name;
			var pdfName = $("#filepdf").get(0).files[0].name;
			$("#judulPDF").val(pdfName);
			// Send the object url of the pdf
			var urlPDF = URL.createObjectURL($("#filepdf").get(0).files[0]);
			// onlymeShowPDF(URL.createObjectURL($("#filepdf").get(0).files[0]));
			onlymeShowPDF(urlPDF);
			//alert(urlPDF);
			$("#DataBase64").val(urlPDF);

			var file = $("#filepdf").get(0).files[0];
			getBase64(file).then(
				// data => console.log(data)
				data => $("#hideDataBase64").val(data)
			);
		});

		/* --- Signature Change Default Start --*/
		$('.form-check-input').on('click', function() {
			const UserId = $(this).data('userid');
			const SignId = $(this).data('signid');
			const TypeSign = $(this).data('typesign');

			$.ajax({
				url: "<?= base_url('Createsignin/changesignindefault'); ?>",
				type: 'post',
				data: {
					userId: UserId,
					signId: SignId,
					typeSign: TypeSign
				},
				success: function() {
					document.location.href = "<?= base_url('Createsignin/mysignin'); ?>";
				}
			});
		});

		var documentToolbar = $('.breadcome-list')
		var contentHeader = $('.content-header')
		var distance = contentHeader.outerHeight()
		$('.document-toolbar-container-sticky').css('height', documentToolbar.outerHeight())

		$(window).scroll(() => {
			if ($(window).scrollTop() >= distance) {
				documentToolbar.addClass('document-toolbar-sticky')
			} else {
				documentToolbar.removeClass('document-toolbar-sticky')
			}
			var scrollDistance = $(window).scrollTop()
			var result = Math.abs(Math.round(scrollDistance / 1007));
			if (result == 0) {
				result = 1
			}
			$('#pageCurrent').text(result)
		})
		if ($(window).scrollTop() > distance) {
			documentToolbar.addClass('document-toolbar-sticky')
		}


	});

	// $("#fillOutSign").click(function() {
	$(document).on('click', '#fillOutSign', function() {
		//type the code in here

	});

	$("#btn-clear").click(function() {
		$("#signArea").signaturePad().clearCanvas();
	});

	$(document).on('click', '#btn-save', function() {
		var mycanvas = document.getElementById('sign-pad');
		var img = mycanvas.toDataURL("image/png");
		//ajax call to save image inside folder
		$.ajax({
			url: '<?= base_url('Createsignin/savesignin'); ?>',
			data: {
				signature: img,
				signatureType: 1,
				signUserName: $('#signUserName').val()
			},
			type: 'post',
			success: function(response) {
				document.location.href = "<?= base_url(); ?>Createsignin/mysignin";
			}
		});
	});

	/* --- Signature Upload Start --*/
	$(document).on("click", ".browse", function() {
		var file = $(this).parents().find(".file");
		file.trigger("click");
	});

	$('#fileuploadSignature').change(function(e) {
		var filename = e.target.files[0].name;
		$("#file").val(filename);
		$("#dropifyalert").html('<small><span class="success mt-2 text-success">' + filename + '</span></small>');

		var reader = new FileReader();
		reader.onload = function(e) {
			document.getElementById("preview").src = e.target.result;
		};
		reader.readAsDataURL(this.files[0]);
	});
	/* --- Signature Upload End --*/

	/*--Javascript for create type signature canvas start--*/
	/*--- Signature Typed Scripts Start ---*/
	$("#names").on('change', function() {
		createTypedSignatureCanvas('names', '48px Dancing Script');
	});

	function createTypedSignatureCanvas(inputId, font) {
		var __CANVAS_PAD = $('#signature-pad').get(0),
			__CANVAS_PAD_CTX = __CANVAS_PAD.getContext('2d');

		//var canvas = document.getElementById(canvasId);
		var input = document.getElementById(inputId);

		//var canvas = $('#signature-pad').get(0);
		//var context = canvas.getContext('2d');
		__CANVAS_PAD_CTX.font = font;
		__CANVAS_PAD_CTX.textAlign = 'start';

		//input.addEventListener('input', function(event) {
		__CANVAS_PAD_CTX.clearRect(0, 0, __CANVAS_PAD.width, __CANVAS_PAD.height);
		__CANVAS_PAD_CTX.fillText(event.target.value, 5, (__CANVAS_PAD.height / 2), __CANVAS_PAD.width - 15);
		//});
	}

	//event tombol save Typed signature
	$(document).on('click', '#btn-save-typed', function() {
		var canvas = document.getElementById('signature-pad');
		var imgPad = canvas.toDataURL('image/png');
		//alert(imgPad);
		$.ajax({
			url: '<?= base_url('signature/saveSignatures'); ?>',
			data: {
				signature: imgPad,
				signatureType: 2,
				signUserName: "<?= $user['name']; ?>"
			},
			type: 'post',
			success: function(response) {
				document.location.href = "<?= base_url('signature'); ?>";
			}
		});
	});
	/*--- Signature Typed Scripts End ---*/
	/*--Javascript for create type signature canvas end--*/
</script>

<script>
	function getBase64(file) {
		return new Promise((resolve, reject) => {
			const reader = new FileReader();
			reader.readAsDataURL(file);
			reader.onload = () => resolve(reader.result);
			reader.onerror = error => reject(error);
		});
	}


	// Convert file to base64 string
	// function getBase64(file) {
	// 	return new Promise((resolve, reject) => {
	// 		const reader = new FileReader();
	// 		reader.readAsDataURL(file);
	// 		reader.onload = () => resolve(reader.result);
	// 		reader.onerror = error => reject(error);
	// 	});
	// }
</script>

<script>
	var thePdf = null;
	var scale = 0.3;
	var myStatePDF = {
		pdf: null,
		currentPage: 1,
		zoom: 1.5
	}

	function onlymeShowPDF(pdf_url) {
		//var url = 'https://raw.githubusercontent.com/mozilla/pdf.js/ba2edeae/examples/learning/helloworld.pdf';

		// Loaded via <script> tag, create shortcut to access PDF.js exports.
		var pdfjsLib = window['pdfjs-dist/build/pdf'];

		// The workerSrc property shall be specified.
		pdfjsLib.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.js';

		var loadingTask = pdfjsLib.getDocument(pdf_url);
		loadingTask.promise.then(function(pdf) {
			thePdf = pdf;
			viewer = document.getElementById('pdf-viewer');
			viewer.setAttribute('dataPage', pdf.numPages);

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
			var xPages = document.getElementById('pdf-viewer').getAttribute("datapage");
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
	}

	function renderPage(pageNumber, canvas) {
		thePdf.getPage(pageNumber).then(function(page) {
			viewport = page.getViewport({
				scale: scale
			});
			canvas.height = viewport.height;
			canvas.width = viewport.width;
			page.render({
				canvasContext: canvas.getContext('2d'),
				viewport: viewport
			});
		});
	}

	function renderPDF(mypages) {
		myStatePDF.pdf.getPage(mypages).then((page) => {
			var canvas = document.getElementById("pdf_renderer");
			var ctx = canvas.getContext('2d');
			var viewport = page.getViewport(myStatePDF.zoom);

			canvas.width = viewport.width;
			canvas.height = viewport.height;

			page.render({
				canvasContext: ctx,
				viewport: viewport
			});
		});
	}
</script>

<?php $urldata = $this->uri->segment('2');
if ($urldata == 'uploadonlyme') {
?>
	<script>
		var scale = 1;
		var myState = {
			pdf: null,
			currentPage: 1,
			zoom: 1.55
		}

		var BASE64_MARKER = ';base64,';

		function convertDataURIToBinary(dataURI) {
			var base64Index = dataURI.indexOf(BASE64_MARKER) + BASE64_MARKER.length;
			var base64 = dataURI.substring(base64Index);
			var raw = window.atob(base64);
			var rawLength = raw.length;
			var array = new Uint8Array(new ArrayBuffer(rawLength));

			for (var i = 0; i < rawLength; i++) {
				array[i] = raw.charCodeAt(i);
			}
			return array;
		}

		var pdfAsDataUri = "<?= $Base64; ?>"; // shortened
		var pdfAsArray = convertDataURIToBinary(pdfAsDataUri);

		// PDFJS.getDocument(pdfAsArray).then((pdf) => {
		var pdfjsLib = window['pdfjs-dist/build/pdf'];

		// The workerSrc property shall be specified.
		pdfjsLib.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.js';

		var loadingTask = pdfjsLib.getDocument(pdfAsArray);
		loadingTask.promise.then(function(pdf) {
			thePdfs = pdf;
			viewer = document.getElementById('digitalSignature');
			viewer.setAttribute('dataPage', pdf.numPages)
			//myState.pdf = pdf;
			// var numPages = pdf.numPages;
			// document.getElementById('pageOf').innerHTML = pdf.numPages;

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
			var xPages = document.getElementById('digitalSignature').getAttribute("datapage");
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

		interact('.signature-item')
			.draggable({
				inertia: true,
				restrict: {
					restriction: "parent",
					endOnly: true,
					elementRect: {
						top: 0,
						left: 0,
						bottom: 1,
						right: 1
					}
				},
				autoScroll: true,
				onmove: function(event) {
					var target = event.target,
						x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx,
						y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

					target.style.webkitTransform = target.style.transform = 'translate(' + x + 'px, ' + y + 'px)';
					target.style.border = '2px dashed #ddd';
					target.classList.remove('digital-signature--remove')

					target.setAttribute('data-x', x);
					target.setAttribute('data-y', y);
					console.log('Coordinate X,Y(' + event.pageX + ', ' + event.pageY + ')')
				},
				onend: function(event) {
					var target = event.target;
					target.classList.add('digital-signature--remove')
				}
			});
	</script>
<?php } ?>

</body>

</html>