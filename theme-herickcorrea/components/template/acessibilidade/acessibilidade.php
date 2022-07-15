<div id="CBarraAcessibilidade" role="menubar" aria-label="Barra de Acessibilidade" data-csspath="<?php echo get_template_directory_uri().'/static/css/acessibilidade'; ?>">
    <div class="container">
        <div class="row">

            <div class="flexBar" >
                
                <div class="d-none d-xl-block col-xl-7">
                    <ul class="anchors" role="menubar" aria-label="Navegação em elementos da página">
                        <li role="menuitem">
                            <a accessKey="1" href="#mainContent" title="Ir para o conteúdo" class="ba-clickToGo" onClick="_goToAndFocus(this,'mainContent')">
                                Ir para o conteúdo [1]
                            </a>
                        </li>
                        <li role="menuitem">
                            <a accessKey="2" href="#mainMenu" class="btMenu" title="Ir para o menu" class="ba-clickToGo" onClick="_goToAndFocus(this,'mainMenu')">
                                Ir para o menu [2]
                            </a>
                        </li>
                        <li role="menuitem" class="closeContrast buscaWP">
                            <a accessKey="3" class="btBusca" href="#mainSearch" title="Ir para a busca" class="ba-clickToGo" onClick="_goToAndFocus(this,'mainSearch')">
                                Ir para a busca [3]
                            </a>
                        </li>
                        <li role="menuitem" class="closeContrast">
                            <a accessKey="4" href="#mainFooter" title="Ir para o rodapé" class="ba-clickToGo" onClick="_goToAndFocus(this,'mainFooter')">
                                Ir para o rodapé [4]
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-12 col-xl-5">
                    <ul class="acessList" role="menubar" aria-label="Controles de acessibilidade do site">
                        <li role="none">
                            <a href="/acessibilidade" id="btnAcessibilidadePage" role="menuitem" tabIndex="0" title="Acessibilidade" class="text">
                                Acessibilidade
                            </a>
                        </li>
                        <li role="none" class="livro">
                            <a role="menuitem" tabIndex="0" href="https://www.moderna.com.br/acessibilidade-moderna/livro-acessivel/" title="Acessar página Livro Acessível: Link Externo" target="_blank" class="text icon">
                                <svg id="svgLivroAcessivel" x="0px" y="0px" viewBox="0 0 12.024 16.032" style="enable-background:new 0 0 12.024 16.032;" xml:space="preserve">
                                    <path style="fill:#555555;" d="M11.562,0H1.387C0.622,0,0,0.622,0,1.387v13.257c0,0.765,0.622,1.387,1.387,1.387h10.174
                                    c0.255,0,0.462-0.207,0.462-0.462V0.462C12.024,0.207,11.817,0,11.562,0z M2.312,2.004h7.4c0.255,0,0.462,0.207,0.462,0.462
                                    S9.967,2.929,9.712,2.929h-7.4c-0.255,0-0.462-0.207-0.462-0.462S2.057,2.004,2.312,2.004z M2.312,4.471h3.715
                                    c0.255,0,0.462,0.207,0.462,0.462c0,0.255-0.207,0.462-0.462,0.462H2.312c-0.255,0-0.462-0.207-0.462-0.462
                                    C1.85,4.678,2.057,4.471,2.312,4.471z M11.099,15.107H1.387c-0.255,0-0.462-0.207-0.462-0.462V13.89c0-0.27,0.218-0.488,0.488-0.488
                                    h9.686V15.107z"/>
                                </svg>
                                <span>Livro acessível</span>
                            </a>
                        </li>
                        <li role="none" class="zoomButtons">
                            <button role="menuitem" tabIndex="0" id="btnZoomIn" title="Ampliar tela" class="zoomIn gm5zoom" onClick="_fnZoom_onChange(this,'plus')">
                                A+
                            </button>
                        </li>
                        <li role="none" id="itemListZoomMin" class="zoomButtons">
                            <button role="menuitem" tabIndex="0" id="btnZoomOut" title="Reduzir tela" class="zoomOut gm5zoom" onClick="_fnZoom_onChange(this,'minus')">
                                A-
                            </button>
                        </li>
                        <li role="none" id="wrapContraste" onclick="_fnClickOpenContraste(this)" onmouseover="_fnOpenContraste_onMouseOver()" onmouseout="_fnCloseContraste_onMouseOver()">
                            <a 
                            role="menuitem"
                            href="#" 
                            id="seletorContrasteButton" 
                            title="Abrir popup para alteração de contraste" 
                            aria-haspopup="true"
                            aria-expanded="false"
                            class="contraste"
                            tabindex="0"
                            onkeydown="_fnEnterPressOpenContraste(this)"				
                            >
                                <svg id="svgContrast" x="0px" y="0px" viewBox="0 0 34 34" style="enable-background:new 0 0 34 34;" xml:space="preserve">
                                    <path d="M17.06,0.449c-9.187,0-16.635,7.448-16.635,16.635S7.873,33.72,17.06,33.72s16.635-7.448,16.635-16.635
                                    S26.247,0.449,17.06,0.449z M17.06,29.561c-6.891,0-12.476-5.585-12.476-12.476S10.169,4.608,17.06,4.608
                                    s12.476,5.585,12.476,12.476S23.951,29.561,17.06,29.561z"/>
                                    <path d="M17.06,6.687v20.794c5.733,0,10.397-4.664,10.397-10.397S22.793,6.687,17.06,6.687z"/>
                                </svg>
                            </a>

                            <!-- <ul id="select_options" class={contrasteListState ? 'opened' : 'closed'} role="menu" aria-label="Lista de modos de contraste"> -->
                            <ul id="select_options" class="contrasteListState closed" role="menu" aria-label="Lista de modos de contraste">
                                <li role="none">
                                    <button role="menuitem" id="contraste_amarelopreto" title="Preto, branco e amarelo" onClick="_fnContraste_Dropdown_onChange(this,'amarelopreto')">
                                        Preto, branco e amarelo
                                    </button>
                                </li>
                                <li role="none">
                                    <button role="menuitem" id="contraste_altocontraste" title="Contraste aumentado" onClick="_fnContraste_Dropdown_onChange(this,'altocontraste')">
                                        Contraste aumentado
                                    </a>
                                </li>
                                <li role="none">
                                    <button role="menuitem" id="contraste_monocromatico" title="Monocromático" onClick="_fnContraste_Dropdown_onChange(this,'monocromatico')">
                                        Monocromático
                                    </button>
                                </li>
                                <li role="none">
                                    <button role="menuitem" id="contraste_cinzainvertida" title="Escala de cinza invertida" onClick="_fnContraste_Dropdown_onChange(this,'cinzainvertida')">
                                        Escala de cinza invertida
                                    </button>
                                </li>
                                <li role="none">
                                    <button role="menuitem" id="contraste_corinvertida" title="Cores invertidas" onClick="_fnContraste_Dropdown_onChange(this,'corinvertida')">
                                        Cores invertidas
                                    </button>
                                </li>
                                <li role="none">
                                    <button role="menuitem" id="contraste_original" title="Cores originais" onClick="_fnContraste_Dropdown_onChange(this,'original')">
                                        Cores originais
                                    </button>
                                </li>
                            </ul>
                        </li>
                        <li id="itemListSitemap" role="none">
                            <a role="menuitem" id="btnSitemap" tabIndex="0" href="/acessibilidade-moderna/mapa-do-site" title="Acessar a página de Mapa do Site" class="text icon">
                                <svg id="svgSitemap" x="0px" y="0px" viewBox="0 0 19 18" style="enable-background:new 0 0 19 18;" xml:space="preserve">
                                    <path d="M18.273,14.121h-0.672v-2.864c0-0.611-0.496-1.107-1.107-1.107H10.33V7.911
                                        c0-0.022-0.002-0.044-0.003-0.065h2.936c0.457,0,0.83-0.373,0.83-0.831v-5.96c0-0.458-0.373-0.831-0.83-0.831H5.736
                                        c-0.457,0-0.83,0.373-0.83,0.831v5.96c0,0.458,0.373,0.831,0.83,0.831h2.936C8.672,7.867,8.67,7.888,8.67,7.911v2.239H2.506
                                        c-0.611,0-1.107,0.496-1.107,1.107v2.864H0.727c-0.305,0-0.553,0.249-0.553,0.554V17.2c0,0.305,0.249,0.554,0.553,0.554h3.004
                                        c0.305,0,0.553-0.249,0.553-0.554v-2.526c0-0.305-0.249-0.554-0.553-0.554H3.059v-2.31h5.61v2.31H7.998
                                        c-0.305,0-0.553,0.249-0.553,0.554V17.2c0,0.305,0.249,0.554,0.553,0.554h3.004c0.305,0,0.553-0.249,0.553-0.554v-2.526
                                        c0-0.305-0.249-0.554-0.553-0.554H10.33v-2.31h5.61v2.31h-0.672c-0.305,0-0.553,0.249-0.553,0.554V17.2
                                        c0,0.305,0.249,0.554,0.553,0.554h3.004c0.305,0,0.553-0.249,0.553-0.554v-2.526C18.826,14.369,18.578,14.121,18.273,14.121z
                                        M3.731,17.477L3.731,17.477L3.731,17.477L3.731,17.477z M11.002,17.477L11.002,17.477L11.002,17.477L11.002,17.477z
                                        M18.273,17.477L18.273,17.477L18.273,17.477L18.273,17.477z"/>
                                </svg>
                            </a>
                        </li>
                        <li role="none" class="libras">
                            <a role="menuitem" tabIndex="0" href="https://www.vlibras.gov.br/" target="_blank" title="Link para libras: link externo" class="text icon">
                                <?php svg('hand-talk', array('cor' => '#fff')); ?>
                            </a>
                        </li>
                    </ul>
                </div>
            
            </div>
        
        </div>
    </div>
</div>