@extends('website.layouts.main')
@section('content')
<section class="banner-div">
   <div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <h1>About Us</h1>
          <div class="text-center py-3">
          <span><a href="javascript:;">Home</a></span>
            <span><a href="{{route('user_about_us_page')}}">About Us</a></span>
          </div>
        </div>
    </div>
   </div>
    </section>
<section class="about_us_section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="img-div">
                    <img src="{{asset('assets/website/images/about_us-img-1.png')}}" class="form-control" alt="">
                </div>
            </div>
            <div class="col-md-6">
               <div class="about_us_content">
                    <h2 >What We Do</h2>
                    <p class="pb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
                </div>
               </div>
        </div>
    </div>
</section>

<section class="why_choose_us_section">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto pb-3">
                <div class="heading-content">
                <h1>Why Choose Us</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="why_choose_us_blog">
                    <div class="img-div">
                        <img src="{{asset('assets/website/images/abch-img-1.png')}}" class="form-control" alt="">
                    </div>
                    <h4>Heading Goes Here</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="why_choose_us_blog">
                    <div class="img-div">
                        <img src="{{asset('assets/website/images/abch-img-1.png')}}" class="form-control" alt="">
                    </div>
                    <h4>Heading Goes Here</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="why_choose_us_blog">
                    <div class="img-div">
                        <img src="{{asset('assets/website/images/abch-img-1.png')}}" class="form-control" alt="">
                    </div>
                    <h4>Heading Goes Here</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                </div>
            </div>
        </div>
    </div>
</section>




<section class="faq-section">
    <div class="container">
    <div class="row">
            <div class="col-md-10 mx-auto pb-3">
                <div class="heading-content">
                <h1 class="pb-3">Frequently Asked Question</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                </div>
            </div>
        </div>
    <div class="row" id="accordion">
			
			<div class="col-md-6">
				<div class="faq-section-inner" >
				<div class="" id="headingOne">
				<h5 class="mb-0">
					<button class="btn btn-link  d-flex"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					<p><i class="fa-solid fa-chevron-down"></i> Lorem Ipsum is simply dummy has typesetting?</p>
					</button>
					<p>01</p>
				</h5>
				</div>

				<div id="collapseOne" class="collapse show " aria-labelledby="headingOne" data-parent="#accordion">
				<div class="card-body">
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
				</div>
			</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="faq-section-inner" >
				<div class="" id="headingTwo">
				<h5 class="mb-0">
					<button class="btn btn-link  d-flex"  data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
					<p><i class="fa-solid fa-chevron-down"></i> Lorem Ipsum is simply dummy has typesetting?</p>
					</button>
					<p>06</p>
				</h5>
				</div>

				<div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordion">
				<div class="card-body">
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
				</div>
			</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="faq-section-inner" >
				<div class="" id="headingThree">
				<h5 class="mb-0">
					<button class="btn btn-link  d-flex"  data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
					<p><i class="fa-solid fa-chevron-down"></i> Lorem Ipsum is simply dummy has typesetting?</p>
					</button>
					<p>02</p>
				</h5>
				</div>

				<div id="collapseThree" class="collapse " aria-labelledby="headingThree" data-parent="#accordion">
				<div class="card-body">
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
				</div>
			</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="faq-section-inner" >
				<div class="" id="headingFour">
				<h5 class="mb-0">
					<button class="btn btn-link  d-flex"  data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseOne">
					<p><i class="fa-solid fa-chevron-down"></i> Lorem Ipsum is simply dummy has typesetting?</p>
					</button>
					<p>07</p>
				</h5>
				</div>

				<div id="collapseFour" class="collapse " aria-labelledby="headingFour" data-parent="#accordion">
				<div class="card-body">
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
				</div>
			</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="faq-section-inner" >
				<div class="" id="headingFive">
				<h5 class="mb-0">
					<button class="btn btn-link  d-flex"  data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseOne">
					<p><i class="fa-solid fa-chevron-down"></i> Lorem Ipsum is simply dummy has typesetting?</p>
					</button>
					<p>03</p>
				</h5>
				</div>

				<div id="collapseFive" class="collapse " aria-labelledby="headingFive" data-parent="#accordion">
				<div class="card-body">
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
				</div>
			</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="faq-section-inner" >
				<div class="" id="headingEight">
				<h5 class="mb-0">
					<button class="btn btn-link  d-flex"  data-toggle="collapse" data-target="#collapseEight" aria-expanded="true" aria-controls="collapseOne">
					<p><i class="fa-solid fa-chevron-down"></i> Lorem Ipsum is simply dummy has typesetting?</p>
					</button>
					<p>08</p>
				</h5>
				</div>

				<div id="collapseEight" class="collapse " aria-labelledby="headingSix" data-parent="#accordion">
				<div class="card-body">
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
				</div>
			</div>
				</div>
			</div>
            <div class="col-md-6">
				<div class="faq-section-inner" >
				<div class="" id="headingNine">
				<h5 class="mb-0">
					<button class="btn btn-link  d-flex"  data-toggle="collapse" data-target="#collapseNine" aria-expanded="true" aria-controls="collapseOne">
					<p><i class="fa-solid fa-chevron-down"></i> Lorem Ipsum is simply dummy has typesetting?</p>
					</button>
					<p>04</p>
				</h5>
				</div>

				<div id="collapseNine" class="collapse " aria-labelledby="headingNine" data-parent="#accordion">
				<div class="card-body">
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
				</div>
			</div>
				</div>
			</div>
            <div class="col-md-6">
				<div class="faq-section-inner" >
				<div class="" id="headingFour">
				<h5 class="mb-0">
					<button class="btn btn-link  d-flex"  data-toggle="collapse" data-target="#collapseAbc" aria-expanded="true" aria-controls="collapseOne">
					<p><i class="fa-solid fa-chevron-down"></i> Lorem Ipsum is simply dummy has typesetting?</p>
					</button>
					<p>09</p>
				</h5>
				</div>

				<div id="collapseAbc" class="collapse " aria-labelledby="headingFour" data-parent="#accordion">
				<div class="card-body">
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
				</div>
			</div>
				</div>
			</div>
            <div class="col-md-6">
				<div class="faq-section-inner" >
				<div class="" id="headingSix">
				<h5 class="mb-0">
					<button class="btn btn-link  d-flex"  data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseOne">
					<p><i class="fa-solid fa-chevron-down"></i> Lorem Ipsum is simply dummy has typesetting?</p>
					</button>
					<p>05</p>
				</h5>
				</div>

				<div id="collapseSix" class="collapse " aria-labelledby="headingSix" data-parent="#accordion">
				<div class="card-body">
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
				</div>
			</div>
				</div>
			</div>
            <div class="col-md-6">
				<div class="faq-section-inner" >
				<div class="" id="headingSix">
				<h5 class="mb-0">
					<button class="btn btn-link  d-flex"  data-toggle="collapse" data-target="#collapseDef" aria-expanded="true" aria-controls="collapseOne">
					<p><i class="fa-solid fa-chevron-down"></i> Lorem Ipsum is simply dummy has typesetting?</p>
					</button>
					<p>10</p>
				</h5>
				</div>

				<div id="collapseDef" class="collapse " aria-labelledby="headingSix" data-parent="#accordion">
				<div class="card-body">
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
				</div>
			</div>
				</div>
			</div>

		</div>
    </div>
</section>
@endsection