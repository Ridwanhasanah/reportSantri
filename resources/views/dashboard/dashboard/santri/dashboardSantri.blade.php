<div class="row">
    <div class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a onclick="createActivity()" class="btn btn-danger btn-lg btn-dashboard "><i class="fa fa-thumb-tack fa-fw"></i> Tambah Kegiatan</a><br>
        <a class="btn btn-info btn-lg btn-dashboard"><i class="fa fa-bullseye fa-fw"></i> Tambah Target</a><br>
        <a href="{{route('amaliyahcheck')}}" class="btn btn-warning btn-lg btn-dashboard"><i class="fa fa-moon-o fa-fw"></i> Isi Amaliyah</a><br>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-thumb-tack fa-fw"></i> Kegiatan Ku
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="list-group" id="activity">
                    @foreach ($activities as $item)
                        <a class="list-group-item">
                            <i class="fa fa-thumb-tack fa-fw"></i> {{$item->activity}}
                        </a>
                    @endforeach
                </div>
                <!-- /.list-group -->
                <a href="#" class="btn btn-default btn-block">View All Alerts</a>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <div class="col-lg-5 col-md-4 col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bell fa-fw"></i> Target Ku
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="list-group">
                </div>
                <!-- /.list-group -->
                <a href="#" class="btn btn-default btn-block">View All Alerts</a>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    @include('dashboard.activity.createActivity'){{-- menambahkan modal form tambah kegiatan --}}
</div>
@section('js')
    <script type="text/javascript">
        var tableActivity = $('#activity-table').DataTable({
                    order: [[1, 'desc']],
                    processing: true,
                    serverSide: true,
                    ajax: "{{route('api.activity')}}",
                    columns:[
                      {data: 'activity', name: 'activity'}
                    ]
                  })
        function refresh(){
            // var url = "{{route('dashboard.home')}}";
            var value = "@foreach ($activities as $item)<a class='list-group-item'><i class='fa fa-thumb-tack fa-fw'></i> {{$item->activity}}</a>@endforeach"
            var vLoad = load(value)
            return $('div#activity').replaceWith(vLoad)
        }

        function createActivity(){
            save_method = "add";
            $('input[name=_method]').val('POST');
            $('#modal-form').modal('show');
            $('#modal-form form')[0].reset();
            $('#modal-form form').validator().on('submit',function(e){
                var url = "{{url('activity')}}";

                $.ajax({
                    url: url,
                    type: "POST",
                    data: $('#modal-form form').serialize(),
                    success: function(data){
                        $('#modal-form').modal('hide');
                        // $('#activity').ajax.reload();
                        refresh()
                        swal({
                            title: 'Berhasil',
                            type: 'success',
                            timer: '1500'
                        })
                    },error : function(){
                        swal({
                            title: 'Oops',
                            text: 'Something Error',
                            type: 'error',
                            timer: '15000'
                        })
                    }
                });
                return false;
            })
        }
    </script>
@endsection