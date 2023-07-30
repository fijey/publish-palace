@extends('layouts.app')

@section('content')
     <livewire:component.navbar></livewire:component.navbar>   
     <livewire:pages.book.book from='purchased' title="Purchased Collection"/></livewire:pages.book.book/>
@endsection