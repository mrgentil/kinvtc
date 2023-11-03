@extends('layouts.main')

@section('content')
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>
        <section id="section-hero" aria-label="section" class="jarallax">
            <img src="images/slider/4.jpg" class="jarallax-img" alt="">
            <div class="v-center">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-4 offset-lg-4">
                            <div class="padding40 rounded-3 shadow-soft" data-bgcolor="#ffffff">
                                <h4>Connexion</h4>
                                <div class="spacer-10"></div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <!-- Champs de réservation -->
                                    <div class="field-set mb-3">
                                        <input type="email" name="email" id="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               value="{{ old('email') }}" placeholder="Entrer e-mail" required
                                               autocomplete="email" autofocus/>

                                        @error('email')
                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="field-set mb-3">
                                        <input type="password" name="password" id="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               placeholder="************" required
                                               autocomplete="current-password"/>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div id="submit" class="mb-3">
                                        <button type="submit" class="btn-main btn-fullwidth rounded-3">Se connecter
                                        </button>
                                    </div>
                                </form>
                                Vous n'avez pas de compte ? <a href="{{route('register')}}">Inscrivez-vous
                                    maintenant.</a>
                                <div class="title-line">KinVTC</div>
                                Notre Avis de <a href="donnee_personnelle.php">confidentialité</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
