
float nombredor = (1+sqrt(5))/2;
float angledor = TWO_PI/(1+nombredor);
float generalAngle=0;


int serie = 0;
String s = "text";

color [] couleursPages = { color(191,34,40), color(255,213,45), color(0,93,172), color(0,146,145), color(50,50,50) };
int nbr = 300;

if(couleur_logo === undefined) {
    couleur_logo = "rouge";
}

float x = 150;
float y = 150;
float height = 330;
float c1=0.008;
float c2=15;
float r2max=c2*sqrt(nbr);
float taille;
float[] modulos = new float[2];
float[] tailles = new float[2];

int[] lesmodulos1 = new int[600];
int[] lesmodulos2 = new int[600];
int[] selections = {27, 43, 44, 58, 61, 59, 94, 95, 96, 97, 98, 101, 111, 112, 113, 114, 117, 119, 129, 130, 132, 133, 134, 136, 168, 169, 170, 171, 173, 174, 178, 192, 198, 200, 208, 210, 211, 213, 218, 226, 228, 230, 232, 233, 246, 250, 251, 252, 270, 279, 280, 286, 322, 323, 326};

color [] rondsColor = new color[nbr];
color [] rondsColorMemo = new color[nbr];

float [] tailleTab = new float[nbr];
float [] tailleTabMemo = new float[nbr];

void setup(){
    size(660,300);
    smooth();
    noStroke();
    frameRate(20);
    textelogo = loadShape("/MSHB.svg");

    int m1 = 0;
    int m2 = 2;
    for(int a=0; a<lesmodulos1.length; a++){
        m1++;
        if(m1>20){
            m1=1;
            m2++;
        }
        while(m1%m2==0){
            m1++;
        }
        lesmodulos1[a] = m1;
        lesmodulos2[a] = m2;
    }
}

int tps = 0;
int loop = 0;
int time = 25;
int delay = 40;
int serieNum = floor(random(0, selections.length));

void draw(){
    if(tps==0){
        //serie = floor(random(600));//
        serieNum+= floor(random(1, 4));
        if(serieNum>=selections.length){
            serieNum-=selections.length;
        }
        //serie = selections[floor(random(0, selections.length))];
        serie = selections[serieNum];
    }

    background(255);
    shape(textelogo, 0, 0, 660, 300);

    modulos[0] = lesmodulos1[serie];
    modulos[1] = lesmodulos2[serie];
    tailles[0] = 11 ;
    tailles[1] = 5 ;

    taille = 11;
    for(int a=0;a<nbr;a++){
        float r=c2/2*sqrt(a);
        float x1 = cos(angledor*a)*r + x;
        float y1 = sin(angledor*a)*r + y;
        color coul = coulPage;

        if(tps==0){
            for (int i = 0; i < 2; i++) {
                if(a%modulos[i]==0){
                    taille = tailles[i];
                }
            }



            switch(couleur_logo) {
                case "jaune":
                    color coulPage = couleursPages[1];
                    coul = color(red(coulPage)*random(0.9,1.1),green(coulPage)*random(0.9,1.1),blue(coulPage)*random(0.9,1.1));
                    break;
                case "vert":
                    color coulPage = couleursPages[3];
                    coul = color(red(coulPage)*random(0.8,1.3),green(coulPage)*random(0.8,1.3),blue(coulPage)*random(0.8,1.3));
                    break;
                case "bleu":
                    color coulPage = couleursPages[2];
                    coul = color(red(coulPage)*random(0.8,1.2),green(coulPage)*random(0.8,1.2),blue(coulPage)*random(0.8,1.2));
                    break;
                default:
                    // rouge;
                    color coulPage = couleursPages[0];
                default coul = color(red(coulPage)*random(0.8,1.3),green(coulPage)*random(0.8,1.3),blue(coulPage)*random(0.8,1.3));
            }




            if(taille==5){
                coul = 0;
            }
            tailleTab[a] = taille;
            rondsColor[a] = coul;
        }else if(tps==time+delay){
            tailleTabMemo[a] = tailleTab[a];
            rondsColorMemo[a] = rondsColor[a];
        }


        float t = 0;
        color c = 0;
        if(loop==0){
            t = tailleTab[a];
            c = rondsColor[a];
        }else{
            if(tps<=time){
                t = (tailleTab[a]*tps/time + tailleTabMemo[a]*(time-tps)/time);
                c = color(red(rondsColor[a])*tps/time+red(rondsColorMemo[a])*(time-float(tps))/time,green(rondsColor[a])*tps/time+green(rondsColorMemo[a])*(time-float(tps))/time,blue(rondsColor[a])*tps/time+blue(rondsColorMemo[a])*(time-float(tps))/time);

            }else{
                t = tailleTab[a];
                c = rondsColor[a];
            }
        }
        fill(c);
        ellipse(x1,y1,t,t);
    }

    tps++;

    if(tps>time+delay){
        tps = 0;
        loop++;
    }
}



  

 