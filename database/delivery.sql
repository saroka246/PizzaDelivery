-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 29 2023 г., 02:07
-- Версия сервера: 10.4.18-MariaDB
-- Версия PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `delivery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `category_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `category_name`) VALUES
(1, 0, 'Сыр Моцарелла'),
(2, 0, 'Пепперони'),
(4, 0, 'Курица'),
(3, 0, 'Чесночный Соус'),
(5, 0, 'Томаты'),
(6, 0, 'Томатный Соус'),
(7, 0, 'Соус Терияки'),
(8, 0, 'Грибы'),
(9, 0, 'Охотничьи колбаски'),
(10, 0, 'Ветчина'),
(11, 0, 'Ананас'),
(12, 0, 'Бекон');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `number` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL,
  `details` text NOT NULL,
  `price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`number`, `name`, `phone`, `address`, `details`, `price`) VALUES
(2, 'Александр Киселёв', '+7(999) 999-9999', 'Сахарова 38', '1) Чикен Терияки 1 шт; 2) Чикен 1 шт; ', '868'),
(3, 'Александр Киселёв', '+7(999) 999-9999', 'Казань', '1) Чикен Терияки 2 шт; 2) Чикен 1 шт; ', '1307'),
(4, 'gfdgfdg', '+7(999) 999-9999', 'gfgfdfgd', '1) Чикен Терияки 1 шт; 2) Чикен 2 шт; ', '1297'),
(5, 'Александр Киселёв', '+7(999) 999-9999', 'Сахарова 38', '1) Пепперони 3 шт; 2) Пепперони по-деревенски 3 шт; ', '2154'),
(6, 'Александр Киселёв', '+7(999) 999-9999', 'Сахарова 38', '1) Пепперони 2 шт; 2) Чикен 3 шт; 3) Чикен Терияки 2 шт; 4) Жюльен 4 шт; ', '5019'),
(7, 'Александр Киселёв', '+7(999) 999-9999', 'Сахарова 38', '1) Чикен 1 шт; 2) Чикен Терияки 1 шт; ', '868'),
(8, 'new', '+7(999) 999-9999', 'fdsfdsfds', '1) Чикен 1 шт; 2) Пепперони 1 шт; ', '858'),
(9, 'Кристина', '+7(999) 999-9999', 'прварпванвапг', '1) Карбонара 1 шт; 2) Ветчина и грибы 1 шт; ', '998'),
(10, 'fdfg', 'dfggfd', 'fdgfdfg', '1) Чикен Терияки 1 шт; 2) Чикен 1 шт; 3) Пепперони 1 шт; ', '1297');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `image`) VALUES
(1, 'Пепперони', '429.00', 'http://localhost/delivery/img/card1.png'),
(2, 'Чикен', '429.00', 'http://localhost/delivery/img/card2.png'),
(3, 'Чикен Терияки', '439.00', 'http://localhost/delivery/img/card3.png'),
(4, 'Жюльен', '499.00', 'http://localhost/delivery/img/card4.png'),
(5, 'Сырная с ветчиной', '289.00', 'http://localhost/delivery/img/card5.png'),
(6, 'Пепперони по-деревенски', '289.00', 'http://localhost/delivery/img/card6.png'),
(7, 'Маргарита', '359.00', 'http://localhost/delivery/img/card7.png'),
(8, 'Гавайская', '359.00', 'http://localhost/delivery/img/card8.png'),
(9, 'Ветчина и грибы', '499.00', 'http://localhost/delivery/img/card9.png'),
(10, 'Мясная', '709.00', 'http://localhost/delivery/img/card11.png'),
(11, 'Карбонара', '499.00', 'http://localhost/delivery/img/card10.png'),
(12, 'Дабл Пепперони', '569.00', 'http://localhost/delivery/img/card12.png');

-- --------------------------------------------------------

--
-- Структура таблицы `product_cat`
--

CREATE TABLE `product_cat` (
  `number` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `product_cat`
--

INSERT INTO `product_cat` (`number`, `product_id`, `category_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 6),
(4, 2, 4),
(5, 2, 1),
(6, 2, 5),
(7, 2, 3),
(8, 3, 4),
(9, 3, 1),
(10, 3, 6),
(11, 3, 7),
(12, 4, 8),
(13, 4, 4),
(14, 4, 1),
(15, 4, 3),
(16, 5, 10),
(17, 5, 1),
(18, 5, 6),
(19, 6, 9),
(20, 6, 2),
(21, 6, 1),
(22, 6, 6),
(23, 7, 1),
(24, 7, 5),
(25, 7, 6),
(26, 8, 11),
(27, 8, 10),
(28, 8, 1),
(29, 8, 6),
(30, 9, 10),
(31, 9, 8),
(32, 9, 1),
(33, 9, 6),
(34, 10, 10),
(35, 10, 4),
(36, 10, 9),
(37, 10, 1),
(38, 10, 6),
(39, 11, 12),
(40, 11, 5),
(41, 11, 3),
(42, 11, 1),
(43, 12, 1),
(44, 12, 2),
(45, 12, 6);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`number`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
