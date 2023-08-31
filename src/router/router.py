from flask import render_template, request, make_response, jsonify
from src.services import weather


def router(server):
    """
    Define the routes for the server
    """
    @server.route('/')
    def index():
        return render_template('index.html')

    @server.route('/api/weather', methods=['GET'])
    def show():
        if request.method == 'GET':
            return weather.get_weather()
        return make_response(jsonify(message="Method not allowed"), 405)
