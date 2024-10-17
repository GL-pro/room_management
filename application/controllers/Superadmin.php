<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Superadmin extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->library('session');
	    $this->load->helper('url'); 
        $this->load->model('HomeModel');
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
		if (!$user_id || $user_type !== 'staff') {
			$this->session->set_flashdata('error', 'Unauthorized access. Please login.');
			redirect('unauthorized');
		}
    }
	public function dashboard()
	{
        $data['menu']='dashboard';
        $data['pagetitle']='DashBoard';

		// Update room statuses to "availale" after datesof the rooms
		$this->HomeModel->updateRoomStatus();


		$data['room_types'] = $this->HomeModel->getRoomTypes();
		$data['hotel_rooms'] = $this->HomeModel->getHotelRoom();
		// $data['room_data'] = $this->HomeModel->getRoomTypesWithRoomsGroupedByType();
		//$data['room_data1'] = $this->HomeModel->getRoomTypesWithRoomsGroupedByType1();
		$data['room_data2'] = $this->HomeModel->getRoomTypesWithRoomsGroupedByType11();
		//var_dump($data['room_data2']);die;
		$this->load->view('webapp/superadmin/include/header',$data);
		$this->load->view('webapp/superadmin/dashboard/dashboard', $data);
		$this->load->view('webapp/superadmin/include/footer');
	
}


	
		// public function getBookingsForDateRange() {
		// 	date_default_timezone_set('Asia/Kolkata');
		// 	// Adjust these dates as needed
		// 	$start_date = date('Y-m-d'); // Start from today
		// 	$end_date = date('Y-m-d', strtotime('+12 month')); // End one month later
		// 	$bookings = $this->HomeModel->getBookingsByDateRange($start_date, $end_date);
		// 	echo json_encode($bookings);
		// }
		
		public function getBookingsForDateRange() {
			date_default_timezone_set('Asia/Kolkata');
			$start_date = date('Y-m-d');
			$end_date = date('Y-m-d', strtotime('+12 month'));
			
			$bookings = $this->HomeModel->getBookingCountsByDateRange($start_date, $end_date);
			$occupied = $this->HomeModel->getOccupiedCountsByDateRange($start_date, $end_date);
		
			$combined = array_merge($bookings, $occupied);
			
			echo json_encode($combined);
		}
		
	public function room_enquiry() {
		$data['menu'] = 'room_enquiry';
		$data['pagetitle'] = 'Room Enquiry';
		$data['agencies'] = $this->HomeModel->getAgents();
		$data['customers'] = $this->HomeModel->getCustomers(); // Fetch customers
	
		$selected_rooms = $this->input->post('selected_rooms');
		if (!empty($selected_rooms)) {
			$room_ids = explode(',', $selected_rooms);
		} else {
			$room_ids = [];
		}
		$data['room_ids'] = $room_ids;


		// Fetch room details based on hotel_roomids
		$room_details = [];
		foreach ($room_ids as $room_id) {
			$room_info = $this->HomeModel->getRoomDetails($room_id);
			if ($room_info) {
				$room_details[] = $room_info;
			}
		}
		$data['room_details'] = $room_details;


		//var_dump($data['room_details']);die;
		$this->load->view('webapp/superadmin/include/header', $data);
		$this->load->view('webapp/superadmin/dashboard/room_enquiry', $data);
		$this->load->view('webapp/superadmin/include/footer');
	}

	// public function booked_enquiry() {
	// 	$data['menu'] = 'booked_enquiry';
	// 	$data['pagetitle'] = 'Booked Enquiry';

	// 	$data['agencies'] = $this->HomeModel->getAgents();
	// 	$data['customers'] = $this->HomeModel->getCustomers(); // Fetch customers

	// 	// Retrieve booking_id from query parameters from booking list page
	// 	 $booking_id = $this->input->get('booking_id');
	// 	// Fetch booking details if a booking ID is provided
	// 	if (!empty($booking_id)) {
	// 		$data['booking_details'] = $this->HomeModel->getBookingDetailsById($booking_id);
	// 		//$data['booking_details'] = $booking_details;
	// 		// Ensure the booking details contain check-in and check-out data
	// 	if (!empty($booking_details)) {
	// 		foreach ($booking_details as &$detail) {
	// 			// Assuming 'checkin_date' and 'checkout_date' are the column names
	// 			$detail['checkin_date'] = isset($detail['checkin_date']) ? $detail['checkin_date'] : '';
	// 			$detail['checkout_date'] = isset($detail['checkout_date']) ? $detail['checkout_date'] : '';
	// 		}
	// 	}
	// //	$data['booking_details'] = $booking_details;


	// 	} else {
	// 		$data['booking_details'] = []; // Default to an empty array if no booking ID
	// 	}

	// 	// $data['guests'] = array_filter($data['booking_details'], function($item) {
	// 	// 	return isset($item['guest_name']); // Filter to get only guest details
	// 	// });
		
	// 	// $selected_rooms = $this->input->post('selected_rooms');
	// 	// if (!empty($selected_rooms)) {
	// 	// 	$room_ids = explode(',', $selected_rooms);
	// 	// } else {
	// 	// 	$room_ids = [];
	// 	// }
	// 	// $data['room_ids'] = $room_ids;

	// 	//   // Fetch booking details if a room ID is provided
	// 	// //  $room_ids = $this->input->post('room_id'); // Assuming you're sending room IDs via a POST request
	// 	//   if (!empty($room_ids)) {
	// 	// 	  $data['booking_details'] = $this->HomeModel->getBookingDetails($room_ids);
	// 	//   } else {
	// 	// 	  $data['booking_details'] = []; // Default to an empty array if no room IDs
	// 	//   }
	  
	// 	//var_dump($data['booking_details']);die;
	// 	$this->load->view('webapp/superadmin/include/header', $data);
	// 	$this->load->view('webapp/superadmin/dashboard/booked_enquiry', $data);
	// 	$this->load->view('webapp/superadmin/include/footer');
	// }


	public function booked_enquiry() {
		$data['menu'] = 'booked_enquiry';
		$data['pagetitle'] = 'Booked Enquiry';
		
		$data['agencies'] = $this->HomeModel->getAgents();
		$data['customers'] = $this->HomeModel->getCustomers();  // Fetch customers
		
		// Retrieve booking_id from query parameters
		$booking_id = $this->input->get('booking_id');
		
		if (!empty($booking_id)) {
			$booking_details = $this->HomeModel->getBookingDetailsById($booking_id);
			
			if (!empty($booking_details)) {
				foreach ($booking_details as &$detail) {
					// Ensure that check-in and check-out dates are properly set
					$detail['checkin_date'] = isset($detail['checkin']) ? date('d/m/Y', strtotime($detail['checkin'])) : '';
					$detail['checkout_date'] = isset($detail['checkout']) ? date('d/m/Y', strtotime($detail['checkout'])) : '';
					
					// get guest details if available
					if (!empty($detail['guest_name'])) {
						$detail['guests'][] = [
							'guest_name' => $detail['guest_name'],
							'age' => $detail['age'],
							'phone' => $detail['phone'],
							'id_proof' => $detail['id_proof']
						];
					}

					 // Fetch room details based on hotel_roomid
					 $room_details = $this->HomeModel->getRoomDetails($detail['hotel_roomid']);
					 $detail['room_details'] = $room_details;
					 // Fetch items associated with the room
					 $room_items = $this->HomeModel->getItemsByBookingIdAndRoomId($booking_id, $detail['hotel_roomid']);
					 $detail['items'] = $room_items;

						$data['itemss'] = $this->HomeModel->getItemsWithCategories();


				}
			}
	
			$data['booking_details'] = $booking_details;
		} else {
			$data['booking_details'] = [];  // Default to an empty array if no booking ID
		}
	
		$this->load->view('webapp/superadmin/include/header', $data);
		$this->load->view('webapp/superadmin/dashboard/booked_enquiry', $data);
		$this->load->view('webapp/superadmin/include/footer');
	}


	
	public function occupied_enquiry() {
		$data['menu'] = 'occupied_enquiry';
		$data['pagetitle'] = 'Booked Enquiry';
		 
		$data['agencies'] = $this->HomeModel->getAgents();
		$data['customers'] = $this->HomeModel->getCustomers();  // Fetch customers

		// Retrieve booking_id from query parameters
		$booking_id = $this->input->get('booking_id');
		if (!empty($booking_id)) {
			$booking_details = $this->HomeModel->getBookingDetailsById($booking_id);
			if (!empty($booking_details)) {
				foreach ($booking_details as &$detail) {
					// Ensure that check-in and check-out dates are properly set
					$detail['checkin_date'] = isset($detail['checkin']) ? date('d/m/Y', strtotime($detail['checkin'])) : '';
					$detail['checkout_date'] = isset($detail['checkout']) ? date('d/m/Y', strtotime($detail['checkout'])) : '';
					// get guest details if available
					if (!empty($detail['guest_name'])) {
						$detail['guests'][] = [
							'guest_name' => $detail['guest_name'],
							'age' => $detail['age'],
							'phone' => $detail['phone'],
							'id_proof' => $detail['id_proof']
						];
					}
			 // Fetch room details based on hotel_roomid
			 $room_details = $this->HomeModel->getRoomDetails($detail['hotel_roomid']);
			 $detail['room_details'] = $room_details;
			 // Fetch items associated with the room
			 $room_items = $this->HomeModel->getItemsByBookingIdAndRoomId($booking_id, $detail['hotel_roomid']);
			 $detail['items'] = $room_items;
				$data['itemss'] = $this->HomeModel->getItemsWithCategories();
		}
	}
	$data['booking_details'] = $booking_details;
} else {
	$data['booking_details'] = [];  // Default to an empty array if no booking ID
}

		//var_dump($data['room_details']);die;
		$this->load->view('webapp/superadmin/include/header', $data);
		$this->load->view('webapp/superadmin/dashboard/occupied_enquiry', $data);
		$this->load->view('webapp/superadmin/include/footer');
	}

	
	public function room_enquiry1() {
		$data['menu'] = 'room_enquiry';
		$data['pagetitle'] = 'Room Enquiry';
		$data['agencies'] = $this->HomeModel->getAgents();
		$data['customers'] = $this->HomeModel->getCustomers(); // Fetch customers
	
		$selected_rooms = $this->input->post('selected_rooms');
		if (!empty($selected_rooms)) {
			$room_ids = explode(',', $selected_rooms);
		} else {
			$room_ids = [];
		}
		$data['room_ids'] = $room_ids;

		// Fetch room details based on hotel_roomids
		$room_details = [];
		foreach ($room_ids as $room_id) {
			$room_info = $this->HomeModel->getRoomDetails($room_id);
			if ($room_info) {
				$room_details[] = $room_info;
			}
		}
		$data['room_details'] = $room_details;
		$data['items'] = $this->HomeModel->getItemsWithCategories();

		$this->load->view('webapp/superadmin/include/header', $data);
		$this->load->view('webapp/superadmin/dashboard/room_enquiry1', $data);
		$this->load->view('webapp/superadmin/include/footer');
	}

	
    public function logout() {
        $this->session->unset_userdata('logged_in'); 
        $this->session->sess_destroy(); 
        redirect('login');
    }

	public function  hotel_room_add_staff()
	{
	$data['menu']='hotel_room_add_staff';
	$data['pagetitle']='DashBoard';
	$data['roomtype'] = $this->HomeModel->getroomtype();
	$this->load->library('session');
	$data['facilities'] = $this->HomeModel->get_facilitiesadmin();
	$data['allfacilities'] = $this->HomeModel->get_facilities_and_subfacilities1();
	$this->load->view('webapp/superadmin/include/header',$data);
	$this->load->view('webapp/superadmin/room/hotel_room_add_staff');
	$this->load->view('webapp/superadmin/include/footer');
	}   
	public function  hotel_added_rooms_staff()
	{
		$data['menu']='hotel_added_rooms_staff';
		$data['pagetitle']='DashBoard';
		$this->load->library('session');
		$data['rooms'] = $this->HomeModel->get_rooms();
		$this->load->view('webapp/superadmin/include/header',$data);
		$this->load->view('webapp/superadmin/room/hotel_added_rooms_staff',$data);
		$this->load->view('webapp/superadmin/include/footer');
	}   


	public function item_creation()
	{
        $data['menu']='item_creation';
        $data['pagetitle']='DashBoard';
		$data['categories'] = $this->HomeModel->getCategories();
		$data['subcategories'] = $this->HomeModel->getsubCategories();
		$this->load->view('webapp/superadmin/include/header',$data);
		$this->load->view('webapp/superadmin/item/item_creation');
		$this->load->view('webapp/superadmin/include/footer');
	} 
	public function item_reg() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$status = $this->input->post('status');
			$roomtypename = $this->input->post('roomtypename');
			$price1 = $this->input->post('price1');
			$price2 = $this->input->post('price2');
			$tax = $this->input->post('tax');
			$description = $this->input->post('description');
			$availability = $this->input->post('availability');
			$category_id = $this->input->post('category_id');
			$subcategory_id = $this->input->post('subcategory_id');
			$imageFileName = '';
			if (!empty($_FILES['roomtype_image']['name'])) {
				$config['upload_path'] = './upload/item_images/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = 2048; // 2MB max size (you can adjust as needed)
				$config['file_name'] = uniqid(); // Unique file name
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('roomtype_image')) {
					$uploadData = $this->upload->data();
					$imageFileName = $uploadData['file_name'];
				} else {
					$error = $this->upload->display_errors();
					redirect('item_creation', 'refresh');
				}
			}
			date_default_timezone_set('Asia/Kolkata');
			$adding_date = date('Y-m-d H:i:s');
			$data = array(
				'item_name' => $roomtypename,
				'price1' => $price1,
				'price2' => $price2,
				'tax' => $tax,
				'description' => $description,
				'availability' => $availability,
				'category_id' => $category_id,
				'subcategory_id' => $subcategory_id,
				'date' => $adding_date,
				'adminstatus' => 'staff',
				'approvestatus' => 'Approved',
				'status' => $status,
				'item_image' => $imageFileName // Assign image file name
			);
			$this->db->insert('item', $data);
			redirect('all_item', 'refresh');
		} else {
			redirect('all_item', 'refresh');
		}
	}
	public function item_edit($item_id)
	{
		$data['roomid'] = $item_id; 
		$data['items'] = $this->HomeModel->items($item_id);
		$data['categories'] = $this->HomeModel->getCategories();
		$data['subcategories'] = $this->HomeModel->getsubCategories();
        $data['menu']='item_edit';
        $data['pagetitle']='DashBoard';
		$this->load->view('webapp/superadmin/include/header',$data);
		$this->load->view('webapp/superadmin/item/item_edit',$data);
		$this->load->view('webapp/superadmin/include/footer');
	}  
	// public function itemupdate() {
	// 	$roomid = $this->input->post('item_id');
	// 	$roomtype = $this->input->post('roomtypename');
	// 	$status = $this->input->post('status');
	// 	$existing_type_image = $this->input->post('existing_type_image');
	// 	$roomtype_image = $existing_type_image; // Default to existing image
	// 	if (!empty($_FILES['roomtype_image']['name'])) {
	// 		$config['upload_path'] = './upload/item_images/';
	// 		$config['allowed_types'] = 'jpg|jpeg|png';
	// 		$config['max_size'] = 2048; // 2MB
	// 		$config['encrypt_name'] = TRUE;
	// 		$this->load->library('upload', $config);
	// 		if ($this->upload->do_upload('roomtype_image')) {
	// 			$upload_data = $this->upload->data();
	// 			$roomtype_image = $upload_data['file_name'];
	// 			// Delete old image file if a new image is uploaded
	// 			if ($existing_type_image && file_exists('./upload/item_images/' . $existing_type_image)) {
	// 				unlink('./upload/item_images/' . $existing_type_image);
	// 			}
	// 		} else {
	// 			$error = $this->upload->display_errors();
	// 			echo json_encode(['error' => $error]);
	// 			return;
	// 		}
	// 	}
	// 	$this->HomeModel->updateItem($roomid, $roomtype, $status, $roomtype_image);
	// 	redirect('all_item', 'refresh');
	// }



	public function itemupdate() {
		// Fetch form data
		$roomid = $this->input->post('item_id');
		$roomtype = $this->input->post('roomtypename');
		$category_id = $this->input->post('category_id');
		$subcategory_id = $this->input->post('subcategory_id');
		$price1 = $this->input->post('price1');
		$price2 = $this->input->post('price2');
		$tax = $this->input->post('tax');
		$description = $this->input->post('description');
		$availability = $this->input->post('availability');
		$status = $this->input->post('status');
		$existing_type_image = $this->input->post('existing_type_image');
		$roomtype_image = $existing_type_image; // Default to existing image
	
		// Check if a new image has been uploaded
		if (!empty($_FILES['roomtype_image']['name'])) {
			$config['upload_path'] = './upload/item_images/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = 2048; // 2MB
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
	
			if ($this->upload->do_upload('roomtype_image')) {
				$upload_data = $this->upload->data();
				$roomtype_image = $upload_data['file_name'];
	
				// Delete the old image if a new image is uploaded
				if ($existing_type_image && file_exists('./upload/item_images/' . $existing_type_image)) {
					unlink('./upload/item_images/' . $existing_type_image);
				}
			} else {
				// Handle upload errors
				$error = $this->upload->display_errors();
				echo json_encode(['error' => $error]);
				return;
			}
		}
	
		// Update the item in the database
		$this->HomeModel->updateItem($roomid, $roomtype, $category_id, $subcategory_id, $price1, $price2, $tax, $description, $availability, $status, $roomtype_image);
	
		// Redirect to the item list page
		redirect('all_item', 'refresh');
	}
	
	public function all_item()
	{
        $data['menu']='all_item';
        $data['pagetitle']='DashBoard';
		$data['items'] = $this->HomeModel->get_items();
		$this->load->view('webapp/superadmin/include/header',$data);
		$this->load->view('webapp/superadmin/item/all_item');
		$this->load->view('webapp/superadmin/include/footer');
	} 

	public function room_type_reg1_staff() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $roomType = $this->input->post('roomtype');
            if (empty($roomType)) {
                echo 'Room Type cannot be empty';
                return;
            }
			date_default_timezone_set('Asia/Kolkata');
			$adding_date=date('Y-m-d H:i:s');
            $data = array(
				'roomtype' => $roomType,
				'date' =>$adding_date,
				'adminstatus' => 'staff',
				'approvestatus' => 'Approved',
				'status' => '1'
            );
            $this->db->insert('admin_room', $data);
            if ($this->db->affected_rows() > 0) {
                echo 'Room type added successfully';
            } else {
                echo 'Failed to add room type';
            }
        } else {
            echo 'Invalid request method';
        }
    }

	public function insert_hotel_room_staff() {
		$this->load->library('session');
		$roomno = $this->input->post('roomno');
		$roomname = $this->input->post('roomname');
		$roomTypes = $this->input->post('roomtype');
		$normalPrices = $this->input->post('nprice');
		$discountPrices = $this->input->post('dprice');
		$noOfGuests = $this->input->post('noofguests');
		$extguests = $this->input->post('extguests');
		$description = $this->input->post('description');
		$imageFileNames = array();
		for ($i = 1; $i <= 5; $i++) {
			if (!empty($_FILES['extimage' . $i]['name'])) {
				$config['upload_path'] = './upload/room_images/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = 0;
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('extimage' . $i)) {
					$uploadData = $this->upload->data();
					$imageFileNames['extimage' . $i] = $uploadData['file_name'];
				} else {
					$error = $this->upload->display_errors();
					redirect('hotel_room_add_staff');
				}
			}
		}
		date_default_timezone_set('Asia/Kolkata');
		$current_date_time = date('Y-m-d H:i:s');
		for ($i = 0; $i < count($roomTypes); $i++) {
			$roomData = array(
				'roomno' => $roomno,
				'room_name' => $roomname,
				'date' => $current_date_time,
				'status' => '1',
				'admintype' => 'staff',
				'roomtypeid' => $roomTypes[$i],
				'normalprice' => $normalPrices,
				'discountprice' => $discountPrices,
				'noofguests' => $noOfGuests,
				'extguests' => $extguests,
				'description'=> $description,
				'room_status'=> 'vaccant',
				'image' => implode(', ', $imageFileNames),
				'image1' => isset($imageFileNames['extimage1']) ? $imageFileNames['extimage1'] : '',
				'image2' => isset($imageFileNames['extimage2']) ? $imageFileNames['extimage2'] : '',
				'image3' => isset($imageFileNames['extimage3']) ? $imageFileNames['extimage3'] : '',
				'image4' => isset($imageFileNames['extimage4']) ? $imageFileNames['extimage4'] : '',
				'image5' => isset($imageFileNames['extimage5']) ? $imageFileNames['extimage5'] : ''
			);
			$this->HomeModel->insert_room($roomData);
			$insertedRoomID = $this->db->insert_id();
			$selectedFacilities = $this->input->post('selected_facilities');
			$selectedSubfacilities = $this->input->post('selected_subfacilities');
			if (!empty($selectedFacilities)) {
				foreach ($selectedFacilities as $facilityId) {
					$this->HomeModel->insert_hotel_room_facility($insertedRoomID, $facilityId);
				}
			}
			if (!empty($selectedSubfacilities)) {
				foreach ($selectedSubfacilities as $facilityId => $subfacilityIds) {
					foreach ($subfacilityIds as $subfacilityId) {
						$this->HomeModel->insert_hotel_room_subfacility($insertedRoomID, $subfacilityId, $facilityId);
					}
				}
			}
			echo '<script>alert("Room inserted successfully")</script>';
			redirect('hotel_added_rooms_staff', 'refresh');
			console.log("Redirecting to hotel_added_rooms page...");
		}
	}
	public function hotel_room_edit_staff($hotel_roomid) {
		$data['menu'] = 'hotel_room_edit_staff';
		$data['pagetitle'] = 'DashBoard';
		$data['roomtype'] = $this->HomeModel->getroomtype();
		$data['rooms'] = $this->HomeModel->get_roomsbyroomid($hotel_roomid);
		$data['room_images'] = $this->HomeModel->get_roomimages($hotel_roomid);
		$data['facilities'] = $this->HomeModel->get_facilitiesadmin();
		$data['allfacilities'] = $this->HomeModel->get_facilities_and_subfacilities1();
		$this->load->view('webapp/superadmin/include/header', $data);
		$this->load->view('webapp/superadmin/room/hotel_room_edit_staff', $data);
		$this->load->view('webapp/superadmin/include/footer');
	}

	public function update_subfacility_status111_staff() {
		$subfacilityId = $this->input->post('subfacilityId');
		$facilityId = $this->input->post('facilityId');
		$hotelRoomId = $this->input->post('hotelRoomId');
		$isChecked = $this->input->post('isChecked');
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d H:i:s');
		if ($isChecked) {
			$this->db->insert('hotel_room_facility', [
				'subfacilityid' => $subfacilityId,
				'facilityid' => $facilityId,
				'hotel_roomid' => $hotelRoomId,
				'date' => $date,
				'status' => 1
			]);
		} else {
			$this->db->delete('hotel_room_facility', [
				'subfacilityid' => $subfacilityId,
				'facilityid' => $facilityId,
				'hotel_roomid' => $hotelRoomId,
			]);
		}
		echo json_encode(['success' => true]);
	}

	public function update_room_fields111_staff() {
		$roomno = $this->input->post('roomno');
		$roomName = $this->input->post('roomName');
		$roomType = $this->input->post('roomType');
		$noOfGuests = $this->input->post('noofguests');
		$extguests = $this->input->post('extguests');
		$normalPrice = $this->input->post('normalPrice');
		$discountPrice = $this->input->post('discountPrice');
		$hotelRoomId = $this->input->post('hotelRoomId');
		$description = $this->input->post('description');
		$imageFileNames = array();
		for ($i = 1; $i <= 5; $i++) {
			if (isset($_FILES['extimage' . $i]) && !empty($_FILES['extimage' . $i]['name'])) {
				$imageFileName = $this->upload_image('extimage' . $i); // Function to handle the upload
				$imageFileNames['image' . $i] = $imageFileName;
			}
		}
		$data = array(
			'roomno' => $roomno,
			'room_name' => $roomName,
			'roomtypeid' => $roomType,
			'noofguests' => $noOfGuests,
			'extguests' => $extguests,
			'normalprice' => $normalPrice, 
			'discountprice' => $discountPrice,
			'description' => $description,
			'room_status'=> 'vaccant',
			'admintype'=> 'admin',
		    );
		foreach ($imageFileNames as $fieldName => $fileName) {
			$data[$fieldName] = $fileName;
		}
		$this->HomeModel->update_room_fields111($hotelRoomId, $data);
		echo json_encode(array('success' => true, 'message' => 'Room details updated successfully!'));
	}

	private function upload_image($fieldName) {
        $config['upload_path'] = './upload/room_images/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 50000;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload($fieldName)) {
            $uploadData = $this->upload->data();
            return $uploadData['file_name']; 
        } else {
            return ''; 
        }
    }
	//category
	public function category_creation()
	{
		$data['menu']='category_creation';
		$data['pagetitle']='DashBoard';
		$this->load->view('webapp/Superadmin/include/header',$data);
		$this->load->view('webapp/Superadmin/category/category_creation');
		$this->load->view('webapp/Superadmin/include/footer');
	} 
	public function category_reg() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$status=$this->input->post('status');
			$roomtypename = $this->input->post('roomtypename');
			$imageFileName = ''; // Initialize empty image file name
			if (!empty($_FILES['roomtype_image']['name'])) {
				$config['upload_path'] = './upload/category_images/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = 2048; // 2MB max size (you can adjust as needed)
				$config['file_name'] = uniqid(); // Unique file name
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('roomtype_image')) {
					$uploadData = $this->upload->data();
					$imageFileName = $uploadData['file_name'];
				} else {
					$error = $this->upload->display_errors();
					redirect('category_creation', 'refresh');
				}
			}
			date_default_timezone_set('Asia/Kolkata');
			$adding_date=date('Y-m-d H:i:s');
			$data = array(
				'category_name' => $roomtypename,
				'date' => $adding_date,
				'adminstatus' => 'staff',
				'approvestatus' => 'Approved',
				'status' => $status,
				'category_image' => $imageFileName // Assign image file name
			);
			$this->db->insert('category', $data);
			redirect('all_category', 'refresh');
		} else {
		redirect('all_category', 'refresh');
		}
	}
