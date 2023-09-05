import os
from flask import make_response, jsonify
import requests


def get_weather(latitude, longitude):
    """
    Get the weather from the weather service

    :parameters:
    - latitude: The latitude of the location
    - longitude: The longitude of the location

    :returns: The weather data as a JSON object
    with weather description, location and temperature or an error message
    """
    weather_api_key = os.environ.get('WEATHER_API_KEY', None)
    request_string = (
        f"https://api.openweathermap.org/data/2.5/weather?lat={latitude}"
        f"&lon={longitude}&appid={weather_api_key}&units=metric"
    )

    response = requests.get(request_string, timeout=5)

    if response.status_code == 200:
        json_response = response.json()
        location = json_response.get('name', None)
        description = json_response.get('weather', [{}])[0].get('description', None)
        temperature = json_response.get('main', {}).get('temp', None)

        if not location or not description or not temperature:
            return make_response(jsonify(error="Weather information not available"), 404)

        return make_response(jsonify(
            description=f"{description.capitalize()}",
            location=location,
            temperature=f"{temperature} °C"
        ), 200)

    return make_response(jsonify(error="Weather information not available"), 404)
