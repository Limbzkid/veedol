<?php require_once './header.php'; ?>

<!-- Banner slider -->
<section class="banner-slider">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img class="w-100 d-none d-md-block" src="./assets/build/images/banner.jpg" />
                <img class="w-100 d-md-none" src="./assets/build/images/mobile-banner.jpg" />
            </div>
            <div class="swiper-slide">
                <img class="w-100 d-none d-md-block" src="./assets/build/images/banner.jpg" />
                <img class="w-100 d-md-none" src="./assets/build/images/mobile-banner.jpg" />
            </div>
            <div class="swiper-slide">
                <img class="w-100 d-none d-md-block" src="./assets/build/images/banner.jpg" />
                <img class="w-100 d-md-none" src="./assets/build/images/mobile-banner.jpg" />
            </div>
            <div class="swiper-slide">
                <img class="w-100 d-none d-md-block" src="./assets/build/images/banner.jpg" />
                <img class="w-100 d-md-none" src="./assets/build/images/mobile-banner.jpg" />
            </div>
        </div>
        <div class="banner-pagination swiper-pagination"></div>
    </div>
</section>
<!-- /Banner slider -->

<!-- Explore section -->
<section class="explore-section">
    <img class="w-100 d-none d-md-block" src="./assets/build/images/explore-bg.jpg" />
    <img class="w-100 d-md-none" src="./assets/build/images/explore-bg-mobile.jpg" />
    <div class="details">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-8">
                    <p>
                        <b>Tide Water Oil Co. (India) Ltd.</b>, owner of brand <b>Veedol</b>, is a leading manufacturer and marketer of quality lubricants. It has been catering to both the automotive and industrial segments since 1928.
                    </p>
                    <a href="#" class="btn btn-primary btn-lg">Explore</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Explore section -->

<!-- Product categories section -->
<section class="product-categories-slider">
    <div class="swiper-container">
        <div class="heading-wrapper">
            <h2 class="heading">Product Categories</h2>
            <div class="swiper-pagination"></div>
        </div>
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="img-wrapper">
                    <img class="w-100" src="./assets/build/images/product-category.jpg" />
                </div>
                <div class="details">
                    <h3 class="title">Automotive Lubricants</h3>
                    <a href="#" class="btn btn-outline btn-white">Explore</a>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="img-wrapper">
                    <img class="w-100" src="./assets/build/images/product-category.jpg" />
                </div>
                <div class="details">
                    <h3 class="title">Automotive Lubricants</h3>
                    <a href="#" class="btn btn-outline btn-white">Explore</a>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="img-wrapper">
                    <img class="w-100" src="./assets/build/images/product-category.jpg" />
                </div>
                <div class="details">
                    <h3 class="title">Automotive Lubricants</h3>
                    <a href="#" class="btn btn-outline btn-white">Explore</a>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="img-wrapper">
                    <img class="w-100" src="./assets/build/images/product-category.jpg" />
                </div>
                <div class="details">
                    <h3 class="title">Automotive Lubricants</h3>
                    <a href="#" class="btn btn-outline btn-white">Explore</a>
                </div>
            </div>
        </div>
        <div class="swiper-button-next">
            <i class="iconx-arrow"></i>
        </div>
    </div>
</section>
<!-- /Product categories section -->

