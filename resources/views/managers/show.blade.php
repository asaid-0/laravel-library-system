@extends('layout')
    @section('mainContent')
    <h1>Show Admins</h1>
    <div>
        <strong>{{$mgr->name}}</strong>
        <strong>{{$mgr->email}}</strong>
        <strong>{{$mgr->isAdmin}}</strong>
        <strong><a href="{{$mgr->id}}/edit">Edit</strong>
    </div>

    @endsection('mainContent')