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

});