La cartella di SKATERSS è suddivisa da più sottocartelle e, tranne per quella bootstrap e per quella delle immagini, la struttura di ogni sottocartella è: file PHP, file JavaScript e file CSS.

-In "accesso" si ha il form per accedere al proprio account attraverso l'inserimento di email e password: nel file PHP è contenuto il codice che permette al sito di collegarsi al database e verificare le credenziali; file JavaScript vi è esclusivamente il collegamento alla pagina registrazione; nel file CSS lo stile della pagina.

-In "registrazione" si ha il form per registrare il proprio account al sito inserendo le proprie credenziali: nel file PHP è contenunto il codice per il controllo del form  e per il salvataggio nel database di tutte le informazioni; nel file JavaScript sono presenti le funzioni per il controllo, la visualizzazione della password e la funzione che permette il movimento di alune immagini all'interno della pagina; nel file CSS lo stile della pagina.

-In "shop" si ha lo store del sito, con la visualizzazione dei vari prodotti disponibili e del proprio carrello: nel file PHP è contetnuto il codie che permette di caricare dinamicamente dal database i vari prodotti dello shop e del carrello; oltre a shop.php vi sono altre 3 pagine PHP: 
> email.php, ad ogni richiesta restituisce l'utente loggato, 
> inserimento.php, gestisce l'inserimento degli articoli nella tabella del database relativa al carrello,
> rimozione.php, gestisce la rimozione e lo svuotamento degli articoli dalla tabella del database relativa al carrello; 
nel file JavaScript sono presenti le funzioni che permettono:
> di interagire con i prodotti dello shop,( scorrimento immagini in base alla posizione del mouse, comparsa e scomparsa della sezione per acquistare e selezionare la taglia),
> di aggiungere e rimuovere elementi dal carrello con l'ausilio di funzioni asincrone,
> di calcolare il costo totale del carrello dinamicamente,
> di filtrare i prodotti dello shop in base a categoria e nome;
nel file CSS lo stile della pagina.

-In "videos" si hanno tutti i video presenti nel sito: nel file PHP  è contetnuto il codie che permette di caricare dinamicamente dal database i vari video; nel file JavaScript sono presenti le funzioni che permettono di ricercare i video tramite tastiera o di filtrarli tramite le categorie e funzioni per la gestione della pagina a seconda della ricerca effettuata dall'utente.

Direttamente nella cartella si ha la pagina index.php dove risiede la homepage con il carosello introduttivo, con le anteprime delle altre pagine e le mappe caricate da MyMaps. Nel suo file JavaScript vi sono varie funzioni: 
> per a collegare le varie pagine del sito, 
> per il funzionamento dello scroll sulle mappe,
> per alternare le mappe,
> per gestire la sezione "facci una domanda" insieme all'alert,
> per gestire la visualizzazione o meno dell'immagine utente con il proprio nome in caso di login effettuato.
Infine logout.php si occupa di gestire le richieste per eseguire il logout; style.css per lo stile della pagina.