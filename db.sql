CREATE DATABASE x_files;

USE x_files;

CREATE TABLE bacteries (
  id INT(6) NOT NULL,
  name VARCHAR(30) NOT NULL,
  description VARCHAR(300) NOT NULL,
  parent_id INT(6),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

ALTER TABLE bacteries
  ADD PRIMARY KEY (id);

  
ALTER TABLE bacteries
  MODIFY id INT(6) NOT NULL AUTO_INCREMENT;

CREATE TABLE adminlogin (
  id INT(6) NOT NULL,
  adminname VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

ALTER TABLE adminlogin
  ADD PRIMARY KEY (id);

  
ALTER TABLE adminlogin
  MODIFY id INT(6) NOT NULL AUTO_INCREMENT;


INSERT INTO bacteries (name, description, parent_id) VALUES 
('Bret', 'Leanne Graham', 2),
('Antonette', 'Ervin Howell', 3),
('Samantha', 'Clementine Bauch', 0),
('Karianne', 'Patricia Lebsack', 1),
('Karmen', 'Chelsey Dietrich', 2),
('Leopoldo_Corkery', 'Mrs. Dennis Schulist', 4),
('Elwyn.Skiles', 'Kurtis Weissnat', 0),
('Maxime_Nienow', 'Nicholas Runolfsdottir V', 3),
('Delphine', 'Glenna Reichert', 2),
('Moriah.Stanton', 'Glementina DuBuque', 1),
('Velit Quam', 'quidem molestiae eni', 1),
('Quibusdam Sapiente Et', 'qui fuga est a eum', 2),
('Sit optio', 'distinctio laborum qui', 4),
('Ure iste', 'ab rerum non rerum consequatur ut ea unde', 6),
('Ollitia ', 'quibusdam saepe ipsa vel harum', 3),
('Suntu', 'nde a sequi id', 2),
('Dolorem magnam', 'aut non illo amet perferendis', 4);
