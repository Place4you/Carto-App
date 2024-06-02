import './bootstrap';
import Search from './live-search';
import chat from './chat';

//  Use Search only when logged in
if(document.querySelector('.header-search-icon')){
    new Search(); 
}

if(document.querySelector('.header-chat-icon')){
    new chat(); 
}