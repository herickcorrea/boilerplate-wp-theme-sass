
/* IMPORTAÇÕES */

import Template from './components/Template.js';
import BannerHome from './components/BannerHome.js';

/* INSTANCIA CLASSES */

const template = new Template;
const bannerhome = new BannerHome;

/* RUN EVENTOS HABILITANDO JQUERY */

$(function()
{
    template.init();
    bannerhome.init();
        
    $(window).resize(function()
    {
        bannerhome.init();
        template.init(); 
    });

    window.onload = function()
    {   
    }();
});