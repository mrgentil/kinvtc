@extends('admin.dashboard')

@section('content')
    <div class="col-lg-9">
        <div class="row">
            <div class="col-lg-3 col-6 mb25 order-sm-1">
                <div class="card p-4 rounded-5 h-100">
                    <div class="symbol mb40">
                        <i class="fa id-color fa-2x fa-calendar-check-o"></i>
                    </div>
                    <span class="h1 mb0">{{$totalReservations}}</span>
                    <span class="text-gray">Reservations Jour</span>
                </div>
            </div>

            <div class="col-lg-3 col-6 mb25 order-sm-1">
                <div class="card p-4 rounded-5 h-100">
                    <div class="symbol mb40">
                        <i class="fa id-color fa-2x fa-plane"></i>
                    </div>
                    <span class="h1 mb0">12</span>
                    <span class="text-gray">Transfert aeroport</span>
                </div>
            </div>

            <div class="col-lg-3 col-6 mb25 order-sm-1">
                <div class="card p-4 rounded-5 h-100">
                    <div class="symbol mb40">
                        <i class="fa id-color fa-2x fa-calendar"></i>
                    </div>
                    <span class="h1 mb0">58</span>
                    <span class="text-gray">Total Reservations</span>
                </div>
            </div>

            <div class="col-lg-3 col-6 mb25 order-sm-1">
                <div class="card p-4 rounded-5 h-100">
                    <div class="symbol mb40">
                        <i class="fa id-color fa-2x fa-calendar-times-o"></i>
                    </div>
                    <span class="h1 mb0">{{$totalCanceledReservations}}</span>
                    <span class="text-gray">Reservations Annulées</span>
                </div>
            </div>
        </div>

        <div class="card p-4 rounded-5 mb25">
            <h4>Mes Réservations Recente</h4>

            <table class="table de-table">
                <thead>
                <tr>
                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Order ID</span></th>
                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Vehicule</span></th>
                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Embarquement</span></th>
                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Date début</span></th>
                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Date retour</span></th>
                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Status</span></th>
                </tr>
                </thead>
                <tbody>
                @if (Auth::check() && $reservationsall->count() > 0)
                    @foreach ($reservationsall as $reservation)
                        <tr>
                            <td><span class="d-lg-none d-sm-block">Order ID</span><div class="badge bg-gray-100 text-dark">#{{ $reservation->id }}</div></td>
                            <td><span class="d-lg-none d-sm-block">Car Name</span><span class="bold">{{ $reservation->vehicule->name }}</span></td>
                            <td><span class="d-lg-none d-sm-block">Pick Up Location</span>{{ $reservation->pickup_location }}</td>
                            <td><span class="d-lg-none d-sm-block">Pick Up Date</span>{{ \Carbon\Carbon::parse($reservation->pick_up_date)->isoFormat('D MMMM, YYYY') }}</td>
                            <td><span class="d-lg-none d-sm-block">Return Date</span>{{ \Carbon\Carbon::parse($reservation->collection_date)->isoFormat('D MMMM, YYYY') }}</td>
                            <td>
                                @if ($reservation->statut === 'En Attente')
                                    <div class="badge rounded-pill bg-warning">{{ $reservation->statut }}</div>
                                @elseif ($reservation->statut === 'Confirmee')
                                    <div class="badge rounded-pill bg-success">{{ $reservation->statut }}</div>
                                @elseif ($reservation->statut === 'Annulee')
                                    <div class="badge rounded-pill bg-danger">{{ $reservation->statut }}</div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    {{-- Affichez la pagination --}}
                    {{ $reservationsall->links() }}
                @else
                    <tr>
                        <td colspan="6">Il n'y a aucune réservation.</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <div class="card p-4 rounded-5">
            <h4>Mes Favories</h4>
            <div class="spacer-10"></div>
            @foreach ($frequentlyReservedVehicles as $vehicle)
                <div class="de-item-list no-border mb30">
                    <div class="d-img">
                        <img src="{{ Voyager::image($vehicle->vehicule->image_cover ) }}" class="img-fluid" alt="{{ $vehicle->vehicule->name }}">
                    </div>
                    <div class="d-info">
                        <div class="d-text">
                            <h4>{{ $vehicle->vehicule->name }}</h4>
                            <div class="d-atr-group">
                                <ul class="d-atr">
                                    <li><span>Places:</span>{{ $vehicle->vehicule->capacite_passagers }}</li>
                                    <li><span>Volant:</span>{{ $vehicle->vehicule->doors }}</li>
                                    <li><span>Drive:</span>{{ $vehicle->vehicule->drive }}</li>
                                    <li><span>Type:</span>{{ $vehicle->vehicule->type->name }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="d-price">
                        Tarif <span>${{ $vehicle->vehicule->type->price_journalier }}</span>
                        <a class="btn-main" href="{{ route('vehicules.show', ['id' => $vehicle->vehicule->id]) }}">Rent Now</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
