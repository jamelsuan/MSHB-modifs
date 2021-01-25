function animeLogo() {
	logo = document.getElementById("logo");
	pts = logo.getElementsByClassName("pt");

	function randomMinMax(min, max){
		return (Math.random()*(max - min)) + min;
	}

	couleursPages = [ [191,34,40], [255,213,45], [0,93,172], [0,146,145], [50,50,50] ];
	tailles = [11, 5];
	tabModulos = [[3,4], [3,5], [4,5], [1,6], [4,6], [2,6], [2,8], [3,8], [4,8], [5,8], [6,8], [10,8], [1,9], [2,9], [3,9], [4,9], [7,9], [10,9], [1,10], [2,10], [4,10], [5,10], [6,10], [8,10], [2,12], [3,12], [4,12], [5,12], [7,12], [8,12], [13,12], [7,13], [14,13], [16,13], [4,14], [6,14], [7,14], [9,14], [15,14], [3,15], [5,15], [7,15], [9,15], [10,15], [4,16], [8,16], [9,16], [10,16], [9,17], [19,17], [20,17], [6,18], [4,20], [5,20], [8,20]];

	changePattern = function(){
		modulos = tabModulos[Math.floor(randomMinMax(0, tabModulos.length))]
		for(p=0;p<pts.length;p++){

			pts[p].classList.remove("default");
			switch(couleur_logo) {
			    case "jaune":
			        coulPage = couleursPages[1];
			        coul = 'rgb('+Math.floor(coulPage[0]*randomMinMax(0.9,1.1))+', '+Math.floor(coulPage[1]*randomMinMax(0.9,1.1))+', '+Math.floor(coulPage[2]*randomMinMax(0.9,1.1))+')';
			        break;
			    case "vert":
			        coulPage = couleursPages[3];
			        coul = 'rgb('+Math.floor(coulPage[0]*randomMinMax(0.8,1.3))+', '+Math.floor(coulPage[1]*randomMinMax(0.8,1.3))+', '+Math.floor(coulPage[2]*randomMinMax(0.8,1.3))+')';
			        break;
			    case "bleu":
			        coulPage = couleursPages[2];
			        coul = 'rgb('+Math.floor(coulPage[0]*randomMinMax(0.8,1.2))+', '+Math.floor(coulPage[1]*randomMinMax(0.8,1.2))+', '+Math.floor(coulPage[2]*randomMinMax(0.8,1.2))+')';
			        break;
			    default:
			        // rouge;
				   	coulPage = couleursPages[0];
				    coul = 'rgb('+Math.floor(coulPage[0]*randomMinMax(0.8,1.3))+', '+Math.floor(coulPage[1]*randomMinMax(0.8,1.3))+', '+Math.floor(coulPage[2]*randomMinMax(0.8,1.3))+')';
			}
			pts[p].style.fill = coul;
			pts[p].style.stroke = coul;

			for(var i = 0; i < 2; i++) {
			    if(p%modulos[i]==0){
			    	taille = tailles[i];
			    }
		     }
		     if(taille == 5){
		     	pts[p].classList.add("default");
		     	pts[p].style.fill = "#000";
				pts[p].style.stroke = "#000";
		     }
		}
	}

	interval = setInterval(changePattern, 4000);
	changePattern();
}

animeLogo();


