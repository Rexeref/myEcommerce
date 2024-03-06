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
extension=fileinfo
extension=gd
```
3. Aggiungere le seguenti direttive custom nel php.ini
```
upload_max_filesize = 16M
post_max_size = 16M
```
4. Scaricare le dipendenze
```
composer install
composer update
```
5. Creare una copia del file **env-dummy** con il nome **.env** dove si configurerà l'accesso al DB MySQL
6. Utilizzare i file in *./app/Database/Migrations/* per creare un database di esempio o uno vuoto
7. Avviare con il seguente comando il server 
```
php spark serve
```

Il server si avvierà su *http://localhost:8080*

Se si utilizza il db di esempio gli utenti di base sono Admin, Seller e User, i quali avranno come password il loro stesso nome