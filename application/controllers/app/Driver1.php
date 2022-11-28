<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require APPPATH . 'libraries/RESTful/REST_Controller.php';

class Driver1 extends REST_Controller {


	protected $client_request = NULL;

    function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
        error_reporting(0);
        set_time_limit(0);
        ini_set('memory_limit', '-1');

        $this->load->helper('app/ws_helper');
        $this->load->model('app/ws_model');
        $this->load->model('app/driver1_model');
        $this->load->model('email_model');
        $this->load->helper('app/jwt_helper');

        $this->load->library('MathUtil');
        $this->load->library('PolyUtil');
        $this->load->library('SphericalUtil');

        $this->client_request = new stdClass();
        $this->client_request = json_decode(file_get_contents('php://input', true));
        $this->client_request = json_decode(json_encode($this->client_request), true);
    }


    /*
     *  Driver Register Using Mobile Number
     */

    function driver_register_post() {
        $response = array('status' => false, 'message' => '');
        $user_input = $this->client_request;
        extract($user_input);

        $required_params = array('mobile' => 'Mobile');
        foreach ($required_params as $key => $value) {
            if (!$user_input[$key]) {
                $response = array('status' => false, 'message' => $value . ' is required');
                TrackResponse($user_input, $response);
                $this->response($response);
            }
        }
        
        // $user_details = check_user_email_id_exists($email_id);
        // if(!empty($user_details))
        // {
        //  $response = array('status' => false, 'message' => 'This Email ID is already registered!');
        //  TrackResponse($user_input, $response);
        //  $this->response($response);
        // }
        $user_details = get_table_row('users', array('mobile' => $mobile,'user_type'=>'driver', 'delete_status' => 1),array('id'));
        
    if (!empty($user_details)) {
        $otp = mt_rand(1000, 9999);
        //$message = "Dear User, $otp is One time password (OTP) for CIAO Rides. Thank You.";
        $message = 'Dear Customer ' . $otp . ' is your One Time Password for CIAO Rides. Thank You.';
        SendSMS($mobile, $message);
        $response = array('status' => true, 'message' => 'Registered user','otp'=>$otp,'response'=>$user_details);
        TrackResponse($user_input, $response);
        $this->response($response);
    }
    if ($otp_confirmed == "No") {
        $otp = mt_rand(1000, 9999);
        //$message = "Dear User, $otp is One time password (OTP) for CIAO Rides. Thank You.";
       $message = 'Dear Customer ' . $otp . ' is your One Time Password for CIAO Rides. Thank You.';
        SendSMS($mobile, $message);
        $response = array('status' => true, 'message' => 'Otp sent successfully!', 'otp'=>$otp,'response' => new stdClass());
        TrackResponse($user_input, $response);
        $this->response($response);
        exit;
    }
        //'lattitude' => $lat,'longitude' => $long,
        $data = array(
            'mobile' => $mobile,
            'lattitude' => $lat,
            'longitude' => $long,
            'mobile_verified' => 'yes',
            'user_type' => 'driver',
            'status' => 1,
            'created_on' => date('Y-m-d H:i:s')
        );
        $user_id = insert_table('users', $data);

        $dy_user_id=str_pad($user_id, 6, '0', STR_PAD_LEFT);
        //echo $dy_user_id;exit;
        $new_dy_user_id='CIAO-'.$dy_user_id;
        //echo $new_dy_user_id;exit;
        $update_user=array('userid'=>$new_dy_user_id);
        $this->db->update('users',$update_user,array('id'=>$user_id));

        $users = get_table_row('users', array('id' => $user_id));
        if (empty($users)) {
            $response = array('status' => false, 'message' => 'User Registration Failed!', 'response' => new stdClass());
        } else {
            
            //$this->driver1_model->register_email_verify();

            $response = array('status' => true, 'message' => 'User Registration Successful!', 'response' => $users);
        }
        TrackResponse($user_input, $response);
        $this->response($response);
    }

    public function resend_otp_post(){

        $response = array('status' => false, 'message' => '');
        $user_input = $this->client_request;
        extract($user_input);

        $required_params = array('mobile' => 'Mobile');
        foreach ($required_params as $key => $value) {
            if (!$user_input[$key]) {
                $response = array('status' => false, 'message' => $value . ' is required');
                TrackResponse($user_input, $response);
                $this->response($response);
            }
        }

        $otp = mt_rand(1000, 9999);
        //$message = "Dear User, $otp is One time password (OTP) for CIAO Rides. Thank You.";
        $message = 'Dear Customer ' . $otp . ' is your One Time Password for CIAO Rides. Thank You.';
        SendSMS($mobile, $message);
        $response = array('status' => true, 'message' => 'Otp sent successfully!', 'otp'=>$otp,'response' => new stdClass());
        TrackResponse($user_input, $response);
        $this->response($response);

    } 

    /* driver home page data */

     public function home_page_data_post(){


        $response = array('status' => false, 'message' => '');
        $user_input = $this->client_request;
        extract($user_input);

        $required_params = array('driver_id' => 'Drier Id');
        foreach ($required_params as $key => $value) {
            if (!$user_input[$key]) {
                $response = array('status' => false, 'message' => $value . ' is required');
                TrackResponse($user_input, $response);
                $this->response($response);
            }
        }

        $previous_booking_data=$this->driver1_model->previous_booking_data($driver_id);
        $total_bookings=$this->driver1_model->total_bookings($driver_id);
        $total_earnings=$this->driver1_model->total_earnings($driver_id);

        $result=array(
                        'previous_booking_data'=>$previous_booking_data,
                        'total_bookings'=>$total_bookings,
                        'total_earnings'=>$total_earnings
                     );

        $response = array('status' => true, 'message' => 'Data Fetched successfully!','response' => $result);
        TrackResponse($user_input, $response);
        $this->response($response);
     }


     /* Search rides */

     public function search_rides_post(){


        $response = array('status' => false, 'message' => '');
        $user_input = $this->client_request;
        extract($user_input);

        $required_params = array('driver_id' => 'Drier Id','from_lat'=> 'From lat','from_lng'=>'From lng','vehicle_type'=>'vehicle type','sub_vehicle_type'=>'sub vehicle type');
        foreach ($required_params as $key => $value) {
            if (!$user_input[$key]) {
                $response = array('status' => false, 'message' => $value . ' is required');
                TrackResponse($user_input, $response);
                $this->response($response);
            }
        }

        $save=$this->driver1_model->save_rider_current_lat_lngs($driver_id,$from_lat,$from_lng);

        $result=$this->driver1_model->search_rides($driver_id,$vehicle_type,$sub_vehicle_type,$from_lat,$from_lng);

        $response = array('status' => true, 'message' => 'Data Fetched successfully!','response' => $result);
        TrackResponse($user_input, $response);
        $this->response($response);

    }




}



?>