@extends('layouts.admin_app', ['menu_id' => 'rooms'])

@section('title', 'Modification d\'une chambre')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-fill card-primary">
                <div class="header">
                    <h3 class="title">Modification d'une chambre</h3>
                </div>

                <div class="content">
                    <form method="POST" action="{{ route('rooms.update', $room->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="row">
                            <div class="col-md-12{{ $errors->has('room_type_id') ? ' has-error' : '' }}">
                                <label for="room_type_id">Catégorie</label>

                                <select name="room_type_id" class="form-control border-input">
                                    <option selected>Selectionner une catégorie</option>
                                    @foreach($room_types as $room_type)
                                    <option value="{{ $room_type->id }}"
                                            {{ ($room_type->id == $room->room_type_id) ? "selected" : "" }}
                                    >{{ $room_type->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('room_type_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('room_type_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name">Nom de la chambre</label>

                                <input id="name" type="text" class="form-control border-input" name="name" value="{{ old('name') ?? $room->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description">Description</label>

                                <textarea id="description" class="form-control border-input" name="description" id="description" rows="5" autofocus>{{ old('description') ?? $room->description }}</textarea>

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