@extends('layouts.admin')
@section('content')
<div class="row">

    <div class="card">
        <div class="card-header">
            Liste des Biens des Propriétaires
        </div>

        <div class="card-body">
        
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead class="table-dark">
                        <tr>
                            <th>
                                Propriétaire
                            </th>
                            <th>
                                Bien
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
                        @foreach($espaces as $key => $e)
                            <tr data-entry-id="{{ $e->id }}">

                                <td>
                                    {{ $e->bien->tiers->nom_complet ?? '' }}
                                </td>

                                <td>
                                    {{ $e->bien->adresse ?? '' }}
                                </td>

                                <td>
                                    {{ $e->numero ?? '' }}
                                </td>

                                <td>
                                    {{ $e->type ?? '' }}
                                </td>
                            
                                <td>
                                    {{ $e->prix?? '' }}
                                </td>
                                <td>
                                    {{ $e->etat ?? '' }}
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