BEGIN TRANSACTION;
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
INSERT INTO `tbl_posts` VALUES (1,'PHP 7 Features','php7-features','php','<p>PHP 7 is the latest version of the php which introduces a lot of features and improvements. Have a look on the latest features of php 7:</p>
<ul>
<li> 40% faster</li>
<li> memory efficient</li>
<li> strict mode per page wise</li>
<li> type for method signature, return type</li>
<li> much more</li>
</ul>','php7_features.png',1,'2018-07-14 17:41:24',NULL);
INSERT INTO `tbl_posts` VALUES ('','Cruzer Mini Features','cruzer-mini-features','php, framework, cms','<p>Cruzer Mini has lots of Features</p>','images.jpeg',1,'2018-07-14 11:45:43',NULL);
CREATE TABLE `tbl_pages` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `alias` varchar(250) DEFAULT NULL,
  `description` text ,
  `image` varchar(250) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL
);
INSERT INTO `tbl_pages` VALUES (1,'Blog','blog','This is simple blog home page.',NULL,1,'2018-07-14 14:05:19',NULL);
INSERT INTO `tbl_pages` VALUES (2,'My Post','my-post','This is my first blog post.',NULL,1,'2018-07-14 14:05:19',NULL);
INSERT INTO `tbl_pages` VALUES (3,'Docs','docs','This page is about the features and the documentation for the CruzerMini app. Please help us improve it for the community.',NULL,1,'2018-07-14 14:56:36',NULL);
INSERT INTO `tbl_pages` VALUES (4,'CruzerMini - PHP 7 CMS built on top of Cruzer Framework','home','<div class="jumbotron">
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
                    <li>No need to use Database if you don\''t need it.</li>
                    <li>Supports multiple Database support if you need e.g. Flat Files, SQLite, MySQL, SQL Server, Oracle, Postgress, MongoDB and many more coming soon.</li>
                    </ul>',NULL,1,'2018-07-14 12:58:46',NULL);
COMMIT;
