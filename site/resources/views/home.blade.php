@extends('Layout.app')
@section('title','Home')
@section('content')
@include('Component.Homebanner')
@include('Component.HomeService')
@include('Component.HomeCourse')
@include('Component.HomeProjects')
@include('Component.HomeContact')
@include('Component.HomeReview')
@endsection

