from flask import Flask
from src.router import router


def create_app():
    """
    Create a Flask server and run it

    :returns: The Flask server
    """
    server = Flask(__name__)
    router(server)
    return server
