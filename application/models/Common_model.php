<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model
{
	
	function VenueLoginCheck($LoginData = NULL){
		
		if($LoginData)
		{
			$this->db->where($LoginData);
			$this->db->where(array('Status' => 'ACTIVE'));
			$Admin = $this->db->get('venue_admins');
			
			if($Admin->num_rows() > 0)
				return $Admin->row();
		}
		return false;
	}
	
	function VendorLoginCheck($LoginData = NULL){		
		if($LoginData)
		{
			$this->db->where($LoginData);
			$this->db->where(array('Status' => 'ACTIVE'));
			$Admin = $this->db->get('vendor_admins');
			
			if($Admin->num_rows() > 0)
				return $Admin->row();
		}
		return false;
	}

	function IsVenueExists($Username = NULL, $Phone = NULL){
		
		if($Username){
			$this->db->where("(Email = '$Username' OR Phone = '".($Phone ? $Phone : $Username)."')");
			$Admin = $this->db->get('venue_admins');
			
			if($Admin->num_rows() > 0)
				return $Admin->row();
		}
		return false;
	}
	
	function IsVendorExists($Username = NULL, $Phone = NULL){
		
		if($Username){
			$this->db->where("(Email = '$Username' OR Phone = '".($Phone ? $Phone : $Username)."')");
			$Admin = $this->db->get('vendor_admins');
			
			if($Admin->num_rows() > 0)
				return $Admin->row();
		}
		return false;
	}


	function UpdateVendorAdmin($RecordData = NULL, $RecordID = NULL){
		if($RecordID && $RecordData){
			$this->db->update('vendor_admins', $RecordData, array('VendorAdminID' => $RecordID));
			return true;
		}
		return false;
	}
	function UpdateVenueAdmin($RecordData = NULL, $RecordID = NULL){
		if($RecordID && $RecordData){
			$this->db->update('venue_admins', $RecordData, array('VenueAdminID' => $RecordID));
			return true;
		}
		return false;
	}



	function MyVenues($MemberID = NULL)
	{
		$this->db->order_by('v.VenueID', 'desc');
		$this->db->select('v.*');
		$this->db->where(array('vm.VenueAdminID' => $MemberID, 'v.Status' => 'ACTIVE', 'v.Type' => 'VENUE'));
		$this->db->join('venue_admins '.$this->db->dbprefix('vm'), 'vm.VenueFKID = v.VenueID');
		$Records = $this->db->get('venues '.$this->db->dbprefix('v'));
		if($Records->num_rows() > 0)
			return $Records->result();
		return false;
	}	
	
	function MyBranches($MemberID = NULL){

		$this->db->order_by('v.VenueID', 'desc');
		$this->db->select('v.*');
		$this->db->where(array('vm.VenueAdminFKID' => $MemberID, 'v.Status' => 'ACTIVE', 'v.Type' => 'BRANCH'));
		$this->db->join('venue_admin_venues '.$this->db->dbprefix('vm'), 'vm.VenueFKID = v.VenueID');
		$Records = $this->db->get('venues '.$this->db->dbprefix('v'));
		if($Records->num_rows() > 0)
			return $Records->result();
		return false;
	}	
	
	function MyVenueHalls($VenueID = NULL, $MemberID = NULL){

		$this->db->order_by('v.VenueID', 'desc');
		$this->db->select('v.*');
		$this->db->where(array('v.ParentVenueFKID' => $VenueID, 'v.Status' => 'ACTIVE', 'v.Type' => 'HALL'));
		//$this->db->join('venue_admin_venues '.$this->db->dbprefix('vm'), 'vm.VenueFKID = v.VenueID');
		$Records = $this->db->get('venues '.$this->db->dbprefix('v'));
		//echo $this->db->last_query();
		if($Records->num_rows() > 0)
			return $Records->result();
		return false;
	}

	function CreateRecord($RecordData = NULL){
		if($RecordData)
		{
			$this->db->insert('venues', $RecordData);
			$RecordID = $this->db->insert_id();
			//echo $this->db->last_query();exit;
			$VenueUID = 'VN'.str_pad($RecordData['VenueTypeFKID'], 2, '0', STR_PAD_LEFT).str_pad($RecordID, 5, '0', STR_PAD_LEFT);
			
			$this->db->where(array('VenueID' => $RecordID));
			$this->db->update('venues', array('VenueUID' => $VenueUID));	
			//echo $this->db->last_query();
			return $RecordID;
		}
		return false;
	}

	function CreateVenueAdmin($RecordData = NULL){
		if($RecordData){
			$this->db->insert('venue_admins', $RecordData);
			//echo $this->db->last_query();
			$RecordID = $this->db->insert_id();
			return $RecordID;
		}
		return false;
	}

	function VenueAdminDetails($RecordID = NULL, $Type = NULL)
	{
		if($RecordID && in_array($Type, array('OWNER', 'MANAGER')))
		{
			$this->db->where(array('v.VenueFKID' => $RecordID, 'v.Role' => $Type));
			$Record = $this->db->get('venue_admins '.$this->db->dbprefix('v'));
			if($Record->num_rows() > 0)
				return $Record->row();
		}
		return false;
	}
	
	function RecordDetails($RecordID = NULL){

		if($RecordID){
			$this->db->where(array('v.VenueID' => $RecordID));
			$Record = $this->db->get('venues '.$this->db->dbprefix('v'));
			if($Record->num_rows() > 0)
				return $Record->row();
		}
		return false;
	}

	function UpdateRecord($RecordData = NULL, $RecordID = NULL)
	{
		if($RecordID && $RecordData)
		{

			$this->db->update('venues', $RecordData, array('VenueID' => $RecordID));
			//echo $this->db->last_query();exit;
			return true;
		}		
		return false;
	}

	function SetVenueSpecifications($RecordData = NULL, $RecordID = NULL){
		
		if($RecordID){
			$this->db->where(array('VenueFKID' => $RecordID));
			$Result = $this->db->get('venue_specifications');
			//echo $this->db->last_query();	
			if($Result->num_rows() > 0){
					$this->db->where(array('VenueFKID' => $RecordID));
				$this->db->update('venue_specifications', $RecordData);
				return true;	
			} else {		
				$this->db->insert('venue_specifications', $RecordData);
				return true;
			}
		}
		return false;
	}

	function VenueSpecifications($RecordID = NULL){

		if($RecordID){
			$this->db->where(array('VenueFKID' => $RecordID));
			$Record = $this->db->get('venue_specifications');
			if($Record->num_rows() > 0)
				return $Record->row();
		}
		return false;
	}

	function SaveSeatingStyles($RecordData = NULL, $RecordID = NULL){
		
		if($RecordID){
			$this->db->where(array('VenueFKID' => $RecordID));
			$this->db->delete('venue_seating_styles');		
			if(count($RecordData) > 0){			
				$this->db->insert_batch('venue_seating_styles', $RecordData);
				return true;
			}
		}
		return false;
	}
	
	function SetVenueAccommodations($RecordData = NULL, $RecordID = NULL){
		
		if($RecordID){
			$this->db->where(array('VenueFKID' => $RecordID));
			$this->db->delete('venue_accommodations');		
			if(count($RecordData) > 0){			
				$this->db->insert_batch('venue_accommodations', $RecordData);
				return true;
			}
		}
		return false;
	}

	function VenueSeatingStyles($RecordID = NULL){

		if($RecordID){
			$this->db->where(array('VenueFKID' => $RecordID));
			$Record = $this->db->get('venue_seating_styles');
			if($Record->num_rows() > 0)
				return $Record->result();
		}
		return false;
	}

	function VenueAccommodations($RecordID = NULL){

		if($RecordID){
			$this->db->where(array('VenueFKID' => $RecordID));
			$Record = $this->db->get('venue_accommodations');
			if($Record->num_rows() > 0)
				return $Record->row();
		}
		return false;
	}

	function SetVenueFeatures($RecordData = NULL, $RecordID = NULL){
		
		if($RecordID){
			$this->db->where(array('VenueFKID' => $RecordID));
			$this->db->delete('venue_features');		
			if(count($RecordData) > 0){			
				$this->db->insert_batch('venue_features', $RecordData);
				return true;
			}
		}
		return false;
	}

	function SetVenueSuitableEvents($RecordData = NULL, $RecordID = NULL){
		
		if($RecordID){
			$this->db->where(array('VenueFKID' => $RecordID));
			$this->db->delete('venue_suitable_events');		
			if(count($RecordData) > 0){			
				$this->db->insert_batch('venue_suitable_events', $RecordData);
				return true;
			}
		}
		return false;
	}

	function Features()
	{		
		$this->db->order_by('DisplayOrder', 'asc');
		$this->db->where('Status', 'ACTIVE');
		$this->db->where('ParentFKID', 0);
		$Records = $this->db->get('features');
		if($Records->num_rows() > 0)
		{
			$res = $Records->result_array();
			if($res)
			{
				foreach($res as $row)
				{
					$items = $this->getFeatures($row['FeatureID']);
					$data[] = array('features' => $row['Name'], 'items' => $items);
				}
			}			
			return $data;
		}
		return false;
	}

	function getFeatures($id)
	{		
		$this->db->order_by('DisplayOrder', 'asc');
		$this->db->where('Status', 'ACTIVE');
		$this->db->where('ParentFKID', $id);
		$Records = $this->db->get('features');
		if($Records->num_rows() > 0)
		{
			return $Records->result();					
		}
		return false;
	}

	function SavePricingDetails($RecordData = NULL, $RecordID = NULL){
		
		if($RecordID){
			$this->db->where(array('VenueFKID' => $RecordID));
			$Result = $this->db->get('venue_pricing');		
			if($Result->num_rows() > 0){
				$this->db->where(array('VenueFKID' => $RecordID));
				$this->db->update('venue_pricing', $RecordData);
				return true;	
			} else {		
				$this->db->insert('venue_pricing', $RecordData);
				return true;
			}
		}
		return false;
	}

	function SaveOtherPrices($RecordData = NULL, $RecordID = NULL){
		
		if($RecordID){
			$this->db->where(array('VenueFKID' => $RecordID));
			$this->db->delete('venue_other_pricing');		
			if(count($RecordData) > 0){			
				$this->db->insert_batch('venue_other_pricing', $RecordData);
				return true;
			}
		}
		return false;
	}

	function SaveHourPrices($RecordData = NULL, $RecordID = NULL){
		
		if($RecordID){
			$this->db->where(array('VenueFKID' => $RecordID));
			$this->db->delete('venue_hourly_pricing');		
			if(count($RecordData) > 0){			
				$this->db->insert_batch('venue_hourly_pricing', $RecordData);
				return true;
			}
		}
		return false;
	}

	function SaveCancellationCharges($RecordData = NULL, $RecordID = NULL){
		
		if($RecordID){
			$this->db->where(array('VenueFKID' => $RecordID));
			$this->db->delete('venue_cancellation_charges');		
			if(count($RecordData) > 0){			
				$this->db->insert_batch('venue_cancellation_charges', $RecordData);
				return true;
			}
		}
		return false;
	}

	function SaveBankDetails($RecordData = NULL, $RecordID = NULL){
		
		if($RecordID){
			$this->db->where(array('VenueFKID' => $RecordID));
			$Result = $this->db->get('venue_bank_details');		
			if($Result->num_rows() > 0){
				$this->db->where(array('VenueFKID' => $RecordID));
				$this->db->update('venue_bank_details', $RecordData);
				return true;	
			} else {		
				$this->db->insert('venue_bank_details', $RecordData);
				return true;
			}
		}
		return false;
	}

	function SavePaymentDetails($RecordData = NULL, $RecordID = NULL){
		
		if($RecordID){
			$this->db->where(array('VenueFKID' => $RecordID));
			$Result = $this->db->get('venue_payments');		
			if($Result->num_rows() > 0){
				$this->db->where(array('VenueFKID' => $RecordID));
				$this->db->update('venue_payments', $RecordData);
				return true;	
			} else {		
				$this->db->insert('venue_payments', $RecordData);
				return true;
			}
		}
		return false;
	}

	function booking_calendar($month, $year, $venueId)
	{		
		$data = array();
		$days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
		for($i = 01; $i <= $days; $i++)
		{
			$day = sprintf("%02d", $i);

			$StartDate =  $year."-".$month."-".$day;
			$EndDate =  $year."-".$month."-".$day;
			$StartTime = '00:00:00';
			$EndTime = '23:00:00';

			$date = $year."-".$month."-".$day;
			$week = date("D", strtotime($date));
			$monthName = date("M", strtotime($date));
			$year = date("Y", strtotime($date));		

			$a = 0;
			$o = 0;
			for($j=00; $j<=24; $j++)
			{				
				$StartTime = date('H:i:s', strtotime($StartTime.'+'.$j.' hour'));
				if(IsBookingSlotAvailable($venueId, $StartDate.' '.$StartTime, $EndDate.' '.$EndTime))
				{
					$a++;
	            }
	            else
	            {
	            	$o++;
	            }  	            
            }
            //echo $o;
            if($a == 0)
            {
            	$status = "Occupied";
            }
            elseif($o == 0)
            {
            	$status = "Available";
            }
            else
            {
            	$status = "Partially Available";
            }

            $d[] = array(
            	'day' => date('d', strtotime($date)),
            	'week' => $week,
            	'month' => $monthName,
            	'year' => $year,           	
            	'date' => $date,
            	'status' => $status
            	);			
		}
		//var_dump($data);exit;
		return $d;
	}

	public function checkAvailability($date, $venueId)
	{			
		$this->db->where('VenueFKID', $venueId);
		$this->db->where('DATE_FORMAT(BookingStartDate,"%Y-%m-%d")', $date);
	 	$query1 = $this->db->get('venue_bookings');
		//echo $this->db->last_query();			
		$bookrows = $query1->result_array();
		
		return $time;
	}

	function bookings($VenueID){
		
		$MemberID = MemberID();
			
		$this->db->select(" vb.*, u.Name CustomerName, u.Address CustomerAddress, u.Phone CustomerPhone, u.Email CustomerEmail, va.Name BookedByName, va.Designation BookedByDesignation, va.Phone BookedByPhone, v.VenueName, e.Name EventName ");

		$this->db->order_by('vb.VenueBookingID', 'desc');
		$this->db->where(array('vb.VenueFKID' => $VenueID));
		$this->db->join('users '.$this->db->dbprefix('u'), 'u.UserID = vb.UserFKID');
		$this->db->join('venue_admins '.$this->db->dbprefix('va'), 'va.VenueAdminID = vb.CreatedBy');
		$this->db->join('venues '.$this->db->dbprefix('v'), 'v.VenueID = vb.VenueFKID');
		$this->db->join('event_types '.$this->db->dbprefix('e'), 'e.EventTypeID = vb.EventTypeFKID');
		$Records = $this->db->get('venue_bookings '.$this->db->dbprefix('vb'));
		//echo $this->db->last_query();
		if($Records->num_rows() > 0)
			return $Records->result();
		return false;
	}

	function VenuePricings($RecordID = NULL)
	{
		if($RecordID)
		{
			$this->db->where(array('VenueFKID' => $RecordID));
			$Record = $this->db->get('venue_pricing');
			if($Record->num_rows() > 0)
				return $Record->row();
		}
		return false;
	}

	function VenueEKycs($RecordID = NULL){

		if($RecordID){

			$VenueEKycs = array();

			$this->db->where(array('VenueFKID' => $RecordID));
			$Record = $this->db->get('venue_e_kycs');
			if($Record->num_rows() > 0) foreach ($Record->result() as $Row) {
				$VenueEKycs[$Row->DocumentType] = $Row->DocumentValue;
			}
			return $VenueEKycs;
		}
		return false;
	}

	function VenueEKycDocuments($RecordID = NULL){

		if($RecordID){

			$VenueEKycs = array();

			$this->db->where(array('VenueFKID' => $RecordID));
			$Record = $this->db->get('venue_e_kycs');
			if($Record->num_rows() > 0) foreach ($Record->result() as $Row) {
				$VenueEKycs[$Row->DocumentType] = $Row->DocumentURL;
			}
			return $VenueEKycs;
		}
		return false;
	}

	function VenueTypes()
	{			
		$this->db->order_by('Name', 'asc');
		$this->db->where('Status', 'ACTIVE');
		$Records = $this->db->get('venue_types');
		if($Records->num_rows() > 0)
			return $Records->result();
		return false;
	}

	function VenuePaymentDetails($RecordID = NULL){

		if($RecordID){
			$this->db->where(array('VenueFKID' => $RecordID));
			$Record = $this->db->get('venue_payments');
			if($Record->num_rows() > 0)
				return $Record->row();
		}
		return false;
	}

	function VenueBankDetails($RecordID = NULL){

		if($RecordID){
			$this->db->where(array('VenueFKID' => $RecordID));
			$Record = $this->db->get('venue_bank_details');
			if($Record->num_rows() > 0)
				return $Record->row();
		}
		return false;
	}

	function VenuePackages($RecordID = NULL){

		if($RecordID){
			$this->db->where(array('VenueFKID' => $RecordID));
			$Record = $this->db->get('venue_packages');
			if($Record->num_rows() > 0)
				return $Record->result();
		}
		return array();
	}

	function VenueHourlyPrices($RecordID = NULL){

		if($RecordID){
			$this->db->where(array('VenueFKID' => $RecordID));
			$Record = $this->db->get('venue_hourly_pricing');
			if($Record->num_rows() > 0)
				return $Record->result();
		}
		return false;
	}

	function VenueOtherPrices($RecordID = NULL){

		if($RecordID){
			$this->db->where(array('VenueFKID' => $RecordID));
			$Record = $this->db->get('venue_other_pricing');
			if($Record->num_rows() > 0)
				return $Record->result();
		}
		return false;
	}

	function VenueHourlyPricings($RecordID = NULL){

		if($RecordID){
			$this->db->order_by('HourSlot', 'asc');
			$this->db->where(array('VenueFKID' => $RecordID));
			$Records = $this->db->get('venue_hourly_pricing');
			if($Records->num_rows() > 0)
				return $Records->result();
		}
		return false;
	}

	function VenueEventTypes()
	{					
		$this->db->order_by('Name', 'asc');
		$this->db->where('Status', 'ACTIVE');
		$Records = $this->db->get('event_types');
		if($Records->num_rows() > 0)
			return $Records->result();
		return false;
	}

	function EventDetails($EventID = NULL){
		if($EventID){
			$this->db->where(array('EventTypeID' => $EventID));
			$Record = $this->db->get('event_types');
			if($Record->num_rows() > 0)
				return $Record->row();
		}
		return false;
	}

	function CreateVenuePackage($RecordData = NULL){
		if($RecordData){			

			$this->db->insert('venue_packages', $RecordData);
			$RecordID = $this->db->insert_id();
			return $RecordID;
		}
		return false;
	}

	function UpdateVenuePackage($RecordData = NULL, $RecordID = NULL){
		if($RecordID && $RecordData){
			$this->db->update('venue_packages', $RecordData, array('VenuePackageID' => $RecordID));
			return true;
		}
		return false;
	}

	function DeleteVenuePackage($RecordID = NULL)
	{
		if($RecordID)
		{
			$this->db->delete('venue_packages', array('VenuePackageID' => $RecordID));
			return true;
		}
		return false;
	}

	function CreateUser($RecordData = NULL)
	{
		if($RecordData)
		{		
			$this->db->insert('users', $RecordData);
			//echo $this->db->last_query();exit;
			return $this->db->insert_id();
		}
		return false;	
	}

	function VenueBookingDetails($RecordID = NULL)
	{
		if($RecordID)
		{
			$MemberID = MemberID();

			$this->db->select('vb.*');
			$this->db->where(array('vb.VenueBookingID' => $RecordID));
			$this->db->join('venues '.$this->db->dbprefix('v'), 'v.VenueID = vb.VenueFKID');
			$Record = $this->db->get('venue_bookings '.$this->db->dbprefix('vb'));
			if($Record->num_rows() > 0)
				return $Record->row();
		}
		return false;
	}

	function UpdateUser($RecordData = NULL, $RecordID = NULL)
	{
		if($RecordData && $RecordID)
		{		
			$this->db->update('users', $RecordData, array('UserID' => $RecordID));
			return true;
		}
		return false;
	}

	function BookVenue($RecordData = NULL)
	{
		if($RecordData)
		{		
			$this->db->insert('venue_bookings', $RecordData);
			$BookingID = $this->db->insert_id();
			//echo $this->db->last_query();exit;

			$BookingUID = "VMB".str_pad($BookingID, (6), "0", STR_PAD_LEFT);
			$this->db->update('venue_bookings', array('BookingUID' => $BookingUID), array('VenueBookingID' => $BookingID));			
			return $BookingID;
		}
		return false;
	}

	function AddBookingPayment($RecordData = NULL)
	{
		if($RecordData)
		{		
			$this->db->insert('venue_booking_payments', $RecordData);
			return $this->db->insert_id();
		}
		return false;
	}

	function AddBookingHistory($RecordData = NULL)
	{
		if($RecordData)
		{		
			$this->db->insert('venue_booking_status_history', $RecordData);
			return $this->db->insert_id();
		}
		return false;
	}

	function cancelBooking($RecordID = NULL)
	{
		if($RecordID)
		{		
			$this->db->where('VenueBookingID', $RecordID);
			$this->db->set('Status', 'CANCELLED');
			$this->db->update('venue_bookings');
			//echo $this->db->last_query();exit;
			return true;
		}
		return false;
	}

	function insertBookingPayment($RecordData = NULL)
	{
		if($RecordData)
		{		
			$this->db->insert('venue_booking_payments', $RecordData);
			return $this->db->insert_id();
		}
		return false;
	}

	function updateBooking($RecordID = NULL, $Amount = NULL)
	{
		if($RecordID)
		{		
			$this->db->where('VenueBookingID', $RecordID);
			$this->db->set('NetAmount', 'NetAmount + ' . (int) $Amount, FALSE);
			$this->db->set('DueAmount', 'DueAmount - ' . (int) $Amount, FALSE);
			$this->db->update('venue_bookings');
			//echo $this->db->last_query();exit;

			$this->db->where(array('VenueBookingID' => $RecordID, 'DueAmount' => '0.00'));
			$Record = $this->db->get('venue_bookings');
			if($Record->num_rows() > 0)
			{
				$this->db->where('VenueBookingID', $RecordID);
				$this->db->set('PaymentStatus', 'COMPLETED');
				$this->db->update('venue_bookings');
			}			
			return true;
		}
		return false;
	}

	function cancelledBookings($VenueID){
		
		//$MemberID = MemberID();
			
		$this->db->select(" vb.*, u.Name CustomerName, u.Address CustomerAddress, u.Phone CustomerPhone, u.Email CustomerEmail, va.Name BookedByName, va.Designation BookedByDesignation, va.Phone BookedByPhone, v.VenueName, e.Name EventName ");

		$this->db->order_by('vb.VenueBookingID', 'desc');
		$this->db->where(array('vb.VenueFKID' => $VenueID, 'vb.Status' => 'CANCELLED'));
		$this->db->join('users '.$this->db->dbprefix('u'), 'u.UserID = vb.UserFKID');
		$this->db->join('venue_admins '.$this->db->dbprefix('va'), 'va.VenueAdminID = vb.CreatedBy');
		$this->db->join('venues '.$this->db->dbprefix('v'), 'v.VenueID = vb.VenueFKID');
		$this->db->join('event_types '.$this->db->dbprefix('e'), 'e.EventTypeID = vb.EventTypeFKID');
		$Records = $this->db->get('venue_bookings '.$this->db->dbprefix('vb'));
		//echo $this->db->last_query();
		if($Records->num_rows() > 0)
			return $Records->result();
		return false;
	}

	function reviews($VenueID = NULL)
	{
		if($VenueID)
		{
			$this->db->where(array('VenueID' => $VenueID, 'ParentReviewID' => 0, 'Status' => 'ACTIVE'));
			$Record = $this->db->get('venue_reviews');
			//echo $this->db->last_query();exit;
			if($Record->num_rows() > 0)
			{
				$res = $Record->result_array();				
				foreach($res as $row)
				{
					$VenueReviewID = $row['VenueReviewID'];
					$UserID = $row['UserID'];
					$CreatedOn = $row['CreatedOn'];
					$ParentReviewID = $row['ParentReviewID'];
					$Status = $row['Status'];
					$Message = $row['Message'];
					$IsVenueReply = $row['IsVenueReply'];

					$replies = $this->replies($VenueReviewID);

					$data[] = array('VenueID' => $VenueID, 'VenueReviewID' => $VenueReviewID, 'UserID' => $UserID, 'CreatedOn' => $CreatedOn, 'ParentReviewID' => $ParentReviewID, 'Status' => $Status, 'Message' => $Message, 'IsVenueReply' => $IsVenueReply, 'replies' => $replies);
				}
				return $data;
			}
		}
		return array();
	}

	function replies($VenueReviewID = NULL)
	{
		if($VenueReviewID)
		{
			$this->db->where(array('ParentReviewID' => $VenueReviewID, 'Status' => 'ACTIVE'));
			$Record = $this->db->get('venue_reviews');
			//echo $this->db->last_query();exit;
			if($Record->num_rows() > 0)
			{
				return $Record->result_array();				
			}
		}
		return array();
	}

	function insertReviewRply($RecordData = NULL)
	{
		if($RecordData)
		{		
			$this->db->insert('venue_reviews', $RecordData);
			return $this->db->insert_id();
		}
		return false;
	}


	public function module_name(){
        return $modules_name = array(
            'dashboard' => 'Dashboard',
            'taxi_users'=> 'Taxi Users',
            'sharing_users'=> 'Sharing Users',
            'drivers'=> 'Drivers',
            'vehicle_brands'=> 'Vehicle Brands',
            'vehicle_models'=> 'Vehicle Models',
            'students' => 'Students',
            'student_payments'=>'Student Payments',
            'bulk_students' => 'Bulk Students',
            'overview_details' => 'OVERVIEW Details',
            'available_funds' => 'Available Funds',
            'transfer_funds' => 'Transfer Funds',
            'payment_approvals' => 'Payment Approvals',
           // 'general_students' => 'General Students',
            'all_registered_students' => 'All Registered Students',
            'expenses' => 'Expenses',
            'expense_approval' => 'Expense Approval',
            'categories' => 'Categories',
            'advance_release' => 'Advance Release',
            'states' => 'States',
            'organisations' => 'Organisations',
            'centers' => 'Centers',
            'courses' => 'Courses',
            'batchs' => 'Batchs',
            'attachment_groups' => 'Attachment Groups',
            'attachments' => 'Attachments',
            'payment_modes' => 'Payment Modes',
             'colleges' => 'Colleges',
             'discount_schemes' => 'Discount Schemes',
             'departments' => 'Departments',
             'in_stock' => 'In stock',
             'schedule' => 'Schedule',
             'events' => 'Events',
             'special_attendance' => 'Special Attendance',
             'roles' => 'Roles',
             'employees' => 'Employees',
             );
    }


    public function get_default_responsibilities(){
        $modules = array(
            'dashboard' => array(
                '0' => 'l'
            ),
            'taxi_users' => array(
                '0' => 'l'
            ),

            'sharing_users' => array(
                
                '0' => 'l'
            ),

            'drivers' => array(

                '0' => 'l',
                
            ),
            'vehicle_brands' => array(

                '0' => 'l',
                '1' => 'a',
                '2' => 'e',
                '3' => 'd',
                '4' => 's'
             ),
            'vehicle_models'=>array(
                '0' => 'l',
                '1' => 'a',
                '2' => 'e',
                '3' => 'd',
                '4' => 's'
             ),
            
            
            'students' => array(
                '0' => 'l',
                '1' => 'a',
                '2' => 'e',
                '3' => 'd',
                '4' => 's'
            ),
            'student_payments' => array(
                '0' => 'e',
            ),
            'bulk_students' => array(
                '0' => 'l',
                '1' => 'a',
                '2' => 's',
            ),
            'overview_details' => array(
                '0' => 'l',
               
            ),                        
            'available_funds' => array(
                '0' => 'l',
                              
            ),  
            'transfer_funds' => array(
                '0' => 'l',
            ),

            'payment_approvals'  => array(
                '0' => 'l',
                '1' => 'e',
                '2' => 'd',
                '3' => 's',
                              
            ),            
            /*'general_students' => array(
                '0' => 'l',
                '1' => 'a',
                '2' => 'e',
                '3' => 'd'

            ),*/
            'all_registered_students' => array(
                '0' => 'l',
                '1' => 'a',
                '2' => 'e',
                '3' => 'd'
            ),
            'expenses' => array(
                '0' => 'l',
                '1' => 'a',
                '2' => 'e',
                '3' => 'd',
                '4' => 's'
            ),
            'expense_approval' => array(
                '0' => 'l',
                '1' => 'd',
            ),
            
            'categories' => array(
                '0' => 'l',
                '1' => 'a',
                '2' => 'e',
                '3' => 'd',
                '4' => 's'
            
            ),
            'advance_release' => array(
                '0' => 'l',
                '1' => 'a',
                '2' => 'e',
                '3' => 'd',
                '4' => 's'
            
            ),
            'states' => array(
                '0' => 'l',
                '1' => 'a',
                '2' => 'e',
                '3' => 'd',
                '4' => 's'
            ),
            'organisations' => array(
                '0' => 'l',
                '1' => 'a',
                '2' => 'e',
                '3' => 'd',
                '4' => 's'
            ),
            
            'centers' => array(
                '0' => 'l',
                '1' => 'a',
                '2' => 'e',
                '3' => 'd',
                '4' => 's'
            ),
            'courses' => array(
                '0' => 'l',
                '1' => 'a',
                '2' => 'e',
                '3' => 'd',
                '4' => 's'
            ),

            
            'batchs' => array(
                '0' => 'l',
                '1' => 'a',
                '2' => 'e',
                '3' => 'd',
                '4' => 's'
                
            ),

            'attachment_groups' => array(
                '0' => 'l',
                '1' => 'a',
                '2' => 'e',
                '3' => 'd',
                '4' => 's'
            ),

             'attachments' => array(
                '0' => 'l',
                '1' => 'a',
                '2' => 'e',
                '3' => 'd',
                '4' => 's'
                
            ),

             'payment_modes' => array(
                '0' => 'l',
                '1' => 'a',
                '2' => 'e',
                '3' => 'd',
                '4' => 's'
                
            ),
             'colleges' => array(
                '0' => 'l',
                '1' => 'a',
                '2' => 'e',
                '3' => 'd',
                '4' => 's'
                
            ),
             'discount_schemes' => array(
                '0' => 'l',
                '1' => 'a',
                '2' => 'e',
                '3' => 'd',
                '4' => 's'
                
            ),
             'departments' => array(
               '0' => 'l',
                '1' => 'a',
                '2' => 'e',
                '3' => 'd',
                '4' => 's'
                
            ),
             'in_stock' => array(
                '0' => 'l',
                '1' => 'a',
                '2' => 'e',
                '3' => 'd',
                '4' => 's'
            ),
             'schedule' => array(
                '0' => 'l',
                '1' => 'a',
                '2' => 'e',
                '3' => 'd',
                '4' => 's'
            ),

            'events' => array(
                '0' => 'l',
                '1' => 'a',
                '2' => 'e',
                '3' => 'd',
                '4' => 's'
            ),
            'special_attendance' => array(
                '0' => 'l',
                '1' => 'a',
                '2' => 'e',
                '3' => 'd'
            ),
            'roles' => array(
                '0' => 'l',
                '1' => 'a',
                '2' => 'e',
                '3' => 'd',
                '4' => 's'
            ),
            'employees' => array(
                '0' => 'l',
                '1' => 'a',
                '2' => 'e',
                '3' => 'd',
                '4' => 's'
            ),
            
                
        );
        return $modules;
    }


    public function module_names(){
    $modules = array(
            'Dashboard' => array(
                'l' => 'View'
            ),
            'Taxi Drivers' => array(
                'l' => 'View'
            ),
            'Passengers' => array(
               'l' => 'View'
            ),

            'Private Drivers' => array(
               'l' => 'View'
               
            ),

            'Inactive Users' => array(
               'l' => 'View'
               
            ),

            
            'City Rides' => array(
                
                'l' => 'View',
                
            ),

            'City Bookings' => array(
                'l' => 'View',
            ),
            'City Cancellation' => array(
                'l' => 'View',
                
            ),
            'City Refunds' => array(
                'l' => 'View',              
            ),


            'Taxi Rides' => array(
                'l' => 'View',
            ),
            'Taxi Bookings' => array(
                'l' => 'View',              
            ),
            'Taxi Cancellation'  => array(
                'l' => 'View',
            ), 
			'Taxi Refunds'  => array(
                'l' => 'View',
            ),

            'Sharing Rides'  => array(
                'l' => 'View',
            ),
            'Sharing Bookings'  => array(
                'l' => 'View',
            ),
            'Sharing Cancellation'  => array(
                'l' => 'View',
            ),

            'Sharing Refunds'  => array(
                'l' => 'View',
            ),

           
            'Taxi Driver feedbacks'  => array(
                'l' => 'View',
            ),

            'Passenger feedbacks'  => array(
                'l' => 'View',
            ),

            'Private Driver feedbacks'  => array(
                'l' => 'View',
            ),

            'Inactive User feedbacks'  => array(
                'l' => 'View',
            ),

            'Taxi Calculations'  => array(
                'l' => 'View',
                'a' => 'Add',
                'e' => 'Edit',
                'd' => 'Delete',
                's' => 'Status',
            ),

            'Sharing Calculations'  => array(
                'l' => 'View',
                'a' => 'Add',
                'e' => 'Edit',
                'd' => 'Delete',
                's' => 'Status',
            ),

            'Vehicle Brands' => array(
                'l' => 'View',
                'a' => 'Add',
                'e' => 'Edit',
                'd' => 'Delete',
                's' => 'Status',
            ),
            
            'Vehicle Models' => array(
                'l' => 'View',
	            'a' => 'Add',
	            'e' => 'Edit',
	            'd' => 'Delete',
	            's' => 'Status',
            ),

           'Roles' => array(
                'l' => 'View',
                'a' => 'Add',
                'e' => 'Edit',
                'd' => 'Delete',
                's' => 'Status',
                
            ),
           'Employees' => array(
                'l' => 'View',
                'a' => 'Add',
                'e' => 'Edit',
                'd' => 'Delete',
                's' => 'Status',
                
            ),
            
            'Push Notifications'  => array(
                'l' => 'View',
                'a' => 'Add',
                'e' => 'Edit',
                'd' => 'Delete',
                's' => 'Status',
             ),
            'Emergency Contacts'  => array(
                'l' => 'View',
                'a' => 'Add',
                'e' => 'Edit',
                'd' => 'Delete',
                's' => 'Status',
             ),
            'Admin Chart'  => array(
                'l' => 'View',
                'a' => 'Add',
                'e' => 'Edit',
                'd' => 'Delete',
                's' => 'Status',
             ),
            'Support'  => array(
                'l' => 'View',
                'a' => 'Add',
                'e' => 'Edit',
                'd' => 'Delete',
                's' => 'Status',
             ),

            

           

          

            );

        return $modules; 
}

public function module_methods(){
        return $modules_name = array(
                'l' => 'List',
                'a' => 'Add',
                'e' => 'Edit',
                'd' => 'Delete',
                's' => 'Status'
            );
    }

    public function get_table_row($table_name='', $where='', $columns='', $order_column='', $order_by='asc', $limit=''){

			if(!empty($columns)) {

			$tbl_columns = implode(',', $columns);

			$this->db->select($tbl_columns);

			}

			if(!empty($where)) $this->db->where($where);

			if(!empty($order_column)) $this->db->order_by($order_column, $order_by); 

			if(!empty($limit)) $this->db->limit($limit); 

			$query = $this->db->get($table_name);

			if($columns=='test') { echo $this->db->last_query(); exit; }

			  //echo $this->db->last_query();exit;

			return $query->row_array();

}



 public function get_table($table_name='', $where='', $columns='', $order_column='', $order_by='asc', $limit='', $offset=''){

		if(!empty($columns)) 

		{

		$tbl_columns = implode(',', $columns);

		$this->db->select($tbl_columns);

		}

		if(!empty($where)) $this->db->where($where);

		if(!empty($order_column)) $this->db->order_by($order_column, $order_by); 

		if(!empty($limit) && !empty($offset)) $this->db->limit($limit, $offset); 

		else if(!empty($limit)) $this->db->limit($limit); 

		$query = $this->db->get($table_name);

		//echo $this->db->last_query(); exit;

		//if($columns=='test') { echo $this->db->last_query(); exit; }

		//echo $this->db->last_query();

		return $query->result_array();

}	

public function insert_table($table_name='', $array='', $insert_id ='', $batch=false){

	if(!empty($array) && !empty($table_name)){

	if($batch){

	$this->db->insert_batch($table_name, $array);

	}

	else {$this->db->insert($table_name, $array);}

	//echo $this->db->last_query(); exit;

	//if(!empty($insert_id)) return $this->db->insert_id();

	return $this->db->insert_id();

	}

}

public function update_table($table_name='', $array='', $where='', $test=0)



	{		



		if(!empty($array) && !empty($table_name) && !empty($where))



		{



			$this->db->where($where);



			$result=$this->db->update($table_name, $array);



			



		}

	//	echo $this->db->last_query(); exit;

		return  $result;

		//if($test) echo $this->db->last_query(); exit;



	}		

	

	public function delete_rows($table_name='', $where=''){

		if(!empty($table_name) && !empty($where))

		{

		$this->db->where($where);

		$result=$this->db->delete($table_name);

		}

		return  $result;

		//echo $this->db->last_query(); exit;

		}

		function getDynamicId($column_name,$dynamic_test){

 		$ci = &get_instance();
        /* Reference No */
        $reference_id='';
        $ci->db->select("*");
        $ci->db->from('tbl_dynamic_nos');
        $query = $ci->db->get();
        $row_count = $query->num_rows();
        if($row_count > 0){

            $refers_no = $query->row_array();
            $ref_no=$refers_no[$column_name]+1;
            $refernce_data = array($column_name => $ref_no,
                                   'update_date_time'    => date('Y-m-d H:i:s')
                                   );
            $ci->db->where('id',1);
            $update = $ci->db->update('tbl_dynamic_nos', $refernce_data);
        }else{

            $ref_no=1;
            $refernce_data =   array($column_name => $ref_no,
                                    'update_date_time'   => date('Y-m-d H:i:s')
                                    );
            $update = $ci->db->insert('tbl_dynamic_nos', $refernce_data); 
        }
        
        
        $reference_id =  $dynamic_test.$ref_no;
        
        //$reference_id="BBM".$ref_no;
        /* Reference No */
        return $reference_id;
}


}