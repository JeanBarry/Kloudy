from flask import render_template, request, make_response, jsonify
from src.services import weather
from src.validator import validate_request


def router(server):
    """
    Define the routes for the server
    """

    @server.route('/', methods=['GET'])
    def index():
        if request.method == 'GET':
            return render_template('index.html')
        return make_response(jsonify(message="Method not allowed"), 405)

    @server.route('/api/weather', methods=['GET'])
    def show():
        if request.method == 'GET':
            valid_request = validate_request('/api/weather', request.args.to_dict())
            if not valid_request['valid']:
                return make_response(jsonify(error=valid_request['errors']), 400)
            return weather.get_weather(request.args.get('latitude'), request.args.get('longitude'))
        return make_response(jsonify(message="Method not allowed"), 405)
