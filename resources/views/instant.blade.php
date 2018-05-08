@extends('layouts.app')
@section('navbarlink')
<ul class="navbar-nav mr-auto">
    <li class="nav-item active"><a class="nav-link" href="{{route('instant')}}">Tukar Instan</a></li>
    <li class="nav-item" ><a class="nav-link" href="{{route('market')}}">Market</a></li>
    <li class="nav-item" ><a class="nav-link" href="{{route('balance')}}">Balance</a></li>
    <li class="nav-item" ><a class="nav-link" href="{{route('profil')}}">Profil</a></li>
</ul>
@endsection
@section('content')
<div class ="container-fluid no-padding" style="margin-top: 40px">
    <!-- list crypto -->
    <section class="row">
        <div class="container-fluid">
        <table class="table table-light table-hover table-responsive-lg table-bordered" style="padding: 50px;">
            <thead>
                <tr>
                    <th>Crypto currency</th>
                    <th>Saldo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <img width="16" height="16" class="logo-sprite" alt="Bitcoin" src="{{URL::asset('/image/icons/Ripple.png')}}"/>
                        <span>Ripple</span>
                    </td>
                    <td>5146</td>
                </tr>
                <tr>
                    <td>
                        <img width="16" height="16" class="logo-sprite" alt="Bitcoin" src="{{URL::asset('/image/icons/ETC.png')}}"/>
                        <span>ETC</span>
                    </td>
                    <td>14.2</td>
                </tr>
                <tr>
                    <td>
                        <img width="16" height="16" class="logo-sprite" alt="Bitcoin" src="{{URL::asset('/image/icons/BCH.png')}}"/>
                        <span>BCH</span>
                    </td>
                    <td>1.23</td>
                </tr>
            </tbody>
        </table>
        </div>
    </section>

    <!-- saldo -->
    <section class="row justify-content-center">
        <div class="col-6">
            <div class="card bg-warning">
                <div class="card-body">
                    <div class ="row" >
                        <div class="col-7">
                        </div>
                        <div class="col-5">
                            Saldo Ripple
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-7 bg-warning">
                            <div class="row">
                            <div class="col-1">
                                <img width="30" height="30" class="logo-sprite" alt="Bitcoin" src="{{URL::asset('/image/icons/Ripple.png')}}"/>
                            </div>
                                
                            <div class="col-6">
                                <h5>Ripple</h5> 
                            </div>
                            </div>
                        </div>
                        <div class="col-5" >
                            <h4 >5146 XRP</h4>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <div class="col-6">
            <div class="card bg-success">
                <div class="card-body">
                    <div class ="row" >
                        <div class="col-7">
                        </div>
                        <div class="col-5">
                            Saldo Rupiah
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-7 bg-success">
                            <div class="row">
                            <div class="col-1">
                                <img width="30" height="30" class="logo-sprite" alt="Bitcoin" src="{{URL::asset('/image/icons/Rupiah.png')}}"/>
                            </div>
                            <div class="col-6">
                                <h5>Rupiah</h5> 
                            </div>
                            </div>
                        </div>
                        <div class="col-5" >
                            <h4 >RP 0</h4>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </section>
    <!-- instant trade -->
    <section class="row justify-content-center">
        <div class="col-5">
            <form id="regForm" action="/action_page.php" style="width: auto">
              <h1>Beli Ripple:</h1>
              <!-- One "tab" for each step in the form: -->
              <div class="tab">Input:
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Saldo Rupiah:</h5>
                    </div>
                    <div class="col-5">
                        <h5> Rp 0 </h5>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Jumlah rupiah</h5>
                    </div>
                    <div class="col-5">
                        <input style="float: right; max-width: 250px" placeholder="Jumlah Rupiah..." oninput="this.className = ''" name="rupiah">
                    </div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Harga 1 Ripple:</h5>
                    </div>
                    <div class="col-5">
                        <h5> Harga mengikuti harga pasar saat ini.</h5>
                    </div>
                </div>
              </div>
              <div class="tab">Konfirmasi:
                <div class="row" style="margin-bottom: 25px;">
                    <h5> Tinjau kembali data transaksi sebelum melanjutkan. Transaksi tidak bisa dibatalkan setelah langkah selanjutnya. </h5>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Jumlah rupiah :</h5>
                    </div>
                    <div class="col-5">
                        <h5> 4500000</h5>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Estimasi harga :</h5>
                    </div>
                    <div class="col-5">
                        <h5> 5145 XRP</h5>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Biaya :</h5>
                    </div>
                    <div class="col-5">
                        <h5> 526</h5>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Estimasi ripple diterima :</h5>
                    </div>
                    <div class="col-5">
                        <h5> 514,46</h5>
                    </div>
                </div>
              </div>
              <div style="overflow:auto;">
                <div style="float:right;">
                  <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                  <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                </div>
              </div>
              <!-- Circles which indicates the steps of the form: -->
              <div style="text-align:center;margin-top:40px;">
                <span class="step"></span>
                <span class="step"></span>
              </div>
            </form>
        </div>
        <div class="col-5">
                <form id="msform">
                  <!-- progressbar -->
                  <ul id="progressbar">
                    <li class="active">Input</li>
                    <li>Konfirrmasi</li>
                  </ul>
                  <!-- fieldsets -->
                  <fieldset>
                    <h2>Jual Ripple.</h2>
                    <h3 class="fs-subtitle"></h3>
                    <div class="row" style="margin-bottom: 25px;">
                        <div class="col-5">
                            <h5> Saldo Ripple:</h5>
                        </div>
                        <div class="col-5">
                            <h5> 5146 XRP</h5>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 25px;">
                        <div class="col-5">
                            <h5> Jumlah Ripple: </h5>
                        </div>
                        <div class="col-5">
                            <input style="float: right; max-width: 250px" placeholder="Jumlah Rupiah..." oninput="this.className = ''" name="ripple">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 25px;">
                        <div class="col-5">
                            <h5> Harga 1 Ripple:</h5>
                        </div>
                        <div class="col-5">
                            <h5> Harga mengikuti harga pasar saat ini.</h5>
                        </div>
                    </div>
                    <input type="button" name="previous" class="previous action-button" value="Previous" />
                    <input type="button" name="next" class="next action-button" value="Next" />
                  </fieldset>
                  <fieldset>
                    <h2>Jual Ripple.</h2>
                    <div class="row" style="margin-bottom: 25px;">
                        <h5> Tinjau kembali data transaksi sebelum melanjutkan. Transaksi tidak bisa dibatalkan setelah langkah selanjutnya. </h5>
                    </div>
                    <div class="row" style="margin-bottom: 25px;">
                        <div class="col-5">
                            <h5> Jumlah Ripple :</h5>
                        </div>
                        <div class="col-5">
                            <h5> 514,46</h5>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 25px;">
                        <div class="col-5">
                            <h5> Estimasi harga :</h5>
                        </div>
                        <div class="col-5">
                            <h5> 5145</h5>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 25px;">
                        <div class="col-5">
                            <h5> Biaya :</h5>
                        </div>
                        <div class="col-5">
                            <h5> 526</h5>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 25px;">
                        <div class="col-5">
                            <h5> Estimasi rupiah diterima :</h5>
                        </div>
                        <div class="col-5">
                            <h5> 4500000</h5>
                        </div>
                    </div>
                    <input type="button" name="previous" class="previous action-button" value="Previous" />
                    <input type="submit" name="submit" class="submit action-button" value="Submit" />
                  </fieldset>
                </form>
        </div>
    </section>
