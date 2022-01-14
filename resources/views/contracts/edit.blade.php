@extends('layouts.app')
@section('content')
  <form action="{{ route('contracts.update', $contract) }}" method="POST">
    @csrf
    @method('PUT')
    @include('contracts._form')
    <button type="submit" class="btn btn-warning">Update</button>
  </form>
@stop
