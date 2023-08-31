from flask import render_template


def router(server):
    @server.route('/')
    def index():
        return render_template('index.html')
