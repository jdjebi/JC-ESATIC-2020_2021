<style media="screen">
body{
    padding-top: 55px
}
#landing-page{
    background-color: #e3e7eb;
    background-image: url({{ cdn_asset('asset/imgs/intro/bgs/etu.jpg') }});
    background-size: cover;
    background-repeat: no-repeat;
    height: 500px;
    width: 100%;
    position: relative;
}

#landing-page .overlay{
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    opacity: 0.7;
    background: linear-gradient(45deg, #000000 0%, #2b99f3 100%);
    z-index: 0;
}

#landing-page .container{
    position: relative;
    z-index: 1
}

#landing-page .container .row{
    position: relative;
    height: 500px;
}

#landing-page .resac-btn-primary{
    background: #2FA4E7;
    border-radius: 3px;
}

#landing-page .resac-btn-back-white{
    background: #fff;
    color: #000;
    border-color: #fff;
    border-radius: 3px;
}

@@media(max-width: 768px) {
    #landing-page #well{
    text-align: center;
    font-size: 30px;
    }
    #landing-page #landing-btn{
    text-align: center;
    }
    #landing-page #landing-footer{
    display: flex;
    flex-direction: column;
    align-items: center
    }
}

#slogan-style{
    border-left: 3px #2FA4E7 solid;
}

.resac-section p{
    line-height: 1.8;
    font-size: 20px;
    font-weight: 500;
}
</style>
<style media="screen">
.customer-logos.title{
    text-align: center;
    font-weight: 100;
}
.customer-logos.slider{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;

}
.customer-logos.slider .slide{
    margin-left: 30px;
    margin-right: 30px;
}
</style>
<style media="screen">
.slick-slide {
    margin: 0px 20px;
}

.slick-slide img {
    width: 100%;
}

.slick-slider
{
    position: relative;
    display: block;
    box-sizing: border-box;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
            user-select: none;
    -webkit-touch-callout: none;
    -khtml-user-select: none;
    -ms-touch-action: pan-y;
        touch-action: pan-y;
    -webkit-tap-highlight-color: transparent;
}

.slick-list
{
    position: relative;
    display: block;
    overflow: hidden;
    margin: 0;
    padding: 0;
}
.slick-list:focus
{
    outline: none;
}
.slick-list.dragging
{
    cursor: pointer;
    cursor: hand;
}

.slick-slider .slick-track,
.slick-slider .slick-list
{
    -webkit-transform: translate3d(0, 0, 0);
        -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
        -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
}

.slick-track
{
    position: relative;
    top: 0;
    left: 0;
    display: flex;
    align-items: center
}
.slick-track:before,
.slick-track:after
{
    display: table;
    content: '';
}
.slick-track:after
{
    clear: both;
}
.slick-loading .slick-track
{
    visibility: hidden;
}

.slick-slide
{
    display: none;
    float: left;
    height: 100%;
    min-height: 1px;
}
[dir='rtl'] .slick-slide
{
    float: right;
}
.slick-slide img
{
    display: block;
}
.slick-slide.slick-loading img
{
    display: none;
}
.slick-slide.dragging img
{
    pointer-events: none;
}
.slick-initialized .slick-slide
{
    display: block;
}
.slick-loading .slick-slide
{
    visibility: hidden;
}
.slick-vertical .slick-slide
{
    display: block;
    height: auto;
    border: 1px solid transparent;
}
.slick-arrow.slick-hidden {
    display: none;
}
</style>