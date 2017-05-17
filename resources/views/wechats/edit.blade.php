@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Wechat</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($wechat, ['route' => ['wechats.update', $wechat->id], 'method' => 'patch']) !!}

            @include('wechats.fields')

            {!! Form::close() !!}
        </div>
@endsection
