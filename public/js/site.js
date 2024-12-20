
function handleLoadingScreen() {
  // Keep track of all the things we need to check
  const checks = {
    DOMLoaded: false,
    imagesLoaded: false,
    scriptsLoaded: false,
    stylesheetsLoaded: false
  };

  // Helper function to check if everything is loaded
  function isEverythingLoaded() {
    return Object.values(checks).every(status => status === true);
  }

  // Helper function to remove loading screen
  function removeLoadingScreen() {
    const loadScreen = document.querySelector('.load-screen');
    if (loadScreen) {
      loadScreen.style.opacity = '0';
      setTimeout(() => {
        loadScreen.remove();
      }, 500); // Give time for fade out animation
    }
  }

  // Check DOM content
  document.addEventListener('DOMContentLoaded', () => {
    checks.DOMLoaded = true;
    if (isEverythingLoaded()) removeLoadingScreen();
  });

  // Check images
  Promise.all(
    Array.from(document.images)
      .map(img => {
        if (img.complete) return Promise.resolve();
        return new Promise(resolve => {
          img.addEventListener('load', resolve);
          img.addEventListener('error', resolve); // Handle broken images
        });
      })
  ).then(() => {
    checks.imagesLoaded = true;
    if (isEverythingLoaded()) removeLoadingScreen();
  });

  // Check scripts
  Promise.all(
    Array.from(document.scripts)
      .map(script => {
        if (script.loaded) return Promise.resolve();
        return new Promise(resolve => {
          script.addEventListener('load', resolve);
          script.addEventListener('error', resolve);
        });
      })
  ).then(() => {
    checks.scriptsLoaded = true;
    if (isEverythingLoaded()) removeLoadingScreen();
  });

  // Check stylesheets
  Promise.all(
    Array.from(document.styleSheets)
      .map(stylesheet => {
        try {
          if (stylesheet.cssRules) return Promise.resolve();
        } catch (e) {
          // CORS error or stylesheet not loaded
        }
        return new Promise(resolve => {
          const link = stylesheet.ownerNode;
          link.addEventListener('load', resolve);
          link.addEventListener('error', resolve);
        });
      })
  ).then(() => {
    checks.stylesheetsLoaded = true;
    if (isEverythingLoaded()) removeLoadingScreen();
  });

  // Fallback: If something goes wrong, remove loading screen after timeout
  setTimeout(() => {
    removeLoadingScreen();
  }, 10000); // 10 second fallback
}

// Initialize the handler when script loads
handleLoadingScreen();



// grab all the divs with class wordswitch inside kijkgat_word
const words = document.querySelectorAll('.wordswitch');

let clickCount = 0;

// add event listener to each word
for (i = 0; i < words.length; i++) {
  words[i].addEventListener('click', function () {
    words[clickCount].classList.add('hidden');
    clickCount++;
    if (clickCount == words.length) {
      clickCount = 0;
    }
    words[clickCount].classList.remove('hidden');
  });
}

function sendMail() {
  // open mailclient with pre-filled subject and body
  window.open('mailto:mail@kijkgat.com');
}

const grid = document.querySelector('.grid');

var iso = new Isotope(grid, {
  itemSelector: '.grid-item',
  layoutMode: 'masonry',
  filter: '.geenontwerp'
});

imagesLoaded(grid).on('progress', function () {
  // layout Isotope after each image loads
  iso.layout();
});


// Bind filter button click
const filters = document.querySelector('#filters');
const filterButtons = filters.querySelectorAll('button');
const filterText = document.querySelector('#filter-text');


// loop through through all p tags inside filterText
for (const p of filterText.querySelectorAll('p')) {
  // if p tag has a data-filter attribute
  if (p.hasAttribute('data-filter')) {
    // if p tag's data-filter attribute matches the filterValue
    if (p.getAttribute('data-filter') === '.geenontwerp') {
      // show p tag
      p.classList.remove('hidden');
    } else {
      // hide p tag
      p.classList.add('hidden');
    }
  }
}

for (const filterButton of filterButtons) {
  filterButton.addEventListener('click', (event) => {
    const filterValue = event.target.getAttribute('data-filter');
    iso.arrange({ filter: filterValue });

    // loop through through all p tags inside filterText
    for (const p of filterText.querySelectorAll('p')) {
      // if p tag has a data-filter attribute
      if (p.hasAttribute('data-filter')) {


        // if p tag's data-filter attribute matches the filterValue
        if (p.getAttribute('data-filter') === filterValue) {
          // show p tag
          p.classList.remove('hidden');
        } else {
          // hide p tag
          p.classList.add('hidden');
        }
      }
    }

  });
}

// Change is-checked class on buttons
const buttonGroups = document.querySelectorAll('.button-group');

for (const buttonGroup of buttonGroups) {
  for (const button of buttonGroup.querySelectorAll('button')) {
    button.addEventListener('click', (event) => {
      buttonGroup.querySelector('.is-checked').classList.remove('is-checked');
      event.target.classList.add('is-checked');
    });
  }
}


var swiper = new Swiper(".mySwiper", {
  effect: "cards",
  grabCursor: true,
});