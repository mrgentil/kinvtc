@extends('admin.dashboard')
@section('content')
    @include('sweetalert::alert')
    <div class="col-lg-9">
        <div class="card p-4 rounded-5 mb25">
            <h4>Réservations planifiées</h4>
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
                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Action</span></th>
                </tr>
                </thead>
                <tbody>
                @if (Auth::check())
                    @foreach ($reservationsEnAttente as $reservation)
                        <tr>
                            <td><span class="d-lg-none d-sm-block">Order ID</span>
                                <div class="badge bg-gray-100 text-dark">#{{ $reservation->id }}</div>
                            </td>
                            <td><span class="d-lg-none d-sm-block">Nom Client</span><span
                                    class="bold">{{ $reservation->user->name }}</span></td>
                            <td><span class="d-lg-none d-sm-block">Téléphone</span><span
                                    class="bold">{{ $reservation->user->phone }}</span></td>
                            <td><span class="d-lg-none d-sm-block">Email</span><span
                                    class="bold">{{ $reservation->user->email }}</span></td>
                            <td><span class="d-lg-none d-sm-block">Vehicule</span><span
                                    class="bold">{{ $reservation->vehicule->name }}</span></td>


                            <td>{{ $reservation->pickup_location }}</td>
                            <td>{{ \Carbon\Carbon::parse($reservation->pick_up_date)->isoFormat('D MMMM, YYYY') }}</td>
                            <td>{{ \Carbon\Carbon::parse($reservation->collection_date)->isoFormat('D MMMM, YYYY') }}</td>
                            <td>
                            <span class="badge rounded-pill
                                @if ($reservation->statut === 'En Attente') bg-warning
                                @elseif ($reservation->statut === 'Confirmée') bg-success
                                @else bg-danger @endif">
                                {{ $reservation->statut }}
                            </span>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('valider-reservations', ['reservation' => $reservation->id]) }}">
                                    @csrf
                                    <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
                                    <button type="submit" class="btn btn-success">Valider</button>
                                </form>
                            </td>


                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="10">Aucune réservation en attente n'a été trouvée.</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
