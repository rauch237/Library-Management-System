<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Library Management</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-brand">Library</div>
        <ul class="nav-menu">
            <li><a href="#">Home</a></li>
            <li class="dropdown">
                <a href="#">Categories</a>
                <ul class="dropdown-menu">
                    <li><a href="#">Fiction</a></li>
                    <li><a href="#">Non-Fiction</a></li>
                    <li><a href="#">Science</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#">Authors</a>
                <ul class="dropdown-menu">
                    <li><a href="#">Author 1</a></li>
                    <li><a href="#">Author 2</a></li>
                </ul>
            </li>
            <li>
                <input type="text" placeholder="Search books...">
                <button class="search-btn">Search</button>
            </li>
            <li><button class="btn" onclick="showLogin()">Login</button></li>
            <li><button class="btn" onclick="showRegister()">Register</button></li>
        </ul>
    </nav>

    <!-- Slider -->
    <div class="slider">
        <div class="slides">
            <div class="slide">Best Seller 1</div>
            <div class="slide">Best Seller 2</div>
            <div class="slide">Best Seller 3</div>
        </div>
    </div>

    <!-- Books Section -->
    <div class="books-section">
        <div class="book-card">
            <img src="book1.jpg" alt="Book 1">
            <h3>Book Title 1</h3>
            <p>Author 1</p>
        </div>
        <div class="book-card">
            <img src="book2.jpg" alt="Book 2">
            <h3>Book Title 2</h3>
            <p>Author 2</p>
        </div>
        <div class="book-card">
            <img src="book3.jpg" alt="Book 3">
            <h3>Book Title 3</h3>
            <p>Author 3</p>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>Follow Us On</p>
        <div class="social-icons">
            <a href="https://facebook.com"><i class="fab fa-facebook"></i></a>
            <a href="https://instagram.com"><i class="fab fa-instagram"></i></a>
            <a href="https://twitter.com"><i class="fab fa-twitter"></i></a>
        </div>
    </footer>

    <!-- Modals for Login and Register -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeLogin()">&times;</span>
            <h2>Login</h2>
            <form action="{{ route('signin') }}" method="POST">
                @csrf
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                
                <button type="submit">Login</button>
                <a href="{{ route('reset') }}">Forgot Password?</a>
            </form>
            
        </div>
    </div>

    <div id="registerModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeRegister()">&times;</span>
            <h2>Register</h2>
            <form action="{{ route('registeration') }}" method="POST">
                @csrf
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required value="{{ old('name') }}">
                @error('name')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
    
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required value="{{ old('email') }}">
                @error('email')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
    
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <div style="color:red;">{{ $message }}</div>
                @enderror

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required value="{{ old('address') }}">
                @error('address')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
    
                <label for="gender">Gender (Optional):</label>
                <input type="text" name="gender" value="{{ old('gender') }}">
    
                <label for="phone">Phone Number:</label>
                <input type="text" name="phone" required value="{{ old('phone') }}">
                @error('phone')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
    
                <label>
                    <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                </label>
    
                <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
                <button type="submit">Register</button>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if ($errors->any())
                // If errors exist, show the register modal
                document.getElementById('registerModal').style.display = 'flex';
            @endif
        });
    </script>
    <script src="script.js"></script>
</body>
</html>
