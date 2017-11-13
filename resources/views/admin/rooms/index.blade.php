@extends('layouts.admin_app', ['menu_id' => 'rooms'])

@section('title', 'Rooms')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-fill card-primary">
                <div class="header">
                    <h2 class="title">Gestion des chambres par catégories</h2>
                    <p class="category">Ajouter, Modifier ou Supprimer une chambre</p>
                </div>

                <div class="content">
                    <a href="{{ route('room_types.create') }}" title="Ajouter une catégorie chambre" class="btn btn-primary btn-sm">
                        Ajouter Une Catégorie
                    </a> 
                </div>                
            </div>

            @foreach($room_types as $room_type)
            <div class="card card-info">
                <div class="header">
                    <div style="float: right">
                        <form action="{{ route('room_types.destroy', $room_type->id) }}" method="POST">
                            {{ csrf_field() }} {{ method_field('DELETE') }}
                            <a title="Editer" href="{{ route('room_types.edit', $room_type->id) }}" class="btn btn-info btn-fill ti-pencil"></a>
                            <button title="Supprimer" type="submit" class="btn btn-danger btn-fill ti-trash"></button>
                        </form>
                    </div>
                    <h3 class="title">
                        {{ $room_type->name }} 
                    </h3>
                    <p class="category">{{ $room_type->description }}</p>
                    <div style="margin-top: 15px;">
                        <a href="{{ route('rooms.create') . '?categorie=' . $room_type->id }}" title="Ajouter une chambre" class="btn btn-info btn-sm btn-fill">
                            Ajouter une chambre à la catégorie
                        </a>
                    </div>
                </div>
                <div class="content table-full-width">
                    <table class="table table-responsive">
                        <tbody>
                            <?php $i = 0; ?>
                            @forelse($room_type->rooms as $room)
                            <?php $i++; ?>
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $room->name }}</td>
                                <td><span class="label label-info">{{ $room->status() }}</span></td>
                                <td style="text-align: right">
                                    <form method="POST" action="{{ route('rooms.destroy', $room->id) }}">
                                        {{ csrf_field() }} {{ method_field('DELETE')}}
                                        <a title="Editer" href="{{ route('rooms.edit', $room->id) }}" class="btn btn-primary btn-sm ti-pencil"></a>
                                        <button type="submit" title="Supprimer" class="btn btn-danger btn-sm ti-trash"></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>Aucune chambre dans cette catégorie.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection