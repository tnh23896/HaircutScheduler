@extends('client.templates.app')
@section('title', 'Tin tức')
@section('content')
    @include('client.templates.navbar2')
    <section class="position-relative footer-area">
        <div class="container bg-text-area">
            <h2>Tin Tức</h2>
        </div>
    </section>
    <section class="price-sec gap no-bottom" id="data-wrapper">

        @include('client.blog.list_blog')
    </section>
    <section class="py-120 mt-5">
        {{ $listBlogs->links('custom.pagination') }}
    </section>
    @include('client.templates.pagination')
@endsection
