@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>

@endsection

@section('content')
     <div class="content-wrapper">

        @include('partials.content-header',['name' => 'Trang chủ', 'key'=> 'home'])


    </div>
 @endsection

