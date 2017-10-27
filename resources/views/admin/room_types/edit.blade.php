@extends('layouts.admin_app', ['menu_id' => 'rooms'])

@section('title', 'Modification catégorie chambre')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-fill card-primary">
                <div class="header">
                    <h3 class="title">Modification catégorie chambre</h3>
                </div>

                <div class="content">
                    <form method="POST" action="{{ route('room_types.update', $roomType->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="row">
                            <div class="col-md-12{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name">Nom</label>

                                <input id="name" type="text" class="form-control border-input" name="name" value="{{ old('name') ?? $roomType->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12{{ $errors->has('base_price') ? ' has-error' : '' }}">
                                <label for="base_price">Prix de base</label>

                                <input id="base_price" type="number" min="0" class="form-control border-input" name="base_price" value="{{ old('base_price') ?? $roomType->base_price }}" required autofocus>

                                @if ($errors->has('base_price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('base_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description">Description</label>

                                <textarea id="description" class="form-control border-input" name="description" id="description" rows="5" autofocus>{{ old('description') ?? $roomType->description }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button style="padding: 6px 30px;" type="submit" class="btn btn-primary btn-fill">
                                    Enregistrer
                                </button>

                                <a style="padding: 6px 30px;" class="btn btn-default" href="{{ route('rooms.index') }}">
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