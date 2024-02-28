<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Contact</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script>
        function validateEmail() {
            var emailInput = document.getElementById('email');
            var emailValue = emailInput.value;
            if (!emailValue.includes('@')) {
                emailInput.style.borderColor = 'red';
            } else {
                emailInput.style.borderColor = 'green';
            }
        }

        function validatePhoneNumber() {
            var phoneNumberInput = document.getElementById('phone_number');
            var phoneNumberValue = phoneNumberInput.value;
            var phoneNumberRegex = /^\+62[0-9]{9,11}$/;
            if (!phoneNumberRegex.test(phoneNumberValue)) {
                phoneNumberInput.style.borderColor = 'red';
            } else {
                phoneNumberInput.style.borderColor = 'green';
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h1 class="text-center my-5">Create Contact</h1>
        <form action="{{ route('contacts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required oninput="validateEmail()">
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" id="phone_number" name="phone_number" placeholder="Enter your phone number (e.g. +6282190303750)" required oninput="validatePhoneNumber()">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" placeholder="Enter your address" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</body>
</html>
