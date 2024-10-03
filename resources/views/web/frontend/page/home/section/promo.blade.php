<section style="background-color: #FAFAFA;">
  <div class="text-center container py-3">
    <h2 class="mt-4 mb-5"><strong>LATEST DEALS!</strong></h2>

    <div class="row mt-12">
      <div class="col-lg-4 col-md-12 mb-4">
        <div class="card">
          <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
            data-mdb-ripple-color="light">
            <img src="{{ asset('images/background/home/minivan.jpg')}}"
              class="w-100" />
            <a href="#!">
              <div class="mask">
                <div class="d-flex justify-content-start align-items-end h-100">
                  <h5><span class="badge bg-primary ms-2">{{__("New and High maintenance!")}}</span></h5>
                </div>
              </div>
              <div class="hover-overlay">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                <img src="{{ asset('images/background/home/minivan-interior.jpg')}}" class="w-100"/>
            </div>
              </div>
            </a>
          </div>
          <div class="card-body">
              <h4 class="card-title mb-3">{{__("Family-size package")}}</h4>
              <p>{{ __("Travel across Cambodia with your family members of 6 with comfortable seats, and 
                trustworthy driver. This is a trail offer for October of 2024 ONLY!") }}
              </p>
            <button class="btn btn-primary family-size-btn">{{__("Get this offer now!")}}</button>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card">
          <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
            data-mdb-ripple-color="light">
            <img src="{{ asset('images/background/home/bus-storage.jpg')}}"
              class="w-100" />
            <a href="#!">
              <div class="mask">
                <div class="d-flex justify-content-start align-items-end h-100">
                  <h5><span class="badge bg-success ms-2">{{__("Sufficient Storage")}}</span></h5>
                </div>
              </div>
              <div class="hover-overlay">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                <img src="{{ asset('images/background/home/minivan-storage.jpg')}}" class="w-100" />
            </div>
              </div>
            </a>
          </div>
          <div class="card-body">
              <h4 class="card-title mb-3">{{__("Neatly packed and spacious")}}</h4>
              <p>{{__("Put all your trust into our care for your luggage as you travel at ease to your destination. We don't ruffle your luggage or provide an unsanitized space.")}}
              </p>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card">
          <div class="bg-image hover-zoom ripple" data-mdb-ripple-color="light">
            <img src="{{ asset('images/background/home/overnight-bus.png')}}"
              class="w-100" />
            <a href="#">
              <div class="mask">
                <div class="d-flex justify-content-start align-items-end h-100">
                  <h5><span class="badge bg-danger ms-2">{{__("Midnight with us!")}}</span></h5>
                </div>
              </div>
              <div class="hover-overlay">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                <img src="{{ asset('images/background/home/overnight-bus-interior.jpg')}}" class="w-100"/></div>
              </div>
            </a>
          </div>
          <div class="card-body">
              <h4 class="card-title mb-3">{{__("Spend a full night")}}</h4>
              <p>{{__("This is where you will be spending your night if you decide to travel to your destination during sleeping hours.")}}
              </p>
            <button class="btn btn-danger midnight-bus-btn">
              {{__("Get a Midnight bus ticket!")}}
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>