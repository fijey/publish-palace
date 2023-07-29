@extends('layouts.app')

@section('content')
     <livewire:component.navbar></livewire:component.navbar>   
     <livewire:pages.book.book from='explore' title="Public Collection"/></livewire:pages.book.book/>
@endsection