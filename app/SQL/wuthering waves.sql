DROP DATABASE IF EXISTS Wuthering_Waves;
CREATE DATABASE IF NOT EXISTS Wuthering_Waves
    DEFAULT CHARACTER SET = 'utf8mb4';

USE Wuthering_Waves;

DROP TABLE IF EXISTS Weapon;
CREATE TABLE IF NOT EXISTS Weapon(
   idWeapon VARCHAR(50),
   Name VARCHAR(50) NOT NULL,
   url_image VARCHAR(255) NOT NULL,
   PRIMARY KEY(idWeapon)
);

DROP TABLE IF EXISTS UnitClass;
CREATE TABLE IF NOT EXISTS UnitClass(
   idUnitClass VARCHAR(50),
   Name VARCHAR(50) NOT NULL,
   url_image VARCHAR(255) NOT NULL,
   PRIMARY KEY(idUnitClass)
);

DROP TABLE IF EXISTS Element_;
CREATE TABLE IF NOT EXISTS Element_(
   idElement VARCHAR(50),
   Name VARCHAR(50) NOT NULL,
   color VARCHAR(50) NOT NULL,
   url_image VARCHAR(255) NOT NULL,
   PRIMARY KEY(idElement)
);

DROP TABLE IF EXISTS Origin;
CREATE TABLE IF NOT EXISTS Origin(
   idOrigin VARCHAR(50),
   Name VARCHAR(50) NOT NULL,
   url_image VARCHAR(255) NOT NULL,
   PRIMARY KEY(idOrigin)
);

DROP TABLE IF EXISTS Personnage;
CREATE TABLE IF NOT EXISTS Personnage (
    idPersonnage VARCHAR(50) PRIMARY KEY,
    Name VARCHAR(50) NOT NULL,
    idElement VARCHAR(50) NOT NULL,
    idUnitClass VARCHAR(50) NOT NULL,
    idOrigin VARCHAR(50),
    idWeapon VARCHAR(50),
    rarity INT NOT NULL,
    url_image VARCHAR(255) NOT NULL,
    CONSTRAINT FK_Personnage_Weapon FOREIGN KEY (idWeapon) REFERENCES Weapon(idWeapon),
    CONSTRAINT FK_Personnage_UnitClass FOREIGN KEY (idUnitClass) REFERENCES UnitClass(idUnitClass),
    CONSTRAINT FK_Personnage_Element FOREIGN KEY (idElement) REFERENCES Element_(idElement),
    CONSTRAINT FK_Personnage_Origin FOREIGN KEY (idOrigin) REFERENCES Origin(idOrigin)
);

DROP TABLE IF EXISTS Users;
CREATE TABLE IF NOT EXISTS Users (
   idUser VARCHAR(50) PRIMARY KEY,
   username VARCHAR(50) NOT NULL,
   hash_pwd VARCHAR(60) NOT NULL
)

-- Elements
INSERT INTO Element_ (idElement, Name, color, url_image) VALUES
('E1', 'Spectro', 'YELLOW', 'https://www.prydwen.gg/static/411f51b647b7811db2212e4b6fe6bdd2/4e704/element_spectro.webp'),
('E2', 'Electro', 'PURPLE', 'https://www.prydwen.gg/static/b3a899c0fab081fc3885a348751a9dc2/4e704/element_electro.webp'),
('E3', 'Aero', 'CYAN', 'https://www.prydwen.gg/static/1f08458a83668aa52df1e440ce70f1a2/4e704/element_aero.webp'),
('E4', 'Glacio', 'BLUE', 'https://www.prydwen.gg/static/4e2106b71dde592b9cdd87dbaa7f4b12/4e704/element_glacio.webp'),
('E5', 'Fusion', 'ORANGE', 'https://www.prydwen.gg/static/12e0bf6eef91cfd7dd832b9814d4d09a/4e704/element_fusion.webp'),
('E6', 'Havoc', 'MAGENTA', 'https://www.prydwen.gg/static/540bb4ed0d39932cf34d5a196d721f80/4e704/element_havoc.webp');

-- Weapons
INSERT INTO Weapon (idWeapon, Name, url_image) VALUES
('W1', 'Sword', 'https://www.prydwen.gg/static/f030fbedfea9b9c3837a2cddda9697e7/4e704/weapon_sword.webp'),
('W2', 'Rectifier', 'https://www.prydwen.gg/static/44a8ab926f77e3701a04f20af69b2528/4e704/weapon_rectifier.webp'),
('W3', 'Gauntlets', 'https://www.prydwen.gg/static/ee24d5a8b054c97591e6ec7fab8af845/4e704/weapon_gauntlets.webp'),
('W4', 'Pistols', 'https://www.prydwen.gg/static/f71d9a8b096b116045ed073091adde48/4e704/weapon_pistols.webp'),
('W5', 'Broadblade', 'https://www.prydwen.gg/static/1a8fd77c3956c11a572b0e2add093670/4e704/weapon_broadblade.webp');

-- Unit Classes
INSERT INTO UnitClass (idUnitClass, Name, url_image) VALUES
('UC1', 'Main DPS', 'https://static.wuthering.gg/unitclass/main_dps.png'),
('UC2', 'Sub DPS', 'https://static.wuthering.gg/unitclass/sub_dps.png'),
('UC3', 'Support', 'https://static.wuthering.gg/unitclass/support.png'),
('UC4', 'Healer', 'https://static.wuthering.gg/unitclass/healer.png'),
('UC5', 'Tank', 'https://static.wuthering.gg/unitclass/tank.png');

-- Origins
INSERT INTO Origin (idOrigin, Name, url_image) VALUES
('O1', 'Midgard', 'https://static.wuthering.gg/origins/midgard.png'),
('O2', 'Jinzhou', 'https://static.wuthering.gg/origins/jinzhou.png');

--  PERSONNAGES
INSERT INTO Personnage (idPersonnage, Name, idElement, idUnitClass, idOrigin, idWeapon, rarity, url_image) VALUES
('P1', 'Rover (Spectro)', 'E1', 'UC1', 'O1', 'W1', 5, 'https://www.prydwen.gg/static/ec3edb26e6df7f128ff8f9d1226c9a76/b26e2/rover_card.webp'),
('P11', 'Rover (Havoc)', 'E6', 'UC1', 'O1', 'W1', 5, 'https://www.prydwen.gg/static/ec3edb26e6df7f128ff8f9d1226c9a76/b26e2/rover_card.webp'),
('P12', 'Rover (Aero)', 'E3', 'UC1', 'O1', 'W1', 5, 'https://www.prydwen.gg/static/ec3edb26e6df7f128ff8f9d1226c9a76/b26e2/rover_card.webp'),
('P2', 'Yinlin', 'E2', 'UC1', 'O2', 'W2', 5, 'https://www.prydwen.gg/static/a2b0c34a81e57a52165da5b356be412c/b26e2/yinglin_card.webp'),
('P3', 'Jianxin', 'E3', 'UC2', 'O2', 'W3', 5, 'https://www.prydwen.gg/static/c215e7a42cbfd78f854553f192dc0e4f/b26e2/jiaxin_card.webp'),
('P4', 'Lingyang', 'E4', 'UC1', 'O2', 'W3', 5, 'https://www.prydwen.gg/static/672fdaae2b01f8355d5631a989e5f472/b26e2/ling_card.webp'),
('P5', 'Encore', 'E5', 'UC1', 'O2', 'W2', 5, 'https://www.prydwen.gg/static/0acc12c57906dc3c1f47e038832ec1f4/b26e2/encore_card.webp'),
('P6', 'Baizhi', 'E4', 'UC4', 'O2', 'W2', 4, 'https://www.prydwen.gg/static/3752f18605107b5fdb36835e9e7a2b90/b26e2/baizhi_card.webp'),
('P7', 'Sanhua', 'E4', 'UC2', 'O2', 'W1', 4, 'https://www.prydwen.gg/static/f67966dd31af657ac8612d36006d5874/b26e2/senhua_card.webp'),
('P8', 'Chixia', 'E5', 'UC1', 'O2', 'W4', 4, 'https://www.prydwen.gg/static/689148c2dc5b0b38aeb2c75ca8b3ef65/b26e2/chixia_card.webp'),
('P9', 'Taoqi', 'E6', 'UC5', 'O2', 'W5', 4, 'https://www.prydwen.gg/static/9759a6ea13fefd1bc632650a0a657e8e/b26e2/taoqi_card.webp'),
('P10', 'Danjin', 'E6', 'UC1', 'O2', 'W1', 4, 'https://www.prydwen.gg/static/431f962f5a8febb92f44ae9138aa5e01/b26e2/danjin_card.webp'),
('P13', 'Aalto', 'E3', 'UC2', null, 'W4', 4, 'https://www.prydwen.gg/static/28692b3a188f6b7b14a9d28aa90bf3c8/b26e2/aalto_card.webp'),
('P14', 'Augusta', 'E2', 'UC1', null, 'W5', 5, 'https://www.prydwen.gg/static/2f1f1aad1444416525bca51ce823bff7/b26e2/aug_card.webp'),
('P15', 'Brant', 'E5', 'UC1', null, 'W1', 5, 'https://www.prydwen.gg/static/30c84393d4f1fff8fcdb71ef6be8e090/b26e2/card_brant.webp'),
('P16', 'Buling', 'E2', 'UC3', null, 'W2', 4, 'https://www.prydwen.gg/static/c260bb6ddea2fd1dbab4994867ae0524/b26e2/buling_card.webp'),
('P17', 'Calcharo', 'E2', 'UC1', null, 'W5', 5, 'https://www.prydwen.gg/static/7b01c2f05825303762d3e6b9da538c7d/b26e2/kakarot_card.webp'),
('P18', 'Camellya', 'E6', 'UC1', null, 'W1', 5, 'https://www.prydwen.gg/static/fa50106c1d7d6d2f02033da9c00628f1/b26e2/card_cam.webp'),
('P19', 'Cantarella', 'E6', 'UC2', null, 'W2', 5, 'https://www.prydwen.gg/static/c62fb9a25dd8420d6fc03c1ca064dae2/b26e2/card_canta.webp'),
('P20', 'Carlotta', 'E4', 'UC1', null, 'W4', 5, 'https://www.prydwen.gg/static/72a394e25463af4c5b9c309f516c9d17/b26e2/card_carlotta.webp'),
('P21', 'Cartethyia', 'E3', 'UC1', null, 'W1', 5, 'https://www.prydwen.gg/static/f63677cedd1006e204f353b1f3c0af14/b26e2/cart_card.webp'),
('P22', 'Changli', 'E5', 'UC2', null, 'W1', 5, 'https://www.prydwen.gg/static/7eb8b347a3aa1837164c79a5e520d268/b26e2/card_changli.webp'),
('P23', 'Chisa', 'E6', 'UC3', null, 'W5', 5, 'https://www.prydwen.gg/static/1e11acd3163c86536e6c69aa7005424a/b26e2/chisa_card.webp'),
('P24', 'Ciaccona', 'E3', 'UC2', null, 'W4', 5, 'https://www.prydwen.gg/static/b70837a5b18151413c72027b8ddfac64/b26e2/cia_card.webp'),
('P25', 'Galbrena', 'E5', 'UC1', null, 'W4', 5, 'https://www.prydwen.gg/static/aa301f37c792e3d46dce891092c9cc0f/b26e2/gal_card.webp'),
('P26', 'Iuno', 'E3', 'UC1', null, 'W3', 5, 'https://www.prydwen.gg/static/250723737f0c5c477d1e161f5991c9fc/b26e2/iuno_card.webp'),
('P27', 'Junhsi', 'E1', 'UC1', null, 'W5', 5, 'https://www.prydwen.gg/static/136095b0f95ac4be3ddc7e2d585855bf/b26e2/jihni_card.webp'),
('P28', 'Jiyan', 'E3', 'UC1', null, 'W5', 5, 'https://www.prydwen.gg/static/5020d60083afc09d2fb6bce4a35225bc/b26e2/jiyan_card.webp'),
('P29', 'Lumi', 'E2', 'UC2', null, 'W5', 4, 'https://www.prydwen.gg/static/f25eefa86b00502ff430328006610ca2/b26e2/card_lumi.webp'),
('P30', 'Lupa', 'E5', 'UC2', null, 'W5', 5, 'https://www.prydwen.gg/static/8b4af672cd0b39da9882c9aedab02893/b26e2/lupa_card.webp');

INSERT INTO Users (idUser, username, hash_pwd) VALUES
('6926fb719d874', 'test', '$2y$10$7SzQ6qozDqHnSyARJ9y1uul1PjamGOZFuJvaLdNJ.Ty0UzUceZici'),
('6926fb719d879', 'admin', '$2y$10$LWxK2idwhpR9KLhJ9R5iw.g7gZmKjPmU9uHFm2PZFcEYTGsTEtPU2');