ALTER TABLE eps_layout CHANGE blocks blocks TEXT NOT NULL;
ALTER TABLE `eps_file` ADD `width` smallint unsigned NOT NULL AFTER `size`,
ADD `height` smallint unsigned NOT NULL AFTER `width`;
