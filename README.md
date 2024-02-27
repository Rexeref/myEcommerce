# E-commerce di Mobili - Progetto Scolastico

Progettino Scolastico Completo

## Descrizione

Il progetto è un'applicazione web che offre funzionalità di e-commerce per la vendita di mobili. È sviluppato utilizzando il framework CodeIgniter 4, seguendo il modello architetturale MVC (Model-View-Controller).

## Avvio
1. Installare e configurare PHP, un server MySQL e Composer
2. Attivare i seguenti package nel file php.ini
```
;extension=intl
;extension=zip
```
3. Scaricare le dipendenze
```
composer install
composer update
```
4. Creare una copia del file **env-dummy** con il nome **.env** dove si configurerà l'accesso al DB MySQL
5. Utilizzare i file in *./app/Database/Migrations/* per creare un database di esempio o uno vuoto
6. Avviare con il seguente comando il server 
```
php spark serve
```

Il server si avvierà su *http://localhost:8080*