public function category_edit($category_id)
{
	$data['roomid'] = $category_id; 
	$data['categorys'] = $this->HomeModel->categorys($category_id);
	$data['menu']='category_edit';
	$data['pagetitle']='DashBoard';
	$this->load->view('webapp/Superadmin/include/header',$data);
	$this->load->view('webapp/Superadmin/category/category_edit',$data);
	$this->load->view('webapp/Superadmin/include/footer');
}  
public function categoryupdate() {
	$roomid = $this->input->post('category_id');
	$roomtype = $this->input->post('roomtypename');
	$status = $this->input->post('status');
	$existing_type_image = $this->input->post('existing_type_image');
	$roomtype_image = $existing_type_image; // Default to existing image
	if (!empty($_FILES['roomtype_image']['name'])) {
		$config['upload_path'] = './upload/category_images/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = 2048; // 2MB
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('roomtype_image')) {
			$upload_data = $this->upload->data();
			$roomtype_image = $upload_data['file_name'];
			// Delete old image file if a new image is uploaded
			if ($existing_type_image && file_exists('./upload/category_images/' . $existing_type_image)) {
				unlink('./upload/category_images/' . $existing_type_image);
			}
		} else {
			$error = $this->upload->display_errors();
			echo json_encode(['error' => $error]);
			return;
		}
	}
	$this->HomeModel->updateCategory($roomid, $roomtype, $status, $roomtype_image);
	redirect('all_category', 'refresh');
}
public function all_category()
{
	$data['menu']='all_category';
	$data['pagetitle']='DashBoard';
	$data['categorys'] = $this->HomeModel->get_categorys();
	$this->load->view('webapp/Superadmin/include/header',$data);
	$this->load->view('webapp/Superadmin/category/all_category');
	$this->load->view('webapp/Superadmin/include/footer');
} 

