<section id="speakers">
    @if ($blogs)
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <h2>Our Activities</h2>
        <p>Here are some of our activites</p>
      </div>

      <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6">
                    <a href="/detail-blog/{{$blog->id}}">
                <div class="speaker" data-aos="fade-up" data-aos-delay="100">
                    <img src="image/speakers/1.jpg" alt="{{$blog["title"]}}" class="img-fluid">
                    <div class="details">
                    <h3>{{$blog["title"]}}</h3>
                    {{-- <p>deskripsi artikel</p> --}}
                    <div class="social">
                        <a href=""><i class="bi bi-twitter"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                    </div>
                </div>
                </a>
                </div>
            @endforeach
        </div>
    </div>
    @endif

  </section>
