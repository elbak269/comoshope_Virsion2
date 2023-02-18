-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2020 at 05:26 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Dumping data for table `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'database', 'shop', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"structure_or_data_forced\":\"0\",\"table_select[]\":[\"adress\",\"brand\",\"car\",\"cards\",\"categories\",\"cities\",\"clients\",\"colors\",\"comments\",\"countries\",\"cpu\",\"cpugenerations\",\"currency\",\"gouvernorate\",\"incart\",\"islands\",\"items\",\"memoriesram\",\"memoriesstorage\",\"names\",\"orderdetails\",\"orders\",\"order_status\",\"paypals\",\"promo\",\"sellers\",\"shipping\",\"users\"],\"table_structure[]\":[\"adress\",\"brand\",\"car\",\"cards\",\"categories\",\"cities\",\"clients\",\"colors\",\"comments\",\"countries\",\"cpu\",\"cpugenerations\",\"currency\",\"gouvernorate\",\"incart\",\"islands\",\"items\",\"memoriesram\",\"memoriesstorage\",\"names\",\"orderdetails\",\"orders\",\"order_status\",\"paypals\",\"promo\",\"sellers\",\"shipping\",\"users\"],\"table_data[]\":[\"adress\",\"brand\",\"car\",\"cards\",\"categories\",\"cities\",\"clients\",\"colors\",\"comments\",\"countries\",\"cpu\",\"cpugenerations\",\"currency\",\"gouvernorate\",\"incart\",\"islands\",\"items\",\"memoriesram\",\"memoriesstorage\",\"names\",\"orderdetails\",\"orders\",\"order_status\",\"paypals\",\"promo\",\"sellers\",\"shipping\",\"users\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@DATABASE@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Structure of table @TABLE@\",\"latex_structure_continued_caption\":\"Structure of table @TABLE@ (continued)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Content of table @TABLE@\",\"latex_data_continued_caption\":\"Content of table @TABLE@ (continued)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"structure_and_data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"structure_and_data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_procedure_function\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"xml_structure_or_data\":\"data\",\"xml_export_events\":\"something\",\"xml_export_functions\":\"something\",\"xml_export_procedures\":\"something\",\"xml_export_tables\":\"something\",\"xml_export_triggers\":\"something\",\"xml_export_views\":\"something\",\"xml_export_contents\":\"something\",\"yaml_structure_or_data\":\"data\",\"\":null,\"lock_tables\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"csv_columns\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_create_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}'),
(2, 'root', 'database', 'SHOP', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"structure_or_data_forced\":\"0\",\"table_select[]\":[\"adress\",\"brand\",\"car\",\"cards\",\"categories\",\"cities\",\"clients\",\"colors\",\"comments\",\"countries\",\"cpu\",\"cpugenerations\",\"currency\",\"gouvernorate\",\"incart\",\"islands\",\"items\",\"memoriesram\",\"memoriesstorage\",\"names\",\"orderdetails\",\"orders\",\"order_status\",\"payment_method\",\"paypals\",\"promo\",\"report_problem\",\"sellers\",\"shipping\",\"users\"],\"table_structure[]\":[\"adress\",\"brand\",\"car\",\"cards\",\"categories\",\"cities\",\"clients\",\"colors\",\"comments\",\"countries\",\"cpu\",\"cpugenerations\",\"currency\",\"gouvernorate\",\"incart\",\"islands\",\"items\",\"memoriesram\",\"memoriesstorage\",\"names\",\"orderdetails\",\"orders\",\"order_status\",\"payment_method\",\"paypals\",\"promo\",\"report_problem\",\"sellers\",\"shipping\",\"users\"],\"table_data[]\":[\"adress\",\"brand\",\"car\",\"cards\",\"categories\",\"cities\",\"clients\",\"colors\",\"comments\",\"countries\",\"cpu\",\"cpugenerations\",\"currency\",\"gouvernorate\",\"incart\",\"islands\",\"items\",\"memoriesram\",\"memoriesstorage\",\"names\",\"orderdetails\",\"orders\",\"order_status\",\"payment_method\",\"paypals\",\"promo\",\"report_problem\",\"sellers\",\"shipping\",\"users\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@DATABASE@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Structure of table @TABLE@\",\"latex_structure_continued_caption\":\"Structure of table @TABLE@ (continued)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Content of table @TABLE@\",\"latex_data_continued_caption\":\"Content of table @TABLE@ (continued)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"structure_and_data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"structure_and_data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_procedure_function\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"xml_structure_or_data\":\"data\",\"xml_export_events\":\"something\",\"xml_export_functions\":\"something\",\"xml_export_procedures\":\"something\",\"xml_export_tables\":\"something\",\"xml_export_triggers\":\"something\",\"xml_export_views\":\"something\",\"xml_export_contents\":\"something\",\"yaml_structure_or_data\":\"data\",\"\":null,\"lock_tables\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"csv_columns\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_create_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}'),
(3, 'root', 'database', 'sop', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"structure_or_data_forced\":\"0\",\"table_select[]\":[\"adress\",\"brand\",\"car\",\"cards\",\"categories\",\"cities\",\"clients\",\"client_page\",\"colors\",\"comments\",\"countries\",\"cpu\",\"cpugenerations\",\"currency\",\"exchange\",\"gouvernorate\",\"incart\",\"islands\",\"items\",\"items_allow_place_shiping\",\"memoriesram\",\"memoriesstorage\",\"names\",\"orderdetails\",\"orders\",\"order_status\",\"payment_method\",\"paypals\",\"promo\",\"report_problem\",\"reward_withdrawn\",\"sellers\",\"seller_payment_method\",\"serched_word\",\"shipping\",\"tags\",\"time_searched_word\",\"users\"],\"table_structure[]\":[\"adress\",\"brand\",\"car\",\"cards\",\"categories\",\"cities\",\"clients\",\"client_page\",\"colors\",\"comments\",\"countries\",\"cpu\",\"cpugenerations\",\"currency\",\"exchange\",\"gouvernorate\",\"incart\",\"islands\",\"items\",\"items_allow_place_shiping\",\"memoriesram\",\"memoriesstorage\",\"names\",\"orderdetails\",\"orders\",\"order_status\",\"payment_method\",\"paypals\",\"promo\",\"report_problem\",\"reward_withdrawn\",\"sellers\",\"seller_payment_method\",\"serched_word\",\"shipping\",\"tags\",\"time_searched_word\",\"users\"],\"table_data[]\":[\"adress\",\"brand\",\"car\",\"cards\",\"categories\",\"cities\",\"clients\",\"client_page\",\"colors\",\"comments\",\"countries\",\"cpu\",\"cpugenerations\",\"currency\",\"exchange\",\"gouvernorate\",\"incart\",\"islands\",\"items\",\"items_allow_place_shiping\",\"memoriesram\",\"memoriesstorage\",\"names\",\"orderdetails\",\"orders\",\"order_status\",\"payment_method\",\"paypals\",\"promo\",\"report_problem\",\"reward_withdrawn\",\"sellers\",\"seller_payment_method\",\"serched_word\",\"shipping\",\"tags\",\"time_searched_word\",\"users\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@DATABASE@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Structure of table @TABLE@\",\"latex_structure_continued_caption\":\"Structure of table @TABLE@ (continued)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Content of table @TABLE@\",\"latex_data_continued_caption\":\"Content of table @TABLE@ (continued)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"structure_and_data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"structure_and_data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_procedure_function\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"xml_structure_or_data\":\"data\",\"xml_export_events\":\"something\",\"xml_export_functions\":\"something\",\"xml_export_procedures\":\"something\",\"xml_export_tables\":\"something\",\"xml_export_triggers\":\"something\",\"xml_export_views\":\"something\",\"xml_export_contents\":\"something\",\"yaml_structure_or_data\":\"data\",\"\":null,\"lock_tables\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"csv_columns\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_create_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}'),
(5, 'root', 'database', 'databse', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"structure_or_data_forced\":\"0\",\"table_select[]\":[\"adress\",\"brand\",\"car\",\"cards\",\"categories\",\"cities\",\"clients\",\"client_page\",\"colors\",\"comments\",\"countries\",\"cpu\",\"cpugenerations\",\"currency\",\"exchange\",\"gouvernorate\",\"incart\",\"islands\",\"items\",\"items_allow_place_shiping\",\"memoriesram\",\"memoriesstorage\",\"names\",\"orderdetails\",\"orders\",\"order_status\",\"payment_method\",\"paypals\",\"promo\",\"report_problem\",\"reward_withdrawn\",\"sellers\",\"seller_payment_method\",\"serched_word\",\"shipping\",\"tags\",\"time_searched_word\",\"users\"],\"table_structure[]\":[\"adress\",\"brand\",\"car\",\"cards\",\"categories\",\"cities\",\"clients\",\"client_page\",\"colors\",\"comments\",\"countries\",\"cpu\",\"cpugenerations\",\"currency\",\"exchange\",\"gouvernorate\",\"incart\",\"islands\",\"items\",\"items_allow_place_shiping\",\"memoriesram\",\"memoriesstorage\",\"names\",\"orderdetails\",\"orders\",\"order_status\",\"payment_method\",\"paypals\",\"promo\",\"report_problem\",\"reward_withdrawn\",\"sellers\",\"seller_payment_method\",\"serched_word\",\"shipping\",\"tags\",\"time_searched_word\",\"users\"],\"table_data[]\":[\"adress\",\"brand\",\"car\",\"cards\",\"categories\",\"cities\",\"clients\",\"client_page\",\"colors\",\"comments\",\"countries\",\"cpu\",\"cpugenerations\",\"currency\",\"exchange\",\"gouvernorate\",\"incart\",\"islands\",\"items\",\"items_allow_place_shiping\",\"memoriesram\",\"memoriesstorage\",\"names\",\"orderdetails\",\"orders\",\"order_status\",\"payment_method\",\"paypals\",\"promo\",\"report_problem\",\"reward_withdrawn\",\"sellers\",\"seller_payment_method\",\"serched_word\",\"shipping\",\"tags\",\"time_searched_word\",\"users\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@DATABASE@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Structure of table @TABLE@\",\"latex_structure_continued_caption\":\"Structure of table @TABLE@ (continued)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Content of table @TABLE@\",\"latex_data_continued_caption\":\"Content of table @TABLE@ (continued)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"structure_and_data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"structure_and_data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_procedure_function\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"xml_structure_or_data\":\"data\",\"xml_export_events\":\"something\",\"xml_export_functions\":\"something\",\"xml_export_procedures\":\"something\",\"xml_export_tables\":\"something\",\"xml_export_triggers\":\"something\",\"xml_export_views\":\"something\",\"xml_export_contents\":\"something\",\"yaml_structure_or_data\":\"data\",\"\":null,\"lock_tables\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"csv_columns\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_create_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}'),
(6, 'root', 'server', 'database', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"db_select[]\":[\"phpmyadmin\",\"shop\",\"test\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@SERVER@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Structure of table @TABLE@\",\"latex_structure_continued_caption\":\"Structure of table @TABLE@ (continued)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Content of table @TABLE@\",\"latex_data_continued_caption\":\"Content of table @TABLE@ (continued)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"yaml_structure_or_data\":\"data\",\"\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"csv_columns\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_drop_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_procedure_function\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"shop\",\"table\":\"items\"},{\"db\":\"shop\",\"table\":\"sellers\"},{\"db\":\"shop\",\"table\":\"shipping\"},{\"db\":\"shop\",\"table\":\"brand\"},{\"db\":\"shop\",\"table\":\"categories\"},{\"db\":\"shop\",\"table\":\"adress\"},{\"db\":\"shop\",\"table\":\"time_searched_word\"},{\"db\":\"shop\",\"table\":\"serched_word\"},{\"db\":\"shop\",\"table\":\"exchange\"},{\"db\":\"shop\",\"table\":\"currency\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

--
-- Dumping data for table `pma__table_info`
--

INSERT INTO `pma__table_info` (`db_name`, `table_name`, `display_field`) VALUES
('shop', 'adress', 'PlaceDescription'),
('shop', 'cpu', 'CPUNAME'),
('shop', 'items', 'Name'),
('shop', 'names', 'FirstName'),
('shop', 'orderdetails', 'PromoCode'),
('shop', 'orders', 'TotalOrder'),
('shop', 'sellers', 'StoreName'),
('shop', 'time_searched_word', 'IP');

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'shop', 'items', '{\"sorted_col\":\"`items`.`ship_ngazidja` ASC\"}', '2020-07-30 15:56:21');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2020-08-14 03:24:55', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `shop`
--
CREATE DATABASE IF NOT EXISTS `shop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `shop`;

