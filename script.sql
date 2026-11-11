create table users
(
    id         bigint unsigned auto_increment
        primary key,
    email      varchar(255)                         not null,
    password   varchar(1024)                        not null,
    created_at datetime default current_timestamp() not null,
    updated_at datetime default current_timestamp() not null on update current_timestamp(),
    name       varchar(255)                         not null
);
