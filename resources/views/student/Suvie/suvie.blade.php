@extends('layouts.student')

@section('title',"Suivre votre demande")
    
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <p class="mb-0">Your business dashboard template</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Components</a></li>
                </ol>
            </div>
        </div>
       <p class="text-center"> Veuillez Entrez le code OPT que vous reçut dans votre mail *</p>

            

       <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@yield('title')</h4>
                </div>
                <div class="card-body">
                    <form  action=" {{ route('student.suivie.store') }}" method="POST" id="step-form-horizontal" class="step-form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <h4>Entre Le code a six (06) chiffre que vous avez recus</h4>
                            <section>
                                <div class="row">
                                    

                                    <div class="col-lg-12 mb-4">
                                        <div class="form-group">
                                            <label class="text-label">OTP CODE*</label>
                                            <div class="input-group">
                                                <input type="text" name="otp" class="form-control  @error('otp') is-invalid  @enderror" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="Entrez le code à six chiffre" >
                                                @error('otp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>  
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success">Track</button>
                                    </div>
                                  
                                </div>
                            </section>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        
    
    </div>


        
    </div>
</div>
@endsection