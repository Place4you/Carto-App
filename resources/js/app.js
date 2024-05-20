import './bootstrap';
import Search from './live-search';

//  Use Search only when logged in
if(document.querySelector('.header-search-icon')){
    new Search(); 
}