//sub category
public function subcategory_creation()
{
	$data['menu']='subcategory_creation';
	$data['pagetitle']='DashBoard';
	$data['categories'] = $this->HomeModel->get_all_categories(); // Fetch categories
	$this->load->view('webapp/Superadmin/include/header',$data);
	$this->load->view('webapp/Superadmin/subcategory/subcategory_creation');
	$this->load->view('webapp/Superadmin/include/footer');
} 
public function subcategory_reg() {
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$status=$this->input->post('status');
		$roomtypename = $this->input->post('roomtypename');
		$category_id = $this->input->post('category_id'); // Get selected category ID
		$imageFileName = ''; 
		  if (!empty($_FILES['roomtype_image']['name'])) {
			$config['upload_path'] = './upload/subcategory_images/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = 2048; // 2MB max size (you can adjust as needed)
			$config['file_name'] = uniqid(); // Unique file name
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('roomtype_image')) {
				$uploadData = $this->upload->data();
				$imageFileName = $uploadData['file_name'];
			} else {
				$error = $this->upload->display_errors();
				redirect('subcategory_creation', 'refresh');
			}
		}
		date_default_timezone_set('Asia/Kolkata');
		$adding_date=date('Y-m-d H:i:s');
		$data = array(
			'subcategory_name' => $roomtypename,
			'category_id' => $category_id,
			'date' => $adding_date,
			'adminstatus' => 'staff',
			'approvestatus' => 'Approved',
			'status' => $status,
			'subcategory_image' => $imageFileName // Assign image file name
		);
		$this->db->insert('subcategory', $data);
		redirect('all_subcategory', 'refresh');
	} else {
	redirect('all_subcategory', 'refresh');
	}
}
public function subcategory_edit($category_id)
{
	$data['roomid'] = $category_id; 
	$data['subcategorys'] = $this->HomeModel->subcategorys($category_id);
	$data['categories'] = $this->HomeModel->get_all_categories(); // Fetch categories
	$data['menu']='subcategory_edit';
	$data['pagetitle']='DashBoard';
	$this->load->view('webapp/Superadmin/include/header',$data);
	$this->load->view('webapp/Superadmin/subcategory/subcategory_edit',$data);
	$this->load->view('webapp/Superadmin/include/footer');
}  
public function subcategoryupdate() {
	$roomid = $this->input->post('subcategory_id');
	$roomtype = $this->input->post('roomtypename');
	$category_id = $this->input->post('category_id'); // Capture the category ID
	$status = $this->input->post('status');
	$existing_type_image = $this->input->post('existing_type_image');
	$roomtype_image = $existing_type_image; // Default to existing image
	if (!empty($_FILES['roomtype_image']['name'])) {
		$config['upload_path'] = './upload/subcategory_images/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = 2048; // 2MB
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('roomtype_image')) {
			$upload_data = $this->upload->data();
			$roomtype_image = $upload_data['file_name'];
			// Delete old image file if a new image is uploaded
			if ($existing_type_image && file_exists('./upload/subcategory_images/' . $existing_type_image)) {
				unlink('./upload/subcategory_images/' . $existing_type_image);
			}
		} else {
			$error = $this->upload->display_errors();
			echo json_encode(['error' => $error]);
			return;
		}
	}
	$this->HomeModel->updatesubCategory($roomid, $roomtype, $status, $roomtype_image, $category_id);
	redirect('all_subcategory', 'refresh');
}
public function all_subcategory()
{
	$data['menu']='all_subcategory';
	$data['pagetitle']='DashBoard';
	$data['subcategorys'] = $this->HomeModel->get_subcategorys();
	$this->load->view('webapp/Superadmin/include/header',$data);
	$this->load->view('webapp/Superadmin/subcategory/all_subcategory');
	$this->load->view('webapp/Superadmin/include/footer');
} 

