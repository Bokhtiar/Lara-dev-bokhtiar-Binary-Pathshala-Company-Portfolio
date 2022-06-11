@extends('layouts.user.app')
@section('title', 'Home')
@section('user_content')

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container">

      <div class="section-title">
        <h2>About</h2>
        <h3>{{ $about->title }}</span></h3>
        <p>{{ $about->short_des }}.</p>
      </div>

      <div class="row content">
        <div class="col-lg-6">
          {!! $about->left_des !!}.
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0">
          <p>
           {!! $about->right_des !!}.
          </p>
          <a href="#" class="btn-learn-more">Learn More</a>
        </div>
      </div>

    </div>
  </section><!-- End About Section -->


  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container">

      <div class="section-title">
        <h2>Services</h2>
        <h3>We do offer awesome <span>Services</span></h3>
        <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
      </div>

      <div class="row">
          @forelse ($services as $item)
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <div class="icon">
                @php
                    $image = json_decode($item->image);
                    @endphp
                    @if (empty($image))
                        <td>Image Not Selected</td>
                    @else
                        <img class="zoom" src="{{ asset($image[0]) }}" height="50px" width="50px" alt="">
                    @endif
                </div>
              <h4 class="title"><a href="#pricing">{{ $item->name }}</a></h4>
              <p class="description text-light">{!! $item->body !!}</p>
            </div>
          </div>
          @empty
          <p>No Available Service</p>
          @endforelse
      </div>
    </div>
  </section><!-- End Services Section -->

  {{-- <!-- ======= Features Section ======= -->
  <section id="features" class="features">
    <div class="container">

      <div class="row">
        <div class="col-lg-3 col-md-4 col-6 col-6">
          <div class="icon-box">
            <i class="ri-store-line" style="color: #ffbb2c;"></i>
            <h3><a href="">Lorem Ipsum</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-6">
          <div class="icon-box">
            <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
            <h3><a href="">Dolor Sitema</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-6 mt-4 mt-md-0">
          <div class="icon-box">
            <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
            <h3><a href="">Sed perspiciatis</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-6 mt-4 mt-lg-0">
          <div class="icon-box">
            <i class="ri-paint-brush-line" style="color: #e361ff;"></i>
            <h3><a href="">Magni Dolores</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-6 mt-4">
          <div class="icon-box">
            <i class="ri-database-2-line" style="color: #47aeff;"></i>
            <h3><a href="">Nemo Enim</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-6 mt-4">
          <div class="icon-box">
            <i class="ri-gradienter-line" style="color: #ffa76e;"></i>
            <h3><a href="">Eiusmod Tempor</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-6 mt-4">
          <div class="icon-box">
            <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
            <h3><a href="">Midela Teren</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-6 mt-4">
          <div class="icon-box">
            <i class="ri-price-tag-2-line" style="color: #4233ff;"></i>
            <h3><a href="">Pira Neve</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-6 mt-4">
          <div class="icon-box">
            <i class="ri-anchor-line" style="color: #b2904f;"></i>
            <h3><a href="">Dirada Pack</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-6 mt-4">
          <div class="icon-box">
            <i class="ri-disc-line" style="color: #b20969;"></i>
            <h3><a href="">Moton Ideal</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-6 mt-4">
          <div class="icon-box">
            <i class="ri-base-station-line" style="color: #ff5828;"></i>
            <h3><a href="">Verdo Park</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-6 mt-4">
          <div class="icon-box">
            <i class="ri-fingerprint-line" style="color: #29cc61;"></i>
            <h3><a href="">Flavor Nivelanda</a></h3>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Features Section --> --}}

  <!-- ======= Cta Section ======= -->
  <section id="cta" class="cta">
    <div class="container">

      <div class="text-center">
        <h3>Call To Action</h3>
        <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <a class="cta-btn" href="tel:01638107361">Call To Action</a>
      </div>

    </div>
  </section><!-- End Cta Section -->


  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container">

      <div class="section-title">
        <h2>Portfolio</h2>
        <h3>Check our <span>Portfolio</span></h3>
        <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
      </div>

      <div class="row">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            @foreach ($services as $sv)
            <li data-filter=".{{$sv->name}}">{{ $sv->name }}</li>
            @endforeach
          </ul>
        </div>
      </div>

      <div class="row portfolio-container">

        @foreach ($portfolios as $pf)

        <div class="col-lg-4 col-md-6 portfolio-item {{$pf->service ? $pf->service->name : ''}}">
            @php
            $image = json_decode($pf->images);
            @endphp
            @if (empty($image))
                <td>Image Not Selected</td>
            @else
                <img class="img-fluid" src="{{ asset($image[0]) }}"  alt="">
            @endif

            <div class="portfolio-info">
              <h4>{{ $pf->title }}</h4>
              <a href="@route('portfolio.detail', $pf->portfolio_id)" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        @endforeach

      </div>

    </div>
  </section>

  <!-- End Portfolio Section -->


  <!-- End Portfolio Section -->
  <!-- ======= Pricing Section ======= -->
  <section id="pricing" class="pricing">
    <div class="container">

      <div class="section-title">
        <h2>Pricing</h2>
        <h3>Our Competing <span>Prices</span></h3>
        <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
      </div>

      <div class="row">

        @forelse ($prices as $price)
            <div class="col-lg-4 col-md-6 my-3">
                <div class="box recommended">
                <h3>{{ $price->title }}</h3>
                <h4><sup>TK</sup>{{ $price->price }}<span> / {{ $price->designation }}</span></h4>
                <ul>
                    <li>{{ $price->item1 }}</li>
                    <li>{{ $price->item2 }}</li>
                    <li>{{ $price->item3 }}</li>
                    <li>{{ $price->item4 }}</li>
                    <li>{{ $price->item5 }}</li>
                </ul>
                <div class="btn-wrap">
                    <a href="@route('user.cart.store', $price->price_id)" class="btn-buy">Buy Now</a>
                </div>
                </div>
            </div>
        @empty

        @endforelse



      </div>

    </div>
  </section><!-- End Pricing Section -->
  <!-- ======= F.A.Q Section ======= -->
  <section id="faq" class="faq">
    <div class="container">

      <div class="section-title">
        <h2>F.A.Q</h2>
        <h3>Frequently Asked <span>Questions</span></h3>
      </div>

      <ul class="faq-list">

        @forelse ($questions as $question)
        <li>
            <div data-bs-toggle="collapse" class="collapsed question" href="#faq{{ $question->question_id }}">{{ $question->question }}? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq{{ $question->question_id }}" class="collapse" data-bs-parent=".faq-list">
              <p>
                {!! $question->ans !!}.
              </p>
            </div>
          </li>
        @empty
          No Available F.A.Q
        @endforelse

      </ul>

    </div>
  </section><!-- End F.A.Q Section -->
  <!-- ======= Team Section ======= -->
  <section id="team" class="team">
    <div class="container">

      <div class="section-title">
        <h2>Team</h2>
        <h3>Our Hardworking <span>Team</span></h3>
        <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
      </div>

      <div class="row">
        @forelse ($teams as $team)
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch my-3">
            <div class="member">
              <div class="member-img">
                @php
                $image = json_decode($team->image);
                @endphp
                @if (empty($image))
                    <td>Image Not Selected</td>
                @else
                    <td><img class=" img-fluid" src="{{ asset($image[0]) }}" alt="">
                    </td>
                @endif

                <div class="social">
                    @isset($team->twitter)
                    <a href="{{ $team->twitter }}"><i class="bi bi-twitter"></i></a>
                    @endisset
                    @isset($team->fb)
                    <a href="{{ $team->fb }}"><i class="bi bi-facebook"></i></a>
                    @endisset
                    @isset($team->instagram)
                    <a href=""><i class="bi bi-instagram"></i></a>
                    @endisset
                    @isset($team->linkdin)
                    <a href=""><i class="bi bi-linkedin"></i></a>
                    @endisset
                </div>
              </div>
              <div class="member-info">
                <h4>{{ $team->name }}</h4>
                <span>{{ $team->designation }}</span>
              </div>
            </div>
          </div>
        @empty
          no Available
        @endforelse
      </div>

    </div>
  </section><!-- End Team Section -->


  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <h2>Contact</h2>
        <h3>Contact <span>Us</span></h3>
        <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
      </div>

      <div>
        <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="row mt-5">

        <div class="col-lg-4">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>{{ $webSetting->location }}</p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>{{ $webSetting->email }}</p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <p>{{ $webSetting->phone }}</p>
            </div>

          </div>

        </div>

        <div class="col-lg-8 mt-5 mt-lg-0">

          <form action="{{ url('contact/store') }}" method="post" >
            @csrf
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="body" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="text-center my-3"> <input type="submit" class="btn" value="Send Message" id=""
                style=" background: #e43c5c;
                        border: 0;
                        padding: 10px 28px;
                        color: #fff;
                        transition: 0.4s;
                        border-radius: 50px;"
                > </div>
          </form>

        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

@endsection