</div>

<script type="text/javascript">
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
<script type="text/javascript">
    //jQuery time
    var current_fs, next_fs, previous_fs; //fieldsets
    var left, opacity, scale; //fieldset properties which we will animate
    var animating; //flag to prevent quick multi-click glitches

    $(".next").click(function(){
        if(animating) return false;
        animating = true;
        
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        
        //activate next step on progressbar using the index of next_fs
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        
        //show the next fieldset
        next_fs.show(); 
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale current_fs down to 80%
                scale = 1 - (1 - now) * 0.2;
                //2. bring next_fs from the right(50%)
                left = (now * 50)+"%";
                //3. increase opacity of next_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({
            'transform': 'scale('+scale+')',
            'position': 'absolute'
          });
                next_fs.css({'left': left, 'opacity': opacity});
            }, 
            duration: 800, 
            complete: function(){
                current_fs.hide();
                animating = false;
            }, 
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
    });

    $(".previous").click(function(){
        if(animating) return false;
        animating = true;
        
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();
        
        //de-activate current step on progressbar
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        
        //show the previous fieldset
        previous_fs.show(); 
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale previous_fs from 80% to 100%
                scale = 0.8 + (1 - now) * 0.2;
                //2. take current_fs to the right(50%) - from 0%
                left = ((1-now) * 50)+"%";
                //3. increase opacity of previous_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({'left': left});
                previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
            }, 
            duration: 800, 
            complete: function(){
                current_fs.hide();
                animating = false;
            }, 
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
    });

    $(".submit").click(function(){
        return false;
    })
</script>
@endsection
