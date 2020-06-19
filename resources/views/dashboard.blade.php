@extends('layouts.app')
@section('content')
    
    <div id="app" class="row-fluid">                   
        <dashboard-menu></dashboard-menu>
        <div class="content-dashboard">
            <keep-alive> 
                <router-view/>                                
            </keep-alive>
        </div>
    </div>
@endsection
