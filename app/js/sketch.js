function setup() {
	createCanvas(windowWidth, windowHeight);
}

function draw() {
	if (mouseIsPressed) {
		fill(200, 0, 0);
		ellipse(mouseX, mouseY, 25, 25);
	}
}