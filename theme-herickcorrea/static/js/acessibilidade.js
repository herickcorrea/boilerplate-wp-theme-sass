/* ------------------------------------------------------
*
* COOKIES
*
------------------------------------------------------- */

function _Cookie_BA()
{
    this.setCookie = function (cname, value) {
        document.cookie = cname + "=" + value + "; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/";
    }

    this.getCookie = function (cname) {
        var match = document.cookie.match(new RegExp('(^| )' + cname + '=([^;]+)'));

        if (match) {
            return match[2];
        }
        else {
            return false;
        }
    }
}


/* ------------------------------------------------------
*
* GLOBAIS - CONST E STATES
*
------------------------------------------------------- */

const BarraAcessibilidade = document.getElementById('CBarraAcessibilidade');

const objCookie = new _Cookie_BA();

const COOKIE_CONTRAST_NAME = 'BarraAcessibilidadeFiltro';
const COOKIE_ZOOM_NAME = 'BarraAcessibilidadeZoom';

let CONTRAST_STATE = objCookie.getCookie(COOKIE_CONTRAST_NAME) ? objCookie.getCookie(COOKIE_CONTRAST_NAME) : '';

let ZOOM_STATE = objCookie.getCookie(COOKIE_ZOOM_NAME) ? parseInt(objCookie.getCookie(COOKIE_ZOOM_NAME)) : 0;
let ZOOM_PERCENT_STATE = 0;


/* ------------------------------------------------------
*
* FUNÇÕES DE CONTRASTE
*
------------------------------------------------------- */

    function _fnOpenContraste_onMouseOver()
    {
        const contrasteList = document.getElementById('select_options');
        
        if(contrasteList)
        {
            contrasteList.classList.remove("closed");
            contrasteList.classList.add("opened");
        }
    }

    function _fnCloseContraste_onMouseOver()
    {    
        const contrasteList = document.getElementById('select_options');
        
        if(contrasteList)
        {
            contrasteList.classList.remove("opened");
            contrasteList.classList.add("closed");
        }
    }

    function _fnClickOpenContraste(event)
    {
        //return false;
    }

    function _fnContraste_ClickOutside(e)
	{
		if (e.target != document.querySelector("#wrapContraste") && e.target != document.querySelector("#select_options")  && e.target != document.querySelector("#seletorContrasteButton"))
		{
			_fnCloseContraste_onMouseOver();
		}
	}

    function _fnContraste_TabOutside(event)
	{
        if (event.target.id == "btnSitemap" || event.target.id == "btnZoomOut" || event.target.id == "btnAcessibilidadePage")
        {
            _fnCloseContraste_onMouseOver()
        }
	}

    function _fnEnterPressOpenContraste(event)
	{
        if(window.event.keyCode == 13)
		{
            const contrasteList = document.getElementById('select_options');
			const contrasteListClass = contrasteList.classList.contains('opened');

            if(contrasteListClass == false)
            {
                _fnOpenContraste_onMouseOver()
            }
            else
            {
                _fnCloseContraste_onMouseOver()
            }            

			window.addEventListener('click', _fnContraste_ClickOutside);
            window.addEventListener('keyup', _fnContraste_TabOutside);
		}

        return false;
	}

    function _fnContraste_Dropdown_onChange(event,css)
	{
        objCookie.setCookie(COOKIE_CONTRAST_NAME, css);

        console.log(css)

		document.location.reload(true);
	}

