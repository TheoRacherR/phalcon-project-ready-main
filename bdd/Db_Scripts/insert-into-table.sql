-- Active: 1667853929586@@127.0.0.1@3306@phalcon_app
insert into cart(id_account) values
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8)
;

insert into role(role) values
("ADMIN"),
("GUEST");

insert into account(id_cart, username, password, role) values
(1,"Zooplus","",2),
(2,"Fnac","",2),
(3,"Darty","",2),
(4,"Mon-marché","",2),
(5,"Laredoute","",2),
(6,"Admin","",1),
(7,"User","",2),
(8,"Seller","",2);


insert into product(name, description, price, stock, id_owner, id_sub_category, picture_url) values
("Corde à nœuds multicolore pour chien","Les chiens aiment jouer de leur force. Vous pouvez vous mesurer à votre chien en tirant sur la corde. Votre chien savourera ce moment avec vous, mais ne le laissez pas toujours gagner !",2.49,33,1,2,"1.A.1.jpg"),
("ALMO NATURE HFC Longevity M/L pour chien","HFC est la croquette pour le chien du foyer, habitué à vivre dans des environnements chauffés en hiver et rafraîchis en été, mais qui a gardé sa spécificité de chien, et n'est pas devenu un facsimilé humanisé.",6.79,23,1,3,"1.B.1.jpg"),
("Litière 30L agglomérante Greenwoods en fibres végétales pour chat","En matière de litière pour chat. notre devise est la suivante : pas d'odeurs. pas de saletés. pas de soucis. Voilà le trio gagnant pour que tout le monde soit content !",29.99,12,1,4,"1.C.1.jpg"),
("Alien Anthologie [Édition SteelBook limitée]","Edition à tirage limité en boîtier SteelBook",28.63,40,2,6,"2.A.1.jpg"),
("Shining [Blu-Ray]","Shining (The Shining). 1 Blu-ray. 119 minutes",8.63,50,2,6,"2.A.2.jpg"),
("Léon [Version Longue] [Version Longue]","Le film en deux versions : - version courte (110' - VF DTS-HD MA 5.0 /VOST DTS-HD HRA 5.1) - version longue (133' - VOST DTS-HD MA 5.0)",14.99,15,2,6,"2.A.3.jpg"),
("Orange Mecanique 4K Ultra-HD [Blu-Ray]","VERSIONS FRANCAISE + ANGLAISE - Dans le futur. un chef de gang sadique est emprisonné et se porte volontaire pour une expérience de modification du comportement. mais cela ne se passe pas comme prévu.",20.49,2,2,6,"2.A.4.jpg"),
("LA LA LAND EDITION 4K INCLUS LE BLU-RAY SIMPLE [4K Ultra-HD + Blu-ray]","Contient : - l'Ultra HD Blu-ray 4K du film (en HDR) - le Blu-ray du film",16.04,32,2,6,"2.A.5.jpg"),
("Star Wars-La Saga Skywalker-Intégrale-9 Films","Coffret Digipack Contient : La trilogie originale, la prélogie et la nostalogie",59.88,9,2,6,"2.A.6.jpg"),
("Le Seigneur des Anneaux - La trilogie [Blu-ray]","Le Seigneur des Anneaux - La trilogie [Blu-ray] Le seigneur des anneaux : La Trilogie (3 Blu-ray + 3 DVD)",31.18,40,2,6,"2.A.7.jpg"),
("My Beautiful Dark Twisted Fantasy","« My Beautiful Dark Twisted Fantasy », le cinquième album de Kanye West.",6.99,15,2,7,"2.B.1.jpg"),
("Graduation by Kanye West (2007-09-11)","",14.6,48,2,7,"2.B.2.jpg"),
("Emergency on Planet Earth","JAMIROQUAI EMERGENCY ON PLANET EARTH - 2CD LEGACY Jamiroquai aka Jay Kay. chanteur aux couvre chefs extravagants. a de 1990 aux débuts des années 2000. surfé sur le top des charts grâce à des albums prônant le retour du Groove Funk…",6.99,32,2,7,"2.B.3.jpg"),
("Travelling Without Moving","JAMIROQUAI TRAVELLING WITHOUT MOVING - 2CD LEGACY Jamiroquai aka Jay Kay. chanteur aux couvre chefs extravagants. a de 1990 aux débuts des années 2000. surfé sur le top des charts grâce à des albums prônant le retour du Groove Funk…",6.99,43,2,7,"2.B.4.jpg"),
("High Times: Singles 1992-2006 Edition Limitée","Tous les tubes de JAMIROQUAI sont pour la première fois réunis dans l'anthologie « High Times Singles 1992-2006 ». 19 titres et 2 inédits résument une prodigieuse carrière au top des tops",8.24,11,2,7,"2.B.5.jpg"),
("Caixun Android TV 40 Pouces. FHD Smart TV","TV écran plat de la marque CAIXUN",224.99,10,3,8,"2.C.1.jpg"),
("TV LED 4K UHD 50' (126 cm) Smart TV Linux","",279.99,31,3,8,"2.C.2.jpg"),
("SAMSUNG F22T350FHR. Ecran PC 22'' Bords Fins. Dalle IPS. Résolution FHD","Écran pour PC",109.99,10,3,8,"2.C.3.jpg"),
("L’Avocat","Origine Perou",2.35,6,4,10,"3.A.1.jpg"),
("Le Lait délactosé UHT 50cL 'Tendre Pré'","Origine France",1.25,21,4,11,"3.B.1.jpg"),
("Le Pain de campagne 280g","Origine France",2.9,34,4,12,"3.C.1.jpg"),
("Botte cuir AYAZ","On sait que la pluie peut abîmer et laisser des traces sur les chaussures en cuir nubuck. daim ou velours.",79.55,20,5,14,"4.A.1.jpg"),
("Baskets U574 New Balance","Détail du produit : Usage sportswear / Talon plat / Fermeture à lacets. Composition et Entretien : Dessus/Tige : 81% cuir suédé. 11% textile. 8% cuir / doublure 100% textile / semelle intérieure 100% textile",110,9,5,15,"4.B.1.jpg"),
("Baskets Stan Smith","Détails produit : usage sportswear / talon plat / fermeture : A scratch. Composition et Entretien : Dessus/Tige 100% synthétique / doublure 100% textile / semelle intérieure 100% textile",65,29,5,16,"4.C.1.jpg"),
("Le Trône de Fer. I à III","Adapté sur OCS. Le royaume des Sept Couronnes est sur le point de connaître son plus terrible hiver : par-delà le Mur qui garde sa frontière nord. une armée de ténèbres se lève. menaçant de tout détruire sur son passage.",27.9,46,2,18,"5.A.1.jpg"),
("Harry Potter - Coffret Collector Harry Potter - 25 ans","Ce magnifique coffret collector contient les sept livres en poche et un étui de 8 cartes postales. Pour habiller le coffret. Jean-Claude Götting a peint une fresque inédite de tous les personnages principaux de la saga.",99.9,34,2,18,"5.A.2.jpg"),
("Astérix - Astérix aux jeux olympiques – n°12","Astérix et Obélix veulent faire participer leur village aux Jeux olympiques pour faire front aux occupants romains de leur contrée : ils réussiront au-delà de toute espérance…",10.5,35,2,19,"5.B.1.jpg"),
("Astérix - Astérix et Cléopâtre – n°6","Cléopâtre fait le pari avec César que son peuple est encore capable de grandes réalisations. Elle ordonne à Numérobis de construire un palais somptueux pour César. à partir de 6 ans.",10.5,11,2,19,"5.B.2.jpg");

insert into category(name, parent_category) VALUES
('Animalerie', NULL),
('Jouet', 1),
('Nourriture', 1),
('Soins', 1),
('Multimédia', NULL),
('DVD et Blu-ray', 5),
('CD et Vinyle', 5),
('TV et Ecrans', 5),
('Epicerie', NULL),
('Fruits et Légumes', 9),
('Produits Laitiers', 9),
('Boulangerie', 9),
('Mode', NULL),
('Homme', 13),
('Femme', 13),
('Enfant', 13),
('Librairie', NULL),
('Livre', 17),
('BD', 17);