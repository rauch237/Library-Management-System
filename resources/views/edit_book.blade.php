<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Book</title>
  <style>
    /* General Body Styling */
body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  margin: 0;
}

/* Container Styling */
.form-container {
  background-color: #fff;
  padding: 25px;
  border-radius: 8px;
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
  max-width: 400px;
  width: 90%;
}

.form-container h2 {
  text-align: center;
  color: #333;
  margin-bottom: 20px;
  font-size: 1.5em;
}

/* Form Group Styling */
.form-group {
  margin-bottom: 15px;
}

.form-group label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
  color: #555;
}

.form-group input[type="text"],
.form-group select,
.form-group textarea,
.form-group input[type="file"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 4px;
  font-size: 1em;
  background-color: #fafafa;
}

.form-group input[type="file"] {
  padding: 5px;
}

.form-group textarea {
  resize: vertical;
}

/* Button Styling */
.form-group button {
  width: 100%;
  padding: 12px;
  background-color: #28a745;
  color: white;
  border: none;
  border-radius: 4px;
  font-size: 1em;
  cursor: pointer;
  transition: background-color 0.3s;
}

.form-group button:hover {
  background-color: #218838;
}

/* Responsive Styling */
@media (max-width: 768px) {
  .form-container {
    width: 90%;
  }

  .form-container h2 {
    font-size: 1.3em;
  }

  .form-group button {
    font-size: 0.9em;
  }
}

  </style>
</head>
<body>
    @if (session('success'))
    <div style="color: green; margin-bottom: 10px;">
        {{ session('success') }}
    </div>
@endif
<div class="form-container">
  <h2>Edit Book</h2>
  <form action="{{ route('book.update', $book->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="title">Book Title</label>
      <input type="text" id="title" name="title" value="{{ $book->title }}" required>
    </div>
    <div class="form-group">
      <label for="author">Author</label>
      <input type="text" id="author" name="author" value="{{ $book->author }}" required>
    </div>
    <div class="form-group">
      <label for="category">Category</label>
      <select id="genre" name="category_id" required>
        <option value="">Select Category</option>
        <option value="romance" {{ $book->category_id == 1 ? 'selected' : '' }}>Romance</option>
        <option value="Horror" {{ $book->category_id == 2 ? 'selected' : '' }}>Horror</option>
        <option value="Tragedy" {{ $book->category_id == 3 ? 'selected' : '' }}>Tragedy</option>
        <option value="Fantasy" {{ $book->category_id == 4 ? 'selected' : '' }}>Fantasy</option>
        <option value="History" {{ $book->category_id == 5 ? 'selected' : '' }}>History</option>
        <option value="Science" {{ $book->category_id == 6 ? 'selected' : '' }}>Science</option>
        <option value="Adventure" {{ $book->category_id == 1 ? 'selected' : '' }}>Adventure</option>
        <option value="Comedy" {{ $book->category_id == 1 ? 'selected' : '' }}>Comedy</option>

        {{-- <option value="romance" {{ $book->category == 'romance' ? 'selected' : '' }}>Romance</option>
        <option value="horror" {{ $book->category == 'horror' ? 'selected' : '' }}>Horror</option>
        <option value="tragedy" {{ $book->category == 'tragedy' ? 'selected' : '' }}>Tragedy</option>
        <option value="fantasy" {{ $book->category == 'fantasy' ? 'selected' : '' }}>Fantasy</option>
        <option value="history" {{ $book->category == 'history' ? 'selected' : '' }}>History</option>
        <option value="adventure" {{ $book->category == 'adventure' ? 'selected' : '' }}>Adventure</option>
        <option value="comedy" {{ $book->category == 'comedy' ? 'selected' : '' }}>Comedy</option>
        <option value="science" {{ $book->category == 'science' ? 'selected' : '' }}>Science</option> --}}
      </select>
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea id="description" name="description" rows="4" required>{{ $book->description }}</textarea>
    </div>
    <div class="form-group">
      <label for="cover">Cover Image (optional)</label>
      <input type="file" id="cover" name="cover" accept="image/*">
    </div>
    <div class="form-group">
      <button type="submit">Save Changes</button>
    </div>
  </form>
</div>

</body>
</html>
