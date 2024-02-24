-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versione server:              10.4.32-MariaDB - mariadb.org binary distribution
-- S.O. server:                  Win64
-- HeidiSQL Versione:            12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dump della struttura del database ecommerce
CREATE DATABASE IF NOT EXISTS `ecommerce` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `ecommerce`;

-- Dump della struttura di tabella ecommerce.categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) DEFAULT NULL,
  `nome` varchar(16) NOT NULL,
  `descrizione` tinytext DEFAULT NULL,
  `immagine` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `categorie_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorie` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ecommerce.categorie: ~11 rows (circa)
INSERT INTO `categorie` (`id`, `id_categoria`, `nome`, `descrizione`, `immagine`) VALUES
	(1, NULL, 'Camera Da Letto', NULL, NULL),
	(2, NULL, 'Cucina', NULL, NULL),
	(3, NULL, 'Soggiorno', NULL, NULL),
	(4, NULL, 'Ingresso', NULL, NULL),
	(5, 1, 'Letto', NULL, NULL),
	(6, 1, 'Armadio', NULL, NULL),
	(7, 2, 'Tavolo', NULL, NULL),
	(8, 2, 'Sedia', NULL, NULL),
	(9, 3, 'Vetrina', NULL, NULL),
	(10, 3, 'Madie', NULL, NULL),
	(11, 4, 'Zerbino', NULL, NULL);

-- Dump della struttura di tabella ecommerce.indirizzi
CREATE TABLE IF NOT EXISTS `indirizzi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `indirizzo` varchar(64) NOT NULL,
  `completamento_indirizzo` varchar(64) DEFAULT NULL,
  `stato` varchar(64) NOT NULL,
  `regione` varchar(16) NOT NULL,
  `citta` varchar(16) NOT NULL,
  `codice_postale` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ecommerce.indirizzi: ~8 rows (circa)
INSERT INTO `indirizzi` (`id`, `indirizzo`, `completamento_indirizzo`, `stato`, `regione`, `citta`, `codice_postale`) VALUES
	(1, 'Via Garibaldi 1', 'Appartamento 3', 'Italia', 'Liguria', 'Genova', '16100'),
	(2, 'Corso Vittorio Emanuele II 45', 'Scala B', 'Italia', 'Lombardia', 'Milano', '20100'),
	(3, 'Viale della Libertà 123', 'Interno 5', 'Italia', 'Sicilia', 'Palermo', '90100'),
	(4, 'Piazza del Campo 67', 'Palazzo 8', 'Italia', 'Toscana', 'Siena', '53100'),
	(5, 'Via Toledo 89', 'Scala C', 'Italia', 'Campania', 'Napoli', '80100'),
	(6, 'Ponte Vecchio 12', 'Appartamento 6', 'Italia', 'Toscana', 'Firenze', '50125'),
	(7, 'Corso Umberto I 34', 'Piano 2', 'Italia', 'Calabria', 'Reggio Calabria', '89100'),
	(8, 'Via Roma 56', 'Interno 7', 'Italia', 'Puglia', 'Bari', '70100');

-- Dump della struttura di tabella ecommerce.oggetti
CREATE TABLE IF NOT EXISTS `oggetti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ordine` int(11) DEFAULT NULL,
  `id_prodotto` int(11) NOT NULL,
  `sconto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ordine` (`id_ordine`),
  KEY `id_prodotto` (`id_prodotto`),
  CONSTRAINT `oggetti_ibfk_1` FOREIGN KEY (`id_ordine`) REFERENCES `ordini` (`id`),
  CONSTRAINT `oggetti_ibfk_2` FOREIGN KEY (`id_prodotto`) REFERENCES `prodotti` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ecommerce.oggetti: ~7 rows (circa)
INSERT INTO `oggetti` (`id`, `id_ordine`, `id_prodotto`, `sconto`) VALUES
	(1, 5, 5, NULL),
	(2, 5, 9, NULL),
	(3, NULL, 5, NULL),
	(4, NULL, 5, NULL),
	(5, NULL, 8, NULL),
	(6, 6, 7, NULL),
	(7, NULL, 3, NULL);

-- Dump della struttura di tabella ecommerce.ordini
CREATE TABLE IF NOT EXISTS `ordini` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utente` int(11) NOT NULL,
  `carrello` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utente` (`id_utente`),
  CONSTRAINT `ordini_ibfk_1` FOREIGN KEY (`id_utente`) REFERENCES `utenti` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ecommerce.ordini: ~2 rows (circa)
INSERT INTO `ordini` (`id`, `id_utente`, `carrello`) VALUES
	(5, 1, 1),
	(6, 1, 0);

-- Dump della struttura di tabella ecommerce.persone
CREATE TABLE IF NOT EXISTS `persone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_indirizzo` int(11) DEFAULT NULL,
  `nome` varchar(64) NOT NULL,
  `cognome` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_indirizzo` (`id_indirizzo`),
  CONSTRAINT `persone_ibfk_1` FOREIGN KEY (`id_indirizzo`) REFERENCES `indirizzi` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ecommerce.persone: ~8 rows (circa)
