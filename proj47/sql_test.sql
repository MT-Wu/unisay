SELECT * FROM `orders` o
JOIN `order_details` d ON o.sid=d.order_sid
JOIN `products` p ON p.sid=d.product_sid
WHERE o.member_sid=1;

-- 查看某個會員的訂購記錄
SELECT * FROM `orders` o JOIN `order_details` d ON o.sid=d.order_sid WHERE o.member_sid=1;

SELECT * FROM `orders` o JOIN `order_details` d ON o.sid=d.order_sid;

SELECT * FROM `products` WHERE `sid` IN (10,14,21,6) ORDER BY RAND();

SELECT * FROM `products` WHERE `sid` IN (10,14,21,6) ORDER BY sid DESC;

SELECT * FROM `products` WHERE `sid` IN (10,14,21,6);

SELECT * FROM `products` WHERE `author` LIKE '%科技%' OR `bookname` LIKE '%科技%';

SELECT * FROM `products` WHERE `author` LIKE '%計%' OR `bookname` LIKE '%計%';

SELECT * FROM `products` WHERE `author` LIKE '%陳%';

SELECT c1.*, c2.name parent_name FROM `categories` c1 LEFT JOIN `categories` c2 ON c1.parent_sid=c2.sid;

SELECT p.sid p_sid, c.sid c_sid, p.bookname FROM products p JOIN categories c ON p.category_sid=c.sid

SELECT p.*, c.`name` `cate_name` FROM `products` p LEFT JOIN `categories` c ON p.`category_sid`=c.`sid`;

SELECT p.*, c.`name` `cate_name` FROM `products` p INNER JOIN `categories` c ON p.`category_sid`=c.`sid`;

SELECT p.*, c.`name` AS `cate_name` FROM `products` AS p JOIN `categories` AS c ON p.`category_sid`=c.`sid`;

SELECT `products`.*, `categories`.`name` FROM `products` JOIN `categories` ON `products`.`category_sid`=`categories`.`sid`;

SELECT * FROM `products` JOIN `categories` ON `products`.`category_sid`=`categories`.`sid`;

SELECT * FROM `products` JOIN `categories`; -- 通常不這樣用
-- -------------------------------------------
