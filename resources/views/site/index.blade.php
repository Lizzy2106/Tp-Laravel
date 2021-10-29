@extends('layouts.template')
@section('content')

    <div class="ftco-blocks-cover-1">
      <div class="ftco-cover-1 overlay" style="background-image: url('images/hero_1.jpg')">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-5">
              <div class="feature-car-rent-box-1">
                <h3>{{$last->titre}}</h3>
                <ul class="list-unstyled">
                  @foreach($last->agrements as $agrement)
                  <li>
                    <span>{{ucfirst($agrement->titre)}}</span>
                    <span class="spec">{{$agrement->pivot->valeur}}</span>
                  </li>
                  @endforeach
                </ul>
                <div class="d-flex align-items-center bg-light p-3">
                  <span>XOF {{$last->prix}}/jour</span>
                  <a class="ml-auto btn btn-primary" id="{{$last->id}}" href="{{ route('voiture.show', $last->id) }}">Louer</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    

    

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <h3>Nos offres</h3>
            <p class="mb-4">Découvrez nos offres. N'hésitez pas à regarder. Le coup d'oeil est gratuit ,)</p>
            <p>
              <a href="#" class="btn btn-primary custom-prev">Précédent</a>
              <span class="mx-2">/</span>
              <a href="#" class="btn btn-primary custom-next">Suivant</a>
            </p>
          </div>
          <div class="col-lg-9">
            <div class="nonloop-block-13 owl-carousel">
              @foreach($voitures as $voiture)
              
              <div class="item-1">
                <a href="#"><img src="images/img_1.jpg" alt="Image" class="img-fluid"></a>
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
              @endforeach
            </div>
            
          </div>
        </div>
      </div>
    </div>
@endsection