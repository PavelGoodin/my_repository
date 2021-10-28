-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 26 2021 г., 18:25
-- Версия сервера: 10.4.21-MariaDB
-- Версия PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `equipment_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `db_eq`
--

CREATE TABLE `db_eq` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_type` int(10) UNSIGNED NOT NULL,
  `Serial_num` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `db_eq`
--

INSERT INTO `db_eq` (`id`, `id_type`, `Serial_num`) VALUES
(1, 1, '09AAAAA5AA'),
(2, 1, '55DDDDF8BB'),
(3, 1, 'U8AAAAA7AA'),
(4, 3, '5XXAA6_001'),
(5, 1, '77PPPPP7AA'),
(6, 1, '99SSSSS9BB'),
(7, 2, '544444444454'),
(8, 1, '55AAAAA5AA'),
(9, 1, 'UUAAAAA2UU'),
(10, 1, 'jhjggjgj'),
(11, 1, 'kbkjgkgg'),
(12, 1, 'kjhjghjg'),
(13, 1, '44SSSAA4AA'),
(14, 1, 'TTAAAAATAA'),
(15, 2, '0XXAAX@Xbb'),
(16, 2, '5XXAAX_Vff'),
(17, 2, '8XXAA4@Xss'),
(18, 2, '1DDOOD-Xff'),
(19, 2, '2XXAAX_Xww'),
(20, 2, '7XXEEX_Xtt'),
(21, 3, '500AA0-000'),
(22, 3, '800AA0-001'),
(23, 3, '900AA0-002');

-- --------------------------------------------------------

--
-- Структура таблицы `type_eq`
--

CREATE TABLE `type_eq` (
  `id` int(10) UNSIGNED NOT NULL,
  `Тип оборудования` varchar(100) NOT NULL,
  `Маска SN` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `type_eq`
--

INSERT INTO `type_eq` (`id`, `Тип оборудования`, `Маска SN`) VALUES
(1, 'TP-Link TL-WR74', 'XXAAAAAXAA'),
(2, 'D-Link DIR-300', 'NXXAAXZXaa'),
(3, 'D-Link DIR-300 S', 'NXXAAXZXXX');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `db_eq`
--
ALTER TABLE `db_eq`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Serial_num` (`Serial_num`) USING HASH,
  ADD KEY `id_type` (`id_type`);

--
-- Индексы таблицы `type_eq`
--
ALTER TABLE `type_eq`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `db_eq`
--
ALTER TABLE `db_eq`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
