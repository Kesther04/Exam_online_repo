<?php

    require("database_connection.php");

    //to create table for the registration of the admin
    $admin_tb = $con->query("CREATE TABLE if not exists admin_table(id int(100)not null primary key auto_increment,username varchar(120)not null,email varchar(120)not null,password  varchar(120)not null,phone_no varchar(12)not null)ENGINE=innoDB");
    $admin_tb ? print("<p>table created</p>") : print("<p>table not created</p>");

    //to create table for registration of candidates
    $cand = $con->query("CREATE TABLE if not exists candidates(id bigint(100)not null primary key auto_increment,name varchar(200)not null,reg_no varchar(200)not null,dob varchar(200)not null,gender varchar(20)not null,email varchar(200)not null,contact_no varchar(20)not null,state_of_org varchar(120)not null,lga varchar(120)not null,level_of_edu varchar(120)not null,subjects text not null,exam_status varchar(150)not null,date varchar(20)not null,fullDay varchar(20)not null,time varchar(20)not null)ENGINE=innoDB");
    $cand ? print( "<p>candidate table created</p>") : print( "<p>candidate table not created</p>");

    //to create table for registering set of questions for a particular subject
    $subset = $con->query("CREATE TABLE if not exists subjects(id bigint(100)not null primary key auto_increment,subject_code varchar(200)not null,subjects varchar(200)not null,quest_no bigint(100)not null,date varchar(20)not null,fullDay varchar(20)not null,time varchar(20)not null)ENGINE=innoDB");
    $subset ? print( "<p>subject table created</p>") : print( "<p>subject table not created</p>");

    //to create table for uploading said questions
    $subupl = $con->query("CREATE TABLE if not exists questions(id bigint(100)not null primary key auto_increment,subject_code varchar(200)not null,subjects varchar(200)not null,quest_no bigint(100)not null,question text not null,A text not null,B text not null,C text not null,D text not null,correct text not null,date varchar(20)not null,fullDay varchar(20)not null,time varchar(20)not null)ENGINE=innoDB");
    $subupl ? print( "<p>question table created</p>") : print( "<p>question table not created</p>");

    //to create table for managing candidate answers to questions
    $subqm = $con->query("CREATE TABLE if not exists question_manager(id bigint(100)not null primary key auto_increment,reg_no varchar(200)not null,subject_code varchar(200)not null,subjects varchar(200)not null,quest_no bigint(100)not null,answer text not null,date varchar(20)not null,fullDay varchar(20)not null,time varchar(20)not null)ENGINE=innoDB");
    $subqm ? print( "<p>question manager table created</p>") : print( "<p>question manager table not created</p>");

    //to create table for storing result of candidate examination
    $subres = $con->query("CREATE TABLE if not exists results(id bigint(100)not null primary key auto_increment,name varchar(200)not null,reg_no varchar(200)not null,subject_code varchar(200)not null,subjects varchar(200)not null,score bigint(100)not null,total bigint(100)not null,date varchar(20)not null,fullDay varchar(20)not null,time varchar(20)not null)ENGINE=innoDB");
    $subres ? print( "<p>results table created</p>") : print( "<p>results table not created</p>");    

    //to create table for managing exam period of candidates
    $subper = $con->query("CREATE TABLE if not exists exam_period(id bigint(100)not null primary key auto_increment,name varchar(200)not null,reg_no varchar(200)not null,start_time varchar(200)not null,end_time varchar(200)not null,exam_period varchar(200)not null,date varchar(20)not null,fullDay varchar(20)not null,time varchar(20)not null)ENGINE=innoDB");
    $subper ? print("<p>exam period table created </p>") : print("<p>exam period not created</p>");
    
?>