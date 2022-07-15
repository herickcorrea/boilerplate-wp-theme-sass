
/* IMPORTAÇÕES */

import TemplateScripts from './modules/Template.js';
import HomeScripts from './pages/Home.js';

/* INSTANCIA CLASSES */

const template = new TemplateScripts;
const home = new HomeScripts;

/* RUN EVENTOS HABILITANDO JQUERY */

$(function()
{
    if ($("body.current-page-home").length > 0)
    {
        home.init();        
    }

    $(window).resize(function()
    {
    });

    window.onload = function()
    {   
        template.init();
    }();
});