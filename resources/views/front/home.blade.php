@extends('frontend')

@section('content')
    <header id="home" class="header">
        <img src="https://download.unsplash.com/photo-1421757295538-9c80958e75b0" alt="an image"
             class="responsive-img"/>
    </header>
    <section id="about" class="light-blue white-text">
        @include('front.about')
    </section>
    <section id="portfolio" class="section">
        @include('front.portfolio-partial')
    </section>
    <section class=" light-blue white-text">
        <section id="blog" class="section container ">
            @include('front.blog-partial')
        </section>
    </section>
    <section id="contact" class="section container">
        @include('front.contact')
    </section>
    </div>

@endsection
