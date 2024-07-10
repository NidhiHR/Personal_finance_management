create database if not exists Personal_Finance;

USE Personal_Finance;

create table
    if not exists users(
        userid int primary key not null Auto_increment,
        username varchar(30),
        dob date,
        city varchar(10),
        district varchar(15),
        state varchar(20),
        pincode int,
        phone_num int,
        age int
    );

CREATE TABLE
    if not exists account(
        acc_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        acc_num VARCHAR(15),
        userid INT,
        acc_type VARCHAR(20),
        cur_balance DECIMAL(10, 2),
        -- Changed from int to DECIMAL(10,2)
        FOREIGN KEY (userid) REFERENCES users(userid) ON DELETE CASCADE
    );

CREATE TABLE
    if not exists transactions (
        id INT AUTO_INCREMENT PRIMARY KEY,
        description VARCHAR(255) NOT NULL,
        amount DECIMAL(10, 2) NOT NULL,
        transaction_type VARCHAR(50) NOT NULL,
        transaction_date DATE NOT NULL
    );

CREATE TABLE
    if not exists budgets (
        id INT AUTO_INCREMENT PRIMARY KEY,
        budget_amount DECIMAL(10, 2) NOT NULL,
        start_date DATE NOT NULL,
        end_date DATE NOT NULL
    );

CREATE TABLE
    if not exists goals (
        id INT AUTO_INCREMENT PRIMARY KEY,
        description VARCHAR(255) NOT NULL,
        target_amount DECIMAL(10, 2) NOT NULL,
        current_amount DECIMAL(10, 2) NOT NULL
    );

CREATE TABLE
    if not exists loans (
        id INT AUTO_INCREMENT PRIMARY KEY,
        loan_amount DECIMAL(10, 2) NOT NULL,
        interest_rate DECIMAL(4, 2) NOT NULL,
        loan_term INT NOT NULL
    );

CREATE TABLE
    if not exists insurance (
        id INT AUTO_INCREMENT PRIMARY KEY,
        insurance_type VARCHAR(255) NOT NULL,
        insurance_premium DECIMAL(10, 2) NOT NULL,
        renewal_date DATE NOT NULL
    );

CREATE TABLE
    if not exists investments (
        id INT AUTO_INCREMENT PRIMARY KEY,
        investment_type VARCHAR(255) NOT NULL,
        investment_amount DECIMAL(10, 2) NOT NULL,
        investment_date DATE NOT NULL
    );

CREATE TABLE
    if not exists taxes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        tax_type VARCHAR(255) NOT NULL,
        tax_amount DECIMAL(10, 2) NOT NULL,
        tax_deadline DATE NOT NULL
    );