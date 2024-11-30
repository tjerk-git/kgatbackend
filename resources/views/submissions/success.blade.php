<x-front>

  <section class="the-world-is-a-museum">
    <div class="content-container">
      <h2>Gelukt, je inzending is bevestigd!</h2>

      <p>Je hebt succesvol een inzending gedaan. We gaan er naar kijken, bedankt!</p>
      <p>-Michelle & Allert</p>

      <a href="/" class="kijkgat">ok nou leuk bedankt, mag ik terug?</a>
    </div>

  </section>

  <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
  <script>
    // Trigger confetti when the page loads
    window.onload = function() {
      confetti({
        particleCount: 100,
        spread: 70,
        origin: { y: 0.6 },
        colors: ['#26ccff', '#a25afd', '#ff5e7e', '#88ff5a', '#fcff42', '#ffa62d', '#ff36ff']
      });
    };
  </script>

</x-front>

