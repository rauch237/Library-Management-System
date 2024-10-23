<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <link rel="stylesheet" href="dash.css">
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="logo">Customer Dashboard</div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">Log Out</button>
        </form>
    </nav>

    <!-- Main Dashboard Content -->
    <div class="dashboard">
        <h1>Welcome, Customer</h1>
        <div class="stats">
            <div class="card">
                <h2>Orders</h2>
                <p>25</p>
            </div>
            <div class="card">
                <h2>Account Balance</h2>
                <p>$500.00</p>
            </div>
            <div class="card">
                <h2>Messages</h2>
                <p>5</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Your Company. All Rights Reserved.</p>
    </footer>

    
</body>
</html>

