@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header bg-dark text-white">
        Bien 
    </div>

    <div class="card-body">
        <div class="row">
            <ul class="col-md-5" style="list-style-type: none;">
                <li> 
                    <div class="form-group" style="display: inline-block;">
                        <lable> Propriétaire </label> 
                        <input class="form-control" style="width: 30em;" name="date" value="{{ $bien->tiers->nom_complet ?? ''}}" disabled/>
                    </div>
                </li> 
                <li> 
                    <div class="form-group" style="display: inline-block;">
                        <lable> Numéro de téléphone </label> 
                        <input class="form-control" style="width: 30em;" name="date" value="{{ $bien->tiers->telephone }}" disabled/>
                    </div>
                </li> 

                <li> 
                    <div class="form-group" style="display: inline-block;">
                        <lable> Adresse du Bien </label> 
                        <input class="form-control" style="width: 30em;" name="date" value="{{ $bien->adresse ?? '' }}"  disabled/>
                    </div>
                </li> 

                <li> 
                    <div class="form-group" style="display: inline-block;">
                        <lable> Localisation </label> 
                        <input class="form-control" style="width: 30em;" name="date" value="{{ $bien->localisation ?? '' }}"  disabled/>
                    </div>
                </li> 

                
                <li> 
                    <div class="form-group" style="display: inline-block;">
                        <lable> Quartier </label> 
                        <input class="form-control" style="width: 30em;" name="date" value="{{ $bien->quartier ?? '' }}"  disabled/>
                    </div>
                </li> 

                <li> 
                    <div class="form-group" style="display: inline-block;">
                        <lable> Commmune </label> 
                        <input class="form-control" style="width: 30em;" name="date" value="{{ $bien->commune ?? '' }}"  disabled/>
                    </div>
                </li> 
                

                <li> 
                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                        <label for="email">Note</label>
                        <textarea rows="8" cols="8" name="description" class="form-control" disabled>
                           
                        </textarea>
                    </div>
                </li> 
            </ul>
            <div class="col-md-5"> 
               
            </div> 
        </div>
    </div>
</div>

<br /> 
<div class="card">
    <div class="card-header">
        
    </div>

    <div class="card-body">
            <form class="card" style="padding: 10px;" method="post" action="{{route('admin.espace.store')}}">
                @csrf
                <h2> Ajout des Espaces ou Zones </h2> 
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
                                <label for="last_name">Type d'espace</label>
                                <select name="type" class="form-control"> 
                                    <option> Sélectionner le type d'espace </option> 
                                    <option value="1"> Chambre  </option> 
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

@endsection