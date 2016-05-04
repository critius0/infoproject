-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2016-03-30 17:59:51.904




-- tables
-- Table Caselog
DROP TABLE IF EXISTS Caselog;
CREATE TABLE Caselog (
    reportId int  NOT NULL  AUTO_INCREMENT,
    jobid int  NOT NULL,
    notes varchar(256)  NOT NULL,
    CONSTRAINT Caselog_pk PRIMARY KEY (reportId)
);

-- Table Employer
DROP TABLE IF EXISTS Employer;
CREATE TABLE Employer (
    employerid int  NOT NULL  AUTO_INCREMENT,
    employername varchar(128)  NOT NULL,
    employeraddress varchar(128)  NOT NULL,
    employercity varchar(128)  NOT NULL,
    employerstate varchar(2)  NOT NULL,
    CONSTRAINT Employer_pk PRIMARY KEY (employerid)
);

-- Table Hoursreported
DROP TABLE IF EXISTS Hoursreported;
CREATE TABLE Hoursreported (
    reportingid int  NOT NULL  AUTO_INCREMENT,
    jobid int  NOT NULL,
    hoursworked int  NOT NULL,
    datereportedfor date  NOT NULL,
    CONSTRAINT Hoursreported_pk PRIMARY KEY (reportingid)
);

-- Table Jobinfo This is the main table, all roadmaps lead to here
DROP TABLE IF EXISTS Jobinfo;
CREATE TABLE Jobinfo (
    jobid int  NOT NULL  AUTO_INCREMENT,
    userid int  NOT NULL,
    employerid int  NOT NULL,
    jobTitle varchar(128)  NOT NULL,
    hourlyrate int  NOT NULL,
    Caselog_reportId int  NOT NULL,
    CONSTRAINT jobId PRIMARY KEY (jobid)
);

-- Table Paycheck
DROP TABLE IF EXISTS Paycheck;
CREATE TABLE Paycheck (
    paycheckId int  NOT NULL  AUTO_INCREMENT,
    jobid int  NOT NULL,
    amountearned int  NOT NULL,
    hoursworked int  NOT NULL,
    payCheckPeriodStart date  NOT NULL,
    payCheckPeriodEnd date  NOT NULL,
    CONSTRAINT Paycheck_pk PRIMARY KEY (paycheckId)
);

-- Table Users, Usertype determines admin access.  usertype of 2 is the highest level admin
DROP TABLE IF EXISTS Users;
CREATE TABLE Users (
    userid int  NOT NULL  AUTO_INCREMENT,
    username varchar(128)  NOT NULL,
    firstname varchar(128)  NOT NULL,
    lastname varchar(128)  NOT NULL,
    password varchar(128)  NOT NULL,
    email varchar(128)  NOT NULL,
    usertype int  NOT NULL  DEFAULT 0,
    CONSTRAINT userId PRIMARY KEY (userid)
);
--Insert the main admin into table at creation
INSERT INTO Users (username, firstname, lastname, password, email, usertype) VALUES ('admin', 'Godadmin', 'PrimaryAdmin', '$2a$12$dxzp05dpWfZPDiochojF6e5KVDYkEPVRfhFY05kF2Tw.yG.3muCuq ', 'colin-mcgillin@uiowa.edu' , '2');





-- foreign keys
-- Reference:  Employer_JobInfo (table: Jobinfo)

ALTER TABLE Jobinfo ADD CONSTRAINT Employer_JobInfo FOREIGN KEY Employer_JobInfo (employerid)
    REFERENCES Employer (employerid);
-- Reference:  JobInfo_Users (table: Jobinfo)

ALTER TABLE Jobinfo ADD CONSTRAINT JobInfo_Users FOREIGN KEY JobInfo_Users (userid)
    REFERENCES Users (userid);
-- Reference:  JobInfo_WageInfo (table: Paycheck)

ALTER TABLE Paycheck ADD CONSTRAINT JobInfo_WageInfo FOREIGN KEY JobInfo_WageInfo (jobid)
    REFERENCES Jobinfo (jobid);
-- Reference:  JobInfo_reporting (table: Hoursreported)

ALTER TABLE Hoursreported ADD CONSTRAINT JobInfo_reporting FOREIGN KEY JobInfo_reporting (jobid)
    REFERENCES Jobinfo (jobid);
-- Reference:  Jobinfo_Caselog (table: Caselog)

ALTER TABLE Caselog ADD CONSTRAINT Jobinfo_Caselog FOREIGN KEY Jobinfo_Caselog (jobid)
    REFERENCES Jobinfo (jobid);



-- End of file.

