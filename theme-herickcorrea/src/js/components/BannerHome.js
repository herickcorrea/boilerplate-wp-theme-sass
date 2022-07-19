
import Swiper from 'https://unpkg.com/swiper@8/swiper-bundle.esm.browser.min.js';

class BannerHome
{
	Carrosel()
	{
		const TitleCarrossel = $('#BannerHomeSwiper .swiper-slide');
		const swiperNavControlls =
		{
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		};
		const swiperAutoplay = 
		{
			delay: 10000,
		}

		const swiper = new Swiper('#BannerHomeSwiper', 
		{
			slidesPerView: 1,
			spaceBetween: 0,
			speed: 1000,
			simulateTouch:TitleCarrossel.length > 1 ? true : false,
			loop: TitleCarrossel.length > 1 ? true : false,
			// autoplay:TitleCarrossel.length > 1 ? swiperAutoplay : false,
			pagination: {
				el: '.banner-pagination .list-pagination',
				clickable: true,
				renderBullet: function (index, className)
				{
					let subtitulo = TitleCarrossel.eq(index).data('subtitulo');

					return `
						<button class="${className}">
							<span class="Typography H4L txColor White">${index + 1}.</span>
							<span class="Typography SL txColor White">${subtitulo}</span>
						</button>
					`;
				}
			},
			navigation: swiperNavControlls.length > 1 ? swiperNavControlls : false,
		});
	}

	init(options)
	{
		let self = this;

		if ($("#CCBannerHome").length > 0)
    	{
			self.Carrosel();
		}
	}
}

export default BannerHome;