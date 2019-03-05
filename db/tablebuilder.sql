SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `pasta_id` varchar(512) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `commented_at` datetime NOT NULL,
  `comment_content` text COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(64) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `password` varchar(254) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;