public function update_status_subcategory() {
	$room_id = $this->input->post('subcategory_id');
	$status = $this->input->post('status');
	if ($room_id !== null && $status !== null) {
		$this->HomeModel->update_statussubcata($room_id, $status);
		echo json_encode(["success" => true]);
	} else {
		echo json_encode(["success" => false]);
	}
}

public function update_statuscategory() {
	$room_id = $this->input->post('category_id');
	$status = $this->input->post('status');
	if ($room_id !== null && $status !== null) {
		$this->HomeModel->update_statuscata($room_id, $status);
		echo json_encode(["success" => true]);
	} else {
		echo json_encode(["success" => false]);
	}
}
public function update_statusitem() {
	$room_id = $this->input->post('item_id');
	$status = $this->input->post('status');
	if ($room_id !== null && $status !== null) {
		$this->HomeModel->update_statusitem($room_id, $status);
		echo json_encode(["success" => true]);
	} else {
		echo json_encode(["success" => false]);
	}
}
public function get_subcategories() {
	$category_id = $this->input->post('category_id');
	if ($category_id) {
		$this->db->where('category_id', $category_id);
		$query = $this->db->get('subcategory');
		$subcategories = $query->result();
		echo json_encode($subcategories);
	} else {
		echo json_encode([]);
	}
}













public function add_customer() {
	date_default_timezone_set('Asia/Kolkata');
	$adding_date=date('Y-m-d H:i:s');
    $customer_data = array(
        'customer_name' => $this->input->post('customer_name'),
        'age' => $this->input->post('age'),
        'email' => $this->input->post('email'),
        'phone' => $this->input->post('mobile'),
        'address' => $this->input->post('address'),
        'agency_id' => $this->input->post('agency_id'),
        'customer_type' => $this->input->post('customer_type'),
        'company_name' => $this->input->post('company_name'),
        'company_address' => $this->input->post('company_address'),
        'gst_number' => $this->input->post('gst_number'),
        'date' => $adding_date,
		'status' => '1',
		'admin_status' => 'staff',
	);
    $result = $this->HomeModel->addCustomer($customer_data);
    if ($result) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}


public function add_agent() {
	date_default_timezone_set('Asia/Kolkata');
	$adding_date=date('Y-m-d H:i:s');
    $customer_data = array(
        'agent_name' => $this->input->post('agent_name'),
        'email' => $this->input->post('email1'),
        'phone' => $this->input->post('mobile1'),
        'address' => $this->input->post('address1'),
		'commission_per' => $this->input->post('comm'),
		'commission_amt' => $this->input->post('commamt'),
        'date' => $adding_date,
		'status' => '1',
		'admin_status' => 'staff',
	);
    $result = $this->HomeModel->addAgent($customer_data);
    if ($result) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}


