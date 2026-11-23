@extends('layouts.buyer')


@section('content')

<div class="row">
        @foreach($categories as $category)      
<div class="col-lg-4" onclick="passCategoryId(1)">
    <div class="step-box">
        <figure class="image">
          <a href="{{ route('buyer.category.product', $category->id ) }}">  <img src="{{ $category->image }}" alt="Image" class="cat-images" style="width:250px;"></a>
        </figure>
        <!-- end content -->
    </div>
    <!-- end step-box -->   
</div>
@endforeach
<!-- end col-4 -->



                <!-- end col-4 -->
            </div>
    
 
@endsection
