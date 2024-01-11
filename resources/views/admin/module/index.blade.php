@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Module</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                        <li class="breadcrumb-item active">Module</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            @if (\Session::has('error'))
                                <div class="alert alert-danger">
                                    <ul>
                                        <li>{!! \Session::get('error') !!}</li>
                                    </ul>
                                </div>
                            @endif
                            <h3 class="card-title">Create</h3>
                            <div class="card-tools">
                                <div class="btn-group">
                                    <a href="{{ route('moduleCreate') }}" class="btn btn-sm btn-outline-info">Module
                                        create</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Info</th>
                                    <th>Image</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($modules as $key=>$module)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{!!  $module->name !!}</td>
                                        <td>{!!  $module->info !!}</td>
                                        <td>
                                            @if(!empty($module->image))
                                                <img src="{{ $module->image }}" alt="" width="100" height="200">
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route("moduleDelete", $module->id) }}" method="post">
                                                @csrf
                                                <div class="btn-group ">
                                                    <a href="{{ route('moduleShow',$module->id) }}"
                                                       class="btn btn-info btn-sm">
                                                        <span class="fa fa-eye"></span>
                                                    </a>
                                                    <a href="{{ route('moduleEdit',$module->id) }}"
                                                       class="btn btn-primary btn-sm"
                                                       style="margin-left: 5px; margin-right: 5px">
                                                        <span class="fa fa-edit"></span>
                                                    </a>
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            onclick="if (confirm('Вы уверены?')) { this.form.submit() } ">
                                                        <span class="fa fa-trash"></span></button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                                </tbody>
                                <tfooter>
                                    <tr>
                                        <td colspan="9">
                                            {{ $modules->links() }}
                                        </td>
                                    </tr>
                                </tfooter>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')

@endsection
