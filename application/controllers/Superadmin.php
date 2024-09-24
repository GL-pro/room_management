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
		$this->load->view('webapp/superadmin/include/header',$data);
		$this->load->view('webapp/superadmin/dashboard/dashboard');
		$this->load->view('webapp/superadmin/include/footer');
	} 
	public function room_enquiry()
	{
        $data['menu']='room_enquiry';
        $data['pagetitle']='Room Enquiry';
		$this->load->view('webapp/superadmin/include/header',$data);
		$this->load->view('webapp/superadmin/dashboard/room_enquiry');
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
			'admintype'=> 'admin',
		    );
		foreach ($imageFileNames as $fieldName => $fileName) {
			$data[$fieldName] = $fileName;
		}
		$this->HomeModel->update_room_fields111($hotelRoomId, $data);
		echo json_encode(array('success' => true, 'message' => 'Room details updated successfully!'));
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





















}
