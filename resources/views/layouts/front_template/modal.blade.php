<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">ESPACE ADMINISTRATION</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form class="log" action="{{ route('connexion') }}" method="post">

            @csrf
            <h3 class="title">Adresse e-mail</h3>
            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Adresse e-mail">
                
            </div>

            <h3 class="title">Mot de passe</h3>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingInput1" placeholder="Mot de passe">
                
            </div>

            <div class="d-grid gap-2 col-6 mx-auto mt-4">
                <button class="fill-btn-rounded" type="submit">Se connecter</button>
                
            </div>
        </form>
    </div>
</div>
