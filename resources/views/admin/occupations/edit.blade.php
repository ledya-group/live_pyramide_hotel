@extends('layouts.admin_app', ['menu_id' => 'occupations'])

@section('title', "Occupations chambres")

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-fill card-primary">
                <div class="header">
                    <h3 class="title">Editer</h3>
                    <p>Modifier les details sur l'occupation d'une chambre</p>
                </div>

                <div class="content">
                    <form method="POST" action="{{ route('occupations.update', $occupation->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="row">
                            <div class="col-md-12{{ $errors->has('client_id') ? ' has-error' : '' }}">
                                <label for="client_id">Client</label>

                                <select name="client_id" class="form-control border-input">
                                    <option selected disabled>Selectionner un client</option>
                                    @foreach($clients as $client)
                                    <option value="{{ $client->id }}" {{ ($occupation->client->id == $client->id) ? 'selected':'' }}>
                                        {{ $client->fullName() }}
                                    </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('client_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('client_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12{{ $errors->has('room_id') ? ' has-error' : '' }}">
                                <label for="room_id">Chambre</label>

                                <select name="room_id" class="form-control border-input">
                                    <option selected disabled>Selectionner une chambre</option>
                                    @foreach($rooms as $room)
                                    <option value="{{ $room->id }}" {{ ($occupation->room->id == $room->id) ? 'selected':'' }}>
                                        {{ $room->fullName() }}
                                    </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('room_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('room_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6{{ $errors->has('from_date') ? ' has-error' : '' }}">
                                <label for="from_date">From</label>
                                <input id="from_date" type="date" class="form-control border-input" name="from_date" value="{{ old('from_date') ?? $occupation->from_date->format('Y-d-m') }}" required autofocus>
                                @if ($errors->has('from_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('from_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6{{ $errors->has('to_date') ? ' has-error' : '' }}">
                                <label for="to_date">To</label>
                                <input id="to_date" type="date" class="form-control border-input" name="to_date" value="{{ old('to_date') ?? optional($occupation->to_date)->format('Y-d-m') }}" autofocus>
                                @if ($errors->has('to_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('to_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button style="padding: 6px 30px;" type="submit" class="btn btn-primary btn-fill">
                                    Enregistrer
                                </button>

                                <a style="padding: 6px 30px;" class="btn btn-default" href="{{ route('occupations.index') }}">
                                    Annuler
                                </a>
                            </div>
                        </div>
                    </form>
                </div>              
            </div>
        </div>
    </div>
@endsection