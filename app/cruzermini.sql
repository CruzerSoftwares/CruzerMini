-- Adminer 4.7.1 SQLite 3 dump

DROP TABLE IF EXISTS tbl_pages;
CREATE TABLE tbl_pages (
  `id` integer NOT NULL,
  `title` text NOT NULL,
  `alias` text NULL,
  `description` text NULL,
  `image` text NULL,
  `status` integer NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` integer NULL,
  `meta_description` text NULL,
  `meta_keywords` text NULL,
  `layout` numeric NULL
);

INSERT INTO tbl_pages (`id`, `title`, `alias`, `description`, `image`, `status`, `created`, `created_by`, `meta_description`, `meta_keywords`, `layout`) VALUES (1, 'Blog', 'blog', 'This is simple blog home page.', NULL, 1,  '2018-07-14 14:05:19',  NULL, NULL, NULL, NULL);
INSERT INTO tbl_pages (`id`, `title`, `alias`, `description`, `image`, `status`, `created`, `created_by`, `meta_description`, `meta_keywords`, `layout`) VALUES (2, 'My Post',  'my-post',  'This is my first blog post.',  NULL, 1,  '2018-07-14 14:05:19',  NULL, NULL, NULL, NULL);
INSERT INTO tbl_pages (`id`, `title`, `alias`, `description`, `image`, `status`, `created`, `created_by`, `meta_description`, `meta_keywords`, `layout`) VALUES (3, 'Docs', 'docs', 'This page is about the features and the documentation for the CruzerMini app. Please help us improve it for the community.', NULL, 1,  '2018-07-14 14:56:36',  NULL, NULL, NULL, NULL);
INSERT INTO tbl_pages (`id`, `title`, `alias`, `description`, `image`, `status`, `created`, `created_by`, `meta_description`, `meta_keywords`, `layout`) VALUES (4, 'CruzerMini - PHP 7 CMS built on top of Cruzer Framework',  'home', '<div class="jumbotron">
                        <div class="container">
                          <h1 class="display-5">CruzerMini</h1>
                          <p>Powerfull PHP 7 CMS built on top of Cruzer Framework. Best suited for smaller and simple projects.</p>
                          <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>
                        </div>
                      </div><h2>Features</h2>
                    <ul>
                    <li>MVC Style Design</li>
                    <li>Small in Size, yet powerfull enough and loads faster</li>
                    <li>Built in Authentication</li>
                    <li>Built in CSRF Protection</li>
                    <li>Built in Backend Panel</li>
                    <li>Markdown Editor Integrated</li>
                    <li>No Stupid Configurations</li>
                    <li>Bootstrap 4 Responsive Theme</li>
                    <li>No need to use Database if you don\'t need it.</li>
                    <li>Supports multiple Database support if you need e.g. Flat Files, SQLite, MySQL, SQL Server, Oracle, Postgress, MongoDB and many more coming soon.</li>
                    </ul>', NULL, 1,  "2018-07-14 12:58:46",  NULL, NULL, NULL, NULL);

INSERT INTO tbl_pages (`id`, `title`, `alias`, `description`, `image`, `status`, `created`, `created_by`, `meta_description`, `meta_keywords`, `layout`) VALUES (4, 'Contact Us', 'contact-us', '<h4 class="widget-title">CONTACT INFO</h4>
                <address class="contact-info">
                  <p><i class="icon icon_pin_alt ico-styled text-primary"></i> 1234 North Main Street New York, NY 22222</p>
                  <p><i class="icon icon_phone ico-styled text-primary"></i> (1800) 765 - 4321</p>
                  <p><i class="icon icon_mail_alt ico-styled text-primary"></i> email@yourdomain.com</p>
                </address>',  NULL, 1,  "2018-07-14 12:58:46",  NULL, NULL, NULL, NULL);

DROP TABLE IF EXISTS tbl_posts;
CREATE TABLE `tbl_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `alias` varchar(250) DEFAULT NULL,
  `tags` varchar(250) NOT NULL,
  `description` text ,
  `image` varchar(250) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL
);

INSERT INTO tbl_posts (`id`, `title`, `alias`, `tags`, `description`, `image`, `status`, `created`, `created_by`) VALUES (1,  'PHP 7 Features', 'php7-features',  'php',  '<p>PHP 7 is the latest version of the php which introduces a lot of features and improvements. Have a look on the latest features of php 7:</p>
<ul>
<li> 40% faster</li>
<li> memory efficient</li>
<li> strict mode per page wise</li>
<li> type for method signature, return type</li>
<li> much more</li>
</ul>', 'php7_features.png',  1,  "2018-07-14 17:41:24",  NULL);

INSERT INTO tbl_posts (`id`, `title`, `alias`, `tags`, `description`, `image`, `status`, `created`, `created_by`) VALUES (1, 'Cruzer Mini Features', 'cruzer-mini-features', 'php, framework, cms',  '<p>Cruzer Mini has lots of Features</p>',  'images.jpeg',  1,  "2018-07-14 11:45:43",  NULL);

DROP TABLE IF EXISTS tbl_users;
CREATE TABLE tbl_users (
  `id`  int ( 11 ) NOT NULL,
  `first_name`  varchar ( 100 ) NOT NULL,
  `last_name` varchar ( 100 ) NOT NULL,
  `email` varchar ( 100 ) NOT NULL UNIQUE,
  `password`  varchar ( 100 ) NOT NULL,
  `image` varchar ( 250 ) DEFAULT NULL,
  `status`  tinyint ( 4 ) DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by`  int ( 11 ) DEFAULT NULL,
  `groups`  tinyint(4) DEFAULT 0
);


INSERT INTO tbl_users (`id`, `first_name`, `last_name`, `email`, `password`, `image`, `status`, `created`, `created_by`, `groups`) 
VALUES (1, 'Admin',  'G',  'admin@gmail.com',  '$2y$10$Svf4DKQ5RpWvFpKwb1mx7u0qXNtAIjyiyGb4wHOBQai8OUHlTHDsC', NULL, 1,  "2018-07-20 09:34:29",  1,  1);

-- 