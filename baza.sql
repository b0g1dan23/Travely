CREATE DATABASE IF NOT EXISTS `theriver` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `theriver`;

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
  `images` varchar(225) NOT NULL,
  `Promo?` tinyint(1) NOT NULL,
  `godina_izgradnje` int(12) NOT NULL,
  `brGaraza` int(2) NOT NULL,
  `postanskiBroj` int(11) NOT NULL,
  `opisApartmana` text NOT NULL,
  `ulica` varchar(100) NOT NULL,
  `brUlice` int(11) NOT NULL,
  `dateUploaded` VARCHAR(45),
  `idVlasnika` int(11) NOT NULL,
  `idGrada` int(11) NOT NULL,
  `idHotela` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apartmani`
--

INSERT INTO `apartmani` (`idApartmana`, `nazivApartmana`, `brojSoba`, `maxOsobe`, `kvadratura`, `brKupatila`, `udaljenost_more`, `udaljenost_centar`, `sprat`, `cena`, `Video`, `images`, `Promo?`, `godina_izgradnje`, `brGaraza`, `postanskiBroj`, `opisApartmana`, `ulica`, `brUlice`, `dateUploaded`, `idVlasnika`, `idGrada`, `idHotela`) VALUES
(1, 'Bogdanov Apartman', 3, 4, 48, 3, 200, 150, 3, 50, 'https://www.youtube.com/embed/57tgfKQFI9g', '../images/hotel1.jpg,../images/hotel2.jpg,../images/hotel3.jpg', 1, 2020, 1, 102030, 'Ovo je Bogdanov apartman', 'Vasilis Pavlou', 45, '2022-04-01', 1, 1, 1),
(2, 'Danijelin Apartman', 3, 5, 120, 2, 150, 150, 1, 100, '', '../images/hotel1.jpg,../images/hotel2.jpg,../images/hotel3.jpg', 0, 2022, 2, 103020, 'Opis Danijeline sobe', 'Vasilis Paulou', 11, '2022-04-01', 2, 1, 2),
(3, 'Aleksin Apartman', 4, 6, 150, 2, 300, 100, 4, 75, 'https://www.youtube.com/embed/C3hWzxxNcYM', '../images/hotel1.jpg,../images/hotel2.jpg,../images/hotel3.jpg', 0, 2021, 1, 201030, 'Ovo je Aleksin apartman.', 'Vasilis Paulou', 12, '2022-04-01', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id_blog` int(11) NOT NULL,
  `blog_heading` text DEFAULT NULL,
  `blog_date` date DEFAULT NULL,
  `blog_content` text DEFAULT NULL,
  `blog_bg` varchar(45) NOT NULL,
  `blog_tags` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id_blog`, `blog_heading`, `blog_date`, `blog_content`, `blog_bg`, `blog_tags`) VALUES
(1, 'Top dream destinations', '2022-03-26', 'Vivamus auctor mi eget odio feugiat, quis aliquet velit ornare. Integer egestas sit amet neque sed elementum. Fusce ut turpis felis. Etiam pretium pharetra augue, ac porttitor dolor consequat eget. Cras tempor suscipit enim vehicula ultrices. Mauris sed orci blandit.', 'blog_1.jpg', 'news,hotel,vacation,reservation,booking,video'),
(2, 'Bogi je dosta veliki kralj', '2022-03-23', 'Bogi je stvarno veliki kralj', 'blog_2.jpg', 'clients,review,destinations,swimming pool'),
(3, 'Test 1', '2022-03-09', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sit amet elit a nibh venenatis volutpat. Integer ac malesuada quam. Proin eget lectus massa. Morbi sit amet eros leo. Vestibulum molestie nibh nec congue rhoncus. Aenean sollicitudin semper tortor quis efficitur. Donec at urna dui. Sed euismod, felis ac ultrices dictum, tellus est malesuada felis, et vestibulum risus lorem id.', 'blog_3.jpg', 'review,destinations,swimming pool,news,hotel,vacation,reservation');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(45) NOT NULL,
  `id_blog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `id_blog`) VALUES
(1, 'News', 1),
(2, 'Hotel', 2),
(3, 'Vacation', 1);

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
(1, 'Paralia');

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
(2, 'B&A', '0617651617', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `idNewsletter` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`idNewsletter`, `email`) VALUES
(1, 'bogdan.ytnalog2@gmail.com'),
(2, 'danijela.stevanovic@gmail.com');

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
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id_blog`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD KEY `id_blog` (`id_blog`);

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
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`idNewsletter`);

--
-- Indexes for table `porukaagentu`
--
ALTER TABLE `porukaagentu`
  ADD PRIMARY KEY (`idPoruke`);

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
  MODIFY `idApartmana` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gradovi`
--
ALTER TABLE `gradovi`
  MODIFY `idGrada` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hoteli`
--
ALTER TABLE `hoteli`
  MODIFY `idHotela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `idNewsletter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `porukaagentu`
--
ALTER TABLE `porukaagentu`
  MODIFY `idPoruke` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vlasnici`
--
ALTER TABLE `vlasnici`
  MODIFY `idVlasnika` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`id_blog`) REFERENCES `blogs` (`id_blog`);

--
-- Constraints for table `hoteli`
--
ALTER TABLE `hoteli`
  ADD CONSTRAINT `hoteli_ibfk_1` FOREIGN KEY (`idGrada`) REFERENCES `gradovi` (`idGrada`);
--