@extends('layouts.app')

@section('content')
    @include('wechats.show_fields')

    <div class="form-group">
           <a href="{!! route('wechats.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
