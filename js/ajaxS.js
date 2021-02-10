function dajTipSerial()
{
    var xhttp;

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('tipSerial').innerHTML = xhttp.responseText;
        }
    };

    xhttp.open("GET", "db/tipNaSerial.php", true);
    xhttp.send();
}



/*(function() {
    const tipy2JS = document.querySelector('.tip2');

    const vypisSerial = async () => {
        const cesta2 = "jsons/serial.json";
        const data2 = await fetch(cesta2);
        var serial = await data2.json();
        const x = Math.floor(Math.random() * 10) + 1;
        const tip2Js = document.createElement('tipSeial')

        console.log(serial[x].nazov);

        tip2Js.innerHTML = `
    
            <div class="card shadow-sm">
                <div class="uprava2">
                    <div class="cover">
                        <b>TIP NA SERIAL</b>
                    </div>
                <img src="${serial[x].link}"  width="300" height="400"/>
                    <div class="card-body">
                        <p class="card-text">
                            ${serial[x].nazov}
                             <br>
                              Hodnotenie:    ${serial[x].hodnotenie}
                             <br>
                                Žáner : ${serial[x].zaner}
                        </p>
                    </div>
                </div>
                
                <div class="odsad"
                        <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">${serial[x].nazov}</small>
                        </div>
                    </div>
            </div>
        `;

        tipy2JS.appendChild(tip2Js);
    };

    vypisSerial();

})();*/