public function room_enquiry_submit()
{
	date_default_timezone_set('Asia/Kolkata');
	$adding_date=date('Y-m-d H:i:s');

	$selected_rooms = json_decode($this->input->post('selected_rooms'), true);
    $removed_rooms = json_decode($this->input->post('removed_rooms'), true) ?? []; // Get removed rooms
	
	// Generate a unique order ID
	$order_id = uniqid('order_');
    // Capture booking details
    $agent_id = $this->input->post('agent_id');
    $customer_id = $this->input->post('customer_id');
    $dateranges = $this->input->post('daterange'); // This is an array
    $extra_guest_counts = $this->input->post('extra_guest_count'); // This is an array
    $advance_amount = $this->input->post('advance_amount');
    $payment_method = $this->input->post('payment_method');

    // Capture room details
    $room_ids = $this->input->post('room_id');
    $roomnos = $this->input->post('roomno');
    $room_names = $this->input->post('room_name');
    $no_of_guests = $this->input->post('noofguests');

    // Capture guest details
    $guest_names = $this->input->post('guest_name');
    $guest_phones = $this->input->post('guest_phone');
	$guest_ages = $this->input->post('guest_age');
    $guest_id_proofs = $_FILES['guest_id_proof'];


	$booking_ids = []; // Array to store booking IDs for each room



    // Insert booking into room_booking table
	foreach ($room_ids as $index => $hotel_roomid) {
		if (in_array($hotel_roomid, $removed_rooms)) {
            continue; // Skip this iteration and go to the next
        }
		// Extract check-in and check-out from the current room's date range
		 if (!empty($dateranges[$index])) {
            $daterange = explode(' to ', $dateranges[$index]);
            $checkin = !empty($daterange[0]) ? date('Y-m-d H:i:s', strtotime($daterange[0] . ' 12:00:00')) : null; // Set check-in time as 15:00
            $checkout = !empty($daterange[1]) ? date('Y-m-d H:i:s', strtotime($daterange[1] . ' 12:00:00')) : null; // Set check-out time as 11:00
        } else {
            $checkin = null;
            $checkout = null;
        }

	 if ($this->HomeModel->checkRoomAvailability($hotel_roomid, $checkin, $checkout)) {
            echo json_encode(['status' => 'error', 'message' => "Room {$hotel_roomid} is not available for the selected dates."]);
            return; // Return early if the room is not available
        }
        $booking_data = [
			'order_id' => $order_id, // Store the unique order ID
            'agent_id' => $agent_id,
            'customer_id' => $customer_id,
            'advance_amount' => $advance_amount,
            'payment_method' => $payment_method,
            'booking_date' => $adding_date,
            'hotel_roomid' => $hotel_roomid, 
            'roomno' => $roomnos[$index],
            'room_name' => $room_names[$index],
            'noofguests' => $no_of_guests[$index],
		    'checkin' => $checkin, // Use the check-in time for this room
            'checkout' => $checkout, // Use the check-out time for this room
            'payment_status' => 'payed',
            'admin_status' => 'staff',
            'booking_status' => 'booked',
            'status' => '1',
        ];
        $booking_id = $this->HomeModel->insert_room_booking($booking_data);
		$bookingid= $booking_id;

		$booking_ids[$hotel_roomid] = $booking_id; // Store the booking ID for this room

		if (!$booking_id) {
			echo json_encode(['status' => 'error', 'message' => 'Failed to create room booking.']);
			return;
		}

		$this->HomeModel->update_room_status($hotel_roomid, 'available');
	
        // Insert room details into room_booking_details table
        $room_detail_data = [
            'booking_id' => $booking_id,
            'date' =>$adding_date,
            'extra_guest_count' => $extra_guest_counts[$index],
			'hotel_roomid' => $hotel_roomid,
        ];
        $this->HomeModel->insert_room_booking_details($room_detail_data);
		$availability_date = $checkout; // Room becomes available after the checkout date
		  // Insert room details into room_status_log table
		  $room_status_log = [
            'booking_id' => $booking_id,
            'date' => $adding_date,
			'status_change_date' =>$adding_date,
			'availability_date' =>$availability_date,
			'hotel_roomid' => $hotel_roomid,
			'customer_id' => $customer_id,
			'status' => 'vaccant',
        ];
        $this->HomeModel->insert_room_status_log($room_status_log);


	// }
      // Insert guest details for the current room
	  if (!empty($guest_names[$hotel_roomid])) {
		foreach ($guest_names[$hotel_roomid] as $guest_index => $guest_name) {
			    // Check if the guest name is empty
                if (!empty($guest_name)) {
			 $file = [
                'name' => $guest_id_proofs['name'][$hotel_roomid][$guest_index],
                'type' => $guest_id_proofs['type'][$hotel_roomid][$guest_index],
                'tmp_name' => $guest_id_proofs['tmp_name'][$hotel_roomid][$guest_index],
                'error' => $guest_id_proofs['error'][$hotel_roomid][$guest_index],
                'size' => $guest_id_proofs['size'][$hotel_roomid][$guest_index],
            ];
            // Check if the file upload was successful
            if ($file['error'] === UPLOAD_ERR_OK && !empty($file['name'])) {
                // Proceed to upload the file
				$upload_path = './upload/id_proofs/';
                $uploaded_file = $this->_upload_file($file, $upload_path);
            } else {
                // Use default if no file is provided or there's an error
                $uploaded_file = 'default.jpg';
            }

			$guest_code = uniqid('guest_', true); // Generate unique guest code

			// Insert guest details
			$guest_data = [
				'booking_id' => $booking_id,
				'guest_name' => $guest_name,
				'phone' => $guest_phones[$hotel_roomid][$guest_index],
				'age' => !empty($guest_ages[$hotel_roomid][$guest_index]) ? $guest_ages[$hotel_roomid][$guest_index] : 'Unknown', // Check for age
				'id_proof' => $uploaded_file,
				'hotel_roomid' => $hotel_roomid,
				'guest_code' => $guest_code,
				'date' => $adding_date,
				'admin_status' => 'staff',
				'status' => '1',
			];
			$this->HomeModel->insert_guest_details($guest_data);
		}
	}
}
	// Assuming you're handling form submission and have the booking ID
	$booking_id = $this->input->post('booking_id'); // Adjust as necessary
	// Insert extra guests
	$extra_guest_name = $this->input->post('extra_guest_name_' . $hotel_roomid) ?? [];
	$extra_guest_phone = $this->input->post('extra_guest_phone_' . $hotel_roomid) ?? [];
	$extra_guest_age = $this->input->post('extra_guest_age_' . $hotel_roomid) ?? [];
	foreach ($extra_guest_name as $extra_index => $name) {
		if (!empty($name)) {
		 $file = [
			'name' => $guest_id_proofs['name'][$hotel_roomid][$guest_index],
			'type' => $guest_id_proofs['type'][$hotel_roomid][$guest_index],
			'tmp_name' => $guest_id_proofs['tmp_name'][$hotel_roomid][$guest_index],
			'error' => $guest_id_proofs['error'][$hotel_roomid][$guest_index],
			'size' => $guest_id_proofs['size'][$hotel_roomid][$guest_index],
		];
		if ($file['error'] === UPLOAD_ERR_OK && !empty($file['name'])) {
			$upload_path = './upload/id_proofs/';
			$uploaded_file = $this->_upload_file($file, $upload_path);
		} else {
			$uploaded_file = 'default.jpg';
		}
		$guest_code = uniqid('guest_', true); // Generate unique guest code
		$extra_guest_data = [
			'booking_id' => $bookingid, // Use the booking_id from the room booking
			'guest_name' => $name,
			'phone' => $extra_guest_phone[$extra_index] ?? null,
			'age' => $extra_guest_age[$extra_index] ?? 'Unknown', // Default value
			'hotel_roomid' => $hotel_roomid,
			'guest_code' => $guest_code,
			'id_proof' => $uploaded_file,
			'date' => $adding_date,
			'admin_status' => 'staff',
			'status' => '1',
		];
		$this->HomeModel->insert_guest_details($extra_guest_data);
    	}
	}
}


$items_data = json_decode($this->input->post('items_data'), true);
if (empty($items_data)) {
    error_log('Received items_data: ' . $this->input->post('items_data'));
    echo json_encode(['status' => 'error', 'message' => 'Invalid data.']);
    return;
}

// Loop through each room and its items
foreach ($items_data as $room_id => $room_items) {
    if (!is_array($room_items)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid item data for room: ' . $room_id]);
        return;
    }

    foreach ($room_items as $item) {
		if (!is_array($item) || !isset($item['id'], $item['name'], $item['currentPrice'], $item['newPrice'], $item['quantity'], $item['totalPrice'])) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid item data.']);
            return;
        }

        $data = [
            'booking_id' => $booking_ids[$room_id] ?? null, // Use the correct booking ID for this room
            'item_name' => $item['name'],
			'item_id' => $item['id'],
            'item_price' => $item['currentPrice'],
            'new_price' => $item['newPrice'],
            'quantity' => $item['quantity'],
            'item_total_price' => $item['totalPrice'],
            'hotel_roomid' => $room_id, // Correct room ID
            'adding_date' => $adding_date,
            'admin_status' => 'staff',
            'status' => '1',
        ];

        $this->HomeModel->insert_room_items($data);
    }
}

//echo json_encode(['status' => 'success', 'message' => 'All items inserted successfully.']);


redirect('dashboard');
}



private function _upload_file($file, $upload_path)
{
    // Ensure the upload path exists
    if (!is_dir($upload_path)) {
        mkdir($upload_path, 0777, true);
    }
    // Generate a unique name for the file to avoid overwrites
    $filename = uniqid() . '_' . basename($file['name']);
    $destination = $upload_path . $filename;
    // Move the uploaded file to the destination
    if (move_uploaded_file($file['tmp_name'], $destination)) {
        return $filename; // Return the file name to store in the database
    } else {
        return 'default.jpg'; // Return default if upload failed
    }
}





