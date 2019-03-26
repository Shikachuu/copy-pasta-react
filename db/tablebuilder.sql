USE copypasta
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(64) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `password` varchar(254) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;	
