
CREATE TABLE qna_ripple (
       num int not null auto_increment,
       parent int not null,
       id varchar(10) not null,
       name varchar(10) not null,
       content text not null,
       regist_day varchar(20),
       ip varchar(20),
       PRIMARY KEY (num)
);

