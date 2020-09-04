@extends('layouts.app') @section('content')

<div class="page-heading style-2" style="margin-top:-15px">
    <div class="container">
        <h1>{{$detail->title}}</h1>
    </div>
</div>
<div class="page-breadcrumbs">
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href="/">Home</a></li>
            <li>{{$detail->title}}</li>
        </ul>
    </div>
</div>
<section class="blog-single" id="site-content">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <article class="post style-2">
                    <header>
                        <img
                            style="width:100%; height:550px"
                            src="{{$detail->image}}"
                            class="attachment-blog-full size-blog-full wp-post-image hidden-xs"
                        />
                        <img
                            style="width:100%; height:250px"
                            src="{{$detail->image}}"
                            class="attachment-blog-full size-blog-full wp-post-image hidden-md hidden-lg"
                        />
                    </header>
                    <h1>{{$detail->title}}</h1>

                    <div class="post-content">
                        <p>
                        {!! $detail->description !!}
                        </p>
                        <a target="_self" href="https://wa.me/+62%20823-4023-58020?text=halo%20saya%20mau%20pesan%20bunga"  class="btn btn-sm style-1" id="custom-id-2" style="margin-top:-7px; margin-bottom:15px">Pesan Sekarang</a>
                    </div>
                </article>
<!-- 
                <div id="respond" class="comment-respond">
                    <h3 id="reply-title" class="comment-reply-title">
                        <small><a rel="nofollow" id="cancel-comment-reply-link" href="/florist-new-demos/2/professional-tips-and-tricks/#respond" style="display: none;">Cancel reply</a></small>
                    </h3>
                    <form action="http://anpsthemes.com/florist-new-demos/2/wp-comments-post.php" method="post" id="commentform" class="comment-form">
                        <h4 class="comment-heading">Post comment</h4>
                        <div class="row contact-form">
                            <div class="col-md-5">
                                <div class="form-group"><input type="text" id="author" name="author" placeholder="Name" /><i class="fa fa-user"></i></div>
                                <div class="form-group"><input type="text" id="email" name="email" placeholder="E-mail" /><i class="fa fa-envelope"></i></div>
                            </div>
                            <div class="col-md-7"><textarea id="message" placeholder="Message" name="comment" rows="5"></textarea></div>
                        </div>
                        <div class="contact-buttons text-left">
                            <button type="reset" class="btn btn-md">Reset</button>
                            <button data-form="submit" class="btn btn-md">Submit</button>
                        </div>
                        <p class="form-submit">
                            <input name="submit" type="submit" id="submit" class="submit" value="Post Comment" /> <input type="hidden" name="comment_post_ID" value="441" id="comment_post_ID" />
                            <input type="hidden" name="comment_parent" id="comment_parent" value="0" />
                        </p>
                    </form>
                </div> -->
                <!-- #respond -->
            </div>
            <aside class="sidebar col-md-3">
                <ul  style="list-style-type: none;"> 
                    <li id="categories-2" class="widget-container widget_categories">
                        <h3 class="widget-title">Produk Lainnya</h3>
                        <ul style="list-style-type: none;">
                            @foreach ($product as $key)
                            <li class="cat-item cat-item-7"><a href="/product/detail/{{$key->id_product}}">{{ ucwords(strtolower($key->title))}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </aside>
        </div>
    </div>
</section>
@endsection
