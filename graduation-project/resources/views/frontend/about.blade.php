@extends('layouts.app')

@section('content')
<head>
    
<link rel='stylesheet' id='homesite17-master-style-css'  href='css/aboutpage_custom.css' type='text/css' media='all' />

<style>

body {
    margin: 0;
    font-family: "Nunito", sans-serif;
    font-size: 0.9rem;
    font-weight: 400;
    line-height: 1.6;
    color: #212529;
    text-align: left;
    background-color: #f8fafc;
}

#blueluelue:hover {color: red;}


.image__overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #121212;
    color: #ffffff;
    font-family: "Nunito", sans-serif;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.25s;
}

.image__overlay--blur {
    backdrop-filter: blur(5px);
}

.image__overlay--primary {
    background:  #121212;
}

.image__overlay > * {
    transform: translateY(20px);
    transition: transform 0.25s;
}

.image__overlay:hover {
    opacity: 1;
}

.image__overlay:hover > * {
    transform: translateY(0);
}



    </style>

</head>




  <section class="panel theme--choco" data-type="image-content" data-modular-content="" data-js="panel" data-index="5" data-img-loc="right">

    <section>
<div class="content" style="min-height: calc(55vh - 55px);" >
<h3 style="font-size: 30px;" >“Vision”</h3>
<p style="font-size: 18px;">The college of electrical engineering techniques aims to develop highly skilled and specialized engineers with a solid analytical thinking that meets the local, national and regional demands in the vast domain of engineering innovation. Being a pillar in the community and national industry is core component in the college’s belief system.</p>


<h3 style="font-size: 30px;" >“Goals”</h3>
<p style="font-size: 18px;">High quality education that yields the next generation of technical engineers who:</p>
<div style="font-size: 18px;" ><p ><li>Develop highly skilled and specialized engineers the excel in both of the industrial and research domains.</li>
<li>Design and Build next generation systems</li>
<li>Team lead and team focused.</li>
<li>Producing Engineering research that tackles the industry problems.</li>
<li>Evaluating the current performance-indicators in the field of technical engineering and re-enforcing them with newer metrics.</li>
<li>Building solid highly involved alumni-community.</li>
<br>
</p></div>

</div>
<figure class="landscape">
  
  <picture>
    <source srcset="images/eetc/IMG_7879.jpg 1536w, images/eetc/IMG_7879.jpg 767w, images/eetc/IMG_7879.jpg 768w, images/eetc/IMG_7879.jpg 1023w, images/eetc/IMG_7879.jpg 575w, images/eetc/IMG_7879.jpg 1499w, images/eetc/IMG_7879.jpg 600w, images/eetc/IMG_7879.jpg 500w">
    <img alt="college photo" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7">
  </picture>

  <div class="image__overlay image__overlay--primary">
  <iframe style="width: 100%; height: 100%" src="https://www.youtube.com/embed/DFWpW-KGXL4?autoplay=1" title="YouTube video player" frameborder="0" allow="gyroscope; picture-in-picture" allowfullscreen></iframe>
</iframe>

</div>
</figure>
</section>

  </section><!-- a virtual reality experience -->

  <section class="container mb-3" style="background-color: #f8f9fa;">
    <div class="map">
        <h2 class="text-center">Geographical Location</h2>
        <div class="underline"></div>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2785.3185212325916!2d44.39575484242206!3d33.25803475777558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1559d5544036cbf5%3A0x31fd853b044c0355!2sCollege%20of%20Electrical%20and%20Electronic%20Technology!5e0!3m2!1sen!2siq!4v1636021461903!5m2!1sen!2siq"
            class="my-4 w-100" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</section>


@endsection