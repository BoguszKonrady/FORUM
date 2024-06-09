-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Cze 09, 2024 at 12:43 PM
-- Wersja serwera: 5.7.44
-- Wersja PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydatabase`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `post_id`, `created_at`) VALUES
(16, 34, 50, '2024-06-08 09:05:14'),
(17, 38, 54, '2024-06-08 09:13:47'),
(18, 38, 52, '2024-06-08 09:13:48'),
(19, 38, 51, '2024-06-08 09:13:50'),
(20, 38, 50, '2024-06-08 09:13:51'),
(21, 39, 55, '2024-06-08 09:15:07'),
(22, 34, 56, '2024-06-09 12:23:32');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `friends`
--

CREATE TABLE `friends` (
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`user_id`, `friend_id`) VALUES
(35, 34),
(36, 34),
(36, 35),
(37, 34),
(37, 35),
(37, 36),
(38, 34),
(38, 35),
(38, 36),
(38, 37),
(39, 35),
(39, 36),
(39, 37),
(39, 38),
(40, 35),
(40, 34),
(40, 36),
(40, 37),
(40, 38),
(40, 39),
(34, 35),
(34, 36),
(34, 37),
(34, 38),
(34, 40),
(34, 39);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `user_id`, `created_at`, `image_path`) VALUES
(50, NULL, 'UchwyÄ‡ chwilÄ™ magii w piÄ™knej scenerii, gdzie Å›wiatÅ‚o sÅ‚oÅ„ca delikatnie podkreÅ›la kaÅ¼dy detal', 34, '2024-06-08 08:58:29', 'resources/img/post1.jpg'),
(51, NULL, 'Ta fotografia to zapis emocji, ktÃ³re przenikajÄ… przez gÅ‚Ä™bokie spojrzenia i uÅ›miechy, tworzÄ…c niezapomnianÄ… atmosferÄ™.', 35, '2024-06-08 09:07:12', 'resources/img/post2.jpg'),
(52, NULL, 'Przyroda ukazana w caÅ‚ej swej peÅ‚ni - harmonia kolorÃ³w i tekstur tworzy malowniczy pejzaÅ¼, ktÃ³ry kusi do odkrywania', 36, '2024-06-08 09:08:51', 'resources/img/post4.jpg'),
(53, NULL, 'ÅšwiatÅ‚o grajÄ…ce na powierzchni wody tworzy magicznÄ… aurÄ™, ktÃ³ra przenosi nas w inny wymiar.', 37, '2024-06-08 09:12:25', 'resources/img/post8.jpg'),
(54, NULL, 'Portret oddajÄ…cy osobiste historie i uczucia, gdzie kaÅ¼dy detal ma znaczenie i opowiada wÅ‚asnÄ… historiÄ™.', 38, '2024-06-08 09:13:36', 'resources/img/post9.jpg'),
(55, NULL, 'Fotografia, ktÃ³ra kusi tajemniczoÅ›ciÄ…, ukrywajÄ…c w sobie wiele niezgÅ‚Ä™bionych symboli i interpretacji.', 39, '2024-06-08 09:15:03', 'resources/img/post7.jpg'),
(56, NULL, 'Portret oddajÄ…cy osobiste historie i uczucia, gdzie kaÅ¼dy detal ma znaczenie i opowiada wÅ‚asnÄ… historiÄ™.', 40, '2024-06-08 09:37:04', 'resources/img/post10.jpg'),
(57, NULL, 'dsafaf', 34, '2024-06-09 12:23:46', 'resources/img/post3.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `avatar_url` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `avatar_url`, `created_at`) VALUES
(34, 'Karolina Vorona', 'karolinavorona@example.com', '$2y$10$opN1FzSRuGKjaFVBdfVJcOaK9vecXePWQ5n92CgYmkSk8zR2tJmve', '/resources/img/osoba1.jpg', '2024-06-08 08:53:21'),
(35, 'Agnieszka Sip', 'agnieszka_sip@example.com', '$2y$10$kHSTaKeMAHMQ1.6UE/qjiO2SjbnSKD216afJQWn1lCRlj2V90sz4e', '/resources/img/osoba2.jpg', '2024-06-08 09:06:33'),
(36, 'Roksana GÅ‚ownia', 'roksanaglownia@example.com', '$2y$10$sYNKjvfhdezAguXbY6A9o.JQ0Z1t/8pwAvK4riW7P9vjVL.nfroi6', '/resources/img/osoba7.jpg', '2024-06-08 09:07:43'),
(37, 'BogusÅ‚aw CzajczyÅ„ski', 'boguslaw_czajczynski@example.com', '$2y$10$h56wIrqyGZe5IkzwUOQFAODmJqQQeKv4hrMiqR4aFU3nQwCTjV4AK', '/resources/img/osoba6.jpg', '2024-06-08 09:11:44'),
(38, 'Magda Bartosz', 'magda.bartosz@example.com', '$2y$10$ftjEEvgQcVFQYXVFiOsKIeBMAaTOVgq7mEFOnkWU912neJ0AEyFD2', '/resources/img/osoba5.jpg', '2024-06-08 09:12:48'),
(39, 'Kazimiera Szatko', 'kazimiera.szatko@example.com', '$2y$10$T/9gsaos.jJaZaj8eUopPeju0n39CJfpnlC1NFLTDQcBOu7ddKG3i', '/resources/img/osoba9.jpg', '2024-06-08 09:14:08'),
(40, 'Nikol KulpiÅ„ski', 'nikola.kulpinska@example.com', '$2y$10$pdtGISiql7MIojuHwxzgcOg0bMYPvXxBKRYpldaE1mjh38gfH/5P6', '/resources/img/osoba3.jpg', '2024-06-08 09:34:48'),
(41, 'vDKS', 'fqw@fes.com', '$2y$10$M9D7OltEGJksrT2LKe9un.DOBDAIe37QViAAGQK7XtH0QvWLfKxdm', 'http://localhost:8080/resources/img/default.jpg', '2024-06-08 09:44:44');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indeksy dla tabeli `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
