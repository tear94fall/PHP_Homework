CREATE TABLE down_board (
       num int not null auto_increment,
       group_num int not null,
       ord int not null,
       depth int not null,
       id varchar(10) not null,
       name varchar(10) not null,
       subject varchar(100) not null,
       content text not null,
       regist_day varchar(20),
       hit int,
       ip varchar(20),
       filename varchar(50),
       filesize varchar(20),
       PRIMARY KEY (num)
       );
