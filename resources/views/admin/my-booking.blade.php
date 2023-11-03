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
                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Véhicule</span></th>
                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Embarquement</span></th>
                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Date début</span></th>
                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Date retour</span></th>
                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Status</span></th>
                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Action</span></th>
                    <!-- Colonne "Action" -->
                </tr>
                </thead>
                <tbody>
                @if (Auth::check())
                    @foreach ($paginatedReservationsEnAttente as $reservation)
                        <tr>
                            <td><span class="d-lg-none d-sm-block">Order ID</span>
                                <div class="badge bg-gray-100 text-dark">#{{ $reservation->id }}</div>
                            </td>
                            <td><span class="d-lg-none d-sm-block">Car Name</span><span
                                    class="bold">{{ $reservation->vehicule->name }}</span></td>
                            <td><span
                                    class="d-lg-none d-sm-block">Pick Up Location</span>{{ $reservation->pickup_location }}
                            </td>
                            <td><span
                                    class="d-lg-none d-sm-block">Pick Up Date</span>{{ \Carbon\Carbon::parse($reservation->pick_up_date)->isoFormat('D MMMM, YYYY') }}
                            </td>
                            <td><span
                                    class="d-lg-none d-sm-block">Return Date</span>{{ \Carbon\Carbon::parse($reservation->collection_date)->isoFormat('D MMMM, YYYY') }}
                            </td>
                            <td>
                                <div class="badge rounded-pill bg-warning">{{ $reservation->statut }}</div>
                            </td>
                            <td> <!-- Colonne "Action" -->
                                <form method="POST"
                                      action="{{ route('annuler-reservation', ['reservation' => $reservation->id]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Annuler</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    {{-- Affichez la pagination --}}
                    {{ $paginatedReservationsEnAttente->links() }}
                @else
                    <tr>
                        <td colspan="7">Aucune réservation en attente n'a été trouvée.</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>

        <div class="card p-4 rounded-5 mb25">
            <h4>Reservations complétées</h4>

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
                @if (Auth::check() && $paginatedReservationsConfirmees->count() > 0)
                    @foreach ($paginatedReservationsConfirmees as $reservation)
                        <tr>
                            <td><span class="d-lg-none d-sm-block">Order ID</span>
                                <div class="badge bg-gray-100 text-dark">#{{ $reservation->id }}</div>
                            </td>
                            <td><span class="d-lg-none d-sm-block">Car Name</span><span
                                    class="bold">{{ $reservation->vehicule->name }}</span></td>
                            <td><span
                                    class="d-lg-none d-sm-block">Pick Up Location</span>{{ $reservation->pickup_location }}
                            </td>
                            <td><span
                                    class="d-lg-none d-sm-block">Pick Up Date</span>{{ \Carbon\Carbon::parse($reservation->pick_up_date)->isoFormat('D MMMM, YYYY') }}
                            </td>
                            <td><span
                                    class="d-lg-none d-sm-block">Return Date</span>{{ \Carbon\Carbon::parse($reservation->collection_date)->isoFormat('D MMMM, YYYY') }}
                            </td>
                            <td>
                                <div class="badge rounded-pill bg-success">{{ $reservation->statut }}</div>
                            </td>
                        </tr>
                    @endforeach
                    {{-- Affichez la pagination --}}
                    {{ $paginatedReservationsConfirmees->links() }}
                @else
                    <tr>
                        <td colspan="6">Il n'y a aucune réservation.</td>
                    </tr>
                @endif
                </tbody>
            </table>

        </div>

        <div class="card p-4 rounded-5 mb25">
            <h4>Réservations Annulées</h4>

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
                @if (Auth::check() && $paginatedReservationsAnnulee->count() > 0)
                    @foreach ($paginatedReservationsAnnulee as $reservation)
                        <tr>
                            <td><span class="d-lg-none d-sm-block">Order ID</span>
                                <div class="badge bg-gray-100 text-dark">#{{ $reservation->id }}</div>
                            </td>
                            <td><span class="d-lg-none d-sm-block">Car Name</span><span
                                    class="bold">{{ $reservation->vehicule->name }}</span></td>
                            <td><span
                                    class="d-lg-none d-sm-block">Pick Up Location</span>{{ $reservation->pickup_location }}
                            </td>
                            <td><span
                                    class="d-lg-none d-sm-block">Pick Up Date</span>{{ \Carbon\Carbon::parse($reservation->pick_up_date)->isoFormat('D MMMM, YYYY') }}
                            </td>
                            <td><span
                                    class="d-lg-none d-sm-block">Return Date</span>{{ \Carbon\Carbon::parse($reservation->collection_date)->isoFormat('D MMMM, YYYY') }}
                            </td>
                            <td>
                                <div class="badge rounded-pill bg-danger">{{ $reservation->statut }}</div>
                            </td>
                        </tr>
                    @endforeach
                    {{-- Affichez la pagination --}}
                    {{ $paginatedReservationsAnnulee->links() }}
                @else
                    <tr>
                        <td colspan="6">Il n'y a aucune réservation.</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
