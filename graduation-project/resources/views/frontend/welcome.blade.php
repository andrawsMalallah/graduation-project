@extends('layouts.app')

@section('content')
<style>
    @import url("https://fonts.googleapis.com/css2?family=Baloo+2&display=swap");
/* This pen */
 .dark {
	 background: #110f16;
}
 .light {
	 background: #f3f5f7;
}
 a, a:hover {
	 text-decoration: none;
	 transition: color 0.3s ease-in-out;
}
 #pageHeaderTitle {
	 margin: 2rem 0;
	 text-transform: uppercase;
	 text-align: center;
	 font-size: 1.9rem;
}
/* Cards */
 .postcard {
	 flex-wrap: wrap;
	 display: flex;
	 box-shadow: 0 4px 21px -12px rgba(0, 0, 0, 0.66);
	 border-radius: 10px;
	 margin: 0 0 2rem 0;
	 overflow: hidden;
	 position: relative;
	 color: #fff;
}
 .postcard.dark {
	 background-color: #18151f;
}
 .postcard.light {
	 background-color: #e1e5ea;
}
 .postcard .t-dark {
	 color: #18151f;
}
 .postcard a {
	 color: inherit;
}
 .postcard h1, .postcard .h1 {
	 margin-bottom: 0.5rem;
	 font-weight: 500;
	 line-height: 1.2;
}
 .postcard .small {
	 font-size: 80%;
}
 .postcard .postcard__title {
	 font-size: 1.75rem;
}
 .postcard .postcard__img {
	 max-height: 180px;
	 width: 100%;
	 object-fit: cover;
	 position: relative;
}
 .postcard .postcard__img_link {
	 display: contents;
}
 .postcard .postcard__bar {
	 width: 50px;
	 height: 10px;
	 margin: 10px 0;
	 border-radius: 5px;
	 background-color: #424242;
	 transition: width 0.2s ease;
}
 .postcard .postcard__text {
	 padding: 1.5rem;
	 position: relative;
	 display: flex;
	 flex-direction: column;
}
 .postcard .postcard__preview-txt {
	 overflow: hidden;
	 text-overflow: ellipsis;
	 text-align: justify;
	 height: 100%;
}
 .postcard .postcard__tagbox {
	 display: flex;
	 flex-flow: row wrap;
	 font-size: 14px;
	 margin: 20px 0 0 0;
	 padding: 0;
	 justify-content: center;
}
 .postcard .postcard__tagbox .tag__item {
	 display: inline-block;
	 background: rgba(83, 83, 83, 0.4);
	 border-radius: 3px;
	 padding: 2.5px 10px;
	 margin: 0 5px 5px 0;
	 cursor: default;
	 user-select: none;
	 transition: background-color 0.3s;
}
 .postcard .postcard__tagbox .tag__item:hover {
	 background: rgba(83, 83, 83, 0.8);
}
 .postcard:before {
	 content: "";
	 position: absolute;
	 top: 0;
	 right: 0;
	 bottom: 0;
	 left: 0;
	 background-image: linear-gradient(-70deg, #424242, transparent 50%);
	 opacity: 1;
	 border-radius: 10px;
}
 .postcard:hover .postcard__bar {
	 width: 100px;
}
 @media screen and (min-width: 769px) {
	 .postcard {
		 flex-wrap: inherit;
	}
	 .postcard .postcard__title {
		 font-size: 2rem;
	}
	 .postcard .postcard__tagbox {
		 justify-content: start;
	}
	 .postcard .postcard__img {
		 max-width: 300px;
		 max-height: 100%;
		 transition: transform 0.3s ease;
	}
	 .postcard .postcard__text {
		 padding: 3rem;
		 width: 100%;
	}
	 .postcard .media.postcard__text:before {
		 content: "";
		 position: absolute;
		 display: block;
		 background: #18151f;
		 top: -20%;
		 height: 130%;
		 width: 55px;
	}
	 .postcard:hover .postcard__img {
		 transform: scale(1.1);
	}
	 .postcard:nth-child(2n+1) {
		 flex-direction: row;
	}
	 .postcard:nth-child(2n+0) {
		 flex-direction: row-reverse;
	}
	 .postcard:nth-child(2n+1) .postcard__text::before {
		 left: -12px !important;
		 transform: rotate(4deg);
	}
	 .postcard:nth-child(2n+0) .postcard__text::before {
		 right: -12px !important;
		 transform: rotate(-4deg);
	}
}
 @media screen and (min-width: 1024px) {
	 .postcard__text {
		 padding: 2rem 3.5rem;
	}
	 .postcard__text:before {
		 content: "";
		 position: absolute;
		 display: block;
		 top: -20%;
		 height: 130%;
		 width: 55px;
	}
	 .postcard.dark .postcard__text:before {
		 background: #18151f;
	}
	 .postcard.light .postcard__text:before {
		 background: #e1e5ea;
	}
}
/* COLORS */
 .postcard .postcard__tagbox .green.play:hover {
	 background: #79dd09;
	 color: black;
}
 .green .postcard__title:hover {
	 color: #79dd09;
}
 .green .postcard__bar {
	 background-color: #79dd09;
}
 .green::before {
	 background-image: linear-gradient(-30deg, rgba(121, 221, 9, 0.1), transparent 50%);
}
 .green:nth-child(2n)::before {
	 background-image: linear-gradient(30deg, rgba(121, 221, 9, 0.1), transparent 50%);
}
 .postcard .postcard__tagbox .blue.play:hover {
	 background: #0076bd;
}
 .blue .postcard__title:hover {
	 color: #0076bd;
}
 .blue .postcard__bar {
	 background-color: #0076bd;
}
 .blue::before {
	 background-image: linear-gradient(-30deg, rgba(0, 118, 189, 0.1), transparent 50%);
}
 .blue:nth-child(2n)::before {
	 background-image: linear-gradient(30deg, rgba(0, 118, 189, 0.1), transparent 50%);
}
 .postcard .postcard__tagbox .red.play:hover {
	 background: #bd150b;
}
 .red .postcard__title:hover {
	 color: #bd150b;
}
 .red .postcard__bar {
	 background-color: #bd150b;
}
 .red::before {
	 background-image: linear-gradient(-30deg, rgba(189, 21, 11, 0.1), transparent 50%);
}
 .red:nth-child(2n)::before {
	 background-image: linear-gradient(30deg, rgba(189, 21, 11, 0.1), transparent 50%);
}
 .postcard .postcard__tagbox .yellow.play:hover {
	 background: #bdbb49;
	 color: black;
}
 .yellow .postcard__title:hover {
	 color: #bdbb49;
}
 .yellow .postcard__bar {
	 background-color: #bdbb49;
}
 .yellow::before {
	 background-image: linear-gradient(-30deg, rgba(189, 187, 73, 0.1), transparent 50%);
}
 .yellow:nth-child(2n)::before {
	 background-image: linear-gradient(30deg, rgba(189, 187, 73, 0.1), transparent 50%);
}
 @media screen and (min-width: 769px) {
	 .green::before {
		 background-image: linear-gradient(-80deg, rgba(121, 221, 9, 0.1), transparent 50%);
	}
	 .green:nth-child(2n)::before {
		 background-image: linear-gradient(80deg, rgba(121, 221, 9, 0.1), transparent 50%);
	}
	 .blue::before {
		 background-image: linear-gradient(-80deg, rgba(0, 118, 189, 0.1), transparent 50%);
	}
	 .blue:nth-child(2n)::before {
		 background-image: linear-gradient(80deg, rgba(0, 118, 189, 0.1), transparent 50%);
	}
	 .red::before {
		 background-image: linear-gradient(-80deg, rgba(189, 21, 11, 0.1), transparent 50%);
	}
	 .red:nth-child(2n)::before {
		 background-image: linear-gradient(80deg, rgba(189, 21, 11, 0.1), transparent 50%);
	}
	 .yellow::before {
		 background-image: linear-gradient(-80deg, rgba(189, 187, 73, 0.1), transparent 50%);
	}
	 .yellow:nth-child(2n)::before {
		 background-image: linear-gradient(80deg, rgba(189, 187, 73, 0.1), transparent 50%);
	}
}
 
    </style>
<div id="carousel" class="carousel container slide mb-6" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach ($sliders as $index => $slider)
        <li data-target="#carousel" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach ($sliders as $index => $slider)

        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
            <img src="{{ asset($slider->image) }}" class="d-block carousel-img w-100" alt="...">
            <div class="carousel-caption d-md-block">
                <a href="{{ route('post.show', $slider->title) }}" target="_blank"
                    class="text-white text-decoration-none">
                    <h4 class="carousel-title">{{ $slider->title }}</h4>
                </a>
            </div>
        </div>

        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-target="#carousel" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carousel" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </button>
</div>

<section class="py-4">
    <div class="container">
    <div class="h1 text-center text-dark" id="pageHeaderTitle">SCIENTIFIC DEPARTMENTS</div>
        <div class="underline"></div>

        <div class="my-4 d-flex flex-wrap">
            @foreach ($departments as $department)
<<<<<<< HEAD
            <a style="border-radius: 10px" class="text-dark text-decoration-none mx-auto" href="{{ route('department.show', $department->name) }}">
=======
            <a style="border-radius: 10px" class=" text-dark text-decoration-none mx-auto " href="{{ route('department.show', $department->name) }}">
>>>>>>> 7c11034f9384bdabbbd91381972365517795efbb
                <div style="border-radius: 10px" class="card border-0 m-4 department shadow">
                    <img style="border-radius: 10px" src="{{ asset($department->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title text-capitalize" style="font-size: 1rem">{{ $department->name }}</h6>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<section class="light">
	<div class="container py-2">
		<div class="h1 text-center text-dark" id="pageHeaderTitle">CENTERS & UNITS</div><div class="underline mb-2"></div>
        @foreach ($units as $unit)
		<article class="my-4 postcard light blue">
			<a style="border-radius: 10px" class="postcard__img_link" href="{{ route('department.show', $unit->name) }}">
				<!-- <img class="postcard__img" src="https://picsum.photos/100{{rand(1,9)}}/100{{rand(1,9)}}" alt="Image Title" />-->
				{{-- <img class="postcard__img" src="{{ asset($unit->image) }}" alt="Image Title" /> --}}

			</a>
			<div class="postcard__text t-dark">
				<h1 class="postcard__title blue"><a href="{{ route('department.show', $unit->name) }}">{{ $unit->name }}</a></h1>
				<div class="postcard__subtitle small">
				</div>
				<div class="postcard__bar"></div>
				<div class="postcard__preview-txt">{{ strip_tags(\Str::limit($unit->description, 280)) }}</div>
				<ul class="postcard__tagbox">
					<li class="tag__item play blue">
						<a href="{{ route('department.show', $unit->name) }}"><i style="text-align:center;" class="fas fa-play mr-2"></i>More Information ...</a>
					</li>
				</ul>
			</div>
		</article>
        @endforeach
	</div>
</section>
<section class="container py-5">
    <div class="map">
        <div class="h1 text-center text-dark" id="pageHeaderTitle">Geographical Location</div>
        <div class="underline mb-2"></div>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2785.3185212325916!2d44.39575484242206!3d33.25803475777558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1559d5544036cbf5%3A0x31fd853b044c0355!2sCollege%20of%20Electrical%20and%20Electronic%20Technology!5e0!3m2!1sen!2siq!4v1636021461903!5m2!1sen!2siq"
            class="my-4 w-100 shadow rounded" width="600" height="450" style="border:0;" allowfullscreen=""
            loading="lazy"></iframe>
    </div>
</section>


@endsection
