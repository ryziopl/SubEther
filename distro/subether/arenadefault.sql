
--
-- Dumping data for table `Languages`
--

INSERT INTO `Languages` (`ID`, `Name`, `NativeName`, `IsDefault`, `UrlActivator`, `BaseUrl`) VALUES
(2, 'en', 'English', 1, '', '');

--
-- Dumping data for table `ContentElement`
--

INSERT INTO `ContentElement` (`ID`, `MainID`, `Parent`, `SymLink`, `SortOrder`, `Title`, `MenuTitle`, `SystemName`, `Intro`, `Body`, `IsPublished`, `IsFallback`, `IsSystem`, `IsMain`, `IsDeleted`, `DateCreated`, `DateModified`, `DatePublish`, `DateArchive`, `Link`, `LinkData`, `Template`, `TemplateArchived`, `TemplateID`, `Author`, `Version`, `VersionPublished`, `Language`, `ContentType`, `RouteName`, `IsTemplate`, `IsProtected`, `IsDefault`, `SeenTimesUnique`, `SeenTimes`, `ContentGroups`, `ContentTemplateID`) VALUES (13,13,0,0,0,'Main','Main','root','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,0,0,0,0,'2013-10-04 15:11:22','2017-12-29 14:56:24','2017-12-29 14:55:40',NULL,'','LinkTarget	','','',0,81,0,0,'2','extensions','main',0,0,0,62035,406351,'Top, Scene, Field1, Field2, Bottom, Footer',0),(14,13,0,0,0,'Main','Main','root','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,0,0,0,0,'2013-10-04 15:11:22','2017-12-29 14:56:24','2017-12-29 14:56:24',NULL,'','LinkTarget	','','',0,81,0,0,'2','extensions','main',0,0,0,62035,406351,'Top, Scene, Field1, Field2, Bottom, Footer',0),(15,15,13,0,1,'Home','Home','home','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,0,0,0,0,'2013-10-13 11:35:04','2015-12-27 14:40:20','2015-12-25 17:35:15',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','home',0,0,0,28496,117442,'Top, Scene, Footer',0),(16,15,13,0,1,'Home','Home','home','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,0,0,0,0,'2013-10-13 11:35:04','2015-12-27 14:40:20','2015-12-27 14:40:20',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','home',0,0,0,28496,117442,'Top, Scene, Footer',0),(25,25,13,0,13,'About','About','about','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,NULL,1,0,0,'2014-05-01 18:49:41','2014-05-01 19:17:28','2014-05-01 19:11:20',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','about',0,0,0,1649,2278,'Top, Scene, Footer',0),(26,25,13,0,13,'About','About','about','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,NULL,1,0,0,'2014-05-01 18:49:41','2014-05-01 19:17:28','2014-05-01 19:17:28',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','about',0,0,0,1649,2278,'Top, Scene, Footer',0),(27,27,13,0,14,'Terms','Terms','terms','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,NULL,1,0,0,'2014-05-01 18:50:58','2014-05-01 19:17:49','2014-05-01 19:12:31',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','terms',0,0,0,2333,2927,'Top, Scene, Footer',0),(28,27,13,0,14,'Terms','Terms','terms','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,0,1,0,0,'2014-05-01 18:50:58','2014-05-01 19:17:49','2014-05-01 19:17:49',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','terms',0,0,0,2333,2927,'Top, Scene, Footer',0),(29,29,13,0,15,'Copyright','Copyright','copyright','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,NULL,1,0,0,'2014-05-01 18:51:35','2014-05-01 19:17:58','2014-05-01 19:13:09',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','copyright',0,0,0,6355,6702,'Top, Scene, Footer',0),(30,29,13,0,15,'Copyright','Copyright','copyright','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,NULL,1,0,0,'2014-05-01 18:51:35','2014-05-01 19:17:58','2014-05-01 19:17:58',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','copyright',0,0,0,6355,6702,'Top, Scene, Footer',0),(31,31,13,0,16,'Advertising','Advertising','Advertising','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,NULL,1,0,0,'2014-05-01 18:52:04','2014-05-01 19:18:09','2014-05-01 19:13:53',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','advertising',0,0,0,1359,1365,'Top, Scene, Footer',0),(32,31,13,0,16,'Advertising','Advertising','Advertising','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,NULL,1,0,0,'2014-05-01 18:52:04','2014-05-01 19:18:09','2014-05-01 19:18:09',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','advertising',0,0,0,1359,1365,'Top, Scene, Footer',0),(33,33,13,0,17,'Privacy','Privacy','Privacy','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,NULL,1,0,0,'2014-05-01 18:52:30','2014-05-01 19:18:18','2014-05-01 19:14:43',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','privacy',0,0,0,1668,1674,'Top, Scene, Footer',0),(34,33,13,0,17,'Privacy','Privacy','Privacy','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,NULL,0,0,0,'2014-05-01 18:52:30','2014-05-01 19:18:18','2014-05-01 19:18:18',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','privacy',0,0,0,1668,1674,'Top, Scene, Footer',0),(35,35,13,0,18,'Policy','Policy & Feedback','policy','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,NULL,1,0,0,'2014-05-01 18:53:23','2014-05-01 19:18:26','2014-05-01 19:15:21',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','policy_feedback',0,0,0,1402,1410,'Top, Scene, Footer',0),(36,35,13,0,18,'Policy','Policy & Feedback','policy','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,NULL,1,0,0,'2014-05-01 18:53:23','2014-05-01 19:18:26','2014-05-01 19:18:26',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','policy_feedback',0,0,0,1402,1410,'Top, Scene, Footer',0),(37,37,13,0,19,'Creators','Creators & Partners','creators','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,NULL,1,0,0,'2014-05-01 18:54:02','2014-05-01 19:18:35','2014-05-01 19:16:11',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','creators_partners',0,0,0,1289,1297,'Top, Scene, Footer',0),(38,37,13,0,19,'Creators','Creators & Partners','creators','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,NULL,0,0,0,'2014-05-01 18:54:02','2014-05-01 19:18:35','2014-05-01 19:18:35',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','creators_partners',0,0,0,1289,1297,'Top, Scene, Footer',0),(39,39,13,0,20,'Developers','Developers','developers','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,NULL,1,0,0,'2014-05-01 18:55:17','2014-05-01 19:18:44','2014-05-01 19:16:52',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','developers',0,0,0,2137,2148,'Top, Scene, Footer',0),(40,39,13,0,20,'Developers','Developers','developers','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,NULL,1,0,0,'2014-05-01 18:55:17','2014-05-01 19:18:44','2014-05-01 19:18:44',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','developers',0,0,0,2137,2148,'Top, Scene, Footer',0),(67,67,13,0,3,'Account','Account','account','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,0,0,0,0,'2015-12-25 17:35:43','2015-12-25 17:37:22','2015-12-25 17:36:38',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','account',0,0,0,36,102,'Top, Scene, Footer',0),(71,71,13,0,12,'Nodes','Nodes','nodes','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,0,0,0,0,'2015-12-26 22:53:37','2015-12-26 22:56:41','2015-12-26 22:55:11',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','nodes',0,0,0,162,173,'Top, Scene, Footer',0),(65,65,13,0,2,'Profile','Profile','profile','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,0,0,0,0,'2015-12-25 17:31:39','2015-12-25 17:34:50','2015-12-25 17:33:09',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','profile',0,0,0,1,2,'Top, Scene, Footer',0),(66,65,13,0,2,'Profile','Profile','profile','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,0,0,0,0,'2015-12-25 17:31:39','2015-12-25 17:34:50','2015-12-25 17:34:50',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','profile',0,0,0,1,2,'Top, Scene, Footer',0),(63,63,13,0,21,'Fallback','Fallback','fallback','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,1,0,0,0,'2015-12-25 15:07:39','2015-12-25 17:35:01','2015-12-25 16:47:19',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','fallback',0,0,0,163,1440,'Top, Scene, Footer',0),(64,63,13,0,21,'Fallback','Fallback','fallback','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,1,0,0,0,'2015-12-25 15:07:39','2015-12-25 17:35:01','2015-12-25 17:35:01',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','fallback',0,0,0,163,1440,'Top, Scene, Footer',0),(68,67,13,0,3,'Account','Account','account','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,0,0,0,0,'2015-12-25 17:35:43','2015-12-25 17:37:22','2015-12-25 17:37:22',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','account',0,0,0,36,102,'Top, Scene, Footer',0),(69,69,13,0,4,'Global','Global','global','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,0,0,0,0,'2015-12-25 17:42:00','2015-12-25 17:43:33','2015-12-25 17:42:56',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','global',0,0,0,36,264,'Top, Scene, Footer',0),(70,69,13,0,4,'Global','Global','global','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,0,0,0,0,'2015-12-25 17:42:00','2015-12-25 17:43:33','2015-12-25 17:43:33',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','global',0,0,0,36,264,'Top, Scene, Footer',0),(72,71,13,0,12,'Nodes','Nodes','nodes','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,0,0,0,0,'2015-12-26 22:53:37','2015-12-26 22:56:41','2015-12-26 22:56:41',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','nodes',0,0,0,162,173,'Top, Scene, Footer',0),(73,73,13,0,5,'Ecovillage','Ecovillage','ecovillage','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,0,0,0,0,'2015-12-27 14:56:33','2015-12-27 15:01:59','2015-12-27 14:59:54',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','ecovillage',0,0,0,874,874,'Top, Scene, Footer',0),(74,73,13,0,5,'Ecovillage','Ecovillage','ecovillage','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,0,0,0,0,'2015-12-27 14:56:33','2015-12-27 15:01:59','2015-12-27 15:01:59',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','ecovillage',0,0,0,874,874,'Top, Scene, Footer',0),(75,75,13,0,8,'University','University','university','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,0,0,0,0,'2015-12-27 15:00:27','2015-12-27 15:03:10','2015-12-27 15:00:54',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','university',0,0,0,864,864,'Top, Scene, Footer',0),(76,75,13,0,8,'University','University','university','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,0,0,0,0,'2015-12-27 15:00:27','2015-12-27 15:03:10','2015-12-27 15:03:10',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','university',0,0,0,864,864,'Top, Scene, Footer',0),(77,77,13,0,9,'Services','Services','services','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,0,0,0,0,'2015-12-27 15:03:31','2015-12-27 15:04:35','2015-12-27 15:04:20',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','services',0,0,0,613,613,'Top, Scene, Footer',0),(78,77,13,0,9,'Services','Services','services','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,0,0,0,0,'2015-12-27 15:03:31','2015-12-27 15:04:35','2015-12-27 15:04:35',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','services',0,0,0,613,613,'Top, Scene, Footer',0),(79,79,13,0,10,'Travel','Travel','travel','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,0,0,0,0,'2015-12-27 15:05:11','2015-12-27 15:06:01',NULL,NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','travel',0,0,0,133,133,'Top, Scene, Footer',0),(80,79,13,0,10,'Travel','Travel','travel','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,0,0,0,0,'2015-12-27 15:05:11','2015-12-27 15:06:01','2015-12-27 15:06:01',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','travel',0,0,0,133,133,'Top, Scene, Footer',0),(81,81,13,0,11,'Trading','Trading','trading','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,0,0,0,0,'2015-12-27 15:06:31','2015-12-27 15:07:25',NULL,NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','trading',0,0,0,182,182,'Top, Scene, Footer',0),(82,81,13,0,11,'Trading','Trading','trading','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,0,0,0,0,'2015-12-27 15:06:31','2015-12-27 15:07:25','2015-12-27 15:07:25',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','trading',0,0,0,182,182,'Top, Scene, Footer',0),(83,83,13,0,6,'Register','Register','register','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,0,0,0,0,'2015-12-27 23:53:24','2015-12-27 23:56:05','2015-12-27 23:55:40',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','register',0,0,0,21,88,'Top, Scene, Footer',0),(84,83,13,0,6,'Register','Register','register','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,0,0,0,0,'2015-12-27 23:53:24','2015-12-27 23:56:05','2015-12-27 23:56:05',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','register',0,0,0,21,88,'Top, Scene, Footer',0),(85,85,13,0,7,'Testing','Testing','testing','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,0,0,0,0,'2015-12-30 14:28:56','2015-12-30 14:38:17','2015-12-30 14:33:17',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','testing',0,0,0,16,67,'Top, Scene, Footer',0),(86,85,13,0,7,'Testing','Testing','testing','ExtensionName	templates\nExtensionContentGroup	__override__\n','',1,0,0,0,0,'2015-12-30 14:28:56','2015-12-30 14:38:17','2015-12-30 14:38:17',NULL,'','LinkTarget	','','',0,113,0,0,'2','extensions','testing',0,0,0,16,67,'Top, Scene, Footer',0);

