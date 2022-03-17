
/* 
Create a database named “quotesdb” with 3 tables and these specific column names: 

  a) quotes (id, quote, authorId, categoryId) - the last two are foreign keys 
  b) authors (id, author) 
  c) categories (id, category) 

*/

/* (b) authors (id, author) */

CREATE TABLE `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

/* (c) categories (id, category) */

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

/* (a) quotes (id, quote, authorId, categoryId) - the last two are foreign keys */
CREATE TABLE `quotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quote` varchar(255) NOT NULL,
  `authorId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`authorId`) REFERENCES `authors`(`id`),
  FOREIGN KEY (`categoryId`) REFERENCES `categories`(`id`)
);

INSERT INTO `authors` (`id`, `author`) VALUES
(1, 'Drake Parker'),
(2, 'Josh Nichols'),
(3, 'Jessica Huang'),
(4, 'Chandler Bing'),
(5, 'Mitchell Pritchett'),
(6, 'Joey Tribbiani'),
(7, 'Rachel Green'),
(8, 'Ross Geller'),
(9, 'Gloria Pritchett'),
(10, 'Phil Duncan'),
(11, 'Jean Ralphio'),
(12, 'Patrick Star'),
(13, 'Sheldon J. Plankton'),
(14, 'SpongeBob SquarePants');

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Drake and Josh'),
(2, 'Fresh Off The Boat'),
(3, 'Friends'),
(4, 'Modern Family'),
(5, 'Parks and Rec'),
(6, 'SpongeBob SquarePants');

INSERT INTO `quotes` (`id`, `quote`, `authorId`, `categoryId`) VALUES
(1, 'Pip-Pip-Da-Doodalydoo.', 1, 1),
(2, 'I ain''t calling you a truther!', 2, 1),
(3, 'Headaches! You give me headaches!', 2, 1),
(4, 'I ran over Oprah!', 2, 1),
(5, 'If we get separated, try and join a white family. You will be safe there until I can find you.', 3, 2),
(6, 'No one seems to appreciate how good I am at everything I do.', 3, 2),
(7, 'They''re family, they''re coming to gloat about all of our misfortunes.', 3, 2),
(8, 'Which one says I''m rich enough to be invited but not rich enough that you can ask me to donate money?', 3, 2),
(9, 'I''m gonna treat myself to a pedicure done by a white lady. That''s when you know you''ve made it.', 3, 2),
(10, 'Hi, I''m Chandler. I make jokes when I''m uncomfortable.', 4, 3),
(11, 'We locked our baby in the car and people are judging us!', 5, 4),
(12, 'Joey doesn''t share food!', 6, 3),
(13, 'How you doin''?', 6, 3),
(14, 'I got off the plane.', 7, 3),
(15, 'We were on a break!', 8, 3),
(16, 'Pivot!', 8, 3),
(17, 'When you''re married to me you''re going to be yelled at many times.', 9, 4),
(18, 'I''m the cool dad. That''s my thing. I''m hip. I surf the Web. I text. LOL: laugh out loud. OMG: Oh my God. WTF: Why the face?', 10, 4),
(19, 'Did someone just talk about a job opening? Guess who''s got two thumbs up and was just cleared of insurance fraud? This guy!! Got off on a technicality!!!', 11, 5),
(20, 'I guess I''m.. OpEn MinDeD aS hEeEeEll!', 11, 5),
(21, 'Because technically I''m… violating my hoooooouse arreeeeeeeeeeeest!', 11, 5),
(22, 'She''s the wooo-ooorst!!!!', 11, 5),
(23, 'Because technically I''m hooooomelesssss!', 11, 5),
(24, 'K to the N to the O P E, she''s the dopest little shorty in all Pawnee. Indiana.', 11, 5),
(25, 'Look at that. I guess sometimes I call men beautiful too. I guess I''m open-minded as hell. And I think you''re pretty good-looking.', 11, 5),
(26, 'The inner machinations of my mind are an enigma.', 12, 6),
(27, 'We should just take Bikini Bottom and push it somewhere else!', 12, 6),
(28, 'Holographic meatloaf? My favorite!', 13, 6),
(29, 'Squidward… I used your clarinet to unclog my toilet!', 14, 6),
(30, 'The Krusty Krab pizza is the pizza for you and me.', 14, 6),
(31, 'Hey Patrick, I thought of something funnier than 24… 25!', 14, 6),
(32, 'Gun to my head? I''d say pull the trigger.', 5, 4),
(33, 'Well, someone inherited her father''s flair for hyperbole.', 5, 4),
(34, 'Why does everyone think I''m gay?', 5, 4),
(35, 'Cam thinks that if he were straight he and Julia Roberts would be dating.', 5, 4),
(36, 'I can''t go to jail. I''m a gay prosecutor, there''s no prison gangs for that!', 5, 4);

