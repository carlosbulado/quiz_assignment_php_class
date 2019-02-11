
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `questions_done` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `testId` int(11) NOT NULL,
  `answer_01` varchar(2000) NOT NULL,
  `answer_02` varchar(2000) NOT NULL,
  `answer_03` varchar(2000) NOT NULL,
  `answer_04` varchar(2000) NOT NULL,
  `optionSelected` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `questios` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `testId` int(11) NOT NULL,
  `rightAnswer` int(11) NOT NULL,
  `answer_01` varchar(2000) NOT NULL,
  `answer_02` varchar(2000) NOT NULL,
  `answer_03` varchar(2000) NOT NULL,
  `answer_04` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tests` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tests_done` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `testId` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `questions_done`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `questios`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tests_done`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `questions_done`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `questios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tests_done`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tests_done` CHANGE `date` `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE `tests_done` ADD `userId` INT NOT NULL AFTER `categoryId`;

ALTER TABLE `questions_done` ADD `isCorrect` INT NOT NULL AFTER `optionSelected`;

ALTER TABLE `user` ADD `isAdmin` INT NOT NULL AFTER `last_name`, ADD `username` VARCHAR(255) NOT NULL AFTER `isAdmin`, ADD `password` VARCHAR(255) NOT NULL AFTER `username`;

ALTER TABLE `user` ADD UNIQUE( `username`);