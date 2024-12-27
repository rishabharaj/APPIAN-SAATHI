from flask import Flask
from app.routes import create_routes

app = Flask(__name__)
openai_api_key = "your_openai_api_key"  # Replace with your OpenAI API key
create_routes(app, openai_api_key)

if __name__ == "__main__":
    app.run(debug=True)
