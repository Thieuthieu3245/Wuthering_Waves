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
('P10', 'Danjin', 'E6', 'UC1', 'O2', 'W1', 4, 'https://www.prydwen.gg/static/431f962f5a8febb92f44ae9138aa5e01/b26e2/danjin_card.webp');