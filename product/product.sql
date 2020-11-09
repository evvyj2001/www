create table product (
   num int not null auto_increment,
   id char(15) not null,
   name  char(10) not null,
   nick  char(10) not null,
   subject char(60) not null,
   content char(120) not null,
   category char(30) not null,
   sorting char(20) not null,
   manager char(10) not null, 
   email char(50) not null,
   regist_day char(20),
   primary key(num)
);

