import pytesseract
from pdfplumber import open as pdf_open
from pdf2image import convert_from_path

class OCRProcessor:
    @staticmethod
    def extract_text(file_path):
        try:
            with pdf_open(file_path) as pdf:
                text = ''.join(page.extract_text() or '' for page in pdf.pages)
                if text.strip():
                    return text
        except:
            pass

        images = convert_from_path(file_path)
        ocr_text = ''.join(pytesseract.image_to_string(image) for image in images)
        return ocr_text
