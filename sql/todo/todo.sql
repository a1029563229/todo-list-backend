CREATE TABLE IF NOT EXISTS `todos` (
    `id` int PRIMARY KEY AUTO_INCREMENT,
    `key` varchar(64) NOT NULL DEFAULT '',
    `title` varchar(64) NOT NULL DEFAULT '',
    `is_top` tinyint(1) NOT NULL DEFAULT 0,
    `is_completed` tinyint(1) NOT NULL DEFAULT 0,
    `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
    index `key`(`key`)
) engine=InnoDB;