@extends('layouts.app')

@section('content')
<div id="carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/carousel/carousel1.jpg') }}" class="d-block w-100 carousel-img" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/carousel/carousel2.jpg') }}" class="d-block w-100 carousel-img" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-target="#carousel" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carousel" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </button>

    <div class="caption">
        <p class="text-white">Electrical Engineering Technical College</p>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <h2 class="text-center">SCIENTIFIC DEPARTMENTS</h2>
        <div class="underline"></div>

        <div class="departments my-5">
            <div class="department mb-3">
                <div class="card">
                    <div class="card-header font-weight-bold text-capitalize">
                        Department of Computer Technology Engineering
                    </div>
                    <div class="card-body">
                        <div class="department-info ">
                            <img src="{{ asset('images/departments/Computer .jpg') }}" class="pr-4" alt="">

                            <div>
                                <p>
                                    Preparing technical engineers who have skills in the field of designing,
                                    installation
                                    and
                                    operating wired and wireless
                                    computer networks...
                                </p>

                                <a href="#" class="d-block mt-2">More information</a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="department mb-3">
                <div class="card">
                    <div class="card-header font-weight-bold text-capitalize">
                        Department of Medical Instrumentation Engineering Techniques
                    </div>
                    <div class="card-body">
                        <div class="department-info ">
                            <img src="{{ asset('images/departments/devices.jpg') }}" class="pr-4" alt="">

                            <div>
                                <p>
                                    The department adopts a general vision that determinesitsgeneral shape based on the
                                    technical education frameworkin Iraq
                                    and seeks to achieve it everyyear to highlightthe departmts excellence ...
                                </p>

                                <a href="#" class="d-block mt-2">More information</a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="department mb-3">
                <div class="card">
                    <div class="card-header font-weight-bold text-capitalize">
                        Department of Electrical Power Technologies Engineering
                    </div>
                    <div class="card-body">
                        <div class="department-info ">
                            <img src="{{ asset('images/departments/power.jpg') }}" class="pr-4" alt="">

                            <div>
                                <p>
                                    The department aims to develop highly skilled and specialized engineering graduates
                                    with a vast knowledge in the field
                                    of electrical power engineering to fulfill the ever increasing demand for this vital
                                    resource.
                                </p>

                                <a href="#" class="d-block mt-2">More information</a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="department">
                <div class="card">
                    <div class="card-header font-weight-bold text-capitalize">
                        department of Control and Automation Technologies Engineering
                    </div>
                    <div class="card-body">
                        <div class="department-info ">
                            <img src="{{ asset('images/departments/auto.jpg') }}" class="pr-4" alt="">

                            <div>
                                <p>
                                    The department is one of the leading departments in the field of applied theory and
                                    design of control systems based on
                                    modern information technologies...
                                </p>

                                <a href="#" class="d-block mt-2">More information</a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container mb-3">
    <div class="map">
        <h2 class="text-center">Geographical Location</h2>
        <div class="underline"></div>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2785.3185212325916!2d44.39575484242206!3d33.25803475777558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1559d5544036cbf5%3A0x31fd853b044c0355!2sCollege%20of%20Electrical%20and%20Electronic%20Technology!5e0!3m2!1sen!2siq!4v1636021461903!5m2!1sen!2siq"
            class="my-4 w-100" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</section>
@endsection