// window.addEventListener('scroll', function() {
//   let header = document.querySelector('header');
//   header.classList.toggle('change__bg', window.scrollY > 0);
// });

const overlay = document.querySelector(".overlay");
const body = document.querySelector("body");
const menuBtn = document.querySelector(".menu-btn");
const menuItems = document.querySelector(".menu-items");
const expandBtn = document.querySelectorAll(".expand-btn");

function toggle() {
  // disable overflow body
  body.classList.toggle("overflow");
  // dark background
  overlay.classList.toggle("overlay--active");
  // add open class
  menuBtn.classList.toggle("open");
  menuItems.classList.toggle("open");
}

menuBtn.addEventListener("click", (e) => {
  e.stopPropagation();
  toggle();
});

window.onkeydown = function (event) {
  const key = event.key; // const {key} = event; in ES6+
  const active = menuItems.classList.contains("open");
  if (key === "Escape" && active) {
    toggle();
  }
};

document.addEventListener("click", (e) => {
  let target = e.target,
    its_menu = target === menuItems || menuItems.contains(target),
    its_hamburger = target === menuBtn,
    menu_is_active = menuItems.classList.contains("open");
  if (!its_menu && !its_hamburger && menu_is_active) {
    toggle();
  }
});

// mobile menu expand
expandBtn.forEach((btn) => {
  btn.addEventListener("click", () => {
    btn.classList.toggle("open");
  });
});

/** Animation2*/
let mCount = function (selector) {
  $(selector).each(function () {
    $(this).animate(
      {
        Counter: $(this).text(),
      },
      {
        duration: 5000,
        easing: "swing",
        step: function (value) {
          $(this).text(Math.ceil(value));
        },
      }
    );
  });
};
let b = 0;
$(window).scroll(function () {
  let oTop = $(".numbers").offset().top - window.innerHeight;
  if (b == 0 && $(window).scrollTop() >= oTop) {
    b++;
    mCount(".bottom__number-holder > h1 > span");
  }
});

function initMap() {
  const allstar = {
    lat: 27.70437,
    lng: 85.33605,
  };
  var map = new google.maps.Map(document.getElementById("map"), {
    mapTypeControl: false,
    center: allstar,
    zoom: 15,
  });
  const image =
    "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png";
  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: allstar,
    map: map,
    draggable: true,
    animation: google.maps.Animation.DROP,
    icon: image,
  });
  marker.setMap(map);
  marker.addListener("click", toggleBounce);
  new AutocompleteDirectionsHandler(map);

  function toggleBounce() {
    if (marker.getAnimation() !== null) {
      marker.setAnimation(null);
    } else {
      marker.setAnimation(google.maps.Animation.BOUNCE);
    }
  }
}
/**
 * @constructor
 */

function AutocompleteDirectionsHandler(map) {
  this.map = map;
  this.originPlaceId = null;
  this.destinationPlaceId = null;
  this.travelMode = "WALKING";
  var originInput = document.getElementById("origin-input");
  var destinationInput = document.getElementById("destination-input");
  var modeSelector = document.getElementById("mode-selector");
  this.directionsService = new google.maps.DirectionsService();
  this.directionsDisplay = new google.maps.DirectionsRenderer();
  this.directionsDisplay.setMap(map);

  var originAutocomplete = new google.maps.places.Autocomplete(originInput, {
    placeIdOnly: true,
  });
  var destinationAutocomplete = new google.maps.places.Autocomplete(
    destinationInput,
    {
      placeIdOnly: true,
    }
  );

  this.setupClickListener("changemode-walking", "WALKING");
  // this.setupClickListener('changemode-transit', 'TRANSIT');
  this.setupClickListener("changemode-driving", "DRIVING");

  this.setupPlaceChangedListener(originAutocomplete, "ORIG");
  this.setupPlaceChangedListener(destinationAutocomplete, "DEST");

  this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
  this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(
    destinationInput
  );
  this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
}

// Sets a listener on a radio button to change the filter type on Places
// Autocomplete.
AutocompleteDirectionsHandler.prototype.setupClickListener = function (
  id,
  mode
) {
  var radioButton = document.getElementById(id);
  var me = this;
  radioButton.addEventListener("click", function () {
    me.travelMode = mode;
    me.route();
  });
};

AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function (
  autocomplete,
  mode
) {
  var me = this;
  autocomplete.bindTo("bounds", this.map);
  autocomplete.addListener("place_changed", function () {
    var place = autocomplete.getPlace();
    if (!place.place_id) {
      window.alert("Please select an option from the dropdown list.");
      return;
    }
    if (mode === "ORIG") {
      me.originPlaceId = place.place_id;
    } else {
      me.destinationPlaceId = place.place_id;
    }
    me.route();
  });
};

AutocompleteDirectionsHandler.prototype.route = function () {
  if (!this.originPlaceId || !this.destinationPlaceId) {
    return;
  }
  var me = this;

  this.directionsService.route(
    {
      origin: {
        placeId: this.originPlaceId,
      },
      destination: {
        placeId: this.destinationPlaceId,
      },
      travelMode: this.travelMode,
    },
    function (response, status) {
      if (status === "OK") {
        me.directionsDisplay.setDirections(response);
      } else {
        window.alert("Directions request failed due to " + status);
      }
    }
  );
};
