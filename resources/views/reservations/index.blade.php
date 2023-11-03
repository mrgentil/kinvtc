@extends('layouts.main') <!-- Si vous utilisez une mise en page -->

@section('content')
    <!-- content begin -->
    <div class="no-bottom no-top zebra" id="content">
        <div id="top"></div>

        <!-- section begin -->
        <section id="subheader" class="jarallax text-light">
            <img src="{{asset('images/background/subheader.jpg')}}" class="jarallax-img" alt="">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1>Choisissez un vehicule</h1>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <section id="section-hero" aria-label="section" class="no-top mt-80 sm-mt-0">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 ">
                        <div class="spacer-single sm-hide"></div>
                        <div class="p-4 rounded-3 shadow-soft" data-bgcolor="#ffffff">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <h4>Détails sur les horaires de reservation journalière</h4>
                                    <hr>
                                    <h5 id="pickup-location">Lieu d'embarquement
                                        : {{ session('pickupLocation', $pickupLocation) }}</h5>
                                    <h5 id="pick-up-details">Date et heure de début
                                        : {{ \Carbon\Carbon::parse(session('pickUpDate', $pickUpDate))->format('j F, Y') }}
                                        à {{ session('pickUpTime', $pickUpTime) }}</h5>
                                    <h5 id="collection-details">Date et heure de retour
                                        : {{ \Carbon\Carbon::parse(session('collectionDate', $collectionDate))->format('j F, Y') }}

                                        à {{ session('collectionTime', $collectionTime) }}</h5>

                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <h4>Modifier les horaires de reservation journalière <i
                                            class="fa-light fa fa-edit"></i></h4>
                                    <form id="contact_form" method="POST" action="{{ route('vehicules') }}">
                                        @csrf
                                        <div class="spacer-20"></div>
                                        <div class="row">
                                            <div class="col-lg-12 mb20">
                                                <h5>Lieu d'embarquement</h5>
                                                <input type="text" name="pickupLocation" id="pickup-location-input"
                                                       placeholder="Enter your pickup location" autocomplete="off"
                                                       class="form-control"
                                                       value="{{ old('pickupLocation', $pickupLocation) }}" required>
                                                <div class="jls-address-preview jls-address-preview--hidden">
                                                    <div class="jls-address-preview__header">
                                                    </div>
                                                </div>
                                                @error('PickupLocation')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-lg-6 mb20">
                                                <h5>Date et heure de début</h5>
                                                <div class="date-time-field">
                                                    <input type="text" id="date-picker" name="pickUpDate"
                                                           value="{{ old('pickUpDate', $pickUpDate) }}" required>
                                                    <select name="pickUpTime" id="pickup-time" required>
                                                        <!-- <option selected disabled value="Select time">Time</option> -->
                                                        <option value=""></option>
                                                        <option
                                                            value="00:00" {{ old('Pick_Up_Time', $pickUpTime) == '00:00' ? 'selected' : '' }}>
                                                            00:00
                                                        </option>
                                                        <option
                                                            value="00:30" {{ old('Pick_Up_Time', $pickUpTime) == '00:30' ? 'selected' : '' }}>
                                                            00:30
                                                        </option>
                                                        <option
                                                            value="01:00" {{ old('Pick_Up_Time', $pickUpTime) == '01:00' ? 'selected' : '' }}>
                                                            01:00
                                                        </option>
                                                        <option
                                                            value="01:30" {{ old('Pick_Up_Time', $pickUpTime) == '01:00' ? 'selected' : '' }}>
                                                            01:30
                                                        </option>
                                                        <option
                                                            value="02:00" {{ old('Pick_Up_Time', $pickUpTime) == '01:30' ? 'selected' : '' }}>
                                                            02:00
                                                        </option>
                                                        <option
                                                            value="02:30" {{ old('Pick_Up_Time', $pickUpTime) == '02:00' ? 'selected' : '' }}>
                                                            02:30
                                                        </option>
                                                        <option
                                                            value="03:00" {{ old('Pick_Up_Time', $pickUpTime) == '02:30' ? 'selected' : '' }}>
                                                            03:00
                                                        </option>
                                                        <option
                                                            value="03:30" {{ old('Pick_Up_Time', $pickUpTime) == '03:00' ? 'selected' : '' }}>
                                                            03:30
                                                        </option>
                                                        <option
                                                            value="04:00" {{ old('Pick_Up_Time', $pickUpTime) == '04:00' ? 'selected' : '' }}>
                                                            04:00
                                                        </option>
                                                        <option
                                                            value="04:30" {{ old('Pick_Up_Time', $pickUpTime) == '04:30' ? 'selected' : '' }}>
                                                            04:30
                                                        </option>
                                                        <option
                                                            value="05:00" {{ old('Pick_Up_Time', $pickUpTime) == '05:00' ? 'selected' : '' }}>
                                                            05:00
                                                        </option>
                                                        <option
                                                            value="05:30" {{ old('Pick_Up_Time', $pickUpTime) == '05:30' ? 'selected' : '' }}>
                                                            05:30
                                                        </option>
                                                        <option
                                                            value="06:00" {{ old('Pick_Up_Time', $pickUpTime) == '06:00' ? 'selected' : '' }}>
                                                            06:00
                                                        </option>
                                                        <option
                                                            value="06:30" {{ old('Pick_Up_Time', $pickUpTime) == '06:30' ? 'selected' : '' }}>
                                                            06:30
                                                        </option>
                                                        <option
                                                            value="07:00" {{ old('Pick_Up_Time', $pickUpTime) == '07:00' ? 'selected' : '' }}>
                                                            07:00
                                                        </option>
                                                        <option
                                                            value="07:30" {{ old('Pick_Up_Time', $pickUpTime) == '07:30' ? 'selected' : '' }}>
                                                            07:30
                                                        </option>
                                                        <option
                                                            value="08:00" {{ old('Pick_Up_Time', $pickUpTime) == '08:00' ? 'selected' : '' }}>
                                                            08:00
                                                        </option>
                                                        <option
                                                            value="08:30" {{ old('Pick_Up_Time', $pickUpTime) == '08:30' ? 'selected' : '' }}>
                                                            08:30
                                                        </option>
                                                        <option
                                                            value="09:00" {{ old('Pick_Up_Time', $pickUpTime) == '09:00' ? 'selected' : '' }}>
                                                            09:00
                                                        </option>
                                                        <option
                                                            value="09:30" {{ old('Pick_Up_Time', $pickUpTime) == '09:30' ? 'selected' : '' }}>
                                                            09:30
                                                        </option>
                                                        <option
                                                            value="10:00" {{ old('Pick_Up_Time', $pickUpTime) == '10:00' ? 'selected' : '' }}>
                                                            10:00
                                                        </option>
                                                        <option
                                                            value="10:30" {{ old('Pick_Up_Time', $pickUpTime) == '10:30' ? 'selected' : '' }}>
                                                            10:30
                                                        </option>
                                                        <option
                                                            value="11:00" {{ old('Pick_Up_Time', $pickUpTime) == '11:00' ? 'selected' : '' }}>
                                                            11:00
                                                        </option>
                                                        <option
                                                            value="11:30" {{ old('Pick_Up_Time', $pickUpTime) == '11:30' ? 'selected' : '' }}>
                                                            11:30
                                                        </option>
                                                        <option
                                                            value="12:00" {{ old('Pick_Up_Time', $pickUpTime) == '12:00' ? 'selected' : '' }}>
                                                            12:00
                                                        </option>
                                                        <option
                                                            value="12:30" {{ old('Pick_Up_Time', $pickUpTime) == '12:30' ? 'selected' : '' }}>
                                                            12:30
                                                        </option>
                                                        <option
                                                            value="13:00" {{ old('Pick_Up_Time', $pickUpTime) == '13:00' ? 'selected' : '' }}>
                                                            13:00
                                                        </option>
                                                        <option
                                                            value="13:30" {{ old('Pick_Up_Time', $pickUpTime) == '13:30' ? 'selected' : '' }}>
                                                            13:30
                                                        </option>
                                                        <option
                                                            value="14:00" {{ old('Pick_Up_Time', $pickUpTime) == '14:00' ? 'selected' : '' }}>
                                                            14:00
                                                        </option>
                                                        <option
                                                            value="14:30" {{ old('Pick_Up_Time', $pickUpTime) == '14:30' ? 'selected' : '' }}>
                                                            14:30
                                                        </option>
                                                        <option
                                                            value="15:00" {{ old('Pick_Up_Time', $pickUpTime) == '15:00' ? 'selected' : '' }}>
                                                            15:00
                                                        </option>
                                                        <option
                                                            value="15:30" {{ old('Pick_Up_Time', $pickUpTime) == '15:30' ? 'selected' : '' }}>
                                                            15:30
                                                        </option>
                                                        <option
                                                            value="16:00" {{ old('Pick_Up_Time', $pickUpTime) == '16:00' ? 'selected' : '' }}>
                                                            16:00
                                                        </option>
                                                        <option
                                                            value="16:30" {{ old('Pick_Up_Time', $pickUpTime) == '16:30' ? 'selected' : '' }}>
                                                            16:30
                                                        </option>
                                                        <option
                                                            value="17:00" {{ old('Pick_Up_Time', $pickUpTime) == '17:00' ? 'selected' : '' }}>
                                                            17:00
                                                        </option>
                                                        <option
                                                            value="17:30" {{ old('Pick_Up_Time', $pickUpTime) == '17:30' ? 'selected' : '' }}>
                                                            17:30
                                                        </option>
                                                        <option
                                                            value="18:00" {{ old('Pick_Up_Time', $pickUpTime) == '18:00' ? 'selected' : '' }}>
                                                            18:00
                                                        </option>
                                                        <option
                                                            value="18:30" {{ old('Pick_Up_Time', $pickUpTime) == '18:30' ? 'selected' : '' }}>
                                                            18:30
                                                        </option>
                                                        <option
                                                            value="19:00" {{ old('Pick_Up_Time', $pickUpTime) == '19:00' ? 'selected' : '' }}>
                                                            19:00
                                                        </option>
                                                        <option
                                                            value="19:30" {{ old('Pick_Up_Time', $pickUpTime) == '19:30' ? 'selected' : '' }}>
                                                            19:30
                                                        </option>
                                                        <option
                                                            value="20:00" {{ old('Pick_Up_Time', $pickUpTime) == '20:00' ? 'selected' : '' }}>
                                                            20:00
                                                        </option>
                                                        <option
                                                            value="20:30" {{ old('Pick_Up_Time', $pickUpTime) == '20:30' ? 'selected' : '' }}>
                                                            20:30
                                                        </option>
                                                        <option
                                                            value="21:00" {{ old('Pick_Up_Time', $pickUpTime) == '21:00' ? 'selected' : '' }}>
                                                            21:00
                                                        </option>
                                                        <option
                                                            value="21:30" {{ old('Pick_Up_Time', $pickUpTime) == '21:30' ? 'selected' : '' }}>
                                                            21:30
                                                        </option>
                                                        <option
                                                            value="22:00" {{ old('Pick_Up_Time', $pickUpTime) == '22:00' ? 'selected' : '' }}>
                                                            22:00
                                                        </option>
                                                        <option
                                                            value="22:30" {{ old('Pick_Up_Time', $pickUpTime) == '22:30' ? 'selected' : '' }}>
                                                            22:30
                                                        </option>
                                                        <option
                                                            value="23:00" {{ old('Pick_Up_Time', $pickUpTime) == '23:00' ? 'selected' : '' }}>
                                                            23:00
                                                        </option>
                                                        <option
                                                            value="23:30" {{ old('Pick_Up_Time', $pickUpTime) == '23:30' ? 'selected' : '' }}>
                                                            23:30
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mb20">
                                                <h5>Date et heure de retour</h5>
                                                <div class="date-time-field">
                                                    <input type="text" id="date-picker-2" name="collectionDate"
                                                           value="{{ old('collectionDate', $collectionDate) }}"
                                                           required>
                                                    <select name="collectionTime" id="collection-time" required>
                                                        <!-- <option selected disabled value="Select time">Time</option> -->
                                                        <option value=""></option>
                                                        <option
                                                            value="00:00" {{ old('Collection_Time', $collectionTime) == '00:00' ? 'selected' : '' }}>
                                                            00:00
                                                        </option>
                                                        <option
                                                            value="00:30" {{ old('Collection_Time', $collectionTime) == '00:30' ? 'selected' : '' }}>
                                                            00:30
                                                        </option>
                                                        <option
                                                            value="01:00" {{ old('Collection_Time', $collectionTime) == '01:00' ? 'selected' : '' }}>
                                                            01:00
                                                        </option>
                                                        <option
                                                            value="01:30" {{ old('Collection_Time', $collectionTime) == '01:00' ? 'selected' : '' }}>
                                                            01:30
                                                        </option>
                                                        <option
                                                            value="02:00" {{ old('Collection_Time', $collectionTime) == '01:30' ? 'selected' : '' }}>
                                                            02:00
                                                        </option>
                                                        <option
                                                            value="02:30" {{ old('Collection_Time', $collectionTime) == '02:00' ? 'selected' : '' }}>
                                                            02:30
                                                        </option>
                                                        <option
                                                            value="03:00" {{ old('Collection_Time', $collectionTime) == '02:30' ? 'selected' : '' }}>
                                                            03:00
                                                        </option>
                                                        <option
                                                            value="03:30" {{ old('Collection_Time', $collectionTime) == '03:00' ? 'selected' : '' }}>
                                                            03:30
                                                        </option>
                                                        <option
                                                            value="04:00" {{ old('Collection_Time', $collectionTime) == '04:00' ? 'selected' : '' }}>
                                                            04:00
                                                        </option>
                                                        <option
                                                            value="04:30" {{ old('Collection_Time', $collectionTime) == '04:30' ? 'selected' : '' }}>
                                                            04:30
                                                        </option>
                                                        <option
                                                            value="05:00" {{ old('Collection_Time', $collectionTime) == '05:00' ? 'selected' : '' }}>
                                                            05:00
                                                        </option>
                                                        <option
                                                            value="05:30" {{ old('Collection_Time', $collectionTime) == '05:30' ? 'selected' : '' }}>
                                                            05:30
                                                        </option>
                                                        <option
                                                            value="06:00" {{ old('Collection_Time', $collectionTime) == '06:00' ? 'selected' : '' }}>
                                                            06:00
                                                        </option>
                                                        <option
                                                            value="06:30" {{ old('Collection_Time', $collectionTime) == '06:30' ? 'selected' : '' }}>
                                                            06:30
                                                        </option>
                                                        <option
                                                            value="07:00" {{ old('Collection_Time', $collectionTime) == '07:00' ? 'selected' : '' }}>
                                                            07:00
                                                        </option>
                                                        <option
                                                            value="07:30" {{ old('Collection_Time', $collectionTime) == '07:30' ? 'selected' : '' }}>
                                                            07:30
                                                        </option>
                                                        <option
                                                            value="08:00" {{ old('Collection_Time', $collectionTime) == '08:00' ? 'selected' : '' }}>
                                                            08:00
                                                        </option>
                                                        <option
                                                            value="08:30" {{ old('Collection_Time', $collectionTime) == '08:30' ? 'selected' : '' }}>
                                                            08:30
                                                        </option>
                                                        <option
                                                            value="09:00" {{ old('Collection_Time', $collectionTime) == '09:00' ? 'selected' : '' }}>
                                                            09:00
                                                        </option>
                                                        <option
                                                            value="09:30" {{ old('Collection_Time', $collectionTime) == '09:30' ? 'selected' : '' }}>
                                                            09:30
                                                        </option>
                                                        <option
                                                            value="10:00" {{ old('Collection_Time', $collectionTime) == '10:00' ? 'selected' : '' }}>
                                                            10:00
                                                        </option>
                                                        <option
                                                            value="10:30" {{ old('Collection_Time', $collectionTime) == '10:30' ? 'selected' : '' }}>
                                                            10:30
                                                        </option>
                                                        <option
                                                            value="11:00" {{ old('Collection_Time', $collectionTime) == '11:00' ? 'selected' : '' }}>
                                                            11:00
                                                        </option>
                                                        <option
                                                            value="11:30" {{ old('Collection_Time', $collectionTime) == '11:30' ? 'selected' : '' }}>
                                                            11:30
                                                        </option>
                                                        <option
                                                            value="12:00" {{ old('Collection_Time', $collectionTime) == '12:00' ? 'selected' : '' }}>
                                                            12:00
                                                        </option>
                                                        <option
                                                            value="12:30" {{ old('Collection_Time', $collectionTime) == '12:30' ? 'selected' : '' }}>
                                                            12:30
                                                        </option>
                                                        <option
                                                            value="13:00" {{ old('Collection_Time', $collectionTime) == '13:00' ? 'selected' : '' }}>
                                                            13:00
                                                        </option>
                                                        <option
                                                            value="13:30" {{ old('Collection_Time', $collectionTime) == '13:30' ? 'selected' : '' }}>
                                                            13:30
                                                        </option>
                                                        <option
                                                            value="14:00" {{ old('Collection_Time', $collectionTime) == '14:00' ? 'selected' : '' }}>
                                                            14:00
                                                        </option>
                                                        <option
                                                            value="14:30" {{ old('Collection_Time', $collectionTime) == '14:30' ? 'selected' : '' }}>
                                                            14:30
                                                        </option>
                                                        <option
                                                            value="15:00" {{ old('Collection_Time', $collectionTime) == '15:00' ? 'selected' : '' }}>
                                                            15:00
                                                        </option>
                                                        <option
                                                            value="15:30" {{ old('Collection_Time', $collectionTime) == '15:30' ? 'selected' : '' }}>
                                                            15:30
                                                        </option>
                                                        <option
                                                            value="16:00" {{ old('Collection_Time', $collectionTime) == '16:00' ? 'selected' : '' }}>
                                                            16:00
                                                        </option>
                                                        <option
                                                            value="16:30" {{ old('Collection_Time', $collectionTime) == '16:30' ? 'selected' : '' }}>
                                                            16:30
                                                        </option>
                                                        <option
                                                            value="17:00" {{ old('Collection_Time', $collectionTime) == '17:00' ? 'selected' : '' }}>
                                                            17:00
                                                        </option>
                                                        <option
                                                            value="17:30" {{ old('Collection_Time', $collectionTime) == '17:30' ? 'selected' : '' }}>
                                                            17:30
                                                        </option>
                                                        <option
                                                            value="18:00" {{ old('Collection_Time', $collectionTime) == '18:00' ? 'selected' : '' }}>
                                                            18:00
                                                        </option>
                                                        <option
                                                            value="18:30" {{ old('Collection_Time', $collectionTime) == '18:30' ? 'selected' : '' }}>
                                                            18:30
                                                        </option>
                                                        <option
                                                            value="19:00" {{ old('Collection_Time', $collectionTime) == '19:00' ? 'selected' : '' }}>
                                                            19:00
                                                        </option>
                                                        <option
                                                            value="19:30" {{ old('Collection_Time', $collectionTime) == '19:30' ? 'selected' : '' }}>
                                                            19:30
                                                        </option>
                                                        <option
                                                            value="20:00" {{ old('Collection_Time', $collectionTime) == '20:00' ? 'selected' : '' }}>
                                                            20:00
                                                        </option>
                                                        <option
                                                            value="20:30" {{ old('Collection_Time', $collectionTime) == '20:30' ? 'selected' : '' }}>
                                                            20:30
                                                        </option>
                                                        <option
                                                            value="21:00" {{ old('Collection_Time', $collectionTime) == '21:00' ? 'selected' : '' }}>
                                                            21:00
                                                        </option>
                                                        <option
                                                            value="21:30" {{ old('Collection_Time', $collectionTime) == '21:30' ? 'selected' : '' }}>
                                                            21:30
                                                        </option>
                                                        <option
                                                            value="22:00" {{ old('Collection_Time', $collectionTime) == '22:00' ? 'selected' : '' }}>
                                                            22:00
                                                        </option>
                                                        <option
                                                            value="22:30" {{ old('Collection_Time', $collectionTime) == '22:30' ? 'selected' : '' }}>
                                                            22:30
                                                        </option>
                                                        <option
                                                            value="23:00" {{ old('Collection_Time', $collectionTime) == '23:00' ? 'selected' : '' }}>
                                                            23:00
                                                        </option>
                                                        <option
                                                            value="23:30" {{ old('Collection_Time', $collectionTime) == '23:30' ? 'selected' : '' }}>
                                                            23:30
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" onclick="updateDetails();" name="reserve_jour"
                                                value="Reserver" class="btn-main pull-right">Modifier
                                        </button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>

        <section id="section-cars">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="item_filter_group">
                            <h4>Vehicle Type</h4>
                            <div class="de_form">
                                @foreach($type as $item)
                                    <div class="de_checkbox">
                                        <input id="vehicle_type_1" name="vehicle_type_1" type="checkbox"
                                               value="vehicle_type_1">
                                        <label for="vehicle_type_1">{{$item->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{--                        <div class="item_filter_group">--}}
                        {{--                            <h4>Car Body Type</h4>--}}
                        {{--                            <div class="de_form">--}}
                        {{--                                <div class="de_checkbox">--}}
                        {{--                                    <input id="car_body_type_1" name="car_body_type_1" type="checkbox" value="car_body_type_1">--}}
                        {{--                                    <label for="car_body_type_1">Convertible</label>--}}
                        {{--                                </div>--}}

                        {{--                                <div class="de_checkbox">--}}
                        {{--                                    <input id="car_body_type_2" name="car_body_type_2" type="checkbox" value="car_body_type_2">--}}
                        {{--                                    <label for="car_body_type_2">Coupe</label>--}}
                        {{--                                </div>--}}

                        {{--                                <div class="de_checkbox">--}}
                        {{--                                    <input id="car_body_type_3" name="car_body_type_3" type="checkbox" value="car_body_type_3">--}}
                        {{--                                    <label for="car_body_type_3">Exotic Cars</label>--}}
                        {{--                                </div>--}}

                        {{--                                <div class="de_checkbox">--}}
                        {{--                                    <input id="car_body_type_4" name="car_body_type_4" type="checkbox" value="car_body_type_4">--}}
                        {{--                                    <label for="car_body_type_4">Hatchback</label>--}}
                        {{--                                </div>--}}

                        {{--                                <div class="de_checkbox">--}}
                        {{--                                    <input id="car_body_type_5" name="car_body_type_5" type="checkbox" value="car_body_type_5">--}}
                        {{--                                    <label for="car_body_type_5">Minivan</label>--}}
                        {{--                                </div>--}}

                        {{--                                <div class="de_checkbox">--}}
                        {{--                                    <input id="car_body_type_6" name="car_body_type_6" type="checkbox" value="car_body_type_6">--}}
                        {{--                                    <label for="car_body_type_6">Pickup Truck</label>--}}
                        {{--                                </div>--}}

                        {{--                                <div class="de_checkbox">--}}
                        {{--                                    <input id="car_body_type_7" name="car_body_type_7" type="checkbox" value="car_body_type_7">--}}
                        {{--                                    <label for="car_body_type_7">Sedan</label>--}}
                        {{--                                </div>--}}

                        {{--                                <div class="de_checkbox">--}}
                        {{--                                    <input id="car_body_type_8" name="car_body_type_8" type="checkbox" value="car_body_type_8">--}}
                        {{--                                    <label for="car_body_type_8">Sports Car</label>--}}
                        {{--                                </div>--}}

                        {{--                                <div class="de_checkbox">--}}
                        {{--                                    <input id="car_body_type_9" name="car_body_type_9" type="checkbox" value="car_body_type_9">--}}
                        {{--                                    <label for="car_body_type_9">Station Wagon</label>--}}
                        {{--                                </div>--}}

                        {{--                                <div class="de_checkbox">--}}
                        {{--                                    <input id="car_body_type_10" name="car_body_type_10" type="checkbox" value="car_body_type_10">--}}
                        {{--                                    <label for="car_body_type_10">SUV</label>--}}
                        {{--                                </div>--}}

                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        {{--                        <div class="item_filter_group">--}}
                        {{--                            <h4>Car Seats</h4>--}}
                        {{--                            <div class="de_form">--}}
                        {{--                                <div class="de_checkbox">--}}
                        {{--                                    <input id="car_seat_1" name="car_seat_1" type="checkbox" value="car_seat_1">--}}
                        {{--                                    <label for="car_seat_1">2 seats</label>--}}
                        {{--                                </div>--}}

                        {{--                                <div class="de_checkbox">--}}
                        {{--                                    <input id="car_seat_2" name="car_seat_2" type="checkbox" value="car_seat_2">--}}
                        {{--                                    <label for="car_seat_2">4 seats</label>--}}
                        {{--                                </div>--}}

                        {{--                                <div class="de_checkbox">--}}
                        {{--                                    <input id="car_seat_3" name="car_seat_3" type="checkbox" value="car_seat_3">--}}
                        {{--                                    <label for="car_seat_3">6 seats</label>--}}
                        {{--                                </div>--}}

                        {{--                                <div class="de_checkbox">--}}
                        {{--                                    <input id="car_seat_4" name="car_seat_4" type="checkbox" value="car_seat_4">--}}
                        {{--                                    <label for="car_seat_4">6+ seats</label>--}}
                        {{--                                </div>--}}

                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        {{--                        <div class="item_filter_group">--}}
                        {{--                            <h4>Car Engine Capacity (cc)</h4>--}}
                        {{--                            <div class="de_form">--}}
                        {{--                                <div class="de_checkbox">--}}
                        {{--                                    <input id="car_engine_1" name="car_engine_1" type="checkbox" value="car_engine_1">--}}
                        {{--                                    <label for="car_engine_1">1000 - 2000</label>--}}
                        {{--                                </div>--}}

                        {{--                                <div class="de_checkbox">--}}
                        {{--                                    <input id="car_engine_2" name="car_engine_2" type="checkbox" value="car_engine_2">--}}
                        {{--                                    <label for="car_engine_2">2000 - 4000</label>--}}
                        {{--                                </div>--}}

                        {{--                                <div class="de_checkbox">--}}
                        {{--                                    <input id="car_engine_3" name="car_engine_3" type="checkbox" value="car_engine_3">--}}
                        {{--                                    <label for="car_engine_3">4000 - 6000</label>--}}
                        {{--                                </div>--}}

                        {{--                                <div class="de_checkbox">--}}
                        {{--                                    <input id="car_engine_4" name="car_engine_4" type="checkbox" value="car_engine_4">--}}
                        {{--                                    <label for="car_engine_4">6000+</label>--}}
                        {{--                                </div>--}}

                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        <div class="item_filter_group">
                            <h4>Price ($)</h4>
                            <div class="price-input">
                                <div class="field">
                                    <span>Min</span>
                                    <input type="number" class="input-min" value="0">
                                </div>
                                <div class="field">
                                    <span>Max</span>
                                    <input type="number" class="input-max" value="2000">
                                </div>
                            </div>
                            <div class="slider">
                                <div class="progress"></div>
                            </div>
                            <div class="range-input">
                                <input type="range" class="range-min" min="0" max="2000" value="0" step="1">
                                <input type="range" class="range-max" min="0" max="2000" value="2000" step="1">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            @foreach($vehiculeInfos as $vehiculeInfo)
                                <div class="col-lg-12">
                                    <div class="de-item-list mb30">
                                        <div class="d-img">
                                            <img src="{{ Voyager::Image($vehiculeInfo['vehicule']->image_cover) }}"
                                                 class="img-fluid" alt="{{ $vehiculeInfo['vehicule']->name }}">
                                        </div>
                                        <div class="d-info">
                                            <div class="d-text">
                                                @php
                                                    $coutTotal = $vehiculeInfo['coutTotal'];
                                                    $differenceEnJours = $differenceEnJours;
                                                    $prixJournalier = $vehiculeInfo['vehicule']->type->price_journalier;
                                                    $prixTotal = $prixJournalier * $differenceEnJours;
                                                @endphp

                                                <h4>{{ $vehiculeInfo['vehicule']->name }} x ({{ $differenceEnJours }}
                                                    Jours) </h4>
                                                <div class="d-atr-group">
                                                    <ul class="d-atr">
                                                        <li><span>1 jour :</span>15000km</li>
                                                        <li>
                                                            <span>Sièges:</span>{{ $vehiculeInfo['vehicule']->capacite_passagers}}
                                                        </li>
                                                        <li>
                                                            <span>Couleur Externe:</span>{{ $vehiculeInfo['vehicule']->exterior_color}}
                                                        </li>
                                                        <li><span>Volant:</span>{{ $vehiculeInfo['vehicule']->drive}}
                                                        </li>
                                                        <li>
                                                            <span>Type Vehicule:</span>{{ $vehiculeInfo['vehicule']->type->name}}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-price">
                                            Prix Initial : ${{ $prixJournalier }}
                                            <span>Coût total : ${{ $coutTotal }}</span>
                                            <a class="btn-main" href="{{ route('vehicules.show', ['id' => $vehiculeInfo['vehicule']->id,
                                                 'coutTotal' => $vehiculeInfo['coutTotal'],
                                                 'pickupLocation' => $pickupLocation, 'pickUpDate' => $pickUpDate, 'pickUpTime' => $pickUpTime,
                                                'collectionDate' => $collectionDate,
                                                 'differenceEnJours' => $differenceEnJours,
                                                 'collectionTime' => $collectionTime]) }}">Louer
                                                maintenant</a>

                                        </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
        </section>
    </div>
    <!-- content close -->
@endsection
