DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
    `id` int NOT NULL AUTO_INCREMENT,
    `title` varchar(255) NOT NULL,
    `body` text NOT NULL,
    `user_id` int NOT NULL,
    `comments_enabled` int,
    `created` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE (`title`)
);

DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags`(
	`post_id` int NOT NULL,
	`tag` varchar(255),
	`tag_id` varchar(255)
);

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
    `id` int NOT NULL AUTO_INCREMENT,
    `user_id` varchar(255) NOT NULL,
    `post_id` int NOT NULL,
    `body` text NOT NULL,

    PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
    `id` int NOT NULL AUTO_INCREMENT,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,

    PRIMARY KEY (`id`),
    UNIQUE (`email`)
);

DROP TABLE IF EXISTS `backgrounds`;
CREATE TABLE `backgrounds`(
	`id` int NOT NULL AUTO_INCREMENT,
	`path` varchar(255) NOT NULL,

	PRIMARY KEY (`id`),
	UNIQUE (`path`)
)
