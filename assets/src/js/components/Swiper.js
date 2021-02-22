import Swiper from 'swiper/bundle';

class SwiperQv
{
    constructor() {

        this.events();
    }

    events() {

        const swiper = new Swiper( '.swiper-container.quick-view-swiper', {
            pagination: {
                el: '.swiper-pagination',
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            }
        });
    }
}
export default SwiperQv;