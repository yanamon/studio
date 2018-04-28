@extends('layouts.header-footer')

@section('body')

<div class="content-wrapper">

    <!--banner-->
    <div class="listings-banner">
        <br>
        <div class="row">
            @if(isset(Auth::user()->previlege))
                @if(Auth::user()->previlege!=1)
                    <h1 style="color:white">Punya Studio Musik?&nbsp</h1>
                    <a href="{{ route('home.regisStudio') }}"><button class="btn btn-outline-warning">Daftarkan Studio</button></a>
                @endif
            @else 
                <h1 style="color:white">Punya Studio Musik?&nbsp</h1>
                <a href="{{ route('home.regisStudio') }}"><button class="btn btn-outline-warning">Daftarkan Studio</button></a>
            @endif
        </div>            
        <div class="select-fields">
            <div class="sel">
                <input type"text" style="margin-bottom:0px" placeholder="Cari">
            </div>
            <div class="sel">
                <input type"text" style="margin-bottom:0px" placeholder="Lokasi">
            </div>
            <button class="btn ui-btn dark-blue">Submit</button>
        </div>
    </div>
    <!--end banner-->

    <!--switcher-->
    <div class="switcher">
        <div><h6>Grid Layout V2</h6></div>
        <div>
            <em>Customize Your Feed</em>&#8195;
            <a href="#" data-toggle="modal" data-target="#feedModal"><i class="fa fa-sliders"></i></a>
            <a href="#" class="active"><i class="fa fa-th"></i></a>
            <a href="listing_two.html"><i class="fa fa-list"></i></a>
            <a href="index.html"><i class="fa fa-home"></i></a>
        </div>
    </div>
    <!--end switcher-->

    <!--listings-->
        <div class="listings">
            <div class="row">        
                <div class="col-lg-9 col-md-12">
                    @foreach($studioMusiks as $i => $studioMusik)
                    <div class="col-lg-12 col-md-12">
                        <div class="listing-two-item">
                            <div class="cover-photo">
                                <img style="height:180px" src="{{ asset('/image/studio-musik/'.$studioMusik->foto_studio_musik) }}" alt="">
                                <div class="cover-photo-hover">
                                    <div class="share-like-two">
                                        <a href="#"><i class="fa fa-heart-o"></i></a>
                                        <a href="#"><i class="fa fa-share-alt"></i></a>
                                        <a href="#"><i class="fa fa-bookmark-o"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="listing-two-item-info">
                                <div class="user-two-pic">
                                    <img src="img/avatar2.jpg" alt="">
                                </div>
                                <strong>{{$studioMusik->nama_studio_musik}}</strong>
                                <p>
                                        {{ $studioMusik->lokasi }}
                                </p>
                                <div class="rating-bt">                        
                                    <div class="rating-stars">
                                        <i class="fa fa-dollar yel"></i>
                                        <span style="color:#337ab7; font-size:16px;">Mulai dari Rp.50.000/jam</span>
                                    </div>
                                    <a href="{{ 'detailStudio/'.$studioMusik->id }}"><strong>View</strong> <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-3 col-md-12">
                    <form action="#" method="post" class="sidebar">
                        <h4>Filters</h4>
                        <div>
                            <select title="Service" class="wide">
                                <option selected >All Categories</option>
                            </select>
                            <select title="Service" class="wide">
                                <option selected >Default Older</option>
                            </select>
                        </div>
                        <p class="check-filters">
                            <input type="checkbox" name="remember" id="1" />
                            <label for="1">Instant Book</label><br>
                            <input type="checkbox" name="remember" id="2" />
                            <label for="2">Lowest Price</label><br>
                        </p>
                        <button class="btn ui-btn btn-block dark-blue">Update</button>
                    </form>
                </div>
            </div>
            <div class="ui-pagination">
                <a href="#" class="page"><i class="fa fa-angle-left"></i></a>
                <a href="#" class="page">1</a>
                <a href="#" class="page info text-white">2</a>
                <a href="#" class="page">3</a>
                <a href="#" class="page">4</a>
                <a href="#" class="page"><i class="fa fa-angle-right"></i></a>
            </div>    
        </div>
    <!--end listings-->

</div>
@endsection
