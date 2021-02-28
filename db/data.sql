SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `entry_date` datetime NOT NULL,
    `name` varchar(100) NOT NULL,
    `is_active` tinyint(1) NOT NULL,
    `content` text NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO `test` (`id`, `entry_date`, `name`, `is_active`, `content`) VALUES
(1, '2021-02-24 21:43:38', 'Dave', 1, 'lorem ipsum...'),
(2, '2021-02-26 21:43:38', 'John', 1, 'lorem ipsum 2...');
COMMIT;