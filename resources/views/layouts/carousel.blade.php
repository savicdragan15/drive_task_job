<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="css/swiper.min.css">

<!-- Demo styles -->
<style>
    html, body {
        position: relative;
        height: 100%;
    }
    body {
        background: #eee;
        font-size: 14px;
        color:#000;
        margin: 0;
        padding: 0;
    }
    .swiper-container {
        width: 100%;
        height: 100%;
    }
    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }
</style>

<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="/images/Slide-1.jpg" alt="Image"/> </div>
        <div class="swiper-slide"><img src="/images/Slide-2.jpg" alt="Image"/></div>
        <div class="swiper-slide"><img src="/images/Slide-3.jpg" alt="Image"/></div>
    </div>

    <div class="swiper-pagination"></div>

    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
