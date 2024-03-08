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
  `nome` varchar(64) NOT NULL,
  `descrizione` tinytext DEFAULT NULL,
  `prezzo` int(11) DEFAULT NULL,
  `immagine` varchar(64) DEFAULT "noimage.jpg",
  PRIMARY KEY (`id`),
  KEY `id_categoria` (`id_categoria`),
  KEY `id_prodotto` (`id_prodotto`),
  CONSTRAINT `prodotti_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorie` (`id`),
  CONSTRAINT `prodotti_ibfk_2` FOREIGN KEY (`id_prodotto`) REFERENCES `prodotti` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ecommerce.prodotti: ~35 rows (circa)
INSERT INTO `prodotti` (`id`, `id_categoria`, `id_prodotto`, `nome`, `descrizione`, `prezzo`, `immagine`) VALUES
	(1, 1, NULL, 'Letto Standard', 'Letto matrimoniale standard', 500, 'example/lettostandard.png'),
	(2, 1, NULL, 'Letto King Size', 'Letto matrimoniale king size', 800, 'example/lettokingsize.jpg'),
	(3, 2, NULL, 'Tavolo da Pranzo', 'Tavolo da pranzo in legno', 300, 'example/tavolodapranzo.jpg'),
	(4, 2, NULL, 'Tavolo da Cucina', 'Tavolo da cucina moderno', 250, 'example/tavolodacucina.jpg'),
	(5, 3, NULL, 'Divano in Pelle', 'Divano moderno in pelle', 1000, 'example/divanoinpelle.jpg'),
	(6, 3, NULL, 'Divano a Due Posti', 'Divano a due posti elegante', 700, 'example/divanoadueposti.jpg'),
	(7, 4, NULL, 'Specchio da Ingresso', 'Specchio decorativo per l\'ingresso', 150, 'noimagei.jpg'),
	(8, 5, 1, 'Cuscino Memory Foam', 'Cuscino in memory foam per il letto', 50, 'noimage.jpg'),
	(9, 5, 1, 'Coperta Calda', 'Coperta morbida e calda', 30, 'noimage.jpg'),
	(10, 6, 1, 'Armadio a 3 Ante', 'Armadio spazioso a 3 ante', 600, 'noimage.jpg'),
	(11, 1, NULL, 'Biancheria da Letto', 'Set di biancheria per il letto', 80, 'noimage.jpg'),
	(12, 1, NULL, 'Comodino Moderno', 'Comodino con design moderno', 100, 'noimage.jpg'),
	(13, 2, NULL, 'Set di Pentole', 'Set di pentole antiaderenti', 120, 'noimage.jpg'),
	(14, 2, NULL, 'Accessori da Cucina', 'Set di accessori per la cucina', 50, 'noimage.jpg'),
	(15, 3, NULL, 'Cuscini Decorati', 'Cuscini decorativi per il divano', 40, 'noimage.jpg'),
	(16, 3, NULL, 'Tappeto Moderno', 'Tappeto moderno per il soggiorno', 90, 'noimage.jpg'),
	(17, 4, NULL, 'Appendiabiti da Ingresso', 'Appendiabiti pratico e funzionale', 30, 'noimage.jpg'),
	(18, 4, NULL, 'Pianta Decorativa', 'Pianta in vaso per l\'ingresso', 25, 'noimage.jpg'),
	(19, 5, NULL, 'Parure di Lenzuola', 'Parure di lenzuola in cotone', 60, 'noimage.jpg'),
	(20, 5, NULL, 'Telo Copriletto', 'Telo copriletto leggero e confortevole', 35, 'noimage.jpg'),
	(21, 6, NULL, 'Appendiabiti Interno', 'Appendiabiti interno per l\'armadio', 20, 'noimage.jpg'),
	(22, 6, NULL, 'Cassettiera Organizzativa', 'Cassettiera per un\'organizzazione ottimale', 80, 'noimage.jpg'),
	(23, 2, NULL, 'Sgabello da Bar Moderno', 'Sgabello da bar moderno', 40, 'noimage.jpg'),
	(24, 2, NULL, 'Set di Coltelli Affilati', 'Set di coltelli affilati', 60, 'noimage.jpg'),
	(25, 3, NULL, 'Tavolino da Soggiorno', 'Tavolino basso per il soggiorno', 120, 'noimage.jpg'),
	(26, 1, 1, 'Lenzuola Extra', 'Set extra di lenzuola in cotone', 50, 'noimage.jpg'),
	(27, 1, 2, 'Paracolpi per Letto', 'Paracolpi morbidi per il letto', 30, 'noimage.jpg'),
	(28, 2, 3, 'Guanti da Cucina', 'Guanti resistenti al calore per la cucina', 15, 'noimage.jpg'),
	(29, 2, 4, 'Tovagliette in Plastica', 'Set di tovagliette colorate', 10, 'noimage.jpg'),
	(30, 3, 5, 'Cuscini Decorativi Aggiuntivi', 'Cuscini decorativi aggiuntivi per il divano', 25, 'noimage.jpg'),
	(31, 3, 6, 'Tappeto Aggiuntivo', 'Tappeto aggiuntivo per il soggiorno', 50, 'noimage.jpg'),
	(32, 4, 7, 'Appendiabiti Esterno', 'Appendiabiti aggiuntivi per l\'ingresso', 10, 'noimage.jpg'),
	(33, 4, 8, 'Cuscino per Sedie', 'Cuscino imbottito per sedia', 15, 'noimage.jpg'),
	(34, 5, 9, 'Plaid Morbido', 'Plaid extra morbido', 20, 'noimage.jpg'),
	(35, 5, 10, 'Organizzatore per Madie', 'Organizzatore interno per madie', 30, 'noimage.jpg');

