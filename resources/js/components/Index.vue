<template>
  <HeaderIndex></HeaderIndex>

  <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center justify-content-center">
      <div class="container" data-aos="fade-up">

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
          <div class="col-xl-6 col-lg-8">
            <h1>{{ $t("Office de Promotion et de Gestion Immobilière") }}<span>.</span></h1>
            <h2 id="wilaya">{{ $t("Wilaya de BOUMERDES")}}</h2>
          </div>
        </div>

        <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
          <div class="col-xl-2 col-md-4">
            <div class="icon-box">
              <i class="bi bi-bank"></i>
              <h3 id="center-arabic"><a href="">{{ $t("Direction Générale") }}</a></h3>
            </div>
          </div>
          <div class="col-xl-2 col-md-4">
            <div class="icon-box">
              <i class="bi bi-building-gear"></i>

              <h3 id="center-arabic"><a href=""><span data-purecounter-start="0" data-purecounter-end="06" data-purecounter-duration="4" class="purecounter"></span>
               {{ $t("Unités réparties dans la wilaya rapprochant l'administration des citoyens") }} .</a></h3>
            </div>
          </div>
          <div class="col-xl-2 col-md-4">
            <div class="icon-box">
              <i class="bi bi-house-gear"></i>
              <h3 id="center-arabic"><a href=""> <span data-purecounter-start="0" data-purecounter-end="17" data-purecounter-duration="4" class="purecounter"></span>
                {{$t('Caisses réparties dans la wilaya facilitant le paiement pour les locataires')}}.</a></h3>
            </div>
          </div>
          <!-- 
          <div class="col-xl-2 col-md-4">
            <div class="icon-box">
              <i class="ri-paint-brush-line"></i>
              <h3><a href="">Magni Dolores</a></h3>
            </div>
          </div>
          <div class="col-xl-2 col-md-4">
            <div class="icon-box">
              <i class="ri-database-2-line"></i>
              <h3><a href="">Nemos Enimade</a></h3>
            </div>
          </div> -->
        </div>

      </div>
    </section>
  <!-- End Hero -->

     <!-- ======= Counts Section  Espace Client======= -->
      <div class="container" data-aos="fade-up"  style="margin-top: 6rem;">

        <div class="section-title">
          <h2>{{$t("Plateforme en ligne")}}</h2>
          <p>{{$t("Espace Locataire")}}</p>
        </div>
        <div class="arrow-container mt-3">
          <img src="assets/img/arrow.jpg" alt="Flèche" class="arrow-img">
        </div>

      </div>
  
  <!-- ======= Features Section Espace Client ======= -->
    <section id="features" class="features">
      <div class="container" data-aos="fade-up">

       

        <div class="row">
          <div class="image col-lg-6" style='background-image: url("assets/img/client.png");' data-aos="fade-right"></div>
          
          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="100">
            <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">

                <i class="bi bi-credit-card"></i>
                <h4 >{{$t("Paiement en ligne")}} </h4> 
                <p>{{$t("Paiement partiel ou total, en utilisant la carte eddahabia ou bien la carte CIB")}}. </p> 
            </div>
            <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
              <i class="bi bi-list-ul"></i>
           <!--   <h4>{{$t("Mes quittances de paiement")}}</h4>
              <p>{{$t("Consultation des quittances réglées en ligne via l'e-paiement, ainsi que celles réglées en espèces/TPE au niveau des caisses, avec la possibilité de les exporter au format PDF")}}.</p> -->
            <h4>{{$t("Achat et Acquisition des biens")}}</h4>
              <p>{{$t("Acquisition des locaux à usage d’habitation, commercial, professionnel ou artisanal.")}}</p>
            </div>
            <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
              <i class="bi bi-hourglass-split"></i>
              <h4>{{$t("Préoccupations et Doléances")}}</h4>
              <p>{{$t("Soumission des doléances (Réclamation, demande d'achat et autres), Réception des réponses à chaque demande...")}}</p>
            </div>
            <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
              <i class="bi bi-sort-up"></i>
              <h4>{{$t("Mouvement du contrat")}}</h4>
              <p>{{$t("Suivi de l'état d’avancement du contrat, sa position actuelle dans le processus, les actions en cours le concernant...")}}
              </p>
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="sam" data-aos="fade-left" data-aos-delay="100">
            <h4 >{{$t("Et bien plus de fonctionnalités via")}} : </h4>
            <a href="https://client.opgi-boumerdes.dz/Login" target="_blank" class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150" >
              <i class="bi bi-arrow-right-circle-fill"></i>
            </a>
          </div>
        </div>

       
    
    
    
    

      </div>
    </section><!-- End Features Section -->
    <!-- ======= About Section ======= 
      <div class="container" data-aos="fade-up">

      

      </div>
      <section id="about" class="about">
        <div class="container" data-aos="fade-up">

          <div class="row">
            <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
              <img src="assets/img/about.jpg" class="img-fluid" alt="" height="auto"  width="100%">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
              <h3>{{$t('Présentation')}}</h3>
              <p class="fst-italic">
               {{ $t("L’Office de Promotion et de Gestion Immobilière de la wilaya de Boumerdes (O.P.G.I de Boumerdes) a été crée à l’instar des autres offices répartis à travers le territoire national par le décret 76/93 du 23/10/1976 fixant les conditions de création des OPGI") }} .
                <br> <br> {{ $t("Sa nature juridique a été transformée par le décret exécutif n°91/147 du 21 mai 1991 portant modification de la nature juridiques des statuts des OPGI")}}.
                
                <br> <br>{{ $t("Conformément à l’article 1 du décret exécutif ci-dessus, l’OPGI est un établissement public à caractère industriel et commercial, il est réputé commerçant dans ses rapports avec les tiers et est soumis aux règles de droit commercial")}}.    
              </p> 
              
              
            </div>
          </div>

        </div>
      </section>
   End About Section -->

    
    <!-- ======= Features Section ======= -->
      <!-- <section id="features" class="features">
        <div class="container" data-aos="fade-up">

          <div class="row">
            {{$t('Conformément à l’article 4 du décret exécutif n° 91/147 du 12/05/1991, l’OPGI est investi des missions suivantes :')}}
              <ul>
                <li><i class="ri-check-double-line"></i> {{$t('Promouvoir le service public en matière de logement notamment pour les catégories sociales les plus démunies')}}.</li>
                
              </ul>
              {{$t("À titre d'accessoire, il est chargé de") }}: 
              <ul>  
                <li><i class="ri-check-double-line"></i> {{$t("La promotion Immobilière et Foncière") }}.</li>
                <li><i class="ri-check-double-line"></i> {{$t("La maîtrise d’ouvrage déléguée de l’Etat ou pour le compte de tout autre opérateur") }}.</li>
                <li><i class="ri-check-double-line"></i> {{$t("Des actions de prestation de services en vue d’assurer l’entretien, la maintenance, la  restauration et la réhabilitation des biens immobiliers") }}.</li>
                <li><i class="ri-check-double-line"></i> {{$t("En outre, il est habilité à gérer les biens immobiliers qui lui sont confiés suivant une  convention déterminant les conditions et modalités de prise charge de cette mission") }}.
                </li>
                <li><i class="ri-check-double-line"></i> 	{{$t("L’administration des biens immobiliers suivant les dispositions du décret exécutif n°97-154 du 10 mai 1997") }}.
                </li>
                <li><i class="ri-check-double-line"></i> {{$t("Reconstruction des logements démolis suite au séisme du 21 mai 2003 ( cité 520/1200 logts Ibn Khaldoun, Boumerdes)") }}.
                </li>
              </ul> -->
            <!-- <div class="image col-lg-6" style='background-image: url("assets/img/features.jpg");' data-aos="fade-right"></div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="100">
              <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
                <i class="bx bx-receipt"></i>
                <h4>Est labore ad</h4>
                <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
              </div>
              <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
                <i class="bx bx-cube-alt"></i>
                <h4>Harum esse qui</h4>
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
              </div>
              <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
                <i class="bx bx-images"></i>
                <h4>Aut occaecati</h4>
                <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
              </div>
              <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
                <i class="bx bx-shield"></i>
                <h4>Beatae veritatis</h4>
                <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p>
              </div>
            </div> 
          </div>

        </div>
      </section>-->
    <!-- End Features Section -->


    <!-- ======= Testimonials Section  ACTUALITES ======= -->
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>{{$t("Actualités")}}</h2>
          <p>{{$t("Dernières Actualités")}}</p>
          <router-link :to="{ name: 'Actualites' }" >               {{$t("Voir toutes les actualités")}}        </router-link>
        </div>
      </div>

     
      <section id="testimonials" class="testimonials">
        <div class="container" data-aos="zoom-in">
          <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <swiper
              :modules="modules"
              :pagination="{ clickable: true, el: '.swiper-pagination-custom' }"
              :autoplay="{ delay: 3000, disableOnInteraction: false }"
              class="swiper-wrapper"
            >
              <swiper-slide v-for="actualite in actualitesIndex" :key="actualite?.id">
                <div class="testimonial-item" v-if="actualite && actualite.images && actualite.images.length > 0">
                  <img :src="'/storage/' + actualite.images[0].url" :alt="actualite.images[0].caption" class="testimonial-img">
                  <h3 id="center-arabic">{{ actualite.title }} </h3>
                  <br>
                  <p>
                    <h2 id="center-arabic">
                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                      {{ actualite.content }}
                      <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </h2>
                    <h4 id="center-arabic"> <a href="" @click.prevent="readMore(actualite)"> {{$t("Lire plus")}}</a></h4>
                    <br>
                  </p>
                </div>
              </swiper-slide>
            </swiper>
            <div class="swiper-pagination swiper-pagination-custom"></div>
          </div>
        </div>
      </section>

    <!-- End Testimonials Section -->


    <!-- ======= Services Section LPL/LPA/LP ======= -->
      <section id="services" class="services">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>{{$t("Programmes")}}</h2>
            <p>{{$t("Nos Programmes")}}</p>
          </div>

          <div class="row">
            <div class="col-lg-4 col-md-6 align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box">
                <div class="icon"><i class="bi bi-building"></i></div>
                <h4 id="center-arabic"><a href="">LPL</a></h4>
                <p id="center-arabic">{{$t("Logements Publics Locatifs")}}</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
              <div class="icon-box">
                <div class="icon"><i class="bi bi-building-add"></i></div>
                <h4 id="center-arabic"><a href="">LPA</a></h4>
                <p id="center-arabic">{{$t("Logement Promotionnel Aidé")}} </p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box">
                <div class="icon"><i class="bi bi-building-check"></i></div>
                <h4 id="center-arabic"><a href="">LP</a></h4>
                <p id="center-arabic"> {{$t("Logement Promotionnel")}}</p>
              </div>
            </div>

            <!-- <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-world"></i></div>
                <h4><a href="">Nemo Enim</a></h4>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-slideshow"></i></div>
                <h4><a href="">Dele cardo</a></h4>
                <p>Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-arch"></i></div>
                <h4><a href="">Divera don</a></h4>
                <p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>
              </div>
            </div> -->

          </div>

        </div>
      </section>
    <!-- End Services Section -->


    <!-- ======= cta Call to action Section ======= -->
     <!--  <section id="cta" class="cta">
        <div class="container" data-aos="zoom-in">

          <div class="text-center">
            <h3>Call To Action</h3>
            <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <a class="cta-btn" href="#">Call To Action</a>
          </div>

        </div>
      </section> -->
    <!-- End Cta Section -->

    <!-- ======= Portfolio Section PROJETS PICS And VIDEOS ======= -->
      <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>{{$t("Galerie")}}</h2>
            <p>{{$t("Nos projets")}}</p>
          </div>

          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">{{$t("Tous")}}</li>
                <li data-filter=".filter-app">{{$t("Vidéos")}}</li>
                <li data-filter=".filter-card">{{$t("Photos")}}</li>
                
              </ul>
            </div>
          </div>

          <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <!-- Remplacez l'image par la vidéo YouTube -->
                <iframe width="100%" height="350" src="https://www.youtube.com/embed/gM3KCkBhICs?si=0LqcNIS52mBY33bq" title="YouTube video player" autoplay frameborder="0" allowfullscreen></iframe>
                <div class="portfolio-info">
                  <h4>Patrimoine de l'OPGI de Boumerdes</h4>
                  <p></p>
                  <div class="portfolio-links">
                        <!-- Lien pour ouvrir la vidéo sur YouTube -->
                      <a href="https://www.youtube.com/embed/gM3KCkBhICs?si=0LqcNIS52mBY33bq" target="_blank" title="Watch on YouTube"><i class="bx bxl-youtube"></i></a>
                    <!-- Vous pouvez conserver ces liens si vous le souhaitez -->
                    <a href="https://www.youtube.com/embed/gM3KCkBhICs?si=0LqcNIS52mBY33bq" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Patrimoine de l'OPGI de Boumerdes
                    "><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
            </div>
            

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <div class="portfolio-wrap">
                <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>380 Logements Boumerdes</h4>
                  <p>LPL</p>
                  <div class="portfolio-links">
                    <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="380 LPL Boumerdes"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <!-- Remplacez l'image par la vidéo YouTube -->
                <iframe width="100%" height="450" src="https://www.youtube.com/embed/QS_zrLOq174?si=GH4IifhXDyRRNSnz" frameborder="0" allowfullscreen></iframe>
                <div class="portfolio-info">
                  <h4>عملية توزيع السكنات بمناسبة حلول الذكرى 68 لاندلاع الثورة الجزائرية - بومرداس</h4>
                  <p></p>
                  <div class="portfolio-links">
                    <!-- Lien pour ouvrir la vidéo sur YouTube -->
                    <a href="https://www.youtube.com/embed/QS_zrLOq174?si=GH4IifhXDyRRNSnz" target="_blank" title="Watch on YouTube"><i class="bx bxl-youtube"></i></a>
                    <!-- Vous pouvez conserver ces liens si vous le souhaitez -->
                    <a href="https://www.youtube.com/embed/QS_zrLOq174?si=GH4IifhXDyRRNSnz" data-gallery="portfolioGallery" class="portfolio-lightbox" title="عملية توزيع السكنات بمناسبة حلول الذكرى 68 لاندلاع الثورة الجزائرية - بومرداس"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
            </div>
            
           
            

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <div class="portfolio-wrap">
                <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>76 Logements Zemmouri</h4>
                  <p>LPL</p>
                  <div class="portfolio-links">
                    <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="76 LPL Zemmouri"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <div class="portfolio-wrap">
                <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>300 Logements Si mustapha</h4>
                  <p>LPL</p>
                  <div class="portfolio-links">
                    <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="300 LPL Si mustapha"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <div class="portfolio-wrap">
                <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>200 Logements Ouled Heddadj</h4>
                  <p>LPL</p>
                  <div class="portfolio-links">
                    <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="200 LPL Ouled Heddadj"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <div class="portfolio-wrap">
                <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>100 Logements Ouled Heddadj</h4>
                  <p>LPL</p>
                  <div class="portfolio-links">
                    <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="100 LPL Ouled Heddadj"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <div class="portfolio-wrap">
                <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Card 3</h4>
                  <p>Card</p>
                  <div class="portfolio-links">
                    <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <div class="portfolio-wrap">
                <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Web 3</h4>
                  <p>Web</p>
                  <div class="portfolio-links">
                    <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
            </div> -->

          </div>

        </div>
      </section>
    <!-- End Portfolio Section -->

   

  


    <!-- ======= Clients Section LIENS UTILES ======= -->
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>{{$t("Liens")}}</h2>
          <p>{{$t("Liens utiles")}}</p>
        </div>

      </div>
      <section id="clients" class="clients">
        <div class="container" data-aos="zoom-in">

          <div class="clients-slider swiper">
            <div class="swiper-wrapper align-items-center">
              <div class="swiper-slide"><a href="http://www.mhuv.gov.dz/"><img src="assets/img/logos/mhuv-logo.jpg" class="img-fluid" alt=""></a></div>
              <div class="swiper-slide"><a href="https://bnh.dz/"><img src="assets/img/logos/bnh-logo.jpg" class="img-fluid" alt=""></a></div>
              <div class="swiper-slide"><a href="https://www.aadl.com.dz/"><img src="assets/img/logos/aadl-logo.jpg" class="img-fluid" alt=""></a></div>
              <div class="swiper-slide"><a href="http://www.enpi.dz/"><img src="assets/img/logos/enpi-logo.jpg" class="img-fluid" alt=""></a></div>
              <div class="swiper-slide"><a href="http://www.fnpos.dz/"><img src="assets/img/logos/fnpos-logo.jpg" class="img-fluid" alt=""></a></div>
              <div class="swiper-slide"><a href="https://www.gloriousalgeria.dz/Ar"><img src="assets/img/logos/gloriousalgeria-logo.png" class="img-fluid" alt=""></a></div>

              
              
            </div>
            <div class="swiper-pagination"></div>
          </div>

        </div>
      </section> 
    <!-- End Clients Section -->
   
  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

            <div class="section-title">
              <h2>{{$t("Contact")}}</h2>
              <p>{{$t("Contactez-nous")}}</p>
            </div>

            <div>
              <iframe style="border:0; width: 100%; height: 270px;" src=
              "https://www.google.com/maps/d/u/0/embed?mid=18hIwYXb0gd3v54JJRytVBjx1DR51tis&ehbc=2E312F" frameborder="0" allowfullscreen loading="lazy"></iframe>
            </div>

            <div class="row mt-5">

              <div class="col-lg-4">
                  <div class="info">
                      <div class="address">
                          <i class="bi bi-geo-alt"></i>
                          <h4>{{$t("Adresse")}}:</h4>
                          <p>{{$t("Cité Administrative, Boumerdes, Algérie")}}</p>
                      </div>

                      <div class="email">
                          <i class="bi bi-envelope"></i>
                          <h4>{{$t("Email")}}:</h4>
                          <p><a href="mailto:contact@opgi-boumerdes.dz"> contact@opgi-boumerdes.dz</a></p>
                      </div>

                      <div class="phone">
                          <i class="bi bi-phone"></i>
                          <h4>{{$t("Téléphone")}}:</h4>
                          <p><a href="tel:024795858" class="ltr-text"> +213 (0) 24 79 58 58 </a></p>
                      </div>
                  </div>

              </div>

              <div class="col-lg-8 mt-5 mt-lg-0">

                <Contact></Contact>
            
              </div>

        </div>

      </div>
  </section>
    <!-- End Contact Section -->



</template>



<script setup>

        import { ref, onMounted } from 'vue';
        import useActualites from '../composition-api/useActualites';
        import HeaderIndex from './HeaderIndex.vue';
        import Contact from './Contact.vue';
        import { useRouter } from 'vue-router';
        import { Pagination, Autoplay } from 'swiper';

        // Utilisation du composable useActualites
        const { actualitesIndex, fetchActualitesIndex } = useActualites();
        const router = useRouter();
        const modules = [Pagination, Autoplay];

        // Chargement des actualités lors de la création du composant
        onMounted(() => {
          fetchActualitesIndex();
        });

        const readMore = (actualite) => {
          router.push({ name: 'Actualite', params: { actualiteId: actualite.id } });
        };

</script>


<style>


/* Style pour les bulles de pagination */
.swiper-pagination-custom .swiper-pagination-bullet {
  
  width: 12px;
  height: 12px;
  background-color: rgba(255, 255, 255, 0.4)!important; /* Utilisez !important pour forcer l'application de la couleur */
  opacity: 1; /* Assurez-vous que les bulles soient bien visibles */
}

/* Style pour la bulle active */
.swiper-pagination-custom .swiper-pagination-bullet-active {
  background-color: #ffc451 !important; /* Utilisez !important pour forcer l'application de la couleur */
}

</style>





