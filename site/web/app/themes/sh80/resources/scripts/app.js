import domReady from '@roots/sage/client/dom-ready';
import {GooCursor} from './cursor.js';
import { gsap } from 'gsap';
import { AudioListener, Audio, AudioLoader, AudioAnalyser, Clock } from 'three';
import { Scene, SphereGeometry, TorusGeometry, Vector3, PerspectiveCamera, WebGLRenderer, Color, MeshBasicMaterial, MeshStandardMaterial, Mesh } from 'three';
import { createSculptureWithGeometry } from 'shader-park-core';
import {OrbitControls} from 'three/examples/jsm/controls/OrbitControls.js';

export function spCode() {
  return `

  let audio = input();
  let pointerDown = input(2, 0, 5);
  setGeometryQuality(10);
  
  setMaxIterations(20);
  let s = getSpace();
  let r = getRayDirection();
  
  let n1 = noise(r * 20 + vec3(0, audio, vec3(0, audio, audio))*8 );
  let n = noise(s + vec3(1, 20, audio*4));
  
  metal(n*.1 );
  shine(n*.1);
  noLighting();
  color(0.9,6,0);
  displace(mouse.x * 2, mouse.y * 2, 0);
  boxFrame(vec3(2), abs(n) * .1 / 100 );
  mixGeo(pointerDown);
  sphere(n * 1.3);
  
  `;
}

/**
 * Application entrypoint
 */
domReady(async () => {  

  // this is the start


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


  let scene = new Scene();

let camera = new PerspectiveCamera( 400, window.innerWidth/window.innerHeight, 0.01, 2000 );
camera.position.z = 0.2;

let renderer = new WebGLRenderer({ antialias: true, alpha: true });
renderer.setSize( window.innerWidth, window.innerHeight );
renderer.setPixelRatio( window.devicePixelRatio );
document.getElementById('h3r05h17').appendChild( renderer.domElement );

let clock = new Clock();

// AUDIO
// create an AudioListener and add it to the camera
const listener = new AudioListener();
camera.add( listener );

// create an Audio source
const sound = new Audio( listener );

let button = document.querySelector('.button');
button.innerHTML = "Loading Audio..."

// load a sound and set it as the Audio object's buffer
const audioLoader = new AudioLoader();
audioLoader.load( 'http://shadynasty.test/app/uploads/2023/06/Shady-Nasty-R0LL1N-H1LLZ.mp3', function( buffer ) {
	sound.setBuffer( buffer );
	sound.setLoop(true);
	sound.setVolume(0.5);
  button.innerHTML = "Play Audio"
  button.addEventListener('pointerdown', () => {
    sound.play();
    button.style.display = 'none';
  }, false);
});



// create an AudioAnalyser, passing in the sound and desired fftSize
// get the average frequency of the sound
const analyser = new AudioAnalyser( sound, 32 );


let state = {
  mouse : new Vector3(),
  currMouse : new Vector3(),
  pointerDown: 0.0,
  currPointerDown: 0.0,
  audio: 0.0,
  currAudio: 0.0,
  time: 0.0
}

window.addEventListener( 'pointermove', (event) => {
  state.currMouse.x = ( event.clientX / window.innerWidth ) * 2 - 1;
	state.currMouse.y = - ( event.clientY / window.innerHeight ) * 2 + 1;
}, false );

document.querySelector('.l1nk').addEventListener( 'mouseover', (event) => state.currPointerDown = 1.0, false );
document.querySelector('.l1nk').addEventListener( 'mouseleave', (event) => state.currPointerDown = 0.0, false );
window.addEventListener( 'pointerdown', (event) => state.currPointerDown = 1.0, false );
window.addEventListener( 'pointerup', (event) => state.currPointerDown = 0.0, false );

let geometry  = new SphereGeometry( 15, 32, 16 ); 

// // // Create Shader Park Sculpture
let mesh = createSculptureWithGeometry(geometry, spCode(), () => ( {
  time: state.time,
  pointerDown: state.pointerDown,
  audio: state.audio,
  mouse: state.mouse,
  _scale : 0.1
} ));

scene.add(mesh);


// Add Controlls
let controls = new OrbitControls( camera, renderer.domElement, {
  enableDamping : true,
  dampingFactor : 0.25,
  zoomSpeed : 0.5,
  rotateSpeed : 0.5
} );

let onWindowResize = () => {
  camera.aspect = window.innerWidth / window.innerHeight;
  camera.updateProjectionMatrix();
  renderer.setSize( window.innerWidth, window.innerHeight );
}

window.addEventListener( 'resize', onWindowResize );

let render = () => {
  requestAnimationFrame( render );
  state.time += clock.getDelta();
  controls.update();
  if(analyser) {
    state.currAudio += Math.pow((analyser.getFrequencyData()[2] / 255) * 0.1, 2) + clock.getDelta() * .5;
    state.audio = .2 * state.currAudio + .8 * state.audio;
  }
  state.pointerDown = .1 * state.currPointerDown + .9 * state.pointerDown;
  state.mouse.lerp(state.currMouse, .05 );
  renderer.render( scene, camera );
  renderer.setClearColor( 0xffffff, 0 ); 
};

// to disable zoom
controls.enableZoom = false;

// to disable rotation
controls.enableRotate = false;

// to disable pan
controls.enablePan = false;

render(); 

  // this is the end

});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
