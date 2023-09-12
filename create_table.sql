CREATE TABLE movies (
    mid INT PRIMARY KEY AUTO_INCREMENT,
    mname VARCHAR(100),
    myear VARCHAR(4),
    mgenreid INT,
    FOREIGN KEY (mgenreid) REFERENCES genres(gid),
    mrating INT  
);


CREATE TABLE genres (
    gid INT PRIMARY KEY AUTO_INCREMENT,
    mgenre VARCHAR(50)
);

