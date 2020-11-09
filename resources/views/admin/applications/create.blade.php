@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create New Child
    </div>

    <div class="card-body">
        <form action="{{ route("admin.users.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <div class="col-md-12">
                <label>Card Number:</label>
              <input type="text" id="card_n" name="card_number" pattern="[a-z A-Z0-9]+" required class="form-control"/>
              </div>
            </div>
            <div class="col-lg-12" id="form">
            <div class="form-group row  {{ $errors->has('name') ? 'has-error' : '' }}">
                <div class="col-lg-6">
                <label for="name">First Name *</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}">
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.user.fields.name_helper') }}
                </p>
              </div>
                <div class="col-lg-6">
                <label for="name">Other Names*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}">
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.user.fields.name_helper') }}
                </p>
               </div>
            </div>
            <div class="form-group row  {{ $errors->has('name') ? 'has-error' : '' }}">
                <div class="col-lg-6">
                <label for="name">Gender *</label>
                <select name="gender" id="gender" class="form-control">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
              </div>
                <div class="col-lg-6">
                <label for="name">Date of Birth*</label>
                <div class="input-group date" data-date-format='mm/dd/yyy'>
                       <input type="text" name="dob" class="form-control" placeholder="mm/dd/yyy">
                       <div class="input-group-addon">
                         <i class="fa fa-calendar"></i>
                       </div>
                   </div>
               </div>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('global.user.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}">
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.user.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">{{ trans('global.user.fields.password') }}</label>
                <input type="password" id="password" name="password" class="form-control">
                @if($errors->has('password'))
                    <p class="help-block">
                        {{ $errors->first('password') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.user.fields.password_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
$('.input-group.date').datepicker({format:"mm/dd/yyyy"});
   $('#form').hide();

   $('card_n').forcusout((e)=>{
        let card = $('card_n').val();

        if (card === '') {

        }else {
            
        }
   })
</script>
@endsection