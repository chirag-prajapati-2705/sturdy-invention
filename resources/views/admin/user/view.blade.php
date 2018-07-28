@extends('admin.layouts.app')

@section('content')
    @if(!empty($users))
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tables</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        DataTables Advanced Tables
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($users as $user)

                                    <tr class="odd gradeX">
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td><a class="btn btn-danger btn-xs btn btn-xs btn-danger delete-btn"
                                               href="{!! URL('admin/user/edit/'.$user->id) !!}">
                                                <i class="fa fa-edit" title="" data-placement="top"
                                                   data-toggle="tooltip"
                                                   data-original-title="Delete"></i>
                                            </a> <a class="btn btn-danger btn-xs btn btn-xs btn-danger delete-btn"
                                                    href="{!! URL('admin/user/destroy', $user->id) !!}">
                                                <i class="fa fa-trash" title="" data-placement="top"
                                                   data-toggle="tooltip"
                                                   data-original-title="Delete"></i>
                                            </a></td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection


