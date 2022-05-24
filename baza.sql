-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2022 at 09:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `theriver`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartmani`
--

CREATE TABLE `apartmani` (
  `idApartmana` int(12) NOT NULL,
  `nazivApartmana` varchar(45) NOT NULL,
  `brojSoba` int(3) NOT NULL,
  `maxOsobe` int(4) NOT NULL,
  `kvadratura` int(10) NOT NULL,
  `brKupatila` int(11) NOT NULL,
  `udaljenost_more` int(12) NOT NULL,
  `udaljenost_centar` int(12) NOT NULL,
  `sprat` int(5) NOT NULL,
  `cena` int(11) NOT NULL,
  `Video` varchar(225) NOT NULL,
  `images` text NOT NULL,
  `Promo?` tinyint(1) NOT NULL,
  `godina_izgradnje` int(12) NOT NULL,
  `brGaraza` int(2) NOT NULL,
  `postanskiBroj` int(11) NOT NULL,
  `opisApartmana` text NOT NULL,
  `ulica` varchar(100) NOT NULL,
  `brUlice` int(11) NOT NULL,
  `dateUploaded` date DEFAULT current_timestamp(),
  `idVlasnika` int(11) NOT NULL,
  `idGrada` int(11) NOT NULL,
  `idHotela` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apartmani`
--

