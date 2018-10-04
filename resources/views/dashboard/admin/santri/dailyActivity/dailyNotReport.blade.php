@extends('dashboard.masterdashboard')
@section('title')
Santri Tidak Laporan
@endsection
@section('content')
{{-- =================================================================== --}}
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    @include('layouts.patrials.alerts')
                    <h1 class="page-header">Santri Tidak Laporan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="blue">
                                Santri Tidak Laporan
                            </h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dailyActivity">
                                <thead>
                                    <tr>
                                        <th width="100" >Nama</th>
                                        <th width="100" >Jurusan</th>
                                    </tr>
                                </thead>
                                <tbody class="rfontsize">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{-- ====================================================== --}}
@endsection
@section('js')
    <script type="text/javascript">
    function getLastUrl(){
        var url = window.location.pathname
        var split = url.split("/")
        var last = split.pop()
        return last
    }
        $('#dailyActivity').DataTable({
            order: [[1,'desc']],
            processing: true,
            serverSide: true,
            ajax: "/api/NotReportActivity/"+getLastUrl(),
            columns:[
                {data: "name", name: "name"},
                {data: "department", name: "department"}
            ],
        })
    </script>
@endsection