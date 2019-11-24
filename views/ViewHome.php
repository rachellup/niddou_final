<?php

 class Home {
    

    const LINK= "main.html";
    const TITLE='accueil';
    const DESCRIPTION='niddou';
    
    //contiendra un tableau des données eventuelles
    private $datas;
    
    //ces données peuvent être nulles
    function __construct($_datas= null){
        $this->datas= $_datas;
    }
    
    function render(){
   //return['template' =>"views/ViewAccueil.html"];
        
         echo <<<HERE
         <main class="grid">
        <section class="niddou">

            <div class="pres cadre">
                <h2>Bienvenue chez nous...</h2>
                <p>(Présentation de l'entreprise)Haec igitur lex in amicitia sanciatur, ut neque rogemus res turpes nec faciamus rogati. Turpis enim excusatio est et minime h3accipienda cum in ceteris peccatis, tum si quis contra rem publicam se amici causa fecisse fateatur. </p>
            </div>
            <div class="news cadre">
                <h4>La newsletter</h4>
                <a id="newsbtn" class="btn" href="formNews.html">S'inscrire</a>
            </div>
        </section>

        <section class="indis cadre">

            <figure class="imgindis">
                <a href="img/indispensable.jpg"><img class="img" srcset="img/indispensable.jpg 480w,
                                                img/res_indispensable.jpg 240w" sizes="(max-width:600px) 170px,
                                               (max-width:1700px) 300px" src="img/indispensable.jpg" alt="vignette" title="cliquez pour agrandir"></a>
            </figure>
            <div class=" textindis">
                <h2>L'Indispensable</h2>
                <p class="tel">Haec igitur lex in amicitia sanciatur, ut neque rogemus res turpes nec faciamus rogati. Turpis enim excusatio est et minime accipienda cum in ceteris peccatis, tum si quis contra rem publicam se amici causa fecisse fateatur. Turpis enim excusatio est et minime accipienda cum in ceteris peccatis, tum si quis contra rem publicam se amici causa fecisse fateatur.</p>
                <a class="btn" href="indispensable.html">Découvrir</a>
            </div>
        </section>

        <section class="crea">
           
                <div class="bebe cadre ">
                    <div class="  imgbebe">
                        <figure>
                            <a href="img/vign-bebe.jpg"><img class="img " src="img/vign-bebe.jpg" srcset="img/vign-bebe.jpg 480w,
                                                img/res-vign-bebe.jpg 240w" sizes="(max-width:600px) 260px,
                                               (max-width:1700px) 480px" alt="vignette" title="cliquez pour agrandir"></a>
                        </figure>
                        <div class="textbebe">
                            <h3><span class="titresp">Pour</span> Bébe</h3>
                            <p class="tel">Haec igitur lex in amicitia sanciatur, ut neque rogemus res turpes nec faciamus rogati. Turpis enim excusatio est et minime accipienda cum in ceteris peccatis, tum si quis contra rem publicam se amici causa fecisse fateatur. </p>
                            <a class="btn btnc" href="bebe.html">Voir les créas</a>
                        </div>
                    </div>
                </div>
               

                <div class="maison cadre ">
                    <div class="imgmaison">
                        <figure>
                            <a href="img/maison-niddou.jpg"><img class="img " src="img/maison-niddou.jpg" srcset="img/maison-niddou.jpg 480w,
                                                img/res-maison-niddou.jpg 240w" sizes="(max-width:600px) 260px,
                                               (max-width:1700px) 480px" alt="vignette" title="cliquez pour agrandir"></a>
                        </figure>
                        <div class="textmaison">
                            <h3 id="mum"><span class="titresp">Pour</span>la maison</h3>
                            <p class="tel">Haec igitur lex in amicitia sanciatur, ut neque rogemus res turpes nec faciamus rogati. Turpis enim excusatio est et minime accipienda cum in ceteris peccatis, tum si quis contra rem publicam se amici causa fecisse fateatur.</p>
                            <a class="btn btnc" href="maison.htlm">Voir les créas</a>
                        </div>
                    </div>
                </div>

                <div class="perso cadre ">
                    <div class="  imgperso">
                        <figure>
                            <a href="img/niddou-maquette.jpg"><img class="img " src="img/niddou-maquette.jpg" srcset="img/niddou-maquette.jpg 480w,
                                                img/res-niddou-maquette.jpg 240w" sizes="(max-width:600px) 260px,
                                               (max-width:1700px) 480px" alt="vignette" title="cliquez pour agrandir"></a>
                        </figure>
                        <div class="textperso">
                            <h3>Personnaliser</h3>
                            <p class="tel">Haec igitur lex in amicitia sanciatur, ut neque rogemus res turpes nec faciamus rogati. Turpis enim excusatio est et minime accipienda cum in ceteris peccatis, tum si quis contra rem publicam se amici causa fecisse fateatur. </p>
                            <a class="btn btnc" href="tissus.html">Voir les tissus </a>
                        </div>
                    </div>
                </div>
          
        </section>

        <section class="last">
            <!--diapo-->
            <div class="diapo cadre">
                <h4 class="titreslide">Toutes<br> nos créations...</h4>
                <div class="diapos max">
                    <div class="contener">
                        <div class="adapt">
                        </div>
                    </div>
                </div>
            </div>
            <div class="liste cadre">
                <figure class="imglist">
                    <a href="img/niddou-maquette.jpg"><img class="img " src="img/niddou-maquette.jpg" srcset="img/niddou-maquette.jpg 480w,
                                                img/res-niddou-maquette.jpg 240w" sizes="(max-width:600px) 260px,
                                               (max-width:1700px) 480px" alt="vignette" title="cliquez pour agrandir"></a>
                </figure>
                <div class="textlist">
                    <h3>Liste cadeaux</h3>
                    <p class="tel">Haec igitur lex in amicitia sanciatur, ut neque rogemus res turpes nec faciamus rogati. Turpis enim excusatio est et minime accipienda cum in ceteris peccatis, tum si quis contra rem publicam se amici causa fecisse fateatur.</p>
                    <a class="btn btnc" href="listes.html">Découvrir le principe et les idées...</a>
                </div>
            </div>
        </section>
    </main>

        
        
HERE;
    }


 }