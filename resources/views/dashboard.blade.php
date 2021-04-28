@extends('template/main')

@section('title', "NerdVPN Admin")

@section('content')
<div class="container-fluid">
    <h1 style="margin-top:80px">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Males bikin tampilan lain lagi!</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>
            VPN Server List
        </div>
        <div class="card-body">
            <div class="table-responsive"  style="overflow: hidden">
                <div class="text-right mb-2"><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modalPush">Add Server</button></div>
                <table class="table table-bordered" id="table_vpn" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Flag String</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_vpn as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->flag}}</td>
                                <td>{{$item->status == 1 ? "PRO User": "Free User"}}</td>
                                <td>
                                    <form method="POST">
                                        {{ csrf_field() }}
                                        <input type="submit" name="submit" value="Delete1" class="btn btn-danger"/>
                                        <input type="hidden" value={{$item->id}} name="id">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!--Modal: modalPush-->
            <div class="modal fade" id="modalPush" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <form method="POST" action="">
                {{ csrf_field() }}
                <div class="modal-dialog modal-notify modal-info" role="document">
                    <div class="modal-content">
                        <div class="modal-header d-flex justify-content-center">
                            <p class="heading">Add Server Here</p>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <label class="small mb-1" for="name">Nama (Country)</label>
                                <input name="name" class="form-control py-4" id="name" type="text" placeholder="Nama Country server vpn..." />
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="Flag"> ID / URL Flag</label>
                                <input name="Flag" class="form-control py-4" id="Flag" type="Flag" placeholder="Flag Country server vpn..." />
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="config">Config OVPN</label>
                                <textarea name="config" class="form-control py-4" id="config" type="text" placeholder="Isi Config OVPN server vpn..."></textarea>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="username">Username VPN</label>
                                <input name="username" class="form-control py-4" id="username" type="text" placeholder="Username buat config server vpn..." />
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="password">Password VPN</label>
                                <input name="password" class="form-control py-4" id="password" type="password" placeholder="Password buat config server vpn..." />
                            </div>
                            <div class="form-check">
                                <input name="status" class="form-check-input" id="status_free" type="radio" value="0" checked/>
                                <label class="form-check-label" for="status_free">Free User</label>
                            </div>
                            <div class="form-check">
                                <input name="status" class="form-check-input" id="status_pro" type="radio" value="1"/>
                                <label class="form-check-label" for="status_pro">Pro User</label>
                            </div>

                        </div>

                        <div class="modal-footer flex-center">
                            <input type="submit" value="Add" name="submit" class="btn btn-info"/>
                            <a type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">Closed</a>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('body.bottom')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
    $('#table_vpn').DataTable();
} );
</script>
@endsection

@section('head.bottom')
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
@endsection