/* ------------------------------------------------------
*
* ZOOM
*
------------------------------------------------------- */

    function _plusZoom()
	{
        if(ZOOM_STATE <= 8)
		{			
			let newZoomFactor	= ZOOM_STATE + 1;
			let newZoomPercent  = 100 + ( newZoomFactor * 10 ); 

            ZOOM_STATE = newZoomFactor;
            ZOOM_PERCENT_STATE = newZoomPercent;

            //console.log(ZOOM_STATE+' / '+newZoomFactor+' / '+newZoomPercent);

            if (navigator.userAgent.indexOf("Firefox") != -1)
            {
                document.body.style.transform = 'scale(' + (newZoomPercent * 0.01) + ')';
            }
            else
            {
                document.body.style.zoom = newZoomPercent + '%';
            }

			objCookie.setCookie(COOKIE_ZOOM_NAME, newZoomFactor.toString());
		}	
	}

	function _minusZoom()
	{
        let newZoomFactor = ZOOM_STATE - 1;
        let newZoomPercent = 0;
        let browser = navigator.userAgent.indexOf("Firefox") != -1 ? 'firefox' : 'others';
        
        //console.log(ZOOM_STATE + ' / ' + newZoomFactor + ' / ' + newZoomPercent);

        if (ZOOM_STATE > 1 && newZoomFactor > 0 && browser == 'firefox')
		{
            newZoomPercent = ZOOM_PERCENT_STATE - 10;
            
            ZOOM_STATE = newZoomFactor;
            ZOOM_PERCENT_STATE = newZoomPercent;
            
            document.body.style.transform = 'scale(' + (newZoomPercent * 0.01) + ')';

            objCookie.setCookie(COOKIE_ZOOM_NAME, newZoomFactor.toString())
        }
        else if(ZOOM_STATE > 0 && newZoomFactor > 0 && browser == 'others')
		{
            newZoomPercent = ZOOM_PERCENT_STATE - 10;

            ZOOM_STATE = newZoomFactor;
			ZOOM_PERCENT_STATE = newZoomPercent;

            document.body.style.zoom = newZoomPercent + '%';

            objCookie.setCookie(COOKIE_ZOOM_NAME, newZoomFactor.toString());
		}
		else
		{
            ZOOM_STATE = 0;
			ZOOM_PERCENT_STATE = 100;

            if (navigator.userAgent.indexOf("Firefox") != -1)
            {
                document.body.style.transform = 'scale(1)';
            }
            else
            {
                document.body.style.zoom = newZoomPercent + '%';
            }

            objCookie.setCookie(COOKIE_ZOOM_NAME, "0");
		}
	}

	function _fnZoom_onChange(e,action)
	{
		switch (action)
		{
			case "plus" : _plusZoom();  break;
			case "minus": _minusZoom(); break;
		}

        //return false;
	}


/* ------------------------------------------------------
*
* FOCUS ELEMENT ACCESS KEY
*
------------------------------------------------------- */

    function _goToAndFocus(event,target)
    {        
        let el_Query_Target = document.querySelector("#" + target);

        if (el_Target)
        {
            el_Query_Target.focus();
        }

        return false;
    }


/* ------------------------------------------------------
*
* LOAD PAGE
*
------------------------------------------------------- */

    function _initializeBar()
	{
        /* SET ZOOM INICIAL */

            let newZoomPercent = 100 + (ZOOM_STATE * 10 );

            if (navigator.userAgent.indexOf("Firefox") != -1)
            {
                document.body.style.transform = 'scale(' + (newZoomPercent * 0.01) + ')';
            }
            else
            {
                document.body.style.zoom = newZoomPercent + '%';
            }

            ZOOM_PERCENT_STATE = newZoomPercent;

        /* SET CONTRASTE INICIAL */

            if(objCookie.getCookie(COOKIE_CONTRAST_NAME) && objCookie.getCookie(COOKIE_CONTRAST_NAME) != "original")
            {
                let contraste = objCookie.getCookie(COOKIE_CONTRAST_NAME);
                let cssPath = BarraAcessibilidade.dataset.csspath;

                document.head.insertAdjacentHTML("beforeend", `<link id="styleContrasteAcessibilidade" rel="stylesheet" type="text/css" href="${cssPath}/acessibilidade.${contraste}.css">`);
            }
	}

    _initializeBar()
