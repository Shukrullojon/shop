@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('global.add')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('dayIndex') }}">Day</a></li>
                        <li class="breadcrumb-item active">@lang('global.edit')</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">@lang('global.add')</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('dayUpdate',$day->id) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Module</label>
                                <label for="*" style="color:red">*</label>
                                <select name="module_id" id="module_id"
                                        class="form-control select2" {{ $errors->has('module_id') ? "is-invalid":"" }}
                                ">
                                @foreach($modules as $module)
                                    <option value="{{ $module->id }}" @if($module->id == $day->module_id) selected @endif>{{ $module->name }}</option>
                                    @endforeach
                                    </select>
                                    @if($errors->has('module_id'))
                                        <span
                                            class="error invalid-feedback">{{ $errors->first('module_id') }}</span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label>Name</label>
                                <label for="*" style="color:red">*</label>
                                <input type="text" name="name" value="{{ old('name',$day->name) }}"
                                       class="form-control {{ $errors->has('brand_name') ? "is-invalid":"" }}"
                                       autocomplete="off" required>
                                @if($errors->has('name'))
                                    <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit"
                                        class="btn btn-success float-right">@lang('global.save')</button>
                                <a href="{{ route('dayIndex') }}"
                                   class="btn btn-default float-left">@lang('global.cancel')</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
