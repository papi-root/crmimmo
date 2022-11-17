@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header bg-light">
        <h4> Action Rapide </h4> 
    </div>
    <p class="m-2 text-lg"> Que voulez-vous faire ensuite ?  </p> 
    <div class="card-body">
        <div class="row text-center">
        
            <div class="col-md-4"> 
                <button type="button" data-bs-toggle="modal" data-bs-target="#nouveau-contrat-modal" class="btn btn-outline-secondary btn-rounded"><i class="uil-clipboard-alt"></i> Nouveau Contrat</button>
            </div> 
            <div class="col-md-4"> 
                <button type="button" data-bs-toggle="modal" data-bs-target="#nouveau-logement-modal"  class="btn btn-outline-secondary  btn-rounded"><i class="uil-home-alt"></i> Nouveau Logement</button>
            </div>
            <div class="col-md-4"> 
                <button type="button" class="btn btn-outline-secondary  btn-rounded"><i class="uil-cog"></i> Paramétrer</button>
            </div>
        </div>
    </div>
</div>

<div class="row text-center"> 

        <div class="card col-md-3 m-2 rounded-5">
            <div class="card-body text-center">
               
                <div class="avatar-md ">
                    <span class="avatar-title bg-info  rounded-circle text-white">
                        <i class="uil-home-alt" style="font-size: 26px;"></i> 
                    </span>
                </div>
                <div>
                    <strong> Type de Bien </strong>
                    <p> Immeuble </p> 
                </div>
             
            </div>
        </div>

        <div class="card col-md-3 m-2">
            <div class="card-body text-center">
                <div class="avatar-md text-center">
                    <span class="avatar-title bg-info rounded-circle text-white">
                        <i class="uil-home" style="font-size: 26px;"></i> 
                    </span>
                </div>
                <div>
                    <strong> Nombre de Logements </strong>
                    <p> {{ $nbre_logement }} </p> 
                </div>
             
            </div>
        </div>

        <div class="card col-md-3 m-2">
            <div class="card-body text-center">
               
                <div class="avatar-md text-center">
                    <span class="avatar-title bg-info  rounded-circle text-white">
                        <i class="uil-check" style="font-size: 26px;"></i> 
                    </span>
                </div>
                <div>
                    <strong> Statut </strong>
                    <p> Ouvert </p> 
                </div>
             
            </div>
        </div>
</div> 

<br/> 
<div class="card">
    <div class="card-header bg-light">
        <h4> Photos </h4> 
    </div>

    <div class="card-body">
        <div class="row text-center">
            @foreach(explode(',', $bien->image) as $image)
                <img src="{{'/image-bien/'. $image}}" style="width: 40%; height: 5%; margin: 10px;" />
            @endforeach
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-4 col-lg-12">
        <div class="card-header bg-light">
            <h4> Propriétaire </h4> 
        </div>
        <div class="card">
            <div class="card-body">
                <span class="float-start m-2 me-4">
                    <img src="/assets/images/users/avatar-2.jpg" style="height: 100px;" alt="" class="rounded-circle img-thumbnail">
                </span>
                <div class="">
                    <h4 class="mt-1 mb-1">{{ $bien->tiers->nom_complet ?? ''}}</h4>
                    <p class="font-13">Tél: {{ $bien->tiers->telephone ?? '' }}</p>
            
                    <ul class="mb-0 list-inline">
                        <li class="list-inline-item me-3">
                            <h5 class="mb-1">Adresse</h5>
                            <p class="mb-0 font-13">{{ $bien->tiers->adresse ?? '' }}</p>
                        </li>
                        <li class="list-inline-item">
                            <h5 class="mb-1">Email</h5>
                            <p class="mb-0 font-13">{{ $bien->tiers->email ?? '' }}</p>
                        </li>
                    </ul>
                    <br /> 
                    <ul class="mb-0 list-inline">
                        <li class="list-inline-item me-3">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#standard-modal" class="btn btn-info text-white" href="{{ route("admin.tiers.create") }}">
                                Infos Tiers
                            </a>
                        </li>
                        <li class="list-inline-item me-3">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#modifier-tiers-modal" class="btn btn-warning text-white" href="{{ route("admin.tiers.create") }}">
                                Modifier Tiers
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- end div-->
            </div>
            <!-- end card-body-->
        </div>
    </div> <!-- end col -->
</div>

<br /> 

<div class="card">
    <div class="card-header bg-light">
        <h4> La Liste des Logements </h4> 
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="bg-dark text-white">
                    <tr>

                        <th width="5%">
                            Numéro
                        </th>

                        <th  width="40%">
                            Type de Logement
                        </th>

                        <th  width="20%">
                            Prix 
                        </th>
                        
                        <th  width="10%">
                            Statut 
                        </th>

                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($espaces as $e)
                        <tr>
                            <td  width="5%"> {{ $e->numero ?? '' }} </td> 

                            <td  width="40%"> {{ $e->type ?? ''  }} </td> 

                            <td  width="20%"> {{ $e->prix ?? '' }} </td> 

                            <td  width="10%"> {{ $e->prix ?? '' }} </td> 

                            <td  width="10%"> 
                                <form action="{{ route('admin.bien.destroy', $e->id) }}" method="POST" onsubmit="return confirm('Etes-vous sûr de vouloir le supprimer ?');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <button type="submit" class="btn btn-xs btn-danger">
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

<div class="card">
    <div class="card-header bg-light">
        <h4> La Liste des Contrats </h4> 
    </div>
    <div class="card-body">
        <div class="table-responsive">
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
                                @if($a->espace->type == 1)
                                    <span class="badge bg-primary rounded-pill p-1"> Chambre n° {{ $a->espace->numero ?? '' }} </span> 
                                @elseif($a->espace->type == 2)
                                    <span class="badge bg-success rounded-pill p-1"> Studio n° {{ $a->espace->numero ?? '' }}</span> 
                                @elseif($a->espace->type == 3)
                                    <span class="badge bg-danger rounded-pill p-1"> Appartement n° {{ $a->espace->numero ?? '' }}</span> 
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

    @include('admin.bien.modal.nouveau-contrat')

    @include('admin.bien.modal.nouveau-logement')

<!--
<div class="card">
    <div class="card-header">
        
    </div>

    <div class="card-body">
        <form class="card" style="padding: 10px;" method="post" action="{{route('admin.espace.store')}}">
            @csrf
            <h2> Ajout des Logement </h2> 
            <table>
                <tr>
                    <td style="width: 50px;">
                        <div class="form-group">
                            <label for="last_name">Numéro</label>
                            <input type="text" class="form-control prix_select" name="numero" value="" /> 
                        </div>
                    </td>
            
                    <td style="width: 150px;">
                        <div class="form-group">
                            <label for="last_name">Type de Logement</label>
                            <select name="type" class="form-control"> 
                                <option value=""> Sélectionner le type d'espace </option> 
                                <option value="1"> Chambre </option> 
                                <option value="2"> Studio </option> 
                                <option value="3"> Appartement </option> 
                            </select> 
                        </div>
                    </td>

                    <td style="width: 70px;">
                        <div class="form-group">
                            <label for="last_name">Prix</label>
                            <input type="text" class="form-control quantite" name="prix" /> 
                            <input type="hidden" name="bien_id" class="form-control" value="{{ $bien->id }}" />
                        </div>
                    </td>

                    <td style="width: 80px; padding-top: 10px;">
                        <input class="btn btn-primary" type="submit" value="Ajouter">
                    </td>

                </tr>
            </table>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>

                        <th width="10%">
                            Numéro
                        </th>

                        <th  width="40%">
                            Type d'Espace 
                        </th>

                        <th  width="10%">
                            Prix 
                        </th>

                        <th>
                            Action
                        </th>
                    
                    </tr>
                </thead>
                <tbody>
                    @foreach($espaces as $e)
                        <tr>
                            <td  width="10%"> {{ $e->numero ?? '' }} </td> 

                            <td  width="40%"> {{ $e->type ?? ''  }} </td> 

                            <td  width="10%"> {{ $e->prix ?? '' }} </td> 

                            <td  width="10%"> 
                                <form action="{{ route('admin.bien.destroy', $e->id) }}" method="POST" onsubmit="return confirm('Etes-vous sûr de vouloir le supprimer ?');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <button type="submit" class="btn btn-xs btn-danger">
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
--> 
@endsection