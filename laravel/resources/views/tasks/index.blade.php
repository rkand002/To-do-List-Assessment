@extends('layouts.master')

@section('content')

  @include('tasks.createTaskForm')
  @include('tasks.list')

@endsection