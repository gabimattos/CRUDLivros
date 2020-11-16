USE PSI;

CREATE OR REPLACE TABLE user (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(100) NOT NULL,
    `surname` varchar(100) NOT NULL,
    `email` varchar(100) UNIQUE NOT NULL,
    `password` varchar(100) NOT NULL
  

) ENGINE=InnoDB;


CREATE OR REPLACE TABLE author (
    aid INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(100) NOT NULL,
    `surname` varchar(100) NOT NULL

) ENGINE=InnoDB;

CREATE OR REPLACE TABLE publisher (
    pid INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(100) NOT NULL
    

) ENGINE=InnoDB;

CREATE OR REPLACE TABLE book (
    `ISBN` char(13) PRIMARY KEY,
    `name` varchar(100) NOT NULL,
    `year` INT UNSIGNED NOT NULL,
    `pid` INT UNSIGNED,
    `aid` INT UNSIGNED,
    CONSTRAINT `aid` FOREIGN KEY (aid) REFERENCES authors (aid) ON DELETE SET NULL
    
    

) ENGINE=InnoDB;