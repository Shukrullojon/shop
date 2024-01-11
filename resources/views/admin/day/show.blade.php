
@extends('layouts.admin')
@section('content')

    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Day Show
                            <a href="" class="btn btn-sm btn-outline-info float-right">Редактировать</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Module</th>
                                    <th>@if($day->module){{ $day->module->name }}@endif</th>
                                </tr>

                                <tr>
                                    <th>Name</th>
                                    <th>{{ $day->name }}</th>
                                </tr>
                            </table>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
