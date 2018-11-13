<!DOCTYPE HTML>
<html>
<head>
<title>系统维护</title>
<style>
.backgrund{

}
body {
	margin: 0;
	padding: 0;
	background: #f0fcff;
	font-family: 'adelle-sans', sans-serif;
	overflow: hidden;
	height: 100%;

}
.container {
	width: 800px;
	top: 10px;
	position: relative;
	margin: 20px auto;
}
.clipped-box {
	cursor: pointer;
	-webkit-transition: top 1.2s linear;
	transition: top 1.2s linear;
}
.clipped-box div {
	z-index: 9999999;
	color: #fff;
	font-size: 1em;
	padding: 50px 20px;
	text-align: center;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	background: #4F9CC7;
}
.clipped-box div h1 {
	text-shadow: 2px 2px rgba(0,0,0,0.2);
}
.clipped-box, .clipped-box div {
	width: 700px;
	height: 700px;
	position: relative;
}
.clipped-box div {
	position: absolute;
	top: auto;
	left: 0;
	background: #4F9CC7;
	-webkit-transition: -webkit-transform 1.4s ease-in, background 0.3s ease-in;
	transition: transform 1.4s ease-in, background 0.3s ease-in;
}
</style>
<script src="http://www.aspku.com/ajaxjs/jquery-1.9.1.min.js"></script>
<script>
$(document).ready(function() {
	(genClips = function() {
		$t = $('.clipped-box');
		var amount = 5;
		var width = $t.width() / amount;
		var height = $t.height() / amount;
		var totalSquares = Math.pow(amount, 2);
		var html = $t.find('.content').html();
		var y = 0;
		for(var z = 0; z <= (amount*width); z = z+width) { 
			$('<div class="clipped" style="clip: rect('+y+'px, '+(z+width)+'px, '+(y+height)+'px, '+z+'px)">'+html+'</div>').appendTo($t);
			if(z === (amount*width)-width) {
				y = y + height;
				z = -width;
			}
			if(y === (amount*height)) {
				z = 9999999;
			}
		}
	})();
	function rand(min, max) {
		return Math.floor(Math.random() * (max - min + 1)) + min;
	}
	var first = false,
		clicked = false;
	$('.clipped-box div').on('click', function() {
		if(clicked === false) {
			clicked = true;
			$('.clipped-box .content').css({'display' : 'none'});	
			$('.clipped-box div:not(.content)').each(function() {
				var v = rand(120, 90),
					angle = rand(80, 89),
					theta = (angle * Math.PI) / 180,
					g = -9.8; 
				var self = $(this);
				var t = 0,
					z, r, nx, ny,
					totalt =  15;
				var negate = [1, -1, 0],
					direction = negate[ Math.floor(Math.random() * negate.length) ];
				var randDeg = rand(-5, 10), 
					randScale = rand(0.9, 1.1),
					randDeg2 = rand(30, 5);
				var color = $(this).css('backgroundColor').split('rgb(')[1].split(')')[0].split(', '),
					colorR = rand(-20, 20),
					colorGB = rand(-20, 20),
					newColor = 'rgb('+(parseFloat(color[0])+colorR)+', '+(parseFloat(color[1])+colorGB)+', '+(parseFloat(color[2])+colorGB)+')';
				$(this).css({
					'transform' : 'scale('+randScale+') skew('+randDeg+'deg) rotateZ('+randDeg2+'deg)', 
					'background' : newColor
				});
				z = setInterval(function() { 	
					var ux = ( Math.cos(theta) * v ) * direction;
					var uy = ( Math.sin(theta) * v ) - ( (-g) * t);
					nx = (ux * t);
					ny = (uy * t) + (0.5 * (g) * Math.pow(t, 2));
					$(self).css({'bottom' : (ny)+'px', 'left' : (nx)+'px'});
					t = t + 0.10;
					if(t > totalt) {
						clicked = false;
						first = true;
						$('.clipped-box').css({'top' : '-1000px', 'transition' : 'none'});
						$(self).css({'left' : '0', 'bottom' : '0', 'opacity' : '1', 'transition' : 'none', 'transform' : 'none'});
						clearInterval(z);
					}
				}, 10);
			});
		}
	});
	r = setInterval(function() {
		if(first === true) {
			$('.clipped-box').css({'top' : '0', 'transition' : ''});
			$('.clipped-box div').css({'opacity' : '1', 'transition' : '', 'background-color' : ''});
			$('.content').css({'display' : 'block'});
			first = false;
		}
	}, 300);
});
</script>
</head>
<body class='background'>
<div class="container">
	<div class="clipped-box">
		<div class="content">
			<h1>网站维护中.......</h1>
			<h2>点开一下</h2>
			<h3>点开一下</h3>
			<h4>点开一下</h4>
			<h5>点开一下</h5>
			<h6>点开一下</h6>

		</div>
	</div>
</div>

</body>
</html>