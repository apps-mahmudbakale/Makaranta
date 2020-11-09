@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Subject
    </div>

    <div class="card-body">
        <form action="{{ route("admin.subject.update", [$subject->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Subject Name*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('title', isset($subject) ? $subject->name : '') }}">
                @if($errors->has('name'))
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