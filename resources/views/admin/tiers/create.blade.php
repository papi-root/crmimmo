@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        NOUVEAU TIERS
    </div>

    <div class="card-body">
        <form action="{{ route("admin.tiers.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('nom_complet') ? 'has-error' : '' }}">
                <label for="first_name">Nom Complet *</label>
                <input type="text" id="nom_complet" name="nom_complet" class="form-control" value="{{ old('nom_complet') }}" required>
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
                <input type="text" id="adresse" name="adresse" class="form-control" value="{{ old('adresse') }}">
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
                <input type="text" id="telephone" name="telephone" class="form-control" value="{{ old('telephone') }}">
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
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
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
                    <option value="1"> Propriétaire </option> 
                    <option value="2"> Client </option> 
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