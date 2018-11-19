<!DOCTYPE html>
<html lang="en">
    <?php  $this->load->view("common/common_head"); ?>

    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/plugins/fullcalendar/fullcalendar.min.css"); ?>"> 
    <body>
        <?php  $this->load->view("admin/common/common_loader"); ?>
        <div class="mn-content fixed-sidebar">
            <?php  $this->load->view("admin/common/common_header"); ?>

            <?php  $this->load->view("admin/common/common_sidebar"); ?>
            <main class="mn-inner inner-active-sidebar">
                <div class="middle-content">
                    <div class="row no-m-t no-m-b">
                    <div class="col s12 m12 l4">
                        <div class="card stats-card">
                            <div class="card-content">
                                <div class="card-options">
                                    <ul>
                                        <li class="red-text"><span class="badge cyan lighten-1">gross</span></li>
                                    </ul>
                                </div>
                                <span class="card-title">Sales</span>
                                <span class="stats-counter">$<span class="counter">48190</span><small>This week</small></span>
                            </div>
                            <div id="sparkline-bar"></div>
                        </div>
                    </div>
                        <div class="col s12 m12 l4">
                        <div class="card stats-card">
                            <div class="card-content">
                                <div class="card-options">
                                    <ul>
                                        <li><a href="javascript:void(0)"><i class="material-icons">more_vert</i></a></li>
                                    </ul>
                                </div>
                                <span class="card-title">Page views</span>
                                <span class="stats-counter"><span class="counter">83710</span><small>This month</small></span>
                            </div>
                            <div id="sparkline-line"></div>
                        </div>
                    </div>
                    <div class="col s12 m12 l4">
                        <div class="card stats-card">
                            <div class="card-content">
                                <span class="card-title">Reports</span>
                                <span class="stats-counter"><span class="counter">23230</span><small>Last week</small></span>
                                <div class="percent-info green-text">8% <i class="material-icons">trending_up</i></div>
                            </div>
                            <div class="progress stats-card-progress">
                                <div class="determinate" style="width: 70%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="row no-m-t no-m-b">
                        <div class="col s12 m12 l8">
                            <div class="card visitors-card">
                                
     
                                   <div id="flotchart1" hidden=""></div>
                               
                            </div>
                        </div>
                        <div class="col s12 m12 l4">
                            <div class="card server-card">
                                    <div id="flotchart2" hidden=""></div>
                              
                            </div>
                        </div>
                    </div>
                    <div class="row no-m-t no-m-b">
                        <div class="col s12 m12 l12">
                            <div class="card invoices-card">
                                <div class="card-content">

                                    <div id="calendar"></div>
                                    

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
           <?php  $this->load->view("admin/common/common_footer"); ?>
        </div>
        <div class="left-sidebar-hover"></div>      

       <?php  $this->load->view("common/common_foot"); ?>



       <Script>
        $( document ).ready(function() {
    
            setTimeout(function(){ Materialize.toast('Selamat Datang!', 4000) }, 4000);

        });
       </Script>


        <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/fullcalendar/moment.min.js"); ?>"></script>
        <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/fullcalendar/fullcalendar.min.js"); ?>"></script>
        <script src="<?php echo base_url($this->config->item("theme_admin")."/js/pages/calendar.js"); ?>"></script>
    </body>
</html>