create table if not exists category (
    id integer primary key autoincrement not null,
    name varchar(22) not null
                                    );

insert into category (name) values ('close friends');
insert into category (name) values ('job contacts');
insert into category (name) values ('bros from college');
insert into category (name) values ('work friends');
insert into category (name) values ('best friends');

create table if not exists contact (
    id integer primary key autoincrement not null,
    name varchar(60) not null,
    phone_number varchar(15) not null,
    email varchar(60) not null,
    age int
                                );

create table if not exists categorized_contact (
    id integer not null primary key autoincrement,
    user_id integer not null,
    category_id integer not null,
    foreign key (user_id) references contact(id),
    foreign key (category_id) references category(id)
                                            );