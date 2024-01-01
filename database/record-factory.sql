-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jan 2024 pada 12.21
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdpl2`
--
CREATE DATABASE IF NOT EXISTS `pdpl2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pdpl2`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `type` enum('expense','income') NOT NULL,
  `datetime` datetime NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `records`
--

INSERT INTO `records` (`id`, `amount`, `type`, `datetime`, `description`, `category`) VALUES
(1, '100.50', 'income', '2023-01-01 12:00:00', 'Salary payment', 'Salary'),
(2, '30.25', 'expense', '2023-01-02 15:30:00', 'Grocery shopping', 'Food'),
(3, '50.00', 'expense', '2023-01-03 09:45:00', 'Gas refill', 'Transportation'),
(4, '120.75', 'income', '2023-01-04 14:00:00', 'Freelance project', 'Freelance'),
(5, '20.50', 'expense', '2023-01-05 18:20:00', 'Coffee with friends', 'Entertainment'),
(6, '80.00', 'income', '2023-01-06 11:10:00', 'Part-time job', 'Part-time'),
(7, '40.00', 'expense', '2023-01-07 17:30:00', 'Dinner at a restaurant', 'Food'),
(8, '200.00', 'income', '2023-01-08 08:45:00', 'Investment return', 'Investment'),
(9, '15.75', 'expense', '2023-01-09 13:15:00', 'Bus fare', 'Transportation'),
(10, '90.50', 'income', '2023-01-10 16:40:00', 'Consulting fee', 'Consulting'),
(13, '90.50', 'income', '2023-01-10 16:40:00', 'Consulting fee', 'Consulting'),
(15, '100.00', 'income', '2024-01-01 00:29:00', 'Salary', 'salary'),
(16, '10.00', 'expense', '2024-01-01 00:29:00', 'Restaurant', 'food');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wallets`
--

CREATE TABLE `wallets` (
  `id` int(11) NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `wallets`
--

INSERT INTO `wallets` (`id`, `amount`) VALUES
(1, '1000.50');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
