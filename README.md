
📌 Descrizione del Progetto
Presto è una piattaforma web sviluppata in Laravel che consente agli utenti di pubblicare, visualizzare e gestire annunci in modo semplice e intuitivo. Il progetto implementa funzionalità avanzate per garantire un'esperienza utente fluida sia per chi pubblica che per chi naviga alla ricerca di buoni affari.

✨ Funzionalità Principali
Gestione Annunci

Creazione di annunci con titolo, prezzo e descrizione.

Inserimento multiplo di immagini con anteprima e rimozione singola.

Visualizzazione dettagliata dell'annuncio, incluse immagini e categoria.

Categorie predefinite (minimo 10), gestite tramite relazioni 1:N.

Sistema di conferma visiva dopo l’inserimento.

Autenticazione e Autorizzazione

Login e registrazione utenti.

Solo utenti autenticati possono inserire annunci.

Redirect automatico al form di inserimento post-login.

Sistema di Revisione

Possibilità per gli utenti di candidarsi come revisori tramite form dedicato.

Dashboard privata per revisori con lista degli annunci da moderare (uno alla volta, dal più recente).

Bottoni per accettare o rifiutare ogni annuncio.

Possibilità di annullare l'ultima operazione effettuata.

Navigazione e Ricerca

Homepage con ultimi 4-6 annunci.

Pagina di ricerca con filtro per titolo, descrizione e categoria.

Elenco ordinato (dal più recente al più vecchio) e accessibile anche per categoria.

Internazionalizzazione

Supporto multilingua (IT/EN) tramite selezione con bandiere.

Gestione Immagini

Censura automatica dei volti (privacy).

Aggiunta automatica di watermark.

Crop automatico e omogeneizzazione delle dimensioni (e.g. 300x300).

Analisi AI con Google Vision API per etichettatura contenuti.

🧰 Tecnologie Utilizzate
Laravel (backend)

Laravel File Storage per la gestione dei file multimediali

Google Vision API per il riconoscimento automatico immagini

Spatie Image Manipulations per watermark e resize

Blade Templates per il frontend

Relazioni Eloquent (1:N) tra Utenti, Categorie e Annunci

🧪 Come Contribuire
Clona il repository: git clone ...

Installa le dipendenze: composer install && npm install

Crea il file .env e configura il DB

Avvia il server: php artisan serve

(Opzionale) Configura la Vision API con google_credential.json (inserito nel .gitignore)

