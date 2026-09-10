CREATE DATABASE IF NOT EXISTS prova_crud
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE prova_crud;

CREATE TABLE IF NOT EXISTS veiculos (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    placa VARCHAR(8) NOT NULL,
    modelo VARCHAR(120) NOT NULL,
    ano SMALLINT UNSIGNED NOT NULL,
    UNIQUE KEY uk_veiculos_placa (placa)
);
