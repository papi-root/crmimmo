
<div id="nouveau-contrat-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Nouveau Contrat</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route("admin.acquisition.store") }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group">
                        <label for="first_name">Client *</label>
                        <select class="form-control"  name="client">
                            <option> Sélectionnez le client </option>
                            @foreach($tiers as $t)
                                <option value="{{ $t->id }}"> {{ $t->nom_complet }} </option>
                            @endforeach 
                        </select>
                    </div>

                    <div class="form-group {{ $errors->has('adresse') ? 'has-error' : '' }}">
                        <label for="last_name">Date</label>
                        <input type="date" id="date" name="date" class="form-control" value="{{ old('date') }}">
                        @if($errors->has('date'))
                            <p class="help-block">
                                {{ $errors->first('date') }}
                            </p>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.client.fields.last_name_helper') }}
                        </p>
                    </div>

                    <div class="form-group">
                        <label for="first_name">Propriétaire / Bien / Espace </label>
                        <select class="form-control " name="espace">
                            <option value="0"> Sélectionner le Propriétaire / bien / Espace </option>
                            @foreach($espaces as $e)
                                <option value="{{ $e->id }}"> {{ $e->bien->adresse . ' / ' . $e->numero }} </option>
                            @endforeach 
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="first_name">Type d'acquisition</label>
                        <select class="form-control select2" data-control="select2" name="type">
                            <option value="0"> Sélectionner le type d'acquisition </option>
                            <option value="1"> Vente </option>
                            <option value="2"> Location </option>
                        </select>
                    </div>

                    <div class="modal-footer mt-3">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
