@extends('layouts.app')
@section('content')
    <div id="app" class="row-fluid">
        <div class="col-12">
            
            <menu-bar></menu-bar>
            <keep-alive> 
                <router-view/>                                
            </keep-alive> 
        </div>           
    </div>
@endsection
