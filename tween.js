/**
	JAVSCRIPT TWEEN FUNCTIONS VERSION 1.0
**/

/**
function objectTween(){
	var points = {
		//moving a box "from" and "to",eg. on the x coordinates.
		'from': 200,
		'to':800
	}
	
	var frameCount = 20; //moving from point a to b over 20 frames
	var frames = [] //array of coordinates we'll compute.
	//"dumb" tween: "move x pixels every frame"

	var tweenAmount = (points.to - points.from)/frameCount;
	for(i = 0; i <= frameCount; i++){
		//calculate the points to animate
		frames[i] = points.from+(tweenAmount*i);
	}
	
	for(i in frames){
		//document.getElementById('d').innerHTML +=  '<div>Frame:'+i+' is '+frames[i]+'</div>';
		//document.getElementById('d').style.marginLeft = frames[i]+'px';
	}
	
	return frames;
}

function objectTweenSmooth(){
	var points = {
		//moving a box "from" and "to",eg. on the x coordinates.
		'from': 200,
		'to':800
	}
	
	var animDelta = (points.to - points.from);//how far to move
	//Animation curve: "sum of number" (=100%). slow-fast-slow
	var tweenAmount = [1,2,3,4,5,6,7,8,9,10,9,8,7,6,5,4,3,2,1];
	//move from a to b over frames as defined by tween curve
	var frameCount = tweenAmount.length;
	var frames = [];//array of coordinates
	var newFrame = points.from; //starting coordinates
	for(i=0;i<frameCount.length;i++){
		//calculate the points to animate
		newFrame += (animDelta*tweenAmount[i]/100);
		frames[i] = newFrame;
	}
	
	for(i in frames){
		document.getElementById('d').innerHTML +=  '<div>Frame:'+i+' is '+frames[i]+'</div>';
		//document.getElementById('d').style.marginLeft = frames[i]+'px';
	}
	return frames;
}

var oAnim = new Animation({
	from: 0,
	to: 0 ,
	ontween : function(value){
		writeDebug('oAnima.ontween(): value='+value);
	},
	
	oncomplete: function(value){
		writeDebug('oAnima.oncomplete()');
	}
});

**/
/*
function Animator(){
	var self = this;
	var intervalRate = 20;
	this.tweenType = {
		// % of total distance to per-frame, total always = 100
		'default': [1,2,3,4,5,6,7,8,9,10,9,8,7,6,5,4,3,2,1],
		'blast': [12,12,11,10,10,,9,8,7,6,5,4,3,2,1],
		'linear': [10,10,10,10,10,10,10,10,10,10]
	}
	
	this.queue = [];
	this.queueHash = [];
	this.active = false;
	this.timer = null
	this.createTween = function(start,end,type){
		type = type || 'default';
		var tween = [start];
		var tmp = start;
		var diff = end-start;
		var x = self.tweenTypes[type].length;
		for(i=0; i < x ; i++){
			tmp += diff*self.tweenTypes;
			tween[i] = {};
			tween[i].data = tmp;
			tween[i].event = null;
		}
		
		return tween;
	}
	
	this.enqueue = function(o,fMethod,fOnComplete){
		//add object and associated methods to animation queue
		//writeDebug('animator.enqueue');
		if(!fMethod){
			// writeDebug('animator.enqueue():missing fMethod');
		}
		self.queue.push(o);
		o.active = true;
	}
	
	this.animate = function(){
		//interval-driven loop: process queue, stop if done
		var active = 0;
		for(i=0,j=self.queue.length;i<j;i++){
			if(self.queue[i].active){
				self.queue[i].animate();
				active++;
			}
		}
		
		if(active == 0 && self.timer){
			// all animations finished
			// writeDebug('Animations complete');
			self.stop();
		}else{
			
		}
	}
	
	
	this.start = function(){
		if(self.timer || self.active){
			// writeDebug('animator.start(): already active');
			return false;
		}
		//writeDebug('animator.start()');
		self.active = true;
		selt.timer = setInterval(self.animate,intervalRate);
	}
	
	this.stop = function(){
		//reset things, clear for the next batch of animations
		clearInterval(self.timer);
		self.timer = null;
		self.sctive = false;
		self.queue = [];
	}
	
}*/


