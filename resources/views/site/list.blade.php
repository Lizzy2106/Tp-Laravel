@extends('layouts.template')
@section('content')

    <div class="ftco-blocks-cover-1">
      <div class="ftco-cover-1 overlay innerpage" style="background-image: url('images/hero_2.jpg')">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 text-center">
              <h1>Nos locations de voitures</h1>
              <p></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          @foreach($voitures as $voiture)

          <div class="col-lg-4 col-md-6 mb-4">
              <div class="item-1">
                <a href="#"><img src="{{ $voiture->image1 != null || !asset('storage/images/car/'.$voiture->image1) ? asset('storage/images/car/'.$voiture->image1) : asset('storage/images/site/default.jpg') }}" alt="Image" class="img-fluid"></a>
                <div class="item-1-contents">
                  <div class="text-center">
                  <h3><a href="#">{{$voiture->titre}}</a></h3>
                  <div class="rating">
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                  </div>
                  <div class="rent-price"><span>XOF {{$voiture->prix}}/</span>jour</div>
                  </div>
                  <ul class="specs">
                    @foreach($voiture->agrements as $agrement)
                    <li>
                      <span>{{ucfirst($agrement->titre)}}</span>
                      <span class="spec">{{$agrement->pivot->valeur}}</span>
                    </li>
                    @endforeach
                  </ul>
                  <div class="d-flex action">
                    <a class="ml-auto btn btn-primary" id="{{$voiture->id}}" href="{{ route('voiture.show', $voiture->id) }}">Louer</a>
                  </div>
                </div>
              </div>
          </div>

          @endforeach


          <div class="col-12">
            <span class="p-3">1</span>
            <a href="#" class="p-3">2</a>
            <a href="#" class="p-3">3</a>
            <a href="#" class="p-3">4</a>
          </div>
        </div>
      </div>
    </div>
    @endsection
