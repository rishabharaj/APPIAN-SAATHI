import pymysql

class DatabaseHandler:
    def __init__(self, connection):
        self.conn = connection

    def create_tables(self):
        with self.conn.cursor() as cursor:
            cursor.execute("""
                CREATE TABLE IF NOT EXISTS documents (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    file_name VARCHAR(255),
                    classification VARCHAR(50),
                    summary TEXT,
                    metadata JSON,
                    s3_url VARCHAR(255),
                    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )
            """)
            self.conn.commit()

    def save_document(self, file_name, classification, summary, metadata, s3_url):
        with self.conn.cursor() as cursor:
            cursor.execute("""
                INSERT INTO documents (file_name, classification, summary, metadata, s3_url)
                VALUES (%s, %s, %s, %s, %s)
            """, (file_name, classification, summary, metadata, s3_url))
            self.conn.commit()
