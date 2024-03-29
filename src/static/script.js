function updateWeather({description, location, temperature}) {
  const descriptionElement = document.getElementsByClassName('description')[0];
  const locationElement = document.getElementsByClassName('location')[0];
  const temperatureElement = document.getElementsByClassName('temperature')[0];
  descriptionElement.textContent = description;
  locationElement.textContent = location;
  temperatureElement.textContent = temperature;
}

function displayError(error) {
  const weatherElement = document.getElementsByClassName('weather')[0];
  const errorElement = document.getElementsByClassName('error')[0];
  errorElement.innerHTML = error;
  errorElement.classList.remove('hidden');
  weatherElement.classList.add('hidden');
}

async function getGeolocation() {
  const position = await new Promise((resolve, reject) => {
    navigator.geolocation.getCurrentPosition(resolve, reject);
  });
  return position;
}

async function onLoad() {
  const coordinates = await getGeolocation();
  if (!coordinates.coords) {
    displayError("Location could not be found");
    return;
  }
  const {latitude, longitude} = coordinates.coords;
  const weather = await fetch(`/api/weather?latitude=${latitude}&longitude=${longitude}`);
  if (weather.status === 400) {
    const errors = await weather.json();
    console.error(errors);
    displayError("Request could not be processed");
    return;
  }
  const response = await weather.json();
  if (response.error) {
    displayError(response.error);
    return;
  }
  updateWeather(response);
}

addEventListener('load', onLoad);
