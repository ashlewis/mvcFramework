CREATE SCHEMA framework;

CREATE TABLE framework.items (
  id 			INT UNSIGNED AUTO_INCREMENT 	NOT NULL,
  name 		    VARCHAR(100) 					NOT NULL,
  description 	VARCHAR(255) 					NOT NULL,
  PRIMARY KEY (id)
 );
 
INSERT INTO framework.items VALUES (
'',
'Item one',
'The first item'
);