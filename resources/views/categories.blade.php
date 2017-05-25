<!-- STORED IN RESOURCES/VIEWS/LAYOUTS/MASTER.APP -->

@extends('layouts.master')

@section('title', 'Categories')

@section('body')
<div id="background" class="col-lg-8 nogape col-md-8 col-sm-8 col-xs-12" style="height: 100%; background:url({{ asset('/public/img/categories.jpg') }}); position: fixed; z-index: -1; overflow: visible; background-size: auto 100%; background-position: center center;">

</div>

<div class="col-lg-6 nogape col-md-6 col-sm-6 col-xs-12 text-justify pull-right detailBox" id="scroller" style="padding: 100px 60px; background: #efefef; overflow: hidden; color: #939694;">
	<div class="col-lg-12 nogape text-justify">
        <h2>Categories</h2>
        <div class="col-lg-12 nogape">
             <div class="all-categories row nogape" id="grid">
            
                @foreach( $categories as $category )
                
                <!-- BOX Start -->
                <div class="single-cat-box col-lg-4 col-md-4 col-sm-4 col-xs-12  margin-bottom-10 nogape" id="grid-item" style="margin-bottom: 30px;">
                    <div class="cat-head pull-left full bg-white padding-15 ">
                        <div class="circle pull-left text-center" style="background-color: #{{ $category->color }}; padding-top: 12px;">
                            <i class="fa {{ $category->icon }}" style="color: #fff;" aria-hidden="true"></i>
                        </div> <h3 class="pull-left circel-h2">{{ $category->name }}</div>
                    <div class="cat-body pull-left full bg-offWhite padding-15">
                        
                        <ul class="list-only nogape">
                            @foreach( $subcategories as $subcategory )
                                @if( $category->id == $subcategory->parent_id)
                                    <li><a href="{{ URL::route('category-search', [$subcategory->id] ) }}">{{ $subcategory->name }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                        
                    </div>
                </div>
                <!-- /BOX End -->
                
                @endforeach
                
            </div>
        </div>
    </div>

</div>

@endsection