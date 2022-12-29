<?php $uri = $this->uri->segment(3); ?>
<div class="page-wrap">
    <div class="app-sidebar colored">
        <div class="sidebar-header text-center">
            <a class="header-brand" href="<?= base_url('admin'); ?>">
                <div class="logo-img">
                    <img src="<?= base_url(''); ?>admin_assets/ciao.jpg" class="header-brand-img" alt="" style="width:48px;"><br>
                </div>
                <span class="text">&nbsp;&nbsp; CIAO Rides</span>
            </a>
            <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
            <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
        </div>

        <div class="sidebar-content">
            <div class="nav-container">
                <nav id="main-menu-navigation" class="navigation-main">
                    <div class="nav-lavel">Navigation</div>
                    <div class="nav-item <?= ($uri == "" || $uri == 'index') ? 'active' : '' ?>">
                        <a href="<?= base_url('admin/') ?>"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                    </div>

                    <div class="nav-lavel">User Management</div>
                    <div class="nav-item has-sub  <?= ($uri == 'all_users' || $uri == "user_bank_details" || $uri == "user_feedback" || $uri == "user_ratings" ) ? 'active open' : '' ?>">
                        <a href="javascript:void(0)"><i class="ik ik-users"></i><span>Users Management </span></a>
                        <div class="submenu-content">
                            <a href="" class="menu-item  <?= ($uri == 'all_users' ) ? 'active' : '' ?>"><span class="fa fa-users  active "></span>&nbsp;&nbsp; Taxi Users</a>
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-users  active"></span>&nbsp;&nbsp; Sharing Users </a>
                            <a href="" class="menu-item   <?= ($uri == 'user_feedback' ) ? 'active' : '' ?>"> <span class="fa fa-users  active"></span>&nbsp;&nbsp; Drivers</a>
                       
                        </div>
                    </div>
                    
                    
                 <div class="nav-lavel">Vehicle Management</div>
                    <div class="nav-item has-sub  <?= ($uri == 'all_users' || $uri == "user_bank_details" || $uri == "user_feedback" || $uri == "user_ratings" ) ? 'active open' : '' ?>">
                        <a href="javascript:void(0)"><i class="fa fa-car"></i><span>Vehicle Management</span></a>
                        <div class="submenu-content">
                            <a href="" class="menu-item  <?= ($uri == 'all_users' ) ? 'active' : '' ?>"><span class="fa fa-car  active "></span>&nbsp;&nbsp; Brands</a>
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Models </a>
                        
                       
                        </div>
                    </div>  
                    
                    
                    <div class="nav-lavel">Taxi Management</div>
                    <div class="nav-item has-sub  <?= ($uri == 'all_users' || $uri == "user_bank_details" || $uri == "user_feedback" || $uri == "user_ratings" ) ? 'active open' : '' ?>">
                        <a href="javascript:void(0)"><i class="fa fa-car"></i><span>Taxi Management</span></a>
                        <div class="submenu-content">
                            <a href="" class="menu-item  <?= ($uri == 'all_users' ) ? 'active' : '' ?>"><span class="fa fa-car  active "></span>&nbsp;&nbsp; Taxi Rides</a>
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Taxi Bookings </a>  
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Canceled By User </a>   
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Canceled by Driver </a>
                        
                       
                        </div>
                    </div>
                    
                    
                 <div class="nav-lavel">Inter City Management</div>
                    <div class="nav-item has-sub  <?= ($uri == 'all_users' || $uri == "user_bank_details" || $uri == "user_feedback" || $uri == "user_ratings" ) ? 'active open' : '' ?>">
                        <a href="javascript:void(0)"><i class="fa fa-car"></i><span>Inter City Management</span></a>
                        <div class="submenu-content">
                            <a href="" class="menu-item  <?= ($uri == 'all_users' ) ? 'active' : '' ?>"><span class="fa fa-car  active "></span>&nbsp;&nbsp; Bookings</a>
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Ongoing Rides </a>  
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Scheduled Rides </a>   
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Completed Rides </a> 
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Cancel By user </a>
                        
                       
                        </div>
                    </div>
                             
                   <div class="nav-lavel">Sharing Management</div>
                      <div class="nav-item has-sub  <?= ($uri == 'all_users' || $uri == "user_bank_details" || $uri == "user_feedback" || $uri == "user_ratings" ) ? 'active open' : '' ?>">
                        <a href="javascript:void(0)"><i class="fa fa-car"></i><span>Sharing Management</span></a>
                        <div class="submenu-content">
                            <a href="" class="menu-item  <?= ($uri == 'all_users' ) ? 'active' : '' ?>"><span class="fa fa-car  active "></span>&nbsp;&nbsp; All Rides</a>
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Ongoing Rides </a>  
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Bookings/Scheduled Rides </a>   
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Completed Rides </a> 
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Canceled By user </a>
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Canceled By rider </a>  
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Banking Details </a>   
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Pending Payments </a> 
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Paid Payments </a>
                        
                       
                        </div>
                    </div>
                               
 
    
          <div class="nav-lavel">Driver Management</div>
                      <div class="nav-item has-sub  <?= ($uri == 'all_users' || $uri == "user_bank_details" || $uri == "user_feedback" || $uri == "user_ratings" ) ? 'active open' : '' ?>">
                        <a href="javascript:void(0)"><i class="fa fa-car"></i><span>Driver Management</span></a>
                        <div class="submenu-content">
                            <a href="" class="menu-item  <?= ($uri == 'all_users' ) ? 'active' : '' ?>"><span class="fa fa-car  active "></span>&nbsp;&nbsp; Bank Details</a>
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Pending Payments  </a>  
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Paid Payments </a>   
                      
                        </div>
                    </div>
                          
                    
                  <div class="nav-lavel">Amount Calculations</div>
                      <div class="nav-item has-sub  <?= ($uri == 'all_users' || $uri == "user_bank_details" || $uri == "user_feedback" || $uri == "user_ratings" ) ? 'active open' : '' ?>">
                        <a href="javascript:void(0)"><i class="ik ik-dollar-sign"></i><span>Amount Calculations</span></a>
                        <div class="submenu-content">
                            <a href="" class="menu-item  <?= ($uri == 'all_users' ) ? 'active' : '' ?>"><span class="fa fa-car  active "></span>&nbsp;&nbsp; Taxi</a>
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Sharing  </a>  
                 
                      
                        </div>
                    </div>
                    
                    
  
  

                      <div class="nav-lavel">Feedbacks & Ratings</div>
                      <div class="nav-item has-sub  <?= ($uri == 'all_users' || $uri == "user_bank_details" || $uri == "user_feedback" || $uri == "user_ratings" ) ? 'active open' : '' ?>">
                        <a href="javascript:void(0)"><i class="ik ik-package"></i><span>Feedbacks & Ratings</span></a>
                        <div class="submenu-content">
                            <a href="" class="menu-item  <?= ($uri == 'all_users' ) ? 'active' : '' ?>"><span class="fa fa-car  active "></span>&nbsp;&nbsp; Sharing Users</a>
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Drivers  </a>  
                 
                      
                        </div>
                    </div>
                    
                  <div class="nav-lavel">Others</div>
                      <div class="nav-item has-sub  <?= ($uri == 'all_users' || $uri == "user_bank_details" || $uri == "user_feedback" || $uri == "user_ratings" ) ? 'active open' : '' ?>">
                        <a href="javascript:void(0)"><i class="ik ik-command"></i><span>Others</span></a>
                        <div class="submenu-content">
                            <a href="" class="menu-item  <?= ($uri == 'all_users' ) ? 'active' : '' ?>"><span class="ik ik-message-circle"></span>&nbsp;&nbsp; Push notifications</a>
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="ik ik-phone-call  active"></span>&nbsp;&nbsp; Emergency Contact  </a>  
                            <a href="" class="menu-item  <?= ($uri == 'all_users' ) ? 'active' : '' ?>"><span class="fa fa-car  active "></span>&nbsp;&nbsp; Admin Chat</a>
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Support  </a>  
                 
                      
                        </div>
                    </div>
                    
                    
                   
                    <div class="nav-item  <?= ($uri == 'logout' ) ? 'active' : '' ?>">
                        <a href=""><i class="ik ik-cast"></i><span>Logout </span></a>
                    </div>


                    
                    
                    
                    
