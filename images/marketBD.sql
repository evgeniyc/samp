-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 23 2021 г., 16:56
-- Версия сервера: 10.4.10-MariaDB
-- Версия PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `wmarket`
--

-- --------------------------------------------------------

--
-- Структура таблицы `archive`
--

DROP TABLE IF EXISTS `archive`;
CREATE TABLE IF NOT EXISTS `archive` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `prod` smallint(5) UNSIGNED NOT NULL,
  `quant` tinyint(3) UNSIGNED NOT NULL,
  `price` smallint(5) UNSIGNED NOT NULL,
  `user` smallint(5) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

DROP TABLE IF EXISTS `basket`;
CREATE TABLE IF NOT EXISTS `basket` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user` smallint(5) UNSIGNED NOT NULL,
  `prod` smallint(5) UNSIGNED NOT NULL,
  `quant` tinyint(3) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `cats`
--

DROP TABLE IF EXISTS `cats`;
CREATE TABLE IF NOT EXISTS `cats` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(24) DEFAULT NULL,
  `parent` tinyint(3) DEFAULT NULL,
  `img` varchar(24) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cats`
--

INSERT INTO `cats` (`id`, `name`, `parent`, `img`) VALUES
(1, 'Стройматериалы', NULL, 'gazon.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `charact`
--

DROP TABLE IF EXISTS `charact`;
CREATE TABLE IF NOT EXISTS `charact` (
  `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(24) NOT NULL,
  `units` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `chars`
--

DROP TABLE IF EXISTS `chars`;
CREATE TABLE IF NOT EXISTS `chars` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `prod` smallint(5) UNSIGNED NOT NULL,
  `name` tinyint(3) UNSIGNED NOT NULL,
  `value` varchar(24) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `img`
--

DROP TABLE IF EXISTS `img`;
CREATE TABLE IF NOT EXISTS `img` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `prod` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(24) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1579607250),
('m200104_153658_add_sdescr_column_to_products_table', 1580385397),
('m200130_113851_create_cats_table', 1580385632),
('m200130_145143_add_position_column_to_products_table', 1580395914);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user` smallint(5) UNSIGNED NOT NULL,
  `prod` smallint(5) UNSIGNED NOT NULL,
  `quant` tinyint(3) UNSIGNED NOT NULL,
  `status` set('new','working','completed','') DEFAULT 'new',
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user`, `prod`, `quant`, `status`, `date`) VALUES
(3, 5, 7, 3, 'new', '2020-01-29 12:49:09'),
(2, 5, 6, 1, 'new', '2020-01-29 12:48:23'),
(4, 5, 10, 2, 'new', '2020-01-29 13:08:09'),
(5, 5, 10, 2, 'new', '2020-11-03 13:29:11'),
(6, 5, 8, 2, 'new', '2020-11-07 10:56:42');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `prod` smallint(5) UNSIGNED NOT NULL,
  `quantity` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL COMMENT 'Заголовок',
  `descr` text DEFAULT NULL COMMENT 'Описание',
  `img` varchar(24) DEFAULT 'nophoto.jpg' COMMENT 'Изображение',
  `price` smallint(5) UNSIGNED DEFAULT NULL COMMENT 'Цена',
  `sdescr` text DEFAULT NULL,
  `cat` tinyint(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `descr`, `img`, `price`, `sdescr`, `cat`) VALUES
(8, 'Пилосос', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', 'pilosos.jpg', 5000, 'Здесь некоторое коротенькое описание', 1),
(7, 'Посудомойка', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n', 'posud.jpg', 2300, 'Это некоторое краткое описание товара \"Посудомойка\". Вот так.', 1),
(6, 'Газонокосилка', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n', 'сонях.jpg', 12000, NULL, 1),
(9, 'Холодильник', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"', 'holod.jpg', 5700, NULL, 1),
(10, 'Гладильная доска', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'nophoto.jpg', 1500, NULL, NULL),
(11, 'Супернож Аэронайф', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', 'aeroknife.jpg', 120, NULL, NULL),
(12, 'Стиральная машина', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"', 'washing.jpg', 7500, NULL, NULL),
(13, 'Новый продукт CKEditor', '<p>Это описание нового продукта с проверкой стилей форматирования</p>\r\n\r\n<p style=\"text-align: center;\">Это строка в центре</p>\r\n\r\n<p><span class=\"marker\">Это маркер желтого цвета</span></p>\r\n\r\n<p style=\"font-style: italic;\"><span class=\"marker\">Это <big>уже</big></span><big> ппппппп</big></p>\r\n\r\n<p style=\"font-style: italic;\"><big><span style=\"font-family:times new roman,times,serif\">Таймс нью Роман</span></big></p>\r\n\r\n<ul>\r\n	<li style=\"font-style: italic;\"><big><span style=\"font-family:times new roman,times,serif\">список пункт 1</span></big></li>\r\n	<li style=\"font-style: italic;\"><big><span style=\"font-family:times new roman,times,serif\">список пункт 2</span></big></li>\r\n</ul>\r\n\r\n<ol>\r\n	<li style=\"font-style: italic;\"><big><span style=\"font-family:times new roman,times,serif\">нумерованый список</span></big></li>\r\n	<li style=\"font-style: italic;\"><big><span style=\"font-family:times new roman,times,serif\">нумерованый список 2</span></big></li>\r\n</ol>\r\n', 'Арматура СИП.jpg', 2500, NULL, NULL),
(14, 'Тестовый продукт', 'Описание тестового продукта', 'Hydrangeas.jpg', 2500, 'Краткое описание', 1),
(15, 'Тестовый продукт 2', 'Полное описание тестового продукта', 'Koala.jpg', 4500, 'Краткое описание тестового продукта', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL COMMENT 'Логин',
  `email` varchar(24) NOT NULL COMMENT 'email',
  `password` char(60) NOT NULL COMMENT 'Пароль',
  `auth_key` char(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `auth_key`) VALUES
(5, 'user1', 'user1@mail.com', '$2y$13$pbIcyyAtAJxUw9cBWf3w5.MMIqkmRiL751kHrsGeVEnb7.Ifvp2x2', '33KEyMVsbt3LOTVpidMQpNafi69a2dDs'),
(4, 'user3', 'user3@mail.com', '$2y$13$42rfKm/BdjnY6NN4mjFAL.IyF3CcuPSVF.yDKnCPeu0PvFigLe6mS', 'l1AHb_xRGOr33E9bd1OZjQpMYiIdRA-M'),
(6, 'user2', 'user2@mail.com', '$2y$13$OmfLgkhgxlZ8FZRjhnfzdOR9KbN4jwVw7TY5UU.7vJ39.rAtaurpa', 'f_qZeiibnPicGaqv9y4WbhkSNOFq5MXk'),
(7, 'user4', 'user4@mail.com', '$2y$13$YRMiLKRr5Vvu72YX4S5FweQPjTl9SSobQ9B667jwK35JTPuHRhBbW', 'nX4lKAZ4hTC40j0-igKA5lhaFMmg-w-a');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
