@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        MODIFICATION CLIENT 
    </div>

    <div class="card-body">
        <form action="{{ route("admin.clients.update", [$client->rowid]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('nom_complet') ? 'has-error' : '' }}">
                <label for="first_name">Nom Complet *</label>
                <input type="text" id="nom_complet" name="nom_complet" class="form-control" value="{{ $client->nom }}" required>
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
                <input type="text" id="adresse" name="adresse" class="form-control" value="{{ $client->address }}">
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
                <input type="text" id="telephone" name="telephone" class="form-control" value="{{ $client->phone }}">
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
                <input type="email" id="email" name="email" class="form-control" value="{{ $client->email }}">
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>0
                @endif
                <p class="helper-block">

                </p>
            </div>
            <div class="form-group {{ $errors->has('numcompte') ? 'has-error' : '' }}">
                <label for="numcompte">Numéro de compte bancaire</label>
                <input type="text" id="numcompte" name="numcompte" class="form-control" value="{{  $client->numcompt }}">
                @if($errors->has('numcompte'))
                    <p class="help-block">
                        {{ $errors->first('numcompte') }}
                    </p>
                @endif
                <p class="helper-block">
              
                </p>
            </div>
            <div class="form-group {{ $errors->has('gestcompt') ? 'has-error' : '' }}">
                <label for="gestcompt">Gestionnaire de compte</label>
                <input type="text" id="gestcompt" name="gestcompt" class="form-control" value="{{ $client->gestcompt }}">
                @if($errors->has('gestcompt'))
                    <p class="help-block">
                        {{ $errors->first('gestcompt') }}
                    </p>
                @endif
                <p class="helper-block">
                   
                </p>
            </div>

            <div class="form-group {{ $errors->has('gestcompt') ? 'has-error' : '' }}">
                <label for="gestcompt">Affecter à un commercial</label>
                <select name="commercial" class="select2 form-control">
                    <option> </option> 
                    @foreach($users as $u)
                        <option value="{{$u->id}}" @if($u->id == $commerciaux) selected @endif> {{ $u->name . ' ' . $u->email }} </option> 
                    @endforeach  
                </select> 
                <p class="helper-block">
                   
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="Enregistrer">
            </div>
        </form>


    </div>
</div>
@endsection