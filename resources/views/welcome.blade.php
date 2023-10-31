@include('layouts.header')

<!-- {{ Session::get('institution') }} -->
<!-- {{ Session::get('user') }} -->
<!-- {{ Session::get('teacher') }} -->

<h1 class="principal-title">SOAGA</h1>
<div class="carousel">
    <!-- Flickity HTML init -->
    <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true }'>
        <div class="gallery-cell"><img src="{{ asset('img/carrusel-1.jpeg') }}" alt="Imagenes"></div>
        <div class="gallery-cell"><img src="{{ asset('img/carrusel-2.jpeg') }}" alt="Imagenes"></div>
        <div class="gallery-cell"><img src="{{ asset('img/carrusel-3.jpeg') }}" alt="Imagenes"></div>
        <div class="gallery-cell"><img src="{{ asset('img/carrusel-4.jpeg') }}" alt="Imagenes"></div>
    </div>
</div>
<div id="services" class="about-us">
    <h2>¿Qué servicios ofrecemos?</h2>
    <div class="cards-container">
        <div class="card">
            <span class="card-icon">
                <i class="bi bi-journal-bookmark-fill"></i>
            </span>
            <!-- <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar"> -->
            <div class="container">
                <h4><b>Gestion de tu entorno</b></h4>
            </div>
        </div>

        <div class="card">
            <span class="card-icon">
                <i class="bi bi-gear"></i>
            </span>
            <!-- <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar"> -->
            <div class="container">
                <h4><b>Facil administracion de implementos</b></h4>
            </div>
        </div>

        <div class="card">
            <span class="card-icon">
                <i class="bi bi-people-fill"></i>
            </span>
            <!-- <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar"> -->
            <div class="container">
                <h4><b>Control del personal</b></h4>
            </div>
        </div>
    </div>
</div>
<div id="about" class="soaga-info">
    <h2>Sobre Soaga</h2>
    <p>
    SOAGA es un sistema implementado por un grupo de programadores para desarrollar una plataforma 
    que ayude a la gestión del ambiente a instituciones que cuenten con sede física y roles que 
    ayudan en el orden de sus salones, implementos y la coordinación de eventos.
    <br><br>
    Nuestro principal objetivo es desarrollar una plataforma que permita sistematizar la gestión
    de ambientes físicos de una institución, es decir, que facilita la asignación y el control
    de dichos espacios.
    </p>
</div>
<div class="logos">
    <img src="{{ asset('img/sena.png') }}" alt="Logo sena colombia" width="150px" class="logo-sena">
    <img src="{{ asset('img/yermo.png') }}" alt="Logo yermo y parres" class="logo-yermo">
</div>
<div class="creators">
    <h2>Participantes del proyecto</h2>
    <div class="figures-container">
        <figure style="--c:#fff5">
            <img src="{{ asset('img/perfil/edison.jpeg') }}" alt="Foto Edison Orozco">
            <figcaption>Edison orozco</figcaption>
        </figure>
        <figure style="--c:#fff5">
            <img src="{{ asset('img/perfil/sebas.jpg') }}" alt="Foto Sebastian velasquez">
            <figcaption>Sebastian velasquez</figcaption>
        </figure>
        <figure style="--c:#fff5">
            <img src="{{ asset('img/perfil/emanuel.jpeg') }}" alt="Foto emanuel montoya">
            <figcaption>Emanuel montoya</figcaption>
        </figure>
        <figure style="--c:#fff5">
            <img src="{{ asset('img/perfil/kevin.jpg') }}" alt="Foto Kevin ocampo">
            <figcaption>Kevin ocampo</figcaption>
        </figure>
        <figure style="--c:#fff5">
            <img src="{{ asset('img/perfil/isabela.jpg') }}" alt="Foto Isabela toro">
            <figcaption>Isabela toro</figcaption>
        </figure>
    </div>
</div>

@include('layouts.footer')