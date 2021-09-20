-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2021 at 01:48 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `egrocery`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `image`, `qty`, `total`, `code`) VALUES
(109, 'potato', '40', 'http://www.frutas-hortalizas.com/img/fruites_verdures/presentacio/59.jpg', 2, '80', '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `dis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `dis`) VALUES
(1, 'Vegetables', 'img/v.jpg', 'Vegetable, in the broadest sense, any kind of plant life or plant product, namely “vegetable matter”; in common, narrow usage, the term vegetable usually refers to the fresh edible portions of certain herbaceous plants—roots, stems, leaves, flowers, fruit'),
(2, 'Fish and meat', 'https://chaldn.com/_mpimage/meat-fish?src=https%3A%2F%2Feggyolk.chaldal.com%2Fapi%2FPicture%2FRaw%3FpictureId%3D23737&q=low&v=1', 'By some definitions, fish is considered meat, and by others, it isn\'t. Fish is the flesh of an animal used for food, and by that definition, it\'s meat. However, many religions don\'t consider it meat'),
(3, 'Grain items', 'https://blog.partnersforyourhealth.com/hubfs/enriched-grains.jpg', 'Any food made from wheat, rice, oats, cornmeal, barley, or another cereal grain is a grain product. Bread, pasta, breakfast cereals, grits, and tortillas are examples of grain products. Foods such as popcorn, rice, and oatmeal are also included in the Gra'),
(4, 'Fruits', 'https://media.istockphoto.com/photos/assortment-of-colorful-ripe-tropical-fruits-top-view-picture-id995518546?k=6&m=995518546&s=612x612&w=0&h=jUqcvzOQ4onSN5D_Dd8RJFReuO87-0WpB9RXgeju_Kg=', 'This is fresh product');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(8) NOT NULL,
  `content` text NOT NULL,
  `comment_by` varchar(11) NOT NULL,
  `thread_id` int(8) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `comment_by`, `thread_id`, `comment_time`) VALUES
(104, '', 'tamim 23', 1, '2021-07-14 22:13:15'),
(105, 'this is great product', 'tamim 23', 3, '2021-07-14 22:13:50'),
(106, 'its a good product', 'sadik', 1, '2021-07-15 08:07:38'),
(107, 'its a good product', 'sadik', 5, '2021-08-28 20:10:11');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `dateofbirth` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `username`, `dateofbirth`, `password`, `gender`) VALUES
(2, 'Rayhan ', '17-35014-2@student.aiub.edu', 'sadik', '1998-12-28', '1234', 'Male'),
(3, 'Rayhan ', 'sadikhimel04@gmail.com', 'himel', '1998-12-29', '1234', 'Male'),
(4, 'tamim', 'tamim@gmail.com', 'tamim 23', '1998-12-27', '1234', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pmode` varchar(255) NOT NULL,
  `products` varchar(255) NOT NULL,
  `amount_paid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `address`, `pmode`, `products`, `amount_paid`) VALUES
