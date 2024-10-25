<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kijkgat | Zie wat je nog niet zag</title>
    <link rel="stylesheet" type="text/css" href="/css/site.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace@2.12.0/cdn/themes/light.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <meta property="og:title" content="Kijkgat | Zie wat je nog niet zag">
    <meta property="og:description" content="Kijkgat | Zie wat je nog niet zag">
    <meta property="og:image" content="/assets/images/og_image.png">
    <meta property="og:url" content="https://kijkgat.com">
    <meta property="og:type" content="website">
    <meta name="description" content="Kijkgat | Zie wat je nog niet zag">
    <meta name="keywords" content="workshop, creatief, CMD, Allert, Michelle, Kijkgat">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer=true></script>
    <script defer=true src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <script type="module" src="https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace@2.12.0/cdn/shoelace-autoloader.js">
    </script>

    <!-- I am sorry mom, I used alot of js and didn't minify any of it but to be honest minify is overrated -->
    <script defer=true src="js/imagesloaded.js"></script>
    <script defer=true src="js/isotope.js"></script>
    <script defer=true src="js/canvas.js"></script>
    <script defer=true src="js/camera.js"></script>
    <script defer=true src="js/fslightbox.js"></script>

    <script src="js/site.js" defer=true></script>
</head>

<body>
    <div class="load-screen">
        <div class="load-screen__inner">

            <div class="load-screen__text">
                <p>Even geduld, we zijn je aan het inladen...


                </p>

                <div class="snippet" data-title="dot-shuttle">
                    <div class="stage">
                        <div class="dot-shuttle"></div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <main>
        {{ $slot }}
    </main>

    <script data-goatcounter="https://kgat.goatcounter.com/count" async src="//gc.zgo.at/count.js"></script>
</body>