--
-- Dumping data for table `ContentDataSmall`
--

INSERT INTO `ContentDataSmall` (`ID`, `ContentID`, `ContentTable`, `DataString`, `DataMixed`, `DataInt`, `DataDouble`, `Name`, `SortOrder`, `Type`, `IsVisible`, `AdminVisibility`, `ContentGroup`, `IsGlobal`) VALUES (26889,16,'ContentElement','sbook','Type	main\nSite	\nComponents	',0,0,'Main',0,'extension',1,1,'Scene',0),(26902,14,'ContentElement','sbook','Type	authentication\nSite	\nComponents	authentication',0,0,'Front',1,'extension',1,1,'Field2',0),(27360,13,'ContentElement','sbook','Type	authentication\nSite	\nComponents	',0,0,'Menu',3,'extension',1,1,'Top',1),(27359,13,'ContentElement','sbook','Components	search\nType	engine\nSite	',0,0,'TopSearch',2,'extension',1,1,'Top',1),(27266,15,'ContentElement','sbook','Type	main\nSite	\nComponents	',0,0,'Main',0,'extension',1,1,'Scene',0),(27243,66,'ContentElement','sbook','Type	profile\nSite	\nComponents	',0,0,'Main',1,'extension',1,1,'Scene',0),(27251,68,'ContentElement','sbook','Type	account\nSite	\nComponents	',0,0,'Main',1,'extension',1,1,'Scene',0),(27247,65,'ContentElement','sbook','Type	profile\nSite	\nComponents	',0,0,'Main',1,'extension',1,1,'Scene',0),(27231,64,'ContentElement','sbook','Type	default\nSite	\nComponents	',0,0,'Main',1,'extension',1,1,'Scene',0),(27270,14,'ContentElement','sbook','Components	search\nType	engine\nSite	',0,0,'TopSearch',2,'extension',1,1,'Top',1),(27248,63,'ContentElement','sbook','Type	default\nSite	\nComponents	',0,0,'Main',1,'extension',1,1,'Scene',0),(27254,67,'ContentElement','sbook','Type	account\nSite	\nComponents	',0,0,'Main',1,'extension',1,1,'Scene',0),(27255,70,'ContentElement','sbook','Type	global\nSite	\nComponents	',0,0,'Main',1,'extension',1,1,'Scene',0),(27259,69,'ContentElement','sbook','Type	global\nSite	\nComponents	',0,0,'Main',1,'extension',1,1,'Scene',0),(27261,72,'ContentElement','sbook','Type	nodes\nSite	\nComponents	',0,0,'Main',1,'extension',1,1,'Scene',0),(27263,71,'ContentElement','sbook','Type	nodes\nSite	\nComponents	',0,0,'Main',1,'extension',1,1,'Scene',0),(27273,14,'ContentElement','sbook','Type	authentication\nSite	\nComponents	',0,0,'Menu',3,'extension',1,1,'Top',1),(27298,74,'ContentElement','sbook','Type	ecovillage\nSite	\nComponents	',0,0,'Main',1,'extension',1,1,'Scene',0),(27304,73,'ContentElement','sbook','Type	ecovillage\nSite	\nComponents	',0,0,'Main',1,'extension',1,1,'Scene',0),(27300,76,'ContentElement','sbook','Type	university\nSite	\nComponents	',0,0,'Main',1,'extension',1,1,'Scene',0),(27305,75,'ContentElement','sbook','Type	university\nSite	\nComponents	',0,0,'Main',1,'extension',1,1,'Scene',0),(27306,78,'ContentElement','sbook','Type	services\nSite	\nComponents	',0,0,'Main',1,'extension',1,1,'Scene',0),(27308,77,'ContentElement','sbook','Type	services\nSite	\nComponents	',0,0,'Main',1,'extension',1,1,'Scene',0),(27309,80,'ContentElement','sbook','Type	travel\nSite	\nComponents	',0,0,'Main',1,'extension',1,1,'Scene',0),(27310,79,'ContentElement','sbook','Type	travel\nSite	\nComponents	',0,0,'Main',1,'extension',1,1,'Scene',0),(27311,82,'ContentElement','sbook','Type	trading\nSite	\nComponents	',0,0,'Main',1,'extension',1,1,'Scene',0),(27312,81,'ContentElement','sbook','Type	trading\nSite	\nComponents	',0,0,'Main',1,'extension',1,1,'Scene',0),(27313,84,'ContentElement','sbook','Type	register\nSite	\nComponents	',0,0,'Main',1,'extension',1,1,'Scene',0),(27315,83,'ContentElement','sbook','Type	register\nSite	\nComponents	',0,0,'Main',1,'extension',1,1,'Scene',0),(27328,86,'ContentElement','sbook','Type	testing\nSite	\nComponents	',0,0,'Main',1,'extension',1,1,'Scene',0),(27331,85,'ContentElement','sbook','Type	testing\nSite	\nComponents	',0,0,'Main',1,'extension',1,1,'Scene',0),(27353,14,'ContentElement','sbook','Type	register\nSite	\nComponents	',NULL,NULL,'Front2',2,'extension',1,1,'Field2',0),(27358,13,'ContentElement','sbook','Type	authentication\nSite	\nComponents	authentication',0,0,'Front',1,'extension',1,1,'Field2',0),(27361,13,'ContentElement','sbook','Type	register\nSite	\nComponents	',0,0,'Front2',2,'extension',1,1,'Field2',0);

--
-- Dumping data for table `ContentDataBig`
--

INSERT INTO `ContentDataBig` (`ID`, `ContentID`, `ContentTable`, `DataText`, `Name`, `SortOrder`, `Type`, `IsVisible`, `AdminVisibility`, `ContentGroup`, `IsGlobal`) VALUES (124,14,'ContentElement','<img src=\\\"upload/images-master/logo_white.png\\\"/>','Main',0,'leadin',1,1,'Field1',0),(134,14,'ContentElement','<br/><!--<a href=\\\"ecovillage/\\\">EcoVillage</a>&nbsp; |&nbsp; <a href=\\\"university/\\\">University</a>&nbsp; |&nbsp; <a href=\\\"services/\\\">Services</a>&nbsp; |&nbsp; <a href=\\\"travel/\\\">Travel</a>&nbsp; |&nbsp; <a href=\\\"trading/\\\">Trading</a>-->','Navigation',0,'leadin',1,1,'Bottom',0),(754,25,'ContentElement','<iframe src=\"upload/about.html\" style=\"width:100%;\" scrolling=\"no\" onload=\"this.height = \'\';this.height = this.contentWindow.document.body.scrollHeight;\" frameborder=\"0\" height=\"150\"></iframe>','Hovedfelt',1,'leadin',1,1,'Scene',0),(658,14,'ContentElement','<a href=\\\"nodes/\\\">Nodes</a>&nbsp; |&nbsp; <a href=\\\"about/\\\">About</a>&nbsp; |&nbsp; <a href=\\\"terms/\\\">Terms</a>&nbsp; |&nbsp; <a href=\\\"copyright/\\\">Copyright</a>&nbsp; |&nbsp; <a href=\\\"advertising/\\\">Advertising</a>&nbsp; |&nbsp; <a href=\\\"privacy/\\\">Privacy</a>&nbsp; |&nbsp; <a href=\\\"policy_feedback/\\\">Policy &amp; Feedback</a>&nbsp; |&nbsp; <a href=\\\"creators_partners/\\\">Creators &amp; Partners</a>&nbsp; |&nbsp; <a href=\\\"developers/\\\">Developers</a>&nbsp; |&nbsp; <a href=\\\"sitemap.xml\\\">Sitemap</a>','BottomLinks',1,'leadin',1,1,'Footer',1),(436,26,'ContentElement','<iframe src=\\\"upload/about.html\\\" style=\\\"width:100%;\\\" scrolling=\\\"no\\\" onload=\\\"this.height = \\\'\\\';this.height = this.contentWindow.document.body.scrollHeight;\\\" frameborder=\\\"0\\\" height=\\\"150\\\"></iframe>','Hovedfelt',1,'leadin',1,1,'Scene',0),(439,28,'ContentElement','<iframe src=\\\"upload/terms.html\\\" style=\\\"width:100%;\\\" scrolling=\\\"no\\\" onload=\\\"this.height = \\\'\\\';this.height = this.contentWindow.document.body.scrollHeight;\\\" frameborder=\\\"0\\\" height=\\\"150\\\"></iframe>','Hovedfelt',1,'leadin',1,1,'Scene',0),(443,30,'ContentElement','<iframe src=\\\"upload/copyright.html\\\" style=\\\"width:100%;\\\" scrolling=\\\"no\\\" onload=\\\"this.height = \\\'\\\';this.height = this.contentWindow.document.body.scrollHeight;\\\" frameborder=\\\"0\\\" height=\\\"150\\\"></iframe>','Hovedfelt',1,'leadin',1,1,'Scene',0),(758,29,'ContentElement','<iframe src=\"upload/copyright.html\" style=\"width:100%;\" scrolling=\"no\" onload=\"this.height = \'\';this.height = this.contentWindow.document.body.scrollHeight;\" frameborder=\"0\" height=\"150\"></iframe>','Hovedfelt',1,'leadin',1,1,'Scene',0),(445,32,'ContentElement','<iframe src=\\\"upload/advertising.html\\\" style=\\\"width:100%;\\\" scrolling=\\\"no\\\" onload=\\\"this.height = \\\'\\\';this.height = this.contentWindow.document.body.scrollHeight;\\\" frameborder=\\\"0\\\" height=\\\"150\\\"></iframe>','Hovedfelt',1,'leadin',1,1,'Scene',0),(447,34,'ContentElement','<iframe src=\\\"upload/privacy.html\\\" style=\\\"width:100%;\\\" scrolling=\\\"no\\\" onload=\\\"this.height = \\\'\\\';this.height = this.contentWindow.document.body.scrollHeight;\\\" frameborder=\\\"0\\\" height=\\\"150\\\"></iframe>','Hovedfelt',1,'leadin',1,1,'Scene',0),(760,33,'ContentElement','<iframe src=\"upload/privacy.html\" style=\"width:100%;\" scrolling=\"no\" onload=\"this.height = \'\';this.height = this.contentWindow.document.body.scrollHeight;\" frameborder=\"0\" height=\"150\"></iframe>','Hovedfelt',1,'leadin',1,1,'Scene',0),(449,36,'ContentElement','<iframe src=\\\"upload/policy.html\\\" style=\\\"width:100%;\\\" scrolling=\\\"no\\\" onload=\\\"this.height = \\\'\\\';this.height = this.contentWindow.document.body.scrollHeight;\\\" frameborder=\\\"0\\\" height=\\\"150\\\"></iframe>','Hovedfelt',1,'leadin',1,1,'Scene',0),(761,35,'ContentElement','<iframe src=\"upload/policy.html\" style=\"width:100%;\" scrolling=\"no\" onload=\"this.height = \'\';this.height = this.contentWindow.document.body.scrollHeight;\" frameborder=\"0\" height=\"150\"></iframe>','Hovedfelt',1,'leadin',1,1,'Scene',0),(451,38,'ContentElement','<iframe src=\\\"upload/creators.html\\\" style=\\\"width:100%;\\\" scrolling=\\\"no\\\" onload=\\\"this.height = \\\'\\\';this.height = this.contentWindow.document.body.scrollHeight;\\\" frameborder=\\\"0\\\" height=\\\"150\\\"></iframe>','Hovedfelt',1,'leadin',1,1,'Scene',0),(762,37,'ContentElement','<iframe src=\"upload/creators.html\" style=\"width:100%;\" scrolling=\"no\" onload=\"this.height = \'\';this.height = this.contentWindow.document.body.scrollHeight;\" frameborder=\"0\" height=\"150\"></iframe>','Hovedfelt',1,'leadin',1,1,'Scene',0),(455,40,'ContentElement','<iframe src=\\\"upload/developers.html\\\" style=\\\"width:100%;\\\" scrolling=\\\"no\\\" onload=\\\"this.height = \\\'\\\';this.height = this.contentWindow.document.body.scrollHeight;\\\" frameborder=\\\"0\\\" height=\\\"150\\\"></iframe>','Hovedfelt',1,'leadin',1,1,'Scene',0),(763,39,'ContentElement','<iframe src=\"upload/developers.html\" style=\"width:100%;\" scrolling=\"no\" onload=\"this.height = \'\';this.height = this.contentWindow.document.body.scrollHeight;\" frameborder=\"0\" height=\"150\"></iframe>','Hovedfelt',1,'leadin',1,1,'Scene',0),(667,14,'ContentElement','SubEther v<span id=\\\"NODE_VERSION\\\">1.0.00</span> © <span id=\\\"NODE_COPYRIGHT\\\">2018</span> | SubEther is available under the <a href=\\\"http://www.gnu.org/licenses/agpl-3.0-standalone.html\\\">AGPLv3 license</a>','BottomInfo',2,'leadin',1,1,'Footer',1),(755,27,'ContentElement','<iframe src=\"upload/terms.html\" style=\"width:100%;\" scrolling=\"no\" onload=\"this.height = \'\';this.height = this.contentWindow.document.body.scrollHeight;\" frameborder=\"0\" height=\"150\"></iframe>','Hovedfelt',1,'leadin',1,1,'Scene',0),(759,31,'ContentElement','<iframe src=\"upload/advertising.html\" style=\"width:100%;\" scrolling=\"no\" onload=\"this.height = \'\';this.height = this.contentWindow.document.body.scrollHeight;\" frameborder=\"0\" height=\"150\"></iframe>','Hovedfelt',1,'leadin',1,1,'Scene',0),(764,14,'ContentElement','<a href=\\\"./\\\"><img src=\\\"upload/images-master/logo_symbol_white.png\\\"/></a>','Logo_Symbol',1,'leadin',1,1,'Top',1),(648,14,'ContentElement','<a href=\\\"./\\\"><img src=\\\"upload/images-master/logo_white.png\\\"/></a>','Logo',1,'leadin',1,1,'Top',1),(830,13,'ContentElement','<a href=\"./\"><img src=\"upload/images-master/logo_white.png\"/></a>','Logo',1,'leadin',1,1,'Top',1),(827,13,'ContentElement','<a href=\"nodes/\">Nodes</a>&nbsp; |&nbsp; <a href=\"about/\">About</a>&nbsp; |&nbsp; <a href=\"terms/\">Terms</a>&nbsp; |&nbsp; <a href=\"copyright/\">Copyright</a>&nbsp; |&nbsp; <a href=\"advertising/\">Advertising</a>&nbsp; |&nbsp; <a href=\"privacy/\">Privacy</a>&nbsp; |&nbsp; <a href=\"policy_feedback/\">Policy &amp; Feedback</a>&nbsp; |&nbsp; <a href=\"creators_partners/\">Creators &amp; Partners</a>&nbsp; |&nbsp; <a href=\"developers/\">Developers</a>&nbsp; |&nbsp; <a href=\"sitemap.xml\">Sitemap</a>','BottomLinks',1,'leadin',1,1,'Footer',1),(828,13,'ContentElement','SubEther v<span id=\"NODE_VERSION\">1.0.00</span> © <span id=\"NODE_COPYRIGHT\">2018</span> | SubEther is available under the <a href=\"http://www.gnu.org/licenses/agpl-3.0-standalone.html\">AGPLv3 license</a>','BottomInfo',2,'leadin',1,1,'Footer',1),(829,13,'ContentElement','<a href=\"./\"><img src=\"upload/images-master/logo_symbol_white.png\"/></a>','Logo_Symbol',1,'leadin',1,1,'Top',1),(825,13,'ContentElement','<img src=\"upload/images-master/logo_white.png\"/>','Main',0,'leadin',1,1,'Field1',0),(826,13,'ContentElement','<br/><!--<a href=\"ecovillage/\">EcoVillage</a>&nbsp; |&nbsp; <a href=\"university/\">University</a>&nbsp; |&nbsp; <a href=\"services/\">Services</a>&nbsp; |&nbsp; <a href=\"travel/\">Travel</a>&nbsp; |&nbsp; <a href=\"trading/\">Trading</a>-->','Navigation',0,'leadin',1,1,'Bottom',0);

