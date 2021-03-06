-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 08, 2022 at 01:21 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `microworld`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int(11) NOT NULL,
  `libelle` varchar(45) NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `libelle`, `active`) VALUES
(1, 'PC Gamer', 1),
(2, 'Ordinateur de bureau', 1),
(3, 'PC portable', 1),
(4, 'Ecran', 1),
(5, 'Clavier', 1),
(6, 'Souris', 1),
(7, 'Casque audio', 1),
(8, 'Microphone', 1);

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `dateCommande` date NOT NULL,
  PRIMARY KEY (`idCommande`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`idCommande`, `idUser`, `dateCommande`) VALUES
(3, 4, '2022-05-08');

-- --------------------------------------------------------

--
-- Table structure for table `lignecommande`
--

DROP TABLE IF EXISTS `lignecommande`;
CREATE TABLE IF NOT EXISTS `lignecommande` (
  `idCommande` int(11) NOT NULL,
  `IdProduit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lignecommande`
--

INSERT INTO `lignecommande` (`idCommande`, `IdProduit`, `quantite`) VALUES
(3, 12, 1),
(3, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `idmenu` int(11) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `habilitation` varchar(45) NOT NULL,
  `nomMenu` varchar(45) NOT NULL,
  PRIMARY KEY (`idmenu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`idmenu`, `url`, `habilitation`, `nomMenu`) VALUES
(1, NULL, 'ACV', 'Ordinateurs'),
(2, NULL, 'ACV', 'P??riph??rique'),
(3, '', 'A', 'Admin'),
(11, 'pc-gamer.php', 'ACV', 'PC Gamer'),
(12, 'pc-portable.php', 'ACV', 'PC Portable'),
(13, 'ordinateur-de-bureau.php', 'ACV', 'Ordinateur de bureau'),
(21, 'souris.php', 'ACV', 'Souris'),
(22, 'ecran.php', 'ACV', 'Ecran'),
(23, 'clavier.php', 'ACV', 'Clavier'),
(24, 'casque-audio.php', 'ACV', 'Casque audio'),
(25, 'microphone.php', 'ACV', 'Microphone'),
(31, 'gerer-user.php', 'A', 'G??rer les Utilisateurs'),
(32, 'gerer-produit.php', 'A', 'G??rer les Produits');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `idproduit` int(11) NOT NULL AUTO_INCREMENT,
  `nomProduit` varchar(100) NOT NULL,
  `idCategorie` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `caracteristique` varchar(3000) NOT NULL,
  `quantite` int(11) NOT NULL,
  `img1` varchar(45) NOT NULL,
  `img2` varchar(45) DEFAULT NULL,
  `img3` varchar(45) DEFAULT NULL,
  `img4` varchar(45) DEFAULT NULL,
  `img5` varchar(45) DEFAULT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`idproduit`),
  KEY `idCategorie` (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`idproduit`, `nomProduit`, `idCategorie`, `prix`, `description`, `caracteristique`, `quantite`, `img1`, `img2`, `img3`, `img4`, `img5`, `active`) VALUES
(2, 'Logitech G PRO Souris Gamer sans Fil, Capteur Gaming HERO', 6, 149, 'Le Capteur Gamer HERO Nouvelle G??n??ration: la souris gamer de Logitech poss??de la technologie de capteur optique HERO qui offre des performances optimales et jusqu\'?? 10 fois plus de puissance. Pieds PTFE : &gt; 250 kilom??tres\r\nTechnologie sans Fil LIGHTSPEED: souris gamer sans fil avec technologie wireless LIGHTSPEED offre un taux de rapport USB de 1000 Hz (1ms) et une durabilit??: 50 millions de clics .Acc??l??ration maximale : &gt; 40 G\r\nCapteur HERO 25K: suivi des mouvements ultra-rapides de la souris gamer Logitech ?? des vitesses sup??rieures ?? 400 IPS et une r??solution de 100 - 25 600 PPP pour un jeu de niveau professionnel\r\nUltra-L??g??re: avec sa coque ext??rieure d\'1 mm, la souris gamer offre r??sistance et soutien structurel dans un format ergonomique de 80g\r\nDesign ambidextre: design polyvalente dans une forme compacte, cette souris est con??ue pour le confort et la durabilit??. La forme ??quilibr??e fonctionne pour les droitiers et les gauchers\r\nSANS FIL. SANS LIMITE : le n?? 1 mondial des p??riph??riques de gaming sans fil - D\'apr??s des donn??es de ventes agr??g??es ind??pendantes (f??v. 2019 - f??v. 2020) sur le nombre d\'unit??s de p??riph??riques de gaming sans fil (claviers, souris et casques PC)', 'Marque : Logitech G\r\nNum??ro du mod??le de l\'article : ???910-005273\r\ns??ries : Pro Wireless Gaming Mouse\r\nCouleur : ???Noir\r\nGarantie constructeur : Garantie Fabricant: 2 ans\r\nSyst??me d\'exploitation : ???Chrome OS\r\nPlate-forme du mat??riel informatique : ???PC, Mac\r\nType d\'alimentation : ???Aliment?? par l\'??nergie solaire\r\nType de connecteur : ???Radio-Fr??quence\r\nLat??ralit?? manuelle : ???Ambidextre\r\nDimensions de l\'article L x L x H : 12.5 x 6.3 x 4 centim??tres\r\nPoids du produit : ???0.08 Kilogrammes\r\nDisponibilit?? des pi??ces d??tach??es : Information indisponible sur les pi??ces d??tach??es', 10, '7SrONU2T4O.jpg', 'C0P9L9wMeB.jpg', 'ird7dBV3v5.jpg', '', '', 1),
(3, 'Corsair Katar Pro XT Souris de gaming ultra-l??g??re', 6, 70, 'Pesant seulement 73 g, le Katar Pro XT est extr??mement l??ger et agile pour des heures de jeu FPS ou MOBA.\r\nLa forme compacte et sym??trique du Katar Pro XT le rend id??al pour les griffes et les doigts.\r\nUn capteur optique de 18 000 DPI de PixArt, personnalisable en 1 ??tapes, offre la pr??cision et le suivi de haute pr??cision dont vous avez besoin pour la victoire.\r\nLes boutons Corsair QuickStrike utilisent un design ?? ressort, offrant un espace z??ro entre les boutons clic gauche et droit et leurs commutateurs, de sorte que vos clics, tirs et sorts sont plus rapides que jamais.\r\nUn c??ble paracorde l??ger r??duit la tra??n??e, permettant des mouvements plus rapides et plus pr??cis de la souris.', 'Marque	???Corsair\r\nConnexions	???C??bl??\r\nCaract??ristiques sp??ciales	???L??g??re\r\nDisponibilit?? des pi??ces d??tach??es	???Information indisponible sur les pi??ces d??tach??es', 2, 'orAjsIaH1f.jpg', '2272smjCoe.jpg', 'rypfIPv3yP.jpg', 'xfKmCvduZy.jpg', '3lWFao6bPe.jpg', 1),
(4, 'Blue Yeti X Microphone USB', 8, 136, 'Yeti X se compose de 4 capsules pour capturer le son l??gendaire Blue avec un meilleur focus et clart??, pour du gaming niveau pro, Twitch streaming, podcast et vid??os YouTube\r\nLe micro Yeti X et son indicateur LED haute r??solution ?? 11 segments permet de visualiser le niveau de votre voix et ajuster en fonction, pour un son de qualit?? pro devant les cam??ras\r\nAjustez les r??glages et contr??lez le volume du casque, gain du micro, coupure de son et mixage depuis le bouton intelligent. Restez concentr?? sur la performance d\'enregistrement audio et streaming\r\nAm??liorez la qualit?? son de votre streaming avec Blue VO!CE effets broadcast en t??l??chargeant Logitech G HUB pour un acc??s ?? des pr??r??glages cr????s par des ing??nieurs du son professionnels\r\nAjustez la couleur de l\'??clairage LED du microphone USB Yeti X pour une esth??tique personnalis??e dans votre home studio pour donner une touche perso ?? votre micro et rehausser votre streaming\r\nEnsemble de condensateurs ?? quatre capsules statiques personnalis??: capturez la qualit?? sonore de diffusion l??gendaire Blue avec plus de pr??cision et de clart?? que jamais pour le gaming professionnel, le streaming sur Twitch, les podcasts et les productions YouTube.\r\nQuatre diagrammes directionnels polyvalents: basculez entre le diagramme cardio??de pour l\'enregistrement et la diffusion en direct, l\'omnidirectionnel pour les conf??rences t??l??phoniques, le bidirectionnel pour les podcasts et le st??r??o pour les exp??riences immersives telles que l\'ASMR.', 'Marque	Logitech for Creators\r\nCouleur	Noir\r\nType de connecteur	USB\r\nType de connecteur	USB\r\nType d\'alimentation	C??ble ??lectrique\r\nSensibilit?? audio	100 dB\r\nCompatibilit?? du p??riph??rique	Ordinateur personnel, Radio\r\nPoids du produit	1.3 Kilogrammes\r\nDiagramme polaire	Bidirectionnel, Unidirectionnel, Omnidirectionnel\r\nRapport signal/bruit	100 dB', 4, 'u54RDyh835.jpg', 'bih98XCtbk.jpg', 't2aSkiJUJN.jpg', 'SGAQ7pgsiZ.jpg', 'rWv2nRV8u9.jpg', 1),
(5, 'Shure Mv7 Microphone Dynamique Usb/Xlr', 8, 229, 'CONNEXION USB OU XLR : La double sortie USB/XLR permet une utilisation en num??rique ou en analogique.\r\nAPPLICATIONS DE PRISE DE SON DE PROXIMIT??: Excellent pour le podcast, l???enregistrement, le streaming live et plus encore.\r\nPANNEAU DE COMMANDES TACTILE INTUITIF : Panneau tactile intuitif pour le contr??le du gain, du volume d?????coute de contr??le, du mix du casque et du mute du micro.\r\nSORTIE CASQUE INTEGR??E : La sortie casque int??gr??e permet une ??coute de contr??le directe au casque pendant l???enregistrement.\r\nRESTITUTION RICHE ET NATURELLE DE LA VOIX : R??ponse en fr??quence optimis??e pour une restitution de la voix riche et naturelle.\r\nAPPLICATION ShurePlus MOTIV DESKTOP : le mode Auto-Level ajuste automatiquement les param??tres de gain et de compression, des filtres d\'EQ commutables ajustent la couleur du son et des options permettent de sauvegarder les pr??r??glages personnalis??s.\r\nCONSTRUCTION ENTI??REMENT EN M??TAL : La construction robuste et professionnelle enti??rement en m??tal assure une fiabilit?? exceptionnelle.', 'Marque : Shure\r\nCouleur : MV7 Noir\r\nType de connectique : USB\r\nTechnologie de connectivit?? : XLR\r\nType d\'alimentation : C??ble ??lectrique\r\nSensibilit?? audio : 132 dB\r\nNombre de batteries : 1 Lithium-ion n??cessite des piles.\r\nPoids de l\'article : 2.31 Livres\r\nDiagramme polaire : Unidirectionnel\r\nMat??riau : M??tal', 4, '29muqGYkUY.jpg', 'xmJgzIi0TK.jpg', 'Dpi8aJCUaW.jpg', '0NSTGOmTJd.jpg', 'lcOY3pWR7K.jpg', 1),
(6, 'ViewSonic VX2458-mhd Moniteur VA 24&quot; Full HD 1920x1080, 1ms, 144 Hz', 4, 189, 'Le taux de rafra??chissement de 144 Hz et l???AMD FreeSync offrent un visuel fluide et sans distorsion\r\nAvec un taux de rafra??chissement rapide de 144 Hz, ce moniteur offre une belle fluidit?? visuelle et des graphismes de qualit??, quelle que soit la rapidit?? ?? laquelle l\'action dans le jeu se d??roule. Gr??ce ?? la technologie AMD FreeSync, chaque sc??ne est parfaitement fluide.\r\nTemps de r??ponse rapide pour des vid??os nettes et de qualit?? visuelle\r\nAvec un temps de r??ponse ??tonnamment rapide, ce moniteur affiche des images fluides sans traces, qui ne sont ni floues ni d??doubl??es. Ce temps de r??ponse ultra-rapide est parfait pour les jeux ?? charge graphique intense, et offre une qualit?? visuelle exceptionnelle en regardant des ??missions sportives ou des films d\'action.\r\nStabilisation du noir pour une meilleure visibilit?? dans les d??cors sombres\r\nLa stabilisation du noir d??velopp??e par ViewSonic vous aide ?? dominer vos concurrents en offrant une meilleure visibilit??, plus d??taill??e, en illuminant les d??cors sombres.\r\nFaible d??calage de l\'image pour une exp??rience de visionnage fluide\r\nLe VX2458-MHD utilise un r??ducteur de processeur int??gr?? qui r??duit la latence du signal afin d\'obtenir un faible d??calage de l\'image. Il transmet un signal d\'affichage rapide depuis la carte graphique vers l\'??cran, rendant les utilisateurs plus comp??titifs.\r\nContraste M??ga-Dynamique\r\nUn contraste m??ga-dynamique de 80M:1 cr??e une profondeur d???image en augmentant la d??finition des couleurs les plus sombres et les plus claires ?? l?????cran, garantissant des images les plus d??taill??es possible avec le VX2458-MHD.', 'Viewsonic VX S??ries VX2458-mhd. Taille de l\'??cran: 59, 9 cm (23.6&quot;)\r\nR??solution de l\'??cran: 1920 x 1080 pixels\r\nType HD: Full HD\r\nTechnologie d\'affichage: LED\r\nSurface d\'affichage: Mat\r\nTemps de r??ponse: 5 ms\r\nFormat d\'image: 16: 9\r\nAngle de vision horizontal: 170??\r\nAngle de vision vertical: 160??. Haut-parleurs int??gr??s. Montage VESA. Certifi?? Energy Star. Couleur du produit: Noir\r\nRouge', 2, 'zysTfSg5N0.jpg', '7q3yeoaWqn.jpg', 'BY5uZOtbBf.jpg', 'ouGJnpc0tW.jpg', 'IQbkcvO38m.jpg', 1),
(7, 'BenQ GL2480 Moniteur de jeu LED 24 pouces, FHD 1080p, Eye-Care, 1ms, 75Hz, Anti-reflet, HDMI, DVI, N', 4, 160, 'Affichage FHD impressionnant : profitez d\'une qualit?? d\'image 16:9 parfaite avec une r??solution de 1920 x 1080, ainsi que d\'un temps de r??ponse ??lev?? 1ms. Zone d\'affichage (mm): 531,36 x 298,89\r\nBords ultra-fins : minimise les distractions et cr??e une configuration multi-??crans parfaite\r\nConnectivit?? compl??te : les ports HDMI, DVI et VGA permettent de basculer facilement entre divers p??riph??riques\r\nTechnologie Brightness Intelligence (B.I) : ajuste activement la luminosit?? suivant le contenu ?? l\'??cran et les conditions de lumi??re ambiante\r\nSyst??me de gestion des c??bles : dissimule les c??bles dans le socle de l\'??cran\r\nSupport mural VESA : 100 x 100 mm', 'Marque : ???BenQ\r\nNum??ro du mod??le de l\'article : ???GL2480\r\ns??ries : GL2480\r\nCouleur : Noir\r\nGarantie constructeur : ???2 ans constructeur\r\nType d\'??cran : LCD\r\nTaille de l\'??cran : ???24 Pouces\r\nR??solution de l\'??cran : 1920 x 1080 pixels\r\nResolution : ???1080p Full HD\r\n??tirement : 16:9\r\nInterface du mat??riel informatique : ???HDMI\r\nNombre de ports : HDMI ???1\r\nType de connecteur : ???D-Sub\r\nDimensions de l\'article L x L x H : ???43.3 x 56.5 x 17.5 centim??tres\r\nPoids du produit : ???3.9 Kilogrammes\r\nDivers : ???Fr??quence de Balayage Verticale en Hz: 75\r\nDisponibilit?? des pi??ces d??tach??es : ???Information indisponible sur les pi??ces d??tach??es', 3, '7EOhypbmb3.jpg', 'JlzmsnWodz.jpg', 'XvIEgvW9zJ.jpg', 'U7w0adjm20.jpg', 'tvXXLBexBA.jpg', 1),
(8, 'Acer Predator XB253QGPbmiiprzfx ??cran PC Gaming 24.5&quot; Full HD IPS 165 Hz', 4, 200, 'IMAGES INCROYABLES : faites l\'exp??rience d\'une clart?? in??gal??e et de couleurs fid??les ?? la r??alit?? avec cet ??cran Full HD de 24.5 pouces; les nuances et les contrastes restent fid??les, avec un angle de vue pouvant atteindre 178 ??\r\nSUPERBEMENT SYNCHRONIS?? : ??liminez le gameplay instable et les coupures visuelles g??nantes avec la technologie NVIDIA G-Sync compatible; le taux de rafra??chissement de l\'??cran Predator est synchronis?? avec la fr??quence d\'images de l\'ordinateur pour des visuels r??actifs\r\nR??PONSE HAUTE VITESSE : d??couvrez des jeux fluides et sans latence avec un taux de rafra??chissement rapide jusqu????? 165Hz, et profitez d\'images claires et nettes avec le temps de r??ponse ultra court Fast LC 2ms (G2G), 0.9ms (G2G Min) m??me lorsque l\'action devient fr??n??tique\r\nVESA DISPLAY HDR 400 : cette certification sp??cifie la qualit?? HDR, y compris la luminance, la gamme de couleurs, la profondeur de bits et les temps de chargement; am??liorez votre niveau de jeu en am??liorant la pr??cision et le contraste des couleurs\r\nPREDATOR GAMEVIEW : propose plusieurs fonctionnalit??s utiles, telles que la d??finition des niveaux d\'ombres avec Dark Boost, le r??glage pr??cis des couleurs du moniteur gaming, le choix parmi trois modes de jeu (action, course, sports) et bien plus encore', 'Marque:???Acer\r\nNum??ro du mod??le de l\'article:???UM.KX3EE.P14\r\ns??ries:Acer Predator XB253QGP\r\nCouleur:???Noir\r\nGarantie constructeur:Garantie fabricant 2 ans\r\nType d\'??cran:???LED\r\nTaille de l\'??cran:24.5 Pouces\r\nResolution:???1920 x 1080\r\n??tirement:???16:9\r\nInterface du mat??riel informatique:???DisplayPort, HDMI, USB 3.0\r\nNombre de ports:HDMI	???2\r\nType de connecteur:???USB, HDMI\r\nDimensions de l\'article L x L x H:???23.6 x 55.8 x 51.3 centim??tres\r\nPoids du produit:???5300 Grammes\r\nDisponibilit?? des pi??ces d??tach??es:???Information indisponible sur les pi??ces d??tach??es', 3, 'TlgqNWfqnT.jpg', '7AS0vvhU2g.jpg', 'yrhFzNrm1w.jpg', 'fgQ7KMcGOI.jpg', '', 1),
(9, 'LG UltraGear 27GL63T-B, Moniteur Gaming IPS Full HD 27\'\' 1920x1080, 1ms, 144Hz', 4, 200, 'Moniteur 16:9 Full HD IPS 27\'\' (1920x1080)\r\nTemps de r??ponse 1ms, Fr??quence 144Hz\r\nAMD FreeSync, NVIDIA Gsync Compatible\r\nConnectiques HDMI et Display Port\r\nHDR 10, Ajustable Hauteur et Pivotable\r\nLuminosit??: 320cd (typ) / 400cd (Min)', 'Taille de l\'??cran:27 Pouces\r\nR??solution:FHD 1080p\r\nTechnologie d\'affichage	LCD\r\nMarque:LG Electronics\r\ns??ries:27GL63T-B\r\nFormat d\'image:16:9\r\nInterface mat??rielle:HDMI\r\nFr??quence de rafra??chissement:144 Hz\r\nTemps de r??ponse:5 Milliseconds\r\nR??solution d\'affichage maximale:1080p Full HD', 6, 'ebODpQ7Kh9.jpg', 'BWcVpNEFip.jpg', 'M3byuuE2QD.jpg', 'jlC3VADN2t.jpg', 'b3dvcXkM85.jpg', 1),
(11, 'Logitech G915 TKL Tenkeyless LIGHTSPEED Clavier Gaming M??canique, Switch ultra-plat GL Tactile', 5, 140, 'LIGHTSPEED PRO-GRADE SANS FIL : une performance professionnelle et un taux de rapport de 1 ms. Cr??ez une esth??tique ??pur??e et sans fil pour vos stations de combat avec une libert?? de gaming ultime. Bluetooth: appareil compatible Bluetooth avec Windows 8 ou version ult??rieure, macOS X 10.11 ou version ult??rieure, Chrome OS ou Android 4.3 ou version ult??rieure, iOS 10 ou version ult??rieure. Distance totale de d??placement : 2,7 mm\r\nLIGHTSYNC RVB : l\'??clairage RVB de nouvelle g??n??ration synchronise l\'??clairage avec le contenu de vos jeux et m??dias et personnalisez chaque touche ou cr??ez des animations personnalis??es\r\nSwitchs M??caniques Ultra-Plats : les nouveaux switchs gaming hautes performances offrent la vitesse, la pr??cision et les performances d\'un Switch m??canique tout en ??tant deux fois plus petit\r\nCONCEPTION COMPACTE TKL : la conception sans pav?? num??rique offre les technologies avanc??es attendues et design compact pour les gamers. Rangez votre r??cepteur ?? l???arri??re pour plus de portabilit??\r\n??L??GANTE ESTH??TIQUE M??TALLIQUE : ce clavier d\'une grande qualit?? de fabrication est con??u dans un alliage aluminium de qualit?? a??ronautique qui permet une grande robustesse et une finesse incroyable\r\nBATTERIE LONGUE DUR??E : 40 heures de jeu avec une seule charge. Batterie charg??e en 3 heures seulement, signaux lorsqu\'elle atteint 15 % de charge pour que vous ne soyez jamais pris au d??pourvu\r\nLe n?? 1 mondial des p??riph??riques gaming : d\'apr??s des donn??es de ventes agr??g??es ind??pendantes (f??v. 2019 - f??v. 2020) sur le nombre d\'unit??s de p??riph??riques de gaming (claviers, souris et casques PC)', 'Description du clavier:Gaming\r\nType de connecteur:Bluetooth\r\nCaract??ristique sp??ciale:Hotkeys_and_media_keys\r\nCompatibilit?? du p??riph??rique:Ordinateur\r\nComposants inclus:1 pi??ce.\r\nMarque:Logitech G\r\ns??ries: Clavier gaming m??canique RVB sans fil LIGHTSPEED G915 TKL sans pav?? num??rique\r\nCouleur:Noir\r\nStyle:Tactile Switchs\r\nDimensions de l\'article L x l x H:36.8 x 15 x 2.2 centim??tres', 4, 'JbX9gKl7QA.jpg', 'iL7SHeGhZC.jpg', 'guwmpERHrg.jpg', 's9YsWYOtWv.jpg', 'iXNchRGo6D.jpg', 1),
(12, 'Logitech G PRO TKL Tenkeyless Clavier Gaming M??canique', 5, 95, 'Personnalis?? pour les pros : con??u avec et pour les athl??tes eSports recherchant des performances, une vitesse et une pr??cision exceptionnelles. Force d\'actionnement : 50 g\r\nSwitchs sonores GX Blue de qualit?? professionnelle : les switchs sonores GX Blue robustes offrent un clic audible et un retour de saisie tactile pour une pression solide et s??curis??e sur la touche\r\nConception compacte ultra-portable : la conception compacte sans pav?? num??rique lib??re de l\'espace sur la table pour d??placer la souris. Il est ??galement facile ?? emballer et ?? transporter pour les tournois\r\nConception compacte ultra-portable : la conception compacte sans pav?? num??rique lib??re de l\'espace sur la table pour d??placer la souris. Il est ??galement facile ?? emballer et ?? transporter pour les tournois\r\nLIGHTSYNC RVB : utilisez LIGHTSYNC pour mettre les touches en valeur et programmer des motifs d\'??clairage statique dans la m??moire int??gr??e pour les configurations de tournoi n\'autorisant pas l\'installation de G HUB\r\nC??ble d??tachable : le c??ble micro-USB d??tachable poss??de une conception ?? trois dents pour une connexion facile et s??curis??e, ainsi qu\'un transport facile dans votre sac de voyage\r\nPatins en caoutchouc antid??rapants et r??glage de l\'angle : r??glage de l\'angle ?? trois crans pour un confort accru et des patins en caoutchouc pour une stabilit?? ?? toute ??preuve lors des sessions de gaming intensives', 'Description du clavier:AZERTY\r\nType de connecteur:Bluetooth, USB\r\nCompatibilit?? du p??riph??rique:Ordinateur, Ordinateur portable\r\nMarque:Logitech G\r\ns??ries:Logitech G Pro Mechanical Gaming Keyboard\r\nCouleur:Noir\r\nNombre de cl??s:104\r\nStyle:Disposition fran??aise\r\nDimensions de l\'article L x l x H:15.3 x 36 x 3.4 centim??tres\r\nSyst??me d\'exploitation:Linux, Mac OS X 10.12 Sierra, Windows, IOS, Android', 3, 'p7RW3882L9.jpg', 'lILyFi9a2J.jpg', 'bJls1Bggax.jpg', 'Ky1FvBCAA2.jpg', 'FS0IaQ1716.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `categorie` int(11) DEFAULT NULL,
  `pp` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `email`, `password`, `birthdate`, `active`, `categorie`, `pp`) VALUES
(3, 'admin', 'admin', 'admin@admin.com', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', '2002-07-09', 1, 7, 'MEI8ylwspzU08Gf1yvlz.png'),
(4, 'Monrocq', 'Ugo', 'ugo.monrocq@gmail.com', 'df6b9fb15cfdbb7527be5a8a6e39f39e572c8ddb943fbc79a943438e9d3d85ebfc2ccf9e0eccd9346026c0b6876e0e01556fe56f135582c05fbdbb505d46755a', '2022-05-05', 1, 1, 'AtTgUvcxIKbCZHLyGRfB.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