-- --------------------------------------------------------

--
-- Table structure for table `adress`
--

CREATE TABLE `adress` (
  `AdressID` int(11) NOT NULL,
  `City` int(11) DEFAULT NULL,
  `Gouvernorate` int(11) DEFAULT NULL,
  `ClientID` int(11) DEFAULT NULL,
  `PlaceDescription` varchar(255) DEFAULT NULL,
  `IslandID` int(11) DEFAULT NULL,
  `CountryID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adress`
--

INSERT INTO `adress` (`AdressID`, `City`, `Gouvernorate`, `ClientID`, `PlaceDescription`, `IslandID`, `CountryID`) VALUES
(2, 1, 2, 1, 'PHILIPS', 1, 1),
(3, 1, 2, 1, 'Magoudjou', 1, 1),
(4, 1, 2, 1, 'Philips', 1, 1),
(5, 12, 1, 1, 'mdrawadjouu', 1, 1),
(6, 1, 2, 1, NULL, 1, 1),
(10, 1, 2, 2, 'jksncjs', 1, 1),
(11, 1, 2, 2, 'rdfvrtsh', 1, 1),
(12, 1, 2, 2, 'dcnsndm', 1, 1),
(15, 1, 2, 2, 'cgdf', 1, 1),
(16, 1, 2, 2, 'OSIS', 1, 1),
(17, 2, 2, 1, '52', 1, 1),
(19, 2, 2, 1, 'Badjanani', 1, 1),
(20, 12, 1, 1, 'paris', 1, 1),
(33, 2, 2, 1, 'fhjrtfshxbfryttttttttttttttttttttttttttttttttttttttttttttttttttttc', 1, 1),
(34, 2, 2, 1, 'dxtujes65uj46ea5s', 1, 1),
(36, 2, 2, 1, 'zd64eh6dr4htdr54jr5s7808530', 1, 1),
(50, 2, 2, 1, 'DTGHFTDS', 1, 1),
(54, 2, 2, 1, 'TDJY', 1, 1),
(56, 2, 2, 1, 'TDUJR76', 1, 1),
(62, 2, 2, 1, '524654656', 1, 1),
(64, 2, 2, 1, 'rstrhy', 1, 1),
(73, 2, 2, 1, '58895688', 1, 1),
(74, 1, 1, 1, 'iugguy', 1, 1),
(75, 12, 1, 1, 'mdarya', 1, 1),
(80, 13, NULL, 1, 'Lacpurneuve ', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `BrandID` int(11) NOT NULL,
  `BrandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`BrandID`, `BrandName`) VALUES
(1, '---Choisissez La Marque--'),
(2, 'Ajouter Une Nouvelle Marque\r\n'),
(3, 'All Brands'),
(4, 'APPLE'),
(5, 'OPPO'),
(6, 'Xomi'),
(7, 'Tp-link'),
(8, 'Sonny');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `carid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `model` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`carid`, `name`, `model`) VALUES
(1, 'TOYOTA', 2015),
(2, 'NISSAN', 2013),
(3, 'HUNDAI', 2010),
(4, 'RENAULT', 2009);

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `CardID` int(11) NOT NULL,
  `CardNumber` int(11) NOT NULL,
  `CardName` varchar(255) NOT NULL,
  `ClientID` int(11) DEFAULT NULL,
  `MM` tinyint(4) NOT NULL,
  `YY` tinyint(4) NOT NULL,
  `CVC` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`CardID`, `CardNumber`, `CardName`, `ClientID`, `MM`, `YY`, `CVC`) VALUES
(5, 123456789, 'SAYED', 1, 5, 127, 127);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` text,
  `Ordering` int(11) DEFAULT NULL,
  `Visibilty` tinyint(4) DEFAULT NULL,
  `AllowComment` tinyint(4) NOT NULL DEFAULT '0',
  `AllowAds` tinyint(4) NOT NULL DEFAULT '0',
  `Image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `Name`, `Description`, `Ordering`, `Visibilty`, `AllowComment`, `AllowAds`, `Image`) VALUES
(1, '---Choisissez La Catégorie--', NULL, 0, 1, 1, 1, NULL),
(2, 'Ajouter Une Nouvelle Catégorie', 'Ajouter Une Nouvelle Catégorie', 1, 1, 1, 1, NULL),
(3, 'All Categories', '', 3, 0, 0, 0, 'cell.png'),
(4, 'Clothes', 'Clothes Fashions', 4, 0, 0, 0, 'tshirt.png'),
(7, 'Games', 'games', 1, 1, 1, 1, 'game-controller.png'),
(8, 'Computres', 'Computres items', 2, 0, 0, 0, 'computer-screen.png'),
(9, 'Food', NULL, NULL, NULL, 0, 0, NULL),
(12, 'Foods', NULL, NULL, NULL, 0, 0, NULL),
(18, 'foodss', NULL, NULL, NULL, 0, 0, NULL),
(21, 'Oil', NULL, NULL, NULL, 0, 0, NULL),
(22, 'Router', NULL, NULL, NULL, 0, 0, NULL),
(23, 'Papers', NULL, NULL, NULL, 0, 0, NULL),
(24, 'Cigarte', NULL, NULL, NULL, 0, 0, NULL),
(25, 'Vps', NULL, NULL, NULL, 0, 0, NULL),
(26, 'Laptop', NULL, NULL, NULL, 0, 0, NULL),
(27, 'Cran', NULL, NULL, NULL, 0, 0, NULL),
(28, 'Telephones', NULL, NULL, NULL, 0, 0, 'cell.png');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `CityID` int(11) NOT NULL,
  `CityName` varchar(255) NOT NULL,
  `GovernorateID` int(11) DEFAULT NULL,
  `IslandID` int(11) DEFAULT NULL,
  `CountrID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`CityID`, `CityName`, `GovernorateID`, `IslandID`, `CountrID`) VALUES
(0, '----', 0, 0, 1),
(1, 'Dimadjjou', 1, 1, 1),
(2, 'Moroni', 2, 1, 1),
(5, 'Mitsamidou', 4, 2, 1),
(9, 'wela', 6, 1, 1),
(12, 'mwadja', 1, 1, 1),
(13, 'Paris', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `ClientID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `FullName` varchar(255) DEFAULT NULL,
  `City` int(11) DEFAULT NULL,
  `Island` int(11) DEFAULT NULL,
  `Gouvernorate` int(11) DEFAULT NULL,
  `Date` date NOT NULL,
  `Country` varchar(255) NOT NULL,
  `IslandName` varchar(255) DEFAULT NULL,
  `Mobile` bigint(17) DEFAULT NULL,
  `Avatar` varchar(250) DEFAULT NULL,
  `CodeChat` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`ClientID`, `Username`, `Password`, `Email`, `FirstName`, `LastName`, `FullName`, `City`, `Island`, `Gouvernorate`, `Date`, `Country`, `IslandName`, `Mobile`, `Avatar`, `CodeChat`) VALUES
