/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

/*require('./bootstrap');*/
import axios from 'axios';

axios.defaults.baseURL = 'http://laravel-react.test/api/';
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./components/Tabs/TabRazas');
require('./components/Tabs/ContentRazas')
