@extends('user.layouts.layout')
@section('content')
<!-- HOME -->
<div id="home">
    <!-- container -->
    <div class="container">
        <!-- home wrap -->
        <!-- <div class="home-wrap"> -->
            <!-- home slick -->
            <div id="home-slick">
                <!-- banner -->
                @foreach ($imgs as $img)
                <div class="banner banner-1">
                    {!! Html::image('assets/img/'.$img->image) !!}
                    <div class="banner-caption text-center">
                        <h1>{!!Lang::get('custom.header.welcome')!!}</h1>
                        <h3 class="white-color font-weak">{!!Lang::get('custom.common.discount')!!}</h3>
                        <button class="primary-btn">{!!Lang::get('custom.common.shopnow')!!}</button>
                    </div>
                </div>
                @endforeach
                
                <!-- /banner -->
            <!-- /home slick -->
        <!-- </div> -->
        <!-- /home wrap -->
    </div>
    <!-- /container -->
</div>
<!-- /HOME -->

<!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">{!!Lang::get('custom.common.latestproduct')!!}</h2>
                    </div>
                </div>
                <!-- section title -->

                <!-- Product Single -->
                @foreach($l_products as $lp)
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">
                        <div class="product-thumb">
                            {!! html_entity_decode(HTML::linkRoute('product', '<button class="main-btn quick-view"><i class="fa fa-search-plus"></i>'.Lang::get('custom.common.view').'</button>', $lp->id)) !!}
                            @php
                                $img = $lp->images->first();
                            @endphp
                            @if (isset($img))
                            {{Html::image('assets/img/'.$img->image)}}
                            @endif
                        </div>
                        <div class="product-body">
                            <div class="product-label">
                                @php
                                    $km = $lp->promotionDetail;
                                @endphp
                                    @if ($km)
                                        <span class="sale">
                                            {{$km->percent}} %
                                        </span>
                                    @endif
                            </div>
                            <h3 class="product-price">
                                {{ ($km) ? ceil($lp->price * (100 - $km->percent) / 100) : $lp->price}} @lang('custom.common.currency') 
                                    @if ($km)
                                        <del class="product-old-price">{{ $lp->price }} @lang('custom.common.currency')</del>
                                    @endif
                            </h3>
                            <h3 class="product-price"></h3>
                            <div class="product-rating">
                                
                                @if ($avgVote > 0)
                                    @for ($i = 0; $i < $avgVote; $i++)
                                        @if ($i < $avgVote)
                                            <i class="fa fa-star"></i>
                                        @endif
                                    @endfor
                                    @for ($i = $avgVote; $i < 5; $i++)
                                        <i class="fa fa-star-o empty"></i>
                                    @endfor
                                @endif
                            </div>
                            <h2 class="product-name">{{ HTML::linkRoute('product', $lp->name, $lp->id)}}</h2>
                            <div class="product-btns">
                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                ~-~-~-~
                                <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i>{{Lang::get('custom.common.addcart')}} </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- /Product Single -->
{{--
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">{!!Lang::get('custom.common.discountproduct')!!}</h2>
                    </div>
                </div>
                <!-- section title -->

                <!-- Product Single -->
                @foreach($p_products as $pp)
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">
                        <div class="product-thumb">
                            {!! html_entity_decode(HTML::linkRoute('product', '<button class="main-btn quick-view"><i class="fa fa-search-plus"></i>'.Lang::get('custom.common.view').'</button>', $pp->id)) !!}
                            @php
                                $img = $pp->images->first();
                            @endphp
                            @if (isset($img))
                            {{Html::image('assets/img/'.$img->image)}}
                            @endif
                        </div>
                        <div class="product-body">
                            <div class="product-label">
                                @php
                                    $km1 = $pp->promotionDetail->first();
                                @endphp
                                    @if ($km1)
                                        <span class="sale">
                                            {{$km1->percent}} %
                                        </span>
                                    @endif
                            </div>
                            <div class="product-label">
                                    @if ($promotion)
                                        <span class="sale">
                                            @lang('custom.common.sale_to',['percent' => $promotion->percent])
                                        </span>
                                    @endif
                            </div>
                            <h3 class="product-price">
                                {{ ($km1) ? ceil($pp->price * (100 - $km1->percent) / 100) : $pp->price}} @lang('custom.common.currency') 
                                    @if ($km1)
                                        <del class="product-old-price">{{ $pp->price }} @lang('custom.common.currency')</del>
                                    @endif
                            </h3>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o empty"></i>
                            </div>
                            <h2 class="product-name">{{ HTML::linkRoute('product', $pp->name, $pp->id)}}</h2>
                            <div class="product-btns">
                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                ~-~-~-~
                                <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i>{{Lang::get('custom.common.addcart')}} </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- /Product Single -->

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">{!!Lang::get('custom.common.mostbuyproduct')!!}</h2>
                    </div>
                </div>
                <!-- section title -->

                <!-- Product Single -->
                @foreach($m_products as $mp)
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">
                        <div class="product-thumb">
                            {!! html_entity_decode(HTML::linkRoute('product', '<button class="main-btn quick-view"><i class="fa fa-search-plus"></i>'.Lang::get('custom.common.view').'</button>', $mp->id)) !!}
                            @php
                                $img = $mp->images->first();
                            @endphp
                            @if (isset($img))
                            {{Html::image('assets/img/'.$img->image)}}
                            @endif
                        </div>
                        <div class="product-body">
                            <div class="product-label">
                                @php
                                    $km2 = $mp->promotionDetail->first();
                                @endphp
                                    @if ($km2)
                                        <span class="sale">
                                            {{$km2->percent}}
                                        </span>
                                    @endif
                            </div>
                            <h3 class="product-price">
                                {{ ($km2) ? ceil($mp->price * (100 - $km2->percent) / 100) : $mp->price}} @lang('custom.common.currency') 
                                    @if ($km2)
                                        <del class="product-old-price">{{ $mp->price }} @lang('custom.common.currency')</del>
                                    @endif
                            </h3>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o empty"></i>
                            </div>
                            <h2 class="product-name">{{ HTML::linkRoute('product', $mp->name, $mp->id)}}</h2>
                            <div class="product-btns">
                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                ~-~-~-~
                                <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i>{{Lang::get('custom.common.addcart')}} </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- /Product Single -->
                --}}

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection