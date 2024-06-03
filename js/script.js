/*
This function typing effects
*/

var frontText = 'I would describe mySelf as knowledgeable, Industrious , resilient and someone who takes Pride in their work , I have serious Passion for programming also I am a very Good Self Learner , I have Good experience in Web , IOS App Development, also I have a great interest in learning artificial intelligence, I like staying connected with people to learn and discover new things';


var i = 0;

var speed = 100;

window.onload = setInterval(function typeWriter() {
	if (i < frontText.length) {
		document.getElementById("type").innerHTML += frontText.charAt(i);
		i++;
		setIntervalt(typeWriter, 5000);
	}
}, speed);







const menu = document.querySelector('#toggle');
const menuItem = document.querySelector('#overlay');
const menuContainer = document.querySelector('.talk');
const menuIcon = document.querySelector('i');

function toggleMenu(e) {
	menuItem.classList.toggle('open');
	menuIcon.classList.toggle('fa-comment');
	e.preventDefault();


}

menu.addEventListener('click', toggleMenu, false);


/*
This function generates a circular progress for each element in the DOM using HTML5 canvas
*/

(function () {

	var Progress = function (element) {

		this.context = element.getContext("2d");
		this.refElement = element.parentNode;
		this.loaded = 0;
		this.start = 14.72;
		this.width = this.context.canvas.width;
		this.height = this.context.canvas.height;
		this.total = parseInt(this.refElement.dataset.percent, 10);
		this.timer = null;

		this.diff = 0;

		this.init();
	};

	Progress.prototype = {
		init: function () {
			var self = this;
			self.timer = setInterval(function () {
				self.run();
			}, 50);
		},
		run: function () {
			var self = this;

			self.diff = ((self.loaded / 100) * Math.PI * 2 * 10).toFixed(2);
			self.context.clearRect(0, 0, self.width, self.height);
			self.context.lineWidth = 10;
			self.context.fillStyle = "#000";
			self.context.strokeStyle = "#f06b6e";
			self.context.textAlign = "center";

			self.context.fillText(self.loaded + "%", self.width * .5, self.height * .5 + 2, self.width);
			self.context.beginPath();
			self.context.arc(35, 35, 30, self.start, self.diff / 10 + self.start, false);
			self.context.stroke();

			if (self.loaded >= self.total) {
				clearInterval(self.timer);
			}

			self.loaded++;
		}
	};

	var CircularSkillBar = function (elements) {
		this.bars = document.querySelectorAll(elements);
		if (this.bars.length > 0) {
			this.init();
		}
	};

	CircularSkillBar.prototype = {
		init: function () {
			this.tick = 15;
			this.progress();

		},
		progress: function () {
			var self = this;
			var index = 0;
			var firstCanvas = self.bars[0].querySelector("canvas");
			var firstProg = new Progress(firstCanvas);

			var timer = setInterval(function () {
				if (index > self.bars.length - 1) {
					clearInterval(timer);
				} else {
					var canvas = self.bars[index].querySelector("canvas");
					var prog = new Progress(canvas);
					index++;
				}


				console.log(">>>>>> ", self.bars.length - 1, index)




			}, self.tick * 100);

		}
	};

	window.addEventListener("DOMContentLoaded", function () {
		var circularBars = new CircularSkillBar("#bars .bar");
	});

})();
