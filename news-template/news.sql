-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2023 at 11:26 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(31, 'sports', 2),
(32, 'Entertainment', 2),
(33, 'politice', 1),
(37, 'Business', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(54, 'headin g 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non volutpat tellus. Fusce tristique eu nunc in mattis. Suspendisse potenti. Vivamus vitae dapibus lorem. Nulla facilisi. Fusce quis metus id libero bibendum placerat. Proin tristique consectetur ultrices. Vivamus ac laoreet quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed euismod pharetra erat, nec cursus ex bibendum at. Maecenas luctus dolor sit amet velit bibendum, nec sollicitudin velit tempus. Sed non vestibulum quam, ac tincidunt neque. In hac habitasse platea dictumst. Curabitur venenatis lorem eu tincidunt consectetur.', '31', '12 Sep, 2023', 32, 'boy1.png'),
(51, 'headin 2 ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non volutpat tellus. Fusce tristique eu nunc in mattis. Suspendisse potenti. Vivamus vitae dapibus lorem. Nulla facilisi. Fusce quis metus id libero bibendum placerat. Proin tristique consectetur ultrices. Vivamus ac laoreet quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed euismod pharetra erat, nec cursus ex bibendum at. Maecenas luctus dolor sit amet velit bibendum, nec sollicitudin velit tempus. Sed non vestibulum quam, ac tincidunt neque. In hac habitasse platea dictumst. Curabitur venenatis lorem eu tincidunt consectetur.', '32', '12 Sep, 2023', 32, 'boy2.png'),
(52, 'headin 3 ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non volutpat tellus. Fusce tristique eu nunc in mattis. Suspendisse potenti. Vivamus vitae dapibus lorem. Nulla facilisi. Fusce quis metus id libero bibendum placerat. Proin tristique consectetur ultrices. Vivamus ac laoreet quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed euismod pharetra erat, nec cursus ex bibendum at. Maecenas luctus dolor sit amet velit bibendum, nec sollicitudin velit tempus. Sed non vestibulum quam, ac tincidunt neque. In hac habitasse platea dictumst. Curabitur venenatis lorem eu tincidunt consectetur.', '33', '12 Sep, 2023', 32, 'girl1.jpg'),
(53, 'headin 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non volutpat tellus. Fusce tristique eu nunc in mattis. Suspendisse potenti. Vivamus vitae dapibus lorem. Nulla facilisi. Fusce quis metus id libero bibendum placerat. Proin tristique consectetur ultrices. Vivamus ac laoreet quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed euismod pharetra erat, nec cursus ex bibendum at. Maecenas luctus dolor sit amet velit bibendum, nec sollicitudin velit tempus. Sed non vestibulum quam, ac tincidunt neque. In hac habitasse platea dictumst. Curabitur venenatis lorem eu tincidunt consectetur.', '37', '12 Sep, 2023', 32, 'girl2.jpg'),
(55, 'aot', '.The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\n5\r\n	paragraphs\r\n	words\r\n	bytes\r\n	lists\r\n	Start with \'Lorem\r\nipsum dolor sit amet...\'\r\n\r\nTranslations: Can you help translate this site into a foreign language ? Please email us with details if you can help.\r\nThere is a set of mock banners available here in three colours and in a range of standard banner sizes:\r\nBannersBannersBanners\r\nDonate: If you use this site regularly and would like to help keep the site on the Internet, please consider donating a small sum to help pay for the hosting and bandwidth bill. There is no minimum donation, any sum is appreciated - click here to donate using PayPal. Thank you for your support.\r\nDonate Bitcoin: 16UQLq1HZ3CNwhvgrarV6pMoA2CDjb4tyF\r\nNodeJS Python Interface GTK Lipsum Rails .NET Groovy\r\nThe standard Lorem Ipsum passage, used since the 1500s\r\n\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"\r\n\r\nSection 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"\r\n\r\n1914 translation by H. Rackham\r\n\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"\r\n\r\nSection 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"\r\n\r\n1914 translation by H. Rackham\r\n\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"\r\n\r\nhelp@lipsum.com\r\nPrivacy Policy · Do Not Sell My Personal Information · Change Consent\r\n', '32', '13 Sep, 2023', 32, 'profile.png'),
(56, 'Lorem Ipsum is simply dummy text of the printing and', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '31', '13 Sep, 2023', 38, '4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `website_name` varchar(50) NOT NULL,
  `website_img` varchar(100) NOT NULL,
  `website_desc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `website_name`, `website_img`, `website_desc`) VALUES
(1, 'news', 'news.jpg', '© Copyright 2023 News | Powered by shaharul siyam'),
(2, 'news', 'news.jpg', '© Copyright 2023 News | Powered by shaharul siyam'),
(3, 'news', 'news.jpg', '© Copyright 2023 News | Powered by shaharul siyam'),
(4, 'marvel website', 'download.png', '© Copyright 2023 News | Powered by shaharul siyam'),
(5, 'frank studio', 'download.png', '© Copyright 2023 frank studio');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(35, 'md', 'shohan', 'mdshohan', '19daf4e4e9e22a42a943112410dcc44d0c8a7cb9', 0),
(34, 'abu ', 'toha', 'abutoha', '7bd42225550789ae0f3cb7c5e10ac2bd30c22254', 0),
(33, 'mr', 'frank', 'mrfrank', '6ef84466205307dd7ae28dc88b2e84a25331079e', 1),
(32, 'shaharul', 'siyam', 'shaharulsiyam', 'c31054e82ba57a210e7dcd957b984b1a188f1634', 1),
(31, 'rafiul', 'islam', 'rafiul islam', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0),
(30, 'abrar', 'johin', 'abrarjohin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0),
(36, 'rifat ', 'hasan', 'rifathasan', '204fefa1a683f85702e3181b8087108f84739bb9', 0),
(37, 'siyam', 'siyam', 'siyam', '9a87bbcc7e541e998056af6d015239fabb311dc4', 0),
(38, 'test', 'test', 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
