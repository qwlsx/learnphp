create table posts
(
    id         bigint unsigned auto_increment
        primary key,
    title      varchar(1024)                        not null,
    body       longtext                             null,
    created_at datetime default current_timestamp() null,
    updated_at datetime default current_timestamp() null on update current_timestamp()
);

create table users
(
    id         bigint unsigned auto_increment
        primary key,
    name       varchar(1024)                        not null,
    email      varchar(255)                         not null,
    password   varchar(1024)                        not null,
    created_at datetime default current_timestamp() null,
    updated_at datetime default current_timestamp() null on update current_timestamp(),
    constraint users_pk_2
        unique (email)
);