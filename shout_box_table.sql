CREATE TABLE `shout_box` (
  `id` tinyint(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_id` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `date` text NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
)