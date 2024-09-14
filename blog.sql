-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2024 at 10:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(7, 'Technology', 'Covers the latest trends, reviews, and tutorials related to software, gadgets, programming, and emerging technologies.'),
(8, 'Education &amp; Learning', 'Articles centered around educational resources, study tips, career advice, and personal development.'),
(9, 'Travel', 'Explores destinations, travel tips, experiences, and guides for both local and international adventures.'),
(10, 'Food', 'Shares recipes, cooking techniques, and food reviews, as well as tips for aspiring home chefs and food enthusiasts.'),
(11, 'Business ', 'Provides insights on entrepreneurship, investment strategies, financial management, and business trends.'),
(12, 'Lifestyle', 'Focuses on day-to-day living, from fashion and home decor to life hacks and personal experiences.'),
(13, 'Entertainment', 'Reviews, news, and updates related to movies, music, games, and popular culture.'),
(14, 'Personal Development', 'Motivational content and self-help strategies aimed at improving various aspects of personal growth and productivity.'),
(15, 'Environment', 'Articles highlighting eco-friendly practices, climate change, and ways to live a more sustainable lifestyle.'),
(16, 'Wild Life', 'Features content about the natural world, focusing on animals, conservation efforts, endangered species, habitats, and biodiversity. This category can explore wildlife photography, ecology, and ways to protect the environment for future generations.'),
(17, 'Music', 'Delves into various genres, artist spotlights, album reviews, and music theory. This category covers everything from emerging artists and popular hits to in-depth discussions on the impact of music on culture, as well as tips for musicians and fans alike.'),
(18, 'General', 'A broad category that encompasses a wide range of topics including current events, personal opinions, and miscellaneous subjects that don&#039;t fit into specific niches. Perfect for casual content and diverse blog posts.'),
(19, 'Sport', 'Covers everything related to the world of sports, from match reviews, player profiles, and team news to fitness tips, sports analysis, and updates on local and international competitions.'),
(20, 'History', 'Focuses on historical events, figures, and periods that shaped the world. This category can include articles about ancient civilizations, important historical milestones, and discussions on how history influences the present.'),
(21, 'Art', 'Explores various forms of artistic expression, including painting, sculpture, photography, and digital art. This category covers art history, artist spotlights, creative techniques, and the cultural significance of art movements throughout the ages. It&rsquo;s perfect for showcasing both classic and contemporary works.'),
(28, 'qq', 'qqqq');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cmd_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `post_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`cmd_id`, `content`, `user_id`, `post_id`) VALUES
(43, 'good', 27, 19);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `title`, `description`, `price`, `thumbnail`, `stock`) VALUES
(4, 'Backpack Bag', 'Discover the perfect blend of style and functionality with our white backpack featuring a vibrant blue logo for Pen Ur Blog. This eye-catching design not only showcases your passion for blogging but also offers ample space for all your essentials. Whether you&#039;re heading to class, a coffee shop, or a casual outing, this backpack is your ideal companion for both practicality and flair.', 25000.00, '17259498946242047297978481395.jpg', 20),
(5, 'Bookmark', 'Discover our charming set of two blue and white bookmarks, beautifully designed with intricate patterns that add a touch of elegance to your reading experience. Crafted from soft enamel, these bookmarks are not only visually appealing but also durable, making them perfect for your favorite books or as thoughtful gifts for fellow book lovers. Elevate your reading moments with these delightful accessories that blend functionality with style!', 10000.00, '17259499586242464060130052592.jpg', 13),
(6, 'Stainless Steel Cup', 'Introducing our stylish blue stainless steel cup, perfect for on-the-go hydration! This durable cup features a secure lid and a convenient straw, making it ideal for enjoying your favorite beverages anywhere. With the Pen Ur Blog logo elegantly displayed, it&rsquo;s not just a drinkware item; it&rsquo;s a statement piece for bloggers and enthusiasts alike. Stay refreshed and showcase your passion for blogging with this chic accessory!', 20000.00, '17259500096242047297978481399.jpg', 35),
(7, 'Notebook &amp; Pencil', 'Discover the perfect companion for your thoughts and ideas with this sleek black notebook, elegantly paired with a stylish pen resting on top. Its minimalist design not only looks great on any desk but also invites creativity and organization. Ideal for jotting down notes, sketches, or daily reflections, this notebook is a must-have for students, professionals, and anyone who loves to write.', 15000.00, '17259500376242047297978481398.jpg', 9),
(8, 'T-shirt', 'This ultimate crew neck tee is tailored for refined modern man and woman with uncomplicated style, ultimate comfort, and modern fit\r\nEffortless for everyday look, can be worn solo or pair with your favorite blazer for sophisticated style\r\nMade with restructured fine staple cotton through innovated technology that delivers silky, lustrous, and long lasting color which leaves shirts looking new months after washes.', 15000.00, '17259502026242047297978481400.jpg', 55),
(9, 'Hoodie', 'Besick Hoodie in a fabric made from a cotton blend with soft brushed inside. Relaxed fit with a lined, double hood , dropped shoulders and long sleeves. Kangaroo pocket and ribbing at the cuffs and hem.\r\nHoodie in Heavy 300GSM made from a cotton blend fleece fabric. Relaxed fit , double hood, a kangaroo pocket, long sleeves and wide ribbing at the cuffs and hem. Soft brushed inside.', 45000.00, '17259502476242047297978481397.jpg', 20);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `item_id`, `user_id`, `fullname`, `email`, `phone`, `address`, `city`, `state`) VALUES
(1, 5, 27, 'Eaint Pyae Phyo', 'eaintpyaephyo.epp@gmail.com', '09 962614510', '12A, Zi Za War St, Kyan Khin Su Qtr, Mingalardon Ts,', 'Yangon', 'Yangon'),
(2, 5, 27, 'Eaint Pyae Phyo', 'eaintpyaephyo.epp@gmail.com', '09 962614510', '12A, Zi Za War St, Kyan Khin Su Qtr, Mingalardon Ts,', 'Yangon', 'Yangon'),
(3, 7, 29, 'Eaint Pyae Phyo', 'eaintpyaephyo.epp@gmail.com', '09 962614510', '12A, Zi Za War St, Kyan Khin Su Qtr, Mingalardon Ts,', 'Yangon', 'Yangon');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `author_id` int(11) UNSIGNED NOT NULL,
  `is_featured` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `thumbnail`, `date_time`, `category_id`, `author_id`, `is_featured`) VALUES
(8, 'A trip to Northern Lights', '\r\nThe Northern Lights (Aurora Borealis) \r\nWhat are the Northern Lights?\r\n Natural Phenomenon: The Northern Lights, or Aurora Borealis, are a natural light display predominantly  seen in high-latitude regions around the Arctic and Antarctic. They are caused by the collision of solar wind and magnetospheric charged particles with the high-altitude atmosphere (thermosphere).The lights can display various\r\n                            colors, including green, pink, red, yellow, blue, and violet, with green and pink being the most common.\r\n            Best Time to See the Northern Lights Optimal Season:\r\nThe best time to see the Northern Lights is during the winter months, from late September to early April, when the nights are\r\n    longest and the skies are darkest.\r\n Optimal Conditions: Clear skies and minimal light pollution are essential for the best viewing experience.\r\n  Best Places to See the Northern Lights are Norway,Iceland,Sweden,Finland and Alaska USA.', '17259467286266909983186731205.jpg', '2024-09-10 05:38:48', 9, 27, 0),
(9, 'Revolutionizing Connectivity: The Latest in IT Devices', 'In today&rsquo;s fast-paced digital world, IT devices are crucial in shaping how we work, communicate, and entertain ourselves. From powerful laptops to sleek smartphones, these devices drive innovation and enhance productivity, connectivity, and convenience. As technology continues to evolve, new IT devices emerge, offering cutting-edge features and capabilities that redefine our tech experiences.\r\n\r\nSmartphones remain at the forefront of IT devices, serving as multifunctional hubs that keep us connected and organized. The latest models come equipped with advanced processors, high-resolution cameras, and innovative features like facial recognition and 5G connectivity. These enhancements not only improve performance but also enable seamless integration with other smart devices, creating a more interconnected digital ecosystem.\r\n\r\nLaptops have also seen significant advancements, catering to various needs from high-performance gaming to professional work. Modern laptops boast powerful processors, extended battery life, and lightweight designs. Features such as high-resolution touchscreens, backlit keyboards, and robust security options make them versatile tools for both productivity and leisure.\r\n\r\nTablets continue to bridge the gap between laptops and smartphones, offering a balance of portability and functionality. With improved graphics, faster processors, and support for stylus input, tablets are ideal for creative professionals, students, and casual users alike. The ability to run a wide range of applications makes them valuable for tasks such as drawing, note-taking, and multimedia consumption.\r\n\r\nSmartwatches and wearable technology have become increasingly popular, providing users with real-time notifications, fitness tracking, and health monitoring. The latest smartwatches feature heart rate sensors, GPS tracking, and integration with mobile apps, offering a convenient way to manage personal health and stay connected without needing to constantly check a smartphone.\r\n\r\nSmart home devices like voice assistants, smart thermostats, and connected lighting systems are revolutionizing home automation. These devices offer enhanced control over various aspects of our living environments, allowing users to automate routines, improve energy efficiency, and enhance security. Integration with other smart devices and platforms ensures a cohesive and personalized smart home experience.\r\n\r\nAs IT devices continue to evolve, emerging technologies such as augmented reality (AR) and virtual reality (VR) are expanding the possibilities of digital interaction. AR and VR devices provide immersive experiences for gaming, education, and training, pushing the boundaries of how we interact with digital content.\r\n\r\nIn summary, IT devices play a pivotal role in our daily lives, driving innovation and enhancing our ability to connect, work, and play. From the latest smartphones and laptops to smart home technologies and wearable devices, these advancements continue to shape our digital experiences and redefine what is possible in the world of technology.', '1725946793latest IT devices.png', '2024-09-10 05:39:53', 7, 28, 0),
(10, 'Learn these 5 programming languages before it&#039;s too late!', '\r\nLearn these 5 programming languages before it&#039;s too late!\r\n\r\n\r\n\r\n1.Python \r\nWhy: Python&#039;s versatility, ease of learning, and widespread use in various domains like web development, data science, AI, and automation make it an essential language for any programmer.\r\nUse Cases: Data science, AI/ML, web development, automation, scripting.\r\n                        \r\n2.JavaScript \r\nWhy: As the backbone of web development, mastering JavaScript is crucial for creating dynamic and interactive websites. It&#039;s also increasingly used for back-end development with Node.js.\r\n Use Cases: Web development (front-end and back-end), mobile app development, server-side scripting.&lt;br&gt;&lt;br&gt;\r\n                            \r\n3.Java\r\nWhy: Java&#039;s stability and scalability make it a go-to language for enterprise-level applications, Android development, and large systems.\r\nUse Cases: Enterprise applications, Android development, web development, cloud computing.\r\n\r\n4.C++ \r\nWhy: C++ is essential for system-level programming, game development, and applications that require high performance and efficient resource management.\r\nUse Cases: Game development, system/software development, embedded systems, high-performance applications.\r\n\r\n5.Go (Golang)\r\nWhy: Go is rapidly gaining popularity for its simplicity, efficiency, and strong performance in cloud computing and microservices architecture, making it ideal for modern development needs.\r\nUse Cases: Cloud-native applications, microservices, distributed systems, DevOps tools.', '17259468446266909983186731221.jpg', '2024-09-10 05:40:44', 8, 28, 0),
(11, 'Interesting facts of wild life', ' 1.Octopus: Octopuses have three hearts. Two pump blood to the gills, and one pumps it to the rest of the body. When they swim, the heart that delivers blood to the body actually stops beating, which is why they\r\n prefer crawling over swimming to conserve energy.\r\n\r\n 2.Sloth: Sloths move so slowly that algae can grow on their fur. This algae provides camouflage in the trees and even offers a small amount of nourishment when sloths ingest it while grooming.\r\n\r\n 3.Cheetah: Cheetahs are the fastest land animals, capable of reaching speeds up to 70 miles per hour (112 kilometers per hour) in short bursts covering distances up to 500 meters (1,640 feet).\r\n\r\n 4.Platypus: The platypus is one of the few venomous mammals. The males have a spur on their hind limbs that can deliver a painful venom capable of paralyzing small animals and causing intense pain in humans.\r\n\r\n 5.Mantis Shrimp: The mantis shrimp has the most complex eyes in the animal kingdom, capable of seeing polarized light and having 16 types of color-receptive cones (compared to humans&#039; three). They can detect wavelengths\r\n of light that humans can&#039;t even perceive.\r\n\r\n 6.Elephant: Elephants have incredible memories and can recognize and remember friendly faces over decades. They can also remember specific locations, such as water holes, over long periods and even after several years.\r\n    \r\n 7.Arctic Fox: The Arctic fox has the warmest fur of any mammal, allowing it to survive temperatures as low as -58&deg;F (-50&deg;C). Its fur changes color with the seasons, turning white in winter to blend in with the snow and brown or grey in summer to match the tundra.', '17259469086266909983186731229.jpg', '2024-09-10 05:41:48', 16, 29, 0),
(12, 'Tips to avoid injury while working out', '1.Warm Up Properly: Begin with 5-10 minutes of light cardio and dynamic stretches to prepare your muscles.\r\n2.Use Proper Technique: Ensure you&#039;re using correct form to reduce the risk of strain and injury. \r\n3.Progress Gradually: Increase workout intensity, duration, and frequency slowly to prevent overexertion.\r\n4.Incorporate Rest Days: Take one or two rest days per week to allow your body to recover and prevent overuse injuries.\r\n5.Listen to Your Body: Stop exercising if you experience sharp pain or discomfort, and adjust your routine as needed. \r\n6.Strengthen Core Muscles: Focus on building core and stabilizer muscles to improve balance and support during exercises.\r\n7.Use Proper Equipment:&lt;/span&gt; Wear appropriate footwear and gear for your activity to provide support and reduce injury risk. \r\n8.Stay Hydrated: Drink plenty of water to avoid dehydration, which can lead to muscle cramps and fatigue.\r\n9.Cool Down and Stretch: After your workout, spend time cooling down with light cardio and static stretching to improve flexibility. \r\n10.Cross-Train: Incorporate different types of exercises to prevent overuse injuries and maintain muscle balance.\r\n', '17259470016266909983186731219.jpg', '2024-09-10 05:43:21', 12, 30, 0),
(13, 'The Dynamic World of Basketball: From Playground Dreams to NBA Stardom', 'Basketball, a fast-paced and thrilling sport, has captivated millions around the globe with its blend of athleticism, strategy, and excitement. From its humble origins in a gymnasium to its status as a global phenomenon, basketball&#039;s journey reflects its universal appeal and impact on both players and fans alike.\r\n\r\nBasketball was invented in 1891 by Dr. James Naismith, who sought to create a game that could be played indoors during the winter. With just a peach basket and a soccer ball, Naismith&#039;s invention quickly evolved into the structured game we know today. Its accessibility and simplicity contributed to its rapid growth, and basketball soon became a staple of sports culture worldwide.\r\n\r\nOne of the most exciting aspects of basketball is its pace and scoring. The game&rsquo;s constant movement and quick transitions from offense to defense create an exhilarating experience for spectators. The thrill of a buzzer-beater, a high-flying dunk, or a clutch three-pointer encapsulates the essence of basketball&rsquo;s drama and excitement. Iconic players like Michael Jordan, LeBron James, and Kobe Bryant have elevated the sport with their exceptional skills, athleticism, and competitive spirit, becoming legends in the process.\r\n\r\nThe NBA, established in 1946, has become the premier professional basketball league, showcasing the world&rsquo;s top talent. The league&rsquo;s global reach and popularity have turned basketball into a truly international sport. Teams like the Los Angeles Lakers, Boston Celtics, and Golden State Warriors have amassed large fanbases and achieved legendary status through their success and storied histories.\r\n\r\nBeyond the professional level, basketball has a significant presence in college and amateur leagues. The NCAA Men&rsquo;s Basketball Tournament, known as &ldquo;March Madness,&rdquo; captivates fans with its thrilling upsets and standout performances. This tournament highlights the potential of young talent and serves as a launching pad for future NBA stars.\r\n\r\nBasketball&rsquo;s influence extends beyond the court. The sport has become an integral part of popular culture, with its impact seen in music, fashion, and film. Players like Allen Iverson and Steph Curry have influenced style and trends, while films like &ldquo;Space Jam&rdquo; and &ldquo;Hoosiers&rdquo; have cemented basketball&rsquo;s place in cinematic history.\r\n\r\nMoreover, basketball&rsquo;s ability to foster community and personal growth is profound. Many players have used their platform to support charitable causes and engage in community service. Organizations like the LeBron James Family Foundation and the Kevin Durant Charity Foundation illustrate how basketball can positively impact lives and inspire future generations.\r\n\r\nHowever, the sport also faces challenges. Issues such as player health, particularly concerning injuries and long-term impacts of concussions, are critical topics in the basketball community. Additionally, the rise of player empowerment and the dynamics of team management continue to shape the sport&rsquo;s evolving landscape.\r\n\r\nThe evolution of basketball has also been marked by technological advancements. The use of analytics and performance data has transformed coaching strategies and player development. Tools such as shot-tracking systems and advanced statistics provide deeper insights into the game, enhancing both player performance and fan engagement.\r\n\r\nAs basketball continues to grow and evolve, its ability to inspire, entertain, and connect people remains at the heart of its appeal. The sport&rsquo;s rich history, combined with its ongoing innovations and global impact, ensures that basketball will continue to be a dynamic and cherished part of the sporting world. Whether you&#039;re watching a high-stakes NBA Finals game or playing a casual pick-up game at the local park, basketball&#039;s vibrant energy and universal appeal make it a true global pastime.', '1725947111basketbal.jpg', '2024-09-10 05:45:11', 19, 30, 0),
(14, 'The Evolution of Pop Music: A Journey Through Hits and Trends', 'Pop music, short for popular music, has been a driving force in the global music industry for decades, shaping culture and reflecting the zeitgeist of each era. From its early roots to the genre&rsquo;s current state, pop music has continually evolved, embracing new sounds, technologies, and influences while retaining its core appeal: catchy melodies and broad accessibility.\r\n\r\nThe origins of modern pop music can be traced back to the 1950s, a time when artists like Elvis Presley and Chuck Berry began merging rhythm and blues with more mainstream sensibilities. This fusion created a new sound that captivated audiences and set the stage for the pop revolution. The 1960s saw the rise of The Beatles and The Beach Boys, whose innovative approaches to songwriting and production redefined the genre. Their influence was profound, blending rock &#039;n&#039; roll with a more polished pop aesthetic and introducing the world to the concept of the pop &quot;album&quot; as a cohesive artistic statement.\r\n\r\nThe 1970s brought the advent of disco, a genre that would leave a lasting imprint on pop music. With its infectious beats, danceable rhythms, and glamorous style, disco dominated the charts and dance floors. Artists like Donna Summer and the Bee Gees became icons of the era, and their influence is still felt in today&rsquo;s dance-pop and electronic music.\r\n\r\nThe 1980s marked a significant transformation in pop music, driven by the rise of MTV and the music video as a crucial promotional tool. This era saw the emergence of mega-stars like Michael Jackson and Madonna, who used visual flair and groundbreaking production techniques to enhance their music. Jackson&rsquo;s &quot;Thriller&quot; became a cultural phenomenon, while Madonna pushed boundaries with her provocative image and innovative sound, solidifying her status as the &quot;Queen of Pop.&quot;\r\n\r\nThe 1990s and early 2000s continued to evolve the pop landscape with the rise of boy bands and girl groups, such as *NSYNC and the Spice Girls. This era was characterized by a blend of catchy hooks, danceable beats, and a focus on marketability. The integration of hip-hop elements into pop music also became prominent, with artists like Will Smith and Destiny&#039;s Child leading the way. Meanwhile, the emergence of digital technology and the internet began to reshape how music was distributed and consumed, paving the way for new artists to gain popularity through online platforms.\r\n\r\nIn the 2010s, pop music became increasingly diverse and experimental, incorporating elements from various genres including electronic dance music (EDM), indie rock, and R&amp;B. Artists like Lady Gaga and Katy Perry pushed the boundaries of pop with their eclectic styles and elaborate performances. The rise of streaming services such as Spotify and Apple Music transformed how listeners accessed music, allowing for more personalized and on-demand listening experiences. This era also saw the emergence of genre-blending stars like Billie Eilish and Ariana Grande, who combined pop with elements of alternative and hip-hop to create fresh, new sounds.\r\n\r\nToday&rsquo;s pop music is marked by its fusion of global influences and innovative production techniques. The genre continues to evolve, embracing diverse sounds from around the world and reflecting social and cultural trends. Artists like BTS and Bad Bunny have brought international flavors to mainstream pop, highlighting the genre&rsquo;s ability to adapt and resonate across different cultures.\r\n\r\nIn essence, pop music remains a dynamic and ever-changing genre, constantly evolving to capture the spirit of the times. From its origins in the early rock &#039;n&#039; roll era to its current state as a global phenomenon, pop music&rsquo;s journey reflects broader shifts in technology, culture, and society. As the genre continues to evolve, it will undoubtedly keep pushing boundaries and setting new trends, captivating audiences with its ever-refreshing blend of familiarity and innovation.', '1725947146pop music.jpg', '2024-09-10 05:45:46', 17, 30, 0),
(15, 'The Evolution and Impact of Modern Art: From Impressionism to Contemporary Creations', 'Modern art, a broad and dynamic movement, has reshaped how we view the world and express ourselves, breaking away from classical traditions to embrace innovation, experimentation, and individuality. Emerging in the late 19th century, modern art reflects society&rsquo;s rapid changes, from industrialization to global conflict, social progress, and technological advancement. At its core, modern art represents a departure from the strict realism of earlier art forms, encouraging artists to explore new techniques, styles, and themes.\r\n\r\nOne of the earliest and most significant movements in modern art was Impressionism, led by artists like Claude Monet and Pierre-Auguste Renoir. Impressionists rejected rigid academic rules, favoring loose brushstrokes and an emphasis on light and color over precise detail. Their work captured fleeting moments, often outdoors, and was revolutionary for its time. Instead of detailed realism, they presented subjective impressions, creating a sense of movement and immediacy.\r\n\r\nFollowing Impressionism, artists continued pushing boundaries. Cubism, pioneered by Pablo Picasso and Georges Braque, fragmented subjects into geometric shapes, allowing multiple perspectives within a single piece. This movement marked a shift toward abstraction, where the representation of reality became secondary to exploring form and structure. Cubism opened the door to a more abstract approach, laying the groundwork for countless other styles that followed.\r\n\r\nSurrealism, with figures like Salvador Dal&iacute; and Max Ernst, delved into the unconscious mind, using dream-like imagery to express thoughts and emotions that lay beneath the surface of reality. These artists explored the bizarre and the fantastical, blending the real and the imaginary in ways that had never been seen before. Surrealism challenged viewers to confront their perceptions of reality and question the nature of existence.\r\n\r\nIn the mid-20th century, Abstract Expressionism emerged as a major force in the art world, with artists like Jackson Pollock and Mark Rothko focusing on spontaneous, emotional expression through bold, non-representational forms. Pollock&#039;s iconic drip paintings, for example, abandoned traditional techniques, allowing the act of creation to become the focal point of the artwork. This shift emphasized the artist&#039;s process as much as the final product, making abstract expressionism a highly personal and introspective movement.\r\n\r\nAs modern art evolved, it gave birth to a wide array of movements, including Minimalism, Pop Art, and Conceptual Art. Minimalism, led by artists like Donald Judd, rejected the complexity of earlier styles, focusing on simplicity and the use of basic shapes and colors to convey ideas. Meanwhile, Pop Art, with icons like Andy Warhol and Roy Lichtenstein, drew inspiration from mass culture, consumerism, and advertising, merging high art with everyday objects and images. This playful yet critical approach to popular culture blurred the line between art and life, challenging traditional notions of art&rsquo;s role in society.\r\n\r\nToday, contemporary art builds on the foundation laid by modern movements, constantly evolving and incorporating new technologies, mediums, and global perspectives. Artists like Yayoi Kusama and Ai Weiwei use multimedia installations, digital art, and performance to explore themes ranging from identity and politics to the environment and the human condition. The rise of digital art and artificial intelligence has expanded the possibilities even further, creating interactive, immersive experiences that push the boundaries of artistic expression.\r\nModern and contemporary art offer limitless possibilities for creativity, encouraging artists to experiment and challenge conventions. They reflect the complexities of modern life, offering a diverse and ever-changing landscape where anything can be art, from a painted canvas to an installation of everyday objects. More than just aesthetic creations, modern art pieces provoke thought, evoke emotion, and invite viewers to see the world through a new lens.\r\n\r\nThis evolution continues to shape our understanding of art and its ability to inspire and challenge us.', '1725947205Modern art.jpg', '2024-09-10 05:46:45', 21, 31, 0),
(16, 'Exploring the World of Thai Street Food: A Culinary Adventure', 'Thai street food is a vibrant blend of bold flavors, fresh ingredients, and cultural richness that reflects the heart and soul of Thailand. From bustling markets to roadside stalls, the aroma of sizzling woks and fragrant spices fills the air, tempting visitors to explore its diverse offerings.\r\n\r\nOne must-try dish is Pad Thai, a stir-fried noodle dish with a perfect balance of sweet, sour, and salty flavors, often topped with peanuts and a squeeze of lime. Another favorite is Som Tum, a spicy green papaya salad that delivers a refreshing crunch with a kick of chili.\r\n\r\nFor adventurous eaters, Moo Ping (grilled pork skewers) and Khao Kha Moo (braised pork leg over rice) offer savory delights. Pair them with Mango Sticky Rice for a sweet and satisfying finish.\r\n\r\nThai street food is more than just a meal; it&rsquo;s a sensory experience that brings people together, offering an authentic taste of local life with every bite.', '1725947243thai street food.png', '2024-09-10 05:47:23', 10, 31, 0),
(17, 'Discovering the Charm of Santorini, Greece', 'Santorini, one of the most iconic islands in Greece, offers travelers a stunning blend of natural beauty and cultural heritage. Known for its striking white-washed buildings with blue domes, the island provides a perfect escape for those seeking relaxation and adventure.\r\n\r\nStart your day in the village of Oia, where cobblestone streets and charming boutiques lead you to panoramic views of the Aegean Sea. The sunsets here are legendary, painting the sky in shades of orange, pink, and purple. For a unique experience, head to the Red Beach, with its dramatic red cliffs and crystal-clear waters. Swimming or simply soaking in the scenery is a must.\r\n\r\nSantorini&rsquo;s volcanic history also offers exciting opportunities. A hike from Fira to Oia takes you along the caldera&rsquo;s edge, offering stunning views of the sea and surrounding islands. The volcanic hot springs near Nea Kameni are another highlight, where you can unwind in warm, therapeutic waters.\r\n\r\nWhether it&#039;s dining on fresh seafood at a seaside taverna, or wandering through ancient ruins, Santorini enchants at every turn.', '1725947291santori.jpg', '2024-09-10 05:48:11', 9, 31, 0),
(18, 'The Majestic Wildlife of the Serengeti: A Journey Through Africa&rsquo;s Wild Heart', 'The Serengeti, stretching across northern Tanzania and into southwestern Kenya, is one of the world&rsquo;s most celebrated wildlife reserves. It is a place where nature&rsquo;s most awe-inspiring creatures roam freely across vast plains, offering visitors a chance to witness the raw beauty and power of the animal kingdom.\r\n\r\nOne of the Serengeti&rsquo;s most famous attractions is the Great Migration, often described as the greatest wildlife show on Earth. Each year, millions of wildebeest, zebras, and gazelles embark on a perilous journey in search of fresh grazing grounds, braving treacherous river crossings where crocodiles lie in wait. This epic cycle of life and death is a profound reminder of the delicate balance of nature.\r\n\r\nBut the Serengeti offers more than just the migration. It is home to Africa&rsquo;s &quot;Big Five&quot;: lions, leopards, elephants, buffalo, and rhinos. Early morning game drives offer a chance to witness a pride of lions stalking their prey or a herd of elephants meandering through the savannah. The elusive leopard, often hidden in the trees, presents a rare and exciting sighting for the lucky few.\r\n\r\nBirdwatchers will also find paradise here, with over 500 species of birds, including the colorful lilac-breasted roller and the imposing secretary bird. Each season in the Serengeti brings its own unique spectacles, from calving wildebeests in the rainy season to the predator-prey drama during the dry months.\r\n\r\nThe Serengeti isn&rsquo;t just about the animals&mdash;it&rsquo;s about the ecosystem that sustains them. Its grasslands, rivers, and kopjes (rocky outcrops) provide a vital habitat for a multitude of species. Protecting this fragile environment is crucial for the survival of the wildlife that calls it home, reminding us of the importance of conservation.\r\n\r\nA visit to the Serengeti is more than just a safari; it&rsquo;s a journey into the heart of the wild, where every day brings a new encounter with nature&rsquo;s majesty.', '1725947349Serengeti.jpeg', '2024-09-10 05:49:09', 16, 29, 0),
(19, 'Exploring the Boundaries of Digital Art: The Future of Creative Expression', 'Digital art, a dynamic and rapidly evolving field, has revolutionized the way we create and perceive art. By harnessing the power of technology, digital artists push the boundaries of traditional mediums, creating innovative works that challenge our understanding of what art can be. From interactive installations to stunningly realistic digital paintings, the scope of digital art is vast and varied, reflecting the ever-changing landscape of technology and creativity.\r\n\r\nAt its core, digital art involves the use of digital tools and technologies to create, manipulate, and display artwork. This can range from digital painting, where artists use software like Adobe Photoshop or Corel Painter to create images that mimic traditional painting techniques, to 3D modeling, where complex virtual environments and characters are crafted using programs like Blender or Autodesk Maya.\r\n\r\nOne of the most exciting aspects of digital art is its ability to create interactive experiences. Artists can design works that respond to viewer input, allowing for a personalized and immersive experience. For example, interactive installations may use sensors and cameras to alter the artwork based on audience movement or touch, blurring the line between observer and participant. This level of engagement offers new ways to experience and interact with art, transforming the traditional gallery visit into an active, participatory event.\r\n\r\nGenerative art is another fascinating area within digital art, where algorithms and code play a central role in the creative process. Artists like Casey Reas and Joshua Davis use programming to generate visual patterns and forms that are both unique and unpredictable. By setting parameters and letting the code run its course, these artists create complex, algorithmically-driven works that are a collaboration between human intent and machine execution.\r\n\r\nThe rise of virtual reality (VR) and augmented reality (AR) has further expanded the possibilities of digital art. VR allows artists to construct immersive, three-dimensional worlds that viewers can explore using VR headsets. This medium enables a new level of spatial interaction, allowing users to experience art in ways that were previously unimaginable. AR, on the other hand, overlays digital elements onto the real world through devices like smartphones or AR glasses, creating interactive and contextually rich experiences that blend the physical and digital realms.\r\n\r\nDigital art&rsquo;s impact on traditional media is also significant. The digital revolution has democratized art production and distribution, making it easier for artists to reach a global audience through online platforms and social media. This shift has resulted in a more diverse and inclusive art world, where emerging artists can showcase their work alongside established names without the barriers of traditional galleries.\r\n\r\nMoreover, the integration of artificial intelligence (AI) into digital art is opening new frontiers. AI algorithms can now generate art, analyze styles, and even collaborate with human artists. Tools like DeepArt and DALL-E are capable of producing visually striking images based on textual descriptions or stylistic inputs, pushing the boundaries of creativity and challenging our notions of authorship and originality.\r\n\r\nDespite its many innovations, digital art faces its own set of challenges. Issues such as digital preservation, copyright concerns, and the ephemeral nature of technology pose questions about the longevity and ownership of digital works. As the field continues to evolve, addressing these concerns will be crucial for the future of digital art.', '1725947384digital art.png', '2024-09-10 05:49:44', 21, 29, 0),
(20, 'Exploring Bagan: A Timeless Journey Through Myanmar&rsquo;s Ancient Wonders', 'Nestled in the heart of Myanmar, Bagan is a breathtaking testament to the rich history and grandeur of ancient civilizations. With over 2,000 temples, pagodas, and stupas scattered across a vast plain, Bagan is often considered one of the most remarkable archaeological sites in Asia. A journey to this mystical land offers an enchanting blend of history, culture, and natural beauty.\r\n\r\nArriving in Bagan is like stepping back in time. The landscape is dotted with an impressive array of ancient structures, each telling a story of its own. The most iconic of these is the Ananda Temple, a stunning example of early Bagan architecture. Known for its intricate carvings and four massive Buddha statues, the temple is a must-visit for anyone interested in the region&#039;s spiritual and artistic heritage.\r\n\r\nAnother highlight is the Shwezigon Pagoda, a golden stupa that serves as a focal point for Bagan&rsquo;s religious life. Its shimmering golden exterior and surrounding relics offer a glimpse into the devotional practices of the past. As you wander through the complex, you&#039;ll encounter various shrines and stupas, each with its unique charm and historical significance.\r\n\r\nOne of the most magical experiences in Bagan is witnessing the sunrise or sunset over the ancient temples. Climbing to the top of a pagoda as the first light of dawn breaks over the horizon reveals a stunning panorama of temples emerging from the mist. The sight of the sun casting a golden glow over the ancient ruins is both mesmerizing and humbling.\r\n\r\nFor those looking to explore beyond the temples, the Bagan Archaeological Museum provides valuable insights into the history and significance of the region. The museum&rsquo;s exhibits, which include artifacts, sculptures, and ancient manuscripts, offer a deeper understanding of the cultural and historical context of Bagan&rsquo;s temples.\r\n\r\nTraveling around Bagan is an adventure in itself. Renting a bicycle or e-bike is a popular way to explore the sprawling landscape at your own pace. The freedom to wander off the beaten path and discover hidden gems among the temples adds a sense of excitement to your journey. Local guides are also available, offering fascinating insights and stories about the history and significance of the sites you visit.\r\n\r\nWhen it comes to local cuisine, Bagan doesn&rsquo;t disappoint. The city offers a range of dining options, from traditional Burmese dishes to international cuisine. Be sure to try some local specialties, such as Mohinga (a fragrant fish noodle soup) or Tea Leaf Salad, which captures the essence of Burmese flavors.\r\n\r\nAs you traverse Bagan&rsquo;s ancient landscape, you&rsquo;ll find that the region is not just a collection of ruins but a living testament to a bygone era. The hospitality of the local people, the serenity of the temples, and the sheer scale of the archaeological wonder combine to create an unforgettable experience.\r\n\r\nBagan is a place where time seems to stand still, offering travelers a rare opportunity to connect with the past and marvel at the achievements of an ancient civilization. Whether you&#039;re an avid historian, a spiritual seeker, or simply a lover of breathtaking landscapes, Bagan promises an experience that will linger in your memory long after you leave.', '1725950288bagan.jpg', '2024-09-10 06:38:08', 9, 27, 1),
(21, 'History of Pizza', 'The History of Margherita Pizza\r\nOrigin: Pizza, in various forms, has been around for centuries, with ancient Greeks and Romans baking flatbreads topped with olive oil and herbs. However, the modern pizza we recognize today, especially the Margherita, has its roots in Naples, Italy.\r\n                \r\nThe Birth of Margherita Pizza:\r\nIn 1889, Queen Margherita of Savoy, the queen of Italy, visited Naples with her husband, King Umberto I. The royal couple was curious about the local cuisine, so they summoned the most famous\r\npizzaiolo (pizza maker) in Naples, Raffaele Esposito, to prepare a selection of pizzas for them. Esposito crafted three different pizzas for the queen: one topped with garlic, one with anchovies, and the third with tomatoes, mozzarella\r\ncheese, and fresh basil. The third pizza, with its ingredients representing the colors of the Italian flag (red from tomatoes, white from mozzarella, and green from basil), was the queen&rsquo;s favorite. In her honor, Esposito named it &quot;Pizza Margherita.&quot;\r\n                \r\nCultural Significance: \r\nThe creation of the Margherita pizza marked a pivotal moment in the popularization of pizza beyond Naples. It symbolized not just a culinary creation but also national pride, embodying the colors of Italy. Over the years, pizza spread from Naples to the rest of Italy, and eventually, with the wave of Italian immigrants, it found its way to the United States and around the globe, becoming a beloved food worldwide.\r\n        \r\nToday: \r\nMargherita pizza remains one of the most popular varieties of pizza, celebrated for its simplicity and the way it captures the essence of Italian cuisine: fresh ingredients, balanced flavors, and a connection to cultural heritage.', '17259503396266909983186731231.jpg', '2024-09-10 06:38:59', 10, 27, 0),
(22, 'Exploring the Hidden Gems of Kyoto', 'Kyoto, Japan&rsquo;s ancient capital, is renowned for its stunning temples, traditional wooden houses, and serene gardens. While famous sites like the Fushimi Inari Shrine and Kinkaku-ji attract millions of visitors annually, Kyoto also has numerous lesser-known treasures waiting to be explored. One such gem is the Philosopher&#039;s Path, a tranquil walkway lined with cherry blossom trees that offers a peaceful escape from the city&rsquo;s hustle and bustle.\r\n\r\nAnother hidden gem is the Arashiyama Bamboo Grove, a breathtaking forest of towering bamboo stalks that create a mesmerizing natural corridor. Nearby, the lesser-visited Tenryu-ji Temple provides a picturesque setting with its beautifully landscaped gardens and historical architecture. For those interested in traditional crafts, the Nishiki Market is a vibrant hub where you can sample local delicacies and discover unique souvenirs. Exploring these off-the-beaten-path locations will give you a deeper appreciation of Kyoto&rsquo;s rich cultural heritage and natural beauty.\r\n', '1725953335post1.jpg', '2024-09-10 07:28:55', 9, 29, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `avatar`, `is_admin`, `bio`, `reset_token_hash`, `reset_token_expires_at`) VALUES
(27, 'Luna', 'eaintpyaephyo.epp@gmail.com', '$2y$10$cyv.Za2n794Sgt32Zl02.uDocnXi3EggbyFZD/ecZqB9BAV5HRpke', '1725946004tensura.jpg', 1, '', '73762286977a94f3cde42cf222dd00d14d54b493a20aa96447f70d90a6e67d1e', '2024-09-15 01:48:21'),
(28, 'TechExplorer', 'techexplorer@gmail.com', '$2y$10$gKr.7zxueggNICqm0MWdeOj1uiqd2rK7DN2fKmKEyHseP0/q6/GM6', '1725946323techman.jpg', 0, '', NULL, NULL),
(29, 'CheesyAlex', 'cheesyalex@gmail.com', '$2y$10$5MgXS1C85Jk.LsbOVXhppuoIV/MIRTBLOLtf0nmLERqK6oMEoieqO', '1725946352chessyalex.jpg', 0, '', NULL, NULL),
(30, 'NinjaBoy', 'ninjaboy@gmail.com', '$2y$10$eLVMOjkMhOjxylq4pWnmfeYQsRHtvYfBN8p5.voGlOmwCOqBTx34W', '1725946377ninjaboy.jpeg', 0, '', NULL, NULL),
(31, 'CutiePie', 'cutiepie@gmail.com', '$2y$10$tNiadt2yQ/s8S//reQKirOeaGl./arubOOhFAz.olDO233MDMN3eK', '1725946401aesthetic-profile-picture-52t290ggbex44jma.jpg', 0, '', NULL, NULL),
(32, 'TheMyth_TheLegend', 'themyththelegend@gmail.com', '$2y$10$yOjZaXzrOjLaZ4Pj0wg7S.U6I3DyAcFl9A/2dXkxX4LxPeoY511jS', '1725946424thelegend.jpg', 0, '', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cmd_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_blog_author` (`author_id`),
  ADD KEY `posts_ibfk_1` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cmd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_blog_author` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
