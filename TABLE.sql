CREATE TABLE IF NOT EXISTS `vpb_facebook_style_likes_unlikes` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `comment_id` varchar(200) NOT NULL,
  `ip_address` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `vpb_facebook_style_like_and_unlike` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(200) NOT NULL,
  `comments` text NOT NULL,
  `photo` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `vpb_facebook_style_like_and_unlike`
--

INSERT INTO `vpb_facebook_style_like_and_unlike` (`id`, `fullname`, `comments`, `photo`, `date`) VALUES
(1, 'Greg Joshua', 'Vasplus Programming Blog is indeed a great system and i do really like it.', '1.jpg', 'Monday 8th of October 2012'),
(2, 'Kenneth Ahmad', 'There are lot to learn on Vasplus Programming Blog website.', '2.jpg', 'Monday 29th of October 2012'),
(3, 'Vasplus Blog', 'Knowledge is power and controls all things. Study hard and don''t take it for granted.', '3.jpg', 'Sunday 30th of September 2012'),
(4, 'Emy Nero', 'There''s a time to all that God has created. We must do our very best to make it in life.', '4.jpg', 'Sunday 30th of September 2012'),
(5, 'Smith Joe', 'Try to be good in all you do and never forget to make the difference.', '5.jpg', 'Tuesday 30th of October 2012'),
(6, 'Justin Adams', 'Do not give up because that which you have been expecting may just be near.', '6.jpg', 'Sunday 30th of September 2012');