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
INSERT INTO Element_ (idElement, Name, url_image) VALUES
('E1', 'Spectro', 'https://static.wuthering.gg/elements/spectro.png'),
('E2', 'Electro', 'https://static.wuthering.gg/elements/electro.png'),
('E3', 'Aero', 'https://static.wuthering.gg/elements/aero.png'),
('E4', 'Glacio', 'https://static.wuthering.gg/elements/glacio.png'),
('E5', 'Fusion', 'https://static.wuthering.gg/elements/fusion.png'),
('E6', 'Havoc', 'https://static.wuthering.gg/elements/havoc.png');

-- Weapons
INSERT INTO Weapon (idWeapon, Name, url_image) VALUES
('W1', 'Sword', 'https://static.wuthering.gg/weapons/sword.png'),
('W2', 'Rectifier', 'https://static.wuthering.gg/weapons/rectifier.png'),
('W3', 'Gauntlets', 'https://static.wuthering.gg/weapons/gauntlets.png'),
('W4', 'Pistols', 'https://static.wuthering.gg/weapons/pistols.png'),
('W5', 'Broadblade', 'https://static.wuthering.gg/weapons/broadblade.png');

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
('P1', 'Rover', 'E1', 'UC1', 'O1', 'W1', 5, 'https://static.wuthering.gg/characters/rover-spectro.png'),
('P2', 'Yinlin', 'E2', 'UC1', 'O2', 'W2', 5, 'https://static.wuthering.gg/characters/yinlin.png'),
('P3', 'Jianxin', 'E3', 'UC2', 'O2', 'W3', 5, 'https://static.wuthering.gg/characters/jianxin.png'),
('P4', 'Lingyang', 'E4', 'UC1', 'O2', 'W3', 5, 'https://static.wuthering.gg/characters/lingyang.png'),
('P5', 'Encore', 'E5', 'UC1', 'O2', 'W2', 5, 'https://static.wuthering.gg/characters/encore.png'),
('P6', 'Baizhi', 'E4', 'UC4', 'O2', 'W2', 4, 'https://static.wuthering.gg/characters/baizhi.png'),
('P7', 'Sanhua', 'E4', 'UC2', 'O2', 'W1', 4, 'https://static.wuthering.gg/characters/sanhua.png'),
('P8', 'Chixia', 'E5', 'UC1', 'O2', 'W4', 4, 'https://static.wuthering.gg/characters/chixia.png'),
('P9', 'Taoqi', 'E6', 'UC5', 'O2', 'W5', 4, 'https://static.wuthering.gg/characters/taoqi.png'),
('P10', 'Danjin', 'E6', 'UC1', 'O2', 'W1', 4, 'https://static.wuthering.gg/characters/danjin.png');