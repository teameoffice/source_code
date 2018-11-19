            <aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">
                    <div class="sidebar-profile">
                        <div class="sidebar-profile-image">
                            <img src="<?php echo base_url($this->config->item("theme_admin")."/images/profile-image.png"); ?>" class="circle" alt="">
                        </div>
                        <div class="sidebar-profile-info">
                            <a href="javascript:void(0);" class="account-settings-link">
                                <p><?php echo _get_current_user_name($this); ?></p>
                                <span>user: <?php echo _get_current_user_name($this); ?><i class="material-icons right">arrow_drop_down</i></span>
                            </a>
                        </div>
                    </div>
                    <div class="sidebar-account-settings">
                        <ul>    
                            <li class="no-padding">
                                <a href="<?php echo site_url("users/change_password") ?>" class="waves-effect waves-grey"><i class="material-icons">vpn_key</i>Password</a>
                            </li>
                            <li class="divider"></li>
                            <li class="no-padding">
                                <a href="<?php echo site_url("admin/signout") ?>" class="waves-effect waves-grey"><i class="material-icons">exit_to_app</i>Sign Out</a>
                            </li>
                        </ul>
                    </div>
                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
                    <li class="no-padding"><a class="waves-effect waves-grey active" href="<?php echo site_url("admin/dashboard") ?>"><i class="material-icons">settings_input_svideo</i>Dashboard</a></li>
                     <li class="no-padding"><a class="waves-effect waves-grey active" href="<?php echo site_url("users/") ?>"><i class="material-icons">perm_identity</i>Pengguna</a></li>
                    <li class="no-padding"><a class="waves-effect waves-grey active" href="<?php echo site_url("personil/") ?>"><i class="material-icons">supervisor_account</i>Data Personel</a></li>
                    <li class="no-padding"><a class="waves-effect waves-grey active" href="<?php echo site_url("kategori/") ?>"><i class="material-icons">work</i>Kategori Surat</a></li>
                    <li class="no-padding"><a class="waves-effect waves-grey active" href="<?php echo site_url("workflow/") ?>"><i class="material-icons">group_work</i>Alur</a></li>
                    <li class="no-padding"><a class="waves-effect waves-grey active" href="<?php echo site_url("workflowsurat/") ?>"><i class="material-icons">loop</i>Alur Surat</a></li>


                    <li class="divider"></li>
                    
                    <li class="no-padding"><a class="waves-effect waves-grey active" href="<?php echo site_url("suratmasukadmin/") ?>"><i class="material-icons">library_books</i>Surat Masuk Admin</a></li>
                    <li class="no-padding"><a class="waves-effect waves-grey active" href="<?php echo site_url("suratkeluaradmin/") ?>"><i class="material-icons">library_books</i>Surat Keluar Admin</a></li>

                </ul>
                <div class="footer">
                    <p class="copyright">Mabes TNI ©2018</p>
                </div>
                </div>
            </aside>