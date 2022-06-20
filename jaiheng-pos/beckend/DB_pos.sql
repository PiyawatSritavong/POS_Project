CREATE TABLE `users` (
  `users_id` int PRIMARY KEY AUTO_INCREMENT,
  `usersname` varchar(255),
  `email` varchar(255),
  `password` varchar(255),
  `image` varchar(255),
  `role` varchar(255),
  `gender` varchar(255)
);

CREATE TABLE `sales` (
  `sale_id` int PRIMARY KEY AUTO_INCREMENT,
  `receipt` varchar(255),
  `total_price` decimal,
  `qty_total` int,
  `selling_time` datetime,
  `users_id` int,
  `products_id` int
);

CREATE TABLE `products` (
  `products_id` int PRIMARY KEY AUTO_INCREMENT,
  `products_name` varchar(255),
  `details` varchar(255),
  `barcode` varchar(255),
  `qty` int,
  `price` decimal,
  `image` varchar(255),
  `size` varchar(255),
  `comments` varchar(255),
  `vat` int,
  `data` datetime
);

ALTER TABLE `sales` ADD FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`);

ALTER TABLE `sales` ADD FOREIGN KEY (`products_id`) REFERENCES `products` (`products_id`);
