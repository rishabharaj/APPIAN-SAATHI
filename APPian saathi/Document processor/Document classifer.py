class DocumentClassifier:
    @staticmethod
    def classify(text):
        if "invoice" in text.lower():
            return "Invoice"
        elif "tax return" in text.lower():
            return "Tax Return"
        elif "paystub" in text.lower():
            return "Paystub"
        elif "identity" in text.lower():
            return "Identity Document"
        return "Other"
