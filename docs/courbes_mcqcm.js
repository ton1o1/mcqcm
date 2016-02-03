var xmin = 0.00;
var xmax = 0.00;

function f(u) {
var expr = document.getElementById("indice").value;
expr = parseInt(expr);
var ycalc = 0.00; 
switch (expr) {
    case 1: ycalc = Math.cos(u);
    break;
    default: break;
    }
return ycalc;
}



function y_selection(x) {
    var expr_etude = document.getElementById("indice_etude").value;
    var y_sel = 0.00;
    expr_etude = parseInt(expr_etude);
    switch (expr_etude) {
        case 1: y_sel = f(x);
        break;
        default: break;
        }
    return y_sel;
}

function draw(v,w) { 
  var W = 400;
  var H = 300;
  var canvas = document.getElementById("graphe");
  canvas.width = W; canvas.height = H;
  var cvs = canvas.getContext("2d");
  var nx = 50;
  var ny = 100;

  // Recherche du min et du max de y avec leur différence et position centrale

   var ymin = 0.00;
   var ymax = 0.00;
   var y_etendue = 0.00;
   var y_position = 0.00;
   var vv = 0;
   y = y_selection(v);
   ymin = y;
   ymax = y;
   vv = Math.abs(v);
   switch (vv) {
        case 0: 
          xmin = 0.00;
          xmax *= 1.00 + 0.10*w;
        break;
        case 2: 
          xmin += 10.00*v/nx;
        break;
        default: break;
        }
   if (v == 0) {
      xmin = 0.00;
    } else {
      xmin += 10.00*v/nx;
    }

   for(x=xmin-W/(2*nx); x<=xmin+W/(2*nx); x+=1/nx) {
      y = y_selection(x);
      if (ymax < y) {ymax = y;};
      if (ymin > y) {ymin = y;};
      }
    y_etendue = ymax - ymin;
    y_position = (ymin + ymax)/2;



  // Quadrillage

  cvs.strokeStyle = "#ECA";
  cvs.beginPath();
  cvs.lineWidth=0.5;

  // Horizontales
  for (var i=0; i<=5*H/ny; i++) {
    cvs.moveTo(0, H-0.2*ny*i)
    cvs.lineTo(W, H-0.2*ny*i)
  }

  // Verticales
  for (var i=0; i<=5*W/nx; i++) {
    cvs.moveTo(0.2*nx*i, H);
    cvs.lineTo(0.2*nx*i, 0);
  }
  cvs.stroke();
  var x = 0.00; 
  x = xmin;
  var y = 0.00;


  // Graphe de la fonction
   
    cvs.strokeStyle = "#ffddaa";
    cvs.lineWidth=2.5;
    cvs.beginPath();
    x = xmin;
    y = y_selection(v);
    cvs.moveTo(-200 + nx*xmin, -150 + H - (y - y_position) * 200 / y_etendue);
    for (x=xmin-W/(2*nx); x<=xmin+W/(2*nx); x+=1/nx) 
    {
      y = y_selection(x);
      cvs.lineTo(200 + (x - xmin) * nx, - 150 + H - (y - y_position) * 200 / y_etendue);
    }

  // cvs.closePath();
  cvs.stroke();
}

/* tracer(g);

function tracer(h)
{
/* var b = document.forms[0].formule1.value;
if (b !="") {var f = "7+" + b}
else {var f = "0"}
var c = document.forms[0].formule2.value;
if (c !="") {var ff = "7+" + c}
else {var ff = "0"}; 
draw(h);
} */

// fonction


/* function trace() {
  graphique();
  draw(g);
} */
