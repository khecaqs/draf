CREATE TABLE svrident
( svrid            NUMBER PRIMARY KEY,
  svrname          VARCHAR2(50),
  svrdns          VARCHAR2(30),
  svrip        VARCHAR2(15),
  svrdesc          VARCHAR2(80) )
TABLESPACE users;
/
CREATE TABLE svrloginid
( svrid            NUMBER PRIMARY KEY,
  logname          VARCHAR2(50),
  logpass          VARCHAR2(30) )
TABLESPACE users;
/
CREATE TABLE oraloginid
( svrid            NUMBER PRIMARY KEY,
  oraname          VARCHAR2(50),
  orapass          VARCHAR2(30) )
TABLESPACE users;