<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model {
    
    public function loginAdmin($email, $password, $usertype) {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->where('usertype', $usertype); // Check the usertype as well
        $query = $this->db->get('adminlogin');
        return $query->row(); // Return admin data
    }
    public function loginstaff($email, $password, $usertype) {
        $query = $this->db->where('email', $email)
                          ->where('password', $password)
                          ->where('usertype', $usertype)
                          ->get('staff_login');
        return $query->row(); // Return membership admin data
    }

    public function getCategories() {
        $query = $this->db->get('category');
        return $query->result();
    }
    public function getsubCategories() {
        $query = $this->db->get('subcategory');
        return $query->result();
    }
    public function items($item_id){
        $this->db->select('*');    
        $this->db->from('item');
        $this->db->where('item_id', $item_id);
        $query= $this->db->get();
            return $query->result();
    }
    // public function updateItem($roomid, $roomtype, $status, $roomtype_image) {
    //     $data = array(
    //         'item_name' => $roomtype,
    //         'status' => $status,
    //         'item_image' => $roomtype_image
    //     );
    //     $this->db->where('item_id', $roomid);
    //     $this->db->update('item', $data);
    //     return $this->db->affected_rows() > 0;
    // }
    public function updateItem($roomid, $roomtype, $category_id, $subcategory_id, $price1, $price2, $tax, $description, $availability, $status, $roomtype_image) {
        $data = array(
            'item_name' => $roomtype,
            'category_id' => $category_id,
            'subcategory_id' => $subcategory_id,
            'price1' => $price1,
            'price2' => $price2,
            'tax' => $tax,
            'description' => $description,
            'availability' => $availability,
            'status' => $status,
            'item_image' => $roomtype_image
        );
    
        $this->db->where('item_id', $roomid);
        $this->db->update('item', $data);
    }
    
    public function get_items() {
        $this->db->select('*');
        $this->db->from('item');
        //$this->db->where('status', '1');
        $this->db->where('approvestatus', 'Approved');
        $query = $this->db->get();
        return $query->result();
    }
    public function getroomtype(){
        $this->db->select('*');    
        $this->db->from('admin_room');
        $this->db->where('status','1');
         $this->db->where('approvestatus','Approved');
        $query= $this->db->get();
            return $query->result();
    }
    public function get_facilitiesadmin() {
        $query = $this->db->get('admin_facility_type'); // Assuming 'facility' is the name of your database table
        return $query->result_array(); // Return the result as an array of rows
    }
    public function get_facilities_and_subfacilities1() {
        $this->db->select('*');
        $this->db->from('admin_facility_type');
        $this->db->join('admin_facility', 'admin_facility_type.facilityid = admin_facility.facilityid');
        $this->db->where('admin_facility_type.approvestatus', 'Approved');
        $this->db->where('admin_facility_type.status', '1');
        $this->db->where('admin_facility.status', '1');
        $query_hoteladmin1 = $this->db->get();
        $results_hoteladmin1 = $query_hoteladmin1->result_array();
        $results = array_merge($results_hoteladmin1);
        // Group subfacilities by facility ID
        $facilities = [];
        foreach ($results as $row) {
            $facility_id = $row['facilityid'];
            if (!isset($facilities[$facility_id])) {
                $facilities[$facility_id] = $row;
                $facilities[$facility_id]['subfacilities'] = [];
            }
            $facilities[$facility_id]['subfacilities'][] = $row;
        }
        // Convert the associative array to a simple array
        $facilities = array_values($facilities);
        return $facilities;
    }
    public function get_rooms() {
        $this->db->select('hotel_room.*, GROUP_CONCAT(hotel_room_facility.facilityid) AS facility_ids');
        $this->db->from('hotel_room');
        $this->db->join('hotel_room_facility', 'hotel_room_facility.hotel_roomid = hotel_room.hotel_roomid', 'left');
        $this->db->where('hotel_room.status', '1');
        $this->db->group_by('hotel_room.hotel_roomid'); // Group by room id to avoid duplication
        $query = $this->db->get();
        return $query->result(); // Return all rooms as result
    }

    public function insert_room($roomData) {
        $this->db->insert('hotel_room', $roomData);
    }
    public function insert_hotel_room_facility($insertedRoomID, $facilityId) {
        $data = array(
        'hotel_roomid' => $insertedRoomID,
        'facilityid' => $facilityId,
        );
        $this->db->insert('hotel_room_facility', $data);
        }
        public function insert_hotel_room_subfacility($insertedRoomID, $subfacilityId, $facilityId) {
            date_default_timezone_set('Asia/Kolkata');
            $adding_date=date('Y-m-d H:i:s');
            $data = array(
                'hotel_roomid' => $insertedRoomID,
                'facilityid' => $facilityId,
                'subfacilityid' => $subfacilityId,
                'status' => '1',
                'date' => $adding_date,
            );
            $this->db->insert('hotel_room_facility', $data);
        }
        public function get_roomsbyroomid($hotel_roomid) {
            $this->db->select('hotel_room.*,hotel_room_facility.subfacilityid');
            $this->db->from('hotel_room');
            $this->db->join('hotel_room_facility', 'hotel_room_facility.hotel_roomid = hotel_room.hotel_roomid', 'left');
            $this->db->where('hotel_room.status', '1');
            $this->db->where('hotel_room.hotel_roomid', $hotel_roomid);
            $query = $this->db->get();
            return $query->result(); // Return subfacilities associated with the room
        }
        public function get_roomimages($hotel_roomid) {
            $this->db->select('hotel_room.*');    
            $this->db->from('hotel_room');
            $this->db->where('hotel_room.hotel_roomid', $hotel_roomid);
            $query = $this->db->get();
            return $query->result();
        }
        public function update_room_fields111($roomId, $data) {
            $this->db->where('hotel_roomid', $roomId);
            $this->db->update('hotel_room', $data);
            if ($this->db->affected_rows() > 0) {
                return true; 
            } else {
                return false; 
            }
        }
        public function get_categorys() {
            $this->db->select('*');
            $this->db->from('category');
            $this->db->where('approvestatus', 'Approved');
            $query = $this->db->get();
            return $query->result();
        }
        public function get_all_categories() {
            $query = $this->db->get('category'); // Fetch all categories
            return $query->result_array();
        }
        public function get_subcategorys() {
            $this->db->select('subcategory.*,category.category_name');
            $this->db->from('subcategory');
            $this->db->join('category', 'category.category_id = subcategory.category_id');
            $this->db->where('subcategory.approvestatus', 'Approved');
            $query = $this->db->get();
            return $query->result();
        }
        public function updatesubCategory($roomid, $roomtype, $status, $roomtype_image, $category_id) {
            $data = array(
                'subcategory_name' => $roomtype,
                'status' => $status,
                'subcategory_image' => $roomtype_image,
                'category_id' => $category_id
            );
            $this->db->where('subcategory_id', $roomid);
            $this->db->update('subcategory', $data);
            return $this->db->affected_rows() > 0;
        }
        public function update_statussubcata($room_id, $status) {
            $this->db->where('subcategory_id', $room_id);
            $this->db->update('subcategory', ['status' => $status]);
        }
        public function update_statuscata($room_id, $status) {
            $this->db->where('category_id', $room_id);
            $this->db->update('category', ['status' => $status]);
        }
        public function  update_statusitem($room_id, $status) {
            $this->db->where('item_id', $room_id);
            $this->db->update('item', ['status' => $status]);
        }
        public function roomtype($roomid){
            $this->db->select('*');    
            $this->db->from('admin_room');
            $this->db->where('roomid', $roomid);
            $query= $this->db->get();
                return $query->result();
        }
        public function updateRoomtype($roomid, $roomtype, $status, $roomtype_image) {
            $data = array(
                'roomtype' => $roomtype,
                'status' => $status,
                'roomtype_image' => $roomtype_image
            );
            $this->db->where('roomid', $roomid);
            $this->db->update('admin_room', $data);
            return $this->db->affected_rows() > 0;
        }
        public function get_all_room_type() {
            $this->db->select('*');
            $this->db->from('admin_room');
            //$this->db->where('status', '1');
            $this->db->where('approvestatus', 'Approved');
            $query = $this->db->get();
            return $query->result(); // Return all tourist places as result
        }
// Facility insertion
public function insertFacilitymember($facilityname) {
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d H:i:s');
    $data = array(
        'facilityname' => $facilityname,
        'status' => '1',
        'adding_date' => $date,
        'usertype' => 'admin',
        'approvestatus' => 'Approved'
    );
    $this->db->insert('admin_facility_type', $data);
    return $this->db->insert_id(); // Return the ID of the inserted facility
}
public function insertSubfacilitymember($facilityid, $subfacilitynames) {
    if (!is_array($subfacilitynames)) {
        return false; 
    }
    $data = array();
    foreach ($subfacilitynames as $subfacilityname) {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d H:i:s');
        $data[] = array(
            'facilityid' => $facilityid,
            'subfacilityname' => $subfacilityname,
            'status' => '1',
            'adding_date' => $date,
            'usertype' => 'admin',
           // 'hotelid'=>$hotelid
        );
    }
    $this->db->insert_batch('admin_facility', $data);
    return $this->db->affected_rows() > 0;
}
public function get_facilities_and_subfacilities() {
    $this->db->select('*');
    $this->db->from('admin_facility_type');
    $this->db->join('admin_facility', 'admin_facility_type.facilityid = admin_facility.facilityid');
    $this->db->where('admin_facility_type.approvestatus', 'Approved');
    $this->db->where('admin_facility_type.status', '1');
    $this->db->where('admin_facility.status', '1');
    $query = $this->db->get();
    $results = $query->result_array();
    // Group subfacilities by facility ID
    $facilities = [];
    foreach ($results as $row) {
        $facility_id = $row['facilityid'];
        if (!isset($facilities[$facility_id])) {
            $facilities[$facility_id] = $row;
            $facilities[$facility_id]['subfacilities'] = [];
        }
        $facilities[$facility_id]['subfacilities'][] = $row;
    }
    // Convert the associative array to a simple array
    $facilities = array_values($facilities);
    return $facilities;
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
    public function get_subfacilities($facilityid) {
        $this->db->where('facilityid', $facilityid);
        $this->db->where('status', '1');
        return $this->db->get('admin_facility')->result_array();
    }
    public function categorys($category_id){
        $this->db->select('*');    
        $this->db->from('category');
        $this->db->where('category_id', $category_id);
        $query= $this->db->get();
            return $query->result();
    }
    public function subcategorys($category_id){
        $this->db->select('*');    
        $this->db->from('subcategory');
        $this->db->where('subcategory_id', $category_id);
        $query= $this->db->get();
            return $query->result();
    }
    // public function getRoomTypesWithRooms() {
    //     $this->db->select('admin_room.roomtype, hotel_room.room_status AS status, hotel_room.roomno,
    //     hotel_room.hotel_roomid');
    //     $this->db->from('hotel_room');
    //     $this->db->join('admin_room', 'admin_room.roomid = hotel_room.roomtypeid');
    //     $this->db->order_by('hotel_room.roomtypeid', 'ASC');
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }
    public function getRoomTypesWithRoomsGroupedByType() {
        $this->db->select('admin_room.roomtype, hotel_room.room_status AS status, hotel_room.roomno, hotel_room.hotel_roomid');
        $this->db->from('hotel_room');
        $this->db->join('admin_room', 'admin_room.roomid = hotel_room.roomtypeid');
        $this->db->order_by('hotel_room.roomtypeid', 'ASC');
        $query = $this->db->get();
        $rooms = $query->result_array();
        $groupedRooms = [];
        foreach ($rooms as $room) {
            $groupedRooms[$room['roomtype']][] = $room;
        }
        return $groupedRooms;
    }
    


















  

    
    
  



    // public function getTotalRooms() {
    //     $this->db->from('hotel_room'); // Assuming the table is named 'rooms'
    //     return $this->db->count_all_results();
    // }
    // // Method to get the number of available rooms
    // public function getAvailableRooms() {
    //     $this->db->from('hotel_room');
    //     $this->db->where('room_status', 'vaccant'); // Assuming 'status' column indicates availability
    //     return $this->db->count_all_results();
    // }
    // // Method to get the number of booked rooms
    // public function getBookedRooms() {
    //     $this->db->from('hotel_room');
    //     $this->db->where('room_status', 'booked'); // Assuming 'status' column indicates booking
    //     return $this->db->count_all_results();
    // }
    // // Method to get total number of reservations
    // public function getTotalReservations() {
    //     $this->db->from('hotel_room'); // Assuming the table is named 'reservations'
    //     return $this->db->count_all_results();
    // }




    // public function get_roomdetails_by_ids1($roomIdsArray)
    // {
    //     $this->db->select('admin_room.roomtype, hotel_room.room_status AS status, hotel_room.roomno,
    //      hotel_room.room_name, hotel_room.hotel_roomid,hotel_room.noofguests,hotel_room.normalprice,
    //      hotel_room.discountprice');
    //     $this->db->from('hotel_room');
    //     $this->db->join('admin_room', 'admin_room.roomid = hotel_room.roomtypeid');
    //     //$this->db->join('room_booking', 'room_booking.hotel_roomid = hotel_room.hotel_roomid');
    //     $this->db->group_start();
    //     foreach ($roomIdsArray as $room) {
    //         $this->db->or_group_start()
    //                  ->where('hotel_room.roomno', $room['roomno'])
    //                  ->where('hotel_room.hotel_roomid', $room['hotel_roomid'])
    //                  ->group_end();
    //     }
    //     $this->db->group_end();
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }
    // public function get_roomdetails_by_idss($roomIdsArray)
    // {
    //     $this->db->select('admin_room.roomtype, hotel_room.room_status AS status, hotel_room.roomno,
    //      hotel_room.room_name, hotel_room.hotel_roomid,hotel_room.noofguests,hotel_room.normalprice,
    //      hotel_room.discountprice,room_booking.booking_id');
    //     $this->db->from('hotel_room');
    //     $this->db->join('admin_room', 'admin_room.roomid = hotel_room.roomtypeid');
    //     $this->db->join('room_booking', 'room_booking.hotel_roomid = hotel_room.hotel_roomid');
    //  //   $this->db->join('room_occupy', 'room_occupy.hotel_roomid = hotel_room.hotel_roomid');
    //     // Add the WHERE clause for the room numbers and hotel_roomid
    //     $this->db->group_start();
    //     foreach ($roomIdsArray as $room) {
    //         $this->db->or_group_start()
    //                  ->where('hotel_room.roomno', $room['roomno'])
    //                  ->where('hotel_room.hotel_roomid', $room['hotel_roomid'])
    //                  ->group_end();
    //     }
    //     $this->db->group_end();
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }
    // public function get_roomdetails_by_ids($roomIdsArray)
    // {
    //     $this->db->select('admin_room.roomtype, hotel_room.room_status AS status, hotel_room.roomno,
    //      hotel_room.room_name, hotel_room.hotel_roomid,hotel_room.noofguests,hotel_room.normalprice,
    //      hotel_room.discountprice,room_booking.booking_id,room_occupy.occupy_id');
    //     $this->db->from('hotel_room');
    //     $this->db->join('admin_room', 'admin_room.roomid = hotel_room.roomtypeid');
    //     $this->db->join('room_booking', 'room_booking.hotel_roomid = hotel_room.hotel_roomid');
    //     $this->db->join('room_occupy', 'room_occupy.hotel_roomid = hotel_room.hotel_roomid');
    //     // Add the WHERE clause for the room numbers and hotel_roomid
    //     $this->db->group_start();
    //     foreach ($roomIdsArray as $room) {
    //         $this->db->or_group_start()
    //                  ->where('hotel_room.roomno', $room['roomno'])
    //                  ->where('hotel_room.hotel_roomid', $room['hotel_roomid'])
    //                  ->group_end();
    //     }
    //     $this->db->group_end();
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }
    // public function insert_enquiry($data) {
    //     // $data['roomno'] = implode(',', $data['roomno']); // Convert array to string
    //     // $data['room_name'] = implode(',', $data['room_name']); // Convert array to string
    //     return $this->db->insert('room_booking', $data); // Replace 'enquiries' with your actual table name
    // }
    // public function update_room_status($roomIds, $roomnos, $status) {
    //     // Ensure $roomIds and $roomnos are arrays
    //     if (is_array($roomIds) && is_array($roomnos)) {
    //         foreach ($roomIds as $index => $roomId) {
    //             // Update status for each room based on ID
    //             $this->db->where('hotel_roomid', $roomId);
    //             $this->db->update('hotel_room', array(
    //                 'room_status' => $status,
    //                 'roomno' => $roomnos[$index] // Optional: update roomno if needed
    //             )); // Replace 'hotel_room' with your actual table name
    //         }
    //     }
    // }
    
    // public function update_room_status_occupy($roomIds, $roomnos, $status) {
    //     // Ensure $roomIds and $roomnos are arrays
    //     if (is_array($roomIds) && is_array($roomnos)) {
    //         foreach ($roomIds as $index => $roomId) {
    //             // Update status for each room based on ID
    //             $this->db->where('hotel_roomid', $roomId);
    //             $this->db->update('hotel_room', array(
    //                 'room_status' => $status,
    //                 'roomno' => $roomnos[$index] // Optional: update roomno if needed
    //             )); // Replace 'hotel_room' with your actual table name
    //         }
    //     }
    // }

    //     public function getRoomBookings()
    // {
    //     $this->db->select('rb.*, hr.status as room_status, hr.roomtypeid,ar.roomtype,
    //     hr.roomno, hr.hotel_roomid');
    //     $this->db->from('room_booking rb');
    //     $this->db->join('hotel_room hr', 'rb.hotel_roomid = hr.hotel_roomid');
    //     $this->db->join('admin_room ar', 'ar.roomid = hr.roomtypeid');
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

    // public function get_bookingdetails_by_ids($hotel_roomid) {
    //     $this->db->select('rb.*, hr.status AS room_status, hr.roomtypeid, ar.roomtype, hr.roomno, 
    //     hr.hotel_roomid, rb.noofguests ,rb.payment_method,rb.card_amount,rb.cash_amount'); // Fetch noofguests from room_booking
    //     $this->db->from('room_booking rb');
    //     $this->db->join('hotel_room hr', 'FIND_IN_SET(hr.hotel_roomid, rb.hotel_roomid) > 0');
    //     $this->db->join('admin_room ar', 'ar.roomid = hr.roomtypeid');
    //     $this->db->where('hr.hotel_roomid', $hotel_roomid); // Filter by the hotel room ID
    //     $query = $this->db->get();
    //     return $query->result_array(); // Returns an array of booking details
    // }
    // public function get_bookingdetails_by_ids1($hotel_roomid) {
    //     $this->db->select('rb.*, hr.status AS room_status, hr.roomtypeid, ar.roomtype, hr.roomno, 
    //         hr.hotel_roomid, rb.noofguests, rb.payment_method, rb.card_amount, rb.cash_amount');
    //     $this->db->from('room_booking rb');
    //     $this->db->join('hotel_room hr', 'hr.hotel_roomid = rb.hotel_roomid');
    //     $this->db->join('admin_room ar', 'ar.roomid = hr.roomtypeid');
    //     $this->db->where('rb.hotel_roomid', $hotel_roomid);
    //     $query = $this->db->get();
    //     return $query->row_array(); // Return a single booking record if you expect only one match
    // }

    // public function get_occupydetails_by_ids($hotel_roomid) {
    //     $this->db->select('ro.*,rb.*, hr.status AS room_status, hr.roomtypeid, hr.roomno, 
    //     hr.hotel_roomid, rb.noofguests ,rb.payment_method,rb.card_amount,rb.cash_amount,ro.room_name'); // Fetch noofguests from room_booking
    //     $this->db->from('room_occupy ro');
    //    // $this->db->from('room_booking rb');
    //     $this->db->join('hotel_room hr', 'FIND_IN_SET(hr.hotel_roomid, ro.hotel_roomid) > 0');
    //  //   $this->db->join('admin_room ar', 'ar.roomid = ro.roomtypeid');
    //     $this->db->join('room_booking rb', 'rb.hotel_roomid = ro.hotel_roomid');
    //     $this->db->where('hr.hotel_roomid', $hotel_roomid); // Filter by the hotel room ID
    //     $query = $this->db->get();
    //     return $query->result_array(); // Returns an array of booking details
    // }

    // public function updateCategory($roomid, $roomtype, $status, $roomtype_image) {
    //     $data = array(
    //         'category_name' => $roomtype,
    //         'status' => $status,
    //         'category_image' => $roomtype_image
    //     );
    //     $this->db->where('category_id', $roomid);
    //     $this->db->update('category', $data);
    //     return $this->db->affected_rows() > 0;
    // }

   
    // public function get_subcategories($category_id) {
    //     $this->db->where('category_id', $category_id);
    //     $query = $this->db->get('subcategory');
    //     return $query->result(); // This should return an array of subcategory objects
    // }
    
    // public function get_subcategories_by_category($category_id) {
    //     $this->db->where('category_id', $category_id);
    //     $query = $this->db->get('subcategory');
    //     return $query->result();
    // }

    // public function insert_cancel($data) {
    //     return $this->db->insert('cancel_booking', $data); // Replace 'enquiries' with your actual table name
    // }

    // public function getItemsWithCategories() {
    //     $this->db->select('item.item_id, item.item_name, item.price1, category.category_name');
    //     $this->db->from('item');
    //     $this->db->join('category', 'item.category_id = category.category_id');
    //     $query = $this->db->get();
    //     $items = $query->result_array();
    //     $result = [];
    //     foreach ($items as $item) {
    //         $categoryName = $item['category_name'];
    //         if (!isset($result[$categoryName])) {
    //             $result[$categoryName] = [];
    //         }
    //         $result[$categoryName][] = [
    //             'item_id' => $item['item_id'],
    //             'item_name' => $item['item_name'],
    //             'price1' => $item['price1']
    //         ];
    //     }
    //     return $result;
    // }
    // public function insert_occupy_item($data) {
    //     return $this->db->insert('room_occupy_items', $data);
    // }
    // public function insert_enquiry_batch($data) {
    //     return $this->db->insert_batch('room_booking', $data);
    // }
    // public function insert_occupy($data) {
    //     $this->db->insert('room_occupy', $data);
    //     return $this->db->insert_id();  // Return the ID of the inserted record
    // }
    // public function insert_batch_occupy($data) {
    //     $inserted_ids = [];
    //     foreach ($data as $row) {
    //         $this->db->insert('room_occupy', $row);
    //         $inserted_ids[] = $this->db->insert_id();
    //     }
    //     return $inserted_ids;
    // }
    // public function get_occupied_room_item() {
    //     $this->db->select('room_occupy_items.*');
    //     $this->db->from('room_occupy_items');
    //     $this->db->join('room_occupy', 'room_occupy.occupy_id = room_occupy_items.occupy_id');
    //     $this->db->where('room_occupy_items.status', '1');
    //     $query = $this->db->get();
    //     return $query->result();
    // }
    // // Function to fetch items with their associated room occupy details
    // public function getItemsWithOccupyDetails($occupy_id) {
    //     $this->db->select('room_occupy_items.*, room_occupy.room_name,hotel_room.roomno,hotel_room.*,
    //      room_occupy.user_name, room_occupy.email');
    //     $this->db->from('room_occupy_items');
    //     $this->db->join('room_occupy', 'room_occupy.occupy_id = room_occupy_items.occupy_id');
    //     $this->db->join('hotel_room', 'hotel_room.hotel_roomid = room_occupy_items.hotel_roomid');
    //     $this->db->where('room_occupy_items.status', '1');
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    // public function update_occupy($occupy_id, $data) {
    //     $this->db->where('occupy_id', $occupy_id);
    //     return $this->db->update('room_occupy', $data);
    // }


    // public function update_item_status_and_occupy_id($item_ids, $occupy_ids, $status) {
    //     // Sanitize and validate input data
    //     if (empty($item_ids) || empty($occupy_ids) || !isset($status)) {
    //         return false;
    //     }
    //     if (!is_array($item_ids) || !is_array($occupy_ids)) {
    //         return false;
    //     }
    //     $this->db->trans_begin();
    //     try {
    //         $this->db->where_in('occupy_itemid', $item_ids);
    //         $this->db->update('room_occupy_items', ['status' => $status]);
    //         log_message('debug', 'SQL for item update: ' . $this->db->last_query());
    //         // Update occupy status
    //       // $this->db->where_in('occupy_id', $occupy_ids);
    //       //  $this->db->update('room_occupy_items', ['status' => $status]);
    //         log_message('debug', 'SQL for occupy update: ' . $this->db->last_query());
    //         // Check if the transaction was successful
    //         if ($this->db->trans_status() === FALSE) {
    //             // Rollback the transaction
    //             $this->db->trans_rollback();
    //             return false;
    //         } else {
    //             // Commit the transaction
    //             $this->db->trans_commit();
    //             return true;
    //         }
    //     } catch (Exception $e) {
    //         // Rollback the transaction on exception
    //         $this->db->trans_rollback();
    //         return false;
    //     }
    // }
    
 
    // public function get_roomdetails_by_booking_ids($bookingIdsArray) {
    //     // Prepare the SQL query to handle multiple booking IDs
    //     $this->db->select('room_occupy.*,room_occupy_items.*, room_booking.*, hotel_room.status AS room_status, hotel_room.roomtypeid, 
    //     hotel_room.roomno, hotel_room.hotel_roomid, room_booking.noofguests, room_booking.payment_method,
    //      room_booking.card_amount, room_booking.cash_amount, room_occupy.room_name');
    //     $this->db->from('room_occupy');
    //     $this->db->join('hotel_room', 'FIND_IN_SET(hotel_room.hotel_roomid, room_occupy.hotel_roomid) > 0');
    //     $this->db->join('room_booking', 'room_booking.hotel_roomid = room_occupy.hotel_roomid');
    //     $this->db->join('room_occupy_items', 'room_occupy_items.booking_id = room_occupy.booking_id');
    //     $this->db->where_in('room_booking.booking_id', $bookingIdsArray);
    //     $this->db->where('room_occupy_items.status', '1');
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }
    
    
    //     public function insertagent($insertagent){
    //         if($this->db->insert('agent', $insertagent)){
    //             return true;
    //         } else {
    //             return false;
    //         } 
    //     }

    //     public function insertcustomer($insertcustomer){
    //         if($this->db->insert('customer', $insertcustomer)){
    //             return true;
    //         } else {
    //             return false;
    //         } 
    //     }

    //     public function inserthotel($inserthotel){
    //         if($this->db->insert('hotel', $inserthotel)){
    //             return true;
    //         } else {
    //             return false;
    //         } 
    //     }

    //     public function get_hotel_details_by_hotel_id($hotel_id) {
    //         $this->db->select('*');
    //         $this->db->from('hotel'); // Assuming your table is named 'hotels'
    //         $this->db->where('hotel_id', $hotel_id); // Fetch by hotel ID
    //         $query = $this->db->get();
    //         if ($query->num_rows() > 0) {
    //             return $query->result(); // Return all hotel details
    //         } else {
    //             return false; // Return false if no record is found
    //         }
    //     }

    //     public function update_hotel($hotel_id, $hotel_data) {
    //         $this->db->where('hotel_id', $hotel_id);
    //         return $this->db->update('hotel', $hotel_data);
    //     }

    //     public function getbank(){
    //         $this->db->select('*');    
    //         $this->db->from('bank');
    //         $this->db->where('status','1');
    //         $query= $this->db->get();
    //             return $query->result();
    //     }


}






