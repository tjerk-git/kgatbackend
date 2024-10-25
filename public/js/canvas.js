
document.addEventListener('DOMContentLoaded', function () {


  const can = document.getElementById("canvas");
  const ctx = can.getContext("2d");
  const checkbox = document.querySelector('sl-switch');
  const activeText = document.querySelector('.activeText');

  const previousButton = document.querySelector(".prevButton");
  const nextButton = document.querySelector(".nextButton");

  // let middleX = Math.round(can.width);
  // let middleY = Math.round(can.height / 2);

  let middleX = 190;
  let middleY = 370;

  // calculate the middle of the canvas

  let selectedPhoto = (Math.floor(Math.random() * 9));
  let img;


  const isUserUsingMobile = () => {
    // User agent string method
    let isMobile =
      /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
        navigator.userAgent,
      );

    // Screen resolution method
    if (!isMobile) {
      let screenWidth = window.screen.width;
      let screenHeight = window.screen.height;
      isMobile = screenWidth < 768 || screenHeight < 768;
    }

    // Touch events method
    if (!isMobile) {
      isMobile =
        "ontouchstart" in window ||
        navigator.maxTouchPoints > 0 ||
        navigator.msMaxTouchPoints > 0;
    }

    // CSS media queries method
    if (!isMobile) {
      let bodyElement = document.getElementsByTagName("body")[0];
      isMobile =
        window
          .getComputedStyle(bodyElement)
          .getPropertyValue("content")
          .indexOf("mobile") !== -1;
    }

    return isMobile;
  };


  if (isUserUsingMobile()) {
    const canvas_container = document.getElementById('canvas_container');
    canvas_container.style.display = 'none';
    const kijkgat_controls = document.querySelector('.kijkgat_controls');
    kijkgat_controls.style.display = 'none';

    const kijkgat_mobile = document.querySelector('#kijkgat_mobile');
    kijkgat_mobile.style.display = 'flex';

  }

  init(0);

  function changeSliderText() {
    const sliderText = document.querySelector('.sliderText');
    const currentPhoto = selectedPhoto + 1;
    sliderText.innerHTML = `Foto ${currentPhoto}/9`;
  }

  if (!isUserUsingMobile()) {

    checkbox.addEventListener('sl-change', event => {
      if (event.target.checked) {
        activeText.innerHTML = "aan";
        can.style.cursor = "none";
        init(selectedPhoto);
      } else {
        lightsOn();
        activeText.innerHTML = "uit";
        can.style.cursor = "pointer";
      }
    });


    previousButton.addEventListener("click", function () {
      if (selectedPhoto === 0) {
        return;
      }
      selectedPhoto--;
      init(selectedPhoto);

      checkbox.checked = true;
      changeSliderText();
    });

    nextButton.addEventListener("click", function () {
      console.log('next button clicked');
      // replace with tottal number of images
      if (selectedPhoto === 8) {
        return;
      }
      selectedPhoto++;
      init(selectedPhoto);
      checkbox.checked = true;
      changeSliderText();
    });

    can.addEventListener(
      "mousemove",
      function (e) {
        if (checkbox.checked === false) {
          return;
        }
        e.preventDefault(); // Prevent scrolling on touch devices
        var mouse = getMouse(e, can);

        console.log('redraw by mousemove');
        redraw(mouse);
      },
      false,
    );

    can.addEventListener(
      "touchmove",
      function (e) {
        if (checkbox.checked === false) {
          return;
        }
        e.preventDefault(); // Prevent scrolling on touch devices
        let touch = e.touches[0];
        let touchMouse = getMouse(touch, can);
        console.log('redraw by touchmove');
        redraw(touchMouse);
      },
      false,
    );

  }


  function init(imageIndex = selectedPhoto, force = false) {

    if (!isUserUsingMobile()) {
      const canvasOverlay = document.querySelector("#canvas_container");

      // change the image randomly after 5 seconds choose from array of images
      img = new Image();

      let images = [];
      // if user is on mobile create a different images array

      images = [
        "../assets/images/kijkgat/1.webp",
        "../assets/images/kijkgat/2.webp",
        "../assets/images/kijkgat/3.webp",
        "../assets/images/kijkgat/4.webp",
        "../assets/images/kijkgat/5.webp",
        "../assets/images/kijkgat/6.webp",
        "../assets/images/kijkgat/7.webp",
        "../assets/images/kijkgat/8.webp",
        "../assets/images/kijkgat/9.webp",
      ];

      img.src = images[selectedPhoto];

      // Set canvas dimensions based on the window size
      can.width = 1280;
      can.height = 720;

      if (force === true && checkbox.checked === false) {
        lightsOn();
        return;
      } else {

        redraw({ x: middleX, y: middleY });
      }
    }
  }



  function redraw(mouse) {

    if (!isUserUsingMobile()) {
      if (checkbox.checked === false) {
        return;
      }

      can.width = can.width;
      ctx.drawImage(img, 0, 0, can.width, can.height);
      ctx.beginPath();
      ctx.rect(0, 0, can.width, can.height);

      // calculate a width based on the current window size
      var cursorWidth = 66;

      ctx.arc(mouse.x, mouse.y, cursorWidth, 0, Math.PI * 2, true);

      ctx.clip();
      const patternImage = new Image();

      // add background color #fffdf4
      ctx.fillStyle = "#fffdf4";
      ctx.fillRect(0, 0, can.width, can.height);

      patternImage.src = '../assets/images/kijkgat_default_bg.png'; // Path to your background image
      ctx.translate(can.width / 2 - patternImage.width / 2, can.height / 2 - patternImage.height / 2);
      ctx.fillStyle = ctx.createPattern(patternImage, 'no-repeat');
      ctx.fillRect(0, 0, can.width, can.height);
    }
  }


  function lightsOn() {
    can.width = can.width;
    ctx.drawImage(img, 0, 0, can.width, can.height);
    ctx.beginPath();
    ctx.rect(0, 0, can.width, can.height);
    ctx.fillStyle = "rgba(255, 255, 255, 0)";
  }

  function getMouse(e, canvas) {
    var element = canvas,
      offsetX = 0,
      offsetY = 0,
      mx,
      my;

    if (element.offsetParent !== undefined) {
      do {
        offsetX += element.offsetLeft;
        offsetY += element.offsetTop;
      } while ((element = element.offsetParent));
    }

    mx = e.pageX - offsetX;
    my = e.pageY - offsetY;

    return {
      x: mx,
      y: my,
    };
  }

  // on load
  window.addEventListener("load", function () {
    redraw({ x: middleX, y: middleY });
  });

  // on window resize, update the canvas size
  window.addEventListener("resize", function () {
    init(selectedPhoto, true);
  });


});