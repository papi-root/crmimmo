@extends('layouts.admin')
@section('content')
<div class="row">
    
    <div style="margin-bottom: 10px;">
        <div class="col-lg-12">
            <a type="button" class="btn btn-success" href="{{ route("admin.acquisition.create") }}">
                Nouvelle Acquisition
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Liste des Biens des Propriétaires
        </div>

        <div class="card-body">
        
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead class="table-dark">
                        <tr>
                            <th>
                                Date
                            </th>

                            <th>
                                Tiers
                            </th>

                            <th>
                                Téléphone
                            </th>

                            <th>
                                Propriétaire
                            </th>

                            <th>
                                Espace 
                            </th>

                            <th>
                                Type
                            </th>
                        
                            <th>
                                Montant
                            </th>

                            <th>
                                Etat
                            </th>

                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($acquisitions as $key => $a)
                            <tr data-entry-id="{{ $a->id }}">
                                <td>
                                    {{ Carbon\Carbon::parse($a->date)->format('d/m/Y') ?? '' }}
                                </td>

                                <td>
                                    {{ $a->tiers->nom_complet ?? '' }}
                                </td>

                                <td>
                                    {{ $a->tiers->telephone ?? '' }}
                                </td>

                                <td>
                                    {{ $a->espace->bien->tiers->nom_complet ?? '' }}
                                </td>
                            
                                <td>
                                    {{ $a->espace->bien->adresse . ' / ' . $a->espace->numero ?? '' }}
                                </td>

                                <td>
                                    @if($a->type == 1)
                                        <span> Vente </span> 
                                    @elseif($a->type == 2)
                                        <span> Location </span> 
                                    @endif 
                                </td>

                                <td>
                                    {{  $a->espace->prix ?? '' }}
                                </td>

                                <td>
                                    @if($a->etat == 1)
                                        <span> En Cours </span> 
                                    @elseif($a->etat == 2)
                                        <span> Fermé </span> 
                                    @endif 
                                </td>

                                <td>
                                    <a class="btn btn-sm btn-primary uil-eye" href="{{ route('admin.bien.show', $a->id) }}">
                                    
                                    </a>
                                    
                                    <a class="btn btn-sm btn-info uil-pen" href="{{ route('admin.bien.edit', $a->id) }}">
                                    
                                    </a>

                                    <form action="{{ route('admin.bien.destroy', $a->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-sm btn-danger uil-trash">
                                            <i class="fa fa-trash"> </i> 
                                        </button> 
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
           
        </div>
    </div>
</div> 
@endsection