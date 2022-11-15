@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header bg-secondary text-white">
        MODIFICATION TIERS
    </div>

    <div class="card-body">
        <form action="{{ route("admin.tiers.update", [$id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('nom_complet') ? 'has-error' : '' }}">
                <label for="first_name">Nom Complet *</label>
                <input type="text" id="nom_complet" name="nom_complet" class="form-control" value="{{ $tiers->nom_complet }}" required>
                @if($errors->has('nom_complet'))
                    <p class="help-block">
                        {{ $errors->first('nom_complet') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.client.fields.first_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('adresse') ? 'has-error' : '' }}">
                <label for="last_name">Adresse</label>
                <input type="text" id="adresse" name="adresse" class="form-control" value="{{ $tiers->adresse }}">
                @if($errors->has('adresse'))
                    <p class="help-block">
                        {{ $errors->first('adresse') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.client.fields.last_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('telephone') ? 'has-error' : '' }}">
                <label for="numcompte">Numéro téléphone</label>
                <input type="text" id="telephone" name="telephone" class="form-control" value="{{ $tiers->telephone }}">
                @if($errors->has('telephone'))
                    <p class="help-block">
                        {{ $errors->first('telephone') }}
                    </p>
                @endif
                <p class="helper-block">
                   
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ $tiers->email }}">
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>0
                @endif
                <p class="helper-block">

                </p>
            </div>
      
            <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                <label for="first_name">Type de Tiers</label>
                <select class="form-control select2" name="type_tiers" > 
                    <option value="1" @if($tiers->type_tiers == 1) selected @endif> Propriétaire </option> 
                    <option value="2" @if($tiers->type_tiers == 2) selected @endif> Client </option> 
                    <option value="3" @if($tiers->type_tiers == 3) selected @endif> Propriétaire / Client </option> 
                    <option value="4" @if($tiers->type_tiers == 4) selected @endif> Prospect </option> 
                <select>  
                @if($errors->has('client_id'))
                    <p class="help-block">
                        {{ $errors->first('client_id') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.client.fields.first_name_helper') }}
                </p>
            </div>
            
            <div>
                <input class="btn btn-danger" type="submit" value="Enregistrer">
            </div>
        </form>


    </div>
</div>
@endsection