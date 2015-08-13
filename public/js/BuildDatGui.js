var CarMenu = function() {
	this.ViewScale = 1;
	// this.internalID = "No car selected";
	this.CarID = "No car selected";
	this.x = "No car selected";
	this.y = "No car selected";

	this.clearActiveCar = function(){
		cars.forEach(function(car){
			car.removeActivity(car);
		});
	};
};

var menu = new CarMenu();

var gui = new dat.GUI({ autoPlace: false });
var container = document.getElementById('dat-gui-container');

container.appendChild(gui.domElement);

// var scaleController = gui.add(menu, 'ViewScale',0,5).min(.1).step(.1);

gui.add(menu, 'CarID').listen();

gui.add(menu, 'clearActiveCar').listen();
gui.add(menu, 'x').listen();
gui.add(menu, 'y').listen();



// scaleController.onFinishChange(function(value){
// 	document.getElementById('display-canvas').height = Math.min(window.innerHeight, window.innerWidth) * value;
// 	document.getElementById('display-canvas').width = Math.min(window.innerHeight, window.innerWidth) * value;
// });

