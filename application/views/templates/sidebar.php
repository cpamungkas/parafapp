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
                            <li class="active">
                                <a class="has-arrow" href="<?= base_url(); ?>Admin">
                                    <span class="educate-icon educate-home icon-wrap"></span>
                                    <span class="mini-click-non"><?= $role['role']; ?></span>
                                </a>
                                <ul class="submenu-angle" aria-expanded="true">
                                    <li><a title="Dashboard v.1" href="#"><span class="mini-sub-pro">Manage Users</span></a></li>
                                    <li><a title="Dashboard v.2" href="#"><span class="mini-sub-pro">Manage Menu</span></a></li>
                                    <li><a title="Dashboard v.3" href="#"><span class="mini-sub-pro">Manage Role</span></a></li>
                                    <li><a title="Analytics" href="#"><span class="mini-sub-pro">Analytics</span></a></li>
                                    <li><a title="Widgets" href="#"><span class="mini-sub-pro">Config</span></a></li>
                                </ul>
                            </li>
                        <?php } elseif ($this->session->userdata('role_id') == 2) { ?>
                            <li class="active">
                                <a class="has-arrow" href="<?= base_url(); ?>User">
                                    <span class="educate-icon educate-professor icon-wrap"></span>
                                    <span class="mini-click-non">User Profile</span>
                                </a>
                                <ul class="submenu-angle" aria-expanded="true">
                                    <li><a title="Dashboard v.1" href="#"><span class="mini-sub-pro">Profile</span></a></li>
                                    <li><a title="Dashboard v.2" href="#"><span class="mini-sub-pro">Edit</span></a></li>
                                    <li><a title="Dashboard v.3" href="#"><span class="mini-sub-pro">Change Password</span></a></li>
                                </ul>
                            </li>
                        <?php } elseif ($this->session->userdata('role_id') == 5) { ?>
                            <li class="active">
                                <a class="has-arrow" href="<?= base_url(); ?>Guest">
                                    <span class="educate-icon educate-home icon-wrap"></span>
                                    <span class="mini-click-non"><?= $role['role']; ?></span>
                                </a>
                                <ul class="submenu-angle" aria-expanded="true">
                                    <li><a title="Dashboard v.1" href="#"><span class="mini-sub-pro">Create Signature</span></a></li>
                                </ul>
                            </li>
                        <?php } ?>

                        <li>
                            <a class="has-arrow" href="#signature" aria-expanded="false"><span class="educate-icon educate-department icon-wrap"></span> <span class="mini-click-non">Signature</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Professors" href="all-professors.html"><span class="mini-sub-pro">My Signature</span></a></li>
                                <li><a title="Add Professor" href="add-professor.html"><span class="mini-sub-pro">Create Signature</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#signindocs" aria-expanded="false"><span class="educate-icon educate-library icon-wrap"></span> <span class="mini-click-non">Signin Docs</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Students" href="all-students.html">
                                        <span class="mini-sub-pro">Only Me</span>
                                    </a></li>
                                <li><a title="Add Students" href="add-student.html">
                                        <span class="mini-sub-pro">Me & Others</span>
                                    </a></li>
                                <li><a title="Edit Students" href="edit-student.html">
                                        <span class="mini-sub-pro">Only Others</span>
                                    </a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#StatusDocs" aria-expanded="false"><span class="educate-icon educate-event icon-wrap"></span> <span class="mini-click-non">Status Docs</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Courses" href="all-courses.html"><span class="mini-sub-pro">Complete</span></a></li>
                                <li><a title="Add Courses" href="add-course.html"><span class="mini-sub-pro">Awaiting</span></a></li>
                                <li><a title="Edit Courses" href="edit-course.html"><span class="mini-sub-pro">Draft</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a title="Logout" href="<?= base_url(); ?>Home/logout" aria-expanded="false"><span class="fa fas fa-fw fa-power-off" aria-hidden="true"></span> <span class="mini-click-non">Logout</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->