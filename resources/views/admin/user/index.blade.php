@extends('layouts.app')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        User
        <small>Admin</small>
      </h1>
    </section>
    <!-- /.content-header -->
    <section class="content">
      @include('layouts._flash')
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Daftar User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-sm-2">
                  <div class="form-group">
                    {!! Form::label('') !!}
                    {!! Form::button('<i class="fa fa-refresh"></i>', ['class' => 'btn btn-default btn-refresh']) !!}
                  </div>
                </div>
                <!-- /.col-sm-2 -->
              </div>
              <!-- /.row -->

              <table class="table-bordered table-hover table-condensed" id="table-master" style="width: 100%;">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 5%;">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center" style="width: 15%;">Username</th>
                    <th class="text-center" style="width: 20%;">Email</th>
                    <th class="text-center" style="width: 25%;">Role</th>
                    <th class="text-center" style="width: 7%;">Active</th>
                    <th class="text-center" style="width: 7%;">Action</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
              <!-- /#table-master.table-bordered table-hover table-condensed -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box box-primary -->
        </div>
        <!-- /.col-xs-12 -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@section('scripts')
  <script>
    let tableMaster;

    $(function() {
      initTableMaster();

      $('.btn-refresh').on('click', reloadTableMaster);
    });

    function initTableMaster() {
      tableMaster = $('#table-master').DataTable({
        columnDefs: [{
            targets: [0],
            searchable: false,
            render: (data, type, row, meta) => meta.row + meta.settings._iDisplayStart + 1
          },
          {
            targets: [4],
            render: data => data.join(' | ')
          },
          {
            targets: [5],
            render: data => data ? 'Ya' : 'Tidak'
          },
          {
            targets: [0, 2, 3, 5, 6],
            className: 'text-center'
          }
        ],
        aLengthMenu: [
          [5, 10, 15, 25, 50, 100, -1],
          [5, 10, 15, 25, 50, 100, 'ALL']
        ],
        iDisplayLength: 10,
        oLanguage: {
          sProcessing: '<div id="processing" style="margin: 0px; padding: 0px; position: fixed; right: 0px; top: 0px; width: 100%; height: 100%; background-color: rgb(102, 102, 102); z-index: 30001; opacity: 0.8;"><p style="position: absolute; color: White; top: 50%; left: 45%;"><img src="{{ asset('images/ajax-loader.gif') }}"></p></div>Processing...'
        },
        processing: true,
        serverSide: true,
        responsive: true,
        order: [
          [1, 'asc']
        ],
        ajax: '{{ route('user.dashboard') }}',
        columns: [{
            data: null,
            name: null
          },
          {
            data: 'name',
            name: 'name'
          },
          {
            data: 'username',
            name: 'username'
          },
          {
            data: 'email',
            name: 'email'
          },
          {
            data: 'role',
            name: 'role'
          },
          {
            data: 'status_active',
            name: 'status_active'
          },
          {
            data: null,
            name: null
          },
        ]
      });
    }

    function reloadTableMaster() {
      tableMaster.ajax.reload();
    }
  </script>
@endsection
