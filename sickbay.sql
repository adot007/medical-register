-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 28, 2024 at 01:48 PM
-- Server version: 8.0.36-0ubuntu0.20.04.1
-- PHP Version: 7.4.3-4ubuntu2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `med-register`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `queue_id` int NOT NULL,
  `patient_id` int DEFAULT NULL,
  `arrival_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(11) DEFAULT NULL,
  `priority` varchar(11) DEFAULT NULL,
  `diagnosis` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `completed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clinical_data`
--

CREATE TABLE `clinical_data` (
  `document_id` int NOT NULL,
  `patient_id` int NOT NULL,
  `record_id` int NOT NULL,
  `document_name` varchar(125) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `document_description` text,
  `file_name` varchar(255) DEFAULT NULL,
  `filetype` enum('image','pdf') DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exchange_rates`
--

CREATE TABLE `exchange_rates` (
  `id` int NOT NULL,
  `rate` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exchange_rates`
--

INSERT INTO `exchange_rates` (`id`, `rate`) VALUES
(1, '0.75'),
(2, '11.50');

-- --------------------------------------------------------

--
-- Table structure for table `medical_records`
--

CREATE TABLE `medical_records` (
  `record_id` int NOT NULL,
  `patient_id` int DEFAULT NULL,
  `staff_id` int DEFAULT NULL,
  `vitals_id` int DEFAULT NULL,
  `visit_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `diagnosis` varchar(255) DEFAULT NULL,
  `prescription` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_records`
--

INSERT INTO `medical_records` (`record_id`, `patient_id`, `staff_id`, `vitals_id`, `visit_date`, `diagnosis`, `prescription`, `notes`) VALUES
(110, 1087, 100039, NULL, '2023-07-02 22:00:00', 'Disorders of trigeminal nerve', 'Minocycline Hydrochloride', 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.'),
(111, 1084, 100038, NULL, '2023-02-22 22:00:00', 'Unspecified complication following infusion and therapeutic injection, initial encounter', 'Acetaminophen, Chlorpheniramine maleate, Phenylephrine HCl', 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.'),
(112, 1084, 100038, NULL, '2023-06-07 22:00:00', 'Salter-Harris Type III physeal fracture of upper end of right tibia, initial encounter for closed fracture', 'camphor and menthol', NULL),
(113, 1084, 100038, NULL, '2023-05-30 22:00:00', 'Salter-Harris Type II physeal fracture of lower end of right tibia', 'HALOPERIDOL', NULL),
(114, 1084, 100036, NULL, '2023-01-23 22:00:00', 'Unspecified injury of flexor muscle, fascia and tendon of right index finger at wrist and hand level', 'BENZOYL PEROXIDE', 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.'),
(115, 1084, 100038, NULL, '2023-07-30 22:00:00', 'Other fracture of right lower leg, subsequent encounter for open fracture type I or II with malunion', 'Enalapril Maleate', 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.'),
(116, 1087, 100039, NULL, '2023-08-13 22:00:00', 'Displaced bimalleolar fracture of unspecified lower leg, subsequent encounter for closed fracture with routine healing', 'Acetaminophen, Dextromethorphan Hydrobromide, Phenylephrine Hydrochloride', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.'),
(117, 1084, 100036, NULL, '2023-08-18 22:00:00', 'Corrosion of first degree of single finger (nail) except thumb', 'Lisinopril and Hydrochlorothiazide', NULL),
(118, 1084, 100038, NULL, '2023-09-09 22:00:00', 'Burn of third degree of multiple sites of left wrist and hand', 'Triclosan', 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.'),
(119, 1087, 100036, NULL, '2023-08-25 22:00:00', 'Intentional self-harm by other hot fluids, subsequent encounter', 'Aluminum Zirconium Trichlorohydrex Gly', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.'),
(120, 1084, 100038, NULL, '2023-02-27 22:00:00', 'Primary blast injury of ear', 'Urea', NULL),
(121, 1087, 100039, NULL, '2023-04-01 22:00:00', 'Alcohol use complicating childbirth', 'TITANIUM DIOXIDE, OCTINOXATE, ZINC OXIDE', 'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.'),
(122, 1085, 100036, NULL, '2023-10-07 22:00:00', 'Displaced spiral fracture of shaft of right fibula, subsequent encounter for open fracture type I or II with routine healing', 'Arsenicum album, Baptisia tinctoria, Chloramphenicolum, Echinacea, Elais guineensis, Hydrastis canadensis, Mercuris solubilis, Myrrha, Nasturtium aquaticum, Nux vomica, Phosphorus, Phytolacca decandra, Pulsatilla, Ricinus communis, Sepia, Xanthoxylum frax', NULL),
(123, 1087, 100039, NULL, '2023-06-07 22:00:00', 'Idiopathic chronic gout, ankle and foot', 'doxazosin mesylate', 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.'),
(124, 1087, 100039, NULL, '2023-11-14 22:00:00', 'Localized vascularization of cornea, bilateral', 'Fentanyl Citrate', 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.'),
(125, 1087, 100038, NULL, '2023-05-01 22:00:00', 'Nondisplaced segmental fracture of shaft of humerus, unspecified arm, subsequent encounter for fracture with malunion', 'Penicilium chrysogenum', NULL),
(126, 1085, 100036, NULL, '2023-06-28 22:00:00', 'Unspecified open wound of unspecified finger with damage to nail, sequela', 'ZINC OXIDE', 'Fusce consequat. Nulla nisl. Nunc nisl.'),
(127, 1084, 100038, NULL, '2023-01-06 22:00:00', 'Other chronic hematogenous osteomyelitis, tibia and fibula', 'Metoclopramide', NULL),
(128, 1085, 100036, NULL, '2023-03-15 22:00:00', 'Osteonecrosis due to previous trauma, tibia and fibula', 'Benzoyl Peroxide', 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.'),
(129, 1087, 100038, NULL, '2023-11-01 22:00:00', 'Hemorrhagic detachment of retinal pigment epithelium, unspecified eye', 'Amlodipine besylate', 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.'),
(130, 1085, 100039, NULL, '2023-03-16 22:00:00', 'Atherosclerosis of nonbiological bypass graft(s) of the extremities with rest pain', 'tizanidine', NULL),
(131, 1087, 100038, NULL, '2022-12-19 22:00:00', 'Penetrating wound with foreign body of unspecified eyeball, sequela', 'Menthol', NULL),
(132, 1087, 100038, NULL, '2023-10-26 22:00:00', 'Toxic effect of tin and its compounds, intentional self-harm, sequela', 'Mineral Oil, Petrolatum, Phenylephrine HCL', NULL),
(133, 1085, 100039, NULL, '2023-01-16 22:00:00', 'Pleural condition, unspecified', 'OCTINOXATE, TITANIUM DIOXIDE', NULL),
(134, 1087, 100038, NULL, '2023-03-21 22:00:00', 'Other secondary chronic gout, hand', 'Amlodipine Besylate', 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.'),
(135, 1084, 100039, NULL, '2023-03-04 22:00:00', 'Varus deformity, not elsewhere classified, right hip', 'Polyvinyl Alcohol', NULL),
(136, 1085, 100038, NULL, '2023-05-29 22:00:00', 'Poisoning by, adverse effect of and underdosing of antiallergic and antiemetic drugs', 'Acetaminophen', 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.'),
(137, 1084, 100039, NULL, '2023-08-16 22:00:00', 'Chronic conjunctivitis', 'Sorrel Mixture', 'Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.'),
(138, 1087, 100038, NULL, '2023-02-27 22:00:00', 'Other recurrent atlantoaxial dislocation', 'OCTINOXATE', 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.'),
(139, 1084, 100039, NULL, '2023-04-20 22:00:00', 'Nondisplaced transverse fracture of shaft of unspecified femur, initial encounter for closed fracture', 'diltiazem hydrochloride', NULL),
(140, 1085, 100039, NULL, '2023-06-07 22:00:00', 'Contusion of other intra-abdominal organs, sequela', 'amlodipine besylate', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.'),
(141, 1084, 100038, NULL, '2022-12-09 22:00:00', 'Attention-deficit hyperactivity disorder, unspecified type', 'oxycodone hydrochloride', NULL),
(142, 1084, 100039, NULL, '2023-01-21 22:00:00', 'Pathological fracture in neoplastic disease, left ulna', 'METOPROLOL SUCCINATE', 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.'),
(143, 1085, 100038, NULL, '2023-07-05 22:00:00', 'Chronic embolism and thrombosis of axillary vein', 'Lamotrigine', NULL),
(144, 1084, 100036, NULL, '2023-05-05 22:00:00', 'Contusion of ovary', 'Alcohol', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.'),
(145, 1087, 100038, NULL, '2023-08-22 22:00:00', 'Hemorrhagic choroidal detachment, unspecified eye', 'Aspirin', NULL),
(146, 1084, 100036, NULL, '2023-11-03 22:00:00', 'Melanocytic nevi of lip', 'Titanium Dioxide', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.'),
(147, 1085, 100038, NULL, '2023-09-28 22:00:00', 'Salter-Harris Type II physeal fracture of phalanx of left toe, sequela', 'Nicotine Polacrilex', NULL),
(148, 1085, 100039, NULL, '2023-04-01 22:00:00', 'Puncture wound with foreign body of anus', 'Sodium Fluoride', 'Sed ante. Vivamus tortor. Duis mattis egestas metus.'),
(149, 1087, 100039, NULL, '2023-11-11 22:00:00', 'Military operations involving thermal radiation effect of nuclear weapon, civilian, initial encounter', 'Arnica montana, Carduus marianus, Hepar suis, Korean ginseng, Phosphoricum acidum, Pituitary suis,', NULL),
(150, 1085, 100036, NULL, '2023-01-30 22:00:00', 'Laceration with foreign body of right elbow, subsequent encounter', 'Malt', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.'),
(151, 1084, 100039, NULL, '2023-05-30 22:00:00', 'Struck by goose', 'Oxycodone and Acetaminophen', 'Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.'),
(152, 1084, 100038, NULL, '2023-09-20 22:00:00', 'Dysarthria following unspecified cerebrovascular disease', 'oxymetazoline hydrochloride', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis'),
(153, 1087, 100039, NULL, '2023-10-31 22:00:00', 'Pathological fracture, left humerus, subsequent encounter for fracture with nonunion', 'levothyroxine sodium tablets', NULL),
(154, 1087, 100039, NULL, '2023-08-19 22:00:00', 'Hallucinogen abuse with hallucinogen-induced mood disorder', 'Simethicone', NULL),
(155, 1085, 100038, NULL, '2023-01-24 22:00:00', 'Taeniasis, unspecified', 'TITANIUM DIOXIDE, OCTINOXATE, ZINC OXIDE', NULL),
(156, 1084, 100039, NULL, '2023-03-03 22:00:00', 'Nondisplaced Maisonneuve\'s fracture of left leg, initial encounter for closed fracture', 'ALCOHOL', NULL),
(157, 1084, 100039, NULL, '2023-11-29 22:00:00', 'Sprain of unspecified part of right wrist and hand, sequela', 'Hydrochlorothiazide', NULL),
(158, 1087, 100036, NULL, '2023-10-16 22:00:00', 'Chorioretinal inflammation', 'Eucalyptol, Menthol, Methyl Salicylate, and Thymol', 'Fusce consequat. Nulla nisl. Nunc nisl.'),
(159, 1085, 100039, NULL, '2023-04-01 22:00:00', 'Courtyard of prison as the place of occurrence of the external cause', 'Chlorpheniramine Maleate, Dextromethorphan Hydrobromiede, and Pseudoephedrine Hydrochloride', 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.'),
(160, 1084, 100036, NULL, '2023-06-05 22:00:00', 'Fracture of other specified skull and facial bones, right side, subsequent encounter for fracture with routine healing', 'Alprazolam', NULL),
(161, 1085, 100039, NULL, '2023-01-29 22:00:00', 'Diabetes mellitus due to underlying condition with hyperosmolarity with coma', 'fluoxetine hydrochloride', 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.'),
(162, 1084, 100036, NULL, '2023-04-25 22:00:00', 'Occupant of streetcar injured in other specified transport accidents', 'aluminum hydroxide and magnesium hydroxide and simethicone', NULL),
(163, 1084, 100038, NULL, '2023-06-15 22:00:00', 'Foreign body in mouth, initial encounter', 'Lisinopril', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.'),
(164, 1085, 100038, NULL, '2023-01-01 22:00:00', 'Contusion of other part of small intestine, initial encounter', 'Lamotrigine', NULL),
(165, 1085, 100039, NULL, '2023-02-07 22:00:00', 'Puncture wound with foreign body of elbow', 'Menthol and Zinc Oxide', NULL),
(166, 1087, 100038, NULL, '2023-11-03 22:00:00', 'Displaced oblique fracture of shaft of unspecified tibia, subsequent encounter for open fracture type IIIA, IIIB, or IIIC with routine healing', 'Doxycycline Hyclate', 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.'),
(167, 1087, 100036, NULL, '2023-09-23 22:00:00', 'Acute contact otitis externa, bilateral', 'Amiodarone Hydrochloride', 'Sed ante. Vivamus tortor. Duis mattis egestas metus.'),
(168, 1084, 100039, NULL, '2023-08-25 22:00:00', 'Nondisplaced unspecified fracture of unspecified lesser toe(s), sequela', 'Clonidine Hydrochloride', 'Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.'),
(169, 1085, 100036, NULL, '2023-02-18 22:00:00', 'Puncture wound without foreign body of right middle finger with damage to nail', 'Avena sativa, Capsicum annuum, Hydrocotyle asiatica, Fo-ti, Ginkgo biloba, Rosmarinus officinalis, Vinca minor, Brain, Baryta carbonica,', NULL),
(170, 1085, 100038, NULL, '2023-06-02 22:00:00', 'Poisoning by diagnostic agents, undetermined, initial encounter', 'dextran 70, polyethylene glycol 400, povidone, tetrahydrozoline HCl', 'Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.'),
(171, 1085, 100039, NULL, '2023-05-22 22:00:00', 'Pathological fracture in neoplastic disease, pelvis, initial encounter for fracture', 'Loperamide Hydrochloride', NULL),
(172, 1087, 100039, NULL, '2023-09-02 22:00:00', 'Nondisplaced spiral fracture of shaft of right femur, subsequent encounter for open fracture type I or II with delayed healing', 'Clindamycin Hydrochloride', NULL),
(173, 1084, 100038, NULL, '2023-04-08 22:00:00', 'Contusion of oral cavity', 'Sotalol Hydrochloride', 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.'),
(174, 1085, 100036, NULL, '2023-05-08 22:00:00', 'Barton\'s fracture of right radius, subsequent encounter for closed fracture with delayed healing', 'Nicotine Polacrilex', 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.'),
(175, 1084, 100036, NULL, '2022-12-12 22:00:00', 'Corrosions of other specified parts of unspecified eye and adnexa, initial encounter', 'Ropinirole Hydrochloride', 'Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.'),
(176, 1087, 100036, NULL, '2023-03-03 22:00:00', 'Restlessness and agitation', 'TRICLOSAN', 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.'),
(177, 1087, 100039, NULL, '2023-05-17 22:00:00', 'Unequal limb length (acquired), tibia and fibula', 'MIDODRINE HYDROCHLORIDE', NULL),
(178, 1085, 100038, NULL, '2023-09-08 22:00:00', 'Unspecified viral hepatitis C', 'Didanosine', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.'),
(179, 1084, 100036, NULL, '2023-03-04 22:00:00', 'Spontaneous rupture of flexor tendons, right lower leg', 'Oxymorphone Hydrochloride', NULL),
(180, 1084, 100039, NULL, '2023-02-04 22:00:00', 'Unspecified fracture of shaft of right fibula, subsequent encounter for open fracture type I or II with delayed healing', 'Octinoxate, Octisalate, and Avobenzone', NULL),
(181, 1087, 100038, NULL, '2023-12-04 22:00:00', 'Complete traumatic transphalangeal amputation of right ring finger', 'Nortriptyline Hydrochloride', 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.'),
(182, 1085, 100036, NULL, '2023-09-22 22:00:00', 'Unspecified displaced fracture of surgical neck of left humerus, subsequent encounter for fracture with nonunion', 'Naproxen', NULL),
(183, 1087, 100036, NULL, '2023-05-27 22:00:00', 'Other cyst of bone, unspecified site', 'Cetirizine HCl and Pseudoephedrine HCl', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.'),
(184, 1085, 100039, NULL, '2023-06-22 22:00:00', 'Fatigue fracture of vertebra, cervicothoracic region, subsequent encounter for fracture with delayed healing', 'Acetaminophen, Chlorpheniramine maleate, Pseudoephedrine HCl', 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.'),
(185, 1087, 100039, NULL, '2023-10-14 22:00:00', 'Greenstick fracture of shaft of humerus, right arm', 'sulfamethoxazole and trimethoprim', 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.'),
(186, 1085, 100039, NULL, '2023-07-22 22:00:00', 'Complications of corneal transplant', 'Salicylic Acid', NULL),
(187, 1084, 100038, NULL, '2023-05-15 22:00:00', 'Burn of second degree of back of right hand, sequela', 'Guaifenesin, Phenylephrine Hydrochloride, Acetaminophen, and Dextromethorphan hydrobromide', NULL),
(188, 1085, 100039, NULL, '2023-07-27 22:00:00', 'Constitutional aplastic anemia', 'Sugar Maple', 'Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.'),
(189, 1084, 100036, NULL, '2023-04-17 22:00:00', 'Displaced comminuted fracture of shaft of ulna, unspecified arm, initial encounter for closed fracture', 'bacitracin zinc, neomycin, polymyxin B', NULL),
(190, 1085, 100038, NULL, '2023-01-23 22:00:00', 'Newborn affected by incompetent cervix', 'Sodium Fluoride', 'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.'),
(191, 1085, 100036, NULL, '2023-06-10 22:00:00', 'Traumatic cerebral edema with loss of consciousness of unspecified duration, sequela', 'Bethanechol Chloride', NULL),
(192, 1084, 100039, NULL, '2023-08-16 22:00:00', 'Dislocation of radiocarpal joint of unspecified wrist, subsequent encounter', 'Belladonna 30c, Bryonia 30c, Calendula 30c, Chamomilla 30c, Colchicum 30c, Graphites 30c, Hepar Sulph 30c, Phytolacca 30c Pulsatilla 30c, Silicea 30c, Urtica Urens', 'Sed ante. Vivamus tortor. Duis mattis egestas metus.'),
(193, 1087, 100036, NULL, '2023-08-14 22:00:00', 'Gastric contents in respiratory tract, part unspecified causing asphyxiation, sequela', 'Extra Strength Acetaminophen', 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.'),
(194, 1084, 100036, NULL, '2023-08-27 22:00:00', 'Other specified diabetes mellitus with diabetic chronic kidney disease', 'Aluminum Zirconium Tetrachlorohydrex GLY', NULL),
(195, 1087, 100039, NULL, '2023-01-04 22:00:00', 'Strain of muscle, fascia and tendon of long head of biceps, unspecified arm, sequela', 'Titanium Dioxide', NULL),
(196, 1084, 100039, NULL, '2023-10-22 22:00:00', 'Fetus-to-fetus placental transfusion syndrome, third trimester', 'ARIPIPRAZOLE', NULL),
(197, 1087, 100039, NULL, '2023-02-06 22:00:00', 'Sprain of metatarsophalangeal joint of left lesser toe(s), sequela', 'Dextromethorphan HBr and Guaifenesin', NULL),
(198, 1087, 100039, NULL, '2023-08-26 22:00:00', 'Other subluxation of unspecified ulnohumeral joint, sequela', 'Ifosfamide', 'In congue. Etiam justo. Etiam pretium iaculis justo.'),
(199, 1084, 100038, NULL, '2023-11-04 22:00:00', 'Salter-Harris Type IV physeal fracture of left metatarsal, subsequent encounter for fracture with malunion', 'ALCOHOL', 'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.'),
(200, 1084, 100038, NULL, '2023-04-28 22:00:00', 'Drug or chemical induced diabetes mellitus with proliferative diabetic retinopathy', 'Glycerin', NULL),
(201, 1084, 100039, NULL, '2022-11-30 22:00:00', 'Separation of muscle (nontraumatic)', 'warfarin sodium', 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.'),
(202, 1085, 100038, NULL, '2023-02-09 22:00:00', 'Borderline lepromatous leprosy', 'Acetaminophen, Dextromethorphan HBr, Doxylamine succinate, Phenylephrine HCl', NULL),
(203, 1087, 100039, NULL, '2023-08-17 22:00:00', 'Maternal care for viable fetus in abdominal pregnancy, second trimester, fetus 3', 'Bacitracin Zinc', NULL),
(204, 1087, 100036, NULL, '2023-08-21 22:00:00', 'Laceration of muscle, fascia and tendon of other parts of biceps, unspecified arm, initial encounter', 'ZINC OXIDE', NULL),
(205, 1087, 100038, NULL, '2023-09-19 22:00:00', 'Other contact with cow, subsequent encounter', 'Titanium dioxide', NULL),
(206, 1087, 100038, NULL, '2023-02-19 22:00:00', 'Chronic embolism and thrombosis of unspecified deep veins of right lower extremity', 'darbepoetin alfa', 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.'),
(207, 1087, 100036, NULL, '2023-05-22 22:00:00', 'Unspecified injury of lesser saphenous vein at lower leg level, unspecified leg, initial encounter', 'Aluminum Sesquichlorohydrate', 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.'),
(208, 1087, 100036, NULL, '2023-10-05 22:00:00', 'Poisoning by cocaine, undetermined, initial encounter', 'Famotidine', NULL),
(209, 1084, 100039, NULL, '2023-01-10 22:00:00', 'Other postprocedural shock, subsequent encounter', 'clotrimazole', NULL),
(219, 1098, NULL, 15, '2024-01-16 12:06:15', 'Malaria', 'Athemeter', '');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_list`
--

CREATE TABLE `medicine_list` (
  `id` int NOT NULL,
  `drug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_of_issue` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicine_list`
--

INSERT INTO `medicine_list` (`id`, `drug`, `unit_of_issue`, `qty`) VALUES
(1, 'ΤAB CETIRIZINE', 'ΡΚΤ (100)', 30),
(2, 'SYR KOFFEX', 'BOTTLE', 100),
(3, 'ΤΑΒ MAGACID', 'ΒΟX(150)', 10),
(4, 'SUSP NUGEL O', 'BOTTLE', 50),
(5, 'ΤΑΒ MALLUART 80/480', 'ΡΚΤ', 400),
(6, 'ΤΑΒ COARTEM 80/480', 'ΡΚΤ(24)', 500),
(7, 'ΤΑΒ B\'COMPLEX, (BLISTER PACK)', 'Β0Χ (BLISTER ΡΚΤ)', 2),
(8, 'CAPS AMOXICILLIN', 'Β0Χ(1000)', 5),
(9, 'CAPS FLUCLOX', 'Β0Χ (1000)', 10),
(10, 'ΤΑΒ AMOKSIKLAV 1G', 'ΡΚT', 300),
(11, 'ΤΑΒ AMOKSIKLAV 625MG', 'ΡΚΤ', 250),
(12, 'DECATYLEN', 'ΡΚΤ', 30),
(13, 'SYR SAMALIN', 'BOTTLE', 100),
(14, 'ΤΑΒ ZINCOVIT', 'ΡΚΤ', 100),
(15, 'ΤΑΒ DICL 100MG', 'ΡΚΤ(1ΟΟ)', 30),
(16, 'OMEPRAZOLE 20MG (100)', 'PKT', 10),
(17, 'ΤΑΒ SECNIDAZOLE 2G', 'ΡΚΤ (2)', 300),
(18, 'ΤΑΒ VIT C 1G', 'TUBE', 60),
(19, 'ΙΝJ ARTEMETHER 80/2ML', 'ΡΚΤ(1Ο)', 20),
(20, 'EPHEDRlNE NASAL DROPS', 'ΒΟΤΤLE', 150),
(21, 'NOSTAMINE E/E/N', 'BOTTLE', 50),
(22, 'CIPROFLOXACIN ΕΥΕ DROP', 'ΒΟΤΤLE', 30),
(23, 'CIPRO ΕΥΕ ΟΙΝΤ', 'TUBE', 20),
(24, 'EPICROM ΕΥΕ DROPS', 'ΒΟΤΤLE', 20),
(25, 'NEOHYCOLEX E/E/N', 'ΒΟΤΤLE', 70),
(26, 'SURFAZ SN', 'TUBE', 100),
(27, 'SUPIROCIN CREAM', 'TUBE', 15),
(28, 'MYCOLEX POWDER', 'TIN', 20),
(29, 'CREPE BANDAGE', 'PCS', 2),
(30, 'DEEP FREEZE SPRAY', 'TIN', 24),
(31, 'TAB FOLIC ACID', 'BOX(BLISTER PK)', 2),
(32, 'FERROUS SULPHATE', 'BOX(BLISTER PK)', 2),
(33, 'TAB SIRDALUD 2MG MG', 'PKT', 10),
(34, 'TAB BUSCOPAN 1OMG', 'PKT(IOO)', 20),
(35, 'DEEP HEAT SPRAY', 'TIN', 24),
(36, 'CAPS NACLOFEN 75MG', 'PKT', 50),
(37, 'TAB PARACETAMOL', 'BOX', 10),
(38, 'INJ DICLOFENAC 75MG', 'PKT(IO)', 10),
(39, 'DISPOSABLE GLOVES', 'BOX', 20),
(40, 'DREZ SOLUTION', 'BOTTLE', 20),
(41, 'BETNOVATE CREAM', 'TUBE', 20),
(42, 'BIOFERON', 'PKT', 50),
(43, 'GIVING SET (10)', 'PKT', 10),
(44, 'INJ BUSCOPAN', 'PKT', 5),
(45, 'IV HYDROCORTISONE', 'VIAL', 20),
(46, 'INJ PROMETHAZINE', 'p KT', 2),
(47, 'IV RINGER\'S LACTATE', 'BOX', 2),
(48, 'IV NORMAL SALINE', 'BOX', 1),
(49, 'IV DEXTROSE SALINE', 'BOX', 1),
(50, 'DYKLO SPRAY', 'BOTTLE', 20),
(51, 'ZINC OXIDE ADHESSIVE PLASTER', 'ROLL', 18),
(52, 'TAB FLOTAC', 'PKT', 50),
(53, 'IV CANULA (PINK)', 'BOX', 2),
(54, 'VENTOLIN NEBULES', 'BOX', 1),
(55, 'CAPS TRAMADOL 50MG', 'PKT(IOO)', 10),
(56, 'CAPSITOP CREAM', 'TUBES', 150),
(57, 'TAB DORETA 50MG', 'PKT', 30),
(58, 'CIPROLEX TZ', 'BOX', 5),
(59, 'OTRIVINE NASAL DROPS', 'BOTTLE', 50),
(60, 'TAB VOLTFAST 50', 'PKT', 50),
(61, 'CAPS DOXYCYCLINE', 'BOX', 5),
(62, 'CAPS FLUCONAZOLE 150M', 'PKT', 50),
(63, 'METHYLATED SPIRIT', 'GALLON', 2),
(64, 'COTTON WOOL 500G', 'ROLL', 5),
(65, 'GAUZE', 'ROLL', 5),
(66, 'GAUZE BANDAGE 4\"', 'PKT', 10),
(67, 'MICONAZOLE NITRATE 2% CREAM', 'TUBE', 50),
(68, 'HYDROCORTISONE CREAM', 'TUBE', 20),
(69, 'ORS', 'BOX', 15),
(70, 'CAPS IMODIUM', 'BOX', 10),
(71, 'TAB CIPROFLOXACIN', 'BOX', 10);

-- --------------------------------------------------------

--
-- Table structure for table `patient_data`
--

CREATE TABLE `patient_data` (
  `patient_id` int NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `other_names` varchar(20) DEFAULT NULL,
  `d_o_b` date NOT NULL,
  `faculty` varchar(7) DEFAULT NULL,
  `relation` varchar(6) DEFAULT NULL,
  `roll_num` varchar(12) NOT NULL,
  `department` varchar(20) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `first_visit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_data`
--

INSERT INTO `patient_data` (`patient_id`, `first_name`, `surname`, `other_names`, `d_o_b`, `faculty`, `relation`, `roll_num`, `department`, `gender`, `first_visit`) VALUES
(1041, 'Ferrel', 'Jirusek', NULL, '1936-03-18', 'Educati', 'Self', '60959839', 'Business Development', 'Male', '2023-12-05 19:48:59'),
(1042, 'Tobiah', 'Bayston', NULL, '1958-10-26', 'Medicin', 'Self', '52042328', 'Product Management', 'Male', '2023-12-05 19:48:59'),
(1043, 'Lena', 'Hellwing', 'Personnalisée', '1926-06-30', 'Law', 'Self', '46766502', 'Support', 'Female', '2023-12-05 19:48:59'),
(1044, 'Erskine', 'Lintall', NULL, '1931-07-17', 'Science', 'Self', '23287688', 'Support', 'Male', '2023-12-05 19:48:59'),
(1045, 'Milicent', 'Abbett', 'Andréa', '2022-11-23', 'Law', 'Self', '85395696', 'Product Management', 'Female', '2023-12-05 19:48:59'),
(1046, 'Kerk', 'Dunstan', NULL, '1930-06-21', 'Busines', 'Self', '17324361', 'Business Development', 'Male', '2023-12-05 19:48:59'),
(1047, 'Edi', 'Clogg', 'Angélique', '2020-03-13', 'Law', 'Self', '43495878', 'Engineering', 'Female', '2023-12-05 19:48:59'),
(1048, 'Layton', 'Swindin', NULL, '2010-12-05', 'Technol', 'Self', '72037424', 'Accounting', 'Male', '2023-12-05 19:48:59'),
(1049, 'Quintina', 'Smead', NULL, '1900-01-05', 'Educati', 'Self', '83955043', 'Services', 'Female', '2023-12-05 19:48:59'),
(1050, 'Fayette', 'Haughan', NULL, '1980-11-23', 'Educati', 'Self', '35808721', 'Services', 'Female', '2023-12-05 19:48:59'),
(1051, 'Justin', 'Want', NULL, '1955-03-12', 'Law', 'Self', '59894311', 'Product Management', 'Male', '2023-12-05 19:48:59'),
(1052, 'Colet', 'Lutwidge', 'Intéressant', '2021-03-06', 'Medicin', 'Self', '81628562', 'Legal', 'Male', '2023-12-05 19:48:59'),
(1053, 'Kara-lynn', 'Rupprecht', NULL, '1929-01-28', 'Educati', 'Self', '86576227', 'Engineering', 'Female', '2023-12-05 19:48:59'),
(1054, 'Giovanna', 'Kindle', NULL, '2004-05-07', 'Technol', 'Self', '60540761', 'Research and Develop', 'Female', '2023-12-05 19:48:59'),
(1055, 'Ranee', 'Tippings', NULL, '1915-05-06', 'Enginee', 'Self', '36089015', 'Research and Develop', 'Female', '2023-12-05 19:48:59'),
(1056, 'Clifford', 'Lothlorien', NULL, '1989-01-21', 'Medicin', 'Self', '85571098', 'Research and Develop', 'Male', '2023-12-05 19:48:59'),
(1057, 'Ronda', 'Featherstone', NULL, '1967-10-30', 'Busines', 'Self', '61276658', 'Legal', 'Female', '2023-12-05 19:48:59'),
(1058, 'Curran', 'Maps', 'Fèi', '1967-03-06', 'Technol', 'Self', '76843209', 'Product Management', 'Male', '2023-12-05 19:48:59'),
(1059, 'Brandyn', 'Matzeitis', 'Fèi', '1914-02-24', 'Medicin', 'Self', '59848319', 'Product Management', 'Male', '2023-12-05 19:48:59'),
(1060, 'Jules', 'Franzen', NULL, '1939-01-30', 'Medicin', 'Self', '68344154', 'Accounting', 'Male', '2023-12-05 19:48:59'),
(1061, 'Ruba', 'Smith', '', '2005-02-03', 'Staff', 'Self', 'AD003245245', 'HR', 'Male', '2023-12-05 19:48:59'),
(1062, 'Jon', 'Smidt', '', '2023-11-14', 'Staff', 'Self', '234543335676', 'ICT', 'Male', '2023-12-05 19:48:59'),
(1063, 'Matthew', 'Graham', '', '2005-03-11', 'Staff', 'Self', '56166292012', 'Admissions', 'Male', '2023-12-05 19:48:59'),
(1072, 'Ru', 'Ding', '', '1997-11-25', 'Staff', 'Self', '98526300136', 'Nautical Science', 'Male', '2023-12-05 19:48:59'),
(1073, 'Ru ', 'Ding', '', '1998-11-25', 'Staff', 'Self', '32006514270', 'Admissions', 'Male', '2023-12-05 19:48:59'),
(1074, 'Ru', 'Ding', '', '2023-11-22', 'Staff', 'Self', '8922012601', 'Admissions', 'Male', '2023-12-05 19:48:59'),
(1075, 'Ru', 'Ding', '', '2023-11-22', 'Staff', 'Self', '8922012601', 'Admissions', 'Male', '2023-12-05 19:48:59'),
(1076, 'Ru', 'Ding', '', '2023-11-22', 'Staff', 'Self', '8922012601', 'Admissions', 'Male', '2023-12-05 19:48:59'),
(1077, 'Ru', 'Ding', '', '1998-11-06', 'Staff', 'Self', '52200312', 'Transport', 'Male', '2023-12-05 19:48:59'),
(1078, 'James', 'Morrison', 'Ato', '1982-06-15', 'Staff', 'Self', '85148400136', 'IT', 'Male', '2023-12-05 19:48:59'),
(1079, 'Ray', 'Jones', 'Earl', '1996-04-11', 'Staff', 'Self', '985031233', 'Admissions', 'Male', '2023-12-05 19:48:59'),
(1080, 'Aman', 'Rashad', '', '1995-11-02', 'Student', 'Self', 'DIT78908823', 'ICT', 'Male', '2023-12-05 19:48:59'),
(1081, 'Aman', 'Rashad', '', '1995-11-02', 'Student', 'Self', 'DIT78908823', 'ICT', 'Male', '2023-12-05 19:48:59'),
(1082, 'James', 'Jones', 'Earl', '1982-02-04', 'Staff', 'Self', '0023180014', 'Admissions', 'Male', '2023-12-05 19:48:59'),
(1083, 'Anthony ', 'Boamah', 'Juju', '2003-06-12', 'Staff', 'Self', '41620086', 'Transport', 'Male', '2023-12-05 19:48:59'),
(1084, 'Nii', 'Addo', 'Adokwei', '1998-05-11', 'Staff', 'Self', 'DIT00123421', 'ICT', 'Male', '2023-12-05 19:48:59'),
(1085, 'Nii', 'Addo', 'Adotei', '2023-12-03', 'Student', 'Self', 'DIT0000123', 'ICT', 'Male', '2023-12-05 19:48:59'),
(1086, 'Jon', 'Smith', '', '2023-11-01', 'Student', 'Self', 'DPS0000124', 'Transport', 'Male', '2023-12-05 19:48:59'),
(1087, 'John', 'Snow', '', '1992-02-11', 'Staff', 'Self', '3206695', 'Admissions', 'Male', '2023-12-05 19:48:59'),
(1088, 'Aman', 'Nii', '', '2023-12-03', 'Staff', 'Self', '32001620', 'Admissions', 'Male', '2023-12-05 19:48:59'),
(1089, 'Nii', 'Nii', '', '1998-02-15', 'Student', 'Self', 'DPW8970012', 'Admissions', 'Male', '2023-12-05 20:06:57'),
(1090, 'Joe', 'Joe', '', '2023-12-12', 'Staff', 'Self', '036260003', 'Nautical Science', 'Male', '2023-12-07 13:31:44'),
(1091, 'Kofi', 'Asante', '', '1995-12-03', 'Student', '1', 'DIT0000124', 'ICT', 'Male', '2023-12-13 13:33:35'),
(1092, 'Rhona', 'Simpson', '', '1996-05-12', 'Staff', '1', 'TME112', 'Engineering', 'Female', '2023-12-19 20:33:59'),
(1093, 'Jon', 'Smidt', '', '1998-06-12', 'Student', 'Self', 'BIT0012321', 'ICT', 'Male', '2023-12-19 20:52:31'),
(1094, 'JonJon', 'DaDon', '', '2023-12-05', 'Student', 'Self', 'DNS0000121', 'Nautical Science', 'Male', '2023-12-19 22:54:05'),
(1095, '10', 'Tik', '', '2023-12-05', 'Student', 'Self', 'TME0013583', 'Engineering', 'Male', '2023-12-22 11:03:16'),
(1096, 'A', 'B', 'C', '2004-07-12', 'Student', 'Self', '1243233', 'ICT', 'Male', '2024-01-15 11:09:20'),
(1097, 'A', 'C', 'S', '1255-01-12', 'Student', 'Self', '23456', 'Nautical Science', 'Male', '2024-01-15 21:39:09'),
(1098, 'B', 'B', '', '1586-12-02', 'Student', 'Self', '223456789', 'Engineering', 'Male', '2024-01-16 12:00:42'),
(1099, 'John', 'Simms', '', '1998-11-11', 'Student', 'Self', 'BMT0001591', 'Engineering', 'Male', '2024-01-21 18:20:58');

-- --------------------------------------------------------

--
-- Table structure for table `patient_vitals`
--

CREATE TABLE `patient_vitals` (
  `vitals_id` int NOT NULL,
  `temperature` decimal(5,2) DEFAULT NULL,
  `bp_upper` int DEFAULT NULL,
  `bp_lower` int DEFAULT NULL,
  `patient_id` int DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_vitals`
--

INSERT INTO `patient_vitals` (`vitals_id`, `temperature`, `bp_upper`, `bp_lower`, `patient_id`, `date_added`) VALUES
(1, '20.00', 18, 23, NULL, '2023-12-19 11:26:10'),
(2, '20.00', 18, 23, NULL, '2023-12-19 11:27:37'),
(3, '20.00', 18, 23, NULL, '2023-12-19 11:28:03'),
(7, '27.00', 13, 28, NULL, '2023-12-19 17:09:05'),
(9, '126.00', 74, 37, NULL, '2023-12-19 20:36:27'),
(10, '155.00', 49, 38, NULL, '2023-12-19 20:56:59'),
(11, '187.00', 42, 37, 1094, '2023-12-19 22:54:21'),
(12, '152.00', 61, 37, NULL, '2023-12-22 12:08:02'),
(13, '3.60', 5, 14, 1096, '2024-01-15 11:38:19'),
(14, '133.20', 133, 34, 1097, '2024-01-15 21:39:53'),
(15, '34.10', 23, 37, 1098, '2024-01-16 12:01:22'),
(16, '154.00', 95, 38, 1099, '2024-01-21 18:21:19');

-- --------------------------------------------------------

--
-- Table structure for table `staff_data`
--

CREATE TABLE `staff_data` (
  `staff_id` int NOT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `pw` varchar(125) NOT NULL,
  `role` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_data`
--

INSERT INTO `staff_data` (`staff_id`, `first_name`, `last_name`, `email`, `pw`, `role`) VALUES
(100030, 'Kojoe', 'Asante', 'a@a.io', '1q2w3e', 'doctor'),
(100031, 'Kerry', 'Petofi', 'kpetofi0@ezinearticles.com', 'Optimized', 'doctor'),
(100036, 'Elisabetta', 'Golden', 'eghidelli0@chicagotribune.com', '$2y$10$AtaXdPfnZqx5DycqMDSDzuUvBIpClXoWvhIHMMADvwsjcavsHb40S', 'nurse'),
(100037, 'Allison', 'Waggatt', 'awaggatt1@nydailynews.com', 'Monitored', 'nurse'),
(100038, 'Pru', 'Blowers', 'pblowers2@is.gd', 'Public-key', 'nurse'),
(100039, 'Kelsi', 'McGurgan', 'kmcgurgan3@prnewswire.com', 'needs-based', 'nurse'),
(100040, 'Ismail', 'Abdulai-Saiku', 'ias@a.io', '$2y$10$dlS1LjiYkS4mJux9.C4ozeJqP6VZwf3M0Z.SXlhpPemrRxz6LSJTC', 'nurse'),
(100041, 'James', 'Dina', 'jd123@a.io', 'Walking12', 'doctor'),
(100042, 'Admin', 'Admin', 'admin01@a.io', 'admin01', 'admin'),
(100043, 'Kwame', 'Hassan', 'kh1@a.io', '$2y$10$9ql.rGMf6SrFa0shSyh5ounLLepjb5PLuW7hPp.Iynlro/pazq3Ha', 'nurse'),
(100044, 'Kwame', 'Hassan', 'kh1@a.io', '$2y$10$obIhjc2FyJBfFosWrBu6ce0Y2aQOAN7JLfl9l7E4xyfcnEg.pLq8y', 'nurse'),
(100045, 'Kwame', 'Hassan', 'kh1@a.io', '$2y$10$xnFK8wQ4fI5sw9WG3EQHnuhncf5gHNhzY.IkmJwUJhWtAqCsTXmee', 'nurse');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`queue_id`),
  ADD KEY `fk_patient_appointment` (`patient_id`);

--
-- Indexes for table `clinical_data`
--
ALTER TABLE `clinical_data`
  ADD PRIMARY KEY (`document_id`),
  ADD KEY `fk_patient_clinical` (`patient_id`) USING BTREE,
  ADD KEY `fk_medical_clinical` (`record_id`);

--
-- Indexes for table `exchange_rates`
--
ALTER TABLE `exchange_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `fk_patient_records` (`patient_id`),
  ADD KEY `fk_patient_staff` (`staff_id`),
  ADD KEY `fk_medical_vitals` (`vitals_id`);

--
-- Indexes for table `medicine_list`
--
ALTER TABLE `medicine_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_data`
--
ALTER TABLE `patient_data`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `patient_vitals`
--
ALTER TABLE `patient_vitals`
  ADD PRIMARY KEY (`vitals_id`),
  ADD KEY `fk_patient_vitals` (`patient_id`);

--
-- Indexes for table `staff_data`
--
ALTER TABLE `staff_data`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exchange_rates`
--
ALTER TABLE `exchange_rates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medical_records`
--
ALTER TABLE `medical_records`
  MODIFY `record_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `patient_data`
--
ALTER TABLE `patient_data`
  MODIFY `patient_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1100;

--
-- AUTO_INCREMENT for table `patient_vitals`
--
ALTER TABLE `patient_vitals`
  MODIFY `vitals_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `staff_data`
--
ALTER TABLE `staff_data`
  MODIFY `staff_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100046;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `fk_patient_appointment` FOREIGN KEY (`patient_id`) REFERENCES `patient_data` (`patient_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD CONSTRAINT `fk_medical_vitals` FOREIGN KEY (`vitals_id`) REFERENCES `patient_vitals` (`vitals_id`),
  ADD CONSTRAINT `fk_patient_records` FOREIGN KEY (`patient_id`) REFERENCES `patient_data` (`patient_id`),
  ADD CONSTRAINT `fk_patient_staff` FOREIGN KEY (`staff_id`) REFERENCES `staff_data` (`staff_id`);

--
-- Constraints for table `patient_vitals`
--
ALTER TABLE `patient_vitals`
  ADD CONSTRAINT `fk_patient_vitals` FOREIGN KEY (`patient_id`) REFERENCES `patient_data` (`patient_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
