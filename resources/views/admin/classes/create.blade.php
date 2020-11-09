@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    Create Class
    </div>

    <div class="card-body">
        <form action="{{ route("admin.class.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('class') ? 'has-error' : '' }}">
                <label for="class">Class Name*</label>
                <input type="text" id="class" name="class" class="form-control" value="{{ old('title', isset($classes) ? $classes->class : '') }}">
                @if($errors->has('class'))
                    <p class="help-block">
                        {{ $errors->first('class') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.permission.fields.title_helper') }}
                </p>
                <label for="section_id">Section*</label>
                <select name="section_id" id="section_id" class="form-control">
                    @foreach($sections as $key => $section)
                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection