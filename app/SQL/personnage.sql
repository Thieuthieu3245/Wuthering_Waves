DROP TABLE IF EXISTS Personnage;
CREATE TABLE IF NOT EXISTS Personnage(
   idPersonnage VARCHAR(50),
   Name VARCHAR(50) NOT NULL,
   Element_ VARCHAR(50) NOT NULL,
   unitclass VARCHAR(50) NOT NULL,
   origin VARCHAR(50),
   weapon VARCHAR(50),
   rarity INT NOT NULL,
   url_image VARCHAR(255) NOT NULL,
   PRIMARY KEY(idPersonnage)
);

INSERT INTO Personnage (idPersonnage, Name, Element_, unitclass, origin, rarity, weapon, url_image) VALUES
('1', 'Rover', 'Spectro', 'Main DPS', 'Midgard', 5, 'Sword', 'https://static.wuthering.gg/characters/rover-spectro.png'),
('2', 'Yinlin', 'Electro', 'Main DPS', 'Jinzhou', 5, 'Rectifier', 'https://static.wuthering.gg/characters/yinlin.png'),
('3', 'Jianxin', 'Aero', 'Support / Sub DPS', 'Jinzhou', 5, 'Gauntlets', 'https://static.wuthering.gg/characters/jianxin.png'),
('4', 'Lingyang', 'Glacio', 'Main DPS', 'Jinzhou', 5, 'Gauntlets', 'https://static.wuthering.gg/characters/lingyang.png'),
('5', 'Encore', 'Fusion', 'Main DPS', 'Jinzhou', 5, 'Rectifier', 'https://static.wuthering.gg/characters/encore.png'),
('6', 'Baizhi', 'Glacio', 'Healer / Support', 'Jinzhou', 4, 'Rectifier', 'https://static.wuthering.gg/characters/baizhi.png'),
('7', 'Sanhua', 'Glacio', 'Sub DPS', 'Jinzhou', 4, 'Sword', 'https://static.wuthering.gg/characters/sanhua.png'),
('8', 'Chixia', 'Fusion', 'Main DPS', 'Jinzhou', 4, 'Pistols', 'https://static.wuthering.gg/characters/chixia.png'),
('9', 'Taoqi', 'Havoc', 'Tank', 'Jinzhou', 4, 'Broadblade', 'https://static.wuthering.gg/characters/taoqi.png'),
('10', 'Danjin', 'Havoc', 'Main DPS', 'Jinzhou', 4, 'Sword', 'https://static.wuthering.gg/characters/danjin.png');
