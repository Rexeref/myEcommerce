CREATE DATABASE IF NOT EXISTS `ecommerce`;
USE `ecommerce`;

CREATE TABLE IF NOT EXISTS indirizzi (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	indirizzo  VARCHAR(64) NOT NULL,
	completamento_indirizzo VARCHAR(64),
	stato VARCHAR(64) NOT NULL,
	regione VARCHAR(16) NOT NULL,
	citta VARCHAR(16) NOT NULL,
	codice_postale VARCHAR(16) NOT NULL
);

CREATE TABLE IF NOT EXISTS persone (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_indirizzo INT,
	nome VARCHAR(64) NOT NULL,
	cognome VARCHAR(64) NOT NULL,	
	FOREIGN KEY (id_indirizzo) REFERENCES indirizzi(id)
);

CREATE TABLE IF NOT EXISTS ruoli (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome_ruolo VARCHAR(16) NOT NULL,
	livello INT NOT NULL
);

INSERT INTO `ruoli` (`id`, `nome_ruolo`, `livello`) VALUES
	(1, 'Amministratore', 25),
	(2, 'Gestore', 5),
	(3, 'Cliente', 0);

CREATE TABLE IF NOT EXISTS `utenti` (
	`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`id_persona` int(11) DEFAULT NULL,
	`id_ruolo` int(11) NOT NULL,
	`username` varchar(64) NOT NULL,
	`password` varchar(64) NOT NULL,
	FOREIGN KEY (id_persona) REFERENCES persone(id),
	FOREIGN KEY (id_ruolo) REFERENCES ruoli(id)
);

CREATE TABLE IF NOT EXISTS ordini (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_utente INT NOT NULL,
	carrello BOOL NOT NULL,
	FOREIGN KEY (id_utente) REFERENCES utenti(id)
);

CREATE TABLE IF NOT EXISTS categorie (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_categoria INT, -- Se inserito indica che la categoria in questione è figlia di quella indicata
	nome VARCHAR(16) NOT NULL,
	descrizione TINYTEXT,
	immagine VARCHAR(64) DEFAULT "noimage.jpg", -- Contiene la posizione del file nella directory del server
	FOREIGN KEY (id_categoria) REFERENCES categorie(id)
);

CREATE TABLE IF NOT EXISTS prodotti (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_categoria INT NOT NULL,
	id_prodotto INT, -- Se inserito indica che il prodotto in questione è un'opzione/accessorio per il prodotto indicato
	nome VARCHAR(64) NOT NULL,
	descrizione TINYTEXT,
	prezzo INT,
	immagine VARCHAR(64), -- Contiene la posizione del file nella directory del server
	FOREIGN KEY (id_categoria) REFERENCES categorie(id),
	FOREIGN KEY (id_prodotto) REFERENCES prodotti(id)
);


CREATE TABLE IF NOT EXISTS oggetti (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_ordine INT,
	id_prodotto INT NOT NULL,
	sconto INT,
	FOREIGN KEY (id_ordine) REFERENCES ordini(id),
	FOREIGN KEY (id_prodotto) REFERENCES prodotti(id)
);


