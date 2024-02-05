@extends('admin.dashboard')

@section('content')
<div class="container">
    <h2 class="main-title">Détail sur l'acte</h2>
    <div class="row stat-cards">
        <form action="{{ route('actes.show', ['id' => $acte->id]) }}" method="POST">
            @csrf
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Id:</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" name="id_acte" id="id_acte" placeholder="" value="{{ $acte->id }}" readonly>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Type:</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" name="type_acte" id="type_acte" placeholder="" value="{{ $acte->type_acte }}" readonly>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Description:</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" name="desc_acte" id="desc_acte" placeholder="" value="{{ $acte->description }}" readonly>
              </div>
            </div>
            <div class="row">
              <p class="col-lg-1"></p>
              <a style="padding:10px; background-color: #f7b200 ! important;" class="col-lg-5 popup" href="{{route('actes.update')}}" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <h6 style="font-weight:bold">Modifier l'Acte</h6>
              </a>
            </div>
        </form>
    </div>
</div>
@endsection