@extends('layouts.admin')
@section('content')
<div class="row">
    
    <div style="margin-bottom: 10px;">
        <div class="col-lg-12">
            <a type="button" data-bs-toggle="modal" data-bs-target="#standard-modal" class="btn btn-success" href="{{ route("admin.tiers.create") }}">
                Nouveau Tiers
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3> Liste des Tiers </h3> 
        </div>

        <div class="card-body">
    
                <table id="basic-datatable" class="table table-bordered table-striped table-hover datatable datatable-Client">
                    <thead class="table-dark">
                        <tr>
                            <th width="10">

                            </th>
                        
                            <th>
                                Tiers
                            </th>
                            <th>
                                Adresse 
                            </th>

                            <th>
                                Téléphone
                            </th>
                        
                            <th>
                                Email 
                            </th>
                            <th>
                                Type 
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tiers as $key => $t)
                            <tr data-entry-id="{{ $t->id }}">
                                <td>

                                </td>
                            
                                <td>
                                    {{ $t->nom_complet ?? '' }}
                                </td>
                                <td>
                                    {{ $t->adresse ?? '' }}
                                </td>
                            
                                <td>
                                    {{ $t->telephone ?? '' }}
                                </td>
                                <td>
                                    {{ $t->email ?? '' }}
                                </td>
                                <td>
                                    @if($t->type_tiers == 1)
                                       <span class="badge bg-success text-light rounded-pill"> Propriétaire </span>
                                    @elseif($t->type_tiers == 2) 
                                        <span class="badge bg-primary rounded-pill"> Client </span>
                                    @elseif($t->type_tiers == 3) 
                                        <span class="badge bg-secondary rounded-pill"> Propriétaire / Client </span>
                                    @elseif($t->type_tiers == 4) 
                                        <span class="badge bg-warning rounded-pill"> Prospect </span>
                                    @endif 
                                </td>

                                <td>
                                    <a class="btn btn-sm btn-primary uil-eye" href="{{ route('admin.tiers.show', $t->id) }}">
                                    
                                    </a>
                                    
                                    <a class="btn btn-sm btn-info uil-pen" href="{{ route('admin.tiers.edit', $t->id) }}">
                                    
                                    </a>
                                

                            
                                    <form action="{{ route('admin.tiers.destroy', $t->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

    <div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Enregistrer un nouveau Tiers</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
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
                                <option value="3"> Propriétaire / Client </option> 
                                <option value="4"> Prospect </option> 
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
                      
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
               
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- /.modal -->
</div> 
@endsection
@section('scripts')
@parent
<script>
     $(function () {
    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
    @can('t_delete')
        let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
        let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('admin.tiers.massDestroy') }}",
            className: 'btn-danger',
            action: function (e, dt, node, config) {
            var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                return $(entry).data('entry-id')
            });

            if (ids.length === 0) {
                alert('{{ trans('global.datatables.zero_selected') }}')

                return
            }

            if (confirm('{{ trans('global.areYouSure') }}')) {
                $.ajax({
                headers: {'x-csrf-token': _token},
                method: 'POST',
                url: config.url,
                data: { ids: ids, _method: 'DELETE' }})
                .done(function () { location.reload() })
            }
            }
        }
        dtButtons.push(deleteButton)
    @endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
   
    lengthMenu: [0, 5, 10, 20, 50, 100, 200, 500],
  });
  $('.datatable-Client:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection