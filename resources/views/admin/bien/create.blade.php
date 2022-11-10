@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        NOUVEAU BIEN
    </div>

    <div class="card-body">
        <form action="{{ route("admin.bien.store") }}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="form-group">
                <label for="first_name">Propriétaire *</label>
                <select class="form-control select2" data-toggle="select2" name="proprietaire">
                    <option> </option>
                    @foreach($tiers as $t)
                        <option value="{{ $t->id }}"> {{ $t->nom_complet }} </option>
                    @endforeach 
                </select>
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
            <div class="form-group {{ $errors->has('localisation') ? 'has-error' : '' }}">
                <label for="numcompte">Localistation</label>
                <input type="text" id="localisation" name="localisation" class="form-control" value="{{ old('localisation') }}">
                @if($errors->has('localisation'))
                    <p class="help-block">
                        {{ $errors->first('localisation') }}
                    </p>
                @endif
                <p class="helper-block">
                
                </p>
            </div>
            <div class="form-group {{ $errors->has('quartier') ? 'has-error' : '' }}">
                <label for="quartier">Quartier</label>
                <input type="quartier" id="quartier" name="quartier" class="form-control" value="{{ old('quartier') }}">
                @if($errors->has('quartier'))
                    <p class="help-block">
                        {{ $errors->first('quartier') }}
                    </p>0
                @endif
                <p class="helper-block">

                </p>
            </div>

            <div class="form-group {{ $errors->has('commune') ? 'has-error' : '' }}">
                <label for="first_name">Commune </label>
                <input type="text" id="commune" name="commune" class="form-control" value="{{ old('commune') }}" >
                @if($errors->has('commune'))
                    <p class="help-block">
                        {{ $errors->first('commune') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.client.fields.first_name_helper') }}
                </p>
            </div>

            <div class="form-group">
                
                <label for="Image" class="form-label">Image du bien</label>
                <input class="form-control" type="file" id="formFile" name="image" onchange="preview()">
                <button onclick="clearImage()" class="btn btn-danger mt-1">Supprimer</button>
                <img id="frame" src="" class="img-fluid"/>
            </div>

            <div class="form-group">
                <label for="first_name">etat</label>
                <select class="form-control select2" data-toggle="select2" name="proprietaire">
                    <option> Sélectionner l'état du bien </option>
                    <option value="0"> Indisponible </option>
                    <option value="1"> Disponible</option>
                    @foreach($tiers as $t)
                        <option value="{{ $t->id }}"> {{ $t->nom_complet }} </option>
                    @endforeach 
                </select>
            </div>

            <div class="modal-footer mt-3">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>

       

        </form>
    </div>
</div>

<script>
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
    function clearImage() {
        document.getElementById('formFile').value = null;
        frame.src = "";
    }
</script>


@endsection