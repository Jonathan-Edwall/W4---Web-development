CREATE TABLE movies (
    mid INT PRIMARY KEY AUTO_INCREMENT,
    mname VARCHAR(100),
    myear VARCHAR(4),
    mgenreid INT,
    FOREIGN KEY (mgenreid) REFERENCES genres(gid),
    mrating INT CHECK (mrating >= 1 AND mrating =<5) 
);


CREATE TABLE genres (
    gid INT PRIMARY KEY AUTO_INCREMENT,
    mgenre VARCHAR(50)
);

