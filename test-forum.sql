-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 28 2018 г., 09:44
-- Версия сервера: 5.6.38
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test-forum`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `thread_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `body`, `user_id`, `thread_id`, `created_at`, `updated_at`) VALUES
(1, 'Первый пробный комментарий', 2, 1, '2018-03-26 08:30:17', '2018-03-26 08:30:17'),
(2, 'Второй пробный комментарий!', 1, 1, '2018-03-26 08:30:47', '2018-03-26 08:30:47'),
(3, 'Третий пробный комментарий!!!', 2, 1, '2018-03-26 08:31:13', '2018-03-26 08:31:13'),
(4, 'Слишком умно, гав!', 2, 3, '2018-03-26 08:31:51', '2018-03-26 08:31:51'),
(5, 'Что вы тут понаписали?', 3, 1, '2018-03-26 08:32:31', '2018-03-26 08:32:31'),
(7, 'Пробный комментарий уведомления', 1, 3, '2018-03-26 09:21:11', '2018-03-26 09:21:11'),
(8, 'Пробный комментарий уведомления. Второй!', 1, 1, '2018-03-26 09:21:56', '2018-03-26 09:21:56'),
(9, 'Пробный комментарий уведомления, третий!', 1, 1, '2018-03-26 09:23:13', '2018-03-26 09:23:13'),
(10, 'Пробный комментарий уведомления, четвертый', 1, 1, '2018-03-26 14:02:08', '2018-03-26 14:02:08');

-- --------------------------------------------------------

--
-- Структура таблицы `comment_user`
--

CREATE TABLE `comment_user` (
  `comment_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comment_user`
--

INSERT INTO `comment_user` (`comment_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(1, 3, NULL, NULL),
(2, 3, NULL, NULL),
(4, 1, NULL, NULL),
(5, 1, NULL, NULL),
(10, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_03_24_115426_create_threads_table', 2),
(5, '2018_03_24_142631_add_foreign_to_threads', 4),
(9, '2018_03_24_115439_create_comments_table', 8),
(10, '2018_03_24_143115_add_foreign_to_comments', 9),
(13, '2018_03_24_143337_create_comment_user_table', 10),
(14, '2018_03_24_143550_create_thread_user_table', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('alu.progr@yandex.ru', '$2y$10$D9gKxWgcJ8Kcule4Gp2Au.0yJGeDIV1U0HLmVEV4TFn1Le2s7yKu.', '2018-03-25 05:37:05');

-- --------------------------------------------------------

--
-- Структура таблицы `threads`
--

CREATE TABLE `threads` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `threads`
--

INSERT INTO `threads` (`id`, `title`, `body`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Первая тема', 'Много умного, и не очень, текста от кота.', 1, '2018-03-24 12:40:57', '2018-03-24 12:40:57'),
(3, 'Мечтают ли андроиды об электроовцах?', 'Действие романа происходит в 1992 году (в более поздних редакциях — в 2021), через несколько лет после того, как Завершающая мировая война опустошила значительную часть Земли. После войны ООН стала активно пропагандировать эмиграцию во внеземные колонии, чтобы защитить человечество от пагубных эффектов радиоактивной пыли. В качестве дополнительного стимула каждому эмигранту в качестве работника-слуги предоставлялся бесплатный андроид (уничижительно называемый а́нди) любой марки, на выбор.', 3, '2018-03-25 11:54:56', '2018-03-25 12:19:33'),
(4, 'Педигри - ужасный корм!', 'Описание того, что собачье еда - Великолепна', 2, '2018-03-25 12:21:24', '2018-03-25 12:21:54');

-- --------------------------------------------------------

--
-- Структура таблицы `thread_user`
--

CREATE TABLE `thread_user` (
  `thread_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `thread_user`
--

INSERT INTO `thread_user` (`thread_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL),
(1, 3, NULL, NULL),
(3, 1, NULL, NULL),
(3, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Cat', 'cat@yandex.ru', '$2y$10$gFv5njzqnKP5WBsyOOZrJ.wigaMGcScrSJyfzDY2QqCvaXCDx3S3a', '/img/avatars/1522083462_kot.gif', '9NPXeFMW5IuwDqW04ahIJXuM7xup2LnlEnJeElE4KyLK5Ii5d9vU3M29BdbR', '2018-03-24 12:24:15', '2018-03-26 13:57:42'),
(2, 'Dog', 'dog@yandex.ru', '$2y$10$hEZ0YMhBkix.N88iakTc0esaH8vC9P5DP9sT2TJYHweP74/6L8vF6', '/img/avatars/1522083638_001.gif', 'dnqXgYfvfisG7Ioid9ctqK6IzL4eJZO0vkNsPwpb8Myp7X5BBBhpwq5tU7fW', '2018-03-24 12:48:43', '2018-03-27 14:21:48'),
(3, 'Vegas', 'alu.progr@yandex.ru', '$2y$10$LXCVQrEZwkrFKm6OYZbmn.6LFTvt2LL/ob5VzzDvEjQQIRQVf1k/G', '/img/avatars/1522083300_044.jpg', 'c9bcwdeOOgCAvIKJsgnWhH1RMwIbsReCMeeExK0VYwJ4NyRLg2n4iIZnXjCv', '2018-03-25 05:15:26', '2018-03-26 13:55:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_thread_id_foreign` (`thread_id`);

--
-- Индексы таблицы `comment_user`
--
ALTER TABLE `comment_user`
  ADD UNIQUE KEY `comment_user_comment_id_user_id_unique` (`comment_id`,`user_id`),
  ADD KEY `comment_user_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `threads_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `thread_user`
--
ALTER TABLE `thread_user`
  ADD UNIQUE KEY `thread_user_thread_id_user_id_unique` (`thread_id`,`user_id`),
  ADD KEY `thread_user_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `threads`
--
ALTER TABLE `threads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_thread_id_foreign` FOREIGN KEY (`thread_id`) REFERENCES `threads` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `comment_user`
--
ALTER TABLE `comment_user`
  ADD CONSTRAINT `comment_user_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `threads`
--
ALTER TABLE `threads`
  ADD CONSTRAINT `threads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `thread_user`
--
ALTER TABLE `thread_user`
  ADD CONSTRAINT `thread_user_thread_id_foreign` FOREIGN KEY (`thread_id`) REFERENCES `threads` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `thread_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
