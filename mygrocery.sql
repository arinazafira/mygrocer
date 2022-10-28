// Table billing

CREATE TABLE billing (
  billingID int NOT NULL AUTO_INCREMENT,
  name varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  city varchar(100) NOT NULL,
  state varchar(100) NOT NULL,
  zip int NOT NULL,
  PRIMARY KEY (billingID)
)

//Table credit card detail
CREATE TABLE payment (
  paymentID int NOT NULL AUTO_INCREMENT,
  name varchar(100) NOT NULL,
  creditNumber varchar(100) NOT NULL,
  expMonth varchar(100) NOT NULL,
  expYear int(10) NOT NULL,
  cvv int(10) NOT NULL,
  PRIMARY KEY (paymentID)
)

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`) VALUES
(1,'Apple (6pc)','a11','product-images/apple.jpg',10.00),
(2,'Orange (6pc)','a12','product-images/orange.jpg',10.00),
(3,'Grapes (1kg)','a13','product-images/grapes.jpg',15.50),
(4,'Banana (Kg)','a14','product-images/banana.jpg',6.50),
(5,'Cabbage','a15','product-images/cabbage.jpg',6.95),
(6,'Organic tomato (300gm)','a16','product-images/tomato.jpg',5.90),
(7,'Cauliflower (500g)','a17','product-images/cauliflower.jpg',4.95),
(8,'Capsicum (180gm)','a18','product-images/capsicum.jpg',3.10);

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`) VALUES
(9,'Loaf Bread','a19','product-images/breads.png',4.00 ),
(10,'Donuts (6 pcs)','a20','product-images/donut.png',8.00),
(11,'Croissant','a21','product-images/croissant.png',2.00),
(12,'Egg Tart (4pcs)','a22','product-images/egg tart.png',4.00),
(13,'Muffin (2pcs)','a23','product-images/muffin.png',4.00),
(14,'Indulgence Chocolate Cake','a24','product-images/choccake.png',9.00),
(15,'Classic Cheese Cake','a25','product-images/cheesecake.png',7.50),
(16,'Red Velvet Cake','a26','product-images/rvcake.png',7.50);

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`) VALUES
(17,'Dutch Lady Chocolate Milk(1L)','a27','https://www.dutchlady.com.my/wp-content/uploads/2020/09/chocolate-flavoured-milk-uht-1l.jpg',5.50),
(18,'Dutch Lady Full Cream Milk(1L)','a28','https://www.dutchlady.com.my/wp-content/themes/dutchlady/assets/goodness-of-milk/images/s2-ducthlady-full-cream-milk.png',5.00),
(19,'Dutch Lady Kurma Milk(1L)','a29','https://www.dutchlady.com.my/wp-content/uploads/2020/09/kurma-flavoured-milk-uht-200ml.jpg',6.00),
(20,'Dutch Lady Strawberry Milk(1L)','a30','https://www.dutchlady.com.my/wp-content/uploads/2020/09/strawberry-flavoured-milk-uht-1l.jpg',5.50),
(21,'Mozarella Cheese 200g/pack','a31','product-images/mozarella.jpg',15.90),
(22,'Chesdale Cheese Slice','a32','https://cdn2.webdamdb.com/md_synpszsuLV51.png?1598496636',9.50),
(23,'Marigold Mixed Berries Yogurt 1kg','a33','https://mygroser.s3.ap-southeast-1.amazonaws.com/productImages/1000X1000/1585982630039-MARIGOLD%200%25%20Fat%20Yogurt%20Mixed%20Berry_1kg.jpeg',10.30),
(24,'Dutch Lady Blueberry Yogurt','a34','https://cdn.shopify.com/s/files/1/0095/1651/5390/products/000471-1-1_800x.jpg?v=1615976197',4.20),
(25,'Chicken Cocktail Sausage 800g','a35','https://www.kedaiayamas.my/wp-content/uploads/2019/06/1464533625.png',12.75),
(26,'AYAMAS H & S Chicken (850g)','a36','https://secure.ap-tescoassets.com/assets/MY/514/9556276020514/ShotType1_540x540.jpg',12.30 ),
(27,'KAWAN Frozen Sweet Corn (500g)','a37','https://dhimart.mv/pub/media/catalog/product/cache/72053ff7aae91ace1421f31b9ef78d94/k/a/kawan_frozen_sweet_corn_500g.png',5.00),
(28,'Frozen Mixed Vegetables 500g','a38','https://www.desasegar.com.my/storage/media/filemanager/frozen%20vegetable/kawan%20mixed%20vege.png',4.20);

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`) VALUES
(29,'100 plus (1.5L)','a39','product-images/100plus.png',3.80 ),
(30,'Coca Cola (can)','a40','product-images/cola-removebg-preview.png',2.00),
(31,'Fanta Orange (can)','a41','product-images/fantaorange-removebg-preview.png',1.80),
(32,'Tinge Grape (250ml)','a42','product-images/tinge.png',2.00),
(33,'Ribena (300ml)','a43','product-images/ribena.png',3.00),
(34,'Tropicana Twister(500ml)','a44','product-images/tropicanajuice-removebg-preview.png',6.50),
(35,'Mango Lassi (250ml)','a45','product-images/mangolassi.png',3.50),
(36,'Minute Maid Strawberry (250ml)','a46','product-images/strawberryjuice.jpg',4.50);

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`) VALUES
(37,'Maggi Hot Cup Curry (6pc)','a47','product-images/instantnoodle.jpg',10.80 ),
(38,'Nestum 3in1 Oats (30g x 8s)','a48','product-images/instantoat.jpg',6.60),
(39,'Nestle Koko Krunch (330g)','a49','product-images/cereal.jpg',10.60),
(40,'San Remo Alfredo Spaghetti (120g)','a50','product-images/spaghetti.jpg',4.45),
(41,'Sunflower Oil (1kg)','a51','product-images/oil.jpg',13.70),
(42,'Table Salt (700 gm)','a52','product-images/salt.jpg',9.10),
(43,'Egg /30s','a53','product-images/egg.jpg',10.20),
(44,'Wheat Flour (1kg)','a54','product-images/flour.jpg',16.00);

