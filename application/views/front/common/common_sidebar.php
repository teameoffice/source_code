            <aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">
                    <div class="sidebar-profile">
                        <div class="sidebar-profile-image">
                            <img src="<?php echo base_url($this->config->item("theme_admin")."/images/profile-image.png"); ?>" class="circle" alt="">
                        </div>
                        <div class="sidebar-profile-info">
                            <a href="javascript:void(0);" class="account-settings-link">
                                <p>David Doe</p>
                                <span>david@gmail.com<i class="material-icons right">arrow_drop_down</i></span>
                            </a>
                        </div>
                    </div>
                    <div class="sidebar-account-settings">
                        <ul>  
                            <li class="no-padding">
                                <a href="<?php echo site_url("front/profile") ?>" class="waves-effect waves-grey"><i class="material-icons">accessibility</i>Profil</a>
                            </li>  
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
                    <li class="no-padding"><a class="waves-effect waves-grey active" href="<?php echo site_url("front/dashboard") ?>"><i class="material-icons">settings_input_svideo</i>Dashboard</a></li>
                    <li class="divider"></li>
                    
                    <li class="no-padding"><a class="waves-effect waves-grey active" href="<?php echo site_url("suratmasuk/") ?>"><i class="material-icons">library_books</i>Surat Masuk</a></li>
                    <li class="no-padding"><a class="waves-effect waves-grey active" href="<?php echo site_url("suratkeluar/") ?>"><i class="material-icons">library_books</i>Surat Keluar</a></li>

                </ul>
                <div class="footer">
                    <p class="copyright">Mabes TNI ©2018</p>
                </div>
                </div>
            </aside>