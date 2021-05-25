var stl_viewer = new StlViewer(document.getElementById("stl-container"));
var volumeButton = document.getElementById("volume-button");
var sizeButton = document.getElementById("size-button");
var xSize = document.getElementById("x-size");
var ySize = document.getElementById("y-size");
var zSize = document.getElementById("z-size");

function loadFile(file) {
  stl_viewer.clean();
  stl_viewer.add_model(
    {
      local_file: file
      
    });
}



function calculateVolume() {
  var volume = stl_viewer.get_model_info(1).volume;
  document.getElementById("volume-output").innerHTML = Math.round(volume * 0.1) / 100 + " cm&sup3";
 
}

function calculateSize() {
  xSize.innerHTML = "Breite: " + (Math.round(stl_viewer.get_model_mesh(1).geometry.maxx * 10) / 100) * 2 + "cm" ;
  ySize.innerHTML = "Höhe: " + (Math.round(stl_viewer.get_model_mesh(1).geometry.maxy * 10) / 100) * 2 + "cm" ;
  zSize.innerHTML = "Tiefe: " + (Math.round(stl_viewer.get_model_mesh(1).geometry.maxz * 10) / 100) * 2 + "cm" ;
}

volumeButton.addEventListener("click", calculateVolume);
sizeButton.addEventListener("click", calculateSize);

