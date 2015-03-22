create table imagetable ( 
	id int NOT NULL AUTO_INCREMENT, 
	username varchar(50) NOT NULL, 
	image varchar(255) NOT NULL, 
	des varchar(255) NOT NULL, 
	dt datetime , 
	PRIMARY KEY(id)
)ENGINE=InnoDB;

create table t_user (
	userid int NOT NULL AUTO_INCREMENT,
	username varchar(50) NOT NULL,
	pwd varchar(50) NOT NULL,
	PRIMARY KEY(userid)
)ENGINE=InnoDB;
