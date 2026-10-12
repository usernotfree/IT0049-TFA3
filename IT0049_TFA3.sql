DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `customers` (`id`, `full_name`, `email`, `city`, `created_at`) VALUES
(1, 'Lanz Allen Sacramento', 'lanzallen@fit.edu.ph', 'Manila', '2026-10-11 12:00:00'),
(2, 'Maria Adela Tongson', 'mariaadela@fit.edu.ph', 'Quezon City', '2026-10-11 12:00:00'),
(3, 'Joseph Calleja Pogi', 'josephcalleja@fit.edu.ph', 'Manila', '2026-10-11 12:00:00'),
(4, 'Alexandra Gwen Morales', 'alexandragwen@fit.edu.ph', 'Manila', '2026-10-11 12:00:00'),
(5, 'Thania Francene Villa', 'thaniafrancene@fit.edu.ph', 'Manila', '2026-10-11 12:00:00');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL DEFAULT '',
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `username`, `full_name`, `email`, `avatar`, `created_at`) VALUES
(1, 'lallen', 'Lanz Allen Sacramento', 'lanzallen@fit.edu.ph', NULL, '2026-10-11 12:00:00'),
(2, 'madela', 'Maria Adela Tongson', 'mariaadela@fit.edu.ph', NULL, '2026-10-11 12:00:00'),
(3, 'jpogi', 'Joseph Calleja Pogi', 'josephcalleja@fit.edu.ph', NULL, '2026-10-11 12:00:00'),
(4, 'agwen', 'Alexandra Gwen Morales', 'alexandragwen@fit.edu.ph', NULL, '2026-10-11 12:00:00'),
(5, 'tfrancene', 'Thania Francene Villa', 'thaniafrancene@fit.edu.ph', NULL, '2026-10-11 12:00:00');

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `task_date` date NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tasks` (`id`, `title`, `status`, `task_date`, `created_at`) VALUES
(1, 'Magwalis', 'completed', '2026-10-04', '2026-10-05 23:37:43'),
(2, 'Maglaba', 'completed', '2026-10-04', '2026-10-05 23:37:43'),
(3, 'Mag-aral', 'completed', '2026-10-05', '2026-10-05 23:37:43'),
(4, 'Mag-code', 'in_progress', '2026-10-05', '2026-10-05 23:37:43');
