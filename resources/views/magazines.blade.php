@extends('layouts.master')

@section('title', 'Magazines')

@section('body')



<div class="col-lg-7 nogape col-md-7 col-sm-7 col-xs-12" id="background" style="height: 100%; background:url({{ asset('/public/img/magazinbg.jpg') }}); position:absolute; background-size: auto 100%; background-position: center center;"></div>

<div class="col-lg-6 nogape col-md-6 col-sm-6 col-xs-12 text-justify pull-right detailBox" id="scroller" style="padding: 100px 60px; background: #efefef; overflow: hidden; color: #939694;">
	
    <div class="col-lg-12 nogape">
        <h2>Our Published Magazines</h2>
    </div>
    
    <div class="col-lg-12 nogape">
            
            @foreach( $magazine as $magazines )
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 h395">
                    <a target="_blank" href="{{ asset( '/public/'.$magazines->magazine_pdf ) }}">
                        <img src="{{ asset( '/public/'.$magazines->magazine_picture ) }}" alt="{{ $magazines->magazine_number }}" class="img-thumbnail">
                    </a>
                    <div class="text-center">
                        {{ $magazines->magazine_number }}
                    </div>
                </div>
            @endforeach
        
    </div>

</div>

<!-- Starting Container -->


		



@endsection