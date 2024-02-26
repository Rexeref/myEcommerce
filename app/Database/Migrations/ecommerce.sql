CREATE TABLE indirizzi (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	indirizzo  VARCHAR(64) NOT NULL,
	completamento_indirizzo VARCHAR(64),
	stato VARCHAR(64) NOT NULL,
	regione VARCHAR(16) NOT NULL,
	citta VARCHAR(16) NOT NULL,
	codice_postale VARCHAR(16) NOT NULL
);

CREATE TABLE persone (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_indirizzo INT,
	nome VARCHAR(64) NOT NULL,
	cognome VARCHAR(64) NOT NULL,	
	FOREIGN KEY (id_indirizzo) REFERENCES indirizzi(id)
);

CREATE TABLE ruoli (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome_ruolo VARCHAR(16) NOT NULL,
	livello INT NOT NULL
);

CREATE TABLE utenti (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_persona INT NOT NULL,
	id_ruolo INT NOT NULL,
	username VARCHAR(64) NOT NULL,
	password VARCHAR(64) NOT NULL,
	FOREIGN KEY (id_persona) REFERENCES persone(id),
	FOREIGN KEY (id_ruolo) REFERENCES ruoli(id)
);

CREATE TABLE ordini (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_utente INT NOT NULL,
	carrello BOOL NOT NULL,
	FOREIGN KEY (id_utente) REFERENCES utenti(id)
);

CREATE TABLE categorie (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_categoria INT, # Se inserito indica che la categoria in questione è figlia di quella indicata
	nome VARCHAR(16) NOT NULL,
	descrizione TINYTEXT,
	immagine VARCHAR(64), # Contiene la posizione del file nella directory del server
	FOREIGN KEY (id_categoria) REFERENCES categorie(id)
);

CREATE TABLE prodotti (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_categoria INT NOT NULL,
	id_prodotto INT, # Se inserito indica che il prodotto in questione è un'opzione/accessorio per il prodotto indicato
	nome VARCHAR(16) NOT NULL,
	descrizione TINYTEXT,
	prezzo INT,
	immagine VARCHAR(64), # Contiene la posizione del file nella directory del server
	FOREIGN KEY (id_categoria) REFERENCES categorie(id),
	FOREIGN KEY (id_prodotto) REFERENCES prodotti(id)
);


CREATE TABLE oggetti (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_ordine INT,
	id_prodotto INT NOT NULL,
	sconto INT,
	FOREIGN KEY (id_ordine) REFERENCES ordini(id),
	FOREIGN KEY (id_prodotto) REFERENCES prodotti(id)
);


