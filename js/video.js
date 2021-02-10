
if( document.readyState !== 'loading' ) {
    console.log( 'document is already ready, just execute code here' );
    myInitCode();
} else {
    document.addEventListener("DOMContentLoaded", () => {
        myInitCode();
    });
}

function myInitCode() {
    var images = document.querySelectorAll("img");

    images.forEach(image=>{
        image.addEventListener("click", showTrailer);
    });

    var close = document.querySelector(".modal button");

    close.addEventListener("click", closeTrailer);
}

function showTrailer(event)
{
    var link = event.currentTarget.getAttribute("data-link");
    var nazov = event.currentTarget.getAttribute("data-name");

    var modal = document.querySelector(".modal");

    modal.classList.add("show");
    modal.style.display = "block";

    var video = modal.querySelector(".modal-body iframe");

    video.setAttribute("src",link);

    var div = document.createElement("div");
    div.setAttribute("class", "modal-backdrop fade show");

    document.body.appendChild(div);

    document.querySelector(".modal-title").innerHTML = "Trailer na film: " + nazov;
}

function closeTrailer(event)
{
    document.querySelector(".modal-backdrop").remove();

    var modal = document.querySelector(".modal");

    modal.classList.remove("show");
    modal.style.display = "none";
}