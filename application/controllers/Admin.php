<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->library('session');
	    $this->load->helper('url'); 
        $this->load->model('HomeModel');
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
		if (!$user_id || $user_type !== 'admin') {
			// If not logged in or not an membadmin, redirect to login page
			$this->session->set_flashdata('error', 'Unauthorized access. Please login.');
			redirect('unauthorized');
		}
    }


	public function admin_dashboard()
	{
        $data['menu']='admin_dashboard';
        $data['pagetitle']='DashBoard';
		$this->load->view('webapp/admin/include/header',$data);
		$this->load->view('webapp/admin/dashboard/admin_dashboard');
		$this->load->view('webapp/admin/include/footer');
	}    

	public function admin_reservations()
	{
        $data['menu']='admin_reservations';
        $data['pagetitle']='DashBoard';
		$this->load->view('webapp/admin/include/header',$data);
		$this->load->view('webapp/admin/reservations/admin_reservations');
		$this->load->view('webapp/admin/include/footer');
	}   

	public function admin_all_reservations()
	{
        $data['menu']='admin_all_reservations';
        $data['pagetitle']='DashBoard';
		$this->load->view('webapp/admin/include/header',$data);
		$this->load->view('webapp/admin/reservations/admin_all_reservations');
		$this->load->view('webapp/admin/include/footer');
	}   

	public function admin_room_create()
	{
        $data['menu']='admin_room_create';
        $data['pagetitle']='DashBoard';
		$this->load->view('webapp/admin/include/header',$data);
		$this->load->view('webapp/admin/room/admin_room_create');
		$this->load->view('webapp/admin/include/footer');
	}   

	public function admin_room_list()
	{
        $data['menu']='admin_room_list';
        $data['pagetitle']='DashBoard';
		$this->load->view('webapp/admin/include/header',$data);
		$this->load->view('webapp/admin/room/admin_room_list');
		$this->load->view('webapp/admin/include/footer');
	}   

    public function logout()
	{
        $this->session->unset_userdata('logged_in'); 
        $this->session->sess_destroy(); 
        redirect('login');
    }
	public function room_type_creation()
	{
        $data['menu']='room_type_creation';
        $data['pagetitle']='DashBoard';
		$this->load->view('webapp/admin/include/header',$data);
		$this->load->view('webapp/admin/roomtype/room_type_creation');
		$this->load->view('webapp/admin/include/footer');
	} 
	public function room_type_reg() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$status=$this->input->post('status');
			$roomtypename = $this->input->post('roomtypename');
			$imageFileName = ''; 
			  if (!empty($_FILES['roomtype_image']['name'])) {
				$config['upload_path'] = './upload/roomtype_images/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = 2048; 
				$config['file_name'] = uniqid(); // Unique file name
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('roomtype_image')) {
					$uploadData = $this->upload->data();
					$imageFileName = $uploadData['file_name'];
				} else {
					$error = $this->upload->display_errors();
					redirect('room_type_creation', 'refresh');
				}
			}
			date_default_timezone_set('Asia/Kolkata');
			$adding_date=date('Y-m-d H:i:s');
			$data = array(
				'roomtype' => $roomtypename,
				'date' => $adding_date,
				'adminstatus' => 'admin',
				'approvestatus' => 'Approved',
				'status' => $status,
			    'roomtype_image' => $imageFileName // Assign image file name
			);
			$this->db->insert('admin_room', $data);
			redirect('room_type_creation', 'refresh');
		} else {
		redirect('room_type_creation', 'refresh');
		}
	}
	public function roomtype_edit($roomid)
	{
		$data['roomid'] = $roomid; 
		$data['roomtype'] = $this->HomeModel->roomtype($roomid);
        $data['menu']='roomtype_edit';
        $data['pagetitle']='DashBoard';
		$this->load->view('webapp/admin/include/header',$data);
		$this->load->view('webapp/admin/roomtype/roomtype_edit',$data);
		$this->load->view('webapp/admin/include/footer');
	}  
	public function roomtypeupdate() {
		$roomid = $this->input->post('roomid');
		$roomtype = $this->input->post('roomtypename');
		$status = $this->input->post('status');
		$existing_type_image = $this->input->post('existing_type_image');
		$roomtype_image = $existing_type_image; // Default to existing image
		if (!empty($_FILES['roomtype_image']['name'])) {
			$config['upload_path'] = './upload/roomtype_images/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = 2048; // 2MB
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('roomtype_image')) {
				$upload_data = $this->upload->data();
				$roomtype_image = $upload_data['file_name'];
				if ($existing_type_image && file_exists('./upload/roomtype_images/' . $existing_type_image)) {
					unlink('./upload/roomtype_images/' . $existing_type_image);
				}
			} else {
				$error = $this->upload->display_errors();
				echo json_encode(['error' => $error]);
				return;
			}
		}
		$this->HomeModel->updateRoomtype($roomid, $roomtype, $status, $roomtype_image);
		redirect('all_room_type', 'refresh');
	}
	public function all_room_type()
	{
        $data['menu']='all_room_type';
        $data['pagetitle']='DashBoard';
		$data['room_type'] = $this->HomeModel->get_all_room_type();
		$this->load->view('webapp/admin/include/header',$data);
		$this->load->view('webapp/admin/roomtype/all_room_type');
		$this->load->view('webapp/admin/include/footer');
	} 
	public function  hotel_room_add()
	{
	$data['menu']='hotel_room_add';
	$data['pagetitle']='DashBoard';
	$data['roomtype'] = $this->HomeModel->getroomtype();
	$this->load->library('session');
	$data['facilities'] = $this->HomeModel->get_facilitiesadmin();
	$data['allfacilities'] = $this->HomeModel->get_facilities_and_subfacilities1();
	$this->load->view('webapp/admin/include/header',$data);
	$this->load->view('webapp/admin/room/hotel_room_add');
	$this->load->view('webapp/admin/include/footer');
	}   
	public function  hotel_added_rooms()
	{
		$data['menu']='hotel_added_rooms';
		$data['pagetitle']='DashBoard';
		$this->load->library('session');
		$data['rooms'] = $this->HomeModel->get_rooms();
		$this->load->view('webapp/admin/include/header',$data);
		$this->load->view('webapp/admin/room/hotel_added_rooms',$data);
		$this->load->view('webapp/admin/include/footer');
	}   

	

	public function  hotel_add_facility()
	{
        $data['menu']='hotel_facilitys';
        $data['pagetitle']='DashBoard';
		$this->load->library('session');
		$this->load->view('webapp/admin/include/header',$data);
		$this->load->view('webapp/admin/facility/hotel_add_facility');
		$this->load->view('webapp/admin/include/footer');
	}  

	public function  hotel_edit_facility($facility_id)
	{
        $data['menu']='hotel_facilitys';
        $data['pagetitle']='DashBoard';
	//	$data['facility'] = $this->HomeModel->get_facility_by_id($facility_id);
	    //$data['subfacilities'] = $this->HomeModel->get_subfacilities1($facility_id);
		$this->load->view('webapp/admin/include/header',$data);
		$this->load->view('webapp/admin/facility/hotel_edit_facility');
		$this->load->view('webapp/admin/include/footer');
	}  

	public function updateFacility() {
		$facilityId = $this->input->post('facilityid'); // Assuming you have a hidden input field for facility_id
		$facilityName = $this->input->post('facilityname');
		$subfacilityIds = $this->input->post('subfacilityid'); // Retrieve subfacility ids
		$subfacilityNames = $this->input->post('subfacilityname');
		//$this->HomeModel->updateFacility($facilityId, $facilityName);
		foreach ($subfacilityIds as $key => $subfacilityId) {
			$subfacilityName = $subfacilityNames[$key];
		//	$this->HomeModel->updateSubfacility($subfacilityId, $subfacilityName);
		}
		redirect('hotel_facilitys');
	}

	public function insert_subfacility() {
		$subfacilityname = $this->input->post('subfacilityname');
		$facilityid = $this->input->post('facilityid');
		$status = $this->input->post('status');
        date_default_timezone_set('Asia/Kolkata');
		$adding_date=date('Y-m-d H:i:s');
		$data = array(
			'subfacilityname' => $subfacilityname,
			'facilityid' => $facilityid,
			'status' => $status,
			'adding_date' => $adding_date,
			'hotelid' => '0',
			'usertype' => 'admin',
		);
		$this->db->insert('admin_facility', $data);
		if ($this->db->affected_rows() > 0) {
			echo "Subfacility inserted successfully";
		} else {
			echo "Failed to insert subfacility";
		}
	}

	public function saveFacility() {
		$this->load->library('session');
		$facilityname = $this->input->post('facilityname');
		$facilityid = $this->HomeModel->insertFacilitymember($facilityname);
		$subfacilitynames = $this->input->post('subfacilityname');
		$this->HomeModel->insertSubfacilitymember($facilityid, $subfacilitynames);
		redirect('hotel_facilitys');
	}
	public function save_subfacility($subfacilityId, $facilityId, $hotelid, $membership_id, $status)
	{
		date_default_timezone_set('Asia/Kolkata');
		$current_date_time = date('Y-m-d H:i:s');
		$data = array(
			'subfacilityid' => $subfacilityId,
			'facilityid' => $facilityId,
			'hotelid' => $hotelid,
			'membership_id' => $membership_id,
			'adding_date' => $current_date_time,
			'status' => $status
		);
		$this->db->insert('hotel_subfacilities', $data);
		return $this->db->affected_rows() > 0;
	}

	public function hotel_facilitys()
{
    $data['menu'] = 'hotel_facilitys';
    $data['pagetitle'] = 'DashBoard';
    $this->load->library('session');
    $data['facilities'] = $this->HomeModel->get_facilities_and_subfacilities();
	$this->load->view('webapp/admin/include/header',$data);
	$this->load->view('webapp/admin/facility/hotel_facilitys',$data);
	$this->load->view('webapp/admin/include/footer');
}
	public function room_type_reg1() {
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
				'adminstatus' => 'admin',
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
	public function insert_hotel_room() {
		$this->load->library('session');
		$roomno = $this->input->post('roomno');
		$roomname = $this->input->post('roomname');
		$roomTypes = $this->input->post('roomtype');
		$normalPrices = $this->input->post('nprice');
		$discountPrices = $this->input->post('dprice');
		$noOfGuests = $this->input->post('noofguests');
		$description = $this->input->post('description');
		$imageFileNames = array();
		for ($i = 1; $i <= 5; $i++) {
			if (!empty($_FILES['extimage' . $i]['name'])) {
				$config['upload_path'] = './upload/room_images/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = 0; // 50MB max size (adjust as needed)
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('extimage' . $i)) {
					$uploadData = $this->upload->data();
					$imageFileNames['extimage' . $i] = $uploadData['file_name'];
				} else {
					$error = $this->upload->display_errors();
					redirect('hotel_room_add');
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
				'admintype' => 'admin',
				'roomtypeid' => $roomTypes[$i],
				'normalprice' => $normalPrices,
				'discountprice' => $discountPrices,
				'noofguests' => $noOfGuests,
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
			redirect('hotel_added_rooms', 'refresh');
			console.log("Redirecting to hotel_added_rooms page...");
		}
	}
  
	public function hotel_room_edit($hotel_roomid) {
		$data['menu'] = 'hotel_room_edit';
		$data['pagetitle'] = 'DashBoard';
		$data['roomtype'] = $this->HomeModel->getroomtype();
		$data['rooms'] = $this->HomeModel->get_roomsbyroomid($hotel_roomid);
			$data['room_images'] = $this->HomeModel->get_roomimages($hotel_roomid);
			$data['facilities'] = $this->HomeModel->get_facilitiesadmin();
				$data['allfacilities'] = $this->HomeModel->get_facilities_and_subfacilities1();
		$this->load->view('webapp/admin/include/header', $data);
		$this->load->view('webapp/admin/room/hotel_room_edit', $data);
		$this->load->view('webapp/admin/include/footer');
	}

	public function update_subfacility_status111() {
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
    public function check_subfacility_status() {
        $hotelRoomId = $this->input->post('hotelRoomId');
        $subfacilityId = $this->input->post('subfacilityId');
        $status = $this->HomeModel->get_subfacility_status($hotelRoomId, $subfacilityId);
        echo $status;
    }
	public function get_subfacility_status($hotelRoomId, $subfacilityId) {
        $query = $this->db->get_where('hotel_room_facility', array(
            'hotel_roomid' => $hotelRoomId,
            'subfacilityid' => $subfacilityId
        ));
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->status;
        } else {
            return 0;
        }
    }
	public function update_room_fields111() {
		$roomno = $this->input->post('roomno');
		$roomName = $this->input->post('roomName');
		$roomType = $this->input->post('roomType');
		$noOfGuests = $this->input->post('noofguests');
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
			'normalprice' => $normalPrice,
			'discountprice' => $discountPrice,
			'description' => $description,
			'room_status'=> 'vaccant',
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
        $config['max_size'] = 50000; // 50MB max size (adjust as needed)
        $this->load->library('upload', $config);
        if ($this->upload->do_upload($fieldName)) {
            $uploadData = $this->upload->data();
            return $uploadData['file_name']; // Return uploaded file name
        } else {
            return ''; 
        }
    }










}