<!-- Tab section -->
<section class="tabs-container">
    <div class="container">
        <ul class="nav nav-tabs">
            <li>
                <a href="#tab1" class="active" data-toggle="tab">
                    <img src="./assets/build/images/icon-video-gallery.png" alt="">
                    <span>Snippets</span>
                </a>
            </li>  
            <li>
                <a href="#tab2" data-toggle="tab">
                    <img src="./assets/build/images/icon-video-gallery.png" alt="">
                    <span>Video Gallery</span>
                </a>
            </li>  
            <li>
                <a href="#tab3" data-toggle="tab">
                    <img src="./assets/build/images/icon-video-gallery.png" alt="">
                    <span>Corporate Social Responsibity</span>
                </a>
            </li>  
        </ul>
    </div>
    <div class="container-wide">
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">
                <h4 class="tab-title">
                    <a data-toggle="collapse" data-parent=".tab-pane" href="#collapse-1" >
                        <img src="./assets/build/images/icon-video-gallery.png" alt="">
                        <span>Snippets</span>
                    </a>
                </h4>
                <div id="collapse-1" class="tab-body show">
                    <div class="block-slider swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a href="#">
                                    <div class="img-wrapper">
                                        <img class="w-100" src="./assets/build/images/video-thumb-1.jpeg" />
                                    </div>
                                    <span class="title">Veedol resumes <span>it's journey</span></span>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="#">
                                    <div class="img-wrapper">
                                        <img class="w-100" src="./assets/build/images/video-thumb-2.jpeg" />
                                    </div>
                                    <span class="title">Young Engines <span>Of India</span></span>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="#" class="dark-icon">
                                    <div class="img-wrapper">
                                        <img class="w-100" src="./assets/build/images/video-thumb-3.jpeg" />
                                    </div>
                                    <span class="title">Modern Rahne <span>Ki ek Parampara</span></span>
                                </a>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab2">
                <h4 class="tab-title">
                    <a data-toggle="collapse" data-parent=".tab-pane" href="#collapse-2" >
                        <img src="./assets/build/images/icon-video-gallery.png" alt="">
                        <span>Video Gallery</span>
                    </a>
                </h4>
                <div id="collapse-2" class="tab-body show">
                    <div class="block-slider swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a href="https://www.youtube.com/watch?v=EngW7tLk6R8" class="video-popup">
                                    <div class="img-wrapper">
                                        <img class="w-100" src="./assets/build/images/video-thumb-1.jpeg" />
                                    </div>
                                    <span class="title">Veedol resumes <span>it's journey</span></span>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.youtube.com/watch?v=EngW7tLk6R8" class="video-popup">
                                    <div class="img-wrapper">
                                        <img class="w-100" src="./assets/build/images/video-thumb-2.jpeg" />
                                    </div>
                                    <span class="title">Young Engines <span>Of India</span></span>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.youtube.com/watch?v=EngW7tLk6R8" class="video-popup dark-icon">
                                    <div class="img-wrapper">
                                        <img class="w-100" src="./assets/build/images/video-thumb-3.jpeg" />
                                    </div>
                                    <span class="title">Modern Rahne <span>Ki ek Parampara</span></span>
                                </a>
                            </div>
                        </div>
                        <div class="banner-pagination swiper-pagination"></div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab3">
                <h4 class="tab-title">
                    <a data-toggle="collapse" data-parent=".tab-pane" href="#collapse-3" >
                        <img src="./assets/build/images/icon-video-gallery.png" alt="">
                        <span>Corporate Social Responsibity</span>
                    </a>
                </h4>
                <div id="collapse-3" class="tab-body show">
                    <div class="block-slider swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a href="#">
                                    <div class="img-wrapper">
                                        <img class="w-100" src="./assets/build/images/video-thumb-1.jpeg" />
                                    </div>
                                    <span class="title">Veedol resumes <span>it's journey</span></span>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="#">
                                    <div class="img-wrapper">
                                        <img class="w-100" src="./assets/build/images/video-thumb-2.jpeg" />
                                    </div>
                                    <span class="title">Young Engines <span>Of India</span></span>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="#" class="dark-icon">
                                    <div class="img-wrapper">
                                        <img class="w-100" src="./assets/build/images/video-thumb-3.jpeg" />
                                    </div>
                                    <span class="title">Modern Rahne <span>Ki ek Parampara</span></span>
                                </a>
                            </div>
                        </div>
                        <div class="banner-pagination swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Tab section -->

<?php require_once './footer.php'; ?>