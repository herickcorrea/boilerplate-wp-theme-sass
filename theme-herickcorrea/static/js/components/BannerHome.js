import Swiper from"https://unpkg.com/swiper@8/swiper-bundle.esm.browser.min.js";class BannerHome{Carrosel(){const t=$("#BannerHomeSwiper .swiper-slide"),e={nextEl:".swiper-button-next",prevEl:".swiper-button-prev"};new Swiper("#BannerHomeSwiper",{slidesPerView:1,spaceBetween:0,speed:1e3,simulateTouch:t.length>1,loop:t.length>1,pagination:{el:".banner-pagination .list-pagination",clickable:!0,renderBullet:function(e,n){return`\n\t\t\t\t\t\t<button class="${n}">\n\t\t\t\t\t\t\t<span class="Typography H4L txColor White">${e+1}.</span>\n\t\t\t\t\t\t\t<span class="Typography SL txColor White">${t.eq(e).data("subtitulo")}</span>\n\t\t\t\t\t\t</button>\n\t\t\t\t\t`}},navigation:e.length>1&&e})}init(t){let e=this;$("#CCBannerHome").length>0&&e.Carrosel()}}export default BannerHome;
//# sourceMappingURL=BannerHome.js.map