-- Dump della struttura di tabella ecommerce.ruoli
CREATE TABLE IF NOT EXISTS `ruoli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_ruolo` varchar(16) NOT NULL,
  `livello` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ecommerce.ruoli: ~3 rows (circa)
INSERT INTO `ruoli` (`id`, `nome_ruolo`, `livello`) VALUES
	(1, 'Amministratore', 25),
	(2, 'Gestore', 5),
	(3, 'Cliente', 0);

-- Dump della struttura di tabella ecommerce.utenti
CREATE TABLE IF NOT EXISTS `utenti` (
	`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`id_persona` int(11) DEFAULT NULL,
	`id_ruolo` int(11) NOT NULL,
	`username` varchar(64) NOT NULL,
	`password` varchar(64) NOT NULL,
	FOREIGN KEY (id_persona) REFERENCES persone(id),
	FOREIGN KEY (id_ruolo) REFERENCES ruoli(id)
);

-- Dump dei dati della tabella ecommerce.utenti: ~3 rows (circa)
INSERT INTO `utenti` (`id`, `id_persona`, `id_ruolo`, `username`, `password`) VALUES
	(1, NULL, 3, 'c1c224b03cd9bc7b6a86d77f5dace40191766c485cd55dc48caf9ac873335d6f', '$2y$10$7q3pyTlyO8Nvv1OlbgMw5O4LdvjEtBZYjISeBjkDPLeuF/9Fx3cE.'),
	(2, NULL, 3, 'b512d97e7cbf97c273e4db073bbb547aa65a84589227f8f3d9e4a72b9372a24d', '$2y$10$AFI7xVbICt9M48SueskAMOGqSuvzgN0QhjhmelgfxihA4jXIcSSvW'),
	(3, NULL, 3, '01498fa31d5a344a6a66c69dc5671c8d0f86953c2268c1c9274b259add7bae4b', '$2y$10$jEEjfAtdOLPVn3ION0Wy/uhhkTY38Xi0qadOYLpq9duZMEpjKhc/O');


-- Dump della struttura di tabella ecommerce.ordini
CREATE TABLE IF NOT EXISTS `ordini` (
 `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `id_utente` int(11) NOT NULL,
 `datacreazioneordine` TIMESTAMP NULL DEFAULT NULL,
 FOREIGN KEY (id_utente) REFERENCES utenti(id)
);

-- TODO: Gestione carrello/ordine utilizzando i timestamp
-- Dump dei dati della tabella ecommerce.ordini: ~2 rows (circa)
INSERT INTO `ordini` (`id`, `id_utente`, `datacreazioneordine`) VALUES
	(1, 3, '2021-05-12 17:24:21'),
	(2, 3, NULL);

-- TODO: Utilizzo nella view ordini dei dati vecchi, non aggiornati
-- Dump della struttura di tabella ecommerce.oggetti
CREATE TABLE IF NOT EXISTS `oggetti` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`id_ordine` int(11) DEFAULT NULL,
	`id_prodotto` int(11) NOT NULL,
	`sconto` int(11) DEFAULT NULL,
	`bknome` varchar(64) NOT NULL,
	`bkdescrizione` tinytext DEFAULT NULL,
	`bkprezzo` int(11) DEFAULT NULL,
	`bkimmagine` varchar(64) DEFAULT "noimage.jpg",
	PRIMARY KEY (`id`),
	KEY `id_ordine` (`id_ordine`),
	KEY `id_prodotto` (`id_prodotto`),
	CONSTRAINT `oggetti_ibfk_1` FOREIGN KEY (`id_ordine`) REFERENCES `ordini` (`id`),
	CONSTRAINT `oggetti_ibfk_2` FOREIGN KEY (`id_prodotto`) REFERENCES `prodotti` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `oggetti` (`id`, `id_ordine`, `id_prodotto`, `sconto`) VALUES
	(1, 1, 5, NULL),
	(2, 2, 9, NULL),
	(3, NULL, 5, NULL),
	(4, NULL, 5, NULL),
	(5, NULL, 8, NULL),
	(6, 2, 7, NULL),
	(7, NULL, 3, NULL),
	(8, NULL, 15, NULL),
	(9, 1, 12, NULL),
	(10, 1, 20, 25),
	(11, NULL, 18, NULL),
	(12, NULL, 4, NULL),
	(13, 1, 14, 45),
	(14, NULL, 6, NULL),
	(15, NULL, 10, NULL),
	(16, 2, 5, NULL),
	(17, NULL, 23, NULL),
	(18, NULL, 17, NULL),
	(19, NULL, 12, NULL),
	(20, NULL, 2, NULL),
	(21, NULL, 9, NULL),
	(22, 1, 22, NULL),
	(23, NULL, 13, NULL),
	(24, NULL, 8, NULL),
	(25, NULL, 21, 30),
	(26, 2, 16, NULL),
	(27, NULL, 24, NULL),
	(28, NULL, 11, NULL),
	(29, NULL, 3, NULL),
	(30, NULL, 19, NULL);
