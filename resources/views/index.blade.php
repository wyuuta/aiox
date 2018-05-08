@extends('layouts.app')
@section('content')
<div class ="container-fluid no-padding">
    <section class="row">
        <div class="section-1">
            <button type="button" class="btn btn-outline-light btn-section" style="margin-left: 500px; margin-top: 250px" href="{{ url('market') }}">Explore market</button>
            <button type="button" class="btn btn-light btn-section" style="margin-top: 250px" href="#">Register now!</button>
        </div>
    </section>
    <section class="row" style="background: url('{{URL::asset('/image/index_section_2_img.jpg')}}')no-repeat center center /cover; height: 600px; opacity: 50%; filter: alpha(opacity=50);">
        <div class="col-6 no-padding" > 
            <h5 class="text-dark" style="margin-left: 250px; margin-top:100px; margin-bottom:20px;">Top gainer</h5>
            <table class="table table-dark table-hover">
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
                    <tr>
                        <td>ETH/Rupiah</td>
                        <td>5150635</td>
                        <td>+0.12%</td>
                        <td>1M</td>
                        <td>4980000</td>
                        <td>5000000</td>
                    </tr>
                    <tr>
                        <td>BTC/Rupiah</td>
                        <td>115150635</td>
                        <td>+0.1%</td>
                        <td>10M</td>
                        <td>114980000</td>
                        <td>117000000</td>
                    </tr>
                    <tr>
                        <td>BCH/ETH</td>
                        <td>2.5</td>
                        <td>+0.12%</td>
                        <td>16</td>
                        <td>2.45</td>
                        <td>2.5</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-6 no-padding" > 
            <h5 class="text-dark" style="margin-left: 250px; margin-top:100px; margin-bottom:20px; color:black;">Top losser</h5>
            <table class="table table-dark table-hover">
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
                    <tr>
                        <td>Ripple/Rupiah</td>
                        <td>5146</td>
                        <td>-1.12%</td>
                        <td>547Jt</td>
                        <td>4980</td>
                        <td>5000</td>
                    </tr>
                    <tr>
                        <td>ETC/Rupiah</td>
                        <td>1051320</td>
                        <td>-1.0%</td>
                        <td>300Jt</td>
                        <td>951320</td>
                        <td>951450</td>
                    </tr>
                    <tr>
                        <td>ETC/BCH</td>
                        <td>0.2</td>
                        <td>-0.52%</td>
                        <td>23.2</td>
                        <td>0.189</td>
                        <td>0.2</td>
                    </tr>
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