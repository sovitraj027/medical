
@extends('layouts.admin')


@section('content')
        <div style="margin-left: 422px; padding: 53px; margin-top: 105px">
            <h1> Upload the Medicine File. </h1>
              <form action="{{route('export')}}" method="GET" enctype="multipart/form-data">
                <button class="btn btn-primary" > Download Format </button>
              </form>
           
            <br>
            <br>

            <form action="{{route('import')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="file" id="myFile" name="import_file">
              <input type="submit" class="btn btn-primary">
            </form>

            <br>
            <br>
            <ul>
              <li>Please Uplaod the Proper Format.</li>
              <li>The format will be in .xlsx or extension.</li>
              <li>The uploaded file will be directly saved to the view medicine section.</li>
            </ul>           
        </div>

        










    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    @stop