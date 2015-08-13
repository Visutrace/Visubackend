
	/*
	.	This is an engine to agnostically display trace data
	.	
	.	This engine assumes the trace data will be in an array known as
	.		tracedata[]
	.
	.	This engine assumes the trace data will be of the form:
	.
	.		start	id	x1	y1	x2	y2	duration
	.
	.	
	.	This engine assumes the primary canvas is by the name of
	.		'display-canvas'
	.		
	*/


	//First thing's first, we need to parse through all the trace data
	//	and make unique paths

// var tracedata = [
// "00000.00,547,0,0,100,100,2.00",
// "00010.00,547,100,100,100,200,3.78",
// "00020.00,547,100,200,200,200,4.22",
// ]

	var allPaths =   []; //Where the final paths will be sent

	numOfLengths = tracedata.length;

	for(var i = 0; i < numOfLengths; i++){ //for each line of trace data
		pD = tracedata[i].split(","); //split the values



		temp = new Length(pD[0], pD[1], pD[2], 3000-pD[3],pD[4], 3000-pD[5],pD[6]); //make the values into a length called temp

		console.log(temp);

		if(allPaths[temp.id]){ //If there is a path by the id of this length
			allPaths[temp.id].addLength(temp); //add the length to that path

		} else  { //If there is no path, then we need to make one and seed it with this one
			allPaths[temp.id] = new Path(temp.id); //make a path
			allPaths[temp.id].addLength(temp); //add the length
		}	

	}


	// Now that we have all the paths in allPaths[], we need to create 
	// a series of MobileEntity 's using those paths

	// create an new instance of a pixi stage
	// second instance allows interaction with stage elements
	var stage = new PIXI.Stage(0x000000, true);

	var movingCarsStage = new PIXI.DisplayObjectContainer();
	movingCarsStage.visible = true;

	var selectedVehicle = new PIXI.DisplayObjectContainer();
	selectedVehicle.visible = true;
	
	var carLayerStage = new PIXI.DisplayObjectContainer();
	carLayerStage.visible = true;
	
	var zoneStage = new PIXI.DisplayObjectContainer();
	zoneStage.visible = true;
	var allZones = [];

	var movingCars = [];


	var cars = []; //Where the mobile entity's will be sent


	var graph = new PIXI.Graphics();
	graph.beginFill(0xFFFFFF);
	graph.drawRect(0,0,8,8);
	graph.endFill();
	var texture = graph.generateTexture();

	allPaths.forEach(function(path){
		car = new MobileEntity(path.id);
		car.setPath(path);

		car.texture = texture;
		car.setDefaultCanvas(movingCarsStage);
		car.makeSprite();
		car.setDefaultScale(1.5);
		car.addActivityLayer(selectedVehicle);

		cars[cars.length] = car;
		car.internalColor = (1000 * car.getExternalID() *  0x123456) % 0xFFFFFF;
		car.setColor(car.internalColor) ;


	});
	
	cars.forEach(function(car){
		car.setNeighborhood(cars);

	});


	stage.addChild(movingCarsStage);
	stage.addChild(selectedVehicle);
	stage.addChild(carLayerStage);
	stage.addChild(zoneStage);


	//Now that we have all of our entities
	//Lets create the time related variables that the heartbeat of our program will rely on

	var start = Date.now();
	var now = Date.now();
	var time = now-start;


	// create a renderer instance.
	var renderer = PIXI.autoDetectRenderer(3000, 3000, document.getElementById('display-canvas'));

	document.getElementById('display-canvas').style.height = Math.min(window.innerHeight, window.innerWidth);
	document.getElementById('display-canvas').style.width = Math.min(window.innerHeight, window.innerWidth);

	// add the renderer view element to the DOM
	document.body.appendChild(renderer.view);

//tick()


	requestAnimFrame( update );
//Here is the heartbeat
		activeVehicle = null;
		activeZone = null;

	function update() {	
	 	now = Date.now();
		time = now-start;	

		//for each car, drive!
		cars.forEach(function(car){
			car.setScale(car.defaultScale);
			car.drive(time);

			if(car.finishedMoving){
				car.setColor(0x808080);
			} else {
				car.setColor(car.internalColor) ;
			}
			

		if(car.isActive){
			activeVehicle = car;
			
			// externalIdController.onFinishChange(function(value){
			// 	activeVehicle.setExternalID(value);
			// });

			for (i = activeVehicle.activityLayer.children.length - 1; i >= 0; i--) {
				activeVehicle.activityLayer.removeChild(activeVehicle.activityLayer.children[i]);
			}

			activeVehicle.drawPath(20,0xFFFFFF);
			
			graphics = new PIXI.Graphics();
			graphics.lineStyle(10,0x0000FF,0.5);
			graphics.beginFill(0xFFFFFF,0.5);
			graphics.drawCircle(activeVehicle.getPosition()[0],activeVehicle.getPosition()[1],300);

			graphics.lineStyle(10,0xFF0000,0.5);
			graphics.drawCircle(activeVehicle.getPosition()[0],activeVehicle.getPosition()[1],30);

			graphics.lineStyle(10,activeVehicle.internalColor);
			graphics.beginFill(activeVehicle.internalColor);
			graphics.drawCircle(activeVehicle.getPosition()[0],activeVehicle.getPosition()[1],20);
			
			selectedVehicle.addChild(graphics);

			menu.CarID = activeVehicle.internalID;
			// menu.externalID = activeVehicle.externalID;
			menu.x = parseInt(activeVehicle.getPosition()[0]);
			menu.y = parseInt(activeVehicle.getPosition()[1]);

		}
	});
		

	
	
		
		stage.removeChild(movingCarsStage);
		stage.addChild(movingCarsStage);
		// Re places zone stage on top
		stage.swapChildren(movingCarsStage,zoneStage);
		stage.addChild(carLayerStage);
		stage.swapChildren(carLayerStage,zoneStage);


	    renderer.render(stage);
	    requestAnimFrame( update );
	}