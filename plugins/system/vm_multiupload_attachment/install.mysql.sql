DROP TABLE IF EXISTS `#__virtuemart_product_attachments`;

CREATE TABLE IF NOT EXISTS `#__virtuemart_product_attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `virtuemart_product_id` int(11) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `virtuemart_user_id` int(5) DEFAULT NULL,
  `created_on` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
