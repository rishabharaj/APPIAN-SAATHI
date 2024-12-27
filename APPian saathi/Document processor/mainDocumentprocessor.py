from app.aws_services import AWSServices
from app.db_handler import DatabaseHandler
from app.ocr_processor import OCRProcessor
from app.metadata_extractor import MetadataExtractor
from app.document_classifier import DocumentClassifier
from app.summarizer import Summarizer

class DocumentProcessor:
    def __init__(self, aws_services, db_handler):
        self.aws_services = aws_services
        self.db_handler = db_handler
        self.ocr_processor = OCRProcessor(aws_services)
        self.metadata_extractor = MetadataExtractor()
        self.classifier = DocumentClassifier()
        self.summarizer = Summarizer()

    def process_document(self, file_path):
        # Step 1: Upload to S3
        s3_url = self.aws_services.upload_to_s3(file_path, f"uploads/{file_path.split('/')[-1]}")

        # Step 2: Extract Text
        text = self.ocr_processor.process_ocr(f"uploads/{file_path.split('/')[-1]}")

        # Step 3: Extract Metadata
        metadata = self.metadata_extractor.extract_metadata(text)

        # Step 4: Classify Document
        classification = self.classifier.classify(text)

        # Step 5: Summarize Document
        summary = self.summarizer.summarize(text)

        # Step 6: Save to RDS
        self.db_handler.save_document(file_path.split('/')[-1], classification, summary, metadata, s3_url)

        return {
            "s3_url": s3_url,
            "classification": classification,
            "summary": summary,
            "metadata": metadata
        }
