<footer id="footer">
    <div class="container-fluid">
        <div class="row row-xl-3 pb-4">
            <div class="col-12 col-md-4">
                <div class="row ps-md-4">
                    <div class="col-12 title pb-2 text-center ">
                        <a class="navbar-brand" href="#">
                            <span class="ushuaia d-inline-block display-6 ">USHUAIA</span>
                            <span class="cultura d-inline-block display-6 cultura-footer">Cultura</span>
                        </a>

                    </div>
                    <div class="col text-center mt-4 ">
                        <img src=" {{ asset('otros\logito.png') }}"width="250" height="90" alt="logo">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 pt-5 pt-md-0">
                <div class="row  text-center">
                    <div class="col-12 title pb-2 text-center ">
                        <h3 class="">Links</h3>
                    </div>
                    <div class="col-12 footer-links p-0 text-center">
                        <ul class="p-0">
                            <li><a href="{{ url('/' . '#main') }}">Home</a></li>
                            <li><a href="{{ url('/' . '#artistas') }}">Artistas</a></li>
                            <li><a href="{{ url('/' . '#eventos') }}">Eventos</a></li>
                            <li><a href="#">Mapa</a></li>
                            <li><a href="#">Contacto</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 pt-5 pt-md-0">
                <div class="row ">
                    <div class="col-12 title pb-3  text-center">
                        <h3 id="contacto" class="h4">¿Quieres contactarnos?</h3>
                    </div>
                    <div class="col-12  pb-4 text-center">
                        <div class="media-icons d-xl-inline-block">
                            <a class="navbar-brand pe-4 redes-icons footer-text"
                                href="https://ar.linkedin.com/in/ayeiasich"><i
                                    class="display-6 fa-brands fa-linkedin"></i></a>
                            <a class="navbar-brand ps-3 pe-4 redes-icons"
                                href="https://ayeleniasichmyportfolio.web.app/"><img class="footer-web"
                                    src=" {{ asset('otros\web2.svg') }}" alt="" width="45"
                                    height="45" /></a>

                            <a class="navbar-brand ps-4 redes-icons footer-text correo-artista" data-bs-toggle="popover"
                                data-bs-title="Correo" data-bs-content="ayeleniasich@gmail.com"
                                data-bs-placement="bottom"><i class="fa-regular fa-envelope display-6 "></i></a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="row pb-3 pt-4 align-items-center">
            <div class="col-12 text-center footer-text">
                <a tabindex="0" data-bs-placement="top" role="button" data-bs-toggle="popover"
                    data-bs-trigger="focus" data-bs-title="Agradecimientos"
                    data-bs-content="Agradecimientos a Local Guides @FaridTDF por las fotos obtenidas de su blog.">Agradecimientos</a>
            </div>
        </div>
    </div>
</footer>
