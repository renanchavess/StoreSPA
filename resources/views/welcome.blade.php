@extends('layouts.app')
@section('content')
    <div id="app" class="row-fluid">
        <div class="">
            <keep-alive>          
                <router-view/>
            </keep-alive>
        </div>           
    </div>
@endsection
