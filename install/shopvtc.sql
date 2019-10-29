CREATE database shopvtc;

use 3190142_shopvtc;

CREATE TABLE users(
    user_id varchar(10) PRIMARY KEY,
    firt_name varchar(100) not null,
    last_name varchar(100) not null,
    birthday date not null,
    user_name varchar(100) not null,
    email varchar(100) not null,
    passwords varchar(100) not null,
    level_user int not null,
    path_avatar varchar(100)
  ) ;
  CREATE TABLE catagories(
      id_catarory varchar(50) PRIMARY KEY,
      name_catagory varchar(200)
      );
  CREATE TABLE products(
      product_id varchar(20) PRIMARY KEY,
      product_name varchar (100) not null,
      id_catagory varchar(100) not null,
      price_shop double not null,
      price_market double not null,
      description varchar(1000) not null,
      path_img varchar(1000),
      FOREIGN KEY id_catagory REFERENCES catagories(id_catarory)
      );

      INSERT INTO `users` (`user_id`, `firt_name`, `last_name`, `birthday`, `user_name`, `email`, `passwords`, `level_user`, `path_avatar`) VALUES ('nde100', 'Phung', 'Chinh', '2000-02-18', 'kasi', 'chinh@gamil.com', 'chinh123', '1', NULL);