@extends('layouts.template')
@section('content')
    <div class="ftco-blocks-cover-1">
      <div class="ftco-cover-1 innerpage overlay" style="background-image: url('{{ asset('storage/images/car/'.$voiture->image1)}}')">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 text-center">
              <span class="d-block mb-3 text-white" data-aos="fade-up">{{$voiture->created_at}} <span class="mx-2 text-primary">&bullet;</span> by {{$voiture->marque}}</span>
                <h1 class="mb-4" data-aos="fade-up" data-aos-delay="100">{{$voiture->titre}}</h1>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7 blog-content">
            <p class="lead">{{$voiture->description}}<p>


          </div>

            <!-- <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon fa fa-search"></span>
                  <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                </div>
              </form>
            </div> -->

          <div class="col-md-5 sidebar">
            <div class="sidebar-box">
              <div class="row align-items-center">
                <div class="col-lg-12">
                  <div class="feature-car-rent-box-1">
                    <form method="post" action="{{ route('location.store') }}">@csrf
                      <h1>Réserver</h1>
                      <input type="number" name="voiture_id" id="voiture_id" value="{{$voiture->id}}" style="display: none;">
                      @auth
                      <input type="number" name="user_id" id="user_id" value="{{ Auth::user()->id }}" style="display: none;">
                      @else
                      <input type="number" name="user_id" id="user_id" value="" style="display: none;">
                      @endauth
                      <ul class="list-unstyled">
                        <li>
                          <label for="from">Date de début</label>
                          <input  type="datetime-local" name="from" id="from" autocomplete="given-name"  value="{{old('from')}}" class="form-control px-6 @if($errors->has('from')) is-invalid @endif" placeholder="2017-06-01T08:30">
                        </li>

                        <li>
                          <label for="to">Date de fin</label>
                            <input  type="datetime-local" name="to" id="to" autocomplete="given-name"  value="{{old('to')}}" class="form-control px-6 @if($errors->has('to')) is-invalid @endif" placeholder="2017-06-01T08:30">
                          </div>
                        </li>
                      </ul>
                      <div class="d-flex align-items-center bg-light p-3">
                        <span>XOF {{$voiture->prix}}/jour</span>
                        <button type="submit" class="ml-auto btn btn-primary">Enregistrer</button>

                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="sidebar-box">
              <div class="categories">
                <h3>Catégories</h3>
                @foreach($voiture->agrements as $agrement)
                <li><a href="#">{{ucfirst($agrement->titre)}} <span>{{$agrement->pivot->valeur}}</span></a></li>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
