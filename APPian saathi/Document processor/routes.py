from flask import Flask, render_template, request, redirect, url_for, jsonify
from app.file_ingestion import FileIngestion
from app.document_processor import DocumentProcessor
import os

app = Flask(__name__)
processor = DocumentProcessor()
ingestion = FileIngestion()

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/upload', methods=['POST'])
def upload():
    if 'file' not in request.files:
        return render_template('error.html', message="No file part in the request.")

    file = request.files['file']
    if file.filename == '':
        return render_template('error.html', message="No file selected.")

    if file and file.filename.endswith('.pdf'):
        upload_path = os.path.join(app.config['UPLOAD_FOLDER'], file.filename)
        file.save(upload_path)

        try:
            results = processor.process_document(upload_path)
            return render_template('results.html', results=results)
        except Exception as e:
            return render_template('error.html', message=str(e))

    return render_template('error.html', message="Unsupported file format.")

@app.errorhandler(404)
def page_not_found(e):
    return render_template('error.html', message="Page not found."), 404