(1, 'elbak', '1234', 'elbak1995@gmail.com', 'Elbak', 'Mahmoud', 'Elbak Mahmoud', 9, 1, 6, '2019-11-27', 'Comors', '', 10566588, 'theme/image/userImg/elbak/32060200717012317pm.JPG', 16578956),
(2, 'salim', '1234', 'Salim@hotmail.com', 'Salim', 'Mahmoud', '', 0, 0, 0, '2019-11-30', '', NULL, 0, 'theme/image/userImg/salim/22390200225045430am.JPG', 89468579),
(3, 'Amanata', '1234', 'Amanata@gmail.com', 'Amanata', 'Mahmoud', '', 1, 1, 1, '2019-12-17', 'Comoros', NULL, 335685, '', 568945368),
(18, 'salima', '1234', 'salim@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '', NULL, NULL, NULL, 752200605010450),
(19, 'Idriss', '1234', 'Idriss@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '', NULL, NULL, NULL, 405200605064324),
(20, 'salmata', '1234', 'elbak269@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '', NULL, NULL, NULL, 443200703022118),
(21, 'manzel', '1234', 'mazel@gmail.com', 'Manzel', 'Said', NULL, NULL, NULL, NULL, '2020-07-03', '', NULL, NULL, NULL, 0),
(22, 'Mahmoud', '1234', 'Mahmoud@gmail.com', 'Mahmoud', 'Said', NULL, NULL, NULL, NULL, '2020-07-03', '', NULL, NULL, NULL, 0),
(24, 'said', '1234', 'said@gmail.com', 'said', 'assoumani', NULL, NULL, NULL, NULL, '2020-07-04', '', NULL, NULL, 'theme/image/userImg/said/603755816424.jpg', 0),
(25, 'nokuthula', '1234', 'nokuthula@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '', NULL, NULL, 'theme/image/userImg/nokuthula/9079200706033006am.JPG', 153200706125822);

-- --------------------------------------------------------

--
-- Table structure for table `client_page`
--

CREATE TABLE `client_page` (
  `client_page_id` bigint(20) NOT NULL,
  `ClientID` int(11) NOT NULL,
  `Description` text NOT NULL,
  `PageName` varchar(50) NOT NULL,
  `show_img` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_page`
--

INSERT INTO `client_page` (`client_page_id`, `ClientID`, `Description`, `PageName`, `show_img`) VALUES
(11532845, 22, 'Description', 'Mahmoud', ''),
(22362123, 23, 'kdajaaaaaaaaa', 'sayed2', ''),
(27962462, 25, 'my decriptionnnnnnnnnnnnnnn', 'Nokuthula', 'true'),
(28408878, 21, 'Description', 'manzel', ''),
(65224404, 24, 'Description', 'said', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `ColorID` int(11) NOT NULL,
  `ColorCode` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ColorName` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`ColorID`, `ColorCode`, `ColorName`) VALUES
(1, '#f38a00', 'orange'),
(2, '#458500', 'green'),
(3, '#343a40', 'black'),
(4, '#007bff', 'blue');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Comment_ID` int(11) NOT NULL,
  `Comment` text NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT '1',
  `CommentDate` date NOT NULL,
  `ClientID` int(11) DEFAULT NULL,
  `ItemID` int(11) DEFAULT NULL,
  `Rating` smallint(6) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`Comment_ID`, `Comment`, `Status`, `CommentDate`, `ClientID`, `ItemID`, `Rating`) VALUES
(1, 'Si je suis globalement satisfait de ce produit, je regrette que la led s’allume lorsque la vision nocturne s’enclenche, du coup pour de la discrétion c’est totalement mort, dommage mon ancienne cam chinoise à bas prix faisait mieux !', 1, '2019-12-24', 1, 4, 4),
(2, 'Super produit cet Play Station', 1, '2019-12-12', 3, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `CountryID` int(11) NOT NULL,
  `CountryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`CountryID`, `CountryName`) VALUES
(1, 'Comoros'),
(2, 'France');

-- --------------------------------------------------------

--
-- Table structure for table `cpu`
--

CREATE TABLE `cpu` (
  `CpuID` int(11) NOT NULL,
  `CPUNAME` varchar(255) NOT NULL,
  `generation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cpu`
--

INSERT INTO `cpu` (`CpuID`, `CPUNAME`, `generation`) VALUES
(1, 'Core i7', 1),
(2, 'Core i7', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cpugenerations`
--

CREATE TABLE `cpugenerations` (
  `id` int(11) NOT NULL,
  `generation` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cpugenerations`
--

INSERT INTO `cpugenerations` (`id`, `generation`, `description`) VALUES
(1, '860', '2.8 GHz'),
(2, '870', '	2.93 GHz');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `CurrencyID` int(11) NOT NULL,
  `CurrencyName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`CurrencyID`, `CurrencyName`) VALUES
(1, 'EUR'),
(2, 'KMF');

-- --------------------------------------------------------

--
-- Table structure for table `exchange`
--

CREATE TABLE `exchange` (
  `ID` int(11) NOT NULL,
  `CurrencyID` int(11) NOT NULL,
  `Cu_Value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exchange`
--

INSERT INTO `exchange` (`ID`, `CurrencyID`, `Cu_Value`) VALUES
(1, 1, '493.50');

-- --------------------------------------------------------

--
-- Table structure for table `gouvernorate`
--

CREATE TABLE `gouvernorate` (
  `GovernorateID` int(11) NOT NULL,
  `GouvernoratName` varchar(255) NOT NULL,
  `IslandID` int(11) DEFAULT NULL,
  `shipping_price` decimal(10,0) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gouvernorate`
--

INSERT INTO `gouvernorate` (`GovernorateID`, `GouvernoratName`, `IslandID`, `shipping_price`) VALUES
(0, '----', 0, '0'),
(1, 'Hamahamet', 1, '0'),
(2, 'Bambao', 1, '0'),
(3, 'Mitsamihouli', 1, '0'),
(4, 'Mitsamidou', 2, '0'),
(6, 'Hambou', 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `incart`
--

CREATE TABLE `incart` (
  `ProductID` int(11) DEFAULT NULL,
  `QTY` int(11) DEFAULT NULL,
  `ClientID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incart`
--

INSERT INTO `incart` (`ProductID`, `QTY`, `ClientID`) VALUES
(5, 2, 1),
(4, 1, 1),
(6, 6, 1),
(10, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `islands`
--

CREATE TABLE `islands` (
  `IslandID` int(11) NOT NULL,
  `IslandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `islands`
--

INSERT INTO `islands` (`IslandID`, `IslandName`) VALUES
(0, '----'),
(4, 'Maore'),
(3, 'Mwali'),
(2, 'Ndzwani'),
(1, 'Ngazidja');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ItemID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text,
  `Price` varchar(255) DEFAULT NULL,
  `CurrencyID` int(11) DEFAULT NULL,
  `AddDate` date NOT NULL,
  `CountryMade` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Status` varchar(250) NOT NULL,
  `Rating` smallint(6) NOT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `MemberID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `BrandID` int(11) DEFAULT NULL,
  `IslandID` int(11) DEFAULT NULL,
  `CountryID` int(11) DEFAULT NULL,
  `GouvernoratID` int(11) DEFAULT NULL,
  `CityID` int(11) DEFAULT NULL,
  `ShippingID` int(11) DEFAULT NULL,
  `Pic1` varchar(255) NOT NULL,
  `Pic2` varchar(255) NOT NULL,
  `Pic3` varchar(255) NOT NULL,
  `MembersName` varchar(255) DEFAULT NULL,
  `Offer` int(11) NOT NULL,
  `Tags` text,
  `Color` int(11) DEFAULT NULL,
  `CPUSpeed` varchar(100) NOT NULL,
  `NumberOfSIM` tinyint(4) NOT NULL,
  `MobilePhoneType` tinyint(50) NOT NULL,
  `CellulaNetworkTechnology` tinyint(4) NOT NULL,
  `CPU` int(11) DEFAULT NULL,
  `BatteryCapacityinmAh` varchar(255) NOT NULL,
  `Expirable` date DEFAULT NULL,
  `SerialScanRequired` varchar(255) NOT NULL,
  `FrontCamera` varchar(100) NOT NULL,
  `FastCharge` tinyint(1) NOT NULL,
  `Imagequality` varchar(50) NOT NULL,
  `MemoryRAM` int(11) DEFAULT NULL,
  `ShippingCountry` int(11) DEFAULT NULL,
  `ShippingIsland` int(11) DEFAULT NULL,
  `Discount` int(11) DEFAULT '0',
  `Color1` int(11) DEFAULT NULL,
  `Color2` int(11) DEFAULT NULL,
  `Color3` int(11) DEFAULT NULL,
  `Color4` int(11) DEFAULT NULL,
  `MemoryStorage` int(11) DEFAULT NULL,
  `payment_method` int(11) NOT NULL,
  `ship_ngazidja` smallint(15) DEFAULT NULL,
  `ship_ndzouwani` smallint(15) DEFAULT NULL,
  `ship_mwali` smallint(15) DEFAULT NULL,
  `ship_france` smallint(15) DEFAULT NULL,
  `ship_ngazidja_price` varchar(100) DEFAULT NULL,
  `ship_ndzouwani_price` varchar(100) DEFAULT NULL,
  `ship_mwali_price` varchar(100) DEFAULT NULL,
  `ship_france_price` varchar(100) DEFAULT NULL,
  `Estamited_Delivery_Ngzidja` smallint(6) DEFAULT NULL,
  `Estamited_Delivery_Nduwani` smallint(6) DEFAULT NULL,
  `Estamited_Delivery_Mwali` smallint(6) DEFAULT NULL,
  `Estamited_Delivery_France` smallint(6) DEFAULT NULL,
  `Ship_Method_Ngazidja` int(11) DEFAULT NULL,
  `Ship_Method_Ndzuwani` int(11) DEFAULT NULL,
  `Ship_Method_Mwali` int(11) DEFAULT NULL,
  `Ship_Method_France` int(11) DEFAULT NULL,
  `payment_method_Ngazida` int(11) DEFAULT NULL,
  `payment_method_Ndzuwani` int(11) DEFAULT NULL,
  `payment_method_Mwali` int(11) DEFAULT NULL,
  `payment_method_France` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ItemID`, `Name`, `Description`, `Price`, `CurrencyID`, `AddDate`, `CountryMade`, `Image`, `Status`, `Rating`, `CategoryID`, `MemberID`, `UserID`, `BrandID`, `IslandID`, `CountryID`, `GouvernoratID`, `CityID`, `ShippingID`, `Pic1`, `Pic2`, `Pic3`, `MembersName`, `Offer`, `Tags`, `Color`, `CPUSpeed`, `NumberOfSIM`, `MobilePhoneType`, `CellulaNetworkTechnology`, `CPU`, `BatteryCapacityinmAh`, `Expirable`, `SerialScanRequired`, `FrontCamera`, `FastCharge`, `Imagequality`, `MemoryRAM`, `ShippingCountry`, `ShippingIsland`, `Discount`, `Color1`, `Color2`, `Color3`, `Color4`, `MemoryStorage`, `payment_method`, `ship_ngazidja`, `ship_ndzouwani`, `ship_mwali`, `ship_france`, `ship_ngazidja_price`, `ship_ndzouwani_price`, `ship_mwali_price`, `ship_france_price`, `Estamited_Delivery_Ngzidja`, `Estamited_Delivery_Nduwani`, `Estamited_Delivery_Mwali`, `Estamited_Delivery_France`, `Ship_Method_Ngazidja`, `Ship_Method_Ndzuwani`, `Ship_Method_Mwali`, `Ship_Method_France`, `payment_method_Ngazida`, `payment_method_Ndzuwani`, `payment_method_Mwali`, `payment_method_France`) VALUES
(4, 'Play Station4', 'Paragraphs & Topic Sentences\r\nA paragraph is a series of sentences that are organized and coherent, and are all related to a single topic. Almost every piece of writing you do that is longer than a few sentences should be organized into paragraphs. This is because paragraphs show a reader where the subdivisions of an essay begin and end, and thus help the reader see the organization of the essay and grasp its main points.\r\n\r\nParagraphs can contain many different kinds of information. A paragraph could contain a series of brief examples or a single long illustration of a general point. It might describe a place, character, or process; narrate a series of events; compare or contrast two or more things; classify items into categories; or describe causes and effects. Regardless of the kind of information they contain, all paragraphs share certain characteristics. One of the most important of these is a topic sentence.', '400.0000', 2, '2019-12-17', 'Japan', '', 'Used', 0, 8, 3, NULL, 8, 1, NULL, NULL, NULL, 1, 'salim/655677438917171PGvPXpk5L._AC_UY218_ML3_.jpg', 'salim/60556009604471PGvPXpk5L._AC_UY218_ML3_.jpg', 'salim/194233632351671PGvPXpk5L._AC_UY218_ML3_.jpg', NULL, 0, '', 2, '', 0, 0, 0, 1, '', NULL, '', '', 0, '', 1, 0, 1, 1, 1, 2, 4, NULL, 1, 1, 1, 0, 0, 0, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Iphone11', 'Paragraphs & Topic Sentences\r\nA paragraph is a series of sentences that are organized and coherent, and are all related to a single topic. Almost every piece of writing you do that is longer than a few sentences should be organized into paragraphs. This is because paragraphs show a reader where the subdivisions of an essay begin and end, and thus help the reader see the organization of the essay and grasp its main points.\r\n\r\nParagraphs can contain many different kinds of information. A paragraph could contain a series of brief examples or a single long illustration of a general point. It might describe a place, character, or process; narrate a series of events; compare or contrast two or more things; classify items into categories; or describe causes and effects. Regardless of the kind of information they contain, all paragraphs share certain characteristics. One of the most important of these is a topic sentence.', '900.5690', 2, '2019-12-17', 'USA', '', 'Used', 0, 28, 3, NULL, 8, 1, NULL, NULL, NULL, 2, 'salim/3722611160096iphone11.jpg', 'salim/2108140562888iphone11.jpg', 'salim/6226788836169iphone11.jpg', NULL, 0, '', 2, '', 0, 0, 0, 1, '', NULL, '', '', 0, '', 1, 0, 0, 1, 1, 2, 4, NULL, 1, 1, 1, 0, 0, 0, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Opp9', 'Paragraphs & Topic Sentences\r\nA paragraph is a series of sentences that are organized and coherent, and are all related to a single topic. Almost every piece of writing you do that is longer than a few sentences should be organized into paragraphs. This is because paragraphs show a reader where the subdivisions of an essay begin and end, and thus help the reader see the organization of the essay and grasp its main points.\r\n\r\nParagraphs can contain many different kinds of information. A paragraph could contain a series of brief examples or a single long illustration of a general point. It might describe a place, character, or process; narrate a series of events; compare or contrast two or more things; classify items into categories; or describe causes and effects. Regardless of the kind of information they contain, all paragraphs share certain characteristics. One of the most important of these is a topic sentence.', '300.0000', 2, '2019-12-17', 'Chine', '', 'New', 0, 28, 3, NULL, 5, 1, NULL, NULL, NULL, 1, 'salim/4348246947052oppo9.jpg', 'salim/7080608138181youtube.png', 'salim/4125586952938oppo9.jpg', NULL, 0, '', 2, '', 0, 0, 0, 1, '', NULL, '', '', 0, '', 1, 0, 0, 1, 1, 2, 4, NULL, 1, 1, 1, 0, 0, 0, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Play Station3 Pro', 'Paragraphs & Topic Sentences\r\nA paragraph is a series of sentences that are organized and coherent, and are all related to a single topic. Almost every piece of writing you do that is longer than a few sentences should be organized into paragraphs. This is because paragraphs show a reader where the subdivisions of an essay begin and end, and thus help the reader see the organization of the essay and grasp its main points.\r\n\r\nParagraphs can contain many different kinds of information. A paragraph could contain a series of brief examples or a single long illustration of a general point. It might describe a place, character, or process; narrate a series of events; compare or contrast two or more things; classify items into categories; or describe causes and effects. Regardless of the kind of information they contain, all paragraphs share certain characteristics. One of the most important of these is a topic sentence.', '300.0000', 2, '2019-12-17', 'Japan', '', 'New', 5, 8, 3, NULL, 8, 1, NULL, NULL, NULL, 1, 'salim/6789153107916playstation.jpg', 'salim/4610694025037playstation.jpg', 'salim/1153715382402playstation.jpg', NULL, 0, '', 2, '', 0, 0, 0, 1, '', NULL, '', '', 0, '', 1, 0, 1, 1, 1, 2, 4, NULL, 1, 1, 1, 0, 0, 0, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'SonnyTV', 'Paragraphs & Topic Sentences\r\nA paragraph is a series of sentences that are organized and coherent, and are all related to a single topic. Almost every piece of writing you do that is longer than a few sentences should be organized into paragraphs. This is because paragraphs show a reader where the subdivisions of an essay begin and end, and thus help the reader see the organization of the essay and grasp its main points.\r\n\r\nParagraphs can contain many different kinds of information. A paragraph could contain a series of brief examples or a single long illustration of a general point. It might describe a place, character, or process; narrate a series of events; compare or contrast two or more things; classify items into categories; or describe causes and effects. Regardless of the kind of information they contain, all paragraphs share certain characteristics. One of the most important of these is a topic sentence.', '250.0000', 2, '2019-12-17', 'Japan', '', 'Used', 0, 28, 3, NULL, 8, 1, NULL, NULL, NULL, 1, 'salim/5746374322941tv.jpg', 'salim/5054543389616tv.jpg', 'salim/5053333879167tv.jpg', NULL, 0, '', 2, '', 0, 0, 0, 1, '', NULL, '', '', 0, '', 1, 0, 1, 1, 1, 2, 4, NULL, 1, 1, 1, 0, 0, 0, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'PSP', 'Paragraphs & Topic Sentences\r\nA paragraph is a series of sentences that are organized and coherent, and are all related to a single topic. Almost every piece of writing you do that is longer than a few sentences should be organized into paragraphs. This is because paragraphs show a reader where the subdivisions of an essay begin and end, and thus help the reader see the organization of the essay and grasp its main points.\r\n\r\nParagraphs can contain many different kinds of information. A paragraph could contain a series of brief examples or a single long illustration of a general point. It might describe a place, character, or process; narrate a series of events; compare or contrast two or more things; classify items into categories; or describe causes and effects. Regardless of the kind of information they contain, all paragraphs share certain characteristics. One of the most important of these is a topic sentence.', '100.0000', 2, '2019-12-19', 'Jpana', '', 'New', 0, 7, 1, NULL, 8, 1, NULL, NULL, NULL, 2, 'elbak/3259470454164psp.jpg', 'elbak/6400102191329psp2.jpg', 'elbak/4469299158525psp3.jpg', NULL, 0, 'PSP', 2, '', 0, 0, 0, 1, '', NULL, '', '', 0, '', 1, 0, 0, 1, 1, 2, 4, NULL, 1, 1, 1, 0, 0, 0, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'PSVITA', 'Paragraphs & Topic Sentences\r\nA paragraph is a series of sentences that are organized and coherent, and are all related to a single topic. Almost every piece of writing you do that is longer than a few sentences should be organized into paragraphs. This is because paragraphs show a reader where the subdivisions of an essay begin and end, and thus help the reader see the organization of the essay and grasp its main points.\r\n\r\nParagraphs can contain many different kinds of information. A paragraph could contain a series of brief examples or a single long illustration of a general point. It might describe a place, character, or process; narrate a series of events; compare or contrast two or more things; classify items into categories; or describe causes and effects. Regardless of the kind of information they contain, all paragraphs share certain characteristics. One of the most important of these is a topic sentence.', '150.0000', 2, '2019-12-19', 'Japan', '', 'Used', 0, 7, 1, NULL, 8, 1, NULL, NULL, NULL, 1, 'elbak/7637713644391psvita.jpg', 'elbak/8132093942166psvita2.jpg', 'elbak/1756996761439psvita3.png', NULL, 0, 'PSP, PSVITA, GAMES', 2, '', 0, 0, 0, 1, '', NULL, '', '', 0, '', 1, 0, 0, 1, 1, 2, 4, NULL, 1, 1, 1, 0, 0, 0, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Sonyz5', 'SonnyZ5 Is A Cell Phone Created By Sonny Company In 2013 ', '1500.0000', 2, '2020-01-07', 'Japan', '', 'New', 0, 28, 1, NULL, 8, 1, NULL, NULL, NULL, 1, 'elbak/5181875449843sony-g5-800x800.jpg', 'elbak/1541929563683HST_SonyXperiaZ5Compact_8-800x800.jpg', 'elbak/4320218832441Xperia-Z5_3_1441620544.jpg', NULL, 0, 'CellPhone, Sonny', 2, '', 0, 0, 0, 1, '', NULL, '', '', 0, '', 1, NULL, NULL, 1, 1, 2, 4, NULL, 1, 1, 1, 0, 0, 0, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Fanta', 'Fanta', '0.0041', 2, '2020-07-20', 'Usa', '', 'New', 0, 9, 1, NULL, 8, NULL, NULL, NULL, NULL, 1, 'elbak/2636834035451WIN_20180317_01_13_37_Pro.jpg', 'elbak/7089113124798WIN_20180317_01_13_39_Pro.jpg', 'elbak/7007372392288WIN_20180317_01_13_37_Pro.jpg', NULL, 0, 'CSS', NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 0, '5', '10', '', '', 4, 9, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Laptop', 'Laptop', '0.1218', 2, '2020-07-20', 'Egypt', '', 'Used', 0, 26, 1, NULL, 7, NULL, NULL, NULL, NULL, 1, 'elbak/8460278876236WIN_20180317_01_13_37_Pro.jpg', 'elbak/9501710940661WIN_20180317_01_13_39_Pro.jpg', 'elbak/7858695025965WIN_20180317_01_13_39_Pro.jpg', NULL, 0, 'Javascript', NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 0, '', '', '', '', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Coca Cola', NULL, '0.1218', 2, '2020-07-20', 'Usa', '', 'New', 0, 9, 1, NULL, 8, NULL, NULL, NULL, NULL, 1, 'elbak/3693090275645001397056.jpg', 'elbak/532351640626001397056.jpg', 'elbak/6943283764176001397056.jpg', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 0, '', '', '', '', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'fantaaaaaaaaa', NULL, '90.0000', 2, '2020-07-20', 'Egypt', '', 'Used', 0, 4, 1, NULL, 6, NULL, NULL, NULL, NULL, 1, 'elbak/8491456282924001397056.jpg', 'elbak/6919359905950001397056.jpg', 'elbak/7924495744832001397056.jpg', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 0, '', '', '', '', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'UPS', NULL, '74025.55', 2, '2020-07-24', 'Japan', '', 'New', 0, 25, 1, NULL, 6, NULL, NULL, NULL, NULL, 1, 'elbak/1163646747847item_XXL_21993276_28443069.jpg', 'elbak/9932498569726item_XXL_21993276_28443069.jpg', 'elbak/1377415453652item_XXL_21993276_28443069.jpg', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 0, '15', '', '', '', 2, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Madjimbi', NULL, '74025.55', 2, '2020-07-24', 'Egypt', '', 'New', 0, 9, 1, NULL, 4, NULL, NULL, NULL, NULL, 1, 'elbak/4054714557163taro-songe-madere-1024x768.jpg', 'elbak/9670672638171taro-songe-madere-1024x768.jpg', 'elbak/6511024737347taro-songe-madere-1024x768.jpg', NULL, 0, NULL, NULL, '', 0, 0, 0, NULL, '', NULL, '', '', 0, '', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 0, 0, '20', '30', '', '', 2, 3, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items_allow_place_shiping`
--

CREATE TABLE `items_allow_place_shiping` (
  `id` int(11) NOT NULL,
  `CountryID` int(11) NOT NULL,
  `IslandID` int(11) DEFAULT NULL,
  `CityID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `memoriesram`
--

CREATE TABLE `memoriesram` (
  `MemoryID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memoriesram`
--

INSERT INTO `memoriesram` (`MemoryID`, `Name`) VALUES
(1, '1GB'),
(2, '2GB'),
(3, '3GB'),
(4, '4GB'),
(5, '5GB'),
(6, '6GB'),
(7, '16GB'),
(8, '23GB');

-- --------------------------------------------------------

--
-- Table structure for table `memoriesstorage`
--

CREATE TABLE `memoriesstorage` (
  `MemoriesStorageID` int(11) NOT NULL,
  `MemoriesStorageName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memoriesstorage`
--

INSERT INTO `memoriesstorage` (`MemoriesStorageID`, `MemoriesStorageName`) VALUES
(1, '500GB'),
(2, '20GB'),
(3, '100GB'),
(4, '16GB'),
(5, '1TB'),
(6, '2TB'),
(7, '65GB');

-- --------------------------------------------------------

--
-- Table structure for table `names`
--

CREATE TABLE `names` (
  `NameID` int(11) NOT NULL,
  `ClientID` int(11) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `names`
--

INSERT INTO `names` (`NameID`, `ClientID`, `FirstName`, `LastName`) VALUES
(1, 1, 'mahmoud', 'said'),
(2, NULL, 'fatoumia', 'ali'),
(3, 1, 'Fatoumia', 'Ali'),
(4, 1, 'dse56yh', 'rs6uhy5er46'),
(5, 1, 'Elbak', 'Mahmoud'),
(6, 1, 'SAYED', 'ASSOUMANI'),
(7, 1, 'SAYED', 'Asoumani'),
(8, 1, 'SALIM', 'MAHAMOUD'),
(9, 1, 'elbak', 'mahmoud sayed'),
(10, 1, 'rdsghd', 'dfthdr'),
(11, 1, 'fgbh', 'ftgh'),
(12, 1, 'kassi', 'lalala'),
(13, 1, 'elbak', 'mahamoud'),
(14, 1, 'salmata', 'mahmoud'),
(15, 1, 'salima', 'mahmoud'),
(16, 1, 'salim', 'mahamoud'),
(17, 1, 'salmat', 'sayed');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orders_details_id` int(11) NOT NULL,
  `OrderID` bigint(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `QTY` int(11) DEFAULT NULL,
  `amount` decimal(10,0) NOT NULL,
  `total_amount` decimal(10,0) NOT NULL,
  `PromoCode` varchar(100) DEFAULT NULL,
  `Discount` varchar(200) DEFAULT NULL,
  `StatusOrder` smallint(6) NOT NULL,
  `Expected_delvery_date` date DEFAULT NULL,
  `DelevredDate` datetime DEFAULT NULL,
  `date_returned` datetime DEFAULT NULL,
  `SallerID` int(11) NOT NULL,
  `Product_Img_For_Return` varchar(255) DEFAULT NULL,
  `reason_for_returned_orders` text,
  `reward_for_client_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orders_details_id`, `OrderID`, `ProductID`, `QTY`, `amount`, `total_amount`, `PromoCode`, `Discount`, `StatusOrder`, `Expected_delvery_date`, `DelevredDate`, `date_returned`, `SallerID`, `Product_Img_For_Return`, `reason_for_returned_orders`, `reward_for_client_id`) VALUES
(1, 361040023884, 11, 4, '6000', '6000', NULL, NULL, 7, '0000-00-00', NULL, NULL, 1, NULL, NULL, NULL),
(2, 361040023812, 11, 4, '6000', '6000', NULL, NULL, 1, '2020-05-31', NULL, NULL, 1, NULL, NULL, NULL),
(3, 361040125354, 9, 4, '400', '400', NULL, NULL, 5, '2020-05-23', '2020-05-20 04:08:14', '2020-05-20 08:28:00', 1, 'theme/image/retun_orders/elbak/255200527095126pm.JPG', 'NTSOUHANDZAAAAAAAAAAAAAAAAAAAAAA', NULL),
(4, 401040063825, 7, 1, '300', '300', NULL, NULL, 7, NULL, NULL, NULL, 3, NULL, NULL, NULL),
(5, 401040063699, 5, 1, '9999999999', '9999999999', NULL, NULL, 5, NULL, '0000-00-00 00:00:00', '2020-05-14 10:18:00', 3, 'theme/image/retun_orders/elbak/10200522014425pm.JPG', 'cgbfdcg', NULL),
(6, 421040063286, 4, 3, '1200', '1200', NULL, NULL, 1, NULL, NULL, NULL, 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` bigint(11) NOT NULL,
  `SellerID` int(11) DEFAULT NULL,
  `ClientID` int(11) DEFAULT NULL,
  `RequestDate` date NOT NULL,
  `DelevredDate` date NOT NULL,
  `NumberOfItem` tinyint(4) NOT NULL,
  `Gouvernorate` int(11) DEFAULT NULL,
  `City` int(11) DEFAULT NULL,
  `Currency` int(11) DEFAULT NULL,
  `Adress` int(11) DEFAULT NULL,
  `RECEPIENT` int(11) DEFAULT NULL,
  `TotalOrder` varchar(200) NOT NULL,
  `payment_method` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `SellerID`, `ClientID`, `RequestDate`, `DelevredDate`, `NumberOfItem`, `Gouvernorate`, `City`, `Currency`, `Adress`, `RECEPIENT`, `TotalOrder`, `payment_method`) VALUES
(361040023812, 1, 1, '2020-05-18', '0000-00-00', 4, NULL, NULL, 1, 74, 17, '6000', 1),
(361040023884, 1, 1, '2020-05-18', '0000-00-00', 4, NULL, NULL, 1, 75, 15, '6000', 1),
(361040125354, 1, 1, '2020-05-18', '0000-00-00', 4, NULL, NULL, 1, 74, 16, '400', 1),
(401040063699, 3, 1, '2020-05-20', '0000-00-00', 1, NULL, NULL, 1, 73, 15, '90000000000.5', 1),
(401040063825, 3, 1, '2020-05-20', '0000-00-00', 1, NULL, NULL, 1, 16, 16, '300', 1),
(421040063286, 3, 1, '2020-05-21', '0000-00-00', 3, NULL, NULL, 1, 75, 16, '1200', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `Status_id` smallint(6) NOT NULL,
  `StatusName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`Status_id`, `StatusName`) VALUES
(1, 'Wating Order'),
(2, 'on The Way'),
(3, 'Confirmed Order'),
(4, 'Returnded'),
(5, 'Cancled');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `payment_id` int(11) NOT NULL,
  `payment_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`payment_id`, `payment_name`) VALUES
(1, 'Paypal'),
(2, 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `paypals`
--

CREATE TABLE `paypals` (
  `PaypalID` int(11) NOT NULL,
  `PaypalEmail` varchar(255) NOT NULL,
  `ClientPayapl` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paypals`
--

INSERT INTO `paypals` (`PaypalID`, `PaypalEmail`, `ClientPayapl`) VALUES
(4, 'Elbak1995@gmail.com', 1),
(5, 'elbak269@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `PromoID` int(11) NOT NULL,
  `PromoItem` int(11) DEFAULT NULL,
  `PromoCode` varchar(60) NOT NULL,
  `Discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`PromoID`, `PromoItem`, `PromoCode`, `Discount`) VALUES
(1, 4, '56xjd', 18),
(2, 11, '25G25', 15);

-- --------------------------------------------------------

--
-- Table structure for table `report_problem`
--

CREATE TABLE `report_problem` (
  `feedbackid` int(11) NOT NULL,
  `Client_id` int(11) NOT NULL,
  `date_comment` int(11) NOT NULL,
  `Comment` text NOT NULL,
  `Image_comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_problem`
--

INSERT INTO `report_problem` (`feedbackid`, `Client_id`, `date_comment`, `Comment`, `Image_comment`) VALUES
(1, 1, 2147483647, 'drfg', '../theme/image/report_problem/elbak/130200524080514am.JPG'),
(2, 1, 2147483647, 'drfg', '../theme/image/report_problem/elbak/253200524080628am.JPG'),
(3, 1, 2147483647, 'cfdhbftg', '../theme/image/report_problem/elbak/736200524081841am.JPG'),
(4, 1, 2147483647, 'cfdhbftg', '../theme/image/report_problem/elbak/500200524081849am.JPG'),
(5, 1, 2147483647, 'cfdhbftg', '../theme/image/report_problem/elbak/252200524081951am.JPG'),
(6, 1, 2147483647, 'DGTHFYDDHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH', NULL),
(7, 1, 2147483647, 'CRASH APPP', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reward_withdrawn`
--

CREATE TABLE `reward_withdrawn` (
  `Withdrawn_ID` int(11) NOT NULL,
  `ClientID` int(11) NOT NULL,
  `date` date NOT NULL,
  `Amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `SellerID` int(11) NOT NULL,
  `StoreName` varchar(255) DEFAULT NULL,
  `Mobile` int(11) DEFAULT NULL,
  `RegisterDate` date DEFAULT NULL,
  `TrustStatus` tinyint(4) DEFAULT NULL COMMENT 'seller rank',
  `Aprovable` tinyint(4) DEFAULT NULL,
  `Delleted` tinyint(4) DEFAULT '0',
  `WhoDelleted` int(11) DEFAULT NULL,
  `DateDeleted` date DEFAULT NULL,
  `WhoAprovaled` int(11) DEFAULT NULL,
  `BusinessLocation` int(11) DEFAULT NULL,
  `IslandStore` varchar(255) DEFAULT NULL,
  `StoreAdress` varchar(255) DEFAULT NULL,
  `ClientID` int(11) DEFAULT NULL,
  `PlaceDescription` varchar(255) NOT NULL,
  `Gouvernorate` int(11) NOT NULL,
  `City` int(11) NOT NULL,
  `ISLAND` int(11) DEFAULT NULL,
  `Verificated` varchar(15) DEFAULT NULL,
  `BestSeller` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`SellerID`, `StoreName`, `Mobile`, `RegisterDate`, `TrustStatus`, `Aprovable`, `Delleted`, `WhoDelleted`, `DateDeleted`, `WhoAprovaled`, `BusinessLocation`, `IslandStore`, `StoreAdress`, `ClientID`, `PlaceDescription`, `Gouvernorate`, `City`, `ISLAND`, `Verificated`, `BestSeller`) VALUES
(1, 'Comoshop', 1140017342, '0000-00-00', 0, 8, 0, 0, '0000-00-00', 1, 1, '4', 'Moroni', 1, '', 0, 0, 0, 'true', 'true'),
(2, 'ComoSyst', 1098090201, '2019-12-31', 5, 6, 0, 0, '0000-00-00', 1, 1, 'Ngazidja', 'Moroni', NULL, '', 0, 0, 0, 'true', NULL),
(3, 'ComoSyst', 333036, '0000-00-00', 0, 8, 0, 0, '0000-00-00', 1, 2, '1', 'Dimadjou Hamahamet', 2, '', 0, 0, 0, 'true', NULL),
(4, 'Amanata', 353542, '0000-00-00', 0, 8, 0, 0, '0000-00-00', 1, 1, '1', '5864822', 3, '', 0, 0, 0, 'true', 'true'),
(47, 'ComoSys', NULL, NULL, NULL, 2, 0, NULL, NULL, NULL, 1, NULL, NULL, 18, '', 0, 0, NULL, 'true', NULL),
(58, 'comorco', NULL, NULL, NULL, 4, 0, NULL, NULL, NULL, 2, NULL, NULL, 19, 'dje', 0, 13, NULL, 'true', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seller_payment_method`
--

CREATE TABLE `seller_payment_method` (
  `ID` int(11) NOT NULL,
  `PaymentID` int(11) NOT NULL,
  `SellerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller_payment_method`
--

INSERT INTO `seller_payment_method` (`ID`, `PaymentID`, `SellerID`) VALUES
(1, 2, 51),
(2, 2, 51);

-- --------------------------------------------------------

--
-- Table structure for table `serched_word`
--

CREATE TABLE `serched_word` (
  `id` int(11) NOT NULL,
  `Word` varchar(100) NOT NULL,
  `Count_Times` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serched_word`
--

INSERT INTO `serched_word` (`id`, `Word`, `Count_Times`) VALUES
(1, 'PES', 5),
(2, 'PES', 5),
(3, 'PES', 5),
(4, 'PES', 5),
(5, 'PES', 5),
(6, 'psp', 5),
(7, 'ELBAK', 7),
(8, 'SONY', 5),
(9, 'PSPPPP', 5),
(10, 'mad', 2),
(11, 'mammmhhgutygfhjugh', 1),
(12, 'ma', 2),
(13, 'M', 3),
(14, 'p', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `ShippingID` int(11) NOT NULL,
  `ShippingName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`ShippingID`, `ShippingName`) VALUES
(1, 'DHL'),
(2, 'UPS');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `TagID` int(11) NOT NULL,
  `TagName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`TagID`, `TagName`) VALUES
(1, 'Cocacola'),
(2, 'Pepsi');

-- --------------------------------------------------------

--
-- Table structure for table `time_searched_word`
--

CREATE TABLE `time_searched_word` (
  `time_searched_word_id` int(11) NOT NULL,
  `Searched_word_Id` int(11) NOT NULL,
  `IP` varchar(100) DEFAULT NULL,
  `Date_SEARCHED` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_searched_word`
--

INSERT INTO `time_searched_word` (`time_searched_word_id`, `Searched_word_Id`, `IP`, `Date_SEARCHED`) VALUES
(1, 1, '12345', '0000-00-00 00:00:00'),
(2, 6, '12345', '0000-00-00 00:00:00'),
(3, 7, '12345', '2020-08-03 00:00:00'),
(4, 8, '12345', '2020-08-03 23:20:25'),
(5, 9, '12345', '2020-08-03 23:29:43'),
(11, 7, '12345', '2020-08-03 23:37:55'),
(12, 10, '12345', '2020-08-04 20:26:43'),
(13, 10, '12345', '2020-08-04 20:26:52'),
(14, 11, '12345', '2020-08-04 20:27:22'),
(15, 12, '12345', '2020-08-04 20:29:39'),
(16, 13, '12345', '2020-08-04 20:29:47'),
(17, 12, '12345', '2020-08-04 20:29:58'),
(18, 13, '12345', '2020-08-04 20:30:15'),
(19, 14, '12345', '2020-08-04 20:46:46'),
(20, 13, '12345', '2020-08-04 21:01:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL COMMENT 'to identify user',
  `Username` varchar(255) NOT NULL COMMENT 'username to login',
  `FirstName` varchar(255) NOT NULL,
  `LastNmae` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL COMMENT 'password to login',
  `Email` varchar(255) NOT NULL,
  `Mobile` int(17) NOT NULL,
  `TrustStatus` int(11) NOT NULL DEFAULT '0' COMMENT 'seller rank',
  `RegStatus` int(11) NOT NULL DEFAULT '0' COMMENT 'user approval',
  `WhoAdded` varchar(250) NOT NULL,
  `Date` date NOT NULL,
  `UserDeleted` int(11) NOT NULL DEFAULT '0',
  `WhoDeleted` varchar(250) NOT NULL,
  `WhoActivated` varchar(250) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Governorate` varchar(255) NOT NULL,
  `Island` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `GroupID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `Username`, `FirstName`, `LastNmae`, `Password`, `Email`, `Mobile`, `TrustStatus`, `RegStatus`, `WhoAdded`, `Date`, `UserDeleted`, `WhoDeleted`, `WhoActivated`, `avatar`, `City`, `Governorate`, `Island`, `Country`, `FullName`, `GroupID`) VALUES
(1, 'elbak', '', '', '1234', 'elbak269@gmail.com', 140017342, 1, 1, 'elbak', '2019-11-01', 0, '', 'elbak', '', 'Dimadjou', 'Hamahamet', 'Ngazidja', 'Comores', '', 1),
(2, 'salmata', '', '', '1234', 'salmat@gmail.com', 0, 0, 1, 'elbak', '2019-11-07', 0, '', 'elbak', '', '0', '0', '', 'Egyp[', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adress`
--
ALTER TABLE `adress`
  ADD PRIMARY KEY (`AdressID`),
  ADD KEY `adress_client56` (`ClientID`),
  ADD KEY `City_adr5` (`City`),
  ADD KEY `gouver_adres62` (`Gouvernorate`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`BrandID`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`carid`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`CardID`),
  ADD UNIQUE KEY `CardNumber` (`CardNumber`),
  ADD KEY `cardClient` (`ClientID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`CityID`),
  ADD KEY `IslandID` (`IslandID`),
  ADD KEY `GovernorateID` (`GovernorateID`) USING BTREE;

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`ClientID`),
  ADD KEY `gouvernemant_client` (`Gouvernorate`),
  ADD KEY `city_client` (`City`),
  ADD KEY `island_client` (`Island`);

--
-- Indexes for table `client_page`
--
ALTER TABLE `client_page`
  ADD PRIMARY KEY (`client_page_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`ColorID`),
  ADD UNIQUE KEY `ColorCode` (`ColorCode`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Comment_ID`),
  ADD KEY `item1` (`ItemID`),
  ADD KEY `usr2` (`ClientID`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`CountryID`);

--
-- Indexes for table `cpu`
--
ALTER TABLE `cpu`
  ADD PRIMARY KEY (`CpuID`),
  ADD KEY `genera` (`generation`);

--
-- Indexes for table `cpugenerations`
--
ALTER TABLE `cpugenerations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`CurrencyID`);

--
-- Indexes for table `exchange`
--
ALTER TABLE `exchange`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `currency__` (`CurrencyID`);

--
-- Indexes for table `gouvernorate`
--
ALTER TABLE `gouvernorate`
  ADD PRIMARY KEY (`GovernorateID`),
  ADD KEY `IslandID` (`IslandID`);

--
-- Indexes for table `incart`
--
ALTER TABLE `incart`
  ADD KEY `prod_incar` (`ProductID`),
  ADD KEY `clien_inca` (`ClientID`);

--
-- Indexes for table `islands`
--
ALTER TABLE `islands`
  ADD PRIMARY KEY (`IslandID`),
  ADD KEY `IslandName` (`IslandName`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ItemID`),
  ADD KEY `cat_1` (`CategoryID`),
  ADD KEY `user_1` (`UserID`),
  ADD KEY `brand_1` (`BrandID`),
  ADD KEY `currency_1` (`CurrencyID`),
  ADD KEY `island_1` (`IslandID`),
  ADD KEY `country_12` (`CountryID`),
  ADD KEY `city_12` (`CityID`),
  ADD KEY `gouver_1` (`GouvernoratID`),
  ADD KEY `ShippingID` (`ShippingID`),
  ADD KEY `member_item` (`MemberID`),
  ADD KEY `shipping_islan5` (`ShippingIsland`),
  ADD KEY `discount_promo35` (`Discount`),
  ADD KEY `color_1` (`Color1`),
  ADD KEY `color2` (`Color2`),
  ADD KEY `color_3` (`Color3`),
  ADD KEY `color_4` (`Color4`),
  ADD KEY `color` (`Color`),
  ADD KEY `ram` (`MemoryRAM`),
  ADD KEY `memorrysto` (`MemoryStorage`),
  ADD KEY `CPU_CDD` (`CPU`),
  ADD KEY `SHP_METH_NGAZI` (`Ship_Method_Ngazidja`),
  ADD KEY `SHP_METH_NDZUWAN` (`Ship_Method_Ndzuwani`),
  ADD KEY `SHP_METH_MWAL` (`Ship_Method_Mwali`),
  ADD KEY `SHP_METH_NGAZI_FRANCE` (`Ship_Method_France`),
  ADD KEY `paymen_meth_ngazidja` (`payment_method_Ngazida`),
  ADD KEY `paymen_meth_nduw` (`payment_method_Ndzuwani`),
  ADD KEY `paymen_meth_mwal` (`payment_method_Mwali`),
  ADD KEY `paymen_meth_france` (`payment_method_France`);

--
-- Indexes for table `items_allow_place_shiping`
--
ALTER TABLE `items_allow_place_shiping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `island` (`IslandID`),
  ADD KEY `city_` (`CityID`);

--
-- Indexes for table `memoriesram`
--
ALTER TABLE `memoriesram`
  ADD PRIMARY KEY (`MemoryID`);

--
-- Indexes for table `memoriesstorage`
--
ALTER TABLE `memoriesstorage`
  ADD PRIMARY KEY (`MemoriesStorageID`);

--
-- Indexes for table `names`
--
ALTER TABLE `names`
  ADD PRIMARY KEY (`NameID`),
  ADD KEY `nAME_Clien` (`ClientID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orders_details_id`),
  ADD KEY `ORDER_ORDD` (`OrderID`),
  ADD KEY `product` (`ProductID`),
  ADD KEY `seleler` (`SallerID`),
  ADD KEY `reaward_client` (`reward_for_client_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `ClientID` (`ClientID`),
  ADD KEY `user_order` (`SellerID`),
  ADD KEY `gouvernora_563` (`Gouvernorate`),
  ADD KEY `city_568` (`City`),
  ADD KEY `currency_orde56` (`Currency`),
  ADD KEY `adress_order_68568` (`Adress`),
  ADD KEY `recepient_con` (`RECEPIENT`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`Status_id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `paypals`
--
ALTER TABLE `paypals`
  ADD PRIMARY KEY (`PaypalID`),
  ADD KEY `ClientPaypal_` (`ClientPayapl`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`PromoID`),
  ADD KEY `promo_item52` (`PromoItem`);

--
-- Indexes for table `report_problem`
--
ALTER TABLE `report_problem`
  ADD PRIMARY KEY (`feedbackid`);

--
-- Indexes for table `reward_withdrawn`
--
ALTER TABLE `reward_withdrawn`
  ADD PRIMARY KEY (`Withdrawn_ID`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`SellerID`),
  ADD KEY `businessLocation` (`BusinessLocation`),
  ADD KEY `Mobile` (`Mobile`) USING BTREE,
  ADD KEY `whoaprovale_seller` (`WhoAprovaled`),
  ADD KEY `client_sele568` (`ClientID`),
  ADD KEY `CITY` (`City`),
  ADD KEY `GOUVERNORA_` (`Gouvernorate`),
  ADD KEY `ISLAND__` (`ISLAND`);

--
-- Indexes for table `seller_payment_method`
--
ALTER TABLE `seller_payment_method`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PAYMENT` (`PaymentID`);

--
-- Indexes for table `serched_word`
--
ALTER TABLE `serched_word`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`ShippingID`),
  ADD KEY `ShippingName` (`ShippingName`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`TagID`);

--
-- Indexes for table `time_searched_word`
--
ALTER TABLE `time_searched_word`
  ADD PRIMARY KEY (`time_searched_word_id`),
  ADD KEY `SEARCH_WORD__` (`Searched_word_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `Username` (`Username`(15));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adress`
--
ALTER TABLE `adress`
  MODIFY `AdressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `BrandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `carid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `CardID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `CityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `ClientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `ColorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Comment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `CountryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cpu`
--
ALTER TABLE `cpu`
  MODIFY `CpuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cpugenerations`
--
ALTER TABLE `cpugenerations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `CurrencyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exchange`
--
ALTER TABLE `exchange`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gouvernorate`
--
ALTER TABLE `gouvernorate`
  MODIFY `GovernorateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `islands`
--
ALTER TABLE `islands`
  MODIFY `IslandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `items_allow_place_shiping`
--
ALTER TABLE `items_allow_place_shiping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `memoriesram`
--
ALTER TABLE `memoriesram`
  MODIFY `MemoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `memoriesstorage`
--
ALTER TABLE `memoriesstorage`
  MODIFY `MemoriesStorageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `names`
--
ALTER TABLE `names`
  MODIFY `NameID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `orders_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paypals`
--
ALTER TABLE `paypals`
  MODIFY `PaypalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `PromoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `report_problem`
--
ALTER TABLE `report_problem`
  MODIFY `feedbackid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reward_withdrawn`
--
ALTER TABLE `reward_withdrawn`
  MODIFY `Withdrawn_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `SellerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `seller_payment_method`
--
ALTER TABLE `seller_payment_method`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `serched_word`
--
ALTER TABLE `serched_word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `ShippingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `TagID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `time_searched_word`
--
ALTER TABLE `time_searched_word`
  MODIFY `time_searched_word_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'to identify user', AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adress`
--
ALTER TABLE `adress`
  ADD CONSTRAINT `City_adr5` FOREIGN KEY (`City`) REFERENCES `cities` (`CityID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `adress_client56` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`ClientID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `gouver_adres62` FOREIGN KEY (`Gouvernorate`) REFERENCES `gouvernorate` (`GovernorateID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `cardClient` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`ClientID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `gouvernemant_cit` FOREIGN KEY (`GovernorateID`) REFERENCES `gouvernorate` (`GovernorateID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `islan_city` FOREIGN KEY (`IslandID`) REFERENCES `islands` (`IslandID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `city_client` FOREIGN KEY (`City`) REFERENCES `cities` (`CityID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `gouvernemant_client` FOREIGN KEY (`Gouvernorate`) REFERENCES `gouvernorate` (`GovernorateID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `island_client` FOREIGN KEY (`Island`) REFERENCES `cities` (`CityID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `item1` FOREIGN KEY (`ItemID`) REFERENCES `items` (`ItemID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usr2` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`ClientID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `cpu`
--
ALTER TABLE `cpu`
  ADD CONSTRAINT `genera` FOREIGN KEY (`generation`) REFERENCES `cpugenerations` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `exchange`
--
ALTER TABLE `exchange`
  ADD CONSTRAINT `currency__` FOREIGN KEY (`CurrencyID`) REFERENCES `currency` (`CurrencyID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `gouvernorate`
--
ALTER TABLE `gouvernorate`
  ADD CONSTRAINT `Island_gouv` FOREIGN KEY (`IslandID`) REFERENCES `islands` (`IslandID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `incart`
--
ALTER TABLE `incart`
  ADD CONSTRAINT `clien_inca` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`ClientID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `prod_incar` FOREIGN KEY (`ProductID`) REFERENCES `items` (`ItemID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `CPU_CDD` FOREIGN KEY (`CPU`) REFERENCES `cpu` (`CpuID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `SHP_METH_MWAL` FOREIGN KEY (`Ship_Method_Mwali`) REFERENCES `shipping` (`ShippingID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `SHP_METH_NDZUWAN` FOREIGN KEY (`Ship_Method_Ndzuwani`) REFERENCES `shipping` (`ShippingID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `SHP_METH_NGAZI` FOREIGN KEY (`Ship_Method_Ngazidja`) REFERENCES `shipping` (`ShippingID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `SHP_METH_NGAZI_FRANCE` FOREIGN KEY (`Ship_Method_France`) REFERENCES `shipping` (`ShippingID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ShippingMethod` FOREIGN KEY (`ShippingID`) REFERENCES `shipping` (`ShippingID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `brand_1` FOREIGN KEY (`BrandID`) REFERENCES `brand` (`BrandID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `cat_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `city_12` FOREIGN KEY (`CityID`) REFERENCES `cities` (`CityID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `color` FOREIGN KEY (`Color`) REFERENCES `colors` (`ColorID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `color2` FOREIGN KEY (`Color2`) REFERENCES `colors` (`ColorID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `color_1` FOREIGN KEY (`Color1`) REFERENCES `colors` (`ColorID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `color_3` FOREIGN KEY (`Color3`) REFERENCES `colors` (`ColorID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `color_4` FOREIGN KEY (`Color4`) REFERENCES `colors` (`ColorID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `country_12` FOREIGN KEY (`CountryID`) REFERENCES `countries` (`CountryID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `currency_1` FOREIGN KEY (`CurrencyID`) REFERENCES `currency` (`CurrencyID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `gouver_1` FOREIGN KEY (`GouvernoratID`) REFERENCES `gouvernorate` (`GovernorateID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `island_1` FOREIGN KEY (`IslandID`) REFERENCES `islands` (`IslandID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `member_item` FOREIGN KEY (`MemberID`) REFERENCES `sellers` (`SellerID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `memorrysto` FOREIGN KEY (`MemoryStorage`) REFERENCES `memoriesstorage` (`MemoriesStorageID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `paymen_meth_france` FOREIGN KEY (`payment_method_France`) REFERENCES `payment_method` (`payment_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `paymen_meth_mwal` FOREIGN KEY (`payment_method_Mwali`) REFERENCES `payment_method` (`payment_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `paymen_meth_nduw` FOREIGN KEY (`payment_method_Ndzuwani`) REFERENCES `payment_method` (`payment_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `paymen_meth_ngazidja` FOREIGN KEY (`payment_method_Ngazida`) REFERENCES `payment_method` (`payment_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ram` FOREIGN KEY (`MemoryRAM`) REFERENCES `memoriesram` (`MemoryID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `shipping_islan5` FOREIGN KEY (`ShippingIsland`) REFERENCES `islands` (`IslandID`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `user_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserId`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `items_allow_place_shiping`
--
ALTER TABLE `items_allow_place_shiping`
  ADD CONSTRAINT `city_` FOREIGN KEY (`CityID`) REFERENCES `cities` (`CityID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `island` FOREIGN KEY (`IslandID`) REFERENCES `islands` (`IslandID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `names`
--
ALTER TABLE `names`
  ADD CONSTRAINT `nAME_Clien` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`ClientID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `product` FOREIGN KEY (`ProductID`) REFERENCES `items` (`ItemID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `reaward_client` FOREIGN KEY (`reward_for_client_id`) REFERENCES `clients` (`ClientID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `seleler` FOREIGN KEY (`SallerID`) REFERENCES `sellers` (`SellerID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `recepient_con` FOREIGN KEY (`RECEPIENT`) REFERENCES `names` (`NameID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `paypals`
--
ALTER TABLE `paypals`
  ADD CONSTRAINT `ClientPaypal_` FOREIGN KEY (`ClientPayapl`) REFERENCES `clients` (`ClientID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `promo`
--
ALTER TABLE `promo`
  ADD CONSTRAINT `promo_item52` FOREIGN KEY (`PromoItem`) REFERENCES `items` (`ItemID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `sellers`
--
ALTER TABLE `sellers`
  ADD CONSTRAINT `CITY` FOREIGN KEY (`City`) REFERENCES `cities` (`CityID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `GOUVERNORA_` FOREIGN KEY (`Gouvernorate`) REFERENCES `gouvernorate` (`GovernorateID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ISLAND__` FOREIGN KEY (`ISLAND`) REFERENCES `islands` (`IslandID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `businessLocation` FOREIGN KEY (`BusinessLocation`) REFERENCES `countries` (`CountryID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `client_sele568` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`ClientID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `whoaprovale_seller` FOREIGN KEY (`WhoAprovaled`) REFERENCES `users` (`UserId`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `seller_payment_method`
--
ALTER TABLE `seller_payment_method`
  ADD CONSTRAINT `PAYMENT` FOREIGN KEY (`PaymentID`) REFERENCES `payment_method` (`payment_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `time_searched_word`
--
ALTER TABLE `time_searched_word`
  ADD CONSTRAINT `SEARCH_WORD__` FOREIGN KEY (`Searched_word_Id`) REFERENCES `serched_word` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
