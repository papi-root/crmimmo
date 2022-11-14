@extends('layouts.admin')
@section('content')
<div class="row">
    
    <div style="margin-bottom: 10px;">
        <div class="col-lg-12">
            <a type="button" class="btn btn-success" href="{{ route("admin.acquisition.create") }}">
                Nouveau Contrat
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3> Liste des Contrats </h3> 
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
                                Logement
                            </th>

                            <th>
                                Type
                            </th>
                        
                            <th>
                                Montant
                            </th>

                            <th>
                                Statut
                            </th>

                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($acquisitions as $key => $a)
                            <tr data-entry-id="{{ $a->id }}">
                                <td data-sort='" <?= strtotime($a->date) ?> "'>
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
                                    {{ $a->espace->bien->adresse }} 

                                    @if($a->espace->type == 1)
                                        <span class="badge bg-primary rounded-pill"> Chambre n° {{ $a->espace->numero ?? '' }} </span> 
                                    @elseif($a->espace->type == 2)
                                        <span class="badge bg-success rounded-pill"> Studio n° {{ $a->espace->numero ?? '' }}</span> 
                                    @elseif($a->espace->type == 3)
                                        <span class="badge bg-danger rounded-pill"> Appartement n° {{ $a->espace->numero ?? '' }}</span> 
                                    @endif
                                    
                                </td>

                                <td>
                                   
                                    @if($a->type == 1)
                                        <span class="badge bg-primary rounded-pill"> Vente </span> 
                                    @elseif($a->type == 2)
                                        <span class="badge bg-success rounded-pill"> Location </span> 
                                    @endif 
                                </td>

                                <td>
                                    {{  number_format($a->espace->prix, 0, '', ' ') ?? '' }}
                                </td>

                                <td>
                                    @if($a->etat == 1)
                                        <span class="badge bg-warning rounded-pill"> En Cours </span> 
                                    @elseif($a->etat == 2)
                                        <span class="badge bg-success rounded-pill"> Validé </span> 
                                    @elseif($a->etat == 3)
                                        <span class="badge bg-danger rounded-pill"> Résilié </span> 
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