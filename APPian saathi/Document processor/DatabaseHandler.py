import sqlite3

class DatabaseHandler:
    def __init__(self, db_name='document_processor.db'):
        self.conn = sqlite3.connect(db_name)
        self.create_tables()

    def create_tables(self):
        self.conn.execute("""
            CREATE TABLE IF NOT EXISTS documents (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                file_name TEXT,
                classification TEXT,
                summary TEXT,
                metadata TEXT,
                upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        """)

    def save_document(self, file_name, classification, summary, metadata):
        self.conn.execute("""
            INSERT INTO documents (file_name, classification, summary, metadata)
            VALUES (?, ?, ?, ?)
        """, (file_name, classification, summary, str(metadata)))
        self.conn.commit()
