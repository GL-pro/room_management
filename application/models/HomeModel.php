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


    // public function getRoomTypesWithRoomsGroupedByType1() {
    //     $this->db->select('admin_room.roomtype, hotel_room.room_status AS status, hotel_room.roomno, hotel_room.hotel_roomid, room_booking.customer_id');
    //     $this->db->from('hotel_room');
    //     $this->db->join('admin_room', 'admin_room.roomid = hotel_room.roomtypeid');
    //     // Use LEFT JOIN to include all rooms, even those not booked
    //     $this->db->join('room_booking', 'room_booking.hotel_roomid = hotel_room.hotel_roomid', 'left');
    //     $this->db->order_by('hotel_room.roomtypeid', 'ASC');
    //     $query = $this->db->get();
    //     $rooms = $query->result_array();
    //     $groupedRooms = [];
    //     foreach ($rooms as $room) {
    //         $groupedRooms[$room['roomtype']][] = $room;
    //     }
    //     return $groupedRooms;
    // }
    

    // public function getRoomTypesWithRoomsGroupedByType11() {
    //     $query = $this->db->query("
    //         SELECT hr.roomtypeid, rt.roomtype, hr.hotel_roomid, hr.roomno, hr.room_name, 
    //                IF(rb.booking_status IS NOT NULL, rb.booking_status, hr.room_status) AS status,
    //                rb.checkin, rb.checkout,rb.booking_id
    //         FROM hotel_room hr
    //         LEFT JOIN room_booking rb ON hr.hotel_roomid = rb.hotel_roomid 
    //             AND NOW() BETWEEN rb.checkin AND rb.checkout
    //         LEFT JOIN admin_room rt ON hr.roomtypeid = rt.roomid
    //     ");
    //     $rooms = $query->result_array();
    //     // Group rooms by type
    //     $grouped_rooms = [];
    //     foreach ($rooms as $room) {
    //         $room_type = $room['roomtype']; // Assuming you have room_type_name from room_type table
    //         $grouped_rooms[$room_type][] = $room;
    //     }
    //     return $grouped_rooms; // Return the grouped rooms
    // }
    

    public function getRoomTypesWithRoomsGroupedByType11() {
        $query = $this->db->query("
            SELECT hr.roomtypeid, rt.roomtype, hr.hotel_roomid, hr.roomno, hr.room_name, 
                   IF(rb.booking_status IS NOT NULL, rb.booking_status, hr.room_status) AS status,
                   rb.checkin, rb.checkout, rb.booking_id
            FROM hotel_room hr
            LEFT JOIN room_booking rb ON hr.hotel_roomid = rb.hotel_roomid 
                AND rb.checkin = (
                    SELECT MAX(rb_inner.checkin)
                    FROM room_booking rb_inner
                    WHERE rb_inner.hotel_roomid = hr.hotel_roomid
                    AND NOW() BETWEEN rb_inner.checkin AND rb_inner.checkout
                )
            LEFT JOIN admin_room rt ON hr.roomtypeid = rt.roomid
            GROUP BY hr.hotel_roomid
        ");
        $rooms = $query->result_array();
        
        // Group rooms by type
        $grouped_rooms = [];
        foreach ($rooms as $room) {
            $room_type = $room['roomtype']; // Assuming you have room_type_name from room_type table
            $grouped_rooms[$room_type][] = $room;
        }
        return $grouped_rooms; // Return the grouped rooms
    }

    

    
    public function updateRoomStatus() {
        $this->db->query("
            UPDATE hotel_room hr
            SET hr.room_status = 'available'
            WHERE hr.hotel_roomid NOT IN (
                SELECT rb.hotel_roomid
                FROM room_booking rb
                WHERE NOW() BETWEEN rb.checkin AND rb.checkout
            )
        ");
    }

   



    // public function getBookingsByDateRange($start_date, $end_date) {
    //     date_default_timezone_set('Asia/Kolkata');
    //     $this->db->select('rb.booking_id, c.customer_name, rb.booking_status, rb.checkin, rb.checkout');
    //     $this->db->from('room_booking rb');
    //     $this->db->join('customer c', 'rb.customer_id = c.customer_id'); // Assuming the foreign key is customer_id
    //     $this->db->join('hotel_room r', 'rb.hotel_roomid = r.hotel_roomid'); // Join with the rooms table
    //     $this->db->where('DATE(rb.checkin) <=', $end_date);
    //     $this->db->where('DATE(rb.checkout) >=', $start_date);
    //     $query = $this->db->get();
        
    //     $bookings = $query->result_array();
    //     $date_counts = [];
    
    //     // Prepare booking counts for each date
    //     foreach ($bookings as $booking) {
    //         $current_date = $booking['checkin'];
    //         while ($current_date <= $booking['checkout']) {
    //             $current_date_str = date('Y-m-d', strtotime($current_date));
    //             if (!isset($date_counts[$current_date_str])) {
    //                 $date_counts[$current_date_str] = [];
    //             }
    //             if (!isset($date_counts[$current_date_str][$booking['booking_status']])) {
    //                 $date_counts[$current_date_str][$booking['booking_status']] = [];
    //             }
    //             // Store the booking details
    //             $date_counts[$current_date_str][$booking['booking_status']][] = [
    //                 'booking_id' => $booking['booking_id'],
    //                 'customer_name' => $booking['customer_name'],
    //               //  'customer_email' => $booking['customer_email'],
    //               //  'customer_phone' => $booking['customer_phone'],
    //               //  'room_number' => $booking['room_number'], // Include room number
    //             ];
    //             $current_date = date('Y-m-d', strtotime($current_date . ' +1 day'));
    //         }
    //     }
    
    //     // Format the result for the response
    //     $result = [];
    //     foreach ($date_counts as $date => $statuses) {
    //         foreach ($statuses as $status => $bookings) {
    //             $count = count($bookings);
    //             // Extract the first booking for display (or you can choose to list all)
    //             $firstBooking = $bookings[0];
    //             $result[] = [
    //                 'booking_date' => $date,
    //                 'booking_status' => $status,
    //                 'count' => $count,
    //                 'booking_id' => $firstBooking['booking_id'],
    //                 'customer_name' => $firstBooking['customer_name'],
    //                // 'customer_email' => $firstBooking['customer_email'],
    //                // 'customer_phone' => $firstBooking['customer_phone'],
    //               //  'room_number' => $firstBooking['room_number'],
    //             ];
    //         }
    //     }
    
    //     return $result;
    // }
    
    public function getBookingCountsByDateRange($start_date, $end_date) {
        date_default_timezone_set('Asia/Kolkata');
        $this->db->select('rb.booking_id, c.customer_name, rb.booking_status, rb.checkin, rb.checkout');
        $this->db->from('room_booking rb');
        $this->db->join('customer c', 'rb.customer_id = c.customer_id');
        $this->db->where('rb.booking_status', 'booked'); // Only fetch 'booked' status
        $this->db->where('DATE(rb.checkin) <=', $end_date);
        $this->db->where('DATE(rb.checkout) >=', $start_date);
        $query = $this->db->get();
        
        return $this->_prepareDateCounts($query->result_array());
    }
    
    public function getOccupiedCountsByDateRange($start_date, $end_date) {
        date_default_timezone_set('Asia/Kolkata');
        $this->db->select('rb.booking_id, c.customer_name, rb.booking_status, rb.checkin, rb.checkout');
        $this->db->from('room_booking rb');
        $this->db->join('customer c', 'rb.customer_id = c.customer_id');
        $this->db->where('rb.booking_status', 'occupied'); // Corrected to use booking_status
        $this->db->where('DATE(rb.checkin) <=', $end_date);
        $this->db->where('DATE(rb.checkout) >=', $start_date);
        $query = $this->db->get();
        
        return $this->_prepareDateCounts($query->result_array());
    }
    


    private function _prepareDateCounts($bookings) {
        $date_counts = [];
        
        foreach ($bookings as $booking) {
            $current_date = $booking['checkin'];
            while ($current_date <= $booking['checkout']) {
                $current_date_str = date('Y-m-d', strtotime($current_date));
                if (!isset($date_counts[$current_date_str])) {
                    $date_counts[$current_date_str] = [];
                }
                if (!isset($date_counts[$current_date_str][$booking['booking_status']])) {
                    $date_counts[$current_date_str][$booking['booking_status']] = [];
                }
                $date_counts[$current_date_str][$booking['booking_status']][] = [
                    'booking_id' => $booking['booking_id'],
                    'customer_name' => $booking['customer_name'],
                ];
                $current_date = date('Y-m-d', strtotime($current_date . ' +1 day'));
            }
        }
    
        $result = [];
        foreach ($date_counts as $date => $statuses) {
            foreach ($statuses as $status => $bookings) {
                $count = count($bookings);
                $firstBooking = $bookings[0];
                $result[] = [
                    'booking_date' => $date,
                    'booking_status' => $status,
                    'count' => $count,
                    'booking_id' => $firstBooking['booking_id'],
                    'customer_name' => $firstBooking['customer_name'],
                ];
            }
        }
    
        return $result;
    }

    
    
    
    public function addCustomer($data) {
        return $this->db->insert('customer', $data); // Insert into customer table
    }
    public function getAgents() {
        $this->db->select('*');
        $this->db->from('agent');
        $this->db->where('status', '1');
        $query = $this->db->get();
        return $query->result_array(); // Change to result_array for easier debugging
    }
    public function getCustomers() {
        $this->db->select('customer_id, customer_name'); // Adjust fields as necessary
        $query = $this->db->get('customer');
        return $query->result_array(); // Return an associative array
    }

    public function getRoomDetails($room_id) {
        $this->db->select('hotel_room.*,admin_room.*,hotel_room.noofguests,hotel_room.extguests,hotel_room.room_name, 
        hotel_room.roomno, admin_room.roomtype,hotel_room.hotel_roomid');
        $this->db->from('hotel_room');
        $this->db->join('admin_room', 'hotel_room.roomtypeid = admin_room.roomid', 'inner');
        $this->db->where('hotel_room.hotel_roomid', $room_id); // Fetch details based on hotel_roomid
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array(); // Return the first row as an associative array
        }
        return null; // Return null if no data is found
    }
    
    public function addAgent($data) {
        return $this->db->insert('agent', $data); // Insert into customer table
    }


    public function insert_room_booking($data)
    {
        $this->db->insert('room_booking', $data);
        return $this->db->insert_id(); // Returns the booking ID
    }
    public function insert_room_booking_details($data)
    {
        $this->db->insert('room_booking_details', $data);
    }
    // public function insert_guest_details($data)
    // {
    //     $this->db->insert('guest_details', $data);
    //     return $this->db->insert_id(); // Return the last inserted ID
    // }
    public function insert_guest_details($guest_data) {
        $this->db->insert('guest_details', $guest_data);
        return $this->db->insert_id(); // Return the ID of the newly inserted guest
    }
    
   
public function delete_guest_details($guest_id) {
    return $this->db->delete('guest_details', ['guest_id' => $guest_id]);
}
    
    public function insert_room_status_log($data)
    {
        $this->db->insert('room_status_log', $data);
    }

    public function checkRoomAvailability($hotel_roomid, $checkin, $checkout) {
        // Ensure checkin and checkout are provided
        if (empty($checkin) || empty($checkout)) {
            return false; // No need to check availability if dates are missing
        }
    
        $this->db->select('*');
        $this->db->from('room_booking');
        $this->db->where('hotel_roomid', $hotel_roomid);
        $this->db->where('booking_status !=', 'cancelled'); // Exclude canceled bookings
        $this->db->group_start();
        $this->db->where('checkin <', $checkout); // Checkin should be before checkout
        $this->db->where('checkout >', $checkin); // Checkout should be after checkin
        $this->db->group_end();
    
        $query = $this->db->get();
        return $query->num_rows() > 0; // Return true if there are conflicting bookings
    }
    


    // public function getItemsForRoom($room_id) {
    //     $this->db->where('room_id', $room_id); // Adjust the column name according to your database schema
    //     $query = $this->db->get('item'); // Replace 'items' with your actual items table
    //     return $query->result_array();
    // }
    
    public function update_room_status($room_id, $status)
    {
        $data = ['room_status' => $status];
        $this->db->where('hotel_roomid', $room_id);
        return $this->db->update('hotel_room', $data);
    }

    // public function update_room_status1($room_id, $status)
    // {
    //     $data = ['room_status' => $status];
    //     $this->db->where('hotel_roomid', $room_id);
    //     return $this->db->update('hotel_room', $data);
    // }


    public function getRoomTypes() {
        $this->db->select('roomtype'); // Adjust according to your database structure
        $this->db->distinct(); // Get unique room types
        $query = $this->db->get('admin_room'); // Replace 'rooms' with your actual table name
        return $query->result_array();
    }
    public function getHotelRoom() {
        $this->db->select('room_name'); // Adjust according to your database structure
        $this->db->distinct(); // Get unique room types
        $query = $this->db->get('hotel_room'); // Replace 'rooms' with your actual table name
        return $query->result_array();
    }
    public function getsearchbydate($filterDate = null, $filterType = null, $filterRoom = null)
    {
        $this->db->select('room_booking.*, hotel_room.roomtypeid, hotel_room.roomno, hotel_room.status');
        $this->db->from('room_booking');
        $this->db->join('hotel_room', 'hotel_room.hotel_roomid = room_booking.hotel_roomid');
        $this->db->join('admin_room', 'admin_room.roomid = hotel_room.roomtypeid', 'left');
    
        // Apply filters
        if (!empty($filterDate)) {
            $this->db->where('room_booking.checkin <=', $filterDate);
            $this->db->where('room_booking.checkout >=', $filterDate);
        }
        if (!empty($filterType)) {
            $this->db->where('admin_room.roomtype', $filterType);
        }
        if (!empty($filterRoom)) {
            $this->db->where('hotel_room.room_name', $filterRoom);
        }
    
        // Check status
        $this->db->where('room_booking.status', 1);
    
        $query = $this->db->get();
        return $query->result_array();
    }
    
        public function updateCategory($roomid, $roomtype, $status, $roomtype_image) {
        $data = array(
            'category_name' => $roomtype,
            'status' => $status,
            'category_image' => $roomtype_image
        );
        $this->db->where('category_id', $roomid);
        $this->db->update('category', $data);
        return $this->db->affected_rows() > 0;
    }

    public function getItemsWithCategories() {
        $this->db->select('item.item_id, item.item_name, item.price1, category.category_name, subcategory.subcategory_name');
        $this->db->from('item');
        $this->db->join('category', 'item.category_id = category.category_id');
        $this->db->join('subcategory', 'item.subcategory_id = subcategory.subcategory_id', 'left'); // Adjust as needed
        $query = $this->db->get();
        $items = $query->result_array();
    
        $result = [];
        foreach ($items as $item) {
            $categoryName = $item['category_name'];
            if (!isset($result[$categoryName])) {
                $result[$categoryName] = [];
            }
            $result[$categoryName][] = [
                'item_id' => $item['item_id'],
                'item_name' => $item['item_name'],
                'price1' => $item['price1'],
                'subcategory_name' => $item['subcategory_name']
            ];
        }
        return $result;
    }
    
    public function insert_room_items($data)
    {
        return $this->db->insert('room_item_details', $data); // Replace 'room_item_details' with your actual table name
    }

    public function getBookingDetails($room_ids = []) {
        // Selecting the booking details along with agent and customer information
        $this->db->select('rb.*, a.agent_name, c.customer_name');
        $this->db->from('room_booking rb'); // Use an alias for the room booking table
        $this->db->join('agent a', 'rb.agent_id = a.agent_id', 'left'); // Join with agents table
        $this->db->join('customer c', 'rb.customer_id = c.customer_id', 'left'); // Join with customers table
        // Check if there are room IDs to filter by
        if (!empty($room_ids)) {
            $this->db->where_in('rb.hotel_roomid', $room_ids); // Use 'rb.hotel_roomid' for clarity
        }
        // Execute the query
        $query = $this->db->get();
        return $query->result_array(); // Return the results as an associative array
    }
    
    public function get_bookings_by_date($date)
    {
        // Query to fetch room bookings along with customer details
        $this->db->select('room_booking.*, customer.customer_name, customer.email, customer.phone');
        $this->db->from('room_booking');
        $this->db->join('customer', 'customer.customer_id = room_booking.customer_id', 'left'); // Join customer table
        // Use DATE() to ignore the time part and compare only the date
        $this->db->where("('$date' = DATE(room_booking.checkin) OR '$date' = DATE(room_booking.checkout) OR '$date' BETWEEN DATE(room_booking.checkin) AND DATE(room_booking.checkout))");
        $query = $this->db->get();
        return $query->result();
    }
    
    
    public function get_all_bookings()
{
    $this->db->select('*');
    $this->db->from('room_booking');
    $query = $this->db->get();
    return $query->result();
}

public function update_status_booking($room_id, $status) {
    $this->db->where('booking_id', $room_id);
    $this->db->update('room_booking', ['status' => $status]);
}

public function getBookedDatesByRoomId($roomId) {
    $this->db->select('checkin, checkout');
    $this->db->from('room_booking');
    $this->db->where('hotel_roomid', $roomId);
    $this->db->where('booking_status', 'booked');
    $query = $this->db->get();
    return $query->result();
}
public function getBookingDetailsById($booking_id) {
    $this->db->select('room_booking.*, hotel_room.*, admin_room.*, agent.*, customer.*, agent.agent_name, agent.agent_id,
     customer.customer_name, customer.email AS customer_email, room_booking_details.*, room_booking_details.extra_guest_count');
    $this->db->from('room_booking');
    $this->db->join('room_booking_details', 'room_booking_details.booking_id = room_booking.booking_id', 'left');
    $this->db->join('customer', 'customer.customer_id = room_booking.customer_id', 'left');
    $this->db->join('agent', 'agent.agent_id = room_booking.agent_id', 'left');
    $this->db->join('hotel_room', 'hotel_room.hotel_roomid = room_booking.hotel_roomid');
    $this->db->join('admin_room', 'hotel_room.roomtypeid = admin_room.roomid', 'inner');
    $this->db->where('room_booking.booking_id', $booking_id);
    $query = $this->db->get();
    $result = $query->result_array();
    // Fetch guest details and items separately
    foreach ($result as &$booking) {
        $booking['guests'] = $this->getGuestDetailsByBookingId($booking_id, $booking['hotel_roomid']);
        $booking['items'] = $this->getItemsByBookingIdAndRoomId1($booking_id, $booking['hotel_roomid']);
    }
    return $result;
}
public function getGuestDetailsByBookingId($booking_id, $hotel_roomid) {
    $this->db->select('guest_details.*');
    $this->db->from('guest_details');
    $this->db->where('booking_id', $booking_id);
    $this->db->where('hotel_roomid', $hotel_roomid);
    $query = $this->db->get();
    return $query->result_array();
}
public function getItemsByBookingIdAndRoomId1($booking_id, $hotel_roomid) {
    $this->db->select('room_item_details.*, item.*');
    $this->db->from('room_item_details');
    $this->db->join('item', 'item.item_id = room_item_details.item_id', 'left');
    $this->db->where('room_item_details.booking_id', $booking_id);
    $this->db->where('room_item_details.hotel_roomid', $hotel_roomid);
    $query = $this->db->get();
    return $query->result_array();
}

// public function getBookingDetailsById($booking_id) {
//     $this->db->distinct(); // Ensure unique results
//     $this->db->select('room_booking.*,hotel_room.*,admin_room.*,agent.*,customer.*,agent.agent_name,agent.agent_id,
//      customer.customer_name, customer.email AS customer_email,item.*,room_item_details.*,room_booking_details.*,
//      room_booking_details.extra_guest_count,guest_details.*');
//     $this->db->from('room_booking'); 
//     $this->db->join('room_booking_details', 'room_booking_details.booking_id = room_booking.booking_id', 'left');
//     $this->db->join('room_item_details', 'room_item_details.booking_id = room_booking.booking_id', 'left');
//     $this->db->join('guest_details', 'guest_details.booking_id = room_booking.booking_id', 'left');
//     $this->db->join('item', 'item.item_id = room_item_details.item_id', 'left');
//     $this->db->join('customer', 'customer.customer_id = room_booking.customer_id', 'left'); 
//     $this->db->join('agent', 'agent.agent_id = room_booking.agent_id', 'left'); 
//     $this->db->join('hotel_room', 'hotel_room.hotel_roomid = room_booking.hotel_roomid');
//     $this->db->join('admin_room', 'hotel_room.roomtypeid = admin_room.roomid', 'inner');
//     $this->db->where('room_booking.booking_id', $booking_id);
//     $query = $this->db->get();
//     return $query->result_array(); // Ensure this returns an array
//     $this->db->distinct(); // Ensure unique results for guests
// }
// public function getBookingDetailsById($booking_id) {
//     // Start with the main booking query
//     $this->db->select('room_booking.*,hotel_room.*,hotel_room.hotel_roomid,admin_room.*,agent.*,customer.*,agent.agent_name,agent.agent_id,
//           customer.customer_name, customer.email AS customer_email,item.*,room_item_details.*,room_booking_details.*,
//          room_booking_details.extra_guest_count,guest_details.*');
//         $this->db->from('room_booking'); 
//         $this->db->join('room_booking_details', 'room_booking_details.booking_id = room_booking.booking_id', 'left');
//         $this->db->join('room_item_details', 'room_item_details.booking_id = room_booking.booking_id', 'left');
//         $this->db->join('guest_details', 'guest_details.booking_id = room_booking.booking_id', 'left');
//         $this->db->join('item', 'item.item_id = room_item_details.item_id', 'left');
//         $this->db->join('customer', 'customer.customer_id = room_booking.customer_id', 'left'); 
//         $this->db->join('agent', 'agent.agent_id = room_booking.agent_id', 'left'); 
//         $this->db->join('hotel_room', 'hotel_room.hotel_roomid = room_booking.hotel_roomid');
//         $this->db->join('admin_room', 'hotel_room.roomtypeid = admin_room.roomid', 'inner');
//         $this->db->where('room_booking.booking_id', $booking_id);
//     $query = $this->db->get();
    
//     $bookingDetails = $query->result_array(); // Fetch the booking details
    
//     // Now, fetch distinct guest details separately to avoid duplication
//     $this->db->distinct(); // Ensure unique results for guests
//     $this->db->select('guest_details.*');
//     $this->db->from('guest_details');
//     $this->db->where('guest_details.booking_id', $booking_id);
//     $guestQuery = $this->db->get();
    
//     $guestDetails = $guestQuery->result_array(); // Fetch the unique guest details

//     // Merge booking and guest details in a single array if needed
//     return [
//         'booking' => $bookingDetails,
//         'guests' => $guestDetails,
//     ];
// }

public function getItemsByBookingIdAndRoomId($booking_id, $hotel_roomid) {
    $this->db->select('item.*, room_item_details.*');
    $this->db->from('room_item_details');
    $this->db->join('item', 'item.item_id = room_item_details.item_id', 'left');
    $this->db->where('room_item_details.booking_id', $booking_id);
    $this->db->where('room_item_details.hotel_roomid', $hotel_roomid);
    $this->db->where('room_item_details.status', '1');
    $query = $this->db->get();
    return $query->result_array();
}
public function update_room_booking($booking_id, $hotel_roomid, $booking_data)
{
    $this->db->where('booking_id', $booking_id);
    $this->db->where('hotel_roomid', $hotel_roomid);
    $this->db->update('room_booking', $booking_data);
    if ($this->db->affected_rows() > 0) {
        return true;
    } else {
        return false;
    }
}
public function update_room_booking_details($booking_id, $hotel_roomid, $room_detail_data)
{
    $this->db->where('booking_id', $booking_id);
    $this->db->where('hotel_roomid', $hotel_roomid);
    return $this->db->update('room_booking_details', $room_detail_data);
}


public function update_room_status_log($booking_id, $hotel_roomid, $room_status_log)
{
    $this->db->where('booking_id', $booking_id);
    $this->db->where('hotel_roomid', $hotel_roomid);
    return $this->db->update('room_status_log', $room_status_log);
}

// public function update_guest_details($guest_id, $guest_data) {
//     // Make sure the query is using the guest_id to update the specific guest details
//     $this->db->where('guest_id', $guest_id);
//     $this->db->update('guest_details', $guest_data);
//     return $this->db->affected_rows();
// }


public function delete_items_by_booking_id($booking_id)
{
    if (empty($booking_id)) {
        return false; 
    }
    $this->db->where('booking_id', $booking_id);
    $this->db->delete('item');
    if ($this->db->affected_rows() > 0) {
        return true; 
    } else {
        return false;
    }
}

public function update_guest_details($guest_id, $data)
{
    $this->db->where('guest_id', $guest_id);
    return $this->db->update('guest_details', $data);
}



// public function get_guest_by_booking_and_code($booking_id, $hotel_roomid,  $guest_phone)
// {
//     $this->db->where('booking_id', $booking_id);
//     $this->db->where('hotel_roomid', $hotel_roomid);

//     $this->db->where('phone', $guest_phone);

//     $query = $this->db->get('guest_details');

//     if ($query->num_rows() > 0) {
//         return $query->row_array(); // Return the guest details as an array
//     } else {
//         return null; // No matching guest found
//     }
// }

public function get_guest_by_booking_and_code($booking_id, $hotel_roomid, $guest_phone, $guest_code = null)
{
    $this->db->where('booking_id', $booking_id);
    $this->db->where('hotel_roomid', $hotel_roomid);
    $this->db->where('phone', $guest_phone);

    // If a guest code is provided, include it in the query
    if (!empty($guest_code)) {
        $this->db->where('guest_code', $guest_code);
    }

    $query = $this->db->get('guest_details');

    if ($query->num_rows() > 0) {
        return $query->row_array(); // Return the guest details as an array
    } else {
        return null; // No matching guest found
    }
}

public function get_booking_by_id($booking_id) {
    $this->db->where('booking_id', $booking_id);
    $query = $this->db->get('room_booking'); // Assume 'room_booking' is your table name
    if ($query->num_rows() > 0) {
        return $query->row_array(); // Return the first result as an associative array
    } else {
        return null; // Return null if no booking is found
    }
}

public function delete_guest($guest_id)
{
    $this->db->where('guest_id', $guest_id)->delete('guest_details');
}

public function get_guest_by_booking_and_name111($booking_id, $hotel_roomid, $guest_name, $guest_phone) {
    $this->db->select('guest_id');
    $this->db->where('booking_id', $booking_id);
    $this->db->where('hotel_roomid', $hotel_roomid);
    $this->db->where('guest_name', $guest_name);
    $this->db->where('phone', $guest_phone); // Add phone to make the query more unique
    $query = $this->db->get('guest_details');

    if ($query->num_rows() > 0) {
        return $query->row_array();
    }
    return false; // Return false if no guest is found
}

public function get_guest_by_booking_room_and_name($booking_id, $hotel_roomid, $guest_name) {
    $this->db->where('booking_id', $booking_id);
    $this->db->where('hotel_roomid', $hotel_roomid);
    $this->db->where('guest_name', $guest_name);
    $query = $this->db->get('guest_details');
    return $query->row_array();
}



public function update_guest_status($guest_id, $status) {
    if (empty($guest_id) || !isset($status)) {
        return false; // Return false if invalid data
    }

    $this->db->set('status', $status);
    $this->db->where('guest_id', $guest_id);
    return $this->db->update('guest_details'); // Assuming your table is 'guest_details'
}


public function update_booking_status($bookingId, $status) {
    // Ensure you are using the correct field names in your database
    $this->db->where('booking_id', $bookingId); // Use the correct column name for booking ID
    // Update the booking status
    return $this->db->update('room_booking', ['booking_status' => $status]); // Assuming 'booking_status' is the correct column name
}
public function insert_cancel_details($cancel_data) {
    return $this->db->insert('cancel_booking', $cancel_data); // Adjust the table name if necessary
}

public function insert_into_occupy_booking($occupy_data) {
    return $this->db->insert('occupy_booking', $occupy_data); // Adjust the table name if necessary
}

public function getBookingDetailsById1($booking_id) {
    $this->db->distinct(); // Ensure unique results
    $this->db->select('room_booking.*,hotel_room.*,admin_room.*,agent.*,customer.*,agent.agent_name,agent.agent_id,
     customer.customer_name, customer.email AS customer_email,item.*,room_item_details.*,room_booking_details.*,
     room_booking_details.extra_guest_count,guest_details.*');
    $this->db->from('room_booking'); 
    $this->db->join('room_booking_details', 'room_booking_details.booking_id = room_booking.booking_id', 'left');
    $this->db->join('room_item_details', 'room_item_details.booking_id = room_booking.booking_id', 'left');
    $this->db->join('guest_details', 'guest_details.booking_id = room_booking.booking_id', 'left');
    $this->db->join('item', 'item.item_id = room_item_details.item_id', 'left');
    $this->db->join('customer', 'customer.customer_id = room_booking.customer_id', 'left'); 
    $this->db->join('agent', 'agent.agent_id = room_booking.agent_id', 'left'); 
    $this->db->join('hotel_room', 'hotel_room.hotel_roomid = room_booking.hotel_roomid');
    $this->db->join('admin_room', 'hotel_room.roomtypeid = admin_room.roomid', 'inner');
    $this->db->where('room_booking.booking_id', $booking_id);
    $query = $this->db->get();

    return $query->row_array(); // Fetch a single row as an associative array
}


public function getRoomDetailsById($booking_id) {
    $this->db->distinct();
    $this->db->select('room_booking.*,hotel_room.*');
    $this->db->from('room_booking'); 
    $this->db->join('hotel_room', 'hotel_room.hotel_roomid = room_booking.hotel_roomid');
    $this->db->where('room_booking.booking_id', $booking_id);
    $query = $this->db->get();
    return $query->result_array(); // Return as an array of rows (for multiple guests)
}


public function getItemsDetailsById($booking_id) {
    $this->db->distinct();
    $this->db->select('room_booking.*,room_item_details.*,item.*');
    $this->db->from('room_booking'); 
    $this->db->join('room_item_details', 'room_item_details.booking_id = room_booking.booking_id', 'left');
    $this->db->join('item', 'item.item_id = room_item_details.item_id', 'left');
    $this->db->where('room_booking.booking_id', $booking_id);
    $query = $this->db->get();
    return $query->result_array(); // Return as an array of rows (for multiple guests)
}

public function getGuestsById($booking_id) {
    $this->db->distinct();
    $this->db->select('room_booking.*,guest_details.*');
    $this->db->from('room_booking'); 
    $this->db->join('guest_details', 'guest_details.booking_id = room_booking.booking_id', 'left');
    $this->db->where('room_booking.booking_id', $booking_id);
    $query = $this->db->get();
    return $query->result_array(); // Return as an array of rows (for multiple guests)
}



public function getCompanyDetails() {
    $this->db->select('hotel.*');
    $this->db->from('hotel'); // Adjust this to match your actual hotel table name
    $query = $this->db->get();
    return $query->row_array(); // Return a single row as an associative array
}



public function getAgentById($agent_id) {
    // Query to get agent details
    $this->db->where('agent_id', $agent_id);
    $query = $this->db->get('agent'); // Assuming agents is your agent table
    return $query->row_array();
}

public function getCustomerById($customer_id) {
    // Query to get customer details
    $this->db->where('customer_id', $customer_id);
    $query = $this->db->get('customer'); // Assuming customers is your customer table
    return $query->row_array();
}


public function get_hotel_details_by_hotel_id($hotel_id) {
    $this->db->select('*');
    $this->db->from('hotel'); // Assuming your table is named 'hotels'
    $this->db->where('hotel_id', $hotel_id); // Fetch by hotel ID
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->result(); // Return all hotel details
    } else {
        return false; // Return false if no record is found
    }
}


public function update_hotel($hotel_id, $hotel_data) {
    $this->db->where('hotel_id', $hotel_id);
    return $this->db->update('hotel', $hotel_data);
}
public function inserthotel($inserthotel){
    if($this->db->insert('hotel', $inserthotel)){
        return true;
    } else {
        return false;
    } 
}

public function insert_settlement($data) {
    return $this->db->insert('settlement', $data);
}


public function get_room_item($booking_id, $room_id, $item_id)
{
    // Query the database to find the item associated with the booking and room
    $this->db->select('*'); // Select all fields
    $this->db->from('room_item_details'); // Assuming the table name is room_items
    $this->db->where('booking_id', $booking_id);
    $this->db->where('hotel_roomid', $room_id);
    $this->db->where('item_id', $item_id); // Add item ID for filtering
    $query = $this->db->get();
    // Check if the item exists
    if ($query->num_rows() > 0) {
        return $query->row_array(); // Return the first row as an associative array
    } else {
        return null; // Return null if no item found
    }
}
public function update_room_item($item_id, $data)
{
    // Update the room item in the database
    $this->db->where('room_item_detail_id', $item_id); // Assuming the primary key is 'id'
    return $this->db->update('room_item_details', $data); // Assuming the table name is room_items
}


public function update_item_status($item_id, $room_id, $booking_id, $status) {
    $this->db->where('item_id', $item_id);
    $this->db->where('hotel_roomid', $room_id);
    $this->db->where('booking_id', $booking_id);
    $this->db->update('room_item_details', ['status' => $status]);
}

















// public function save_item($data) {
//     // Check if an item for this invoice and with this description already exists
//     $existing_item = $this->db->get_where($this->table, [
//         'invoice_id' => $data['invoice_id'],
//         'description' => $data['description']
//     ])->row();
//     if ($existing_item) {
//         // Update existing item
//         $this->db->where('id', $existing_item->id);
//         $this->db->update($this->table, $data);
//         return $existing_item->id;
//     } else {
//         // Insert new item
//         $this->db->insert($this->table, $data);
//         return $this->db->insert_id();
//     }
// }


// public function save_invoice($data) {
//     // Check if an invoice with this invoice_no already exists
//     $existing_invoice = $this->db->get_where($this->table, ['invoice_no' => $data['invoice_no']])->row();

//     if ($existing_invoice) {
//         // Update existing invoice
//         $this->db->where('id', $existing_invoice->id);
//         $this->db->update($this->table, $data);
//         return $existing_invoice->id;
//     } else {
//         // Insert new invoice
//         $this->db->insert($this->table, $data);
//         return $this->db->insert_id();
//     }
// }









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






