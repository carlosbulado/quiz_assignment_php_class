
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
  `last_name` varchar(255) NOT NULL,
  `gpa` float NOT NULL
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




/*
INSERT INTO `questios` (`id`, `name`, `testId`, `rightAnswer`, `answer_01`, `answer_02`, `answer_03`, `answer_04`) VALUES
(1, `Question`, 3, `2`, `First`, `Second`, `Third!`, `Forth`);


INSERT INTO `tests` (`id`, `name`, `categoryId`) VALUES
(1, `HTML 5.1`, 0),
(2, `CSS 3`, 0),
(3, `Javascript`, 0);


INSERT INTO `user` (`id`, `first_name`, `last_name`, `gpa`) VALUES
(1, `Cool`, `Name`, 3),
(2, `Nice`, `Last`, 2),
(3, `New`, `Student`, 1),
(4, `Last`, `First`, 2.5);
*/