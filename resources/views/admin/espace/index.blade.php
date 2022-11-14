@extends('layouts.admin')
@section('content')
<div class="row">

    <div class="card">
        <div class="card-header">
            <h3> LISTE DES LOGEMENTS </h3> 
        </div>

        <div class="card-body">
        
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead class="table-dark">
                        <tr>
                            <th>
                                Propriétaire
                            </th>

                            <th>
                                Logement
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
                        @foreach($espaces as $key => $e)
                            <tr data-entry-id="{{ $e->id }}">

                                <td>
                                    {{ $e->bien->tiers->nom_complet ?? '' }}
                                </td>

                                <td>
                                    {{ $e->bien->adresse ?? '' }}
                                    @if($e->type == 1)
                                        <span class="badge bg-primary rounded-pill"> Chambre n° {{ $e->numero ?? '' }} </span> 
                                    @elseif($e->type == 2)
                                        <span class="badge bg-success rounded-pill"> Studio n° {{ $e->numero ?? '' }}</span> 
                                    @elseif($e->type == 3)
                                        <span class="badge bg-danger rounded-pill"> Appartement n° {{ $e->numero ?? '' }}</span> 
                                    @endif
                                </td>
                            
                                <td>
                                    {{ number_format($e->prix, 0, '', ' ' ) ?? '' }}
                                </td>
                                <td>
                                    @if($e->etat == 1)
                                        <span class="badge bg-secondary rounded-pill"> Libre </span> 
                                    @elseif($e->etat == 2)
                                        <span class="badge bg-primary text-light rounded-pill"> Loué(e) </span> 
                                    @elseif($e->etat == 3)
                                        <span class="badge bg-success text-light rounded-pill"> Vendu(e) </span> 
                                    @endif
                                </td>
                            
                                <td>
                                    <a class="btn btn-sm btn-primary uil-eye" href="{{ route('admin.bien.show', $e->id) }}">
                                    
                                    </a>
                                    
                                    <a class="btn btn-sm btn-info uil-pen" href="{{ route('admin.bien.edit', $e->id) }}">
                                    
                                    </a>

                                    <form action="{{ route('admin.bien.destroy', $e->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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