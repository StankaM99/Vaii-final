function dajTipFilm()
{
    var xhttp;

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('tipFilm').innerHTML = xhttp.responseText;
        }
    };

    xhttp.open("GET", "db/vyber/tipNaFilm.php", true);
    xhttp.send();
}