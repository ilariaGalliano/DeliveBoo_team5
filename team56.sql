-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 22, 2021 at 10:32 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `team56`
--

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

DROP TABLE IF EXISTS `dishes`;
CREATE TABLE IF NOT EXISTS `dishes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `dishtype_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `allergens` text COLLATE utf8mb4_unicode_ci,
  `price` double(4,2) NOT NULL,
  `visibility` tinyint(1) NOT NULL,
  `vegan` tinyint(1) DEFAULT NULL,
  `path_image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dishes_restaurant_id_foreign` (`restaurant_id`),
  KEY `dishes_dishtype_id_foreign` (`dishtype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`id`, `restaurant_id`, `dishtype_id`, `name`, `slug`, `description`, `allergens`, `price`, `visibility`, `vegan`, `path_image`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 'Accusamus.', 'accusamus', 'Itaque quidem nostrum necessitatibus nihil sint qui qui. Accusamus voluptatem eos quia. Nemo et libero voluptas odio sapiente saepe.\n\nVitae totam ea sit amet. Neque voluptas libero ipsa labore aut. Beatae sed deleniti quae molestiae vitae explicabo.', 'Hic in autem et eius quia minus.', 12.52, 1, 1, NULL, '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(2, 5, 3, 'Aut quia est minima.', 'aut-quia-est-minima', 'Quam quo reprehenderit ut id nesciunt id aut temporibus. Dignissimos iusto sint quia et accusantium. Quam laboriosam architecto ut voluptatem. Qui fuga in cum et sit distinctio sit.\n\nNemo sit illo in autem. Quis tempora quaerat omnis dolorum rerum et nobis. Tempora at est quia et quos aut.', 'Quos eum autem et culpa deleniti aut.', 8.12, 1, 1, NULL, '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(3, 3, 3, 'Et earum vitae.', 'et-earum-vitae', 'Et explicabo quo illum similique id. Corporis quod est omnis tempora autem nihil accusamus. Iusto doloremque facere sint perspiciatis accusantium et. Aut labore saepe id incidunt consequatur.\n\nIpsum recusandae quo necessitatibus quibusdam. Est quo vero et assumenda architecto explicabo. Dolorum soluta autem nostrum sapiente quae.', 'Aliquid corporis aut quis eligendi.', 17.50, 1, 1, NULL, '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(4, 1, 2, 'Perferendis aut.', 'perferendis-aut', 'Consequuntur officiis dignissimos numquam iste nesciunt maiores. Magni nulla ab velit quam dolor. Necessitatibus atque qui unde animi.\n\nNecessitatibus eum vel rerum et sed et. Quas nemo dicta similique impedit ducimus magni. Et iure non vel quae.', 'Blanditiis adipisci temporibus esse.', 17.89, 0, 0, '', '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(5, 1, 1, 'Quia non vel magnam.', 'quia-non-vel-magnam', 'Sint provident porro dolores inventore. Suscipit expedita eos labore commodi quo repellat sed. Sed aut sit delectus corrupti facere et. Itaque facilis qui ipsa voluptas eaque consequatur.\n\nSed quas rerum et sed quo. Eligendi sit ratione temporibus aperiam ullam. Voluptas libero est amet cum ratione ipsum autem.', 'Omnis maxime ex et.', 13.79, 1, 1, NULL, '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(6, 4, 3, 'Quaerat dolores.', 'quaerat-dolores', 'Dolor aut odio qui possimus vero consequatur totam quis. Et enim qui quo sunt cupiditate officiis. Est quibusdam quaerat id. Aperiam magnam cum voluptatum vitae est.\n\nPerferendis qui aut voluptatem omnis. Rem sed occaecati non voluptatem. Voluptatum aut qui aut excepturi laboriosam.', 'Aperiam eveniet hic est et fugiat vel.', 14.17, 0, 0, '', '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(7, 1, 4, 'Quo quia at et.', 'quo-quia-at-et', 'Nemo velit non sequi sed. Alias neque non fugiat modi in quia. Sapiente fugit nemo explicabo mollitia quia.\n\nOdio magni nihil sed nihil. Unde eius sapiente esse. Amet earum consequuntur consequatur officia itaque. Aut similique similique ex tempore necessitatibus.', 'Ullam non dolores aliquid et.', 23.38, 0, 1, '', '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(8, 2, 3, 'Voluptas rerum.', 'voluptas-rerum', 'Quia dolores ratione quae doloribus perspiciatis et. Cumque et iure quibusdam nihil vel et molestias natus. Porro quo deserunt dolore maiores illum voluptatem et aut.\n\nEnim exercitationem ea quia quia. Ut voluptatem reprehenderit ipsa accusamus. Quis quos sit in.', 'Illum nesciunt ratione explicabo nihil.', 14.45, 1, 0, '', '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(9, 1, 1, 'Placeat enim fuga.', 'placeat-enim-fuga', 'Consequatur laborum excepturi cupiditate nostrum facilis sint. Aliquid odio quis voluptas in nobis maiores. Ducimus modi eum error voluptatibus provident maxime.\n\nNon velit modi voluptatum non. In nam itaque in iusto. Sunt ipsam unde porro illo est cupiditate. Tenetur nemo qui rerum beatae qui sit.', 'Possimus vero quo tempore et.', 7.83, 0, 0, '', '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(10, 1, 2, 'Ab debitis omnis.', 'ab-debitis-omnis', 'Earum fugiat eius est perspiciatis commodi. Quo autem quo est consequatur. Placeat saepe vel fugiat reprehenderit saepe.\n\nLaboriosam tenetur unde sint cumque. Quisquam tempore quos itaque sit tenetur quia. Vel eum eveniet sunt iure eligendi quam.', 'Non quia aut inventore vero.', 13.76, 0, 1, '', '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(11, 1, 3, 'Voluptatem aut.', 'voluptatem-aut', 'Et non natus alias tenetur quis quis officia sunt. Voluptas dolore rerum delectus amet dignissimos. Eum quod assumenda voluptas esse voluptatum at dolorem.\n\nEst adipisci aliquid quas repellat. Quisquam minus deleniti corporis ducimus. Veritatis consequatur nulla laboriosam molestiae nulla.', 'Nemo illum aliquam quia.', 4.53, 1, 0, '', '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(12, 4, 2, 'Minus autem ex.', 'minus-autem-ex', 'Provident totam vero blanditiis. Esse optio velit voluptatem quia rerum cumque. Qui nihil rem dolor nemo aliquam nobis voluptas. Dolorem excepturi cum odio nulla illo consequatur.\n\nBlanditiis odio quod quasi quia sed aspernatur non est. Hic sint quae consequatur quia consequatur. Vel accusamus et velit est velit recusandae dolor nostrum. Odio eligendi nam consequatur exercitationem dolor deserunt quasi.', 'Dolor et consequatur fugiat.', 10.79, 0, 1, '', '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(13, 5, 4, 'Ratione et est.', 'ratione-et-est', 'Ducimus illum voluptatem et minima natus in ut. Vero aliquam expedita maxime omnis nihil est ea cumque. Ratione voluptatum sed itaque sequi quam.\n\nQuos sed sequi accusamus velit ut nostrum eum. Odio a vel ab sed culpa illum libero. Soluta ab assumenda et et.', 'Eligendi laborum quod magnam.', 4.48, 0, 0, '', '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(14, 4, 6, 'Aliquid veritatis.', 'aliquid-veritatis', 'Explicabo aut voluptates est quas. Qui ut voluptatibus rerum eaque aut. Quia minus corrupti soluta velit illum architecto ab dolores.\n\nQuia blanditiis amet aut non eius voluptatem quaerat. Illum maxime id commodi rerum dignissimos et.', 'Sunt ex sequi nobis impedit.', 6.53, 0, 0, '', '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(15, 5, 6, 'Maxime quia quidem.', 'maxime-quia-quidem', 'Asperiores error excepturi omnis et consectetur ipsum. Reprehenderit at rerum aut temporibus quibusdam. Ut natus beatae id iste doloribus minima eos.\n\nA praesentium numquam magnam itaque repellendus. At repellat doloribus similique et aut voluptatem. Possimus accusamus dolores eligendi excepturi in nulla inventore. Repellendus similique voluptas cupiditate quod culpa qui vero aut.', 'Quidem dolores et quae repellat.', 12.22, 1, 0, NULL, '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(16, 4, 4, 'Voluptates ut et.', 'voluptates-ut-et', 'Numquam facilis cumque veritatis numquam et. Rem voluptates nam soluta aspernatur quaerat. Asperiores beatae pariatur sequi amet mollitia commodi quae est.\n\nOptio deleniti quia distinctio neque. Laborum iusto nihil facere assumenda labore quis. Voluptatem voluptates eveniet dolores laborum asperiores. Ratione quis libero non fugiat quo.', 'Quasi aut pariatur odit ea quo.', 22.34, 1, 1, '', '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(17, 1, 1, 'Dolores numquam ea.', 'dolores-numquam-ea', 'Ullam harum est eligendi aliquam exercitationem perferendis et. Perspiciatis fugiat similique eos. Et non et odit voluptatum quis culpa sequi in. Natus sed et tenetur dignissimos.\n\nDolorem doloremque et libero assumenda ipsam voluptatem est. Perferendis repellat et et incidunt consectetur est possimus. Veniam numquam porro enim qui.', 'Eos maxime dolor beatae.', 6.66, 0, 1, '', '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(18, 4, 3, 'Rerum in et qui nam.', 'rerum-in-et-qui-nam', 'Ut voluptate dolorem sed ex vitae fugit ratione. Sunt suscipit blanditiis voluptate quis quas eum recusandae.\n\nEx ut dolores nihil aut reprehenderit dolorem. Ipsam odit numquam eaque est at voluptatem magnam. Repellendus quae voluptatem nam iste explicabo. Vitae excepturi nisi saepe eos debitis explicabo. Perferendis possimus voluptas molestiae minus modi.', 'Rem occaecati corporis et corporis.', 20.44, 1, 1, '', '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(19, 5, 5, 'Nam dolorum nihil.', 'nam-dolorum-nihil', 'Incidunt in ratione eligendi explicabo qui. Repellat tempore asperiores animi ut ex sapiente molestiae. Optio eligendi molestias sint. Doloremque esse accusantium incidunt illum aut modi reprehenderit.\n\nDelectus sed optio ullam illum exercitationem. Explicabo nihil nihil veniam aliquam. Est laudantium cupiditate aperiam repellat molestiae consequatur ex culpa.', 'Ut cumque suscipit magnam vel iusto ad.', 24.88, 0, 0, '', '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(20, 2, 5, 'Consectetur nulla.', 'consectetur-nulla', 'Necessitatibus voluptatem cumque debitis ut rerum facilis cumque adipisci. Assumenda saepe corrupti sint itaque ab. Itaque rerum enim quos culpa qui asperiores eos.\n\nAut voluptatem dolore odio soluta repudiandae. Delectus repellat quibusdam qui aut. Consectetur nisi omnis voluptate aspernatur quam ipsam quibusdam.', 'Nisi dolor sed modi.', 3.58, 0, 1, '', '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(21, 9, 2, 'Hamburger', 'hamburger', 'Etiam at tempor purus. Sed efficitur euismod metus id viverra. Integer purus dolor, pulvinar ac nisi eu, viverra bibendum arcu. Aenean volutpat suscipit felis, non vestibulum elit porttitor id. Maecenas tristique accumsan dictum. Sed tellus nulla, lobortis vel quam in, iaculis efficitur quam. Nullam pretium nulla mattis nisl ultricies commodo. Maecenas sodales nulla ligula, sed sodales quam mattis dignissim. Donec cursus pulvinar placerat. Fusce molestie vel tortor at viverra.', 'lorem ipsum', 8.00, 1, 0, '', '2021-02-16 19:09:51', '2021-02-17 08:59:40'),
(23, 9, 2, 'Pizza', 'pizza', 'Mauris ullamcorper finibus eros, non venenatis libero eleifend vitae. Vestibulum vulputate mollis imperdiet. Sed quis lacus egestas, tincidunt ligula sit amet, fringilla massa. Vivamus rutrum nisl egestas fermentum auctor. Nunc hendrerit lectus vestibulum felis dignissim ullamcorper. Ut ultrices eros eros, et laoreet mauris gravida sit amet. Suspendisse faucibus, nisl sed gravida commodo, mauris mi sagittis sem, non dapibus felis diam vel nisi. Etiam ante ipsum, suscipit vitae tristique feugiat, finibus vitae massa. Morbi hendrerit ante vel ante gravida lobortis.', 'lorem', 6.00, 1, 0, '', '2021-02-17 08:22:06', '2021-02-17 09:00:53'),
(25, 10, 1, 'Tacos', 'tacos', 'Sed consequat luctus mauris. Etiam consectetur nisi a interdum mollis. Aenean faucibus, mi ut gravida vestibulum, turpis nibh lobortis lorem, in placerat diam sem vitae est. Fusce tincidunt aliquet ipsum nec volutpat. In vitae consectetur lorem. In hac habitasse platea dictumst. Cras et massa nulla. Curabitur ex nisl, efficitur a libero posuere, vulputate sollicitudin risus.', 'lorem ipsum et', 6.00, 1, 0, '', '2021-02-17 09:09:18', '2021-02-17 09:09:18'),
(26, 11, 3, 'Pollo alla cacciatora', 'pollo-alla-cacciatora', 'pollo buono', 'pollo', 8.00, 1, 0, 'images/AYVVDhhc0NasXHjDKJC6XPDeWROtuxxMO19Ekd0u.jpg', '2021-02-22 12:34:48', '2021-02-22 12:34:48'),
(27, 12, 2, 'Pizza Margherita', 'pizza-margherita', 'Pizza Tomato, Mozzarella, Basil', 'Tomato', 7.00, 1, 0, 'images/3vAdl8vBVsxNqFo6LonvzVFAZjeeri6SyWIPH8jQ.jpg', '2021-02-22 20:25:42', '2021-02-22 20:25:42'),
(28, 12, 4, 'Hamburger Party', 'hamburger-party', 'Hamburger, Tomato, Salad', 'Tomato', 12.00, 1, 0, 'images/COAIG7xN7wkTtWTmSupUTJbMMX7FUP4KgCkltuqL.jpg', '2021-02-22 20:26:46', '2021-02-22 20:26:46'),
(29, 13, 2, 'Pasta & Pachino', 'pasta-pachino', 'Pasta with fresh tomato', 'Tomato', 16.00, 1, 1, 'images/yXSdCMzpYEPdrYUyVEoZqeQm9AxONHWU1t55mVwn.jpg', '2021-02-22 20:30:01', '2021-02-22 20:30:01'),
(30, 13, 3, 'Chicken alla Cacciatora', 'chicken-alla-cacciatora', 'Chicken tomato and peppers', 'Peppers', 11.00, 1, 0, 'images/Cu3f3YfoERTnJoplmjQ76RLWgkbs8s2nkbvNwVHp.jpg', '2021-02-22 20:31:19', '2021-02-22 20:31:19'),
(31, 13, 4, 'Carrots & Butter', 'carrots-butter', 'Carrots', NULL, 3.00, 1, 1, 'images/QvetJBo1j30CPihNYTZHhfHJqXeLUMpMjVAQUBNS.jpg', '2021-02-22 20:32:24', '2021-02-22 20:32:24'),
(32, 14, 2, 'Cantonese Rice', 'cantonese-rice', 'Rice with carrots', 'Carrots', 11.00, 1, 0, 'images/tPZPmQteIxMYAxTRxrPBQJiO21VxC9ALSUUwY5iM.jpg', '2021-02-22 20:37:31', '2021-02-22 20:37:31'),
(33, 15, 3, 'Kebab Royal', 'kebab-royal', 'Kebab Tomato Salad', 'Tomato', 4.00, 1, 0, 'images/AZXoo608NH2l1b2eXuE531D2P3JqvRXVPDmPONDG.jpg', '2021-02-22 20:40:15', '2021-02-22 20:40:15'),
(34, 15, 4, 'Kebab Salad', 'kebab-salad', 'Salad and Kebab and Ketchup', 'Tomato', 5.00, 1, 0, 'images/GTzJpF9ibqpkYS0mjPuuiibWSrPpu5mBPaIMZQHP.jpg', '2021-02-22 21:23:30', '2021-02-22 21:23:30'),
(35, 14, 5, 'Fried Icecream', 'fried-icecream', 'Icream...fried!', 'Milk', 5.00, 1, 1, 'images/LSUve4DjBV5KIkbzgLUn7iKfNY50eZtrMapMvmIB.jpg', '2021-02-22 21:24:45', '2021-02-22 21:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `dishtypes`
--

DROP TABLE IF EXISTS `dishtypes`;
CREATE TABLE IF NOT EXISTS `dishtypes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dishtypes_status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dishtypes`
--

INSERT INTO `dishtypes` (`id`, `dishtypes_status`, `created_at`, `updated_at`) VALUES
(1, 'appetizer', '2021-02-15 08:48:40', '2021-02-15 08:48:40'),
(2, 'main', '2021-02-15 08:48:40', '2021-02-15 08:48:40'),
(3, 'second', '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(4, 'sides', '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(5, 'dessert', '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(6, 'beverage', '2021-02-15 08:48:41', '2021-02-15 08:48:41');

-- --------------------------------------------------------

--
-- Table structure for table `dish_order`
--

DROP TABLE IF EXISTS `dish_order`;
CREATE TABLE IF NOT EXISTS `dish_order` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dish_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dish_order_dish_id_foreign` (`dish_id`),
  KEY `dish_order_order_id_foreign` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_12_164339_create_restaurants_table', 1),
(5, '2021_02_12_164459_create_dishtypes_table', 1),
(6, '2021_02_12_164541_create_dishes_table', 1),
(7, '2021_02_12_164616_create_orders_table', 1),
(8, '2021_02_12_164659_create_restypes_table', 1),
(9, '2021_02_12_164746_create_restaurant_restype_table', 1),
(10, '2021_02_12_164841_create_dish_order_table', 1),
(11, '2021_02_15_083838_add_slug_to_restaurants', 1),
(12, '2021_02_15_084235_add_slug_to_dishes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tot_price` double(6,2) NOT NULL,
  `payment_status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `lastname`, `address`, `email`, `tot_price`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 'veritatis', 'incidunt', 'Esse.', 'torp.mckenna@hotmail.com', 39.42, 0, '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(2, 'perspiciatis', 'consequatur', 'Id fuga.', 'henry03@yahoo.com', 58.68, 1, '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(3, 'culpa', 'repellat', 'Corporis.', 'jenkins.arno@hotmail.com', 53.48, 0, '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(4, 'aut', 'aut', 'Sunt sed.', 'pfannerstill.shania@hotmail.com', 78.49, 1, '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(5, 'dolorem', 'enim', 'Veritatis.', 'armani65@yahoo.com', 39.17, 1, '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(6, 'nobis', 'autem', 'Repellat.', 'lakin.chloe@hotmail.com', 30.77, 0, '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(7, 'veritatis', 'eos', 'Itaque.', 'matilde82@yahoo.com', 47.73, 1, '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(8, 'soluta', 'quis', 'Tempore.', 'uhuels@gmail.com', 16.36, 0, '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(9, 'ut', 'consequatur', 'Nisi.', 'crowe@hotmail.com', 39.50, 1, '2021-02-15 08:48:41', '2021-02-15 08:48:41'),
(10, 'quaerat', 'modi', 'Pariatur.', 'jmurazik@gmail.com', 75.99, 0, '2021-02-15 08:48:41', '2021-02-15 08:48:41');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

DROP TABLE IF EXISTS `restaurants`;
CREATE TABLE IF NOT EXISTS `restaurants` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_price` double(3,2) NOT NULL,
  `min_order` double(3,2) DEFAULT NULL,
  `path_image` text COLLATE utf8mb4_unicode_ci,
  `open_hours` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `restaurants_vat_unique` (`vat`),
  KEY `restaurants_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `user_id`, `name`, `slug`, `vat`, `address`, `body`, `phone`, `delivery_price`, `min_order`, `path_image`, `open_hours`, `created_at`, `updated_at`) VALUES
(1, 2, 'Autem quaerat qui.', 'autem-quaerat-qui', '604178938', 'Deleniti voluptatem.', 'Possimus laboriosam eos ut incidunt. Repellat excepturi asperiores quibusdam. Animi odio quo dolor eum quia consequatur numquam. Occaecati fugiat fugiat esse sit eos doloremque aliquam.\n\nUt dicta dolore nisi incidunt repellendus aut. Ea rerum qui et doloremque. Ab temporibus velit voluptatem aut.', '512926823', 1.32, 4.06, NULL, 'Laboriosam.', '2021-02-15 08:48:40', '2021-02-15 08:48:40'),
(2, 1, 'Ea amet aut natus.', 'ea-amet-aut-natus', '284212306', 'Possimus voluptatum.', 'Voluptatibus natus dolores nostrum ut autem dolores. Magnam velit est perferendis eaque. Consequatur minus sequi dolores eaque odio. Impedit vitae dolores sed impedit quia et.\n\nA in dolorem itaque delectus. Ut voluptatibus vel aut corporis facere enim quia. Quas accusamus dolore impedit cupiditate quod rerum adipisci. Non tempora voluptas delectus itaque provident tempora sed.', '131950795', 2.25, 4.36, NULL, 'Laudantium.', '2021-02-15 08:48:40', '2021-02-15 08:48:40'),
(3, 3, 'Fuga fuga enim.', 'fuga-fuga-enim', '120468584', 'Voluptatem sit iste.', 'Sapiente aperiam ratione optio sed. Provident sit nemo earum et tempora cumque iste optio. Repellat quod rerum molestiae quo.\n\nEt aut error blanditiis a esse. Eum repudiandae quaerat quaerat error. Dolorem consequatur dolor ut in omnis rerum aut. Eveniet et molestias laudantium ipsam.', '653777774', 1.58, 4.17, NULL, 'Animi sequi et in.', '2021-02-15 08:48:40', '2021-02-15 08:48:40'),
(4, 5, 'Quidem assumenda ex.', 'quidem-assumenda-ex', '501574939', 'Animi eligendi.', 'Incidunt deserunt ratione ut incidunt amet facere. Necessitatibus qui eos eum quas assumenda amet. Aut tenetur sed sint inventore.\n\nRerum id dolores quam sed doloribus perferendis. Deserunt numquam est tempora in. Ducimus nobis eos iste impedit. Numquam aut voluptatem quis et. Quidem odit delectus praesentium nisi.', '675439805', 7.61, 7.85, '', 'Eum laborum sed.', '2021-02-15 08:48:40', '2021-02-15 08:48:40'),
(5, 1, 'Voluptates quis.', 'voluptates-quis', '183537314', 'Est et asperiores.', 'Labore vero inventore error ut quas quo. Non ut nihil est ex occaecati dolor. Vitae inventore aut cupiditate accusamus. Enim dolor dolorem ipsum voluptatem doloribus sit et.\n\nDebitis odio sint qui eum. Est rerum suscipit sunt voluptatem neque blanditiis sint. Similique sunt qui odit qui voluptatibus. Dolor itaque dolorem enim error ipsum.', '210766202', 6.02, 4.52, NULL, 'Voluptatum.', '2021-02-15 08:48:40', '2021-02-15 08:48:40'),
(9, 6, 'Homeslice Neal\'s Yard', 'homeslice-neals-yard', '145585810', '15 Neal\'s Yard, West End, London WC2H 9DP, UK', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt neque odio, vel rhoncus erat viverra consequat. Nunc sed nunc ac lorem elementum rhoncus sit amet ac quam. Sed commodo blandit eros quis tristique. Aliquam dapibus, lacus non faucibus pretium, sapien libero eleifend magna, sit amet pharetra nunc mi ut urna. Cras sed diam vehicula, vestibulum lorem non, egestas sapien. Pellentesque rutrum elit blandit facilisis mattis. Cras lorem ante, posuere ut dui vitae, pretium hendrerit risus.', '+44 20 3151 7466', 3.00, 4.00, '', '11.00- 15.00 | 18.00-24.00', '2021-02-16 07:28:13', '2021-02-17 08:50:40'),
(10, 6, 'Homemade Taqueria', 'homemade-taqueria', '78965423', '14th Ave. St. Cathedral London , Uk', 'Fusce in erat a leo imperdiet scelerisque in a massa. Cras nulla quam, imperdiet et porttitor et, iaculis quis risus. Nam faucibus congue mauris in dictum. Nam fermentum, nibh vitae interdum venenatis, purus ex maximus urna, sed placerat lacus eros sed justo. In malesuada, erat vitae vestibulum aliquam, velit risus mattis eros, vitae lacinia tellus lacus commodo urna. Nullam vel tortor luctus, ornare libero quis, ultrices libero. Curabitur facilisis pulvinar ante ut lobortis. Donec facilisis vulputate odio, non consectetur purus vulputate at. Integer accumsan vitae lectus quis auctor. Suspendisse ornare felis nec sapien cursus condimentum.', '+44 71833355', 3.00, 5.00, '', '24 hours', '2021-02-17 09:08:21', '2021-02-17 09:08:21'),
(11, 7, 'Giacomo', 'giacomo', '1239\'09\'', 'giacomommm', '3449539045', '9898', 3.00, 2.00, '', 'fdfd', '2021-02-22 10:32:29', '2021-02-22 10:32:29'),
(12, 10, 'Chez Luca', 'chez-luca', '123456789', 'Via Luca', 'Etiam in quam lacus. Nulla facilisi. Praesent blandit eros ut felis consequat faucibus. Pellentesque suscipit varius blandit. Pellentesque aliquam viverra ante. Phasellus nec ante eu mauris fermentum varius. Nullam eget sem ut dui ullamcorper imperdiet. Fusce fringilla nibh eu arcu laoreet, nec cursus eros mattis. Nam congue, metus ac tempor cursus, tellus quam suscipit sem, varius ultricies diam augue dignissim ante.', '987654321', 3.00, 3.00, 'images/WtKa8NLMcZrXOmuvNppylOF2tdZj4GHViGkTBaGU.png', '24h', '2021-02-22 20:22:29', '2021-02-22 20:22:29'),
(13, 10, 'La Cantina dei Principici', 'la-cantina-dei-principici', '9877665514', 'Via dei Principi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id neque et mauris tempor ultricies sed nec mauris. Aliquam suscipit, leo et finibus eleifend, risus ex pretium mi, quis interdum augue massa id augue. In venenatis faucibus condimentum. Duis et rutrum enim, eget dapibus justo. In a ultricies dui. Fusce non molestie dui. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas elementum nibh vitae ante congue luctus. Pellentesque ornare a metus ut dapibus. Suspendisse justo turpis, vulputate quis eros id, ultrices bibendum justo. Integer lobortis metus sit amet nisl scelerisque feugiat. Cras sollicitudin ante sed malesuada condimentum. Praesent quis nunc lectus.', '6655337744', 3.00, 7.00, 'images/TF0RPPFZpOCQFDPZd9NszlajHHY8E9HQcdX1sfa4.png', '12.00-18.00', '2021-02-22 20:29:17', '2021-02-22 20:29:17'),
(14, 10, 'Chinese Taiwan', 'chinese-taiwan', '887766554', 'Via Taiwan', 'Ut quis mi eget arcu facilisis sagittis. Nam elementum aliquam nisi at ultricies. Aenean facilisis ante eget arcu consectetur cursus. Praesent eget nibh gravida, auctor urna varius, ornare nisi. Nunc ornare, lectus sit amet pulvinar vestibulum, mauris tortor maximus erat, vestibulum semper ligula felis id libero. Fusce ipsum magna, rhoncus eu viverra eu, lobortis in lorem. Sed sed nulla quis ante lacinia volutpat. Maecenas vel pellentesque metus. Quisque pretium ipsum in ligula sagittis tempor. Nunc sagittis tortor nec venenatis fermentum. Ut lobortis fermentum augue quis eleifend.', '7766554433', 3.00, 6.00, 'images/DEgBbvQMk7HNAxsKiTBUmWft98ntJcxgwgYy1Hou.png', '15.00-22.00', '2021-02-22 20:34:09', '2021-02-22 20:34:09'),
(15, 10, 'Kebab House', 'kebab-house', '667788994433', 'Via kebab', 'Nullam non velit tincidunt, vehicula tellus at, rhoncus leo. In hac habitasse platea dictumst. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam molestie pharetra erat vel sodales. Integer eu dui cursus, iaculis risus eget, eleifend urna. Praesent bibendum lectus nec nisi congue blandit. In lacinia pharetra orci. Nulla dictum scelerisque metus et blandit. Ut at molestie mauris.', '6677889002', 3.00, 9.00, 'images/AdwHWvqIOSWykY4IBNatDxBXDgG6HTj1umssn6H0.jpg', 'h24', '2021-02-22 20:39:01', '2021-02-22 20:39:01');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_restype`
--

DROP TABLE IF EXISTS `restaurant_restype`;
CREATE TABLE IF NOT EXISTS `restaurant_restype` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `restype_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `restaurant_restype_restaurant_id_foreign` (`restaurant_id`),
  KEY `restaurant_restype_restype_id_foreign` (`restype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant_restype`
--

INSERT INTO `restaurant_restype` (`id`, `restaurant_id`, `restype_id`, `created_at`, `updated_at`) VALUES
(6, 9, 1, NULL, NULL),
(7, 9, 5, NULL, NULL),
(8, 9, 8, NULL, NULL),
(9, 10, 4, NULL, NULL),
(10, 11, 1, NULL, NULL),
(11, 11, 2, NULL, NULL),
(12, 11, 4, NULL, NULL),
(13, 12, 1, NULL, NULL),
(14, 12, 8, NULL, NULL),
(15, 13, 2, NULL, NULL),
(16, 13, 5, NULL, NULL),
(17, 13, 7, NULL, NULL),
(18, 14, 3, NULL, NULL),
(19, 14, 4, NULL, NULL),
(20, 14, 6, NULL, NULL),
(21, 15, 4, NULL, NULL),
(22, 15, 8, NULL, NULL),
(23, 15, 9, NULL, NULL),
(24, 15, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `restypes`
--

DROP TABLE IF EXISTS `restypes`;
CREATE TABLE IF NOT EXISTS `restypes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `restypes_status` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restypes`
--

INSERT INTO `restypes` (`id`, `restypes_status`, `created_at`, `updated_at`) VALUES
(1, 'pizza', '2021-02-15 08:56:37', '2021-02-15 08:56:37'),
(2, 'healthy', '2021-02-15 08:56:37', '2021-02-15 08:56:37'),
(3, 'sushi', '2021-02-15 08:56:37', '2021-02-15 08:56:37'),
(4, 'ethnic', '2021-02-15 08:56:37', '2021-02-15 08:56:37'),
(5, 'traditional', '2021-02-15 08:56:37', '2021-02-15 08:56:37'),
(6, 'chinese', '2021-02-15 08:56:37', '2021-02-15 08:56:37'),
(7, 'vegan', '2021-02-15 08:56:37', '2021-02-15 08:56:37'),
(8, 'hamburger', '2021-02-15 08:56:37', '2021-02-15 08:56:37'),
(9, 'pastry', '2021-02-15 08:56:37', '2021-02-15 08:56:37'),
(10, 'kebab', '2021-02-15 08:56:37', '2021-02-15 08:56:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'easter67', 'hackett.mona@yahoo.com', NULL, '7&\\B|ZJH1', NULL, '2021-02-15 08:48:40', '2021-02-15 08:48:40'),
(2, 'orutherford', 'runte.barbara@gmail.com', NULL, '}gYw6<K+Bn', NULL, '2021-02-15 08:48:40', '2021-02-15 08:48:40'),
(3, 'felipa.fadel', 'johann09@hotmail.com', NULL, 'L<InN;', NULL, '2021-02-15 08:48:40', '2021-02-15 08:48:40'),
(4, 'luigi55', 'larson.maddison@yahoo.com', NULL, 'I2^#YDYEr:}ERwF,', NULL, '2021-02-15 08:48:40', '2021-02-15 08:48:40'),
(5, 'marquis.gaylord', 'sbeahan@yahoo.com', NULL, 'q,uj9w\"', NULL, '2021-02-15 08:48:40', '2021-02-15 08:48:40'),
(6, 'Ilaria', 'ila@gmail.com', NULL, '$2y$10$1MYw8A2031CSPuBivrncVuzR4gTfsUbvvs5JG0JTsYltKXqbR52Za', NULL, '2021-02-15 14:02:19', '2021-02-15 14:02:19'),
(7, 'giacomo', 'giacomo@giacomo.it', NULL, '$2y$10$ZoF4tMZj6chCtZhDtemTAe7e6uOt/d4lIJZniw4AqBIvG1Nm/svji', NULL, '2021-02-22 10:31:48', '2021-02-22 10:31:48'),
(8, 'pluto', 'pluto@ciao.it', NULL, '$2y$10$JBVd4EgeyEGsibF..kFduukyl2NRSxA0g5WCbPXCKhyzCUquQJvES', NULL, '2021-02-22 15:11:03', '2021-02-22 15:11:03'),
(9, 'ciao', 'ciao@ciao.it', NULL, '$2y$10$iL.DFxxPrDD2YAAwL4yNQeZFq73wFowGZWWHp2Zz4xn75EzwICMoK', NULL, '2021-02-22 15:14:58', '2021-02-22 15:14:58'),
(10, 'luca', 'luca@luca.it', NULL, '$2y$10$b7d0wJhrUEIHpUaFpcTreu7kvXfPYmf6qQZEK88P2iv2XLzK.ZY/2', NULL, '2021-02-22 20:20:08', '2021-02-22 20:20:08');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dishes`
--
ALTER TABLE `dishes`
  ADD CONSTRAINT `dishes_dishtype_id_foreign` FOREIGN KEY (`dishtype_id`) REFERENCES `dishtypes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dishes_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dish_order`
--
ALTER TABLE `dish_order`
  ADD CONSTRAINT `dish_order_dish_id_foreign` FOREIGN KEY (`dish_id`) REFERENCES `dishes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dish_order_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `restaurant_restype`
--
ALTER TABLE `restaurant_restype`
  ADD CONSTRAINT `restaurant_restype_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `restaurant_restype_restype_id_foreign` FOREIGN KEY (`restype_id`) REFERENCES `restypes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