INSERT INTO `apartmani` (`idApartmana`, `nazivApartmana`, `brojSoba`, `maxOsobe`, `kvadratura`, `brKupatila`, `udaljenost_more`, `udaljenost_centar`, `sprat`, `cena`, `Video`, `images`, `Promo?`, `godina_izgradnje`, `brGaraza`, `postanskiBroj`, `opisApartmana`, `ulica`, `brUlice`, `dateUploaded`, `idVlasnika`, `idGrada`, `idHotela`) VALUES
(1, 'Bogdanov Apartman', 3, 4, 48, 3, 200, 150, 3, 50, 'https://www.youtube.com/embed/y9j-BL5ocW8', '../images/hotel1.jpg,../images/hotel2.jpg,../images/hotel3.jpg', 1, 2020, 1, 102030, 'Ovo je Bogdanov apartman', 'Vasilis Pavlou', 45, '2022-04-01', 1, 3, 1),
(2, 'Danijelin Apartman', 3, 5, 120, 2, 150, 150, 1, 100, '', 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=80&raw_url=true&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170,../images/hotel2.jpg,https://images.unsplash.com/photo-1596394516093-501ba68a0ba6?ixlib=rb-1.2.1&raw_url=true&q=80&fm=jpg&crop=entropy&cs=tinysrgb&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170', 0, 2022, 2, 103020, 'Opis Danijeline sobe', 'Vasilis Paulou', 11, '2022-04-01', 2, 1, 1),
(3, 'Aleksin Apartman', 4, 6, 150, 2, 300, 100, 4, 75, 'https://www.youtube.com/embed/y9j-BL5ocW8', 'https://images.unsplash.com/photo-1613977257592-4871e5fcd7c4?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=80&raw_url=true&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170,../images/hotel2.jpg,../images/hotel3.jpg', 0, 2021, 1, 201030, 'Ovo je Aleksin apartman.', 'Vasilis Paulou', 12, '2022-04-01', 1, 6, 2),
(6, 'Zivojinov Apartman', 5, 10, 150, 3, 150, 200, 4, 94, '', 'https://images.unsplash.com/photo-1582719508461-905c673771fd?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=80&raw_url=true&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1025,https://images.unsplash.com/photo-1522798514-97ceb8c4f1c8?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=80&raw_url=true&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=735,https://images.unsplash.com/photo-1562790351-d273a961e0e9?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=80&raw_url=true&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=765', 1, 2018, 3, 1560, 'Ovo je opis Zivojinovog apartmana', 'Urosa Kostica ', 23, '2022-05-22', 2, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `blogovi`
--

CREATE TABLE `blogovi` (
  `id_blog` int(11) NOT NULL,
  `naslov` text DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `sadrzaj` text DEFAULT NULL,
  `pozadina` text NOT NULL,
  `tagovi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogovi`
--

INSERT INTO `blogovi` (`id_blog`, `naslov`, `datum`, `sadrzaj`, `pozadina`, `tagovi`) VALUES
(1, 'Beautiful Traveling Destinations', '2022-03-09', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sit amet elit a nibh venenatis volutpat. Integer ac malesuada quam. Proin eget lectus massa. Morbi sit amet eros leo. Vestibulum molestie nibh nec congue rhoncus. Aenean sollicitudin semper tortor quis efficitur. Donec at urna dui. Sed euismod, felis ac ultrices dictum, tellus est malesuada felis, et vestibulum risus lorem id.', '../images/blog_1.jpg', 'review,destinations,swimming pool,news,hotel,vacation,reservation'),
(2, 'Check out what we have', '2022-03-09', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sit amet elit a nibh venenatis volutpat. Integer ac malesuada quam. Proin eget lectus massa. Morbi sit amet eros leo. Vestibulum molestie nibh nec congue rhoncus. Aenean sollicitudin semper tortor quis efficitur. Donec at urna dui. Sed euismod, felis ac ultrices dictum, tellus est malesuada felis, et vestibulum risus lorem id.', '../images/blog_2.jpg', 'review,destinations,swimming pool'),
(3, 'Test', '2022-03-09', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sit amet elit a nibh venenatis volutpat. Integer ac malesuada quam. Proin eget lectus massa. Morbi sit amet eros leo. Vestibulum molestie nibh nec congue rhoncus. Aenean sollicitudin semper tortor quis efficitur. Donec at urna dui. Sed euismod, felis ac ultrices dictum, tellus est malesuada felis, et vestibulum risus lorem id.', '../images/blog_3.jpg', 'review,destinations,swimming pool,snow');

-- --------------------------------------------------------

--
-- Table structure for table `blogovikategorije`
--

CREATE TABLE `blogovikategorije` (
  `id_blog` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogovikategorije`
--

INSERT INTO `blogovikategorije` (`id_blog`, `cat_id`) VALUES
(1, 2),
(2, 1),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `gradovi`
--

CREATE TABLE `gradovi` (
  `idGrada` int(4) NOT NULL,
  `nazivGrada` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gradovi`
--

INSERT INTO `gradovi` (`idGrada`, `nazivGrada`) VALUES
(1, 'Paralia'),
(2, 'Olympic Beach'),
(3, 'Leptokarija'),
(5, 'Neos Marmaras'),
(6, 'Mikonos');

-- --------------------------------------------------------

--
-- Table structure for table `hoteli`
--

CREATE TABLE `hoteli` (
  `idHotela` int(11) NOT NULL,
  `nazivHotela` varchar(45) NOT NULL,
  `brTelefona` varchar(45) NOT NULL,
  `idGrada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hoteli`
--

INSERT INTO `hoteli` (`idHotela`, `nazivHotela`, `brTelefona`, `idGrada`) VALUES
(1, 'GENERAL', '/', 1),
(2, 'B&A', '0617651617', 1),
(3, 'Star Hotel', '/', 2),
(4, 'Hotel Lux', '069816541', 3),
(7, 'Novi Hotel', '06041633', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`cat_id`, `cat_title`) VALUES
(1, 'News'),
(2, 'Hotel'),
(3, 'Vacation');

-- --------------------------------------------------------

--
-- Table structure for table `porukaagentu`
--

CREATE TABLE `porukaagentu` (
  `idPoruke` int(11) NOT NULL,
  `imePosiljaoca` varchar(45) NOT NULL,
  `telefonPosiljaoca` varchar(25) NOT NULL,
  `emailPosiljaoca` varchar(85) NOT NULL,
  `poruka` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `porukaagentu`
--

INSERT INTO `porukaagentu` (`idPoruke`, `imePosiljaoca`, `telefonPosiljaoca`, `emailPosiljaoca`, `poruka`) VALUES
(1, 'Bogdan', '+381617651617', 'bogdan.ytnalog2@gmail.com', 'Hello, I am interested in Danijelin Apartman'),
(3, 'Bogdan', '+381617651617', 'bogdan.ytnalog2@gmail.com', 'Hello, I am interested in Bogdanov Apartman'),
(11, 'Bogdan', '+381617651617', 'bogdan.ytnalog2@gmail.com', 'Hello, I am interested in Aleksin Apartman');

-- --------------------------------------------------------

--
-- Table structure for table `poste`
--

CREATE TABLE `poste` (
  `idNewsletter` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poste`
--

INSERT INTO `poste` (`idNewsletter`, `email`) VALUES
(1, 'bogdan.ytnalog2@gmail.com'),
(2, 'danijela.stevanovic@gmail.com'),
(23, 'aleksa.stevanovic@gmail.com'),
(27, 'probaMilijarditiPut@gmail.com'),
(28, 'akoseodovoganeubijem@gmail.com'),
(29, 'necuniodcega@gmail.com'),
(30, 'poceosamdasanjamcrud@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `vlasnici`
--

CREATE TABLE `vlasnici` (
  `idVlasnika` int(4) NOT NULL,
  `Ime` varchar(25) NOT NULL,
  `Prezime` varchar(45) NOT NULL,
  `BrTelefona` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vlasnici`
--

INSERT INTO `vlasnici` (`idVlasnika`, `Ime`, `Prezime`, `BrTelefona`) VALUES
(1, 'Bogdan', 'Stevanovic', '0617651617'),
(2, 'Danijela', 'Stevanovic', '0601579450');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartmani`
--
ALTER TABLE `apartmani`
  ADD PRIMARY KEY (`idApartmana`),
  ADD KEY `idVlasnika` (`idVlasnika`),
  ADD KEY `idGrada` (`idGrada`),
  ADD KEY `idHotela` (`idHotela`);

--
-- Indexes for table `blogovi`
--
ALTER TABLE `blogovi`
  ADD PRIMARY KEY (`id_blog`);

--
-- Indexes for table `blogovikategorije`
--
ALTER TABLE `blogovikategorije`
  ADD PRIMARY KEY (`id_blog`,`cat_id`),
  ADD UNIQUE KEY `id_blog_2` (`id_blog`,`cat_id`),
  ADD UNIQUE KEY `id_blog` (`id_blog`,`cat_id`) USING BTREE;

--
-- Indexes for table `gradovi`
--
ALTER TABLE `gradovi`
  ADD PRIMARY KEY (`idGrada`);

--
-- Indexes for table `hoteli`
--
ALTER TABLE `hoteli`
  ADD PRIMARY KEY (`idHotela`),
  ADD KEY `idGrada` (`idGrada`);

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `porukaagentu`
--
ALTER TABLE `porukaagentu`
  ADD PRIMARY KEY (`idPoruke`);

--
-- Indexes for table `poste`
--
ALTER TABLE `poste`
  ADD PRIMARY KEY (`idNewsletter`);

--
-- Indexes for table `vlasnici`
--
ALTER TABLE `vlasnici`
  ADD PRIMARY KEY (`idVlasnika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apartmani`
--
ALTER TABLE `apartmani`
  MODIFY `idApartmana` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blogovi`
--
ALTER TABLE `blogovi`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gradovi`
--
ALTER TABLE `gradovi`
  MODIFY `idGrada` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hoteli`
--
ALTER TABLE `hoteli`
  MODIFY `idHotela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategorije`
--
ALTER TABLE `kategorije`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `porukaagentu`
--
ALTER TABLE `porukaagentu`
  MODIFY `idPoruke` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `poste`
--
ALTER TABLE `poste`
  MODIFY `idNewsletter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `vlasnici`
--
ALTER TABLE `vlasnici`
  MODIFY `idVlasnika` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apartmani`
--
ALTER TABLE `apartmani`
  ADD CONSTRAINT `apartmani_ibfk_1` FOREIGN KEY (`idVlasnika`) REFERENCES `vlasnici` (`idVlasnika`),
  ADD CONSTRAINT `apartmani_ibfk_2` FOREIGN KEY (`idGrada`) REFERENCES `gradovi` (`idGrada`),
  ADD CONSTRAINT `apartmani_ibfk_3` FOREIGN KEY (`idHotela`) REFERENCES `hoteli` (`idHotela`);

--
-- Constraints for table `blogovikategorije`
--
ALTER TABLE `blogovikategorije`
  ADD CONSTRAINT `blogovikategorije_ibfk_1` FOREIGN KEY (`id_blog`) REFERENCES `blogovi` (`id_blog`);

--
-- Constraints for table `hoteli`
--
ALTER TABLE `hoteli`
  ADD CONSTRAINT `hoteli_ibfk_1` FOREIGN KEY (`idGrada`) REFERENCES `gradovi` (`idGrada`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
