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
import Comments from './components/Comments';
import QuickView from './components/QuickView';
import QuantityButton from './components/QuantityButton';

new Comments();