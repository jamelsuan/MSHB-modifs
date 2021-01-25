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

animeBandeau();

