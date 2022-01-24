-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 24, 2022 at 01:38 AM
-- Server version: 10.6.4-MariaDB-log
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ipc_pr`
--

-- --------------------------------------------------------

--
-- Table structure for table `changelog`
--

CREATE TABLE `changelog` (
  `id_changelog` int(2) NOT NULL,
  `version` text NOT NULL,
  `remaks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `changelog`
--

INSERT INTO `changelog` (`id_changelog`, `version`, `remaks`) VALUES
(1, '1.0', 'Released IT Asset V1.0');

-- --------------------------------------------------------

--
-- Table structure for table `log_activity`
--

CREATE TABLE `log_activity` (
  `id_log_activity` int(5) NOT NULL,
  `process` varchar(150) NOT NULL,
  `user` varchar(15) NOT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_activity`
--

INSERT INTO `log_activity` (`id_log_activity`, `process`, `user`, `time`) VALUES
(30, 'VVBEQVRFIG1hc3Rlcl9icmFuZCBTRVQgYnJhbmQ9J0FjZXJzJyBXSEVSRSBpZF9icmFuZD0nMzIn', 'Administrators', '2020-07-24 16:26:07'),
(31, 'VVBEQVRFIG1hc3Rlcl9icmFuZCBTRVQgYnJhbmQ9J0FzdXMnIFdIRVJFIGlkX2JyYW5kPScxMSc=', 'Administrators', '2020-07-24 16:26:11'),
(32, 'SU5TRVJUIElOVE8gbWFzdGVyX2JyYW5kIChicmFuZCxvbGRfYnJhbmQpIFZBTFVFUyAoJ0FkYXRhJywnQWRhdGEnKQ==', 'Administrators', '2020-07-24 16:28:37'),
(33, 'SU5TRVJUIElOVE8gbWFzdGVyX2JyYW5kIChicmFuZCxvbGRfYnJhbmQpIFZBTFVFUyAoJ0EnLCdBJyk=', 'Administrators', '2020-07-29 07:10:15'),
(34, 'REVMRVRFIEZST00gbWFzdGVyX2JyYW5kIFdIRVJFIGlkX2JyYW5kPSczNCc=', 'Administrators', '2020-07-29 07:10:31'),
(35, 'SU5TRVJUIElOVE8gbWFzdGVyX2JyYW5kIChicmFuZCxvbGRfYnJhbmQpIFZBTFVFUyAoJ0RlbGwnLCdEZWxsJyk=', 'Administrators', '2020-08-04 13:30:52'),
(36, 'REVMRVRFIEZST00gbWFzdGVyX2JyYW5kIFdIRVJFIGlkX2JyYW5kPSc2Jw==', 'Administrators', '2020-08-04 14:07:30'),
(37, 'VVBEQVRFIG1hc3Rlcl9icmFuZCBTRVQgYnJhbmQ9J0RlbGxzJyBXSEVSRSBpZF9icmFuZD0nMzUn', 'Yahya Ginanjar', '2020-08-04 14:43:25'),
(38, 'VVBEQVRFIG1hc3Rlcl9icmFuZCBTRVQgYnJhbmQ9J0RlbGwnIFdIRVJFIGlkX2JyYW5kPSczNSc=', 'Yahya Ginanjar', '2020-08-04 14:43:34'),
(39, 'REVMRVRFIEZST00gbWFzdGVyX2JyYW5kIFdIRVJFIGlkX2JyYW5kPScn', 'Administrators', '2020-08-06 09:17:50'),
(40, 'REVMRVRFIEZST00gbWFzdGVyX2JyYW5kIFdIRVJFIGlkX2JyYW5kPScn', 'Administrators', '2020-08-06 09:21:42'),
(41, 'SU5TRVJUIElOVE8gbWFzdGVyX2JyYW5kIChicmFuZCxvbGRfYnJhbmQpIFZBTFVFUyAoJ0ludGVsJywnSW50ZWwnKQ==', 'Administrators', '2020-08-06 10:19:23'),
(42, 'SU5TRVJUIElOVE8gbWFzdGVyX2JyYW5kIChicmFuZCxvbGRfYnJhbmQpIFZBTFVFUyAoJ1J5emVuJywnUnl6ZW4nKQ==', 'Administrators', '2020-08-06 10:19:53'),
(43, 'SU5TRVJUIElOVE8gbWFzdGVyX2JyYW5kIChicmFuZCxvbGRfYnJhbmQpIFZBTFVFUyAoJ0FtZCcsJ0FtZCcp', 'Administrators', '2020-08-06 10:20:20'),
(44, 'REVMRVRFIEZST00gbWFzdGVyX2JyYW5kIFdIRVJFIGlkX2JyYW5kPSczNyc=', 'Administrators', '2020-08-06 10:21:57'),
(45, 'REVMRVRFIEZST00gbWFzdGVyX3Byb2Nlc3NvciBXSEVSRSBwcm9jZXNzb3I9J1J5emVuNS00MjAwJw==', 'Administrators', '2020-08-06 10:40:22'),
(46, 'REVMRVRFIEZST00gbWFzdGVyX3Byb2Nlc3NvciBXSEVSRSBwcm9jZXNzb3I9J0k1LTk1MDBGJw==', 'Administrators', '2020-08-06 10:44:02'),
(47, 'REVMRVRFIEZST00gbWFzdGVyX3Byb2Nlc3NvciBXSEVSRSBwcm9jZXNzb3I9J0kzLTEwMjAn', 'Administrators', '2020-08-06 10:44:55'),
(48, 'REVMRVRFIEZST00gbWFzdGVyX3Byb2Nlc3NvciBXSEVSRSBwcm9jZXNzb3I9Jyc=', 'Administrators', '2020-08-06 10:50:59'),
(49, 'VVBEQVRFIG1hc3Rlcl9icmFuZCBTRVQgYnJhbmQ9JycgV0hFUkUgaWRfYnJhbmQ9Jyc=', 'Administrators', '2020-08-06 14:11:05'),
(50, 'VVBEQVRFIG1hc3Rlcl9icmFuZCBTRVQgYnJhbmQ9JycgV0hFUkUgaWRfYnJhbmQ9Jyc=', 'Administrators', '2020-08-06 14:11:27'),
(51, 'VVBEQVRFIG1hc3Rlcl9icmFuZCBTRVQgYnJhbmQ9JycgV0hFUkUgaWRfYnJhbmQ9Jyc=', 'Administrators', '2020-08-06 14:12:06'),
(52, 'VVBEQVRFIG1hc3Rlcl9icmFuZCBTRVQgYnJhbmQ9JycgV0hFUkUgaWRfYnJhbmQ9Jyc=', 'Administrators', '2020-08-06 14:20:19'),
(53, 'VVBEQVRFIG1hc3Rlcl9icmFuZCBTRVQgYnJhbmQ9JycgV0hFUkUgaWRfYnJhbmQ9Jyc=', 'Administrators', '2020-08-06 14:20:23'),
(54, 'VVBEQVRFIG1hc3Rlcl9icmFuZCBTRVQgYnJhbmQ9JycgV0hFUkUgaWRfYnJhbmQ9Jyc=', 'Administrators', '2020-08-06 14:23:29'),
(55, 'SU5TRVJUIElOVE8gbWFzdGVyX2JyYW5kIChicmFuZCxvbGRfYnJhbmQpIFZBTFVFUyAoJ0libScsJ0libScp', 'Administrators', '2020-08-06 14:30:39'),
(56, 'VVBEQVRFIG1hc3Rlcl9wcm9jZXNzb3IgU0VUIHByb2Nlc3Nvcj0nUnl6ZW4gNS00MjAwJyxpZF9icmFuZD0nMzgn', 'Administrators', '2020-08-06 15:33:32'),
(57, 'VVBEQVRFIG1hc3Rlcl9wcm9jZXNzb3IgU0VUIHByb2Nlc3Nvcj0nSTUtOTUwMEYnLGlkX2JyYW5kPSczNic=', 'Administrators', '2020-08-06 15:34:20'),
(58, 'VVBEQVRFIG1hc3Rlcl9wcm9jZXNzb3IgU0VUIHByb2Nlc3Nvcj0nSTUtOTUwMCcsaWRfYnJhbmQ9JzM2Jyxjb3JlPSc2Jyx0aHJlYWQ9JzYnLHJlbWFrcz0nJyBXSEVSRSBpZF9wcm9jZXNzb3I9Jz', 'Administrators', '2020-08-06 15:35:18'),
(59, 'VVBEQVRFIG1hc3Rlcl9icmFuZCBTRVQgYnJhbmQ9J0FjZXInLCBXSEVSRSBpZF9icmFuZD0nMzIn', 'Administrators', '2020-08-06 15:36:56'),
(60, 'VVBEQVRFIG1hc3Rlcl9vcyBTRVQgb3M9J1VidW50dSBYODYnIFdIRVJFIGlkX29zPSc5Jw==', 'Administrators', '2020-08-06 16:01:17'),
(61, 'REVMRVRFIEZST00gbWFzdGVyX29zIFdIRVJFIGlkX29zPSc5Jw==', 'Administrators', '2020-08-06 16:03:12'),
(62, 'REVMRVRFIEZST00gbWFzdGVyX2JyYW5kIFdIRVJFIGlkX2JyYW5kPSc0MCc=', 'Administrators', '2020-08-19 09:15:32'),
(63, 'REVMRVRFIEZST00gbWFzdGVyX2JyYW5kIFdIRVJFIGlkX2JyYW5kPSc0MSc=', 'Administrators', '2020-09-07 15:27:01'),
(64, 'REVMRVRFIEZST00gbWFzdGVyX2JyYW5kIFdIRVJFIGlkX2JyYW5kPSc0Mic=', 'Administrators', '2020-12-16 08:51:13'),
(65, 'REVMRVRFIEZST00gbWFzdGVyX2JyYW5kIFdIRVJFIGlkX2JyYW5kPSc0Myc=', 'Administrators', '2020-12-18 11:06:07'),
(66, 'REVMRVRFIEZST00gbWFzdGVyX2JyYW5kIFdIRVJFIGlkX2JyYW5kPSc0Myc=', 'Administrators', '2020-12-18 11:06:26'),
(67, 'REVMRVRFIEZST00gbWFzdGVyX2JyYW5kIFdIRVJFIGlkX2JyYW5kPSc0Myc=', 'Administrators', '2020-12-18 11:07:36'),
(68, 'REVMRVRFIEZST00gbWFzdGVyX2JyYW5kIFdIRVJFIGlkX2JyYW5kPSc0Myc=', 'Administrators', '2020-12-18 11:07:59'),
(69, 'REVMRVRFIEZST00gbWFzdGVyX2JyYW5kIFdIRVJFIGlkX2JyYW5kPSc0Myc=', 'Administrators', '2020-12-18 11:08:53'),
(70, 'REVMRVRFIEZST00gbWFzdGVyX2JyYW5kIFdIRVJFIGlkX2JyYW5kPSc0NCc=', 'Administrators', '2020-12-18 11:15:00'),
(71, 'REVMRVRFIEZST00gbWFzdGVyX2JyYW5kIFdIRVJFIGlkX2JyYW5kPSc0NSc=', 'Administrators', '2020-12-18 11:30:12'),
(72, 'REVMRVRFIEZST00gbWFzdGVyX2JyYW5kIFdIRVJFIGlkX2JyYW5kPSc0Nic=', 'Administrators', '2020-12-18 11:33:10'),
(73, 'REVMRVRFIEZST00gbWFzdGVyX2JyYW5kIFdIRVJFIGlkX2JyYW5kPSc0Nyc=', 'Administrators', '2020-12-18 13:05:51'),
(74, 'REVMRVRFIEZST00gbWFzdGVyX2JyYW5kIFdIRVJFIGlkX2JyYW5kPScn', 'Administrators', '2021-01-09 22:55:29'),
(75, 'REVMRVRFIEZST00gbWFzdGVyX2JyYW5kIFdIRVJFIGlkX2JyYW5kPScn', 'Administrators', '2021-01-09 22:58:44'),
(76, 'REVMRVRFIEZST00gbWFzdGVyX2JyYW5kIFdIRVJFIGlkX2JyYW5kPScn', 'Administrators', '2021-01-10 01:17:45');

-- --------------------------------------------------------

--
-- Table structure for table `master_category_cost`
--

CREATE TABLE `master_category_cost` (
  `id_category_cost` int(2) NOT NULL,
  `category_cost` varchar(25) NOT NULL,
  `abbreviation` varchar(2) NOT NULL,
  `slug` varchar(25) NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `edited_by` varchar(20) DEFAULT NULL,
  `edited_at` datetime DEFAULT NULL,
  `deleted_by` varchar(20) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_category_cost`
--

INSERT INTO `master_category_cost` (`id_category_cost`, `category_cost`, `abbreviation`, `slug`, `created_by`, `created_at`, `edited_by`, `edited_at`, `deleted_by`, `deleted_at`, `deleted_status`) VALUES
(1, 'Investment', 'I', 'investment', 'Administrators', '2021-01-06 16:58:26', NULL, NULL, NULL, NULL, 0),
(2, 'Expense', 'E', 'expense', 'Administrators', '2021-01-06 16:58:41', 'Administrators', '2021-01-10 14:16:41', 'Administrators', '2021-01-10 01:49:05', 0),
(6, 'Machine', 'M', 'machine', 'Administrators', '2021-09-19 14:53:13', NULL, NULL, 'Administrators', '2021-11-12 15:47:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_category_item`
--

CREATE TABLE `master_category_item` (
  `id_category_item` int(2) NOT NULL,
  `category_item` varchar(25) NOT NULL,
  `abbreviation` varchar(2) NOT NULL,
  `slug` varchar(25) NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `edited_by` varchar(20) DEFAULT NULL,
  `edited_at` datetime DEFAULT NULL,
  `deleted_by` varchar(20) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_category_item`
--

INSERT INTO `master_category_item` (`id_category_item`, `category_item`, `abbreviation`, `slug`, `created_by`, `created_at`, `edited_by`, `edited_at`, `deleted_by`, `deleted_at`, `deleted_status`) VALUES
(1, 'Sparepart', 'S', 'sparepart', 'Administrators', '2021-01-07 09:29:47', 'Administrators', '2021-01-07 09:32:03', NULL, NULL, 0),
(2, 'Consumable', 'C', 'consumable', 'Administrators', '2021-01-10 14:10:42', 'Administrators', '2021-01-10 14:18:17', NULL, NULL, 0),
(3, 'Vendor', 'W', 'vendor', 'Administrators', '2021-01-10 14:11:37', 'Administrators', '2021-01-10 14:14:06', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_department`
--

CREATE TABLE `master_department` (
  `id_department` int(2) NOT NULL,
  `department` varchar(25) NOT NULL,
  `abbreviation` varchar(7) NOT NULL,
  `slug` varchar(25) NOT NULL,
  `created_by` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `edited_by` varchar(15) DEFAULT NULL,
  `edited_at` datetime DEFAULT NULL,
  `deleted_by` varchar(15) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_department`
--

INSERT INTO `master_department` (`id_department`, `department`, `abbreviation`, `slug`, `created_by`, `created_at`, `edited_by`, `edited_at`, `deleted_by`, `deleted_at`, `deleted_status`) VALUES
(1, 'Production', 'PROD', 'production', 'Administrators', '2021-01-02 23:45:32', 'Administrators', '2021-01-02 23:48:42', 'Administrators', '2021-11-12 08:51:05', 0),
(2, 'IT', 'IT', 'it', 'Administrators', '2021-01-02 23:50:14', 'Administrators', '2021-01-11 14:12:10', NULL, NULL, 0),
(6, 'Supply Chain Management', 'SCM', 'supply-chain-management', 'Administrators', '2021-09-19 14:39:02', 'Administrators', '2021-09-19 14:53:44', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_product`
--

CREATE TABLE `master_product` (
  `id_product` int(3) NOT NULL,
  `product` varchar(255) NOT NULL,
  `id_master_unit` int(1) NOT NULL,
  `lenght` varchar(4) NOT NULL,
  `width` varchar(4) NOT NULL,
  `height` varchar(4) NOT NULL,
  `slug_product` varchar(255) NOT NULL,
  `created_by` varchar(25) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `edited_by` varchar(25) DEFAULT NULL,
  `edited_at` datetime DEFAULT NULL,
  `deleted_by` varchar(25) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_product`
--

INSERT INTO `master_product` (`id_product`, `product`, `id_master_unit`, `lenght`, `width`, `height`, `slug_product`, `created_by`, `created_at`, `edited_by`, `edited_at`, `deleted_by`, `deleted_at`, `deleted_status`) VALUES
(2, 'Mouse Logitech K120', 2, '3', '2', '1', 'mouse-logitech-k120', 'Administrators', '2021-01-02 01:36:29', 'Administrators', '2021-01-09 17:59:01', NULL, NULL, 0),
(3, 'Notebook Asus ROG I7 Gen 11', 2, '25', '20', '2', 'notebook-asus-rog-i7-gen-11', 'Administrators', '2021-01-08 14:39:28', NULL, NULL, NULL, NULL, 0),
(4, 'Keyboard Logitech K120', 2, '1', '1', '1', 'keyboard-logitech-k120', 'Administrators', '2021-01-09 18:07:20', 'Administrators', '2021-01-09 22:16:04', NULL, NULL, 0),
(5, 'Micro Pc Dell Optiplex 3060', 5, '1', '1', '1', 'micro-pc-dell-optiplex-3060', 'Administrators', '2021-01-11 14:42:41', '', NULL, NULL, NULL, 0),
(6, 'Ssd 240gb Samsung', 2, '1', '1', '1', 'ssd-240gb-samsung', 'Administrators', '2021-09-19 15:01:52', NULL, NULL, NULL, NULL, 0),
(7, 'Material PP', 1, '1', '1', '1', 'material-pp', 'Administrators', '2021-10-28 11:59:05', NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_supplier`
--

CREATE TABLE `master_supplier` (
  `id_supplier` int(2) NOT NULL,
  `supplier` varchar(35) NOT NULL,
  `currency_country` varchar(20) NOT NULL,
  `currency_code` varchar(2) NOT NULL,
  `slug` varchar(25) NOT NULL,
  `created_by` varchar(25) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `edited_by` varchar(25) DEFAULT NULL,
  `edited_at` datetime DEFAULT NULL,
  `deleted_by` varchar(25) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_supplier`
--

INSERT INTO `master_supplier` (`id_supplier`, `supplier`, `currency_country`, `currency_code`, `slug`, `created_by`, `created_at`, `edited_by`, `edited_at`, `deleted_by`, `deleted_at`, `deleted_status`) VALUES
(3, 'Tokopedia', 'Indonesia', 'Rp', 'tokopedia', 'Administrators', '2021-01-08 09:36:41', 'Administrators', '2021-10-28 15:29:20', NULL, NULL, 0),
(4, 'Shopee', 'Indonesia', 'Rp', 'shopee', 'Administrators', '2021-01-08 09:36:51', 'Administrators', '2021-10-28 10:59:43', NULL, NULL, 0),
(5, 'Lazada', 'Indonesia', 'Rp', 'lazada', 'Administrators', '2021-10-27 21:20:31', 'Administrators', '2021-10-28 15:29:13', NULL, NULL, 0),
(6, 'Bukalapak', 'Indonesia', 'Rp', 'bukalapak', 'Administrators', '2021-10-28 10:54:31', 'Administrators', '2021-11-09 10:15:11', 'Administrators', '2021-10-28 11:10:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_unit`
--

CREATE TABLE `master_unit` (
  `id_unit` int(2) NOT NULL,
  `unit` varchar(15) NOT NULL,
  `slug` varchar(25) NOT NULL,
  `created_by` varchar(25) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `edited_by` varchar(25) DEFAULT NULL,
  `edited_at` datetime DEFAULT NULL,
  `deleted_by` varchar(25) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_unit`
--

INSERT INTO `master_unit` (`id_unit`, `unit`, `slug`, `created_by`, `created_at`, `edited_by`, `edited_at`, `deleted_by`, `deleted_at`, `deleted_status`) VALUES
(1, 'Kg', 'kg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, 'Ea', 'ea', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(5, 'Pcs', 'pcs', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(6, 'Ton', 'ton', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(7, 'Bag', 'bag', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(8, 'Drum', 'drum', NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mr`
--

CREATE TABLE `mr` (
  `id_mr` int(4) NOT NULL,
  `id_department` int(2) NOT NULL,
  `mr_no` varchar(10) NOT NULL,
  `mpr_status` int(1) NOT NULL,
  `reason_rejected` varchar(150) DEFAULT NULL,
  `approved_by` varchar(20) DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `created_by` varchar(25) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `edited_by` varchar(25) DEFAULT NULL,
  `edited_at` datetime DEFAULT NULL,
  `deleted_by` varchar(25) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mr`
--

INSERT INTO `mr` (`id_mr`, `id_department`, `mr_no`, `mpr_status`, `reason_rejected`, `approved_by`, `approved_at`, `created_by`, `created_at`, `edited_by`, `edited_at`, `deleted_by`, `deleted_at`, `deleted_status`) VALUES
(1, 2, '001', 2, 'Salah Harga', NULL, NULL, 'Administrators', '2021-12-08 15:21:01', NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mr_detail`
--

CREATE TABLE `mr_detail` (
  `id_mr` int(4) NOT NULL,
  `mr_no` varchar(10) NOT NULL,
  `id_department` int(2) NOT NULL,
  `id_supplier` int(2) DEFAULT NULL,
  `id_category_item` int(1) DEFAULT NULL,
  `id_category_cost` int(1) DEFAULT NULL,
  `id_product` int(3) DEFAULT NULL,
  `qty` varchar(8) DEFAULT NULL,
  `unit_price` varchar(100) DEFAULT NULL,
  `total` varchar(100) DEFAULT NULL,
  `devreq_qty` int(3) DEFAULT NULL,
  `devreq_eta` date DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mr_detail`
--

INSERT INTO `mr_detail` (`id_mr`, `mr_no`, `id_department`, `id_supplier`, `id_category_item`, `id_category_cost`, `id_product`, `qty`, `unit_price`, `total`, `devreq_qty`, `devreq_eta`, `remarks`) VALUES
(1, '001', 2, 6, 2, 2, 4, '1', '120000', '120000', 1, '2022-01-09', 'stok');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(2) NOT NULL,
  `fullname` varchar(25) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `access` enum('Admin','User','View','Leader') NOT NULL,
  `id_department` int(2) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `fullname`, `username`, `password`, `access`, `id_department`, `avatar`) VALUES
(1, 'Administrators', 'admin', 'caf1a3dfb505ffed0d024130f58c5cfa', 'Admin', 2, 'Logo 2.jpg'),
(8, 'Emon', 'emon', 'b8cc4edba5145d41f9da01d85f459aef', 'Leader', 1, NULL),
(9, 'Viewer', 'view', '1bda80f2be4d3658e0baa43fbe7ae8c1', 'View', 6, NULL),
(10, 'Leader', 'leader', 'c444858e0aaeb727da73d2eae62321ad', 'Leader', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `changelog`
--
ALTER TABLE `changelog`
  ADD PRIMARY KEY (`id_changelog`);

--
-- Indexes for table `log_activity`
--
ALTER TABLE `log_activity`
  ADD PRIMARY KEY (`id_log_activity`);

--
-- Indexes for table `master_category_cost`
--
ALTER TABLE `master_category_cost`
  ADD PRIMARY KEY (`id_category_cost`);

--
-- Indexes for table `master_category_item`
--
ALTER TABLE `master_category_item`
  ADD PRIMARY KEY (`id_category_item`);

--
-- Indexes for table `master_department`
--
ALTER TABLE `master_department`
  ADD PRIMARY KEY (`id_department`);

--
-- Indexes for table `master_product`
--
ALTER TABLE `master_product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `master_supplier`
--
ALTER TABLE `master_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `master_unit`
--
ALTER TABLE `master_unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indexes for table `mr`
--
ALTER TABLE `mr`
  ADD PRIMARY KEY (`id_mr`);

--
-- Indexes for table `mr_detail`
--
ALTER TABLE `mr_detail`
  ADD PRIMARY KEY (`id_mr`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `changelog`
--
ALTER TABLE `changelog`
  MODIFY `id_changelog` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log_activity`
--
ALTER TABLE `log_activity`
  MODIFY `id_log_activity` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `master_category_cost`
--
ALTER TABLE `master_category_cost`
  MODIFY `id_category_cost` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `master_category_item`
--
ALTER TABLE `master_category_item`
  MODIFY `id_category_item` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `master_department`
--
ALTER TABLE `master_department`
  MODIFY `id_department` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `master_product`
--
ALTER TABLE `master_product`
  MODIFY `id_product` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `master_supplier`
--
ALTER TABLE `master_supplier`
  MODIFY `id_supplier` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `master_unit`
--
ALTER TABLE `master_unit`
  MODIFY `id_unit` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mr`
--
ALTER TABLE `mr`
  MODIFY `id_mr` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mr_detail`
--
ALTER TABLE `mr_detail`
  MODIFY `id_mr` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
