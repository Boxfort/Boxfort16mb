CREATE DATABASE boxfort16mb;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(65) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `email_code` varchar(32) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB;

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_description` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB;

CREATE TABLE `topics` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_subject` varchar(255) NOT NULL,
  `topic_date` datetime NOT NULL,
  `topic_cat` int(11) NOT NULL,
  `topic_by` int(11) NOT NULL,
  `topic_body` text NOT NULL,
  PRIMARY KEY (`topic_id`),
  KEY `topic_by` (`topic_by`),
  KEY `topic_cat` (`topic_cat`),
  CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`topic_cat`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`topic_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `replies` (
 `reply_id` int(11) NOT NULL AUTO_INCREMENT,
 `reply_content` text NOT NULL,
 `reply_date` datetime NOT NULL,
 `reply_topic` int(11) NOT NULL,
 `reply_by` int(11) NOT NULL,
 PRIMARY KEY (`reply_id`),
 KEY `reply_topic` (`reply_topic`),
 KEY `reply_by` (`reply_by`),
 CONSTRAINT `replies_ibfk_2` FOREIGN KEY (`reply_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
 CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`reply_topic`) REFERENCES `topics` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;
