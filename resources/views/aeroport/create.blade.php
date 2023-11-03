@extends('admin.dashboard')
@section('content')
    @include('sweetalert::alert')
    <div class="col-lg-9">
        <div class="card p-4  rounded-5">
            <div class="row">
                <div class="col-lg-12">
                    <form id="form-create-vehicule-aeroport" class="form-border" method="post" action="{{ route('store') }}" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="de_tab tab_simple">
                            <ul class="de_nav">
                                <li class="active"><span>Véhicule Aeroport</span></li>
                            </ul>
                            <div class="de_tab_content">
                                <div class="tab-1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Nom du véhicule</label>
                                                <input type="text" name="name" id="name" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exterior_color">Couleur extérieure</label>
                                                <input type="text" name="exterior_color" id="exterior_color" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="interior_color">Couleur intérieure</label>
                                                <input type="text" name="interior_color" id="interior_color" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="interior_color">Capacité de passagers</label>
                                                <input type="text" name="capacite_passagers" id="capacite_passagers" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="image_cover">Image Cover</label>
                                                <input type="file" name="image_cover" id="image_cover" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="interior_color">Prix</label>
                                                <input type="text" name="price" id="price" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="disponibilite">Disponibilité</label>
                                                <select name="disponibilite" id="disponibilite" class="form-control">
                                                    <option value="1">Disponible</option>
                                                    <option value="0">Non disponible</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exterior_color">Slug</label>
                                                <input type="text" name="slug" id="slug" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="images">Images</label>
                                        <input type="file" name="images[]" id="images" class="form-control" multiple>
                                    </div>
                                    <div class="form-group">
                                        <label for="communes">Communes</label>
                                        <select name="communes[]" id="communes" class="js-example-basic-multiple js-states form-control" id="id_label_multiple" multiple="multiple">
                                            @foreach($communes as $commune)
                                                <option value="{{ $commune->id }}">{{ $commune->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="submit" id="submit" class="btn-main" value="Ajouter véhicule">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
