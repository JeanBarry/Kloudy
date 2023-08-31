import os
from flask import Flask
from src.router import router


def app():
    server = Flask(__name__)
    port = os.environ.get('SERVER_PORT', 80)
    router(server)

    server.run(port=port)
    return server
