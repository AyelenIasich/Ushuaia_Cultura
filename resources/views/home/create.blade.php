@extends('theme.base')

@section('content')

<div  class="container   mt-5">
    <div class="row pt-4 pb-5 ">
        <div class="col-11 col-md-8 col-lg-7   col-xl-5 mx-auto form p-4 mb-5">
            <form action="{{ url('/home') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h1 class="p">Creación de carousel</h1>
                @include('home.form')
            </form>
        </div>
    </div>
</div>
@endsection
