import boto3
import pymysql
from botocore.exceptions import NoCredentialsError, PartialCredentialsError

class AWSServices:
    def __init__(self, aws_access_key, aws_secret_key, region_name, bucket_name, db_config):
        self.s3 = boto3.client(
            's3',
            aws_access_key_id=aws_access_key,
            aws_secret_access_key=aws_secret_key,
            region_name=region_name
        )
        self.textract = boto3.client(
            'textract',
            aws_access_key_id=aws_access_key,
            aws_secret_access_key=aws_secret_key,
            region_name=region_name
        )
        self.bucket_name = bucket_name
        self.db_config = db_config

    # Upload file to S3
    def upload_to_s3(self, file_path, object_name):
        try:
            self.s3.upload_file(file_path, self.bucket_name, object_name)
            return f"s3://{self.bucket_name}/{object_name}"
        except NoCredentialsError:
            raise Exception("AWS credentials not provided.")
        except Exception as e:
            raise Exception(f"Error uploading to S3: {e}")

    # Extract text using Textract
    def extract_text_from_s3(self, object_name):
        try:
            response = self.textract.analyze_document(
                Document={'S3Object': {'Bucket': self.bucket_name, 'Name': object_name}},
                FeatureTypes=['TABLES', 'FORMS']
            )
            extracted_text = ''
            for block in response['Blocks']:
                if block['BlockType'] == 'LINE':
                    extracted_text += block['Text'] + '\n'
            return extracted_text
        except Exception as e:
            raise Exception(f"Error using Textract: {e}")

    # Connect to RDS MySQL
    def connect_to_rds(self):
        try:
            connection = pymysql.connect(
                host=self.db_config['host'],
                user=self.db_config['user'],
                password=self.db_config['password'],
                database=self.db_config['database']
    
