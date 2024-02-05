@extends('admin.dashboard')

@section('content')
<div class="container">
    <h2 class="main-title">Détails sur la demande</h2>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <h2>Détails de la demande</h2>
                            <p>Matriule:{{$demande->matricule}}</p>
                            <p></p>
                            <p></p>
                            <p></p>

                            <form action="{{route('demande.validate',['id'=>$demande->id])}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success">Valider</button>
                            </form>

                            <form action="{{route('demande.reject',['id'=>$demande->id])}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger"></button>
                            </form>
                        </div> 
                    </div>
                </div>
            </div>
        </section>
</div>
@endsection