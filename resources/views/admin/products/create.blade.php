@extends("admin.layouts.template")
@section('contenu')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Ajouter nouveau produits</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="quickForm" method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
        <div class="form-group">
          <label for="name">Nom produit</label>
          <input type="text" name="name" value="{{ old('name')}}" class="form-control  @error("name") border-danger @enderror" id="name" placeholder="Enter le nom du produit">
        @error("name")
        <div class="text text-danger">{{$message}}</div>
        @enderror
        </div>


        <div class="form-group">
          <label for="description">Description produit</label>
          <textarea type="text" name="description"  class="form-control  @error("description") border-danger @enderror" id="description" placeholder="Enter la discription de produit">{{ old('discription')}}</textarea>
        @error("description")
        <div class="text text-danger">{{$message}}</div>
        @enderror
        </div>


        <div class="form-group">
          <label for="photo1">Photo1 de produit</label>
          <input type="file" name="photo1"  class="form-control  @error("photo1") border-danger @enderror" id="photo1"  >
        @error("photo1")
        <div class="text text-danger">{{$message}}</div>
        @enderror
        </div>




        <div class="form-group">
            <label for="photo2">Photo1 de produit</label>
            <input type="file" name="photo2"  class="form-control  @error("photo2") border-danger @enderror" id="photo2"  >
          @error("photo2")
          <div class="text text-danger">{{$message}}</div>
          @enderror
        </div>



        <div class="form-group">
          <label for="price">Prix produit</label>
          <input type="number" name="price" value="{{ old('price')}}" class="form-control  @error("price") border-danger @enderror" id="price" placeholder="Enter le prix du produit">
        @error("price")
        <div class="text text-danger">{{$message}}</div>
        @enderror
        </div>


        <div class="form-group">
            <label for="category_id">Categorie produit</label>
            <select name="category_id" class="form-control  @error("category_id") border-danger @enderror" id="category_id" >
            <option value="">---choisir---</option>
            @foreach ($categories as $category )
            <option value="{{$category->id}}">{{$category->name}}</option>

            @endforeach
            </select>
        @error("category_id")
        <div class="text text-danger">{{$message}}</div>
        @enderror
        </div>


      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Ajouter</button>
        <button type="reset" class="btn btn-secondary">Annuler</button>
      </div>
    </form>
  </div>
@endsection
