@extends('adminlte.master') 

@section('content')
    <div class='mt-4 ml-4'>
        <h3> {{ $list->judul }}</h3>
        <p> {{ $list->isi }} </p>
    </div>
@endsection