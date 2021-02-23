import Swiper from 'swiper/bundle';

const swipers = {

    quickView(){
        new Swiper( '.swiper-container.quick-view-swiper', {
            pagination: {
                el: '.swiper-pagination',
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            }
        });
    },
    singleProduct(){
        new Swiper( '.swiper-container.single-product-swiper', {
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

export default swipers;