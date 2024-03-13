class Validator
{
    private $validations = [];

    public function addValidation($field, $callback, $errorMessage)
    {
        $this->validations[$field][] = ['callback' => $callback, 'errorMessage' => $errorMessage];
    }

    public function validateField($field, $value)
    {
        $errors = [];
        if (isset($this->validations[$field])) {
            foreach ($this->validations[$field] as $validation) {
                if (!$validation['callback']($value)) {
                    $errors[$field][] = $validation['errorMessage'];
                }
            }
        }
        return $errors;
    }

    public function validateForm($data)
    {
        $errors = [];
        foreach ($data as $field => $value) {
            if ($error = $this->validateField($field, $value)) {
                $errors = array_merge($errors, $error);
            }
        }
        return $errors;
    }
}
