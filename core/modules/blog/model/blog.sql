CREATE TABLE IF NOT EXISTS `col` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `width` int NOT NULL,
  `label` varchar(200) NOT NULL,
  `placeholder` varchar(200) NOT NULL,
  `suggest` varchar(500) NOT NULL,
  `ref_table_field` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `position` int,
  `is_required` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `tbl_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  foreign key (tbl_id) references tbl(id)
); 

CREATE TABLE IF NOT EXISTS `entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `tbl_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  foreign key (tbl_id) references tbl(id)
); 


CREATE TABLE IF NOT EXISTS `row` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `val` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `col_id` int(11) NOT NULL,
  `entry_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  foreign key (col_id) references col(id),
  foreign key (entry_id) references entry(id)
); 


CREATE TABLE IF NOT EXISTS `sys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


CREATE TABLE IF NOT EXISTS `tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `sys_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sys_id` (`sys_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;


CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

