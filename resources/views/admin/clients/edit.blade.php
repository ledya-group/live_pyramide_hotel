@extends('layouts.admin_app', ['menu_id' => 'clients'])

@section('title', "Clients &mdash; Editer le client #{$client->id}")

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-fill card-primary">
                <div class="header">
                    <h3 class="title">Editer le client #{{ $client->id }}</h3>
                </div>

                <div class="content">
                    <form method="POST" action="{{ route('clients.update', $client->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="row">
                            <div class="col-md-4{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title">Titre</label>

                                <select name="title" class="form-control border-input">
                                    <option selected>Selectionner un titre</option>
                                    @foreach($titles as $title)
                                    <option value="{{ $title }}" {{ ($client->title == $title) ? 'selected':'' }}>
                                        {{ $title }}
                                    </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label for="first_name">Prenom</label>
                                <input id="first_name" type="text" class="form-control border-input" name="first_name" value="{{ old('first_name') ?? $client->first_name }}" required autofocus>
                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="last_name">Nom</label>
                                <input id="last_name" type="text" class="form-control border-input" name="last_name" value="{{ old('last_name') ?? $client->last_name }}" required autofocus>
                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control border-input" name="email" value="{{ old('email') ?? $client->email }}" autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4{{ $errors->has('company') ? ' has-error' : '' }}">
                                <label for="company">Entreprise</label>
                                <input id="company" type="text" class="form-control border-input" name="company" value="{{ old('company') ?? $client->company }}" autofocus>
                                @if ($errors->has('company'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone">Téléphone</label>
                                <input id="phone" type="phone" class="form-control border-input" name="phone" value="{{ old('phone') ?? $client->phone }}" required autofocus>
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5{{ $errors->has('city') ? ' has-error' : '' }}">
                                <label for="city">Ville</label>
                                <input id="city" type="text" class="form-control border-input" name="city" value="{{ old('city') ?? $client->city }}" autofocus>
                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-7{{ $errors->has('country') ? ' has-error' : '' }}">
                                <label for="country">Pays</label>
                                <input id="country" type="text" class="form-control border-input" name="country" value="{{ old('country') ?? $client->country }}" required autofocus>
                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address">Adresse</label>
                                <input id="address" type="text" class="form-control border-input" name="address" value="{{ old('address') ?? $client->address }}" autofocus>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button style="padding: 6px 30px;" type="submit" class="btn btn-primary btn-fill">
                                    Enregistrer
                                </button>

                                <a style="padding: 6px 30px;" class="btn btn-default" href="{{ route('clients.index') }}">
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