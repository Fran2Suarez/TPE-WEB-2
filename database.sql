create table developers (
  id bigint primary key generated always as identity,
  name text not null,
  founded int
);

create table games (
  id bigint primary key generated always as identity,
  title text not null,
  release_date date,
  genre text,
  developer_id bigint references developers (id)
);

create table platforms (
  id bigint primary key generated always as identity,
  name text not null,
  manufacturer text
);

alter table games
add column platform_id bigint references platforms (id);