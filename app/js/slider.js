$(document).ready(() => {
	var segundos = 10;
	var interval;
	var timer = () => {
		interval = setInterval(nextSlider, segundos * 1000);
	};

	// Inicia o timer
	timer();

	var $items = $(document).find("#slider ul li");
	var itemPos = 0;
	// Número de imagens no slide
	var numItems = $items.length;
	// Adiciona os navegadores
	for (var i = 0; i < numItems; i++) {
		$("#slider .navigators").append("<div></div>");
	}

	nextSlider();

	// Evento ao clicar no navegador
	$("#slider .navigators div").each((index, el) => {
		$(el).on("click", () => {
			itemPos = index + 1;
			$items.hide();
			showItem();
			select();
			clearInterval(interval);
			timer();
		});
	});

	function nextSlider() {
		(itemPos >= numItems) ? itemPos = 1 : itemPos++;
		$items.hide();
		select();
		showItem();
	}

	function showItem() {
		$("#slider ul li:nth-child(" + itemPos + ")").fadeIn(400);
	}

	function select() {
		$("#slider .navigators div").removeClass("selected");
		$("#slider .navigators div:nth-child(" + itemPos + ")").addClass("selected");
	}

});

