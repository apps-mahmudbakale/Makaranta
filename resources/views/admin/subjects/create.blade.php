@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    Create Subject
    </div>

    <div class="card-body">
        <form action="{{ route("admin.subject.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('class') ? 'has-error' : '' }}">
                <label for="name">Subject Name*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('title', isset($subjects) ? $subjects->name : '') }}">
                @if($errors->has('class'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
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