import os
from dotenv import load_dotenv
from src.app import create_app

load_dotenv()

app = create_app()
port = os.environ.get('SERVER_PORT', 80)
debug = os.environ.get('DEBUG', False)
app_env = os.environ.get('APP_ENV', 'production')
if app_env != 'production':
    app.run(debug=debug, host='0.0.0.0', port=port)
