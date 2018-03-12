@extends('user.layouts.layout')
@section('content')
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- MAIN -->
                <div id="main" class="col-md-12">
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <div class="pull-left">
                            <div class="sort-filter">
                                <span class="text-uppercase">{{Lang::get('custom.common.sortby')}}</span>
                                    <select class="input">
                                        <option value="0">{{Lang::get('custom.common.price')}}</option>
                                        <option value="0">{{Lang::get('custom.common.review')}}</option>
                                    </select>
                                {!! html_entity_decode(
                                    Html::link(
                                        null, 
                                        '<i class="fa fa-arrow-down"></i>',
                                        [
                                            'class' => 'main-btn icon-btn'
                                        ]
                                    )
                                ) !!}
                            </div>
                            <div class="sort-filter">
                                <span class="text-uppercase">{{Lang::get('custom.common.price')}}</span>
                                    <select class="input">
                                        <option value="0">0-9.999.999</option>
                                        <option value="0">10.000.000-19.999.999</option>
                                        <option value="0">20.000.000-29.999.999</option>
                                        <option value="0">30.000.000-39.999.999</option>
                                        <option value="0">Upper 40.000.000</option>
                                    </select>
                                {!! html_entity_decode(
                                    Html::link(
                                        null, 
                                        '<i class="fa fa-arrow-down"></i>',
                                        [
                                            'class' => 'main-btn icon-btn'
                                        ]
                                    )
                                ) !!}
                            </div>
                        </div>
                        <div class="pull-right">
                            <ul class="store-pages">
                                <li><span class="text-uppercase">{{Lang::get('custom.common.page')}}</span></li>
                                <li class="active">1</li>
                                <li>{{Html::link('#','2')}}</li>
                                <li>{{Html::link('#','3')}}</li>
                                <li>{!! html_entity_decode(Html::link('#','<i class="fa fa-caret-right"></i>'))!!}</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /store top filter -->

                    <!-- STORE -->
                    <div id="store">
                        <!-- row -->
                        <div class="row">
                            @foreach($product_in_cates as $pc)
                            <!-- Product Single -->
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <div class="product product-single">
                                    <div class="product-thumb">
                                        {!! html_entity_decode(HTML::linkRoute('product', '<button class="main-btn quick-view"><i class="fa fa-search-plus"></i>'.Lang::get('custom.common.view').'</button>', $pc->id)) !!}
                                        @php
                                            $img = $pc->images->first();
                                        @endphp
                                        @if (isset($img))
                                        {{Html::image('assets/img/'.$img->image)}}
                                        @endif
                                    </div>
                                    <div class="product-body">
                                        <div class="product-label">
                                            @php
                                                $km = $pc->promotionDetail;
                                            @endphp
                                                @if ($km)
                                                    <span class="sale">
                                                        {{$km->percent}} %
                                                    </span>
                                                @endif
                                        </div>
                                        <h3 class="product-price">
                                            {{ ($km) ? ceil($pc->price * (100 - $km->percent) / 100) : $pc->price}} @lang('custom.common.currency') 
                                            @if ($km)
                                                <del class="product-old-price">{{ $pc->price }} @lang('custom.common.currency')</del>
                                            @endif
                                        </h3>
                                        <div class="product-rating">
                                             
                                        </div>
                                        <h2 class="product-name">{{ HTML::linkRoute('product', $pc->name, $pc->id)}}</h2>
                                        <div class="product-btns">
                                            <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                            ~-~-~-~
                                            <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i>{{Lang::get('custom.common.addcart')}} </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Product Single -->

                            <div class="clearfix visible-sm visible-xs"></div>
                            @endforeach
                        </div>
                        <!-- /row -->
                    </div>
                    <!-- /STORE -->

                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">
                        <div class="pull-left">
                            <div class="sort-filter">
                                <span class="text-uppercase">{{Lang::get('custom.common.sortby')}}</span>
                                    <select class="input">
                                        <option value="0">{{Lang::get('custom.common.price')}}</option>
                                        <option value="0">{{Lang::get('custom.common.review')}}</option>
                                    </select>
                                {!! html_entity_decode(
                                    Html::link(
                                        null, 
                                        '<i class="fa fa-arrow-down"></i>',
                                        [
                                            'class' => 'main-btn icon-btn'
                                        ]
                                    )
                                ) !!}
                            </div>
                            <div class="sort-filter">
                                <span class="text-uppercase">{{Lang::get('custom.common.price')}}</span>
                                    <select class="input">
                                        <option value="0">0-9.999.999</option>
                                        <option value="0">10.000.000-19.999.999</option>
                                        <option value="0">20.000.000-29.999.999</option>
                                        <option value="0">30.000.000-39.999.999</option>
                                        <option value="0">Upper 40.000.000</option>
                                    </select>
                                {!! html_entity_decode(
                                    Html::link(
                                        null, 
                                        '<i class="fa fa-arrow-down"></i>',
                                        [
                                            'class' => 'main-btn icon-btn'
                                        ]
                                    )
                                ) !!}
                            </div>
                        </div>
                        <div class="pull-right">
                            <ul class="store-pages">
                                <li><span class="text-uppercase">{{Lang::get('custom.common.page')}}</span></li>
                                <li class="active">1</li>
                                <li>{{Html::link('#','2')}}</li>
                                <li>{{Html::link('#','3')}}</li>
                                <li>{!! html_entity_decode(Html::link('#','<i class="fa fa-caret-right"></i>'))!!}</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /store bottom filter -->
                </div>
                <!-- /MAIN -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection
