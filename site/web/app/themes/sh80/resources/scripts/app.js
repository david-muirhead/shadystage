import domReady from '@roots/sage/client/dom-ready';
import Seriously from '@uehreka/seriously';
/**
 * Application entrypoint
 */
domReady(async () => {  

  // Do stuff when the video is ready to play
  document.getElementsByTagName("video")[0].playbackRate = 0.8;

var videoContainers = document.querySelectorAll('.video-container');
var lightbox = document.querySelector('.lightbox');
var lightboxContent = lightbox.querySelector('.lightbox-content');
var videoFrame = lightboxContent.querySelector('.video-frame');
var lightboxOverlay = lightbox.querySelector('.lightbox-overlay');

videoContainers.forEach(function(container) {
  var thumbnail = container.querySelector('.video-thumbnail');
  var videoUrl = thumbnail.getAttribute('data-video-url');

  thumbnail.addEventListener('click', function() {
    videoFrame.src = videoUrl;
    lightbox.style.display = 'block';
    lightboxOverlay.style.opacity = '1';
  });
});

lightbox.addEventListener('click', function() {
  videoFrame.src = '';
  lightbox.style.display = 'none';
  lightboxOverlay.style.opacity = '0';
});

document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
  anchor.addEventListener('click', function (e) {
      e.preventDefault();

      document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
      });
  });
});

var vert = document.querySelector(".vert");
var trans = document.querySelector(".transmit");

var scrollTop = window.pageYOffset;
document.querySelectorAll('#bigRed').forEach(function(element) {
  var topDistance = element.offsetTop;
  if ((topDistance + 600) < scrollTop) {
    trans.style.opacity = 0;
    vert.style.opacity = 1;
  } else {
    trans.style.opacity = 1;
    vert.style.opacity = 0;
  }
});
  // this is the end

});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
