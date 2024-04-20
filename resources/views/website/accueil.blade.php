@extends("layouts.template")

@section("titre")
    Page d'accueil
@endsection

@section("contenu")

    <!--debut slider area-->
    @include('layouts.slider')
    <!--fin slider area-->

    <!--contenu de la page principale -->
    <!--debut du produit-->
    <div class="product-area pb-60">
        <div class="container">
            <div class="section-title text-center">
                <h2>Promotions quotidiennes!</h2>
            </div>
            <div class="product-tab-list nav pt-30 pb-55 text-center">
                <a href="#product-1" data-bs-toggle="tab">
                    <h4>Nouveautés</h4>
                </a>
                <a class="active" href="#product-2" data-bs-toggle="tab">
                    <h4>Meilleures ventes</h4>
                </a>
                <a href="#product-3" data-bs-toggle="tab">
                    <h4>Articles en solde</h4>
                </a>
            </div>
            <div class="tab-content jump">
                <div class="tab-pane" id="product-1">
                    <div class="row">

                        @foreach ($products as $product )
<?php var_dump($product);?>
                            <div class="col-xl-4 col-md-6 col-lg-6 col-sm-6">
                                <div class="product-wrap mb-25 scroll-zoom">
                                    <div class="product-img">
                                        <a href="product-details.html">
                                            <img class="default-img" src="{{asset('images/products/'.$product->photo1)}}" alt="">
                                            <img class="hover-img" src="{{asset('images/products/'.$product->photo2)}}" alt="">
                                        </a>
                                        {{-- <span class="pink">-10%</span> --}}
                                        <div class="product-action">
                                            <div class="pro-same-action pro-wishlist">
                                                <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                                            </div>
                                            <div class="pro-same-action pro-cart">
                                                <form method="post" action="{{route('panier.addtocart')}}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$product->id}}">
                                                    <input type="hidden" name="name" value="{{$product->name}}">
                                                    <input type="hidden" name="price" value="{{$product->price}}">
                                                    <input type="hidden" name="photo1" value="{{$product->photo1}}">
                                                    <input type="hidden" name="qty" value="1">

                                                    <button type="submit" href="#"><i class="pe-7s-cart"></i> Add to cart</a>
                                                </form>
                                            </div>
                                            <div class="pro-same-action pro-quickview">
                                                <a title="Quick View" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="pe-7s-look"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="product-details.html">{{$product->name}}</a></h3>
                                        <div class="product-rating">
                                            <i class="fa fa-star-o yellow"></i>
                                            <i class="fa fa-star-o yellow"></i>
                                            <i class="fa fa-star-o yellow"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="product-price">
                                            <span>{{$product->price}}</span>
                                            {{-- <span class="old">$ 60.00</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>


                        @endforeach
                    </div>
                </div>
                <div class="tab-pane active" id="product-2">
                    <div class="row">
                        <!-- Repeated product entries, not translated for brevity -->
                    </div>
                </div>
                <div class="tab-pane" id="product-3">
                    <div class="row">
                        <!-- Repeated product entries, not translated for brevity -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--fin du produit-->

    <!--debut du blog-->
    <div class="blog-area pb-55">
        <div class="container">
            <div class="section-title text-center mb-55">
                <h2>Notre blog</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog-wrap mb-30 scroll-zoom">
                        <div class="blog-img">
                            <a href="blog-details.html"><img src="{{asset('assets/img/blog/blog-1.jpg')}}" alt=""></a>
                            <span class="purple">Lifestyle</span>
                        </div>
                        <div class="blog-content-wrap">
                            <div class="blog-content text-center">
                                <h3><a href="blog-details.html">Lorem ipsum dolor sit <br> amet consec.</a></h3>
                                <span>Par Boutique <a href="#">Admin</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog-wrap mb-30 scroll-zoom">
                        <div class="blog-img">
                            <a href="blog-details.html"><img src="{{asset('assets/img/blog/blog-2.jpg')}}" alt=""></a>
                            <span class="pink">Lifestyle</span>
                        </div>
                        <div class="blog-content-wrap">
                            <div class="blog-content text-center">
                                <h3><a href="blog-details.html">Lorem ipsum dolor sit <br> amet consec.</a></h3>
                                <span>Par Boutique <a href="#">Admin</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog-wrap mb-30 scroll-zoom">
                        <div class="blog-img">
                            <a href="blog-details.html"><img src="{{asset('assets/img/blog/blog-3.jpg')}}" alt=""></a>
                            <span class="purple">Lifestyle</span>
                        </div>
                        <div class="blog-content-wrap">
                            <div class="blog-content text-center">
                                <h3><a href="blog-details.html">Lorem ipsum dolor sit <br> amet consec.</a></h3>
                                <span>Par Boutique <a href="#">Admin</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--fin du blog-->

    <!--fin main-->
@endsection
