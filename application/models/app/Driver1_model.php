<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Driver1_model extends CI_Model {

      public function register_email_verify(){

      	/*$message = "Dear User, Thanks for registering with CIAO Rides. Thank You.";
                  SendSMS($mobile, $message);


                  $salt = "CIAO_SECRET_STUFF";
                  $encrypted_id = base64_encode($user_id . $salt);
                  $message = "
                  <html>
                  <body>
                  Dear User, please click on the below link to verify your email id.<br><br>

                  <a href='https://www.ciaorides.com/verify_email/$encrypted_id'>Click here to verify</a>
                  </body>
                  </html>
                  ";
                  $subject = "Email Verification For CIAO Rides";
                  $this->session->set_tempdata('otp', $rand, 900);
                  //SendSMS($email_id, $message);
                  SendEmail($email_id, $subject, $message);
                  */
      }

      public function previous_booking_data($driver_id){

            $query="select trip_distance,total_amount,ride_time from taxi_orders where rider_id='$driver_id' and payment_status='paid' and status='completed' and driver_status='Started' and rider_payment_status='paid' order by ride_time desc";
            //echo $query;exit;
            $res=$this->db->query($query)->row_array();
            if(!empty($res)){
                  $result=array(
                              'trip_distance'=>$res['trip_distance'],
                              'total_amount'=>$res['total_amount'],
                              'ride_time'=>$res['ride_time'],
                              );
            }else{
                  $result=array(
                              'trip_distance'=>0,
                              'total_amount'=>0,
                              'ride_time'=>00.00,
                              );
            }

        return $result;
      }

      public function total_bookings($driver_id){

            $query="select count(id) as booking_count from taxi_orders where rider_id='$driver_id' and payment_status='paid' and status='completed' and driver_status='Started' and rider_payment_status='paid' order by ride_time desc";
            $res=$this->db->query($query)->row_array();
            return $res['booking_count'];
      }

      public function total_earnings($driver_id){
            
             $query="select SUM(total_amount) as final_amount from taxi_orders where rider_id='$driver_id' and payment_status='paid' and status='completed' and driver_status='Started' and rider_payment_status='paid' order by ride_time desc";
            $res=$this->db->query($query)->row_array();
            return $res['final_amount'];
      }

      public function save_rider_current_lat_lngs($driver_id,$from_lat,$from_lng){

            $insert_array=array(
                                    'rider_id'=>$driver_id,
                                    'lat'=>$from_lat,
                                    'lng'=>$from_lng,
                                    'created_on'=>date('Y-m-d H:i:s')
                               );
            $result=$this->db->insert('rider_current_location', $insert_array);
            return $result;
      }

      public function search_rides($driver_id,$vehicle_type,$sub_vehicle_type,$from_lat,$from_lng){

            /* getting rides from taxi_orders status pending and time ridetime between now to 30 min */
            /* apply filter from, to lat lngs with in the 10 km range get user details from taxi_orders */ 

            $query="select booking_id,user_id,ride_time from taxi_orders where vehicle_type='$vehicle_type' and sub_vehicle_type='$sub_vehicle_type' and status='pending' and driver_status='Not Started' ";
            $orders=$this->db->query($query)->result_array();

            return $orders;

      }

}?>