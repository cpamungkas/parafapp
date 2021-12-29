<!-- < ?= $this->extend('auth/templates/index'); ?> -->

<!-- < ?= $this->section('content'); ?> -->

<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5 js-tilt" data-tilt>
                <img src="<?= base_url(); ?>assets/img/draw2.png" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <div class="divider d-flex align-items-center my-4">
                    <!-- <p class="text-center fw-bold mx-3 mb-0">Sign into your account</p> -->
                    <p class="text-center fw-bold mx-3 mb-0"><?= $loginTitle; ?></p>
                </div>

                <form action="#" method="post" class="user">

                    <div class="form-outline mb-4">
                        <!-- <label class="form-label" for="email">Email address</label> -->
                        <input type="email" name="login" class="form-control form-control-lg" placeholder="Email address " />
                        <!-- <div class="invalid-feedback">
                                    < ?= session('errors.login') ?>
                                </div> -->
                    </div>
                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <!-- <label class="form-label" for="password">Password</label> -->
                        <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password">
                        <!-- <div class="invalid-feedback">
                                < ?= session('errors.password') ?>
                            </div> -->
                    </div>

                    <!-- < ?php if ($config->allowRemembering) : ?> -->
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <!-- <input type="checkbox" name="remember" class="form-check-input me-2" < ?php if (old('remember')) : ?> checked < ?php endif ?>> -->
                            <!-- < ?= lang('Auth.rememberMe') ?> -->
                            <!--  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                    Remember me
                                </label>-->
                        </div>
                        <a href="#!" class="text-body">Forgot password?</a>
                    </div>
                    <!-- < ?php endif; ?> -->

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="<?= base_url(); ?>home/register" class="link-danger">Register</a></p>

                        <!-- <a href="#!" class="text-body">Forgot password?</a>-->
                        <!-- < ?php if ($config->activeResetter) : ?> -->
                        <!-- <p><a href="#">forgot Password</a></p> -->
                        <!-- < ?php endif; ?> -->

                        <!-- < ?php if ($config->allowRegistration) : ?> -->
                        <!-- < ?php endif; ?> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0">
            Copyright &copy; ttdApps <?= date('Y'); ?>. All rights reserved.
        </div>
        <!-- Copyright -->

        <!-- Right -->
        <div>
            <a href="#!" class="text-white me-4">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#!" class="text-white me-4">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#!" class="text-white me-4">
                <i class="fab fa-google"></i>
            </a>
            <a href="#!" class="text-white">
                <i class="fab fa-linkedin-in"></i>
            </a>
        </div>
        <!-- Right -->
    </div>
</section>

<!-- < ?= $this->endSection(); ?> -->