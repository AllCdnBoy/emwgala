@extends('layouts.app')
@section('content')
    {{ html()->form()->action(route('auction.save'))->open() }}

    {{ html()->label('Enter Bid', 'number') }}
    {{ html()->number('number')->required() }}
    {{ html()->submit('Save') }}

    {{ html()->form()->close() }}

@endsection
