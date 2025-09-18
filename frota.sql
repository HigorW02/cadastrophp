CREATE DATABASE FROTA;

CREATE TABLE carros (
    id SERIAL PRIMARY KEY,
    placa VARCHAR(7),
    modelo VARCHAR(25),
    marca VARCHAR(20),
    ano INT
);

SELECT * FROM carros;