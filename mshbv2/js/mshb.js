

function animeBandeau() {
    
    var container_bandeau_svg = document.getElementById('bandeau_svg');
    var modulo = Math.floor((Math.random() * 3) + 1); //4;
    var nombredor = (1 + Math.sqrt(5)) / 2;
    var angledor = Math.PI * 2 / (1 + nombredor);
    var generalAngle = 0;
    var nbr = 10000; // nombre de points
    var c2 = Math.floor((Math.random() * 5) + 14);;; // espace entre les points
    var x = 600; // coordonnée du centre
    var y = 240; // coordonnée du centre
    var i = 0;


    var lesmodulos1 = new Array();
    var lesmodulos2 = new Array();
    var selections = [27, 43, 44, 58, 61, 59, 94, 95, 96, 97, 98, 101, 111, 112, 113, 114, 117, 119, 129, 130, 132, 133, 134, 136, 168, 169, 170, 171, 173, 174, 178, 192, 198, 200, 208, 210, 211, 213, 218, 226, 228, 230, 232, 233, 246, 250, 251, 252, 270, 279, 280, 286, 322, 323, 326];
    serieNum = 5;
    serie = selections[serieNum];

    var m1 = 0;
    var m2 = 2;

    for (var a = 0; a < 600; a++) {
        m1++;
        if (m1 > 20) {
            m1 = 1;
            m2++;
        }
        while (m1 % m2 == 0) {
            m1++;
        }
        lesmodulos1[a] = m1;
        lesmodulos2[a] = m2;
    }

    modulos = [lesmodulos1[serie], lesmodulos2[serie]];


    for (var a = 0; a < nbr; a++) {

        var delta = c2 / 2 * Math.sqrt(a);
        var x1 = Math.cos(angledor * a) * delta + x;
        var y1 = Math.sin(angledor * a) * delta + y;

        for (var i = 0; i < 2; i++) {
            if (a % modulos[i] == 0) {
                taille = 0
            } else {
                taille = Math.floor((Math.random() * 3) + 2)
            }
        }
        createPt(x1, y1, taille);

    }





    function createPt(x, y, r, circleclass) {
        newPt = document.createElementNS("http://www.w3.org/2000/svg", "circle");
        newPt.setAttribute("cx", x);
        newPt.setAttribute("cy", y);
        newPt.setAttribute("r", r);
        newPt.setAttribute("class", circleclass);
        container_bandeau_svg.appendChild(newPt);
    }

}

function navBar(){

    function onscroll_function(){
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("navbar").className = "navbar_condensed";
        } else {
            document.getElementById("navbar").className = "navbar_extended";
        }
    }

    window.onscroll = function() { onscroll_function(); };
}




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
    animeBandeau();
    navBar();



// if (color !== null) {
//   document.getElementById("extended_logo").src = "/sites/all/themes/mshbv2/img/logos_mshb/logo_MSHB_"+color+Math.floor((Math.random() * 3) + 1)+".jpg";
//   document.getElementById("condensed_logo").src = "/sites/all/themes/mshbv2/img/logos_mshb/logo_MSHB_min_"+color+".jpg.png";
// }
