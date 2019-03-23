#
# TABLE STRUCTURE FOR: account_2
#

DROP TABLE IF EXISTS `account_2`;

CREATE TABLE `account_2` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_name` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `parent_id` int(1) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `account_2` (`account_id`, `account_name`, `created_at`, `parent_id`, `status`) VALUES ('1', 'Office account 1', '2018-10-28 18:42:06', '3', '0');


#
# TABLE STRUCTURE FOR: bank_add
#

DROP TABLE IF EXISTS `bank_add`;

CREATE TABLE `bank_add` (
  `bank_id` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `ac_name` varchar(250) DEFAULT NULL,
  `ac_number` varchar(250) DEFAULT NULL,
  `branch` varchar(250) DEFAULT NULL,
  `signature_pic` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: bank_summary
#

DROP TABLE IF EXISTS `bank_summary`;

CREATE TABLE `bank_summary` (
  `bank_id` varchar(250) DEFAULT NULL,
  `description` text,
  `deposite_id` varchar(250) DEFAULT NULL,
  `date` varchar(250) DEFAULT NULL,
  `ac_type` varchar(50) DEFAULT NULL,
  `dr` float DEFAULT NULL,
  `cr` float DEFAULT NULL,
  `ammount` float DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: cheque_manger
#

DROP TABLE IF EXISTS `cheque_manger`;

CREATE TABLE `cheque_manger` (
  `cheque_id` varchar(100) NOT NULL,
  `transection_id` varchar(100) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `bank_id` varchar(100) NOT NULL,
  `cheque_no` varchar(100) NOT NULL,
  `date` varchar(250) DEFAULT NULL,
  `transection_type` varchar(100) NOT NULL,
  `cheque_status` int(10) NOT NULL,
  `amount` float NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: company_information
#

DROP TABLE IF EXISTS `company_information`;

CREATE TABLE `company_information` (
  `company_id` varchar(250) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `website` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `company_information` (`company_id`, `company_name`, `email`, `address`, `mobile`, `website`, `status`) VALUES ('1', 'bdtask', 'bdtask@gmail.com', 'khilkhet, dhaka', '', 'https://www.bdtask.com/', '1');


#
# TABLE STRUCTURE FOR: customer_information
#

DROP TABLE IF EXISTS `customer_information`;

CREATE TABLE `customer_information` (
  `customer_id` varchar(250) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_mobile` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `status` int(2) NOT NULL COMMENT '1=paid,2=credit',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `customer_information` (`customer_id`, `customer_name`, `customer_address`, `customer_mobile`, `customer_email`, `status`, `create_date`) VALUES ('W8ITBP62KB4G3MR', 'Customer One', '', '464654654', 'customerone@gmail.com', '1', '2018-10-27 12:36:12');
INSERT INTO `customer_information` (`customer_id`, `customer_name`, `customer_address`, `customer_mobile`, `customer_email`, `status`, `create_date`) VALUES ('3Y1UA5NAC18IE4P', 'Customer Two', 'Dhaka', '468764154', 'customertwo@gmail.com', '1', '2018-10-27 12:36:45');


#
# TABLE STRUCTURE FOR: customer_ledger
#

DROP TABLE IF EXISTS `customer_ledger`;

CREATE TABLE `customer_ledger` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(100) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `invoice_no` varchar(100) DEFAULT NULL,
  `receipt_no` varchar(50) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `cheque_no` varchar(255) NOT NULL,
  `date` varchar(250) DEFAULT NULL,
  `receipt_from` varchar(50) DEFAULT NULL,
  `status` int(2) NOT NULL,
  `d_c` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

