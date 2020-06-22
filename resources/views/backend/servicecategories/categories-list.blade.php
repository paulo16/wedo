@extends('backend.default')

@section('head')
<title>wedo | catégories</title>
@endsection

@section('content')
<div>
    <!-- All Property Info -->
    <div class="tr-single-box">

        <div class="tr-single-header">
            <h4><i class="ti-share"></i>Category</h4>
            <div class="btn-group fl-right">
                <button type="button" class="btn-trans" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ti-more"></i>
                </button>
                <div class="dropdown-menu pull-right animated flipInX">
                    <a href="#">Published (58)</a>
                    <a href="#">In Review (02)</a>
                    <a href="#">Expired (07)</a>
                </div>
            </div>
        </div>

        <div class="tr-single-body">
            <div class="pr-switch-caption">
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="m-b-30">
                        <button
                            id="add-categorie" class="btn btn-primary waves-effect waves-light"> AJOUTER <i
                                class="fa fa-plus"></i></button>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <br>
                <table id="categories" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Date creation</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>

        </div>

    </div>
    <!-- MODAL Add catégorie -->
    @include('backend.servicecategories.add-categorie')
    <!-- MODAL-->
</div>

@stop
@section('js')

<script>
    $(document).ready(function () {
        var table = $('#categories')
                .DataTable({
                    "oLanguage": {
                        "sProcessing": "{{ Lang::get('datatable.sProcessing') }}",
                        "sSearch": "{{ Lang::get('datatable.sSearch') }}",
                        "sLengthMenu": "{{ Lang::get('datatable.sLengthMenu') }}",
                        "sInfo": "{{ Lang::get('datatable.sInfo') }}",
                        "sInfoEmpty": "{{ Lang::get('datatable.sInfoEmpty') }}",
                        "sInfoFiltered": "{{ Lang::get('datatable.sInfoFiltered') }}",
                        "sInfoPostFix": "{{ Lang::get('datatable.sInfoPostFix') }}",
                        "sLoadingRecords": "{{ Lang::get('datatable.sLoadingRecords') }}",
                        "sZeroRecords": "{{ Lang::get('datatable.sZeroRecords') }}",
                        "sEmptyTable": "{{ Lang::get('datatable.sEmptyTable') }}",
                        "oPaginate": {
                            "sFirst": "{{ Lang::get('datatable.sFirst') }}",
                            "sPrevious": "{{ Lang::get('datatable.sPrevious') }}",
                            "sNext": "{{ Lang::get('datatable.sNext') }}",
                            "sLast": "{{ Lang::get('datatable.sLast') }}"
                        },
                        "oAria": {
                            "sSortAscending": "{{ Lang::get('datatable.sSortAscending') }}",
                            "sSortDescending": "{{ Lang::get('datatable.sSortDescending') }}"
                        }
                    },
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('categoriesservice.data') !!}',
                    data: {_token: '{{ csrf_token() }}'},
                    dom: '<"col-sm-6"l><"col-sm-6"f><"wrapper"<t><ip>>',
                    buttons: ['csv', 'excel', 'pdf'],
                    columns: [
                        { data: 'photo', name: 'photo',
                                render: function( data, type, full, meta ) {
                                    return "<img src=" + data + " height=\"50\"/>";
                                }
                         },
                        {data: 'nom', name: 'nom'},
                        {data: 'description', name: 'description'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'action', name: 'action'}
                    ],
                });
        //////////////////// Delete Categorie ///////////////////////////////////
        
        $(document).on('click', '.delete', function () {
            var id = $(this).data('id');
            var swal_ot = {
                title: "{{Lang::get('contenu.admin.sure')}}",
                text: "{{Lang::get('contenu.admin.subtext_sure')}}",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "{{Lang::get('contenu.admin.confirm_btn')}}",
                cancelButtonText: "{{Lang::get('contenu.admin.cancel_btn')}}",
                closeOnConfirm: false
            };
            var url = '{{ route("categoriesservice.delete", ":id") }}';
            url = url.replace(':id', id);
            swal(swal_ot, function () {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {_token: '{{ csrf_token() }}'},
                }).done(function (result) {
                    //var rep= JSON.stringify(reponse);
                    //console.log(result);
                    if (result.reponse == "impossible") {
                        swal("{{Lang::get('contenu.impossible')}}", "{{Lang::get('contenu.sub_impossible')}}", "warning");
                    } else {
                        swal("{{Lang::get('contenu.admin.supprime')}}", "{{Lang::get('contenu.admin.sub_sup')}}", "success");
                    }
                    table.ajax.reload(null, false);

                }).error(function () {
                    swal("{{Lang::get('contenu.admin.oops')}}", "{{Lang::get('contenu.admin.problem_server')}}", "error");
                });
            });
        });




        //////////////////// show update Catégorie ////////////////////////////////////
        
        $(document).on('click', '.update', function () {
            var id = $(this).data('id');
            var url = '{{ route("categoriesservice.findinfo", ":id") }}';
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'GET',
            }).done(function (categorie) {
                console.log(categorie.description);
                $('#id-categorie').val(categorie.id);
                $('#nom').val(categorie.nom);
                $('#description').val(categorie.description);
                $('#image').val();
                $('#sousmettre-categorie').val("update");
                $('#modal-categorie').modal('show');
            }).error(function () {
                swal("{{Lang::get('contenu.admin.oops')}}", "{{Lang::get('contenu.admin.problem_server')}}", "error");
            });
        });
        
        //////////////////// show update Catégorie ////////////////////////////////////
        
         $("#sousmettre-categorie").click(function (e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                e.preventDefault();
                
                var formData = new FormData();
                        
                formData.append('id_categorie',$('#id-categorie').val());
                formData.append('photo', $('#image')[0].files[0]);
                formData.append('nom', $('#nom').val());
                formData.append('description', $('#description').val());

                var state = $('#sousmettre-categorie').val();
                var categorie_id = $('#id-categorie').val();
                console.log($('#id-categorie').val());
                var type = "POST"; //for creating new resource
                var url = '{{ route("categoriesservice.store") }}';
                if (state == "update") {
                    url = '{{ route("categoriesservice.update",':id') }}';
                    url = url.replace(':id', categorie_id);
                    type = "PUT"; //for updating existing resource
                }
                 console.log(formData);
                $.ajax({
                    type: type,
                    url: url,
                    data: formData,
                    contentType: false,
                    processData: false
                }).done(function (categorie) {
                    if (state == "add") { //if user added a new record
                        swal("{{Lang::get('contenu.admin.ajout_titre')}}", "{{Lang::get('contenu.admin.ajout_message')}}", "success");
                        table.ajax.reload(null, false);
                        ;
                    } else { //if user updated an existing record
                        swal("{{Lang::get('contenu.admin.update_titre')}}", "{{Lang::get('contenu.admin.update_message')}}", "success");
                        table.ajax.reload(null, false);
                    }
                    $('#form-categorie').trigger("reset");
                    $('#modal-categorie').modal('hide');
                }).error(function () {
                    swal("{{Lang::get('contenu.admin.oops')}}", "{{Lang::get('contenu.admin.problem_server')}}", "error");
                });
            });

         
            
            /////////////////// click add categorie //////////////////////////////
            $('#add-categorie').click(function () {
                $('#sousmettre-categorie').val("add");
                $('#form-categorie').trigger("reset");
                $('#modal-categorie').modal('show');
            });



    });
</script>
@endsection