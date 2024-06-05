document.addEventListener('DOMContentLoaded', function() {

    var immagini = document.querySelectorAll('.immagine');
    immagini.forEach(function(immagine) {
        var pallinoSinistra = immagine.querySelector('.pallini .sinistra');
        var pallinoDestra = immagine.querySelector('.pallini .destra');

        // Per visualizzare un'immagine diversa in base alla posizione del mouse e gestire i pallini
        immagine.addEventListener('mousemove', function(event) {
            var x = event.clientX - immagine.getBoundingClientRect().left;
            if(x < immagine.offsetWidth / 2){
                immagine.querySelector('.default').style.display = 'none';
                immagine.querySelector('.destra').style.display = 'none';
                immagine.querySelector('.sinistra').style.display = 'block';
                pallinoSinistra.classList.add('active');
                pallinoDestra.classList.remove('active');
            } else {
                immagine.querySelector('.default').style.display = 'none';
                immagine.querySelector('.sinistra').style.display = 'none';
                immagine.querySelector('.destra').style.display = 'block';
                pallinoDestra.classList.add('active');
                pallinoSinistra.classList.remove('active');
            }
        });
        
        // Per tornare alla normalità quando il mouse lascia l'immagine
        immagine.addEventListener('mouseleave', function(){
            var elemento = document.getElementById("select");
            immagine.querySelector('.sinistra').style.display = 'none';
            immagine.querySelector('.destra').style.display = 'none';
            immagine.querySelector('.default').style.display = 'block';
            immagine.querySelector('.barra').querySelector('.Taglia').value="nessuna";
            pallinoSinistra.classList.remove('active');
            pallinoDestra.classList.remove('active');
            var newbarra = immagine.querySelector('.barra');
            newbarra.classList.remove('clicked');

            const articolo = immagine.closest('.articolo');
            articolo.querySelector('.messaggio_login').style.display = 'none';
        });
    });

    // Gestione della barra di ogni articolo dopo il click acquista
    var barre = document.querySelectorAll('.barra');
    for (var i = 0; i < barre.length; i++) {
        barre[i].querySelector('.Bacquista').addEventListener('click', function() {
            this.parentElement.classList.add('clicked');
        });
    }

    // Per aprire e chiudere il carrello
    document.getElementById("Bcarrello").onclick = function() {
        if (document.getElementById("carrelloSopra").style.display == "block") {
            document.getElementById("carrelloSopra").style.display = "none";
        } else {
            document.getElementById("carrelloSopra").style.display = "block";
        }
    }

    // Per chiudere il carrello cliccando sull'overlay
    document.getElementById("carrelloSopra").onclick = function(event) {
        if (event.target == this) {
            this.style.display = "none";
        }
    }

    // Per chiudere il carrello con bottone
    document.getElementById("Bchiudi-carrello").onclick = function() {
            document.getElementById("carrelloSopra").style.display = "none";
    }

    // Eseguo una richiesta GET al file email.php usando JQuery
    // la funzione di callback carica gli articoli nel carrello con le relative informazioni e aggiornare il totale
    $.get('email.php', function(data) {
        var email = data.email;

        const buttons_acquista = document.querySelectorAll('.Bacquista');
        const carrello = document.getElementById('carrelloDentro');
        buttons_acquista.forEach(button => {
            button.addEventListener('click', function() {

                const articolo = button.closest('.articolo');
                const taglia = articolo.querySelector('.Taglia').value;

                if (taglia === "nessuna") {
                    return;
                }

                if (email === '') {
                    articolo.querySelector('.messaggio_login').style.display = 'block';
                } else {
                                    
                    const immagine = articolo.querySelector('.default').src;
                    const nome = articolo.querySelector('.nome').innerText;
                    const prezzo = articolo.querySelector('.prezzo').innerText;

                    // Per l'inserimento vero e proprio eseguo una richiesta POST al file inserimento.php usando JQuery 
                    $.post("inserimento.php", { nome: nome, img: immagine, taglia: taglia, prezzo: prezzo, email: email}, function(data) {
                        console.log(data);
                        if (data.errore) {
                            console.log(data.errore);
                        } else {
                            console.log('Inserimento avvenuto con successo');
                        }
                    });

                    const articoliCarrello = carrello.querySelectorAll('.articoloCarrello .nome');

                    let articoloTrovato = false;

                    for (const articolo of articoliCarrello) {
                        if (articolo.innerText === nome) {
                            articoloTrovato = true;
                            break;
                        }
                    }

                    if (!articoloTrovato) {
                        const articoloCarrello = document.createElement('div');
                        articoloCarrello.classList.add('articoloCarrello');

                        articoloCarrello.innerHTML = `
                            <img src="${immagine}">

                            <div class="dettagli" style="display: flex; flex-direction: column;">
                                <div class="nome">${nome}</div>
                                <div><span>€</span><span class="prezzo">${prezzo}</span></div>
                                <div class="taglia">Taglia: ${taglia}</div>
                                <button class="Brimuovi-articolo">.</button>
                            </div>
                        `;

                        const termineCarrello = document.getElementById("termine_carrello");
                        carrello.insertBefore(articoloCarrello, termineCarrello);
                        var totale = document.getElementById("totale");
                        var valoreAttuale = parseFloat(totale.textContent);
                        var valoreArticolo = parseFloat(prezzo);
                        var nuovoTotale = valoreAttuale + valoreArticolo;
                        totale.textContent = nuovoTotale.toString();
                    }
                }
            });
        });
    });

    // Eseguo una richiesta GET al file email.php usando JQuery
    // La funzione di callback si occupa di rimuovere gli articoli dal carrello e aggiornare il totale
    $.get('email.php', function(data) {
        var email = data.email;
        document.addEventListener('click', function(event) {
            if (event.target.matches('.Brimuovi-articolo')) {
                const articoloCarrello = event.target.closest('.articoloCarrello');
                const nome_art = articoloCarrello.querySelector('.nome').innerText;
                articoloCarrello.remove();

                // La rimozione viene fatta una richiesta POST a rimozione.php specificando l'attributo "rimuovi"
                $.post("rimozione.php", { task: "rimuovi", nome: nome_art,email: email}, function(data) {
                    console.log(data);
                    if (data.errore) {
                        console.log(data.errore);
                    } else {
                        console.log('Inserimento avvenuto con successo');
                    }
                });

                const prezzo = articoloCarrello.querySelector('.prezzo').innerText;
                var totale = document.getElementById("totale");
                var valoreAttuale = parseFloat(totale.textContent);
                var valoreArticolo = parseFloat(prezzo);
                var nuovoTotale = valoreAttuale - valoreArticolo;
                totale.textContent = nuovoTotale.toString();

            } else if (event.target.matches('.Bsvuota_carrello')) {
                const alert=document.getElementById("alert");
                alert.style.display="block";
            }
        });

        // Conferma svuota carrello
        var conferma_svuota = document.getElementById("svuota_conferma"); 
        conferma_svuota.addEventListener("click", function() { 
            const arts=document.querySelectorAll('.articoloCarrello');
            arts.forEach(function(art) {
                art.remove();
            });
    
            // La rimozione di tutti gli articoli viene fatta una richiesta POST a rimozione.php specificando l'attributo "svuota"
            $.post("rimozione.php", { task: "svuota", email: email}, function(data) {
                console.log(data);
                if (data.errore) {
                    console.log(data.errore);
                } else {
                    console.log('Inserimento avvenuto con successo');
                }
            });
    
            var totale = document.getElementById("totale");
            totale.textContent = "0";

            const alert=document.getElementById("alert");
            alert.style.display="none";
        });
    });

    // Chiusura alert svuota carrello
    document.getElementById("annulla_svuotamento").onclick = function() {
        const alert=document.getElementById("alert");
        alert.style.display="none";
    }

    // Per la gestione delle scritte delle categorie
    var selectCategorie = document.getElementById("select_categorie");
    selectCategorie.addEventListener("change", function() {
        var valoreSelezionato = selectCategorie.value;
        var elementi_ruota = document.querySelectorAll(".ruota");
        var elementi_truck = document.querySelectorAll(".truck");
        var elementi_deck = document.querySelectorAll(".deck");
        var etichetta_shop = document.getElementById("etichetta_shop");

        if (valoreSelezionato=="nessuna") {
            for (var i = 0; i < elementi_ruota.length; i++) {
                elementi_ruota[i].style.display = "block";
            }
            for (var j = 0; j < elementi_truck.length; j++) {
                elementi_truck[j].style.display = "block";
            }
            for (var h = 0; h < elementi_deck.length; h++) {
                elementi_deck[h].style.display = "block";
            }

            etichetta_shop.innerText = "";
        } else if (valoreSelezionato=="decks") {
            for (var h = 0; h < elementi_deck.length; h++) {
                elementi_deck[h].style.display = "block";
            }
            for (var i = 0; i < elementi_ruota.length; i++) {
                elementi_ruota[i].style.display = "none";
            }
            for (var j = 0; j < elementi_truck.length; j++) {
                elementi_truck[j].style.display = "none";
            }

            etichetta_shop.innerText = "Tavole";
        } else if (valoreSelezionato=="ruote") {
            for (var i = 0; i < elementi_ruota.length; i++) {
                elementi_ruota[i].style.display = "block";
            }
            for (var i = 0; i < elementi_deck.length; i++) {
                elementi_deck[i].style.display = "none";
            }
            for (var j = 0; j < elementi_truck.length; j++) {
                elementi_truck[j].style.display = "none";
            }

            etichetta_shop.innerText = "Ruote";
        } else if (valoreSelezionato=="trucks") {
            for (var j = 0; j < elementi_truck.length; j++) {
                elementi_truck[j].style.display = "block";
            }
            for (var i = 0; i < elementi_ruota.length; i++) {
                elementi_ruota[i].style.display = "none";
            }
            for (var j = 0; j < elementi_deck.length; j++) {
                elementi_deck[j].style.display = "none";
            }

            etichetta_shop.innerText = "Trucks";
        } 
        aggiusta_barra();
    });

    // Per la ricerca degli articoli 
    var searchButton = document.getElementById("searchInput"); 
    searchButton.addEventListener("click", function() { 
        var valoreSelezionato = selectCategorie.value;
        if (valoreSelezionato=="nessuna") {
            var artContainers = document.querySelectorAll(".articolo");
        } else if (valoreSelezionato=="decks") {
            var artContainers = document.querySelectorAll(".deck");
        } else if (valoreSelezionato=="ruote") {
            var artContainers =  document.querySelectorAll(".ruota");
        } else if (valoreSelezionato=="trucks") {
            var artContainers = document.querySelectorAll(".truck");
        } 

        var ricerca = document.getElementById('barra');
        var valore = ricerca.value.toLowerCase();
        artContainers.forEach(function(artContainer) {
            var titoloart = artContainer.querySelector(".nome").textContent.toLowerCase(); 
            if (titoloart.includes(valore)) { 
                artContainer.style.display = "block";
            } else {
                artContainer.style.display = "none";
            }
        });
        ricerca.value="";
        aggiusta_barra();
    });

    // Funzione per la gestione della barra finale in base agli articoli presenti
    function aggiusta_barra() {
        var artContainers = document.querySelectorAll(".articolo");
        var barra = document.getElementById('finale');
        var noart =document.getElementById('noart');
        var larghezza_pagina = document.documentElement.clientWidth;
        var num = 0;

        for (const artC of artContainers) {
            if (artC.style.display === "block") {
                num += 1;
            }
        }

        if (num === 0){
            noart.style.display = "block";
            barra.style.position = "fixed";
            barra.style.bottom = "0%";
            barra.style.width = "100%";
        }else{
            if (larghezza_pagina<735){
                n_vid_m = 3;
            } else if (larghezza_pagina<1070){
                n_vid_m = 7;
            } else {
                n_vid_m = 0;
            }
            if (num >= n_vid_m) {
                barra.style.position = "static";
            } else {
                barra.style.position = "absolute";
            }
            barra.style.bottom = "0%";
            barra.style.width = "100%";
            noart.style.display = "none";
        }
    }
});