@extends('layouts.app') @section('content') 
<section>
    {{-- @include('shared.errors', ['status' => 'complete']) --}}
    <div class="products">
        @each('partial.product', $products, 'product')
    </div>
    
    <div class="links">
        {{ $products->links('vendor.pagination.default') }}
    </div>
</section>
@endsection
