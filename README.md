# Extension-Tastyigniter-Login-Facebook-

ALTER TABLE `(your_dbprefix)customers` 
 ADD COLUMN `oauth_provider` enum('','facebook','google','twitter') COLLATE utf8_unicode_ci NOT NULL,
 ADD COLUMN `oauth_uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 ADD COLUMN `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
 ADD COLUMN `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
 ADD COLUMN `picture_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 ADD COLUMN `profile_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 ADD COLUMN `date_modified` datetime NOT NULL,
 ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;