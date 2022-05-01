@extends('template.public')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h3>Ours location</h3>
                <hr>
                <iframe style="width: 100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1210.7389113142378!2d105.8120977281075!3d21.01122103752034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ad32b9271305%3A0xf7bed6129b644540!2sKFC!5e1!3m2!1svi!2s!4v1651394436440!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <br><br>
            </div>

            <div class="col-md-7">
                <h3>Contact Us</h3>
                <hr>
                <div class="container">
                    <p><i class="fa fa-location-arrow"></i> 175 P. Láng Hạ, Trung Hoà, Cầu Giấy, Hà Nội 100000 </p>
                    <p><i class="fa fa-phone"></i>  +91-9999878398  </p>
                    <p><i class="fa fa fa-envelope"></i> info@abc.com  </p>     
                </div>
            </div>
        </div>
    </div>
@endsection