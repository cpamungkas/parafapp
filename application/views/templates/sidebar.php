    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="<?= base_url(); ?>"><img class="main-logo" src="<?= base_url(); ?>assets/img/logo/logogramediablue.png" alt="" /></a>
                <strong><a href="<?= base_url(); ?>"><img src="<?= base_url(); ?>assets/img/logo/gsturelogo30x30.png" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <?php
                        if ($this->session->userdata('role_id') == 1) { ?>
                            <!-- <li class="active"> -->
                            <li>
                                <a class="has-arrow" href="<?= base_url(); ?>Admin">
                                    <span class="educate-icon educate-home icon-wrap"></span>
                                    <span class="mini-click-non"><?= $role['role']; ?></span>
                                </a>
                                <ul class="submenu-angle" aria-expanded="true">
                                    <li><a title="Manage Users" href="#"><span class="mini-sub-pro">Manage Users</span></a></li>
                                    <li><a title="Manage Menu" href="#"><span class="mini-sub-pro">Manage Menu</span></a></li>
                                    <li><a title="Manage Role" href="#"><span class="mini-sub-pro">Manage Role</span></a></li>
                                    <!-- <li><a title="Analytics" href="#"><span class="mini-sub-pro">Analytics</span></a></li> -->
                                    <li><a title="Config" href="#"><span class="mini-sub-pro">Config</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="#signature" aria-expanded="false"><span class="educate-icon educate-department icon-wrap"></span> <span class="mini-click-non">Signature</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                    <li><a title="Create Signature" href="<?= base_url(); ?>Createsignin"><span class="mini-sub-pro">Create Signature</span></a></li>
                                    <li><a title="My Signature" href="<?= base_url(); ?>Createsignin/mysignin"><span class="mini-sub-pro">My Signature</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="#signindocs" aria-expanded="false"><span class="educate-icon educate-library icon-wrap"></span> <span class="mini-click-non">Signin Docs</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                    <li><a title="Only Me" href="<?= base_url(); ?>Onlyme"><span class="mini-sub-pro">Only Me</span></a></li>
                                    <li><a title="Me And Others" href="#MeandOthers"><span class="mini-sub-pro">Me & Others</span></a></li>
                                    <li><a title="Only Others" href="#OnlyOthers"><span class="mini-sub-pro">Only Others</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="#StatusDocs" aria-expanded="false"><span class="educate-icon educate-event icon-wrap"></span> <span class="mini-click-non">Status Docs</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                    <li><a title="Complete" href="#StatusComplete"><span class="mini-sub-pro">Complete</span></a></li>
                                    <li><a title="Awaiting" href="#StatusAwaiting"><span class="mini-sub-pro">Awaiting</span></a></li>
                                    <li><a title="Draft" href="#StatusDraft"><span class="mini-sub-pro">Draft</span></a></li>
                                </ul>
                            </li>
                        <?php } elseif ($this->session->userdata('role_id') == 3) { ?>
                            <!-- <li class="active"> -->
                            <li>
                                <a class="has-arrow" href="<?= base_url(); ?>User">
                                    <span class="educate-icon educate-professor icon-wrap"></span>
                                    <span class="mini-click-non">User Profile</span>
                                </a>
                                <ul class="submenu-angle" aria-expanded="true">
                                    <li><a title="Profile" href="#"><span class="mini-sub-pro">Profile</span></a></li>
                                    <li><a title="Edit" href="#"><span class="mini-sub-pro">Edit</span></a></li>
                                    <li><a title="Change Password" href="#"><span class="mini-sub-pro">Change Password</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="#signature" aria-expanded="false"><span class="educate-icon educate-department icon-wrap"></span> <span class="mini-click-non">Signature</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                    <li><a title="Create Signature" href="<?= base_url(); ?>Createsignin"><span class="mini-sub-pro">Create Signature</span></a></li>
                                    <li><a title="My Signature" href="<?= base_url(); ?>Createsignin/mysignin"><span class="mini-sub-pro">My Signature</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="#signindocs" aria-expanded="false"><span class="educate-icon educate-library icon-wrap"></span> <span class="mini-click-non">Signin Docs</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                    <li><a title="Only Me" href="<?= base_url(); ?>Onlyme"><span class="mini-sub-pro">Only Me</span></a></li>
                                    <li><a title="Me And Others" href="#MeandOthers"><span class="mini-sub-pro">Me & Others</span></a></li>
                                    <li><a title="Only Others" href="#OnlyOthers"><span class="mini-sub-pro">Only Others</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="#StatusDocs" aria-expanded="false"><span class="educate-icon educate-event icon-wrap"></span> <span class="mini-click-non">Status Docs</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                    <li><a title="Complete" href="#StatusComplete"><span class="mini-sub-pro">Complete</span></a></li>
                                    <li><a title="Awaiting" href="#StatusAwaiting"><span class="mini-sub-pro">Awaiting</span></a></li>
                                    <li><a title="Draft" href="#StatusDraft"><span class="mini-sub-pro">Draft</span></a></li>
                                </ul>
                            </li>
                        <?php } elseif ($this->session->userdata('role_id') == 5) { ?>
                            <!-- <li class="active"> -->
                            <li>
                                <a class="has-arrow" href="<?= base_url(); ?>Guest">
                                    <span class="educate-icon educate-home icon-wrap"></span>
                                    <span class="mini-click-non"><?= $role['role']; ?></span>
                                </a>
                                <ul class="submenu-angle" aria-expanded="true">
                                    <li><a title="Create Signature" href="<?= base_url(); ?>Createsignin"><span class="mini-sub-pro">Create Signature</span></a></li>
                                    <li><a title="Only Me" href="<?= base_url(); ?>Onlyme"><span class="mini-sub-pro">Only Me</span></a></li>

                                </ul>
                            </li>
                        <?php } ?>

                        <li>
                            <a title="Logout" href="<?= base_url(); ?>Home/logout" aria-expanded="false"><span class="fa fas fa-fw fa-power-off" aria-hidden="true"></span> <span class="mini-click-non">Logout</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->