INSERT INTO `persone` (`id`, `id_indirizzo`, `nome`, `cognome`) VALUES
	(1, 1, 'Mario', 'Rossi'),
	(2, 2, 'Luca', 'Bianchi'),
	(3, 3, 'Giovanna', 'Verdi'),
	(4, 4, 'Alessio', 'Bruno'),
	(5, 5, 'Francesca', 'Ferrari'),
	(6, 6, 'Roberto', 'Ricci'),
	(7, 7, 'Anna', 'Mancini'),
	(8, 8, 'Paolo', 'Gallo');

-- Dump della struttura di tabella ecommerce.prodotti
CREATE TABLE IF NOT EXISTS `prodotti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `id_prodotto` int(11) DEFAULT NULL,
  `nome` varchar(16) NOT NULL,
  `descrizione` tinytext DEFAULT NULL,
  `prezzo` int(11) DEFAULT NULL,
  `immagine` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categoria` (`id_categoria`),
  KEY `id_prodotto` (`id_prodotto`),
  CONSTRAINT `prodotti_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorie` (`id`),
  CONSTRAINT `prodotti_ibfk_2` FOREIGN KEY (`id_prodotto`) REFERENCES `prodotti` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ecommerce.prodotti: ~10 rows (circa)
INSERT INTO `prodotti` (`id`, `id_categoria`, `id_prodotto`, `nome`, `descrizione`, `prezzo`, `immagine`) VALUES
	(1, 1, NULL, 'Letto Standard', 'Letto matrimoniale standard', 500, ''),
	(2, 1, NULL, 'Letto King Size', 'Letto matrimoniale king size', 800, ''),
	(3, 2, NULL, 'Tavolo da Pranzo', 'Tavolo da pranzo in legno', 300, ''),
	(4, 2, NULL, 'Tavolo da Cucina', 'Tavolo da cucina moderno', 250, ''),
	(5, 3, NULL, 'Divano in Pelle', 'Divano moderno in pelle', 1000, ''),
	(6, 3, NULL, 'Divano a Due Pos', 'Divano a due posti elegante', 700, ''),
	(7, 4, NULL, 'Specchio da Ingr', 'Specchio decorativo per l\'ingresso', 150, ''),
	(8, 5, 1, 'Cuscino Memory F', 'Cuscino in memory foam per il letto', 50, ''),
	(9, 5, 1, 'Coperta Calda', 'Coperta morbida e calda', 30, ''),
	(10, 6, 1, 'Armadio a 3 Ante', 'Armadio spazioso a 3 ante', 600, '');

-- Dump della struttura di tabella ecommerce.ruoli
CREATE TABLE IF NOT EXISTS `ruoli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_ruolo` varchar(16) NOT NULL,
  `livello` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ecommerce.ruoli: ~3 rows (circa)
INSERT INTO `ruoli` (`id`, `nome_ruolo`, `livello`) VALUES
	(1, 'Amministratore', 0),
	(2, 'Gestore', 5),
	(3, 'Cliente', 25);

-- Dump della struttura di tabella ecommerce.utenti
CREATE TABLE IF NOT EXISTS `utenti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `id_ruolo` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_persona` (`id_persona`),
  KEY `id_ruolo` (`id_ruolo`),
  CONSTRAINT `utenti_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persone` (`id`),
  CONSTRAINT `utenti_ibfk_2` FOREIGN KEY (`id_ruolo`) REFERENCES `ruoli` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ecommerce.utenti: ~8 rows (circa)
INSERT INTO `utenti` (`id`, `id_persona`, `id_ruolo`, `username`, `password`) VALUES
	(1, 1, 3, 'utente', 'utente'),
	(2, 2, 3, 'luca.bianchi', 'securepwd456'),
	(3, 3, 3, 'giovanna.verdi', 'strongpass789'),
	(4, 4, 1, 'admin', 'admin'),
	(5, 5, 3, 'francesca.ferrari', 'mypassword567'),
	(6, 6, 3, 'roberto.ricci', 'pass1234'),
	(7, 7, 2, 'gestore', 'gestore'),
	(8, 8, 3, 'paolo.gallo', 'password789');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
