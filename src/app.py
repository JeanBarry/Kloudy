import os
from flask import Flask
from src.router import router


def app():
    """
    Create a Flask server and run it

    :returns: The Flask server
    """
    server = Flask(__name__)
    port = os.environ.get('SERVER_PORT', 80)
    debug = os.environ.get('DEBUG', False)
    router(server)

    server.run(port=port, debug=debug)
    return server
