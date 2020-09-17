var southWest = L.latLng(45.7138, 5.927),
  northEast = L.latLng(48.019, 10.618),
  bounds = L.latLngBounds(southWest, northEast);

// einfach mitten rein zentrieren und zoom 6
var map = L.map("map", {
  minZoom: 7,
  maxZoom: 15,
  maxBounds: bounds,
}).setView([46.48, 8.13], 7);

// geolocation vom browser nehmen und dort zentrieren, zoom z.b. 12 (hier waehrend entwicklung lieber 8)
if (navigator.geolocation) {
  // Read location from Browser
  navigator.geolocation.getCurrentPosition(function (position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    //map.setView([lat, lng], 10);  //vereinfacht die benutzung der Karte, da man beim Standortspeicherung keinen ueberblick der ganzen ch - karte hat
  });
}

var OpenTopoMap = L.tileLayer(
  "http://{s}.tile.opentopomap.org/{z}/{x}/{y}.png",
  {
    maxZoom: 16,
    attribution:
      'Map data: &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)',
  }
);
//map.addLayer(OpenTopoMap);

/*
		
		*/
var Stamen_TonerLite = L.tileLayer(
  "http://stamen-tiles-{s}.a.ssl.fastly.net/toner-lite/{z}/{x}/{y}.png",
  {
    attribution:
      'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
    subdomains: "abcd",
    minZoom: 0,
    maxZoom: 20,
    ext: "png",
  }
);
var OpenMapSurfer_AdminBounds = L.tileLayer(
  "http://openmapsurfer.uni-hd.de/tiles/adminb/x={x}&y={y}&z={z}",
  {
    maxZoom: 19,
    attribution:
      'Imagery from <a href="http://giscience.uni-hd.de/">GIScience Research Group @ University of Heidelberg</a> &mdash; Map data &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
  }
);

//map.addLayer(Stamen_TonerLite);
//map.addLayer(OpenMapSurfer_AdminBounds);

// control that shows state info on hover
var info = L.control();

info.onAdd = function (map) {
  this._div = L.DomUtil.create("div", "info");
  this.update();
  return this._div;
};
/*
		info.update = function (props) {
			this._div.innerHTML = '<h4>Kantone der Schweiz</h4>' +  (props ?
				'<b>' + props.Name + '</b><br />' + props.Description + ' '
				: 'W&auml;hlen Sie Ihren Kanton');
		};
		*/
info.update = function (props) {
  this._div.innerHTML =
    "<h4>Kantone der Schweiz</h4>" +
    (props
      ? "<b>" + props.Name + "</b><br />" + " "
      : "W&auml;hlen Sie Ihren Kanton");
};

info.addTo(map);

// get color depending on population density value
function getColor(d) {
  return d == "Z&uuml;rich"
    ? "#009fe3"
    : d == "Bern"
    ? "#BD0026"
    : d == "Uri"
    ? "#ffd500"
    : d == "Glarus"
    ? "#009e59"
    : d == "Luzern"
    ? "#16569a"
    : d == "Jura"
    ? "#77998a"
    : d == "Schwyz"
    ? "#BD0026"
    : d == "Obwalden"
    ? "#009e59"
    : d == "Nidwalden"
    ? "#BD0026"
    : d == "Zug"
    ? "#16569a"
    : d == "Fribourg"
    ? "#BD0026"
    : d == "Basel-Stadt"
    ? "#00478e"
    : d == "Basel-Landschaft"
    ? "#BD0026"
    : d == "Solothurn"
    ? "#009e59"
    : d == "Appenzell Ausserrhoden"
    ? "#000000"
    : d == "Appenzell Innerrhoden"
    ? "#000000"
    : d == "St. Gallen"
    ? "#009e59"
    : d == "Graub&uuml;nden"
    ? "#16569a"
    : d == "Aargau"
    ? "#16569a"
    : d == "Thurgau"
    ? "#009e59"
    : d == "Ticino"
    ? "#16569a"
    : d == "Vaud"
    ? "#77998a"
    : d == "Valais"
    ? "#16569a"
    : d == "Neuch&acirc;tel"
    ? "#77998a"
    : d == "Gen&egrafe;ve"
    ? "#77998a"
    : d == "Schaffhausen"
    ? "#ffd500"
    : "#77998a";
}

function style(feature) {
  return {
    weight: 2,
    opacity: 1,
    color: "white",
    dashArray: "3",
    fillOpacity: 0.7,
    fillColor: getColor(feature.properties.Name),
  };
}

function highlightFeature(e) {
  var layer = e.target;
  layer.setStyle({
    weight: 5,
    color: "#666",
    dashArray: "",
    fillOpacity: 0.7,
  });

  if (!L.Browser.ie && !L.Browser.opera) {
    layer.bringToFront();
  }

  info.update(layer.feature.properties);
}

var geojson;

function resetHighlight(e) {
  geojson.resetStyle(e.target);
  info.update();
}

function zoomToFeature(e) {
  map.fitBounds(e.target.getBounds());
}

function clickOnFeature(e) {
  var layer = e.target;
  var link = getLink(layer.feature.properties.Name);
  link = link.replace(/&amp;/g, "&");
  window.location.href = link;
}
function htmlDecode(input) {
  var doc = new DOMParser().parseFromString(input, "text/html");
  return doc.documentElement.textContent;
}
function onEachFeature(feature, layer) {
  layer.on({
    mouseover: highlightFeature,
    mouseout: resetHighlight,
    click: clickOnFeature,
  });
}

geojson = L.geoJson(statesData, {
  style: style,
  onEachFeature: onEachFeature,
}).addTo(map);

map.attributionControl.addAttribution(
  'Gemeindedaten &copy; <a href="http://bfs.admin.ch/">Bundesamt f&uuml;r Statistik</a>'
);
