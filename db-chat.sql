
CREATE TABLE IF NOT EXISTS `chat_mensages` (
  `id_mensage` int(4) NOT NULL AUTO_INCREMENT,
  `mensage` varchar(300) NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id_mensage`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ;