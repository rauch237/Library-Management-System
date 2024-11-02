<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload New Book</title>
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
    {{-- @if (session('success'))
    <div style="color: green; margin-bottom: 10px;">
        {{ session('success') }}
    </div>
    @endif --}}
<div class="form-container">
  <h2>Upload New Book</h2>
  
    @if (session('message'))
    <div style="color: green; margin-bottom: 10px;">
        {{ session('message') }}
    </div>
  @endif

  <!-- Error Messages -->
  @if ($errors->any())
      <div style="color: red; margin-bottom: 10px;">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
  <form action="{{ route('book.upload') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <input type="text" id="title" name="user_id" value='{{ auth()->id()}}'  required hidden>
    </div>
    <div class="form-group">
      <label for="title">Book Title</label>
      <input type="text" id="title" name="title" required>
    </div>
    <div class="form-group">
      <label for="author">Author</label>
      <input type="text" id="author" name="author" required>
    </div>
    <div class="form-group">
      <label for="pages">Pages</label>
      <input type="text" id="pages" name="pages" required>
    </div>
    <div class="form-group">
      <label for="category">Category</label>
      <select id="genre" name="category_id" required>
        <option value="">Select Genre</option>
        <option value="1">Romance</option>
        <option value="2">Horror</option>
        <option value="3">Adventure</option>
        <option value="4">History</option>
        <option value="5">Fantasy</option>
        <option value="6">Tragedy</option>
        <option value="7">Science</option>
      </select>
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea id="description" name="description" rows="4" required></textarea>
    </div>
    <div class="form-group">
      <label for="cover">Cover Image</label>
      <input type="file" id="cover" name="cover_image" accept="image/*" required>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <input type="text" name="status" required>
      </div>
    <div class="form-group">
      <button type="submit">Upload Book</button>
    </div>
  </form>
</div>

</body>
</html>
