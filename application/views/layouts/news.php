@extends('layouts.base',[
'page' => 'News'
])
@section('content')
<div class="d-none d-md-none d-lg-block d-xl-block">
    <section id="page-title" class="page-title-parallax page-title-dark include-header" style="padding: 315px 0; background-image: url('{{asset('sch-asset/images/news/banner-news.jpeg')}}'); background-size: cover; background-position: center center;"
        data-bottom-top="background-position:0px 400px;" data-top-bottom="background-position:0px -500px;">
    </section>
</div>
<div class="d-block d-md-block d-lg-none d-xl-none">
    <section id="page-title" class="page-title-parallax page-title-dark include-header" style="background-image: url('{{asset('sch-asset/images/news/banner-news.jpeg')}}'); width: 100%; height: 500px;background-size: cover; background-position: center center;">
    </section>
</div>
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="heading-block">
                <span style="letter-spacing: 0.25em; font-size: 26px;">LATEST NEWS | KJM</span>
            </div>
            <div class="row gutter-40 col-mb-80">
                @yield('post-content')
                <!-- Sidebar
                ============================================= -->
                <div class="sidebar col-lg-3">
                    <div class="sidebar-widgets-wrap">
                        <div class="d-none d-md-none d-lg-block d-xl-block">
                            <div class="widget clearfix">
                                <h4>Featured</h4>
                                <div class="posts-sm row col-mb-30" id="post-list-sidebar">
                                    <div class="entry col-12">
                                        <div class="grid-inner row no-gutters">
                                            @php
                                                $featured = Helper::getFeaturedNews();
                                            @endphp
                                            <div class="col-auto">
                                                <div class="entry-image">
                                                    @if ($featured == null)
                                                    <a href="#">
                                                        <img src="{{asset('sch-asset/images/news/news-sample-1.jpg')}}"
                                                            alt="Open Imagination">
                                                    </a>
                                                    @else
                                                    <a
                                                        href="{{ route('news.frontView.detail', $featured->slug) }}">
                                                        <img src="{{ asset('storage/' . $featured->cover_image) }}"
                                                            alt="Image">
                                                    </a>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col pl-3">
                                                <div class="entry-title">
                                                    <h4>
                                                        <a
                                                            href="{{ $featured ? route('news.frontView.detail', $featured->slug) : '#' }}">
                                                            {{ $featured ? $featured->title : 'KJM News' }}
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div class="entry-meta">
                                                    <ul>
                                                        <li> {{ $featured
                                                            ?
                                                            \Carbon\Carbon::parse($featured->created_at)->format('d
                                                            F Y')
                                                            : \Carbon\Carbon::now()->format('d F Y') }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-none d-md-none d-lg-block d-xl-block mt-4">
                        <div class="widget clearfix">
                            <h4>Latest News</h4>
                            <div class="posts-sm row col-mb-30" id="post-list-sidebar">
                                @php
                                    $latest = Helper::getLatestNews();
                                @endphp
                                @foreach ($latest as $news)
                                <div class="entry col-12">
                                    <div class="grid-inner row no-gutters">
                                        <div class="col-auto">
                                            <div class="entry-image">
                                                <a href="#"><img src="{{ asset('storage/' . $news->cover_image) }}"
                                                        alt="Image">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col pl-3">
                                            <div class="entry-title">
                                                <h4>
                                                    <a href="{{ route('news.frontView.detail', $news->slug) }}">
                                                        {{ $news->title }}
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="entry-meta">
                                                <ul>
                                                    <li>{{ \Carbon\Carbon::parse($news->created_at)->format('d F Y') }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="widget clearfix">
                        <h4>Archive</h4>
                        <div class="posts-sm row col-mb-30" id="post-list-sidebar">
                            <div class="entry col-12">
                                <div class="grid-inner row no-gutters">
                                    <div class="col pl-0">
                                        <div class="entry-meta">
                                            <ul style="display: list-item!important;">
                                                @php
                                                    $archives = Helper::getArchiveNews();
                                                @endphp
                                                @foreach ($archives as $archive)
                                                <li>
                                                    <a
                                                        href="{{ route('news.frontView.archive', ['month' => $archive->month, 'years' => $archive->years]) }}">
                                                        {{ $archive->month_year }} ({{ $archive->count }})
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-none d-md-none d-lg-block d-xl-block mt-4">
                        <div class="widget clearfix">
                            <h4>Tag</h4>
                            <div class="tagcloud">
                                @php
                                    $tags = Helper::getByTags();
                                @endphp
                                @foreach ($tags as $tag)
                                <a href="{{ route('news.frontView.tag', ['id' => $tag->id]) }}">#{{ $tag->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .sidebar end -->
            </div>
        </div>
    </div>
</section>
@endsection
