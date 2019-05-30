DROP DATABASE IF EXISTS kriskringle;
CREATE DATABASE kriskringle;

USE kriskringle;

DROP TABLE IF EXISTS preferences;
CREATE TABLE preferences(
    id INT AUTO_INCREMENT NOT NULL,
    name VARCHAR(50), 
    pref1 VARCHAR(500), 
    pref2 VARCHAR(500), 
    pref3 VARCHAR(500), 
    pronoun1 VARCHAR(50), 
    pronoun2 VARCHAR(50),
    PRIMARY KEY(id)
);

INSERT INTO preferences(
    name,
    pref1,
    pref2,
    pref3,
    pronoun1,
    pronoun2
)VALUES
('Adam','','','','his','him'),
('Amanda','','','','her','her'),
('Audrey','','','','her','her'),
('Chloe','','','','her','her'),
('Dale','','','','his','him'),
('Dave','','','','his','him'),
('Denise','','','','her','her'),
('Emma','','','','her','her'),
('Erin','','','','her','her'),
('Gi','','','','her','her'),
('Harry','','','','his','him'),
('Jason','','','','his','him'),
('John','','','','his','him'),
('JP','','','','his','him'),
('Justin','','','','his','him'),
('Linda','','','','her','her'),
('Lizzie','','','','her','her'),
('Michelle','','','','her','her'),
('Richie T.','','','','his','him'),
('Richie W.','','','','his','him'),
('Sam','','','','her','her'),
('Steven Jr.','','','','his','him'),
('Steven Sr.','','','','his','him'),
('Tina','','','','her','her'),
('Vicky','','','','her','her');