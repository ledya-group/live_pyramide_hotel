@extends('layouts.admin_app', ['menu_id' => 'clients'])

@section('title', 'Clients')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h3 class="title">Gestion des Clients</h3>
                    <p class="category">Ajouter, Modifier et Supprimer un client</p>
                    <a style="margin-top: 15px;"
                        href="{{ route('clients.create') }}"
                        title="Ajouter une catégorie chambre"
                        class="btn btn-primary btn-sm"
                    >
                        Ajouter un Client
                    </a> 
                </div>
                <div class="content table-full-width">
                    <table class="table table-responsive">
                        <tbody>
                            <?php $i = 0; ?>
                            @forelse($clients as $client)
                            <?php $i++; ?>
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $client->title }} {{ $client->first_name }} {{ $client->last_name }}</td>
                                <td>{{ $client->phone }}</td>
                                <td>{{ $client->email }}</td>
                                {{--  <td><span class="label label-info">{{ $client->last_name }}</span></td>  --}}
                                <td style="text-align: right">
                                    <form method="POST" action="{{ route('clients.destroy', $client->id) }}">
                                        {{ csrf_field() }} {{ method_field('DELETE')}}
                                        <a title="Editer" href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary btn-sm ti-pencil"></a>
                                        <button type="submit" title="Supprimer" class="btn btn-danger btn-sm ti-trash"></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td><i>Aucun <b>Client</b> disponible.</i></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection