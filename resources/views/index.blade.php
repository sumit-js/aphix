@extends('master')

@section('content')

<div class="container mt-4">
    <div class="row">



        <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>

            <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m">
                @foreach($videoLists->items as $key => $item)
                <li>
                    <div class="col-12">
                        <a href="{{ route('watch', $item->id->videoId) }}">
                            <div class="card mb-4">
                                <img src="{{ $item->snippet->thumbnails->medium->url }}" class="img-fluid" alt="">
                                <div class="card-body">
                                    <h5 class="card-titled">
                                        {{ \Illuminate\Support\Str::limit($item->snippet->title, $limit = 50, $end = ' ...') }}
                                    </h5>
                                </div>
                                <div class="card-footer text-muted">
                                    Published at {{ date('d M Y', strtotime($item->snippet->publishTime)) }}
                                </div>
                            </div>
                        </a>
                    </div>
                </li>
                @endforeach

            </ul>

            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous
                uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next
                uk-slider-item="next"></a>

        </div>




    </div>
</div>
@endsection