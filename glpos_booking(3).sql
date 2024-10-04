-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2024 at 01:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `glpos_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` bigint(20) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `usertype` text NOT NULL,
  `status` text NOT NULL,
  `date` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `email`, `password`, `usertype`, `status`, `date`) VALUES
(1, 'a@gmail.com', '1234', 'admin', 'active', '2024-08-15 16:14:27.000000');

-- --------------------------------------------------------

--
-- Table structure for table `admin_facility`
--

CREATE TABLE `admin_facility` (
  `subfacilityid` bigint(20) NOT NULL,
  `subfacilityname` text NOT NULL,
  `facilityid` bigint(20) NOT NULL,
  `status` text NOT NULL,
  `adding_date` datetime(6) DEFAULT NULL,
  `hotelid` bigint(20) NOT NULL,
  `usertype` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_facility`
--

INSERT INTO `admin_facility` (`subfacilityid`, `subfacilityname`, `facilityid`, `status`, `adding_date`, `hotelid`, `usertype`) VALUES
(18, 'FF', 9, '1', '2024-08-29 10:32:48.000000', 0, 'admin'),
(19, 'FFF', 9, '1', '2024-08-29 10:32:48.000000', 0, 'admin'),
(20, 'FFFF', 9, '1', '2024-08-29 10:32:48.000000', 0, 'admin'),
(21, 'GG', 10, '1', '2024-08-29 10:33:24.000000', 0, 'admin'),
(22, 'GGG', 10, '1', '2024-08-29 10:33:24.000000', 0, 'admin'),
(23, 'ee', 11, '1', '2024-08-29 10:50:25.000000', 0, 'admin'),
(24, 'eee', 11, '1', '2024-08-29 10:50:25.000000', 0, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admin_facility_type`
--

CREATE TABLE `admin_facility_type` (
  `facilityid` bigint(20) NOT NULL,
  `facilityname` text NOT NULL,
  `facility_image` text NOT NULL,
  `status` text NOT NULL,
  `adding_date` datetime(6) DEFAULT NULL,
  `hotelid` bigint(20) NOT NULL,
  `usertype` text NOT NULL,
  `approvestatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_facility_type`
--

INSERT INTO `admin_facility_type` (`facilityid`, `facilityname`, `facility_image`, `status`, `adding_date`, `hotelid`, `usertype`, `approvestatus`) VALUES
(9, 'F', '', '1', '2024-08-29 10:32:48.000000', 0, 'admin', 'Approved'),
(10, 'G', '', '1', '2024-08-29 10:33:24.000000', 0, 'admin', 'Approved'),
(11, 'e', '', '1', '2024-08-29 10:50:25.000000', 0, 'admin', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `admin_room`
--

CREATE TABLE `admin_room` (
  `roomid` bigint(20) NOT NULL,
  `roomtype` text NOT NULL,
  `status` text NOT NULL,
  `adminstatus` text NOT NULL,
  `date` datetime(6) DEFAULT NULL,
  `roomtype_image` text NOT NULL,
  `approvestatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_room`
--

INSERT INTO `admin_room` (`roomid`, `roomtype`, `status`, `adminstatus`, `date`, `roomtype_image`, `approvestatus`) VALUES
(14, 'SINGLE ', '1', 'admin', '2024-08-29 10:15:33.000000', '', 'Approved'),
(15, 'DOUBLE ', '1', 'admin', '2024-08-29 10:19:32.000000', '66cffddc647be.jpeg', 'Approved'),
(16, 'rrrr', '1', 'staff', '2024-10-01 15:01:13.000000', '', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `agent_id` bigint(20) NOT NULL,
  `agent_name` text NOT NULL,
  `address` text NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` text NOT NULL,
  `commission_per` text NOT NULL,
  `commission_amt` text NOT NULL,
  `date` datetime(6) DEFAULT NULL,
  `status` text NOT NULL,
  `admin_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`agent_id`, `agent_name`, `address`, `phone`, `email`, `commission_per`, `commission_amt`, `date`, `status`, `admin_status`) VALUES
(6, 'Griffith Greene', 'Non cupidatat odio e', 9875858585, 'cimiwipuv@mailinator.com', 'Velit in aut quia i', 'Commodi dolores ea m', '2024-09-20 14:15:28.000000', '1', 'agent'),
(7, 'Owen Summers', 'Fugit in expedita a', 9898989898, 'besury@mailinator.com', '', '', '2024-09-20 15:49:13.000000', '1', 'agent'),
(8, 'Marcia Knowles', '75 East Rocky First Extension', 1, 'bere@mailinator.com', 'Omnis lorem architec', 'Voluptatum alias eos', '2024-09-25 15:29:02.000000', '1', 'staff'),
(9, 'agent1', 'fgd', 999999999, 'a@gmail.com', '10', '500', '2024-09-25 15:29:56.000000', '1', 'staff'),
(10, 'manu', '71 North First Road', 1, 'wovi@mailinator.com', 'Impedit accusantium', 'Culpa molestiae face', '2024-09-30 11:31:08.000000', '1', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bank_id` int(50) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `bank_name`, `status`, `date`) VALUES
(1, 'State Bank of India (SBI)', '1', '2024-05-14 16:12:58.000000'),
(2, 'Federal', '1', '2024-05-14 16:13:01.000000'),
(3, 'South Indian Bank', '1', '2024-05-14 16:13:04.000000'),
(4, 'Canara Bank', '1', '2024-05-14 16:13:07.000000'),
(5, 'Punjab National Bank (PNB)', '1', '2024-05-14 16:09:01.000000'),
(6, 'ICICI Bank', '1', '2024-05-14 16:09:01.000000'),
(7, 'Union Bank of India', '1', '2024-05-14 16:09:01.000000'),
(8, 'Bank of Baroda (BOB)', '1', '2024-05-14 16:09:01.000000'),
(9, 'IDBI Bank', '1', '2024-05-14 16:11:36.000000'),
(10, 'Indian Overseas Bank (IOB)', '1', '2024-05-14 16:11:40.000000'),
(11, 'Kerala Gramin Bank', '1', '2024-05-14 16:10:38.000000'),
(12, 'Axis Bank', '1', '2024-05-14 16:10:38.000000'),
(13, 'Corporation Bank', '1', '2024-05-14 16:10:38.000000'),
(14, 'Vijaya Bank', '1', '2024-05-14 16:10:38.000000'),
(15, 'Dhanlaxmi Bank', '1', '2024-05-14 16:13:11.000000'),
(16, 'Karur Vysya Bank', '1', '2024-05-14 16:13:14.000000'),
(17, 'Catholic Syrian Bank', '1', '2024-05-14 16:13:34.000000'),
(18, 'Yes Bank', '1', '2024-05-14 16:13:34.000000'),
(19, 'IndusInd Bank', '1', '2024-05-14 16:13:34.000000'),
(20, 'Karnataka Bank', '1', '2024-05-14 16:13:34.000000'),
(21, 'Allahabad Bank', '1', '2024-05-14 16:15:54.000000'),
(22, 'Central Bank of India', '1', '2024-05-14 16:15:58.000000'),
(23, 'Tamilnad Mercantile Bank (TMB)', '1', '2024-05-14 16:14:54.000000'),
(24, 'UCO Bank', '1', '2024-05-14 16:14:54.000000'),
(25, 'Punjab and Sind Bank', '1', '2024-05-14 16:16:42.000000'),
(26, 'Kotak Mahindra Bank', '1', '2024-05-14 16:16:42.000000'),
(27, 'RBL Bank', '1', '2024-05-14 16:16:42.000000'),
(28, 'Indian Bank', '1', '2024-05-14 16:16:42.000000');

-- --------------------------------------------------------

--
-- Table structure for table `cancel_booking`
--

CREATE TABLE `cancel_booking` (
  `cancel_id` bigint(20) NOT NULL,
  `booking_id` bigint(20) NOT NULL,
  `user_name` text NOT NULL,
  `roomno` bigint(20) NOT NULL,
  `room_name` text NOT NULL,
  `phone` bigint(20) NOT NULL,
  `age` bigint(20) NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `payment_method` text NOT NULL,
  `hotel_roomid` bigint(20) NOT NULL,
  `checkin` datetime(6) DEFAULT NULL,
  `checkout` datetime(6) DEFAULT NULL,
  `addonprice` bigint(20) NOT NULL,
  `admin_status` text NOT NULL,
  `booking_status` text NOT NULL,
  `noofguests` bigint(20) NOT NULL,
  `cancelled_at` datetime(6) DEFAULT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cancel_booking`
--

INSERT INTO `cancel_booking` (`cancel_id`, `booking_id`, `user_name`, `roomno`, `room_name`, `phone`, `age`, `email`, `address`, `payment_method`, `hotel_roomid`, `checkin`, `checkout`, `addonprice`, `admin_status`, `booking_status`, `noofguests`, `cancelled_at`, `status`) VALUES
(4, 19, 'Travis Watkins', 102, 'room2', 1, 0, 'miby@mailinator.com', 'Quibusdam ipsum qui', 'cash', 31, '2002-05-28 07:27:00.000000', '2024-09-05 04:03:00.000000', 19523660, 'staff', 'cancelled', 0, '2024-09-04 16:57:38.000000', '1');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` bigint(20) NOT NULL,
  `category_name` text NOT NULL,
  `category_image` text NOT NULL,
  `date` datetime(6) DEFAULT NULL,
  `adminstatus` text NOT NULL,
  `approvestatus` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_image`, `date`, `adminstatus`, `approvestatus`, `status`) VALUES
(5, 'Food', '66d2fbd5a4bb8.jpeg', '2024-08-31 16:47:41.000000', 'staff', 'Approved', '1'),
(6, 'travel', '66d54eda718ee.jpeg', '2024-09-02 11:06:26.000000', 'staff', 'Approved', '1'),
(7, 'sd', '66f2966e0dd93.jpg', '2024-09-24 16:07:34.000000', 'staff', 'Approved', '1');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` bigint(20) NOT NULL,
  `customer_name` text NOT NULL,
  `age` bigint(20) NOT NULL,
  `address` text NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` text NOT NULL,
  `agency_id` bigint(20) NOT NULL,
  `customer_type` text NOT NULL,
  `company_name` text NOT NULL,
  `company_address` text NOT NULL,
  `gst_number` text NOT NULL,
  `date` datetime(6) DEFAULT NULL,
  `status` text NOT NULL,
  `admin_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `age`, `address`, `phone`, `email`, `agency_id`, `customer_type`, `company_name`, `company_address`, `gst_number`, `date`, `status`, `admin_status`) VALUES
(12, 'Quail Mcdaniel', 77, 'Mollitia odio quisqu', 1, 'tosaxy@mailinator.com', 7, 'company', 'Benson Shaffer Plc', 'Provident illo et o', '771', '2024-09-25 12:14:42.000000', '1', 'staff'),
(13, 'Irene Preston', 61, 'Culpa laudantium mo', 1, 'jyseri@mailinator.com', 6, 'company', '', '', '', '2024-09-25 12:15:28.000000', '1', 'staff'),
(14, 'Adria Hickman', 71, 'Cumque aspernatur ve', 1, 'higericibo@mailinator.com', 6, 'own', '', '', '', '2024-09-25 12:23:00.000000', '1', 'staff'),
(15, 'Yael Osborne', 66, 'Vel assumenda nobis ', 1, 'wohomobiqu@mailinator.com', 6, 'company', 'er', 'ere', 'e4tedd', '2024-09-25 12:23:29.000000', '1', 'staff'),
(16, 'Drake Wyatt', 20, 'Exercitationem et qu', 1, 'zaluciv@mailinator.com', 6, 'company', 'dh', 'dd', 'hdgd', '2024-09-25 15:21:33.000000', '1', 'staff'),
(17, 'anu', 83, 'Dignissimos adipisci', 1, 'fewuvecyco@mailinator.com', 6, 'own', '', '', '', '2024-09-30 11:30:33.000000', '1', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `guest_details`
--

CREATE TABLE `guest_details` (
  `guest_id` bigint(20) NOT NULL,
  `booking_id` bigint(20) NOT NULL,
  `hotel_roomid` bigint(20) NOT NULL,
  `guest_name` text NOT NULL,
  `phone` bigint(20) NOT NULL,
  `age` bigint(20) NOT NULL,
  `id_proof` text NOT NULL,
  `status` text NOT NULL,
  `admin_status` text NOT NULL,
  `date` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotel_id` bigint(20) NOT NULL,
  `hotelname` text NOT NULL,
  `hotelowner` text NOT NULL,
  `address` text NOT NULL,
  `location` text NOT NULL,
  `about` text NOT NULL,
  `image` text NOT NULL,
  `email` text NOT NULL,
  `phone1` bigint(20) NOT NULL,
  `person1` text NOT NULL,
  `whatsappno` bigint(20) NOT NULL,
  `rules` text NOT NULL,
  `date` datetime(6) DEFAULT NULL,
  `status` text NOT NULL,
  `adminstatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `hotelname`, `hotelowner`, `address`, `location`, `about`, `image`, `email`, `phone1`, `person1`, `whatsappno`, `rules`, `date`, `status`, `adminstatus`) VALUES
(1, 'ttttt', 'ghtfh', 'Sit facilis qui qua', 'fff', 'dhrehe', 'upload/hotel_images/66ed12d736ebd.jpeg', 'a@gmail.com', 9875468544, 'Velit dignissimos ve', 9999999999, 'ttyyyy', '2024-09-20 11:45:09.000000', '1', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_room`
--

CREATE TABLE `hotel_room` (
  `hotel_roomid` bigint(20) NOT NULL,
  `roomno` text NOT NULL,
  `room_name` text NOT NULL,
  `description` text NOT NULL,
  `roomtypeid` bigint(20) NOT NULL,
  `noofguests` text NOT NULL,
  `extguests` bigint(20) NOT NULL,
  `normalprice` bigint(20) NOT NULL,
  `discountprice` bigint(20) NOT NULL,
  `image` text NOT NULL,
  `image1` text NOT NULL,
  `image2` text NOT NULL,
  `image3` text NOT NULL,
  `image4` text NOT NULL,
  `image5` text NOT NULL,
  `date` datetime(6) DEFAULT NULL,
  `status` text NOT NULL,
  `admintype` text NOT NULL,
  `room_status` text NOT NULL,
  `booking_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_room`
--

INSERT INTO `hotel_room` (`hotel_roomid`, `roomno`, `room_name`, `description`, `roomtypeid`, `noofguests`, `extguests`, `normalprice`, `discountprice`, `image`, `image1`, `image2`, `image3`, `image4`, `image5`, `date`, `status`, `admintype`, `room_status`, `booking_status`) VALUES
(30, '101', 'room1', '                                                    gffg                                                    ', 14, '5', 2, 564, 67, 'Untitled10.jpeg, Untitled11.jpeg, Untitled12.jpeg, Untitled13.jpeg, Untitled14.jpeg', 'Untitled10.jpeg', 'Untitled11.jpeg', 'Untitled12.jpeg', 'Untitled13.jpeg', 'Untitled14.jpeg', '2024-09-03 10:11:28.000000', '1', 'admin', 'vaccant', ''),
(31, '102', 'room2', '                                                                                                                                                            dgrsgd                                                                                                                                                            ', 14, '4', 1, 353, 33, 'Untitled15.jpeg, Untitled16.jpeg, Untitled17.jpeg, Untitled18.jpeg, Untitled19.jpeg', 'hotel.jpg', 'Untitled16.jpeg', 'Untitled17.jpeg', 'Untitled18.jpeg', 'Untitled19.jpeg', '2024-09-03 10:12:37.000000', '1', 'admin', 'vaccant', ''),
(32, '343', 'fff', '                                                    dfgdfgdf                                                    ', 15, '2', 3, 34534, 3453, 'Untitled20.jpeg, Untitled21.jpeg, Untitled22.jpeg, Untitled23.jpeg, Untitled24.jpeg', 'Untitled20.jpeg', 'Untitled21.jpeg', 'Untitled22.jpeg', 'Untitled23.jpeg', 'Untitled24.jpeg', '2024-09-06 16:44:49.000000', '1', 'admin', 'booked', ''),
(33, '202', 'Nicole Hodge', 'Dolores voluptate ops', 14, '4', 2, 8, 416, 'hotel.jpg, hotel1.jpg, WhatsApp_Image_2024-09-04_at_15_00_57.jpeg, hotel2.jpg, hotel3.jpg', 'hotel.jpg', 'hotel1.jpg', 'WhatsApp_Image_2024-09-04_at_15_00_57.jpeg', 'hotel2.jpg', 'hotel3.jpg', '2024-09-24 16:11:15.000000', '1', 'staff', 'booked', ''),
(34, '106', 'Jenette Talley', 'Labore veritatis ill', 15, '5', 2, 286, 836, 'hotel4.jpg, hotel5.jpg, hotel6.jpg, hotel7.jpg, hotel8.jpg', 'hotel4.jpg', 'hotel5.jpg', 'hotel6.jpg', 'hotel7.jpg', 'hotel8.jpg', '2024-09-24 16:53:43.000000', '1', 'staff', 'occupied', ''),
(35, '136', 'Melissa Tucker', '                                                                                                                                                                                                                                                                                                                  Consequatur proident                                                                                                                                                                                                                                                                                                                        ', 15, '4', 1, 927, 22, 'hotel14.jpg, hotel15.jpg, hotel16.jpg, hotel17.jpg, hotel18.jpg', 'hotel14.jpg', 'hotel15.jpg', 'hotel16.jpg', 'hotel17.jpg', 'hotel18.jpg', '2024-09-25 14:31:44.000000', '1', 'admin', 'vaccant', '');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_room_facility`
--

CREATE TABLE `hotel_room_facility` (
  `hotel_room_facid` bigint(20) NOT NULL,
  `hotel_roomid` bigint(20) NOT NULL,
  `hotelid` bigint(20) NOT NULL,
  `facilityid` bigint(20) NOT NULL,
  `subfacilityid` bigint(20) NOT NULL,
  `date` datetime(6) DEFAULT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_room_facility`
--

INSERT INTO `hotel_room_facility` (`hotel_room_facid`, `hotel_roomid`, `hotelid`, `facilityid`, `subfacilityid`, `date`, `status`) VALUES
(184, 30, 0, 9, 0, NULL, ''),
(185, 30, 0, 9, 18, '2024-09-03 10:11:28.000000', '1'),
(186, 30, 0, 9, 19, '2024-09-03 10:11:28.000000', '1'),
(187, 30, 0, 9, 20, '2024-09-03 10:11:28.000000', '1'),
(188, 31, 0, 10, 0, NULL, ''),
(189, 31, 0, 10, 21, '2024-09-03 10:12:37.000000', '1'),
(190, 31, 0, 10, 22, '2024-09-03 10:12:37.000000', '1'),
(191, 32, 0, 10, 0, NULL, ''),
(192, 32, 0, 10, 21, '2024-09-06 16:44:49.000000', '1'),
(193, 32, 0, 10, 22, '2024-09-06 16:44:49.000000', '1'),
(194, 33, 0, 9, 18, '2024-09-24 16:11:15.000000', '1'),
(195, 33, 0, 9, 20, '2024-09-24 16:11:15.000000', '1'),
(196, 33, 0, 10, 21, '2024-09-24 16:11:15.000000', '1'),
(197, 33, 0, 11, 24, '2024-09-24 16:11:15.000000', '1'),
(198, 34, 0, 9, 0, NULL, ''),
(199, 34, 0, 10, 0, NULL, ''),
(200, 34, 0, 9, 19, '2024-09-24 16:53:43.000000', '1'),
(201, 34, 0, 9, 20, '2024-09-24 16:53:43.000000', '1'),
(202, 34, 0, 10, 22, '2024-09-24 16:53:43.000000', '1'),
(203, 35, 0, 9, 0, NULL, ''),
(204, 35, 0, 10, 0, NULL, ''),
(205, 35, 0, 10, 22, '2024-09-25 14:31:44.000000', '1'),
(206, 35, 0, 11, 24, '2024-09-25 14:31:44.000000', '1'),
(207, 35, 0, 10, 21, '2024-09-25 14:35:58.000000', '1'),
(208, 35, 0, 10, 22, '2024-09-25 14:35:58.000000', '1'),
(209, 35, 0, 9, 19, '2024-09-25 14:36:05.000000', '1'),
(210, 31, 0, 9, 18, '2024-10-01 14:59:14.000000', '1');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` bigint(20) NOT NULL,
  `item_name` text NOT NULL,
  `item_image` text NOT NULL,
  `price1` bigint(20) NOT NULL,
  `price2` bigint(20) NOT NULL,
  `tax` bigint(20) NOT NULL,
  `description` text NOT NULL,
  `availability` text NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `subcategory_id` bigint(20) NOT NULL,
  `date` datetime(6) DEFAULT NULL,
  `adminstatus` text NOT NULL,
  `approvestatus` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_image`, `price1`, `price2`, `tax`, `description`, `availability`, `category_id`, `subcategory_id`, `date`, `adminstatus`, `approvestatus`, `status`) VALUES
(6, 'tttt', '', 43443, 4333, 3553, 'gkg', 'yes', 5, 3, '2024-09-02 11:55:40.000000', 'staff', 'Approved', '1'),
(7, 'bus33y', '', 33, 333, 3333, 'fff', 'no', 5, 4, '2024-09-02 15:45:05.000000', 'staff', 'Approved', '1'),
(8, 'sdfse', '3a67acee7b53c05e5c8ea75492a09189.jpg', 34, 345, 34, 'dfgd', 'yes', 6, 4, '2024-09-03 11:42:05.000000', 'staff', 'Approved', '1'),
(9, 'hhhh', 'ca66302e59cff9d718851bcba89a65de.jpg', 933, 883, 0, 'Ullamco cillum repre', 'yes', 5, 3, '2024-09-24 15:13:47.000000', 'staff', 'Approved', '1');

-- --------------------------------------------------------

--
-- Table structure for table `room_booking`
--

CREATE TABLE `room_booking` (
  `booking_id` bigint(20) NOT NULL,
  `order_id` text NOT NULL,
  `hotel_roomid` text NOT NULL,
  `roomno` text NOT NULL,
  `room_name` text NOT NULL,
  `noofguests` text NOT NULL,
  `checkin` datetime(6) DEFAULT NULL,
  `checkout` datetime(6) DEFAULT NULL,
  `payment_method` text NOT NULL,
  `payment_status` text NOT NULL,
  `booking_date` datetime(6) DEFAULT NULL,
  `admin_status` text NOT NULL,
  `booking_status` text NOT NULL,
  `occupy_status` text NOT NULL,
  `cancel_status` text NOT NULL,
  `vacant_status` text NOT NULL,
  `status` text NOT NULL,
  `agent_id` bigint(20) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `advance_amount` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_booking_details`
--

CREATE TABLE `room_booking_details` (
  `booking_detail_id` bigint(20) NOT NULL,
  `booking_id` bigint(20) NOT NULL,
  `hotel_roomid` bigint(20) NOT NULL,
  `date` datetime(6) DEFAULT NULL,
  `extra_guest_count` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_occupy`
--

CREATE TABLE `room_occupy` (
  `occupy_id` bigint(20) NOT NULL,
  `booking_id` bigint(20) NOT NULL,
  `order_id` text NOT NULL,
  `hotel_roomid` text NOT NULL,
  `roomno` text NOT NULL,
  `room_name` text NOT NULL,
  `noofguests` bigint(20) NOT NULL,
  `checkin` datetime(6) DEFAULT NULL,
  `checkout` datetime(6) DEFAULT NULL,
  `addonprice` text NOT NULL,
  `user_name` text NOT NULL,
  `age` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL,
  `payment_method` text NOT NULL,
  `date` datetime(6) DEFAULT NULL,
  `admin_status` text NOT NULL,
  `booking_status` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_occupy`
--

INSERT INTO `room_occupy` (`occupy_id`, `booking_id`, `order_id`, `hotel_roomid`, `roomno`, `room_name`, `noofguests`, `checkin`, `checkout`, `addonprice`, `user_name`, `age`, `email`, `phone`, `address`, `payment_method`, `date`, `admin_status`, `booking_status`, `status`) VALUES
(257, 95, 'order_66f1384db4a282.42196259', '30', '101', 'room1', 3, '2024-09-21 12:00:00.000000', '2024-09-23 12:00:00.000000', '', 'Clayton Moses', 'Velit perspiciatis ', 'bokyf@mailinator.com', '9999999999', 'Quo adipisicing veli', 'Unknown', '2024-09-23 15:13:41.000000', 'staff', 'occupied', '1'),
(258, 96, 'order_66f1384db4a282.42196259', '31', '102', 'room2', 2, '2024-09-21 12:00:00.000000', '2024-09-23 12:00:00.000000', '', 'Clayton Moses', 'Velit perspiciatis ', 'bokyf@mailinator.com', '9999999999', 'Quo adipisicing veli', 'Unknown', '2024-09-23 15:13:41.000000', 'staff', 'occupied', '1');

-- --------------------------------------------------------

--
-- Table structure for table `room_occupy_items`
--

CREATE TABLE `room_occupy_items` (
  `occupy_itemid` bigint(20) NOT NULL,
  `occupy_id` text NOT NULL,
  `booking_id` text NOT NULL,
  `order_id` text NOT NULL,
  `item_id` text NOT NULL,
  `item_name` text NOT NULL,
  `quantity` text NOT NULL,
  `item_price` text NOT NULL,
  `new_price` text NOT NULL,
  `item_total_price` text NOT NULL,
  `hotel_roomid` int(11) NOT NULL,
  `adding_date` datetime(6) DEFAULT NULL,
  `status` text NOT NULL,
  `admin_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_status_log`
--

CREATE TABLE `room_status_log` (
  `log_id` bigint(20) NOT NULL,
  `hotel_roomid` bigint(20) NOT NULL,
  `booking_id` bigint(20) NOT NULL,
  `status` text NOT NULL,
  `date` datetime(6) DEFAULT NULL,
  `customer_id` bigint(20) NOT NULL,
  `status_change_date` datetime(6) NOT NULL,
  `availability_date` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_login`
--

CREATE TABLE `staff_login` (
  `staff_id` bigint(20) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `date` datetime(6) DEFAULT NULL,
  `status` text NOT NULL,
  `usertype` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_login`
--

INSERT INTO `staff_login` (`staff_id`, `email`, `password`, `date`, `status`, `usertype`) VALUES
(1, 'a@gmail.com', '123', '2024-08-23 14:30:04.000000', 'active', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcategory_id` bigint(20) NOT NULL,
  `subcategory_name` text NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `subcategory_image` text NOT NULL,
  `date` datetime(6) DEFAULT NULL,
  `adminstatus` text NOT NULL,
  `approvestatus` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcategory_id`, `subcategory_name`, `category_id`, `subcategory_image`, `date`, `adminstatus`, `approvestatus`, `status`) VALUES
(3, 'breakfast', 5, '66d2fc1a8012a.jpeg', '2024-08-31 16:48:50.000000', 'staff', 'Approved', '1'),
(4, 'bus', 6, '66d54ee7ab97b.jpeg', '2024-09-02 11:06:39.000000', 'staff', 'Approved', '1'),
(8, 'df', 6, '66f296a8be174.jpg', '2024-09-24 16:08:32.000000', 'staff', 'Approved', '1');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `uid` bigint(20) NOT NULL,
  `uname` text NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `emailid` text NOT NULL,
  `password` text NOT NULL,
  `phoneno` text NOT NULL,
  `address` text NOT NULL,
  `country` text NOT NULL,
  `state` text NOT NULL,
  `city` text NOT NULL,
  `postal_code` text NOT NULL,
  `usertype` text NOT NULL,
  `status` text NOT NULL,
  `date` datetime(6) DEFAULT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`uid`, `uname`, `firstname`, `lastname`, `emailid`, `password`, `phoneno`, `address`, `country`, `state`, `city`, `postal_code`, `usertype`, `status`, `date`, `image`) VALUES
(1, '', 'anu', '', 'a@gmail.com', '123', '999999999', 'fsgd', '', '', '', '', 'user', 'active', '2024-08-22 13:13:23.000000', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_facility`
--
ALTER TABLE `admin_facility`
  ADD PRIMARY KEY (`subfacilityid`);

--
-- Indexes for table `admin_facility_type`
--
ALTER TABLE `admin_facility_type`
  ADD PRIMARY KEY (`facilityid`);

--
-- Indexes for table `admin_room`
--
ALTER TABLE `admin_room`
  ADD PRIMARY KEY (`roomid`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`agent_id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `cancel_booking`
--
ALTER TABLE `cancel_booking`
  ADD PRIMARY KEY (`cancel_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `guest_details`
--
ALTER TABLE `guest_details`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `hotel_room`
--
ALTER TABLE `hotel_room`
  ADD PRIMARY KEY (`hotel_roomid`);

--
-- Indexes for table `hotel_room_facility`
--
ALTER TABLE `hotel_room_facility`
  ADD PRIMARY KEY (`hotel_room_facid`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `room_booking`
--
ALTER TABLE `room_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `room_booking_details`
--
ALTER TABLE `room_booking_details`
  ADD PRIMARY KEY (`booking_detail_id`);

--
-- Indexes for table `room_occupy`
--
ALTER TABLE `room_occupy`
  ADD PRIMARY KEY (`occupy_id`);

--
-- Indexes for table `room_occupy_items`
--
ALTER TABLE `room_occupy_items`
  ADD PRIMARY KEY (`occupy_itemid`);

--
-- Indexes for table `room_status_log`
--
ALTER TABLE `room_status_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `staff_login`
--
ALTER TABLE `staff_login`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_facility`
--
ALTER TABLE `admin_facility`
  MODIFY `subfacilityid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `admin_facility_type`
--
ALTER TABLE `admin_facility_type`
  MODIFY `facilityid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admin_room`
--
ALTER TABLE `admin_room`
  MODIFY `roomid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `agent_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `cancel_booking`
--
ALTER TABLE `cancel_booking`
  MODIFY `cancel_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `guest_details`
--
ALTER TABLE `guest_details`
  MODIFY `guest_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=628;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotel_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hotel_room`
--
ALTER TABLE `hotel_room`
  MODIFY `hotel_roomid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `hotel_room_facility`
--
ALTER TABLE `hotel_room_facility`
  MODIFY `hotel_room_facid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `room_booking`
--
ALTER TABLE `room_booking`
  MODIFY `booking_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT for table `room_booking_details`
--
ALTER TABLE `room_booking_details`
  MODIFY `booking_detail_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `room_occupy`
--
ALTER TABLE `room_occupy`
  MODIFY `occupy_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT for table `room_occupy_items`
--
ALTER TABLE `room_occupy_items`
  MODIFY `occupy_itemid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `room_status_log`
--
ALTER TABLE `room_status_log`
  MODIFY `log_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff_login`
--
ALTER TABLE `staff_login`
  MODIFY `staff_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategory_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `uid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
