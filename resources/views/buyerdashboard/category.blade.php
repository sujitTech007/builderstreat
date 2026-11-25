@extends('layouts.buyer')


@section('content')

<div class="page-head">
    <div>
        <h1>Browse Categories</h1>
        <p>Choose a category to explore available materials.</p>
    </div>
</div>

<section class="grid-3">
    @foreach($categories as $category)
    <a class="material-card" href="{{ route('buyer.category.product', $category->id) }}" onclick="passCategoryId(1)">
        <img src="{{ $category->image }}" alt="{{ $category->name }}">
        <div class="body">
            <h3>{{ $category->name }}</h3>
            <p class="help">Browse materials in this category.</p>
        </div>
    </a>
    @endforeach
</section>
@endsection
