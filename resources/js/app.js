import './bootstrap';
import Search from './live-search';
import chat from './chat';
import Profile from './profile';

//  Use Search only when logged in

if(document.querySelector('.profile-nav')){
    new Profile(); 
}

//  Use Search only when logged in
if(document.querySelector('.header-search-icon')){
    new Search(); 
}

if(document.querySelector('.header-chat-icon')){
    new chat(); 
}