(8, 'Rayhan ', '17-35014-2@student.aiub.edu', '					    ', 'cod', 'potato(2),onion(1)', '130'),
(13, 'Rayhan ', '17-35014-2@student.aiub.edu', '					    ', 'cod', 'potato(2)', '80'),
(14, 'Rayhan ', '17-35014-2@student.aiub.edu', '					    ', 'cod', 'Tomato(2)', '90'),
(15, 'Rayhan ', '17-35014-2@student.aiub.edu', '					    ', 'cod', 'potato(2)', '80'),
(16, 'Rayhan ', '17-35014-2@student.aiub.edu', '					    ', 'cod', 'onion(2)', '100'),
(17, 'Rayhan ', '17-35014-2@student.aiub.edu', '					    ', 'cod', 'onion(3)', '150');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dis` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `cat_id` int(3) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `dis`, `price`, `cat_id`, `image`) VALUES
(1, 'potato', 'The potato is one of some 150 tuber-bearing species of the genus Solanum (a tuber is the swollen end of an underground stem). The compound leaves are spirally arranged; each leaf is 20–30 cm (about 8–12 inches) long and consists of a terminal leaflet and ', '40', 1, 'http://www.frutas-hortalizas.com/img/fruites_verdures/presentacio/59.jpg'),
(3, 'onion', ' onion is a round vegetable with a brown skin that grows underground. It has many white layers on its inside which have a strong, sharp smell and taste. ... It is made with fresh minced meat, cooked with onion and a rich tomato sauce', '50', 1, 'https://www.collinsdictionary.com/images/full/onion_265790360.jpg'),
(4, 'Tomato', 'The tomato is the edible berry of the plant Solanum lycopersicum, commonly known as a tomato plant. The species originated in western South America and Central America. ... Tomatoes are a significant source of umami flavor. The tomato is consumed in diver', '45', 1, 'https://post.healthline.com/wp-content/uploads/2020/09/tomatoes-1200x628-facebook-1200x628.jpg'),
(5, 'Cauliflower', 'Cauliflowers are annual plants that reach about 0.5 metre (1.5 feet) tall and bear large rounded leaves that resemble collards (Brassica oleracea, variety acephala). As desired for food, the terminal cluster forms a firm, succulent “curd,” or head, that i', '30', 1, 'https://i0.wp.com/cdn-prod.medicalnewstoday.com/content/images/articles/282/282844/cauliflower-is-rich-in-nutrients-and-fiber.jpg?w=1155&h=1541'),
(6, 'Broccoli', 'Broccoli, Brassica oleracea, is an herbaceous annual or biennial grown for its edible flower heads which are used as a vegetable. The broccoli plant has a thick green stalk, or stem, which gives rise to thick, leathery, oblong leaves which are gray-blue t', '55', 1, 'https://cdn.britannica.com/15/136015-050-42C0D895/Broccoli.jpg'),
(7, 'Ilish', 'The ilish (Tenualosa ilisha) (Bengali: ইলিশ, romanized: iliš), also known as the ilisha, hilsa, hilsa herring or hilsa shad, is a species of fish related to the herring, in the family Clupeidae. It is a very popular and sought-after food fish in the India', '1000', 2, 'https://assetsds.cdnedge.bluemix.net/sites/default/files/styles/amp_metadata_content_image_min_696px_wide/public/feature/images/hilsa-fish.jpg?itok=bmg3seSs'),
(8, 'Chingri', 'Prawn (chingri) crustaceans related to crabs and lobsters, of the order Decapoda, found in all types of waterbody throughout the world. Some species live near the shore, hiding in mud or sand, or in crevices of the stones; some others swim about in groups', '500', 2, 'https://s3.ap-south-1.amazonaws.com/diingdong/BAGDA%20BORO%20final.jpg'),
(9, 'Beef', 'Beef, flesh of mature cattle, as distinguished from veal, the flesh of calves. ... The best beef is obtained from early maturing, special beef breeds. High-quality beef has firm, velvety, fine-grained lean, bright red in colour and well-marbled', '500', 2, 'https://www.jessicagavin.com/wp-content/uploads/2020/06/cuts-of-beef-12.jpg'),
(10, 'Chicken', 'A chicken is a bird. One of the features that differentiate it from most other birds is that it has a comb and two wattles. The comb is the red appendage on the top of the head, and the wattles are the two appendages under the chin. ... In Latin, gallus m', '200', 2, 'https://5.imimg.com/data5/WD/XD/BG/SELLER-16378183/whole-cleaned-chicken-skin-less-500x500.jpg'),
(11, 'Mutton', 'Mutton is meat from a sheep over two years old, and has less tender flesh. In general, the darker the colour, the older the animal', '700', 2, 'https://www.collinsdictionary.com/images/full/mutton_343543736.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
