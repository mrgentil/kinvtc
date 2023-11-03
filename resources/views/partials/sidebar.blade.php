<div class="col-lg-3 mb30">
    <div class="card p-4 rounded-5">
        <div class="profile_avatar">
            <div class="profile_img">
                <img src="{{ Voyager::image(auth()->user()->avatar) }}" alt="">
            </div>
            <div class="profile_name">
                <h4>
                    {{ auth()->user()->name }}
                    <span class="profile_username text-gray">{{ auth()->user()->email }}</span>
                </h4>
            </div>
        </div>
        <div class="spacer-20"></div>
        <ul class="menu-col">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i>Accueil Site</a></li>
            <li><a href="{{ route('dashboard') }}" class="active"><i class="fa fa-home"></i>Tableau de bord</a></li>
            <li><a href="{{ route('profile') }}"><i class="fa fa-user"></i>Mon Profil</a></li>
            <li><a href="{{ route('booking') }}"><i class="fa fa-folder-open"></i>Réservations journalières</a></li>
            @if (auth()->user()->hasRole('admin'))
                <li><a href="{{route('create')}}"><i class="fa fa-plane"></i>Ajout Véhicule Aeroport</a></li>
            @endif
            <li><a href=""><i class="fa fa-plane"></i>Transfert Aéroport</a></li>
            @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('Conducteur'))
                <li><a href="{{route('attente-reservations')}}"><i class="fa fa-check-circle"></i>Valider
                        réservation</a></li>
            @endif
            {{--            @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('Conducteur'))--}}
            {{--                <li><a href="{{route('confirme-reservations',['userId' => $user->id])}}"><i class="fa fa-eye-slash"></i>Voir réservations validées</a></li>--}}
            {{--            @endif--}}
            <li>
                <a href="javascript:void(0)"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i>Se déconnecter
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </a>
            </li>

        </ul>
    </div>
</div>

