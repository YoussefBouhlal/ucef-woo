/*
 *Import CSS Files
 */
import '../css/main.css';

if (module.hot) {
    module.hot.accept();
}

/*
 *Import 3rd Party Files
 */
import 'popper.js';
import 'bootstrap';

/**
 * Import JS Files
 */
import Swiper from './components/Swiper';
import Comments from './components/Comments';
import QuickView from './components/QuickView';
import singleProduct from './components/SingleProduct';


Swiper.singleProduct();
new Comments();