public function update_room_enquiry_submit()
{
	date_default_timezone_set('Asia/Kolkata');
	$adding_date=date('Y-m-d H:i:s');

	$selected_rooms = json_decode($this->input->post('selected_rooms'), true);
    $removed_rooms = json_decode($this->input->post('removed_rooms'), true) ?? []; // Get removed rooms
	$booking_id = $this->input->post('booking_id'); // Get the booking ID
	// Generate a unique order ID
	$order_id = uniqid('order_');
    // Capture booking details
    $agent_id = $this->input->post('agent_id');
    $customer_id = $this->input->post('customer_id');
    $dateranges = $this->input->post('daterange'); // This is an array
    $extra_guest_counts = $this->input->post('extra_guest_count'); // This is an array
    $advance_amount = $this->input->post('advance_amount');
    $payment_method = $this->input->post('payment_method');

    // Capture room details
    $room_ids = $this->input->post('room_id');
    $roomnos = $this->input->post('roomno');
    $room_names = $this->input->post('room_name');
    $no_of_guests = $this->input->post('noofguests');

    // Capture guest details
    $guest_names = $this->input->post('guest_name');
    $guest_phones = $this->input->post('guest_phone');
	$guest_ages = $this->input->post('guest_age');
    // Check for guest ID proofs and initialize variable
    $guest_id_proofs = isset($_FILES['guest_id_proof']) ? $_FILES['guest_id_proof'] : []; // Initialize to an empty array if not set

//	$booking_ids = []; // Array to store booking IDs for each room

	$existing_booking = $this->HomeModel->get_booking_by_id($booking_id); // Assume this method exists

// Insert booking into room_booking table

    // Insert booking into room_booking table
	foreach ($room_ids as $index => $hotel_roomid) {
		if (in_array($hotel_roomid, $removed_rooms)) {
            continue; // Skip this iteration and go to the next
        }
		// Initialize checkin and checkout with existing values
		$checkin = $existing_booking['checkin']; 
		$checkout = $existing_booking['checkout']; 
		if (!empty($dateranges[$index])) {
			$daterange = explode(' to ', $dateranges[$index]);
			if (!empty($daterange[0]) && strtotime($daterange[0]) !== false) {
				$checkin = date('Y-m-d H:i:s', strtotime($daterange[0] . ' 12:00:00')); // Update check-in
			}
			if (!empty($daterange[1]) && strtotime($daterange[1]) !== false) {
				$checkout = date('Y-m-d H:i:s', strtotime($daterange[1] . ' 12:00:00')); // Update check-out
			}
		}
			
	//  if ($this->HomeModel->checkRoomAvailability($hotel_roomid, $checkin, $checkout)) {
    //         echo json_encode(['status' => 'error', 'message' => "Room {$hotel_roomid} is not available for the selected dates."]);
    //         return; // Return early if the room is not available
    //     }
        $booking_data = [
			'order_id' => $order_id, // Store the unique order ID
            'agent_id' => $agent_id,
            'customer_id' => $customer_id,
            'advance_amount' => $advance_amount,
            'payment_method' => $payment_method,
            'occupy_date' => $adding_date,
            'hotel_roomid' => $hotel_roomid, 
            'roomno' => $roomnos[$index],
            'room_name' => $room_names[$index],
            'noofguests' => $no_of_guests[$index],
		    'checkin' => $checkin, // Use the check-in time for this room
            'checkout' => $checkout, // Use the check-out time for this room
            'payment_status' => 'payed',
            'admin_status' => 'staff',
            'booking_status' => 'occupied',
            'status' => '1',
        ];
       // $booking_id = $this->HomeModel->insert_room_booking($booking_data);
	//	$bookingid= $booking_id;

	$this->HomeModel->update_room_booking($booking_id, $hotel_roomid, $booking_data);
	$this->HomeModel->update_room_status($hotel_roomid, 'available');
	

	$occupy_data = [
		'booking_id' => $booking_id,
		'occupy_date' => $adding_date, // Current timestamp
		'occupy_status' => 'occupied', // Current timestamp
	  //  'reason' => $this->input->post('cancel_reason'), // Capture the reason if provided
	];

	// Call the model function to insert the cancellation data
	$this->HomeModel->insert_into_occupy_booking($occupy_data);


        // Insert room details into room_booking_details table
        $room_detail_data = [
            'booking_id' => $booking_id,
            'date' =>$adding_date,
            'extra_guest_count' => $extra_guest_counts[$index],
			'hotel_roomid' => $hotel_roomid,
        ];
        // $this->HomeModel->insert_room_booking_details($room_detail_data);
		$this->HomeModel->update_room_booking_details($booking_id, $hotel_roomid, $room_detail_data);
		$availability_date = $checkout; // Room becomes available after the checkout date
		  // Insert room details into room_status_log table
		  $room_status_log = [
            'booking_id' => $booking_id,
            'date' => $adding_date,
			'status_change_date' =>$adding_date,
			'availability_date' =>$availability_date,
			'hotel_roomid' => $hotel_roomid,
			'customer_id' => $customer_id,
			'status' => 'vaccant',
        ];
        // $this->HomeModel->insert_room_status_log($room_status_log);
		$this->HomeModel->update_room_status_log($booking_id, $hotel_roomid, $room_status_log);



// Capture guest details
$guest_names = $this->input->post('guest_name');
$guest_phones = $this->input->post('guest_phone');
$guest_ages = $this->input->post('guest_age');
$guest_id_proofs = isset($_FILES['guest_id_proof']) ? $_FILES['guest_id_proof'] : []; // Initialize to an empty array if not set

foreach ($room_ids as $hotel_roomid) {
    if (!empty($guest_names[$hotel_roomid])) {
        foreach ($guest_names[$hotel_roomid] as $guest_index => $guest_name) {
            // Check if the guest name is not empty
            if (!empty($guest_name)) {
                $file = [
                    'name' => $guest_id_proofs['name'][$hotel_roomid][$guest_index],
                    'type' => $guest_id_proofs['type'][$hotel_roomid][$guest_index],
                    'tmp_name' => $guest_id_proofs['tmp_name'][$hotel_roomid][$guest_index],
                    'error' => $guest_id_proofs['error'][$hotel_roomid][$guest_index],
                    'size' => $guest_id_proofs['size'][$hotel_roomid][$guest_index],
                ];
                
                // Check if the file upload was successful
                if ($file['error'] === UPLOAD_ERR_OK && !empty($file['name'])) {
                    // Proceed to upload the file
                    $upload_path = './upload/id_proofs/';
                    $uploaded_file = $this->_upload_file($file, $upload_path);
                } else {
                    // Use default if no file is provided or there's an error
                    $uploaded_file = 'default.jpg';
                }

                // Prepare guest data
                $guest_data = [
                    'guest_name' => $guest_name,
                    'phone' => $guest_phones[$hotel_roomid][$guest_index],
                    'age' => !empty($guest_ages[$hotel_roomid][$guest_index]) ? $guest_ages[$hotel_roomid][$guest_index] : 'Unknown',
                    'id_proof' => $uploaded_file,
                    'hotel_roomid' => $hotel_roomid,
                    'booking_id' => $booking_id,
                ];

                // Check if the guest already exists in the database
                $existing_guest = $this->HomeModel->get_guest_by_booking_and_code(
                    $booking_id,
                    $hotel_roomid,
                    $guest_phones[$hotel_roomid][$guest_index] // Assuming phone is unique to guest
                );

            //    var_dump($existing_guest); // Check if $existing_guest is correct
           //     die();

                $this->db->trans_start(); // Start transaction

                if ($existing_guest) {
                    // Guest already exists, update if there's any change
                    if ($existing_guest['guest_name'] !== $guest_name ||
                        $existing_guest['phone'] !== $guest_data['phone'] ||
                        $existing_guest['age'] !== $guest_data['age'] ||
                        $existing_guest['id_proof'] !== $uploaded_file) {

                        // Update existing guest details
                        $update_guest_data = [
                            'guest_name' => $guest_name,
                            'phone' => $guest_phones[$hotel_roomid][$guest_index],
                            'age' => $guest_ages[$hotel_roomid][$guest_index],
                            'id_proof' => $uploaded_file,
                            // Keep the existing guest_code
                            'guest_code' => $existing_guest['guest_code'], 
                        ];
                        
                        $this->HomeModel->update_guest_details($existing_guest['guest_id'], $update_guest_data);
                    }
                } else {
                    // Insert new guest if not found
                    $guest_data['guest_code'] = uniqid('guest_', true); // Unique code for the guest
                    $guest_data['date'] = $adding_date;
                    $guest_data['admin_status'] = 'staff';
                    $guest_data['status'] = '1'; // Set status to active
                    $this->HomeModel->insert_guest_details($guest_data);
                }

                $this->db->trans_complete(); // Complete transaction

                if ($this->db->trans_status() === FALSE) {
                    log_message('error', 'Transaction failed for booking_id: ' . $booking_id);
                }
            }
        }
    }
}



//Insert or update extra guests
// $extra_guest_name = $this->input->post('extra_guest_name_' . $hotel_roomid) ?? [];
// $extra_guest_phone = $this->input->post('extra_guest_phone_' . $hotel_roomid) ?? [];
// $extra_guest_age = $this->input->post('extra_guest_age_' . $hotel_roomid) ?? [];

// foreach ($extra_guest_name as $extra_index => $name) {
//     if (!empty($name)) {
//         // Prepare extra guest data
//         $extra_guest_data = [
//             'booking_id' => $booking_id,
//             'guest_name' => $name,
//             'phone' => $extra_guest_phone[$extra_index] ?? null,
//             'age' => $extra_guest_age[$extra_index] ?? 'Unknown',
//             'hotel_roomid' => $hotel_roomid,
//             'id_proof' => $uploaded_file,
//             'date' => $adding_date,
//             'admin_status' => 'staff',
//             'status' => '1',
//         ];

//         // Check if the extra guest already exists
//         $existing_extra_guest = $this->HomeModel->get_guest_by_booking_and_code($booking_id, $hotel_roomid, $name, $extra_guest_phone[$extra_index]);

//         if ($existing_extra_guest) {
//             // Update existing extra guest
//             log_message('debug', 'Updating extra guest details for guest ID: ' . $existing_extra_guest['guest_id'] . ' with data: ' . json_encode($extra_guest_data));
//             $updated = $this->HomeModel->update_guest_details($existing_extra_guest['guest_id'], $extra_guest_data);
//             if (!$updated) {
//                 log_message('error', 'Failed to update extra guest record for ID: ' . $existing_extra_guest['guest_id']);
//             } else {
//                 log_message('info', 'Updated extra guest record for ID: ' . $existing_extra_guest['guest_id']);
//             }
//         } else {
//             // Insert new extra guest
//             log_message('debug', 'Inserting new extra guest with data: ' . json_encode($extra_guest_data));
//             $guest_id = $this->HomeModel->insert_guest_details($extra_guest_data);
//             if (!$guest_id) {
//                 log_message('error', 'Failed to insert new extra guest record');
//             } else {
//                 log_message('info', 'Inserted new extra guest record with ID: ' . $guest_id);
//             }
//         }
//     }
// }


	}
$items_data = json_decode($this->input->post('items_data'), true);
if (empty($items_data)) {
    error_log('Received items_data: ' . $this->input->post('items_data'));
    echo json_encode(['status' => 'error', 'message' => 'Invalid data.']);
    return;
}

// Loop through each room and its items
foreach ($items_data as $room_id => $room_items) {
    if (!is_array($room_items)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid item data for room: ' . $room_id]);
        return;
    }

    foreach ($room_items as $item) {
		if (!is_array($item) || !isset($item['id'], $item['name'], $item['currentPrice'], $item['newPrice'], $item['quantity'], $item['totalPrice'])) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid item data.']);
            return;
        }

        $data = [
            'booking_id' => $booking_id, // Use the correct booking ID for this room
            'item_name' => $item['name'],
			'item_id' => $item['id'],
            'item_price' => $item['currentPrice'],
            'new_price' => $item['newPrice'],
            'quantity' => $item['quantity'],
            'item_total_price' => $item['totalPrice'],
            'hotel_roomid' => $room_id, // Correct room ID
            'adding_date' => $adding_date,
            'admin_status' => 'staff',
            'status' => '1',
        ];
        $this->HomeModel->insert_room_items($data);
    }
}
echo json_encode(['status' => 'success', 'message' => 'All items inserted successfully.']);


