# Simple File Uploader

The Simple File Uploader is a lightweight PHP script that allows users to quickly upload files to their web server using a standard PHP environment. It provides a simple and straightforward interface for file uploads without the need for complex features or authentication.

## Features

- Easy file upload: Users can select a file from their local system and upload it to their web server.
- Lightweight and minimal: The script is designed to be simple and lightweight, focusing on the core functionality of file uploading.
- No authentication required: The script does not require any authentication or user login, making it easy to integrate into existing projects or websites.

## Usage

1. Download the `uploader.php` file from this repository.
2. Place the `uploader.php` file in your web server directory.
3. Ensure that the web server has write permissions to the directory where uploaded files will be stored.
4. Access the `uploader.php` script through a web browser.
5. Click on the "Choose File" button to select a file from your local system.
6. Click the "Upload" button to initiate the file upload process.
7. After the upload completes, you will see a success message with the unique filename assigned to the uploaded file.
8. Feel free to upload additional files by repeating steps 5-7.

Note: It is recommended to turn off the file uploader when not in use to prevent unauthorized access or misuse.

## Configuration

There are a few PHP configuration settings that you may need to adjust to ensure the smooth functioning of the file uploader:

1. `upload_max_filesize`: This setting determines the maximum size of an uploaded file. By default, it is set to a relatively small value. If you want to allow larger file uploads, you can increase this value in the `php.ini` file.

2. `post_max_size`: This setting determines the maximum size of the entire HTTP POST request, including the uploaded file(s) and other form data. It should be set to a value larger than the `upload_max_filesize` to accommodate the complete file upload. Adjust this value in the `php.ini` file as well.

3. `max_execution_time`: This setting controls the maximum execution time of a PHP script. If you are uploading large files, you may need to increase this value to prevent script timeouts during the upload process.

You can locate the `php.ini` file on your server and modify these settings according to your requirements. If you don't have direct access to the `php.ini` file, you may need to contact your hosting provider or system administrator for assistance.

## Limitations

- This script does not support advanced features such as file validation, file management, or user authentication. It focuses solely on the file upload functionality.
- Large file uploads may be subject to the maximum file size limit specified in the PHP configuration (`upload_max_filesize` directive in `php.ini`).
- It is the responsibility of the user to ensure the security and integrity of the uploaded files and implement any necessary measures to prevent unauthorized access or file manipulation.

## License

This project is licensed under the [MIT License](LICENSE).

## Contributing

Contributions are welcome! If you have any suggestions, bug reports, or feature requests, please [create an issue](https://github.com/your-username/simple-file-uploader-php/issues) or submit a pull request.