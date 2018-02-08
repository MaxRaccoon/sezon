-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Фев 08 2018 г., 12:20
-- Версия сервера: 10.2.12-MariaDB-10.2.12+maria~artful
-- Версия PHP: 7.1.11-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sezon`
--

-- --------------------------------------------------------

--
-- Структура таблицы `acl_groups`
--

CREATE TABLE `acl_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `acl_groups`
--

INSERT INTO `acl_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Banned', NULL, NULL),
(2, 'Guests', NULL, NULL),
(3, 'Users', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `acl_group_permissions`
--

CREATE TABLE `acl_group_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `actions` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `acl_group_roles`
--

CREATE TABLE `acl_group_roles` (
  `group_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `acl_group_roles`
--

INSERT INTO `acl_group_roles` (`group_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(2, 2, NULL, NULL),
(3, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `acl_permissions`
--

CREATE TABLE `acl_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `area` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `acl_roles`
--

CREATE TABLE `acl_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filter` enum('','A','D','R') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `acl_roles`
--

INSERT INTO `acl_roles` (`id`, `name`, `filter`, `created_at`, `updated_at`) VALUES
(1, 'banned', 'D', NULL, NULL),
(2, 'public', '', NULL, NULL),
(3, 'user', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `acl_role_permissions`
--

CREATE TABLE `acl_role_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `actions` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `acl_users`
--

CREATE TABLE `acl_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `acl_users`
--

INSERT INTO `acl_users` (`id`, `login`, `password`, `group_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'guest', 'NO PASSWORD', '2', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `acl_user_permissions`
--

CREATE TABLE `acl_user_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `actions` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `acl_user_roles`
--

CREATE TABLE `acl_user_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `group_name` varchar(100) NOT NULL DEFAULT '1',
  `image_link` varchar(500) NOT NULL,
  `image_thumb_link` varchar(500) DEFAULT NULL,
  `title` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `group_name`, `image_link`, `image_thumb_link`, `title`, `description`, `created_at`, `updated_at`) VALUES
(3, 'first', '/storage/upload/5a77240c42857/_MG_1125.jpg', '/storage/upload/5a77240c42857/thumb__MG_1125.jpg', NULL, NULL, '2018-02-04 15:17:44', '2018-02-04 15:17:44'),
(4, 'first', '/storage/upload/5a77241dcfe91/_MG_1209.jpg', '/storage/upload/5a77241dcfe91/thumb__MG_1209.jpg', NULL, NULL, '2018-02-04 15:17:50', '2018-02-04 15:17:50'),
(7, 'first', '/storage/upload/5a77244a8f428/_MG_1202.jpg', '/storage/upload/5a77244a8f428/thumb__MG_1202.jpg', NULL, NULL, '2018-02-04 15:18:35', '2018-02-04 15:18:35'),
(9, 'first', '/storage/upload/5a772450ec96e/_MG_1199.jpg', '/storage/upload/5a772450ec96e/thumb__MG_1199.jpg', NULL, NULL, '2018-02-04 15:18:50', '2018-02-04 15:18:50'),
(10, 'first', '/storage/upload/5a7724631dfe2/_MG_1196.jpg', '/storage/upload/5a7724631dfe2/thumb__MG_1196.jpg', NULL, NULL, '2018-02-04 15:19:01', '2018-02-04 15:19:01'),
(11, 'first', '/storage/upload/5a77248140fde/_MG_1194.jpg', '/storage/upload/5a77248140fde/thumb__MG_1194.jpg', NULL, NULL, '2018-02-04 15:19:31', '2018-02-04 15:19:31'),
(12, 'first', '/storage/upload/5a7724910992c/_MG_1193.jpg', '/storage/upload/5a7724910992c/thumb__MG_1193.jpg', NULL, NULL, '2018-02-04 15:19:47', '2018-02-04 15:19:47'),
(13, 'first', '/storage/upload/5a77249996bbd/_MG_1125.jpg', '/storage/upload/5a77249996bbd/thumb__MG_1125.jpg', NULL, NULL, '2018-02-04 15:19:56', '2018-02-04 15:19:56'),
(15, 'first', '/storage/upload/5a7724ba2144b/_MG_1122.jpg', '/storage/upload/5a7724ba2144b/thumb__MG_1122.jpg', NULL, NULL, '2018-02-04 15:20:28', '2018-02-04 15:20:28'),
(16, 'first', '/storage/upload/5a7724c574d6c/_MG_1117.jpg', '/storage/upload/5a7724c574d6c/thumb__MG_1117.jpg', NULL, NULL, '2018-02-04 15:20:40', '2018-02-04 15:20:40'),
(17, 'first', '/storage/upload/5a7724cfd5a99/_MG_1112.jpg', '/storage/upload/5a7724cfd5a99/thumb__MG_1112.jpg', NULL, NULL, '2018-02-04 15:20:50', '2018-02-04 15:20:50'),
(18, 'first', '/storage/upload/5a7724d934604/_MG_1111.jpg', '/storage/upload/5a7724d934604/thumb__MG_1111.jpg', NULL, NULL, '2018-02-04 15:20:59', '2018-02-04 15:20:59'),
(19, 'first', '/storage/upload/5a7724e1dd005/_MG_1109.jpg', '/storage/upload/5a7724e1dd005/thumb__MG_1109.jpg', NULL, NULL, '2018-02-04 15:21:09', '2018-02-04 15:21:09'),
(20, 'first', '/storage/upload/5a7724ec006a3/_MG_1106.jpg', '/storage/upload/5a7724ec006a3/thumb__MG_1106.jpg', NULL, NULL, '2018-02-04 15:21:18', '2018-02-04 15:21:18'),
(21, 'first', '/storage/upload/5a7724f61d182/_MG_1103.jpg', '/storage/upload/5a7724f61d182/thumb__MG_1103.jpg', NULL, NULL, '2018-02-04 15:21:29', '2018-02-04 15:21:29'),
(23, 'first', '/storage/upload/5a772510e985a/_MG_1098.jpg', '/storage/upload/5a772510e985a/thumb__MG_1098.jpg', NULL, NULL, '2018-02-04 15:21:54', '2018-02-04 15:21:54'),
(24, 'first', '/storage/upload/5a77251a49f30/_MG_1081.jpg', '/storage/upload/5a77251a49f30/thumb__MG_1081.jpg', NULL, NULL, '2018-02-04 15:22:05', '2018-02-04 15:22:05'),
(25, 'first', '/storage/upload/5a77252085852/_MG_1078.jpg', '/storage/upload/5a77252085852/thumb__MG_1078.jpg', NULL, NULL, '2018-02-04 15:22:11', '2018-02-04 15:22:11'),
(27, 'first', '/storage/upload/5a77252e29152/_MG_1074.jpg', '/storage/upload/5a77252e29152/thumb__MG_1074.jpg', NULL, NULL, '2018-02-04 15:22:23', '2018-02-04 15:22:23'),
(28, 'first', '/storage/upload/5a772532d22b7/_MG_1073.jpg', '/storage/upload/5a772532d22b7/thumb__MG_1073.jpg', NULL, NULL, '2018-02-04 15:22:28', '2018-02-04 15:22:28');

-- --------------------------------------------------------

--
-- Структура таблицы `landing_data`
--

CREATE TABLE `landing_data` (
  `id` int(10) NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 NOT NULL,
  `key_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `key_value` text CHARACTER SET utf8 NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `landing_data`
--

INSERT INTO `landing_data` (`id`, `description`, `key_name`, `key_value`, `created_at`, `updated_at`) VALUES
(1, 'Браузерный заголовок старницы', 'MetaPageTitle', '<span>Спорт-клуб &#34;Сезон&#34;<span><br/></span></span>', '2017-10-01 09:31:31', '2018-01-16 05:46:07'),
(2, 'Мата описание страницы', 'MetaDescrition', '<span><span>Спортивнный клуб &#34;Сезон&#34;. <br/></span></span>', '2017-10-01 09:47:32', '2018-01-16 05:46:53'),
(3, 'Мата ключи', 'MetaKeywords', '<span><span>Сезон, Спорт-клуб, фитнес, тренер, ТЦ<br/></span></span>', '2017-10-01 09:49:13', '2018-01-16 05:47:35'),
(4, 'Главный заголовок', 'H1', '<p>СПОРТИВНЫЙ КЛУБ &#34;СЕЗОН&#34; - ВЫБЕРИ СВОЮ ПРОГРАММУ ТРЕНИРОВОК</p>', '2017-10-01 09:49:50', '2018-01-16 05:47:59'),
(11, 'Карта - широта', 'MapLatitude', '<p>52.286477</p>', '2017-10-01 09:58:56', '2018-01-16 05:58:27'),
(12, 'Карта - долгота', 'MapLongitude', '<p>104.288107</p>', '2017-10-01 09:59:08', '2018-01-16 05:58:42'),
(13, 'Заловок метки на карте', 'MapTitle', '<p>Спортивный клуб &#34;Сезон&#34;</p>', '2017-10-01 09:59:42', '2018-01-16 05:58:58'),
(14, 'Текст метки на карте', 'MapDescription', '<p>г.Иркутск, ул. Свердлова, 36, ТЦ «Сезон», 3 этаж</p>', '2017-10-01 10:00:04', '2018-01-16 05:59:15'),
(15, 'Заголовок из описания клуба', 'AboutTitle', '<p>Спортивный клуб «Сезон»</p>', '2018-01-21 09:20:56', '2018-01-21 09:21:07'),
(16, 'Описания клуба', 'AboutDescription', '<span> Спортивный клуб «Сезон» - новый спортклуб, великолепно расположенный в одноименном торговом центре, на пересечении самых проходимых улиц Иркутска. Подарок для иркутян, особенно для тех, чьи рабочие места расположены в радиусе 700 – 1000 метров. Счастливы и те жители Иркутска, кто живет в центре. Более того, режим работы предполагает возможность посещения клуба в течение дня, в обеденный перерыв, до начала рабочего дня и в вечернее время и тем, кто просто решил провести свой досуг в центральной части города. Клуб начал свою работу 12 сентября 2016 года неслучайно, ведь именно в сентябре начинается новый спортивный сезон у спортсменов – планомерный, трудоемкий, многообещающий и, конечно, победоносный.<br/><br/>----<br/><br/>Для этого мы постарались создать хорошую материально-техническую базу. Оборудование, которое мы представляем – тренажеры российского производителя, компании V-Sport, бренд, прекрасно зарекомендовавший себя на российском рынке. Профессиональная линия силовых тренажеров Х-Line, выполнена из качественных материалов, имеет хороший функционал, прочность, правильные углы и плавность хода.<br/><br/>Мы учли повышенный спрос на жимовые скамьи, стойки для приседаний и становых тяг, и выставили и укрепили комплекс из силовых рам, в котором несколько человек могут выполнять одинаковые упражнения одновременно. Такая кроссфит станция обеспечивает разнообразие упражнений не только с весами, но и в собственно-силовых форматах тренинга. Расширены границы упражнений в вертикальной плоскости и под углом, висы, подтягивания, передвижения на рукоходах, и, если хотите, гимнастические упражнения.<br/><br/>Мы взяли лучшие позиции грузоблочных тренажеров, для более удобного использования отказались от комбинированных тренажеров. Представили хороший гантельный ряд, зону свободных весов, профессионалы оценили Т-образную тягу с упором на грудь и рычажную тягу. Тренажер для разгибаний туловища, гиперэкстензию наклонную и горизонтальную, а также обратную гиперэкстензию, для укрепления пояснично-крестцового отдела позвоночника, мышц ягодиц, ног.<br/><br/>Кардиозона представлена оборудованием SportArtFitness: беговые дорожки, эллипсы, велоэргометры, сочетает в себе баланс прочности, простоты и доступности. Добавляя интерьеру нашего зала, выполненного в стиле Loft, мужской одухотворенности и элегантности одновременно. Никого не оставляет равнодушным расположение хореографического станка в зоне растяжки. Для любителей мягкого фитнеса – малое оборудование, блоки для йоги.<br/><br/>Наша гордость – ваш результат, команда профессиональных тренеров, за плечами – их опыт, знания, сила. И уникальные авторские фитнес программы, системы профессиональных тренировок, собственный соревновательный стаж. <span><br/></span></span>', '2018-01-21 10:15:24', '2018-01-21 10:15:24'),
(17, 'Адрес', 'ContactAddress', '<p>Иркутск, ул. Свердлова, 36, ТЦ «Сезон», 3 этаж</p>', '2018-02-04 15:39:51', '2018-02-04 15:41:36'),
(18, 'Телефон', 'ContactPhone', '<p>73-50-00</p>', '2018-02-04 15:40:25', '2018-02-04 15:42:04'),
(19, 'Заголовок оплата', 'PaymentH1', '<p>Гибкая система оплаты</p>', '2018-02-05 10:37:46', '2018-02-05 10:37:46'),
(20, 'Текст оплата', 'PaymentText', '<span><span>Стоимость разового посещения от 200 рублей, абонементы от 1 400 рублей.<br/>Подробную информацию о ценах и акциях вы можете узнать по телефону<br/></span></span>', '2018-02-05 10:38:55', '2018-02-05 10:38:55'),
(21, 'Оплата телефон', 'PaymentPhone', '<p>+7 (3952) 73-50-00</p>', '2018-02-05 10:39:30', '2018-02-05 10:39:30');

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(10) NOT NULL,
  `url` varchar(500) CHARACTER SET utf8 NOT NULL,
  `title` varchar(500) CHARACTER SET utf8 NOT NULL,
  `position` int(10) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `url`, `title`, `position`, `created_at`, `updated_at`) VALUES
(1, '#about-us', 'О нас', 1, '2018-02-04 15:29:35', '2018-02-04 15:29:35'),
(2, '#programs', 'Программы и рассписание', 1, '2018-02-04 15:29:54', '2018-02-04 15:29:54'),
(3, '#pricing', 'Система оплаты', 1, '2018-02-04 15:30:22', '2018-02-04 15:30:22'),
(4, '#trainers', 'Тренерский состав', 1, '2018-02-04 15:30:37', '2018-02-04 15:30:37'),
(5, '#contact', 'Контакты', 1, '2018-02-04 15:30:51', '2018-02-04 15:30:51'),
(6, '#contact', 'Новости и акции', 1, '2018-02-04 15:31:06', '2018-02-04 15:31:06');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_06_29_121826_acl_groups', 1),
(2, '2014_06_29_121910_acl_group_permissions', 1),
(3, '2014_06_29_121922_acl_group_roles', 1),
(4, '2014_06_29_121934_acl_permissions', 1),
(5, '2014_06_29_121944_acl_roles', 1),
(6, '2014_06_29_121955_acl_role_permissions', 1),
(7, '2014_06_29_122005_acl_user_permissions', 1),
(8, '2014_06_29_122014_acl_user_roles', 1),
(9, '2014_06_29_122019_acl_users', 1),
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `image` varchar(500) CHARACTER SET utf8 NOT NULL,
  `image_thumb` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `title` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `image`, `image_thumb`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, '/storage/upload/59fbdb5214725/pribor1.png', '/storage/upload/59fbdb5214725/thumb_pribor1.png', 'GMATE', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', '2017-10-01 16:18:55', '2017-11-03 02:58:27'),
(2, '/storage/upload/59d115796e5d8/222222444.png', '/storage/upload/59d115796e5d8/thumb_222222444.png', 'GMATE2', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', '2017-10-01 16:19:08', '2017-10-01 16:19:08');

-- --------------------------------------------------------

--
-- Структура таблицы `program`
--

CREATE TABLE `program` (
  `id` int(10) NOT NULL,
  `trainer_id` int(10) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text DEFAULT NULL,
  `duration` int(5) NOT NULL DEFAULT 55,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `program`
--

INSERT INTO `program` (`id`, `trainer_id`, `title`, `description`, `duration`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 1, 'Базовый курс 1-3 уровень', '<h4>Базовый курс (1 уровень) <br/></h4><span><span><br/></span></span><p>Программа по обучению технике базовых        упражнений - тренажеры, собственно-силовые        упражнения, свободные веса, освоение         элементов растяжки. Определение уровня        кардио и силовой нагрузки. Формирование         навыков двигательной деятельности        и правильного питания в режиме времени        рабочего и выходного дня. (8-12 тренировочных        занятий/мес. Без ограничений по возрасту,        полу) По показаниям врача, курс возможен        как реабилитационный, на уровне лечебной        гимнастики после травм, заболеваний        позвоночника. Последовательный переход        на 2 и 3 уровень программы.</p><span><span><br/></span></span><h4>Базовыйкурс (2-3 уровень)</h4><span><span><br/></span></span><p>Общеразвивающая программа тренировок,решение конкретных индивидуальныхзадач, как правило, нормализация веса,формирование мышечного корсета,профилактика и лечебно-оздоровительноевоздействие на опорно-двигательныйаппарат (ОДА), целевое назначение –работа с проблемными зонами. (8-12тренировочных занятий/мес. Без ограниченийпо возрасту, полу, реабилитационноенаправление)</p>', 55, '2018-01-29 11:53:06', '2018-02-05 10:50:04', 0),
(2, 1, 'Растяжка', '<h4>Программа  по развитию гибкости  «Растяжка».</h4><span><span><br/></span></span><p>Растягивание позвоночника, мышцы, связки, улучшение подвижности суставов. Суставная гимнастика. Программа показана всем, профилактика заболеваний опорно-двигательного аппарата, сколиоз, остеохондроз, артриты, артрозы, восстановление подвижности после травм. Укрепление мышечного корсета. (8-12 тренировочных занятий/мес) Регулярно.  Оптимально совмещение с  кардио-силовым сегментом. <b>Вы молоды пока вы гибки!</b></p>', 55, '2018-02-05 10:56:50', '2018-02-05 10:56:50', 0),
(3, 1, 'ОФПэшка', '<p>Программа   формирования Общей физической подготовки. Сила, выносливость, быстрота, гибкость, координация.  Школьники, студенты, и все желающие. Начальная подготовка спортсменов, спортсмены учебно-тренировочных и групп спортивного совершенствования независимо от вида спорта. Подготовка к горнолыжному сезону, к туристическим пешим походам, в т.ч. альпинизму.  Основная специализация – спортивная гимнастика. Стоечная подготовка, растяжка, акробатика. Продолжительность зависит от целей программы. <b>Все новое – хорошо не забытое старое!</b></p>', 55, '2018-02-05 15:02:06', '2018-02-05 15:02:06', 0),
(4, 1, 'Cупермамы', '<p>Беременность  не повод присесть дома, а повод преуспеть  в сохранении  физической формы и вам и вашему малышу.  Тренерский опыт позволяет  утверждать, до и после родов – возможности  поддержания здоровья  имеются.  Эта программа позволяет не только вернуть физическую форму, но и преуспеть в дальнейшем ее усовершенствовании.  Схема программы. Базовый курс до, во время либо после родов с последующим переходом в вашу персональную программу для вас и вашего малыша.  <b>Мягкий фитнес, «жесткие  тренировки»!</b></p>', 55, '2018-02-05 15:03:19', '2018-02-05 15:03:29', 0),
(5, 1, 'Age Fitness 45+', '<p>Лечебно-оздоровительная гимнастика  для мужчин и женщин  среднего и старшего возраста.  Полный комплекс  упражнений для поддержания здоровья, профилактика сердечно-сосудистых  заболеваний, опорно-двигательного аппарата, реабилитационное направление при заболеваниях суставов, позвоночника, укрепление мышечного корсета, улучшение подвижности суставов, эластичности связочного аппарата. Имеются противопоказания, необходима консультация специалиста. <b>Возраст движению не помеха!</b></p>', 55, '2018-02-05 15:05:15', '2018-02-05 15:05:15', 0),
(6, 1, 'Семерка', '<p>Эффективное средство борьбы с « гусеничкой». Снижение жирового коэффициента, объемов таллии, бедер. В системе -  кардио тренировка, питание и семь лучших  упражнений  проработки пресса, мышц туловища, пояснично-крестцового отдела позвоночника. Последовательность, техника, методика - сохраняют здоровым  позвоночник. Тренировка  и расслабление  глубоких скелетных мышц – дают отличный результат. Схема программы. Базовый курс 1,2 с последующим переходом в  программу. Продолжительность 3месяца в зависимости от уровня фитнес-класса.     <b>Талия-дело тонкое!</b></p>', 55, '2018-02-05 15:06:15', '2018-02-05 15:06:15', 0),
(7, 1, 'Волновая гимнастика', '<p>Программа  по системе целостного движения, методика психосоматической регуляции.  Выполнение упражнений  направлено на встраивание костно-мышечной системы в  структуру «силовую линию». Оздоровительное  направление. Опорно-двигательный аппарат, сердечно-сосудистая и дыхательная система, иммунитет. Восстановление после травм. Программа эффективно  сочетается с другими направлениями фитнеса. Программа широко используется  в подготовке спортсменов: пловцы, танцоры, инвалиды-колясочники в параолимпийских видах спорта . (8-12 тренировочных занятий/мес. Без ограничений по возрасту, полу, по показаниям врача)</p>', 55, '2018-02-05 15:06:45', '2018-02-05 15:06:45', 0),
(8, 1, 'Port de Bras', '<p>Mix  классической  хореографии (станок), партерной  гимнастики, лучшее из пилатес, последовательности из  йоги, йога-flex.  Результат - стройная фигура, гибкий стан, осанка, сильные мышцы, пластичность.  Гармонично сочетается с другими направлениями, расширяя возможности достижения конкретных задач. Начальный .продвинутый и уровень высшего спортивного мастерства. (8-12 тренировочных занятий/мес. Без ограничений по возрасту, полу, по показаниям врача)</p>', 55, '2018-02-05 15:07:49', '2018-02-05 15:07:49', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `program_photo`
--

CREATE TABLE `program_photo` (
  `id` int(10) NOT NULL,
  `program_id` int(10) NOT NULL,
  `photo_link` varchar(500) NOT NULL,
  `photo_thumb_link` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `program_photo`
--

INSERT INTO `program_photo` (`id`, `program_id`, `photo_link`, `photo_thumb_link`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 1, '/storage/upload/5a7721e595eb2/_MG_1174.jpg', '/storage/upload/5a7721e595eb2/thumb__MG_1174.jpg', '2018-02-04 15:08:25', '2018-02-04 15:08:25', 0),
(2, 1, '/storage/upload/5a77227366617/_MG_1474.jpg', '/storage/upload/5a77227366617/thumb__MG_1474.jpg', '2018-02-04 15:10:44', '2018-02-04 15:10:44', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `program_schedule`
--

CREATE TABLE `program_schedule` (
  `id` int(10) NOT NULL,
  `day_of_weak` int(1) NOT NULL DEFAULT 1,
  `program_id` int(10) NOT NULL,
  `start_time` varchar(5) NOT NULL DEFAULT '08:00',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `program_schedule`
--

INSERT INTO `program_schedule` (`id`, `day_of_weak`, `program_id`, `start_time`, `created_at`, `updated_at`) VALUES
(3, 1, 5, '10:00', '2018-02-06 05:24:35', '2018-02-06 05:24:35'),
(4, 3, 5, '10:00', '2018-02-06 05:27:41', '2018-02-06 05:27:41'),
(5, 5, 5, '10:00', '2018-02-06 05:27:45', '2018-02-06 05:27:45'),
(6, 1, 8, '17:00', '2018-02-07 03:29:45', '2018-02-07 03:29:45'),
(7, 3, 8, '17:00', '2018-02-07 03:29:50', '2018-02-07 03:29:50'),
(8, 5, 8, '17:00', '2018-02-07 03:29:53', '2018-02-07 03:29:53');

-- --------------------------------------------------------

--
-- Структура таблицы `request`
--

CREATE TABLE `request` (
  `id` int(10) NOT NULL,
  `name` varchar(500) CHARACTER SET utf8 NOT NULL,
  `dt_born` datetime DEFAULT NULL,
  `place_born` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `post_address` int(10) DEFAULT NULL,
  `phone` varchar(25) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `request`
--

INSERT INTO `request` (`id`, `name`, `dt_born`, `place_born`, `post_address`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Test test', '2002-10-20 17:00:00', 'Test', 315125, '+7(215)152-5251', 'enot.work@gmail.com', '2017-10-03 05:35:47', '2017-10-03 05:35:47'),
(2, 'Test test', '2002-10-20 17:00:00', 'Test', 315125, '+7(215)152-5251', 'enot.work@gmail.com', '2017-10-03 05:36:16', '2017-10-03 05:36:16'),
(3, 'Test test', '2002-10-20 17:00:00', 'Test', 315125, '+7(215)152-5251', 'enot.work@gmail.com', '2017-10-03 05:36:58', '2017-10-03 05:36:58'),
(4, 'Test test', '2002-10-20 17:00:00', 'Test', 315125, '+7(215)152-5251', 'enot.work@gmail.com', '2017-10-03 05:38:19', '2017-10-03 05:38:19');

-- --------------------------------------------------------

--
-- Структура таблицы `slider`
--

CREATE TABLE `slider` (
  `id` int(10) NOT NULL,
  `image` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `image_thumb` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `title` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `description` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `position` int(10) DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `slider`
--

INSERT INTO `slider` (`id`, `image`, `image_thumb`, `title`, `description`, `position`, `created_at`, `updated_at`) VALUES
(5, '/storage/upload/5a5e0a5e3b522/slide-00.jpg', '/storage/upload/5a5e0a5e3b522/thumb_slide-00.jpg', 'Быть сильным', 'Вы будете спортивны, подтянуты и здоровы!', 1, '2018-01-16 14:21:38', '2018-01-16 14:21:38'),
(6, '/storage/upload/5a5e1a0c6bb07/slide-01.jpg', '/storage/upload/5a5e1a0c6bb07/thumb_slide-01.jpg', 'Оздоровительные программы и фитнес-студии', 'включающие элементы гимнастики, хореографии, пилатеса, йоги, стрейчинга', 1, '2018-01-16 15:28:32', '2018-01-16 15:28:32'),
(7, '/storage/upload/5a5e1a29ca3aa/slide-02.jpg', '/storage/upload/5a5e1a29ca3aa/thumb_slide-02.jpg', 'Новое профессиональное спортивное оборудование', 'беговые дорожки, эллипсоиды, велотренажеры, кроссфит-станция и другое', 1, '2018-01-16 15:28:56', '2018-01-16 15:28:56');

-- --------------------------------------------------------

--
-- Структура таблицы `technology`
--

CREATE TABLE `technology` (
  `id` int(10) NOT NULL,
  `title` varchar(500) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `image` varchar(500) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `technology`
--

INSERT INTO `technology` (`id`, `title`, `description`, `created_at`, `updated_at`, `image`) VALUES
(1, 'Карбоновое напыление электродов', NULL, '2017-10-01 15:26:32', '2017-11-03 03:16:48', '/storage/upload/59fbdf9f406d3/thumb_1.png'),
(2, 'Фермент нового поколения GDH-FAD', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2017-10-01 15:27:18', '2017-11-03 03:17:32', '/storage/upload/59fbdfae3c3e4/thumb_2.png'),
(3, 'Глюкометры Gmate<sup><small>tm</small></sup> Smart и Gmate<sup><small>tm</small></sup> - On для смартфона', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-10-01 15:27:48', '2017-11-03 03:19:15', '/storage/upload/59fbdfd211166/thumb_3.png'),
(4, 'Универсальные тест-полоски Gmate<sup><small>tm</small></sup>', NULL, '2017-11-03 03:20:04', '2017-11-03 03:20:04', '/storage/upload/59fbe044d43df/thumb_4.png');

-- --------------------------------------------------------

--
-- Структура таблицы `top_link`
--

CREATE TABLE `top_link` (
  `id` int(10) NOT NULL,
  `image` varchar(250) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `link_title` varchar(100) NOT NULL,
  `link` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `top_link`
--

INSERT INTO `top_link` (`id`, `image`, `title`, `description`, `link_title`, `link`, `created_at`, `updated_at`) VALUES
(1, '/storage/upload/5a5f21048813f/program1.jpg', 'НОВОЕ ОБОРУДОВАНИЕ', 'Профессиональное спортивное оборудование: беговые дорожки, эллипсоиды, велотренажеры, кроссфит-станция и другое.', 'СМОТРЕТЬ ФОТО', '#gallery', '2018-01-17 10:10:20', '2018-01-17 10:11:36'),
(2, '/storage/upload/5a5f22771d030/sezon.jpg', 'ПРОГРАММЫ', 'Оздоровительные программы и фитнес-студии, включающие элементы гимнастики, хореографии, пилатеса, йоги, стрейчинга', 'ПОДРОБНЕЕ', '#programs', '2018-01-17 10:17:25', '2018-01-17 10:17:25'),
(3, '/storage/upload/5a5f22ea3148f/home-1-2-640x533.jpg', 'ЦЕНТР ГОРОДА', 'Удобное расположение в центре города. Мы находимся по адресу Иркутск, ул. Свердлова, 36, ТЦ «Сезон», 3 этаж.', 'НАШИ КОНТАКТЫ', '#contact', '2018-01-17 10:19:02', '2018-01-17 10:19:02');

-- --------------------------------------------------------

--
-- Структура таблицы `trainer`
--

CREATE TABLE `trainer` (
  `id` int(10) NOT NULL,
  `name` varchar(500) NOT NULL,
  `photo_link` varchar(500) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `trainer`
--

INSERT INTO `trainer` (`id`, `name`, `photo_link`, `description`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'Анна Красикова', '/storage/upload/5a6487712a8a8/_MG_1174_small.jpg', '<p>Мастер спорта России по спортивной гимнастике, управляющий спортклуба «Сезон», тренер высшей категории, судья международной категории по спортивной аэробике, инструктор групповых фитнес-программ, персональный тренер, адепт программы «Разумное тело», «Йога 23», «Система целостного движения».</p><span><br/></span><h4>Образование:</h4><ul style=\"font-size: 14px;text-align: left;\"><li>1991-1994 Высшее образование (диплом с отличием, Омский государственный институт ФК, 1987-1990 средне-специальное, диплом с отличием Иркутский техникум физической культуры)</li><li>Стаж работы в спорте и фитнес-индустрии 30 лет.</li></ul><h4>Опыт:</h4><ul style=\"font-size: 14px;text-align: left;\"><li>С 1988 г. Тренер ДЮСШ ГОРОНО г. Иркутска по спортивной гимнастике. Инструктор групповых оздоровительных программ Иркутского техникума физической культуры.</li><li>С 1994 г. Тренер комплексной школы Олимпийского резерва Комитета по ФК и спорту администрации Иркутской области по спортивной аэробике. Подготовка спортсменов начальной, спортивно-тренировочной подготовки и этапа спортивного совершенствования. Высшая категория. Воспитанники победители Первенства России, Чемпионата России, Первенства Мира 1996 г.</li><li>Тренер-хореограф спортсменов, программы которых стали победоносными на чемпионатах и кубках мира.</li><li>Швейцария, Франция, Чехия 1996-98 гг. – судья международной категории по спортивной аэробике, бреве (ФИЖ) Международной федерации гимнастики 1998. Судейство соревнований: В 1996 году, внедряя новые для России западные технологии спорта, параллельно спортивному направлению – введение оздоровительных направлений фитнес-аэробики. Преобразовав на базе ОВФД «Здоровья» группу здоровья в студию «Фитнес-класс «Анна», мы вместе 20 лет, на базе ИТФК, СК «Совершенство», фитнес-клуб Базис, Спортивная студия Т-Lakе, Студия Vita, Салон красоты и здоровья Империя М, СК МagicFitness, Сбербанк России, Клиника молекулярной диагностики. И новый спортивный клуб «Сезон».</li></ul><p></p>', 0, '2018-01-21 12:29:07', '2018-02-07 04:10:29'),
(2, 'Мария Юдина', '/storage/upload/5a64addf7d1fe/DSC_0305_small.jpg', '<ul style=\"font-size: 14px;\"><li><p>Сотовый телефон: 8-(902)-177-58-79</p></li><li><ul><li>Сертифицированный инструктор тренажёрного зала</li><li>Сертифицированный инструктор TRX (Германия)</li><li>Сертифицированный инструктор Original Cross Fit (Германия)</li><li>Категория: мастер-тренер</li><li>Образование: Иркутский Государственный Университет, специализация: спортивная психология</li><li>Второе образование ГЦОЛИФК специалист по адаптивной физической культуре. Реабилитация и восстановление после травм, операций, ожирение, избыточный вес.</li><li>Дополнительное образование: Иркутский областной центр ДЮТ гид-проводник спортивных туров 2006г.</li><li>КМС по спортивной гимнастике и акробатике</li><li>Вице-чемпионка в категории среди женщин по бодибилдингу на кубке Иркутской области 2002г.</li><li>Абсолютная победительница среди юниоров по бодибилдингу на кубке Иркутской области в г. Иркутске 2002г.</li><li>Абсолютная победительница в соревнованиях по ОФП 2002,2003г</li><li>Абсолютная чемпионка в соревнованиях по жиму штанги лёжа &#34;Кубок Победы&#34; 2016, 2017</li><li>Первое место личный зачёт ГТО 2016</li><li>Стаж занятий спортивной гимнастикой 7 лет, акробатикой 2 года</li><li>Стаж занятий бодибилдингом 12 лет</li><li>Стаж работы персональным тренером более 8 лет</li></ul></li></ul>', 0, '2018-01-21 15:12:59', '2018-01-21 15:12:59'),
(3, 'Сергей Семенов', '/storage/upload/5a64ae675bb6a/_MG_1161_small.jpg', '<ul style=\"font-size: 14px;\"><li>Телефон: 8-929-439-18-12</li><li>Образование: Высшее образование.</li><li><h2>Профессиональные данные:</h2></li><li>Высокая работоспособность, любознательность. Коммуникабельность, высокая степень обучаемости, инициативность, чувство юмора, легко находит контакт с людьми, восприимчив к критике со стороны, стремится к постоянному повышению уровня профессиональных знаний.</li><li><h2>Биография:</h2></li><li>Заниматься в тренажерном зале начал с 1985г. в клубе «Атланты» у Сизых Юрия Павловича (в то время клуб « Атланты» еще находился в помещении Профкома Иркутского Завода ЗЖБИ). После тренировался и непрофессионально тренировал спортсменов во многих залах и клубах : « Базис», тренажерный зал Иркутского Дворца спорта, «Fist», Европа. Большой опыт по работе с индивидуальными клиентами, составлению программ индивидуальных тренировок, консультация по индивидуальному и спортивному питанию, режиму клиентов тренажерного зала. С ноября 2013 года по июль 2015 года работал инструктором тренажерного зала в ТК «Весна». Там же проходил курс повышения квалификации по специальности инструктор тренажерного зала- индивидуальный инструктор: 24-27.05.2014 «1 .T.S. Russia. Школа инструкторов Варвары Медведевой». Среднее количество индивидуальных тренировок за последние шесть месяцев работы - 84 в месяц, среднее удержание индивидуальных клиентов – 80%, личный рекорд по индивидуальным тренировкам – 96 тренировок в месяц. Помимо занятий в тренажерном зале, с 1982- 1992 профессионально занимался баскетболом , с 1995 года карате – киокушинкай , в настоящее время занимается единоборствами в направлении «MixFight» ( «смешанные единоборства») .</li></ul>', 0, '2018-01-21 15:15:10', '2018-01-21 15:15:10'),
(4, 'Екатерина Соколова', '/storage/upload/5a64aeb19b23e/_MG_1579_small.jpg', '<ul style=\"font-size: 14px;\"><li><p>Сотовый телефон: 8-914-895-21-22</p></li><li><p>Высшее спортивное образование, специализация фитнес.</p></li><li><h2>Профессиональные навыки:</h2><ul><li>Составление тренировочных планов с учётом опыта, состояния здоровья, тренировочной цели занимающихся:<ul><li>укрепление мышц, поддерживающих правильную осанку : спины, брюшного пресса, ягодиц;</li><li>Укрепление мышц шеи и межлопаточной области;</li><li>Тренировки для снижения массы тела без потери силового потенциала;</li><li>Тренировки для улучшения выносливости;</li><li>Тренировки для развития или восстановления силы мышц;</li><li>Тренировки для омоложения организма, улучшения здоровья и внешнего вида;</li><li>Тренировки для восстановления ОДА после травм и операций;</li><li>Тренировки по ОФП для школьников (подготовка к сдаче офп по физкультуре)</li><li>Составление программ питания для жиросжигания;</li><li>Обучение безопасной технике силовых упражнений;</li></ul></li></ul></li><li><h2>Биография:</h2><ul><li>2016 г. – Победительница Открытого чемпионата Иркутской области по лёгкой атлетике среди ветеранов в беге на 400 м.</li><li>Рекордсменка Иркутской области по лёгкой атлетике среди ветеранов в беге на 400 м.</li><li>2 место в абсолютном зачёте на открытом чемпионате Иркутской области по лёгкой атлетике среди ветеранов в беге на 400 м.</li><li>2014г. Российский государственный университет физической культуры, спорта, молодёжи и туризма.</li><li>Победитель регионального молодежного турнира по традиционному каратэ в категории кумитэ среди девушек, призер областных соревнований в категории кумитэ среди девушек, неоднократный победитель и призер городских соревнований и клубных турниров по каратэ «Фудокан». Тренерский стаж 10 лет.</li></ul></li></ul>', 0, '2018-01-21 15:16:27', '2018-01-21 15:16:27'),
(5, 'Татьяна Солодкова', '/storage/upload/5a64aee9ba630/_MG_1474_small.jpg', '<br/><ul style=\"font-size: 14px;\"><li><p>Сотовый телефон: 89025193040</p></li><li><ul><li>Школа инструкторов аэробики России ITS;</li><li>Инструктор по степ аэробике и силовой тренировке;</li><li>Школа инструкторов ITS « Фитнес- менеджмент»;</li><li>Инструктор тренажерного зала , персональный тренер;</li></ul></li></ul>', 0, '2018-01-21 15:17:17', '2018-01-21 15:17:32');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Raccoon', 'enot.work@gmail.com', '$2y$10$.xYJunsp2D6psCG4Ldta.uptdqixpFWJpoPLG3IzIKa8.CemGT.2W', 'eXbFRGIw5W5qXi2paFbcwcUT8NkstvTK2qWZfQnCD4yr6lnIBV58fgvQUhqx', '2017-09-27 09:36:41', '2017-09-29 13:57:56');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `acl_groups`
--
ALTER TABLE `acl_groups`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `acl_group_permissions`
--
ALTER TABLE `acl_group_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `acl_group_permissions_group_id_permission_id_unique` (`group_id`,`permission_id`);

--
-- Индексы таблицы `acl_group_roles`
--
ALTER TABLE `acl_group_roles`
  ADD PRIMARY KEY (`group_id`,`role_id`);

--
-- Индексы таблицы `acl_permissions`
--
ALTER TABLE `acl_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `acl_permissions_area_permission_unique` (`area`,`permission`);

--
-- Индексы таблицы `acl_roles`
--
ALTER TABLE `acl_roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `acl_role_permissions`
--
ALTER TABLE `acl_role_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `acl_role_permissions_role_id_permission_id_unique` (`role_id`,`permission_id`);

--
-- Индексы таблицы `acl_users`
--
ALTER TABLE `acl_users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `acl_user_permissions`
--
ALTER TABLE `acl_user_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `acl_user_permissions_user_id_permission_id_unique` (`user_id`,`permission_id`);

--
-- Индексы таблицы `acl_user_roles`
--
ALTER TABLE `acl_user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_name` (`group_name`);

--
-- Индексы таблицы `landing_data`
--
ALTER TABLE `landing_data`
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

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
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `program_photo`
--
ALTER TABLE `program_photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program` (`program_id`),
  ADD KEY `updated_at` (`updated_at`),
  ADD KEY `created_at` (`created_at`),
  ADD KEY `deleted` (`deleted`);

--
-- Индексы таблицы `program_schedule`
--
ALTER TABLE `program_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `technology`
--
ALTER TABLE `technology`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `top_link`
--
ALTER TABLE `top_link`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT для таблицы `acl_groups`
--
ALTER TABLE `acl_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `acl_group_permissions`
--
ALTER TABLE `acl_group_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `acl_permissions`
--
ALTER TABLE `acl_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `acl_roles`
--
ALTER TABLE `acl_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `acl_role_permissions`
--
ALTER TABLE `acl_role_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `acl_users`
--
ALTER TABLE `acl_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `acl_user_permissions`
--
ALTER TABLE `acl_user_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT для таблицы `landing_data`
--
ALTER TABLE `landing_data`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `program`
--
ALTER TABLE `program`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `program_photo`
--
ALTER TABLE `program_photo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `program_schedule`
--
ALTER TABLE `program_schedule`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `request`
--
ALTER TABLE `request`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `technology`
--
ALTER TABLE `technology`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `top_link`
--
ALTER TABLE `top_link`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `trainer`
--
ALTER TABLE `trainer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
