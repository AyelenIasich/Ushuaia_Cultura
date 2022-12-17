<section id="murales">
    <div class="container mt-md-5 pt-md-5 mb-5 pb-5">
        <div class="text-center mt-2 mt-md-5 mb-md-5">
            <h1 class="section-title-01 text-center display-4">Murales</h1>
            <h2 class="section-title-02 text-center display-6">Murales</h2>
        </div>

        @include('components.cardMural')
        <div class="row">
            <div class="col mb-2 text-end">
                <a href="{{ route('allmurales') }}">
                    <button type="button" class="btn btn-success btn-lg mb-3">
                        <i class="fa-solid fa-plus"></i> Ver más
                    </button>
                </a>
            </div>
        </div>

    </div>
</section>
