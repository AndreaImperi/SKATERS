document.addEventListener('DOMContentLoaded', function() {
    var immagini = document.querySelectorAll('.immagine');
    immagini.forEach(function(immagine) {
    var pallinoSinistra = immagine.querySelector('.pallini .sinistra');
    var pallinoDestra = immagine.querySelector('.pallini .destra');
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
    immagine.addEventListener('mouseleave', function(){
        var elemento = document.getElementById("select");
    
        // console.log(elemento.value);
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
        //articolo.querySelector('.messaggio_taglia').style.display = 'none';

        // newbarra.querySelector('.Taglia').display = 'none'; 
    });
    });

    var barre = document.querySelectorAll('.barra');
    for (var i = 0; i < barre.length; i++) {
        barre[i].querySelector('.Bacquista').addEventListener('click', function() {
            // this.nextElementSibling.style.display = 'inline-block';
            this.parentElement.classList.add('clicked');
        }
    );
        
    }

    // Funzione per aprire e chiudere il carrello
    document.getElementById("Bcarrello").onclick = function() {
        if (document.getElementById("carrelloSopra").style.display == "block") {
            document.getElementById("carrelloSopra").style.display = "none";
        } else {
            document.getElementById("carrelloSopra").style.display = "block";
        }
    }

    // Funzione per chiudere il carrello cliccando sull'overlay
    document.getElementById("carrelloSopra").onclick = function(event) {
        if (event.target == this) {
            this.style.display = "none";
        }
    }

    // Funzione per chiudere il carrello
    document.getElementById("Bchiudi-carrello").onclick = function() {
            document.getElementById("carrelloSopra").style.display = "none";
    }

    


    $.get('email.php', function(data) {
        var email = data.email;
        console.log(email);

        const buttons_acquista = document.querySelectorAll('.Bacquista');
        const carrello = document.getElementById('carrelloDentro');
        buttons_acquista.forEach(button => {
            button.addEventListener('click', function() {

                const articolo = button.closest('.articolo');
                const taglia = articolo.querySelector('.Taglia').value;

                if (taglia === "nessuna") {
                    //articolo.querySelector('.messaggio_taglia').style.display = 'block';
                    return;
                }
                //articolo.querySelector('.messaggio_login').style.display = 'none';

                if (email === '') {
                    // La variabile di sessione non è stata inizializzata
                    articolo.querySelector('.messaggio_login').style.display = 'block';
                } else {
                                    
                    const immagine = articolo.querySelector('.default').src;
                    const nome = articolo.querySelector('.nome').innerText;
                    const prezzo = articolo.querySelector('.prezzo').innerText;


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

                        // var totale_cart = document.getElementById("totale");
                        // var new_costo_carrello = Number(totale_cart) + Number(prezzo);

                        // document.getElementById("totale") = new_costo_carrello.toString();

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

    

            


    $.get('email.php', function(data) {
        var email = data.email;
        document.addEventListener('click', function(event) {
            if (event.target.matches('.Brimuovi-articolo')) {
                // This is a click on the Brimuovi-articolo button
                const articoloCarrello = event.target.closest('.articoloCarrello');
                const nome_art = articoloCarrello.querySelector('.nome').innerText;
                articoloCarrello.remove();

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
                const arts=document.querySelectorAll('.articoloCarrello');
                arts.forEach(function(art) {
                    art.remove();
                });

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
            }
        });

    });

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
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var searchButton = document.getElementById("searchInput"); 
    searchButton.addEventListener("click", function() { 
            var ricerca = document.getElementById('barra');
            var valore = ricerca.value.toLowerCase(); // Converto il valore della ricerca in minuscolo per fare una ricerca case-insensitive
            var videoContainers = document.querySelectorAll(".articolo"); // Seleziono tutti gli elementi con la classe "articolo"
            // Itero su tutti i contenitori dei video
            var barra = document.getElementById('finale');
            var novideo = document.getElementById('novideo');
            var min = 0;
            videoContainers.forEach(function(videoContainer) {
                var titoloVideo = videoContainer.querySelector(".nome").textContent.toLowerCase(); // Ottengo il testo del titolo del video e lo converto in minuscolo
                if (titoloVideo.includes(valore)) { // Controllo se il titolo del video contiene la stringa di ricerca
                    videoContainer.style.display = "block"; // Mostro il contenitore del video
                    min = 1;
                } else {
                    videoContainer.style.display = "none"; // Nascondo il contenitore del video se non corrisponde alla ricerca
                    min = 0;
                }
                if (valore === '') min = 1;
                    if (min === 0){
                        novideo.style.display = "block";
                        barra.style.position = "fixed";
                        barra.style.bottom = "0%";
                        barra.style.width = "100%";
                    }else{
                        barra.style.position = "static";
                        novideo.style.display = "none";
                        
                    }
                
        });
    });
});



