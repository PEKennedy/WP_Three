

//alert("Hello There!");
console.log(1234)




import * as THREE from 'three';

const scene = new THREE.Scene();

//console.log(123);

let aspect_ratio = 9/16; // height / width since we are using width as a basis

const camera = new THREE.PerspectiveCamera( 75, 1/aspect_ratio, 0.1, 1000 );
const renderer = new THREE.WebGLRenderer();

let renderer_shortcode = document.getElementById("renderer"); //getElementsByClassName("")

console.log(renderer_shortcode)
if(renderer_shortcode){
    renderer_shortcode.appendChild( renderer.domElement );
    let rendererX = 0;
    let rendererY = 0;

    window.addEventListener( 'resize', onResize, false ); 
    function onResize() {
        rendererX = renderer_shortcode.offsetWidth;
        rendererY = renderer_shortcode.offsetWidth * aspect_ratio;
        renderer.setSize( rendererX, rendererY );
    }
    onResize();

}
else{
    document.body.appendChild( renderer.domElement );
    renderer.setSize( window.innerWidth, window.innerHeight );
}


const light = new THREE.AmbientLight( 0xffffff, 0.5 );
//light.position.set( 50, 50, 50 );
scene.add( light );

const sky_light = new THREE.HemisphereLight(0xffffbb, 0x080820, 3);
scene.add(sky_light);

const geometry = new THREE.BoxGeometry( 1, 1, 1 );
const material = new THREE.MeshPhongMaterial( { color: 0x00ff00 } );
const cube = new THREE.Mesh( geometry, material );
scene.add( cube );

camera.position.z = 5;

function animate() {
    cube.rotation.x += 0.01;
    cube.rotation.y += 0.01;

	renderer.render( scene, camera );
}
renderer.setAnimationLoop( animate );