function Animator(){
	var self = this;
	this.queue = [];
	this.timer = null;
	this.active = false;
	this.currElement;
	
	var intervalRate = 20;
	this.tweenType = {
		// % of total distance to per-frame, total always = 100
		'default': [1,2,3,4,5,6,7,8,9,10,9,8,7,6,5,4,3,2,1],
		'blast': [12,12,11,10,10,,9,8,7,6,5,4,3,2,1],
		'linear': [10,10,10,10,10,10,10,10,10,10],
		'slow': [2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2]
	}
	//CREATE THE TWEEN FOR THE ELEMENT
	this.createTween = function(start,end,element,css,speed,callback){
		//SET THE ELEMNT SPEED TYPE
		var  type = speed || 'default';
		//SET THE TWEEN VARIABLE
		var tween = [];
		 tween['element'] = element;
		 tween['tween'] = [start];
		 tween['onCompete'] = false;
		 tween['callback'] = callback;
		 tween['css'] = css;
		var tmp = start;
		var diff = end - start;
		//alert(diff+', '+css);
		var x =  (isNaN(type))?self.tweenType[type].length:(speed/20);
		
		for( i=0; i < x; i++ ){
			tmp += diff/x;
			tween['tween'][i+1] = tmp;
		}
		self.queue.push(tween);
		//console.log(self.queue.length);
	}
	
	
	this.animate = function(){
		//alert(self.queue.length);
		var atLeastOne = false;
		for(i=0;i<self.queue.length;i++){
				if(self.queue[i]['tween'].length < 1  && !self.queue[i]['onComplete']){
					self.queue[i]['onComplete'] = true;
					self.queue[i]['element'].onComplete++;
					if( self.queue[i]['element'].onComplete == self.queue[i]['element'].animationCount ){
						if(self.queue[i]['callback']){
							self.queue[i]['callback']();
						}
					}
				}else if(self.queue[i]['onComplete']){
					self.queue.splice(i,1);
				}
				
			if(self.queue[i]){
				self.queue[i]['element'].style[self.queue[i]['css']] = self.queue[i]['tween'][0];
				self.queue[i]['tween'].shift()
				atLeastOne = true;
			}
			
		}
		if(!atLeastOne){
			self.stop();
		}
		
		
	}
	
	this.start = function(){
		if(self.timer || self.active){
			//do not start again
			return false;
		}
		//writeDebug('animator.start()');
		self.active = 0;
		self.timer = setInterval(self.animate,intervalRate);
	}
	
	this.stop = function(){
		clearInterval(self.timer);
		self.timer = null;
		self.active = false;
		self.queue = [];
		//alert('done');
	}
}

function ele(ele){
	ele.onComplete = 0;
	ele.animationCount = 0;
	this.animate = function(to,speed,callback){
		for(i in to){
			var estyle = returnCamelCase(i);
			var c = ele.style[estyle];
			if(!c){
				c = getComputedStyle(ele,null)[estyle];
			}
			//alert(c);
			if(c.indexOf('px')>-1){
				c = c.substring(0,c.indexOf('px'));
			}
			//alert(c)
			var from = Number(c);
			var css = i;
			if(to[i].indexOf('px')>-1){
				to[i] = to[i].substring(0,to[i].indexOf('px'));
			}
			var t = Number(to[i]);
			speed = speed || false;
			callback = callback || false;
			anime.createTween(from,t,ele,css,speed,callback);
			ele.animationCount++;
		}
		anime.start();
	}
	this.width = function(setter){
		var setter  = setter || false;
		if(setter){
			ele.style.width = setter+'px';
		}else{
			return ele.offsetWidth;
		}
	}
	
	this.height = function(setter){
		var setter  = setter || false;
		if(setter){
			ele.style.height = setter+'px';
		}else{
			return ele.offsetHeight;
		}
	}
	
	this.hide = function(speed,callback){
		var speed = speed || false;
		if(speed){
		
		}else{
			ele.style.display = 'none';
		}
	}
	
	this.show = function(speed,callback){
		var speed = speed || false;
		if(speed){
		
		}else{
			ele.style.display = 'block';
		}
	}
}
			
function returnCamelCase(string){
	string = string.split('-');
	var newString = '';
	for(var i = 0;i<string.length; i++){
		if(i<1){
			newString += string[i]
		}else{	
			string[i] = string[i][0].toUpperCase()+string[i].substring(1,string[i].length);
			newString += string[i]
		}
	}
	return newString;
}	

var anime = new Animator();
