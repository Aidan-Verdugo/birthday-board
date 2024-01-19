CREATE DATABASE IF NOT EXISTS partydb;

USE partydb;

CREATE TABLE IF NOT EXISTS party_table(
    child_name VARCHAR(225),
    theme VARCHAR(225),
    party_time VARCHAR(225),
    party_day VARCHAR(225)
);

