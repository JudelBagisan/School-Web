CREATE TABLE IF NOT EXISTS enrollstep1 (
    id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(30) NOT NULL,
    midName VARCHAR(30) NOT NULL,
    lastName VARCHAR(30) NOT NULL,
    sex VARCHAR(30) NOT NULL,
    birthdate VARCHAR(30) NOT NULL,
    course VARCHAR(30) NOT NULL,
    address VARCHAR(30) NOT NULL,
    email VARCHAR(55) NOT NULL,
    cNumber VARCHAR(20) NOT NULL,
    lrn BIGINT(20) NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)AUTO_INCREMENT = 20220000;


