# Extension-Tastyigniter-Login-Facebook-
# Manual Installation
1)Create a Facebook app in Facebook developers panel and get the App ID and App Secret (https://developers.facebook.com/)
2)Update the database by running this SQL query: 
```SQL
ALTER TABLE `(your_dbprefix)customers` 
 ADD COLUMN `oauth_provider` enum('','facebook','google','twitter') COLLATE utf8_unicode_ci NOT NULL,
 ADD COLUMN `oauth_uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 ADD COLUMN `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
 ADD COLUMN `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
 ADD COLUMN `picture_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 ADD COLUMN `profile_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 ADD COLUMN `date_modified` datetime NOT NULL,
 ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
```
3)

