create table guestbook (
   num int not null auto_increment,
   name varchar(10) not null,
   passwd varchar(10) not null,
   content text not null,
   regist_day varchar(20),
   ip varchar(20),
   primary key(num)
);

