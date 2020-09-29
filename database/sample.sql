-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 14, 2019 at 09:40 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fms_erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `fm_clients`
--

CREATE TABLE `fm_clients` (
  `c_id` int(225) NOT NULL,
  `c_name` varchar(50) DEFAULT NULL,
  `c_email` varchar(50) DEFAULT NULL,
  `c_mobile` varchar(13) DEFAULT NULL,
  `c_addr` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm_clients`
--

INSERT INTO `fm_clients` (`c_id`, `c_name`, `c_email`, `c_mobile`, `c_addr`) VALUES
(1, 'Vivek Batra', 'vivekb2@gmail.com', '09898989898', 'Malviya Nagar'),
(2, 'Nikhil Garg', 'nikhil@emil.com', '8989898989', 'Delhi');

-- --------------------------------------------------------

--
-- Table structure for table `fm_employees`
--

CREATE TABLE `fm_employees` (
  `e_id` int(225) NOT NULL,
  `e_fname` varchar(50) DEFAULT NULL,
  `e_lname` varchar(50) DEFAULT NULL,
  `e_email` varchar(50) DEFAULT NULL,
  `e_pass` varchar(50) DEFAULT NULL,
  `e_aadhar` varchar(50) DEFAULT NULL,
  `e_mobile` varchar(13) DEFAULT NULL,
  `e_address` varchar(99) DEFAULT NULL,
  `e_designation` varchar(30) DEFAULT NULL,
  `e_salary` int(9) DEFAULT NULL,
  `e_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm_employees`
--

INSERT INTO `fm_employees` (`e_id`, `e_fname`, `e_lname`, `e_email`, `e_pass`, `e_aadhar`, `e_mobile`, `e_address`, `e_designation`, `e_salary`, `e_status`) VALUES
(1, 'sourav', 'datta', 'sourav@gmail.com', 'admin@123', '123456789000', '9997772221', 'apurbapur, Delhi', 'executive', 12000, 1),
(11, 'Poonam', 'Boss', 'poonam002@gmail.com', 'admin@123', '121212121212', '9876543211', 'apurbapur,jalaghata', 'executive', 15000, 1),
(13, 'Kunal', 'Deshmukh', 'kunal@aksitcd.com', 'kunal@123', '876790654321', '9997224233', 'Noida Sec-15', 'Cyber Expert', 50000, 1),
(14, 'Randeep', 'Kumar', 'randeep@gmail.com', 'admin@123', '654398763421', '999877666544', 'Chandani Chowk, Delhi', 'Field Executive', 12000, 1),
(16, 'Karan', 'Jauhhar', 'karan@aaa.ccc', NULL, '876567898765', '9090989887', 'Mumbai North', NULL, NULL, 0),
(19, 'Vivek', 'Kapoor', 'vevek@gmail.com', 'asdsaslkn', '123456789012', '9876543222', 'sadsvknjas', 'Collector', 18000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fm_inventory`
--

CREATE TABLE `fm_inventory` (
  `i_id` int(225) NOT NULL,
  `i_item` varchar(225) DEFAULT NULL,
  `i_qty` int(99) NOT NULL,
  `w_id` int(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm_inventory`
--

INSERT INTO `fm_inventory` (`i_id`, `i_item`, `i_qty`, `w_id`) VALUES
(2, 'Himalaya Face Wash', 10000, 1),
(5, 'Boat Headphone 400', 7000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fm_salary`
--

CREATE TABLE `fm_salary` (
  `salary_id` int(225) NOT NULL,
  `year` int(4) NOT NULL,
  `month` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm_salary`
--

INSERT INTO `fm_salary` (`salary_id`, `year`, `month`) VALUES
(7, 2019, 1),
(8, 2019, 2),
(9, 2019, 3),
(10, 2019, 4);

-- --------------------------------------------------------

--
-- Table structure for table `fm_suppliers`
--

CREATE TABLE `fm_suppliers` (
  `s_id` int(225) NOT NULL,
  `s_name` varchar(50) DEFAULT NULL,
  `s_email` varchar(50) DEFAULT NULL,
  `s_mobile` varchar(13) DEFAULT NULL,
  `s_addr` varchar(99) DEFAULT NULL,
  `s_gstin` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm_suppliers`
--

INSERT INTO `fm_suppliers` (`s_id`, `s_name`, `s_email`, `s_mobile`, `s_addr`, `s_gstin`) VALUES
(1, 'Bantu Lala', 'banti001@farzi.com', '78999095111', 'Sec 4 Mohali, Chandigarh', 'BVHUT7687H4FH'),
(3, 'Deepak Pandey', 'deepak@pamdey.in', '7890954321', 'adkskbcj', 'AVJKJ6885M1GH');

-- --------------------------------------------------------

--
-- Table structure for table `fm_tasks`
--

CREATE TABLE `fm_tasks` (
  `t_id` int(225) NOT NULL,
  `t_description` varchar(9999) DEFAULT NULL,
  `emp_id` int(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm_tasks`
--

INSERT INTO `fm_tasks` (`t_id`, `t_description`, `emp_id`) VALUES
(1, 'Complete New Project File', 1),
(2, 'Complete project within 3 days.', 1),
(4, 'Call a meeting.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fm_users`
--

CREATE TABLE `fm_users` (
  `u_id` int(225) NOT NULL,
  `u_username` varchar(225) DEFAULT NULL,
  `u_password` varchar(225) DEFAULT NULL,
  `u_name` varchar(50) DEFAULT NULL,
  `u_email` varchar(50) DEFAULT NULL,
  `u_designation` varchar(50) NOT NULL,
  `u_mobile` varchar(15) NOT NULL,
  `u_address` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm_users`
--

INSERT INTO `fm_users` (`u_id`, `u_username`, `u_password`, `u_name`, `u_email`, `u_designation`, `u_mobile`, `u_address`) VALUES
(1, 'admin', 'admin', 'Vishal Singh', 'admin@gmail.com', 'Admin', '+917900867111', 'A-209, Second Floor, Patil Nagar, Mumbai');

-- --------------------------------------------------------

--
-- Table structure for table `fm_warehouses`
--

CREATE TABLE `fm_warehouses` (
  `w_id` int(225) NOT NULL,
  `w_name` varchar(50) DEFAULT NULL,
  `w_addr` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm_warehouses`
--

INSERT INTO `fm_warehouses` (`w_id`, `w_name`, `w_addr`) VALUES
(1, 'Laxmi Nagar Warehouse 1', 'E-254, Basement, Laxmi Nagar'),
(2, 'Saket Warehouse', 'c-456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fm_clients`
--
ALTER TABLE `fm_clients`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `fm_employees`
--
ALTER TABLE `fm_employees`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `fm_inventory`
--
ALTER TABLE `fm_inventory`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `fm_salary`
--
ALTER TABLE `fm_salary`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `fm_suppliers`
--
ALTER TABLE `fm_suppliers`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `fm_tasks`
--
ALTER TABLE `fm_tasks`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `fm_users`
--
ALTER TABLE `fm_users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `fm_warehouses`
--
ALTER TABLE `fm_warehouses`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fm_clients`
--
ALTER TABLE `fm_clients`
  MODIFY `c_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fm_employees`
--
ALTER TABLE `fm_employees`
  MODIFY `e_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `fm_inventory`
--
ALTER TABLE `fm_inventory`
  MODIFY `i_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `fm_salary`
--
ALTER TABLE `fm_salary`
  MODIFY `salary_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `fm_suppliers`
--
ALTER TABLE `fm_suppliers`
  MODIFY `s_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fm_tasks`
--
ALTER TABLE `fm_tasks`
  MODIFY `t_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fm_users`
--
ALTER TABLE `fm_users`
  MODIFY `u_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fm_warehouses`
--
ALTER TABLE `fm_warehouses`
  MODIFY `w_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
