    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

    <!-- Effect Tilt Javascripts -->
    <script type="text/javascript" src="<?= base_url(); ?>vendor/tilt/vanilla-tilt.min.js"></script>




    <!-- Custom Sweetalert scripts for Alert-->
    <script type="text/javascript">
        $(document).ready(function() {
            <?php if ($this->session->flashdata('errorlogin')) : ?>
                Swal.fire({
                    // position: 'center-top',
                    icon: 'error',
                    title: 'Oops...',
                    text: "<?php echo $this->session->flashdata('errorlogin'); ?>"
                })
            <?php endif; ?>

            <?php if ($this->session->flashdata('logoutmsg')) : ?>
                Swal.fire({
                    // position: 'center-top',
                    icon: 'success',
                    title: 'Logout',
                    text: "<?php echo $this->session->flashdata('logoutmsg'); ?>",
                    showConfirmButton: false,
                    timer: 2000
                })
            <?php endif; ?>

            <?php if ($this->session->flashdata('registersuccess')) : ?>
                Swal.fire({
                    // position: 'center-top',
                    icon: 'success',
                    title: 'Registered',
                    text: "<?php echo $this->session->flashdata('registersuccess'); ?>",
                    showConfirmButton: false,
                    timer: 2000
                })
            <?php endif; ?>
        });
    </script>

    </body>

    </html>