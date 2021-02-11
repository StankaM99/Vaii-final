function dajTipSerial()
{
    var xhttp;

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('tipSerial').innerHTML = xhttp.responseText;
        }
    };

    xhttp.open("GET", "db/vyber/tipNaSerial.php", true);
    xhttp.send();
}