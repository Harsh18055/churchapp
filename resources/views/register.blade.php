<!DOCTYPE html>
<html lang="en">
<head>
  <title>Church App</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
@if(session('success'))
<div class="alert alert-success">
   {{ session('success') }}
</div>
@endif
<div class="container mt-3">
  <h2>User Register</h2>
 <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 mt-3">
      <label>Images</label>
      <input type="file" class="form-control" placeholder="Enter Images" name="image">
    </div>
    <div class="mb-3 mt-3">
      <label>Name</label>
      <input type="text" class="form-control"  placeholder="Enter Name" name="name">
    </div>
    <div class="mb-3">
      <label>Phone</label>
      <input type="tel" class="form-control"  placeholder="Enter Phone" name="phone">
    </div>
    <div class="mb-3">
      <label>Address</label>
       <textarea class="form-control"  rows="3" placeholder="Enter Address" name="address"></textarea>
    </div>
   <div class="mb-3">
      <label>About</label>
       <textarea class="form-control"  rows="3" placeholder="Enter About" name="about"></textarea>
    </div>
    <div class="mb-3 mt-3">
      <label >Inters</label>
      <input type="text" class="form-control" placeholder="Enter Inters" name="inters">
    </div>
     <div class="mb-3 mt-3">
      <label >Church</label>
      <input type="text" class="form-control" placeholder="Enter Church" name="church">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
