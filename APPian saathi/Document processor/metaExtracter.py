import re

class MetadataExtractor:
    @staticmethod
    def extract_metadata(text):
        metadata = {}
        metadata['name'] = re.search(r'Name:\s*(\w+\s\w+)', text).group(1) if re.search(r'Name:\s*(\w+\s\w+)', text) else "Unknown"
        metadata['date'] = re.search(r'\d{4}-\d{2}-\d{2}', text).group(0) if re.search(r'\d{4}-\d{2}-\d{2}', text) else "Unknown"
        metadata['amount'] = re.search(r'[$₹€]\s?\d+[,\.]?\d*', text).group(0) if re.search(r'[$₹€]\s?\d+[,\.]?\d*', text) else "Unknown"
        return metadata
