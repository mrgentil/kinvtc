@extends('admin.dashboard')
@section('content')
    @include('sweetalert::alert')
    <div class="col-lg-9">
        <div class="card p-4 rounded-5 mb25">
            <h4>Réservations confirmées</h4>
            <table class="table de-table">
                <thead>
                <tr>
                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Order ID</span></th>
                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Nom Client</span></th>
                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Téléphone du client</span></th>
                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Email du client</span></th>
                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Véhicule</span></th>
                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Embarquement</span></th>
                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Date début</span></th>
                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Date retour</span></th>
                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Status</span></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($reservationsConfirmees as $reservation)
                    <tr>
                        <td><span class="d-lg-none d-sm-block">Order ID</span>
                            <div class="badge bg-gray-100 text-dark">#{{ $reservation->id }}</div>
                        </td>
                        <td><span class="d-lg-none d-sm-block">Nom Client</span>
                            <span class="bold">{{ $reservation->user->name }}</span>
                        </td>
                        <td><span class="d-lg-none d-sm-block">Téléphone du client</span>
                            <span class="bold">{{ $reservation->user->phone }}</span>
                        </td>
                        <td><span class="d-lg-none d-sm-block">Email du client</span>
                            <span class="bold">{{ $reservation->user->email }}</span>
                        </td>
                        <td><span class="d-lg-none d-sm-block">Vehicule</span>
                            <span class="bold">{{ $reservation->vehicule->name }}</span>
                        </td>
                        <td>{{ $reservation->pickup_location }}</td>
                        <td>{{ \Carbon\Carbon::parse($reservation->pick_up_date)->isoFormat('D MMMM, YYYY') }}</td>
                        <td>{{ \Carbon\Carbon::parse($reservation->collection_date)->isoFormat('D MMMM, YYYY') }}</td>
                        <td>
                            <span class="badge rounded-pill bg-success">{{ $reservation->statut }}</span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
