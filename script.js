var stl_viewer = new StlViewer(document.getElementById("stl-container"));
var volumeButton = document.getElementById("volume-button");
var sizeButton = document.getElementById("size-button");
var xSize = document.getElementById("x-size");
var ySize = document.getElementById("y-size");
var zSize = document.getElementById("z-size");
var preis = document.getElementById("preis");
var volume;
var xSize2;
var ySize2;
var zSize2;
var volume2;
var preis2;
var modellname;
var datei;



function kopier() {

document.getElementById("x-size2").innerHTML = document.getElementById("x-size").innerHTML;
document.getElementById("y-size2").innerHTML = document.getElementById("y-size").innerHTML;
document.getElementById("z-size2").innerHTML = document.getElementById("z-size").innerHTML; document.getElementById("preis2").innerHTML = document.getElementById("preis").innerHTML;
document.getElementById("volume-output2").innerHTML = document.getElementById("volume-output").innerHTML;
document.getElementById("modellname").innerHTML = stl_viewer.get_model_info(1).name;


}

function loadFile(file) {
  stl_viewer.clean();
  stl_viewer.add_model(
    {
      local_file: file
      
    });
    datei = file;
    
}

function show(shown, hidden) {
  kopier();
  document.getElementById(shown).style.display='block';
  document.getElementById(hidden).style.display='none';
  return false;
}



function calculateVolume() {
  volume = stl_viewer.get_model_info(1).volume;
  document.getElementById("volume-output").innerHTML = Math.round(stl_viewer.get_model_info(1).volume * 0.1) / 100 + " cm&sup3";
  modellname = stl_viewer.get_model_info(1).name;
}

function setpreis(mat) {
  if (volume == null) {document.getElementById("preis").innerHTML = "Bitte zuerst Datei auswählen";
  document.getElementById("material").innerHTML = "Bitte zuerst Volumen berechnen";}
  
  else {
    switch (mat) {
      case "asa":
        preis = Math.round(volume*1.15*0.1)/100;
        document.getElementById("preis").innerHTML = preis + "€";
        document.getElementById("material").innerHTML = "ASA";
        document.getElementById("seitenwechsel").disabled = false;
        document.getElementById("seitenwechsel").classList.remove("btn-two");
        document.getElementById("seitenwechsel").classList.add("btn-one");
        break;
        case "abs":
          preis = Math.round(volume*1.37*0.1)/100;
          document.getElementById("preis").innerHTML = preis + "€";
          document.getElementById("material").innerHTML = "ABS ESD";
          document.getElementById("seitenwechsel").disabled = false;
          document.getElementById("seitenwechsel").classList.remove("btn-two");
          document.getElementById("seitenwechsel").classList.add("btn-one");
          break;
        case "pa":
          preis = Math.round(volume*1.10*0.1)/100;
          document.getElementById("preis").innerHTML = preis + "€";
          document.getElementById("material").innerHTML = "PA2200";
          document.getElementById("seitenwechsel").disabled = false;
          document.getElementById("seitenwechsel").classList.remove("btn-two");
          document.getElementById("seitenwechsel").classList.add("btn-one");
          break;
        case "ar":
          preis = Math.round(volume*3.37*0.1)/100;
        document.getElementById("preis").innerHTML = preis + "€";
        document.getElementById("material").innerHTML = "AR-M2";
        document.getElementById("seitenwechsel").disabled = false;
        document.getElementById("seitenwechsel").classList.remove("btn-two");
        document.getElementById("seitenwechsel").classList.add("btn-one");
        

        break;
      default:
        break;
    }
  }
}

function setNachbearbeitung(nach) {
  switch (nach) {
    case "keine": 
      document.getElementById("nachbearbeitung").innerHTML = "Keine"; 
      break;
      case "glas": 
      document.getElementById("nachbearbeitung").innerHTML = "Glasperlenstrahlen"; 
      break;
      default:
        break;
  }
}

function calculateSize() {
  xSize.innerHTML = "Breite: " + (Math.round(stl_viewer.get_model_mesh(1).geometry.maxx * 10) / 100) * 2 + "cm" ;
  ySize.innerHTML = "Höhe: " + (Math.round(stl_viewer.get_model_mesh(1).geometry.maxy * 10) / 100) * 2 + "cm" ;
  zSize.innerHTML = "Tiefe: " + (Math.round(stl_viewer.get_model_mesh(1).geometry.maxz * 10) / 100) * 2 + "cm" ;

  xSize = Math.round(stl_viewer.get_model_mesh(1).geometry.maxx * 10) / 100 * 2 + "cm";
  ySize = Math.round(stl_viewer.get_model_mesh(1).geometry.maxy * 10) / 100 * 2 + "cm";
  zSize = Math.round(stl_viewer.get_model_mesh(1).geometry.maxz * 10) / 100 * 2 + "cm";
}

function seitenwechsel() {
  //window.location.href = "shopping_cart.html";
  uploadfiles();
}

// Hier passiert der Upload. Funktion wird bei Klick auf "Weiter" auf der ersten Seite automatisch durchgeführt. 
// Dementsprechend müsste auch das Laden in die Datenbank der jeweiligen Variablen hier normal ablaufe.
function uploadfiles() {
  preis;
  xSize;
  ySize;
  zSize;
  volume;
  modellname;
  console.log(datei);
  console.log(volume);
  datei;
  
}
volumeButton.addEventListener("click", calculateVolume);
sizeButton.addEventListener("click", calculateSize);