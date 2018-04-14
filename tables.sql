
CREATE TABLE `164773_comments` (
  `id` int(11) AUTO_INCREMENT,
  `txt` varchar(100),
  `username` varchar(30),
  `news` int(11),
  `time` timestamp default now(),
  PRIMARY KEY (`id`)
);