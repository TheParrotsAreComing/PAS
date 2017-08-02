@echo off
copy /b NUL db.sql
echo CREATE DATABASE IF NOT EXISTS %1; >> db.sql
echo Creating Database...
mysql -u root -p < db.sql

copy /b NUL %1.sql
FOR %%A IN (cats,litters,users,fosters) DO (
	echo DROP TABLE IF EXISTS %%A; >> %1.sql
	echo.
	echo CREATE TABLE %%A ^( >> %1.sql
	echo 	id INT AUTO_INCREMENT PRIMARY KEY >> %1.sql 
	echo ^); >> %1.sql
	echo.
)

echo Creating Tables...
mysql -u root -p %1 < %1.sql