redirect('dashboard');
}





// public function update_room_enquiry_submit()
// {
//     date_default_timezone_set('Asia/Kolkata');
//     $adding_date = date('Y-m-d H:i:s');

//     $selected_rooms = json_decode($this->input->post('selected_rooms'), true);
//     $removed_rooms = json_decode($this->input->post('removed_rooms'), true) ?? [];
    
//     // Capture booking details
//     $booking_id = $this->input->post('booking_id'); // Get the booking ID
//     $agent_id = $this->input->post('agent_id');
//     $customer_id = $this->input->post('customer_id');
//     $dateranges = $this->input->post('daterange'); // This is an array
//     $extra_guest_counts = $this->input->post('extra_guest_count'); // This is an array
//     $advance_amount = $this->input->post('advance_amount');
//     $payment_method = $this->input->post('payment_method');

//     // Capture room details
//     $room_ids = $this->input->post('room_id');
//     $roomnos = $this->input->post('roomno');
//     $room_names = $this->input->post('room_name');
//     $no_of_guests = $this->input->post('noofguests');

//     // Capture guest details
//     $guest_names = $this->input->post('guest_name');
//     $guest_phones = $this->input->post('guest_phone');
//     $guest_ages = $this->input->post('guest_age');
//    // $guest_id_proofs = $_FILES['id_proof'];

//     // Loop through each room and update booking information
//     foreach ($room_ids as $index => $hotel_roomid) {
//         if (in_array($hotel_roomid, $removed_rooms)) {
//             // If the room is removed, remove the corresponding booking
//             $this->HomeModel->delete_booking_by_room_id($booking_id, $hotel_roomid);
//             continue; // Skip to the next room
//         }

//         // Extract check-in and check-out from the current room's date range
//         if (!empty($dateranges[$index])) {
//             $daterange = explode(' to ', $dateranges[$index]);
//             $checkin = !empty($daterange[0]) ? date('Y-m-d H:i:s', strtotime($daterange[0] . ' 15:00:00')) : null;
//             $checkout = !empty($daterange[1]) ? date('Y-m-d H:i:s', strtotime($daterange[1] . ' 11:00:00')) : null;
//         } else {
//             $checkin = null;
//             $checkout = null;
//         }

//         // Check room availability before updating
//         if ($this->HomeModel->checkRoomAvailability($hotel_roomid, $checkin, $checkout)) {
//             echo json_encode(['status' => 'error', 'message' => "Room {$hotel_roomid} is not available for the selected dates."]);
//             return;
//         }

//         // Update room booking details
//         $booking_data = [
//             'agent_id' => $agent_id,
//             'customer_id' => $customer_id,
//             'advance_amount' => $advance_amount,
//             'payment_method' => $payment_method,
//             'booking_date' => $adding_date,
//             'hotel_roomid' => $hotel_roomid,
//             'roomno' => $roomnos[$index],
//             'room_name' => $room_names[$index],
//             'noofguests' => $no_of_guests[$index],
//             'checkin' => $checkin,
//             'checkout' => $checkout,
//             'booking_status' => 'booked',
//             'status' => '1',
//         ];

//         // Use the booking ID to update the room booking
//         $this->HomeModel->update_room_booking($booking_id, $hotel_roomid, $booking_data);

//         // Update room booking details in room_booking_details table
//         $room_detail_data = [
//             'extra_guest_count' => $extra_guest_counts[$index],
//             'hotel_roomid' => $hotel_roomid,
//         ];

//         $this->HomeModel->update_room_booking_details($booking_id, $hotel_roomid, $room_detail_data);

//         // Update guest details for each room
//         if (!empty($guest_names[$hotel_roomid])) {
//             foreach ($guest_names[$hotel_roomid] as $guest_index => $guest_name) {
//                 if (!empty($guest_name)) {
//                     // Handle file uploads for guest ID proof
//                     $file = [
//                         'name' => $guest_id_proofs['name'][$hotel_roomid][$guest_index],
//                         'type' => $guest_id_proofs['type'][$hotel_roomid][$guest_index],
//                         'tmp_name' => $guest_id_proofs['tmp_name'][$hotel_roomid][$guest_index],
//                         'error' => $guest_id_proofs['error'][$hotel_roomid][$guest_index],
//                         'size' => $guest_id_proofs['size'][$hotel_roomid][$guest_index],
//                     ];

//                     if ($file['error'] === UPLOAD_ERR_OK && !empty($file['name'])) {
//                         $upload_path = './upload/id_proofs/';
//                         $uploaded_file = $this->_upload_file($file, $upload_path);
//                     } else {
//                         $uploaded_file = 'default.jpg'; // Default ID proof
//                     }

//                     $guest_data = [
//                         'guest_name' => $guest_name,
//                         'phone' => $guest_phones[$hotel_roomid][$guest_index],
//                         'age' => !empty($guest_ages[$hotel_roomid][$guest_index]) ? $guest_ages[$hotel_roomid][$guest_index] : 'Unknown',
//                         'id_proof' => $uploaded_file,
//                         'hotel_roomid' => $hotel_roomid,
//                         'date' => $adding_date,
//                         'status' => '1',
//                     ];

//                     $this->HomeModel->update_guest_details($booking_id, $hotel_roomid, $guest_data);
//                 }
//             }
//         }
//     }

//     // Update item data for the rooms
//     $items_data = json_decode($this->input->post('items_data'), true);
//     if (!empty($items_data)) {
//         foreach ($items_data as $room_id => $room_items) {
//             // Delete existing items and re-insert updated items for this booking
//             $this->HomeModel->delete_items_by_booking_id($booking_id, $room_id);

//             foreach ($room_items as $item) {
//                 $data = [
//                     'booking_id' => $booking_id,
//                     'item_name' => $item['name'],
//                     'item_id' => $item['id'],
//                     'item_price' => $item['currentPrice'],
//                     'new_price' => $item['newPrice'],
//                     'quantity' => $item['quantity'],
//                     'item_total_price' => $item['totalPrice'],
//                     'hotel_roomid' => $room_id,
//                     'adding_date' => $adding_date,
//                     'status' => '1',
//                 ];

//                 $this->HomeModel->insert_room_items($data);
//             }
//         }
//     }

//     echo json_encode(['status' => 'success', 'message' => 'Booking updated successfully.']);
// }






