@extends('layouts.admin_app', ['menu_id' => 'occupations'])

@section('title', 'Occupations')
@section('menu_id', 'occupations')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h3 class="title">Gestion des occupations des chambres</h3>
                    <p class="category">Ajouter, Modifier et Supprimer des occupations à des occupations</p>
                    <a style="margin-top: 15px;"
                        href="{{ route('occupations.create') }}"
                        title="Nouvelle occupation"
                        class="btn btn-primary btn-sm"
                    >
                        Nouvelle Occupation
                    </a> 
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Chambre</th>
                                <th>Customer</th>
                                <th>From</th>
                                <th>To</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($occupations as $occupation)
                            <tr>
                                <td>{{ $occupation->id }}</td>
                                <td>{{ $occupation->room->fullName() }}</td>
                                <td>{{ $occupation->client->fullName() }}</td>
                                <td>{{ $occupation->from_date->format('d-m-Y') }}</td>
                                <td>{{ optional($occupation->to_date)->format('d-m-Y') }}</td>
                                <td style="text-align: right">
                                    @if(!$occupation->to_date)
                                    <form method="POST" action="{{ route('occupations.destroy', $occupation->id) }}">
                                        {{ csrf_field() }} {{ method_field('DELETE') }}
                                        <a title="Editer" href="{{ route('occupations.edit', $occupation->id) }}" class="btn btn-primary btn-sm"><i class="ti-pencil"></i>&nbsp;Modifier</a>
                                        <button type="submit" title="Supprimer" class="btn btn-danger btn-sm"><i class="ti-trash"></i>&nbsp;Liberer la chambre</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7">
                                    <div class="alert alert-warning">
                                        Toutes les <b>chambres</b> sont totalement libre.
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection