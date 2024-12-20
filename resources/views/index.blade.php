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

        <canvas id="canvas">

        </canvas>

        <div class="kijkgat_controls">

            <div class="left_controls">
                <div class="kijkgat">Kijkgat: <span class="activeText">aan</span></div>
                <sl-switch checked style="--width: 80px; --height: 40px; --thumb-size: 36px;"></sl-switch>
            </div>

            <div class="center_controls">
                <div class="chevvy">
                    <a href="#spinning_plates">
                        <sl-icon-button name="chevron-double-down" class="scrollDown" label="down"></sl-icon-button>
                    </a>
                </div>
            </div>

            <div class="slider_controls">
                <sl-icon-button name="chevron-left" class="kijkgat_button_round prevButton"
                    label="left"></sl-icon-button>
                <div class="kijkgat sliderText">Foto 1/9</div>
                <sl-icon-button class="kijkgat_button_round nextButton" name="chevron-right"
                    label="left"></sl-icon-button>
            </div>

            <div class="mobile_chevron">
                <div class="chevvy">
                    <a href="#spinning_plates">
                        <sl-icon-button name="chevron-double-down" class="scrollDown" label="down"></sl-icon-button>
                    </a>
                </div>
            </div>
        </div>
        </div>

    </section>

    <section class="the-world-is-a-museum" id="spinning_plates" @if($settings->first_color) style="background-color:{{$settings->first_color}}" @endif>
        <div class="content-container">
            <h2>
                @if ($settings->main_title) {{ $settings->main_title }} @else DE WERELD ALS MUSEUM @endif
            </h2>
            {!! $settings->description !!}
        </div>
    </section>

    <div class="the-new-ticker" @if($settings->second_color) style="background-color:{{$settings->second_color}}" @endif>
        <img src="/assets/images/going global.gif" alt="kijkgat in different languages moving" />
    </div>


    @if (count($submissions) > 1)

        <section class="expo" @if($theme->color) style="background-color:{{$theme->color}}" @endif>
            <div class="content-container">
                <h2>ONLINE KIJKGAT EXPO</h2>
                <h3>{{ $theme->titel }}</h3>
                <p>{!! $theme->description !!}</p>
       
            </div>

            <swiper-container class="mySwiper" slides-per-view="5" space-between="30" free-mode="true" autoplay="true">

                @foreach ($submissions as $submission)
                    <swiper-slide>
                        <img src="storage/{{$submission->attachment }}" alt="expo image" />
                        <div class="swipe_text">
                            <span class="swipe_title">{{ $submission->description }}</span>
                            <span>{{ $submission->name }}</span>
                        </div>
                    </swiper-slide>
                @endforeach
            </swiper-container>
        </section>
    @else
        <section class="expo">
            <div class="content-container">
                <h2>ONLINE KIJKGAT EXPO</h2>

                <p>Deze maand nog geen inzendingen, <a href="https://buttondown.email/Kijkgat">schrijf je in</a> voor
                    onze nieuwsbrief om de volledige expo mee te krijgen.
            </div>
        </section>
    @endif


    <section class="inzending" @if($settings->third_color) style="background-color:{{$settings->third_color}}" @endif>
        <div class="inzending_box">
            <div>
                <h2>DEEL JOUW VONDST*</h2>
                <p>
                    Vind iets binnen het thema en claim jouw plekje in de expositie. Wanneer je je inschrijft voor de <a
                        href="https://buttondown.email/Kijkgat">nieuwsbrief</a> krijg je de volledige expositie aan het
                    eind van de maand in je mailbox, inclusief jouw inzending!

                    <br><br>
                    *Tip: zorg ervoor dat je camera niet op het kaartje focust, maar op wat er door het gat te zien is.
                </p>

                <br>

               <a href="/inzending" class="kijkgat">Deel jouw vondst</a>
                
            </div>

            <!-- <div class="form_box" id="submission_form">


                @if (session()->has('message'))
                    <div class="confirmed_submission">
                        <h3>We gaan het bekijken!</h3>
                        <p>Wij gaan je inzending goedkeuren!.</p>
                        <p>Bedankt voor het insturen.</p>
                        <img src="/assets/images/kijkboi.png" alt="bedankt voor insturen" />
                    </div>
                @else
                    <h3>Inzending voor: #1 Textuur</h3>
                    <form action="/submissions" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image" id="image" required>


                        <label for="name">Jouw naam</label>
                        <input type="text" name="name" id="name" placeholder="Jouw naam" required>

                        <label for="email">Jouw email</label>
                        <input type="email" name="email" id="email" placeholder="voorbeeld@gmail.com" required
                            autocomplete="off">


                        <label for="description">Beschrijf wat we zien door het kijkgat</label>
                        <input type="description" name="description" placeholder="Wat zie je?" id="description"
                            required>

                        <input type="submit" value="Verstuur inzending">

                    </form>
                @endif
            </div>
        </div> -->
    </section>

    <section class="grey-matter">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
            @foreach ($masterpieces as $masterpiece)
                <div class="swiper-slide">
                    <h2>{{ $masterpiece->name }}</h2>
                    <p>{{ $masterpiece->description }}</p>
                    <div class="swiper-content">
                        <div class="highlight_images_container">
                            <img src="storage/{{ $masterpiece->image }}" alt="highlight image" />
                            <img src="storage/{{ $masterpiece->second_image }}" alt="highlight image" />
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="like_spinning_plates">
        <img src="/assets/images/kijkgatpotloodgum.gif" alt="kijkgat logo spinning" />

        <div class="align-centre-flex">

            <div class="kijkgat wordswitch">Zie wat je nog niet zag</div>
            <div class="kijkgat wordswitch hidden">Een fragment</div>
            <div class="kijkgat wordswitch hidden">Een schets</div>
            <div class="kijkgat wordswitch hidden">Een verhaal</div>
            <div class="kijkgat wordswitch hidden">Een vondst</div>
            <div class="kijkgat wordswitch hidden">Een gewoonte</div>
            <div class="kijkgat wordswitch hidden">Het alledaagse</div>
            <div class="kijkgat wordswitch hidden">De schoonheid van</div>
            <div class="kijkgat wordswitch hidden">Een kaartje met een gat</div>
        </div>
    </section>

    <section class="yellow-the-worst-coldplay-song">

        <section class="mx-auto image_gallery">
            <div class="big_header">
                <h1>HET ONTWERP VAN KIJKGAT</h1>
            </div>
            <div id="filters" class="button-group">
                <button class="button is-checked kijkgat" data-filter=".geenontwerp">Geen ontwerp</button>
                <button class="button kijkgat" data-filter=".vorm">Vorm</button>
                <button class="button kijkgat" data-filter=".rond">Rond</button>
                <button class="button kijkgat" data-filter=".nietrond">Niet rond</button>
                <button class="button kijkgat" data-filter=".hetbestondal">Het bestond al</button>
            </div>

            <div class="mx-auto text_for_products" id="filter-text">
                <p data-filter=".vorm">Een Kijkgat heeft dezelfde afmeting als een pinpas, zodat hij makkelijk kan
                    worden meegenomen. Zo heb je je Kijkgat op elk nodig moment bij je.</p>

                <p data-filter=".rond">Het gat is rond, om associaties met veel voorkomende rechthoekige kaders te
                    vermijden. Zo worden de beelden of vondsten die je met je Kijkgat tegenkomt niet in direct verband
                    gebracht met bijvoorbeeld fotografie, een mobiele telefoon of een schilderij.</p>

                <p data-filter=".hetbestondal">Een spiegel, een raam, een deuropening, een omlijsting. Een verrekijker,
                    een vergrootglas, een camera. Een achtergelaten autoband langs de weg, de tunnels in de oren van
                    Michelle. Een kaartje met een gat, een poster met een gat, een muur met een gat. Een gat, het
                    bestond al. Kijkgat nog niet.</p>

                <p data-filter=".geenontwerp">Een Kijkgat heeft geen vaste kleur of ontwerp. Hierdoor behoudt het de
                    focus op wat er door het gat te zien is. Het enige vaste is de vorm: een kaartje met een gat. Het
                    uiterlijk hiervan wordt bepaald door het materiaal en het gebruik. </p>

                <p data-filter=".nietrond">Het gat is rond, maar het gaat niet om de rondheid van een Kijkgat. Niet elk
                    Kijkgat wordt op de millimeter nauwkeurig gereproduceerd, waardoor niet elk Kijkgat altijd precies
                    hetzelfde eruit komt te zien. Voor het gebruik van Kijkgat maakt dit echter geen verschil. Het gaat
                    niet om de cirkel, maar wel wat je erdoorheen ziet.</p>

            </div>

            <div class="grid" id="gallery">
                <div class="grid-item vorm">
                    <a data-fslightbox="gallery" href="/assets/images/isotope/kader_1.jpg">
                        <img src="/assets/images/isotope/kader_1.jpg" alt="kijkgat" />
                    </a>
                </div>
                <div class="grid-item vorm">
                    <a data-fslightbox="gallery" href="/assets/images/isotope/kader_2.jpg">
                        <img src="/assets/images/isotope/kader_2.jpg" alt="kijkgat" />
                    </a>
                </div>
                <div class="grid-item vorm">
                    <a data-fslightbox="gallery" href="/assets/images/isotope/kader_3.jpg">
                        <img src="/assets/images/isotope/kader_3.jpg" alt="kijkgat" />
                    </a>
                </div>
                <div class="grid-item rond">
                    <a data-fslightbox="gallery" href="/assets/images/isotope/rond 1.png">
                        <img src="/assets/images/isotope/rond 1.png" alt="kijkgat" />
                    </a>
                </div>
                <div class="grid-item rond">
                    <a data-fslightbox="gallery" href="/assets/images/isotope/rond 2.png">
                        <img src="/assets/images/isotope/rond 2.png" alt="kijkgat" />
                    </a>
                </div>
                <div class="grid-item rond">
                    <a data-fslightbox="gallery" href="/assets/images/isotope/rond 3.png">
                        <img src="/assets/images/isotope/rond 3.png" alt="kijkgat" />
                    </a>
                </div>
                <div class="grid-item nietrond">
                    <a data-fslightbox="gallery" href="/assets/images/isotope/niet rond 1.png">
                        <img src="/assets/images/isotope/niet rond 1.png" alt="kijkgat" />
                    </a>
                </div>
                <div class="grid-item nietrond">
                    <a data-fslightbox="gallery" href="/assets/images/isotope/niet rond 2.png">
                        <img src="/assets/images/isotope/niet rond 2.png" alt="kijkgat" />
                    </a>
                </div>
                <div class="grid-item nietrond">
                    <a data-fslightbox="gallery" href="/assets/images/isotope/niet rond 3.png">
                        <img src="/assets/images/isotope/niet rond 3.png" alt="kijkgat" />
                    </a>
                </div>

                <div class="grid-item geenontwerp">
                    <a data-fslightbox="gallery" href="/assets/images/isotope/geen_ontwerp_1.jpg">
                        <img src="/assets/images/isotope/geen_ontwerp_1.jpg" alt="kijkgat" />
                    </a>
                </div>
                <div class="grid-item geenontwerp">
                    <a data-fslightbox="gallery" href="/assets/images/isotope/geen_ontwerp_2.jpg">
                        <img src="/assets/images/isotope/geen_ontwerp_2.jpg" alt="kijkgat" />
                    </a>
                </div>
                <div class="grid-item geenontwerp">
                    <a data-fslightbox="gallery" href="/assets/images/isotope/geen_ontwerp_3.jpg">
                        <img src="/assets/images/isotope/geen_ontwerp_3.jpg" alt="kijkgat" />
                    </a>
                </div>
                <div class="grid-item hetbestondal">
                    <a data-fslightbox="gallery" href="/assets/images/isotope/hetbestondal_1.jpg">
                        <img src="/assets/images/isotope/hetbestondal_1.jpg" alt="kijkgat" />
                    </a>
                </div>
                <div class="grid-item hetbestondal">
                    <a data-fslightbox="gallery" href="/assets/images/isotope/hetbestondal_2.jpg">
                        <img src="/assets/images/isotope/hetbestondal_2.jpg" alt="kijkgat" />
                    </a>
                </div>
                <div class="grid-item hetbestondal">
                    <a data-fslightbox="gallery" href="/assets/images/isotope/hetbestondal_3.jpg">
                        <img src="/assets/images/isotope/hetbestondal_3.jpg" alt="kijkgat" />
                    </a>
                </div>
            </div>

        </section>
    </section>

    <section class="all_the_kijkgats">
        <img src="/assets/images/kijkgat_expo_image.png" alt="kijkgat logo spinning" />

        Original official Kijkgat kopen? <a href="mailto:mail@kijkgat.com">Mail</a> of dm ons!
    </section>


    <footer id="footer">

        <div class="big_payoff_container">
            <div>
                <h1>BELEEF DE VOLLEDIGE EXPOSITIE</h1>
            </div>

            <div>
                <p>
                    Aan het eind van elke maand brengen we alle inzendingen samen en exposeren wij deze vondsten in de
                    nieuwsbrief. Ook kondigen we hierin elke maand het nieuwe thema aan. <a
                        href="https://buttondown.email/Kijkgat">Schrijf je in om niks te missen.</a>

                </p>

                <form action="https://buttondown.email/api/emails/embed-subscribe/Kijkgat" method="post"
                    target="popupwindow" onsubmit="window.open('https://buttondown.email/Kijkgat', 'popupwindow')"
                    class="embeddable-buttondown-form">
                    <label for="bd-email">Jouw e-mailadres</label>
                    <input type="email" name="email" id="bd-email" placeholder="voorbeeld@outlook.com" />

                    <input type="submit" value="Schrijf je in voor de nieuwsbrief" />
                    <p>
                        <a href="https://buttondown.email/refer/Kijkgat" target="_blank">Powered by Buttondown.</a>
                    </p>
                </form>
            </div>
        </div>
        <div class="mobile_footer">
            <div class="mobile_footer_container">
                <div class="kijkgat_logo_mobile">
                    <img src="assets/images/kijkgatgrain.png" alt="kijkgat logo grain" />
                </div>

                <div>
                    <a href="https://www.instagram.com/kijkgaten/" target="_blank">
                        <img src="assets/images/instagram_logo.png" alt="instagram logo" />
                    </a>
                </div>
                <div>
                    <a href="https://www.linkedin.com/company/kijkgat/" target="_blank">
                        <img src="assets/images/linkedin_logo.png" alt="linkedin logo" />
                    </a>
                </div>
            </div>
            <p class="full_boi_mail">mail@kijkgat.com</p>
            <p class="full_boi_pgum"><img src="assets/images/potloodgum.png">online gezet door <a
                    href="https://potloodgum.com" target="_blank">potloodgum</a></p>

        </div>

        <div class="desktop_footer">
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
                <img src="assets/images/potloodgum.png">online gezet door <a href="https://potloodgum.com"
                    target="_blank">potloodgum</a>
            </div>
        </div>
    </footer>

    </main>

</x-layout>