public function all_bookings()
{
	$data['menu']='all_bookings';
	$data['pagetitle']='DashBoard';

	$selected_date = $this->input->get('date'); // '2024-10-10' format, for example
	$data['selected_date'] = $selected_date;

	if ($selected_date) {
		$data['bookings'] = $this->HomeModel->get_bookings_by_date($selected_date);
	} else {
		$data['bookings1'] = $this->HomeModel->get_all_bookings();
	}
	
	$data['items'] = $this->HomeModel->get_items();
	$this->load->view('webapp/superadmin/include/header',$data);
	$this->load->view('webapp/superadmin/dashboard/all_bookings',$data);
	$this->load->view('webapp/superadmin/include/footer');
} 

public function update_status_booking() {
	$room_id = $this->input->post('item_id');
	$status = $this->input->post('status');
	if ($room_id !== null && $status !== null) {
		$this->HomeModel->update_status_booking($room_id, $status);
		echo json_encode(["success" => true]);
	} else {
		echo json_encode(["success" => false]);
	}
}

public function get_booked_dates() {
    $input = json_decode($this->input->raw_input_stream, true);
    $roomId = $input['room_id'];
    
    $booked_dates = $this->HomeModel->getBookedDatesByRoomId($roomId);
    
    $response = [];
    foreach ($booked_dates as $booking) {
        $response[] = [
            'checkin' => $booking->checkin,
            'checkout' => $booking->checkout
        ];
    }
    
    echo json_encode($response);
}



public function change_booking_status() {
    $bookingId = $this->input->post('booking_id');
    $status = $this->input->post('booking_status'); // Expecting 'Cancelled'

    // Validate the booking ID and status
    if (!$bookingId || !$status) {
        echo json_encode(['success' => false, 'message' => 'Invalid booking ID or status.']);
        return;
    }

    // Update the booking status
    $result = $this->HomeModel->update_booking_status($bookingId, $status);

    // If the status was successfully updated, insert the cancellation details
    if ($result) {
        // Insert cancellation details into the cancel_booking table
    date_default_timezone_set('Asia/Kolkata');
	$adding_date=date('Y-m-d H:i:s');

        $cancel_data = [
            'booking_id' => $bookingId,
            'cancelled_at' => $adding_date, // Current timestamp
             'cancel_status' => 'cancelled', // Current timestamp
          //  'reason' => $this->input->post('cancel_reason'), // Capture the reason if provided
        ];

        // Call the model function to insert the cancellation data
        $this->HomeModel->insert_cancel_details($cancel_data);

        // Respond with success
        echo json_encode(['success' => true]);
    } else {
        // Respond with failure
        echo json_encode(['success' => false, 'message' => 'Unable to update status.']);
    }
}

public function settlement()
{
	$data['menu']='settlement';
	$data['pagetitle']='DashBoard';
	$booking_id = $this->input->post('booking_id');
	if ($booking_id) {
		$this->load->model('HomeModel');
		$data['booking_details'] = $this->HomeModel->getBookingDetailsById1($booking_id);
		$data['agent'] = $this->HomeModel->getAgentById($data['booking_details']['agent_id']);
		$data['customer'] = $this->HomeModel->getCustomerById($data['booking_details']['customer_id']);
		$guest_details  = $this->HomeModel->getGuestsById($booking_id);
		$data['items_details'] = $this->HomeModel->getItemsDetailsById($booking_id);

		//var_dump($items_details);die;
		$guest_names = array_column($guest_details, 'guest_name'); // Extract guest names into an array
		$data['guest_names'] = implode(', ', $guest_names); // Join names with commas
		  // Generate Invoice Number and Date
		$data['invoice_no'] = 'INV-' . strtoupper(uniqid()); // Unique invoice number
		$data['invoice_date'] = date('Y-m-d'); // Current date
		$data['company_details'] = $this->HomeModel->getCompanyDetails();
}
	$this->load->view('webapp/superadmin/include/header',$data);
	$this->load->view('webapp/superadmin/dashboard/settlement', $data);
	$this->load->view('webapp/superadmin/include/footer');
} 

public function fetch_room_details()
{
    // Get room details and booking_id from AJAX request
    $roomData = $this->input->post('roomData');
    $bookingId = $this->input->post('booking_id'); // Get the booking_id
	// var_dump($bookingId);die;
    // Save data in session for later use on the settlement page
    $this->session->set_userdata('roomDetails', $roomData);
    $this->session->set_userdata('booking_id', $bookingId); // Save booking_id as well

    // Send a success response
    echo json_encode(['status' => 'success']);
}



public function hotel_creation($hotel_id = null)
	{
		$data['menu'] = 'hotel_creation';
		$data['pagetitle'] = 'DashBoard';
		if ($hotel_id == null) {
			$hotel_id = 1; // Set a default hotel ID if not passed
		}
		$hotel_details = $this->HomeModel->get_hotel_details_by_hotel_id($hotel_id);
		$data['hotel_details'] = $hotel_details;
		$this->load->view('webapp/superadmin/include/header', $data);
		$this->load->view('webapp/superadmin/hotel_creation', $data);
		$this->load->view('webapp/superadmin/include/footer');
	}
	

	public function membhotelreg() {
		date_default_timezone_set('Asia/Kolkata');
		$current_date_time = date('Y-m-d H:i:s');
		$this->load->library('session');
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$hotel_id = $this->input->post('hotel_id');  // Assuming you are passing hotel_id for updates
			$hotelname = $this->input->post('hotelname');
			$hotelowner = $this->input->post('hotelowner');
			$about = $this->input->post('about');
			$email = $this->input->post('email');
			$address = $this->input->post('address');
			$location = $this->input->post('location');
			$person1 = $this->input->post('person1');
			$phone1 = $this->input->post('phone1');
			$rules = $this->input->post('rules');
			$whatsappno = $this->input->post('whatsappno');
			$existing_image = $this->input->post('existing_hotel_image');  // Hidden input value for the existing image
			$image_path = $existing_image;  // Set default image path to the existing image
			// Handle new image upload if provided
			if (isset($_FILES['hotelImage']) && $_FILES['hotelImage']['error'] == 0) {
				$upload_dir = './upload/hotel_images/';
				if (!is_dir($upload_dir)) {
					mkdir($upload_dir, 0777, true); 
				}
				$file_name = $_FILES['hotelImage']['name'];
				$file_tmp = $_FILES['hotelImage']['tmp_name'];
				$file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
				$allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
				if (in_array($file_ext, $allowed_ext)) {
					$new_file_name = uniqid() . '.' . $file_ext;
					$full_image_path = $upload_dir . $new_file_name;
					// Move the new image file
					if (move_uploaded_file($file_tmp, $full_image_path)) {
						// Remove the old image if a new one is uploaded
						if (!empty($existing_image) && file_exists('./' . $existing_image)) {
							unlink('./' . $existing_image);  // Delete old image
						}
						$image_path = 'upload/hotel_images/' . $new_file_name;
					} else {
						echo json_encode(array('success' => false, 'message' => 'Failed to upload new image.'));
						exit;
					}
				} else {
					echo json_encode(array('success' => false, 'message' => 'Invalid image file type.'));
					exit;
				}
			}
			// Prepare hotel data array
			$hotel_data = array(
				'hotelname' => $hotelname,
				'hotelowner' => $hotelowner,
				'address' => $address,
				'location' => $location,
				'about' => $about,
				'email' => $email,
				'person1' => $person1,
				'phone1' => $phone1,
				'whatsappno' => $whatsappno,
				'rules' => $rules,
				'image' => $image_path,  // Use new or existing image path
				'adminstatus' => 'staff',
				'status' => '1',
				'date' => $current_date_time,
			);
			// Check if the hotel exists, if so, update; otherwise, insert
			if (!empty($hotel_id)) {
				// Update existing hotel record
				$this->HomeModel->update_hotel($hotel_id, $hotel_data);
				echo json_encode(array('success' => true, 'message' => 'Hotel profile updated successfully!'));
			} else {
				// Insert new hotel record
				$this->HomeModel->inserthotel($hotel_data);
				echo json_encode(array('success' => true, 'message' => 'Hotel profile created successfully!'));
			}
			exit;
		}
	}

	public function create() {
        // Fetch values from POST request (assuming you're sending them from your form)
        $data = array(
            'booking_id' => $this->input->post('booking_id'),
            'customer_id' => $this->input->post('customer_id'),
            'invoice_no' => $this->input->post('invoice_no'),
            'invoice_date' => $this->input->post('invoice_date'),
            'hotel_roomid' => $this->input->post('room_id'),
            'base_amt_grand_tot' => $this->input->post('grand_total_base'),
            'gst_amt_grand_tot' => $this->input->post('grand_total_gst'),
            'tot_amt_grand_tot' => $this->input->post('grand_total_amount'),
            'net_amount' => $this->input->post('net_amount'),
            'by_advance' => $this->input->post('advance_amount'),
            'amount_payable' => $this->input->post('amount_payable'),
            'date' => date('Y-m-d H:i:s'), // Assuming you want to save the current timestamp
            'status' => 'Settled' // or whatever status you want
        );

        // Insert data into the settlement table
        if ($this->Settlement_model->insert_settlement($data)) {
            // Redirect or respond with success message
            redirect('settlement/success'); // Change to your desired success route
        } else {
            // Handle error
            redirect('settlement/error'); // Change to your desired error route
        }
    }

	











}
