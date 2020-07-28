

@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://rawgit.com/adrotec/knockout-file-bindings/master/knockout-file-bindings.css">

<style type="text/css" media="screen">
  #name-error{
    color: #5a5c69;
    font-size: 0.8rem;
    position: relative;
    line-height: 1;
    color: red
  }
  .error{
    color: #5a5c69;
    font-size: 1rem;
    position: relative;
    line-height: 1;
    color: red;
    width: 100%;
  }
  .image-product{
    width: 200px;
    height: auto;
  }
</style>
<style>
  img {
    max-width: 100%; }

    .preview {
      display: -webkit-box;
      display: -webkit-flex;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      -webkit-flex-direction: column;
      -ms-flex-direction: column;
      flex-direction: column; }
      @media screen and (max-width: 996px) {
        .preview {
          margin-bottom: 20px; } }

          .preview-pic {
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
            -ms-flex-positive: 1;
            flex-grow: 1; }

            .preview-thumbnail.nav-tabs {
              border: none;
              margin-top: 15px; }
              .preview-thumbnail.nav-tabs li {
                width: 18%;
                margin-right: 2.5%; }
                .preview-thumbnail.nav-tabs li img {
                  max-width: 100%;
                  display: block; }
                  .preview-thumbnail.nav-tabs li a {
                    padding: 0;
                    margin: 0; }
                    .preview-thumbnail.nav-tabs li:last-of-type {
                      margin-right: 0; }

                      .tab-content {
                        overflow: hidden; }
                        .tab-content img {
                          width: 100%;
                          -webkit-animation-name: opacity;
                          animation-name: opacity;
                          -webkit-animation-duration: .3s;
                          animation-duration: .3s; }

                          .card {
                            margin-top: 50px;
                            background: #eee;
                            padding: 3em;
                            line-height: 1.5em; }

                            @media screen and (min-width: 997px) {
                              .wrapper {
                                display: -webkit-box;
                                display: -webkit-flex;
                                display: -ms-flexbox;
                                display: flex; } }

                                .details {
                                  display: -webkit-box;
                                  display: -webkit-flex;
                                  display: -ms-flexbox;
                                  display: flex;
                                  -webkit-box-orient: vertical;
                                  -webkit-box-direction: normal;
                                  -webkit-flex-direction: column;
                                  -ms-flex-direction: column;
                                  flex-direction: column; }

                                  .colors {
                                    -webkit-box-flex: 1;
                                    -webkit-flex-grow: 1;
                                    -ms-flex-positive: 1;
                                    flex-grow: 1; }

                                    .product-title, .price, .sizes, .colors {
                                      text-transform: UPPERCASE;
                                      font-weight: bold; }

                                      .checked, .price span {
                                        color: #ff9f1a; }

                                        .product-title, .rating, .product-description, .price, .vote, .sizes {
                                          margin-bottom: 15px; }

                                          .product-title {
                                            margin-top: 0; }

                                            .size {
                                              margin-right: 10px; }
                                              .size:first-of-type {
                                                margin-left: 40px; }

                                                .color {
                                                  display: inline-block;
                                                  vertical-align: middle;
                                                  margin-right: 10px;
                                                  height: 2em;
                                                  width: 2em;
                                                  border-radius: 2px; }
                                                  .color:first-of-type {
                                                    margin-left: 20px; }

                                                    .add-to-cart, .like {
                                                      background: #ff9f1a;
                                                      padding: 1.2em 1.5em;
                                                      border: none;
                                                      text-transform: UPPERCASE;
                                                      font-weight: bold;
                                                      color: #fff;
                                                      -webkit-transition: background .3s ease;
                                                      transition: background .3s ease; }
                                                      .add-to-cart:hover, .like:hover {
                                                        background: #b36800;
                                                        color: #fff; }

                                                        .not-available {
                                                          text-align: center;
                                                          line-height: 2em; }
                                                          .not-available:before {
                                                            font-family: fontawesome;
                                                            content: "\f00d";
                                                            color: #fff; }

                                                            .orange {
                                                              background: #ff9f1a; }

                                                              .green {
                                                                background: #85ad00; }

                                                                .blue {
                                                                  background: #0076ad; }

                                                                  .tooltip-inner {
                                                                    padding: 1.3em; }

                                                                    @-webkit-keyframes opacity {
                                                                      0% {
                                                                        opacity: 0;
                                                                        -webkit-transform: scale(3);
                                                                        transform: scale(3); }
                                                                        100% {
                                                                          opacity: 1;
                                                                          -webkit-transform: scale(1);
                                                                          transform: scale(1); } }

                                                                          @keyframes opacity {
                                                                            0% {
                                                                              opacity: 0;
                                                                              -webkit-transform: scale(3);
                                                                              transform: scale(3); }
                                                                              100% {
                                                                                opacity: 1;
                                                                                -webkit-transform: scale(1);
                                                                                transform: scale(1); } }
                                                                                .card-body{
                                                                                  padding: 1rem 1rem 0 1rem;
                                                                                }
                                                                              </style>
                                                                              @endsection
                                                                              @section('content')



                                                                              <div class="container">
                                                                                <div class="card">
                                                                                  <div class="container-fliud">
                                                                                    <div class="wrapper row">
                                                                                      <div class="preview col-md-6">

                                                                                        <div class="preview-pic tab-content">
                                                                                          <div class="tab-pane active" id="pic-1"><img src="{{$product->image}}" /></div>
                                                                                          <div class="preview-thumbnail nav nav-tabs">
                                                                                            {!! $product->description !!}
                                                                                          </div>
                                                                                        </div>

                                                                                      </div>
                                                                                      <div class="details col-md-6">
                                                                                        <h3 class="product-title">{{$product->name}}</h3>
                                                                                        <div class="rating">
                                                                                          <div class="stars">
                                                                                           @for ($i = 0; $i < 5; $i++)
                                                                                           @if($product->rate>$i)


                                                                                           <span class="fa fa-star checked"></span>
                                                                                           @else 
                                                                                           <span class="fa fa-star"></span>

                                                                                           @endif
                                                                                           @endfor
                                                                                         </div>
                                                                                         <span class="review-no">{{$product->rate_number}} Lượt Đánh Giá</span>
                                                                                       </div>
                                                                                       <h4 class="price">Hãy Đề Xuất Nguyện Vọng Của Bạn Về Nhân Sự Mà Bạn Muốn:</h4>
                                                                                       @foreach ($staffs as $staff)
                                                                                       <div class="vote">
                                                                                        <span style="
                                                                                        float: left; min-width: 150px"><a href="#">{{$staff->name}}</a></span>
                                                                                        <span style="
                                                                                        float: left;
                                                                                        padding-left: 80px;
                                                                                        "><div class="custom-control custom-switch">
                                                                                          <input type="checkbox" class="custom-control-input" id="customSwitch{{$staff->id}}" staff-id="{{$staff->id}}">
                                                                                          <label class="custom-control-label" for="customSwitch{{$staff->id}}"></label>
                                                                                        </div></span>
                                                                                      </div>
                                                                                      @endforeach
                                                                                      <br>
                                                                                      <br>
                                                                                      <br>
                                                                                      <div class="form-group">
                                                                                        <label for="exampleFormControlTextarea1">Ghi Chú</label>
                                                                                        <textarea class="form-control" id="note" rows="3"></textarea>
                                                                                      </div>
                                                                                      <div class="action">
                                                                                        <button class="add-to-cart btn btn-default" type="button" onclick="orderProduct({{$product->id}})">Đặt Ngay</button>
                                                                                        <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                                                                                      </div>
                                                                                    </div>
                                                                                  </div>
                                                                                </div>
                                                                              </div>
                                                                            </div>


                                                                            @endsection

                                                                            @section('js')
                                                                            <script src="{{ asset('js/user/product.js') }}"></script>
                                                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.1.0/knockout-min.js"></script>
                                                                            <script src="https://rawgit.com/adrotec/knockout-file-bindings/master/knockout-file-bindings.js"></script>

                                                                            @endsection