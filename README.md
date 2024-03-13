
# Report on the Fourth Laboratory Work

## 1. Instructions for Running the Project

1.  Clone the repository:

    bashCopy code

    `git clone https://github.com/GASPAREAN/lab4.git`

2.  Run the project:

    bashCopy code

    `php -S localhost:8000 zad1.php`


## 2. Project Description

In this laboratory work, the Processing Forms in PHP was studied.

## 3. Brief Project Documentation

#### Validating POST Request using the Validator Class

PHPCopy code

`require_once 'Validator.php';
$validator = new Validator();

$validator->addValidation('name', function($value) {
if (empty($value))
return false;
if (strlen($value) <= 3)
return false;
if (strlen($value) >= 20)
return false;
if (preg_match('/\d/', $value))
return false;
return true;
}, 'Invalid name. Name should contain between 3 and 20 characters and should not contain digits.');

$validator->addValidation('email', function($value) {
if (empty($value))
return false;
if (!filter_var($value, FILTER_VALIDATE_EMAIL))
return false;
return true;
}, 'Invalid email.');

$validator->addValidation('comment', function($value) {
return !empty($value);
}, 'Please write your feedback.');

$validator->addValidation('agreement', function($value) {
return !empty($value);
}, 'Please confirm that you agree to data processing.');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$data = [
'name' => $_POST['name'] ?? '',
'email' => $_POST['email'] ?? '',
'comment' => $_POST['comment'] ?? '',
'agreement' => isset($_POST['agreement']),
];

    $errors = $validator->validateForm($data);

    if (empty($errors)) {
        echo "<div class='container mt-5'>";
        echo "<div class='alert alert-success' role='alert'>Your feedback has been successfully submitted!</div>";
        echo "</div>";
    } else {
        echo "<div class='container mt-5'>";
        echo "<div class='alert alert-danger' role='alert'>";
        echo "<ul>";
        foreach ($errors as $fieldErrors) {
            foreach ($fieldErrors as $error) {
                echo "<li>$error</li>";
            }
        }
        echo "</ul>";
        echo "</div>";
        echo "</div>";
    }
}`

## 4. Example of Project Usage (with attached screenshots)

![Example of program execution](/images/Screenshot 2024-03-13 215856.png)

## 5. Tasks

### Task №1: Working with the global variable $_POST `zad1.php`

#### 1. Create a file with the specified content

#### 2. Add code in the marked area that will display a message only after submitting the form.

#### 3. Add a function below the form to check the data, ensuring all fields are filled and the entered email is correct.

#### 4. Explain what the global variables $_POST and $_SERVER["PHP_SELF"] are.

### Task №2: Getting Data from Different Controllers `zad2.php`

#### Create a form consisting of at least 3 controllers (input, select)

#### The form theme is of your choice

#### Process the data and display it on the screen

### Task №3: Creating, Processing, and Validating Forms `zad3.php`

#### 1. Create a form as shown in the figure

#### Create your own validation function that will check all form fields when receiving a request

-   For the "name" field: set a minimum length of 3 characters, a maximum of 20 characters, and prohibit the use of digits.
-   For the "email" field: ensure that the email address meets standards.
-   For the "comment" field: ensure it is not empty and specify any other necessary validation criteria.
-   Make sure the user has checked the "Do you agree with data processing?" checkbox before submitting the form.
-   If the user entered the data correctly, display a comment below the form (no need to save comments anywhere).

#### 3. What is the difference between the global variables $_REQUEST and $_POST?

#### 4. Consider and study the following class as a validator: `View.php`

### Task №4: Creating a Form `zad4.php`

#### 1. Create a test with 3 questions using input, type radio, and input, type checkbox and ask for the user's name. Check the form completion and the options selected by the user. Display the results on the screen.
