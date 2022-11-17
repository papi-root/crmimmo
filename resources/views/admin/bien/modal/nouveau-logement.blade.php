    
<div id="nouveau-logement-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Nouveau Logement</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route("admin.espace.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group {{ $errors->has('nom_complet') ? 'has-error' : '' }}">
                        <label for="first_name">Numéro *</label>
                        <input type="text" id="numero" name="numero" class="form-control" value="{{ old('numero') }}" required>
                        @if($errors->has('nom_complet'))
                            <p class="help-block">
                                {{ $errors->first('nom_complet') }}
                            </p>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.client.fields.first_name_helper') }}
                        </p>
                    </div>

                    <input type="hidden" name="bien_id" value="{{ $bien->id }}" /> 
                    <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                        <label for="first_name">Type de Bien</label>
                        <select class="form-control select2" name="type" > 
                            <option value="1"> Chambre </option> 
                            <option value="2"> Studio </option> 
                            <option value="3"> Appartement </option> 
                            <option value="4"> Magasin </option> 
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

                    <div class="form-group">
                        <label for="first_name">Prix *</label>
                        <input type="text" id="prix" name="prix" class="form-control" value="{{ old('prix') }}" required>
                        @if($errors->has('prix'))
                            <p class="help-block">
                                {{ $errors->first('prix') }}
                            </p>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.client.fields.first_name_helper') }}
                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('adresse') ? 'has-error' : '' }}">
                        <label for="last_name">Description</label>
                        <textarea  type="text" rows="5" cols="8" id="description" name="description" class="form-control" value="{{ old('adresse') }}">
                        </textarea>
                        @if($errors->has('adresse'))
                            <p class="help-block">
                                {{ $errors->first('adresse') }}
                            </p>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.client.fields.last_name_helper') }}
                        </p>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
