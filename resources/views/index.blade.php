<x-layout>

<section id="kijkgat_mobile">
        <button class="giant-circle-button link" id="activateCamera">
          <img src="assets/images/touch.png" alt="touch" />
          Activeer Kijkgat
        </button>
        <div class="align-centre-flex">
          <div id="camera-container">
            <video width="250" height="250" id="camera-view" autoplay playsinline></video>
          </div>
        </div>
      </section>

      <section class="canvas" id="canvas_container">
    <h1 class="its-ya-boi-in-the-middle">KIJKGAT</h1>
   
        <canvas id="canvas">

        </canvas>

        <div class="kijkgat_controls">

          <div class="left_controls">
            <div class="kijkgat">Kijkgat: <span class="activeText">aan</span></div>
            <sl-switch checked style="--width: 80px; --height: 40px; --thumb-size: 36px;"></sl-switch>
          </div>

          <div class="center_controls">
            <div class="chevvy">
              <a href="#spinning_plates"><sl-icon-button name="chevron-double-down" class="scrollDown"
                  label="down"></sl-icon-button></a>
            </div>
          </div>

          <div class="slider_controls">
            <sl-icon-button name="chevron-left" class="kijkgat_button_round prevButton" label="left"></sl-icon-button>
            <div class="kijkgat sliderText">Foto 1/9</div>
            <sl-icon-button class="kijkgat_button_round nextButton" name="chevron-right" label="left"></sl-icon-button>
          </div>

          <div class="mobile_chevron">
            <div class="chevvy">
              <a href="#spinning_plates"><sl-icon-button name="chevron-double-down" class="scrollDown"
                  label="down"></sl-icon-button></a>
            </div>
          </div>
        </div>
        </div>

      </section>

      <section class="the-world-is-a-museum">
        <div class="content-container">
          <h2>DE WERELD ALS MUSEUM</h2>
          <p>
          Kijkgat: een kaartje met een gat. Een uitgeknipte cirkel, dat dient als kader voor de wereld om je heen. Een gat om ruis weg te halen en zo meer te kunnen zien. <br><br>

          Bij het gebruiken van een Kijkgat zet je alledaagse voorwerpen of beelden in een nieuw kader, wat nieuwe beelden of verhalen oplevert die je anders nooit zo zou bekijken. Een eindeloos spel dat de wereld in een museum laat veranderen. Hiermee brengen we creativiteit en inspiratie in ieder persoon naar boven.  <br><br>

          Op deze site ontdek je wat voor vondsten Kijkgat-gebruikers doen aan de hand van verschillende thema’s. Een expositie van fragmenten die de basis vormen voor ieders creativiteit.
          </p>  
        </div>
      </section>

      <div class="the-new-ticker">
        <img src="/assets/images/globaltranslations2.gif" alt="kijkgat in different languages moving" />
      </div>

      <section class="expo">
        <div class="content-container">
          <h2>ONLINE KIJKGAT EXPO</h2>
          <h3>#1 TEXTUUR</h3>
          <p>Dit zijn de inzendingen van juni, <a href="">schrijf je in</a> voor onze nieuwsbrief om de volledige expo mee te krijgen.
        </div>
         <swiper-container class="mySwiper"  slides-per-view="5"
    space-between="30" free-mode="true">
    <swiper-slide>
      <img src="/assets/images/inzendingen/1.png" alt="expo image 1" />
    </swiper-slide>
        <swiper-slide>
      <img src="/assets/images/inzendingen/2.png" alt="expo image 1" />
    </swiper-slide>
        <swiper-slide>
      <img src="/assets/images/inzendingen/3.png" alt="expo image 1" />
    </swiper-slide>
        <swiper-slide>
      <img src="/assets/images/inzendingen/4.png" alt="expo image 1" />
    </swiper-slide>
        <swiper-slide>
      <img src="/assets/images/inzendingen/5.png" alt="expo image 1" />
    </swiper-slide>
        <swiper-slide>
      <img src="/assets/images/inzendingen/1.png" alt="expo image 1" />
    </swiper-slide>
            <swiper-slide>
      <img src="/assets/images/inzendingen/1.png" alt="expo image 1" />
    </swiper-slide>
            <swiper-slide>
      <img src="/assets/images/inzendingen/1.png" alt="expo image 1" />
    </swiper-slide>
            <swiper-slide>
      <img src="/assets/images/inzendingen/1.png" alt="expo image 1" />
    </swiper-slide>

  </swiper-container>

      </section>
  

      <section class="mx-auto image_gallery">

        <div id="filters" class="button-group">
          <button class="button is-checked kijkgat" data-filter=".kader">Kader</button>
          <button class="button kijkgat" data-filter=".geenontwerp">Geen ontwerp</button>
          <button class="button kijkgat" data-filter=".rond">Rond</button>
          <button class="button kijkgat" data-filter=".nietrond">Niet rond</button>
          <button class="button kijkgat" data-filter=".hetbestondal">Het bestond al</button>
        </div>

        <div class="mx-auto text_for_products" id="filter-text">
          <p data-filter=".kader">Een Kijkgat vormt een kader voor de wereld om je heen.
            Het laat je focussen op specifieke beelden, waar je zonder dit kader niet zomaar naar zou kijken.
            Een kader om ruis weg te halen en zo meer te kunnen zien. </p>
          <p data-filter=".rond">Het gat is rond, om associaties met veel voorkomende rechthoekige kaders te vermijden.
            Zo wordt het kijken door een Kijkgat niet in direct verband gebracht met bijvoorbeeld fotografie,
            een mobiele telefoon of een schilderij. </p>
          <p data-filter=".hetbestondal">Een spiegel, een raam, een deuropening, een omlijsting.
            Een verrekijker, een vergrootglas, een camera. Een achtergelaten autoband langs de weg,
            de tunnels in de oren van Michelle. Een kaartje met een gat, een poster met een gat, een muur met een gat.

            Een gat, het bestond al. Kijkgat nog niet.</p>
          <p data-filter=".geenontwerp">Een kijkgat heeft geen vaste kleur of ontwerp. Hierdoor behoudt
            het de focus op wat er door het gat te zien is. Het enige vaste is de vorm:
            een kaartje met een gat. Het uiterlijk hiervan wordt bepaald door het gebruik en de gebruiker.</p>
          <p data-filter=".nietrond">Het gat is rond, maar het gaat niet om de rondheid van een Kijkgat.
            Niet elk Kijkgat wordt op de millimeter nauwkeurig gereproduceerd, waardoor niet elk Kijkgat
            altijd precies hetzelfde eruit komt te zien. Voor het gebruik van Kijkgat maakt dit echter
            geen verschil. Het gaat niet om de cirkel, het gaat over wat je er doorheen ziet.</p>
        </div>

        <div class="grid" id="gallery">
          <div class="grid-item kader">
            <a data-fslightbox="gallery" href="assets/images/isotope/kader_1.jpg">
              <img src="/assets/images/isotope/kader_1.jpg" alt="kijkgat" />
            </a>
          </div>
          <div class="grid-item kader">
            <a data-fslightbox="gallery" href="assets/images/isotope/kader_2.jpg">
              <img src="/assets/images/isotope/kader_2.jpg" alt="kijkgat" />
            </a>
          </div>
          <div class="grid-item kader">
            <a data-fslightbox="gallery" href="assets/images/isotope/kader_3.jpg">
              <img src="/assets/images/isotope/kader_3.jpg" alt="kijkgat" />
            </a>
          </div>
          <div class="grid-item rond">
            <a data-fslightbox="gallery" href="assets/images/isotope/rond_1.jpg">
              <img src="/assets/images/isotope/rond_1.jpg" alt="kijkgat" />
            </a>
          </div>
          <div class="grid-item rond">
            <a data-fslightbox="gallery" href="assets/images/isotope/rond_2.jpg">
              <img src="/assets/images/isotope/rond_2.jpg" alt="kijkgat" />
            </a>
          </div>
          <div class="grid-item rond">
            <a data-fslightbox="gallery" href="assets/images/isotope/rond_3.jpg">
              <img src="/assets/images/isotope/rond_3.jpg" alt="kijkgat" />
            </a>
          </div>
          <div class="grid-item nietrond">
            <a data-fslightbox="gallery" href="assets/images/isotope/nietrond_1.jpg">
              <img src="/assets/images/isotope/nietrond_1.jpg" alt="kijkgat" />
            </a>
          </div>
          <div class="grid-item nietrond">
            <a data-fslightbox="gallery" href="assets/images/isotope/nietrond_2.jpg">
              <img src="/assets/images/isotope/nietrond_2.jpg" alt="kijkgat" />
            </a>
          </div>
          <div class="grid-item nietrond">
            <a data-fslightbox="gallery" href="assets/images/isotope/nietrond_3.jpg">
              <img src="/assets/images/isotope/nietrond_3.jpg" alt="kijkgat" />
            </a>
          </div>
          <div class="grid-item geenontwerp">
            <a data-fslightbox="gallery" href="assets/images/isotope/geenontwerp_1.jpg">
              <img src="/assets/images/isotope/geenontwerp_1.jpg" alt="kijkgat" />
            </a>
          </div>
          <div class="grid-item geenontwerp">
            <a data-fslightbox="gallery" href="assets/images/isotope/geenontwerp_2.jpg">
              <img src="/assets/images/isotope/geenontwerp_2.jpg" alt="kijkgat" />
            </a>
          </div>
          <div class="grid-item geenontwerp">
            <a data-fslightbox="gallery" href="assets/images/isotope/geenontwerp_3.jpg">
              <img src="/assets/images/isotope/geenontwerp_3.jpg" alt="kijkgat" />
            </a>
          </div>
          <div class="grid-item hetbestondal">
            <a data-fslightbox="gallery" href="assets/images/isotope/hetbestondal_1.jpg">
              <img src="/assets/images/isotope/hetbestondal_1.jpg" alt="kijkgat" />
            </a>
          </div>
          <div class="grid-item hetbestondal">
            <a data-fslightbox="gallery" href="assets/images/isotope/hetbestondal_2.jpg">
              <img src="/assets/images/isotope/hetbestondal_2.jpg" alt="kijkgat" />
            </a>
          </div>
          <div class="grid-item hetbestondal">
            <a data-fslightbox="gallery" href="assets/images/isotope/hetbestondal_3.jpg">
              <img src="/assets/images/isotope/hetbestondal_3.jpg" alt="kijkgat" />
            </a>
          </div>
        </div>

      </section>



      <footer id="footer">
        <div class="kijkgat_logo_container">
          <img src="assets/images/kijkgatgrain.png" alt="kijkgat logo grain" />
        </div>

        <div class="icons_container">
          <a href="https://www.instagram.com/kijkgaten/" target="_blank">
            <img src="assets/images/instagram_logo.png" alt="instagram logo" />
          </a>
          <a href="https://www.linkedin.com/company/kijkgat/" target="_blank">
            <img src="assets/images/linkedin_logo.png" alt="linkedin logo" />
          </a>

          <p class="little_thingy">mail@kijkgat.com</p>

          <p class="little_outro">Ontwikkeld door
            Michelle v/d Plaats en Allert Sjabbens</p>
        </div>

        <div class="pgum_containert">
          Online gezet door <a href="https://potloodgum.com" target="_blank" class="gum">Potloodgum</a>
        </div>
      </footer>

    </main>

    <!-- I am sorry mom, I used alot of js and didn't minify any of it but to be honest minify is overrated -->
    <script src="js/imagesloaded.js"></script>
    <script src="js/isotope.js"></script>
    <script src="js/canvas.js"></script>
    <script src="js/camera.js"></script>
    <script src="js/fslightbox.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>


    <script type="module"
      src="https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace@2.12.0/cdn/shoelace-autoloader.js"></script>
    
</x-layout>
   