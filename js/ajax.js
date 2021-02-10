function dajTipFilm()
{
    var xhttp;

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('tipFilm').innerHTML = xhttp.responseText;
        }
    };

    xhttp.open("GET", "db/tipNaFilm.php", true);
    xhttp.send();
}



/*(function() {
    const tipyJS = document.querySelector('.tip');

    const vypisFilm = async () => {
        const cesta = "jsons/filmy.json";
        const data = await fetch(cesta);
        var filmy = await data.json();
        const x = Math.floor(Math.random() * 25) + 1;
        const tipJs = document.createElement('tipFilm')

        console.log(filmy[x].nazov);

        tipJs.innerHTML = `
    
                <div class="card shadow-sm">
                     <div class="uprava2">
                            <div class="cover">
                                 <b>TIP NA FILM</b>
                            </div>
                        <img src="${filmy[x].link}"  width="300" height="400"/>
                    <div class="card-body">
                        <p class="card-text">
                            ${filmy[x].nazov}
                             <br>
                              Hodnotenie:    ${filmy[x].hodnotenie}
                             <br>
                              Žáner : ${filmy[x].zaner}
                        </p>
                    </div>
                    </div>
                    
                    <div class="odsad"
                        <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">${filmy[x].rok}</small>
                        </div>
                    </div>
                </div>
        `;

        tipyJS.appendChild(tipJs);
    };

    vypisFilm();

})();*/



