CREATE TABLE `shout_box` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_id` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `date` datetime NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
)