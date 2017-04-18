Create Table Comments (
	User_id	INT,
	Event_id	INT,
	Date		datetime,
	Text		text,
	Rating		INT,
	Primary Key (User_id,Event_id),
	Foreign Key (User_id) References Student (User_id) ON DELETE CASCADE,
	Foreign Key (Event_id) References Event (Event_id) ON DELETE CASCADE,
	CHECK (Rating > 0 AND Rating <= 5)
	) ENGINE=InnoDB;

Create Table Creates (
	User_id	INT,
	Event_id	INT,
  Primary Key (User_id,Event_id),
  Foreign Key (User_id) References Student (User_id) ON DELETE CASCADE,
  Foreign Key (Event_id) References Event (Event_id) ON DELETE CASCADE) ENGINE=InnoDB;

Create Table Event (
	Event_id	INT,
	Name		VARCHAR(100),
  Category	VARCHAR(40),
  Type		VARCHAR(20),
  Start_date	VARCHAR(30),
  End_date	VARCHAR(30),
  Contact_name VARCHAR(30),
  Description	TEXT,
  Contact_email	VARCHAR(40),
  Location_name VARCHAR(100),
  Tags		VARCHAR(100),
  Status		VARCHAR(12),
  Primary Key(Event_id),
  Foreign Key(Location_name) References Location (Location_name) ON DELETE SET NULL)
  ENGINE=InnoDB;

Create Table Follows (
	User_id	INT,
	RSO_id	INT,
	Status		VARCHAR(12) DEFAULT ‘Pending’,
	Primary Key	(User_id, RSO_id),
	Foreign Key	(User_id) References Student (User_id) ON DELETE CASCADE,
	Foreign Key	(RSO_id) References RSO (RSO_id) ON DELETE CASCADE)
	ENGINE=InnoDB;

Create Table Hosts (
	RSO_id	INT,
	Event_id	INT,
	Primary Key	(RSO_id, Event_id),
	Foreign Key 	(RSO_id) References RSO (RSO_id) ON DELETE CASCADE,
	Foreign Key	(Event_id) References Event (Event_id) ON DELETE CASCADE)
	ENGINE=InnoDB;

Create Table Location (
	Location_name		VARCHAR (80),
	Latitude			DOUBLE,
	Longitude			DOUBLE,
  Primary Key (Location_name))
  ENGINE=InnoDB;

Create Table Owns (
	User_id	INT,
	RSO_id	INT,
	Primary Key (User_id, RSO_id),
	Foreign Key (User_id) References Student (User_id) ON DELETE CASCADE,
	Foreign Key (RSO_id) References RSO (RSO_id) ON DELETE CASCADE)
	ENGINE=InnoDB;

Create Table RSO (
	RSO_id	INT,
	Name		VARCHAR (100),
	Description	TEXT,
	Logo		VARCHAR(250),
	Primary Key (Rso_id))
	ENGINE=InnoDB;

Create Table Student (
	User_id 	INT,
	Password	VARCHAR(20),
	Name		VARCHAR (50),
	S_email	VARCHAR (50),
  U_id		INT, 
	Primary Key (User_id,U_id),
	Foreign Key (U_id) References UnivProfile (U_id) ON DELETE CASCADE)
	ENGINE=InnoDB;

Create Table SuperAdmin (
	User_id 	INT,
	Password	VARCHAR(20))

Create Table UnivProfile (
	u_id 		INT,
	Name 		VARCHAR(40),
	User_id	INT,
	Location_name	VARCHAR(50),
	Description	TEXT,
	numberOfStudents	INT,
	Primary Key (u_id),
	Foreign Key (User_id) References SuperAdmin (User_id) ON DELETE CASCADE,
	Foreign Key (Location_name) References Location (Location_name) ON DELETE CASCADE,
	CHECK (numberOfStudents > 0))
	ENGINE=InnoDB;
