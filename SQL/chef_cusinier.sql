-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2024 at 09:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chef_cusinier`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `titre` varchar(150) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `titre`, `description`) VALUES
(1, 'vegetarien', 'hello'),
(2, 'hangarien', NULL),
(3, 'soups', NULL),
(4, 'salads', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id_photo` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `data_photo` longblob DEFAULT NULL,
  `id_plat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plat`
--

CREATE TABLE `plat` (
  `id_plat` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `ingredient` text NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `date_reservation` date NOT NULL,
  `heure_reservation` time NOT NULL,
  `nombre_personnes` int(11) NOT NULL,
  `statut` enum('confirmed','pending','canceled') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `id_user`, `id_menu`, `date_reservation`, `heure_reservation`, `nombre_personnes`, `statut`) VALUES
(1, 26, 2, '2024-12-20', '12:22:44', 4, 'confirmed'),
(5, 27, 1, '2024-12-21', '12:35:44', 5, 'confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `type` enum('client','chef') DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `type`) VALUES
(1, 'chef'),
(2, 'client');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(150) DEFAULT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `prenom`, `email`, `password`, `id_role`) VALUES
(10, 'Ross', 'Hyacinth', 'fynahabof@mailinator.com', '$2y$10$GtiWvmBfV7R0smTlUPVEQuEuUZIod2vLlqS1iKcaAKqX6oHzUr7wC', 2),
(11, 'Ross', 'Hyacinth', 'fynahabof@mailinator.com', '$2y$10$WM.xEW5apxZCbcFq4/P0O.hJ4XFHhZHj/FjnUDtZEpNcJiBzydOD2', 2),
(12, 'Terry', 'Iliana', 'pylu@mailinator.com', '$2y$10$7ZIIgZVMI2CFVfpQzGR0x.3ho7J.X4NEnjU430/sI.TZq5RQeIawW', 2),
(13, 'Gilbert', 'Mari', 'gavyqufyri@mailinator.com', '$2y$10$lDezfgYZmrA9qoyW9y82teSCYeObgiMb0bqiH0rQ.w3RaO/GcyVru', 2),
(14, 'Craft', 'Damian', 'leqavalecy@mailinator.com', '$2y$10$weIdIvXERKfcmjPaW9DZp.ZSOyOfrl.lF86Sac945HpZivveUR9gq', 2),
(15, 'Maynard', 'Susan', 'cojaziqusi@mailinator.com', '$2y$10$ql09MJdOOyJk5zdiE0Jt9upcu9BECMBTIp6gdTX0zrVt1z8MIhlIK', 2),
(16, 'Maynard', 'Susan', 'cojaziqusi@mailinator.com', '$2y$10$NFvi7ODQj46hFwSuGFCa9uBwyCf7BGqR8rGlu1Ak1j0X2O3aznxu.', 2),
(17, 'Suarez', 'Armand', 'zutuja@mailinator.com', '$2y$10$Zf3oykNC0rMY64z9nWDaluPTSLGIz/q.qrgkADtS/3Jix23IGt23m', 2),
(18, 'Suarez', 'Armand', 'zutuja@mailinator.com', '$2y$10$wLlPE15zRqB.TBiJFIAC5OTxp4BBXLLlI1nL8dTNbcrk6B75r8XT6', 2),
(19, 'hajar', 'hajar', 'hajar@gmail.com', '$2y$10$MIOGHxXiUhtOhi8XyxdsXeSi/7w2EAgT.TGn5iP9VNwTyzUdt7epe', 2),
(20, 'Hendricks', 'Camden', 'faviqiv@mailinator.com', '$2y$10$AEn8Iio7IzzZGx1lsZoFvuujzKF2Kv1.xEZzCPS.H6y.CpQuk.WMu', 2),
(21, 'Hardy', 'Clementine', 'dolyp@mailinator.com', '$2y$10$CmHFb5snASnD4FYmpAuYoOiE/TmI9hhT43vlrdvkHTcNmCJSaPvay', 2),
(22, 'Hardy', 'Clementine', 'dolyp@mailinator.com', '$2y$10$egdRsX/txAo1V2No/vi4wuwOzOOUfaCpMf5SKA2rkzmzpuLIW/kOm', 2),
(23, 'Meyer', 'Halee', 'halimaz@mailinator.com', '$2y$10$36COpG055meIHnSqU61b8OTmHgIdwLiOE9t9R5YOUwdYRMJLGfiZe', 2),
(24, 'Jacobs', '55', 'xutojeg@mailinator.com', '$2y$10$TOMXXWD6N3Dsxgti8bm62u1g6PmQLU.RnXYqrvZni6eazHWjDSLbW', 2),
(25, 'Vaughan', '55*', 'weliwanupy@mailinator.com', '$2y$10$HsurjDDG2alqUx7/65K6RODmJZQRSBN85ufkB8ADFXgELW.bz.hTW', 2),
(26, 'Austin', '55', 'fonad@mailinator.com', '$2y$10$ACaajSi4c03gzsmMxAiOu.XMCeFQoG.vqFozBhQlzLfYpMlsB9l9i', 2),
(27, 'Bradley', '88/', 'roqecorezu@mailinator.com', '$2y$10$tSvOWFXXEtelYkPglA9aguM3e4Pkogi9ys7wj.LGoKOGfoJcPxeiG', 2),
(28, 'Boyle', '             ', 'locib@mailinator.com', '$2y$10$2o5anf9jChgX/Ud7mnqMxONKiJBnENOfNgExiBWC9pZDR7JoJuUQ2', 2),
(29, 'Workman', '55', 'zevahowup@mailinator.com', '$2y$10$1raxynAsbWd1Hh7LIuFPcuPgXyf2b4tNiZeiq1/Gy8InIWsrosNMa', 2),
(30, 'Workman', '55', 'zevahowup@mailinator.com', '$2y$10$HfYHX9IFwC8KAoSzJhIYJeUHdfaZb0RkEuZExeW82BfI7FqzEcWbO', 2),
(31, 'Workman', '55', 'zevahowup@mailinator.com', '$2y$10$ph4.QPkFT691cERTXtvH.utiKSJ34TR2GRqUiwoVAj5jOFW.A.6.m', 2),
(32, 'Gilbert', '22', 'gavyqufyri@mailinator.com', '$2y$10$oQN8mAUy7oypKrTLTha2y.f8wUEAQg4obCLVCQEzeD9XLmphQ7uLS', 2),
(33, 'El Mansouri', 'Julien', 'julien.el@gmail.com', '$2y$10$0PeyTcf7KcBqBxSCxKRp7uXXklVTz7/nnMy6GqEmrivg114uWM5bG', 1),
(34, 'Gilbert', 'Mari', '50///@mailinator.com', '$2y$10$I/e0lFOEGaVd7Ize1R9yRuN7fuMn4QldAnVg.cNkFskC1t.E2kKlq', 2),
(35, 'Gilbert', 'Mari', '50///@mailinator.com', '$2y$10$vegHs2MB3t.fSCedodVbbuxiEDpVwexww6qxqpe/kTdKbby2yUs2C', 2),
(36, 'Benjamin', 'Octavia', 'hesaqesodu@mailinator.com', '$2y$10$aUclR7DhRTgEiinwPkIvieRoxZbpUeCtZF6n9cWPGTdTKwl/DmJ/m', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id_photo`),
  ADD KEY `id_plat` (`id_plat`);

--
-- Indexes for table `plat`
--
ALTER TABLE `plat`
  ADD PRIMARY KEY (`id_plat`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plat`
--
ALTER TABLE `plat`
  MODIFY `id_plat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`id_plat`) REFERENCES `plat` (`id_plat`) ON DELETE CASCADE;

--
-- Constraints for table `plat`
--
ALTER TABLE `plat`
  ADD CONSTRAINT `plat_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_id_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
