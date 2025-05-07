-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2025 at 10:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newalltrust`
--

-- --------------------------------------------------------

--
-- Table structure for table `advisers`
--

CREATE TABLE `advisers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `selected_adviser_id` bigint(20) UNSIGNED DEFAULT NULL,
  `creater_id` int(11) DEFAULT NULL,
  `company_name` text DEFAULT NULL,
  `trading_name` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `post_code` text DEFAULT NULL,
  `share_holder_details` text DEFAULT NULL,
  `regulated_adviser` text DEFAULT NULL,
  `contact_email` text DEFAULT NULL,
  `website` text DEFAULT NULL,
  `telephone` text DEFAULT NULL,
  `fca_firms_reference` text DEFAULT NULL,
  `directly_authorised_checked` text DEFAULT NULL,
  `appointed_representative_checked` text DEFAULT NULL,
  `principal_company_name` text DEFAULT NULL,
  `their_frn` text DEFAULT NULL,
  `advice` text DEFAULT NULL,
  `provide_countries` text DEFAULT NULL,
  `hear_about_us` text DEFAULT NULL,
  `word_of_referrals_checked` text DEFAULT NULL,
  `lead_generation_checked` text DEFAULT NULL,
  `marketing_checked` text DEFAULT NULL,
  `other_specify_checked` text DEFAULT NULL,
  `other_specify` text DEFAULT NULL,
  `restrictions_yes_permission` text DEFAULT NULL,
  `restrictions_yes_permission_answer` text DEFAULT NULL,
  `sanctions` text DEFAULT NULL,
  `sanctions_yes_answer` text DEFAULT NULL,
  `connection_connection` text DEFAULT NULL,
  `connection_connection_yes_answer` text DEFAULT NULL,
  `professional_indemnity_insurance` text DEFAULT NULL,
  `policy_excess_DB` text DEFAULT NULL,
  `other_money` text DEFAULT NULL,
  `separate_cyber_security` text DEFAULT NULL,
  `permissions_for_advising` text DEFAULT NULL,
  `initial_advice_fee` text DEFAULT NULL,
  `going_annual_fee` text DEFAULT NULL,
  `house_portfolio_solutions` text DEFAULT NULL,
  `receive_provider_commission` text DEFAULT NULL,
  `investment_strategy` text DEFAULT NULL,
  `running_managing_portfolios` text DEFAULT NULL,
  `basis` text DEFAULT NULL,
  `principal_company_name1` text DEFAULT NULL,
  `principal_company_name2` text DEFAULT NULL,
  `principal_company_name3` text DEFAULT NULL,
  `principal_company_name4` text DEFAULT NULL,
  `account_name` text DEFAULT NULL,
  `bank_name` text DEFAULT NULL,
  `account_number` text DEFAULT NULL,
  `sort_code` text DEFAULT NULL,
  `not_applicable` text DEFAULT NULL,
  `advisers_permitted` text DEFAULT NULL,
  `staff_supervisory_position` text DEFAULT NULL,
  `gold_standard` text DEFAULT NULL,
  `db_transfers_12_months` text DEFAULT NULL,
  `total_value_12_months` text DEFAULT NULL,
  `percentage_db_transfers_12_months` text DEFAULT NULL,
  `db_transfers_24_months` text DEFAULT NULL,
  `total_value_24_months` text DEFAULT NULL,
  `percentage_db_transfers_24_months` text DEFAULT NULL,
  `db_transfers_36_months` text DEFAULT NULL,
  `total_value_36_months` text DEFAULT NULL,
  `percentage_db_transfers_36_months` text DEFAULT NULL,
  `complaints_12_months` text DEFAULT NULL,
  `redress_cases_12_months` text DEFAULT NULL,
  `complaints_24_months` text DEFAULT NULL,
  `redress_cases_24_months` text DEFAULT NULL,
  `complaints_36_months` text DEFAULT NULL,
  `redress_cases_36_months` text DEFAULT NULL,
  `percentage_db_transfers` text DEFAULT NULL,
  `pension_specialist` text DEFAULT NULL,
  `act_as_specialist` text DEFAULT NULL,
  `details_of_firms` text DEFAULT NULL,
  `contact_name` text DEFAULT NULL,
  `email_address` text DEFAULT NULL,
  `phone_number` text DEFAULT NULL,
  `dial_code` text DEFAULT NULL,
  `typical_investment_strategy` text DEFAULT NULL,
  `minimum_cetv` text DEFAULT NULL,
  `conduct_db_transfers` text DEFAULT NULL,
  `accept_insistent_clients` text DEFAULT NULL,
  `work_with_unregulated_firms` text DEFAULT NULL,
  `receive_referrals` text DEFAULT NULL,
  `referral_details` text DEFAULT NULL,
  `db_transfer_percentage` text DEFAULT NULL,
  `db_client_source` text DEFAULT NULL,
  `relationships_with_trustees` text DEFAULT NULL,
  `trustee_relationship_details` text DEFAULT NULL,
  `contingent_charging` text DEFAULT NULL,
  `contingent_charging_details` text DEFAULT NULL,
  `triage_service` text DEFAULT NULL,
  `advice_fee` text DEFAULT NULL,
  `charging_structure_breakdown` text DEFAULT NULL,
  `policies_coverage` text DEFAULT NULL,
  `not_covered_details` text DEFAULT NULL,
  `high_risk` text DEFAULT NULL,
  `standard_risk` text DEFAULT NULL,
  `low_risk` text DEFAULT NULL,
  `sensitive_jurisdictions` text DEFAULT NULL,
  `accept_peps` text DEFAULT NULL,
  `enhanced_due_diligence` text DEFAULT NULL,
  `add_details_text` text DEFAULT NULL,
  `collect_source` text DEFAULT NULL,
  `review_frequency` text DEFAULT NULL,
  `unregulated_firms` text DEFAULT NULL,
  `firms_details` text DEFAULT NULL,
  `total_business_percentage` text DEFAULT NULL,
  `investments_introduced` text DEFAULT NULL,
  `meet_client` text DEFAULT NULL,
  `business_conducted` text DEFAULT NULL,
  `knowledgeable_investors` text DEFAULT NULL,
  `criteria_details` text DEFAULT NULL,
  `products_design` enum('Yes','No') DEFAULT NULL,
  `fair_value` enum('Yes','No') DEFAULT NULL,
  `clear_communications` enum('Yes','No') DEFAULT NULL,
  `post_sales_support` enum('Yes','No') DEFAULT NULL,
  `customer_understanding` enum('Yes','No') DEFAULT NULL,
  `customer_adequate_controls` text DEFAULT NULL,
  `customer_evidence` text DEFAULT NULL,
  `customer_had_licences` text DEFAULT NULL,
  `signature_adviser` varchar(255) DEFAULT NULL,
  `management_function` text DEFAULT NULL,
  `company_authorised_signatory` text DEFAULT NULL,
  `company_register_shareholder` text DEFAULT NULL,
  `appointed_text` text DEFAULT NULL,
  `adviser_multifiles` text DEFAULT NULL,
  `position_adviser` text DEFAULT NULL,
  `financial_adviser_number` text DEFAULT NULL,
  `day` text DEFAULT NULL,
  `date_column` text DEFAULT NULL,
  `signature_alltrust` text DEFAULT NULL,
  `position_alltrust` text DEFAULT NULL,
  `date_column2` text DEFAULT NULL,
  `status` enum('pending','active','decline') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `advisers` text NOT NULL,
  `company_structure_chart` text DEFAULT NULL,
  `flag` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advisers`
--

INSERT INTO `advisers` (`id`, `selected_adviser_id`, `creater_id`, `company_name`, `trading_name`, `address`, `country`, `post_code`, `share_holder_details`, `regulated_adviser`, `contact_email`, `website`, `telephone`, `fca_firms_reference`, `directly_authorised_checked`, `appointed_representative_checked`, `principal_company_name`, `their_frn`, `advice`, `provide_countries`, `hear_about_us`, `word_of_referrals_checked`, `lead_generation_checked`, `marketing_checked`, `other_specify_checked`, `other_specify`, `restrictions_yes_permission`, `restrictions_yes_permission_answer`, `sanctions`, `sanctions_yes_answer`, `connection_connection`, `connection_connection_yes_answer`, `professional_indemnity_insurance`, `policy_excess_DB`, `other_money`, `separate_cyber_security`, `permissions_for_advising`, `initial_advice_fee`, `going_annual_fee`, `house_portfolio_solutions`, `receive_provider_commission`, `investment_strategy`, `running_managing_portfolios`, `basis`, `principal_company_name1`, `principal_company_name2`, `principal_company_name3`, `principal_company_name4`, `account_name`, `bank_name`, `account_number`, `sort_code`, `not_applicable`, `advisers_permitted`, `staff_supervisory_position`, `gold_standard`, `db_transfers_12_months`, `total_value_12_months`, `percentage_db_transfers_12_months`, `db_transfers_24_months`, `total_value_24_months`, `percentage_db_transfers_24_months`, `db_transfers_36_months`, `total_value_36_months`, `percentage_db_transfers_36_months`, `complaints_12_months`, `redress_cases_12_months`, `complaints_24_months`, `redress_cases_24_months`, `complaints_36_months`, `redress_cases_36_months`, `percentage_db_transfers`, `pension_specialist`, `act_as_specialist`, `details_of_firms`, `contact_name`, `email_address`, `phone_number`, `dial_code`, `typical_investment_strategy`, `minimum_cetv`, `conduct_db_transfers`, `accept_insistent_clients`, `work_with_unregulated_firms`, `receive_referrals`, `referral_details`, `db_transfer_percentage`, `db_client_source`, `relationships_with_trustees`, `trustee_relationship_details`, `contingent_charging`, `contingent_charging_details`, `triage_service`, `advice_fee`, `charging_structure_breakdown`, `policies_coverage`, `not_covered_details`, `high_risk`, `standard_risk`, `low_risk`, `sensitive_jurisdictions`, `accept_peps`, `enhanced_due_diligence`, `add_details_text`, `collect_source`, `review_frequency`, `unregulated_firms`, `firms_details`, `total_business_percentage`, `investments_introduced`, `meet_client`, `business_conducted`, `knowledgeable_investors`, `criteria_details`, `products_design`, `fair_value`, `clear_communications`, `post_sales_support`, `customer_understanding`, `customer_adequate_controls`, `customer_evidence`, `customer_had_licences`, `signature_adviser`, `management_function`, `company_authorised_signatory`, `company_register_shareholder`, `appointed_text`, `adviser_multifiles`, `position_adviser`, `financial_adviser_number`, `day`, `date_column`, `signature_alltrust`, `position_alltrust`, `date_column2`, `status`, `created_at`, `updated_at`, `deleted_at`, `advisers`, `company_structure_chart`, `flag`) VALUES
(228, NULL, 645, 'Allium Test', 'AGL', '123 Mill Lane', 'United Kingdom', NULL, 'Victoria Ingram', '1', 'vicki.tora79@gmail.com', 'www.allium.com', '0034638147576', '1234567', 'appointed_representative', NULL, NULL, NULL, 'yes', 'Europe', 'Online', 'on', NULL, NULL, NULL, NULL, 'no', NULL, 'no', NULL, 'no', NULL, '1m', 'na', '5000', 'yes', 'no', '3%', '1%', 'NA', 'No', '[\"Platform \\/ WRAP\",\"Funds (direct via a Platform)\",\"Structure Deposit\"]', 'No', NULL, 'Quilter', 'transact', 'Hargreaves', NULL, NULL, NULL, NULL, NULL, 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', NULL, '0', '5', '80', 'No', 'Yes', 'Yes', NULL, 'Yes', 'Annually', 'No', NULL, NULL, NULL, 'Yes', NULL, 'No', NULL, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, NULL, 'No', '/storage/app/public/signatures/signature_67c1bf84d60d6.png', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/storage/app/public/signatures/signature_67c1bf84dafe9.png', NULL, NULL, 'active', '2025-02-28 13:52:04', '2025-03-18 10:18:12', NULL, '{\"1\":{\"adviser_name\":\"Victoria Ingram\",\"adviser_fca_reference\":\"1234567\",\"branch\":\"Central\",\"adviser_email\":\"vicki.tora79@gmail.com\",\"requires_online_access\":\"yes\"}}', NULL, 'no'),
(229, NULL, 652, 'test ignore', 'asd', NULL, 'Algeria', NULL, NULL, NULL, 'info@ilcorp.tech', NULL, '605494795', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/storage/app/public/signatures/signature_67cb2786c47a7.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-07 17:06:14', '2025-03-18 19:36:16', '2025-03-18 19:36:16', '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"branch\":null,\"adviser_email\":null}}', NULL, NULL),
(230, NULL, 652, 'test', 'asd', NULL, NULL, NULL, NULL, NULL, 'asd@asd.com', NULL, '6565656565', NULL, 'appointed_representative', NULL, 'asd', 'asd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/storage/app/public/signatures/signature_67cb2c9ac9de3.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-07 17:27:54', '2025-03-07 17:31:39', '2025-03-07 17:31:39', '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"branch\":null,\"adviser_email\":null}}', NULL, NULL),
(231, NULL, 653, 'Open Investments Intl. SL', 'OpenInv793434', 'KENSINGTON GARDENS, NO. U1317, LOT 7616, JALAN JUMIDAR BUYONG, LABUAN F.T.', 'Switzerland', NULL, 'Details', '5', 'dpb2105esp@gmail.com', 'hjkftyfs.com', '634601139', '(LFSA: BS2021140) and (SCM: eCMSL/A0254/2009)', NULL, NULL, 'Anothec Company Name', 'FRN7895', 'no', NULL, 'yghgyvfyt', 'on', 'on', 'on', NULL, NULL, 'no', NULL, 'no', NULL, 'yes', NULL, 'Limit of Indemnity: MYR12,000,000.00 (Any one claim and in the aggregate, costs and expenses inclusive) / Excess: MYR8,000,000.00 (each and every claim, costs and expenses inclusive)', '15000000', '3575000', 'yes', 'no', '3%', '1%', 'Solution', 'no', '[\"Advisory Stockbroker\",\"Deposit Accounts\",\"Funds (direct via a Platform)\",\"Non Mass Market Investments\"]', 'No', NULL, 'Anothec Company Name', NULL, NULL, NULL, 'Name on Account', 'Bank Name', '21658674', '28-18-29', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', NULL, '30', '60', '10', 'No', 'No', 'Yes', NULL, 'No', 'Annually', 'No', NULL, '22', '1412', 'Yes', NULL, 'Yes', 'Making sure', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, NULL, 'ukjlgtv uiytlh goiyu2t 2puity', '/storage/app/public/signatures/uploaded_67cec55443048.pdf', 'signature', NULL, '/storage/app/public/documents/1741604180_ghi3.pdf', 'e@mail.com', '[\"https:\\/\\/www.alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1741604180_def4.txt\",\"https:\\/\\/www.alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1741604180_ghi0.pdf\",\"https:\\/\\/www.alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1741604180_ghi1.pdf\",\"https:\\/\\/www.alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1741604180_ghi2.pdf\"]', 'Director', 'number86976', NULL, NULL, NULL, NULL, NULL, 'decline', '2025-03-10 10:56:20', '2025-03-18 10:18:34', NULL, '{\"1\":{\"adviser_name\":\"Adviser1\",\"adviser_fca_reference\":\"adviser1-1674\",\"branch\":\"Branch-off\",\"adviser_email\":\"attimorrss@gmail.com\",\"requires_online_access\":\"yes\"}}', '/storage/app/public/documents/1741604180_def0.txt', 'no'),
(232, NULL, 181, 'Johnston and Day LLC', 'Joy Hogan', 'Ut lorem itaque cupi', 'Pakistan', 'Sit maxime quia et', 'Eaque deleniti conse', '481', 'bulynenuq@mailinator.com', 'https://www.diwitolutys.tv', '+1 (969) 129-2243', '+1 (737) 594-2605', 'directly_authorised', NULL, 'Tucker and Bernard Plc', 'Pariatur Sapiente e', 'yes', 'Ut qui obcaecati sit', 'Magni odit quidem no', NULL, NULL, NULL, NULL, 'Lacey Chandler', 'yes', 'Atque ipsum possimu', 'no', 'Corporis sequi unde', 'no', 'Velit accusantium d', 'Cillum et corporis l', 'Voluptatem accusant', 'Obcaecati minim aliq', 'yes', 'no', NULL, NULL, NULL, NULL, 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-11 08:24:12', '2025-03-11 12:02:03', '2025-03-11 12:02:03', '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"adviser_email\":null,\"branch\":null}}', NULL, NULL),
(233, NULL, 181, 'Olson and Paul Traders', 'Aiko Frederick', 'A quas molestiae in', 'Afghanistan', NULL, 'Rerum ea proident v', '95', 'xihajaha@mailinator.com', 'https://www.byj.co', '+1 (372) 187-3714', '+1 (286) 365-6311', 'directly_authorised', NULL, 'Ferguson and Matthews Associates', 'Cillum blanditiis ea', 'no', 'Temporibus beatae es', 'Labore et error nihi', 'on', NULL, 'on', NULL, 'Ryan Cannon', 'no', 'Quasi eos expedita', 'no', 'Velit qui totam alia', 'no', 'Nihil quas accusamus', 'Optio eum eius dict', 'Reprehenderit et fu', 'Laboris in consequat', 'yes', 'yes', NULL, NULL, NULL, NULL, 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', 'Yes', 'No', NULL, NULL, 'Facilis omnis quo ip', '/storage/app/public/signatures/signature_67cff371ea5f4.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-11 08:25:21', '2025-03-11 12:02:09', '2025-03-11 12:02:09', '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"branch\":null,\"adviser_email\":null,\"address\":null,\"date_of_birth\":null}}', NULL, NULL),
(234, NULL, 181, 'sami ullah jdaj', 'Xerxes Melendez', 'Ipsa ut ut dolor ve', NULL, NULL, 'Laborum Do dolor fu', '913', 'kuwixironu@mailinator.com', 'https://www.babobeneso.info', '+1 (697) 476-2486', '+1 (868) 791-4602', 'appointed_representative', NULL, 'Collins and Crawford Co', 'Duis sint quo excep', 'no', 'Officia in aut digni', 'Qui pariatur Offici', NULL, NULL, 'on', 'on', 'Sloane Vincent', 'yes', 'Fugiat rerum ea cum', 'no', 'Et expedita quas vol', 'no', 'Eum alias similique', 'Praesentium maxime i', 'Quia eiusmod commodo', 'Sunt voluptatem aut', 'no', 'no', NULL, NULL, NULL, NULL, 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-11 08:27:37', '2025-03-11 12:02:15', '2025-03-11 12:02:15', '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"adviser_email\":null,\"branch\":null}}', NULL, NULL),
(235, NULL, 181, 'Mclean and Mcknight Co', 'Yetta Rose', 'Cupidatat aspernatur', 'Angola', NULL, 'Ut quod reiciendis i', '519', 'gefuki@mailinator.com', 'https://www.qujuxitysivyx.co.uk', '+1 (233) 327-4359', '+1 (883) 946-1389', 'directly_authorised', NULL, 'Barnes and Peterson Plc', 'Quos eum explicabo', 'no', 'Ad placeat libero e', 'Soluta optio archit', 'on', NULL, 'on', 'on', 'Cathleen Mcguire', 'no', 'Asperiores nisi irur', 'yes', 'Sint totam dolor ear', 'yes', 'At aute aut sequi to', 'Consequat Dolores a', 'Magnam do cumque cum', 'Laboriosam nisi ut', 'no', 'no', NULL, NULL, NULL, NULL, 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', 'No', 'Yes', 'No', 'Yes', NULL, NULL, 'Optio tempor rerum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-11 08:44:03', '2025-03-11 12:02:20', '2025-03-11 12:02:20', '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"branch\":null,\"adviser_email\":null,\"address\":null,\"date_of_birth\":null}}', NULL, NULL),
(236, NULL, 181, 'Acevedo', 'Logan Rosario', 'Cumque numquam debit', 'France', NULL, 'Irure iste amet nob', '531', 'xozuh@mailinator.com', 'https://www.qiqumupy.cc', '+1 (513) 481-9317', '+1 (127) 636-2153', 'appointed_representative', NULL, 'House and Thomas Inc', 'Non soluta libero qu', 'no', 'Asperiores qui elit', 'Sit ad sit aliquip d', 'on', NULL, 'on', 'on', 'Honorato Vance', 'yes', 'Reprehenderit volup', 'no', 'Neque quod in enim s', 'no', 'Dolor exercitation d', 'Ducimus doloremque', 'Nisi dignissimos pra', 'Adipisci dolores tem', 'yes', 'yes', 'Est nobis voluptas e', 'Alias consectetur te', 'Molestiae qui optio', 'Consectetur tempore', '[\"Commercial Property\",\"Deposit Accounts\",\"Funds (direct via a Platform)\",\"DMV \\/ Model Portfolios\",\"Non Mass Market Investments\"]', 'No', 'Discretionary basis', 'Phillips Booker Trading', 'Sullivan and Dean Co', 'Mcfadden Flowers Co', 'Guzman and Pearson Trading', 'Matthew Beck', 'Nero Velazquez', '37', 'Nam officia sed ipsu', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', 'Maxime anim harum ha', '6', '72', '60', 'Yes', 'Yes', 'No', 'Sunt earum eaque nis', 'Yes', 'In et necessitatibus', 'No', 'Accusantium eos pro', 'Magni saepe nulla et', 'Corporis distinctio', 'Yes', 'Ad iste enim eum rem', 'Yes', 'Natus fugiat nulla', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, NULL, 'Distinctio Non vel', '/storage/app/public/signatures/signature_67cff885624de.png', 'Excepturi amet duci', '/storage/app/public/documents/1741682821_Dentist_Direct_Course_2024-08-10.xlsx', '/storage/app/public/documents/1741682821_updateOffsure.txt', 'Reiciendis quis quos', '[\"https:\\/\\/www.alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1741682821_pensionmanagement (2).sql\",\"https:\\/\\/www.alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1741682821_wow.txt\"]', 'Voluptate dolorem es', '270', NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-11 08:47:01', '2025-03-11 12:02:26', '2025-03-11 12:02:26', '{\"1\":{\"adviser_name\":\"Hope Humphrey\",\"adviser_fca_reference\":\"Omnis rerum quo et v\",\"branch\":\"Pariatur Omnis tota\",\"adviser_email\":\"nenacef@mailinator.com\",\"address\":\"Ipsum eu perferendi\",\"date_of_birth\":\"2013-07-28\",\"approved_for_transfer_db\":\"yes\"}}', '/storage/app/public/documents/1741682821_editOasis.txt', NULL),
(237, NULL, 181, 'Acevedo', 'Logan Rosario', 'Cumque numquam debit', 'France', NULL, 'Irure iste amet nob', '531', 'xozuh@mailinator.com', 'https://www.qiqumupy.cc', '+1 (513) 481-9317', '+1 (127) 636-2153', 'appointed_representative', NULL, 'House and Thomas Inc', 'Non soluta libero qu', 'no', 'Asperiores qui elit', 'Sit ad sit aliquip d', 'on', NULL, 'on', 'on', 'Honorato Vance', 'yes', 'Reprehenderit volup', 'no', 'Neque quod in enim s', 'no', 'Dolor exercitation d', 'Ducimus doloremque', 'Nisi dignissimos pra', 'Adipisci dolores tem', 'yes', 'yes', 'Est nobis voluptas e', 'Alias consectetur te', 'Molestiae qui optio', 'Consectetur tempore', '[\"Commercial Property\",\"Deposit Accounts\",\"Funds (direct via a Platform)\",\"DMV \\/ Model Portfolios\",\"Non Mass Market Investments\"]', 'No', 'Discretionary basis', 'Phillips Booker Trading', 'Sullivan and Dean Co', 'Mcfadden Flowers Co', 'Guzman and Pearson Trading', 'Matthew Beck', 'Nero Velazquez', '37', 'Nam officia sed ipsu', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', 'Maxime anim harum ha', '6', '72', '60', 'Yes', 'Yes', 'No', 'Sunt earum eaque nis', 'Yes', 'In et necessitatibus', 'No', 'Accusantium eos pro', 'Magni saepe nulla et', 'Corporis distinctio', 'Yes', 'Ad iste enim eum rem', 'Yes', 'Natus fugiat nulla', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, NULL, 'Distinctio Non vel', '/storage/app/public/signatures/signature_67cff8888f9e1.png', 'Excepturi amet duci', '/storage/app/public/documents/1741682824_Dentist_Direct_Course_2024-08-10.xlsx', '/storage/app/public/documents/1741682824_updateOffsure.txt', 'Reiciendis quis quos', '[\"https:\\/\\/www.alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1741682824_pensionmanagement (2).sql\",\"https:\\/\\/www.alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1741682824_wow.txt\"]', 'Voluptate dolorem es', '270', NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-11 08:47:04', '2025-03-11 12:02:32', '2025-03-11 12:02:32', '{\"1\":{\"adviser_name\":\"Hope Humphrey\",\"adviser_fca_reference\":\"Omnis rerum quo et v\",\"branch\":\"Pariatur Omnis tota\",\"adviser_email\":\"nenacef@mailinator.com\",\"address\":\"Ipsum eu perferendi\",\"date_of_birth\":\"2013-07-28\",\"approved_for_transfer_db\":\"yes\"}}', '/storage/app/public/documents/1741682824_editOasis.txt', NULL),
(238, NULL, 181, 'Mcintyre and Romero LLC', 'Fulton Mcclain', 'Dolore in irure quis', 'Belgium', NULL, 'Non quia eu eligendi', '732', 'guzy@mailinator.com', 'https://www.cupiqigexynepoz.cc', '+1 (344) 313-5463', '+1 (449) 883-1636', 'appointed_representative', NULL, 'Mcclure Mcneil Trading', 'Et fugiat tenetur es', 'no', 'Commodi in voluptas', 'Asperiores enim odio', 'on', 'on', 'on', 'on', 'Karleigh Byrd', 'no', 'Rerum facilis veniam', 'yes', 'Saepe aut esse perfe', 'no', 'Dicta iste reprehend', 'Laudantium consequu', 'Nostrum rerum deleni', 'Nam dolor ad autem r', 'yes', 'no', NULL, NULL, NULL, NULL, 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', 'Yes', 'Yes', 'No', 'No', NULL, NULL, 'Est error eveniet e', NULL, 'Eum autem fugiat com', NULL, NULL, NULL, NULL, 'Occaecat autem et su', '582', NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-11 09:02:13', '2025-03-11 12:02:37', '2025-03-11 12:02:37', '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"branch\":null,\"adviser_email\":null,\"address\":null,\"date_of_birth\":null}}', NULL, NULL),
(239, NULL, 181, 'Gaines Mcclure Inc', 'Brennan Alvarado', 'Perspiciatis dolore', 'Iran', NULL, 'Dolores sit ut odio', '242', 'wekeso@mailinator.com', 'https://www.wutulelenusele.ws', '+1 (627) 123-5869', '+1 (494) 983-9664', 'directly_authorised', NULL, 'Lynn Puckett Inc', 'Voluptate tenetur la', 'yes', 'Qui voluptas quisqua', 'Nesciunt aut quisqu', 'on', 'on', NULL, NULL, 'Colby Andrews', 'no', 'Aut qui minus non vo', 'no', 'In a voluptatem rer', 'yes', 'Quae pariatur Ea ve', 'Do excepturi ut dolo', 'Ex laboris nostrum d', 'Mollit ex qui facere', 'no', 'no', NULL, NULL, NULL, NULL, 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', 'No', 'No', 'Yes', 'No', NULL, NULL, 'Non magna cupidatat', NULL, 'Temporibus eaque odi', NULL, NULL, NULL, NULL, 'Quia distinctio Eni', '8', '0001-06-09', NULL, NULL, NULL, NULL, 'pending', '2025-03-11 09:16:06', '2025-03-11 12:02:42', '2025-03-11 12:02:42', '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"branch\":null,\"adviser_email\":null,\"address\":null,\"date_of_birth\":null}}', NULL, NULL),
(240, NULL, 181, 'Leach and Huffman Inc', 'Signe Kane', 'Est voluptate sunt a', NULL, NULL, 'Architecto enim vel', '412', 'tevu@mailinator.com', 'https://www.gofof.ws', '+1 (169) 921-8052', '+1 (539) 192-2285', 'directly_authorised', NULL, 'Garner Workman Traders', 'Ullamco aliqua Enim', 'no', 'Magna iste rerum exp', 'Dicta possimus in d', 'on', 'on', NULL, NULL, 'Silas Mcclain', 'no', 'Omnis laborum Non u', 'yes', 'Illo reiciendis volu', 'yes', 'Quia et accusantium', 'Odit rerum dolore al', 'Est et eius molestia', 'Dolor odit cumque ni', 'yes', 'yes', NULL, NULL, NULL, NULL, 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, NULL, 'Lorem est odio aliq', NULL, 'Molestiae cum tenetu', NULL, NULL, NULL, NULL, 'Consectetur reicien', '870', '0010-10-10', NULL, NULL, NULL, NULL, 'pending', '2025-03-11 09:16:34', '2025-03-11 12:02:48', '2025-03-11 12:02:48', '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"adviser_email\":null,\"branch\":null}}', NULL, NULL),
(241, NULL, 653, 'MELBOURNE CAPITAL GROUP LTD', 'Possible Trader', 'KENSINGTON GARDENS, NO. U1317, LOT 7616, JALAN JUMIDAR BUYONG, LABUAN F.T.', NULL, NULL, 'Details', '6', 'attimorrss@gmail.com', 'hjkftyfs.com', '01126550491', '(LFSA: BS2021140) and (SCM: eCMSL/A0254/2009)', 'appointed_representative', NULL, 'MELBOURNE CAPITAL GROUP LTD', 'FRN7895', 'yes', NULL, 'yghgyvfyt', NULL, 'on', 'on', NULL, 'MELBOURNE CAPITAL GROUP LTD', 'no', NULL, 'no', NULL, 'no', NULL, 'Limit of Indemnity: MYR12,000,000.00 (Any one claim and in the aggregate, costs and expenses inclusive) / Excess: MYR8,000,000.00 (each and every claim, costs and expenses inclusive)', '15000000', '3575000', 'yes', 'no', '3%', '1%', 'Solution', 'no', '[\"Commercial Property\",\"Deposit Accounts\",\"Funds (direct via a Platform)\",\"Non Mass Market Investments\"]', 'No', NULL, 'Control Investments', NULL, NULL, NULL, 'Name on Account', 'Bank Name', '21658674', '28-18-29', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, '30', '60', '10', 'No', 'No', 'No', NULL, 'No', 'Annually', 'No', NULL, NULL, NULL, 'No', NULL, 'No', NULL, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, NULL, NULL, '/storage/app/public/signatures/signature_67d026faaa2f9.png', 'REUBEN VAN DIJK', NULL, NULL, NULL, NULL, 'Director', 'number86976', '2025-03-11', NULL, NULL, NULL, NULL, 'pending', '2025-03-11 12:05:14', '2025-03-11 13:10:01', '2025-03-11 13:10:01', '{\"1\":{\"adviser_name\":\"Adviser1\",\"adviser_fca_reference\":\"adviser1-1674\",\"adviser_email\":\"attimorrss@gmail.com\",\"branch\":\"Branch-off\",\"requires_online_access\":\"yes\"}}', NULL, NULL),
(242, NULL, 658, 'Bingham-Woods IFA Ltd', NULL, '2 Bridge Street\r\nSpalding\r\nLincolnshire PE11 1XA', 'United Kingdom', NULL, 'Jonathan Bingham', '4', 'claire.eyett@bingham-woods.co.uk', 'www.bingham-woods.co.uk', '01775718257', '463465', 'appointed_representative', NULL, 'Quilter Wealth Limited', '217742', 'no', NULL, 'Current client', 'on', NULL, 'on', NULL, NULL, 'no', NULL, 'no', NULL, 'no', NULL, 'Provided by Network - Quilter Wealth Ltd', 'n/a as don\'t advise', NULL, 'no', 'no', NULL, NULL, NULL, NULL, 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-14 09:55:29', '2025-03-18 10:43:52', '2025-03-18 10:43:52', '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"adviser_email\":null,\"branch\":null}}', NULL, 'no'),
(243, NULL, 658, 'Bingham-Woods IFA Ltd', NULL, '2 Bridge Street\r\nSpalding\r\nLincolnshire PE11 1XA', 'United Kingdom', NULL, 'Jonathan Bingham', '4', 'claire.eyett@bingham-woods.co.uk', 'www.bingham-woods.co.uk', '01775718257', '463465', 'appointed_representative', NULL, 'Quilter Wealth Limited', '217742', 'no', NULL, 'Current client', 'on', NULL, 'on', NULL, NULL, 'no', NULL, 'no', NULL, 'no', NULL, 'Provided by Network - Quilter Wealth Ltd', 'n/a as don\'t advise', NULL, 'no', 'no', NULL, NULL, NULL, NULL, 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'on', NULL, NULL, 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-17 10:41:49', '2025-03-18 10:43:56', '2025-03-18 10:43:56', '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"adviser_email\":null,\"branch\":null}}', NULL, NULL),
(244, NULL, 666, 'Satis Asset Managament', 'Satis Wealth Management', '45 Pall Mall\r\nLondon', NULL, 'SW1Y 5JG', 'Ben Sherwood', '5', 'jessica.brothers@satisuk.com', 'https://satiswealth.com/', '02038409970', '761140', 'directly_authorised', NULL, NULL, NULL, 'yes', 'USA\r\nSingapore', 'New clients hold policies with you', 'on', NULL, NULL, NULL, NULL, 'no', NULL, 'no', NULL, 'no', NULL, '3000000', 'NA', '10000', 'yes', 'no', '0', '0.9%', 'NA', 'NA', '[\"DMV \\/ Model Portfolios\"]', 'Yes', 'Discretionary basis', 'Satis Asset Management', NULL, NULL, NULL, 'Satis Asset Management', 'NatWest', '40616584', '600008', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', NULL, '5', '95', NULL, 'No', 'No', 'Yes', NULL, 'Yes', 'Annually', 'No', NULL, '0', 'NA', 'Yes', NULL, 'No', 'NA', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, NULL, 'No', NULL, NULL, NULL, '/storage/app/public/documents/1742216262_Structure_Chart_-_Shareholders.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ops & Technical', '2025-04-01', 'pending', '2025-03-17 12:57:42', '2025-04-02 12:47:04', NULL, '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"adviser_email\":null,\"branch\":null}}', '/storage/app/public/documents/1742216262_Structure_Chart.pdf', NULL),
(245, NULL, 660, 'Solutions Wealth Management Ltd', 'Solutions Wealth Management Ltd', '9 Halegrove Court\r\nCygnet Drive', NULL, NULL, NULL, '3', 'info@swmltd.co.uk', 'www.swmltd.co.uk', '01642927258', '585549', 'directly_authorised', NULL, NULL, NULL, 'no', NULL, 'Mutual client', 'on', NULL, NULL, NULL, NULL, 'no', NULL, 'no', NULL, 'no', NULL, '£2,000,000', 'N/A', '£1,500', 'yes', 'no', '3%', '0.75%', 'N/A', 'no', '[\"Commercial Property\",\"Deposit Accounts\",\"DMV \\/ Model Portfolios\"]', 'No', NULL, 'Brewin Dolphin', 'Tatton', 'Vanguard', 'HSBC', 'Solutions Wealth Management Ltd', 'Virgin Money', '43320549', '050623', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', NULL, '0', '95', '5', 'No', NULL, 'Yes', 'If required we will collect the necessary information', 'Yes', 'Annually', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, NULL, 'N/A', '/storage/app/public/signatures/uploaded_67d83cde82103.jpg', 'SMF3', '/storage/app/public/documents/1742224606_Authorised_signatories_list_31.01.2025.pdf', '/storage/app/public/documents/1742224606_SOLUTIONS_WEALTH_MANAGEMENT_LTD_people_-_Find_and_update_company_information_-_GOV.UK.pdf', NULL, '[\"https:\\/\\/alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1742224606_SOLUTIONS WEALTH MANAGEMENT LTD persons with significant control - Find and update company information - GOV.UK.pdf\"]', 'Director', 'GBC00006', '2025-03-17', NULL, NULL, NULL, NULL, 'pending', '2025-03-17 15:16:46', '2025-04-01 10:57:27', NULL, '{\"1\":{\"adviser_name\":\"Stephanie Coates\",\"adviser_fca_reference\":\"SXC00279\",\"adviser_email\":\"steph@swmltd.co.uk\",\"branch\":null,\"requires_online_access\":\"yes\"}}', '/storage/app/public/documents/1742224606_Organisation_Chart_Jan_2025.pdf', 'no'),
(246, NULL, 684, 'Advice 4U t/a Ruby Financial Ltd', NULL, 'Unit 42, Basepoint Tewkesbury, Tewkesbury, Glos,', 'United Kingdom', 'GL20 8SD', 'Jason Williams 90%', '4', 'jason@rubyfinancial.co.uk', 'ww.rubyfinancial.co.uk', '07715641746', '671527', 'directly_authorised', NULL, NULL, NULL, 'yes', 'We adviser UK clients who have worked abroad in India, Dubai and most EU countries. They are all UK based when we advise them.', 'Existing clients', 'on', NULL, NULL, NULL, NULL, 'no', NULL, 'no', NULL, 'no', NULL, 'up to £2m with Collegiate', '5000', '2500 mortages', 'no', 'no', 'Ad hoc based on work  needed', '0.75%', 'No', 'No', '[\"Deposit Accounts\",\"DMV \\/ Model Portfolios\"]', 'No', NULL, 'Tam', 'Evelyn Partners', 'Brooks Macdonald', 'Elston Consulting', 'Advice 4u Financial Planning', 'Natwest', '73629499', '609002', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', NULL, '1', '85', '14', 'No', NULL, 'Yes', 'Clients moving from abroad to UK. We need higher levels of evidence such as payslips, bank statement, work contracts.', 'Yes', 'every year', 'No', NULL, '0', NULL, 'No', 'We don\'t engage at all', 'No', NULL, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, NULL, 'No', NULL, 'SM3,16', '/storage/app/public/documents/1742466431_Signatory_List.pdf', '/storage/app/public/documents/1742466431_Shareholdersdirectors.pdf', NULL, NULL, 'Director', 'JXW00314', NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-20 10:27:11', '2025-03-20 10:27:11', NULL, '{\"1\":{\"adviser_name\":\"Jason Williams\",\"adviser_fca_reference\":\"JXW00314\",\"adviser_email\":\"jason@rubyfinancial.co.uk\",\"branch\":null,\"requires_online_access\":\"yes\"},\"2\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"adviser_email\":null,\"branch\":null}}', '/storage/app/public/documents/1742466431_Ruby_Financial_Organisation_chart.pdf', NULL),
(247, NULL, 690, 'MitchellProckter Financial Services Limited', 'MitchellProckter Financial Services Limited', '15 Grove Place\r\nBedford\r\nMK40 3JJ', NULL, NULL, 'Gary Mitchell', '1', 'gary@mp-fs.co.uk', 'www.mitchellprockter.co.uk', '01234 344690', '121003', 'directly_authorised', NULL, NULL, NULL, 'no', NULL, NULL, 'on', NULL, NULL, 'on', 'Professional Connections', 'no', NULL, 'no', NULL, 'no', NULL, '2000000', NULL, '5000', 'yes', 'no', 'Between 1 & 3%', '0.5%', NULL, 'Yes', '[\"DMV \\/ Model Portfolios\"]', 'No', NULL, 'Quilter Cheviot', 'Brooks Macdonald', 'Brewin Dolphin', 'Cazenove', 'MitchellProckter F/S Ltd', 'Natwest', '62399985', '600213', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', 'All comes through the adviser', NULL, NULL, NULL, 'No', NULL, 'No', 'N/A', 'Yes', 'On Review', 'No', NULL, '0', NULL, 'Yes', 'n/a', NULL, 'n/a', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, NULL, 'None', NULL, 'SMF3 SMF16 SMF17', NULL, NULL, NULL, NULL, 'Director', 'GBM00003', '2025-03-20', NULL, '/storage/app/public/documents/1743505787_VI Signature.png', 'Ops & Technical', '2025-04-01', 'pending', '2025-03-20 11:55:52', '2025-04-01 11:09:47', NULL, '{\"1\":{\"adviser_name\":\"Gary Mitchell\",\"adviser_fca_reference\":\"GBM00003\",\"adviser_email\":\"gary@mp-fs.co.uk\",\"branch\":null,\"requires_online_access\":\"yes\"},\"2\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"adviser_email\":null,\"branch\":null}}', NULL, NULL),
(248, NULL, 691, 'Compass Independent Financial Services', 'Compass Independent Financial Services', '1 Doctors Road, Blofield, Norwich, Norfolk, NR13 4LF', NULL, NULL, 'John Hughes & Jill Hughes', '3', 'megan@compass-ifs.co.uk', 'compass-ifs.co.uk', '01603717202', '563812', 'directly_authorised', NULL, NULL, NULL, 'no', NULL, 'Client Plan', 'on', NULL, 'on', NULL, NULL, 'no', NULL, 'no', NULL, 'no', NULL, 'GBP 2,000,000', '0', '0', 'no', 'no', 'between 1% - 3%', '1%', NULL, NULL, 'null', 'No', NULL, 'Aviva', 'Aegon', 'Quilter', 'Fidelity', 'Compass IFS', 'Royal Bank of Scotland', '11090568', '162630', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', NULL, NULL, NULL, '100', 'No', NULL, 'No', NULL, 'Yes', 'Annually', 'No', NULL, NULL, NULL, 'Yes', NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, NULL, NULL, '/storage/app/public/signatures/signature_67dc0ea46650b.png', 'SMF3 SMF16', NULL, '/storage/app/public/documents/1742474916_2025-03-20_Company_Structure_Chart_3.4.docx', NULL, NULL, 'Director', 'MXC03245', '2025-03-20', NULL, NULL, NULL, NULL, 'pending', '2025-03-20 12:48:36', '2025-04-03 09:23:00', NULL, '{\"1\":{\"adviser_name\":\"Mike Bulmer\",\"adviser_fca_reference\":\"MXB03672\",\"adviser_email\":\"mike.b@compass-ifs.co.uk\",\"branch\":null}}', '/storage/app/public/documents/1742474916_2024-05-05_Business_Structure_Chart_V1.2.docx', NULL),
(249, NULL, 687, 'Bastion Financial Planning Ltd', 'Bastion Financial Planning Ltd', '250 High Street , Guildford , Surrey , GU1 3JG', 'United Kingdom', 'GU1 3JG', 'Andrew Casey', '3', 'enquiries@bastionfinancial.co.uk', 'www.bastionfinancialplanning.co.uk', '01483330210', '694856', 'directly_authorised', NULL, NULL, NULL, 'no', NULL, 'An existing Client', 'on', NULL, NULL, NULL, NULL, 'no', NULL, 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"Platform \\/ WRAP\"]', 'Yes', 'Advisory basis', 'Elevate', 'Transact', 'Aberdeen Wrap', 'Scottish Widows', NULL, NULL, NULL, NULL, 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-24 10:10:05', '2025-03-27 13:55:13', '2025-03-27 13:55:13', '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"adviser_email\":null,\"branch\":null}}', NULL, NULL),
(250, NULL, 687, 'Bastion Financial Planning Ltd', 'Bastion Financial Planning Ltd', '250 High Street , Guildford , Surrey , GU1 3JG', 'United Kingdom', 'GU1 3JG', 'Andrew Casey', '3', 'enquiries@bastionfinancial.co.uk', 'www.bastionfinancialplanning.co.uk', '01483330210', '694856', 'directly_authorised', NULL, NULL, NULL, 'no', NULL, 'An existing Client', 'on', NULL, NULL, NULL, NULL, 'no', NULL, 'no', NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', NULL, NULL, NULL, NULL, '[\"Platform \\/ WRAP\"]', NULL, NULL, 'Elevate', 'Transact', 'Scottish Widows', 'Aberdeen Wrap', NULL, NULL, NULL, NULL, 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-24 10:22:26', '2025-03-27 13:55:21', '2025-03-27 13:55:21', '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"adviser_email\":null,\"branch\":null}}', NULL, NULL),
(251, NULL, 694, 'Grosvenor Birch Ltd', 'Grosvenor Birch Ltd', 'Salt Mill Barn, Old Salisbury Lane, Romsey, Hampshire, SO51 0GD', NULL, NULL, 'Family owned, Elaine Birch, Lewis Birch & Sara Loveridge', '3', 'sara@grosvenorbirch.uk', 'www.grosvenorbirch.uk', '01794521550', '528798', 'directly_authorised', NULL, NULL, NULL, 'no', NULL, 'Client already had SIPP with you', 'on', NULL, 'on', NULL, NULL, 'no', NULL, 'no', NULL, 'no', NULL, '£2m', NULL, NULL, 'yes', 'no', 'Varies', '1% but only taken from investment products', NULL, 'no', '[\"Commercial Property\",\"Deposit Accounts\"]', 'Yes', 'Advisory basis', 'Transact', 'Fundment', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'no', '0', NULL, NULL, '0', NULL, NULL, '0', NULL, NULL, '0', NULL, '0', NULL, '0', NULL, NULL, NULL, 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', 'no', NULL, NULL, NULL, 'no', NULL, 'no', NULL, 'no', 'no', NULL, 'Yes', NULL, NULL, '100', NULL, 'No', 'Yes', 'Yes', 'We do enhanced DD on PEPS, high risk – includes checking in with their other professional advisers, looking at MPs voting history & any other DD we feel appropriate to validate the integrity of the client', 'Yes', 'Our policies are reviewed at least annually (& on prompting by our third party compliance specialists).', 'No', NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, NULL, 'No', '/storage/app/public/signatures/signature_67e169731bd6b.png', 'SMF3', '/storage/app/public/documents/1742825843_Grosvenor_Birch_Ltd_-_Authorised_Signatories.pdf', NULL, NULL, '[\"https:\\/\\/alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1742825843_Companies house screenshot.png\",\"https:\\/\\/alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1742825843_PSC.png\",\"https:\\/\\/alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1742825843_Registered officers.png\"]', 'Director/shareholder', 'SAB01329', '2025-03-24', NULL, NULL, NULL, NULL, 'pending', '2025-03-24 14:17:23', '2025-03-24 14:17:23', NULL, '{\"1\":{\"adviser_name\":\"Sara Loveridge\",\"adviser_fca_reference\":\"SAB01329\",\"adviser_email\":\"sara@grosvenorbirch.uk\",\"branch\":\"n\\/a\",\"requires_online_access\":\"yes\"}}', NULL, NULL),
(252, NULL, 687, 'Bastion Financial Planning Ltd', 'Bastion Financial Planning Ltd', '250 High Street , Guildford , Surrey , GU1 3JG', 'United Kingdom', 'GU1 3JG', 'Andrew Casey', '3', 'enquiries@bastionfinancial.co.uk', 'www.bastionfinancialplanning.co.uk', '01483330210', '694856', 'directly_authorised', NULL, NULL, NULL, 'no', NULL, 'An existing Client', 'on', NULL, NULL, NULL, NULL, 'no', NULL, 'no', NULL, 'yes', '2 Introducers', '2,000,000 - Latest schedule attached with more details', 'N/A', '5000', 'no', 'no', '1.00', '1.00', 'Yes', 'Only renewal commission for old life policies', '[\"Platform \\/ WRAP\"]', 'Yes', 'Advisory basis', 'Elevate', 'Transact', 'Scottish Widows', 'Aberdeen Wrap', 'Bastion Fees', 'Barclays Bank', '53225623', '20-35-35', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, 'Yes', NULL, 'No', NULL, '0%', NULL, 'Yes', NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, NULL, NULL, '/storage/app/public/signatures/signature_67e276ae44b27.png', 'See FCA records', '/storage/app/public/documents/1742894766_Bastion_Financial_Planning_authorised_signatory_list.pdf', '/storage/app/public/documents/1742894766_2025_Company_information_-_Bastion_Financial_Planning.pdf', NULL, '[\"https:\\/\\/alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1742894766_Bastion model Portfolios Risk profile 4-8.xlsx\"]', 'Director', 'AGC00056 - 694856', '2025-03-25', NULL, NULL, NULL, NULL, 'pending', '2025-03-25 09:26:06', '2025-03-27 13:55:33', '2025-03-27 13:55:33', '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"adviser_email\":null,\"branch\":null}}', '/storage/app/public/documents/1742894766_2025_Bastion_Financial_Planning_Ltd_Organisational_Chart.pptx', NULL),
(253, NULL, 687, 'Bastion Financial Planning Ltd', 'Bastion Financial Planning Ltd', '250 High Street , Guildford , Surrey , GU1 3JG', 'United Kingdom', 'GU1 3JG', 'Andrew Casey', '3', 'enquiries@bastionfinancial.co.uk', 'www.bastionfinancialplanning.co.uk', '01483330210', '694856', 'directly_authorised', NULL, NULL, NULL, 'no', NULL, 'An existing Client', 'on', NULL, NULL, NULL, NULL, 'no', NULL, 'no', NULL, 'yes', '2 Introducers', '5000000', 'N/A', '5000', 'no', 'no', '1.00', '1.00', 'Yes', 'Only renewal commission for old life policies', '[\"Platform \\/ WRAP\"]', NULL, NULL, 'Elevate', 'Transact', 'Scottish Widows', 'Aberdeen Wrap', 'Bastion Fees', 'Barclays Bank', '53225623', '20-35-35', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', NULL, NULL, NULL, '100', 'No', 'Yes', 'Yes', 'We currently have no PEP clients', 'Yes', NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, NULL, NULL, '/storage/app/public/signatures/signature_67e27926e7305.png', 'As per FCA register', '/storage/app/public/documents/1742895398_Bastion_Financial_Planning_authorised_signatory_list.pdf', '/storage/app/public/documents/1742895398_2025_Company_information_-_Bastion_Financial_Planning.pdf', NULL, '[\"https:\\/\\/alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1742895398_Bastion model Portfolios Risk profile 4-8.xlsx\",\"https:\\/\\/alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1742895398_PI Schedule - 1.10.24-30.09.25.pdf\"]', 'Andrew Casey', 'AGC00056 - 694856', '2025-03-25', NULL, NULL, NULL, NULL, 'pending', '2025-03-25 09:36:38', '2025-03-25 09:36:38', NULL, '{\"1\":{\"adviser_name\":\"Andrew Casey\",\"adviser_fca_reference\":\"AGC00056\",\"adviser_email\":\"andrew.casey@bastionfinancial.co.uk\",\"branch\":null}}', '/storage/app/public/documents/1742895398_2025_Bastion_Financial_Planning_Ltd_Organisational_Chart.pptx', NULL),
(254, NULL, 698, 'Test', 'test', 'Test', NULL, NULL, '23', '12', 'test@test.com', 'www.test.com', '272727', '123', 'appointed_representative', NULL, '123', '123', 'no', NULL, '123', NULL, NULL, 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', NULL, '123', '123', '123', '123', '[\"Deposit Accounts\"]', 'No', 'Discretionary basis', NULL, NULL, NULL, NULL, '123', '123', '123', '123', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-26 06:57:09', '2025-03-26 07:09:37', '2025-03-26 07:09:37', '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"adviser_email\":null,\"branch\":null}}', NULL, NULL),
(255, NULL, 700, 'Countrywide Estate Planning IFA', 'Countrywide Estate Planning IFA ltd', 'Countrywide Estate Planning ifa \r\nGables House, 62 Kenilworth Road, Leamington Spa, Warwickshire.', NULL, 'CV32 6JX', NULL, NULL, 'pcadmin@ctt-group.co.u', NULL, '+44(0)1926 514390', NULL, NULL, NULL, 'Pi Financial Ltd', '186419', NULL, NULL, NULL, NULL, NULL, 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, NULL, NULL, NULL, NULL, 'Pi Financial Ltd', 'Barclays', '00120545', '207801', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-28 12:31:07', '2025-04-01 08:10:23', '2025-04-01 08:10:23', '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"adviser_email\":null,\"branch\":null}}', NULL, NULL);
INSERT INTO `advisers` (`id`, `selected_adviser_id`, `creater_id`, `company_name`, `trading_name`, `address`, `country`, `post_code`, `share_holder_details`, `regulated_adviser`, `contact_email`, `website`, `telephone`, `fca_firms_reference`, `directly_authorised_checked`, `appointed_representative_checked`, `principal_company_name`, `their_frn`, `advice`, `provide_countries`, `hear_about_us`, `word_of_referrals_checked`, `lead_generation_checked`, `marketing_checked`, `other_specify_checked`, `other_specify`, `restrictions_yes_permission`, `restrictions_yes_permission_answer`, `sanctions`, `sanctions_yes_answer`, `connection_connection`, `connection_connection_yes_answer`, `professional_indemnity_insurance`, `policy_excess_DB`, `other_money`, `separate_cyber_security`, `permissions_for_advising`, `initial_advice_fee`, `going_annual_fee`, `house_portfolio_solutions`, `receive_provider_commission`, `investment_strategy`, `running_managing_portfolios`, `basis`, `principal_company_name1`, `principal_company_name2`, `principal_company_name3`, `principal_company_name4`, `account_name`, `bank_name`, `account_number`, `sort_code`, `not_applicable`, `advisers_permitted`, `staff_supervisory_position`, `gold_standard`, `db_transfers_12_months`, `total_value_12_months`, `percentage_db_transfers_12_months`, `db_transfers_24_months`, `total_value_24_months`, `percentage_db_transfers_24_months`, `db_transfers_36_months`, `total_value_36_months`, `percentage_db_transfers_36_months`, `complaints_12_months`, `redress_cases_12_months`, `complaints_24_months`, `redress_cases_24_months`, `complaints_36_months`, `redress_cases_36_months`, `percentage_db_transfers`, `pension_specialist`, `act_as_specialist`, `details_of_firms`, `contact_name`, `email_address`, `phone_number`, `dial_code`, `typical_investment_strategy`, `minimum_cetv`, `conduct_db_transfers`, `accept_insistent_clients`, `work_with_unregulated_firms`, `receive_referrals`, `referral_details`, `db_transfer_percentage`, `db_client_source`, `relationships_with_trustees`, `trustee_relationship_details`, `contingent_charging`, `contingent_charging_details`, `triage_service`, `advice_fee`, `charging_structure_breakdown`, `policies_coverage`, `not_covered_details`, `high_risk`, `standard_risk`, `low_risk`, `sensitive_jurisdictions`, `accept_peps`, `enhanced_due_diligence`, `add_details_text`, `collect_source`, `review_frequency`, `unregulated_firms`, `firms_details`, `total_business_percentage`, `investments_introduced`, `meet_client`, `business_conducted`, `knowledgeable_investors`, `criteria_details`, `products_design`, `fair_value`, `clear_communications`, `post_sales_support`, `customer_understanding`, `customer_adequate_controls`, `customer_evidence`, `customer_had_licences`, `signature_adviser`, `management_function`, `company_authorised_signatory`, `company_register_shareholder`, `appointed_text`, `adviser_multifiles`, `position_adviser`, `financial_adviser_number`, `day`, `date_column`, `signature_alltrust`, `position_alltrust`, `date_column2`, `status`, `created_at`, `updated_at`, `deleted_at`, `advisers`, `company_structure_chart`, `flag`) VALUES
(256, NULL, 702, 'The Clifton Business Consultancy Limited', 'The Clifton Business Consultancy Limited', '227 Canford Lane, Westbury on Trym, Bristol, BS9 3PD', NULL, NULL, 'Robert Thomas & Michael Lloyd', '2', 'cbc@cliftonbc.co.uk', 'www.cliftonbc.co.uk', '01179591022', '571653', 'directly_authorised', NULL, NULL, NULL, 'no', NULL, 'Existing client', 'on', NULL, NULL, NULL, NULL, 'no', NULL, 'no', NULL, 'no', NULL, '2000000', '15000', NULL, 'no', 'yes', 'Variable', '0.25% to 1%', 'No', 'No', '[\"Commercial Property\",\"DMV \\/ Model Portfolios\"]', 'No', 'Advisory basis', 'Royal London', 'Parmenion Capital Partners', 'Scottish Widows', 'LGT Vestra', 'The Clifton Business Consultancy Limited', 'Bank of Scotland', '06293379', '122481', NULL, '2', '2', 'no', '0', '0', '0', '1', '47673', '5', '1', '116453', '5', '0', '0', '0', '0', '0', '0', '0', 'internal', 'no', NULL, NULL, NULL, NULL, NULL, 'Mainstream pension provider with Governed portfolios', '30000', 'no', 'no', 'no', 'no', NULL, NULL, NULL, 'no', NULL, 'no', NULL, 'yes', 'yes', 'N/A', 'Yes', NULL, NULL, NULL, NULL, 'No', 'No', 'No', NULL, 'Yes', 'annually', 'No', NULL, NULL, NULL, 'Yes', NULL, 'No', NULL, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, NULL, 'no', '/storage/app/public/signatures/signature_67e6c7c913164.png', 'SMF3r', NULL, NULL, NULL, NULL, 'Director & Shareholder', 'RMT00001', '2025-03-28', NULL, NULL, NULL, NULL, 'pending', '2025-03-28 16:01:13', '2025-03-28 16:01:13', NULL, '{\"1\":{\"adviser_name\":\"Robert Thomas\",\"adviser_fca_reference\":\"RMT00001\",\"branch\":\"Bristol\",\"adviser_email\":\"bob@cliftonbc.co.uk\",\"address\":\"227 Canford Lane, Westbury on Trym, Bristol, BS9 3PD\",\"date_of_birth\":\"1967-04-23\",\"requires_online_access\":\"yes\",\"approved_for_transfer_db\":\"yes\"}}', NULL, NULL),
(257, NULL, 704, 'Test!', 'Test!', 'Test!', 'Afghanistan', NULL, 'Test!', '1', 'info@ilcorp.tech', 'www.ilcorp.tech', '605494795', '282828282', 'appointed_representative', NULL, '123', '345', 'no', NULL, 'asd', NULL, NULL, 'on', NULL, NULL, 'no', NULL, 'no', NULL, 'no', 'asd', 'Test!', '123', '123', 'yes', 'yes', '123', '123', '123', '123', '[\"Advisory Stockbroker\"]', 'No', 'Advisory basis', 'Test!', 'Test!', 'Test!', 'Test!', 'Test!', 'Test!', 'Test!', 'Test!', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, NULL, NULL, '/storage/app/public/signatures/signature_67ea41f2ebed3.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-31 07:19:14', '2025-04-02 12:19:25', '2025-04-02 12:19:25', '{\"1\":{\"adviser_name\":\"Martins\",\"adviser_fca_reference\":\"282828282\",\"branch\":\"UK\",\"adviser_email\":\"support@ilcorp.tech\",\"address\":\"asd\",\"date_of_birth\":null}}', NULL, NULL),
(258, NULL, 658, 'Bingham-Woods IFA Ltd', NULL, '2 Bridge Street\r\nSpalding\r\nLincolnshire PE11 1XA', NULL, NULL, 'Jonathan Bingham', '4', 'claire.eyett@bingham-woods.co.uk', 'www.bingham-woods.co.uk', '01775718257', '463465', 'appointed_representative', NULL, 'Quilter Wealth Limited', '217742', 'no', NULL, 'Current client', 'on', NULL, 'on', NULL, NULL, 'no', NULL, 'no', NULL, 'no', NULL, 'Provided by network - Quilter Wealth Ltd', 'n/a as don\'t advise', NULL, 'no', 'no', '0', '0', 'n/a', 'n/a', '[\"Platform \\/ WRAP\",\"Commercial Property\",\"Deposit Accounts\",\"Funds (direct via a Platform)\",\"DMV \\/ Model Portfolios\",\"Structure Deposit\"]', 'Yes', 'Advisory basis', 'Baillie Gifford', 'Janus Henderson', 'Royal London', 'Liontrust', 'Quilter Wealth Ltd', 'Lloyds Bank Plc', '04451958', '309751', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Through Quilter Wealth network\r\nEverything', NULL, '100', NULL, 'No', 'No', 'No', NULL, 'No', 'Through Quilter', 'No', 'n/a', NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, NULL, NULL, '/storage/app/public/signatures/signature_67ebc20a85405.png', 'Jonathan Bingham- Director', '/storage/app/public/documents/1743503882_Company_Structure.pdf', '/storage/app/public/documents/1743503882_BINGHAM-WOODS_INDEPENDENT_FINANCIAL_ADVISORS_LIMITED_people_-_Find_and_update_company_information_-_GOV.UK.pdf', NULL, NULL, 'Director', 'JLB00039', '2025-04-01', NULL, NULL, NULL, NULL, 'pending', '2025-04-01 10:38:02', '2025-04-02 12:02:58', NULL, '{\"1\":{\"adviser_name\":\"Jonathan Bingham\",\"adviser_fca_reference\":\"JLB000039\",\"adviser_email\":\"jonathan.bingham@bingham-woods.co.uk\",\"branch\":\"Spalding\",\"requires_online_access\":\"yes\"}}', '/storage/app/public/documents/1743503882_Company_Structure.pdf', NULL),
(259, NULL, 708, 'WPS Wealth Ltd', 'WPS Wealth Ltd', '8 Ty Nant Court Morganstown Cardiff CF15 8LW', NULL, NULL, 'Gareth Richards', '4', 'enquiry@wpswealth.co.uk', 'wpswealth.co.uk', '02920 022780', '1023571', 'directly_authorised', NULL, NULL, NULL, 'no', NULL, NULL, 'on', NULL, NULL, NULL, NULL, 'no', NULL, 'no', NULL, 'no', NULL, 'financial adviser indemnity insurance', '15000', '0', 'no', 'no', '3%', '0.5%', 'NONE', 'YES', '[\"Advisory Stockbroker\",\"Commercial Property\",\"Deposit Accounts\",\"DMV \\/ Model Portfolios\",\"Structure Deposit\"]', 'Yes', 'Advisory basis', 'Prudential', 'M&g', 'LV', 'scottish widows', 'tp re wps wealth LTD', 'royal bank of scotland', '32917545', '151000', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-04-02 15:57:53', '2025-04-02 15:57:53', NULL, '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"adviser_email\":null,\"branch\":null}}', NULL, NULL),
(260, NULL, 672, 'Holyoakes Group Limited', 'Holyoakes Group Limited', '7 Sugar Brook Court, Aston Road, Bromsgrove, Worcestershire', 'United Kingdom', 'B60 3EX', 'Helen Firminger', '1', 'HarveyP@holyoakes.co.uk', 'www.holyoakes.co.uk', '0152776667', '426166', 'directly_authorised', NULL, NULL, NULL, 'no', NULL, NULL, 'on', NULL, NULL, NULL, NULL, 'no', NULL, 'no', NULL, 'no', NULL, '£1,850,000', 'N/A', '5,000 excess each claim', 'no', 'no', '1', '0.75', 'N/A', 'Yes', '[\"Advisory Stockbroker\",\"Funds (direct via a Platform)\",\"DMV \\/ Model Portfolios\"]', 'Yes', 'Advisory basis', 'Unknown', NULL, NULL, NULL, 'Holyoakes Group Limited', 'Lloyds Bank PLC', '01431620', '30-91-36', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', NULL, NULL, NULL, NULL, 'No', NULL, 'Yes', NULL, 'No', NULL, 'No', NULL, NULL, NULL, 'Yes', NULL, 'No', NULL, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, NULL, NULL, '/storage/app/public/signatures/signature_67ee91231bde6.png', '3', NULL, NULL, NULL, NULL, 'Director', 'MXF01332', '2025-04-03', NULL, NULL, NULL, NULL, 'pending', '2025-04-03 13:46:11', '2025-04-03 13:46:11', NULL, '{\"1\":{\"adviser_name\":\"Joseph Conry\",\"adviser_fca_reference\":\"JMC00009\",\"adviser_email\":\"josephconry@holyoakes.co.uk\",\"branch\":\"Holyoakes Group Limited\",\"requires_online_access\":\"yes\"}}', NULL, NULL),
(261, NULL, 720, 'pi financial', 'See FCA register - 186419', 'pi financial, morfe house, shrewsbury,', 'United Kingdom', NULL, 'Tim Sutcliffe', '90', 'sam.sussums@pifinancial.co.uk', 'pifinancial.co.uk', '01743382007', '186419', 'directly_authorised', NULL, NULL, NULL, 'no', NULL, NULL, 'on', NULL, NULL, NULL, NULL, 'yes', 'see FCA register.  UCIS requirement, we\'re in the process of getting this removed.  Limitation re claims management is self explanatory.  Article 3 - this is the firm\'s status having previously been Exempt CAD', 'yes', 'See FCA register.  Fine in 2012 related to 2 advisers who are no longer with the Firm.  The Firm was required to complete an undertaking, which was satisfied in June 2023 with no further action required.', 'yes', '7 introducers in place where we receive referrals e.g. mortgage leads from an estate agent.', '3,150,000', '10,000', '5,000', 'yes', 'no', 'c.3%', 'c.1%', 'NA', 'Yes', '[\"Commercial Property\",\"Funds (direct via a Platform)\",\"DMV \\/ Model Portfolios\"]', 'No', NULL, 'Quilter', 'Prudential', 'Royal London', 'Standard Life', 'pi financial', 'Barclays', '00120545', '20-78-01', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', NULL, NULL, NULL, NULL, 'No', 'Yes', 'Yes', 'EiDV is conducted on all clients using CallML', 'Yes', 'annually', 'No', NULL, NULL, NULL, NULL, NULL, 'No', 'our consumers are \'Retail Clients\'', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, NULL, NULL, NULL, 'SMF3 and SMF16', NULL, '/storage/app/public/documents/1744122310_PI_FINANCIAL_LTD_people_-_Find_and_update_company_information_-_GOV.pdf', NULL, NULL, 'Compliance Director', 'SWS01068', '2025-04-08', NULL, NULL, NULL, NULL, 'pending', '2025-04-08 14:25:10', '2025-04-08 14:25:10', NULL, '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"branch\":null,\"adviser_email\":null,\"address\":null,\"date_of_birth\":null}}', '/storage/app/public/documents/1744122310_pi_financial_company_structure_December_v.1_2024.pdf', NULL),
(262, NULL, 729, 'PSA Financial Services Limited', 'PSA Financial Services Limited', 'PSA House\r\n3 Rose Way\r\nBlaby\r\nLeicester\r\nLE8 4BY', 'United Kingdom', NULL, 'Paul Thomas Smith and Lesley Yvette Smith (50/50)', '13', 'psmyth@psafinancial.co.uk', 'https://www.psafinancial.co.uk/', '0116 2993000', '231108', 'directly_authorised', NULL, NULL, NULL, 'yes', 'Mainly EEA, some India, New Zealand.  Tiny proportion of overall clients', 'We have a number of clients with SIPPs previously administered by PSG', 'on', 'on', 'on', NULL, 'Unbiased etc', 'yes', 'Pension transfer permissions limited to policies with GARs', 'no', NULL, 'no', NULL, '£2,250,000.00', 'n/a', '£10,000', 'yes', 'no', 'Max 3%', 'Max 1%', 'Only use out 3rd Party managed portfolio services', 'Only from non-investment insurance providers', '[\"Commercial Property\",\"DMV \\/ Model Portfolios\",\"Structure Deposit\"]', 'No', NULL, 'Quilter Investment Platform', 'Quilter Cheviot DFM', 'Brewin Dolphin DFM', 'Wealthtime Platform', 'PSA Financial Services Limited', 'Natwest', '35651954', '56-00-55', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', NULL, '0.07', NULL, NULL, 'No', 'Yes', 'Yes', 'Additional scrutiny of source of funds, additional ID verification on top of standard electronic checks', 'Yes', 'Mostly annually', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', 'Yes', NULL, NULL, NULL, '/storage/app/public/signatures/uploaded_67ffcc7bed509.jpg', 'SMF3,16,17', '/storage/app/public/documents/1744817275_Authorised_Signatory_List_-_April_2025.pdf', '/storage/app/public/documents/1744817275_PSA_Shareholders_and_Controllers_-_April_2025.pdf', NULL, NULL, 'Senior Compliance Manager', NULL, '2025-04-16', NULL, NULL, NULL, NULL, 'pending', '2025-04-16 15:27:55', '2025-04-16 15:27:55', NULL, '{\"1\":{\"adviser_name\":\"Calum Mackenzie\",\"adviser_fca_reference\":\"PB260259D\",\"branch\":null,\"adviser_email\":\"cmackenzie@psafinancial.co.uk\",\"address\":\"PSA Financial Services Limited\\r\\nPSA House\\r\\n3 Rose Way\\r\\nBlaby\\r\\nLeicester\\r\\nLE8 4BY\",\"date_of_birth\":\"1996-08-18\",\"requires_online_access\":\"yes\"}}', '/storage/app/public/documents/1744817275_PSA_Organisational_Chart.docx', NULL),
(263, NULL, 740, 'MG Asset Planning Ltd', NULL, '17 Margaret Street, Abercynon, CF45 4RE', 'United Kingdom', NULL, 'Matt Goodley', '1', 'info@mgassetplanningltd.uk', NULL, '07879613583', '1031859', 'appointed_representative', NULL, 'ValidPath', '197107', 'no', NULL, 'existing client', 'on', NULL, NULL, NULL, NULL, 'yes', 'DB Transfers', 'no', NULL, 'no', NULL, '5,000,000', 'N/A', NULL, 'no', 'no', '1%', '0.50%', 'No', 'No', '[\"DMV \\/ Model Portfolios\"]', 'No', NULL, NULL, NULL, NULL, NULL, 'ValidPath Limited AR Commissions Account', 'HSBC', '42106906', '401323', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', NULL, '10', '60', '30', 'No', 'No', 'Yes', 'Smart Search utilised and monitored updates', 'Yes', 'minimum annually', 'No', NULL, '0', NULL, 'Yes', NULL, 'Yes', 'Based on knowledge, background, other assets and planning needs', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, NULL, NULL, '/storage/app/public/signatures/signature_680b3ea9d5563.png', 'SMF3 +SMF16', NULL, NULL, NULL, NULL, 'Director / IFA', 'MJG01270', '2025-04-25', NULL, NULL, NULL, NULL, 'pending', '2025-04-25 07:50:01', '2025-04-25 07:50:01', NULL, '{\"1\":{\"adviser_name\":\"Matt Goodley\",\"adviser_fca_reference\":\"MJG01270\",\"branch\":\"Margaret Street\",\"adviser_email\":\"matt@mgassetplanningltd.uk\",\"address\":\"17 Margaret Street, Abercynon, CF45 4RE\",\"date_of_birth\":\"1971-03-04\",\"requires_online_access\":\"yes\"}}', '/storage/app/public/documents/1745567401_Structure+Chart+-+MG+Asset+Planning+Limited+-+April_25.pdf', NULL),
(264, NULL, 738, 'Trusted Wealth Ltd', 'Trusted Wealth Ltd', 'Level 18, 40 Bank Street\r\nCanary Wharf', 'United Kingdom', NULL, 'Foysol Hussain', '1', 'foysol@trustedwealth.co.uk', 'www.trustedwealth.co.uk', '07771010201', '997121', 'appointed_representative', NULL, 'Julian Harris Financial Consultants', '153566', 'no', NULL, NULL, 'on', NULL, NULL, NULL, NULL, 'no', NULL, 'no', NULL, 'no', NULL, NULL, NULL, NULL, 'no', 'yes', '2% on first £250k of AUA, 1% on next £750k of AUA, 0.5% thereafter', '0.75% Ongoing Advice Fee (not management fee)', 'None', 'No', '[\"DMV \\/ Model Portfolios\"]', NULL, 'Advisory basis', NULL, NULL, NULL, NULL, 'Mr. JP Harris t/a Julian Harris Financial Consultants', 'Cater Allen Private Bank', '49846838', '165710', NULL, '1', 'All supervisory positions are not part of the AR, rather the parent company (Julian Harris Financial Consultants)', 'yes', '4', '£3,000,000', '<10%', '4', '£3,000,000', '<10%', '0', '0', '0', '0', 'N/A', '0', 'N/A', '0', 'N/A', 'all cases were \'at-retirement\'', 'internal', 'no', NULL, NULL, NULL, NULL, NULL, NULL, '£200,000', 'no', 'no', 'no', 'no', NULL, NULL, NULL, 'no', NULL, 'no', NULL, 'yes', 'yes', 'Free triage, free abridged advice, full report (with or without implementation) is charged at a rate of 2% of the first £250k of AUA (CETV), plus 1% of the next £750k, plus 0.50% on AUA in excess of £1m', 'Yes', NULL, NULL, NULL, NULL, 'No', 'No', 'No', NULL, 'Yes', 'Annually - carried out by the network', 'No', NULL, NULL, NULL, 'Yes', NULL, 'No', NULL, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, NULL, 'No', '/storage/app/public/signatures/signature_6811e37d7e6a8.png', NULL, NULL, NULL, NULL, NULL, NULL, 'FCA IRN: FXH01160', '2025-04-30', NULL, NULL, NULL, NULL, 'pending', '2025-04-30 08:46:53', '2025-04-30 08:46:53', NULL, '{\"1\":{\"adviser_name\":\"Foysol Hussain\",\"adviser_fca_reference\":\"FXH01160\",\"branch\":null,\"adviser_email\":\"foysol@trustedwealth.co.uk\",\"address\":\"Level 18, 40 Bank Street\\r\\nCanary Wharf, \\r\\nLondon, E14 5NR\",\"date_of_birth\":\"1980-09-10\",\"requires_online_access\":\"yes\",\"approved_for_transfer_db\":\"yes\"}}', NULL, NULL),
(265, NULL, 742, 'Orbit Financial Planning Ltd', NULL, 'Mills House, Mills Way, Boscombe Down Business Park, Amesbury, Salisbury. SP4 7RX', 'United Kingdom', NULL, 'Richard Walker-Gunns', '1', 'richard@orbitfp.co.uk', 'www.orbitfp.co.uk', '07793243006', '1003028', 'appointed_representative', NULL, '2plan wealth management ltd', '461598', 'no', NULL, 'Transfer of servicing for existing client but also I live in Salisbury. I have dealt previously with James Hay, and aware of Rowanmoor in my career.', 'on', 'on', 'on', NULL, 'On occasion, I receive enquiries from Unbiased. I do not work with any \'lead generation\' companies other than Unbiased.', 'no', NULL, 'no', NULL, 'no', NULL, 'Full cover via network', 'n/a', '5000', 'no', 'no', 'Varies - average is 1.5%', 'Varies according to AUM - average 0.8%', 'None', 'No', '[\"Platform \\/ WRAP\",\"Commercial Property\",\"Deposit Accounts\",\"DMV \\/ Model Portfolios\"]', 'No', NULL, 'EBI', 'Timeline', '2plan MPS solutions', 'Tatton', '2plan wealth management', 'National Westminster', '45718563', '606005', 'on', '0', '0', 'no', '0', NULL, NULL, '0', NULL, NULL, '0', NULL, NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Everything is covered by 2plan policies.', '0', '100', '0', 'No', 'Yes', 'Yes', 'Passport, driving license, along with source of wealth and bank statements. Also all PEPs are flagged with 2plan and we await approval before proceeding.', 'Yes', 'Annually - network controlled', 'No', NULL, '0', 'n/a', 'No', 'n/a', 'No', NULL, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, NULL, 'No', '/storage/app/public/signatures/signature_6811e609b82c3.png', 'CF1 Director (AR)', '/storage/app/public/documents/1746003465_Signatory_list.docx', '/storage/app/public/documents/1746003465_Shareholders_and_Director.docx', 'richard@orbitfp.co.uk', NULL, 'Director', 'RJW01241', '2025-04-30', NULL, NULL, NULL, NULL, 'pending', '2025-04-30 08:57:45', '2025-04-30 08:57:45', NULL, '{\"1\":{\"adviser_name\":\"Richard Walker-Gunns\",\"adviser_fca_reference\":\"RJW01241\",\"adviser_email\":\"richard@orbitfp.co.uk\",\"branch\":null,\"requires_online_access\":\"yes\"}}', '/storage/app/public/documents/1746003465_Company_Structure_Chart.docx', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `comment_user_id` bigint(255) DEFAULT NULL,
  `sender_id` bigint(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dmss`
--

CREATE TABLE `dmss` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `reference_link` text DEFAULT NULL,
  `dropzone_multifiles` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `draft_advisers`
--

CREATE TABLE `draft_advisers` (
  `id` int(10) UNSIGNED NOT NULL,
  `selected_adviser_id` bigint(20) UNSIGNED DEFAULT NULL,
  `creater_id` int(11) DEFAULT NULL,
  `company_name` text DEFAULT NULL,
  `trading_name` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `post_code` text DEFAULT NULL,
  `share_holder_details` text DEFAULT NULL,
  `regulated_adviser` text DEFAULT NULL,
  `contact_email` text DEFAULT NULL,
  `website` text DEFAULT NULL,
  `telephone` text DEFAULT NULL,
  `fca_firms_reference` text DEFAULT NULL,
  `directly_authorised_checked` text DEFAULT NULL,
  `appointed_representative_checked` text DEFAULT NULL,
  `principal_company_name` text DEFAULT NULL,
  `their_frn` text DEFAULT NULL,
  `advice` text DEFAULT NULL,
  `provide_countries` text DEFAULT NULL,
  `hear_about_us` text DEFAULT NULL,
  `word_of_referrals_checked` text DEFAULT NULL,
  `lead_generation_checked` text DEFAULT NULL,
  `marketing_checked` text DEFAULT NULL,
  `other_specify_checked` text DEFAULT NULL,
  `other_specify` text DEFAULT NULL,
  `restrictions_yes_permission` text DEFAULT NULL,
  `restrictions_yes_permission_answer` text DEFAULT NULL,
  `sanctions` text DEFAULT NULL,
  `sanctions_yes_answer` text DEFAULT NULL,
  `connection_connection` text DEFAULT NULL,
  `connection_connection_yes_answer` text DEFAULT NULL,
  `professional_indemnity_insurance` text DEFAULT NULL,
  `policy_excess_DB` text DEFAULT NULL,
  `other_money` text DEFAULT NULL,
  `separate_cyber_security` text DEFAULT NULL,
  `permissions_for_advising` text DEFAULT NULL,
  `initial_advice_fee` text DEFAULT NULL,
  `going_annual_fee` text DEFAULT NULL,
  `house_portfolio_solutions` text DEFAULT NULL,
  `receive_provider_commission` text DEFAULT NULL,
  `investment_strategy` text DEFAULT NULL,
  `running_managing_portfolios` text DEFAULT NULL,
  `basis` text DEFAULT NULL,
  `principal_company_name1` text DEFAULT NULL,
  `principal_company_name2` text DEFAULT NULL,
  `principal_company_name3` text DEFAULT NULL,
  `principal_company_name4` text DEFAULT NULL,
  `account_name` text DEFAULT NULL,
  `bank_name` text DEFAULT NULL,
  `account_number` text DEFAULT NULL,
  `sort_code` text DEFAULT NULL,
  `not_applicable` text DEFAULT NULL,
  `advisers_permitted` text DEFAULT NULL,
  `staff_supervisory_position` text DEFAULT NULL,
  `gold_standard` text DEFAULT NULL,
  `db_transfers_12_months` text DEFAULT NULL,
  `total_value_12_months` text DEFAULT NULL,
  `percentage_db_transfers_12_months` text DEFAULT NULL,
  `db_transfers_24_months` text DEFAULT NULL,
  `total_value_24_months` text DEFAULT NULL,
  `percentage_db_transfers_24_months` text DEFAULT NULL,
  `db_transfers_36_months` text DEFAULT NULL,
  `total_value_36_months` text DEFAULT NULL,
  `percentage_db_transfers_36_months` text DEFAULT NULL,
  `complaints_12_months` text DEFAULT NULL,
  `redress_cases_12_months` text DEFAULT NULL,
  `complaints_24_months` text DEFAULT NULL,
  `redress_cases_24_months` text DEFAULT NULL,
  `complaints_36_months` text DEFAULT NULL,
  `redress_cases_36_months` text DEFAULT NULL,
  `percentage_db_transfers` text DEFAULT NULL,
  `pension_specialist` text DEFAULT NULL,
  `act_as_specialist` text DEFAULT NULL,
  `details_of_firms` text DEFAULT NULL,
  `contact_name` text DEFAULT NULL,
  `email_address` text DEFAULT NULL,
  `phone_number` text DEFAULT NULL,
  `dial_code` text DEFAULT NULL,
  `typical_investment_strategy` text DEFAULT NULL,
  `minimum_cetv` text DEFAULT NULL,
  `conduct_db_transfers` text DEFAULT NULL,
  `accept_insistent_clients` text DEFAULT NULL,
  `work_with_unregulated_firms` text DEFAULT NULL,
  `receive_referrals` text DEFAULT NULL,
  `referral_details` text DEFAULT NULL,
  `db_transfer_percentage` text DEFAULT NULL,
  `db_client_source` text DEFAULT NULL,
  `relationships_with_trustees` text DEFAULT NULL,
  `trustee_relationship_details` text DEFAULT NULL,
  `contingent_charging` text DEFAULT NULL,
  `contingent_charging_details` text DEFAULT NULL,
  `triage_service` text DEFAULT NULL,
  `advice_fee` text DEFAULT NULL,
  `charging_structure_breakdown` text DEFAULT NULL,
  `policies_coverage` text DEFAULT NULL,
  `not_covered_details` text DEFAULT NULL,
  `high_risk` text DEFAULT NULL,
  `standard_risk` text DEFAULT NULL,
  `low_risk` text DEFAULT NULL,
  `sensitive_jurisdictions` text DEFAULT NULL,
  `accept_peps` text DEFAULT NULL,
  `enhanced_due_diligence` text DEFAULT NULL,
  `add_details_text` text DEFAULT NULL,
  `collect_source` text DEFAULT NULL,
  `review_frequency` text DEFAULT NULL,
  `unregulated_firms` text DEFAULT NULL,
  `firms_details` text DEFAULT NULL,
  `total_business_percentage` text DEFAULT NULL,
  `investments_introduced` text DEFAULT NULL,
  `meet_client` text DEFAULT NULL,
  `business_conducted` text DEFAULT NULL,
  `knowledgeable_investors` text DEFAULT NULL,
  `criteria_details` text DEFAULT NULL,
  `products_design` enum('Yes','No') DEFAULT NULL,
  `fair_value` enum('Yes','No') DEFAULT NULL,
  `clear_communications` enum('Yes','No') DEFAULT NULL,
  `post_sales_support` enum('Yes','No') DEFAULT NULL,
  `customer_understanding` enum('Yes','No') DEFAULT NULL,
  `customer_adequate_controls` text DEFAULT NULL,
  `customer_evidence` text DEFAULT NULL,
  `customer_had_licences` text DEFAULT NULL,
  `signature_adviser` varchar(255) DEFAULT NULL,
  `management_function` text DEFAULT NULL,
  `company_authorised_signatory` text DEFAULT NULL,
  `company_register_shareholder` text DEFAULT NULL,
  `appointed_text` text DEFAULT NULL,
  `adviser_multifiles` text DEFAULT NULL,
  `position_adviser` text DEFAULT NULL,
  `financial_adviser_number` text DEFAULT NULL,
  `date_column` text DEFAULT NULL,
  `signature_alltrust` text DEFAULT NULL,
  `position_alltrust` text DEFAULT NULL,
  `date_column2` text DEFAULT NULL,
  `status` enum('pending','active','decline') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `advisers` text NOT NULL,
  `company_structure_chart` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `draft_advisers`
--

INSERT INTO `draft_advisers` (`id`, `selected_adviser_id`, `creater_id`, `company_name`, `trading_name`, `address`, `country`, `post_code`, `share_holder_details`, `regulated_adviser`, `contact_email`, `website`, `telephone`, `fca_firms_reference`, `directly_authorised_checked`, `appointed_representative_checked`, `principal_company_name`, `their_frn`, `advice`, `provide_countries`, `hear_about_us`, `word_of_referrals_checked`, `lead_generation_checked`, `marketing_checked`, `other_specify_checked`, `other_specify`, `restrictions_yes_permission`, `restrictions_yes_permission_answer`, `sanctions`, `sanctions_yes_answer`, `connection_connection`, `connection_connection_yes_answer`, `professional_indemnity_insurance`, `policy_excess_DB`, `other_money`, `separate_cyber_security`, `permissions_for_advising`, `initial_advice_fee`, `going_annual_fee`, `house_portfolio_solutions`, `receive_provider_commission`, `investment_strategy`, `running_managing_portfolios`, `basis`, `principal_company_name1`, `principal_company_name2`, `principal_company_name3`, `principal_company_name4`, `account_name`, `bank_name`, `account_number`, `sort_code`, `not_applicable`, `advisers_permitted`, `staff_supervisory_position`, `gold_standard`, `db_transfers_12_months`, `total_value_12_months`, `percentage_db_transfers_12_months`, `db_transfers_24_months`, `total_value_24_months`, `percentage_db_transfers_24_months`, `db_transfers_36_months`, `total_value_36_months`, `percentage_db_transfers_36_months`, `complaints_12_months`, `redress_cases_12_months`, `complaints_24_months`, `redress_cases_24_months`, `complaints_36_months`, `redress_cases_36_months`, `percentage_db_transfers`, `pension_specialist`, `act_as_specialist`, `details_of_firms`, `contact_name`, `email_address`, `phone_number`, `dial_code`, `typical_investment_strategy`, `minimum_cetv`, `conduct_db_transfers`, `accept_insistent_clients`, `work_with_unregulated_firms`, `receive_referrals`, `referral_details`, `db_transfer_percentage`, `db_client_source`, `relationships_with_trustees`, `trustee_relationship_details`, `contingent_charging`, `contingent_charging_details`, `triage_service`, `advice_fee`, `charging_structure_breakdown`, `policies_coverage`, `not_covered_details`, `high_risk`, `standard_risk`, `low_risk`, `sensitive_jurisdictions`, `accept_peps`, `enhanced_due_diligence`, `add_details_text`, `collect_source`, `review_frequency`, `unregulated_firms`, `firms_details`, `total_business_percentage`, `investments_introduced`, `meet_client`, `business_conducted`, `knowledgeable_investors`, `criteria_details`, `products_design`, `fair_value`, `clear_communications`, `post_sales_support`, `customer_understanding`, `customer_adequate_controls`, `customer_evidence`, `customer_had_licences`, `signature_adviser`, `management_function`, `company_authorised_signatory`, `company_register_shareholder`, `appointed_text`, `adviser_multifiles`, `position_adviser`, `financial_adviser_number`, `date_column`, `signature_alltrust`, `position_alltrust`, `date_column2`, `status`, `created_at`, `updated_at`, `deleted_at`, `advisers`, `company_structure_chart`) VALUES
(11, NULL, 181, 'Browning and Mccall Traders', 'Tatiana Shelton', 'Dolor et sint volup', 'Switzerland', NULL, 'Incididunt qui magna', '356', 'xacinyrove@mailinator.com', 'https://www.cydewe.cm', '+1 (887) 502-7452', '+1 (424) 486-6634', 'appointed_representative', NULL, 'Price Montoya Associates', 'Est veniam ut sunt', 'yes', 'Aperiam aute ullamco', 'Voluptatem dolorem', 'on', 'on', 'on', 'on', 'Ian Weber', 'yes', 'Nostrud eveniet ali', 'no', 'Sunt debitis fugiat', 'yes', 'Inventore quia conse', 'Ipsum dignissimos ut', 'Molestias aut dolore', 'Nemo corporis accusa', 'no', 'no', NULL, NULL, NULL, NULL, 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-10 15:21:01', '2025-03-10 15:21:01', NULL, '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"branch\":null,\"adviser_email\":null,\"address\":null,\"date_of_birth\":null}}', NULL),
(14, NULL, 654, 'indulis', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-11 08:42:05', '2025-03-11 08:42:05', NULL, '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"branch\":null,\"adviser_email\":null,\"address\":null,\"date_of_birth\":null}}', NULL),
(15, NULL, 654, 'indulis', 'indulis', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-11 08:42:20', '2025-03-11 08:42:20', NULL, '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"branch\":null,\"adviser_email\":null,\"address\":null,\"date_of_birth\":null}}', NULL),
(16, NULL, 652, 'Examples', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-11 08:45:30', '2025-03-11 08:45:30', NULL, '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"branch\":null,\"adviser_email\":null,\"address\":null,\"date_of_birth\":null}}', NULL),
(17, NULL, 652, 'Indulis', 'Test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-11 08:56:22', '2025-03-11 08:56:22', NULL, '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"branch\":null,\"adviser_email\":null,\"address\":null,\"date_of_birth\":null}}', NULL),
(18, NULL, 658, 'Bingham-Woods IFA Ltd', NULL, '2 Bridge Street\r\nSpalding\r\nLincolnshire PE11 1XA', 'United Kingdom', NULL, 'Jonathan Bingham', '4', 'claire.eyett@bingham-woods.co.uk', 'www.bingham-woods.co.uk', '01775718257', '463465', 'appointed_representative', NULL, 'Quilter Wealth Limited', '217742', 'no', NULL, 'Current client', 'on', NULL, 'on', NULL, NULL, 'no', NULL, 'no', NULL, 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-11 11:57:19', '2025-03-11 11:57:19', NULL, '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"branch\":null,\"adviser_email\":null,\"address\":null,\"date_of_birth\":null}}', NULL),
(19, NULL, 666, 'Satis Asset Managament', 'Satis Wealth Management', '45 Pall Mall\r\nLondon \r\nSW1Y 5JG', 'United Kingdom', NULL, 'Ben Sherwood', '5', 'jessica.brothers@satisuk.com', 'https://satiswealth.com/', '02038409970', '761140', 'directly_authorised', NULL, NULL, NULL, 'yes', 'USA\r\nSingapore', 'New clients hold policies with you', 'on', NULL, NULL, NULL, NULL, 'no', NULL, 'no', NULL, 'no', NULL, '3000000', 'NA', '10000', 'yes', 'no', '0', '0.9%', 'NA', 'NA', 'null', 'Yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-12 12:47:46', '2025-03-12 12:47:46', NULL, '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"branch\":null,\"adviser_email\":null,\"address\":null,\"date_of_birth\":null}}', NULL),
(20, NULL, 672, 'Holyoakes Group Limited', 'Holyoakes Group Limited', '7 Sugar Brook Court, Aston Road, Bromsgrove, Worcestershire, B60 3EX', 'United Kingdom', NULL, 'Helen Firminger', '1', 'HarveyP@holyoakes.co.uk', 'www.holyoakes.co.uk', '0152776667', '426166', 'directly_authorised', NULL, NULL, NULL, 'no', NULL, NULL, 'on', NULL, NULL, NULL, NULL, 'no', NULL, 'no', NULL, 'no', NULL, '£1,850,000', 'N/A', '5,000 excess each claim', 'no', 'no', '1', '0.75', 'N/A', 'Yes', '[\"Advisory Stockbroker\",\"Funds (direct via a Platform)\",\"DMV \\/ Model Portfolios\"]', 'Yes', 'Advisory basis', 'Unknown', NULL, NULL, NULL, 'Holyoakes Group Limited', 'Lloyds Bank PLC', '01431620', '30-91-36', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', NULL, NULL, NULL, NULL, 'No', 'No', 'Yes', NULL, 'No', NULL, 'No', NULL, NULL, NULL, 'Yes', NULL, 'No', NULL, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-13 11:25:59', '2025-03-13 11:25:59', NULL, '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"branch\":null,\"adviser_email\":null,\"address\":null,\"date_of_birth\":null}}', NULL),
(21, NULL, 672, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-13 11:26:03', '2025-03-13 11:26:03', NULL, '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"branch\":null,\"adviser_email\":null,\"address\":null,\"date_of_birth\":null}}', NULL),
(22, NULL, 670, 'a', 'a', 'a', NULL, NULL, 'a', '1', 'a', 'a', 'a', 'q', 'directly_authorised', NULL, 'a', 'a', NULL, 'a', 'a', 'on', NULL, NULL, NULL, 'a', 'no', 'a', 'no', NULL, 'yes', 'a', 'a', 'a', 'a', 'no', 'no', 'a', 'a', 'a', 'a', 'null', NULL, 'Discretionary basis', 'a', 'a', 'a', 'a', NULL, NULL, NULL, NULL, 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-14 10:59:07', '2025-03-14 10:59:07', NULL, '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"branch\":null,\"adviser_email\":null,\"address\":null,\"date_of_birth\":null}}', NULL),
(23, NULL, 684, 'Advice 4U t/a Ruby Financial Ltd', NULL, 'Unit 42, Basepoint Tewkesbury, Tewkesbury, Glos,GL20 8SD', 'United Kingdom', NULL, 'Jason Williams 90%', '4', 'jason@rubyfinancial.co.uk', 'ww.rubyfinancial.co.uk', '07715641746', '671527', 'directly_authorised', NULL, NULL, NULL, 'yes', 'We adviser UK clients who have worked abroad in India, Dubai and most EU countries. They are all UK based when we advise them.', 'Existing clients', 'on', NULL, NULL, NULL, NULL, 'no', NULL, 'no', NULL, 'no', NULL, 'up to £2m with Collegiate', '5000', '2500 mortages', 'no', 'no', 'Ad hoc based on work  needed', '0.75%', 'No', 'No', '[\"Deposit Accounts\",\"DMV \\/ Model Portfolios\"]', 'No', NULL, 'Tam', 'Evelyn Partners', 'Brooks Macdonald', 'Elston Consulting', 'Advice 4u Financial Planning', 'Natwest', '73629499', '609002', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', NULL, '1', '85', '14', 'No', 'No', 'Yes', 'Clients moving from abroad to UK. We need higher levels of evidence such as payslips, bank statement, work contracts.', 'Yes', 'every year', 'No', NULL, '0', NULL, 'No', 'We don\'t engage at all', 'No', NULL, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, NULL, 'No', '/storage/app/public/signatures/signature_67d8376224afc.png', 'SM3,16', NULL, NULL, NULL, NULL, 'Director', 'JXW00314', NULL, NULL, NULL, NULL, 'pending', '2025-03-17 14:53:22', '2025-03-17 14:53:22', NULL, '{\"1\":{\"adviser_name\":\"Jason Williams\",\"adviser_fca_reference\":\"JXW00314\",\"branch\":null,\"adviser_email\":\"jason@rubyfinancial.co.uk\",\"address\":\"Unit 42 Basepoint Tewkesbury, Oakfield Close, Tewkesbury Gl20 8SD\",\"date_of_birth\":\"1970-10-28\",\"requires_online_access\":\"yes\"},\"2\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"adviser_email\":null,\"branch\":null,\"address\":null,\"date_of_birth\":null}}', NULL),
(24, NULL, 694, 'Grosvenor Birch Ltd', 'Grosvenor Birch Ltd', 'Salt Mill Barn, Old Salisbury Lane, Romsey, Hampshire, SO51 0GD', NULL, NULL, 'Family owned, Elaine Birch, Lewis Birch & Sara Loveridge', '3', 'sara@grosvenorbirch.uk', 'www.grosvenorbirch.uk', '01794521550', '528798', 'directly_authorised', NULL, NULL, NULL, 'no', NULL, 'Client already had SIPP with you', 'on', NULL, 'on', NULL, NULL, 'no', NULL, 'no', NULL, 'no', NULL, NULL, NULL, NULL, NULL, 'no', NULL, NULL, NULL, NULL, '[\"Commercial Property\",\"Deposit Accounts\"]', 'Yes', 'Advisory basis', 'Transact', 'Fundment', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'no', '0', NULL, NULL, '0', NULL, NULL, '0', NULL, NULL, '0', NULL, '0', NULL, '0', NULL, NULL, 'internal', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', 'no', NULL, NULL, NULL, 'no', NULL, 'no', NULL, 'no', 'no', NULL, 'Yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-21 16:38:06', '2025-03-21 16:38:06', NULL, '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"branch\":null,\"adviser_email\":null,\"address\":null,\"date_of_birth\":null}}', NULL),
(25, NULL, 687, 'Bastion Financial Planning Ltd', 'Bastion Financial Planning Ltd', '250 High Street , Guildford , Surrey , GU1 3JG', NULL, NULL, 'Andrew Casey', '3', 'enquiries@bastionfinancial.co.uk', 'www.bastionfinancialplanning.co.uk', '01483330210', '694856', 'directly_authorised', NULL, NULL, NULL, 'no', NULL, 'An existing Client', 'on', NULL, NULL, NULL, NULL, 'no', NULL, 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-24 10:00:52', '2025-03-24 10:00:52', NULL, '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"branch\":null,\"adviser_email\":null,\"address\":null,\"date_of_birth\":null}}', NULL),
(26, NULL, 687, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-24 10:01:31', '2025-03-24 10:01:31', NULL, '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"branch\":null,\"adviser_email\":null,\"address\":null,\"date_of_birth\":null}}', NULL),
(27, NULL, 698, 'Test', 'test', 'Test', 'Belarus', NULL, '23', '12', 'test@test.com', 'www.test.com', '272727', '123', 'appointed_representative', NULL, '123', '123', 'no', NULL, '123', NULL, NULL, 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-26 06:55:03', '2025-03-26 06:55:03', NULL, '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"branch\":null,\"adviser_email\":null,\"address\":null,\"date_of_birth\":null}}', NULL),
(28, NULL, 700, 'Countrywide Estate Planning IFA', 'Countrywide Estate Planning IFA ltd', 'Countrywide Estate Planning ifa \r\nGables House, 62 Kenilworth Road, Leamington Spa, Warwickshire, CV32 6JX', NULL, NULL, NULL, NULL, 'pcadmin@ctt-group.co.u', NULL, '+44(0)1926 514390', NULL, NULL, NULL, 'Pi Financial Ltd', NULL, NULL, NULL, NULL, NULL, NULL, 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-03-28 12:16:57', '2025-03-28 12:16:57', NULL, '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"branch\":null,\"adviser_email\":null,\"address\":null,\"date_of_birth\":null}}', NULL),
(30, NULL, 708, 'WPS Wealth Ltd', 'WPS Wealth Ltd', '8 Ty Nant Court Morganstown Cardiff CF15 8LW', NULL, NULL, 'Gareth Richards', '4', 'enquiry@wpswealth.co.uk', 'wpswealth.co.uk', '02920 022780', '1023571', 'directly_authorised', NULL, NULL, NULL, 'no', NULL, NULL, 'on', NULL, NULL, NULL, NULL, 'no', NULL, 'no', NULL, 'no', NULL, 'financial adviser indemnity insurance', '15000', NULL, 'no', 'no', '3%', '0.5%', 'NONE', 'YES', '[\"Advisory Stockbroker\",\"Commercial Property\",\"Deposit Accounts\",\"DMV \\/ Model Portfolios\",\"Structure Deposit\"]', 'Yes', 'Advisory basis', 'Prudential', 'M&g', 'LV', 'scottish widows', 'tp re wps wealth LTD', 'royal bank of scotland', '32917545', '151000', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-04-02 15:55:50', '2025-04-02 15:55:50', NULL, '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"branch\":null,\"adviser_email\":null,\"address\":null,\"date_of_birth\":null}}', NULL),
(31, NULL, 721, 'Highwood', 'Highwood Financial Services', 'Victoria House\r\n45-47 Vicarage Road\r\nWatford\r\nWD18 0DE\r\n\r\nBovingdon', 'United Kingdom', NULL, 'Michael Gould, John Helfgott, Dawn Herriott', '8', 'john@highwood.co.uk', 'www.highwood.co.uk', '07973622844', '135717', 'directly_authorised', NULL, NULL, NULL, 'yes', 'Israel, EU,', 'existing clients', 'on', NULL, NULL, NULL, NULL, 'yes', 'No DB transfers', 'no', NULL, 'no', NULL, NULL, NULL, NULL, 'yes', 'no', '1-1.5%', '1%', 'Yes', 'no', '[\"Funds (direct via a Platform)\"]', 'Yes', 'Advisory basis', 'Dimensional', 'Vangaurd', 'L&G', 'Schroders', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-04-08 14:26:38', '2025-04-08 14:26:38', NULL, '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"branch\":null,\"adviser_email\":null,\"address\":null,\"date_of_birth\":null}}', NULL),
(32, NULL, 724, 'Julian Harris Financial Consultants', NULL, 'Julian Harris House, Musgrove, Ashford, Kent, TN23 7UN', 'United Kingdom', NULL, 'Julian Peter Harris', '62', 'compliance@julianharris.net', 'https://www.julianharris.net', '01233 661960', '153566', 'directly_authorised', NULL, NULL, NULL, NULL, NULL, 'One of our IFAs', NULL, NULL, NULL, NULL, 'This differs depending on each IFA.', 'no', NULL, 'no', NULL, 'no', NULL, '1850000', '25000', '£750-£5000', 'no', 'yes', NULL, NULL, NULL, NULL, 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-04-10 16:00:11', '2025-04-10 16:00:11', NULL, '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"branch\":null,\"adviser_email\":null,\"address\":null,\"date_of_birth\":null}}', NULL),
(33, NULL, 675, 'Becketts FS Ltd', NULL, 'Beckett House\r\nSovereign Court\r\nPoulton Business Park\r\nPoulton-le-Fylde\r\nLancashire   FY6 8jx', 'United Kingdom', NULL, NULL, NULL, 'info@beckettsfs.co.uk', 'https://www.beckettsfs.co.uk', '01253 881 910', '409051', 'directly_authorised', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-04-17 10:13:31', '2025-04-17 10:13:31', NULL, '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"branch\":null,\"adviser_email\":null,\"address\":null,\"date_of_birth\":null}}', NULL),
(34, NULL, 737, 'Blacktower Financial Management ( DIFC) Limited', 'Blacktower Financial Management ( DIFC) Limited', 'Unit GV-00-08-03-OF-23 Level 3\r\nGate Village building 8 DIFC Dubai UAE', 'United Arab Emirates', NULL, 'John Westwood 50%', NULL, 'gavin.pluck@blacktowerfm.com', NULL, '0553467353', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-04-23 06:47:48', '2025-04-23 06:47:48', NULL, '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"branch\":null,\"adviser_email\":null,\"address\":null,\"date_of_birth\":null}}', NULL),
(35, NULL, 742, 'Orbit Financial Planning Ltd', NULL, 'Mills House, Mills Way, Boscombe Down Business Park, Amesbury, Salisbury. SP4 7RX', 'United Kingdom', NULL, 'Richard Walker-Gunns', '1', 'richard@orbitfp.co.uk', 'www.orbitfp.co.uk', '07793243006', '1003028', 'appointed_representative', NULL, '2plan wealth management ltd', '461598', 'no', NULL, 'Existing client (Heritage pensions) but also I live in Salisbury. I have dealt previously with James Hay, and aware of Rowanmoor in my career.', 'on', 'on', 'on', NULL, 'On occasion, I receive enquiries from Unbiased. I do not work with any \'lead generation\' companies other than Unbiased.', 'no', NULL, 'no', NULL, 'no', NULL, 'Full cover via network', 'n/a', NULL, 'no', 'no', 'Varies', 'Varies according to AUM', 'None', 'No', '[\"Commercial Property\",\"Deposit Accounts\",\"DMV \\/ Model Portfolios\"]', 'No', NULL, 'EBI', 'Timeline', 'Waverton', 'Tatton', NULL, NULL, NULL, NULL, 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', NULL, '0', '100', '0', 'No', 'Yes', 'Yes', 'Passport, driving license, along with source of wealth and bank statements.', 'Yes', 'Annually - network controlled', 'No', NULL, '0', 'n/a', NULL, NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, NULL, 'No', NULL, 'CF1 Director (AR)', NULL, NULL, 'richard@orbitfp.co.uk', NULL, 'Director', 'RJW01241', NULL, NULL, NULL, NULL, 'pending', '2025-04-28 14:36:54', '2025-04-28 14:36:54', NULL, '{\"1\":{\"adviser_name\":\"Richard Walker-Gunns\",\"adviser_fca_reference\":\"RJW01241\",\"branch\":null,\"adviser_email\":\"richard@orbitfp.co.uk\",\"address\":\"Mills House, Mills Way, Boscombe Down Business Park, Amesbury, Salisbury, Wiltshire. SP4 7RX\",\"date_of_birth\":\"1974-05-31\",\"requires_online_access\":\"yes\"}}', NULL),
(36, NULL, 738, 'Trusted Wealth Ltd', NULL, 'Level 18, 40 Bank Street\r\nCanary Wharf', 'United Kingdom', NULL, 'Foysol Hussain', '1', 'info@trustedwealth.co.uk', 'www.trustedwealth.co.uk', '02031502500', '997121', 'appointed_representative', NULL, 'Julian Harris Financial Consultants', '153566', 'no', NULL, 'Mutual Client', 'on', NULL, NULL, NULL, NULL, 'no', NULL, 'no', NULL, 'no', NULL, NULL, NULL, NULL, 'no', 'yes', '2% on first £250k of AUA, 1% on next £750k of AUA, 0.5% thereafter', '0.75% Ongoing Advice Fee (not management fee)', 'None', 'No', '[\"DMV \\/ Model Portfolios\"]', 'No', 'Advisory basis', NULL, NULL, NULL, NULL, 'Mr. JP Harris t/a Julian Harris Financial Consultants', 'Cater Allen Private Bank', '49846838', '165710', NULL, '1', 'All supervisory positions are not part of the AR, rather the parent company', 'yes', '4', '£3,000,000', '<10%', '4', '£3,000,000', '<10%', NULL, NULL, NULL, '0', NULL, '0', NULL, '0', NULL, 'all cases were \'at-retirement\'', 'internal', 'no', NULL, NULL, NULL, NULL, NULL, 'Platforms - 7IM, Aviva, AJ Bell, Quilter', '£200,000', 'no', 'no', 'no', 'no', NULL, NULL, 'Client referral', 'no', NULL, 'no', NULL, 'yes', 'yes', '2% of the first £250k of AUA (CETV), plus 1% of the next £750k, plus 0.50% of any funds over £1m', 'Yes', NULL, NULL, NULL, NULL, 'No', NULL, 'Yes', NULL, 'Yes', NULL, 'No', NULL, NULL, NULL, 'Yes', NULL, 'No', NULL, 'Yes', NULL, 'Yes', 'Yes', 'Yes', NULL, NULL, NULL, '/storage/app/public/signatures/signature_6810d68fa165e.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-04-29 13:39:27', '2025-04-29 13:39:27', NULL, '{\"1\":{\"adviser_name\":null,\"adviser_fca_reference\":null,\"branch\":null,\"adviser_email\":null,\"address\":null,\"date_of_birth\":null}}', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `draft_fpts`
--

CREATE TABLE `draft_fpts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(11) UNSIGNED DEFAULT NULL,
  `creater_id` int(11) DEFAULT NULL,
  `status` enum('pending','active','decline') DEFAULT 'pending',
  `scheme_name` text DEFAULT NULL,
  `contact_name` text DEFAULT NULL,
  `company_name` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `post_code` text DEFAULT NULL,
  `dial_code` text DEFAULT NULL,
  `phone_number` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `regulated_by` text DEFAULT NULL,
  `auth_number` text DEFAULT NULL,
  `initial_fee` text DEFAULT NULL,
  `scheme_establishment` text DEFAULT NULL,
  `date_option` text DEFAULT NULL,
  `date_day` text DEFAULT NULL,
  `annual_fee` text DEFAULT NULL,
  `scheme_anniversary` text DEFAULT NULL,
  `date_option2` text DEFAULT NULL,
  `date2_day` text DEFAULT NULL,
  `percentage_checkbox` text DEFAULT NULL,
  `percentage` text DEFAULT NULL,
  `specific_investments_checkbox` text DEFAULT NULL,
  `specific_investments_list` text DEFAULT NULL,
  `initial_fee_amount1` text DEFAULT NULL,
  `initial_fee_percentage1` text DEFAULT NULL,
  `scheme_establishment_alternative1` text DEFAULT NULL,
  `date_alternative1` text DEFAULT NULL,
  `date_alt_day1` text DEFAULT NULL,
  `scheme_anniversary_alternative1` text DEFAULT NULL,
  `transfer_amount_checkbox1` text DEFAULT NULL,
  `transfer_amount_value1` text DEFAULT NULL,
  `percentage_checkbox_transfer1` text DEFAULT NULL,
  `transfer_percentage_value1` text DEFAULT NULL,
  `transfer_payment1` text DEFAULT NULL,
  `future_terms1` text DEFAULT NULL,
  `print_name_left1` text DEFAULT NULL,
  `signature_1` text DEFAULT NULL,
  `signature_2` text DEFAULT NULL,
  `signature_left` text DEFAULT NULL,
  `signature_right` text DEFAULT NULL,
  `signature_left1` text DEFAULT NULL,
  `date_signed_left_day1` text DEFAULT NULL,
  `print_name_right1` text DEFAULT NULL,
  `signature_right1` text DEFAULT NULL,
  `date_signed_right_day1` text DEFAULT NULL,
  `initial_fee_amount2` text DEFAULT NULL,
  `initial_fee_percentage2` text DEFAULT NULL,
  `scheme_establishment_alternative2` text DEFAULT NULL,
  `specific_date2` text DEFAULT NULL,
  `date_alt_day` text DEFAULT NULL,
  `anniversary_fee2` text DEFAULT NULL,
  `anniversary_fee1` text DEFAULT NULL,
  `scheme_anniversary_alternative2` text DEFAULT NULL,
  `transfer_amount_checkbox` text DEFAULT NULL,
  `transfer_amount_value` text DEFAULT NULL,
  `percentage_checkbox_transfer` text DEFAULT NULL,
  `transfer_percentage_value` text DEFAULT NULL,
  `transfer_payment2` text DEFAULT NULL,
  `future_terms2` text DEFAULT NULL,
  `print_name_left2` text DEFAULT NULL,
  `signature_left2` text DEFAULT NULL,
  `date_signed_left_day2` text DEFAULT NULL,
  `print_name_right2` text DEFAULT NULL,
  `signature_right2` text DEFAULT NULL,
  `date_signed_right_day2` text DEFAULT NULL,
  `print_name_left_additional1` text DEFAULT NULL,
  `signature_left_additional` text DEFAULT NULL,
  `date_signed_left_additional_day3` text DEFAULT NULL,
  `print_name_right_additional` text DEFAULT NULL,
  `chairman_contact_name` text DEFAULT NULL,
  `chairman_firm_name` text DEFAULT NULL,
  `chairman_address_line_1` text DEFAULT NULL,
  `chairman_address_line_2` text DEFAULT NULL,
  `chairman_city` text DEFAULT NULL,
  `chairman_postcode` text DEFAULT NULL,
  `chairman_telephone` text DEFAULT NULL,
  `chairman_email` text DEFAULT NULL,
  `member_true_print_name_1` text DEFAULT NULL,
  `member_true_print_name_2` text DEFAULT NULL,
  `member_true_print_name_3` text DEFAULT NULL,
  `member_true_print_name_4` text DEFAULT NULL,
  `principal_reason_family` text DEFAULT NULL,
  `common_funds_number` text DEFAULT NULL,
  `signature` text DEFAULT NULL,
  `common_funds_investment_fund_1` text DEFAULT NULL,
  `common_funds_print_name_1_1` text DEFAULT NULL,
  `common_funds_print_name_1_2` text DEFAULT NULL,
  `common_funds_print_name_1_3` text DEFAULT NULL,
  `common_funds_print_name_1_4` text DEFAULT NULL,
  `common_funds_reason_for_fund_1` text DEFAULT NULL,
  `common_funds_investment_fund_2` text DEFAULT NULL,
  `common_funds_print_name_2_1` text DEFAULT NULL,
  `common_funds_print_name_2_2` text DEFAULT NULL,
  `common_funds_print_name_2_3` text DEFAULT NULL,
  `common_funds_print_name_2_4` text DEFAULT NULL,
  `common_funds_reason_for_fund_2` text DEFAULT NULL,
  `scheme_adviser_contact_name` text DEFAULT NULL,
  `scheme_adviser_company_name` text DEFAULT NULL,
  `scheme_adviser_address` text DEFAULT NULL,
  `scheme_adviser_address_line_2` text DEFAULT NULL,
  `scheme_adviser_city` text DEFAULT NULL,
  `scheme_adviser_postcode` text DEFAULT NULL,
  `scheme_adviser_telephone_number` text DEFAULT NULL,
  `scheme_adviser_email_address` text DEFAULT NULL,
  `scheme_adviser_regulated_by` text DEFAULT NULL,
  `scheme_adviser_authorization_number` text DEFAULT NULL,
  `scheme_adviser_is_part_of_network` text DEFAULT NULL,
  `scheme_adviser_network_name` text DEFAULT NULL,
  `scheme_adviser_regulated_by_2` text DEFAULT NULL,
  `scheme_adviser_company_authorization_number` text DEFAULT NULL,
  `accountant_details_contact_name` text DEFAULT NULL,
  `accountant_details_firm_name` text DEFAULT NULL,
  `accountant_details_address_line_1` text DEFAULT NULL,
  `accountant_details_address_line_2` text DEFAULT NULL,
  `accountant_details_city` text DEFAULT NULL,
  `accountant_details_postcode` text DEFAULT NULL,
  `accountant_details_telephone_number` text DEFAULT NULL,
  `accountant_details_email_address` text DEFAULT NULL,
  `declaration_signature_1` text DEFAULT NULL,
  `declaration_print_name_1` text DEFAULT NULL,
  `declaration_position_1` text DEFAULT NULL,
  `declaration_day_1` text DEFAULT NULL,
  `declaration_signature_2` text DEFAULT NULL,
  `declaration_print_name_2` text DEFAULT NULL,
  `declaration_position_2` text DEFAULT NULL,
  `declaration_day_2` text DEFAULT NULL,
  `adviser_agrement_initial_fee` text DEFAULT NULL,
  `pay_following_establishment` text DEFAULT NULL,
  `day_1` text DEFAULT NULL,
  `month_1` text DEFAULT NULL,
  `year_1` text DEFAULT NULL,
  `pay_anniversary` text DEFAULT NULL,
  `day_2` text DEFAULT NULL,
  `month_2` text DEFAULT NULL,
  `year_2` text DEFAULT NULL,
  `initial_fee_percentage` text DEFAULT NULL,
  `pay_following_establishment_2` text DEFAULT NULL,
  `day_3` text DEFAULT NULL,
  `month_3` text DEFAULT NULL,
  `year_3` text DEFAULT NULL,
  `percentage_total_fund` text DEFAULT NULL,
  `specific_investments` text DEFAULT NULL,
  `adviser_agrement_initial_fee1` text DEFAULT NULL,
  `adviser_agrement_pay_following_establishment` text DEFAULT NULL,
  `adviser_agrement_day_1` text DEFAULT NULL,
  `adviser_agrement_annual_fee` text DEFAULT NULL,
  `adviser_agrement_pay_anniversary` text DEFAULT NULL,
  `adviser_agrement_day_2` text DEFAULT NULL,
  `adviser_agrement_initial_fee_percentage1` text DEFAULT NULL,
  `adviser_agrement_pay_following_establishment_2` text DEFAULT NULL,
  `adviser_agrement_day_3` text DEFAULT NULL,
  `adviser_agrement_percentage_total_fund` text DEFAULT NULL,
  `adviser_agrement_specific_investments` text DEFAULT NULL,
  `adviser_agrement_specific_investments_list` text DEFAULT NULL,
  `adviser_agrement_initial_fee_percentage` text DEFAULT NULL,
  `emp_contr_emp_contr_regular_contribution` text DEFAULT NULL,
  `adviser_agrement_pay_following_establishment11` text DEFAULT NULL,
  `adviser_agrement_day_11` text DEFAULT NULL,
  `adviser_agrement_pay_anniversary11` text DEFAULT NULL,
  `adviser_agrement_transfer_amount` text DEFAULT NULL,
  `adviser_agrement_percentage_of_transfer` text DEFAULT NULL,
  `adviser_agrement_transfer_payments` text DEFAULT NULL,
  `adviser_agrement_same_terms_apply` text DEFAULT NULL,
  `adviser_agrement_sign_name_left` text DEFAULT NULL,
  `adviser_agrement_sign_name_right` text DEFAULT NULL,
  `adviser_agrement_signature_left` text DEFAULT NULL,
  `adviser_agrement_signature_right` text DEFAULT NULL,
  `adviser_agrement_day_signed_left` text DEFAULT NULL,
  `adviser_agrement_day_signed_right` text DEFAULT NULL,
  `adviser_agrement_month_signed_right` text DEFAULT NULL,
  `adviser_agrement_year_signed_right` text DEFAULT NULL,
  `interim_deed_appointed` text DEFAULT NULL,
  `interim_deed_network_name` text DEFAULT NULL,
  `interim_deed_payment_to_network` text DEFAULT NULL,
  `interim_deed_fees_to_be_paid_by` text DEFAULT NULL,
  `interim_deed_bank_name` text DEFAULT NULL,
  `interim_deed_branch` text DEFAULT NULL,
  `interim_deed_account_number` text DEFAULT NULL,
  `interim_deed_sort_code` text DEFAULT NULL,
  `interim_deed_payment_ref` text DEFAULT NULL,
  `interim_deed_print_name` text DEFAULT NULL,
  `interim_deed_signature` text DEFAULT NULL,
  `interim_deed_position` text DEFAULT NULL,
  `interim_deed_company_stamp` text DEFAULT NULL,
  `interim_deed_date_signed` text DEFAULT NULL,
  `member_questionaire_title` text DEFAULT NULL,
  `member_questionaire_forenames` text DEFAULT NULL,
  `member_questionaire_surname` text DEFAULT NULL,
  `member_questionaire_previous_names` text DEFAULT NULL,
  `member_questionaire_address` text DEFAULT NULL,
  `member_questionaire_county` text DEFAULT NULL,
  `member_questionaire_postcode` text DEFAULT NULL,
  `member_questionaire_time_at_address_years` text DEFAULT NULL,
  `member_questionaire_time_at_address_months` text DEFAULT NULL,
  `member_questionaire_previous_address` text DEFAULT NULL,
  `member_questionaire_previous_county` text DEFAULT NULL,
  `member_questionaire_previous_postcode` text DEFAULT NULL,
  `member_questionaire_telephone_number` text DEFAULT NULL,
  `member_questionaire_email_address` text DEFAULT NULL,
  `member_questionaire_national_insurance_number` text DEFAULT NULL,
  `member_questionaire_taxpayer_reference` text DEFAULT NULL,
  `member_questionaire_occupation` text DEFAULT NULL,
  `member_questionaire_employer_name` text DEFAULT NULL,
  `member_questionaire_dob_day` text DEFAULT NULL,
  `member_questionaire_gender` text DEFAULT NULL,
  `member_questionaire_nationality` text DEFAULT NULL,
  `member_questionaire_marital_status` text DEFAULT NULL,
  `member_questionaire_employment_status` text DEFAULT NULL,
  `member_questionaire_current_occupation` text DEFAULT NULL,
  `member_questionaire_job_title` text DEFAULT NULL,
  `member_questionaire_opted_out` text DEFAULT NULL,
  `member_questionaire_protection` text DEFAULT NULL,
  `member_questionaire_primary_protection` text DEFAULT NULL,
  `member_questionaire_lump_sum_protection` text DEFAULT NULL,
  `member_questionaire_mpaa` text DEFAULT NULL,
  `member_questionaire_mpaa_day` text DEFAULT NULL,
  `entitlement_tax_relief_option` text DEFAULT NULL,
  `financial_que_adviser_same` text DEFAULT NULL,
  `financial_que_contact_name` text DEFAULT NULL,
  `financial_que_company_name` text DEFAULT NULL,
  `financial_que_address` text DEFAULT NULL,
  `financial_que_country` text DEFAULT NULL,
  `financial_que_postcode` text DEFAULT NULL,
  `financial_que_telephone_number` text DEFAULT NULL,
  `financial_que_email_address` text DEFAULT NULL,
  `financial_que_regulated_by` text DEFAULT NULL,
  `financial_que_authorisation_number` text DEFAULT NULL,
  `financial_que_network_name` text DEFAULT NULL,
  `financial_que_network_regulated_by` text DEFAULT NULL,
  `financial_que_company_authorisation_number` text DEFAULT NULL,
  `fund_common_investment_1` text DEFAULT NULL,
  `fund_investment_1` text DEFAULT NULL,
  `fund_common_investment_2` text DEFAULT NULL,
  `fund_investment_2` text DEFAULT NULL,
  `fund_additional_details` text DEFAULT NULL,
  `members_fund_investment_1` text DEFAULT NULL,
  `members_fund_investment_2` text DEFAULT NULL,
  `members_fund_investment_3` text DEFAULT NULL,
  `members_fund_investment_4` text DEFAULT NULL,
  `nomination_beneficiary_1_name` text DEFAULT NULL,
  `nomination_beneficiary_1_relationship` text DEFAULT NULL,
  `nomination_beneficiary_1_percentage` text DEFAULT NULL,
  `nomination_beneficiary_2_name` text DEFAULT NULL,
  `nomination_beneficiary_2_relationship` text DEFAULT NULL,
  `nomination_beneficiary_2_percentage` text DEFAULT NULL,
  `nomination_beneficiary_3_name` text DEFAULT NULL,
  `nomination_beneficiary_3_relationship` text DEFAULT NULL,
  `nomination_beneficiary_3_percentage` text DEFAULT NULL,
  `nomination_charity_1_name` text DEFAULT NULL,
  `nomination_charity_1_percentage` text DEFAULT NULL,
  `nomination_charity_2_name` text DEFAULT NULL,
  `nomination_charity_2_percentage` text DEFAULT NULL,
  `nomination_charity_3_name` text DEFAULT NULL,
  `nomination_charity_3_percentage` text DEFAULT NULL,
  `personal_regular_contribution` text DEFAULT NULL,
  `personal_single_contribution` text DEFAULT NULL,
  `personal_source_of_funds` text DEFAULT NULL,
  `personal_contribution_frequency` text DEFAULT NULL,
  `personal_start_date_day` text DEFAULT NULL,
  `personal_employer_pay` text DEFAULT NULL,
  `questionaries_employer_name` text DEFAULT NULL,
  `questionaries_registered_address` text DEFAULT NULL,
  `questionaries_country` text DEFAULT NULL,
  `questionaries_postcode` text DEFAULT NULL,
  `questionaries_telephone_number` text DEFAULT NULL,
  `questionaries_email_address` text DEFAULT NULL,
  `questionaries_trading_address` text DEFAULT NULL,
  `questionaries_trading_country` text DEFAULT NULL,
  `questionaries_trading_postcode` text DEFAULT NULL,
  `questionaries_employer_status` text DEFAULT NULL,
  `questionaries_nature_of_business` text DEFAULT NULL,
  `questionaries_employer_year_end_day` text DEFAULT NULL,
  `questionaries_registration_number` text DEFAULT NULL,
  `questionaries_employed_since_day` text DEFAULT NULL,
  `questionaries_director_status` text DEFAULT NULL,
  `questionaries_shareholdings` text DEFAULT NULL,
  `emp_contr_regular_contribution` text DEFAULT NULL,
  `emp_contr_single_contribution` text DEFAULT NULL,
  `emp_contr_frequency` text DEFAULT NULL,
  `emp_contr_day` text DEFAULT NULL,
  `empl_dec_signature` text DEFAULT NULL,
  `empl_dec_print_name` text DEFAULT NULL,
  `empl_dec_position` text DEFAULT NULL,
  `empl_dec_day` text DEFAULT NULL,
  `transf_auth_signature` text DEFAULT NULL,
  `transf_auth_print_name` text DEFAULT NULL,
  `transf_auth_plan_scheme_no` text DEFAULT NULL,
  `transf_auth_day` text DEFAULT NULL,
  `trans_plan_member_name` text DEFAULT NULL,
  `trans_plan_telephone_number` text DEFAULT NULL,
  `trans_plan_email_address` text DEFAULT NULL,
  `trans_plan_transfer_scheme_type` text DEFAULT NULL,
  `trans_plan_address` text DEFAULT NULL,
  `trans_plan_postcode` text DEFAULT NULL,
  `trans_plan_country` text DEFAULT NULL,
  `trans_plan_scheme_type` text DEFAULT NULL,
  `trans_plan_plan_scheme_name` text DEFAULT NULL,
  `trans_plan_scheme_number` text DEFAULT NULL,
  `trans_plan_reference` text DEFAULT NULL,
  `trans_plan_value_of_fund` text DEFAULT NULL,
  `trans_plan_wish_transfer` text DEFAULT NULL,
  `trans_plan_important_to_transfer` text DEFAULT NULL,
  `trans_plan_existing_scheme` text DEFAULT NULL,
  `trans_plan_block_transfer` text DEFAULT NULL,
  `member_consent_contact_me` text DEFAULT NULL,
  `member_consent_pass_contact` text DEFAULT NULL,
  `member_consent_prefer_email` text DEFAULT NULL,
  `member_consent_prefer_post` text DEFAULT NULL,
  `member_consent_signature` text DEFAULT NULL,
  `member_consent_print_name` text DEFAULT NULL,
  `member_consent_date_day` text DEFAULT NULL,
  `date_alternative2` text DEFAULT NULL,
  `member_declra_waive_rights` text DEFAULT NULL,
  `member_declra_responsibility_declaration` text DEFAULT NULL,
  `member_declra_confirm_information` text DEFAULT NULL,
  `member_declra_notify_information` text DEFAULT NULL,
  `member_declra_consent_declaration` text DEFAULT NULL,
  `member_declra_signature` text DEFAULT NULL,
  `member_declra_print_name` text DEFAULT NULL,
  `member_declra_date_day` text DEFAULT NULL,
  `member_declra_waive_cancellation_rights` text DEFAULT NULL,
  `member_declra_parental_responsibility` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `fpt_signature` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `draft_fpts`
--

INSERT INTO `draft_fpts` (`id`, `user_id`, `creater_id`, `status`, `scheme_name`, `contact_name`, `company_name`, `address`, `country`, `post_code`, `dial_code`, `phone_number`, `email`, `regulated_by`, `auth_number`, `initial_fee`, `scheme_establishment`, `date_option`, `date_day`, `annual_fee`, `scheme_anniversary`, `date_option2`, `date2_day`, `percentage_checkbox`, `percentage`, `specific_investments_checkbox`, `specific_investments_list`, `initial_fee_amount1`, `initial_fee_percentage1`, `scheme_establishment_alternative1`, `date_alternative1`, `date_alt_day1`, `scheme_anniversary_alternative1`, `transfer_amount_checkbox1`, `transfer_amount_value1`, `percentage_checkbox_transfer1`, `transfer_percentage_value1`, `transfer_payment1`, `future_terms1`, `print_name_left1`, `signature_1`, `signature_2`, `signature_left`, `signature_right`, `signature_left1`, `date_signed_left_day1`, `print_name_right1`, `signature_right1`, `date_signed_right_day1`, `initial_fee_amount2`, `initial_fee_percentage2`, `scheme_establishment_alternative2`, `specific_date2`, `date_alt_day`, `anniversary_fee2`, `anniversary_fee1`, `scheme_anniversary_alternative2`, `transfer_amount_checkbox`, `transfer_amount_value`, `percentage_checkbox_transfer`, `transfer_percentage_value`, `transfer_payment2`, `future_terms2`, `print_name_left2`, `signature_left2`, `date_signed_left_day2`, `print_name_right2`, `signature_right2`, `date_signed_right_day2`, `print_name_left_additional1`, `signature_left_additional`, `date_signed_left_additional_day3`, `print_name_right_additional`, `chairman_contact_name`, `chairman_firm_name`, `chairman_address_line_1`, `chairman_address_line_2`, `chairman_city`, `chairman_postcode`, `chairman_telephone`, `chairman_email`, `member_true_print_name_1`, `member_true_print_name_2`, `member_true_print_name_3`, `member_true_print_name_4`, `principal_reason_family`, `common_funds_number`, `signature`, `common_funds_investment_fund_1`, `common_funds_print_name_1_1`, `common_funds_print_name_1_2`, `common_funds_print_name_1_3`, `common_funds_print_name_1_4`, `common_funds_reason_for_fund_1`, `common_funds_investment_fund_2`, `common_funds_print_name_2_1`, `common_funds_print_name_2_2`, `common_funds_print_name_2_3`, `common_funds_print_name_2_4`, `common_funds_reason_for_fund_2`, `scheme_adviser_contact_name`, `scheme_adviser_company_name`, `scheme_adviser_address`, `scheme_adviser_address_line_2`, `scheme_adviser_city`, `scheme_adviser_postcode`, `scheme_adviser_telephone_number`, `scheme_adviser_email_address`, `scheme_adviser_regulated_by`, `scheme_adviser_authorization_number`, `scheme_adviser_is_part_of_network`, `scheme_adviser_network_name`, `scheme_adviser_regulated_by_2`, `scheme_adviser_company_authorization_number`, `accountant_details_contact_name`, `accountant_details_firm_name`, `accountant_details_address_line_1`, `accountant_details_address_line_2`, `accountant_details_city`, `accountant_details_postcode`, `accountant_details_telephone_number`, `accountant_details_email_address`, `declaration_signature_1`, `declaration_print_name_1`, `declaration_position_1`, `declaration_day_1`, `declaration_signature_2`, `declaration_print_name_2`, `declaration_position_2`, `declaration_day_2`, `adviser_agrement_initial_fee`, `pay_following_establishment`, `day_1`, `month_1`, `year_1`, `pay_anniversary`, `day_2`, `month_2`, `year_2`, `initial_fee_percentage`, `pay_following_establishment_2`, `day_3`, `month_3`, `year_3`, `percentage_total_fund`, `specific_investments`, `adviser_agrement_initial_fee1`, `adviser_agrement_pay_following_establishment`, `adviser_agrement_day_1`, `adviser_agrement_annual_fee`, `adviser_agrement_pay_anniversary`, `adviser_agrement_day_2`, `adviser_agrement_initial_fee_percentage1`, `adviser_agrement_pay_following_establishment_2`, `adviser_agrement_day_3`, `adviser_agrement_percentage_total_fund`, `adviser_agrement_specific_investments`, `adviser_agrement_specific_investments_list`, `adviser_agrement_initial_fee_percentage`, `emp_contr_emp_contr_regular_contribution`, `adviser_agrement_pay_following_establishment11`, `adviser_agrement_day_11`, `adviser_agrement_pay_anniversary11`, `adviser_agrement_transfer_amount`, `adviser_agrement_percentage_of_transfer`, `adviser_agrement_transfer_payments`, `adviser_agrement_same_terms_apply`, `adviser_agrement_sign_name_left`, `adviser_agrement_sign_name_right`, `adviser_agrement_signature_left`, `adviser_agrement_signature_right`, `adviser_agrement_day_signed_left`, `adviser_agrement_day_signed_right`, `adviser_agrement_month_signed_right`, `adviser_agrement_year_signed_right`, `interim_deed_appointed`, `interim_deed_network_name`, `interim_deed_payment_to_network`, `interim_deed_fees_to_be_paid_by`, `interim_deed_bank_name`, `interim_deed_branch`, `interim_deed_account_number`, `interim_deed_sort_code`, `interim_deed_payment_ref`, `interim_deed_print_name`, `interim_deed_signature`, `interim_deed_position`, `interim_deed_company_stamp`, `interim_deed_date_signed`, `member_questionaire_title`, `member_questionaire_forenames`, `member_questionaire_surname`, `member_questionaire_previous_names`, `member_questionaire_address`, `member_questionaire_county`, `member_questionaire_postcode`, `member_questionaire_time_at_address_years`, `member_questionaire_time_at_address_months`, `member_questionaire_previous_address`, `member_questionaire_previous_county`, `member_questionaire_previous_postcode`, `member_questionaire_telephone_number`, `member_questionaire_email_address`, `member_questionaire_national_insurance_number`, `member_questionaire_taxpayer_reference`, `member_questionaire_occupation`, `member_questionaire_employer_name`, `member_questionaire_dob_day`, `member_questionaire_gender`, `member_questionaire_nationality`, `member_questionaire_marital_status`, `member_questionaire_employment_status`, `member_questionaire_current_occupation`, `member_questionaire_job_title`, `member_questionaire_opted_out`, `member_questionaire_protection`, `member_questionaire_primary_protection`, `member_questionaire_lump_sum_protection`, `member_questionaire_mpaa`, `member_questionaire_mpaa_day`, `entitlement_tax_relief_option`, `financial_que_adviser_same`, `financial_que_contact_name`, `financial_que_company_name`, `financial_que_address`, `financial_que_country`, `financial_que_postcode`, `financial_que_telephone_number`, `financial_que_email_address`, `financial_que_regulated_by`, `financial_que_authorisation_number`, `financial_que_network_name`, `financial_que_network_regulated_by`, `financial_que_company_authorisation_number`, `fund_common_investment_1`, `fund_investment_1`, `fund_common_investment_2`, `fund_investment_2`, `fund_additional_details`, `members_fund_investment_1`, `members_fund_investment_2`, `members_fund_investment_3`, `members_fund_investment_4`, `nomination_beneficiary_1_name`, `nomination_beneficiary_1_relationship`, `nomination_beneficiary_1_percentage`, `nomination_beneficiary_2_name`, `nomination_beneficiary_2_relationship`, `nomination_beneficiary_2_percentage`, `nomination_beneficiary_3_name`, `nomination_beneficiary_3_relationship`, `nomination_beneficiary_3_percentage`, `nomination_charity_1_name`, `nomination_charity_1_percentage`, `nomination_charity_2_name`, `nomination_charity_2_percentage`, `nomination_charity_3_name`, `nomination_charity_3_percentage`, `personal_regular_contribution`, `personal_single_contribution`, `personal_source_of_funds`, `personal_contribution_frequency`, `personal_start_date_day`, `personal_employer_pay`, `questionaries_employer_name`, `questionaries_registered_address`, `questionaries_country`, `questionaries_postcode`, `questionaries_telephone_number`, `questionaries_email_address`, `questionaries_trading_address`, `questionaries_trading_country`, `questionaries_trading_postcode`, `questionaries_employer_status`, `questionaries_nature_of_business`, `questionaries_employer_year_end_day`, `questionaries_registration_number`, `questionaries_employed_since_day`, `questionaries_director_status`, `questionaries_shareholdings`, `emp_contr_regular_contribution`, `emp_contr_single_contribution`, `emp_contr_frequency`, `emp_contr_day`, `empl_dec_signature`, `empl_dec_print_name`, `empl_dec_position`, `empl_dec_day`, `transf_auth_signature`, `transf_auth_print_name`, `transf_auth_plan_scheme_no`, `transf_auth_day`, `trans_plan_member_name`, `trans_plan_telephone_number`, `trans_plan_email_address`, `trans_plan_transfer_scheme_type`, `trans_plan_address`, `trans_plan_postcode`, `trans_plan_country`, `trans_plan_scheme_type`, `trans_plan_plan_scheme_name`, `trans_plan_scheme_number`, `trans_plan_reference`, `trans_plan_value_of_fund`, `trans_plan_wish_transfer`, `trans_plan_important_to_transfer`, `trans_plan_existing_scheme`, `trans_plan_block_transfer`, `member_consent_contact_me`, `member_consent_pass_contact`, `member_consent_prefer_email`, `member_consent_prefer_post`, `member_consent_signature`, `member_consent_print_name`, `member_consent_date_day`, `date_alternative2`, `member_declra_waive_rights`, `member_declra_responsibility_declaration`, `member_declra_confirm_information`, `member_declra_notify_information`, `member_declra_consent_declaration`, `member_declra_signature`, `member_declra_print_name`, `member_declra_date_day`, `member_declra_waive_cancellation_rights`, `member_declra_parental_responsibility`, `notes`, `fpt_signature`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, NULL, 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-10 07:32:38', '2025-03-10 07:32:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `draft_members`
--

CREATE TABLE `draft_members` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` bigint(11) UNSIGNED DEFAULT NULL,
  `creater_id` bigint(11) UNSIGNED DEFAULT NULL,
  `title` text DEFAULT NULL,
  `forename` text DEFAULT NULL,
  `surname` text DEFAULT NULL,
  `previous_name` text DEFAULT NULL,
  `from_date` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `postcode` text DEFAULT NULL,
  `telephone` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `homeowner` text DEFAULT NULL,
  `previous_address` text DEFAULT NULL,
  `ni_reason` text DEFAULT NULL,
  `nationality` text DEFAULT NULL,
  `ni_number` text DEFAULT NULL,
  `dob` text DEFAULT NULL,
  `pob` text DEFAULT NULL,
  `dual_nationality` text DEFAULT NULL,
  `nationality_countries` text DEFAULT NULL,
  `applicable_protection` text DEFAULT NULL,
  `dependents` text DEFAULT NULL,
  `marital_status` text DEFAULT NULL,
  `spouse_dob` text DEFAULT NULL,
  `pension_order` text DEFAULT NULL,
  `occupation` text DEFAULT NULL,
  `status_postcode` text DEFAULT NULL,
  `recent_occupation` text DEFAULT NULL,
  `employment_status` text DEFAULT NULL,
  `opted_out` text DEFAULT NULL,
  `pension_protection` text DEFAULT NULL,
  `annual_allowance` text DEFAULT NULL,
  `first_payment_date` text DEFAULT NULL,
  `tax_relief` text DEFAULT NULL,
  `income_employment` text DEFAULT NULL,
  `income_pension` text DEFAULT NULL,
  `income_savings` text DEFAULT NULL,
  `income_gifted` text DEFAULT NULL,
  `income_lottery` text DEFAULT NULL,
  `income_property` text DEFAULT NULL,
  `income_inheritance` text DEFAULT NULL,
  `income_divorce` text DEFAULT NULL,
  `income_other` text DEFAULT NULL,
  `assets_outside_uk` text DEFAULT NULL,
  `contribute_regular_contribution` text DEFAULT NULL,
  `contribute_single_contribution` text DEFAULT NULL,
  `payment_frequency` text DEFAULT NULL,
  `employer_pay` text DEFAULT NULL,
  `employer_name` text DEFAULT NULL,
  `registered_office` text DEFAULT NULL,
  `employee_postcode` text DEFAULT NULL,
  `telephone_number` text DEFAULT NULL,
  `employee_contact_name` text DEFAULT NULL,
  `email_address` text DEFAULT NULL,
  `trading_address` text DEFAULT NULL,
  `trading_postcode` text DEFAULT NULL,
  `fax_number` text DEFAULT NULL,
  `additional_telephone` text DEFAULT NULL,
  `regular_contribution` text DEFAULT NULL,
  `single_contribution` text DEFAULT NULL,
  `start_date` text DEFAULT NULL,
  `signature` text DEFAULT NULL,
  `print_name` text DEFAULT NULL,
  `position` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `financial_contact_name` text DEFAULT NULL,
  `financial_company_name` text DEFAULT NULL,
  `street_address` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `financial_postcode` text DEFAULT NULL,
  `financial_telephone_number` text DEFAULT NULL,
  `financial_fax_number` text DEFAULT NULL,
  `financial_email_address` text DEFAULT NULL,
  `regulated_by` text DEFAULT NULL,
  `authorisation_number` text DEFAULT NULL,
  `network_status` text DEFAULT NULL,
  `network_name` text DEFAULT NULL,
  `regulated_by_second` text DEFAULT NULL,
  `company_authorisation_number` text DEFAULT NULL,
  `initial_fees` text DEFAULT NULL,
  `frequency` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `relationship` text DEFAULT NULL,
  `percentage` text DEFAULT NULL,
  `type` text DEFAULT NULL,
  `investment_option` text DEFAULT NULL,
  `contact_name` text DEFAULT NULL,
  `investment_company_name` text DEFAULT NULL,
  `investment_address` text DEFAULT NULL,
  `investment_postcode` text DEFAULT NULL,
  `investment_telephone_number` text DEFAULT NULL,
  `investment_fax_number` text DEFAULT NULL,
  `investment_email_address` text DEFAULT NULL,
  `plan_type` text DEFAULT NULL,
  `take_benefits_soon` text DEFAULT NULL,
  `benefits_method` text DEFAULT NULL,
  `benefit_start_date` text DEFAULT NULL,
  `approx_amount` text DEFAULT NULL,
  `provider_name` text DEFAULT NULL,
  `other_benefits_address` text DEFAULT NULL,
  `other_benefits_postcode` text DEFAULT NULL,
  `other_telephone_number` text DEFAULT NULL,
  `other_fax_number` text DEFAULT NULL,
  `other_email_address` text DEFAULT NULL,
  `plan_scheme_type` text DEFAULT NULL,
  `is_occupational_scheme` text DEFAULT NULL,
  `plan_scheme_name` text DEFAULT NULL,
  `pension_scheme_tax_reference` text DEFAULT NULL,
  `fund_value` text DEFAULT NULL,
  `full_value_scheme` text DEFAULT NULL,
  `funds_crystallised` text DEFAULT NULL,
  `crystallised_method` text DEFAULT NULL,
  `defined_benefit` text DEFAULT NULL,
  `transfer_assets` text DEFAULT NULL,
  `bankruptcy_orders` text DEFAULT NULL,
  `scheme_protection` text DEFAULT NULL,
  `annuity_guarantee` text DEFAULT NULL,
  `block_transfer` text DEFAULT NULL,
  `funded_transfer` text DEFAULT NULL,
  `ceding_scheme` text DEFAULT NULL,
  `employer_contributions` text DEFAULT NULL,
  `personal_bank_payment` text DEFAULT NULL,
  `funds_outside_uk` text DEFAULT NULL,
  `other_signature` text DEFAULT NULL,
  `other_print_name` text DEFAULT NULL,
  `other_date` text DEFAULT NULL,
  `contact_consent` text DEFAULT NULL,
  `passing_contact_consent` text DEFAULT NULL,
  `contact_method` text DEFAULT NULL,
  `signature_consent` text DEFAULT NULL,
  `signatur_print_name` text DEFAULT NULL,
  `dependents_count` text DEFAULT NULL,
  `signature_date` text DEFAULT NULL,
  `signature_declaration` text DEFAULT NULL,
  `print_name_declaration` text DEFAULT NULL,
  `position_declaration` text DEFAULT NULL,
  `declaration_date` text DEFAULT NULL,
  `infor_company_name` text DEFAULT NULL,
  `entity_type` text DEFAULT NULL,
  `registered_address` text DEFAULT NULL,
  `registered_number` text DEFAULT NULL,
  `infor_country` text DEFAULT NULL,
  `company_info_postcode` text DEFAULT NULL,
  `nature_of_business` text DEFAULT NULL,
  `individual_verification` text DEFAULT NULL,
  `beneficial_verification` text DEFAULT NULL,
  `standard_verification` text DEFAULT NULL,
  `confirmation_letter` text DEFAULT NULL,
  `open_account` text DEFAULT NULL,
  `name_of_regulated_firm` text DEFAULT NULL,
  `regulator_name_reference` text DEFAULT NULL,
  `regulated_individual_name` text DEFAULT NULL,
  `regulated_individual_reference` text DEFAULT NULL,
  `part_f_signature` text DEFAULT NULL,
  `regulated_name` text DEFAULT NULL,
  `regulated_position` text DEFAULT NULL,
  `regulated_date` text DEFAULT NULL,
  `applicant_name` text DEFAULT NULL,
  `application_dob` text DEFAULT NULL,
  `applicant_address` text DEFAULT NULL,
  `application_country` text DEFAULT NULL,
  `applicant_info_postcode` text DEFAULT NULL,
  `changed_address` text DEFAULT NULL,
  `previous_country` text DEFAULT NULL,
  `previous_postcode` text DEFAULT NULL,
  `benefit_continuation` text DEFAULT NULL,
  `regulator_firm_name` text DEFAULT NULL,
  `regulator_reference` text DEFAULT NULL,
  `regulated_cer_individual_name` text DEFAULT NULL,
  `regulated_certification_individual_reference` text DEFAULT NULL,
  `certification_signature` text DEFAULT NULL,
  `certification_name` text DEFAULT NULL,
  `certification_position` text DEFAULT NULL,
  `certification_date` text DEFAULT NULL,
  `defined_fee` text DEFAULT NULL,
  `annual_fee_defined` text DEFAULT NULL,
  `date_fee` text DEFAULT NULL,
  `percentage_fund` text DEFAULT NULL,
  `annual_fee_fund` text DEFAULT NULL,
  `date_fund` text DEFAULT NULL,
  `gross_contribution` text DEFAULT NULL,
  `annual_fee_gross` text DEFAULT NULL,
  `date_gross` text DEFAULT NULL,
  `transfer_value` text DEFAULT NULL,
  `fee_transfer` text DEFAULT NULL,
  `payment_received` text DEFAULT NULL,
  `future_transfers` text DEFAULT NULL,
  `signature_member` text DEFAULT NULL,
  `print_name_member` text DEFAULT NULL,
  `date_member` text DEFAULT NULL,
  `adviser_network` text DEFAULT NULL,
  `name_of_network` text DEFAULT NULL,
  `network_payment` text DEFAULT NULL,
  `bank_name` text DEFAULT NULL,
  `branch` text DEFAULT NULL,
  `account_name` text DEFAULT NULL,
  `account_number` text DEFAULT NULL,
  `sort_code` text DEFAULT NULL,
  `signature_adviser` text DEFAULT NULL,
  `signature_segnature` text DEFAULT NULL,
  `name_adviser` text DEFAULT NULL,
  `position_adviser` text DEFAULT NULL,
  `date_adviser` text DEFAULT NULL,
  `company_stamp` text DEFAULT NULL,
  `pension_scheme_type` text DEFAULT NULL,
  `pension_scheme_name` text DEFAULT NULL,
  `pension_provider_name` text DEFAULT NULL,
  `professional_trustee_address` text DEFAULT NULL,
  `scheme_admin_address` text DEFAULT NULL,
  `employer_pay_premiums` text DEFAULT NULL,
  `hmrc_registration_number` text DEFAULT NULL,
  `alt_scheme_admin_address` text DEFAULT NULL,
  `statements_required` text DEFAULT NULL,
  `member_title` text DEFAULT NULL,
  `first_name` text DEFAULT NULL,
  `middle_name` text DEFAULT NULL,
  `member_surname` text DEFAULT NULL,
  `date_of_birth` text DEFAULT NULL,
  `tanee_member_gender` text DEFAULT NULL,
  `member_nationality` text DEFAULT NULL,
  `country_of_birth` text DEFAULT NULL,
  `home_telephone_number` text DEFAULT NULL,
  `mobile_number` text DEFAULT NULL,
  `member_email_address` text DEFAULT NULL,
  `current_address` text DEFAULT NULL,
  `date_moved_in` text DEFAULT NULL,
  `member_statements_required` text DEFAULT NULL,
  `is_member_trustee` text DEFAULT NULL,
  `is_online_banking_required` text DEFAULT NULL,
  `sipp_ssas_account` text DEFAULT NULL,
  `cheque_book_required` text DEFAULT NULL,
  `fixed_term_savings_sipp_ssas_account` text DEFAULT NULL,
  `assets_details` text DEFAULT NULL,
  `amount_to_be_deposited` text DEFAULT NULL,
  `benefits_future` text DEFAULT NULL,
  `term_months` text DEFAULT NULL,
  `professional_trustee_only` text DEFAULT NULL,
  `authorised_signatories` text DEFAULT NULL,
  `signing_instructions` text DEFAULT NULL,
  `fraud_prevention` text DEFAULT NULL,
  `declaration` text DEFAULT NULL,
  `certification` text DEFAULT NULL,
  `trustee_name` text DEFAULT NULL,
  `trustee_signature` text DEFAULT NULL,
  `trustee_date` text DEFAULT NULL,
  `company_name` text DEFAULT NULL,
  `company_address` text DEFAULT NULL,
  `company_post_code` text DEFAULT NULL,
  `company_telephone` text DEFAULT NULL,
  `contact_person` text DEFAULT NULL,
  `contact_email` text DEFAULT NULL,
  `part_one_surname` text DEFAULT NULL,
  `given_name` text DEFAULT NULL,
  `additional_name` text DEFAULT NULL,
  `honorific_title` text DEFAULT NULL,
  `part_one_gender` text DEFAULT NULL,
  `home_address` text DEFAULT NULL,
  `locality` text DEFAULT NULL,
  `zip_code` text DEFAULT NULL,
  `region` text DEFAULT NULL,
  `nation` text DEFAULT NULL,
  `birth_date` text DEFAULT NULL,
  `birthplace_city` text DEFAULT NULL,
  `birthplace_nation` text DEFAULT NULL,
  `tax_residence_country` text DEFAULT NULL,
  `tin_number` text DEFAULT NULL,
  `tin_reason` text DEFAULT NULL,
  `reason_b_explanation` text DEFAULT NULL,
  `tax_residence_more_than_three` text DEFAULT NULL,
  `confirm_all_residences` text DEFAULT NULL,
  `us_person` text DEFAULT NULL,
  `residency_mismatch_reason` text DEFAULT NULL,
  `additional_details` text DEFAULT NULL,
  `part_four_signature` text DEFAULT NULL,
  `signature_print_name` text DEFAULT NULL,
  `sign_date` date DEFAULT NULL,
  `capacity` text DEFAULT NULL,
  `protection_type` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`protection_type`)),
  `beneficiary_name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`beneficiary_name`)),
  `charity_name` text DEFAULT NULL,
  `charity_percentage` text DEFAULT NULL,
  `investment_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`investment_details`)),
  `controller_names` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`controller_names`)),
  `controller_dobs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`controller_dobs`)),
  `beneficial_owner_names` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`beneficial_owner_names`)),
  `beneficiary_dob` text DEFAULT NULL,
  `beneficiary_address` text DEFAULT NULL,
  `enhanced_protection` text DEFAULT NULL,
  `beneficial_owner_dobs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`beneficial_owner_dobs`)),
  `privacy_print_name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`privacy_print_name`)),
  `privacy_signature` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`privacy_signature`)),
  `privacy_position` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`privacy_position`)),
  `privacy_date` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`privacy_date`)),
  `funds_deposited_by` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`funds_deposited_by`)),
  `fees_paid_by` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`fees_paid_by`)),
  `status` enum('active','pending','decline') NOT NULL DEFAULT 'active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `draft_members`
--

INSERT INTO `draft_members` (`id`, `role`, `creater_id`, `title`, `forename`, `surname`, `previous_name`, `from_date`, `address`, `country`, `postcode`, `telephone`, `email`, `gender`, `homeowner`, `previous_address`, `ni_reason`, `nationality`, `ni_number`, `dob`, `pob`, `dual_nationality`, `nationality_countries`, `applicable_protection`, `dependents`, `marital_status`, `spouse_dob`, `pension_order`, `occupation`, `status_postcode`, `recent_occupation`, `employment_status`, `opted_out`, `pension_protection`, `annual_allowance`, `first_payment_date`, `tax_relief`, `income_employment`, `income_pension`, `income_savings`, `income_gifted`, `income_lottery`, `income_property`, `income_inheritance`, `income_divorce`, `income_other`, `assets_outside_uk`, `contribute_regular_contribution`, `contribute_single_contribution`, `payment_frequency`, `employer_pay`, `employer_name`, `registered_office`, `employee_postcode`, `telephone_number`, `employee_contact_name`, `email_address`, `trading_address`, `trading_postcode`, `fax_number`, `additional_telephone`, `regular_contribution`, `single_contribution`, `start_date`, `signature`, `print_name`, `position`, `date`, `financial_contact_name`, `financial_company_name`, `street_address`, `city`, `financial_postcode`, `financial_telephone_number`, `financial_fax_number`, `financial_email_address`, `regulated_by`, `authorisation_number`, `network_status`, `network_name`, `regulated_by_second`, `company_authorisation_number`, `initial_fees`, `frequency`, `name`, `relationship`, `percentage`, `type`, `investment_option`, `contact_name`, `investment_company_name`, `investment_address`, `investment_postcode`, `investment_telephone_number`, `investment_fax_number`, `investment_email_address`, `plan_type`, `take_benefits_soon`, `benefits_method`, `benefit_start_date`, `approx_amount`, `provider_name`, `other_benefits_address`, `other_benefits_postcode`, `other_telephone_number`, `other_fax_number`, `other_email_address`, `plan_scheme_type`, `is_occupational_scheme`, `plan_scheme_name`, `pension_scheme_tax_reference`, `fund_value`, `full_value_scheme`, `funds_crystallised`, `crystallised_method`, `defined_benefit`, `transfer_assets`, `bankruptcy_orders`, `scheme_protection`, `annuity_guarantee`, `block_transfer`, `funded_transfer`, `ceding_scheme`, `employer_contributions`, `personal_bank_payment`, `funds_outside_uk`, `other_signature`, `other_print_name`, `other_date`, `contact_consent`, `passing_contact_consent`, `contact_method`, `signature_consent`, `signatur_print_name`, `dependents_count`, `signature_date`, `signature_declaration`, `print_name_declaration`, `position_declaration`, `declaration_date`, `infor_company_name`, `entity_type`, `registered_address`, `registered_number`, `infor_country`, `company_info_postcode`, `nature_of_business`, `individual_verification`, `beneficial_verification`, `standard_verification`, `confirmation_letter`, `open_account`, `name_of_regulated_firm`, `regulator_name_reference`, `regulated_individual_name`, `regulated_individual_reference`, `part_f_signature`, `regulated_name`, `regulated_position`, `regulated_date`, `applicant_name`, `application_dob`, `applicant_address`, `application_country`, `applicant_info_postcode`, `changed_address`, `previous_country`, `previous_postcode`, `benefit_continuation`, `regulator_firm_name`, `regulator_reference`, `regulated_cer_individual_name`, `regulated_certification_individual_reference`, `certification_signature`, `certification_name`, `certification_position`, `certification_date`, `defined_fee`, `annual_fee_defined`, `date_fee`, `percentage_fund`, `annual_fee_fund`, `date_fund`, `gross_contribution`, `annual_fee_gross`, `date_gross`, `transfer_value`, `fee_transfer`, `payment_received`, `future_transfers`, `signature_member`, `print_name_member`, `date_member`, `adviser_network`, `name_of_network`, `network_payment`, `bank_name`, `branch`, `account_name`, `account_number`, `sort_code`, `signature_adviser`, `signature_segnature`, `name_adviser`, `position_adviser`, `date_adviser`, `company_stamp`, `pension_scheme_type`, `pension_scheme_name`, `pension_provider_name`, `professional_trustee_address`, `scheme_admin_address`, `employer_pay_premiums`, `hmrc_registration_number`, `alt_scheme_admin_address`, `statements_required`, `member_title`, `first_name`, `middle_name`, `member_surname`, `date_of_birth`, `tanee_member_gender`, `member_nationality`, `country_of_birth`, `home_telephone_number`, `mobile_number`, `member_email_address`, `current_address`, `date_moved_in`, `member_statements_required`, `is_member_trustee`, `is_online_banking_required`, `sipp_ssas_account`, `cheque_book_required`, `fixed_term_savings_sipp_ssas_account`, `assets_details`, `amount_to_be_deposited`, `benefits_future`, `term_months`, `professional_trustee_only`, `authorised_signatories`, `signing_instructions`, `fraud_prevention`, `declaration`, `certification`, `trustee_name`, `trustee_signature`, `trustee_date`, `company_name`, `company_address`, `company_post_code`, `company_telephone`, `contact_person`, `contact_email`, `part_one_surname`, `given_name`, `additional_name`, `honorific_title`, `part_one_gender`, `home_address`, `locality`, `zip_code`, `region`, `nation`, `birth_date`, `birthplace_city`, `birthplace_nation`, `tax_residence_country`, `tin_number`, `tin_reason`, `reason_b_explanation`, `tax_residence_more_than_three`, `confirm_all_residences`, `us_person`, `residency_mismatch_reason`, `additional_details`, `part_four_signature`, `signature_print_name`, `sign_date`, `capacity`, `protection_type`, `beneficiary_name`, `charity_name`, `charity_percentage`, `investment_details`, `controller_names`, `controller_dobs`, `beneficial_owner_names`, `beneficiary_dob`, `beneficiary_address`, `enhanced_protection`, `beneficial_owner_dobs`, `privacy_print_name`, `privacy_signature`, `privacy_position`, `privacy_date`, `funds_deposited_by`, `fees_paid_by`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Mr.', 'sami', 'Espinoza', 'Desirae Oneil', '2021-10-20', 'Ullamco enim volupta', 'Burmese', 'Odit corporis sed et', '+1 (119) 658-6736', 'xipituda@mailinator.com', '\"Male\"', 'Yes', 'Sed incidunt cumque', 'Error non nostrud au', 'Bulgarian', '253', '2015-09-16', 'Sint incidunt est e', 'No', 'Vel beatae labore ip', NULL, 'Yes', '\"separated\"', '1997-09-21', 'Yes', 'Facilis ad eligendi', 'Voluptatem molestiae', 'Do facere in do esse', 'other', NULL, 'Yes', 'Yes', '2006-11-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[null]', '[null]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[null]', '[null]', '[null]', '[null]', '[null]', '[null]', 'null', 'null', '[null]', '[null]', '[null]', '[null]', '[null]', '[\"Yes\"]', '[\"Yes\"]', '[\"Yes\"]', 'null', 'null', 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[null]', 'null', '[null]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mr', 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', '[null]', '[null,null,null]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', '[null]', '[null]', '[null]', 'null', '[null]', '[null]', '[null]', NULL, NULL, NULL, '[null]', '[null]', 'null', '[null]', '[null]', 'null', 'null', 'pending', NULL, '2025-03-10 07:32:23', '2025-03-10 07:32:23');

-- --------------------------------------------------------

--
-- Table structure for table `draft_offshores`
--

CREATE TABLE `draft_offshores` (
  `id` int(10) UNSIGNED NOT NULL,
  `selected_adviser_id` bigint(20) DEFAULT NULL,
  `creater_id` int(11) DEFAULT NULL,
  `company_name` text DEFAULT NULL,
  `trading_as` text DEFAULT NULL,
  `type` text DEFAULT NULL,
  `other_details` text DEFAULT NULL,
  `main_contact` text DEFAULT NULL,
  `additional_details` text DEFAULT NULL,
  `surname_surname` text DEFAULT NULL,
  `forename` text DEFAULT NULL,
  `previous_names` text DEFAULT NULL,
  `registered_address` text DEFAULT NULL,
  `registered_country` text DEFAULT NULL,
  `registered_post_code` text DEFAULT NULL,
  `physical_address` text DEFAULT NULL,
  `physical_country` text DEFAULT NULL,
  `physical_post_code` text DEFAULT NULL,
  `office_number` text DEFAULT NULL,
  `direct_line` text DEFAULT NULL,
  `mobile_number` text DEFAULT NULL,
  `email_address` text DEFAULT NULL,
  `website` text DEFAULT NULL,
  `financial_adviser` text DEFAULT NULL,
  `insurance_broker` text DEFAULT NULL,
  `asset_manager` text DEFAULT NULL,
  `accountant` text DEFAULT NULL,
  `tax_adviser` text DEFAULT NULL,
  `lawyer` text DEFAULT NULL,
  `other_business_activity` text DEFAULT NULL,
  `other_business_specify` text DEFAULT NULL,
  `licensing_body` text DEFAULT NULL,
  `licensing_reference` text DEFAULT NULL,
  `restrictions` text DEFAULT NULL,
  `restrictions_imposed` text DEFAULT NULL,
  `insurance` text DEFAULT NULL,
  `investment` text DEFAULT NULL,
  `regulatory_visit` text DEFAULT NULL,
  `date_follow` text DEFAULT NULL,
  `areas_review` text DEFAULT NULL,
  `highlighted_review` text DEFAULT NULL,
  `percentage_breakdown` text DEFAULT NULL,
  `professional_indemnity` text DEFAULT NULL,
  `cyber_insurance` text DEFAULT NULL,
  `face_to_face` text DEFAULT NULL,
  `non_face_policy` text DEFAULT NULL,
  `high_risk` text DEFAULT NULL,
  `standard_risk` text DEFAULT NULL,
  `low_risk` text DEFAULT NULL,
  `sanctioned` text DEFAULT NULL,
  `refer` text DEFAULT NULL,
  `client_risk` text DEFAULT NULL,
  `kyc_revisit` text DEFAULT NULL,
  `accept_peps` text DEFAULT NULL,
  `pep_policy` text DEFAULT NULL,
  `due_diligence` text DEFAULT NULL,
  `provide_details` text DEFAULT NULL,
  `collectDetails` text DEFAULT NULL,
  `writtenPolicies` text DEFAULT NULL,
  `reviewDocuments` text DEFAULT NULL,
  `updatedDocuments` text DEFAULT NULL,
  `amlPolicies` text DEFAULT NULL,
  `trainingFrequency` text DEFAULT NULL,
  `internalCompliance` text DEFAULT NULL,
  `complianceApproval` text DEFAULT NULL,
  `complianceComments` text DEFAULT NULL,
  `countryLists_highRisk` text DEFAULT NULL,
  `countryLists_fatf` text DEFAULT NULL,
  `countryLists_sanctioned` text DEFAULT NULL,
  `countryLists_corruption` text DEFAULT NULL,
  `countryLists_complianceAlert` text DEFAULT NULL,
  `countryLists_drugTrafficking` text DEFAULT NULL,
  `additionalComments` text DEFAULT NULL,
  `screenSystems` text DEFAULT NULL,
  `identifyHighRisk` text DEFAULT NULL,
  `recordDetails_intended` text DEFAULT NULL,
  `recordDetails_expected` text DEFAULT NULL,
  `recordDetails_perTransaction` text DEFAULT NULL,
  `yes_details` text DEFAULT NULL,
  `risk_assessment` text DEFAULT NULL,
  `risk_details` text DEFAULT NULL,
  `client_fee_structure` text DEFAULT NULL,
  `investment_products` text DEFAULT NULL,
  `products_details` text DEFAULT NULL,
  `platform_WRAP` text DEFAULT NULL,
  `funds_platform` text DEFAULT NULL,
  `market_investments` text DEFAULT NULL,
  `restricted_mass` text DEFAULT NULL,
  `advisory_stockbroker` text DEFAULT NULL,
  `model_portfolios` text DEFAULT NULL,
  `investments_defined` text DEFAULT NULL,
  `structured_deposits` text DEFAULT NULL,
  `deposit_accounts` text DEFAULT NULL,
  `commercial_property` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `please_details` text DEFAULT NULL,
  `surname` text DEFAULT NULL,
  `forenames` text DEFAULT NULL,
  `profession` text DEFAULT NULL,
  `qualifications` text DEFAULT NULL,
  `certifiers_address` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `post_code` text DEFAULT NULL,
  `company_structure_chart` text DEFAULT NULL,
  `company_register_shareholder` text DEFAULT NULL,
  `company_authorised_signatory` text DEFAULT NULL,
  `appointed_text` text DEFAULT NULL,
  `adviser_multifiles` text DEFAULT NULL,
  `full_name_1` text DEFAULT NULL,
  `position_1` text DEFAULT NULL,
  `signature_1` text DEFAULT NULL,
  `date_signed_1` text DEFAULT NULL,
  `full_name_2` text DEFAULT NULL,
  `position_2` text DEFAULT NULL,
  `signature_2` text DEFAULT NULL,
  `date_signed_2` text DEFAULT NULL,
  `date_received` text DEFAULT NULL,
  `date_approved` text DEFAULT NULL,
  `approved_by` text DEFAULT NULL,
  `approval_signature` text DEFAULT NULL,
  `status` enum('pending','active','decline') NOT NULL DEFAULT 'pending',
  `admin_country` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `draft_offshores`
--

INSERT INTO `draft_offshores` (`id`, `selected_adviser_id`, `creater_id`, `company_name`, `trading_as`, `type`, `other_details`, `main_contact`, `additional_details`, `surname_surname`, `forename`, `previous_names`, `registered_address`, `registered_country`, `registered_post_code`, `physical_address`, `physical_country`, `physical_post_code`, `office_number`, `direct_line`, `mobile_number`, `email_address`, `website`, `financial_adviser`, `insurance_broker`, `asset_manager`, `accountant`, `tax_adviser`, `lawyer`, `other_business_activity`, `other_business_specify`, `licensing_body`, `licensing_reference`, `restrictions`, `restrictions_imposed`, `insurance`, `investment`, `regulatory_visit`, `date_follow`, `areas_review`, `highlighted_review`, `percentage_breakdown`, `professional_indemnity`, `cyber_insurance`, `face_to_face`, `non_face_policy`, `high_risk`, `standard_risk`, `low_risk`, `sanctioned`, `refer`, `client_risk`, `kyc_revisit`, `accept_peps`, `pep_policy`, `due_diligence`, `provide_details`, `collectDetails`, `writtenPolicies`, `reviewDocuments`, `updatedDocuments`, `amlPolicies`, `trainingFrequency`, `internalCompliance`, `complianceApproval`, `complianceComments`, `countryLists_highRisk`, `countryLists_fatf`, `countryLists_sanctioned`, `countryLists_corruption`, `countryLists_complianceAlert`, `countryLists_drugTrafficking`, `additionalComments`, `screenSystems`, `identifyHighRisk`, `recordDetails_intended`, `recordDetails_expected`, `recordDetails_perTransaction`, `yes_details`, `risk_assessment`, `risk_details`, `client_fee_structure`, `investment_products`, `products_details`, `platform_WRAP`, `funds_platform`, `market_investments`, `restricted_mass`, `advisory_stockbroker`, `model_portfolios`, `investments_defined`, `structured_deposits`, `deposit_accounts`, `commercial_property`, `title`, `please_details`, `surname`, `forenames`, `profession`, `qualifications`, `certifiers_address`, `country`, `post_code`, `company_structure_chart`, `company_register_shareholder`, `company_authorised_signatory`, `appointed_text`, `adviser_multifiles`, `full_name_1`, `position_1`, `signature_1`, `date_signed_1`, `full_name_2`, `position_2`, `signature_2`, `date_signed_2`, `date_received`, `date_approved`, `approved_by`, `approval_signature`, `status`, `admin_country`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, NULL, 181, 'Lane Witt Co', 'Cumque nihil perspic', 'Partnership', 'Aut blanditiis ut au', 'Mr', 'Voluptas sed ut accu', 'Ratliff', 'Serina Albert', 'Porter Moran', 'Dolorem quisquam eve', 'South Africa', 'https://www.lezar.mobi', 'Provident similique', 'Spain', 'https://www.rek.cm', '555', 'Repudiandae cupidita', '186', 'livihogo@mailinator.com', 'https://www.nifibyhydiheweg.org.uk', NULL, 'yes', 'yes', 'yes', NULL, 'yes', 'yes', 'Ea do numquam ut ver', 'Praesentium ipsa ne', 'Molestias obcaecati', 'on', 'In earum sint aliqui', 'yes', 'yes', '1981-07-19', '2015-07-05', 'on', 'Perferendis est dol', 'Sint fugiat et sed', 'Facere maxime cumque', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, '2025-03-11 08:38:44', '2025-03-11 08:38:44', NULL),
(4, NULL, 654, 'test', 'test02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, '2025-03-11 08:42:41', '2025-03-11 08:42:41', NULL),
(5, NULL, 652, NULL, 'asd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, '2025-03-11 08:45:43', '2025-03-11 08:45:43', NULL),
(6, NULL, 652, NULL, 'yyyy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, '2025-03-11 08:56:54', '2025-03-11 08:56:54', NULL),
(8, NULL, 665, 'Chartwell Associates Pte Ltd', 'Chartwell Associates Pte Ltd', 'Company', NULL, 'Mr', NULL, 'Potter', 'Chris', NULL, '16 Mornington Crescent', 'Singapore', '798650', NULL, 'Singapore', '409043', '+65 8786 0010', NULL, '+65 8786 0010', 'admin@chartwell-associates.com', 'chartwell-associates.com', 'yes', NULL, 'yes', NULL, NULL, NULL, NULL, NULL, 'Monetary Authority of Singapore (MAS)', 'FA100027', 'no', NULL, 'yes', 'yes', '2015-01-01', NULL, 'no', NULL, 'Singapore 100%', 'SGD1,000,000', 'yes', 'No', 'Yes', '0', '20', '80', 'No', 'No', 'Yes', 'annually', 'Yes', 'Yes', 'Yes', 'We do nit deal with any potential clinets from any high risk jurisdictions.\r\nAny potential client who is a PEP or has relations with a PEP undergoes enhanced DD and is vetted by senior management to decide whether to onboard tem as clients. \r\nAll enhanced DD follows MAS regulations and guidence. At this time we have no PEP\'s  as clinets', 'yes', 'yes', 'annually with our Compliance and procedures manuals', 'yes', 'yes', 'annually', 'yes', 'Before and after any sales and before any application is sent to product providers', 'All business is checked by one of the Directors of the company BEFORE and AFTER clinets sign any applications and BEFORE any business is submitted to product providers', 'highRisk', 'fatf', 'sanctioned', 'corruption', 'complianceAlert', 'drugTrafficking', 'Folllowing FATF lists', 'yes', 'yes', 'intended', 'expected', 'perTransaction', 'on internal systems', 'Yes', 'yes and this is reviewed regularly', 'We are Fee- Based Financial Advisers.\r\nWe charge for writing Financial Plans (between SGD2,500 -SGD10,ooo depending on complexxity)\r\nWe charge an implementation  fee for setting up any plans/products\r\nand an AMC for assets under management\r\nWe do not sell commission products and do nit take indemnified commission\r\nThere are very few Fee-Based adviser in Singapore, with most advisers still selling high commission products and receiving  up to 85% commission.', 'No', NULL, 'Platform / WRAP', NULL, NULL, NULL, NULL, 'DFM / Model Portfolios', NULL, NULL, 'Deposit Accounts', NULL, 'Mr', NULL, 'Potter', 'Chris', 'Association of Financial Advisers (Singapore)', 'UK FPC 1,2 &3 G10 & G60   Singapore: all relevant SIngapore fA qualifications', '16 Mornington Crescent', 'Singapore', '798650', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, '2025-03-12 11:54:54', '2025-03-12 11:54:54', NULL),
(11, NULL, 669, 'Lead Solution Wealth Management', NULL, 'Company', NULL, 'Mr', NULL, 'Pitt', 'Lennoc C R', NULL, 'H21 Home Scene Building\r\nHealthscape\r\nCircle Square Retail Park, Forbach 31001\r\nMauritius', 'Mauritius', '31001', NULL, NULL, NULL, '+971 54 271 5560', NULL, '+971 54 271 5560', 'servicing@leadsolutionss.com', 'https://www.leadsolutionss.com/', 'yes', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, 'Financial Services Commission (FSC) Mauritius', 'C117022693', 'no', NULL, 'yes', 'yes', '2024-07-18', NULL, 'no', NULL, 'Lead Solution Wealth Management provides tailored wealth management and investment consultancy advice to medium to high net worth expatriate clients based across the globe.', '500000', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, '2025-03-27 06:48:56', '2025-03-27 06:48:56', NULL),
(12, NULL, 697, 'Three Sixty Financial Inc', 'N/A', 'Company', 'N/A', 'Mr', 'N/A', 'Cane', 'Gary', 'N/A', 'Suite 10-7, Wisma UOA Damansara II, No.6 Changkat Semantan, Damansara Heights, Kuala Lumpur', 'Malaysia', '50490', 'N/A', 'Malaysia', '50490', '03-9213 1618', 'N/A', '012-667-8342', 'gary.cane@threesixtyfinancial.com', 'www.threesixtyfinancial.com', 'yes', 'yes', NULL, NULL, NULL, NULL, NULL, 'N/A', 'Labuan Financial Services Authority', 'BS200133', 'no', 'N/A', 'yes', 'yes', '2024-10-16', NULL, 'no', 'N/A', 'As we work with expatriates these will be mostly from operations in Malaysia but may have moved regionally or back their home country. 70% Malaysia 25%regional SEA, 5% country of origin', 'RM2,500,000 per claim', 'no', 'Yes', NULL, '0', '30', '10', 'No', 'No', 'Yes', 'During reviews or changes to planning, withdrawals or surrenders, Expiry of POID', 'No', 'Yes', 'Yes', 'We do not accept PEP', 'yes', 'yes', 'During reviews or changes to planning, withdrawals or surrenders, Expiry of POID', 'yes', 'yes', 'Annually for compliance functions and face to face staff', 'yes', 'when all compliance items have been received and oversight has happened', NULL, 'highRisk', 'fatf', 'sanctioned', 'corruption', 'complianceAlert', 'drugTrafficking', 'We screen our client base and new applicants on a variety of alert lists as directed by our regulator', 'yes', 'yes', 'intended', 'expected', 'perTransaction', 'all of this is collected during discovery and KYC and updated in reviews and upon any changes to transaction consistency', 'Yes', 'Yes and we have a regulatory duty to report suspicious transactions using the FINS system through the central bank (Bank Negara Malaysia)', 'Apart from legacy insurance products we are mainly a fee for service business taking 1% annually. We can charge an advice fee for set up but this is limited to 2.5%. We tend to use DFM\'s with clean share classes and direct assets and ETF\'s.', 'No', NULL, 'Platform / WRAP', NULL, NULL, NULL, NULL, 'DFM / Model Portfolios', NULL, NULL, 'Deposit Accounts', NULL, 'Mr', NULL, 'Cane', 'Gary', NULL, 'FPC1, FPC2, ICFA, CF2', '33A Mesra Terrace, 7 Jalan Dutamas Raya, Dutamas, Kuala Lumpur', 'Malaysia', '51200', '/storage/app/public/documents/1743146171_no._9-Elmwood_Capital_Limited_Group_Structure.pdf', '/storage/app/public/documents/1743146171_Form_25_updated_-_Three_Sixty_Financial_Inc.pdf', '/storage/app/public/documents/1743146171_Signatory_List_Alltrust_Services_Ltd_signed.pdf', NULL, NULL, 'Gary Cane', 'Managing Director and Principal Officer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, '2025-03-28 07:16:11', '2025-03-28 07:16:11', NULL),
(13, NULL, 710, 'Lead Solution Wealth Management', NULL, 'Company', NULL, 'Mr', NULL, 'Pitt', 'Lennox C R', NULL, 'H21 Home Scene Building\r\nHealthscape\r\nCircle Square Retail Park, Forbach 31001\r\nMauritius', 'Mauritius', '31001', NULL, NULL, NULL, '+971 54 271 5560', NULL, '+971 54 271 5560', 'servicing@leadsolutionss.com', 'https://www.leadsolutionss.com/', 'yes', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, 'Financial Services Commission (FSC) Mauritius', 'C117022693', 'no', NULL, 'yes', 'yes', '2024-07-18', NULL, 'no', NULL, 'Middle East & United Kingdom', '500,000 USD', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, '2025-04-03 06:23:19', '2025-04-03 06:23:19', NULL),
(14, NULL, 709, 'Amalia Wealth BV', 'Amalia Wealth BV Sucursal en España', 'Company', NULL, 'Mr', NULL, 'Greenland', 'Richard Michael', NULL, 'Calle Peña Del Viso 6, Valdemanco, Madrid, Spain', NULL, '28729', NULL, NULL, NULL, '+34 605 890 932', NULL, '+34 605 890 932', 'richardg@amaliawealth.com', 'www.amaliawealth.com', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Financial Services and Markets Authority', '105592A', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '€ 1.100.000 loss of all insureds per one claim. € 3.300.000 for  loss of all insureds per policy period.', 'no', NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'yes', NULL, 'yes', NULL, NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mr', NULL, 'Greenland', 'Richard Michael', NULL, NULL, 'Calle Peña Del Viso 6, Valdemanco, Madrid, Spain', NULL, '28729', NULL, NULL, NULL, NULL, NULL, 'Richard Michael Greenland', 'Director/Owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, '2025-04-03 09:31:44', '2025-04-03 09:31:44', NULL),
(16, NULL, 663, 'AOP Capital Limited', 'AOP Capital Ltd', 'Company', NULL, 'Mrs', NULL, 'Joseph', 'Shruthi', 'NA', 'Unit C1002-A, Level 10, Burj Daman, DIFC, PO Box 507042, Dubai, UAE', 'United Arab Emirates', 'NA', 'Unit C1002-A, Level 10, Burj Daman, DIFC, PO Box 507042, Dubai, UAE', 'United Arab Emirates', 'NA', NULL, NULL, NULL, 'info@aopcapitalgroup.com', NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dubai FInancial Services Authority', 'F007420', 'no', NULL, NULL, 'yes', NULL, NULL, 'no', 'The firm has only completed a year since receiving its Financial Services Permission. Therefore, there have been no scheduled Regulatory visits', NULL, NULL, 'no', 'No', 'Yes', NULL, '100', NULL, 'No', 'Yes', 'Yes', 'atleast annually', 'Yes', 'Yes', 'Yes', 'Under the Dubai Financial Services Authority (DFSA) regulations, enhanced due diligence (EDD) is indeed required for high-risk relationships, which includes politically exposed persons (PEPs). Specific requirements apply to PEPs, defined as individuals who hold prominent public positions, along with their family members and close associates.  AOP will Identify whether a client or beneficial owner is a PEP and further carry out EDD measures, which include:\r\na. Understanding the source of wealth and funds.\r\nb. Obtaining senior management approval to establish or continue the relationship.\r\nc. Monitoring the business relationship more closely.\r\n\r\nAOP has also implemented enhanced ongoing monitoring of these relationships once a high-risk status has been established and EDD measures have been applied to a high risk client', 'yes', 'yes', 'The frequency of revisiting and reviewing documents is determined by the risk rating assigned to the client', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, '2025-04-10 11:56:24', '2025-04-10 11:56:24', NULL),
(17, NULL, 661, 'Overberg Asset Management', 'Overberg Asset Management', 'Company', NULL, 'Mr', NULL, 'Wantenaar', 'Robert', NULL, '9 DS Botha Street, Greyton', 'South Africa', '7233', NULL, 'South Africa', '7130', NULL, NULL, '+27846454295', 'robert@overberg.biz', 'www.overberg.biz', 'yes', NULL, 'yes', NULL, NULL, NULL, NULL, NULL, 'financial services conduct authority', '783', 'no', NULL, 'yes', 'yes', NULL, NULL, 'no', NULL, NULL, 'sufficient', NULL, 'Yes', 'Yes', '10', '80', '10', 'Yes', 'No', 'Yes', 'annually', 'Yes', 'Yes', 'Yes', 'all relevant documentation required to reduce risk', 'yes', 'yes', 'annually', 'yes', 'yes', 'annually', 'yes', 'all transactions have to be approved by compliance', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'yes', 'intended', 'expected', 'perTransaction', 'compliance completes this function', 'Yes', 'internal compliance processes ensure full records are kept', '1.5% AMC \r\nInline with industry standard', 'No', NULL, NULL, 'Funds (direct not via a Platform)', NULL, NULL, NULL, 'DFM / Model Portfolios', NULL, 'Structured Deposits', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, '2025-04-11 10:27:56', '2025-04-11 10:27:56', NULL),
(18, NULL, 732, 'IMPERIUM CAPITAL LIMITED', 'INSURANCE BROKER', 'Company', NULL, 'Mr', NULL, 'KNOX', 'CAMERON', NULL, 'Level 15(A1). Main Office Tower,Financial Park Labuan,Jalan Merdeka, F.T.Labuan', 'Malaysia', '87007', 'c/o. Labuan Insurance Management Services Ltd\r\nNo 63, 1st Floor, Jalan Merdeka,  \r\n  Labuan F.T., \r\nMalaysia', 'Malaysia', '87007', '+62-21- 50101206', NULL, NULL, 'client.services@imperium-capital.biz', 'www.imp-cap.com', NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, 'MINISTER OF FINANCE MALAYSIA / LABUAN FSA', 'Co. Reg. LL02429/License Number BS200026', 'no', NULL, 'yes', NULL, '2025-04-15', NULL, 'no', 'Regulatory Visit meaning the last report submitted on 15/04/2025. W', NULL, 'Limit of Indemnity MYR 2.500.000', 'no', 'Yes', 'No', '5', '90', '5', 'No', 'No', 'No', 'twice a year', NULL, NULL, NULL, NULL, 'yes', 'yes', 'quarterly', 'yes', 'yes', 'twice a year', 'yes', 'before submit it to the providers.', NULL, 'highRisk', NULL, 'sanctioned', NULL, 'complianceAlert', NULL, NULL, 'yes', 'yes', 'intended', 'expected', 'perTransaction', NULL, 'Yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, '2025-04-18 05:21:52', '2025-04-18 05:21:52', NULL),
(19, NULL, 737, 'Blacktower Financial Management ( DIFC) Limited', 'Blacktower Financial Management ( DIFC) Limited', 'Company', NULL, 'Mr', NULL, 'Pluck', 'Gavin', NULL, 'Unit GV-00-08-03-OF-23 Level 3\r\nGate Village building 8 DIFC Dubai UAE', 'United Arab Emirates', '507291', NULL, 'United Arab Emirates', '507291', '+971 4 8376400', '+971 4 8376400', '+971 553467353', 'info@blacktowerfm.com', 'www.blacktowefm.com', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, 'Blacktower Financial Management ( DIFC) Limited', 'DIFC', 'CL7495', 'no', NULL, NULL, 'yes', NULL, NULL, 'no', NULL, NULL, NULL, NULL, 'Yes', 'Yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mr', NULL, 'Griffin', 'Christopher', 'Chartered  Institute  for Securities & Investments 718508', 'CISI Level 6 Certificate in Advanced Financial Planning', '2206 Marina Arcade Tower, AL Naseem Street, Dubai Marina, Dubai, UAE', 'United Arab Emirates', '507291', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, '2025-04-23 07:05:45', '2025-04-23 07:05:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fpts`
--

CREATE TABLE `fpts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(11) UNSIGNED DEFAULT NULL,
  `creater_id` int(11) DEFAULT NULL,
  `status` enum('pending','active','decline') DEFAULT 'pending',
  `scheme_name` text DEFAULT NULL,
  `contact_name` text DEFAULT NULL,
  `company_name` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `post_code` text DEFAULT NULL,
  `dial_code` text DEFAULT NULL,
  `phone_number` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `regulated_by` text DEFAULT NULL,
  `auth_number` text DEFAULT NULL,
  `initial_fee` text DEFAULT NULL,
  `scheme_establishment` text DEFAULT NULL,
  `date_option` text DEFAULT NULL,
  `date_day` text DEFAULT NULL,
  `annual_fee` text DEFAULT NULL,
  `scheme_anniversary` text DEFAULT NULL,
  `date_option2` text DEFAULT NULL,
  `date2_day` text DEFAULT NULL,
  `percentage_checkbox` text DEFAULT NULL,
  `percentage` text DEFAULT NULL,
  `specific_investments_checkbox` text DEFAULT NULL,
  `specific_investments_list` text DEFAULT NULL,
  `initial_fee_amount1` text DEFAULT NULL,
  `initial_fee_percentage1` text DEFAULT NULL,
  `scheme_establishment_alternative1` text DEFAULT NULL,
  `date_alternative1` text DEFAULT NULL,
  `date_alt_day1` text DEFAULT NULL,
  `scheme_anniversary_alternative1` text DEFAULT NULL,
  `transfer_amount_checkbox1` text DEFAULT NULL,
  `transfer_amount_value1` text DEFAULT NULL,
  `percentage_checkbox_transfer1` text DEFAULT NULL,
  `transfer_percentage_value1` text DEFAULT NULL,
  `transfer_payment1` text DEFAULT NULL,
  `future_terms1` text DEFAULT NULL,
  `print_name_left1` text DEFAULT NULL,
  `signature_1` text DEFAULT NULL,
  `signature_2` text DEFAULT NULL,
  `signature_left` text DEFAULT NULL,
  `signature_right` text DEFAULT NULL,
  `signature_left1` text DEFAULT NULL,
  `date_signed_left_day1` text DEFAULT NULL,
  `print_name_right1` text DEFAULT NULL,
  `signature_right1` text DEFAULT NULL,
  `date_signed_right_day1` text DEFAULT NULL,
  `initial_fee_amount2` text DEFAULT NULL,
  `initial_fee_percentage2` text DEFAULT NULL,
  `scheme_establishment_alternative2` text DEFAULT NULL,
  `specific_date2` text DEFAULT NULL,
  `date_alt_day` text DEFAULT NULL,
  `anniversary_fee2` text DEFAULT NULL,
  `anniversary_fee1` text DEFAULT NULL,
  `scheme_anniversary_alternative2` text DEFAULT NULL,
  `transfer_amount_checkbox` text DEFAULT NULL,
  `transfer_amount_value` text DEFAULT NULL,
  `percentage_checkbox_transfer` text DEFAULT NULL,
  `transfer_percentage_value` text DEFAULT NULL,
  `transfer_payment2` text DEFAULT NULL,
  `future_terms2` text DEFAULT NULL,
  `print_name_left2` text DEFAULT NULL,
  `signature_left2` text DEFAULT NULL,
  `date_signed_left_day2` text DEFAULT NULL,
  `print_name_right2` text DEFAULT NULL,
  `signature_right2` text DEFAULT NULL,
  `date_signed_right_day2` text DEFAULT NULL,
  `print_name_left_additional1` text DEFAULT NULL,
  `signature_left_additional` text DEFAULT NULL,
  `date_signed_left_additional_day3` text DEFAULT NULL,
  `print_name_right_additional` text DEFAULT NULL,
  `chairman_contact_name` text DEFAULT NULL,
  `chairman_firm_name` text DEFAULT NULL,
  `chairman_address_line_1` text DEFAULT NULL,
  `chairman_address_line_2` text DEFAULT NULL,
  `chairman_city` text DEFAULT NULL,
  `chairman_postcode` text DEFAULT NULL,
  `chairman_telephone` text DEFAULT NULL,
  `chairman_email` text DEFAULT NULL,
  `member_true_print_name_1` text DEFAULT NULL,
  `member_true_print_name_2` text DEFAULT NULL,
  `member_true_print_name_3` text DEFAULT NULL,
  `member_true_print_name_4` text DEFAULT NULL,
  `principal_reason_family` text DEFAULT NULL,
  `common_funds_number` text DEFAULT NULL,
  `signature` text DEFAULT NULL,
  `common_funds_investment_fund_1` text DEFAULT NULL,
  `common_funds_print_name_1_1` text DEFAULT NULL,
  `common_funds_print_name_1_2` text DEFAULT NULL,
  `common_funds_print_name_1_3` text DEFAULT NULL,
  `common_funds_print_name_1_4` text DEFAULT NULL,
  `common_funds_reason_for_fund_1` text DEFAULT NULL,
  `common_funds_investment_fund_2` text DEFAULT NULL,
  `common_funds_print_name_2_1` text DEFAULT NULL,
  `common_funds_print_name_2_2` text DEFAULT NULL,
  `common_funds_print_name_2_3` text DEFAULT NULL,
  `common_funds_print_name_2_4` text DEFAULT NULL,
  `common_funds_reason_for_fund_2` text DEFAULT NULL,
  `scheme_adviser_contact_name` text DEFAULT NULL,
  `scheme_adviser_company_name` text DEFAULT NULL,
  `scheme_adviser_address` text DEFAULT NULL,
  `scheme_adviser_address_line_2` text DEFAULT NULL,
  `scheme_adviser_city` text DEFAULT NULL,
  `scheme_adviser_postcode` text DEFAULT NULL,
  `scheme_adviser_telephone_number` text DEFAULT NULL,
  `scheme_adviser_email_address` text DEFAULT NULL,
  `scheme_adviser_regulated_by` text DEFAULT NULL,
  `scheme_adviser_authorization_number` text DEFAULT NULL,
  `scheme_adviser_is_part_of_network` text DEFAULT NULL,
  `scheme_adviser_network_name` text DEFAULT NULL,
  `scheme_adviser_regulated_by_2` text DEFAULT NULL,
  `scheme_adviser_company_authorization_number` text DEFAULT NULL,
  `accountant_details_contact_name` text DEFAULT NULL,
  `accountant_details_firm_name` text DEFAULT NULL,
  `accountant_details_address_line_1` text DEFAULT NULL,
  `accountant_details_address_line_2` text DEFAULT NULL,
  `accountant_details_city` text DEFAULT NULL,
  `accountant_details_postcode` text DEFAULT NULL,
  `accountant_details_telephone_number` text DEFAULT NULL,
  `accountant_details_email_address` text DEFAULT NULL,
  `declaration_signature_1` text DEFAULT NULL,
  `declaration_print_name_1` text DEFAULT NULL,
  `declaration_position_1` text DEFAULT NULL,
  `declaration_day_1` text DEFAULT NULL,
  `declaration_signature_2` text DEFAULT NULL,
  `declaration_print_name_2` text DEFAULT NULL,
  `declaration_position_2` text DEFAULT NULL,
  `declaration_day_2` text DEFAULT NULL,
  `adviser_agrement_initial_fee` text DEFAULT NULL,
  `pay_following_establishment` text DEFAULT NULL,
  `day_1` text DEFAULT NULL,
  `month_1` text DEFAULT NULL,
  `year_1` text DEFAULT NULL,
  `pay_anniversary` text DEFAULT NULL,
  `day_2` text DEFAULT NULL,
  `month_2` text DEFAULT NULL,
  `year_2` text DEFAULT NULL,
  `initial_fee_percentage` text DEFAULT NULL,
  `pay_following_establishment_2` text DEFAULT NULL,
  `day_3` text DEFAULT NULL,
  `month_3` text DEFAULT NULL,
  `year_3` text DEFAULT NULL,
  `percentage_total_fund` text DEFAULT NULL,
  `specific_investments` text DEFAULT NULL,
  `adviser_agrement_initial_fee1` text DEFAULT NULL,
  `adviser_agrement_pay_following_establishment` text DEFAULT NULL,
  `adviser_agrement_day_1` text DEFAULT NULL,
  `adviser_agrement_annual_fee` text DEFAULT NULL,
  `adviser_agrement_pay_anniversary` text DEFAULT NULL,
  `adviser_agrement_day_2` text DEFAULT NULL,
  `adviser_agrement_initial_fee_percentage1` text DEFAULT NULL,
  `adviser_agrement_pay_following_establishment_2` text DEFAULT NULL,
  `adviser_agrement_day_3` text DEFAULT NULL,
  `adviser_agrement_percentage_total_fund` text DEFAULT NULL,
  `adviser_agrement_specific_investments` text DEFAULT NULL,
  `adviser_agrement_specific_investments_list` text DEFAULT NULL,
  `adviser_agrement_initial_fee_percentage` text DEFAULT NULL,
  `emp_contr_emp_contr_regular_contribution` text DEFAULT NULL,
  `adviser_agrement_pay_following_establishment11` text DEFAULT NULL,
  `adviser_agrement_day_11` text DEFAULT NULL,
  `adviser_agrement_pay_anniversary11` text DEFAULT NULL,
  `adviser_agrement_transfer_amount` text DEFAULT NULL,
  `adviser_agrement_percentage_of_transfer` text DEFAULT NULL,
  `adviser_agrement_transfer_payments` text DEFAULT NULL,
  `adviser_agrement_same_terms_apply` text DEFAULT NULL,
  `adviser_agrement_sign_name_left` text DEFAULT NULL,
  `adviser_agrement_sign_name_right` text DEFAULT NULL,
  `adviser_agrement_signature_left` text DEFAULT NULL,
  `adviser_agrement_signature_right` text DEFAULT NULL,
  `adviser_agrement_day_signed_left` text DEFAULT NULL,
  `adviser_agrement_day_signed_right` text DEFAULT NULL,
  `adviser_agrement_month_signed_right` text DEFAULT NULL,
  `adviser_agrement_year_signed_right` text DEFAULT NULL,
  `interim_deed_appointed` text DEFAULT NULL,
  `interim_deed_network_name` text DEFAULT NULL,
  `interim_deed_payment_to_network` text DEFAULT NULL,
  `interim_deed_fees_to_be_paid_by` text DEFAULT NULL,
  `interim_deed_bank_name` text DEFAULT NULL,
  `interim_deed_branch` text DEFAULT NULL,
  `interim_deed_account_number` text DEFAULT NULL,
  `interim_deed_sort_code` text DEFAULT NULL,
  `interim_deed_payment_ref` text DEFAULT NULL,
  `interim_deed_print_name` text DEFAULT NULL,
  `interim_deed_signature` text DEFAULT NULL,
  `interim_deed_position` text DEFAULT NULL,
  `interim_deed_company_stamp` text DEFAULT NULL,
  `interim_deed_date_signed` text DEFAULT NULL,
  `member_questionaire_title` text DEFAULT NULL,
  `member_questionaire_forenames` text DEFAULT NULL,
  `member_questionaire_surname` text DEFAULT NULL,
  `member_questionaire_previous_names` text DEFAULT NULL,
  `member_questionaire_address` text DEFAULT NULL,
  `member_questionaire_county` text DEFAULT NULL,
  `member_questionaire_postcode` text DEFAULT NULL,
  `member_questionaire_time_at_address_years` text DEFAULT NULL,
  `member_questionaire_time_at_address_months` text DEFAULT NULL,
  `member_questionaire_previous_address` text DEFAULT NULL,
  `member_questionaire_previous_county` text DEFAULT NULL,
  `member_questionaire_previous_postcode` text DEFAULT NULL,
  `member_questionaire_telephone_number` text DEFAULT NULL,
  `member_questionaire_email_address` text DEFAULT NULL,
  `member_questionaire_national_insurance_number` text DEFAULT NULL,
  `member_questionaire_taxpayer_reference` text DEFAULT NULL,
  `member_questionaire_occupation` text DEFAULT NULL,
  `member_questionaire_employer_name` text DEFAULT NULL,
  `member_questionaire_dob_day` text DEFAULT NULL,
  `member_questionaire_gender` text DEFAULT NULL,
  `member_questionaire_nationality` text DEFAULT NULL,
  `member_questionaire_marital_status` text DEFAULT NULL,
  `member_questionaire_employment_status` text DEFAULT NULL,
  `member_questionaire_current_occupation` text DEFAULT NULL,
  `member_questionaire_job_title` text DEFAULT NULL,
  `member_questionaire_opted_out` text DEFAULT NULL,
  `member_questionaire_protection` text DEFAULT NULL,
  `member_questionaire_primary_protection` text DEFAULT NULL,
  `member_questionaire_lump_sum_protection` text DEFAULT NULL,
  `member_questionaire_mpaa` text DEFAULT NULL,
  `member_questionaire_mpaa_day` text DEFAULT NULL,
  `entitlement_tax_relief_option` text DEFAULT NULL,
  `financial_que_adviser_same` text DEFAULT NULL,
  `financial_que_contact_name` text DEFAULT NULL,
  `financial_que_company_name` text DEFAULT NULL,
  `financial_que_address` text DEFAULT NULL,
  `financial_que_country` text DEFAULT NULL,
  `financial_que_postcode` text DEFAULT NULL,
  `financial_que_telephone_number` text DEFAULT NULL,
  `financial_que_email_address` text DEFAULT NULL,
  `financial_que_regulated_by` text DEFAULT NULL,
  `financial_que_authorisation_number` text DEFAULT NULL,
  `financial_que_network_name` text DEFAULT NULL,
  `financial_que_network_regulated_by` text DEFAULT NULL,
  `financial_que_company_authorisation_number` text DEFAULT NULL,
  `fund_common_investment_1` text DEFAULT NULL,
  `fund_investment_1` text DEFAULT NULL,
  `fund_common_investment_2` text DEFAULT NULL,
  `fund_investment_2` text DEFAULT NULL,
  `fund_additional_details` text DEFAULT NULL,
  `members_fund_investment_1` text DEFAULT NULL,
  `members_fund_investment_2` text DEFAULT NULL,
  `members_fund_investment_3` text DEFAULT NULL,
  `members_fund_investment_4` text DEFAULT NULL,
  `nomination_beneficiary_1_name` text DEFAULT NULL,
  `nomination_beneficiary_1_relationship` text DEFAULT NULL,
  `nomination_beneficiary_1_percentage` text DEFAULT NULL,
  `nomination_beneficiary_2_name` text DEFAULT NULL,
  `nomination_beneficiary_2_relationship` text DEFAULT NULL,
  `nomination_beneficiary_2_percentage` text DEFAULT NULL,
  `nomination_beneficiary_3_name` text DEFAULT NULL,
  `nomination_beneficiary_3_relationship` text DEFAULT NULL,
  `nomination_beneficiary_3_percentage` text DEFAULT NULL,
  `nomination_charity_1_name` text DEFAULT NULL,
  `nomination_charity_1_percentage` text DEFAULT NULL,
  `nomination_charity_2_name` text DEFAULT NULL,
  `nomination_charity_2_percentage` text DEFAULT NULL,
  `nomination_charity_3_name` text DEFAULT NULL,
  `nomination_charity_3_percentage` text DEFAULT NULL,
  `personal_regular_contribution` text DEFAULT NULL,
  `personal_single_contribution` text DEFAULT NULL,
  `personal_source_of_funds` text DEFAULT NULL,
  `personal_contribution_frequency` text DEFAULT NULL,
  `personal_start_date_day` text DEFAULT NULL,
  `personal_employer_pay` text DEFAULT NULL,
  `questionaries_employer_name` text DEFAULT NULL,
  `questionaries_registered_address` text DEFAULT NULL,
  `questionaries_country` text DEFAULT NULL,
  `questionaries_postcode` text DEFAULT NULL,
  `questionaries_telephone_number` text DEFAULT NULL,
  `questionaries_email_address` text DEFAULT NULL,
  `questionaries_trading_address` text DEFAULT NULL,
  `questionaries_trading_country` text DEFAULT NULL,
  `questionaries_trading_postcode` text DEFAULT NULL,
  `questionaries_employer_status` text DEFAULT NULL,
  `questionaries_nature_of_business` text DEFAULT NULL,
  `questionaries_employer_year_end_day` text DEFAULT NULL,
  `questionaries_registration_number` text DEFAULT NULL,
  `questionaries_employed_since_day` text DEFAULT NULL,
  `questionaries_director_status` text DEFAULT NULL,
  `questionaries_shareholdings` text DEFAULT NULL,
  `emp_contr_regular_contribution` text DEFAULT NULL,
  `emp_contr_single_contribution` text DEFAULT NULL,
  `emp_contr_frequency` text DEFAULT NULL,
  `emp_contr_day` text DEFAULT NULL,
  `empl_dec_signature` text DEFAULT NULL,
  `empl_dec_print_name` text DEFAULT NULL,
  `empl_dec_position` text DEFAULT NULL,
  `empl_dec_day` text DEFAULT NULL,
  `transf_auth_signature` text DEFAULT NULL,
  `transf_auth_print_name` text DEFAULT NULL,
  `transf_auth_plan_scheme_no` text DEFAULT NULL,
  `transf_auth_day` text DEFAULT NULL,
  `trans_plan_member_name` text DEFAULT NULL,
  `trans_plan_telephone_number` text DEFAULT NULL,
  `trans_plan_email_address` text DEFAULT NULL,
  `trans_plan_transfer_scheme_type` text DEFAULT NULL,
  `trans_plan_address` text DEFAULT NULL,
  `trans_plan_postcode` text DEFAULT NULL,
  `trans_plan_country` text DEFAULT NULL,
  `trans_plan_scheme_type` text DEFAULT NULL,
  `trans_plan_plan_scheme_name` text DEFAULT NULL,
  `trans_plan_scheme_number` text DEFAULT NULL,
  `trans_plan_reference` text DEFAULT NULL,
  `trans_plan_value_of_fund` text DEFAULT NULL,
  `trans_plan_wish_transfer` text DEFAULT NULL,
  `trans_plan_important_to_transfer` text DEFAULT NULL,
  `trans_plan_existing_scheme` text DEFAULT NULL,
  `trans_plan_block_transfer` text DEFAULT NULL,
  `member_consent_contact_me` text DEFAULT NULL,
  `member_consent_pass_contact` text DEFAULT NULL,
  `member_consent_prefer_email` text DEFAULT NULL,
  `member_consent_prefer_post` text DEFAULT NULL,
  `member_consent_signature` text DEFAULT NULL,
  `member_consent_print_name` text DEFAULT NULL,
  `member_consent_date_day` text DEFAULT NULL,
  `date_alternative2` text DEFAULT NULL,
  `member_declra_waive_rights` text DEFAULT NULL,
  `member_declra_responsibility_declaration` text DEFAULT NULL,
  `member_declra_confirm_information` text DEFAULT NULL,
  `member_declra_notify_information` text DEFAULT NULL,
  `member_declra_consent_declaration` text DEFAULT NULL,
  `member_declra_signature` text DEFAULT NULL,
  `member_declra_print_name` text DEFAULT NULL,
  `member_declra_date_day` text DEFAULT NULL,
  `member_declra_waive_cancellation_rights` text DEFAULT NULL,
  `member_declra_parental_responsibility` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `fpt_signature` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fpts`
--

INSERT INTO `fpts` (`id`, `user_id`, `creater_id`, `status`, `scheme_name`, `contact_name`, `company_name`, `address`, `country`, `post_code`, `dial_code`, `phone_number`, `email`, `regulated_by`, `auth_number`, `initial_fee`, `scheme_establishment`, `date_option`, `date_day`, `annual_fee`, `scheme_anniversary`, `date_option2`, `date2_day`, `percentage_checkbox`, `percentage`, `specific_investments_checkbox`, `specific_investments_list`, `initial_fee_amount1`, `initial_fee_percentage1`, `scheme_establishment_alternative1`, `date_alternative1`, `date_alt_day1`, `scheme_anniversary_alternative1`, `transfer_amount_checkbox1`, `transfer_amount_value1`, `percentage_checkbox_transfer1`, `transfer_percentage_value1`, `transfer_payment1`, `future_terms1`, `print_name_left1`, `signature_1`, `signature_2`, `signature_left`, `signature_right`, `signature_left1`, `date_signed_left_day1`, `print_name_right1`, `signature_right1`, `date_signed_right_day1`, `initial_fee_amount2`, `initial_fee_percentage2`, `scheme_establishment_alternative2`, `specific_date2`, `date_alt_day`, `anniversary_fee2`, `anniversary_fee1`, `scheme_anniversary_alternative2`, `transfer_amount_checkbox`, `transfer_amount_value`, `percentage_checkbox_transfer`, `transfer_percentage_value`, `transfer_payment2`, `future_terms2`, `print_name_left2`, `signature_left2`, `date_signed_left_day2`, `print_name_right2`, `signature_right2`, `date_signed_right_day2`, `print_name_left_additional1`, `signature_left_additional`, `date_signed_left_additional_day3`, `print_name_right_additional`, `chairman_contact_name`, `chairman_firm_name`, `chairman_address_line_1`, `chairman_address_line_2`, `chairman_city`, `chairman_postcode`, `chairman_telephone`, `chairman_email`, `member_true_print_name_1`, `member_true_print_name_2`, `member_true_print_name_3`, `member_true_print_name_4`, `principal_reason_family`, `common_funds_number`, `signature`, `common_funds_investment_fund_1`, `common_funds_print_name_1_1`, `common_funds_print_name_1_2`, `common_funds_print_name_1_3`, `common_funds_print_name_1_4`, `common_funds_reason_for_fund_1`, `common_funds_investment_fund_2`, `common_funds_print_name_2_1`, `common_funds_print_name_2_2`, `common_funds_print_name_2_3`, `common_funds_print_name_2_4`, `common_funds_reason_for_fund_2`, `scheme_adviser_contact_name`, `scheme_adviser_company_name`, `scheme_adviser_address`, `scheme_adviser_address_line_2`, `scheme_adviser_city`, `scheme_adviser_postcode`, `scheme_adviser_telephone_number`, `scheme_adviser_email_address`, `scheme_adviser_regulated_by`, `scheme_adviser_authorization_number`, `scheme_adviser_is_part_of_network`, `scheme_adviser_network_name`, `scheme_adviser_regulated_by_2`, `scheme_adviser_company_authorization_number`, `accountant_details_contact_name`, `accountant_details_firm_name`, `accountant_details_address_line_1`, `accountant_details_address_line_2`, `accountant_details_city`, `accountant_details_postcode`, `accountant_details_telephone_number`, `accountant_details_email_address`, `declaration_signature_1`, `declaration_print_name_1`, `declaration_position_1`, `declaration_day_1`, `declaration_signature_2`, `declaration_print_name_2`, `declaration_position_2`, `declaration_day_2`, `adviser_agrement_initial_fee`, `pay_following_establishment`, `day_1`, `month_1`, `year_1`, `pay_anniversary`, `day_2`, `month_2`, `year_2`, `initial_fee_percentage`, `pay_following_establishment_2`, `day_3`, `month_3`, `year_3`, `percentage_total_fund`, `specific_investments`, `adviser_agrement_initial_fee1`, `adviser_agrement_pay_following_establishment`, `adviser_agrement_day_1`, `adviser_agrement_annual_fee`, `adviser_agrement_pay_anniversary`, `adviser_agrement_day_2`, `adviser_agrement_initial_fee_percentage1`, `adviser_agrement_pay_following_establishment_2`, `adviser_agrement_day_3`, `adviser_agrement_percentage_total_fund`, `adviser_agrement_specific_investments`, `adviser_agrement_specific_investments_list`, `adviser_agrement_initial_fee_percentage`, `emp_contr_emp_contr_regular_contribution`, `adviser_agrement_pay_following_establishment11`, `adviser_agrement_day_11`, `adviser_agrement_pay_anniversary11`, `adviser_agrement_transfer_amount`, `adviser_agrement_percentage_of_transfer`, `adviser_agrement_transfer_payments`, `adviser_agrement_same_terms_apply`, `adviser_agrement_sign_name_left`, `adviser_agrement_sign_name_right`, `adviser_agrement_signature_left`, `adviser_agrement_signature_right`, `adviser_agrement_day_signed_left`, `adviser_agrement_day_signed_right`, `adviser_agrement_month_signed_right`, `adviser_agrement_year_signed_right`, `interim_deed_appointed`, `interim_deed_network_name`, `interim_deed_payment_to_network`, `interim_deed_fees_to_be_paid_by`, `interim_deed_bank_name`, `interim_deed_branch`, `interim_deed_account_number`, `interim_deed_sort_code`, `interim_deed_payment_ref`, `interim_deed_print_name`, `interim_deed_signature`, `interim_deed_position`, `interim_deed_company_stamp`, `interim_deed_date_signed`, `member_questionaire_title`, `member_questionaire_forenames`, `member_questionaire_surname`, `member_questionaire_previous_names`, `member_questionaire_address`, `member_questionaire_county`, `member_questionaire_postcode`, `member_questionaire_time_at_address_years`, `member_questionaire_time_at_address_months`, `member_questionaire_previous_address`, `member_questionaire_previous_county`, `member_questionaire_previous_postcode`, `member_questionaire_telephone_number`, `member_questionaire_email_address`, `member_questionaire_national_insurance_number`, `member_questionaire_taxpayer_reference`, `member_questionaire_occupation`, `member_questionaire_employer_name`, `member_questionaire_dob_day`, `member_questionaire_gender`, `member_questionaire_nationality`, `member_questionaire_marital_status`, `member_questionaire_employment_status`, `member_questionaire_current_occupation`, `member_questionaire_job_title`, `member_questionaire_opted_out`, `member_questionaire_protection`, `member_questionaire_primary_protection`, `member_questionaire_lump_sum_protection`, `member_questionaire_mpaa`, `member_questionaire_mpaa_day`, `entitlement_tax_relief_option`, `financial_que_adviser_same`, `financial_que_contact_name`, `financial_que_company_name`, `financial_que_address`, `financial_que_country`, `financial_que_postcode`, `financial_que_telephone_number`, `financial_que_email_address`, `financial_que_regulated_by`, `financial_que_authorisation_number`, `financial_que_network_name`, `financial_que_network_regulated_by`, `financial_que_company_authorisation_number`, `fund_common_investment_1`, `fund_investment_1`, `fund_common_investment_2`, `fund_investment_2`, `fund_additional_details`, `members_fund_investment_1`, `members_fund_investment_2`, `members_fund_investment_3`, `members_fund_investment_4`, `nomination_beneficiary_1_name`, `nomination_beneficiary_1_relationship`, `nomination_beneficiary_1_percentage`, `nomination_beneficiary_2_name`, `nomination_beneficiary_2_relationship`, `nomination_beneficiary_2_percentage`, `nomination_beneficiary_3_name`, `nomination_beneficiary_3_relationship`, `nomination_beneficiary_3_percentage`, `nomination_charity_1_name`, `nomination_charity_1_percentage`, `nomination_charity_2_name`, `nomination_charity_2_percentage`, `nomination_charity_3_name`, `nomination_charity_3_percentage`, `personal_regular_contribution`, `personal_single_contribution`, `personal_source_of_funds`, `personal_contribution_frequency`, `personal_start_date_day`, `personal_employer_pay`, `questionaries_employer_name`, `questionaries_registered_address`, `questionaries_country`, `questionaries_postcode`, `questionaries_telephone_number`, `questionaries_email_address`, `questionaries_trading_address`, `questionaries_trading_country`, `questionaries_trading_postcode`, `questionaries_employer_status`, `questionaries_nature_of_business`, `questionaries_employer_year_end_day`, `questionaries_registration_number`, `questionaries_employed_since_day`, `questionaries_director_status`, `questionaries_shareholdings`, `emp_contr_regular_contribution`, `emp_contr_single_contribution`, `emp_contr_frequency`, `emp_contr_day`, `empl_dec_signature`, `empl_dec_print_name`, `empl_dec_position`, `empl_dec_day`, `transf_auth_signature`, `transf_auth_print_name`, `transf_auth_plan_scheme_no`, `transf_auth_day`, `trans_plan_member_name`, `trans_plan_telephone_number`, `trans_plan_email_address`, `trans_plan_transfer_scheme_type`, `trans_plan_address`, `trans_plan_postcode`, `trans_plan_country`, `trans_plan_scheme_type`, `trans_plan_plan_scheme_name`, `trans_plan_scheme_number`, `trans_plan_reference`, `trans_plan_value_of_fund`, `trans_plan_wish_transfer`, `trans_plan_important_to_transfer`, `trans_plan_existing_scheme`, `trans_plan_block_transfer`, `member_consent_contact_me`, `member_consent_pass_contact`, `member_consent_prefer_email`, `member_consent_prefer_post`, `member_consent_signature`, `member_consent_print_name`, `member_consent_date_day`, `date_alternative2`, `member_declra_waive_rights`, `member_declra_responsibility_declaration`, `member_declra_confirm_information`, `member_declra_notify_information`, `member_declra_consent_declaration`, `member_declra_signature`, `member_declra_print_name`, `member_declra_date_day`, `member_declra_waive_cancellation_rights`, `member_declra_parental_responsibility`, `notes`, `fpt_signature`, `created_at`, `updated_at`, `deleted_at`) VALUES
(56, 695, 181, 'pending', 'Aphrodite Ewing', 'Jessica Craft', 'Jefferson and Tyson Trading', 'Reiciendis quo velit', 'Angola', 'Perferendis ex nulla', 'Consequatur et culpa', '+1 (309) 118-8828', 'womypy@mailinator.com', 'Elit impedit eum n', '422', 'Sint quaerat ipsam d', 'following_establishment', 'specific_date', '2007-01-25', 'Quo minima laboris v', 'on_anniversary', 'specific_date', '1985-02-19', 'percentage_of_fund', 'Ipsum non inventore', 'specific_investments', 'Omnis non libero ali', 'Omnis ex optio fuga', 'Aliquam iusto volupt', 'following_establishment1', 'specific_date1', '1972-01-05', 'paid_on_anniversary', 'amount', 'Tempore dolor fugia', 'percentage', 'Ea hic consectetur', 'Commodi dolores expl', 'yes', 'Jillian Dawson', NULL, NULL, NULL, NULL, 'Non esse sit et qu', '1991-04-29', 'Tanner Hull', 'Officia alias qui au', '1984-12-31', 'Qui veritatis fugiat', 'Ex minima omnis eius', NULL, NULL, '2014-07-04', 'paid_annually_percentage', NULL, 'paid_on_anniversary', 'amount', 'Vel ea provident se', 'percentage', 'Delectus aliquip Na', 'Ipsum perferendis ex', 'no', 'Ria Horton', 'Sed esse illo sunt', '2000-05-11', 'Armand Knapp', 'Enim quod cupidatat', '2015-10-21', 'Hilary Adkins', 'Dignissimos quos par', '2014-10-29', 'Vivian Glover', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'chargeback', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'male', NULL, 'single', 'employed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'monthly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'specific_date2', NULL, 'I have parental responsibility...', 'I confirm the information provided is true...', 'I will notify Alltrust of any information changes...', 'I consent to Alltrust contacting me...', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-24 05:02:58', '2025-03-24 05:04:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` text DEFAULT NULL,
  `trading_name` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `post_code` text DEFAULT NULL,
  `share_holder_details` text DEFAULT NULL,
  `regulated_adviser` text DEFAULT NULL,
  `contact_email` text DEFAULT NULL,
  `website` text DEFAULT NULL,
  `telephone` text DEFAULT NULL,
  `fca_firms_reference` text DEFAULT NULL,
  `directly_authorised_checked` text DEFAULT NULL,
  `principal_company_name` text DEFAULT NULL,
  `their_frn` text DEFAULT NULL,
  `advice` text DEFAULT NULL,
  `provide_countries` text DEFAULT NULL,
  `hear_about_us` text DEFAULT NULL,
  `word_of_referrals_checked` text DEFAULT NULL,
  `lead_generation_checked` text DEFAULT NULL,
  `marketing_checked` text DEFAULT NULL,
  `other_specify_checked` text DEFAULT NULL,
  `restrictions_yes_permission` text DEFAULT NULL,
  `restrictions_yes_permission_answer` text DEFAULT NULL,
  `sanctions` text DEFAULT NULL,
  `sanctions_yes_answer` text DEFAULT NULL,
  `connection_connection` text DEFAULT NULL,
  `connection_connection_yes_answer` text DEFAULT NULL,
  `professional_indemnity_insurance` text DEFAULT NULL,
  `policy_excess_DB` text DEFAULT NULL,
  `separate_cyber_security` text DEFAULT NULL,
  `permissions_for_advising` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `text`, `created_at`, `updated_at`) VALUES
(172, 704, 'IL Copr & Tech Ltd saved the support ticket', '2025-03-31 07:14:25', '2025-03-31 07:14:25'),
(173, 184, 'Indulis updated the support ticket', '2025-03-31 07:15:19', '2025-03-31 07:15:19'),
(174, 184, 'Indulis saved the reply of a support ticket', '2025-03-31 07:15:45', '2025-03-31 07:15:45'),
(175, 704, 'IL Copr & Tech Ltd saved a uk registration application', '2025-03-31 07:19:16', '2025-03-31 07:19:16'),
(176, 648, 'Victoria Ingram deleted the support ticket', '2025-03-31 08:16:35', '2025-03-31 08:16:35'),
(177, 649, 'Stuart Harris deleted a uk registration application', '2025-04-01 08:10:23', '2025-04-01 08:10:23'),
(178, 658, 'Claire Eyett saved a uk registration application', '2025-04-01 10:38:03', '2025-04-01 10:38:03'),
(179, 648, 'Victoria Ingram updated a uk registration application', '2025-04-01 10:57:27', '2025-04-01 10:57:27'),
(180, 648, 'Victoria Ingram updated a uk registration application', '2025-04-01 10:58:53', '2025-04-01 10:58:53'),
(181, 648, 'Victoria Ingram changed the status of a uk registration application', '2025-04-01 10:59:49', '2025-04-01 10:59:49'),
(182, 648, 'Victoria Ingram updated a uk registration application', '2025-04-01 11:09:47', '2025-04-01 11:09:47'),
(183, 648, 'Victoria Ingram changed the status of a uk registration application', '2025-04-01 11:10:29', '2025-04-01 11:10:29'),
(184, 648, 'Victoria Ingram updated a uk registration application', '2025-04-01 12:07:29', '2025-04-01 12:07:29'),
(185, 649, 'Stuart Harris updated a uk registration application', '2025-04-02 12:02:58', '2025-04-02 12:02:58'),
(186, 649, 'Stuart Harris updated a uk registration application', '2025-04-02 12:12:13', '2025-04-02 12:12:13'),
(187, 649, 'Stuart Harris updated a uk registration application', '2025-04-02 12:13:23', '2025-04-02 12:13:23'),
(188, 649, 'Stuart Harris deleted a uk registration application', '2025-04-02 12:19:25', '2025-04-02 12:19:25'),
(189, 648, 'Victoria Ingram updated a uk registration application', '2025-04-02 12:47:04', '2025-04-02 12:47:04'),
(190, 708, 'Sarah Van Der Veen saved a uk registration application', '2025-04-02 15:57:54', '2025-04-02 15:57:54'),
(191, 710, 'Lead Solution Wealth Management saved a new offshore application', '2025-04-03 06:40:28', '2025-04-03 06:40:28'),
(192, 649, 'Stuart Harris updated a uk registration application', '2025-04-03 09:23:00', '2025-04-03 09:23:00'),
(193, 709, 'Richard Greenland saved a new offshore application', '2025-04-03 10:35:08', '2025-04-03 10:35:08'),
(194, 672, 'Harvey Plant saved a uk registration application', '2025-04-03 13:46:12', '2025-04-03 13:46:12'),
(195, 181, 'Muhammad Hamza saved a new member application', '2025-04-07 07:06:55', '2025-04-07 07:06:55'),
(196, 181, 'Muhammad Hamza updated an member application', '2025-04-07 07:07:20', '2025-04-07 07:07:20'),
(197, 714, 'Sami ullah saved a new member application', '2025-04-07 07:11:58', '2025-04-07 07:11:58'),
(198, 718, 'Daniel Dickinson saved a new offshore application', '2025-04-07 11:17:44', '2025-04-07 11:17:44'),
(199, 720, 'Sam Sussums saved a uk registration application', '2025-04-08 14:25:10', '2025-04-08 14:25:10'),
(200, 726, 'Alexander Hutton saved a new offshore application', '2025-04-14 10:59:43', '2025-04-14 10:59:43'),
(201, 184, 'Indulis saved a new offshore application', '2025-04-15 11:05:56', '2025-04-15 11:05:56'),
(202, 649, 'Stuart Harris deleted an offshore application', '2025-04-15 11:43:38', '2025-04-15 11:43:38'),
(203, 661, 'Robert David Wantenaar saved a new offshore application', '2025-04-15 11:53:51', '2025-04-15 11:53:51'),
(204, 729, 'Paul Smyth saved a uk registration application', '2025-04-16 15:27:56', '2025-04-16 15:27:56'),
(205, 663, 'Karishma Jagasia saved a new offshore application', '2025-04-17 05:46:57', '2025-04-17 05:46:57'),
(206, 732, 'Cameron r Knox saved a new offshore application', '2025-04-18 10:34:08', '2025-04-18 10:34:08'),
(207, 740, 'Matt Goodley saved a uk registration application', '2025-04-25 07:50:02', '2025-04-25 07:50:02'),
(208, 741, 'Deborah King saved the support ticket', '2025-04-25 10:24:51', '2025-04-25 10:24:51'),
(209, 738, 'Foysol Hussain saved a uk registration application', '2025-04-30 08:46:53', '2025-04-30 08:46:53'),
(210, 742, 'Richard Walker-Gunns saved a uk registration application', '2025-04-30 08:57:46', '2025-04-30 08:57:46'),
(211, 184, 'Indulis created a new user', '2025-05-02 08:56:39', '2025-05-02 08:56:39'),
(212, 184, 'Indulis updated a user', '2025-05-02 09:08:41', '2025-05-02 09:08:41'),
(213, 184, 'Indulis created a new user', '2025-05-02 09:09:01', '2025-05-02 09:09:01'),
(214, 184, 'Indulis updated a user', '2025-05-02 09:09:36', '2025-05-02 09:09:36'),
(215, 714, 'Sami ullah updated a user', '2025-05-05 05:31:10', '2025-05-05 05:31:10'),
(216, 714, 'Sami updated a user', '2025-05-05 05:31:29', '2025-05-05 05:31:29'),
(217, 714, 'Sami ullah updated a user', '2025-05-05 05:31:29', '2025-05-05 05:31:29'),
(218, 184, 'Indulis deleted a user', '2025-05-06 07:56:45', '2025-05-06 07:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `memberdetails`
--

CREATE TABLE `memberdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_name` text DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `national_insurance_number` text DEFAULT NULL,
  `tax_information_number` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `beneficiary_name` text DEFAULT NULL,
  `beneficiary_relationship` text DEFAULT NULL,
  `beneficiary_percentage` int(11) DEFAULT NULL,
  `adviser_fee_agreement` text DEFAULT NULL,
  `adviser_fee_details` text DEFAULT NULL,
  `transfer_request_received_date` date DEFAULT NULL,
  `ceding_scheme_name` text DEFAULT NULL,
  `ceding_scheme_reference` text DEFAULT NULL,
  `transfer_status` text DEFAULT NULL,
  `transfer_amount` int(11) DEFAULT NULL,
  `transfer_completion_date` date DEFAULT NULL,
  `crystallisation_status` text DEFAULT NULL,
  `contributing_employer` text DEFAULT NULL,
  `employer_name` text DEFAULT NULL,
  `mpaa_triggered` text DEFAULT NULL,
  `mpaa_trigger_date` date DEFAULT NULL,
  `contributions_received` text DEFAULT NULL,
  `bank_provider` text DEFAULT NULL,
  `account_name` text DEFAULT NULL,
  `sort_code` text DEFAULT NULL,
  `account_number` text DEFAULT NULL,
  `account_opened_date` date DEFAULT NULL,
  `holding_type` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `provider` text DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `latest_value` text DEFAULT NULL,
  `latest_value_date` date DEFAULT NULL,
  `protection_held` text DEFAULT NULL,
  `protection_details` text DEFAULT NULL,
  `lta_pre_06_04_24` text DEFAULT NULL,
  `converted_lump_sum_allowance` text DEFAULT NULL,
  `total_lsa_consumed` text DEFAULT NULL,
  `crystallisation_date` date DEFAULT NULL,
  `crystallisation_type` text DEFAULT NULL,
  `amount_crystallised` text DEFAULT NULL,
  `tax_free_lump_sum` text DEFAULT NULL,
  `sla_consumed_pre_06_04_24` text DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `net_payment` text DEFAULT NULL,
  `paye` text DEFAULT NULL,
  `net_in_tax_year` text DEFAULT NULL,
  `paye_in_tax_year` text DEFAULT NULL,
  `tax_code` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` bigint(11) UNSIGNED DEFAULT NULL,
  `creater_id` bigint(11) UNSIGNED DEFAULT NULL,
  `title` text DEFAULT NULL,
  `forename` text DEFAULT NULL,
  `surname` text DEFAULT NULL,
  `previous_name` text DEFAULT NULL,
  `from_date` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `postcode` text DEFAULT NULL,
  `telephone` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `homeowner` text DEFAULT NULL,
  `previous_address` text DEFAULT NULL,
  `ni_reason` text DEFAULT NULL,
  `nationality` text DEFAULT NULL,
  `ni_number` text DEFAULT NULL,
  `dob` text DEFAULT NULL,
  `pob` text DEFAULT NULL,
  `dual_nationality` text DEFAULT NULL,
  `nationality_countries` text DEFAULT NULL,
  `applicable_protection` text DEFAULT NULL,
  `dependents` text DEFAULT NULL,
  `marital_status` text DEFAULT NULL,
  `spouse_dob` text DEFAULT NULL,
  `pension_order` text DEFAULT NULL,
  `occupation` text DEFAULT NULL,
  `status_postcode` text DEFAULT NULL,
  `recent_occupation` text DEFAULT NULL,
  `employment_status` text DEFAULT NULL,
  `opted_out` text DEFAULT NULL,
  `pension_protection` text DEFAULT NULL,
  `annual_allowance` text DEFAULT NULL,
  `first_payment_date` text DEFAULT NULL,
  `tax_relief` text DEFAULT NULL,
  `income_employment` text DEFAULT NULL,
  `income_pension` text DEFAULT NULL,
  `income_savings` text DEFAULT NULL,
  `income_gifted` text DEFAULT NULL,
  `income_lottery` text DEFAULT NULL,
  `income_property` text DEFAULT NULL,
  `income_inheritance` text DEFAULT NULL,
  `income_divorce` text DEFAULT NULL,
  `income_other` text DEFAULT NULL,
  `assets_outside_uk` text DEFAULT NULL,
  `contribute_regular_contribution` text DEFAULT NULL,
  `contribute_single_contribution` text DEFAULT NULL,
  `payment_frequency` text DEFAULT NULL,
  `employer_pay` text DEFAULT NULL,
  `employer_name` text DEFAULT NULL,
  `registered_office` text DEFAULT NULL,
  `employee_postcode` text DEFAULT NULL,
  `telephone_number` text DEFAULT NULL,
  `employee_contact_name` text DEFAULT NULL,
  `email_address` text DEFAULT NULL,
  `trading_address` text DEFAULT NULL,
  `trading_postcode` text DEFAULT NULL,
  `fax_number` text DEFAULT NULL,
  `additional_telephone` text DEFAULT NULL,
  `regular_contribution` text DEFAULT NULL,
  `single_contribution` text DEFAULT NULL,
  `start_date` text DEFAULT NULL,
  `signature` text DEFAULT NULL,
  `print_name` text DEFAULT NULL,
  `position` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `financial_contact_name` text DEFAULT NULL,
  `financial_company_name` text DEFAULT NULL,
  `street_address` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `financial_postcode` text DEFAULT NULL,
  `financial_telephone_number` text DEFAULT NULL,
  `financial_fax_number` text DEFAULT NULL,
  `financial_email_address` text DEFAULT NULL,
  `regulated_by` text DEFAULT NULL,
  `authorisation_number` text DEFAULT NULL,
  `network_status` text DEFAULT NULL,
  `network_name` text DEFAULT NULL,
  `regulated_by_second` text DEFAULT NULL,
  `company_authorisation_number` text DEFAULT NULL,
  `initial_fees` text DEFAULT NULL,
  `frequency` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `relationship` text DEFAULT NULL,
  `percentage` text DEFAULT NULL,
  `type` text DEFAULT NULL,
  `investment_option` text DEFAULT NULL,
  `contact_name` text DEFAULT NULL,
  `investment_company_name` text DEFAULT NULL,
  `investment_address` text DEFAULT NULL,
  `investment_postcode` text DEFAULT NULL,
  `investment_telephone_number` text DEFAULT NULL,
  `investment_fax_number` text DEFAULT NULL,
  `investment_email_address` text DEFAULT NULL,
  `plan_type` text DEFAULT NULL,
  `take_benefits_soon` text DEFAULT NULL,
  `benefits_method` text DEFAULT NULL,
  `benefit_start_date` text DEFAULT NULL,
  `approx_amount` text DEFAULT NULL,
  `provider_name` text DEFAULT NULL,
  `other_benefits_address` text DEFAULT NULL,
  `other_benefits_postcode` text DEFAULT NULL,
  `other_telephone_number` text DEFAULT NULL,
  `other_fax_number` text DEFAULT NULL,
  `other_email_address` text DEFAULT NULL,
  `plan_scheme_type` text DEFAULT NULL,
  `is_occupational_scheme` text DEFAULT NULL,
  `plan_scheme_name` text DEFAULT NULL,
  `pension_scheme_tax_reference` text DEFAULT NULL,
  `fund_value` text DEFAULT NULL,
  `full_value_scheme` text DEFAULT NULL,
  `funds_crystallised` text DEFAULT NULL,
  `crystallised_method` text DEFAULT NULL,
  `defined_benefit` text DEFAULT NULL,
  `transfer_assets` text DEFAULT NULL,
  `bankruptcy_orders` text DEFAULT NULL,
  `scheme_protection` text DEFAULT NULL,
  `annuity_guarantee` text DEFAULT NULL,
  `block_transfer` text DEFAULT NULL,
  `funded_transfer` text DEFAULT NULL,
  `ceding_scheme` text DEFAULT NULL,
  `employer_contributions` text DEFAULT NULL,
  `personal_bank_payment` text DEFAULT NULL,
  `funds_outside_uk` text DEFAULT NULL,
  `other_signature` text DEFAULT NULL,
  `other_print_name` text DEFAULT NULL,
  `other_date` text DEFAULT NULL,
  `contact_consent` text DEFAULT NULL,
  `passing_contact_consent` text DEFAULT NULL,
  `contact_method` text DEFAULT NULL,
  `signature_consent` text DEFAULT NULL,
  `signatur_print_name` text DEFAULT NULL,
  `dependents_count` text DEFAULT NULL,
  `signature_date` text DEFAULT NULL,
  `signature_declaration` text DEFAULT NULL,
  `print_name_declaration` text DEFAULT NULL,
  `position_declaration` text DEFAULT NULL,
  `declaration_date` text DEFAULT NULL,
  `infor_company_name` text DEFAULT NULL,
  `entity_type` text DEFAULT NULL,
  `registered_address` text DEFAULT NULL,
  `registered_number` text DEFAULT NULL,
  `infor_country` text DEFAULT NULL,
  `company_info_postcode` text DEFAULT NULL,
  `nature_of_business` text DEFAULT NULL,
  `individual_verification` text DEFAULT NULL,
  `beneficial_verification` text DEFAULT NULL,
  `standard_verification` text DEFAULT NULL,
  `confirmation_letter` text DEFAULT NULL,
  `open_account` text DEFAULT NULL,
  `name_of_regulated_firm` text DEFAULT NULL,
  `regulator_name_reference` text DEFAULT NULL,
  `regulated_individual_name` text DEFAULT NULL,
  `regulated_individual_reference` text DEFAULT NULL,
  `part_f_signature` text DEFAULT NULL,
  `regulated_name` text DEFAULT NULL,
  `regulated_position` text DEFAULT NULL,
  `regulated_date` text DEFAULT NULL,
  `applicant_name` text DEFAULT NULL,
  `application_dob` text DEFAULT NULL,
  `applicant_address` text DEFAULT NULL,
  `application_country` text DEFAULT NULL,
  `applicant_info_postcode` text DEFAULT NULL,
  `changed_address` text DEFAULT NULL,
  `previous_country` text DEFAULT NULL,
  `previous_postcode` text DEFAULT NULL,
  `benefit_continuation` text DEFAULT NULL,
  `regulator_firm_name` text DEFAULT NULL,
  `regulator_reference` text DEFAULT NULL,
  `regulated_cer_individual_name` text DEFAULT NULL,
  `regulated_certification_individual_reference` text DEFAULT NULL,
  `certification_signature` text DEFAULT NULL,
  `certification_name` text DEFAULT NULL,
  `certification_position` text DEFAULT NULL,
  `certification_date` text DEFAULT NULL,
  `defined_fee` text DEFAULT NULL,
  `annual_fee_defined` text DEFAULT NULL,
  `date_fee` text DEFAULT NULL,
  `percentage_fund` text DEFAULT NULL,
  `annual_fee_fund` text DEFAULT NULL,
  `date_fund` text DEFAULT NULL,
  `gross_contribution` text DEFAULT NULL,
  `annual_fee_gross` text DEFAULT NULL,
  `date_gross` text DEFAULT NULL,
  `transfer_value` text DEFAULT NULL,
  `fee_transfer` text DEFAULT NULL,
  `payment_received` text DEFAULT NULL,
  `future_transfers` text DEFAULT NULL,
  `signature_member` text DEFAULT NULL,
  `print_name_member` text DEFAULT NULL,
  `date_member` text DEFAULT NULL,
  `adviser_network` text DEFAULT NULL,
  `name_of_network` text DEFAULT NULL,
  `network_payment` text DEFAULT NULL,
  `bank_name` text DEFAULT NULL,
  `branch` text DEFAULT NULL,
  `account_name` text DEFAULT NULL,
  `account_number` text DEFAULT NULL,
  `sort_code` text DEFAULT NULL,
  `signature_adviser` text DEFAULT NULL,
  `signature_segnature` text DEFAULT NULL,
  `name_adviser` text DEFAULT NULL,
  `position_adviser` text DEFAULT NULL,
  `date_adviser` text DEFAULT NULL,
  `company_stamp` text DEFAULT NULL,
  `pension_scheme_type` text DEFAULT NULL,
  `pension_scheme_name` text DEFAULT NULL,
  `pension_provider_name` text DEFAULT NULL,
  `professional_trustee_address` text DEFAULT NULL,
  `scheme_admin_address` text DEFAULT NULL,
  `employer_pay_premiums` text DEFAULT NULL,
  `hmrc_registration_number` text DEFAULT NULL,
  `alt_scheme_admin_address` text DEFAULT NULL,
  `statements_required` text DEFAULT NULL,
  `member_title` text DEFAULT NULL,
  `first_name` text DEFAULT NULL,
  `middle_name` text DEFAULT NULL,
  `member_surname` text DEFAULT NULL,
  `date_of_birth` text DEFAULT NULL,
  `tanee_member_gender` text DEFAULT NULL,
  `member_nationality` text DEFAULT NULL,
  `country_of_birth` text DEFAULT NULL,
  `home_telephone_number` text DEFAULT NULL,
  `mobile_number` text DEFAULT NULL,
  `member_email_address` text DEFAULT NULL,
  `current_address` text DEFAULT NULL,
  `date_moved_in` text DEFAULT NULL,
  `member_statements_required` text DEFAULT NULL,
  `is_member_trustee` text DEFAULT NULL,
  `is_online_banking_required` text DEFAULT NULL,
  `sipp_ssas_account` text DEFAULT NULL,
  `cheque_book_required` text DEFAULT NULL,
  `fixed_term_savings_sipp_ssas_account` text DEFAULT NULL,
  `assets_details` text DEFAULT NULL,
  `amount_to_be_deposited` text DEFAULT NULL,
  `benefits_future` text DEFAULT NULL,
  `term_months` text DEFAULT NULL,
  `professional_trustee_only` text DEFAULT NULL,
  `authorised_signatories` text DEFAULT NULL,
  `signing_instructions` text DEFAULT NULL,
  `fraud_prevention` text DEFAULT NULL,
  `declaration` text DEFAULT NULL,
  `certification` text DEFAULT NULL,
  `trustee_name` text DEFAULT NULL,
  `trustee_signature` text DEFAULT NULL,
  `trustee_date` text DEFAULT NULL,
  `company_name` text DEFAULT NULL,
  `company_address` text DEFAULT NULL,
  `company_post_code` text DEFAULT NULL,
  `company_telephone` text DEFAULT NULL,
  `contact_person` text DEFAULT NULL,
  `contact_email` text DEFAULT NULL,
  `part_one_surname` text DEFAULT NULL,
  `given_name` text DEFAULT NULL,
  `additional_name` text DEFAULT NULL,
  `honorific_title` text DEFAULT NULL,
  `part_one_gender` text DEFAULT NULL,
  `home_address` text DEFAULT NULL,
  `locality` text DEFAULT NULL,
  `zip_code` text DEFAULT NULL,
  `region` text DEFAULT NULL,
  `nation` text DEFAULT NULL,
  `birth_date` text DEFAULT NULL,
  `birthplace_city` text DEFAULT NULL,
  `birthplace_nation` text DEFAULT NULL,
  `tax_residence_country` text DEFAULT NULL,
  `tin_number` text DEFAULT NULL,
  `tin_reason` text DEFAULT NULL,
  `reason_b_explanation` text DEFAULT NULL,
  `tax_residence_more_than_three` text DEFAULT NULL,
  `confirm_all_residences` text DEFAULT NULL,
  `us_person` text DEFAULT NULL,
  `residency_mismatch_reason` text DEFAULT NULL,
  `additional_details` text DEFAULT NULL,
  `part_four_signature` text DEFAULT NULL,
  `signature_print_name` text DEFAULT NULL,
  `sign_date` date DEFAULT NULL,
  `capacity` text DEFAULT NULL,
  `protection_type` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`protection_type`)),
  `beneficiary_name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`beneficiary_name`)),
  `charity_name` text DEFAULT NULL,
  `charity_percentage` text DEFAULT NULL,
  `investment_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`investment_details`)),
  `controller_names` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`controller_names`)),
  `controller_dobs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`controller_dobs`)),
  `beneficial_owner_names` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`beneficial_owner_names`)),
  `beneficiary_dob` text DEFAULT NULL,
  `beneficiary_address` text DEFAULT NULL,
  `enhanced_protection` text DEFAULT NULL,
  `beneficial_owner_dobs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`beneficial_owner_dobs`)),
  `privacy_print_name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`privacy_print_name`)),
  `privacy_signature` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`privacy_signature`)),
  `privacy_position` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`privacy_position`)),
  `privacy_date` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`privacy_date`)),
  `funds_deposited_by` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`funds_deposited_by`)),
  `fees_paid_by` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`fees_paid_by`)),
  `status` enum('active','pending','decline') NOT NULL DEFAULT 'active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `role`, `creater_id`, `title`, `forename`, `surname`, `previous_name`, `from_date`, `address`, `country`, `postcode`, `telephone`, `email`, `gender`, `homeowner`, `previous_address`, `ni_reason`, `nationality`, `ni_number`, `dob`, `pob`, `dual_nationality`, `nationality_countries`, `applicable_protection`, `dependents`, `marital_status`, `spouse_dob`, `pension_order`, `occupation`, `status_postcode`, `recent_occupation`, `employment_status`, `opted_out`, `pension_protection`, `annual_allowance`, `first_payment_date`, `tax_relief`, `income_employment`, `income_pension`, `income_savings`, `income_gifted`, `income_lottery`, `income_property`, `income_inheritance`, `income_divorce`, `income_other`, `assets_outside_uk`, `contribute_regular_contribution`, `contribute_single_contribution`, `payment_frequency`, `employer_pay`, `employer_name`, `registered_office`, `employee_postcode`, `telephone_number`, `employee_contact_name`, `email_address`, `trading_address`, `trading_postcode`, `fax_number`, `additional_telephone`, `regular_contribution`, `single_contribution`, `start_date`, `signature`, `print_name`, `position`, `date`, `financial_contact_name`, `financial_company_name`, `street_address`, `city`, `financial_postcode`, `financial_telephone_number`, `financial_fax_number`, `financial_email_address`, `regulated_by`, `authorisation_number`, `network_status`, `network_name`, `regulated_by_second`, `company_authorisation_number`, `initial_fees`, `frequency`, `name`, `relationship`, `percentage`, `type`, `investment_option`, `contact_name`, `investment_company_name`, `investment_address`, `investment_postcode`, `investment_telephone_number`, `investment_fax_number`, `investment_email_address`, `plan_type`, `take_benefits_soon`, `benefits_method`, `benefit_start_date`, `approx_amount`, `provider_name`, `other_benefits_address`, `other_benefits_postcode`, `other_telephone_number`, `other_fax_number`, `other_email_address`, `plan_scheme_type`, `is_occupational_scheme`, `plan_scheme_name`, `pension_scheme_tax_reference`, `fund_value`, `full_value_scheme`, `funds_crystallised`, `crystallised_method`, `defined_benefit`, `transfer_assets`, `bankruptcy_orders`, `scheme_protection`, `annuity_guarantee`, `block_transfer`, `funded_transfer`, `ceding_scheme`, `employer_contributions`, `personal_bank_payment`, `funds_outside_uk`, `other_signature`, `other_print_name`, `other_date`, `contact_consent`, `passing_contact_consent`, `contact_method`, `signature_consent`, `signatur_print_name`, `dependents_count`, `signature_date`, `signature_declaration`, `print_name_declaration`, `position_declaration`, `declaration_date`, `infor_company_name`, `entity_type`, `registered_address`, `registered_number`, `infor_country`, `company_info_postcode`, `nature_of_business`, `individual_verification`, `beneficial_verification`, `standard_verification`, `confirmation_letter`, `open_account`, `name_of_regulated_firm`, `regulator_name_reference`, `regulated_individual_name`, `regulated_individual_reference`, `part_f_signature`, `regulated_name`, `regulated_position`, `regulated_date`, `applicant_name`, `application_dob`, `applicant_address`, `application_country`, `applicant_info_postcode`, `changed_address`, `previous_country`, `previous_postcode`, `benefit_continuation`, `regulator_firm_name`, `regulator_reference`, `regulated_cer_individual_name`, `regulated_certification_individual_reference`, `certification_signature`, `certification_name`, `certification_position`, `certification_date`, `defined_fee`, `annual_fee_defined`, `date_fee`, `percentage_fund`, `annual_fee_fund`, `date_fund`, `gross_contribution`, `annual_fee_gross`, `date_gross`, `transfer_value`, `fee_transfer`, `payment_received`, `future_transfers`, `signature_member`, `print_name_member`, `date_member`, `adviser_network`, `name_of_network`, `network_payment`, `bank_name`, `branch`, `account_name`, `account_number`, `sort_code`, `signature_adviser`, `signature_segnature`, `name_adviser`, `position_adviser`, `date_adviser`, `company_stamp`, `pension_scheme_type`, `pension_scheme_name`, `pension_provider_name`, `professional_trustee_address`, `scheme_admin_address`, `employer_pay_premiums`, `hmrc_registration_number`, `alt_scheme_admin_address`, `statements_required`, `member_title`, `first_name`, `middle_name`, `member_surname`, `date_of_birth`, `tanee_member_gender`, `member_nationality`, `country_of_birth`, `home_telephone_number`, `mobile_number`, `member_email_address`, `current_address`, `date_moved_in`, `member_statements_required`, `is_member_trustee`, `is_online_banking_required`, `sipp_ssas_account`, `cheque_book_required`, `fixed_term_savings_sipp_ssas_account`, `assets_details`, `amount_to_be_deposited`, `benefits_future`, `term_months`, `professional_trustee_only`, `authorised_signatories`, `signing_instructions`, `fraud_prevention`, `declaration`, `certification`, `trustee_name`, `trustee_signature`, `trustee_date`, `company_name`, `company_address`, `company_post_code`, `company_telephone`, `contact_person`, `contact_email`, `part_one_surname`, `given_name`, `additional_name`, `honorific_title`, `part_one_gender`, `home_address`, `locality`, `zip_code`, `region`, `nation`, `birth_date`, `birthplace_city`, `birthplace_nation`, `tax_residence_country`, `tin_number`, `tin_reason`, `reason_b_explanation`, `tax_residence_more_than_three`, `confirm_all_residences`, `us_person`, `residency_mismatch_reason`, `additional_details`, `part_four_signature`, `signature_print_name`, `sign_date`, `capacity`, `protection_type`, `beneficiary_name`, `charity_name`, `charity_percentage`, `investment_details`, `controller_names`, `controller_dobs`, `beneficial_owner_names`, `beneficiary_dob`, `beneficiary_address`, `enhanced_protection`, `beneficial_owner_dobs`, `privacy_print_name`, `privacy_signature`, `privacy_position`, `privacy_date`, `funds_deposited_by`, `fees_paid_by`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(127, 715, 181, 'Quis suscipit eiusmo', 'Hedda Stevenson', 'Fowler', 'Casey Chapman', '1992-06-07', 'Pariatur Amet veni', 'South Africa', 'Voluptates aliquam a', '+1 (443) 181-9125', 'vexubohe@mailinator.com', 'null', NULL, 'Anim est cupiditate', 'In quidem maxime ven', 'Bahraini', '420', '2002-12-23', 'Placeat natus persp', NULL, 'Eiusmod consectetur', NULL, NULL, '\"Single\"', '2010-04-23', NULL, 'Qui omnis deleniti f', 'Non dolor eligendi c', 'Veniam voluptas qui', 'student', NULL, NULL, NULL, '1984-03-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[null]', '[null]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Demetrius Acevedo', '1976-11-29', 'Autem beatae aliquid', 'China', 'Natus minima cillum', '8', 'Bahrain', 'Quasi consectetur q', NULL, 'Reuben Velasquez', 'TaShya Edwards', 'Emerald Cook', 'Chaim Martinez', NULL, 'Duncan Ayers', NULL, NULL, 'Qui impedit soluta', 'Eos vero a aspernat', '1988-10-29', 'Aut architecto sapie', 'Quia exercitation ad', '1973-12-02', 'Officia quidem est c', 'Quidem rerum porro u', '1976-08-10', 'Eiusmod est id place', 'Do sunt provident q', '2011-09-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'In omnis perspiciati', 'Scarlett Dale', 'Bell Heath', 'Sed voluptatem laud', 'Pariatur Blanditiis', NULL, '314', 'Aperiam dolore sit', NULL, '[null]', '\"[null]\"', '\"[null]\"', '\"[null]\"', '\"[null]\"', '[null]', '\"\\\"null\\\"\"', '\"\\\"null\\\"\"', '\"[null]\"', '\"[null]\"', '\"[null]\"', '[null]', '\"[null]\"', '[\"Yes\"]', '[\"Yes\"]', '[\"Yes\"]', 'null', 'null', 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '\"[null]\"', '\"null\"', '\"[null]\"', NULL, NULL, NULL, NULL, NULL, NULL, 'Coleman', 'Bruce Hardy', 'Oprah Chan', 'Ms', 'Female', 'Aperiam quaerat id i', 'Neque et et libero e', '74627', 'Unde sed porro solut', 'Albania', '1987-03-20', 'Blanditiis mollitia', 'Saudi Arabia', '\"[null]\"', '\"[null]\"', '\"[\\\", ,\\\",\\\", ,\\\",\\\", ,\\\"]\"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', '[null]', '[null]', '[null]', 'null', '[null]', '[null]', '[null]', NULL, NULL, NULL, '[null]', '\"[null]\"', '\"null\"', '\"[null]\"', '\"[null]\"', 'null', 'null', 'pending', NULL, '2025-04-07 07:06:54', '2025-04-07 07:07:20'),
(128, 716, 714, 'Nisi quo amet aut e', 'Judah Deleon', 'Pacheco', 'MacKensie Eaton', '1991-07-20', 'Possimus molestiae', 'Belize', 'Accusamus reprehende', '+1 (454) 491-8679', 'wugikegom@mailinator.com', '\"Male\"', 'Yes', 'Magna nihil expedita', 'Autem rerum molestia', 'British', '300', '2006-02-22', 'Aspernatur nisi illo', 'No', 'Consequatur et exer', NULL, 'Yes', '\"widowed\"', '2024-09-13', 'Yes', 'Laboriosam qui esse', 'Non similique esse s', 'Fuga Consequuntur q', 'self_employed', NULL, 'No', 'Yes', '1971-06-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[null]', '[null]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '17', NULL, NULL, NULL, NULL, NULL, 'Conley Garcia Co', 'Do sint occaecat su', 'Porro minim omnis qu', '470', 'United States', 'Blankenship Conner Trading', 'Repudiandae quis des', NULL, 'on', NULL, 'on', NULL, 'Simon Chen', 'Stone Alexander', 'Hayden Sellers', 'Hanna Brady', NULL, NULL, NULL, NULL, 'Regan Gonzalez', '2014-05-22', 'Eveniet blanditiis', 'Chile', 'A non adipisci ex re', '7', 'Philippines', 'Eu deleniti et magna', NULL, 'Ciara Palmer', 'Giacomo Floyd', 'Alden York', 'Medge Gilmore', NULL, 'Chantale Acosta', NULL, NULL, 'Ea ipsa unde rem ad', 'Incididunt officia a', '1975-01-20', 'Veritatis expedita r', 'Quasi dolor proident', '2013-01-17', 'Iure esse non susci', 'Voluptatem Sapiente', '1975-05-15', 'Ratione consequatur', 'Voluptate in reprehe', '1970-02-14', 'Yes', NULL, NULL, NULL, 'No', 'Lawrence Figueroa', 'No', 'Colette Murphy', 'Enim non quae volupt', 'Leandra Jenkins', '823', 'Veniam est cumque d', NULL, NULL, 'Libby Huff', 'Occaecat in commodo', '2005-10-31', 'Vance and Pierce LLC', 'Quis voluptate volup', 'Alyssa Hoover', 'Athena Stone', 'Consequuntur rerum e', 'Qui ratione cumque a', 'No', '884', 'Sunt voluptatem est', 'Yes', '[null]', '\"[null]\"', '\"[null]\"', '\"[null]\"', '\"[null]\"', '[null]', '\"null\"', '\"null\"', '\"[null]\"', '\"[null]\"', '\"[null]\"', '[null]', '\"[null]\"', '[\"Yes\"]', '[\"Yes\"]', '[\"Yes\"]', 'null', 'null', 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '\"[null]\"', '\"null\"', '\"[null]\"', NULL, NULL, NULL, NULL, NULL, NULL, 'Frost', 'Riley Good', 'Timon Walter', 'Miss', 'Female', 'Quae ullamco sint d', 'Deleniti cupidatat d', '30413', 'Vel voluptate dolore', 'Spain', '2013-02-06', 'Eos aut velit et de', 'Azerbaijan', '\"null\"', '\"[null]\"', '\"[null,null,null]\"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', '[null]', '[null]', '[null]', 'null', '[\"Dixon Fulton Co\"]', '[\"1973-05-21\"]', '[\"Kevyn Alvarez\"]', NULL, NULL, NULL, '[\"2007-02-11\"]', '\"[null]\"', '\"null\"', '\"[null]\"', '\"[null]\"', 'null', 'null', 'pending', NULL, '2025-04-07 07:11:57', '2025-04-07 07:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(255) NOT NULL,
  `sender_id` text DEFAULT NULL,
  `role` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` text NOT NULL DEFAULT 'unseen',
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_10_11_073925_create_faqs_table', 1),
(7, '2024_10_11_080604_create_tickets_table', 1),
(8, '2024_10_11_091927_create_supports_table', 1),
(9, '2024_10_11_185741_create_advisers_table', 1),
(10, '2024_10_12_161131_add_column_to_advisers_table', 1),
(11, '2024_10_12_161719_change_column_name_in_advisers_table', 1),
(12, '2024_10_14_054346_create_members_table', 1),
(13, '2024_10_14_060719_create_fpts_table', 1),
(14, '2024_10_14_163758_create_leads_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offshores`
--

CREATE TABLE `offshores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `selected_adviser_id` bigint(20) DEFAULT NULL,
  `creater_id` int(11) DEFAULT NULL,
  `company_name` text DEFAULT NULL,
  `trading_as` text DEFAULT NULL,
  `type` text DEFAULT NULL,
  `other_details` text DEFAULT NULL,
  `main_contact` text DEFAULT NULL,
  `additional_details` text DEFAULT NULL,
  `surname_surname` text DEFAULT NULL,
  `forename` text DEFAULT NULL,
  `previous_names` text DEFAULT NULL,
  `registered_address` text DEFAULT NULL,
  `registered_country` text DEFAULT NULL,
  `registered_post_code` text DEFAULT NULL,
  `physical_address` text DEFAULT NULL,
  `physical_country` text DEFAULT NULL,
  `physical_post_code` text DEFAULT NULL,
  `office_number` text DEFAULT NULL,
  `direct_line` text DEFAULT NULL,
  `mobile_number` text DEFAULT NULL,
  `email_address` text DEFAULT NULL,
  `website` text DEFAULT NULL,
  `financial_adviser` text DEFAULT NULL,
  `insurance_broker` text DEFAULT NULL,
  `asset_manager` text DEFAULT NULL,
  `accountant` text DEFAULT NULL,
  `tax_adviser` text DEFAULT NULL,
  `lawyer` text DEFAULT NULL,
  `other_business_activity` text DEFAULT NULL,
  `other_business_specify` text DEFAULT NULL,
  `licensing_body` text DEFAULT NULL,
  `licensing_reference` text DEFAULT NULL,
  `restrictions` text DEFAULT NULL,
  `restrictions_imposed` text DEFAULT NULL,
  `insurance` text DEFAULT NULL,
  `investment` text DEFAULT NULL,
  `regulatory_visit` text DEFAULT NULL,
  `date_follow` text DEFAULT NULL,
  `areas_review` text DEFAULT NULL,
  `highlighted_review` text DEFAULT NULL,
  `percentage_breakdown` text DEFAULT NULL,
  `professional_indemnity` text DEFAULT NULL,
  `cyber_insurance` text DEFAULT NULL,
  `face_to_face` text DEFAULT NULL,
  `non_face_policy` text DEFAULT NULL,
  `high_risk` text DEFAULT NULL,
  `standard_risk` text DEFAULT NULL,
  `low_risk` text DEFAULT NULL,
  `sanctioned` text DEFAULT NULL,
  `refer` text DEFAULT NULL,
  `client_risk` text DEFAULT NULL,
  `kyc_revisit` text DEFAULT NULL,
  `accept_peps` text DEFAULT NULL,
  `pep_policy` text DEFAULT NULL,
  `due_diligence` text DEFAULT NULL,
  `provide_details` text DEFAULT NULL,
  `collectDetails` text DEFAULT NULL,
  `writtenPolicies` text DEFAULT NULL,
  `reviewDocuments` text DEFAULT NULL,
  `updatedDocuments` text DEFAULT NULL,
  `amlPolicies` text DEFAULT NULL,
  `trainingFrequency` text DEFAULT NULL,
  `internalCompliance` text DEFAULT NULL,
  `complianceApproval` text DEFAULT NULL,
  `complianceComments` text DEFAULT NULL,
  `countryLists_highRisk` text DEFAULT NULL,
  `countryLists_fatf` text DEFAULT NULL,
  `countryLists_sanctioned` text DEFAULT NULL,
  `countryLists_corruption` text DEFAULT NULL,
  `countryLists_complianceAlert` text DEFAULT NULL,
  `countryLists_drugTrafficking` text DEFAULT NULL,
  `additionalComments` text DEFAULT NULL,
  `screenSystems` text DEFAULT NULL,
  `identifyHighRisk` text DEFAULT NULL,
  `recordDetails_intended` text DEFAULT NULL,
  `recordDetails_expected` text DEFAULT NULL,
  `recordDetails_perTransaction` text DEFAULT NULL,
  `yes_details` text DEFAULT NULL,
  `risk_assessment` text DEFAULT NULL,
  `risk_details` text DEFAULT NULL,
  `client_fee_structure` text DEFAULT NULL,
  `investment_products` text DEFAULT NULL,
  `products_details` text DEFAULT NULL,
  `platform_WRAP` text DEFAULT NULL,
  `funds_platform` text DEFAULT NULL,
  `market_investments` text DEFAULT NULL,
  `restricted_mass` text DEFAULT NULL,
  `advisory_stockbroker` text DEFAULT NULL,
  `model_portfolios` text DEFAULT NULL,
  `investments_defined` text DEFAULT NULL,
  `structured_deposits` text DEFAULT NULL,
  `deposit_accounts` text DEFAULT NULL,
  `commercial_property` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `please_details` text DEFAULT NULL,
  `surname` text DEFAULT NULL,
  `forenames` text DEFAULT NULL,
  `profession` text DEFAULT NULL,
  `qualifications` text DEFAULT NULL,
  `certifiers_address` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `post_code` text DEFAULT NULL,
  `company_structure_chart` text DEFAULT NULL,
  `company_register_shareholder` text DEFAULT NULL,
  `company_authorised_signatory` text DEFAULT NULL,
  `appointed_text` text DEFAULT NULL,
  `adviser_multifiles` text DEFAULT NULL,
  `full_name_1` text DEFAULT NULL,
  `position_1` text DEFAULT NULL,
  `signature_1` text DEFAULT NULL,
  `date_signed_1` text DEFAULT NULL,
  `full_name_2` text DEFAULT NULL,
  `position_2` text DEFAULT NULL,
  `signature_2` text DEFAULT NULL,
  `date_signed_2` text DEFAULT NULL,
  `date_received` text DEFAULT NULL,
  `date_approved` text DEFAULT NULL,
  `approved_by` text DEFAULT NULL,
  `approval_signature` text DEFAULT NULL,
  `status` enum('pending','active','decline') NOT NULL DEFAULT 'pending',
  `admin_country` text DEFAULT NULL,
  `flag` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offshores`
--

INSERT INTO `offshores` (`id`, `selected_adviser_id`, `creater_id`, `company_name`, `trading_as`, `type`, `other_details`, `main_contact`, `additional_details`, `surname_surname`, `forename`, `previous_names`, `registered_address`, `registered_country`, `registered_post_code`, `physical_address`, `physical_country`, `physical_post_code`, `office_number`, `direct_line`, `mobile_number`, `email_address`, `website`, `financial_adviser`, `insurance_broker`, `asset_manager`, `accountant`, `tax_adviser`, `lawyer`, `other_business_activity`, `other_business_specify`, `licensing_body`, `licensing_reference`, `restrictions`, `restrictions_imposed`, `insurance`, `investment`, `regulatory_visit`, `date_follow`, `areas_review`, `highlighted_review`, `percentage_breakdown`, `professional_indemnity`, `cyber_insurance`, `face_to_face`, `non_face_policy`, `high_risk`, `standard_risk`, `low_risk`, `sanctioned`, `refer`, `client_risk`, `kyc_revisit`, `accept_peps`, `pep_policy`, `due_diligence`, `provide_details`, `collectDetails`, `writtenPolicies`, `reviewDocuments`, `updatedDocuments`, `amlPolicies`, `trainingFrequency`, `internalCompliance`, `complianceApproval`, `complianceComments`, `countryLists_highRisk`, `countryLists_fatf`, `countryLists_sanctioned`, `countryLists_corruption`, `countryLists_complianceAlert`, `countryLists_drugTrafficking`, `additionalComments`, `screenSystems`, `identifyHighRisk`, `recordDetails_intended`, `recordDetails_expected`, `recordDetails_perTransaction`, `yes_details`, `risk_assessment`, `risk_details`, `client_fee_structure`, `investment_products`, `products_details`, `platform_WRAP`, `funds_platform`, `market_investments`, `restricted_mass`, `advisory_stockbroker`, `model_portfolios`, `investments_defined`, `structured_deposits`, `deposit_accounts`, `commercial_property`, `title`, `please_details`, `surname`, `forenames`, `profession`, `qualifications`, `certifiers_address`, `country`, `post_code`, `company_structure_chart`, `company_register_shareholder`, `company_authorised_signatory`, `appointed_text`, `adviser_multifiles`, `full_name_1`, `position_1`, `signature_1`, `date_signed_1`, `full_name_2`, `position_2`, `signature_2`, `date_signed_2`, `date_received`, `date_approved`, `approved_by`, `approval_signature`, `status`, `admin_country`, `flag`, `created_at`, `updated_at`, `deleted_at`) VALUES
(85, NULL, 652, 'test', 'asd', NULL, 'asd', NULL, NULL, NULL, NULL, 'asd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '234', '234', 'asd@asd.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '2025-03-07 17:26:16', '2025-03-07 17:31:45', '2025-03-07 17:31:45'),
(86, NULL, 653, 'Ballistic Money SL', 'Ballistic Investments Inc. SL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '2025-03-10 12:04:23', '2025-03-11 12:03:33', '2025-03-11 12:03:33'),
(87, NULL, 181, 'smai ullah', 'Itaque sequi animi', 'Partnership', 'In aliquam illum di', 'Mr', 'Ipsum impedit odio', 'Tanner', 'Cadman Figueroa', 'Yoshi Petty', 'Et incididunt ut qui', 'United States', 'https://www.pabyxipu.mobi', 'Duis illum quia sin', 'Zambia', 'https://www.vod.biz', '440', 'Magni sit et qui rem', '793', 'bifali@mailinator.com', 'https://www.ziq.com.au', 'yes', 'yes', NULL, 'yes', 'yes', NULL, 'yes', 'Nihil velit Nam offi', 'Consectetur commodi', 'Id ad omnis ut est', 'on', 'Labore quia consecte', NULL, 'yes', '2011-11-15', '2024-03-06', 'on', 'Mollitia non beatae', 'Quo dolore aut volup', 'Duis sit reprehender', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '2025-03-10 15:15:45', '2025-03-11 12:03:41', '2025-03-11 12:03:41'),
(88, NULL, 181, 'Bullock and Ingram Trading', 'Mollit esse possimus', 'Partnership', 'Sunt quis eum omnis', 'Other', 'Hic voluptate labori', 'Burt', 'Abdul Ferrell', 'Micah Whitfield', 'Eos qui commodi et', 'Botswana', 'https://www.wyzoryfovolob.net', 'Tempor tenetur eos f', 'Austria', 'https://www.kuvyv.mobi', '887', 'Deleniti fugiat volu', '936', 'miti@mailinator.com', 'https://www.magytixuxu.co', 'yes', 'yes', NULL, 'yes', 'yes', NULL, 'yes', 'Ducimus corrupti e', 'Ad laboris qui eaque', 'Non quaerat ex minim', 'on', 'Soluta ipsum nulla p', 'yes', NULL, '2004-11-22', '2000-05-24', 'on', 'Incididunt quam enim', 'Voluptates ut illo n', 'Fugiat maiores anim', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '2025-03-10 15:27:20', '2025-03-11 12:03:49', '2025-03-11 12:03:49'),
(89, NULL, 653, 'Ballistic Money SL', 'Ballistic Investments Inc. SL', 'Company', 'ebaab', 'Mr', NULL, 'Perez', 'Bolivar', NULL, 'KENSINGTON GARDENS, NO. U1317, LOT 7616, JALAN JUMIDAR BUYONG, LABUAN F.T.', 'Malaysia', '29651', NULL, 'Mexico', '29651', '24', '34634601139', '634601139', 'dpb2105esp@gmail.com', 'hjkftyfs.com', NULL, 'yes', 'yes', NULL, NULL, 'yes', NULL, NULL, 'FRN28719', 'RN28963', 'on', NULL, NULL, NULL, '2024-08-14', '2024-12-19', 'on', NULL, NULL, 'FR199 Level 9 issued by FHAO', 'on', 'Yes', 'Yes', '20', '60', '20', 'Yes', 'Yes', 'Yes', 'annually', 'Yes', 'Yes', 'Yes', NULL, 'Yes', 'yes', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'yes', 'yes', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'yes', 'MELBOURNE CAPITAL GROUP LTD', NULL, 'highRisk', NULL, 'sanctioned', 'corruption', NULL, NULL, NULL, 'yes', 'yes', NULL, 'expected', NULL, NULL, 'Yes', NULL, NULL, 'No', NULL, 'Platform / WRAP', NULL, 'Non Mass Market Investments', NULL, NULL, 'DFM / Model Portfolios', NULL, NULL, NULL, NULL, 'Lord', NULL, 'Perez', 'David', 'Planetary287143', 'High', 'KENSINGTON GARDENS, NO. U1317, LOT 7616, JALAN JUMIDAR BUYONG, LABUAN F.T.', 'Malaysia', '29651', '/storage/app/public/documents/1741621638_ghi1.pdf', '/storage/app/public/documents/1741621638_ghi4.pdf', '/storage/app/public/documents/1741621638_def2.txt', 'e@mail.com', '[\"https:\\/\\/www.alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1741621638_ghi1.pdf\",\"https:\\/\\/www.alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1741621638_ghi2.pdf\",\"https:\\/\\/www.alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1741621638_ghi3.pdf\",\"https:\\/\\/www.alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1741621638_ghi4.pdf\",\"https:\\/\\/www.alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1741621638_jkl.docx\"]', 'David Perez', 'Director', NULL, '2025-03-10', 'SEO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '2025-03-10 15:47:18', '2025-03-11 12:03:55', '2025-03-11 12:03:55'),
(90, NULL, 655, 'Harper Copeland Inc', 'Enim magna quisquam', 'Other', 'Qui qui corporis mol', 'Miss', 'Quibusdam laboriosam', 'Patrick', 'Alexandra England', 'Kane Rollins', 'Sequi non ut volupta', 'Congo (Congo-Brazzaville)', 'https://www.kixulun.ws', 'Id consequat Labor', 'New Zealand', 'https://www.kycokyp.net', '704', 'Hic sunt alias molli', '555', 'camugovena@mailinator.com', 'https://www.xocemivo.me.uk', 'yes', NULL, NULL, NULL, NULL, 'yes', NULL, 'Elit est molestiae', 'Qui ea iste sit amet', 'Est sed laudantium', 'on', 'Nisi vel rem magna a', 'yes', 'yes', '1971-05-18', '1993-09-28', 'on', 'Exercitation aliquip', 'Velit amet volupta', 'Quasi totam voluptat', 'on', 'Yes', 'No', '59', '53', '88', 'No', 'No', 'No', 'Quae sit consectetu', 'Yes', 'No', 'Yes', 'Dolore ipsam corpori', 'Yes', 'no', 'Qui rerum dolorem ip', 'no', 'yes', 'Cupiditate ab totam', 'no', 'Necessitatibus itaqu', 'Quaerat eu perferend', 'highRisk', 'fatf', NULL, NULL, NULL, 'drugTrafficking', 'Esse fugiat cumque', 'no', 'no', NULL, NULL, 'perTransaction', 'Ea labore praesentiu', 'No', 'In in eaque ut minus', 'Harum architecto nih', 'No', 'Non in eos rerum ar', NULL, 'Funds (direct not via a Platform)', NULL, 'Restricted Mass Market Investments', NULL, NULL, NULL, 'Structured Deposits', NULL, NULL, 'Officia placeat acc', 'Quam voluptas eum qu', 'Miles', 'Mira Gibson', 'Garrett Burris', 'Consequatur soluta a', 'Cumque consequuntur', 'Afghanistan', 'A deleniti natus ali', NULL, NULL, NULL, 'Ducimus sequi proid', NULL, 'Salvador Stout', 'Aliquip facere sunt', NULL, '2013-07-01', 'Laborum numquam ulla', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '2025-03-10 16:04:10', '2025-03-11 12:04:01', '2025-03-11 12:04:01'),
(91, NULL, 181, 'Greer Edwards Traders', 'Labore quaerat sit', 'Company', 'Qui odio voluptatem', 'Dr', 'Saepe qui aut atque', 'Dominguez', 'Stone Frost', 'Rose Mann', 'Odit dolorem adipisi', 'Ethiopia', 'https://www.gedunepujovugo.tv', 'Dolor magna saepe in', 'India', 'https://www.cohelep.cc', '258', 'Ut qui dolore fugiat', '197', 'gocuzosoha@mailinator.com', 'https://www.fijal.biz', 'yes', NULL, NULL, 'yes', 'yes', 'yes', 'yes', 'Sunt dolor iusto aut', 'Placeat enim recusa', 'Totam temporibus qua', 'on', 'Voluptatem Eum vita', 'yes', NULL, '1996-08-12', '1977-05-06', 'on', 'Magnam qui dolore qu', 'Possimus veritatis', 'Recusandae Id saep', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Leslie Hartman', 'Quo perspiciatis ne', NULL, '2007-05-14', 'Eveniet aut sit err', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '2025-03-11 07:32:13', '2025-03-11 12:04:07', '2025-03-11 12:04:07'),
(92, NULL, 184, 'Examples', 'examples', 'Partnership', NULL, 'Other', 'lll', 'asd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', NULL, '50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '2025-03-11 08:16:48', '2025-03-11 12:04:12', '2025-03-11 12:04:12'),
(93, NULL, 181, 'ali', 'Tempora libero unde', 'Other', 'Quis reiciendis ad e', 'Dr', 'Quia repellendus Es', 'Spencer', 'Harrison Mcclain', 'Barclay Pollard', 'Sunt molestiae aute', 'Djibouti', 'https://www.tykulabuwyb.org.uk', 'Eum aliqua Perferen', 'Andorra', 'https://www.hili.cc', '203', 'Dolor dolores possim', '267', 'fyxibyrypu@mailinator.com', 'https://www.miliqekopileh.org.au', NULL, NULL, NULL, 'yes', 'yes', 'yes', 'yes', 'Omnis fugiat ad veli', 'Voluptatem fugiat eo', 'Consequatur qui mol', 'on', 'Libero sequi eius nu', 'yes', 'yes', '1984-08-12', '2014-12-08', 'on', 'Dolores omnis dolore', 'Ut sunt et sunt quis', 'Enim explicabo Culp', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '2025-03-11 08:28:02', '2025-03-11 12:04:17', '2025-03-11 12:04:17'),
(94, NULL, 181, 'anti irha', 'Cumque nihil perspic', 'Partnership', 'Aut blanditiis ut au', 'Mr', 'Voluptas sed ut accu', NULL, 'Serina Albert', 'Porter Moran', 'Dolorem quisquam eve', 'South Africa', 'https://www.lezar.mobi', 'Provident similique', 'Spain', 'https://www.rek.cm', '555', 'Repudiandae cupidita', '186', 'livihogo@mailinator.com', 'https://www.nifibyhydiheweg.org.uk', NULL, 'yes', 'yes', 'yes', NULL, 'yes', 'yes', 'Ea do numquam ut ver', 'Praesentium ipsa ne', 'Molestias obcaecati', NULL, 'In earum sint aliqui', 'yes', 'yes', '1981-07-19', '2015-07-05', NULL, 'Perferendis est dol', 'Sint fugiat et sed', 'Facere maxime cumque', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '2025-03-11 08:39:21', '2025-03-11 12:04:24', '2025-03-11 12:04:24'),
(95, NULL, 665, 'Chartwell Associates Pte Ltd', 'Chartwell Associates Pte Ltd', 'Company', NULL, 'Mr', NULL, NULL, 'Chris', NULL, '16 Mornington Crescent', 'Singapore', '798650', NULL, 'Singapore', '409043', '+65 8786 0010', NULL, '+65 8786 0010', 'admin@chartwell-associates.com', 'chartwell-associates.com', 'yes', NULL, 'yes', NULL, NULL, NULL, NULL, NULL, 'Monetary Authority of Singapore (MAS)', 'FA100027', 'no', NULL, 'yes', 'yes', '2015-01-01', NULL, 'no', NULL, 'Singapore 100%', 'SGD1,000,000', 'yes', 'No', 'Yes', '0', '20', '80', 'No', 'No', 'Yes', 'annually', 'Yes', 'Yes', 'Yes', 'We do nit deal with any potential clinets from any high risk jurisdictions.\r\nAny potential client who is a PEP or has relations with a PEP undergoes enhanced DD and is vetted by senior management to decide whether to onboard tem as clients. \r\nAll enhanced DD follows MAS regulations and guidence. At this time we have no PEP\'s  as clinets', NULL, NULL, 'annually with our Compliance and procedures manuals', NULL, NULL, 'annually', NULL, 'Before and after any sales and before any application is sent to product providers', 'All business is checked by one of the Directors of the company BEFORE and AFTER clinets sign any applications and BEFORE any business is submitted to product providers', 'highRisk', 'fatf', 'sanctioned', 'corruption', 'complianceAlert', 'drugTrafficking', 'Folllowing FATF lists', 'yes', 'yes', 'intended', 'expected', 'perTransaction', NULL, 'Yes', 'yes and this is reviewed regularly', 'We are Fee- Based Financial Advisers.\r\nWe charge for writing Financial Plans (between SGD2,500 -SGD10,ooo depending on complexxity)\r\nWe charge an implementation  fee for setting up any plans/products\r\nand an AMC for assets under management\r\nWe do not sell commission products and do nit take indemnified commission\r\nThere are very few Fee-Based adviser in Singapore, with most advisers still selling high commission products and receiving  up to 85% commission.', 'No', NULL, 'Platform / WRAP', NULL, NULL, NULL, NULL, 'DFM / Model Portfolios', NULL, NULL, 'Deposit Accounts', NULL, 'Mr', NULL, 'Hubbard', 'Lon Curtis', 'Association of Financial Advisers (Singapore)', 'All relevant & required Singapore FA qualifications', '58 Joo Hiat Lane,  04-05', 'Singapore', '428109', '/storage/app/public/documents/1741781662_Company_summary_2025.pdf', '/storage/app/public/documents/1741781662_Chartwell_Bizfile_241219.pdf', NULL, NULL, NULL, 'Chris Potter', 'Director', '/storage/app/public/signatures/signature_67d17a9e58370.png', '2025-03-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '[\"SG\",\"TH\"]', 'no', '2025-03-12 12:14:22', '2025-03-18 10:18:50', NULL),
(96, NULL, 184, 'Indulis TEST', 'TEST', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'decline', NULL, NULL, '2025-03-14 12:04:33', '2025-03-14 12:06:26', NULL),
(97, NULL, 181, 'Donovan Newton Inc', 'Non voluptate sit am', 'Partnership', 'Veritatis praesentiu', 'Dr', 'Do consequatur natus', 'Patterson', 'Brianna Rosales', 'Chiquita Colon', 'Quam quam quam qui c', 'United Arab Emirates', 'https://www.zaguhyxyciqyli.org.uk', 'Nulla maxime amet n', 'Kenya', 'https://www.kikaweqyhegazet.ws', '797', 'Eu et voluptatem ani', '931', 'wyrati@mailinator.com', 'https://www.gocijagozak.us', NULL, NULL, NULL, 'yes', NULL, 'yes', 'yes', 'Odit dicta rem offic', 'Et laborum Ad irure', 'Eum dolor molestiae', 'yes', 'Ut veniam facere om', 'yes', 'yes', '1983-12-24', '1974-10-22', 'no', 'Odit animi consecte', 'Aliquip consequat P', 'Numquam iusto except', 'yes', 'No', 'Yes', '90', '4', '38', 'No', 'Yes', 'No', 'Elit quas pariatur', 'Yes', 'Yes', 'Yes', 'Ut enim dolor minim', 'yes', 'no', 'Qui do nobis eum mol', 'yes', 'no', 'Placeat facere pari', 'no', 'Architecto deserunt', 'Temporibus obcaecati', 'highRisk', NULL, NULL, 'corruption', 'complianceAlert', 'drugTrafficking', 'Inventore labore est', 'yes', 'no', 'intended', NULL, 'perTransaction', 'Ullamco ullam tempor', 'No', 'Voluptatem Cum fugi', 'Ut odit reprehenderi', 'No', 'Minim explicabo Et', 'Platform / WRAP', NULL, 'Non Mass Market Investments', NULL, 'Advisory Stockbroker', NULL, 'High Risk Investments as defined by FCA', 'Structured Deposits', NULL, 'Commercial Property', 'Necessitatibus volup', 'Aliquam nesciunt il', 'Lindsay', 'Olga Lynn', 'Sigourney Hogan', 'Tempore illo dolore', 'Est voluptas exercit', 'Italy', 'Illo iste ut dolor r', NULL, NULL, NULL, 'Possimus quis simil', NULL, 'Sopoline Head', 'Possimus repudianda', '/storage/app/public/signatures/signature_67d948ab64968.png', '2022-05-05', 'Rajah Taylor', 'Explicabo Facilis n', '/storage/app/public/signatures/signature_67d948ab6891d.png', NULL, NULL, NULL, NULL, NULL, 'decline', NULL, 'no', '2025-03-18 10:19:23', '2025-03-18 11:41:48', '2025-03-18 11:41:48'),
(98, NULL, 181, 'Bass Carney LLC', 'Incididunt animi vo', 'Partnership', 'In eligendi dicta vo', 'Dr', 'Totam ullam delectus', 'Watts', 'Russell Lucas', 'Zelda Clarke', 'Nulla soluta expedit', 'United States', 'https://www.miziqidame.ws', 'Inventore labore ad', 'Brazil', 'https://www.gemyzut.org.uk', '171', 'Rerum voluptate labo', '94', 'jifon@mailinator.com', 'https://www.witipob.tv', 'yes', NULL, 'yes', 'yes', NULL, NULL, 'yes', 'Dolore fugiat iusto', 'Quia modi et est pr', 'Dolore esse eiusmod', 'yes', 'Anim aspernatur dolo', 'yes', 'yes', '1996-07-12', '1970-06-20', 'no', 'Reiciendis odio volu', 'In veniam dolorem e', 'Id dicta laboris te', 'no', 'Yes', 'Yes', '75', '86', '53', 'Yes', 'No', 'No', 'Sit veritatis fugiat', 'No', 'No', 'No', 'Reprehenderit qui t', 'yes', 'yes', 'Adipisicing exercita', 'no', 'yes', 'Duis obcaecati animi', 'no', 'Ut nihil magna repre', 'Exercitationem qui d', NULL, 'fatf', NULL, 'corruption', 'complianceAlert', NULL, 'Quas qui nostrud iur', 'no', 'yes', NULL, NULL, 'perTransaction', 'Voluptatum pariatur', 'No', 'Sint corporis id ut', 'Harum nulla esse sun', 'No', 'Aliquam eius volupta', 'Platform / WRAP', 'Funds (direct not via a Platform)', 'Non Mass Market Investments', 'Restricted Mass Market Investments', 'Advisory Stockbroker', NULL, 'High Risk Investments as defined by FCA', 'Structured Deposits', 'Deposit Accounts', NULL, 'Beatae expedita quis', 'Debitis provident i', 'Elliott', 'Jasper White', 'Cody Bruce', 'Magni ratione except', 'Fugiat doloremque am', 'China', 'Voluptates magni sun', NULL, NULL, NULL, 'Dolor voluptatibus m', NULL, 'Laith Moses', 'Cum reprehenderit n', '/storage/app/public/signatures/signature_67d95c2171981.png', '2021-05-25', 'Cameron Key', 'Sunt nobis voluptate', '/storage/app/public/signatures/signature_67d95c2174142.png', NULL, NULL, NULL, NULL, NULL, 'pending', '[\"AU\",\"AT\",\"BAHR\",\"BE\",\"FI\",\"FR\",\"DE\",\"ES\",\"HK\",\"IND\",\"MY\",\"NO\",\"NZ\",\"OM\",\"PHL\",\"SA\",\"SG\",\"TH\",\"UK\",\"US\",\"MU\"]', NULL, '2025-03-18 11:42:25', '2025-03-19 11:20:58', '2025-03-19 11:20:58'),
(99, NULL, 686, 'Prinden Ltd', 'Prinden Ltd', 'Company', NULL, 'Mr', NULL, 'Prince', 'James', NULL, 'Office 508 15th Floor Cloud Suite Al Sarab Tower\r\nADGM Square Al Maryah Island', 'United Arab Emirates', NULL, NULL, 'United Arab Emirates', NULL, '027119790', '027119790', '0547712800', 'info@prinden.com', 'www.prinden.com', 'yes', NULL, 'yes', NULL, NULL, NULL, NULL, 'Prinden Ltd', 'ADGM', '000008089', 'no', NULL, NULL, 'yes', '2025-01-06', NULL, 'no', NULL, 'GCC', 'AED 2000000', 'no', 'Yes', 'Yes', '0', NULL, NULL, 'No', 'No', 'Yes', 'quarterly', 'Yes', 'Yes', 'Yes', 'Enhanced EDD checks', 'yes', 'yes', 'quarterly', 'yes', 'yes', 'yearly', 'yes', 'onboarding', NULL, NULL, NULL, NULL, NULL, 'complianceAlert', NULL, NULL, 'yes', 'yes', NULL, NULL, 'perTransaction', NULL, 'No', NULL, 'as per terms adviser charging agreement with providers only', 'No', NULL, NULL, NULL, NULL, NULL, 'Advisory Stockbroker', 'DFM / Model Portfolios', NULL, NULL, NULL, NULL, 'Mr', NULL, 'Prince', 'James', 'SEO, CISI', 'CISI', 'Jubail Island Abu Dhabi UAE', 'United Arab Emirates', NULL, '/storage/app/public/documents/1742301003_Company__Ownership_Structure.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '2025-03-18 12:30:03', '2025-03-18 14:06:02', '2025-03-18 14:06:02'),
(100, NULL, 686, 'Prinden Ltd', 'Prinden Ltd', 'Company', NULL, 'Mr', NULL, 'Prince', 'James', NULL, 'Office 508 15th Floor Cloud Suite Al Sarab Tower\r\nADGM Square Al Maryah Island', 'United Arab Emirates', NULL, NULL, 'United Arab Emirates', NULL, '027119790', '027119790', '0547712800', 'info@prinden.com', 'www.prinden.com', 'yes', NULL, 'yes', NULL, NULL, NULL, NULL, 'Prinden Ltd', 'ADGM', '000008089', 'no', NULL, NULL, 'yes', '2025-01-06', NULL, 'no', NULL, 'GCC', 'AED 2000000', 'no', 'Yes', 'Yes', '0', NULL, NULL, 'No', 'No', 'Yes', 'quarterly', 'Yes', 'Yes', 'Yes', 'Enhanced EDD checks', 'yes', 'yes', 'quarterly', 'yes', 'yes', 'yearly', 'yes', 'onboarding', NULL, NULL, NULL, NULL, NULL, 'complianceAlert', NULL, NULL, 'yes', 'yes', NULL, NULL, 'perTransaction', NULL, 'No', NULL, 'as per terms adviser charging agreement with providers only', 'No', NULL, NULL, NULL, NULL, NULL, 'Advisory Stockbroker', 'DFM / Model Portfolios', NULL, NULL, NULL, NULL, 'Mr', NULL, 'Prince', 'James', 'SEO, CISI', 'CISI', 'Jubail Island Abu Dhabi UAE', 'United Arab Emirates', NULL, '/storage/app/public/documents/1742301008_Company__Ownership_Structure.pdf', '/storage/app/public/documents/1742301008_Business_Extract--000008089.pdf', '/storage/app/public/documents/1742301008_Business_Extract--000008089.pdf', NULL, NULL, 'James Prince', 'SEO', '/storage/app/public/signatures/signatures/uploaded_67d967501ddb8.jpeg', '2025-03-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '2025-03-18 12:30:08', '2025-03-18 12:30:08', NULL),
(101, NULL, 662, 'Synergy Financial Advisers Ltd', 'Synergy Financial Advisers Ltd', 'Company', NULL, 'Mrs', NULL, 'Lim', 'Evon', NULL, '229 Mountbatten Road, Mountbatten Square, #03-30 Singapore 398007', 'Singapore', '398007', NULL, NULL, NULL, '+65 6654 1888', '+65 6654 1787', '+65 9066 5662', 'provider@synergy.com.sg', 'synergy.com.sg', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Monetary Authority of Singapore', 'FA100050', 'no', NULL, 'yes', 'yes', '2015-12-11', NULL, 'no', NULL, '99% Singapore and 1% Overseas.', 'S$1,000,000 any one claim and in the aggregate inclusive of Costs and Expenses per individual Financial Advisor', 'yes', 'No', 'Yes', NULL, '100', NULL, 'No', 'No', 'Yes', 'Annually', 'Yes', 'No', 'Yes', 'More documentation proof will be required to prove the source of wealth.', 'yes', 'yes', 'Annually', 'no', 'yes', 'Annually', 'yes', 'Compliance conduct post transaction checks based on Balance Scorecard Framework.', NULL, 'highRisk', 'fatf', 'sanctioned', 'corruption', 'complianceAlert', 'drugTrafficking', NULL, 'yes', 'yes', 'intended', 'expected', 'perTransaction', NULL, 'Yes', NULL, 'The fee structure does not deviate out of product limitation', 'Yes', NULL, 'Platform / WRAP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mr', NULL, 'Young', 'Warwick Lawrence', 'Executive Director', 'Fellowship of Actuaries Institute post graduate qualification', '229 Mountbatten Road, Mountbatten Square, #03-30 Singapore 398007', 'Singapore', '398007', '/storage/app/public/documents/1742349426_Org_Chart_(21).pdf', '/storage/app/public/documents/1742349426_11032025_Synergy_Financial_Advisers_Ltd.pdf', '/storage/app/public/documents/1742349426_Authorised_Signatory.pdf', NULL, '[\"https:\\/\\/alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1742349426_Sam Barrie Qualifications.pdf\"]', 'Warwick Lawrence Young', 'Executive Director', '/storage/app/public/signatures/signatures/uploaded_67da2472b038a.jpg', '2025-03-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '2025-03-19 01:57:06', '2025-03-19 01:57:06', NULL),
(102, NULL, 680, 'VFS International Ltd', 'VFS International Ltd', 'Company', NULL, 'Mr', NULL, 'Li', 'Clement', NULL, '10th Floor, Tower 1\r\nNexteracom Building\r\nEbene Cybercity', 'Mauritius', '71501', NULL, 'Mauritius', '71501', '230 4663852', NULL, '230 57577306', 'info@vfsint.com', 'www.vfsint.com', 'yes', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, 'Financial Services Commission (Mauritius)', 'C103000699', 'no', NULL, 'yes', 'yes', '2024-09-12', NULL, 'no', NULL, 'Kenya 15%\r\nZimbabwe 10%\r\nZambia 10%\r\nMauritius 55%\r\nSouth Africa 8%\r\nOthers 2%', 'USD2M', 'yes', 'Yes', 'Yes', '30', '40', '30', 'No', 'No', 'Yes', 'Depending on the risk profile and whether it is a PEP.  If high risk or PEP, more regularly.  From medium to low risk, less regularly.', 'Yes', 'Yes', 'Yes', 'There is an enhanced due diligence which is required.  We require a more in depth source of wealth and source of funds.', 'yes', 'yes', 'Annually', 'yes', 'yes', 'Annual', 'yes', 'at onboarding of new business.  If business already issued, it would be at the start of the relationship between company and client.', NULL, 'highRisk', 'fatf', 'sanctioned', NULL, NULL, NULL, NULL, 'yes', 'yes', NULL, NULL, NULL, 'No.  We don\'t accept client monies.  All is through the provider.', 'Yes', 'There are different criteria like country risk, sector the client is, premium value for the assessment of a client', NULL, 'No', NULL, 'Platform / WRAP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mr', NULL, 'May', 'Anthony James', NULL, NULL, 'A21 Avalon Golf Estate Bois Sec Bois Cheri Mauritius', 'Mauritius', NULL, '/storage/app/public/documents/1742384373_Org_Chart_2025.pdf', '/storage/app/public/documents/1742384373_VFSI_-_Register_of_directors_08112018.pdf', '/storage/app/public/documents/1742384373_VFSI_-_Authorised_signatory.pdf', NULL, '[\"https:\\/\\/alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1742384373_VFSI - Shareholding of company.pdf\"]', 'Yim Teck Clement Li Ching Hum', 'Director', '/storage/app/public/signatures/signature_67daacf5025cb.png', '2025-03-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '2025-03-19 11:39:33', '2025-03-19 11:39:33', NULL),
(103, NULL, 697, 'Three Sixty Financial Inc', 'N/A', 'Company', 'N/A', 'Mr', 'N/A', NULL, 'Gary', 'N/A', 'Suite 10-7, Wisma UOA Damansara II, No.6 Changkat Semantan, Damansara Heights, Kuala Lumpur', 'Malaysia', '50490', 'N/A', 'Malaysia', '50490', '03-9213 1618', 'N/A', '012-667-8342', 'gary.cane@threesixtyfinancial.com', 'www.threesixtyfinancial.com', 'yes', 'yes', NULL, NULL, NULL, NULL, NULL, 'N/A', 'Labuan Financial Services Authority', 'BS200133', 'no', 'N/A', 'yes', 'yes', '2024-10-16', NULL, 'no', 'N/A', 'As we work with expatriates these will be mostly from operations in Malaysia but may have moved regionally or back their home country. 70% Malaysia 25%regional SEA, 5% country of origin', 'RM2,500,000 per claim', 'no', 'Yes', NULL, '0', '30', '70', 'No', 'No', 'Yes', 'During reviews or changes to planning, withdrawals or surrenders, Expiry of POID', 'No', 'Yes', 'Yes', 'We do not accept PEP', NULL, NULL, 'During reviews or changes to planning, withdrawals or surrenders, Expiry of POID', NULL, NULL, 'Annually for compliance functions and face to face staff', NULL, 'when all compliance items have been received and oversight has happened', NULL, 'highRisk', 'fatf', 'sanctioned', 'corruption', 'complianceAlert', 'drugTrafficking', 'We screen our client base and new applicants on a variety of alert lists as directed by our regulator', 'yes', 'yes', 'intended', 'expected', 'perTransaction', NULL, 'Yes', 'Yes and we have a regulatory duty to report suspicious transactions using the FINS system through the central bank (Bank Negara Malaysia)', 'Apart from legacy insurance products we are mainly a fee for service business taking 1% annually. We can charge an advice fee for set up but this is limited to 2.5%. We tend to use DFM\'s with clean share classes and direct assets and ETF\'s.', 'No', NULL, 'Platform / WRAP', NULL, NULL, NULL, NULL, 'DFM / Model Portfolios', NULL, NULL, 'Deposit Accounts', NULL, 'Mr', NULL, 'Cane', 'Gary', NULL, 'FPC1, FPC2, ICFA, CF2', '33A Mesra Terrace, 7 Jalan Dutamas Raya, Dutamas, Kuala Lumpur', 'Malaysia', '51200', '/storage/app/public/documents/1743146808_no._9-Elmwood_Capital_Limited_Group_Structure.pdf', '/storage/app/public/documents/1743146808_Form_25_updated_-_Three_Sixty_Financial_Inc.pdf', '/storage/app/public/documents/1743146808_Signatory_List_Alltrust_Services_Ltd_signed.pdf', NULL, '[\"https:\\/\\/alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1743146808_360 Anti-Money-Laundering-Reporting-Procedure.pdf\",\"https:\\/\\/alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1743146808_360_Financial Report 31 Dec 2023.pdf\",\"https:\\/\\/alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1743146808_360- Certificate of incorporation.pdf\",\"https:\\/\\/alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1743146808_360- Memorandum And Association - CTC [39].pdf\",\"https:\\/\\/alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1743146808_Anti-Bribery & Corruption Policy Statement 2022.docx\",\"https:\\/\\/alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1743146808_COMPLAINTS PROCEDURE.pdf\",\"https:\\/\\/alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1743146808_no. 8-proof of regulatory license-Labuan Licence.pdf\",\"https:\\/\\/alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1743146808_noreply@threesixty.com_20241114_132233.pdf\",\"https:\\/\\/alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1743146808_Register of Shareholders - Three Sixty Financial Inc.pdf\",\"https:\\/\\/alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1743146808_Screenshot 2024-08-08 at 10.59.03\\u202fAM.png\",\"https:\\/\\/alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1743146808_Screenshot 2024-08-08 at 10.59.16\\u202fAM.png\",\"https:\\/\\/alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1743146808_Share Certificates - Three Sixty Financial Inc.pdf\"]', 'Gary Cane', 'Managing Director and Principal Officer', '/storage/app/public/signatures/signature_67e64f380ac35.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '2025-03-28 07:26:48', '2025-03-28 07:26:48', NULL),
(104, NULL, 710, 'Lead Solution Wealth Management', NULL, 'Company', NULL, 'Mr', NULL, NULL, 'Lennox C R', NULL, 'H21 Home Scene Building\r\nHealthscape\r\nCircle Square Retail Park, Forbach 31001\r\nMauritius', NULL, '31001', NULL, NULL, NULL, '+971 54 271 5560', NULL, '+971 54 271 5560', 'servicing@leadsolutionss.com', 'https://www.leadsolutionss.com/', 'yes', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, 'Financial Services Commission (FSC) Mauritius', 'C117022693', 'no', NULL, 'yes', 'yes', '2024-07-18', NULL, 'no', NULL, 'Middle East & United Kingdom', '500,000 USD', 'no', 'Yes', 'No', '3', '32', '57', 'No', 'Yes', 'Yes', 'Low risk client- Every 3 Years, Standard Risk client- Every 2 years, High Risk client- every 1 year', 'Yes', 'Yes', 'Yes', 'The Company is required to carry out EDD include:\r\n Where a higher risk of money laundering or terrorist financing has been identified\r\n Where through supervisory guidance a high risk of money laundering or terrorist financing has been identified\r\n Where a customer or an applicant for business is from a high risk third country\r\n Where the customer or the applicant for business is a political exposed person\r\n Where it is discovered that a customer has provided false or stolen identification documentation or information and the reporting person proposes to continue to deal with that customer\r\n In the event of any unusual or suspicious activity.\r\nEDD requirements are applicable to Clients identified as being high risk, including PEPs.', 'yes', 'yes', 'Annually or in case of trigger events', 'yes', 'yes', 'Annually', 'yes', 'Compliance approves business cases at key stages to ensure regulatory adherence and risk mitigation. Initially, a preliminary review may be conducted to assess risks and policy alignment before further development. At the pre-approval stage, compliance ensures the business case meets legal, regulatory, and ethical requirements before higher-level approvals. Final approval is granted once all due diligence, risk assessments, and regulatory checks are completed. Additionally, compliance may conduct post-approval monitoring to ensure ongoing adherence. At LSWM, the specific timing of compliance approval would depend on internal governance procedures and regulatory obligations.', NULL, 'highRisk', NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'yes', 'intended', 'expected', 'perTransaction', NULL, 'Yes', 'his involves conducting due diligence, assessing the client\'s risk profile based on factors such as jurisdiction, business activities, and financial transactions, and identifying any potential compliance or financial crime risks. The assessment is documented as part of our record-keeping obligations and reviewed periodically to ensure ongoing compliance. Any high-risk relationships undergo enhanced due diligence and require additional approvals before onboarding.', NULL, 'No', NULL, 'Platform / WRAP', NULL, NULL, NULL, NULL, 'DFM / Model Portfolios', NULL, NULL, NULL, NULL, 'Mr', NULL, 'Pitt', 'Lennox C R', NULL, NULL, 'H21 Home Scene Building\r\nHealthscape\r\nCircle Square Retail Park, Forbach 31001\r\nMauritius', NULL, '31001', '/storage/app/public/documents/1743662427_LSWM_Organisation_Chart.pdf', NULL, '/storage/app/public/documents/1743662427_CTC-List_of_Authorised_Signatories_21-03-2025.pdf', NULL, '[\"https:\\/\\/alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1743662427_DocuSign Certificate - Certificate of Incorporation on Change of Name LSWM 19-02-2025.pdf\"]', 'Mr Lennox C R Pitt', NULL, '/storage/app/public/signatures/signatures/uploaded_67ee2d5b5be61.pdf', '2025-04-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '2025-04-03 06:40:27', '2025-04-03 06:40:27', NULL),
(105, NULL, 709, 'Amalia Wealth BV', 'Amalia Wealth', 'Company', NULL, 'Mr', NULL, NULL, 'Richard Michael', NULL, 'Rue Joseph Stevens 7, 1000, Brussels, Belgium', 'Belgium', '1000', 'Branch in Spain - Amalia Wealth BVBA Sucursal en Espana, Calle Pena Del Viso 6, 28729, Madrid', 'Spain', '28729', '+34 605 890 932', NULL, '+34 605 890 932', 'richardg@amaliawealth.com', 'www.amaliawealth.com', NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, 'Financial Services and Markets Authority Belgium', '105592A', 'no', NULL, 'yes', NULL, NULL, NULL, NULL, NULL, 'Austria, Luxembourg, Belgium, France, Spain.  Spain accounts for close to 100% of activity.', '€ 1.100.000 loss of all insureds per one claim. € 3.300.000 for  loss of all insureds per policy period.', 'no', 'No', 'Yes', '0', '0', '100', 'No', 'No', 'Yes', 'Most clients details are updated three times per year with additional ID verification updated on each significant transaction.', 'No', 'No', 'Yes', 'Product providers request additional information if client is high risk.  We supply and certify documentation as required.', 'yes', 'yes', 'Usually three times per year.', 'yes', 'yes', 'Annually', 'yes', 'We are a small company - compliance is carried out by the advisor who is also the director and responsible person with the regulator.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'yes', NULL, NULL, NULL, NULL, 'Yes', 'Details are reported on the client\'s fact find questionnaire.', 'On most products we charge a service/advisory fee of between 0.5% and 1%.  This is deemed industry standard.', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mr', NULL, 'Greenland', 'Richard Michael', 'Financial Advisor registered with the Financial Services and Markets Authority Belgium - 105592A', 'CII Level 4 Diploma in Financial Planning (QCF)', 'Calle Peña Del Viso 6, Valdemanco, Madrid, Spain', 'Spain', '28729', '/storage/app/public/documents/1743676507_2025_Amalia_Wealth_Group_structure_Chart.pdf', '/storage/app/public/documents/1743676507_2024-10-15_UBO_register_and_shareholder.pdf', '/storage/app/public/documents/1743676507_2025_Amalia_Wealth_Group_structure_Chart.pdf', NULL, '[\"https:\\/\\/alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1743676507_2023 NBB Belgian accounts.pdf\",\"https:\\/\\/alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1743676507_2024-06-14 Copy of FSMA authorisation.pdf\",\"https:\\/\\/alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1743676507_2025-04-03 Begian Registered entity data _ CBE Public Search.pdf\",\"https:\\/\\/alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1743676507_Certificate CII Level 4 Diploma in Financial Planning.pdf\",\"https:\\/\\/alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1743676507_CPD Confirmation.pdf\"]', 'Richard Michael Greenland', 'Director/Owner', '/storage/app/public/signatures/signature_67ee645b570b7.png', '2025-04-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '2025-04-03 10:35:07', '2025-04-03 10:35:07', NULL),
(106, NULL, 718, 'Titan Wealth For Financial Consultation & Financial Analysis LLC', 'Titan Wealth For Financial Consultation & Financial Analysis LLC', 'Company', NULL, 'Mr', NULL, 'Dickinson', 'Daniel', NULL, 'Office 1201, Marina Plaza, Dubai, UAE', NULL, 'NA', NULL, NULL, NULL, '+971 4571 2600', NULL, '+971 4571 2600', 'policyservicing@ahr-uae.com', 'https://titanwealth.ae/', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Securities and Commodities Authority (SCA)', '671647', 'no', NULL, NULL, 'yes', '2024-09-12', NULL, 'yes', 'We were asked to improve the change of agency client due diligence as specifically asked to collect SOF. We have appealed this notification.', 'NA', '1,000,000', 'no', 'Yes', 'No', NULL, NULL, '100', 'No', 'No', 'Yes', 'Annually', 'Yes', 'Yes', 'Yes', 'Source third-party identification checks.', 'yes', 'yes', 'Annually', 'yes', 'yes', NULL, 'yes', NULL, NULL, 'highRisk', NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'yes', 'intended', 'expected', 'perTransaction', NULL, 'Yes', NULL, NULL, NULL, NULL, 'Platform / WRAP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mrs', NULL, 'Hurst', 'Liz', 'HR Director - CIPD', NULL, 'Villa 434, Mira Oasis 3, Street 6, Dubai, UAE', NULL, NULL, '/storage/app/public/documents/1744024662_Titan_Wealth_Group_Structure_-_April_2025_-_Certified.pdf', '/storage/app/public/documents/1744024662_Register_of_Directors.pdf', '/storage/app/public/documents/1744024662_TWFCFA_Signatory_List.pdf', NULL, '[\"https:\\/\\/alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1744024662_Trade License.pdf\"]', 'Daniel Dickinson', 'CEO', '/storage/app/public/signatures/signatures/uploaded_67f3b456c4dd3.JPG', '2025-04-07', NULL, 'CEO', '/storage/app/public/signatures/signatures/uploaded_67f3b456c90c2.JPG', NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '2025-04-07 11:17:42', '2025-04-07 11:17:42', NULL),
(107, NULL, 726, 'Indigo Financial Analysis and Consultancy LLC', 'N/A', 'Company', 'N/A', 'Mr', 'N/A', 'Hutton', 'Alexander', 'N/A', 'Office 214, The Offices at IBN Battuta Gate, Jebel Ali First, Dubai UAE', 'United Arab Emirates', 'N/A', 'Office 214, The Offices at IBN Battuta Gate, Jebel Ali First, Dubai UAE', 'United Arab Emirates', 'None', '+971 4 5488550', '+971 4 5488550', '+971 564602411', 'info@indigosca.com', 'www.indigosca.com', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Securities and Commodities Authority (SCA)', '706042', 'no', NULL, NULL, 'yes', '2024-08-14', NULL, 'no', NULL, 'UAE - GCC (75%), Switzerland (25%)', 'USD 600,000.00', 'no', 'No', 'Yes', '6', '44', '50', 'No', 'No', 'Yes', 'It is depend on the client\'s ML risk classification; High Risk clients - 6 months / Medium - one year', 'Yes', 'Yes', 'Yes', 'Obtain additional information from independent sources.\r\n• Evidence of source of funds and/or wealth, audited financial st atement/ Statement of account/ employer payment slips.\r\n• Verifying the purpose of the business relationship\r\n• Monitoring their activities and financial planning purposes\r\n• Increase awareness of higher risk situations\r\n• Increase levels of “KnowYourClient”rules or “Enhanced Due Diligence\r\n• Increase levels of ongoing controls and reviews of relationship', 'yes', 'yes', 'Annually', 'yes', 'yes', 'Annually', 'yes', 'Before submitting to the provider', NULL, NULL, 'fatf', NULL, NULL, NULL, NULL, 'FATF grey and black listed', 'no', 'no', NULL, NULL, NULL, NULL, 'Yes', 'All clients go through a risk assessment process during onboarding stage to determine the level of risk and the required due diligence level. The risk assessment process is automated.', 'N/A', 'No', NULL, 'Platform / WRAP', 'Funds (direct not via a Platform)', NULL, NULL, NULL, 'DFM / Model Portfolios', NULL, 'Structured Deposits', 'Deposit Accounts', NULL, 'Miss', NULL, 'Khalel', 'Wafaa', 'SCA Accredited Compliance Officer - Head of Compliance ( https://www.sca.gov.ae/en/open-data/licensed-companies.aspx?q=CP-0000188); CISI Member - https://www.cisi.org/cisiweb2/mycisi-pages/mycisi#', 'Bachelors Degree in Arts & Professional Certifications', 'Office 214, The Offices at IBN Battuta Gate, Jebel Ali First, Dubai, UAE', 'United Arab Emirates', 'N/A', '/storage/app/public/documents/1744628383_IFA_Group_Structure_New_Finalv3.pdf', '/storage/app/public/documents/1744628383_DIRECTORS_&_SHAREHOLDERS_REGISTER_-_INDIGO.pdf', '/storage/app/public/documents/1744628383_Indigo_Authorized_Signatory_List_(UAE)_15.08.2023.pdf', NULL, NULL, 'Alexander Hutton', 'Chief Executive Officer', '/storage/app/public/signatures/signatures/uploaded_67fcea9f1b877.jpg', '2025-04-14', 'Wafaa Khalel', 'SCA Accredited Compliance Officer', '/storage/app/public/signatures/signatures/uploaded_67fcea9f2237c.JPG', NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '2025-04-14 10:59:43', '2025-04-14 10:59:43', NULL),
(108, NULL, 184, 'Test! - Ignore', 'Test', 'Other', 'asd', 'Mr', 'Test! - Ignore', 'Test! - Ignore', 'Test! - Ignore', 'Test! - Ignore', 'Test! - Ignore', 'Central African Republic', 'Test! - Ignore', 'Test! - Ignore', 'Belgium', 'Test! - Ignore', '123', '123', '123', 'asd@asd.com', 'w', NULL, NULL, NULL, 'yes', NULL, NULL, 'yes', NULL, 'Test! - Ignore', 'Test! - Ignore', 'no', 'Test! - Ignore', 'yes', NULL, '2222-02-22', '2222-02-22', 'yes', NULL, 'Test! - Ignore', 'Test! - Ignore', 'yes', 'Yes', 'Yes', '12', '23', '45', 'Yes', 'Yes', 'Yes', 'Test! - Ignore', 'Yes', 'Yes', 'Yes', 'Test! - Ignore', 'yes', 'yes', 'Test! - Ignore', 'yes', 'yes', 'Test! - Ignore', 'yes', 'Test! - Ignore', 'Test! - Ignore', NULL, NULL, NULL, 'corruption', NULL, NULL, 'Test! - Ignore', 'yes', 'yes', 'intended', NULL, NULL, 'Test! - Ignore', 'Yes', 'Test! - Ignore', 'Test! - Ignore', 'Yes', 'Test! - Ignore', 'Platform / WRAP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Test! - Ignore', 'Test! - Ignore', 'Test! - Ignore', 'Test! - Ignore', 'Test! - Ignore', 'Test! - Ignore', 'Test! - Ignore', 'Belgium', 'Test! - Ignore', '/storage/app/public/documents/1744715155_Logo.png', '/storage/app/public/documents/1744715155_Logo.png', '/storage/app/public/documents/1744715155_Logo.png', 'Test! - Ignore', '[\"https:\\/\\/alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1744715155_Logo.png\"]', 'Test! - Ignore', 'Test! - Ignore', '/storage/app/public/signatures/signature_67fe3d93d5b8d.png', '0222-02-22', 'Test! - Ignore', 'Test! - Ignore', '/storage/app/public/signatures/signature_67fe3d93d9a5d.png', NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '2025-04-15 11:05:55', '2025-04-15 11:43:38', '2025-04-15 11:43:38'),
(109, NULL, 661, 'Overberg Asset Management', 'Overberg Asset Management', 'Company', NULL, 'Mr', NULL, NULL, 'Robert', NULL, '9 DS Botha Street, Greyton', 'South Africa', '7233', NULL, 'South Africa', '7130', NULL, NULL, '+27846454295', 'robert@overberg.biz', 'www.overberg.biz', 'yes', NULL, 'yes', NULL, NULL, NULL, NULL, NULL, 'financial services conduct authority', '783', 'no', NULL, 'yes', 'yes', NULL, NULL, 'no', NULL, NULL, 'sufficient', NULL, 'Yes', 'Yes', '10', '80', '10', 'Yes', 'No', 'Yes', 'annually', 'Yes', 'Yes', 'Yes', 'all relevant documentation required to reduce risk', NULL, NULL, 'annually', NULL, NULL, 'annually', NULL, 'all transactions have to be approved by compliance', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'yes', 'intended', 'expected', 'perTransaction', NULL, 'Yes', 'internal compliance processes ensure full records are kept', '1.5% AMC \r\nInline with industry standard', 'No', NULL, NULL, 'Funds (direct not via a Platform)', NULL, NULL, NULL, 'DFM / Model Portfolios', NULL, 'Structured Deposits', NULL, NULL, 'Mr', NULL, 'Wantenaar', 'Robert David', 'Wealth Manager', 'CISI level 2', NULL, 'South Africa', '7233', '/storage/app/public/documents/1744718031_4._Directors_Register_-_New_CoR_39_-_9369488442(2).pdf', '/storage/app/public/documents/1744718031_5._Shareholders_Register_-_register_of_allotments.pdf', '/storage/app/public/documents/1744718031_2025_Authorised_Signatory_List_Letterhead.pdf', NULL, NULL, 'Robert David Wantenaar', 'Wealth Manager', '/storage/app/public/signatures/signature_67fe48cf68948.png', '2025-04-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '2025-04-15 11:53:51', '2025-04-15 11:53:51', NULL);
INSERT INTO `offshores` (`id`, `selected_adviser_id`, `creater_id`, `company_name`, `trading_as`, `type`, `other_details`, `main_contact`, `additional_details`, `surname_surname`, `forename`, `previous_names`, `registered_address`, `registered_country`, `registered_post_code`, `physical_address`, `physical_country`, `physical_post_code`, `office_number`, `direct_line`, `mobile_number`, `email_address`, `website`, `financial_adviser`, `insurance_broker`, `asset_manager`, `accountant`, `tax_adviser`, `lawyer`, `other_business_activity`, `other_business_specify`, `licensing_body`, `licensing_reference`, `restrictions`, `restrictions_imposed`, `insurance`, `investment`, `regulatory_visit`, `date_follow`, `areas_review`, `highlighted_review`, `percentage_breakdown`, `professional_indemnity`, `cyber_insurance`, `face_to_face`, `non_face_policy`, `high_risk`, `standard_risk`, `low_risk`, `sanctioned`, `refer`, `client_risk`, `kyc_revisit`, `accept_peps`, `pep_policy`, `due_diligence`, `provide_details`, `collectDetails`, `writtenPolicies`, `reviewDocuments`, `updatedDocuments`, `amlPolicies`, `trainingFrequency`, `internalCompliance`, `complianceApproval`, `complianceComments`, `countryLists_highRisk`, `countryLists_fatf`, `countryLists_sanctioned`, `countryLists_corruption`, `countryLists_complianceAlert`, `countryLists_drugTrafficking`, `additionalComments`, `screenSystems`, `identifyHighRisk`, `recordDetails_intended`, `recordDetails_expected`, `recordDetails_perTransaction`, `yes_details`, `risk_assessment`, `risk_details`, `client_fee_structure`, `investment_products`, `products_details`, `platform_WRAP`, `funds_platform`, `market_investments`, `restricted_mass`, `advisory_stockbroker`, `model_portfolios`, `investments_defined`, `structured_deposits`, `deposit_accounts`, `commercial_property`, `title`, `please_details`, `surname`, `forenames`, `profession`, `qualifications`, `certifiers_address`, `country`, `post_code`, `company_structure_chart`, `company_register_shareholder`, `company_authorised_signatory`, `appointed_text`, `adviser_multifiles`, `full_name_1`, `position_1`, `signature_1`, `date_signed_1`, `full_name_2`, `position_2`, `signature_2`, `date_signed_2`, `date_received`, `date_approved`, `approved_by`, `approval_signature`, `status`, `admin_country`, `flag`, `created_at`, `updated_at`, `deleted_at`) VALUES
(110, NULL, 663, 'AOP Capital Limited', 'AOP Capital Ltd', 'Company', NULL, 'Miss', NULL, NULL, 'Karishma', 'NA', 'Unit C1002-A, Level 10, Burj Daman, DIFC, PO Box 507042, Dubai, UAE', 'United Arab Emirates', 'NA', 'Unit C1002-A, Level 10, Burj Daman, DIFC, PO Box 507042, Dubai, UAE', 'United Arab Emirates', '507042', '+971 4 452 0683', '+971 4 452 0683', '+971555564780', 'info@aopcapitalgroup.com', 'aopcapitalgroup.com', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dubai FInancial Services Authority', 'F007420', 'no', NULL, 'yes', 'yes', NULL, NULL, 'no', 'The firm has only completed a year since receiving its Financial Services Permission. Therefore, there have been no scheduled Regulatory visits', 'UAE - 80%\r\nMiddle East - 15%\r\nUK & Europe - 5%', '$1,000,000', 'no', 'Yes', 'Yes', '5', '85', '10', 'No', 'No', 'Yes', 'atleast annually', 'Yes', 'Yes', 'Yes', 'Under the Dubai Financial Services Authority (DFSA) regulations, enhanced due diligence (EDD) is indeed required for high-risk relationships, which includes politically exposed persons (PEPs). Specific requirements apply to PEPs, defined as individuals who hold prominent public positions, along with their family members and close associates.  AOP will Identify whether a client or beneficial owner is a PEP and further carry out EDD measures, which include:\r\na. Understanding the source of wealth and funds.\r\nb. Obtaining senior management approval to establish or continue the relationship.\r\nc. Monitoring the business relationship more closely.\r\n\r\nAOP has also implemented enhanced ongoing monitoring of these relationships once a high-risk status has been established and EDD measures have been applied to a high risk client', 'yes', 'yes', 'The frequency of revisiting and reviewing documents is determined by the risk rating assigned to the client', 'yes', 'yes', 'At least Annually', 'yes', 'Yes. See below.', 'Compliance Approval Process:\r\nCompliance will review business cases during the development stage to ensure that any potential risks related to money laundering, terrorism financing, or regulatory breaches are identified early.\r\nThe compliance officer will assess the provided documentation, including risk assessments and customer due diligence (CDD), to verify that the proposed business activities meet regulatory standards.\r\nApproval will depend on several factors, including:\r\n•	Alignment with regulatory requirements (e.g., AML/CFT laws, DFSA regulations).\r\n•	Risk factors associated with the business, customers, or jurisdictions involved.\r\n•	The adequacy of due diligence conducted.\r\n•	Any potential conflicts with the firm\'s internal policies or previous compliance findings.\r\nCompliance approval is typically required before formalizing a business transaction or relationship. However, compliance will conduct periodic reviews for ongoing projects or routine activities to ensure continued adherence to regulatory standards.\r\nCollaboration between the business development team and compliance is essential, ensuring that compliance considerations are integrated from the outset of any business proposal or change. change.', 'highRisk', 'fatf', 'sanctioned', 'corruption', 'complianceAlert', 'drugTrafficking', 'The firm conducts sanction screening using World-Check, which accesses a broad database of individuals and entities on global sanctions lists. This process checks customers and counterparties against lists from international bodies and governments to identify sanctions-related risks, politically exposed persons (PEPs), and adverse media.', 'yes', 'yes', 'intended', 'expected', 'perTransaction', NULL, 'Yes', NULL, 'Client agreement attached.', 'No', NULL, 'Platform / WRAP', NULL, NULL, NULL, NULL, NULL, NULL, 'Structured Deposits', 'Deposit Accounts', NULL, 'Mrs', NULL, NULL, 'Shruthi Mary Joseph', 'DFSA Reference Number: I004507', 'Certified Anti-money laundering specialist', 'Dubai, UAE', 'United Arab Emirates', '0', '/storage/app/public/documents/1744868816_Org_chart.pdf', '/storage/app/public/documents/1744868816_Certificate_of_Incumbency.pdf', '/storage/app/public/documents/1744868816_E-License_-_exp_July_2025.pdf', NULL, '[\"https:\\/\\/alltrust.co.uk\\/alltrustonline\\/storage\\/app\\/public\\/documents\\/1744868816_Professional Client Agreement V4.pdf\"]', 'Frank Hutchinson', 'SEO/Director', '/storage/app/public/signatures/signatures/uploaded_680095d098875.png', '2025-04-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '2025-04-17 05:46:56', '2025-04-17 05:46:56', NULL),
(111, NULL, 732, 'IMPERIUM CAPITAL LIMITED', 'INSURANCE BROKER', 'Company', NULL, 'Mr', NULL, NULL, 'CAMERON', NULL, 'Level 15(A1). Main Office Tower,Financial Park Labuan,Jalan Merdeka, F.T.Labuan', 'Malaysia', '87007', 'c/o. Labuan Insurance Management Services Ltd\r\nNo 63, 1st Floor, Jalan Merdeka,  \r\n  Labuan F.T., \r\nMalaysia', 'Malaysia', '87007', '+62-21- 50101206', NULL, NULL, 'client.services@imperium-capital.biz', 'www.imp-cap.com', NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, 'MINISTER OF FINANCE MALAYSIA / LABUAN FSA', 'Co. Reg. LL02429/License Number BS200026', 'no', NULL, 'yes', NULL, '2025-04-15', NULL, 'no', 'Regulatory Visit meaning the last report submitted on 15/04/2025.', 'Asia/Middle East though many expat clients do move globally', 'Limit of Indemnity MYR 2.500.000', 'no', 'Yes', 'No', '5', '90', '5', 'No', 'No', 'Yes', 'twice a year', 'No', 'Yes', 'Yes', 'Outsource Compliance check via Independent HK Company', 'yes', 'yes', 'quarterly', 'yes', 'yes', 'twice a year', 'yes', 'Post receipt of confidential client profile', NULL, 'highRisk', 'fatf', 'sanctioned', NULL, 'complianceAlert', NULL, NULL, 'yes', 'yes', 'intended', 'expected', 'perTransaction', NULL, 'Yes', 'Confidential Client Profile review by compliance', 'Industry standard fee structure', 'No', NULL, 'Platform / WRAP', NULL, NULL, NULL, NULL, 'DFM / Model Portfolios', NULL, NULL, 'Deposit Accounts', NULL, 'Mr', NULL, 'KNOX', 'CAMERON', 'CPA1209663', 'B.Com, Dip FP., SA Fin, ASA', 'Gang Wayang No.22A,Kerobokan Kuta Utara\r\n(Depan Bali Merita Villas\r\nBALI - INDONESIA', 'Indonesia', NULL, '/storage/app/public/documents/1744972448_IC_Limited_org_chart.pdf', '/storage/app/public/documents/1744972448_Register_Book_as_at_4_Nov_2024.pdf', '/storage/app/public/documents/1744972448_IC_Signatory_List.pdf', NULL, NULL, 'CAMERON KNOX', 'Director', '/storage/app/public/signatures/signatures/uploaded_68022aa0176a6.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '2025-04-18 10:34:08', '2025-04-18 10:34:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('robertalsop09983@gmail.com', '$2y$10$gIiAh6rW0luX9yJWNC6Z4.nQo6Rg0ZAeWScoq1rmdY8D7ZFJR9hvG', '2025-02-17 05:52:41'),
('stevejbull@blueyonder.co.uk', '$2y$10$T3A/vr0enIEJD8.Q85KYT.nLk8MN10KSqTIZuBLrfGkvZHPOglUlu', '2025-04-06 10:52:42'),
('us921708@gmail.com', '$2y$10$iAgFN7sILdjsgzb7oAWfPOmQr8khnEKbmsp766CDB76KNqZV3n1MK', '2025-05-05 05:37:06');

-- --------------------------------------------------------

--
-- Table structure for table `pensionmanagements`
--

CREATE TABLE `pensionmanagements` (
  `ID` int(11) NOT NULL,
  `SchemeName` varchar(255) DEFAULT NULL,
  `SchemeReference` varchar(255) DEFAULT NULL,
  `ProductName` varchar(255) DEFAULT NULL,
  `ProductType` varchar(255) DEFAULT NULL,
  `PlanCommencementDate` date DEFAULT NULL,
  `MemberName` varchar(255) DEFAULT NULL,
  `CurrentValuation` decimal(15,2) DEFAULT NULL,
  `LastFundSplitDate` date DEFAULT NULL,
  `UncrystallisedValue` decimal(15,2) DEFAULT NULL,
  `CrystallisedValue` decimal(15,2) DEFAULT NULL,
  `TotalValue` decimal(15,2) DEFAULT NULL,
  `AnnualValuationDates` text DEFAULT NULL,
  `AnnualValuations` text DEFAULT NULL,
  `LatestValueCashAccounts` decimal(15,2) DEFAULT NULL,
  `LatestValuePlatform1` decimal(15,2) DEFAULT NULL,
  `LatestValueProperty` decimal(15,2) DEFAULT NULL,
  `LatestValueOtherAssets` decimal(15,2) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `NationalInsuranceNumber` varchar(255) DEFAULT NULL,
  `TaxInformationNumber` varchar(255) DEFAULT NULL,
  `Address` text DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `AdviserFeeAgreement` varchar(50) DEFAULT NULL,
  `AdviserFeeDetails` text DEFAULT NULL,
  `BeneficiaryName1` varchar(255) DEFAULT NULL,
  `RelationshipToMember1` varchar(255) DEFAULT NULL,
  `Percentage1` decimal(5,2) DEFAULT NULL,
  `BeneficiaryName2` varchar(255) DEFAULT NULL,
  `RelationshipToMember2` varchar(255) DEFAULT NULL,
  `Percentage2` decimal(5,2) DEFAULT NULL,
  `RequestReceivedDate` date DEFAULT NULL,
  `CedingSchemeName` varchar(255) DEFAULT NULL,
  `CedingSchemeReference` varchar(255) DEFAULT NULL,
  `TransferStatus` varchar(50) DEFAULT NULL,
  `TransferAmount` decimal(15,2) DEFAULT NULL,
  `CompletionDate` date DEFAULT NULL,
  `CrystallisationStatus` varchar(50) DEFAULT NULL,
  `ContributionDateReceived` date DEFAULT NULL,
  `EmployeeAmount` decimal(15,2) DEFAULT NULL,
  `EmployerAmount` decimal(15,2) DEFAULT NULL,
  `ContributionTotal` decimal(15,2) DEFAULT NULL,
  `BankProvider` varchar(255) DEFAULT NULL,
  `SortCode` varchar(50) DEFAULT NULL,
  `AccountNumber` varchar(50) DEFAULT NULL,
  `AccountName` varchar(255) DEFAULT NULL,
  `Syndicate` varchar(255) DEFAULT NULL,
  `ReconciledBalance` decimal(15,2) DEFAULT NULL,
  `BalanceDate` date DEFAULT NULL,
  `BankAccountNumber` text DEFAULT NULL,
  `BankAccountName` text DEFAULT NULL,
  `AccountOpenedDate` text DEFAULT NULL,
  `TransactionsDate` text DEFAULT NULL,
  `TransactionsType` text DEFAULT NULL,
  `TransactionsDescription` text DEFAULT NULL,
  `TransactionsAmount` text DEFAULT NULL,
  `TransactionsBalance` text DEFAULT NULL,
  `HoldingType` varchar(255) DEFAULT NULL,
  `AssetDescription` varchar(255) DEFAULT NULL,
  `AssetProvider` varchar(255) DEFAULT NULL,
  `PurchaseDate` date DEFAULT NULL,
  `SyndicateAsset` varchar(255) DEFAULT NULL,
  `CurrentValueAmount` decimal(15,2) DEFAULT NULL,
  `CurrentValueDate` date DEFAULT NULL,
  `PortfolioProvider` text DEFAULT NULL,
  `PortfolioPurchaseDate` text DEFAULT NULL,
  `TotalCurrentValue` text DEFAULT NULL,
  `DateCurrentValue` text DEFAULT NULL,
  `TransactionsDate1` text DEFAULT NULL,
  `TransactionsType1` text DEFAULT NULL,
  `TransactionsAmount1` text DEFAULT NULL,
  `TransactionsBalance1` text DEFAULT NULL,
  `PropertyAddress` text DEFAULT NULL,
  `PropertyPurchaseDate` text DEFAULT NULL,
  `PropertyLatestValue` text DEFAULT NULL,
  `DateLatestValue` text DEFAULT NULL,
  `CrystallisationDate` date DEFAULT NULL,
  `BenefitEventType` varchar(255) DEFAULT NULL,
  `AmountCrystallised` decimal(15,2) DEFAULT NULL,
  `TaxFreeLumpSum` decimal(15,2) DEFAULT NULL,
  `PaymentDate` date DEFAULT NULL,
  `NetPayment` decimal(15,2) DEFAULT NULL,
  `NetInTaxYear` decimal(15,2) DEFAULT NULL,
  `PAYEInTaxYear` decimal(15,2) DEFAULT NULL,
  `TaxCode` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pensionmanagements`
--

INSERT INTO `pensionmanagements` (`ID`, `SchemeName`, `SchemeReference`, `ProductName`, `ProductType`, `PlanCommencementDate`, `MemberName`, `CurrentValuation`, `LastFundSplitDate`, `UncrystallisedValue`, `CrystallisedValue`, `TotalValue`, `AnnualValuationDates`, `AnnualValuations`, `LatestValueCashAccounts`, `LatestValuePlatform1`, `LatestValueProperty`, `LatestValueOtherAssets`, `DateOfBirth`, `NationalInsuranceNumber`, `TaxInformationNumber`, `Address`, `Email`, `AdviserFeeAgreement`, `AdviserFeeDetails`, `BeneficiaryName1`, `RelationshipToMember1`, `Percentage1`, `BeneficiaryName2`, `RelationshipToMember2`, `Percentage2`, `RequestReceivedDate`, `CedingSchemeName`, `CedingSchemeReference`, `TransferStatus`, `TransferAmount`, `CompletionDate`, `CrystallisationStatus`, `ContributionDateReceived`, `EmployeeAmount`, `EmployerAmount`, `ContributionTotal`, `BankProvider`, `SortCode`, `AccountNumber`, `AccountName`, `Syndicate`, `ReconciledBalance`, `BalanceDate`, `BankAccountNumber`, `BankAccountName`, `AccountOpenedDate`, `TransactionsDate`, `TransactionsType`, `TransactionsDescription`, `TransactionsAmount`, `TransactionsBalance`, `HoldingType`, `AssetDescription`, `AssetProvider`, `PurchaseDate`, `SyndicateAsset`, `CurrentValueAmount`, `CurrentValueDate`, `PortfolioProvider`, `PortfolioPurchaseDate`, `TotalCurrentValue`, `DateCurrentValue`, `TransactionsDate1`, `TransactionsType1`, `TransactionsAmount1`, `TransactionsBalance1`, `PropertyAddress`, `PropertyPurchaseDate`, `PropertyLatestValue`, `DateLatestValue`, `CrystallisationDate`, `BenefitEventType`, `AmountCrystallised`, `TaxFreeLumpSum`, `PaymentDate`, `NetPayment`, `NetInTaxYear`, `PAYEInTaxYear`, `TaxCode`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'Kennedy PLC', 'REF1000', 'disintermediate plug-and-play e-commerce', 'Pension Plan', '2023-01-15', 'William Harris', 210687.48, '2024-09-30', 161209.87, 177095.02, 288186.83, '2023-01-01,2024-01-01', '100000,120000', 49409.02, 35404.51, 40273.33, 12490.11, '1949-05-05', 'NI780865D', 'TIN642017', '883 Glen Shoals Apt. 278, Kathyshire, AK 94729', 'joshuaandrews@gmail.com', 'Yes', 'Standard advisory fees apply', 'Justin Webster', 'Spouse', 49.57, 'Shannon Ray', 'Child', 29.79, '2023-03-05', 'Smith-Romero', 'CSREF2000', 'Completed', 9970.71, '2024-08-17', 'Processed', '2023-09-02', 4434.64, 1412.88, 5524.57, 'Carter Ltd', '80-99-31', '30008342', 'William Harris Account', 'Syndicate ABC', 38711.45, '2024-05-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Shares', 'Investment in Patterson-Duffy', 'Young, Bonilla and Mcfarland', '2018-02-05', 'Syndicate Asset ABC', 8532.83, '2024-08-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-26', 'Lump Sum Withdrawal', 23723.85, 1506.24, '2024-05-27', 4337.95, 12234.21, 4168.67, '1100L', '2025-03-06 08:01:57', '2025-03-06 08:01:57', NULL),
(12, 'Flores-Kim', 'REF1001', 'integrate cutting-edge markets', 'Pension Plan', '2010-03-11', 'Andrea Ellis', 210392.67, '2020-07-27', 129405.01, 171754.24, 74735.11, '2023-01-01,2024-01-01', '100000,120000', 41170.75, 36460.20, 12687.04, 13326.86, '1957-09-20', 'NI579449D', 'TIN510951', '84374 Jeremy Route, Meganview, AK 02550', 'dixondenise@brennan.com', 'Yes', 'Standard advisory fees apply', 'Dale Anderson', 'Spouse', 46.61, 'Nancy Barajas', 'Child', 48.40, '2022-05-24', 'Zimmerman-Douglas', 'CSREF2001', 'Completed', 69969.55, '2023-09-07', 'Processed', '2024-02-28', 2109.56, 591.53, 3330.66, 'Fischer-Scott', '67-44-69', '19683056', 'Andrea Ellis Account', 'Syndicate ABC', 11995.50, '2024-06-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Shares', 'Investment in Brown-Miller', 'Campbell-Zuniga', '2023-01-21', 'Syndicate Asset ABC', 45092.87, '2024-09-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-26', 'Lump Sum Withdrawal', 48055.86, 3586.33, '2024-05-03', 3966.22, 11287.46, 2268.06, '1100L', '2025-03-06 08:01:57', '2025-03-06 08:01:57', NULL),
(13, 'Cannon, Jones and Lucero', 'REF1002', 'repurpose e-business networks', 'Pension Plan', '2020-10-18', 'Penny Daugherty', 251178.80, '2020-10-13', 170893.33, 29481.48, 18769.45, '2023-01-01,2024-01-01', '100000,120000', 30583.93, 2323.41, 15849.98, 19872.73, '1957-05-18', 'NI741617D', 'TIN648085', '51281 Lisa Inlet Suite 592, North Garyshire, WY 49747', 'martinezdiane@higgins.com', 'Yes', 'Standard advisory fees apply', 'Veronica Garcia', 'Spouse', 38.09, 'Mark Obrien', 'Child', 60.06, '2023-01-10', 'Murphy Inc', 'CSREF2002', 'Completed', 99914.43, '2025-02-24', 'Processed', '2023-03-27', 1535.53, 2368.67, 9618.82, 'Francis Group', '77-48-41', '11378351', 'Penny Daugherty Account', 'Syndicate ABC', 36296.70, '2025-01-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Shares', 'Investment in Carter, Jackson and Sanchez', 'Glass LLC', '2020-07-11', 'Syndicate Asset ABC', 64151.10, '2024-04-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-01', 'Lump Sum Withdrawal', 14033.43, 8945.64, '2025-02-03', 3159.00, 12692.67, 2640.27, '1250L', '2025-03-06 08:01:57', '2025-03-06 08:01:57', NULL),
(14, 'Anderson and Sons', 'REF1003', 'monetize end-to-end convergence', 'Pension Plan', '2010-05-20', 'Nicholas Watson', 149617.82, '2021-08-01', 13863.28, 127052.73, 469000.96, '2023-01-01,2024-01-01', '100000,120000', 37471.54, 46359.77, 4662.49, 29819.16, '1961-03-02', 'NI865177D', 'TIN123960', '3925 Anderson Pines, South Robertborough, WA 38117', 'courtneystrong@murphy.com', 'Yes', 'Standard advisory fees apply', 'Sherri Cisneros', 'Spouse', 48.23, 'William Anderson', 'Child', 73.01, '2022-06-23', 'Rodriguez PLC', 'CSREF2003', 'Completed', 19557.63, '2023-04-07', 'Processed', '2023-05-28', 1120.52, 3202.96, 3028.60, 'Galvan, Washington and Casey', '42-49-34', '61046855', 'Nicholas Watson Account', 'Syndicate ABC', 33667.15, '2024-04-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Shares', 'Investment in Stout-Shaw', 'Nelson LLC', '2021-04-30', 'Syndicate Asset ABC', 20072.09, '2024-09-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-28', 'Lump Sum Withdrawal', 8429.12, 5094.60, '2024-03-19', 2430.43, 18622.32, 4441.32, '1250L', '2025-03-06 08:01:57', '2025-03-06 08:01:57', NULL),
(15, 'Anderson Inc', 'REF1004', 'monetize collaborative platforms', 'Pension Plan', '2008-12-31', 'Roy Compton', 481466.40, '2022-11-08', 21104.70, 63878.06, 424220.45, '2023-01-01,2024-01-01', '100000,120000', 10468.74, 44754.92, 35939.53, 10915.71, '1971-08-05', 'NI722159D', 'TIN739298', '10566 Goodman Crest Suite 352, South Gina, NH 31390', 'jessicaalvarado@frye.com', 'Yes', 'Standard advisory fees apply', 'Mrs. Amy Davis', 'Spouse', 92.15, 'Benjamin Miles', 'Child', 40.07, '2024-01-12', 'Castaneda-Wilson', 'CSREF2004', 'Completed', 8071.29, '2023-10-29', 'Processed', '2024-04-27', 4618.46, 4198.93, 5762.02, 'Campbell, Anderson and Holmes', '93-23-43', '44476013', 'Roy Compton Account', 'Syndicate ABC', 14967.90, '2024-06-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Shares', 'Investment in Torres-Baker', 'Mayer, King and Vincent', '2018-12-06', 'Syndicate Asset ABC', 71433.60, '2024-11-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-11', 'Lump Sum Withdrawal', 45626.91, 7238.26, '2025-01-26', 3807.82, 11885.83, 4566.54, '1250L', '2025-03-06 08:01:57', '2025-03-06 08:01:57', NULL),
(16, 'Ochoa-Brooks', 'REF1005', 'incubate B2B partnerships', 'Pension Plan', '2021-12-16', 'Brenda Eaton', 324872.81, '2020-12-19', 79160.33, 103160.15, 496777.56, '2023-01-01,2024-01-01', '100000,120000', 11729.75, 12188.86, 45392.97, 10858.40, '1999-11-09', 'NI236457D', 'TIN264300', '67619 Perry Mountains, Jasonshire, SD 72313', 'ybrewer@guerra.com', 'Yes', 'Standard advisory fees apply', 'Lisa Rogers', 'Spouse', 49.66, 'Sergio Hamilton', 'Child', 40.72, '2022-03-25', 'Yu PLC', 'CSREF2005', 'Completed', 86559.97, '2024-03-07', 'Processed', '2023-10-13', 3172.75, 3082.17, 3822.51, 'Grant Inc', '22-88-44', '86823723', 'Brenda Eaton Account', 'Syndicate ABC', 43571.48, '2024-12-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Shares', 'Investment in White-Daniel', 'Evans-Barnes', '2017-09-25', 'Syndicate Asset ABC', 75440.97, '2024-09-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-13', 'Lump Sum Withdrawal', 7041.18, 1733.56, '2024-05-27', 3288.06, 10536.99, 3342.94, '1100L', '2025-03-06 08:01:57', '2025-03-06 08:01:57', NULL),
(17, 'Johnson Inc', 'REF1006', 'redefine robust info-mediaries', 'Pension Plan', '2017-11-15', 'Stephanie Holmes', 416322.30, '2021-12-21', 30723.69, 135281.86, 308652.42, '2023-01-01,2024-01-01', '100000,120000', 33306.93, 15823.10, 12060.05, 35799.16, '1986-09-16', 'NI638969D', 'TIN105745', '503 Patel Island, Perezfort, KS 06984', 'hrodriguez@stone.com', 'Yes', 'Standard advisory fees apply', 'Paige Adams', 'Spouse', 58.72, 'Martin Ward', 'Child', 46.30, '2022-07-09', 'Thompson-Olson', 'CSREF2006', 'Completed', 16972.92, '2024-02-06', 'Processed', '2023-07-02', 2446.33, 3731.32, 4702.12, 'Franklin, Mckinney and Maynard', '13-98-84', '51924977', 'Stephanie Holmes Account', 'Syndicate ABC', 45664.52, '2024-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Shares', 'Investment in Nguyen, Holden and Hahn', 'Boyd, Collins and Mendoza', '2019-03-07', 'Syndicate Asset ABC', 37305.65, '2024-11-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-26', 'Lump Sum Withdrawal', 32079.51, 1233.53, '2024-09-25', 4511.03, 16157.45, 2044.36, '1185L', '2025-03-06 08:01:57', '2025-03-06 08:01:57', NULL),
(18, 'Wilson Inc', 'REF1007', 'extend bricks-and-clicks solutions', 'Pension Plan', '2005-08-12', 'Kenneth Berry', 73327.58, '2021-03-04', 182230.76, 70478.65, 237891.08, '2023-01-01,2024-01-01', '100000,120000', 34409.81, 24992.31, 5457.96, 29708.82, '1954-06-15', 'NI818237D', 'TIN134245', '3572 Susan View Suite 031, Port Michaelmouth, AZ 25395', 'lfisher@hotmail.com', 'Yes', 'Standard advisory fees apply', 'Rachel Moore', 'Spouse', 17.47, 'Richard Williams', 'Child', 92.02, '2025-01-04', 'Chambers-Rivera', 'CSREF2007', 'Completed', 50208.85, '2024-08-10', 'Processed', '2025-02-04', 1814.91, 2908.19, 5295.24, 'Jones Group', '11-27-58', '88465649', 'Kenneth Berry Account', 'Syndicate ABC', 11750.76, '2024-07-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Shares', 'Investment in Fields Group', 'Gutierrez Group', '2019-06-16', 'Syndicate Asset ABC', 53384.31, '2024-05-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01', 'Lump Sum Withdrawal', 40767.72, 2335.15, '2024-03-16', 2782.81, 15718.97, 4900.38, '1250L', '2025-03-06 08:01:57', '2025-03-06 08:01:57', NULL),
(19, 'Thomas, Conley and Foster', 'REF1008', 'streamline turn-key bandwidth', 'Pension Plan', '2023-12-17', 'David Fuller', 344944.53, '2024-12-16', 107560.69, 21662.76, 395038.14, '2023-01-01,2024-01-01', '100000,120000', 42022.53, 43302.74, 11386.89, 32522.61, '1953-05-05', 'NI755984D', 'TIN154041', '7646 Wilson Stravenue Apt. 129, Cochranbury, PA 21507', 'carolyndavis@hotmail.com', 'Yes', 'Standard advisory fees apply', 'Terry Richardson', 'Spouse', 62.96, 'Paige Garcia', 'Child', 33.93, '2022-09-10', 'Stevens-Taylor', 'CSREF2008', 'Completed', 27674.11, '2025-02-17', 'Processed', '2024-11-13', 1139.36, 1406.45, 2289.29, 'Spencer-Rios', '25-51-41', '37866209', 'David Fuller Account', 'Syndicate ABC', 10363.42, '2024-11-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Shares', 'Investment in Anderson-Clark', 'Roach Inc', '2018-04-06', 'Syndicate Asset ABC', 98115.19, '2024-05-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-05', 'Lump Sum Withdrawal', 34080.41, 1974.46, '2024-09-17', 2312.56, 10514.51, 3654.68, '1250L', '2025-03-06 08:01:57', '2025-03-06 08:01:57', NULL),
(20, 'Jones Ltd', 'REF1009', 'synergize robust applications', 'Pension Plan', '2006-07-20', 'Grace Young', 396763.22, '2022-01-01', 140020.72, 141680.17, 192756.05, '2023-01-01,2024-01-01', '100000,120000', 29706.02, 1836.16, 46629.06, 29431.10, '1997-11-25', 'NI179941D', 'TIN389065', 'PSC 3795, Box 8106, APO AE 02845', 'apage@gmail.com', 'Yes', 'Standard advisory fees apply', 'Joseph Sanchez', 'Spouse', 11.42, 'Lauren Brown', 'Child', 19.89, '2024-06-13', 'Hancock Ltd', 'CSREF2009', 'Completed', 55881.84, '2024-03-21', 'Processed', '2024-11-14', 4397.34, 4542.10, 9938.22, 'Williams-Howell', '79-87-97', '37608136', 'Grace Young Account', 'Syndicate ABC', 49972.59, '2024-05-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Shares', 'Investment in Houston, Martin and White', 'Francis Inc', '2015-07-25', 'Syndicate Asset ABC', 20929.27, '2024-10-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-19', 'Lump Sum Withdrawal', 22093.46, 8498.35, '2024-05-25', 1193.08, 12958.08, 2374.75, '1100L', '2025-03-06 08:01:57', '2025-03-06 08:01:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supports`
--

CREATE TABLE `supports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(11) UNSIGNED DEFAULT NULL,
  `status` text DEFAULT NULL,
  `support_reply` text DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supports`
--

INSERT INTO `supports` (`id`, `user_id`, `status`, `support_reply`, `title`, `category`, `details`, `created_at`, `updated_at`) VALUES
(30, 673, NULL, NULL, 'Link to firm account', 'General technical support', 'Good afternoon\r\n\r\nChapelwood Financial Planning (FCA 196672) has clients with Alltrust, we did use the previous portal, how do I link our clients to this new portal?\r\n\r\nKind regards\r\n\r\nGraham Cater-Pugh\r\nParaplanner', '2025-03-13 14:47:46', '2025-03-13 14:47:46'),
(31, 680, NULL, NULL, 'Mr', 'General technical support', 'The country \'Mauritius\' is not listed in the list of countries for the offshore registration.', '2025-03-17 06:24:11', '2025-03-17 06:24:11'),
(32, 675, NULL, NULL, 'Letter of Authority', 'General technical support', 'WE have recently sent to you our clients\' signed Letters of Authority allowing us to become servicing agents on their plans and to receive various information.  I have created an account but I am not sure who I see any information.  Can you help please debbie@beckettsfs.co.uk', '2025-03-18 09:21:36', '2025-03-18 09:21:36'),
(33, 700, NULL, NULL, 'Form submitted in error', 'General technical support', 'Dear Team,\r\n\r\nWe are in the process of completing an application, and have submitted an incomplete application in error from Pi Financial for Countrywide \r\nRegards \r\nPi Financial', '2025-03-28 12:42:41', '2025-03-28 12:42:41'),
(35, 741, NULL, NULL, 'Application in progress', 'General technical support', 'I cannot find the draft application.  Can you help please', '2025-04-25 10:24:51', '2025-04-25 10:24:51');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(11) UNSIGNED DEFAULT NULL,
  `status` text DEFAULT NULL,
  `ticket_reply` text DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `firm_name` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_notification` text NOT NULL DEFAULT 'yes',
  `role_member` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` text NOT NULL DEFAULT 'pre_approved_adviser_firm',
  `adviser_check` text DEFAULT NULL,
  `adviser_pending` text DEFAULT NULL,
  `adviser_existing` text DEFAULT NULL,
  `adviser_declined` text CHARACTER SET utf16 COLLATE utf16_unicode_ci DEFAULT NULL,
  `oasis_sipp__check` text DEFAULT NULL,
  `sipp_property_check` text DEFAULT NULL,
  `full_sipp_check` text DEFAULT NULL,
  `ftp_check` text DEFAULT NULL,
  `pending_applications` text DEFAULT NULL,
  `existing_applications` text DEFAULT NULL,
  `decline_applications` text DEFAULT NULL,
  `illustration_check` text DEFAULT NULL,
  `leads_check` text DEFAULT NULL,
  `member_details_check` text DEFAULT NULL,
  `user_management_check` text DEFAULT NULL,
  `dms_check` text DEFAULT NULL,
  `reports_check` text DEFAULT NULL,
  `workflow_check` text DEFAULT NULL,
  `tickets_check` text DEFAULT NULL,
  `support_check` text DEFAULT NULL,
  `faq_check` text DEFAULT NULL,
  `communication_check` text DEFAULT NULL,
  `adviser_applications_check` text DEFAULT NULL,
  `member_applications_check` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `verification_code` text DEFAULT NULL,
  `two_step_code` text DEFAULT NULL,
  `two_step_expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `offshore_check` text DEFAULT NULL,
  `offshore_pending` text DEFAULT NULL,
  `offshore_existing` text DEFAULT NULL,
  `offshore_declined` text DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `nationality` text DEFAULT NULL,
  `country_residency` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `creator_id`, `name`, `firm_name`, `email`, `email_notification`, `role_member`, `email_verified_at`, `password`, `role`, `adviser_check`, `adviser_pending`, `adviser_existing`, `adviser_declined`, `oasis_sipp__check`, `sipp_property_check`, `full_sipp_check`, `ftp_check`, `pending_applications`, `existing_applications`, `decline_applications`, `illustration_check`, `leads_check`, `member_details_check`, `user_management_check`, `dms_check`, `reports_check`, `workflow_check`, `tickets_check`, `support_check`, `faq_check`, `communication_check`, `adviser_applications_check`, `member_applications_check`, `remember_token`, `verification_code`, `two_step_code`, `two_step_expires_at`, `created_at`, `updated_at`, `offshore_check`, `offshore_pending`, `offshore_existing`, `offshore_declined`, `dob`, `nationality`, `country_residency`) VALUES
(181, NULL, 'Muhammad Hamza', 'Testing Admin', 'winingstreak7+1@gmail.com', 'yes', NULL, '2025-01-07 13:04:02', '$2y$10$dNmsfzL0WMJR1l9jv8XhouFhx4finih3Iujdqz9MYYIFuKrhQlQwO', 'admin', 'adviser_check', 'adviser_pending', 'adviser_existing', 'adviser_declined', 'oasis_sipp__check', 'sipp_property_check', 'full_sipp_check', 'ftp_check', 'pending_applications', 'existing_applications', 'decline_applications', 'illustration_check', 'leads_check', 'member_details_check', 'user_management_check', 'dms_check', 'reports_check', 'workflow_check', 'tickets_check', 'support_check', 'faq_check', 'communication_check', 'adviser_applications_check', 'member_applications_check', '4e1QGwSY4uKYSeKJdn9jCfim783ED5PVPHoysM8xwF9jLFJXbCEjpELkzShx', NULL, NULL, NULL, '2025-01-07 10:22:51', '2025-05-06 16:19:23', 'offshore_check', 'offshore_pending', 'offshore_existing', 'offshore_declined', NULL, NULL, NULL),
(184, NULL, 'Indulis', NULL, 'indulis@ilcorp.tech', 'no', NULL, '2025-01-07 13:04:02', '$2y$10$b.L.JlsNQxRMO0f4ZnY5XudEo.8N7kQ0FXvu8OmFulwlIVZG31M2e', 'admin', 'adviser_check', 'adviser_pending', 'adviser_existing', 'adviser_declined', 'oasis_sipp__check', 'sipp_property_check', 'full_sipp_check', 'ftp_check', 'pending_applications', 'existing_applications', 'decline_applications', 'illustration_check', 'leads_check', 'member_details_check', 'user_management_check', 'dms_check', 'reports_check', 'workflow_check', 'tickets_check', 'support_check', 'faq_check', 'communication_check', 'adviser_applications_check', 'member_applications_check', 'mcUr5dMmYRa36PGk38DvnyfEQnxyP5vPMw3Vkceqw09fuva8WVQFeMmrfVlA', NULL, NULL, NULL, '2025-01-07 13:02:49', '2025-05-06 13:10:45', 'offshore_check', 'offshore_pending', 'offshore_existing', 'offshore_declined', NULL, NULL, NULL),
(646, 184, 'IL Corp | Support', 'IL Corp & Tech Ltd', 'support@ilcorp.tech', 'yes', NULL, NULL, '$2y$10$xRi.jf6BwM5pN47tp5MajOR2CJdsnOQ9XchTDLfTRNCB4G3Oj6/6W', 'admin', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tickets_check', NULL, NULL, NULL, 'adviser_applications_check', 'member_applications_check', NULL, NULL, NULL, NULL, '2025-03-03 13:26:36', '2025-05-06 07:54:44', 'offshore_check', 'offshore_pending', 'offshore_existing', 'offshore_declined', NULL, NULL, NULL),
(648, 184, 'Victoria Ingram', 'Alltrust Services Limited', 'victoriaingram@theuapgroup.com', 'yes', NULL, NULL, '$2y$10$SWaBzW413Eg3rszR0n0CsehAX/MWvEc5NPNwh5XMUkpEtV./LV5Zi', 'admin', 'adviser_check', NULL, NULL, NULL, 'oasis_sipp__check', 'sipp_property_check', 'full_sipp_check', 'ftp_check', 'pending_applications', 'existing_applications', 'decline_applications', 'illustration_check', 'leads_check', 'member_details_check', 'user_management_check', 'dms_check', 'reports_check', 'workflow_check', 'tickets_check', 'support_check', 'faq_check', 'communication_check', 'adviser_applications_check', 'member_applications_check', 'bKun70MEqtr6BTq1mEkAbKALVjAtH5pi9m9YG29K6eGVNfXHgbSGGcfItoZO', NULL, '424734', '2025-04-14 09:02:30', '2025-03-03 13:39:14', '2025-04-14 08:52:30', 'offshore_check', 'offshore_pending', 'offshore_existing', 'offshore_declined', NULL, NULL, NULL),
(649, 184, 'Stuart Harris', 'Alltrust Services Limited', 'Stuart.harris@alltrust.co.uk', 'yes', NULL, NULL, '$2y$10$7deQXp9z/FB25SaEEVPca.OVDoVDXu4pKuTd372Wx5mOGdw5OlYqy', 'admin', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tickets_check', NULL, NULL, NULL, 'adviser_applications_check', 'member_applications_check', 'SOMS5X4bRpd8RXcmwatuDFrqqAnX2qVanOx8InYszCiNlmruQPozZ9Bpx0TN', NULL, NULL, NULL, '2025-03-03 13:41:06', '2025-04-30 08:49:42', 'offshore_check', 'offshore_pending', 'offshore_existing', 'offshore_declined', NULL, NULL, NULL),
(650, 184, 'Olga Lopez', 'Alltrust Services Limited', 'Olga.Lopez@alltrust.co.uk', 'no', NULL, NULL, '$2y$10$ID/e9BkMmxz/pXV3bH3Mf.0Qd2HNRTdyyzKHK1gg8ijsfHKWqrP..', 'admin', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tickets_check', NULL, NULL, NULL, 'adviser_applications_check', 'member_applications_check', 'sH7Fo2cooVeUQOQ1mMRSbQC9GUmV1wIM06ZrlobDtxeI0pFVvILGeY9Po5JB', NULL, NULL, NULL, '2025-03-03 13:42:35', '2025-04-30 08:32:45', 'offshore_check', 'offshore_pending', 'offshore_existing', 'offshore_declined', NULL, NULL, NULL),
(653, NULL, 'David Perez', NULL, 'dpb2105esp@gmail.com', 'yes', NULL, NULL, '$2y$10$6hGOxYuQCtZT2bA9NCIAMeRi47xi5cEEu6onb8Voxm8FEIgQLgmS2', 'advisor_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user_management_check', NULL, NULL, NULL, 'tickets_check', 'support_check', 'faq_check', NULL, NULL, NULL, '4qgPREH3arTP9FBjQw3GZCK6s5uCal6mIasgDzRbjM7G7wjuTev29QVMJGD3', NULL, NULL, NULL, '2025-03-10 10:37:04', '2025-03-27 13:19:40', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(655, NULL, 'Harlan Mcpherson', NULL, 'winingstreak7+5@gmail.com', 'yes', NULL, NULL, '$2y$10$zHVvBKy5HgP32cNV0L7cZuXFKnZCO/1Uy3Vv48v9HvwK2LcdPntgi', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tickets_check', 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-10 15:13:10', '2025-03-10 15:13:10', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(657, NULL, 'Matthew Haycock', NULL, 'matthew.h@aviditywealthmanagement.com', 'yes', NULL, '2025-03-11 11:20:48', '$2y$10$/7gPhvqqEbxGLHeOP4hj2Ox71X6E4Jj5ZLki6.7cf5QAt6zGBqyly', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tickets_check', 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-11 11:19:39', '2025-03-11 11:20:48', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(658, NULL, 'Claire Eyett', NULL, 'claire.eyett@bingham-woods.co.uk', 'yes', NULL, '2025-03-11 11:54:07', '$2y$10$oRgfqjERqywJqNRTbECQV.OzIFKSE1DUZfZGpVHhG3MmL43Vzx8Za', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tickets_check', 'support_check', 'faq_check', NULL, NULL, NULL, 'zt5MCoVb5N4j575cUQmpOw5ophVsslr6MuHUfPS9Lk1joCixByCM71gp3ruy', NULL, NULL, NULL, '2025-03-11 11:53:28', '2025-04-01 10:10:07', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(660, NULL, 'Stephanie', NULL, 'steph@swmltd.co.uk', 'yes', NULL, '2025-03-11 14:18:55', '$2y$10$Uu84NDwSjtd058JKUGEDqeX092BVjw68X3mHVPT16upOOQ5FRvuX2', 'advisor_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user_management_check', NULL, NULL, NULL, 'tickets_check', 'support_check', 'faq_check', NULL, NULL, NULL, 'thGuziKPLrcWVBZOGOYOYNXL3Qy9iHc8CTFKLTTAtXGFYt7ZrQXnKHZNmDzT', NULL, NULL, NULL, '2025-03-11 14:16:47', '2025-04-01 13:32:28', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(661, NULL, 'Robert David Wantenaar', NULL, 'robert@overberg.biz', 'yes', NULL, '2025-03-11 18:14:05', '$2y$10$X9GdTNIwgDgkMkaCF4U3OusEh.IOPd9NexkQ5ApI1.8swlwCx85hC', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tickets_check', 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-11 18:13:32', '2025-04-15 11:46:55', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(662, NULL, 'Synergy Financial Advisers', NULL, 'Provider@synergy.com.sg', 'yes', NULL, '2025-03-12 01:25:01', '$2y$10$lvYqKUuRN1P.lLCLzZsdcObUvskhLp7BHLWIxEM4.tKr/KnSwQMgm', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tickets_check', 'support_check', 'faq_check', NULL, NULL, NULL, 'hDErgX61goCROOI1rUlU1DGOaewAUo3wkJPHx40gRLPVCDLAthT63SMkekWO', NULL, NULL, NULL, '2025-03-12 01:24:27', '2025-03-19 01:26:06', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(663, NULL, 'Karishma Jagasia', NULL, 'karishma.jagasia@aopcapitalgroup.com', 'yes', NULL, '2025-03-12 08:23:00', '$2y$10$lNbCDzSgcJM/W6OussG4eO5.0wPcIuFeaZ6jJLI/mEN8CLNqyhWxm', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tickets_check', 'support_check', 'faq_check', NULL, NULL, NULL, 'iHZOHJO5jAguJqlqKlABVv2ALsQXimBunLuIComfriuZQzxTaCUdvupPxePl', NULL, NULL, NULL, '2025-03-12 08:22:19', '2025-04-17 05:38:10', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(664, NULL, 'Karen Taylor', NULL, 'karen.taylor@afhgroup.com', 'yes', NULL, '2025-03-12 10:24:13', '$2y$10$iMzZSq1JdGx9Dpm6A.fhBu0fgKGDBPtaEuAywpNKjEFntxtfDUqN6', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tickets_check', 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-12 10:23:27', '2025-03-12 10:24:13', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(665, NULL, 'Chris Potter', NULL, 'chris.potter@chartwell-associates.com', 'yes', NULL, '2025-03-12 11:27:43', '$2y$10$BV7vbL9MZVX0uNjnVmMV1.divHU7mguYetchW9bbnP3Zy5AtDA5fm', 'advisor_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user_management_check', NULL, NULL, NULL, 'tickets_check', 'support_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-12 11:27:24', '2025-03-18 10:18:04', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(666, NULL, 'Jess Brothers', NULL, 'jessica.brothers@satisuk.com', 'yes', NULL, '2025-03-12 12:27:36', '$2y$10$T5BdApPW9H01XnXxSHuML.1yjXyxYV.RS.1NS87k68eiGpIsyD7MO', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tickets_check', 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-12 12:26:06', '2025-03-17 11:11:47', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(667, NULL, 'What\'s my name?', NULL, 'alan.brook@alltrust.co.uk', 'yes', NULL, '2025-03-12 15:34:17', '$2y$10$Dekv/cJ9MT0LhVw7ma4bHemo8byiX3jB81Y6IfwQojqIDno618d9q', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'member_details_check', NULL, NULL, NULL, NULL, 'tickets_check', 'support_check', NULL, NULL, NULL, NULL, 'jN2L3rsEvOtDPANT89OhlARnzTIp0ZWV3gazpv4l7GvAxhARFh2ISjbIEslb', NULL, NULL, NULL, '2025-03-12 15:33:53', '2025-05-06 11:17:27', NULL, NULL, NULL, NULL, NULL, 'United Kingdom', 'United Kingdom'),
(668, NULL, 'Colin Moody', NULL, 'colin.moody@alltrust.co.uk', 'yes', NULL, '2025-03-12 15:43:08', '$2y$10$7..HKrg4dgt9k3.P4Djh1uaVNBS0pTsFvWFji4qjMkiwuBqEuSHNS', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tickets_check', 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-12 15:42:03', '2025-03-21 12:54:39', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(669, NULL, 'Bhavna Ancharug', NULL, 'bhavna@leadsolutionss.com', 'yes', NULL, '2025-03-13 06:21:49', '$2y$10$IqFWSkS.eVfYdkAHooz0wOn.0KmNB.blXRTay8ExPJ.3BDxhnYYH2', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tickets_check', 'support_check', 'faq_check', NULL, NULL, NULL, 'x7lIv82OcK6zvA5R0QYCWMcXX3kH4IMe775ghPDgWSfXqODcBSs2v3CFchCk', NULL, '477232', '2025-04-03 06:26:25', '2025-03-13 06:18:35', '2025-04-03 06:16:25', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(670, NULL, 'Nick Manville', NULL, 'nick.manville@abacusadvisers.co.uk', 'yes', NULL, '2025-03-13 10:05:26', '$2y$10$GSKYdAlFKNiam9NXIC4d5u4hKBbwdm6HKwYGSjL5gf0K5akrPCzZi', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tickets_check', 'support_check', 'faq_check', NULL, NULL, NULL, 'zKf1T86ewpybyc8NgeUH91vLZ97ytxL5FZpi3t4HYCKpL7UIofKaXlSvi52t', NULL, NULL, NULL, '2025-03-13 10:04:56', '2025-04-04 13:32:23', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(671, NULL, 'Adam Thompson', NULL, 'adam.thompson@casfin.co.uk', 'yes', NULL, '2025-03-13 10:20:50', '$2y$10$qB8rqxXWcXdEvG83HN01YePkigO1nKWeXazao9uN94J0.FzVZxkxW', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tickets_check', 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-13 10:20:22', '2025-03-13 10:20:50', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(672, NULL, 'Harvey Plant', NULL, 'HarveyP@holyoakes.co.uk', 'yes', NULL, '2025-03-13 10:56:59', '$2y$10$CtTWRrdGAYub.qJk/hyLxODgMMpvRjLf/DXr30NfxyKWrRARsrBxK', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tickets_check', 'support_check', 'faq_check', NULL, NULL, NULL, 'PXN3siwc4ehoyY77l3w1joG0nC87Yr9uBQjGc5VkovHXCfNiYhW6rxKhSHxb', NULL, NULL, NULL, '2025-03-13 10:56:44', '2025-04-03 13:23:42', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(673, NULL, 'Graham Cater-Pugh', NULL, 'graham@chapelwood-financial.com', 'yes', NULL, '2025-03-13 14:44:56', '$2y$10$Buf3apV/GDrDrXODFdbVsegGBPJdPmeDZ2Z8RKplOin1TSlJ1fKJa', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tickets_check', 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-13 14:44:41', '2025-03-13 14:44:56', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(674, 181, 'admin', 'winingstreak7+1@gmail.com', 'winingstreak7+3@gmail.com', 'yes', NULL, NULL, '$2y$10$8COZNs9uM90/OZJMIdF.heezHgLgtTweCqMXlL74MHVgL2cUU28N6', 'employee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tickets_check', 'support_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-14 06:02:49', '2025-03-14 06:23:16', NULL, 'offshore_pending', 'offshore_existing', 'offshore_declined', NULL, NULL, NULL),
(675, NULL, 'Jade Jackson', NULL, 'jade@beckettsfs.co.uk', 'yes', NULL, NULL, '$2y$10$rlRAj9.oD2rzGrzzd8Wq7.sCPpEpVPe2OMZBfPn7YlBeKwaZYiZHy', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, 'Ys38ch5hp3b1ER6mCmEef17TmKfLjjKhRuVugY3o4vBusJ6qLu2MKVCczEEd', NULL, NULL, NULL, '2025-03-14 10:45:21', '2025-04-25 10:22:19', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(676, NULL, 'Laura Stickley', NULL, 'pcadmin@ctt-group.co.uk', 'yes', NULL, '2025-03-14 11:46:58', '$2y$10$ib87PvYijzE8t2bnE4/hsO9vrNsHu8Lk0a3Qu3LR66z5iQGEaPIaq', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-14 11:43:39', '2025-03-14 11:46:58', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(677, 648, 'Payam', NULL, 'payam.alempur@alltrust.co.uk', 'yes', NULL, NULL, '$2y$10$LdGUuGuln.rnUSbdBCwZcumHitzSbeugaRIqpO5PDMjLXXn.5t9kO', 'employee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tickets_check', 'support_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-14 11:54:29', '2025-03-14 11:59:32', NULL, 'offshore_pending', 'offshore_existing', 'offshore_declined', NULL, NULL, NULL),
(678, NULL, 'Mark Cooper', NULL, 'mark@foxheritage.co.uk', 'yes', NULL, '2025-03-14 17:48:26', '$2y$10$lOYEzYW2GSgibnB3zlTS9OLXwQjQq1Lwwo/NCeY1yZy/WyJNDjao2', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-14 17:48:03', '2025-03-14 17:48:26', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(679, NULL, 'wally', NULL, 'Stella.Symons@gmail.com', 'yes', NULL, '2025-03-14 21:46:22', '$2y$10$xrTGK5Y9atNY50p6/KF4FeXX.gVtumQsn7sAUMLpOZZJjWYvXMMPu', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-14 21:45:50', '2025-03-14 21:46:22', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(680, NULL, 'Clement Li', NULL, 'clement.li@vfsint.com', 'yes', NULL, NULL, '$2y$10$vQ2Km/pRWuPP47scd3MEAejoE/Ag9ZAtLFf9nvr14BVrmUWlmbkeG', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-17 06:18:53', '2025-03-19 11:08:29', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(681, NULL, 'Nicholas Tutton', NULL, 'nick@newchangefinance.com', 'yes', NULL, '2025-03-17 11:12:24', '$2y$10$oKB6.F4DCXfPlbx1jpf0MuwIo2gtn4SqrGnhZz.m6BPh2qy5IfWu2', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-17 11:06:55', '2025-03-17 11:12:24', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(682, NULL, 'Hima Vaghani', NULL, 'hima_vaghani@hotmail.com', 'yes', NULL, '2025-03-17 11:53:53', '$2y$10$iKi7/c7UU0ENLIq0LfD3u.5XbeKv6FX1nJL/XgGSQK0BVDcL0yvCW', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-17 11:53:23', '2025-03-17 11:53:53', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(683, NULL, 'James Williams', NULL, 'jamesstruzinawilliams@yahoo.co.uk', 'yes', NULL, '2025-03-17 12:41:52', '$2y$10$g4drvzxzJeus6TNroVtyGO1iBOq8BAXuO1/nL1shhCPBAGlRORqLK', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-17 12:41:36', '2025-03-17 12:41:52', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(684, NULL, 'Jason Williams', NULL, 'jason@rubyfinancial.co.uk', 'yes', NULL, '2025-03-17 14:28:03', '$2y$10$BQvrYFmYYKXL8X/7GTTeAeaYHvyyWj.CMj0717YHkf8hkOshE7s8a', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-17 14:27:41', '2025-04-04 10:33:34', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(685, 648, 'Matt Lenzie', 'Alltrust', 'matt.lenzie@alltrust.co.uk', 'yes', NULL, NULL, '$2y$10$BAaMgt/glPHsK0YYf0L4KOxDjzb.5bYEiRtbpKt.gJbSpksa/erd6', 'employee', NULL, NULL, NULL, NULL, 'oasis_sipp__check', 'sipp_property_check', 'full_sipp_check', 'ftp_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tickets_check', 'support_check', NULL, NULL, NULL, NULL, 'l58lSTKxxjLfEoa13bSejEqOziX6ANiux778S5GcFdkP9JZuVgZdwAwdXxFi', NULL, NULL, NULL, '2025-03-18 10:40:38', '2025-03-18 14:29:08', NULL, 'offshore_pending', 'offshore_existing', 'offshore_declined', NULL, NULL, NULL),
(686, NULL, 'James', NULL, 'info@prinden.com', 'yes', NULL, '2025-03-18 12:10:06', '$2y$10$HU0t8XKizbpCogubRJH1OO9oI9srreXkFzMyXrTPpx74TaAvpsdR6', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-18 12:08:49', '2025-03-18 12:10:06', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(687, NULL, 'Andrew Casey', NULL, 'enquiries@bastionfinancial.co.uk', 'yes', NULL, '2025-03-18 15:22:38', '$2y$10$OhUqNqA5yLOO3jTRxxrxzuST/AtBlLSq328et7jEDvSD.wdnW1dLu', 'advisor_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user_management_check', NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, 'HXHAFoZNd2ZIXuuGX7ujoWZ244o91rdbnPUiILH7bBIgF9Wqlqg7QeJ6UsHS', NULL, NULL, NULL, '2025-03-18 15:21:55', '2025-03-25 09:02:26', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(688, NULL, 'Mike Sweeney', NULL, 'sweeney38@googlemail.com', 'yes', NULL, '2025-03-18 19:26:00', '$2y$10$Vk29Tzun5t3zoSfF5AeOUee3ep.np9grU93CahLuyCUk0ksMdxK9u', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, '1QKhWiI2S9f9tPpcHSS3z5TCon1XsGRL2G4wTEeE416NDSPqeMVz1dvEvxYD', NULL, NULL, NULL, '2025-03-18 19:25:37', '2025-03-19 18:52:45', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(689, NULL, 'Daniel Dickinson', NULL, 'izabella.lodge@ahrprivatewealth.com', 'yes', NULL, '2025-03-20 05:52:29', '$2y$10$4rIYGauk1dJnKhSliOm8SOIQ97FVx.N3fYpVaJ.B2Il0nN3q11pJq', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-20 05:51:57', '2025-03-20 05:52:29', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(690, NULL, 'Gary Mitchell', NULL, 'gary@mp-fs.co.uk', 'yes', NULL, '2025-03-20 11:38:13', '$2y$10$tM6mNL6cffdgTeD.1qs50e.uW/NoEfGBp8NCHKlcvrUQQ6hJ9Dylm', 'advisor_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user_management_check', NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-20 11:37:50', '2025-04-01 11:10:28', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(691, NULL, 'Megan Clough', NULL, 'megan@compass-ifs.co.uk', 'yes', NULL, '2025-03-20 12:21:54', '$2y$10$VuugI7lHf1wwn0O/aN2lKeRee8IaDPiJVPHkiR6TOVVrPGsuTKhU6', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-20 12:20:23', '2025-03-20 12:21:54', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(692, NULL, 'Clive Macdonald', NULL, 'clivem@advisersworldwide.com', 'yes', NULL, '2025-03-20 12:59:49', '$2y$10$BkvYmd6M.YnrlC7dUShnGeOD8MJbORwZKl5WT/lrgZj5wTWT4xx/W', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-20 12:59:29', '2025-03-20 12:59:49', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(693, NULL, 'Liam Cameron', NULL, 'liam.cameron@alltrust.co.uk', 'yes', NULL, '2025-03-21 12:48:43', '$2y$10$QggOUxNiHbT3xrTvu3ZKSuI.8vyXY42k5ESSWy49fd7WetPaYPZiG', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-21 12:48:34', '2025-03-21 12:48:43', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(694, NULL, 'Georgia Toms', NULL, 'georgia@grosvenorbirch.uk', 'yes', NULL, '2025-03-21 16:09:52', '$2y$10$ve5ZIWy3YWJ3XKRvKVmpwOoiA75DkXnXvK/l9ym5RJiLo12vY3wzy', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, 'd2BOBQnesjI4uA1JWaS2z2EHGaJfKdHak5Uh0hXhfEH9fC8okglinKeqyM1H', NULL, NULL, NULL, '2025-03-21 16:08:45', '2025-03-24 13:50:15', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(695, 181, 'suwiry', NULL, 'girarybi@mailinator.com', 'yes', NULL, NULL, '$2y$10$mfMbLdp6fJ5ER9UI1qSYzeHuhGCHsPJJOfCOxIFPyBmgr9VrRF9tC', 'pre_approved_member', NULL, NULL, NULL, NULL, 'oasis_sipp__check', 'sipp_property_check', 'full_sipp_check', 'ftp_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-24 05:02:58', '2025-03-24 05:02:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(696, 648, 'Rebecca', 'Alltrust Cardiff', 'rebecca.hunt@alltrust.co.uk', 'yes', NULL, NULL, '$2y$10$azXdFLlBTzJpeCiOwCkueOXnkiuWkcpCYIAk6rZM.OmNZwKqkSzPG', 'admin', NULL, NULL, NULL, NULL, 'oasis_sipp__check', 'sipp_property_check', 'full_sipp_check', 'ftp_check', 'pending_applications', 'existing_applications', 'decline_applications', NULL, NULL, 'member_details_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-25 12:09:04', '2025-04-30 10:31:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(697, NULL, 'gary cane', NULL, 'gary.cane@threesixtyfinancial.com', 'yes', NULL, '2025-03-26 06:20:56', '$2y$10$qB4Ov6ER9rZA/p2SJW6t/.EPrNyw0nAJPQvzOYpF7GFwo7d1g0fY.', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-26 06:20:35', '2025-03-28 04:54:30', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(699, NULL, 'Nigel Orrick', NULL, 'nigel@aspirewealthlimited.co.uk', 'yes', NULL, '2025-03-26 15:52:51', '$2y$10$E6h5zfL2qiHVeG6ZyS1oa.SFdyXtulwplyw2K2Aux3Yfa52PcBv8K', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-26 15:52:28', '2025-04-09 10:25:27', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(700, NULL, 'Pi Financial Ltd', NULL, 'pi.accounts@pifinancial.co.uk', 'no', NULL, '2025-03-28 11:14:21', '$2y$10$gtF5aVsBqczSmxQSXAonP.pMX0VtlXApv3uhyPRTbqGuJSXODdfrO', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-28 11:13:41', '2025-03-28 12:36:29', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(701, NULL, 'Joe Miles', NULL, 'joe@milesproperties.co.uk', 'yes', NULL, '2025-03-28 15:16:37', '$2y$10$1/BaYI8ZDsTU0GKscoGK7um/.NyjEeoekWJ5GoY9MD9hHytZM51Me', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-28 15:16:12', '2025-03-28 15:16:37', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(702, NULL, 'Robert Thomas', NULL, 'bob@cliftonbc.co.uk', 'yes', NULL, '2025-03-28 15:32:54', '$2y$10$PrYsWkbrkhmkOJs5/qaNzu2bcDQPMlTGzA8A6m6bgFh2.fKSzHCEq', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-28 15:32:30', '2025-03-28 15:32:54', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(703, NULL, 'Opdwodowkdwiidwok djwkqdwqofhjqwlsqj jfkmclasdkjfjewlfjkwkdjoiqw fnedkwdkowfwhi jiowjiowhfiwkj rohriowjropwjrofwjrijeiwo alltrust.co.uk', NULL, 'nomin.momin+397e7@mail.ru', 'yes', NULL, NULL, '$2y$10$wbCisJNDzAFbPkIOILCjue1eDphFPjVhZtVF4cpAJe8Cvgmi/CnH.', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-30 22:55:41', '2025-03-30 22:55:41', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(704, NULL, 'IL Copr & Tech Ltd', NULL, 'info@ilcorp.tech', 'yes', NULL, '2025-03-31 07:14:01', '$2y$10$5PA0VkZyQa.LQs81M7Om1.IiSaCMWSyCygyxW0t15LNWEsdAVCKwi', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-31 07:13:09', '2025-03-31 07:14:01', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(705, NULL, 'David Watson', NULL, 'david@kmlfs.co.uk', 'yes', NULL, '2025-04-01 10:11:21', '$2y$10$AkljfxsfTtYKKczucOoASeNuCz5VnnXwChbWrd0Cv3r9evQVfx0qS', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, 'JNdcFJvhUjGD8nGYCFrfI7q8T3PYYC9gJPfQcYa8CEJZOLNdmmRyXxjAfp4U', NULL, NULL, NULL, '2025-04-01 10:09:40', '2025-04-01 10:11:21', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(706, NULL, 'Christopher Power', NULL, 'chris.power@phwwealth.com', 'yes', NULL, '2025-04-01 11:11:36', '$2y$10$18B4cJr2fv7WTeeiENcXHe3EPQtVFqqX/2w4LAEccKvJ0VE4.tOXy', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, 'o6P4E1MHvNPdVtx9pjQ5wHZa124eMfsb4LDtHVUaMfQZUSanV7yMeSIqrx7c', NULL, NULL, NULL, '2025-04-01 10:49:09', '2025-04-11 10:59:56', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(707, NULL, 'Angelica Polo', NULL, 'finance@pccwealth.com', 'yes', NULL, '2025-04-02 13:37:12', '$2y$10$jqQTv2h9k.cT7hallgZJcO2k2xfBrWzRTrfnw1.Pq0XLjRaifO9b.', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-02 13:36:59', '2025-04-02 13:37:12', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(708, NULL, 'Sarah Van Der Veen', NULL, 'sarah.vanderveen@wpswealth.co.uk', 'yes', NULL, '2025-04-02 15:36:11', '$2y$10$bKe1jhVi26XL2XaV2eIb0uaq0iOFtxKM8KnndEiar00QI5ktzYg4q', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-02 15:35:55', '2025-04-03 10:13:32', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(709, NULL, 'Richard Greenland', NULL, 'richardg@amaliawealth.com', 'yes', NULL, NULL, '$2y$10$0nYsMxF0Q5w21FsEZqgvkuZluZejrRH.5uq.RVpKok0UymEmFos1K', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, 'oQMYp25GMFzqY77iFt8339p4Zzdtlg3cKUod1SFI4NQwqOZ8GkiIRiSt6Ebj', NULL, NULL, NULL, '2025-04-02 15:58:02', '2025-04-03 09:02:29', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(710, NULL, 'Lead Solution Wealth Management', NULL, 'compliance@leadsolutionss.com', 'yes', NULL, '2025-04-03 06:17:39', '$2y$10$Z2LvjO7A6GVawRhoyvGD8OtSyYTNm1.f3dlE4zxlfoKJXBzKROI7O', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-03 06:17:22', '2025-04-03 06:17:39', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(711, NULL, 'Patrick Theobalds', NULL, 'ptheobalds@pembrokefs.co.uk', 'yes', NULL, NULL, '$2y$10$Mt0iVIWir46YIbDYGKMFwOJCHo6jdvNpe.DdVnYXXoWj7K1u3nk8O', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-03 16:36:44', '2025-04-03 21:06:59', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(712, NULL, 'Tina Hind', NULL, 'tina.hind@fidelius.co.uk', 'yes', NULL, '2025-04-04 13:25:32', '$2y$10$wTGZb9LvsM6ezJio2lb5KefBmeDD9oVflpRlzzH8zBVbXQQ.SVNeu', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, '5WQUvbfzEMgorIihV0HPwdRs8VdEDooawk4iEJPY9jc5gUtChkCqh17tQQ5l', NULL, NULL, NULL, '2025-04-04 13:21:47', '2025-04-04 13:25:32', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(713, NULL, 'stephen bull', NULL, 'stevejbull@blueyonder.co.uk', 'yes', NULL, '2025-04-04 13:25:32', '$2y$10$DKoYrUVGmRRsKIHJx/mcMe/62DbmZDJf0DpMsxIDF2UNGRGpzt1Ee', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, 'xD5LkBvBh86Xvuc0yILK8Nf4XAlLIcNNw04jL5IrG4efHiFdQmw5XJZcWyns', NULL, NULL, NULL, '2025-04-05 10:18:51', '2025-04-06 10:58:52', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(714, 181, 'Sami ullah', 'Testing', 'us921708@gmail.com', 'yes', NULL, '2025-04-04 13:25:32', '$2y$10$l2EKDNiChjHwHGSRBZxRkeyMY.jMZqGcApOLiAtFrWKSAeE9w/A.C', 'admin', 'adviser_check', NULL, NULL, NULL, 'oasis_sipp__check', 'sipp_property_check', 'full_sipp_check', 'ftp_check', 'pending_applications', 'existing_applications', 'decline_applications', 'illustration_check', 'leads_check', 'member_details_check', 'user_management_check', 'dms_check', 'reports_check', 'workflow_check', 'tickets_check', 'support_check', 'faq_check', 'communication_check', 'adviser_applications_check', 'member_applications_check', NULL, NULL, NULL, NULL, '2025-04-07 07:06:01', '2025-05-06 10:36:09', 'offshore_check', 'offshore_pending', 'offshore_existing', 'offshore_declined', NULL, 'Afghanistan', 'Afghanistan'),
(715, 181, 'byfaq', NULL, 'fabik@mailinator.com', 'yes', NULL, NULL, '$2y$10$cYDbWMOtSNhbwkFxB0sJtuCitBSr0OwRYeXm9T5uiOYWYsL9UrEUq', 'pre_approved_member', NULL, NULL, NULL, NULL, 'oasis_sipp__check', 'sipp_property_check', 'full_sipp_check', 'ftp_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-07 07:06:54', '2025-04-07 07:06:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(716, 714, 'nihox', NULL, 'garajeboh@mailinator.com', 'yes', NULL, NULL, '$2y$10$ze3d3oQzckOzHCX9nboOHeEM5.NHPq9ZPdvn/5EvWDrExkI7EbPUa', 'pre_approved_member', NULL, NULL, NULL, NULL, 'oasis_sipp__check', 'sipp_property_check', 'full_sipp_check', 'ftp_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-07 07:11:57', '2025-04-07 07:11:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(717, NULL, 'Nicholas Poole', NULL, 'nick@poole7.com', 'yes', NULL, '2025-04-07 09:57:33', '$2y$10$ZoFXK6vS0c8xhGM2xAO2euLS27NyJqB25m0X/a9lFxw5SA2MHqeKW', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-07 09:51:31', '2025-04-07 09:57:33', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(718, NULL, 'Daniel Dickinson', NULL, 'Izabella.lodge@titanwealth.ae', 'yes', NULL, '2025-04-07 10:20:36', '$2y$10$hkuLtaS200YvRtOPFhIli.eZcIp7afzid5aLnqbUQdRjWg9K6XFoS', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-07 10:18:27', '2025-04-07 10:20:36', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(719, NULL, 'Dale Brown', NULL, 'dale@babifa.co.uk', 'yes', NULL, '2025-04-07 10:27:17', '$2y$10$3e4w6hDO7IJDqIP8bMIlqeY4eiKI98034fPsOwqL85KwpXVNh/nem', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-07 10:26:56', '2025-04-07 10:27:17', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(720, NULL, 'Sam Sussums', NULL, 'sam.sussums@pifinancial.co.uk', 'yes', NULL, '2025-04-08 13:44:40', '$2y$10$1/.AAPqKjvAq7F/oI9dAVOgXDl7P3mgLwme4ktJzKVrbLiUwc2aum', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-08 13:43:32', '2025-04-08 13:44:40', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(721, NULL, 'John Helfgott', NULL, 'john@highwood.co.uk', 'yes', NULL, '2025-04-08 14:26:56', '$2y$10$yxyCOlsjyXXIXdkG3faRkeEHdazR8mwaZRftUU0VASsiwb9t.CysW', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-08 14:05:52', '2025-04-08 14:26:56', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(722, NULL, 'andrew robertson', NULL, 'andrew.robertson@fosterdenovo.com', 'yes', NULL, NULL, '$2y$10$IZDkD/8fGdJ0PO3GRO/JFOy4Jwj7mp4tMdFfvEB5HWyzrShoGpuyu', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-09 09:33:52', '2025-04-09 09:33:52', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(723, NULL, 'Francesca Smith', NULL, 'frankie@fswm.uk', 'yes', NULL, NULL, '$2y$10$sIZMM2aL16KYVFLFmLdj7Of/uUGCvrgAZfIjYA2a8AvD6VX2VMXLa', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, 'bzHpRu900sWCizjpyE3dVr9iQHu8c1qNobMdULksPJr3W7wMQ2Chyk1cqyol', NULL, NULL, NULL, '2025-04-09 12:45:57', '2025-04-09 14:19:03', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(724, NULL, 'Julian Harris', NULL, 'compliance@julianharris.net', 'yes', NULL, '2025-04-10 10:38:43', '$2y$10$G7U/hlKRo8jj/HtcSxRuXOkon/t9B3c.LXCTGEphrnlLPCdp9A6sC', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, 'bLsBioPnssspzoIXL7CA8sL7CVZcQhvTb5MRvVKLpAEzE9LFgt387GAN8jVy', NULL, NULL, NULL, '2025-04-10 10:38:29', '2025-04-10 15:52:21', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(725, NULL, 'Emma vieth', NULL, 'ev@lampiers.com', 'yes', NULL, NULL, '$2y$10$38x.h0ufrCWxheKqYTFuSu9vNmAUrSns91k.bRsLtMBpYfOJ2Kw3G', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, '1fButAgcnouxhoTaFA5akPKQNlG0qzv8lwW0CZXTK1OzZEEMlhmIGDkhhR7D', NULL, '977012', '2025-04-10 13:51:26', '2025-04-10 13:40:28', '2025-04-10 13:41:26', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(726, NULL, 'Alexander Hutton', NULL, 'info@indigosca.com', 'yes', NULL, NULL, '$2y$10$fDV7tj3piBjR9hbrAn2qUOTVliKJsdgojgmA2rPcrdWG8Wi3.ed/2', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, '5bGBR9NtgmwihGDAILUw19m0H9KY6Rfm0UCVb7InT8OamZdnCFWz6V3dAm2A', NULL, '561277', '2025-04-14 10:38:15', '2025-04-14 07:07:26', '2025-04-14 10:28:15', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(727, NULL, 'Jacquie Richards', NULL, 'jacquie.richards@shackletonadvisers.co.uk', 'yes', NULL, NULL, '$2y$10$mxdiVTWyKZZ/ECIkc6AWR.n2IDF//8.42oTVjNHQJfWZvHAQuoRDe', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-14 15:45:56', '2025-04-14 15:45:56', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(728, NULL, 'paul freeman', NULL, 'paul.freeman@hexagonwealth.co.uk', 'yes', NULL, '2025-04-14 17:49:44', '$2y$10$kLsTpsppgiAA8U8rWPBECuPvoB207cz13vOENrZXXy/5iN7w9HwuG', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-14 17:48:39', '2025-04-14 17:49:44', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(729, NULL, 'Paul Smyth', NULL, 'psmyth@psafinancial.co.uk', 'yes', NULL, '2025-04-16 14:05:41', '$2y$10$cGORFuN0nWKePZGumOKU/euqT5o3SZR6AXffU2YQwWw7BFDaoOiuS', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-16 14:04:11', '2025-04-16 14:05:41', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(730, NULL, 'Emma Walsh', NULL, 'emma@tudorhousefs.co.uk', 'yes', NULL, '2025-04-16 15:03:15', '$2y$10$qXY/OAS5Y7rasYWkjzSx9eYYjYB5Y/U8DUTWSHF8ZpuJE5jjYf1Ee', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-16 15:01:54', '2025-04-16 15:03:15', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(731, NULL, 'Marcus Forsey', NULL, 'marcus.forsey@alltrust.co.uk', 'no', NULL, '2025-04-17 08:03:47', '$2y$10$joYdCqyR5HdmK3Uq.bCkS.kcPT5hWhOYPCHgafNjfrCQObsxbcfJS', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-17 08:03:26', '2025-04-17 08:06:13', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(732, NULL, 'Cameron r Knox', NULL, 'client.services@imperium-capital.biz', 'yes', NULL, '2025-04-18 04:54:42', '$2y$10$deOuTJoeSQbeQ.SnBv91qu6XMhMMHQcPXhxpEqvmQk6PgrE2fHjzi', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, 'VAIOcG5BRqsKqmFt63kSe4BAlL903bHXCFDQ8dA1fIabytl3KhRWCTlw0sT7', NULL, NULL, NULL, '2025-04-18 04:54:19', '2025-04-18 09:09:08', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(733, NULL, 'Charlotte Cover', NULL, 'Charlotte.cover@handelsbanken.co.uk', 'yes', NULL, '2025-04-22 09:15:46', '$2y$10$8MqR2O5QoxnKsfSUaGALueht7Z2d5yTHOUt/j.2aM9x1uVCNjeh9C', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-22 09:15:23', '2025-04-22 09:15:46', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(734, NULL, 'Robert (Bob) Symons', NULL, 'bob.symons@titanwh.com', 'yes', NULL, '2025-04-22 10:59:37', '$2y$10$ornCNrPLv2WGgeTjjwgxvudAYyYsjno4Oj6bzxKmMN8TP5/HfOPra', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-22 10:59:14', '2025-04-22 10:59:37', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(735, NULL, 'JOHN CLEVERLEY', NULL, 'jclev@blueyonder.co.uk', 'yes', NULL, NULL, '$2y$10$NFRAqzoGO4RpOZ3y4d5P4.Uz90KaCwzZQTDdY5At9u1EjGu2VgDSW', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-22 11:25:17', '2025-04-22 11:25:17', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(736, NULL, 'Paul Scott', NULL, 'paulrscott1@gmail.com', 'yes', NULL, '2025-04-22 13:14:23', '$2y$10$mlZuk7pfcK/f5ZgCRsovdONYzPH5YkLFZ8oyxGPRnbQh11Ler7hSa', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-22 13:13:30', '2025-04-22 13:14:23', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(737, NULL, 'GERALDINE', NULL, 'geraldine.alano@blacktowerfm.com', 'yes', NULL, '2025-04-23 06:43:50', '$2y$10$1YK2UHaRsq/lzQHUnr/3qO6qDQIn0TqFD.ZJy3TvKL4b8cvwBe.UG', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-23 06:42:57', '2025-04-23 06:43:50', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(738, NULL, 'Foysol Hussain', NULL, 'foysol@trustedwealth.co.uk', 'yes', NULL, '2025-04-23 07:34:10', '$2y$10$uQcSvLzefVn1BaNaHTh2/ewv7/pkAKoQfjdWWPKl37LL/yav9DtU2', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, 'CjDHXrwSgrlV3F1pmNrVzey5gtwGSwhlD1mBlTLW37KHYngOot0itKgbxP86', NULL, NULL, NULL, '2025-04-23 07:33:45', '2025-04-30 08:37:32', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(739, NULL, 'Stephen Lloyd', NULL, 'srlloyd@sky.com', 'yes', NULL, NULL, '$2y$10$zPlsG6CG46s8sC4yB4391uHyYUAKZvIdbcZTktlZnXsWAY/eNOUm.', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, '952037', '2025-04-23 15:51:09', '2025-04-23 15:35:15', '2025-04-23 15:41:09', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(740, NULL, 'Matt Goodley', NULL, 'matt@mgassetplanningltd.uk', 'yes', NULL, '2025-04-25 07:26:31', '$2y$10$bjtrqgPX3xibaanTK1Z77OK52VQUco/diXDl.JSw5IEW14H77ALdq', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-25 07:26:13', '2025-04-25 07:26:31', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(741, NULL, 'Deborah King', NULL, 'debbie@beckettsfs.co.uk', 'no', NULL, NULL, '$2y$10$spe/aEomCPoaH.0lHDjT/OEcunk7SZGWZEC0CxLC26cMCDziOTpfS', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, 'vj6xFI3lIST3pHY3KAIBIYYQCNa1JHiJ4nh0ORl1WIngqib0Ee5yeT2pS7lO', NULL, '797796', '2025-04-25 10:27:07', '2025-04-25 10:16:34', '2025-04-25 10:22:54', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(742, NULL, 'Richard Walker-Gunns', NULL, 'richard@orbitfp.co.uk', 'yes', NULL, '2025-04-28 13:17:03', '$2y$10$xjYAEtRMwm2tACrCid/oEO2o4s0vAMYDCfPJpt3kOO/aHHKEpX61K', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-28 13:16:06', '2025-04-30 08:30:18', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(743, NULL, 'Paul', NULL, 'pwright261279@gmail.com', 'yes', NULL, '2025-04-30 07:48:33', '$2y$10$Cdjh7lGj0e4TboYEQbW3LO2eL8kKY0cV3PF1fiv42Q1Jjnf72X7ai', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-30 07:47:57', '2025-04-30 07:48:33', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` (`id`, `creator_id`, `name`, `firm_name`, `email`, `email_notification`, `role_member`, `email_verified_at`, `password`, `role`, `adviser_check`, `adviser_pending`, `adviser_existing`, `adviser_declined`, `oasis_sipp__check`, `sipp_property_check`, `full_sipp_check`, `ftp_check`, `pending_applications`, `existing_applications`, `decline_applications`, `illustration_check`, `leads_check`, `member_details_check`, `user_management_check`, `dms_check`, `reports_check`, `workflow_check`, `tickets_check`, `support_check`, `faq_check`, `communication_check`, `adviser_applications_check`, `member_applications_check`, `remember_token`, `verification_code`, `two_step_code`, `two_step_expires_at`, `created_at`, `updated_at`, `offshore_check`, `offshore_pending`, `offshore_existing`, `offshore_declined`, `dob`, `nationality`, `country_residency`) VALUES
(744, NULL, 'Mr Shea Nugent', NULL, 'sheanugent@wcctv.com', 'yes', NULL, '2025-04-30 08:13:45', '$2y$10$4fL26XyyJUg4CcgSy8MvROPvVdUcsdlU31HWrzsf9NnLLi3A/JBTq', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-30 08:13:01', '2025-04-30 08:13:45', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(745, NULL, 'Paul Spencer', NULL, 'paul@pwsgulf.com', 'yes', NULL, NULL, '$2y$10$Wec/wZtiy6YAChAF6NZU0.03WKVqRCmnKNOeXCOkruLmdwemTLuMC', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-30 08:34:36', '2025-04-30 08:34:36', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(746, NULL, 'Hadley Short', NULL, 'winingstreak+76@gmail.com', 'yes', NULL, NULL, '$2y$10$eohbHqDaqw5k6owok9gVgeAw3jgOnQKDJa5m.aaRUqmSkyhWKNCiW', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tickets_check', 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-02 07:35:42', '2025-05-02 07:35:42', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(747, NULL, 'Indulis', NULL, 'indulis.goldbergs@gmail.com', 'yes', NULL, '2025-05-02 07:37:15', '$2y$10$f01ONz4x6aWIKV7hUif/Ce.FvSfocNIuC4rrMGOAPF/SgolpUedGC', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tickets_check', 'support_check', 'faq_check', NULL, NULL, NULL, 'CD8txlPiEEKc2ALEQ7JxlvshI2IWsffHAGK8lbccn1fEoy5QqZW301fmIrQR', NULL, NULL, NULL, '2025-05-02 07:36:54', '2025-05-02 07:38:45', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(749, 184, 'Maxine Samuda', 'Alltrust Services', 'maxine.samuda@alltrust.co.uk', 'yes', NULL, '2025-05-02 09:09:01', '$2y$10$vo/lp2mLEEgA5K1sX/PmfOqy.Dc1Yj9trzEXodwO2TqO.q1xPXKku', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'member_details_check', NULL, NULL, NULL, NULL, 'tickets_check', 'support_check', NULL, NULL, NULL, NULL, 'PvQckqyJOAcjnTtc4m0SuGL3mcDITMAacv9929SgfWPmVGebn2Tfkyo2y5gS', NULL, NULL, NULL, '2025-05-02 09:09:01', '2025-05-06 08:03:10', NULL, NULL, NULL, NULL, NULL, 'United Kingdom', 'United Kingdom'),
(750, NULL, 'qwesrdfghgrfe', NULL, 'RGSFDSGS@SFDDJHTG.CO.UK', 'yes', NULL, NULL, '$2y$10$l3g6tSqF/Rgskfe6HK8diuDt/b4Eo5O7RIILYckrORLfosXVm7v0S', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tickets_check', 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-02 14:20:12', '2025-05-02 14:20:12', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL),
(751, NULL, 'IL Corp & Tech', NULL, 'barsukovs.indulis@gmail.com', 'yes', NULL, NULL, '$2y$10$kOZRUFCOk5kD2x0oCNxyx.xKbFMSmW4sKtDfL72bp476hMH1woV7C', 'pre_approved_adviser_firm', 'adviser_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tickets_check', 'support_check', 'faq_check', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-06 07:58:10', '2025-05-06 08:00:25', 'offshore_check', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advisers`
--
ALTER TABLE `advisers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adviser_user` (`selected_adviser_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dmss`
--
ALTER TABLE `dmss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_member_id_foreign` (`member_id`);

--
-- Indexes for table `draft_advisers`
--
ALTER TABLE `draft_advisers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `draft_fpts`
--
ALTER TABLE `draft_fpts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `draft_members`
--
ALTER TABLE `draft_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `draft_offshores`
--
ALTER TABLE `draft_offshores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fpts`
--
ALTER TABLE `fpts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fpt_user` (`user_id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberdetails`
--
ALTER TABLE `memberdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_user` (`role`),
  ADD KEY `created_user` (`creater_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offshores`
--
ALTER TABLE `offshores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pensionmanagements`
--
ALTER TABLE `pensionmanagements`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `supports`
--
ALTER TABLE `supports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `support_user` (`user_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_user` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advisers`
--
ALTER TABLE `advisers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `dmss`
--
ALTER TABLE `dmss`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `draft_advisers`
--
ALTER TABLE `draft_advisers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `draft_fpts`
--
ALTER TABLE `draft_fpts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `draft_members`
--
ALTER TABLE `draft_members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `draft_offshores`
--
ALTER TABLE `draft_offshores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fpts`
--
ALTER TABLE `fpts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT for table `memberdetails`
--
ALTER TABLE `memberdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `offshores`
--
ALTER TABLE `offshores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `pensionmanagements`
--
ALTER TABLE `pensionmanagements`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supports`
--
ALTER TABLE `supports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=752;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advisers`
--
ALTER TABLE `advisers`
  ADD CONSTRAINT `adviser_user` FOREIGN KEY (`selected_adviser_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fpts`
--
ALTER TABLE `fpts`
  ADD CONSTRAINT `fpt_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `created_user` FOREIGN KEY (`creater_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_user` FOREIGN KEY (`role`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supports`
--
ALTER TABLE `supports`
  ADD CONSTRAINT `support_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `ticket_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