<!--
                  <div class="nav-lavel">User Management</div>
                    <div class="nav-item has-sub  <?= ($uri == 'all_users' || $uri == "user_bank_details" || $uri == "user_feedback" || $uri == "user_ratings" ) ? 'active open' : '' ?>">
                        <a href="javascript:void(0)"><i class="ik ik-users"></i><span>Users Management </span></a>
                        <div class="submenu-content">
                            <a href="<?= base_url('admin/register/all_users') ?>" class="menu-item  <?= ($uri == 'all_users' ) ? 'active' : '' ?>"><span class="fa fa-users  active "></span>&nbsp;&nbsp; All Users</a>
                            <a href="<?= base_url('admin/register/user_bank_details') ?>" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="ik ik-database"></span>&nbsp;&nbsp; Bank  Details </a>
                            <a href="<?= base_url('admin/register/user_feedback') ?>" class="menu-item   <?= ($uri == 'user_feedback' ) ? 'active' : '' ?>"> <span class="ik ik-message-square"></span>&nbsp;&nbsp; Feedback Users</a>
                            <a href="<?= base_url('admin/register/user_ratings') ?>" class="menu-item   <?= ($uri == 'user_ratings' ) ? 'active' : '' ?>"> <span class="ik ik-star-on"></span>&nbsp;&nbsp; Users Ratings</a>
                        </div>
                    </div>
                    <div class="nav-lavel">Cars Management</div>
                    <div class="nav-lavel">Vehicle Management</div>
                    <div class="nav-item has-sub <?= ($uri == 'vehicle_makes' || $uri == "vehicle_models") ? 'active open' : '' ?>">
                        <a href="#"><i class="ik ik-award"></i><span>Brand  & Models</span></a>
                        <div class="submenu-content">
                            <a href="<?= base_url('admin/register/vehicle_makes') ?>" class="menu-item  <?= ($uri == 'vehicle_makes' ) ? 'active' : '' ?>"><span class="fa fa-car"></span>&nbsp;&nbsp; Brands</a>
                            <a href="<?= base_url('admin/register/vehicle_models') ?>" class="menu-item <?= ($uri == 'vehicle_models' ) ? 'active' : '' ?>"><span class="fa fa-cab"></span>&nbsp;&nbsp; Models</a>

                        </div>
                    </div>
                    <div class="nav-lavel">Booking Management</div>
                    <div class="nav-item has-sub  <?= ($uri == 'completed' || $uri == "shceduled" || $uri == "rides" || $uri == "ongoing") ? 'active open' : '' ?>">
                        <a href="javascript:void(0)"><i class="fa fa-car"></i><span>Rides Managements</span></a>
                        <div class="submenu-content">
                            <a href="<?= base_url('admin/register/rides') ?>" class="menu-item  <?= ($uri == 'rides' ) ? 'active' : '' ?>">
                                <span class="fa fa-car"></span>&nbsp;&nbsp;
                                All
                            </a>
                            <a href="<?= base_url('admin/register/ongoing') ?>" class="menu-item  <?= ($uri == 'ongoing' ) ? 'active' : '' ?>">
                                <span class="fa fa-car"></span>&nbsp;&nbsp;
                                Ongoing
                            </a>
                            <a href="<?= base_url('admin/register/shceduled') ?>" class="menu-item  <?= ($uri == 'shceduled' ) ? 'active' : '' ?>">
                                <span class="fa fa-car"></span>&nbsp;&nbsp;
                                Scheduled                            </a>
                            <a href="<?= base_url('admin/register/completed') ?>" class="menu-item  <?= ($uri == 'completed' ) ? 'active' : '' ?>">
                                <span class="fa fa-car"></span>&nbsp;&nbsp;
                                Completed
                            </a>
                        </div>
                    </div>
                    <div class="nav-item has-sub  <?= ($uri == 'instantorders' || $uri == "all_bookings" || $uri == "otherorders" || $uri == "cancelled_rider" || $uri == "cancelled_user") ? 'active open' : '' ?>">
                        <a href="javascript:void(0)"><i class="fa fa-cab"></i><span>Booking Managements</span></a>
                        <div class="submenu-content">
                            <a href="<?= base_url('admin/register/all_bookings') ?>" class="menu-item  <?= ($uri == 'all_bookings' ) ? 'active' : '' ?>">
                                <span class="fa fa-cab"></span>&nbsp;&nbsp;
                                All  Bookings
                            </a>
                            <a href="<?= base_url('admin/register/instantorders') ?>" class="menu-item  <?= ($uri == 'instantorders' ) ? 'active' : '' ?>">
                                <span class="fa fa-cab"></span>&nbsp;&nbsp;
                                Instant
                            </a>
                            <a href="<?= base_url('admin/register/otherorders') ?>" class="menu-item  <?= ($uri == 'otherorders' ) ? 'active' : '' ?>">
                                <span class="fa fa-cab"></span>&nbsp;&nbsp;
                                Scheduled
                            </a>
                            <a href="<?= base_url('admin/register/cancelled_user') ?>" class="menu-item  <?= ($uri == 'cancelled_user' ) ? 'active' : '' ?>">
                                <span class="fa fa-cab"></span>&nbsp;&nbsp;
                                Canceled By User
                            </a>
                            <a href="<?= base_url('admin/register/cancelled_rider') ?>" class="menu-item  <?= ($uri == 'cancelled_rider' ) ? 'active' : '' ?>">
                                <span class="fa fa-cab"></span>&nbsp;&nbsp;
                                Canceled  By Rider
                            </a>
                        </div>
                    </div>



                    <div class="nav-lavel">Payment Management</div>

                    <div class="nav-item has-sub  <?= ($uri == 'rider_pending_payments' || $uri == "rider_paid_payments") ? 'active open' : '' ?>">
                        <a href="javascript:void(0)"><i class="ik ik-package"></i><span>Rider Payments</span></a>
                        <div class="submenu-content">
                            <a href="<?= base_url('admin/register/rider_pending_payments') ?>" class="menu-item  <?= ($uri == 'rider_pending_payments' ) ? 'active' : '' ?>"><span class="ik ik-user-check"></span>&nbsp;&nbsp; Pending</a>
                            <a href="<?= base_url('admin/register/rider_paid_payments') ?>" class="menu-item <?= ($uri == 'rider_paid_payments' ) ? 'active' : '' ?>"><span class="ik ik-database"></span>&nbsp;&nbsp;  Paid </a>
                        </div>
                    </div>
                    <div class="nav-item  <?= ($uri == 'amount_calculations' ) ? 'active' : '' ?>">
                        <a href="<?= base_url('admin/register/amount_calculations') ?>"><i class="ik ik-dollar-sign"></i><span>Amount Calculations </span></a>
                    </div>
                    <div class="nav-lavel  <?= ($uri == 'push_notifications' ) ? 'active' : '' ?>">Others</div>
                    <div class="nav-item">
                        <a href="<?= base_url('admin/register/push_notifications') ?>"><i class="ik ik-message-circle"></i><span>Push Notifications  </span></a>
                    </div>
                    <div class="nav-item  <?= ($uri == 'emergency_contacts' ) ? 'active' : '' ?>">
                        <a href="<?= base_url('admin/register/emergency_contacts') ?>"><i class="ik ik-phone-call"></i><span>Emergency Contacts </span></a>
                    </div>

                    <div class="nav-lavel">Support</div>
                    <div class="nav-item  <?= ($uri == 'admin_chat' ) ? 'active' : '' ?>">
                        <a href="<?= base_url('admin/home/admin_chat') ?>"><i class="ik ik-command"></i><span>Admin Chat</span></a>
                    </div>
                    <div class="nav-item  <?= ($uri == 'support' ) ? 'active' : '' ?>">
                        <a href="<?= base_url('admin/register/support') ?>"><i class="ik ik-cast"></i><span>Support </span></a>
                    </div>
                    
                    
-->
                    
                </nav>
            </div>
        </div>
    </div>