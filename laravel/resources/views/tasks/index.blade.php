@extends('layouts.app')

@section('listContent')

  @include('tasks.createTaskForm')
  @include('tasks.list')

@endsection