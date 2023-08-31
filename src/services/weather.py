from flask import make_response, jsonify


def get_weather():
    """
    Get the weather from the weather service

    :parameters:
    - latitude: The latitude of the location
    - longitude: The longitude of the location

    :returns: The weather data or an error
    """
    return make_response(jsonify(error="Not Implemented"), 501)
