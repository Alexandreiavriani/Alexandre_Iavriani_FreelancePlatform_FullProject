-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 27 2023 г., 02:17
-- Версия сервера: 10.4.17-MariaDB
-- Версия PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `freelance`
--

-- --------------------------------------------------------

--
-- Структура таблицы `add_job`
--

CREATE TABLE `add_job` (
  `add_job_id` int(5) NOT NULL,
  `title` varchar(50) NOT NULL,
  `text` varchar(5000) NOT NULL,
  `price` int(11) NOT NULL,
  `time` varchar(50) NOT NULL,
  `public_date` date DEFAULT NULL,
  `work_status` varchar(255) NOT NULL,
  `user_id` int(3) NOT NULL,
  `categories_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `add_job`
--

INSERT INTO `add_job` (`add_job_id`, `title`, `text`, `price`, `time`, `public_date`, `work_status`, `user_id`, `categories_id`) VALUES
(98, 'რეკლამის გაკეთება.', 'ვეძებ ადამიანს,ვინ გამიკეთებს რეკლამას ტექნიკის მაღაზიისთვის.', 100, '10 ', '2023-05-12', 'თავისუფალი', 20, 3),
(103, 'გვჭირდება კონტენტ-მენეჯერი', 'გვჭირდება კონტენტ მენეჯერი.სტატიების წერა და სოც.ქსელებში განთავსება,ინფორმაციის ძებნა.აუცილებელია უმაღლესი განათლება და სამუშაოს გამოცდილება', 50, '10', '2023-05-21', 'თავისუფალი', 20, 6),
(104, 'React/Nest.js Developer', 'ვეძებ Middle/Senior დეველოპერს.წინასწარ მომწერეთ მეილზე', 400, '21', '2023-05-21', 'თავისუფალი', 20, 1),
(105, 'ლოგოს გაკეთება youtobe-არხისთვის', 'მინდა რომ გააკეთოთ ლოგო youtub არხისთვის,PHOTOSHOP -ში ან ILLUSTRATOR-ში', 50, '20', '2023-06-04', 'დაკავებული', 7, 2),
(120, 'fewf', 'wefwef', 1, '1', '2023-06-15', 'თავისუფალი', 7, 1),
(125, 'tttttttttttt', 'tttttttttt', 2, '2', '2023-06-15', 'თავისუფალი', 7, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(1, 'alexandre.iavriani@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Структура таблицы `admin_jobs`
--

CREATE TABLE `admin_jobs` (
  `admin_jobs_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `add_job_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(5) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`categories_id`, `category_name`) VALUES
(1, 'პროგრამირება'),
(2, 'დიზაინი'),
(3, 'ვიდეო'),
(4, 'აუდიო/ხმა'),
(5, 'მარკეტინგი'),
(6, 'სხვა');

-- --------------------------------------------------------

--
-- Структура таблицы `freelancers`
--

CREATE TABLE `freelancers` (
  `freelancers_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `about_me` text NOT NULL,
  `profession` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `freelancers`
--

INSERT INTO `freelancers` (`freelancers_id`, `user_id`, `about_me`, `profession`) VALUES
(72, 7, 'ვქმნი desktop-აპლიკაციას,სერვისებს,უტილიტებს', 'Java დეველოპერი'),
(73, 20, 'ანალიტიკა,UX პროექტირება,დიზაინი,ანიმაცია.სამუშაო გამოცდილება 5 წელი', 'ui ux დიზაინერი'),
(76, 21, 'Javascript პროგრამისტი,ვაკეთებ საიტებს REACT ბიბლიოთეკის მეშვეობით.დამთავრებული მაქ ბაკალავრიატი.სამუშაოს გამოცდილება 2 წელი', 'React დეველოპერი'),
(87, 22, 'ვარ Android დეველოპერი.ვაკეთებ ინტერფეის და დიზაინს.ვტესტავ აპლიკაციებს და ვასწორებ ტექნიკურ ხარვეზებს.', 'Android დეველოპერი'),
(91, 27, 'მე ვიცი ეს და ეს.../////////////////////////////', 'Java delevoper');

-- --------------------------------------------------------

--
-- Структура таблицы `notifications`
--

CREATE TABLE `notifications` (
  `notifications_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `create_date` datetime NOT NULL,
  `work_name` varchar(255) NOT NULL,
  `user_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `notifications`
--

INSERT INTO `notifications` (`notifications_id`, `name`, `message`, `status`, `create_date`, `work_name`, `user_id`) VALUES
(670, 'ალექს', 'უნდა სამუშაოს აღება', 0, '2023-06-10 04:11:12', 'ლოგოს გაკეთება youtobe-არხისთვის', 7),
(671, 'ნიკა', 'სამუშაო მიღებულია', 1, '2023-06-10 04:11:30', 'ლოგოს გაკეთება youtobe-არხისთვის', 27),
(672, 'ალექს', 'ნახეთ გამოგზავნილი სამუშაო', 0, '2023-06-10 02:12:14', 'ლოგოს გაკეთება youtobe-არხისთვის', 7),
(673, 'ადმინი', 'თქვენი სამუშაო გამოგზავნილია', 0, '2023-06-10 04:12:47', 'ლოგოს გაკეთება youtobe-არხისთვის', 27),
(674, 'ადმინი', 'ნახეთ გამოგზავნილი სამუშაო', 0, '2023-06-10 04:12:47', 'ლოგოს გაკეთება youtobe-არხისთვის', 7),
(675, 'ნიკა', 'სამუშაო გადახდილია', 0, '2023-06-10 04:13:44', '', 27),
(676, 'ადმინი', 'თქვენი არ ხართ შეყვენილი ფრილანსერების სიაში', 0, '2023-06-15 08:57:41', '', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `pay_notif`
--

CREATE TABLE `pay_notif` (
  `pay_notif_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `message` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `pay_notif`
--

INSERT INTO `pay_notif` (`pay_notif_id`, `name`, `surname`, `file`, `status`, `message`, `title`, `user_id`) VALUES
(26, 'ალექს', 'ალექსიძე', 'abzacebi.docx', 1, 'ნახეთ გამოგზავნილი ფაილი!', 'ლოგოს გაკეთება youtobe-არხისთვის', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `freelancer_name` varchar(255) NOT NULL,
  `freelancer_surname` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `review`
--

INSERT INTO `review` (`review_id`, `freelancer_name`, `freelancer_surname`, `user_name`, `user_rating`, `user_review`, `datetime`) VALUES
(89, 'გიორგი', 'გიორგაძე', 'ნიკა', 5, 'გიორგი გიორგაძე არის მაგარი ფრილანსერი', 1683646137),
(90, 'გიორგი', 'გიორგაძე', 'ლადო', 2, 'ფრილანსერმა ცუდათ შეასრულა ჩემი შეკვეთა.', 1683830790),
(91, 'გიორგი', 'გიორგაძე', 'ნიკა', 5, 'გიორგი კარგად გააკეთა თავისი სამუშაო', 1684051575),
(92, 'ნიკა', 'ნიკაძე', 'გიორგი', 5, 'მაგარი პროექტი იყო', 1686380451),
(93, 'ალექს', 'ალექსიძე', 'ალექს', 5, 'კარდი ფრილანსერია', 1686399254);

-- --------------------------------------------------------

--
-- Структура таблицы `send_job`
--

CREATE TABLE `send_job` (
  `send_job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `size` bigint(100) NOT NULL,
  `add_job_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `show_freelancers_admin`
--

CREATE TABLE `show_freelancers_admin` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `about_me` text NOT NULL,
  `profession` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `show_freelancers_admin`
--

INSERT INTO `show_freelancers_admin` (`id`, `user_id`, `about_me`, `profession`) VALUES
(20, 1, 'ef', 'rfqe');

-- --------------------------------------------------------

--
-- Структура таблицы `single`
--

CREATE TABLE `single` (
  `single_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `add_job_id` int(11) NOT NULL,
  `who_job_want_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `single`
--

INSERT INTO `single` (`single_id`, `user_id`, `add_job_id`, `who_job_want_id`) VALUES
(66, 7, 105, 27);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`user_id`, `name`, `gender`, `surname`, `password`, `email`, `phone`, `city`, `dob`, `image`) VALUES
(7, 'ნიკა', 'კაცი', 'ნიკაძე', '1', 'nikanikadze@gmail.com', '852785', 'თბილისი', '2023-03-31', 0x7069632d312e706e67),
(20, 'გიორგი', 'კაცი', 'გიორგაძე', '2', 'giorgi.giorgadze@gmail.com', '95333333333', 'თბილისი', '2023-05-06', 0x6d616e5f696d672e6a7067),
(21, 'დათო', 'კაცი', 'დათოძე', '4', 'ttt', '+955111111111', 'თბილისი', '2023-05-14', 0x53637265656e73686f745f362e706e67),
(22, 'ნინო', 'ქალი', 'ნინოძე', '12345', 'Ninoninodze@gmail.com', '+955688888888', 'რუსთავი', '2004-01-20', 0x4e696e6f2e706e67),
(23, 'კახა', 'კაცი', 'კახიძე', '789', 'KakhaKakhidze@gmail.com', '+955789456123', 'ბათუმი', '1998-02-21', 0x6d616e20696d67312e6a7067),
(27, 'ალექს', 'კაცი', 'ალექსიძე', '11', 'AlexAlexidze@gmail.com', '+955111111111', 'თბილისი', '2002-02-10', 0x6d616e20696d67312e6a7067);

-- --------------------------------------------------------

--
-- Структура таблицы `want_job`
--

CREATE TABLE `want_job` (
  `want_job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `add_job_id` int(11) NOT NULL,
  `SendMessage_user_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `add_job`
--
ALTER TABLE `add_job`
  ADD PRIMARY KEY (`add_job_id`),
  ADD KEY `categories_id` (`categories_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Индексы таблицы `admin_jobs`
--
ALTER TABLE `admin_jobs`
  ADD PRIMARY KEY (`admin_jobs_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `add_job_id` (`add_job_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Индексы таблицы `freelancers`
--
ALTER TABLE `freelancers`
  ADD PRIMARY KEY (`freelancers_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notifications_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `pay_notif`
--
ALTER TABLE `pay_notif`
  ADD PRIMARY KEY (`pay_notif_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Индексы таблицы `send_job`
--
ALTER TABLE `send_job`
  ADD PRIMARY KEY (`send_job_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `add_job_id` (`add_job_id`);

--
-- Индексы таблицы `show_freelancers_admin`
--
ALTER TABLE `show_freelancers_admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `single`
--
ALTER TABLE `single`
  ADD PRIMARY KEY (`single_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `want_job`
--
ALTER TABLE `want_job`
  ADD PRIMARY KEY (`want_job_id`),
  ADD KEY `add_job_id` (`add_job_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `SendMessage_user_id` (`SendMessage_user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `add_job`
--
ALTER TABLE `add_job`
  MODIFY `add_job_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `admin_jobs`
--
ALTER TABLE `admin_jobs`
  MODIFY `admin_jobs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `freelancers`
--
ALTER TABLE `freelancers`
  MODIFY `freelancers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT для таблицы `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notifications_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=677;

--
-- AUTO_INCREMENT для таблицы `pay_notif`
--
ALTER TABLE `pay_notif`
  MODIFY `pay_notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT для таблицы `send_job`
--
ALTER TABLE `send_job`
  MODIFY `send_job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=449;

--
-- AUTO_INCREMENT для таблицы `show_freelancers_admin`
--
ALTER TABLE `show_freelancers_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `single`
--
ALTER TABLE `single`
  MODIFY `single_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `want_job`
--
ALTER TABLE `want_job`
  MODIFY `want_job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `add_job`
--
ALTER TABLE `add_job`
  ADD CONSTRAINT `add_job_ibfk_1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`categories_id`),
  ADD CONSTRAINT `add_job_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Ограничения внешнего ключа таблицы `admin_jobs`
--
ALTER TABLE `admin_jobs`
  ADD CONSTRAINT `admin_jobs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `admin_jobs_ibfk_2` FOREIGN KEY (`add_job_id`) REFERENCES `add_job` (`add_job_id`);

--
-- Ограничения внешнего ключа таблицы `freelancers`
--
ALTER TABLE `freelancers`
  ADD CONSTRAINT `freelancers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Ограничения внешнего ключа таблицы `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Ограничения внешнего ключа таблицы `pay_notif`
--
ALTER TABLE `pay_notif`
  ADD CONSTRAINT `pay_notif_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Ограничения внешнего ключа таблицы `send_job`
--
ALTER TABLE `send_job`
  ADD CONSTRAINT `send_job_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `send_job_ibfk_3` FOREIGN KEY (`add_job_id`) REFERENCES `add_job` (`add_job_id`);

--
-- Ограничения внешнего ключа таблицы `want_job`
--
ALTER TABLE `want_job`
  ADD CONSTRAINT `want_job_ibfk_1` FOREIGN KEY (`add_job_id`) REFERENCES `add_job` (`add_job_id`),
  ADD CONSTRAINT `want_job_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `want_job_ibfk_3` FOREIGN KEY (`SendMessage_user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
