-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生時間： 2016 年 12 月 23 日 10:39
-- 伺服器版本: 10.1.19-MariaDB
-- PHP 版本： 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `unisay`
--

-- --------------------------------------------------------

--
-- 資料表結構 `members`
--

CREATE TABLE `members` (
  `sid` int(11) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `certification` varchar(255) NOT NULL,
  `activated` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `sid` int(11) NOT NULL,
  `member_sid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `order_details`
--

CREATE TABLE `order_details` (
  `sid` int(11) NOT NULL,
  `order_sid` int(11) NOT NULL,
  `product_sid` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `products`
--

CREATE TABLE `products` (
  `sid` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `pic_id` varchar(255) NOT NULL,
  `introduction` varchar(1000) NOT NULL,
  `animal` varchar(255) NOT NULL,
  `mottotype` varchar(255) NOT NULL,
  `motto` varchar(255) NOT NULL,
  `motto_translate` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `mbti` varchar(255) NOT NULL,
  `mbti_result` varchar(255) NOT NULL,
  `mbti_answer` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `products`
--

INSERT INTO `products` (`sid`, `productname`, `pic_id`, `introduction`, `animal`, `mottotype`, `motto`, `motto_translate`, `author`, `price`, `mbti`, `mbti_result`, `mbti_answer`) VALUES
(1, '櫻桃木', '01_cherry', '櫻桃木是高級木料，木紋是直木紋。 櫻桃木主要分佈於美國東部各地區。櫻桃木的心材顏色由艷紅色至棕紅色，邊材呈奶白色。櫻桃木天生含有棕色樹心斑點和細小的樹膠窩，紋理細膩、清晰、拋光性好，塗裝效果好，適合做高檔家居用品。機械加工性能好，乾燥尚算快速，乾燥時收縮量大，但乾燥后尺寸穩定性很好。', 'cherry wood', '1', '1', '1', '1', 800, '1', '1', '1'),
(2, '白橡木', '02_oak', '白橡木和紅橡木都是高檔實木家具的主要原材料，大多來自美國北部的白橡木和紅橡木是混合生長林木。近年來，北歐簡約風格和日式簡約風格的原木色家具非常受到歡迎，而白橡木則是原木色家具和飾品的首選木材。白橡木本色偏淺既適合做原木色實木家具飾品，也適合做深色實木的家具飾品。橡木的紋理極美、木材純凈度高、雜色少，裝飾效果極佳且結實耐用。', 'oak wood', '1', '1', '1', '1', 800, '1', '1', '1'),
(3, '楓木', '03_maple', '楓木屬槭樹科、槭樹屬，故亦稱槭木，在全世界有150多個品種分佈極廣。楓木按照硬度分為二大類，一類是硬楓，亦稱為白楓、黑槭，另一類是軟楓，亦稱紅楓、銀槭等。楓木不僅是自然景觀中的奇葩，也是建築和裝飾的良材。其顏色協調統一，從乳白到本白，有時帶有輕淡紅棕色，木質緊密、紋理均勻、拋光性佳。由於楓木的強度適中且質感細膩，給人舒適、溫柔、明亮、大方之感。', 'maple wood', '1', '1', '1', '1', 800, '1', '1', '1'),
(4, '花梨木', '04_rose', '花梨木，又名紅木、酸支木。在英文中的rosewood，多用來指黃檀屬植物木材，可包括紫檀屬植物木材。而中文中的紅木，泛指明清時以黃花梨、紫檀和紅酸枝為代表的深色硬木家具木材。花梨木色深、質硬、常有油質感，一般生長於熱帶並且成材常常較為緩慢。明朝後期，長江下游江南一帶黃花梨家具興起，其風氣延續到了清朝，以花梨木為主流的深色硬木是高檔家具和飾品的首選。', 'rose wood', '1', '1', '1', '1', 800, '1', '1', '1'),
(5, '胡桃木', '05_walnut', '胡桃屬木材中較優質的一種，主要產自北美和歐洲，國產的胡桃木顏色較淺。胡桃木的邊材是乳白色，心材從淺棕到深巧克力色，偶爾有紫色和較暗條紋。樹紋一般是直的，有時有波浪形或捲曲樹紋，形成賞心悅目的裝飾圖案。桃木易於用手工和機械工具加工，適於敲釘、螺鑽和膠合，可以持久保留油漆和染色，可打磨成特殊的最終效果，具有良好的尺寸穩定性。', 'walnut wood', '1', '1', '1', '1', 800, '1', '1', '1'),
(6, '經典木質手機殼', 'images/single_product/wood/', '1', '1', '簡約時尚原木素殼', '1', '1', '1', 800, '1', '1', '1'),
(7, '貓頭鷹之一', 'images/single_product/animal/01_owl/01/', '1', 'owl', '1', '1', '1', '1', 900, 'IPNT', '貓頭鷹', '<p>這類型的人善於分析並體貼他人，</p>\n<p>喜愛用邏輯和分析解決問題，</p>\n<p>對於出主意感興趣，但不大喜歡浪費時間聚會閒聊，</p>\n<p>傾向於有明確範圍的愛好，</p>\n<p>追求自身某些特別的愛好能得到運用和有用的那些職業。</p>'),
(8, '貓頭鷹之友情篇', 'images/single_product/animal/01_owl/01_friendship/', '1', 'owl', 'friendship', 'The better person is always the one who makes you a better self.', '1', '1', 1000, 'IPNT', '貓頭鷹', '<p>這類型的人善於分析並體貼他人，</p>\n<p>喜愛用邏輯和分析解決問題，</p>\n<p>對於出主意感興趣，但不大喜歡浪費時間聚會閒聊，</p>\n<p>傾向於有明確範圍的愛好，</p>\n<p>追求自身某些特別的愛好能得到運用和有用的那些職業。</p>'),
(9, '貓頭鷹之二', 'images/single_product/animal/01_owl/02/', '1', 'owl', '1', '1', '1', '1', 900, 'IPNT', '貓頭鷹', '<p>這類型的人善於分析並體貼他人，</p>\n<p>喜愛用邏輯和分析解決問題，</p>\n<p>對於出主意感興趣，但不大喜歡浪費時間聚會閒聊，</p>\n<p>傾向於有明確範圍的愛好，</p>\n<p>追求自身某些特別的愛好能得到運用和有用的那些職業。</p>'),
(10, '貓頭鷹之勵志篇', 'images/single_product/animal/01_owl/02_encourage/', '1', 'owl', 'encourage', 'You Become What You Believe', '1', '1', 1000, 'IPNT', '貓頭鷹', '<p>這類型的人善於分析並體貼他人，</p>\n<p>喜愛用邏輯和分析解決問題，</p>\n<p>對於出主意感興趣，但不大喜歡浪費時間聚會閒聊，</p>\n<p>傾向於有明確範圍的愛好，</p>\n<p>追求自身某些特別的愛好能得到運用和有用的那些職業。</p>'),
(11, '貓頭鷹之三', 'images/single_product/animal/01_owl/03/', '1', 'owl', '1', '1', '1', '1', 900, 'IPNT', '貓頭鷹', '<p>這類型的人善於分析並體貼他人，</p>\n<p>喜愛用邏輯和分析解決問題，</p>\n<p>對於出主意感興趣，但不大喜歡浪費時間聚會閒聊，</p>\n<p>傾向於有明確範圍的愛好，</p>\n<p>追求自身某些特別的愛好能得到運用和有用的那些職業。</p>'),
(12, '貓頭鷹之愛情篇', 'images/single_product/animal/01_owl/03_love/', '1', 'owl', 'love', '每一次我想起你的時候，星星總在我的眼前發亮。', '1', '1', 1000, 'IPNT', '貓頭鷹', '<p>這類型的人善於分析並體貼他人，</p>\n<p>喜愛用邏輯和分析解決問題，</p>\n<p>對於出主意感興趣，但不大喜歡浪費時間聚會閒聊，</p>\n<p>傾向於有明確範圍的愛好，</p>\n<p>追求自身某些特別的愛好能得到運用和有用的那些職業。</p>'),
(13, '狐狸之一', 'images/single_product/animal/02_fox/01/', '1', 'fox', '1', '1', '1', '1', 900, 'EPST', '狐狸', '<p>這類型的人引人注目、充滿魅力和影響力，</p>\n<p>善於應變、容忍、重實效，</p>\n<p>喜歡不斷挖掘生活中的最美和朋友分享。 </p>\n<p>你們知道如何適應環境，從而影響他人。</p>'),
(14, '狐狸之友情篇', 'images/single_product/animal/02_fox/01_friendship/', '1', 'fox', 'friendship', 'Remember What You Are', '1', '1', 1000, 'EPST', '狐狸', '<p>這類型的人引人注目、充滿魅力和影響力，</p>\n<p>善於應變、容忍、重實效，</p>\n<p>喜歡不斷挖掘生活中的最美和朋友分享。 </p>\n<p>你們知道如何適應環境，從而影響他人。</p>'),
(15, '狐狸之二', 'images/single_product/animal/02_fox/02/', '1', 'fox', '1', '1', '1', '1', 900, 'EPST', '狐狸', '<p>這類型的人引人注目、充滿魅力和影響力，</p>\n<p>善於應變、容忍、重實效，</p>\n<p>喜歡不斷挖掘生活中的最美和朋友分享。 </p>\n<p>你們知道如何適應環境，從而影響他人。</p>'),
(16, '狐狸之勵志篇', 'images/single_product/animal/02_fox/02_encourage/', '1', 'fox', 'encourage', '球來就打！', '1', '1', 1000, 'EPST', '狐狸', '<p>這類型的人引人注目、充滿魅力和影響力，</p>\n<p>善於應變、容忍、重實效，</p>\n<p>喜歡不斷挖掘生活中的最美和朋友分享。 </p>\n<p>你們知道如何適應環境，從而影響他人。</p>'),
(17, '狐狸之三', 'images/single_product/animal/02_fox/03/', '1', 'fox', '1', '1', '1', '1', 900, 'EPST', '狐狸', '<p>這類型的人引人注目、充滿魅力和影響力，</p>\n<p>善於應變、容忍、重實效，</p>\n<p>喜歡不斷挖掘生活中的最美和朋友分享。 </p>\n<p>你們知道如何適應環境，從而影響他人。</p>'),
(18, '狐狸之愛情篇', 'images/single_product/animal/02_fox/03_love/', '1', 'fox', 'love', '寂寞可以是忍受 也可以是享受', '1', '1', 1000, 'EPST', '狐狸', '<p>這類型的人引人注目、充滿魅力和影響力，</p>\n<p>善於應變、容忍、重實效，</p>\n<p>喜歡不斷挖掘生活中的最美和朋友分享。 </p>\n<p>你們知道如何適應環境，從而影響他人。</p>'),
(19, '兔子之一', 'images/single_product/animal/03_rabbit/01/', '1', 'rabbit', '1', '1', '1', '1', 900, 'IPSF', '兔子', '<p>這類型的人放鬆而靜謐，</p>\n<p>敏感、和諧、謙虛看待自己的能力，</p>\n<p>按照自己的節奏生活，隨性的享受生活，但並不是懶惰。</p>\n<p>你們重視自己的價值觀，</p>\n<p>但不將自己的觀點和價值觀強加於人。</p>'),
(20, '兔子之友情篇', 'images/single_product/animal/03_rabbit/01_friendship/', '1', 'rabbit', 'friendship', 'Friends are the family we choose for ourselves', '1', '1', 1000, 'IPSF', '兔子', '<p>這類型的人放鬆而靜謐，</p>\n<p>敏感、和諧、謙虛看待自己的能力，</p>\n<p>按照自己的節奏生活，隨性的享受生活，但並不是懶惰。</p>\n<p>你們重視自己的價值觀，</p>\n<p>但不將自己的觀點和價值觀強加於人。</p>'),
(21, '兔子之二', 'images/single_product/animal/03_rabbit/02/', '1', 'rabbit', '1', '1', '1', '1', 900, 'IPSF', '兔子', '<p>這類型的人放鬆而靜謐，</p>\n<p>敏感、和諧、謙虛看待自己的能力，</p>\n<p>按照自己的節奏生活，隨性的享受生活，但並不是懶惰。</p>\n<p>你們重視自己的價值觀，</p>\n<p>但不將自己的觀點和價值觀強加於人。</p>'),
(22, '兔子之勵志篇', 'images/single_product/animal/03_rabbit/02_encourage/', '1', 'rabbit', 'encourage', 'Live What You Love', '1', '1', 1000, 'IPSF', '兔子', '<p>這類型的人放鬆而靜謐，</p>\n<p>敏感、和諧、謙虛看待自己的能力，</p>\n<p>按照自己的節奏生活，隨性的享受生活，但並不是懶惰。</p>\n<p>你們重視自己的價值觀，</p>\n<p>但不將自己的觀點和價值觀強加於人。</p>'),
(23, '兔子之三', 'images/single_product/animal/03_rabbit/03/', '1', 'rabbit', '1', '1', '1', '1', 900, 'IPSF', '兔子', '<p>這類型的人放鬆而靜謐，</p>\n<p>敏感、和諧、謙虛看待自己的能力，</p>\n<p>按照自己的節奏生活，隨性的享受生活，但並不是懶惰。</p>\n<p>你們重視自己的價值觀，</p>\n<p>但不將自己的觀點和價值觀強加於人。</p>'),
(24, '兔子之愛情篇', 'images/single_product/animal/03_rabbit/03_love/', '1', 'rabbit', 'love', 'Many things in life are only beautiful because of their flaws.', '1', '1', 1000, 'IPSF', '兔子', '<p>這類型的人放鬆而靜謐，</p>\n<p>敏感、和諧、謙虛看待自己的能力，</p>\n<p>按照自己的節奏生活，隨性的享受生活，但並不是懶惰。</p>\n<p>你們重視自己的價值觀，</p>\n<p>但不將自己的觀點和價值觀強加於人。</p>'),
(25, '獅子之一', 'images/single_product/animal/04_lion/01/', '1', 'lion', '1', '1', '1', '1', 900, 'EJNT', '獅子', '<p>這類型的人獨立、理性、雄心勃勃，</p>\n<p>以業務為重，是讓人信服的領導人。</p>\n<p>拒絕讓主觀情緒影響自己的決策過程，</p>\n<p>雖然可能被一些人認為是鐵石心腸和缺乏激情，</p>\n<p>但這些「冷酷」的人們往往卓有成效，成功而強大。</p>'),
(26, '獅子之友情篇', 'images/single_product/animal/04_lion/01_friendship/', '1', 'lion', 'friendship', '你完整了我', '1', '1', 1000, 'EJNT', '獅子', '<p>這類型的人獨立、理性、雄心勃勃，</p>\n<p>以業務為重，是讓人信服的領導人。</p>\n<p>拒絕讓主觀情緒影響自己的決策過程，</p>\n<p>雖然可能被一些人認為是鐵石心腸和缺乏激情，</p>\n<p>但這些「冷酷」的人們往往卓有成效，成功而強大。</p>'),
(27, '獅子之二', 'images/single_product/animal/04_lion/02/', '1', 'lion', '1', '1', '1', '1', 900, 'EJNT', '獅子', '<p>這類型的人獨立、理性、雄心勃勃，</p>\n<p>以業務為重，是讓人信服的領導人。</p>\n<p>拒絕讓主觀情緒影響自己的決策過程，</p>\n<p>雖然可能被一些人認為是鐵石心腸和缺乏激情，</p>\n<p>但這些「冷酷」的人們往往卓有成效，成功而強大。</p>'),
(28, '獅子之勵志篇', 'images/single_product/animal/04_lion/02_encourage/', '1', 'lion', 'encourage', 'Keep The Faith', '1', '1', 1000, 'EJNT', '獅子', '<p>這類型的人獨立、理性、雄心勃勃，</p>\n<p>以業務為重，是讓人信服的領導人。</p>\n<p>拒絕讓主觀情緒影響自己的決策過程，</p>\n<p>雖然可能被一些人認為是鐵石心腸和缺乏激情，</p>\n<p>但這些「冷酷」的人們往往卓有成效，成功而強大。</p>'),
(29, '獅子之三', 'images/single_product/animal/04_lion/03/', '1', 'lion', '1', '1', '1', '1', 900, 'EJNT', '獅子', '<p>這類型的人獨立、理性、雄心勃勃，</p>\n<p>以業務為重，是讓人信服的領導人。</p>\n<p>拒絕讓主觀情緒影響自己的決策過程，</p>\n<p>雖然可能被一些人認為是鐵石心腸和缺乏激情，</p>\n<p>但這些「冷酷」的人們往往卓有成效，成功而強大。</p>'),
(30, '獅子之愛情篇', 'images/single_product/animal/04_lion/03_love/', '1', 'lion', 'love', '其實放手  才是擁有', '1', '1', 1000, 'EJNT', '獅子', '<p>這類型的人獨立、理性、雄心勃勃，</p>\n<p>以業務為重，是讓人信服的領導人。</p>\n<p>拒絕讓主觀情緒影響自己的決策過程，</p>\n<p>雖然可能被一些人認為是鐵石心腸和缺乏激情，</p>\n<p>但這些「冷酷」的人們往往卓有成效，成功而強大。</p>'),
(31, '鹿之一', 'images/single_product/animal/05_deer/01/', '1', 'deer', '1', '1', '1', '1', 900, 'IJSF', '鹿', '<p>這類型的人安靜、信任並體貼他人。</p>\n<p>喜歡將事物保持和諧有序，</p>\n<p>尊重別人的情感並接受那些與己不同的人，</p>\n<p>工作上十分盡責是值得信賴的人。</p>'),
(32, '鹿之友情篇', 'images/single_product/animal/05_deer/01_friendship/', '1', 'deer', 'friendship', 'Follow Your Heart', '1', '1', 1000, 'IJSF', '鹿', '<p>這類型的人安靜、信任並體貼他人。</p>\n<p>喜歡將事物保持和諧有序，</p>\n<p>尊重別人的情感並接受那些與己不同的人，</p>\n<p>工作上十分盡責是值得信賴的人。</p>'),
(33, '鹿之二', 'images/single_product/animal/05_deer/02/', '1', 'deer', '1', '1', '1', '1', 900, 'IJSF', '鹿', '<p>這類型的人安靜、信任並體貼他人。</p>\n<p>喜歡將事物保持和諧有序，</p>\n<p>尊重別人的情感並接受那些與己不同的人，</p>\n<p>工作上十分盡責是值得信賴的人。</p>'),
(34, '鹿之勵志篇', 'images/single_product/animal/05_deer/02_encourage/', '1', 'deer', 'encourage', 'Dream Big and live free', '1', '1', 1000, 'IJSF', '鹿', '<p>這類型的人安靜、信任並體貼他人。</p>\n<p>喜歡將事物保持和諧有序，</p>\n<p>尊重別人的情感並接受那些與己不同的人，</p>\n<p>工作上十分盡責是值得信賴的人。</p>'),
(35, '鹿之三', 'images/single_product/animal/05_deer/03/', '1', 'deer', '1', '1', '1', '1', 900, 'IJSF', '鹿', '<p>這類型的人安靜、信任並體貼他人。</p>\n<p>喜歡將事物保持和諧有序，</p>\n<p>尊重別人的情感並接受那些與己不同的人，</p>\n<p>工作上十分盡責是值得信賴的人。</p>'),
(36, '鹿之愛情篇', 'images/single_product/animal/05_deer/03_love/', '1', 'deer', 'love', 'Heartache is a proof of love. It proves that your love was never just a fantasy.', '1', '1', 1000, 'IJSF', '鹿', '<p>這類型的人安靜、信任並體貼他人。</p>\n<p>喜歡將事物保持和諧有序，</p>\n<p>尊重別人的情感並接受那些與己不同的人，</p>\n<p>工作上十分盡責是值得信賴的人。</p>'),
(37, '老鷹之一', 'images/single_product/animal/06_eagle/01/', '1', 'eagle', '1', '1', '1', '1', 900, 'IJNT', '老鷹', '<p>這類型的人特立獨行、聰慧，極具創造性，</p>\n<p>但對其他人所做之事漠不關心。</p>\n<p>具有創造性的思想並大力推動你們自己的主意和目標，</p>\n<p>在吸引你們的領域，有很好的能力去組織工作並將其進行到底。</p>'),
(38, '老鷹之友情篇', 'images/single_product/animal/06_eagle/01_friendship/', '1', 'eagle', 'friendship', '所有的相遇 都是有意義的', '1', '1', 1000, 'IJNT', '老鷹', '<p>這類型的人特立獨行、聰慧，極具創造性，</p>\n<p>但對其他人所做之事漠不關心。</p>\n<p>具有創造性的思想並大力推動你們自己的主意和目標，</p>\n<p>在吸引你們的領域，有很好的能力去組織工作並將其進行到底。</p>'),
(39, '老鷹之二', 'images/single_product/animal/06_eagle/02/', '1', 'eagle', '1', '1', '1', '1', 900, 'IJNT', '老鷹', '<p>這類型的人特立獨行、聰慧，極具創造性，</p>\n<p>但對其他人所做之事漠不關心。</p>\n<p>具有創造性的思想並大力推動你們自己的主意和目標，</p>\n<p>在吸引你們的領域，有很好的能力去組織工作並將其進行到底。</p>'),
(40, '老鷹之勵志篇', 'images/single_product/animal/06_eagle/02_encourage/', '1', 'eagle', 'encourage', '生活是甜的，未來也會是甜的。', '1', '1', 1000, 'IJNT', '老鷹', '<p>這類型的人特立獨行、聰慧，極具創造性，</p>\n<p>但對其他人所做之事漠不關心。</p>\n<p>具有創造性的思想並大力推動你們自己的主意和目標，</p>\n<p>在吸引你們的領域，有很好的能力去組織工作並將其進行到底。</p>'),
(41, '老鷹之三', 'images/single_product/animal/06_eagle/03/', '1', 'eagle', '1', '1', '1', '1', 900, 'IJNT', '老鷹', '<p>這類型的人特立獨行、聰慧，極具創造性，</p>\n<p>但對其他人所做之事漠不關心。</p>\n<p>具有創造性的思想並大力推動你們自己的主意和目標，</p>\n<p>在吸引你們的領域，有很好的能力去組織工作並將其進行到底。</p>'),
(42, '老鷹之愛情篇', 'images/single_product/animal/06_eagle/03_love/', '1', 'eagle', 'love', '我愛故我在', '1', '1', 1000, 'IJNT', '老鷹', '<p>這類型的人特立獨行、聰慧，極具創造性，</p>\n<p>但對其他人所做之事漠不關心。</p>\n<p>具有創造性的思想並大力推動你們自己的主意和目標，</p>\n<p>在吸引你們的領域，有很好的能力去組織工作並將其進行到底。</p>'),
(43, '貓之一', 'images/single_product/animal/07_cat/01/', '1', 'cat', '1', '1', '1', '1', 900, 'IPST', '貓', '<p>這類型的人天生安靜，擅長分析，</p>\n<p>以獨有的好奇心和出人意料的的幽默，觀察和分析生活。</p>\n<p>喜歡搞清楚事情的來龍去脈，</p>\n<p>因此通常對工程這樣的技術領域情有獨鍾，</p>\n<p>擅長抓住實際問題的核心並尋求解決辦法。</p>'),
(44, '貓之友情篇', 'images/single_product/animal/07_cat/01_friendship/', '1', 'cat', 'friendship', '你值得真正的快樂', '1', '1', 1000, 'IPST', '貓', '<p>這類型的人天生安靜，擅長分析，</p>\n<p>以獨有的好奇心和出人意料的的幽默，觀察和分析生活。</p>\n<p>喜歡搞清楚事情的來龍去脈，</p>\n<p>因此通常對工程這樣的技術領域情有獨鍾，</p>\n<p>擅長抓住實際問題的核心並尋求解決辦法。</p>'),
(45, '貓之二', 'images/single_product/animal/07_cat/02/', '1', 'cat', '1', '1', '1', '1', 900, 'IPST', '貓', '<p>這類型的人天生安靜，擅長分析，</p>\n<p>以獨有的好奇心和出人意料的的幽默，觀察和分析生活。</p>\n<p>喜歡搞清楚事情的來龍去脈，</p>\n<p>因此通常對工程這樣的技術領域情有獨鍾，</p>\n<p>擅長抓住實際問題的核心並尋求解決辦法。</p>'),
(46, '貓之勵志篇', 'images/single_product/animal/07_cat/02_encourage/', '1', 'cat', 'encourage', 'Always Believe InYourself', '1', '1', 1000, 'IPST', '貓', '<p>這類型的人天生安靜，擅長分析，</p>\n<p>以獨有的好奇心和出人意料的的幽默，觀察和分析生活。</p>\n<p>喜歡搞清楚事情的來龍去脈，</p>\n<p>因此通常對工程這樣的技術領域情有獨鍾，</p>\n<p>擅長抓住實際問題的核心並尋求解決辦法。</p>'),
(47, '貓之三', 'images/single_product/animal/07_cat/03/', '1', 'cat', '1', '1', '1', '1', 900, 'IPST', '貓', '<p>這類型的人天生安靜，擅長分析，</p>\n<p>以獨有的好奇心和出人意料的的幽默，觀察和分析生活。</p>\n<p>喜歡搞清楚事情的來龍去脈，</p>\n<p>因此通常對工程這樣的技術領域情有獨鍾，</p>\n<p>擅長抓住實際問題的核心並尋求解決辦法。</p>'),
(48, '貓之愛情篇', 'images/single_product/animal/07_cat/03_love/', '1', 'cat', 'love', 'I''m Loved', '1', '1', 1000, 'IPST', '貓', '<p>這類型的人天生安靜，擅長分析，</p>\n<p>以獨有的好奇心和出人意料的的幽默，觀察和分析生活。</p>\n<p>喜歡搞清楚事情的來龍去脈，</p>\n<p>因此通常對工程這樣的技術領域情有獨鍾，</p>\n<p>擅長抓住實際問題的核心並尋求解決辦法。</p>'),
(49, '鳥之一', 'images/single_product/animal/08_bird/01/', '1', 'bird', '1', '1', '1', '1', 900, 'EPSF', '鳥', '<p>這類型的人活在當下，想要儘可能享受生活。</p>\n<p>喜歡社交生活和體驗新事物，不喜歡受拘束。</p>\n<p>認為記住事實比掌握理論更為容易，</p>\n<p>在需要豐富的知識和實際能力的情況下表現最佳。</p>'),
(50, '鳥之友情篇', 'images/single_product/animal/08_bird/01_friendship/', '1', 'bird', 'friendship', '為我愛的人做一秒英雄', '1', '1', 1000, 'EPSF', '鳥', '<p>這類型的人活在當下，想要儘可能享受生活。</p>\n<p>喜歡社交生活和體驗新事物，不喜歡受拘束。</p>\n<p>認為記住事實比掌握理論更為容易，</p>\n<p>在需要豐富的知識和實際能力的情況下表現最佳。</p>'),
(51, '鳥之二', 'images/single_product/animal/08_bird/02/', '1', 'bird', '1', '1', '1', '1', 900, 'EPSF', '鳥', '<p>這類型的人活在當下，想要儘可能享受生活。</p>\n<p>喜歡社交生活和體驗新事物，不喜歡受拘束。</p>\n<p>認為記住事實比掌握理論更為容易，</p>\n<p>在需要豐富的知識和實際能力的情況下表現最佳。</p>'),
(52, '鳥之勵志篇', 'images/single_product/animal/08_bird/02_encourage/', '1', 'bird', 'encourage', 'If you want something you''ve never had, you''ve got to do something you''ve never done.', '1', '1', 1000, 'EPSF', '鳥', '<p>這類型的人活在當下，想要儘可能享受生活。</p>\n<p>喜歡社交生活和體驗新事物，不喜歡受拘束。</p>\n<p>認為記住事實比掌握理論更為容易，</p>\n<p>在需要豐富的知識和實際能力的情況下表現最佳。</p>'),
(53, '鳥之三', 'images/single_product/animal/08_bird/03/', '1', 'bird', '1', '1', '1', '1', 900, 'EPSF', '鳥', '<p>這類型的人活在當下，想要儘可能享受生活。</p>\n<p>喜歡社交生活和體驗新事物，不喜歡受拘束。</p>\n<p>認為記住事實比掌握理論更為容易，</p>\n<p>在需要豐富的知識和實際能力的情況下表現最佳。</p>'),
(54, '鳥之愛情篇', 'images/single_product/animal/08_bird/03_love/', '1', 'bird', 'love', 'No one can hurt you forever; let go, and the wound will start to heal.', '1', '1', 1000, 'EPSF', '鳥', '<p>這類型的人活在當下，想要儘可能享受生活。</p>\n<p>喜歡社交生活和體驗新事物，不喜歡受拘束。</p>\n<p>認為記住事實比掌握理論更為容易，</p>\n<p>在需要豐富的知識和實際能力的情況下表現最佳。</p>'),
(55, '狼之一', 'images/single_product/animal/09_wolf/01/', '1', 'wolf', '1', '1', '1', '1', 900, 'IJNF', '狼', '<p>這類型的人忠於自己的價值觀，往往神龍不見首，</p>\n<p>就算他人與你們親密無間，也會覺得你們深不可測。</p>\n<p>除非完全信任對方，不然不太透露個人信息，</p>\n<p>不過，你們還是非常關心別人的康樂，</p>\n<p>往往被視為保護者以及天生的領導者。</p>'),
(56, '狼之友情篇', 'images/single_product/animal/09_wolf/01_friendship/', '1', 'wolf', 'friendship', '寧願試過了後悔，也不要錯過了後悔', '1', '1', 1000, 'IJNF', '狼', '<p>這類型的人忠於自己的價值觀，往往神龍不見首，</p>\n<p>就算他人與你們親密無間，也會覺得你們深不可測。</p>\n<p>除非完全信任對方，不然不太透露個人信息，</p>\n<p>不過，你們還是非常關心別人的康樂，</p>\n<p>往往被視為保護者以及天生的領導者。</p>'),
(57, '狼之二', 'images/single_product/animal/09_wolf/02/', '1', 'wolf', '1', '1', '1', '1', 900, 'IJNF', '狼', '<p>這類型的人忠於自己的價值觀，往往神龍不見首，</p>\n<p>就算他人與你們親密無間，也會覺得你們深不可測。</p>\n<p>除非完全信任對方，不然不太透露個人信息，</p>\n<p>不過，你們還是非常關心別人的康樂，</p>\n<p>往往被視為保護者以及天生的領導者。</p>'),
(58, '狼之勵志篇', 'images/single_product/animal/09_wolf/02_encourage/', '1', 'wolf', 'encourage', '每滴眼淚掙脫後 都帶走懦弱 感動總在衝動後 苦澀回憶 都會溫柔', '1', '1', 1000, 'IJNF', '狼', '<p>這類型的人忠於自己的價值觀，往往神龍不見首，</p>\n<p>就算他人與你們親密無間，也會覺得你們深不可測。</p>\n<p>除非完全信任對方，不然不太透露個人信息，</p>\n<p>不過，你們還是非常關心別人的康樂，</p>\n<p>往往被視為保護者以及天生的領導者。</p>'),
(59, '狼之三', 'images/single_product/animal/09_wolf/03/', '1', 'wolf', '1', '1', '1', '1', 900, 'IJNF', '狼', '<p>這類型的人忠於自己的價值觀，往往神龍不見首，</p>\n<p>就算他人與你們親密無間，也會覺得你們深不可測。</p>\n<p>除非完全信任對方，不然不太透露個人信息，</p>\n<p>不過，你們還是非常關心別人的康樂，</p>\n<p>往往被視為保護者以及天生的領導者。</p>'),
(60, '狼之愛情篇', 'images/single_product/animal/09_wolf/03_love/', '1', 'wolf', 'love', '寂寞可以是忍受 也可以是享受', '1', '1', 1000, 'IJNF', '狼', '<p>這類型的人忠於自己的價值觀，往往神龍不見首，</p>\n<p>就算他人與你們親密無間，也會覺得你們深不可測。</p>\n<p>除非完全信任對方，不然不太透露個人信息，</p>\n<p>不過，你們還是非常關心別人的康樂，</p>\n<p>往往被視為保護者以及天生的領導者。</p>'),
(61, '猴子之一', 'images/single_product/animal/10_monkey/01/', '1', 'monkey', '1', '1', '1', '1', 900, 'EPNF', '猴子', '<p>這類型的人具有創造力和有感染力的快樂，</p>\n<p>有無限的能量，極其渴望學習新事物和結識新朋友。</p>\n<p>能給身邊的人帶來快樂並敏銳地意識到對方的需求，</p>\n<p>隨時準備去幫助任何一個遇到難題的人。</p>'),
(62, '猴子之友情篇', 'images/single_product/animal/10_monkey/01_friendship/', '1', 'monkey', 'friendship', 'If you just open the door a crack, the light comes pouring in.', '1', '1', 1000, 'EPNF', '猴子', '<p>這類型的人具有創造力和有感染力的快樂，</p>\n<p>有無限的能量，極其渴望學習新事物和結識新朋友。</p>\n<p>能給身邊的人帶來快樂並敏銳地意識到對方的需求，</p>\n<p>隨時準備去幫助任何一個遇到難題的人。</p>'),
(63, '猴子之二', 'images/single_product/animal/10_monkey/02/', '1', 'monkey', '1', '1', '1', '1', 900, 'EPNF', '猴子', '<p>這類型的人具有創造力和有感染力的快樂，</p>\n<p>有無限的能量，極其渴望學習新事物和結識新朋友。</p>\n<p>能給身邊的人帶來快樂並敏銳地意識到對方的需求，</p>\n<p>隨時準備去幫助任何一個遇到難題的人。</p>'),
(64, '猴子之勵志篇', 'images/single_product/animal/10_monkey/02_encourage/', '1', 'monkey', 'encourage', 'Anything is possible', '1', '1', 1000, 'EPNF', '猴子', '<p>這類型的人具有創造力和有感染力的快樂，</p>\n<p>有無限的能量，極其渴望學習新事物和結識新朋友。</p>\n<p>能給身邊的人帶來快樂並敏銳地意識到對方的需求，</p>\n<p>隨時準備去幫助任何一個遇到難題的人。</p>'),
(65, '猴子之三', 'images/single_product/animal/10_monkey/03/', '1', 'monkey', '1', '1', '1', '1', 900, 'EPNF', '猴子', '<p>這類型的人具有創造力和有感染力的快樂，</p>\n<p>有無限的能量，極其渴望學習新事物和結識新朋友。</p>\n<p>能給身邊的人帶來快樂並敏銳地意識到對方的需求，</p>\n<p>隨時準備去幫助任何一個遇到難題的人。</p>'),
(66, '猴子之愛情篇', 'images/single_product/animal/10_monkey/03_love/', '1', 'monkey', 'love', 'True love is about falling in love with someone no matter what they have become.', '1', '1', 1000, 'EPNF', '猴子', '<p>這類型的人具有創造力和有感染力的快樂，</p>\n<p>有無限的能量，極其渴望學習新事物和結識新朋友。</p>\n<p>能給身邊的人帶來快樂並敏銳地意識到對方的需求，</p>\n<p>隨時準備去幫助任何一個遇到難題的人。</p>'),
(67, '蜜蜂之一', 'images/single_product/animal/11_bee/01/', '1', 'bee', '1', '1', '1', '1', 900, 'EJST', '蜜蜂', '<p>這類型的人通常都是城市人，</p>\n<p>努力完善社會並想要成為組織和政府的一部分。</p>\n<p>有天生的商業或機械學頭腦，對抽象理論不感興趣，</p>\n<p>善於交際、喜歡組織和參與活動，通常能做優秀的領導人。</p>'),
(68, '蜜蜂之友情篇', 'images/single_product/animal/11_bee/01_friendship/', '1', 'bee', 'friendship', 'Follow Your Heart', '1', '1', 1000, 'EJST', '蜜蜂', '<p>這類型的人通常都是城市人，</p>\n<p>努力完善社會並想要成為組織和政府的一部分。</p>\n<p>有天生的商業或機械學頭腦，對抽象理論不感興趣，</p>\n<p>善於交際、喜歡組織和參與活動，通常能做優秀的領導人。</p>'),
(69, '蜜蜂之二', 'images/single_product/animal/11_bee/02/', '1', 'bee', '1', '1', '1', '1', 900, 'EJST', '蜜蜂', '<p>這類型的人通常都是城市人，</p>\n<p>努力完善社會並想要成為組織和政府的一部分。</p>\n<p>有天生的商業或機械學頭腦，對抽象理論不感興趣，</p>\n<p>善於交際、喜歡組織和參與活動，通常能做優秀的領導人。</p>'),
(70, '蜜蜂之勵志篇', 'images/single_product/animal/11_bee/02_encourage/', '1', 'bee', 'encourage', '別讓這個世界，改變你的笑容。', '1', '1', 1000, 'EJST', '蜜蜂', '<p>這類型的人通常都是城市人，</p>\n<p>努力完善社會並想要成為組織和政府的一部分。</p>\n<p>有天生的商業或機械學頭腦，對抽象理論不感興趣，</p>\n<p>善於交際、喜歡組織和參與活動，通常能做優秀的領導人。</p>'),
(71, '蜜蜂之三', 'images/single_product/animal/11_bee/03/', '1', 'bee', '1', '1', '1', '1', 900, 'EJST', '蜜蜂', '<p>這類型的人通常都是城市人，</p>\n<p>努力完善社會並想要成為組織和政府的一部分。</p>\n<p>有天生的商業或機械學頭腦，對抽象理論不感興趣，</p>\n<p>善於交際、喜歡組織和參與活動，通常能做優秀的領導人。</p>'),
(72, '蜜蜂之愛情篇', 'images/single_product/animal/11_bee/03_love/', '1', 'bee', 'love', '沒有完全合適的兩個人，只有互相遷就的兩顆心。', '1', '1', 1000, 'EJST', '蜜蜂', '<p>這類型的人通常都是城市人，</p>\n<p>努力完善社會並想要成為組織和政府的一部分。</p>\n<p>有天生的商業或機械學頭腦，對抽象理論不感興趣，</p>\n<p>善於交際、喜歡組織和參與活動，通常能做優秀的領導人。</p>'),
(73, '松鼠之一', 'images/single_product/animal/12_squirrel/01/', '1', 'squirrel', '1', '1', '1', '1', 900, 'IJST', '松鼠', '<p>這類型的人具有邏輯性，具有一切追求務實人們的良好聲譽。</p>\n<p>你們是負責任的工作者，會盡一切努力將工作做到最佳，</p>\n<p>心思縝密又理性，值得信賴。 </p>\n<p>但有時很難與他人的情感需求溝通。</p>'),
(74, '松鼠之友情篇', 'images/single_product/animal/12_squirrel/01_friendship/', '1', 'squirrel', 'friendship', 'All I need is within me', '1', '1', 1000, 'IJST', '松鼠', '<p>這類型的人具有邏輯性，具有一切追求務實人們的良好聲譽。</p>\n<p>你們是負責任的工作者，會盡一切努力將工作做到最佳，</p>\n<p>心思縝密又理性，值得信賴。 </p>\n<p>但有時很難與他人的情感需求溝通。</p>'),
(75, '松鼠之二', 'images/single_product/animal/12_squirrel/02/', '1', 'squirrel', '1', '1', '1', '1', 900, 'IJST', '松鼠', '<p>這類型的人具有邏輯性，具有一切追求務實人們的良好聲譽。</p>\n<p>你們是負責任的工作者，會盡一切努力將工作做到最佳，</p>\n<p>心思縝密又理性，值得信賴。 </p>\n<p>但有時很難與他人的情感需求溝通。</p>'),
(76, '松鼠之勵志篇', 'images/single_product/animal/12_squirrel/02_encourage/', '1', 'squirrel', 'encourage', '就算是這個世界 把我拋棄 而至少快樂傷心我自己決定', '1', '1', 1000, 'IJST', '松鼠', '<p>這類型的人具有邏輯性，具有一切追求務實人們的良好聲譽。</p>\n<p>你們是負責任的工作者，會盡一切努力將工作做到最佳，</p>\n<p>心思縝密又理性，值得信賴。 </p>\n<p>但有時很難與他人的情感需求溝通。</p>'),
(77, '松鼠之三', 'images/single_product/animal/12_squirrel/03/', '1', 'squirrel', '1', '1', '1', '1', 900, 'IJST', '松鼠', '<p>這類型的人具有邏輯性，具有一切追求務實人們的良好聲譽。</p>\n<p>你們是負責任的工作者，會盡一切努力將工作做到最佳，</p>\n<p>心思縝密又理性，值得信賴。 </p>\n<p>但有時很難與他人的情感需求溝通。</p>'),
(78, '松鼠之愛情篇', 'images/single_product/animal/12_squirrel/03_love/', '1', 'squirrel', 'love', 'Loving someone takes practice, so does letting them go.', '1', '1', 1000, 'IJST', '松鼠', '<p>這類型的人具有邏輯性，具有一切追求務實人們的良好聲譽。</p>\n<p>你們是負責任的工作者，會盡一切努力將工作做到最佳，</p>\n<p>心思縝密又理性，值得信賴。 </p>\n<p>但有時很難與他人的情感需求溝通。</p>'),
(79, '狗之一', 'images/single_product/animal/13_dog/01/', '1', 'dog', '1', '1', '1', '1', 900, 'EJNF', '狗', '<p>這類型的人非常善於交際，是朋友和家人的強有力支持者。</p>\n<p>你們討厭欺凌並對所愛的人投入深情。</p>\n<p>負責任，對表揚和批評敏感，喜歡給人以方便並使人們發揮其潛力。</p>\n<p>你們忠誠，希望別人也能忠誠。</p>'),
(80, '狗之友情篇', 'images/single_product/animal/13_dog/01_friendship/', '1', 'dog', 'friendship', '努力不是為了別人，是為了自己與在乎的人。', '1', '1', 1000, 'EJNF', '狗', '<p>這類型的人非常善於交際，是朋友和家人的強有力支持者。</p>\n<p>你們討厭欺凌並對所愛的人投入深情。</p>\n<p>負責任，對表揚和批評敏感，喜歡給人以方便並使人們發揮其潛力。</p>\n<p>你們忠誠，希望別人也能忠誠。</p>'),
(81, '狗之二', 'images/single_product/animal/13_dog/02/', '1', 'dog', '1', '1', '1', '1', 900, 'EJNF', '狗', '<p>這類型的人非常善於交際，是朋友和家人的強有力支持者。</p>\n<p>你們討厭欺凌並對所愛的人投入深情。</p>\n<p>負責任，對表揚和批評敏感，喜歡給人以方便並使人們發揮其潛力。</p>\n<p>你們忠誠，希望別人也能忠誠。</p>'),
(82, '狗之勵志篇', 'images/single_product/animal/13_dog/02_encourage/', '1', 'dog', 'encourage', 'Be Happy !', '1', '1', 1000, 'EJNF', '狗', '<p>這類型的人非常善於交際，是朋友和家人的強有力支持者。</p>\n<p>你們討厭欺凌並對所愛的人投入深情。</p>\n<p>負責任，對表揚和批評敏感，喜歡給人以方便並使人們發揮其潛力。</p>\n<p>你們忠誠，希望別人也能忠誠。</p>'),
(83, '狗之三', 'images/single_product/animal/13_dog/03/', '1', 'dog', '1', '1', '1', '1', 900, 'EJNF', '狗', '<p>這類型的人非常善於交際，是朋友和家人的強有力支持者。</p>\n<p>你們討厭欺凌並對所愛的人投入深情。</p>\n<p>負責任，對表揚和批評敏感，喜歡給人以方便並使人們發揮其潛力。</p>\n<p>你們忠誠，希望別人也能忠誠。</p>'),
(84, '狗之愛情篇', 'images/single_product/animal/13_dog/03_love/', '1', 'dog', 'love', '如果接受了遺憾 放手就沒有想像的難', '1', '1', 1000, 'EJNF', '狗', '<p>這類型的人非常善於交際，是朋友和家人的強有力支持者。</p>\n<p>你們討厭欺凌並對所愛的人投入深情。</p>\n<p>負責任，對表揚和批評敏感，喜歡給人以方便並使人們發揮其潛力。</p>\n<p>你們忠誠，希望別人也能忠誠。</p>'),
(85, '刺蝟之一', 'images/single_product/animal/14_porcupine/01/', '1', 'porcupine', '1', '1', '1', '1', 900, 'IPNF', '刺蝟', '<p>這類型的人是理想主義者，沉穩的觀察一切，</p>\n<p>看重外在的生活和內在的價值的一致，</p>\n<p>你們忠於家人和朋友，按照你們的意志和價值觀去生活。</p>\n<p>對自己周圍的一切充滿好奇心，</p>\n<p>只要某種價值觀不受到威脅，你們都善於應變並接受。</p>'),
(86, '刺蝟之友情篇', 'images/single_product/animal/14_porcupine/01_friendship/', '1', 'porcupine', 'friendship', 'The best compliment is when someone says that you make them want to be a better person.', '1', '1', 1000, 'IPNF', '刺蝟', '<p>這類型的人是理想主義者，沉穩的觀察一切，</p>\n<p>看重外在的生活和內在的價值的一致，</p>\n<p>你們忠於家人和朋友，按照你們的意志和價值觀去生活。</p>\n<p>對自己周圍的一切充滿好奇心，</p>\n<p>只要某種價值觀不受到威脅，你們都善於應變並接受。</p>'),
(87, '刺蝟之二', 'images/single_product/animal/14_porcupine/02/', '1', 'porcupine', '1', '1', '1', '1', 900, 'IPNF', '刺蝟', '<p>這類型的人是理想主義者，沉穩的觀察一切，</p>\n<p>看重外在的生活和內在的價值的一致，</p>\n<p>你們忠於家人和朋友，按照你們的意志和價值觀去生活。</p>\n<p>對自己周圍的一切充滿好奇心，</p>\n<p>只要某種價值觀不受到威脅，你們都善於應變並接受。</p>'),
(88, '刺蝟之勵志篇', 'images/single_product/animal/14_porcupine/02_encourage/', '1', 'porcupine', 'encourage', '只有我們自己，能決定我們的樣子', '1', '1', 1000, 'IPNF', '刺蝟', '<p>這類型的人是理想主義者，沉穩的觀察一切，</p>\n<p>看重外在的生活和內在的價值的一致，</p>\n<p>你們忠於家人和朋友，按照你們的意志和價值觀去生活。</p>\n<p>對自己周圍的一切充滿好奇心，</p>\n<p>只要某種價值觀不受到威脅，你們都善於應變並接受。</p>'),
(89, '刺蝟之三', 'images/single_product/animal/14_porcupine/03/', '1', 'porcupine', '1', '1', '1', '1', 900, 'IPNF', '刺蝟', '<p>這類型的人是理想主義者，沉穩的觀察一切，</p>\n<p>看重外在的生活和內在的價值的一致，</p>\n<p>你們忠於家人和朋友，按照你們的意志和價值觀去生活。</p>\n<p>對自己周圍的一切充滿好奇心，</p>\n<p>只要某種價值觀不受到威脅，你們都善於應變並接受。</p>'),
(90, '刺蝟之愛情篇', 'images/single_product/animal/14_porcupine/03_love/', '1', 'porcupine', 'love', 'Don''t throw yourself into the arms of someone just because you can''t stand being alone.', '1', '1', 1000, 'IPNF', '刺蝟', '<p>這類型的人是理想主義者，沉穩的觀察一切，</p>\n<p>看重外在的生活和內在的價值的一致，</p>\n<p>你們忠於家人和朋友，按照你們的意志和價值觀去生活。</p>\n<p>對自己周圍的一切充滿好奇心，</p>\n<p>只要某種價值觀不受到威脅，你們都善於應變並接受。</p>'),
(91, '鸚鵡之一', 'images/single_product/animal/15_parrot/01/', '1', 'parrot', '1', '1', '1', '1', 900, 'EPNT', '鸚鵡', '<p>這類型的人機智、聰明、應變能力強，</p>\n<p>喜歡分析問題的各個方面。</p>\n<p>在解決新的、挑戰性的問題方面富於機智，</p>\n<p>但可能忽視日常工作，易把興趣從一點轉移到另一點。</p>'),
(92, '鸚鵡之友情篇', 'images/single_product/animal/15_parrot/01_friendship/', '1', 'parrot', 'friendship', '人生至少要有兩本存摺，一本儲蓄財富、一本儲蓄老朋友', '1', '1', 1000, 'EPNT', '鸚鵡', '<p>這類型的人機智、聰明、應變能力強，</p>\n<p>喜歡分析問題的各個方面。</p>\n<p>在解決新的、挑戰性的問題方面富於機智，</p>\n<p>但可能忽視日常工作，易把興趣從一點轉移到另一點。</p>'),
(93, '鸚鵡之二', 'images/single_product/animal/15_parrot/02/', '1', 'parrot', '1', '1', '1', '1', 900, 'EPNT', '鸚鵡', '<p>這類型的人機智、聰明、應變能力強，</p>\n<p>喜歡分析問題的各個方面。</p>\n<p>在解決新的、挑戰性的問題方面富於機智，</p>\n<p>但可能忽視日常工作，易把興趣從一點轉移到另一點。</p>'),
(94, '鸚鵡之勵志篇', 'images/single_product/animal/15_parrot/02_encourage/', '1', 'parrot', 'encourage', '逆風的方向更適合飛翔。', '1', '1', 1000, 'EPNT', '鸚鵡', '<p>這類型的人機智、聰明、應變能力強，</p>\n<p>喜歡分析問題的各個方面。</p>\n<p>在解決新的、挑戰性的問題方面富於機智，</p>\n<p>但可能忽視日常工作，易把興趣從一點轉移到另一點。</p>'),
(95, '鸚鵡之三', 'images/single_product/animal/15_parrot/03/', '1', 'parrot', '1', '1', '1', '1', 900, 'EPNT', '鸚鵡', '<p>這類型的人機智、聰明、應變能力強，</p>\n<p>喜歡分析問題的各個方面。</p>\n<p>在解決新的、挑戰性的問題方面富於機智，</p>\n<p>但可能忽視日常工作，易把興趣從一點轉移到另一點。</p>'),
(96, '鸚鵡之愛情篇', 'images/single_product/animal/15_parrot/03_love/', '1', 'parrot', 'love', 'You complete Me', '1', '1', 1000, 'EPNT', '鸚鵡', '<p>這類型的人機智、聰明、應變能力強，</p>\n<p>喜歡分析問題的各個方面。</p>\n<p>在解決新的、挑戰性的問題方面富於機智，</p>\n<p>但可能忽視日常工作，易把興趣從一點轉移到另一點。</p>'),
(97, '大象之一', 'images/single_product/animal/16_elephant/01/', '1', 'elephant', '1', '1', '1', '1', 900, 'EJSF', '大象', '<p>這類型的人真實可靠，非常關心身邊的人，</p>\n<p>總是把最好的給別人，尤其是對朋友和家人。</p>\n<p>你們慷慨，以他人之樂而樂，但也很敏感，容易受到傷害，</p>\n<p>有時會對喜歡和信任的人的缺陷視而不見。</p>'),
(98, '大象之友情篇', 'images/single_product/animal/16_elephant/01_friendship/', '1', 'elephant', 'friendship', 'I''ll Always Stand By You', '1', '1', 1000, 'EJSF', '大象', '<p>這類型的人真實可靠，非常關心身邊的人，</p>\n<p>總是把最好的給別人，尤其是對朋友和家人。</p>\n<p>你們慷慨，以他人之樂而樂，但也很敏感，容易受到傷害，</p>\n<p>有時會對喜歡和信任的人的缺陷視而不見。</p>'),
(99, '大象之二', 'images/single_product/animal/16_elephant/02/', '1', 'elephant', '1', '1', '1', '1', 900, 'EJSF', '大象', '<p>這類型的人真實可靠，非常關心身邊的人，</p>\n<p>總是把最好的給別人，尤其是對朋友和家人。</p>\n<p>你們慷慨，以他人之樂而樂，但也很敏感，容易受到傷害，</p>\n<p>有時會對喜歡和信任的人的缺陷視而不見。</p>'),
(100, '大象之勵志篇', 'images/single_product/animal/16_elephant/02_encourage/', '1', 'elephant', 'encourage', 'Work Smart , Play Hard', '1', '1', 1000, 'EJSF', '大象', '<p>這類型的人真實可靠，非常關心身邊的人，</p>\n<p>總是把最好的給別人，尤其是對朋友和家人。</p>\n<p>你們慷慨，以他人之樂而樂，但也很敏感，容易受到傷害，</p>\n<p>有時會對喜歡和信任的人的缺陷視而不見。</p>'),
(101, '大象之三', 'images/single_product/animal/16_elephant/03/', '1', 'elephant', '1', '1', '1', '1', 900, 'EJSF', '大象', '<p>這類型的人真實可靠，非常關心身邊的人，</p>\n<p>總是把最好的給別人，尤其是對朋友和家人。</p>\n<p>你們慷慨，以他人之樂而樂，但也很敏感，容易受到傷害，</p>\n<p>有時會對喜歡和信任的人的缺陷視而不見。</p>'),
(102, '大象之愛情篇', 'images/single_product/animal/16_elephant/03_love/', '1', 'elephant', 'love', '幸福的人懂得放手，留不住的人何必強求。', '1', '1', 1000, 'EJSF', '大象', '<p>這類型的人真實可靠，非常關心身邊的人，</p>\n<p>總是把最好的給別人，尤其是對朋友和家人。</p>\n<p>你們慷慨，以他人之樂而樂，但也很敏感，容易受到傷害，</p>\n<p>有時會對喜歡和信任的人的缺陷視而不見。</p>');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`sid`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `members`
--
ALTER TABLE `members`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
