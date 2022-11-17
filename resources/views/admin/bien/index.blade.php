@extends('layouts.admin')
@section('content')
<div class="row">
    
    <div style="margin-bottom: 10px;">
        <div class="col-lg-12">
            <a type="button" class="btn btn-success" href="{{ route("admin.bien.create") }}">
                Nouveau Bien
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3> Liste des Biens des Propriétaires </h3> 
        </div>

        <div class="card-body">
        
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead class="table-dark">
                        <tr>
                            <th>
                                Propriété
                            </th>
                          
                            <th>
                                Propriétaire
                            </th>
                            <th>
                                Téléphone
                            </th>
                          
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($biens as $key => $b)
                            <tr data-entry-id="{{ $b->id }}">
                            
                                <td>
                                    <img src="{{ '/image-bien/'. explode(',', $b->image)[0]}}" style="height: 15%; width: 30%;" />
                                    </br > 
                                   
                                    <span style="font-weight: bold;" class="text-primary"> {{ $b->localisation ?? '' }}  </span> 
                                    </br > 
                                    <span> {{ $b->adresse ?? '' }}  </span> 
                                </td>

                                <td>
                                    {{ $b->tiers->nom_complet ?? '' }}
                               </td>
                            
                                <td>
                                    {{ $b->tiers->telephone ?? '' }}
                                </td>
                            
                                <td>
                                    <a class="btn btn-sm btn-primary uil-eye" href="{{ route('admin.bien.show', $b->id) }}">
                                    
                                    </a>
                                    
                                    <a class="btn btn-sm btn-info uil-pen" href="{{ route('admin.bien.edit', $b->id) }}">
                                    
                                    </a>

                                    <form action="{{ route('admin.bien.destroy', $b->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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