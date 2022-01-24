<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- <title>Dashboard V.1 | Kiaalap - Kiaalap Admin Template</title> -->
  <title><?= $title; ?></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- favicon
		============================================ -->
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url(); ?>assets/img/favicon.ico">
  <!-- Google Fonts
		============================================ -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/font-awesome.min.css">
  <!-- owl.carousel CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/owl.carousel.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/owl.theme.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/owl.transitions.css">
  <!-- animate CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/animate.css">
  <!-- normalize CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/normalize.css">
  <!-- meanmenu icon CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/meanmenu.min.css">
  <!-- main CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/main.css">
  <!-- educate icon CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/educate-custon-icon.css">
  <!-- morrisjs CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/morrisjs/morris.css">
  <!-- mCustomScrollbar CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
  <!-- metisMenu CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/metisMenu/metisMenu.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/metisMenu/metisMenu-vertical.css">
  <!-- calendar CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/calendar/fullcalendar.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/calendar/fullcalendar.print.min.css">
  <!-- style CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/style.css">
  <!-- responsive CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/responsive.css">
  <!-- modernizr JS
		============================================ -->
  <script src="<?= base_url(); ?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
  <!--Custom Sweetalert for this alert-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.10/dist/sweetalert2.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.10/dist/sweetalert2.all.min.js"></script>
  <!-- jSignPad CSS ============================================ -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/signpad/jquery.signaturepad.css">
  <!-- Dropity CSS ====================================-->
  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/js/dropify/dist/dropify.min.css">

  <!-- < ?php
        // $url1 = $this->uri->segment('1');
        // $url2 = $this->uri->segment('2');
        // if ($url1 == 'Onlyme' or $url2 == 'uploadonlyme') {
        ?> -->

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.2.228/pdf.min.js"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.12.313/pdf.js"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/interact.js/1.10.11/interact.min.js"></script> -->

  <!-- < ?php } ?> -->
  <!-- <style>
    #pdf-viewer {
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.1);
      overflow: auto;
    }

    .pdf-page-canvas {
      display: block;
      margin: 5px auto;
      border: 1px solid rgba(0, 0, 0, 0.2);
    }

    .interactModal__documentNavigation-wrapper {
      overflow: hidden;
    }

    .interactModal__documentNavigation-item {
      min-width: 193px;
      min-height: 100px;
      position: relative;
      border: 1px solid #e4e9f1;
      box-sizing: border-box;
      box-shadow: 0 2px 7px rgba(0, 74, 219, .11);
      border-radius: 4px;
      margin-bottom: 16px;
    }

    .interactModal__documentNavigation-item:hover {
      cursor: pointer;
      box-shadow: 0 2px 7px rgba(0, 74, 219, .21);
    }

    .signatures-pad-typed {
      border-style: dotted;
      border-width: 1px;
      /* margin-bottom: 5px; */
      width: 300px;
      height: 100px;
    }

    #signArea {
      width: 304px;
      margin: 15px auto;
    }

    #signAreaUpload {
      width: 300px;
      margin: 0px 5px 30px;

    }

    .sign-container {
      width: 90%;
      margin: auto;
    }

    .sign-preview {
      width: 150px;
      height: 50px;
      border: solid 1px #CFCFCF;
      margin: 10px 5px;
    }

    .tag-ingo {
      font-family: cursive;
      font-size: 12px;
      text-align: left;
      font-style: oblique;
    }

    .document-container .digital-signature {
      position: absolute;
      margin-left: 20px;
      padding: 20px;
      display: inline-block;
      -webkit-transform: translate(0, 0);
      -moz-transform: translate(0, 0);
      -ms-transform: translate(0, 0);
      transform: translate(0, 0);
    }

    .document-container .digital-signature img {
      max-width: 150px;
      height: auto;
    }


    .document-container .digital-signature--remove::before {
      content: "X";
      position: absolute;
      top: -11px;
      right: -11px;
      width: 22px;
      height: 22px;
      text-align: center;
      font-size: 12px;
      line-height: 20px;
      border-radius: 50%;
      background-color: #ee5253;
      color: #fff;
    }

    .document-container .digital-signature--remove:hover {
      cursor: auto;
    }

    .document-toolbar {
      padding: 9px 20px 10px;
      /* border-left: 1px solid #f2f2f2; */
      /* border-bottom: 1px solid #f2f2f2; */
      box-sizing: border-box;
      /* background-color: #fafafa; */
    }

    .document-toolbar-sticky {
      position: fixed;
      z-index: 1020;
      top: -20px;
      left: 200px;
      width: calc(100% - 200px);
    }

    .document-toolbar .go-page {
      position: relative;
      display: inline-block;
    }

    .document-toolbar .go-page input[type=number] {
      height: 26px;
      width: 40px;
      text-align: center;
      border: none;
      border-bottom: 1px solid #59236F;
      background-color: transparent;
      -moz-appearance: textfield;
    }

    .document-toolbar .go-page input[type=number]::-webkit-inner-spin-button,
    .document-toolbar .go-page input[type=number]::-webkit-outer-spin-button {
      -webkit-appearance: none;
    }

    .document-toolbar .go-page input[type=number]:focus {
      outline: none;
    }

    .document-toolbar .go-page .arrow-dropup,
    .document-toolbar .go-page .arrow-dropdown {
      position: absolute;
      right: 0;
      width: 15px;
      height: 12px;
      padding: 0;
      text-align: center;
      line-height: 12px;
      border: none;
      background-color: transparent;
    }

    .document-toolbar .go-page .arrow-dropup:focus,
    .document-toolbar .go-page .arrow-dropdown:focus {
      outline: none;
    }

    .document-toolbar .go-page .arrow-dropup ion-icon,
    .document-toolbar .go-page .arrow-dropdown ion-icon {
      font-size: 18px;
      position: absolute;
      left: calc(50% - 9px);
    }

    .document-toolbar .go-page .arrow-dropup {
      top: 0;
    }

    .document-toolbar .go-page .arrow-dropup ion-icon {
      bottom: -5px;
    }

    .document-toolbar .go-page .arrow-dropdown {
      bottom: 1px;
    }

    .document-toolbar .go-page .arrow-dropdown ion-icon {
      top: -5px;
    }
  </style> -->
</head>

<body>
  <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->