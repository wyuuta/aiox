@extends('layouts.app')
@section('content')
<div class ="container-fluid no-padding">
    <section class="row" style="margin-top: 13px">
        <div class="section-1 justify-content-center">
            <button type="button" class="btn btn-outline-light btn-section" style="margin-top: 250px" href="{{ url('market') }}">Explore market</button>
            <button type="button" class="btn btn-light btn-section" style="margin-top: 250px" href="#">Register now!</button>
        </div>
    </section>
    <section class="row" style="background: url('{{URL::asset('/image/index_section_2_img.jpg')}}')no-repeat center center /cover; height: 600px; opacity: 50%; filter: alpha(opacity=50);">
        
        <div class="col-lg-12">
            <table class="table table-dark table-hover" style="margin-top: 50px;">
                <thead>
                    <tr>
                        <th>Market</th>
                        <th>Last Price</th>
                        <th>Change</th>
                        <th>Volume 24H </th>
                        <th>Beli </th>
                        <th>Jual </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prices as $price)
                        <tr>
                            <td>{{$price["IDR"]["FROMSYMBOL"]."/".$price["IDR"]["TOSYMBOL"]}}</td>
                            <td>
                                {{number_format($price["IDR"]["PRICE"],2,".","")}}
                            </td>
                            <td>
                                {{number_format($price["IDR"]["CHANGEPCT24HOUR"],2,".","")}}
                            </td>
                            <td>
                                {{number_format($price["IDR"]["TOTALVOLUME24H"],2,".","")}}
                            </td>
                            <td>
                                {{number_format(floatval($price["IDR"]["PRICE"])*0.99,2,".","")}}
                            </td>
                            <td>
                                {{number_format(floatval($price["IDR"]["PRICE"]*1.01),2,".","")}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <section class="row jumbotron-fluid bg-dark" id="Register">
        <h1 class="text-light" style="margin-left: 300px; margin-top:100px margin-bottom:100px"> 
            Daftar dan Mulai Trading Sekarang!
        </h1>
        <div class="card" style="align-self: center; width: 50%; margin-left: 300px; margin-top:100px margin-bottom:100px">
                
                <div class="card-body">

                    <form action="/action_page.php">
                        <div class="form-group">
                            <label for="Nama">Nama:</label>
                            <input type="name" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" type="password" required="required">
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Password:</label>
                            <input type="password-confirmation" class="form-control" id="password-confirm" type="password" required="required">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox"> I agree to the allinoneexchange.com Terms of Service 
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
    </section>
</div>


@endsection