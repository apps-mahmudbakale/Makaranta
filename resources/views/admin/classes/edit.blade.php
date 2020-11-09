@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Class
    </div>

    <div class="card-body">
        <form action="{{ route("admin.class.update", [$class->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('class') ? 'has-error' : '' }}">
                <label for="class">Class Name*</label>
                <input type="text" id="class" name="class" class="form-control" value="{{ old('title', isset($class) ? $class->class : '') }}">
                @if($errors->has('class'))
                    <p class="help-block">
                        {{ $errors->first('class') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.permission.fields.title_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection