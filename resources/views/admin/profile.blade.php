@extends('admin.dashboard')
@section('content')
    @include('sweetalert::alert')
    <div class="col-lg-9">
        <div class="card p-4  rounded-5">
            <div class="row">
                <div class="col-lg-12">
                    <form id="form-update-profile" class="form-border" method="post" action="{{ route('update-profile') }}">
                        @csrf
                        <div class="de_tab tab_simple">
                            <ul class="de_nav">
                                <li class="active"><span>Profil</span></li>
                            </ul>
                            <div class="de_tab_content">
                                <div class="tab-1">
                                    <div class="row">
                                        <div class="col-lg-6 mb20">
                                            <h5>Nom</h5>
                                            <input type="text" name="name" id="name" class="form-control" value="{{ auth()->user()->name }}" placeholder="Enter name" />
                                        </div>
                                        <div class="col-lg-6 mb20">
                                            <h5>Email</h5>
                                            <input type="text" name="email" id="email" class="form-control" value="{{ auth()->user()->email }}" placeholder="Enter email" />
                                        </div>
                                        <div class="col-lg-6 mb20">
                                            <h5>Téléphone</h5>
                                            <input type="tel" name="phone" id="phone" class="form-control" value="{{ auth()->user()->phone }}" placeholder="Enter phone" />
                                        </div>
                                        <div class="col-lg-6 mb20">
                                            <h5>Nouveau Mot de passe</h5>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="********" />
                                        </div>
                                        <div class="col-lg-6 mb20">
                                            <h5>Re-entrer le Mot de passe</h5>
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="********" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="submit" id="submit" class="btn-main" value="Mettre à jour profil">
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
