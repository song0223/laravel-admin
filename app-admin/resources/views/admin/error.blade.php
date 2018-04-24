@extends('admin.admin')
@section('content')
    @if (count($errors) > 0)
        <p class="error-alert">
            @foreach ($errors->all() as $key => $error)
                {{$key + 1}}、 {{ $error }}
            @endforeach
        </p>
    @endif
@stop