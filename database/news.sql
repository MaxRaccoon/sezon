CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `published_dt` datetime NOT NULL,
  `title` varchar(500) NOT NULL,
  `anons` text NOT NULL,
  `content` text NOT NULL,
  `is_action` tinyint(1) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deleted` (`deleted`),
  ADD KEY `is_action` (`is_action`);

ALTER TABLE `news`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

CREATE TABLE `news_photo` (
  `id` int(10) NOT NULL,
  `news_id` int(10) NOT NULL,
  `photo_link` varchar(500) NOT NULL,
  `photo_thumb_link` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `news_photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news` (`news_id`),
  ADD KEY `updated_at` (`updated_at`),
  ADD KEY `created_at` (`created_at`),
  ADD KEY `deleted` (`deleted`);

ALTER TABLE `news_photo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `program` ADD `is_training` TINYINT(1) NOT NULL DEFAULT '0' AFTER `duration`;