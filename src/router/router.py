from flask import render_template


def router(server):
    """
    Define the routes for the server
    """
    @server.route('/')
    def index():
        return render_template('index.html')