INSERT INTO `customer_ledger` (`id`, `transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `receipt_from`, `status`, `d_c`, `created_at`) VALUES ('1', 'F615F5E7VZ', 'W8ITBP62KB4G3MR', 'NA', NULL, '0', 'Previous adjustment with software', 'NA', 'NA', '2018-10-27', NULL, '1', '', '2018-10-27 12:36:12');
INSERT INTO `customer_ledger` (`id`, `transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `receipt_from`, `status`, `d_c`, `created_at`) VALUES ('2', 'GH2PUU5XMG', '3Y1UA5NAC18IE4P', 'NA', NULL, '0', 'Previous adjustment with software', 'NA', 'NA', '2018-10-27', NULL, '1', '', '2018-10-27 12:36:45');
INSERT INTO `customer_ledger` (`id`, `transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `receipt_from`, `status`, `d_c`, `created_at`) VALUES ('6', 'X26Y8U4FAFHQWI5', 'W8ITBP62KB4G3MR', NULL, 'O58S3ZNMCU', '1400', 'Paid by customer', '1', '', '2018-10-27', NULL, '1', 'c', '2018-10-27 16:55:12');
INSERT INTO `customer_ledger` (`id`, `transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `receipt_from`, `status`, `d_c`, `created_at`) VALUES ('5', 'X26Y8U4FAFHQWI5', 'W8ITBP62KB4G3MR', NULL, NULL, '1400', 'Paid by customer', '1', '', '2018-10-27', NULL, '1', 'd', '2018-10-27 16:55:12');
INSERT INTO `customer_ledger` (`id`, `transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `receipt_from`, `status`, `d_c`, `created_at`) VALUES ('7', 'Y694YMNOFZZJO73', 'W8ITBP62KB4G3MR', NULL, 'PJPVNJ6L5U', '200', '200 taka receipt ', '1', '', '2018-10-27', 'receipt', '1', 'c', '2018-10-27 16:56:51');
INSERT INTO `customer_ledger` (`id`, `transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `receipt_from`, `status`, `d_c`, `created_at`) VALUES ('8', 'X2ZW5T4HKFAGYM6', 'W8ITBP62KB4G3MR', NULL, 'UXJFQ6NKSN', '40', '40 tk receipt korsi customer one theke', '1', '', '2018-10-28', 'receipt', '1', 'c', '2018-10-28 12:09:16');
INSERT INTO `customer_ledger` (`id`, `transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `receipt_from`, `status`, `d_c`, `created_at`) VALUES ('9', 'N6AXQDX5N9S1QPC', 'W8ITBP62KB4G3MR', '6977479388', NULL, '1740', 'Purchase by customer', '1', '', '2018-10-27', NULL, '1', 'd', '2018-10-29 12:00:56');
INSERT INTO `customer_ledger` (`id`, `transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `receipt_from`, `status`, `d_c`, `created_at`) VALUES ('10', 'N6AXQDX5N9S1QPC', 'W8ITBP62KB4G3MR', NULL, 'PW8DNQVFRV', '1400', 'Paid by customer', '1', '', '2018-10-27', NULL, '1', 'c', '2018-10-29 12:00:56');
INSERT INTO `customer_ledger` (`id`, `transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `receipt_from`, `status`, `d_c`, `created_at`) VALUES ('11', 'JE5B8D3KLNFMOYT', '3Y1UA5NAC18IE4P', NULL, 'VJ2UKKP6VI', '2000', 'Paid by customer', '1', '', '2018-10-29', NULL, '1', 'c', '2018-10-29 13:23:05');
INSERT INTO `customer_ledger` (`id`, `transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `receipt_from`, `status`, `d_c`, `created_at`) VALUES ('12', 'JE5B8D3KLNFMOYT', '3Y1UA5NAC18IE4P', '5717325439', NULL, '2800', 'Purchase by customer', '', '', '2018-10-29', NULL, '1', 'd', '2018-10-29 13:23:05');
INSERT INTO `customer_ledger` (`id`, `transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `receipt_from`, `status`, `d_c`, `created_at`) VALUES ('13', 'JE5B8D3KLNFMOYT', '3Y1UA5NAC18IE4P', '5717325439', NULL, '1400', 'Return', '', '', '2018-10-29', NULL, '1', 'c', '2018-10-29 14:44:56');
INSERT INTO `customer_ledger` (`id`, `transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `receipt_from`, `status`, `d_c`, `created_at`) VALUES ('14', 'MZT9TC261CJ4V3E', '3Y1UA5NAC18IE4P', NULL, 'IN978YJ9PP', '300', '300 tk paid korsi return babod', '1', '', '2018-10-29', NULL, '1', 'd', '2018-10-29 16:47:37');
INSERT INTO `customer_ledger` (`id`, `transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `receipt_from`, `status`, `d_c`, `created_at`) VALUES ('15', 'HHM3CKF9MVWPWHC', 'W8ITBP62KB4G3MR', NULL, 'T6XXTDHCAG', '200', '200 tk nilam', '1', '', '2018-10-29', 'receipt', '1', 'c', '2018-10-29 18:09:21');


#
# TABLE STRUCTURE FOR: customer_transection_summary
#

DROP TABLE IF EXISTS `customer_transection_summary`;

CREATE   VIEW `customer_transection_summary` AS select `customer_information`.`customer_name` AS `customer_name`,`customer_ledger`.`customer_id` AS `customer_id`,'credit' AS `type`,sum(-(`customer_ledger`.`amount`)) AS `amount` from (`customer_ledger` join `customer_information` on((`customer_information`.`customer_id` = `customer_ledger`.`customer_id`))) where (isnull(`customer_ledger`.`receipt_no`) and (`customer_ledger`.`status` = 1)) group by `customer_ledger`.`customer_id` union all select `customer_information`.`customer_name` AS `customer_name`,`customer_ledger`.`customer_id` AS `customer_id`,'debit' AS `type`,sum(`customer_ledger`.`amount`) AS `amount` from (`customer_ledger` join `customer_information` on((`customer_information`.`customer_id` = `customer_ledger`.`customer_id`))) where (isnull(`customer_ledger`.`invoice_no`) and (`customer_ledger`.`status` = 1)) group by `customer_ledger`.`customer_id`;

utf8mb4_general_ci;

INSERT INTO `customer_transection_summary` (`customer_name`, `customer_id`, `type`, `amount`) VALUES ('Customer Two', '3Y1UA5NAC18IE4P', 'credit', '-4200');
INSERT INTO `customer_transection_summary` (`customer_name`, `customer_id`, `type`, `amount`) VALUES ('Customer One', 'W8ITBP62KB4G3MR', 'credit', '-3140');
INSERT INTO `customer_transection_summary` (`customer_name`, `customer_id`, `type`, `amount`) VALUES ('Customer Two', '3Y1UA5NAC18IE4P', 'debit', '2300');
INSERT INTO `customer_transection_summary` (`customer_name`, `customer_id`, `type`, `amount`) VALUES ('Customer One', 'W8ITBP62KB4G3MR', 'debit', '4640');


#
# TABLE STRUCTURE FOR: daily_banking_add
#

DROP TABLE IF EXISTS `daily_banking_add`;

CREATE TABLE `daily_banking_add` (
  `banking_id` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `bank_id` varchar(100) NOT NULL,
  `deposit_type` varchar(255) NOT NULL,
  `transaction_type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: daily_closing
#

DROP TABLE IF EXISTS `daily_closing`;

CREATE TABLE `daily_closing` (
  `closing_id` varchar(255) NOT NULL,
  `last_day_closing` float NOT NULL,
  `cash_in` float NOT NULL,
  `cash_out` float NOT NULL,
  `date` varchar(250) NOT NULL,
  `amount` float NOT NULL,
  `adjustment` float DEFAULT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: invoice
#

DROP TABLE IF EXISTS `invoice`;

CREATE TABLE `invoice` (
  `invoice_id` varchar(100) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `date` varchar(50) DEFAULT NULL,
  `total_amount` float NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `invoice_discount` float DEFAULT NULL COMMENT 'invoice discount',
  `total_discount` float DEFAULT NULL COMMENT 'total invoice discount',
  `total_tax` float DEFAULT NULL,
  `invoice_details` text NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `invoice_details`, `status`) VALUES ('6977479388', 'W8ITBP62KB4G3MR', '2018-10-27', '1740', '1000', '60', '660', '0', '', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `invoice_details`, `status`) VALUES ('5717325439', '3Y1UA5NAC18IE4P', '2018-10-29', '2800', '1001', '0', '0', '0', '', '1');


#
# TABLE STRUCTURE FOR: invoice_details
#

DROP TABLE IF EXISTS `invoice_details`;

CREATE TABLE `invoice_details` (
  `invoice_details_id` varchar(100) NOT NULL,
  `invoice_id` varchar(100) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `quantity` float NOT NULL,
  `rate` float NOT NULL,
  `supplier_rate` float DEFAULT NULL,
  `total_price` float NOT NULL,
  `discount` float DEFAULT NULL,
  `discount_per` varchar(15) DEFAULT NULL,
  `tax` float DEFAULT NULL,
  `paid_amount` float DEFAULT '0',
  `due_amount` float NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('629739518423575', '6977479388', '66491363', '2', '1200', NULL, '2400', '600', '25', '0', '1400', '340', '0');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('738148689532474', '5717325439', '18384353', '2', '1400', '1200', '2800', '0', '', '0', '2000', '800', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('876651164913682', '5717325439', '18384353', '-1', '1400', NULL, '-1400', '0', NULL, '0', '-1400', '0', '1');


#
# TABLE STRUCTURE FOR: language
#

DROP TABLE IF EXISTS `language`;

CREATE TABLE `language` (
  `id` int(11) unsigned NOT NULL,
  `phrase` text NOT NULL,
  `english` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('1', 'user_profile', 'User Profile');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('2', 'setting', 'Setting');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('3', 'language', 'Language');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('4', 'manage_users', 'Manage Users');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('5', 'add_user', 'Add User');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('6', 'manage_company', 'Manage Company');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('7', 'web_settings', 'Software Settings');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('8', 'manage_accounts', 'Manage Accounts');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('9', 'create_accounts', 'Create Account');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('10', 'manage_bank', 'Manage Bank');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('11', 'add_new_bank', 'Add New Bank');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('12', 'settings', 'Bank');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('13', 'closing_report', 'Closing Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('14', 'closing', 'Closing');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('15', 'cheque_manager', 'Cheque Manager');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('16', 'accounts_summary', 'Accounts Summary');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('17', 'expense', 'Expense');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('18', 'income', 'Income');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('19', 'accounts', 'Accounts');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('20', 'stock_report', 'Stock Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('21', 'stock', 'Stock');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('22', 'pos_invoice', 'POS Invoice');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('23', 'manage_invoice', 'Manage Invoice ');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('24', 'new_invoice', 'New Invoice');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('25', 'invoice', 'Invoice');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('26', 'manage_purchase', 'Manage Purchase');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('27', 'add_purchase', 'Add Purchase');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('28', 'purchase', 'Purchase');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('29', 'paid_customer', 'Paid Customer');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('30', 'manage_customer', 'Manage Customer');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('31', 'add_customer', 'Add Customer');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('32', 'customer', 'Customer');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('33', 'supplier_payment_actual', 'Supplier Payment Ledger');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('34', 'supplier_sales_summary', 'Supplier Sales Summary');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('35', 'supplier_sales_details', 'Supplier Sales Details');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('36', 'supplier_ledger', 'Supplier Ledger');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('37', 'manage_supplier', 'Manage Supplier');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('38', 'add_supplier', 'Add Supplier');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('39', 'supplier', 'Supplier');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('40', 'product_statement', 'Product Statement');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('41', 'manage_product', 'Manage Product');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('42', 'add_product', 'Add Product');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('43', 'product', 'Product');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('44', 'manage_category', 'Manage Category');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('45', 'add_category', 'Add Category');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('46', 'category', 'Category');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('47', 'sales_report_product_wise', 'Sales Report (Product Wise)');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('48', 'purchase_report', 'Purchase Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('49', 'sales_report', 'Sales Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('50', 'todays_report', 'Todays Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('51', 'report', 'Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('52', 'dashboard', 'Dashboard');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('53', 'online', 'Online');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('54', 'logout', 'Logout');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('55', 'change_password', 'Change Password');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('56', 'total_purchase', 'Total Purchase');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('57', 'total_amount', 'Total Amount');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('58', 'supplier_name', 'Supplier Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('59', 'invoice_no', 'Invoice No');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('60', 'purchase_date', 'Purchase Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('61', 'todays_purchase_report', 'Todays Purchase Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('62', 'total_sales', 'Total Sales');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('63', 'customer_name', 'Customer Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('64', 'sales_date', 'Sales Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('65', 'todays_sales_report', 'Todays Sales Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('66', 'home', 'Home');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('67', 'todays_sales_and_purchase_report', 'Todays sales and purchase report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('68', 'total_ammount', 'Total Amount');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('69', 'rate', 'Rate');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('70', 'product_model', 'Product Model');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('71', 'product_name', 'Product Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('72', 'search', 'Search');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('73', 'end_date', 'End Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('74', 'start_date', 'Start Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('75', 'total_purchase_report', 'Total Purchase Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('76', 'total_sales_report', 'Total Sales Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('77', 'total_seles', 'Total Sales');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('78', 'all_stock_report', 'All Stock Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('79', 'search_by_product', 'Search By Product');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('80', 'date', 'Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('81', 'print', 'Print');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('82', 'stock_date', 'Stock Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('83', 'print_date', 'Print Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('84', 'sales', 'Sales');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('85', 'price', 'Price');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('86', 'sl', 'SL.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('87', 'add_new_category', 'Add new category');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('88', 'category_name', 'Category Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('89', 'save', 'Save');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('90', 'delete', 'Delete');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('91', 'update', 'Update');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('92', 'action', 'Action');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('93', 'manage_your_category', 'Manage your category ');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('94', 'category_edit', 'Category Edit');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('95', 'status', 'Status');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('96', 'active', 'Active');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('97', 'inactive', 'Inactive');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('98', 'save_changes', 'Save Changes');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('99', 'save_and_add_another', 'Save And Add Another');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('100', 'model', 'Model');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('101', 'supplier_price', 'Supplier Price');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('102', 'sell_price', 'Sale Price');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('103', 'image', 'Image');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('104', 'select_one', 'Select One');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('105', 'details', 'Details');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('106', 'new_product', 'New Product');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('107', 'add_new_product', 'Add new product');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('108', 'barcode', 'Barcode');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('109', 'qr_code', 'Qr-Code');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('110', 'product_details', 'Product Details');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('111', 'manage_your_product', 'Manage your product');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('112', 'product_edit', 'Product Edit');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('113', 'edit_your_product', 'Edit your product');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('114', 'cancel', 'Cancel');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('115', 'incl_vat', 'Incl. Vat');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('116', 'money', 'TK');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('117', 'grand_total', 'Grand Total');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('118', 'quantity', 'Qnty');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('119', 'product_report', 'Product Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('120', 'product_sales_and_purchase_report', 'Product sales and purchase report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('121', 'previous_stock', 'Previous Stock');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('122', 'out', 'Out');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('123', 'in', 'In');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('124', 'to', 'To');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('125', 'previous_balance', 'Previous Credit Balance');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('126', 'customer_address', 'Customer Address');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('127', 'customer_mobile', 'Customer Mobile');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('128', 'customer_email', 'Customer Email');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('129', 'add_new_customer', 'Add new customer');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('130', 'balance', 'Balance');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('131', 'mobile', 'Mobile');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('132', 'address', 'Address');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('133', 'manage_your_customer', 'Manage your customer');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('134', 'customer_edit', 'Customer Edit');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('135', 'paid_customer_list', 'Paid Customer List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('136', 'ammount', 'Amount');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('137', 'customer_ledger', 'Customer Ledger');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('138', 'manage_customer_ledger', 'Manage Customer Ledger');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('139', 'customer_information', 'Customer Information');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('140', 'debit_ammount', 'Debit Amount');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('141', 'credit_ammount', 'Credit Amount');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('142', 'balance_ammount', 'Balance Amount');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('143', 'receipt_no', 'Receipt NO');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('144', 'description', 'Description');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('145', 'debit', 'Debit');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('146', 'credit', 'Credit');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('147', 'item_information', 'Item Information');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('148', 'total', 'Total');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('149', 'please_select_supplier', 'Please Select Supplier');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('150', 'submit', 'Submit');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('151', 'submit_and_add_another', 'Submit And Add Another One');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('152', 'add_new_item', 'Add New Item');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('153', 'manage_your_purchase', 'Manage your purchase');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('154', 'purchase_edit', 'Purchase Edit');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('155', 'purchase_ledger', 'Purchase Ledger');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('156', 'invoice_information', 'Invoice Information');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('157', 'paid_ammount', 'Paid Amount');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('158', 'discount', 'Dis./Pcs.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('159', 'save_and_paid', 'Save And Paid');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('160', 'payee_name', 'Payee Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('161', 'manage_your_invoice', 'Manage your invoice');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('162', 'invoice_edit', 'Invoice Edit');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('163', 'new_pos_invoice', 'New POS invoice');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('164', 'add_new_pos_invoice', 'Add new pos invoice');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('165', 'product_id', 'Product ID');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('166', 'paid_amount', 'Paid Amount');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('167', 'authorised_by', 'Authorised By');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('168', 'checked_by', 'Checked By');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('169', 'received_by', 'Received By');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('170', 'prepared_by', 'Prepared By');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('171', 'memo_no', 'Memo No');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('172', 'website', 'Website');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('173', 'email', 'Email');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('174', 'invoice_details', 'Invoice Details');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('175', 'reset', 'Reset');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('176', 'payment_account', 'Payment Account');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('177', 'bank_name', 'Bank Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('178', 'cheque_or_pay_order_no', 'Cheque/Pay Order No');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('179', 'payment_type', 'Payment Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('180', 'payment_from', 'Payment From');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('181', 'payment_date', 'Payment Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('182', 'add_income', 'Add Income');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('183', 'cash', 'Cash');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('184', 'cheque', 'Cheque');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('185', 'pay_order', 'Pay Order');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('186', 'payment_to', 'Payment To');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('187', 'total_outflow_ammount', 'Total Expense Amount');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('188', 'transections', 'Transections');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('189', 'accounts_name', 'Accounts Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('190', 'outflow_report', 'Expense Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('191', 'inflow_report', 'Income Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('192', 'all', 'All');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('193', 'account', 'Account');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('194', 'from', 'From');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('195', 'account_summary_report', 'Account Summary Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('196', 'search_by_date', 'Search By Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('197', 'cheque_no', 'Cheque No');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('198', 'name', 'Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('199', 'closing_account', 'Closing Account');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('200', 'close_your_account', 'Close your account');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('201', 'last_day_closing', 'Last Day Closing');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('202', 'cash_in', 'Cash In');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('203', 'cash_out', 'Cash Out');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('204', 'cash_in_hand', 'Cash In Hand');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('205', 'add_new_bank', 'Add New Bank');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('206', 'day_closing', 'Day Closing');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('207', 'account_closing_report', 'Account Closing Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('208', 'last_day_ammount', 'Last Day Amount');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('209', 'adjustment', 'Adjustment');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('210', 'pay_type', 'Pay Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('211', 'customer_or_supplier', 'Customer,Supplier Or Others');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('212', 'transection_id', 'Transections ID');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('213', 'accounts_summary_report', 'Accounts Summary Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('214', 'bank_list', 'Bank List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('215', 'bank_edit', 'Bank Edit');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('216', 'debit_plus', 'Debit (+)');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('217', 'credit_minus', 'Credit (-)');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('218', 'account_name', 'Account Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('219', 'account_type', 'Account Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('220', 'account_real_name', 'Account Real Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('221', 'manage_account', 'Manage Account');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('222', 'company_name', 'bdtask limited');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('223', 'edit_your_company_information', 'Edit your company information');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('224', 'company_edit', 'Company Edit');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('225', 'admin', 'Admin');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('226', 'user', 'User');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('227', 'password', 'Password');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('228', 'last_name', 'Last Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('229', 'first_name', 'First Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('230', 'add_new_user_information', 'Add new user information');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('231', 'user_type', 'User Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('232', 'user_edit', 'User Edit');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('233', 'rtr', 'RTR');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('234', 'ltr', 'LTR');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('235', 'ltr_or_rtr', 'LTR/RTR');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('236', 'footer_text', 'Footer Text');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('237', 'favicon', 'Favicon');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('238', 'logo', 'Logo');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('239', 'update_setting', 'Update Setting');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('240', 'update_your_web_setting', 'Update your web setting');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('241', 'login', 'Login');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('242', 'your_strong_password', 'Your strong password');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('243', 'your_unique_email', 'Your unique email');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('244', 'please_enter_your_login_information', 'Please enter your login information.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('245', 'update_profile', 'Update Profile');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('246', 'your_profile', 'Your Profile');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('247', 're_type_password', 'Re-Type Password');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('248', 'new_password', 'New Password');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('249', 'old_password', 'Old Password');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('250', 'new_information', 'New Information');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('251', 'old_information', 'Old Information');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('252', 'change_your_information', 'Change your information');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('253', 'change_your_profile', 'Change your profile');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('254', 'profile', 'Profile');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('255', 'wrong_username_or_password', 'Wrong User Name Or Password !');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('256', 'successfully_updated', 'Successfully Updated.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('257', 'blank_field_does_not_accept', 'Blank Field Does Not Accept !');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('258', 'successfully_changed_password', 'Successfully changed password.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('259', 'you_are_not_authorised_person', 'You are not authorised person !');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('260', 'password_and_repassword_does_not_match', 'Passwor and re-password does not match !');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('261', 'new_password_at_least_six_character', 'New Password At Least 6 Character.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('262', 'you_put_wrong_email_address', 'You put wrong email address !');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('263', 'cheque_ammount_asjusted', 'Cheque amount adjusted.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('264', 'successfully_payment_paid', 'Successfully Payment Paid.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('265', 'successfully_added', 'Successfully Added.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('266', 'successfully_updated_2_closing_ammount_not_changeale', 'Successfully Updated -2. Note: Closing Amount Not Changeable.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('267', 'successfully_payment_received', 'Successfully Payment Received.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('268', 'already_inserted', 'Already Inserted !');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('269', 'successfully_delete', 'Successfully Delete.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('270', 'successfully_created', 'Successfully Created.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('271', 'logo_not_uploaded', 'Logo not uploaded !');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('272', 'favicon_not_uploaded', 'Favicon not uploaded !');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('273', 'supplier_mobile', 'Supplier Mobile');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('274', 'supplier_address', 'Supplier Address');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('275', 'supplier_details', 'Supplier Details');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('276', 'add_new_supplier', 'Add New Supplier');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('277', 'manage_suppiler', 'Manage Supplier');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('278', 'manage_your_supplier', 'Manage your supplier');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('279', 'manage_supplier_ledger', 'Manage supplier ledger');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('280', 'invoice_id', 'Invoice ID');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('281', 'deposite_id', 'Deposite ID');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('282', 'supplier_actual_ledger', 'Supplier Payment Ledger');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('283', 'supplier_information', 'Supplier Information');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('284', 'event', 'Event');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('285', 'add_new_income', 'Add New Income');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('286', 'add_expese', 'Add Expense');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('287', 'add_new_expense', 'Add New Expense');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('288', 'total_inflow_ammount', 'Total Income Amount');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('289', 'create_new_invoice', 'Create New Invoice');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('290', 'create_pos_invoice', 'Create POS Invoice');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('291', 'total_profit', 'Total Profit');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('292', 'monthly_progress_report', 'Monthly Progress Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('293', 'total_invoice', 'Total Invoice');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('294', 'account_summary', 'Account Summary');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('295', 'total_supplier', 'Total Supplier');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('296', 'total_product', 'Total Product');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('297', 'total_customer', 'Total Customer');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('298', 'supplier_edit', 'Supplier Edit');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('299', 'add_new_invoice', 'Add New Invoice');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('300', 'add_new_purchase', 'Add new purchase');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('301', 'currency', 'Currency');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('302', 'currency_position', 'Currency Position');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('303', 'left', 'Left');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('304', 'right', 'Right');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('305', 'add_tax', 'Add Tax');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('306', 'manage_tax', 'Manage Tax');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('307', 'add_new_tax', 'Add new tax');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('308', 'enter_tax', 'Enter Tax');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('309', 'already_exists', 'Already Exists !');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('310', 'successfully_inserted', 'Successfully Inserted.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('311', 'tax', 'Tax');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('312', 'tax_edit', 'Tax Edit');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('313', 'product_not_added', 'Product not added !');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('314', 'total_tax', 'Total Tax');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('315', 'manage_your_supplier_details', 'Manage your supplier details.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('316', 'invoice_description', 'Lorem Ipsum is sim ply dummy Lorem Ipsum is simply dummy Lorem Ipsum is simply dummy Lorem Ipsum is simply dummy Lorem Ipsum is simply dummy Lorem Ipsum is sim ply dummy Lorem Ipsum is simply dummy Lorem Ipsum is simply dummy Lorem Ipsum is simply dummy Lorem Ipsum is simply dummy');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('317', 'thank_you_for_choosing_us', 'Thank you very much for choosing us.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('318', 'billing_date', 'Billing Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('319', 'billing_to', 'Billing To');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('320', 'billing_from', 'Billing From');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('321', 'you_cant_delete_this_product', 'Sorry !!  You can\'t delete this product.This product already used in calculation system!');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('322', 'old_customer', 'Old Customer');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('323', 'new_customer', 'New Customer');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('324', 'new_supplier', 'New Supplier');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('325', 'old_supplier', 'Old Supplier');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('326', 'credit_customer', 'Credit Customer');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('327', 'account_already_exists', 'This Account Already Exists !');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('328', 'edit_income', 'Edit Income');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('329', 'you_are_not_access_this_part', 'You are not authorised person !');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('330', 'account_edit', 'Account Edit');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('331', 'due', 'Due');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('332', 'expense_edit', 'Expense Edit');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('333', 'please_select_customer', 'Please select customer !');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('334', 'profit_report', 'Profit Report (Invoice Wise)');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('335', 'total_profit_report', 'Total profit report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('336', 'please_enter_valid_captcha', 'Please enter valid captcha.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('337', 'category_not_selected', 'Category not selected.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('338', 'supplier_not_selected', 'Supplier not selected.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('339', 'please_select_product', 'Please select product.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('340', 'product_model_already_exist', 'Product model already exist !');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('341', 'invoice_logo', 'Invoice Logo');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('342', 'available_qnty', 'Av. Qnty.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('343', 'you_can_not_buy_greater_than_available_cartoon', 'You can not select grater than available cartoon !');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('344', 'customer_details', 'Customer details');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('345', 'manage_customer_details', 'Manage customer details.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('346', 'site_key', 'Captcha Site Key');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('347', 'secret_key', 'Captcha Secret Key');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('348', 'captcha', 'Captcha');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('349', 'cartoon_quantity', 'Cartoon Quantity');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('350', 'total_cartoon', 'Total Cartoon');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('351', 'cartoon', 'Cartoon');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('352', 'item_cartoon', 'Item/Cartoon');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('353', 'product_and_supplier_did_not_match', 'Product and supplier did not match !');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('354', 'if_you_update_purchase_first_select_supplier_then_product_and_then_quantity', 'If you update purchase,first select supplier then product and then update qnty.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('355', 'item', 'Item');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('356', 'manage_your_credit_customer', 'Manage your credit customer');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('357', 'total_quantity', 'Total Quantity');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('358', 'quantity_per_cartoon', 'Quantity per cartoon');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('359', 'barcode_qrcode_scan_here', 'Barcode or QR-code scan here');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('360', 'synchronizer_setting', 'Synchronizer Setting');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('361', 'data_synchronizer', 'Data Synchronizer');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('362', 'hostname', 'Host name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('363', 'username', 'User Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('364', 'ftp_port', 'FTP Port');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('365', 'ftp_debug', 'FTP Debug');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('366', 'project_root', 'Project Root');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('367', 'please_try_again', 'Please try again');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('368', 'save_successfully', 'Save successfully');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('369', 'synchronize', 'Synchronize');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('370', 'internet_connection', 'Internet Connection');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('371', 'outgoing_file', 'Outgoing File');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('372', 'incoming_file', 'Incoming File');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('373', 'ok', 'Ok');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('374', 'not_available', 'Not Available');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('375', 'available', 'Available');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('376', 'download_data_from_server', 'Download data from server');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('377', 'data_import_to_database', 'Data import to database');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('378', 'data_upload_to_server', 'Data uplod to server');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('379', 'please_wait', 'Please Wait');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('380', 'ooops_something_went_wrong', 'Oooops Something went wrong !');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('381', 'upload_successfully', 'Upload successfully');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('382', 'unable_to_upload_file_please_check_configuration', 'Unable to upload file please check configuration');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('383', 'please_configure_synchronizer_settings', 'Please configure synchronizer settings');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('384', 'download_successfully', 'Download successfully');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('385', 'unable_to_download_file_please_check_configuration', 'Unable to download file please check configuration');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('386', 'data_import_first', 'Data import past');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('387', 'data_import_successfully', 'Data import successfully');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('388', 'unable_to_import_data_please_check_config_or_sql_file', 'Unable to import data please check config or sql file');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('389', 'total_sale_ctn', 'Total Sale Ctn');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('390', 'in_qnty', 'In Qnty.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('391', 'out_qnty', 'Out Qnty.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('392', 'stock_report_supplier_wise', 'Stock Report (Supplier Wise)');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('393', 'all_stock_report_supplier_wise', 'Stock Report (Suppler Wise)');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('394', 'select_supplier', 'Select Supplier');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('395', 'stock_report_product_wise', 'Stock Report (Product Wise)');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('396', 'phone', 'Phone');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('397', 'select_product', 'Select Product');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('398', 'in_quantity', 'In Qnty.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('399', 'out_quantity', 'Out Qnty.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('400', 'in_taka', 'In TK.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('401', 'out_taka', 'Out TK.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('402', 'commission', 'Commission');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('403', 'generate_commission', 'Generate Commssion');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('404', 'commission_rate', 'Commission Rate');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('405', 'total_ctn', 'Total Ctn.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('406', 'per_pcs_commission', 'Per PCS Commission');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('407', 'total_commission', 'Total Commission');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('408', 'enter', 'Enter');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('409', 'please_add_walking_customer_for_default_customer', 'Please add \'Walking Customer\' for default customer.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('410', 'supplier_ammount', 'Supplier Amount');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('411', 'my_sale_ammount', 'My Sale Amount');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('412', 'signature_pic', 'Signature Picture');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('413', 'branch', 'Branch');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('414', 'ac_no', 'A/C Number');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('415', 'ac_name', 'A/C Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('416', 'bank_transaction', 'Bank Transaction');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('417', 'bank', 'Bank');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('418', 'withdraw_deposite_id', 'Withdraw / Deposite ID');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('419', 'bank_ledger', 'Bank Ledger');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('420', 'note_name', 'Note Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('421', 'pcs', 'Pcs.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('422', '1', '1');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('423', '2', '2');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('424', '5', '5');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('425', '10', '10');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('426', '20', '20');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('427', '50', '50');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('428', '100', '100');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('429', '500', '500');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('430', '1000', '1000');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('431', 'total_discount', 'Total Discount');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('432', 'product_not_found', 'Product not found !');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('433', 'this_is_not_credit_customer', 'This is not credit customer !');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('434', 'personal_loan', 'Office Loan');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('435', 'add_person', 'Add Person');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('436', 'add_loan', 'Add Loan');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('437', 'add_payment', 'Add Payment');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('438', 'manage_person', 'Manage Person');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('439', 'personal_edit', 'Person Edit');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('440', 'person_ledger', 'Person Ledger');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('441', 'backup_restore', 'Backup ');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('442', 'database_backup', 'Database backup');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('443', 'file_information', 'File information');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('444', 'filename', 'Filename');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('445', 'size', 'Size');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('446', 'backup_date', 'Backup date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('447', 'backup_now', 'Backup now');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('448', 'restore_now', 'Restore now');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('449', 'are_you_sure', 'Are you sure ?');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('450', 'download', 'Download');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('451', 'backup_and_restore', 'Backup');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('452', 'backup_successfully', 'Backup successfully');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('453', 'delete_successfully', 'Delete successfully');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('454', 'stock_ctn', 'Stock/Qnt');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('455', 'unit', 'Unit');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('456', 'meter_m', 'Meter (M)');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('457', 'piece_pc', 'Piece (Pc)');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('458', 'kilogram_kg', 'Kilogram (Kg)');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('459', 'stock_cartoon', 'Stock Cartoon');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('460', 'add_product_csv', 'Add Product (CSV)');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('461', 'import_product_csv', 'Import product (CSV)');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('462', 'close', 'Close');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('463', 'download_example_file', 'Download example file.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('464', 'upload_csv_file', 'Upload CSV File');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('465', 'csv_file_informaion', 'CSV File Information');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('466', 'out_of_stock', 'Out Of Stock');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('467', 'others', 'Others');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('468', 'full_paid', 'Full Paid');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('469', 'successfully_saved', 'Your Data Successfully Saved');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('470', 'manage_loan', 'Manage Loan');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('471', 'receipt', 'Receipt');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('472', 'payment', 'Payment');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('473', 'cashflow', 'Daily Cash Flow');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('474', 'signature', 'Signature');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('475', 'supplier_reports', 'Supplier Reports');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('476', 'generate', 'Generate');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('477', 'todays_overview', 'Todays Overview');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('478', 'last_sales', 'Last Sales');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('479', 'manage_transaction', 'Manage Transaction');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('481', 'daily_summary', 'Daily Summary');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('482', 'daily_cash_flow', 'Daily Cash Flow');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('483', 'custom_report', 'Custom Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('484', 'transaction', 'Transaction');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('485', 'receipt_amount', 'Receipt Amount');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('486', 'transaction_details_datewise', 'Transaction Details Datewise');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('487', 'cash_closing', 'Cash Closing');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('488', 'you_can_not_buy_greater_than_available_qnty', 'You can not buy greater than available qnty.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('489', 'supplier_id', 'Supplier ID');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('490', 'category_id', 'Category ID');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('491', 'select_report', 'Select Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('492', 'supplier_summary', 'Supplier summary');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('493', 'sales_payment_actual', 'Sales payment actual');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('494', 'today_already_closed', 'Today already closed.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('495', 'root_account', 'Root Account');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('496', 'office', 'Office');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('497', 'loan', 'Loan');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('498', 'transaction_mood', 'Transaction Mood');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('499', 'select_account', 'Select Account');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('500', 'add_receipt', 'Add Receipt');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('501', 'update_transaction', 'Update Transaction');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('502', 'no_stock_found', 'No Stock Found !');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('503', 'admin_login_area', 'Admin Login Area');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('505', 'print_qr_code', 'Print QR Code');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('506', 'discount_type', 'Discount Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('507', 'discount_percentage', 'Discount');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('508', 'fixed_dis', 'Fixed Dis.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('509', 'return', 'Return');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('510', 'stock_return_list', 'Stock Return List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('511', 'wastage_return_list', 'Wastage Return List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('512', 'return_invoice', 'Invoice Return');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('513', 'sold_qty', 'Sold Qty');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('514', 'ret_quantity', 'Return Qty');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('515', 'deduction', 'Deduction');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('516', 'check_return', 'Check Return');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('517', 'reason', 'Reason');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('518', 'usablilties', 'Usability');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('519', 'adjs_with_stck', 'Adjust With Stock');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('520', 'return_to_supplier', 'Return To Supplier');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('521', 'wastage', 'Wastage');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('522', 'to_deduction', 'Total Deduction ');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('523', 'nt_return', 'Net Return Amount');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('524', 'return_list', 'Return List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('525', 'add_return', 'Add Return');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('526', 'per_qty', 'Purchase Qty');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('527', 'return_supplier', 'Supplier Return');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('528', 'stock_purchase', 'Stock Purchase Price');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('529', 'stock_sale', 'Stock Sale Price');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('530', 'supplier_return', 'Supplier Return');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('531', 'purchase_id', 'Purchase ID');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('532', 'return_id', 'Return ID');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('533', 'supplier_return_list', 'Supplier Return List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('534', 'c_r_slist', 'Stock Return Stock');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('535', 'wastage_list', 'Wastage List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('536', 'please_input_correct_invoice_id', 'Please Input a Correct Invoice ID');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('537', 'please_input_correct_purchase_id', 'Please Input Your Correct  Purchase ID');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('538', 'add_more', 'Add More');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('539', 'prouct_details', 'Product Details');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('540', 'prouct_detail', 'Product Details');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('541', 'stock_return', 'Stock Return');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('542', 'choose_transaction', 'Select Transaction');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('543', 'transection_category', 'Select  Category');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('544', 'transaction_categry', 'Select Category');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('545', 'search_supplier', 'Search Supplier');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('546', 'customer_id', 'Customer ID');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('547', 'search_customer', 'Search Customer Invoice');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('548', 'serial_no', 'Serial Number');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('549', 'item_discount', 'Item Discount');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('550', 'invoice_discount', 'Invoice Discount');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('551', 'add_unit', 'Add Unit');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('552', 'manage_unit', 'Manage Unit');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('553', 'add_new_unit', 'Add New Unit');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('554', 'unit_name', 'Unit Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('555', 'payment_amount', 'Payment Amount');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('556', 'manage_your_unit', 'Manage Your Unit');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('557', 'unit_id', 'Unit ID');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('558', 'unit_edit', 'Unit Edit');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('0', 'vat', 'Vat');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('0', 'sales_report_category_wise', 'Sales Report (Category wise)');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('0', 'purchase_report_category_wise', 'Purchase Report (Category wise)');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('0', 'category_wise_purchase_report', 'Category wise purchase report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('0', 'category_wise_sales_report', 'Category wise sales report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('0', 'best_sale_product', 'Best Sale Product');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('0', 'all_best_sales_product', 'All Best Sales Products');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('0', 'todays_customer_receipt', 'Todays Customer Receipt');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('0', 'not_found', 'Record not found');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('0', 'collection', 'Collection');


#
# TABLE STRUCTURE FOR: notes
#

DROP TABLE IF EXISTS `notes`;

CREATE TABLE `notes` (
  `note_id` int(11) NOT NULL AUTO_INCREMENT,
  `cash_date` varchar(20) NOT NULL,
  `1000n` varchar(11) NOT NULL,
  `500n` varchar(11) NOT NULL,
  `100n` varchar(11) NOT NULL,
  `50n` varchar(11) NOT NULL,
  `20n` varchar(11) NOT NULL,
  `10n` varchar(11) NOT NULL,
  `5n` varchar(11) NOT NULL,
  `2n` varchar(11) NOT NULL,
  `1n` varchar(30) NOT NULL,
  `grandtotal` varchar(30) NOT NULL,
  PRIMARY KEY (`note_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: payment_trans
#

DROP TABLE IF EXISTS `payment_trans`;

CREATE TABLE `payment_trans` (
  `transection_id` varchar(200) NOT NULL,
  `tracing_id` varchar(200) NOT NULL,
  `payment_type` varchar(10) NOT NULL,
  `date` varchar(50) DEFAULT NULL,
  `amount` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: person_information
#

DROP TABLE IF EXISTS `person_information`;

CREATE TABLE `person_information` (
  `person_id` varchar(50) NOT NULL,
  `person_name` varchar(50) NOT NULL,
  `person_phone` varchar(50) NOT NULL,
  `person_address` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `person_information` (`person_id`, `person_name`, `person_phone`, `person_address`, `status`) VALUES ('14XLWWDVDX', 'Office person one', '155231', 'Dhaka', '1');


#
# TABLE STRUCTURE FOR: person_ledger
#

DROP TABLE IF EXISTS `person_ledger`;

CREATE TABLE `person_ledger` (
  `transaction_id` varchar(50) NOT NULL,
  `person_id` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `debit` float NOT NULL,
  `credit` float NOT NULL,
  `details` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=no paid,2=paid',
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `person_ledger` (`transaction_id`, `person_id`, `date`, `debit`, `credit`, `details`, `status`, `id`) VALUES ('', '14XLWWDVDX', '2018-10-28', '0', '500', '500 tk disi office person one k', '2', '0');
INSERT INTO `person_ledger` (`transaction_id`, `person_id`, `date`, `debit`, `credit`, `details`, `status`, `id`) VALUES ('', '14XLWWDVDX', '2018-10-28', '150', '0', '150 tk receipt korsi', '1', '0');


#
# TABLE STRUCTURE FOR: personal_loan
#

DROP TABLE IF EXISTS `personal_loan`;

CREATE TABLE `personal_loan` (
  `per_loan_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(30) NOT NULL,
  `person_id` varchar(30) NOT NULL,
  `debit` float DEFAULT NULL,
  `credit` float NOT NULL,
  `date` varchar(30) NOT NULL,
  `details` varchar(100) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=no paid,2=paid',
  PRIMARY KEY (`per_loan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `personal_loan` (`per_loan_id`, `transaction_id`, `person_id`, `debit`, `credit`, `date`, `details`, `status`) VALUES ('1', '4EQBGP6D4R', '9TH2W77XL8', NULL, '1500', '2018-10-28', '1500 tk disi karim k', '1');
INSERT INTO `personal_loan` (`per_loan_id`, `transaction_id`, `person_id`, `debit`, `credit`, `date`, `details`, `status`) VALUES ('2', 'LEWFSWVLWI', '9TH2W77XL8', '500', '0', '2018-10-28', '500 paid kore dise karim a ', '2');


#
# TABLE STRUCTURE FOR: pesonal_loan_information
#

DROP TABLE IF EXISTS `pesonal_loan_information`;

CREATE TABLE `pesonal_loan_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` varchar(50) NOT NULL,
  `person_name` varchar(50) NOT NULL,
  `person_phone` varchar(30) NOT NULL,
  `person_address` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `pesonal_loan_information` (`id`, `person_id`, `person_name`, `person_phone`, `person_address`, `status`) VALUES ('1', '9TH2W77XL8', 'karim', '445', 'noakhali', '1');


#
# TABLE STRUCTURE FOR: product_category
#

DROP TABLE IF EXISTS `product_category`;

CREATE TABLE `product_category` (
  `category_id` varchar(255) DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `product_category` (`category_id`, `category_name`, `status`) VALUES ('HZ4QHLXNWJ2H171', 'Mobile', '1');
INSERT INTO `product_category` (`category_id`, `category_name`, `status`) VALUES ('FTE152GQL8WFW15', 'Category one', '1');
INSERT INTO `product_category` (`category_id`, `category_name`, `status`) VALUES ('14X6WLT7SSC76SU', 'category two', '1');


#
# TABLE STRUCTURE FOR: product_information
#

DROP TABLE IF EXISTS `product_information`;

CREATE TABLE `product_information` (
  `product_id` varchar(100) NOT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `tax` float DEFAULT NULL COMMENT 'Tax in %',
  `serial_no` varchar(50) DEFAULT NULL,
  `product_model` varchar(100) NOT NULL,
  `product_details` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `product_information` (`product_id`, `category_id`, `product_name`, `price`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES ('18384353', '14X6WLT7SSC76SU', 'Product Two', '1400', 'Piece', '0', 'INV-102', 'INV-102', 'product two details', 'http://localhost/bdtask/SalesERP_v8.2/my-assets/image/product.png', '1');
INSERT INTO `product_information` (`product_id`, `category_id`, `product_name`, `price`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES ('66491363', 'HZ4QHLXNWJ2H171', 'Product One', '1200', 'Piece', '0', 'P-101', 'P-101', 'product one details', 'http://localhost/bdtask/SalesERP_v8.2/my-assets/image/product.png', '1');
INSERT INTO `product_information` (`product_id`, `category_id`, `product_name`, `price`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES ('41631766', '14X6WLT7SSC76SU', 'Product Three', '1800', 'Piece', '0', 'P-103', 'P-103', '', 'http://localhost/bdtask/SalesERP_v8.2/my-assets/image/product.png', '1');


#
# TABLE STRUCTURE FOR: product_price_history
#

DROP TABLE IF EXISTS `product_price_history`;

CREATE TABLE `product_price_history` (
  `product_pr_his_id` int(11) NOT NULL,
  `product_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `supplier_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `supplier_price` double NOT NULL,
  `date_of_price_buy` varchar(30) CHARACTER SET latin1 NOT NULL,
  `affect_time_pc` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: product_purchase
#

DROP TABLE IF EXISTS `product_purchase`;

CREATE TABLE `product_purchase` (
  `purchase_id` varchar(100) NOT NULL,
  `chalan_no` varchar(100) NOT NULL,
  `supplier_id` varchar(100) NOT NULL,
  `grand_total_amount` float NOT NULL,
  `total_discount` float DEFAULT NULL,
  `purchase_date` varchar(50) NOT NULL,
  `purchase_details` text NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `product_purchase` (`purchase_id`, `chalan_no`, `supplier_id`, `grand_total_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`) VALUES ('20181027112101', 'INV-1001', '6H9TPP7XOHGXTC234G54', '25000', NULL, '2018-10-27', 'INV-1001 ', '1');
INSERT INTO `product_purchase` (`purchase_id`, `chalan_no`, `supplier_id`, `grand_total_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`) VALUES ('20181027112148', 'INV-1002', '6H9TPP7XOHGXTC234G54', '37200', NULL, '2018-10-27', 'INV-1001', '1');
INSERT INTO `product_purchase` (`purchase_id`, `chalan_no`, `supplier_id`, `grand_total_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`) VALUES ('20181027112537', 'INV-1003', 'VZSPH5ER3QOGT6S3VTTX', '45000', NULL, '2018-10-27', 'INV-1001', '1');


#
# TABLE STRUCTURE FOR: product_purchase_details
#

DROP TABLE IF EXISTS `product_purchase_details`;

CREATE TABLE `product_purchase_details` (
  `purchase_detail_id` varchar(100) NOT NULL,
  `purchase_id` varchar(100) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `quantity` float NOT NULL,
  `rate` float NOT NULL,
  `total_amount` float NOT NULL,
  `discount` float DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `product_purchase_details` (`purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `discount`, `status`) VALUES ('KEw6klWMiBJorl0', '20181027112101', '66491363', '25', '1000', '25000', NULL, '1');
INSERT INTO `product_purchase_details` (`purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `discount`, `status`) VALUES ('QVrbjFZybQslXg8', '20181027112148', '18384353', '31', '1200', '37200', NULL, '0');
INSERT INTO `product_purchase_details` (`purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `discount`, `status`) VALUES ('V9mdjpc2w5UjbIv', '20181027112537', '41631766', '30', '1500', '45000', NULL, '1');


#
# TABLE STRUCTURE FOR: product_report
#

DROP TABLE IF EXISTS `product_report`;

CREATE   VIEW `product_report` AS select `purchase_report`.`purchase_date` AS `date`,`purchase_report`.`product_id` AS `product_id`,`purchase_report`.`quantity` AS `quantity`,`purchase_report`.`rate` AS `rate`,`purchase_report`.`total_amount` AS `total_amount`,'a' AS `account` from `purchase_report` union all select `sales_report`.`date` AS `date`,`sales_report`.`product_id` AS `product_id`,-(`sales_report`.`quantity`) AS `-quantity`,`sales_report`.`supplier_rate` AS `rate`,(`sales_report`.`quantity` * `sales_report`.`supplier_rate`) AS `total_amount`,'b' AS `account` from `sales_report`;

utf8mb4_general_ci;

INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('2018-10-27', '66491363', '25', '1000', '25000', 'a');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('2018-10-27', '18384353', '31', '1200', '37200', 'a');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('2018-10-27', '41631766', '30', '1500', '45000', 'a');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('2018-10-27', '66491363', '-2', NULL, NULL, 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('2018-10-29', '18384353', '-2', '1200', '2400', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('2018-10-29', '18384353', '1', NULL, NULL, 'b');


#
# TABLE STRUCTURE FOR: product_return
#

DROP TABLE IF EXISTS `product_return`;

CREATE TABLE `product_return` (
  `return_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `product_id` varchar(20) CHARACTER SET latin1 NOT NULL,
  `invoice_id` varchar(20) CHARACTER SET latin1 NOT NULL,
  `purchase_id` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `date_purchase` varchar(20) CHARACTER SET latin1 NOT NULL,
  `date_return` varchar(30) CHARACTER SET latin1 NOT NULL,
  `byy_qty` float NOT NULL,
  `ret_qty` float NOT NULL,
  `customer_id` varchar(20) CHARACTER SET latin1 NOT NULL,
  `supplier_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `product_rate` float NOT NULL,
  `deduction` float NOT NULL,
  `total_deduct` float NOT NULL,
  `total_tax` float NOT NULL,
  `total_ret_amount` float NOT NULL,
  `net_total_amount` float NOT NULL,
  `reason` text CHARACTER SET latin1 NOT NULL,
  `usablity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `product_return` (`return_id`, `product_id`, `invoice_id`, `purchase_id`, `date_purchase`, `date_return`, `byy_qty`, `ret_qty`, `customer_id`, `supplier_id`, `product_rate`, `deduction`, `total_deduct`, `total_tax`, `total_ret_amount`, `net_total_amount`, `reason`, `usablity`) VALUES ('755372459645626', '18384353', '5717325439', NULL, '2018-10-29', '2018-10-29', '2', '1', '3Y1UA5NAC18IE4P', '', '1400', '0', '0', '0', '1400', '1400', '', '1');


#
# TABLE STRUCTURE FOR: product_supplier
#

DROP TABLE IF EXISTS `product_supplier`;

CREATE   VIEW `product_supplier` AS select `b`.`product_id` AS `product_id`,`c`.`product_name` AS `product_name`,`c`.`product_model` AS `product_model`,`a`.`supplier_id` AS `supplier_id` from ((`product_purchase` `a` join `product_purchase_details` `b`) join `product_information` `c`) where ((`a`.`purchase_id` = `b`.`purchase_id`) and (`c`.`product_id` = `b`.`product_id`)) group by `b`.`product_id`;

utf8mb4_general_ci;

INSERT INTO `product_supplier` (`product_id`, `product_name`, `product_model`, `supplier_id`) VALUES ('18384353', 'Product Two', 'INV-102', '6H9TPP7XOHGXTC234G54');
INSERT INTO `product_supplier` (`product_id`, `product_name`, `product_model`, `supplier_id`) VALUES ('41631766', 'Product Three', 'P-103', 'VZSPH5ER3QOGT6S3VTTX');
INSERT INTO `product_supplier` (`product_id`, `product_name`, `product_model`, `supplier_id`) VALUES ('66491363', 'Product One', 'P-101', '6H9TPP7XOHGXTC234G54');


#
# TABLE STRUCTURE FOR: purchase_report
#

DROP TABLE IF EXISTS `purchase_report`;

CREATE   VIEW `purchase_report` AS select `product_purchase`.`purchase_date` AS `purchase_date`,`product_purchase`.`chalan_no` AS `chalan_no`,`product_purchase`.`supplier_id` AS `supplier_id`,`product_purchase_details`.`purchase_detail_id` AS `purchase_detail_id`,`product_purchase_details`.`purchase_id` AS `purchase_id`,`product_purchase_details`.`product_id` AS `product_id`,`product_purchase_details`.`quantity` AS `quantity`,`product_purchase_details`.`rate` AS `rate`,`product_purchase_details`.`total_amount` AS `total_amount`,`product_purchase_details`.`status` AS `status` from (`product_purchase_details` left join `product_purchase` on((`product_purchase_details`.`purchase_id` = `product_purchase`.`purchase_id`)));

utf8mb4_general_ci;

INSERT INTO `purchase_report` (`purchase_date`, `chalan_no`, `supplier_id`, `purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('2018-10-27', 'INV-1001', '6H9TPP7XOHGXTC234G54', 'KEw6klWMiBJorl0', '20181027112101', '66491363', '25', '1000', '25000', '1');
INSERT INTO `purchase_report` (`purchase_date`, `chalan_no`, `supplier_id`, `purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('2018-10-27', 'INV-1002', '6H9TPP7XOHGXTC234G54', 'QVrbjFZybQslXg8', '20181027112148', '18384353', '31', '1200', '37200', '0');
INSERT INTO `purchase_report` (`purchase_date`, `chalan_no`, `supplier_id`, `purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('2018-10-27', 'INV-1003', 'VZSPH5ER3QOGT6S3VTTX', 'V9mdjpc2w5UjbIv', '20181027112537', '41631766', '30', '1500', '45000', '1');


#
# TABLE STRUCTURE FOR: sales_actual
#

DROP TABLE IF EXISTS `sales_actual`;

CREATE   VIEW `sales_actual` AS select `sales_report`.`date` AS `DATE`,`sales_report`.`supplier_id` AS `supplier_id`,sum((`sales_report`.`quantity` * -(`sales_report`.`supplier_rate`))) AS `sub_total`,sum(`sales_report`.`quantity`) AS `no_transection` from `sales_report` group by `sales_report`.`date`,`sales_report`.`supplier_id` union all select `supplier_ledger`.`date` AS `date`,`supplier_ledger`.`supplier_id` AS `supplier_id`,`supplier_ledger`.`amount` AS `sub_total`,`supplier_ledger`.`description` AS `no_transection` from `supplier_ledger` where isnull(`supplier_ledger`.`chalan_no`) group by `supplier_ledger`.`date`,`supplier_ledger`.`description`,`supplier_ledger`.`supplier_id`;

utf8mb4_general_ci;

INSERT INTO `sales_actual` (`DATE`, `supplier_id`, `sub_total`, `no_transection`) VALUES ('2018-10-27', '6H9TPP7XOHGXTC234G54', NULL, '2');
INSERT INTO `sales_actual` (`DATE`, `supplier_id`, `sub_total`, `no_transection`) VALUES ('2018-10-29', '6H9TPP7XOHGXTC234G54', '-2400', '1');
INSERT INTO `sales_actual` (`DATE`, `supplier_id`, `sub_total`, `no_transection`) VALUES ('2018-10-27', '6H9TPP7XOHGXTC234G54', '3000', 'Update Transection');


#
# TABLE STRUCTURE FOR: sales_report
#

DROP TABLE IF EXISTS `sales_report`;

CREATE   VIEW `sales_report` AS select `b`.`date` AS `date`,`b`.`invoice_id` AS `invoice_id`,`a`.`invoice_details_id` AS `invoice_details_id`,`b`.`customer_id` AS `customer_id`,`c`.`supplier_id` AS `supplier_id`,`a`.`product_id` AS `product_id`,`c`.`product_model` AS `product_model`,`c`.`product_name` AS `product_name`,`a`.`quantity` AS `quantity`,`a`.`rate` AS `sell_rate`,`a`.`supplier_rate` AS `supplier_rate` from ((`invoice_details` `a` join `invoice` `b`) join `product_supplier` `c`) where ((`a`.`invoice_id` = `b`.`invoice_id`) and (`a`.`product_id` = `c`.`product_id`));

utf8mb4_general_ci;

INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('2018-10-27', '6977479388', '629739518423575', 'W8ITBP62KB4G3MR', '6H9TPP7XOHGXTC234G54', '66491363', 'P-101', 'Product One', '2', '1200', NULL);
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('2018-10-29', '5717325439', '738148689532474', '3Y1UA5NAC18IE4P', '6H9TPP7XOHGXTC234G54', '18384353', 'INV-102', 'Product Two', '2', '1400', '1200');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('2018-10-29', '5717325439', '876651164913682', '3Y1UA5NAC18IE4P', '6H9TPP7XOHGXTC234G54', '18384353', 'INV-102', 'Product Two', '-1', '1400', NULL);


#
# TABLE STRUCTURE FOR: stock_history
#

DROP TABLE IF EXISTS `stock_history`;

CREATE   VIEW `stock_history` AS select `invoice`.`date` AS `vdate`,`invoice_details`.`product_id` AS `product_id`,sum(`invoice_details`.`quantity`) AS `sell`,0 AS `Purchase` from (`invoice_details` join `invoice` on((`invoice_details`.`invoice_id` = `invoice`.`invoice_id`))) group by `invoice_details`.`product_id`,`invoice`.`date` union select `product_purchase`.`purchase_date` AS `purchase_date`,`product_purchase_details`.`product_id` AS `product_id`,0 AS `0`,sum(`product_purchase_details`.`quantity`) AS `purchase` from (`product_purchase_details` join `product_purchase` on((`product_purchase_details`.`purchase_id` = `product_purchase`.`purchase_id`))) group by `product_purchase_details`.`product_id`,`product_purchase`.`purchase_date`;

utf8mb4_general_ci;

INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('2018-10-29', '18384353', '1', '0');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('2018-10-27', '66491363', '2', '0');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('2018-10-27', '18384353', '0', '31');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('2018-10-27', '41631766', '0', '30');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('2018-10-27', '66491363', '0', '25');


#
# TABLE STRUCTURE FOR: supplier_information
#

DROP TABLE IF EXISTS `supplier_information`;

CREATE TABLE `supplier_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` varchar(100) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `details` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `supplier_information` (`id`, `supplier_id`, `supplier_name`, `address`, `mobile`, `details`, `status`) VALUES ('1', '6H9TPP7XOHGXTC234G54', 'Supplier One', 'Khulna', '6546546', '', '1');
INSERT INTO `supplier_information` (`id`, `supplier_id`, `supplier_name`, `address`, `mobile`, `details`, `status`) VALUES ('2', 'Y4RIJABLVF4BKP6LFB7G', 'Supplier Two', 'Dhaka', '56465465', '', '1');
INSERT INTO `supplier_information` (`id`, `supplier_id`, `supplier_name`, `address`, `mobile`, `details`, `status`) VALUES ('3', 'VZSPH5ER3QOGT6S3VTTX', 'Supplier Three', 'Pabna', '53135468', '', '1');


#
# TABLE STRUCTURE FOR: supplier_ledger
#

DROP TABLE IF EXISTS `supplier_ledger`;

CREATE TABLE `supplier_ledger` (
  `transaction_id` varchar(100) NOT NULL,
  `supplier_id` varchar(100) NOT NULL,
  `chalan_no` varchar(100) DEFAULT NULL,
  `deposit_no` varchar(50) DEFAULT NULL,
  `amount` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `cheque_no` varchar(255) NOT NULL,
  `date` varchar(50) NOT NULL,
  `status` int(2) NOT NULL,
  `d_c` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `supplier_ledger` (`transaction_id`, `supplier_id`, `chalan_no`, `deposit_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`, `d_c`) VALUES ('L3I9WJY22H', '6H9TPP7XOHGXTC234G54', 'Adjustment ', NULL, '5000', 'Previous adjustment with software', 'NA', 'NA', '2018-10-27', '1', 'c');
INSERT INTO `supplier_ledger` (`transaction_id`, `supplier_id`, `chalan_no`, `deposit_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`, `d_c`) VALUES ('V6NKL4Y4TB', 'Y4RIJABLVF4BKP6LFB7G', 'Adjustment ', NULL, '0', 'Previous adjustment with software', 'NA', 'NA', '2018-10-27', '1', 'c');
INSERT INTO `supplier_ledger` (`transaction_id`, `supplier_id`, `chalan_no`, `deposit_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`, `d_c`) VALUES ('20181027112101', '6H9TPP7XOHGXTC234G54', 'INV-1001', NULL, '25000', 'INV-1001 ', '', '', '2018-10-27', '1', 'c');
INSERT INTO `supplier_ledger` (`transaction_id`, `supplier_id`, `chalan_no`, `deposit_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`, `d_c`) VALUES ('20181027112148', '6H9TPP7XOHGXTC234G54', 'INV-1002', NULL, '37200', 'INV-1001', '', '', '2018-10-27', '1', 'c');
INSERT INTO `supplier_ledger` (`transaction_id`, `supplier_id`, `chalan_no`, `deposit_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`, `d_c`) VALUES ('VJZLH84FAJ', 'VZSPH5ER3QOGT6S3VTTX', 'Adjustment ', NULL, '0', 'Previous adjustment with software', 'NA', 'NA', '2018-10-27', '1', 'c');
INSERT INTO `supplier_ledger` (`transaction_id`, `supplier_id`, `chalan_no`, `deposit_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`, `d_c`) VALUES ('20181027112537', 'VZSPH5ER3QOGT6S3VTTX', 'INV-1003', NULL, '45000', 'INV-1001', '', '', '2018-10-27', '1', 'c');
INSERT INTO `supplier_ledger` (`transaction_id`, `supplier_id`, `chalan_no`, `deposit_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`, `d_c`) VALUES ('PYWAFUT8ZECZ6IR', '6H9TPP7XOHGXTC234G54', NULL, '1637969282', '3000', 'Update Transection', '1', '', '2018-10-27', '1', 'd');
INSERT INTO `supplier_ledger` (`transaction_id`, `supplier_id`, `chalan_no`, `deposit_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`, `d_c`) VALUES ('L4KIVNZBTSTG6DU', '6H9TPP7XOHGXTC234G54', NULL, '6437949956', '2000', 'Update Transection', '1', '', '2018-10-27', '1', 'c');


#
# TABLE STRUCTURE FOR: supplier_product
#

DROP TABLE IF EXISTS `supplier_product`;

CREATE TABLE `supplier_product` (
  `supplier_pr_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `products_model` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `supplier_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `supplier_price` float NOT NULL,
  PRIMARY KEY (`supplier_pr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `products_model`, `supplier_id`, `supplier_price`) VALUES ('3', '66491363', 'P-101', '6H9TPP7XOHGXTC234G54', '1000');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `products_model`, `supplier_id`, `supplier_price`) VALUES ('4', '18384353', 'INV-102', '6H9TPP7XOHGXTC234G54', '1200');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `products_model`, `supplier_id`, `supplier_price`) VALUES ('5', '41631766', 'P-103', 'VZSPH5ER3QOGT6S3VTTX', '1500');


#
# TABLE STRUCTURE FOR: synchronizer_setting
#

DROP TABLE IF EXISTS `synchronizer_setting`;

CREATE TABLE `synchronizer_setting` (
  `id` int(11) NOT NULL,
  `hostname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `port` varchar(10) NOT NULL,
  `debug` varchar(10) NOT NULL,
  `project_root` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tax_information
#

DROP TABLE IF EXISTS `tax_information`;

CREATE TABLE `tax_information` (
  `tax_id` varchar(15) NOT NULL,
  `tax` float DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: transection
#

DROP TABLE IF EXISTS `transection`;

CREATE TABLE `transection` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(30) NOT NULL,
  `date_of_transection` varchar(30) NOT NULL,
  `transection_type` varchar(30) NOT NULL,
  `transection_category` varchar(30) NOT NULL,
  `transection_mood` varchar(25) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `pay_amount` int(30) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `relation_id` varchar(30) NOT NULL,
  `is_transaction` int(2) NOT NULL COMMENT '0 = invoice and 1 = transaction',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

INSERT INTO `transection` (`id`, `transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`, `is_transaction`) VALUES ('1', 'PYWAFUT8ZECZ6IR', '2018-10-27', '1', '1', '1', '', '3000', '3000 tk paid korlam supplier k', '6H9TPP7XOHGXTC234G54', '1');
INSERT INTO `transection` (`id`, `transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`, `is_transaction`) VALUES ('2', 'L4KIVNZBTSTG6DU', '2018-10-27', '2', '1', '1', '2000', '0', '2000 tk loan nisi supplier one theke', '6H9TPP7XOHGXTC234G54', '1');
INSERT INTO `transection` (`id`, `transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`, `is_transaction`) VALUES ('4', 'X26Y8U4FAFHQWI5', '2018-10-27', '2', '2', '1', '1400', '0', 'Paid by customer', 'W8ITBP62KB4G3MR', '1');
INSERT INTO `transection` (`id`, `transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`, `is_transaction`) VALUES ('5', 'Y694YMNOFZZJO73', '2018-10-27', '2', '2', '1', '200', '0', '200 taka receipt ', 'W8ITBP62KB4G3MR', '1');
INSERT INTO `transection` (`id`, `transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`, `is_transaction`) VALUES ('6', 'X2ZW5T4HKFAGYM6', '2018-10-28', '2', '2', '1', '40', '0', '40 tk receipt korsi customer one theke', 'W8ITBP62KB4G3MR', '1');
INSERT INTO `transection` (`id`, `transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`, `is_transaction`) VALUES ('10', '993BQLZHMEX26IB', '2018-10-28', '1', '4', '1', '', '500', '500 tk disi office person one k', '14XLWWDVDX', '1');
INSERT INTO `transection` (`id`, `transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`, `is_transaction`) VALUES ('11', 'PO5ZZP8OU8CKEO8', '2018-10-28', '2', '4', '1', '150', '0', '150 tk receipt korsi', '14XLWWDVDX', '1');
INSERT INTO `transection` (`id`, `transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`, `is_transaction`) VALUES ('12', 'LNMHHJUHMWRJHJ7', '2018-10-29', '1', '3', '1', '', '110', '110 tk disi office account 1 k', '1', '1');
INSERT INTO `transection` (`id`, `transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`, `is_transaction`) VALUES ('13', 'N6AXQDX5N9S1QPC', '2018-10-27', '2', '2', '1', '1400', NULL, 'Paid by customer', 'W8ITBP62KB4G3MR', '0');
INSERT INTO `transection` (`id`, `transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`, `is_transaction`) VALUES ('14', 'JE5B8D3KLNFMOYT', '2018-10-29', '2', '2', '1', '2000', NULL, 'Paid by customer', '3Y1UA5NAC18IE4P', '0');
INSERT INTO `transection` (`id`, `transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`, `is_transaction`) VALUES ('15', 'MZT9TC261CJ4V3E', '2018-10-29', '1', '2', '1', '', '300', '300 tk paid korsi return babod', '3Y1UA5NAC18IE4P', '1');
INSERT INTO `transection` (`id`, `transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`, `is_transaction`) VALUES ('16', 'HHM3CKF9MVWPWHC', '2018-10-29', '2', '2', '1', '200', '0', '200 tk nilam', 'W8ITBP62KB4G3MR', '1');


#
# TABLE STRUCTURE FOR: units
#

DROP TABLE IF EXISTS `units`;

CREATE TABLE `units` (
  `unit_id` varchar(255) CHARACTER SET latin1 NOT NULL,
  `unit_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `units` (`unit_id`, `unit_name`, `status`) VALUES ('I3QT1TR3VJIYAZX', 'Piece', '1');
INSERT INTO `units` (`unit_id`, `unit_name`, `status`) VALUES ('W9YUY1HJQM9IEFT', 'KG', '1');
INSERT INTO `units` (`unit_id`, `unit_name`, `status`) VALUES ('XM4H48345SO6M94', 'test', '1');


#
# TABLE STRUCTURE FOR: user_login
#

DROP TABLE IF EXISTS `user_login`;

CREATE TABLE `user_login` (
  `user_id` varchar(15) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(2) NOT NULL,
  `security_code` varchar(255) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `user_login` (`user_id`, `username`, `password`, `user_type`, `security_code`, `status`) VALUES ('1', 'test@test.com', '41d99b369894eb1ec3f461135132d8bb', '1', '', '1');
INSERT INTO `user_login` (`user_id`, `username`, `password`, `user_type`, `security_code`, `status`) VALUES ('oZTpXAmq4itvJmY', 's@demo.com', '41d99b369894eb1ec3f461135132d8bb', '2', '', '1');


#
# TABLE STRUCTURE FOR: users
#

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` varchar(15) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `gender` int(2) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `logo` varchar(250) DEFAULT NULL,
  `status` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `users` (`user_id`, `last_name`, `first_name`, `gender`, `date_of_birth`, `logo`, `status`) VALUES ('1', 'Doye', 'John', '1', '', 'http://softest3.bdtask.com/wholesale-v3/assets/dist/img/profile_picture/20d549f44403f065ff12b35a1f09817f.jpg', '1');
INSERT INTO `users` (`user_id`, `last_name`, `first_name`, `gender`, `date_of_birth`, `logo`, `status`) VALUES ('oZTpXAmq4itvJmY', 'khan', 'Sourav', '0', '', NULL, '1');


#
# TABLE STRUCTURE FOR: view_customer_transection
#

DROP TABLE IF EXISTS `view_customer_transection`;

CREATE   VIEW `view_customer_transection` AS (select `i`.`transaction_id` AS `transaction_id`,`j`.`customer_name` AS `customer_name`,`q`.`invoice_no` AS `invoice_no` from ((`transection` `i` left join `customer_information` `j` on((convert(`i`.`relation_id` using utf8) = `j`.`customer_id`))) left join `customer_ledger` `q` on((convert(`i`.`transaction_id` using utf8) = `q`.`transaction_id`))));

utf8mb4_general_ci;

INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`) VALUES ('X26Y8U4FAFHQWI5', 'Customer One', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`) VALUES ('X26Y8U4FAFHQWI5', 'Customer One', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`) VALUES ('Y694YMNOFZZJO73', 'Customer One', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`) VALUES ('X2ZW5T4HKFAGYM6', 'Customer One', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`) VALUES ('N6AXQDX5N9S1QPC', 'Customer One', '6977479388');
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`) VALUES ('N6AXQDX5N9S1QPC', 'Customer One', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`) VALUES ('JE5B8D3KLNFMOYT', 'Customer Two', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`) VALUES ('JE5B8D3KLNFMOYT', 'Customer Two', '5717325439');
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`) VALUES ('JE5B8D3KLNFMOYT', 'Customer Two', '5717325439');
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`) VALUES ('MZT9TC261CJ4V3E', 'Customer Two', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`) VALUES ('HHM3CKF9MVWPWHC', 'Customer One', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`) VALUES ('PYWAFUT8ZECZ6IR', NULL, NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`) VALUES ('L4KIVNZBTSTG6DU', NULL, NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`) VALUES ('993BQLZHMEX26IB', NULL, NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`) VALUES ('PO5ZZP8OU8CKEO8', NULL, NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`) VALUES ('LNMHHJUHMWRJHJ7', NULL, NULL);


#
# TABLE STRUCTURE FOR: view_person_transection
#

DROP TABLE IF EXISTS `view_person_transection`;

CREATE   VIEW `view_person_transection` AS (select `i`.`transaction_id` AS `transaction_id`,`j`.`person_name` AS `person_name` from (`transection` `i` left join `person_information` `j` on((convert(`i`.`relation_id` using utf8) = `j`.`person_id`))));

utf8mb4_general_ci;

INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('993BQLZHMEX26IB', 'Office person one');
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('PO5ZZP8OU8CKEO8', 'Office person one');
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('PYWAFUT8ZECZ6IR', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('L4KIVNZBTSTG6DU', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('X26Y8U4FAFHQWI5', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('Y694YMNOFZZJO73', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('X2ZW5T4HKFAGYM6', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('LNMHHJUHMWRJHJ7', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('N6AXQDX5N9S1QPC', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('JE5B8D3KLNFMOYT', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('MZT9TC261CJ4V3E', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('HHM3CKF9MVWPWHC', NULL);


#
# TABLE STRUCTURE FOR: view_supplier_transection
#

DROP TABLE IF EXISTS `view_supplier_transection`;

CREATE   VIEW `view_supplier_transection` AS (select `i`.`transaction_id` AS `transaction_id`,`j`.`supplier_name` AS `supplier_name` from (`transection` `i` left join `supplier_information` `j` on((convert(`i`.`relation_id` using utf8) = `j`.`supplier_id`))));

utf8mb4_general_ci;

INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('PYWAFUT8ZECZ6IR', 'Supplier One');
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('L4KIVNZBTSTG6DU', 'Supplier One');
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('X26Y8U4FAFHQWI5', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('Y694YMNOFZZJO73', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('X2ZW5T4HKFAGYM6', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('993BQLZHMEX26IB', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('PO5ZZP8OU8CKEO8', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('LNMHHJUHMWRJHJ7', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('N6AXQDX5N9S1QPC', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('JE5B8D3KLNFMOYT', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('MZT9TC261CJ4V3E', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('HHM3CKF9MVWPWHC', NULL);


#
# TABLE STRUCTURE FOR: view_transection
#

DROP TABLE IF EXISTS `view_transection`;

CREATE   VIEW `view_transection` AS (select `i`.`transaction_id` AS `transaction_id`,`i`.`date_of_transection` AS `date_of_transection`,`i`.`amount` AS `amount`,`i`.`pay_amount` AS `pay_amount`,`f`.`invoice_no` AS `invoice_no`,`g`.`customer_name` AS `customer_name`,`h`.`supplier_name` AS `supplier_name`,`j`.`person_name` AS `person_name`,`i`.`transection_category` AS `transection_category`,`i`.`transection_type` AS `transection_type`,`i`.`transection_mood` AS `transection_mood`,`i`.`description` AS `description`,`i`.`relation_id` AS `relation_id` from ((((`transection` `i` left join `customer_ledger` `f` on((convert(`i`.`transaction_id` using utf8) = `f`.`transaction_id`))) left join `customer_information` `g` on((convert(`i`.`relation_id` using utf8) = `f`.`customer_id`))) left join `supplier_information` `h` on((convert(`i`.`relation_id` using utf8) = `h`.`supplier_id`))) left join `person_information` `j` on((convert(`i`.`relation_id` using utf8) = `j`.`person_id`))));

utf8mb4_general_ci;

INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('993BQLZHMEX26IB', '2018-10-28', '', '500', NULL, NULL, NULL, 'Office person one', '4', '1', '1', '500 tk disi office person one k', '14XLWWDVDX');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('PO5ZZP8OU8CKEO8', '2018-10-28', '150', '0', NULL, NULL, NULL, 'Office person one', '4', '2', '1', '150 tk receipt korsi', '14XLWWDVDX');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('PYWAFUT8ZECZ6IR', '2018-10-27', '', '3000', NULL, NULL, 'Supplier One', NULL, '1', '1', '1', '3000 tk paid korlam supplier k', '6H9TPP7XOHGXTC234G54');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('L4KIVNZBTSTG6DU', '2018-10-27', '2000', '0', NULL, NULL, 'Supplier One', NULL, '1', '2', '1', '2000 tk loan nisi supplier one theke', '6H9TPP7XOHGXTC234G54');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('X26Y8U4FAFHQWI5', '2018-10-27', '1400', '0', NULL, 'Customer One', NULL, NULL, '2', '2', '1', 'Paid by customer', 'W8ITBP62KB4G3MR');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('X26Y8U4FAFHQWI5', '2018-10-27', '1400', '0', NULL, 'Customer One', NULL, NULL, '2', '2', '1', 'Paid by customer', 'W8ITBP62KB4G3MR');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('Y694YMNOFZZJO73', '2018-10-27', '200', '0', NULL, 'Customer One', NULL, NULL, '2', '2', '1', '200 taka receipt ', 'W8ITBP62KB4G3MR');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('X2ZW5T4HKFAGYM6', '2018-10-28', '40', '0', NULL, 'Customer One', NULL, NULL, '2', '2', '1', '40 tk receipt korsi customer one theke', 'W8ITBP62KB4G3MR');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('N6AXQDX5N9S1QPC', '2018-10-27', '1400', NULL, '6977479388', 'Customer One', NULL, NULL, '2', '2', '1', 'Paid by customer', 'W8ITBP62KB4G3MR');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('N6AXQDX5N9S1QPC', '2018-10-27', '1400', NULL, NULL, 'Customer One', NULL, NULL, '2', '2', '1', 'Paid by customer', 'W8ITBP62KB4G3MR');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('JE5B8D3KLNFMOYT', '2018-10-29', '2000', NULL, NULL, 'Customer One', NULL, NULL, '2', '2', '1', 'Paid by customer', '3Y1UA5NAC18IE4P');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('JE5B8D3KLNFMOYT', '2018-10-29', '2000', NULL, '5717325439', 'Customer One', NULL, NULL, '2', '2', '1', 'Paid by customer', '3Y1UA5NAC18IE4P');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('JE5B8D3KLNFMOYT', '2018-10-29', '2000', NULL, '5717325439', 'Customer One', NULL, NULL, '2', '2', '1', 'Paid by customer', '3Y1UA5NAC18IE4P');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('MZT9TC261CJ4V3E', '2018-10-29', '', '300', NULL, 'Customer One', NULL, NULL, '2', '1', '1', '300 tk paid korsi return babod', '3Y1UA5NAC18IE4P');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('HHM3CKF9MVWPWHC', '2018-10-29', '200', '0', NULL, 'Customer One', NULL, NULL, '2', '2', '1', '200 tk nilam', 'W8ITBP62KB4G3MR');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('X26Y8U4FAFHQWI5', '2018-10-27', '1400', '0', NULL, 'Customer Two', NULL, NULL, '2', '2', '1', 'Paid by customer', 'W8ITBP62KB4G3MR');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('X26Y8U4FAFHQWI5', '2018-10-27', '1400', '0', NULL, 'Customer Two', NULL, NULL, '2', '2', '1', 'Paid by customer', 'W8ITBP62KB4G3MR');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('Y694YMNOFZZJO73', '2018-10-27', '200', '0', NULL, 'Customer Two', NULL, NULL, '2', '2', '1', '200 taka receipt ', 'W8ITBP62KB4G3MR');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('X2ZW5T4HKFAGYM6', '2018-10-28', '40', '0', NULL, 'Customer Two', NULL, NULL, '2', '2', '1', '40 tk receipt korsi customer one theke', 'W8ITBP62KB4G3MR');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('N6AXQDX5N9S1QPC', '2018-10-27', '1400', NULL, '6977479388', 'Customer Two', NULL, NULL, '2', '2', '1', 'Paid by customer', 'W8ITBP62KB4G3MR');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('N6AXQDX5N9S1QPC', '2018-10-27', '1400', NULL, NULL, 'Customer Two', NULL, NULL, '2', '2', '1', 'Paid by customer', 'W8ITBP62KB4G3MR');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('JE5B8D3KLNFMOYT', '2018-10-29', '2000', NULL, NULL, 'Customer Two', NULL, NULL, '2', '2', '1', 'Paid by customer', '3Y1UA5NAC18IE4P');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('JE5B8D3KLNFMOYT', '2018-10-29', '2000', NULL, '5717325439', 'Customer Two', NULL, NULL, '2', '2', '1', 'Paid by customer', '3Y1UA5NAC18IE4P');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('JE5B8D3KLNFMOYT', '2018-10-29', '2000', NULL, '5717325439', 'Customer Two', NULL, NULL, '2', '2', '1', 'Paid by customer', '3Y1UA5NAC18IE4P');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('MZT9TC261CJ4V3E', '2018-10-29', '', '300', NULL, 'Customer Two', NULL, NULL, '2', '1', '1', '300 tk paid korsi return babod', '3Y1UA5NAC18IE4P');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('HHM3CKF9MVWPWHC', '2018-10-29', '200', '0', NULL, 'Customer Two', NULL, NULL, '2', '2', '1', '200 tk nilam', 'W8ITBP62KB4G3MR');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('LNMHHJUHMWRJHJ7', '2018-10-29', '', '110', NULL, NULL, NULL, NULL, '3', '1', '1', '110 tk disi office account 1 k', '1');


#
# TABLE STRUCTURE FOR: web_setting
#

DROP TABLE IF EXISTS `web_setting`;

CREATE TABLE `web_setting` (
  `setting_id` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `invoice_logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `currency_position` varchar(10) DEFAULT NULL,
  `footer_text` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `rtr` varchar(255) DEFAULT NULL,
  `captcha` int(11) DEFAULT '1' COMMENT '0=active,1=inactive',
  `site_key` varchar(250) DEFAULT NULL,
  `secret_key` varchar(250) DEFAULT NULL,
  `discount_type` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `web_setting` (`setting_id`, `logo`, `invoice_logo`, `favicon`, `currency`, `currency_position`, `footer_text`, `language`, `rtr`, `captcha`, `site_key`, `secret_key`, `discount_type`) VALUES ('1', 'http://store.bdtask.com/beta/my-assets/image/logo/37e6319ba5b91ed3bbf418f0fcd4e834.png', 'http://store.bdtask.com/beta/my-assets/image/logo/795e09495b11ef567798ab6c055c3476.png', 'http://store.bdtask.com/beta/my-assets/image/logo/55480f15a50555ae4406aecce9bf2342.png', '$', '0', 'Copyright Ãƒâ€šÃ‚Â© 2016-2017 bdtask. All rights reserved.', 'english', '0', '1', '', '', '1');


