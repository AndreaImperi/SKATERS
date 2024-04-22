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
    
        console.log(elemento.value);
        immagine.querySelector('.sinistra').style.display = 'none';
        immagine.querySelector('.destra').style.display = 'none';
        immagine.querySelector('.default').style.display = 'block';
        immagine.querySelector('.barra').querySelector('.Taglia').value="nessuna";
        pallinoSinistra.classList.remove('active');
        pallinoDestra.classList.remove('active');
        var newbarra = immagine.querySelector('.barra');
        newbarra.classList.remove('clicked');

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

    const buttons_rimuovi = document.querySelectorAll('.Brimuovi-articolo');
    buttons_rimuovi.forEach(button => {
        button.addEventListener('click', function() {
            const articoloCarrello = button.closest('.articoloCarrello');
            articoloCarrello.remove();
        });
    });

    const prezzo_carrello = "0";
    const buttons_acquista = document.querySelectorAll('.Bacquista');
    const carrello = document.getElementById('carrelloDentro');
    buttons_acquista.forEach(button => {
        button.addEventListener('click', function() {
            const articolo = button.closest('.articolo');
            const immagine = articolo.querySelector('.default').src;
            const nome = articolo.querySelector('.nome').innerText;
            const prezzo = articolo.querySelector('.prezzo').innerText;
            const taglia = articolo.querySelector('.Taglia').value;

            if (taglia == "nessuna") {
                return;
            }

            const articoloCarrello = document.createElement('div');
            articoloCarrello.classList.add('articoloCarrello');

            articoloCarrello.innerHTML = `
                <img src="${immagine}">

                <div class="dettagli" style="display: flex; flex-direction: column;">
                    <div class="nome">${nome}</div>
                    <div class="prezzo">${prezzo}</div>
                    <div class="taglia">Taglia: ${taglia}</div>
                    <button class="Brimuovi-articolo">.</button>
                </div>
            `;

            const termineCarrello = document.getElementById('termine_carrello');
            carrello.insertBefore(articoloCarrello, termineCarrello);

            // const new_costo_carrello = Number(prezzo_carrello) + Number(prezzo);

            // document.getElementById('totale').innerText = new_costo_carrello.toString();
            // prezzo_carrello = document.getElementById('totale').innerText;


        });
    });

    document.addEventListener('click', function(event) {
        if (event.target.matches('.Brimuovi-articolo')) {
            // This is a click on the Brimuovi-articolo button
            const articoloCarrello = event.target.closest('.articoloCarrello');
            articoloCarrello.remove();
        } else if (event.target.matches('.Bsvuota_carrello')) {
            const arts=document.querySelectorAll('.articoloCarrello');
            arts.forEach(function(art) {
                art.remove();
            });
        }
    });

});