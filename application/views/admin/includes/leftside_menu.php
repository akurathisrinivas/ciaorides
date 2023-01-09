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
                    <div class="nav-item has-sub active open <?= ($uri == 'all_users' || $uri == "user_bank_details" || $uri == "user_feedback" || $uri == "user_ratings" ) ? 'active open' : '' ?>">
                        <a href="javascript:void(0)"><i class="ik ik-users"></i><span>Users Management </span></a>
                        <div class="submenu-content">
                            <a href="" class="menu-item  <?= ($uri == 'all_users' ) ? 'active' : '' ?>"><span class="fa fa-users  active "></span>&nbsp;&nbsp; Taxi Drivers</a>
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-users  active"></span>&nbsp;&nbsp; Passengers </a>
                            <a href="" class="menu-item   <?= ($uri == 'user_feedback' ) ? 'active' : '' ?>"> <span class="fa fa-users  active"></span>&nbsp;&nbsp; Private Drivers</a>                            <a href="" class="menu-item   <?= ($uri == 'user_feedback' ) ? 'active' : '' ?>"> <span class="fa fa-users  active"></span>&nbsp;&nbsp; Inactive Users</a>
                       
                        </div>
                    </div>
                    
                    
                 <div class="nav-lavel">Vehicle Management</div>
                    <div class="nav-item has-sub  active open<?= ($uri == 'all_users' || $uri == "user_bank_details" || $uri == "user_feedback" || $uri == "user_ratings" ) ? 'active open' : '' ?>">
                        <a href="javascript:void(0)"><i class="fa fa-car"></i><span>Vehicle Management</span></a>
                        <div class="submenu-content">
                            <a href="" class="menu-item  <?= ($uri == 'all_users' ) ? 'active' : '' ?>"><span class="fa fa-car  active "></span>&nbsp;&nbsp; Brands</a>
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Models </a>
                        
                       
                        </div>
                    </div>  
                     
   
                    <div class="nav-lavel">City Management</div>
                    <div class="nav-item has-sub  active open<?= ($uri == 'all_users' || $uri == "user_bank_details" || $uri == "user_feedback" || $uri == "user_ratings" ) ? 'active open' : '' ?>">
                        <a href="javascript:void(0)"><i class="fa fa-car"></i><span>City Management</span></a>
                        <div class="submenu-content">
                            <a href="" class="menu-item  <?= ($uri == 'all_users' ) ? 'active' : '' ?>"><span class="fa fa-car  active "></span>&nbsp;&nbsp; Rides (Car, Auto & Bike) </a>
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Bookings (Car, Auto & Bike) </a>  
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Cancellation (Car, Auto & Bike) </a>   
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Refunds (Car, Auto & Bike) </a>
                        
                       
                        </div>
                    </div>
                    
                    
                 <div class="nav-lavel">Intercity Management</div>
                    <div class="nav-item has-sub active open <?= ($uri == 'all_users' || $uri == "user_bank_details" || $uri == "user_feedback" || $uri == "user_ratings" ) ? 'active open' : '' ?>">
                        <a href="javascript:void(0)"><i class="fa fa-car"></i><span>Intercity Management</span></a>
                        <div class="submenu-content">
                            <a href="" class="menu-item  <?= ($uri == 'all_users' ) ? 'active' : '' ?>"><span class="fa fa-car  active "></span>&nbsp;&nbsp; Taxi Rides</a>
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Taxi Bookings </a>  
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Taxi Cancellation </a>   
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Taxi Refunds </a> 
                    
                        
                       
                        </div>
                    </div>
                   
                   
                   <div class="nav-lavel">Sharing Management</div>
                      <div class="nav-item has-sub active open <?= ($uri == 'all_users' || $uri == "user_bank_details" || $uri == "user_feedback" || $uri == "user_ratings" ) ? 'active open' : '' ?>">
                        <a href="javascript:void(0)"><i class="fa fa-car"></i><span>Sharing Management</span></a>
                        <div class="submenu-content">
                            <a href="" class="menu-item  <?= ($uri == 'all_users' ) ? 'active' : '' ?>"><span class="fa fa-car  active "></span>&nbsp;&nbsp; Rides (Car & Bike)</a>
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Bookings (Car & Bike) </a>  
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Cancellation (Car & Bike)s </a>   
                            <a href="" class="menu-item   <?= ($uri == 'user_bank_details' ) ? 'active' : '' ?>"><span class="fa fa-car  active"></span>&nbsp;&nbsp; Refunds (Car & Bike)</a> 
                        
                        
                       
                        </div>
                    </div>
                               
 

         <div class="nav-lavel">Roles & Responsibilites</div>
                      <div class="nav-item has-sub  active open<?= ($uri == 'roles' || $uri == "add_roles" || $uri == "edit_roles" || $uri == "view_roles" ) ? 'active open' : '' ?>">
                        <a href="javascript:void(0)"><i class="fa fa-lock"></i><span>Roles & Responsibilites</span></a>
                        <div class="submenu-content">
                            
                            
                            <a href="<?php echo base_url() ?>admin/roles/list_roles" class="menu-item  <?= ($uri == 'roles' || $uri == "list_roles" || $uri == "edit_roles" || $uri == "view_roles") ? 'active' : '' ?>"><span class="fa fa-lock  active "></span>&nbsp;&nbsp; Roles List</a>
                            <a href="<?php echo base_url() ?>admin/roles/employees" class="menu-item   <?= ($uri == 'employees' || $uri == "add_employees" || $uri == "edit_employees" || $uri == "view_employee") ? 'active' : '' ?>"><span class="fa fa-users  active"></span>&nbsp;&nbsp;Employees  </a>  
                               
                      
                        </div>
        </div>
                          

                    
                  <div class="nav-lavel">Amount Calculations</div>
                      <div class="nav-item has-sub  active open<?= ($uri == 'all_users' || $uri == "user_bank_details" || $uri == "user_feedback" || $uri == "user_ratings" ) ? 'active open' : '' ?>">
                        <a href="javascript:void(0)"><i class="ik ik-dollar-sign"></i><span>Amount Calculations</span></a>
                        <div class="submenu-content">
                            <a href="" class="menu-item  <?= ($uri == 'all_users' ) ? 'active' : '' ?>"><span class="fa fa-car  active "></span>&nbsp;&nbsp;Taxi Car, Bike & Auto</a>
                            <a href="" class="menu-item  <?= ($uri == 'all_users' ) ? 'active' : '' ?>"><span class="fa fa-car  active "></span>&nbsp;&nbsp; Private Sharing Car & Bike</a>
                        </div>
                    </div>
                    
                    
                 <div class="nav-lavel">Feedbacks & Ratings</div>
                      <div class="nav-item has-sub active open <?= ($uri == 'all_users' || $uri == "user_bank_details" || $uri == "user_feedback" || $uri == "user_ratings" ) ? 'active open' : '' ?>">
                        <a href="javascript:void(0)"><i class="ik ik-package"></i><span> Feedbacks & Ratings</span></a>
                        <div class="submenu-content">
                            <a href="" class="menu-item  <?= ($uri == 'all_users' ) ? 'active' : '' ?>"><span class="fa fa-car  active "></span>&nbsp;&nbsp;Taxi Drivers </a>
                            <a href="" class="menu-item  <?= ($uri == 'all_users' ) ? 'active' : '' ?>"><span class="fa fa-car  active "></span>&nbsp;&nbsp; Passengers</a>
                            <a href="" class="menu-item  <?= ($uri == 'all_users' ) ? 'active' : '' ?>"><span class="fa fa-car  active "></span>&nbsp;&nbsp; Private Drivers</a>
                            <a href="" class="menu-item  <?= ($uri == 'all_users' ) ? 'active' : '' ?>"><span class="fa fa-car  active "></span>&nbsp;&nbsp; Inactive users</a>
                
                        </div>
                    </div>
           <div class="nav-lavel">Others</div>
                      <div class="nav-item has-sub  active open <?= ($uri == 'all_users' || $uri == "user_bank_details" || $uri == "user_feedback" || $uri == "user_ratings" ) ? 'active open' : '' ?>">
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