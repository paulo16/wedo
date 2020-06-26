@extends('backend.default')

@section('head')
<title>wedo | services</title>
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
                        <a
                            id="add-categorie" href="{{route('service.create')}}" class="btn btn-primary waves-effect waves-light"> AJOUTER <i
                                class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <br>
                <table id="services" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Date creation</th>
                            <th>Activer</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>

        </div>

    </div>
</div>
@stop
@section('js')

<script>
    $(document).ready(function () {
        var table = $('#services')
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
                    ajax: '{!! route("service.data") !!}',
                    data: {_token: '{{ csrf_token() }}'},
                    dom: '<"col-sm-6"l><"col-sm-6"f><"wrapper"<t><ip>>',
                    buttons: ['csv', 'excel', 'pdf'],
                    columns: [
                        { data: 'logo', name: 'logo',
                                render: function( data, type, row, meta ) {
                                    return "<img src=" + data + " height=\"50\"/>";
                                }
                         },
                        {data: 'titre', name: 'titre'},
                        {data: 'description', name: 'description'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'afficher', name: 'afficher',
                                render: function( data, type, row, meta ) {
                                    if(data =="Oui"){
                                       return '<a id="'+row.id+'"  class="badge badge-success desactiver"><b>' +data+'</b></a>';
                                    }else{
                                       return '<a id="'+row.id+'"  class="badge badge-info desactiver"><b>' +data+'</b></a>';
                                    }

                                }
                         },
                        {data: 'action', name: 'action'}
                    ],
                });
        //////////////////// Delete Service ///////////////////////////////////
        
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
            var url = '{{ route("service.delete", ":id") }}';
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


                     
        /////////////////// Désactiver un service //////////////////////////////
        $(document).on('click', '.desactiver', function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                 
                var service_id = $(this).attr("id");
                var formData = new FormData();
                        
                formData.append('id_service',$('#id-service').val());
                
                url = '{{ route("service.desactiver",':id') }}';
                url = url.replace(':id', service_id);
                type = "POST"; //for updating existing resource
                //console.log(formData.getAll('logo'));
                
                 //console.log(formData.getAll('logo'));
                 //console.log(formData.getAll('id_service'));
                $.ajax({
                    type: type,
                    url: url,
                    data: formData,
                    contentType: false,
                    processData: false
                }).done(function (service) {
                    table.ajax.reload(null, false);
                }).error(function () {
                    swal("{{Lang::get('contenu.admin.oops')}}", "{{Lang::get('contenu.admin.problem_server')}}", "error");
                });
            });



    });
</script>
@endsection