@extends('layouts.frontend')

@section('title', 'Seller Account | Builderstreat')

@push('head-scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-vtXRMe3mGCbOeY7l30aIg8H9p3GdeSe4IFlP6G8JMa7o7lXvnz3GFKzPxzJdPfGK" crossorigin="anonymous"></script>
@endpush

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
@endpush

@section('content')


<div class="main-content">
    <section class="section wrap pt-0">
        <div class="section-head text-center">
            <div class="eyebrow">Seller Account</div>
            <h1>Welcome to Builderstreat</h1>
            <p>Sign in or create an account to list and manage surplus construction materials.</p>
        </div>
    </section>


    <style>
        .mycarbody {
            border: none;
            background: none;
        }
        

        .nav-tabs .nav-link:hover {
            border-bottom: 3px solid #8A9A5B;
        }

        .form-group input {
            display: inline-block;
        }

        .height-100 {
            height: 150vh
        }

        .card {
            width: 100%;
            max-width: 700px;
            border: none;
            z-index: 1;
            margin-bottom: 40px;
            display: flex;
            justify-content: center;
            align-items: stretch;
            padding-top: 10px;
        }

        .inputs input {
            width: 44.7px;
            height: 43.84px;
            left: 150px;
            top: 347.33px;
            background: #EEF1F8;
            border-radius: 12px !important;
        }

        .form-control {
            display: block;
            width: 100%;
            height: calc(1.5em + 0.75rem + 2px);
            padding: 12px !important;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .log-in,
        .btn-regis {
            margin-top: 3%;
            background-color: #6E7E1D !important;
            /* New color */
            margin-left: 0px;
            border: none;
            color: white !important;
        }

        .ot {
            margin-left: 4px;
        }

        .crane2 {
            position: absolute;
            top: -26%;
        }

        /* .nav-link {
            display: block;
            padding: 0.5rem 5rem;
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 700;
            font-size: 16px;
            line-height: 20px;
            /*letter-spacing: 1px;*/
            /* text-transform: uppercase; */
            /* color: #8BA83A; */
        /* } */

        .container {
            padding-top: 20px;
        }

        .nav-tabs .nav-link {
            color: #333 !important;
            background-color: transparent !important;
            border: 1px solid green !important;
            border-radius: 18px !important;
            font-weight: bold !important;
            transition: all 0.3s ease !important;
            padding: 10px 20px !important;
            margin-right: 20px !important;
            margin-bottom: 20px !important;
        }

        .nav-tabs .nav-item:first-child .nav-link {
            margin-right: 20px !important;
        }

        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            color: #fff !important;
            background-color: #6E7E1D !important;
            border: 2px solid #6E7E1D !important;
            border-radius: 18px !important;
        }

        .nav-tabs .nav-link:hover {
            color: #6E7E1D !important;
            background-color: rgba(110, 126, 29, 0.1) !important;
        }
        
            
        .registerBtn, .send-otp{
            border:1px solid #000 !important;
        }
        
        .btn:hover {
            color: black !important;
            background-color: #ffffff !important;
            border-color: #6e7e1d !important;
            border: 1px solid #6e7e1d !important;
        }
        
        
    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 d-flex align-items-center justify-content-center bg-light">
            
                <div class="card mt-3 tab-card mycard login-form rounded-4 p-4">
                    <div class="card-header tab-card-header mycarbody">
                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="one-tab" data-toggle="tab" href="#one" role="tab"
                                    aria-controls="One" aria-selected="true">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab"
                                    aria-controls="Two" aria-selected="false">Register</a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane active p-0" id="one" role="tabpanel"
                            aria-labelledby="one-tab">
                            <div class="card-body">
                                <form id="loginForm" method="POST" action="{{ route('seller.otp.login') }}">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="mobile_no" class="col-md-4 col-form-label px-4">Mobile Number</label>
                                        <div class="form-group mt-2 d-flex align-items-center">
                                            <select id="login_country_code" name="country_code" data-live-search="true" class="selectpicker">
                                                <!-- <option data-content='<img src="https://flagcdn.com/16x12/af.png" class="me-1"> +93 Afghanistan' value="+93">+93</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/al.png" class="me-1"> +355 Albania' value="+355">+355</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/dz.png" class="me-1"> +213 Algeria' value="+213">+213</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/us.png" class="me-1"> +1 United States' value="+1">+1</option> -->
                                                <!-- <option data-content='<img src="https://flagcdn.com/16x12/ad.png" class="me-1"> +376 Andorra' value="+376">+376</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ao.png" class="me-1"> +244 Angola' value="+244">+244</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ag.png" class="me-1"> +1-268 Antigua & Barbuda' value="+1-268">+1-268</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ar.png" class="me-1"> +54 Argentina' value="+54">+54</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/am.png" class="me-1"> +374 Armenia' value="+374">+374</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/aw.png" class="me-1"> +297 Aruba' value="+297">+297</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/au.png" class="me-1"> +61 Australia' value="+61">+61</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/at.png" class="me-1"> +43 Austria' value="+43">+43</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/az.png" class="me-1"> +994 Azerbaijan' value="+994">+994</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/bh.png" class="me-1"> +973 Bahrain' value="+973">+973</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/bd.png" class="me-1"> +880 Bangladesh' value="+880">+880</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/bb.png" class="me-1"> +1-246 Barbados' value="+1-246">+1-246</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/by.png" class="me-1"> +375 Belarus' value="+375">+375</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/be.png" class="me-1"> +32 Belgium' value="+32">+32</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/bz.png" class="me-1"> +501 Belize' value="+501">+501</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/bj.png" class="me-1"> +229 Benin' value="+229">+229</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/bt.png" class="me-1"> +975 Bhutan' value="+975">+975</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/bo.png" class="me-1"> +591 Bolivia' value="+591">+591</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ba.png" class="me-1"> +387 Bosnia & Herzegovina' value="+387">+387</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/bw.png" class="me-1"> +267 Botswana' value="+267">+267</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/br.png" class="me-1"> +55 Brazil' value="+55">+55</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/io.png" class="me-1"> +246 British Indian Ocean Territory' value="+246">+246</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/bn.png" class="me-1"> +673 Brunei' value="+673">+673</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/bg.png" class="me-1"> +359 Bulgaria' value="+359">+359</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/bf.png" class="me-1"> +226 Burkina Faso' value="+226">+226</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/bi.png" class="me-1"> +257 Burundi' value="+257">+257</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/kh.png" class="me-1"> +855 Cambodia' value="+855">+855</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/cm.png" class="me-1"> +237 Cameroon' value="+237">+237</option> -->
                                                <option data-content='<img src="https://flagcdn.com/16x12/ca.png" class="me-1"> +1 Canada' value="+1">+1</option>
                                                <!-- <option data-content='<img src="https://flagcdn.com/16x12/cv.png" class="me-1"> +238 Cape Verde' value="+238">+238</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/cf.png" class="me-1"> +236 Central African Republic' value="+236">+236</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/td.png" class="me-1"> +235 Chad' value="+235">+235</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/cl.png" class="me-1"> +56 Chile' value="+56">+56</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/cn.png" class="me-1"> +86 China' value="+86">+86</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/co.png" class="me-1"> +57 Colombia' value="+57">+57</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/km.png" class="me-1"> +269 Comoros' value="+269">+269</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/cg.png" class="me-1"> +242 Congo' value="+242">+242</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/cd.png" class="me-1"> +243 Democratic Republic of the Congo' value="+243">+243</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ck.png" class="me-1"> +682 Cook Islands' value="+682">+682</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/cr.png" class="me-1"> +506 Costa Rica' value="+506">+506</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/hr.png" class="me-1"> +385 Croatia' value="+385">+385</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/cu.png" class="me-1"> +53 Cuba' value="+53">+53</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/cy.png" class="me-1"> +357 Cyprus' value="+357">+357</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/cz.png" class="me-1"> +420 Czech Republic' value="+420">+420</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/dk.png" class="me-1"> +45 Denmark' value="+45">+45</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/dj.png" class="me-1"> +253 Djibouti' value="+253">+253</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/dm.png" class="me-1"> +1-767 Dominica' value="+1-767">+1-767</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/do.png" class="me-1"> +1-809 Dominican Republic' value="+1-809">+1-809</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ec.png" class="me-1"> +593 Ecuador' value="+593">+593</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/eg.png" class="me-1"> +20 Egypt' value="+20">+20</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/sv.png" class="me-1"> +503 El Salvador' value="+503">+503</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/gq.png" class="me-1"> +240 Equatorial Guinea' value="+240">+240</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/er.png" class="me-1"> +291 Eritrea' value="+291">+291</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ee.png" class="me-1"> +372 Estonia' value="+372">+372</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/et.png" class="me-1"> +251 Ethiopia' value="+251">+251</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/fj.png" class="me-1"> +679 Fiji' value="+679">+679</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/fi.png" class="me-1"> +358 Finland' value="+358">+358</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/fr.png" class="me-1"> +33 France' value="+33">+33</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/gf.png" class="me-1"> +594 French Guiana' value="+594">+594</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/pf.png" class="me-1"> +689 French Polynesia' value="+689">+689</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ga.png" class="me-1"> +241 Gabon' value="+241">+241</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/gm.png" class="me-1"> +220 Gambia' value="+220">+220</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ge.png" class="me-1"> +995 Georgia' value="+995">+995</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/de.png" class="me-1"> +49 Germany' value="+49">+49</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/gh.png" class="me-1"> +233 Ghana' value="+233">+233</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/gi.png" class="me-1"> +350 Gibraltar' value="+350">+350</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/gr.png" class="me-1"> +30 Greece' value="+30">+30</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/gl.png" class="me-1"> +299 Greenland' value="+299">+299</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/gd.png" class="me-1"> +1-473 Grenada' value="+1-473">+1-473</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/gp.png" class="me-1"> +590 Guadeloupe' value="+590">+590</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/gu.png" class="me-1"> +1-671 Guam' value="+1-671">+1-671</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/gt.png" class="me-1"> +502 Guatemala' value="+502">+502</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/gn.png" class="me-1"> +224 Guinea' value="+224">+224</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/gw.png" class="me-1"> +245 Guinea-Bissau' value="+245">+245</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/gy.png" class="me-1"> +592 Guyana' value="+592">+592</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ht.png" class="me-1"> +509 Haiti' value="+509">+509</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/hn.png" class="me-1"> +504 Honduras' value="+504">+504</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/hk.png" class="me-1"> +852 Hong Kong' value="+852">+852</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/hu.png" class="me-1"> +36 Hungary' value="+36">+36</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/is.png" class="me-1"> +354 Iceland' value="+354">+354</option> -->
                                                <option data-content='<img src="https://flagcdn.com/16x12/in.png" class="me-1"> +91 India' value="+91" selected>+91</option>
                                                <!-- <option data-content='<img src="https://flagcdn.com/16x12/id.png" class="me-1"> +62 Indonesia' value="+62">+62</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ir.png" class="me-1"> +98 Iran' value="+98">+98</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/iq.png" class="me-1"> +964 Iraq' value="+964">+964</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ie.png" class="me-1"> +353 Ireland' value="+353">+353</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/il.png" class="me-1"> +972 Israel' value="+972">+972</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/it.png" class="me-1"> +39 Italy' value="+39">+39</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/jm.png" class="me-1"> +1-876 Jamaica' value="+1-876">+1-876</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/jp.png" class="me-1"> +81 Japan' value="+81">+81</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/jo.png" class="me-1"> +962 Jordan' value="+962">+962</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/kz.png" class="me-1"> +7 Kazakhstan' value="+7">+7</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ke.png" class="me-1"> +254 Kenya' value="+254">+254</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ki.png" class="me-1"> +686 Kiribati' value="+686">+686</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/kw.png" class="me-1"> +965 Kuwait' value="+965">+965</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/kg.png" class="me-1"> +996 Kyrgyzstan' value="+996">+996</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/la.png" class="me-1"> +856 Laos' value="+856">+856</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/lv.png" class="me-1"> +371 Latvia' value="+371">+371</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/lb.png" class="me-1"> +961 Lebanon' value="+961">+961</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ls.png" class="me-1"> +266 Lesotho' value="+266">+266</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/lr.png" class="me-1"> +231 Liberia' value="+231">+231</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ly.png" class="me-1"> +218 Libya' value="+218">+218</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/li.png" class="me-1"> +423 Liechtenstein' value="+423">+423</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/lt.png" class="me-1"> +370 Lithuania' value="+370">+370</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/lu.png" class="me-1"> +352 Luxembourg' value="+352">+352</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mo.png" class="me-1"> +853 Macau' value="+853">+853</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mk.png" class="me-1"> +389 North Macedonia' value="+389">+389</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mg.png" class="me-1"> +261 Madagascar' value="+261">+261</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mw.png" class="me-1"> +265 Malawi' value="+265">+265</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/my.png" class="me-1"> +60 Malaysia' value="+60">+60</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mv.png" class="me-1"> +960 Maldives' value="+960">+960</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ml.png" class="me-1"> +223 Mali' value="+223">+223</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mt.png" class="me-1"> +356 Malta' value="+356">+356</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mh.png" class="me-1"> +692 Marshall Islands' value="+692">+692</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mq.png" class="me-1"> +596 Martinique' value="+596">+596</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mr.png" class="me-1"> +222 Mauritania' value="+222">+222</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mu.png" class="me-1"> +230 Mauritius' value="+230">+230</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/yt.png" class="me-1"> +262 Mayotte' value="+262">+262</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mx.png" class="me-1"> +52 Mexico' value="+52">+52</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/fm.png" class="me-1"> +691 Micronesia' value="+691">+691</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/md.png" class="me-1"> +373 Moldova' value="+373">+373</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mc.png" class="me-1"> +377 Monaco' value="+377">+377</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mn.png" class="me-1"> +976 Mongolia' value="+976">+976</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/me.png" class="me-1"> +382 Montenegro' value="+382">+382</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ms.png" class="me-1"> +1-664 Montserrat' value="+1-664">+1-664</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ma.png" class="me-1"> +212 Morocco' value="+212">+212</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mz.png" class="me-1"> +258 Mozambique' value="+258">+258</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mm.png" class="me-1"> +95 Myanmar' value="+95">+95</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/na.png" class="me-1"> +264 Namibia' value="+264">+264</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/nr.png" class="me-1"> +674 Nauru' value="+674">+674</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/np.png" class="me-1"> +977 Nepal' value="+977">+977</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/nl.png" class="me-1"> +31 Netherlands' value="+31">+31</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/nc.png" class="me-1"> +687 New Caledonia' value="+687">+687</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/nz.png" class="me-1"> +64 New Zealand' value="+64">+64</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ni.png" class="me-1"> +505 Nicaragua' value="+505">+505</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ne.png" class="me-1"> +227 Niger' value="+227">+227</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ng.png" class="me-1"> +234 Nigeria' value="+234">+234</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12.nu.png" class="me-1"> +683 Niue' value="+683">+683</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/nf.png" class="me-1"> +672 Norfolk Island' value="+672">+672</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/kp.png" class="me-1"> +850 North Korea' value="+850">+850</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mp.png" class="me-1"> +1-670 Northern Mariana Islands' value="+1-670">+1-670</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/no.png" class="me-1"> +47 Norway' value="+47">+47</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/om.png" class="me-1"> +968 Oman' value="+968">+968</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/pk.png" class="me-1"> +92 Pakistan' value="+92">+92</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/pw.png" class="me-1"> +680 Palau' value="+680">+680</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ps.png" class="me-1"> +970 Palestine' value="+970">+970</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/pa.png" class="me-1"> +507 Panama' value="+507">+507</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/pg.png" class="me-1"> +675 Papua New Guinea' value="+675">+675</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/py.png" class="me-1"> +595 Paraguay' value="+595">+595</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/pe.png" class="me-1"> +51 Peru' value="+51">+51</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ph.png" class="me-1"> +63 Philippines' value="+63">+63</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/pl.png" class="me-1"> +48 Poland' value="+48">+48</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/pt.png" class="me-1"> +351 Portugal' value="+351">+351</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/pr.png" class="me-1"> +1-787 Puerto Rico' value="+1-787">+1-787</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/qa.png" class="me-1"> +974 Qatar' value="+974">+974</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ro.png" class="me-1"> +40 Romania' value="+40">+40</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ru.png" class="me-1"> +7 Russia' value="+7">+7</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/rw.png" class="me-1"> +250 Rwanda' value="+250">+250</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/bl.png" class="me-1"> +590 Saint Barthélemy' value="+590">+590</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/sh.png" class="me-1"> +290 Saint Helena' value="+290">+290</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/kn.png" class="me-1"> +1-869 Saint Kitts and Nevis' value="+1-869">+1-869</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/lc.png" class="me-1"> +1-758 Saint Lucia' value="+1-758">+1-758</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mf.png" class="me-1"> +590 Saint Martin' value="+590">+590</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/pn.png" class="me-1"> +508 Pitcairn Islands' value="+508">+508</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/vc.png" class="me-1"> +1-784 Saint Vincent and the Grenadines' value="+1-784">+1-784</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ws.png" class="me-1"> +685 Samoa' value="+685">+685</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/sm.png" class="me-1"> +378 San Marino' value="+378">+378</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/st.png" class="me-1"> +239 São Tomé and Príncipe' value="+239">+239</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/sa.png" class="me-1"> +966 Saudi Arabia' value="+966">+966</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/sn.png" class="me-1"> +221 Senegal' value="+221">+221</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/rs.png" class="me-1"> +381 Serbia' value="+381">+381</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/sc.png" class="me-1"> +248 Seychelles' value="+248">+248</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/sl.png" class="me-1"> +232 Sierra Leone' value="+232">+232</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/sg.png" class="me-1"> +65 Singapore' value="+65">+65</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/sk.png" class="me-1"> +421 Slovakia' value="+421">+421</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/si.png" class="me-1"> +386 Slovenia' value="+386">+386</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/sb.png" class="me-1"> +677 Solomon Islands' value="+677">+677</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/so.png" class="me-1"> +252 Somalia' value="+252">+252</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/za.png" class="me-1"> +27 South Africa' value="+27">+27</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/kr.png" class="me-1"> +82 South Korea' value="+82">+82</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ss.png" class="me-1"> +211 South Sudan' value="+211">+211</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/es.png" class="me-1"> +34 Spain' value="+34">+34</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/lk.png" class="me-1"> +94 Sri Lanka' value="+94">+94</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/sd.png" class="me-1"> +249 Sudan' value="+249">+249</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/sr.png" class="me-1"> +597 Suriname' value="+597">+597</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/sj.png" class="me-1"> +47 Svalbard and Jan Mayen' value="+47">+47</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/sz.png" class="me-1"> +268 Eswatini' value="+268">+268</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/se.png" class="me-1"> +46 Sweden' value="+46">+46</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ch.png" class="me-1"> +41 Switzerland' value="+41">+41</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/sy.png" class="me-1"> +963 Syria' value="+963">+963</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/tw.png" class="me-1"> +886 Taiwan' value="+886">+886</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/tj.png" class="me-1"> +992 Tajikistan' value="+992">+992</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/tz.png" class="me-1"> +255 Tanzania' value="+255">+255</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/th.png" class="me-1"> +66 Thailand' value="+66">+66</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/tg.png" class="me-1"> +228 Togo' value="+228">+228</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/tk.png" class="me-1"> +690 Tokelau' value="+690">+690</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/to.png" class="me-1"> +676 Tonga' value="+676">+676</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/tt.png" class="me-1"> +1-868 Trinidad and Tobago' value="+1-868">+1-868</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/tn.png" class="me-1"> +216 Tunisia' value="+216">+216</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/tr.png" class="me-1"> +90 Turkey' value="+90">+90</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/tm.png" class="me-1"> +993 Turkmenistan' value="+993">+993</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/tc.png" class="me-1"> +1-649 Turks and Caicos Islands' value="+1-649">+1-649</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/tv.png" class="me-1"> +688 Tuvalu' value="+688">+688</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ug.png" class="me-1"> +256 Uganda' value="+256">+256</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ua.png" class="me-1"> +380 Ukraine' value="+380">+380</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ae.png" class="me-1"> +971 United Arab Emirates' value="+971">+971</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/gb.png" class="me-1"> +44 United Kingdom' value="+44">+44</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/uy.png" class="me-1"> +598 Uruguay' value="+598">+598</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/uz.png" class="me-1"> +998 Uzbekistan' value="+998">+998</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/vu.png" class="me-1"> +678 Vanuatu' value="+678">+678</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ve.png" class="me-1"> +58 Venezuela' value="+58">+58</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/vn.png" class="me-1"> +84 Vietnam' value="+84">+84</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/vg.png" class="me-1"> +1-284 British Virgin Islands' value="+1-284">+1-284</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/vi.png" class="me-1"> +1-340 U.S. Virgin Islands' value="+1-340">+1-340</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/wf.png" class="me-1"> +681 Wallis and Futuna' value="+681">+681</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/eh.png" class="me-1"> +212 Western Sahara' value="+212">+212</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ye.png" class="me-1"> +967 Yemen' value="+967">+967</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/zm.png" class="me-1"> +260 Zambia' value="+260">+260</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/zw.png" class="me-1"> +263 Zimbabwe' value="+263">+263</option> -->
                                            </select>
                                            <input type="number" class="form-control" id="phone" name="phone" maxlength="10"
                                                placeholder="Mobile Number" />
                                            <button type="button" class="col-2 btn btn-default btn-sm send-otp" onclick="sendOTP()" style="background-color: #6e7e1d; width: auto; height: 40px; margin: 5px; color: white; border-color: #6e7e1d;">SEND CODE</button>
                                        </div>
                                        <div id="success-message" style="display:none; color:green;"></div>
                                        <div id="phone-error" style="color: red; font-size: 14px; display: none;" class="mt-1"></div>

                                        <div id="otp-container" class="inputs d-flex flex-row justify-content-center mt-3 ot" style="display: none;">
                                            <input class="m-2 text-center form-control rounded otp-input" type="text" inputmode="numeric" maxlength="1" />
                                            <input class="m-2 text-center form-control rounded otp-input" type="text" inputmode="numeric" maxlength="1" />
                                            <input class="m-2 text-center form-control rounded otp-input" type="text" inputmode="numeric" maxlength="1" />
                                            <input class="m-2 text-center form-control rounded otp-input" type="text" inputmode="numeric" maxlength="1" />
                                            <input class="m-2 text-center form-control rounded otp-input" type="text" inputmode="numeric" maxlength="1" />
                                            <input class="m-2 text-center form-control rounded otp-input" type="text" inputmode="numeric" maxlength="1" />
                                        </div>
                                        <input type="hidden" name="otp" id="otp" />
                                    </div>
                                    <p id="resendText" style="display:none; margin-top:10px; color:#333;margin-left: 170px;">
                                        Didn't receive OTP? 
                                        <a href="javascript:void(0);" onclick="sendOTP(true)" id="resendBtn" style="color:#6e7e1d; font-weight:bold; ">
                                            Resend OTP
                                        </a>
                                    </p>
                                    <!-- did't recieve otp ?<a href="" onclick="sendOTP()"  id="resendBtn" style="display:none;">Resend OTP</a> -->
                                    <div class="row mb-0">
                                        <div class="col-md-12 d-flex align-items-center justify-content-center">
                                            <button type="submit" class="btn btn-primary log-in">Login</button>
                                            
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="tab-pane  p-0" id="two" role="tabpanel"
                            aria-labelledby="two-tab">
                            <div class="mycard">
                                <div class="#">
                                    <!--<form action="{{ route('seller.register.store') }}" method="post" enctype="multipart/form-data" class="mx-1 mx-md-4" id="registrationform">-->
                                    <form id="sellerRegister" enctype="multipart/form-data" class="mx-1 mx-md-4" >
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="name">Full Name*</label>
                                                <input type="text" id="name" name="name" placeholder="Full Name"
                                                    class="form-control w-100" value="" required />
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="email">Email Address*</label>
                                                <input type="email" id="email" name="email" placeholder="Email Address"
                                                    class="form-control w-100" value="" required />
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="phone">Mobile Number*</label>
                                                <div class="d-flex align-items-center">
                                                    <select id="register_country_code" name="country_code" data-live-search="true" class="selectpicker">
                                                <!-- <option data-content='<img src="https://flagcdn.com/16x12/af.png" class="me-1"> +93 Afghanistan' value="+93">+93</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/al.png" class="me-1"> +355 Albania' value="+355">+355</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/dz.png" class="me-1"> +213 Algeria' value="+213">+213</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/us.png" class="me-1"> +1 United States' value="+1">+1</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ad.png" class="me-1"> +376 Andorra' value="+376">+376</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ao.png" class="me-1"> +244 Angola' value="+244">+244</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ag.png" class="me-1"> +1-268 Antigua & Barbuda' value="+1-268">+1-268</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ar.png" class="me-1"> +54 Argentina' value="+54">+54</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/am.png" class="me-1"> +374 Armenia' value="+374">+374</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/aw.png" class="me-1"> +297 Aruba' value="+297">+297</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/au.png" class="me-1"> +61 Australia' value="+61">+61</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/at.png" class="me-1"> +43 Austria' value="+43">+43</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/az.png" class="me-1"> +994 Azerbaijan' value="+994">+994</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/bh.png" class="me-1"> +973 Bahrain' value="+973">+973</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/bd.png" class="me-1"> +880 Bangladesh' value="+880">+880</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/bb.png" class="me-1"> +1-246 Barbados' value="+1-246">+1-246</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/by.png" class="me-1"> +375 Belarus' value="+375">+375</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/be.png" class="me-1"> +32 Belgium' value="+32">+32</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/bz.png" class="me-1"> +501 Belize' value="+501">+501</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/bj.png" class="me-1"> +229 Benin' value="+229">+229</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/bt.png" class="me-1"> +975 Bhutan' value="+975">+975</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/bo.png" class="me-1"> +591 Bolivia' value="+591">+591</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ba.png" class="me-1"> +387 Bosnia & Herzegovina' value="+387">+387</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/bw.png" class="me-1"> +267 Botswana' value="+267">+267</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/br.png" class="me-1"> +55 Brazil' value="+55">+55</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/io.png" class="me-1"> +246 British Indian Ocean Territory' value="+246">+246</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/bn.png" class="me-1"> +673 Brunei' value="+673">+673</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/bg.png" class="me-1"> +359 Bulgaria' value="+359">+359</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/bf.png" class="me-1"> +226 Burkina Faso' value="+226">+226</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/bi.png" class="me-1"> +257 Burundi' value="+257">+257</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/kh.png" class="me-1"> +855 Cambodia' value="+855">+855</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/cm.png" class="me-1"> +237 Cameroon' value="+237">+237</option> -->
                                                <option data-content='<img src="https://flagcdn.com/16x12/ca.png" class="me-1"> +1 Canada' value="+1">+1</option>
                                                <!-- <option data-content='<img src="https://flagcdn.com/16x12/cv.png" class="me-1"> +238 Cape Verde' value="+238">+238</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/cf.png" class="me-1"> +236 Central African Republic' value="+236">+236</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/td.png" class="me-1"> +235 Chad' value="+235">+235</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/cl.png" class="me-1"> +56 Chile' value="+56">+56</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/cn.png" class="me-1"> +86 China' value="+86">+86</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/co.png" class="me-1"> +57 Colombia' value="+57">+57</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/km.png" class="me-1"> +269 Comoros' value="+269">+269</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/cg.png" class="me-1"> +242 Congo' value="+242">+242</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/cd.png" class="me-1"> +243 Democratic Republic of the Congo' value="+243">+243</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ck.png" class="me-1"> +682 Cook Islands' value="+682">+682</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/cr.png" class="me-1"> +506 Costa Rica' value="+506">+506</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/hr.png" class="me-1"> +385 Croatia' value="+385">+385</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/cu.png" class="me-1"> +53 Cuba' value="+53">+53</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/cy.png" class="me-1"> +357 Cyprus' value="+357">+357</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/cz.png" class="me-1"> +420 Czech Republic' value="+420">+420</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/dk.png" class="me-1"> +45 Denmark' value="+45">+45</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/dj.png" class="me-1"> +253 Djibouti' value="+253">+253</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/dm.png" class="me-1"> +1-767 Dominica' value="+1-767">+1-767</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/do.png" class="me-1"> +1-809 Dominican Republic' value="+1-809">+1-809</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ec.png" class="me-1"> +593 Ecuador' value="+593">+593</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/eg.png" class="me-1"> +20 Egypt' value="+20">+20</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/sv.png" class="me-1"> +503 El Salvador' value="+503">+503</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/gq.png" class="me-1"> +240 Equatorial Guinea' value="+240">+240</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/er.png" class="me-1"> +291 Eritrea' value="+291">+291</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ee.png" class="me-1"> +372 Estonia' value="+372">+372</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/et.png" class="me-1"> +251 Ethiopia' value="+251">+251</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/fj.png" class="me-1"> +679 Fiji' value="+679">+679</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/fi.png" class="me-1"> +358 Finland' value="+358">+358</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/fr.png" class="me-1"> +33 France' value="+33">+33</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/gf.png" class="me-1"> +594 French Guiana' value="+594">+594</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/pf.png" class="me-1"> +689 French Polynesia' value="+689">+689</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ga.png" class="me-1"> +241 Gabon' value="+241">+241</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/gm.png" class="me-1"> +220 Gambia' value="+220">+220</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ge.png" class="me-1"> +995 Georgia' value="+995">+995</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/de.png" class="me-1"> +49 Germany' value="+49">+49</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/gh.png" class="me-1"> +233 Ghana' value="+233">+233</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/gi.png" class="me-1"> +350 Gibraltar' value="+350">+350</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/gr.png" class="me-1"> +30 Greece' value="+30">+30</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/gl.png" class="me-1"> +299 Greenland' value="+299">+299</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/gd.png" class="me-1"> +1-473 Grenada' value="+1-473">+1-473</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/gp.png" class="me-1"> +590 Guadeloupe' value="+590">+590</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/gu.png" class="me-1"> +1-671 Guam' value="+1-671">+1-671</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/gt.png" class="me-1"> +502 Guatemala' value="+502">+502</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/gn.png" class="me-1"> +224 Guinea' value="+224">+224</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/gw.png" class="me-1"> +245 Guinea-Bissau' value="+245">+245</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/gy.png" class="me-1"> +592 Guyana' value="+592">+592</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ht.png" class="me-1"> +509 Haiti' value="+509">+509</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/hn.png" class="me-1"> +504 Honduras' value="+504">+504</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/hk.png" class="me-1"> +852 Hong Kong' value="+852">+852</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/hu.png" class="me-1"> +36 Hungary' value="+36">+36</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/is.png" class="me-1"> +354 Iceland' value="+354">+354</option> -->
                                                <option data-content='<img src="https://flagcdn.com/16x12/in.png" class="me-1"> +91 India' value="+91" selected>+91</option>
                                                <!-- <option data-content='<img src="https://flagcdn.com/16x12/id.png" class="me-1"> +62 Indonesia' value="+62">+62</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ir.png" class="me-1"> +98 Iran' value="+98">+98</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/iq.png" class="me-1"> +964 Iraq' value="+964">+964</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ie.png" class="me-1"> +353 Ireland' value="+353">+353</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/il.png" class="me-1"> +972 Israel' value="+972">+972</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/it.png" class="me-1"> +39 Italy' value="+39">+39</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/jm.png" class="me-1"> +1-876 Jamaica' value="+1-876">+1-876</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/jp.png" class="me-1"> +81 Japan' value="+81">+81</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/jo.png" class="me-1"> +962 Jordan' value="+962">+962</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/kz.png" class="me-1"> +7 Kazakhstan' value="+7">+7</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ke.png" class="me-1"> +254 Kenya' value="+254">+254</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ki.png" class="me-1"> +686 Kiribati' value="+686">+686</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/kw.png" class="me-1"> +965 Kuwait' value="+965">+965</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/kg.png" class="me-1"> +996 Kyrgyzstan' value="+996">+996</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/la.png" class="me-1"> +856 Laos' value="+856">+856</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/lv.png" class="me-1"> +371 Latvia' value="+371">+371</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/lb.png" class="me-1"> +961 Lebanon' value="+961">+961</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ls.png" class="me-1"> +266 Lesotho' value="+266">+266</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/lr.png" class="me-1"> +231 Liberia' value="+231">+231</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ly.png" class="me-1"> +218 Libya' value="+218">+218</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/li.png" class="me-1"> +423 Liechtenstein' value="+423">+423</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/lt.png" class="me-1"> +370 Lithuania' value="+370">+370</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/lu.png" class="me-1"> +352 Luxembourg' value="+352">+352</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mo.png" class="me-1"> +853 Macau' value="+853">+853</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mk.png" class="me-1"> +389 North Macedonia' value="+389">+389</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mg.png" class="me-1"> +261 Madagascar' value="+261">+261</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mw.png" class="me-1"> +265 Malawi' value="+265">+265</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/my.png" class="me-1"> +60 Malaysia' value="+60">+60</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mv.png" class="me-1"> +960 Maldives' value="+960">+960</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ml.png" class="me-1"> +223 Mali' value="+223">+223</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mt.png" class="me-1"> +356 Malta' value="+356">+356</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mh.png" class="me-1"> +692 Marshall Islands' value="+692">+692</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mq.png" class="me-1"> +596 Martinique' value="+596">+596</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mr.png" class="me-1"> +222 Mauritania' value="+222">+222</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mu.png" class="me-1"> +230 Mauritius' value="+230">+230</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/yt.png" class="me-1"> +262 Mayotte' value="+262">+262</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mx.png" class="me-1"> +52 Mexico' value="+52">+52</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/fm.png" class="me-1"> +691 Micronesia' value="+691">+691</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/md.png" class="me-1"> +373 Moldova' value="+373">+373</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mc.png" class="me-1"> +377 Monaco' value="+377">+377</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mn.png" class="me-1"> +976 Mongolia' value="+976">+976</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/me.png" class="me-1"> +382 Montenegro' value="+382">+382</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ms.png" class="me-1"> +1-664 Montserrat' value="+1-664">+1-664</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ma.png" class="me-1"> +212 Morocco' value="+212">+212</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mz.png" class="me-1"> +258 Mozambique' value="+258">+258</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mm.png" class="me-1"> +95 Myanmar' value="+95">+95</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/na.png" class="me-1"> +264 Namibia' value="+264">+264</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/nr.png" class="me-1"> +674 Nauru' value="+674">+674</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/np.png" class="me-1"> +977 Nepal' value="+977">+977</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/nl.png" class="me-1"> +31 Netherlands' value="+31">+31</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/nc.png" class="me-1"> +687 New Caledonia' value="+687">+687</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/nz.png" class="me-1"> +64 New Zealand' value="+64">+64</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ni.png" class="me-1"> +505 Nicaragua' value="+505">+505</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ne.png" class="me-1"> +227 Niger' value="+227">+227</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ng.png" class="me-1"> +234 Nigeria' value="+234">+234</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12.nu.png" class="me-1"> +683 Niue' value="+683">+683</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/nf.png" class="me-1"> +672 Norfolk Island' value="+672">+672</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/kp.png" class="me-1"> +850 North Korea' value="+850">+850</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mp.png" class="me-1"> +1-670 Northern Mariana Islands' value="+1-670">+1-670</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/no.png" class="me-1"> +47 Norway' value="+47">+47</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/om.png" class="me-1"> +968 Oman' value="+968">+968</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/pk.png" class="me-1"> +92 Pakistan' value="+92">+92</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/pw.png" class="me-1"> +680 Palau' value="+680">+680</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ps.png" class="me-1"> +970 Palestine' value="+970">+970</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/pa.png" class="me-1"> +507 Panama' value="+507">+507</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/pg.png" class="me-1"> +675 Papua New Guinea' value="+675">+675</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/py.png" class="me-1"> +595 Paraguay' value="+595">+595</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/pe.png" class="me-1"> +51 Peru' value="+51">+51</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ph.png" class="me-1"> +63 Philippines' value="+63">+63</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/pl.png" class="me-1"> +48 Poland' value="+48">+48</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/pt.png" class="me-1"> +351 Portugal' value="+351">+351</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/pr.png" class="me-1"> +1-787 Puerto Rico' value="+1-787">+1-787</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/qa.png" class="me-1"> +974 Qatar' value="+974">+974</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ro.png" class="me-1"> +40 Romania' value="+40">+40</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ru.png" class="me-1"> +7 Russia' value="+7">+7</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/rw.png" class="me-1"> +250 Rwanda' value="+250">+250</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/bl.png" class="me-1"> +590 Saint Barthélemy' value="+590">+590</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/sh.png" class="me-1"> +290 Saint Helena' value="+290">+290</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/kn.png" class="me-1"> +1-869 Saint Kitts and Nevis' value="+1-869">+1-869</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/lc.png" class="me-1"> +1-758 Saint Lucia' value="+1-758">+1-758</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/mf.png" class="me-1"> +590 Saint Martin' value="+590">+590</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/pn.png" class="me-1"> +508 Pitcairn Islands' value="+508">+508</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/vc.png" class="me-1"> +1-784 Saint Vincent and the Grenadines' value="+1-784">+1-784</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ws.png" class="me-1"> +685 Samoa' value="+685">+685</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/sm.png" class="me-1"> +378 San Marino' value="+378">+378</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/st.png" class="me-1"> +239 São Tomé and Príncipe' value="+239">+239</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/sa.png" class="me-1"> +966 Saudi Arabia' value="+966">+966</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/sn.png" class="me-1"> +221 Senegal' value="+221">+221</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/rs.png" class="me-1"> +381 Serbia' value="+381">+381</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/sc.png" class="me-1"> +248 Seychelles' value="+248">+248</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/sl.png" class="me-1"> +232 Sierra Leone' value="+232">+232</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/sg.png" class="me-1"> +65 Singapore' value="+65">+65</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/sk.png" class="me-1"> +421 Slovakia' value="+421">+421</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/si.png" class="me-1"> +386 Slovenia' value="+386">+386</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/sb.png" class="me-1"> +677 Solomon Islands' value="+677">+677</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/so.png" class="me-1"> +252 Somalia' value="+252">+252</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/za.png" class="me-1"> +27 South Africa' value="+27">+27</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/kr.png" class="me-1"> +82 South Korea' value="+82">+82</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ss.png" class="me-1"> +211 South Sudan' value="+211">+211</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/es.png" class="me-1"> +34 Spain' value="+34">+34</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/lk.png" class="me-1"> +94 Sri Lanka' value="+94">+94</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/sd.png" class="me-1"> +249 Sudan' value="+249">+249</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/sr.png" class="me-1"> +597 Suriname' value="+597">+597</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/sj.png" class="me-1"> +47 Svalbard and Jan Mayen' value="+47">+47</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/sz.png" class="me-1"> +268 Eswatini' value="+268">+268</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/se.png" class="me-1"> +46 Sweden' value="+46">+46</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ch.png" class="me-1"> +41 Switzerland' value="+41">+41</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/sy.png" class="me-1"> +963 Syria' value="+963">+963</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/tw.png" class="me-1"> +886 Taiwan' value="+886">+886</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/tj.png" class="me-1"> +992 Tajikistan' value="+992">+992</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/tz.png" class="me-1"> +255 Tanzania' value="+255">+255</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/th.png" class="me-1"> +66 Thailand' value="+66">+66</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/tg.png" class="me-1"> +228 Togo' value="+228">+228</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/tk.png" class="me-1"> +690 Tokelau' value="+690">+690</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/to.png" class="me-1"> +676 Tonga' value="+676">+676</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/tt.png" class="me-1"> +1-868 Trinidad and Tobago' value="+1-868">+1-868</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/tn.png" class="me-1"> +216 Tunisia' value="+216">+216</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/tr.png" class="me-1"> +90 Turkey' value="+90">+90</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/tm.png" class="me-1"> +993 Turkmenistan' value="+993">+993</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/tc.png" class="me-1"> +1-649 Turks and Caicos Islands' value="+1-649">+1-649</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/tv.png" class="me-1"> +688 Tuvalu' value="+688">+688</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ug.png" class="me-1"> +256 Uganda' value="+256">+256</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ua.png" class="me-1"> +380 Ukraine' value="+380">+380</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ae.png" class="me-1"> +971 United Arab Emirates' value="+971">+971</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/gb.png" class="me-1"> +44 United Kingdom' value="+44">+44</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/uy.png" class="me-1"> +598 Uruguay' value="+598">+598</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/uz.png" class="me-1"> +998 Uzbekistan' value="+998">+998</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/vu.png" class="me-1"> +678 Vanuatu' value="+678">+678</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ve.png" class="me-1"> +58 Venezuela' value="+58">+58</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/vn.png" class="me-1"> +84 Vietnam' value="+84">+84</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/vg.png" class="me-1"> +1-284 British Virgin Islands' value="+1-284">+1-284</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/vi.png" class="me-1"> +1-340 U.S. Virgin Islands' value="+1-340">+1-340</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/wf.png" class="me-1"> +681 Wallis and Futuna' value="+681">+681</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/eh.png" class="me-1"> +212 Western Sahara' value="+212">+212</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/ye.png" class="me-1"> +967 Yemen' value="+967">+967</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/zm.png" class="me-1"> +260 Zambia' value="+260">+260</option>
                                                <option data-content='<img src="https://flagcdn.com/16x12/zw.png" class="me-1"> +263 Zimbabwe' value="+263">+263</option> -->
                                            </select>
                                                   <input type="tel" id="phone" name="phone" placeholder="Mobile Number" class="form-control w-100" inputmode="numeric" maxlength="10" pattern="[0-9]{10}" required oninput="validatePhone(this)"/>
                                                <span id="phone-error" style="color:red; display:none;"></span>
                                                </div>
                                                   
                                                 <span id="phone_number_error" style="color:red; display:none;"></span>
                                            </div>
                                        </div>

                                        
                                        <script>
                                            function validatePhone(el) {
                                                // keep only digits, cap at 10
                                                el.value = el.value.replace(/\D/g, '').slice(0, 10);

                                                const err = document.getElementById('phone-error');

                                                if (el.value.length === 10) {
                                                err.textContent = '';
                                                el.setCustomValidity('');
                                                } else {
                                                // show message for 1–9 digits (and 0 if you want)
                                                err.textContent = 'Please enter a 10 digit number';
                                                el.setCustomValidity('Please enter a 10 digit number');
                                                }
                                            }
                                            </script>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="company">Company Name*</label>
                                                <input type="text" id="company" name="company_name" placeholder="Company Name"
                                                    class="form-control w-100" value="" required />
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="documents">Upload Industry Licenses*</label>
                                                <input type="file" id="documents" name="document" class="upload-btn" required />
                                            </div>
                                        </div>
                                        
                                        <input type="hidden" name="role" value="2">
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-success btn-lg btn-regis">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-md-6 d-flex align-items-center justify-content-center bg-light">
              <div class="text-center" style="margin-top:0px">
                <h4 class="mb-4">Do You Want To Become Buyer ?</h4>
                <h6 class="mb-4">Register as a Buyer</h6>
                <a href="{{ url('buyer_register') }}" class="btn btn-default mr-2 registerBtn ">Register Now</a>
              </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script>
    // JavaScript to handle the click event on the "Register" link
    document.getElementById("two-tab").addEventListener("click", function(event) {
        // Prevent default link behavior
        event.preventDefault();
        // Show the "Register" tab content
        document.getElementById("two").classList.add("show", "active");
        $('#one').removeClass('show active');
    });
    document.getElementById("one-tab").addEventListener("click", function(event) {
        // Prevent default link behavior
        event.preventDefault();
        // Show the "Register" tab content
        document.getElementById("one").classList.add("show", "active");
        $('#two').removeClass('show active');
    });
</script>
<script>
    var otpInputs = document.querySelectorAll('.otp-input');

    otpInputs.forEach(function(input, index) {
        input.addEventListener('input', function() {
            if (this.value.length >= 1) {
                if (index < otpInputs.length - 1) {
                    otpInputs[index + 1].focus();
                }
            }
        });

        input.addEventListener('keydown', function(event) {
            if (event.key === 'Backspace' && this.value.length === 0) {
                if (index > 0) {
                    otpInputs[index - 1].focus();
                }
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.nav-tabs .nav-link').click(function() {
            $('.nav-tabs .nav-link').removeClass('active');
            $(this).addClass('active');

            $('.tab-pane').removeClass('show active');
            $($(this).attr('href')).addClass('show active');
        });
    });
</script>
<script>
    function sendOTP() {
        var phone = $('#phone').val();
        var country_code = $('#login_country_code').val();
        if (!phone) {
            alert('Please enter your phone number.');
            return;
        }
        $.ajax({
            url: 'sellerotp',
            method: 'POST',
            contentType: 'application/json',
            dataType: 'json',
            data: JSON.stringify({
                phone: phone,
                country_code: country_code,
                _token: 'g8sGkOWvTGrIEUAg3MlzZRW0RolOLwQsvdx58HO8'
            }),
            success: function(response) {
                console.log(response);
                alert('OTP has been sent to your mobile.');
            },
            error: function(xhr, status, error) {
                console.error('Error Status:', status);
                console.error('Error Thrown:', error);
                console.error('Response Text:', xhr.responseText);
                alert('Error sending OTP: ' + xhr.responseText);
            }
        });
    }
</script>




<!-- <script>
    function sendOTP() {
        var phone = $('#phone').val();
  var country_code = $('#login_country_code').val();
        if (phone.length !== 10 || isNaN(phone)) {
            $('#phone-error').text("Enter a valid 10-digit mobile number").show();
            return;
        } else {
            $('#phone-error').hide();
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        // $.ajax({
        //     url: "{{ route('seller.otp.send') }}", // Your Laravel route
        //     method: 'POST',
        //     data: {
        //         _token: '{{ csrf_token() }}',
        //         phone: phone,
        //         country_code: country_code
        //     },
        //     success: function(response) {
        //         $('#phone-error').hide();
        //         $('#otp-container').slideDown();
        //     },
        //     error: function(xhr) {
        //         $('#phone-error').text('Failed to send OTP. Please try again.').show();
        //     }
        // });
        $.ajax({
            url: "{{ route('seller.otp.send') }}",
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                phone: phone,
                country_code: country_code
            },
            success: function(response) {
                if (response.status === 'otp_sent') {
                    $('#phone-error').hide();
                    $('#otp-container').slideDown();
                        $('#success-message').text(response.message).show();
                     document.getElementById("resendText").style.display = "block";
                }
            },
            error: function(xhr) {
                if (xhr.status === 404) {
                      document.getElementById("resendText").style.display = "block";
                    // User not found
                    $('#phone-error').text('User not found').show();
                } else {
                    // Some other error (Twilio, server error, etc.)
                      document.getElementById("resendText").style.display = "block";
                    $('#phone-error').text('Failed to send OTP. Please try again.').show();
                }
            }
        });
    }

    // Concatenate OTP values
    $(document).on('keyup', '.otp-input', function() {
        var $inputs = $('.otp-input');
        var index = $inputs.index(this);

        if (this.value.length === this.maxLength && index < $inputs.length - 1) {
            $inputs.eq(index + 1).focus();
        }

        // Join values and put in hidden input
        let otp = '';
        $inputs.each(function() {
            otp += $(this).val();
        });
        $('#otp').val(otp);
    });
</script> -->

<script>
    function sendOTP(isResend = false) {
    var phone = $('#phone').val();
    var country_code = $('#login_country_code').val();

    if (phone.length !== 10 || isNaN(phone)) {
        $('#phone-error').text("Enter a valid 10-digit mobile number").show();
        return;
    } else {
        $('#phone-error').hide();
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "{{ route('seller.otp.send') }}",
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            phone: phone,
            country_code: country_code
        },
        success: function(response) {
            if (response.status === 'otp_sent') {
                $('#phone-error').hide();
                $('#otp-container').slideDown();

                $('#success-message').text('Use development OTP 1234').show();

                document.getElementById("resendText").style.display = "block";
            }
        },
        error: function(xhr) {
            document.getElementById("resendText").style.display = "block";
            if (xhr.status === 404) {
                $('#phone-error').text('User not found').show();
            } else {
                $('#phone-error').text('Failed to send OTP. Please try again.').show();
            }
        }
    });
}

$(document).on('keyup', '.otp-input', function() {
        var $inputs = $('.otp-input');
        var index = $inputs.index(this);

        if (this.value.length === this.maxLength && index < $inputs.length - 1) {
            $inputs.eq(index + 1).focus();
        }

        // Join values and put in hidden input
        let otp = '';
        $inputs.each(function() {
            otp += $(this).val();
        });
        $('#otp').val(otp);
    });
</script>


<script>
$('#sellerRegister').on('submit', function(e) {
    e.preventDefault(); // Stop default form submit

    let formData = new FormData(this); // for file upload support

    $.ajax({
        url: "{{ route('seller.register.store') }}", // <-- adjust route if needed
        method: 'POST',
        data: formData,
        processData: false, // required for FormData
        contentType: false, // required for FormData
        
         beforeSend: function() {
            // Show loading
            Swal.fire({
                title: 'Processing...',
                text: 'Please wait while we register You as a seller.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
        },

        success: function(response) {
            // Clear errors
            Swal.close();

            $('.error-message').remove();

            Swal.fire({
                title: "Success!",
                // text: "Seller Registered successfully.",
                html: "You Have Successfully Registered On ECO Construction. <br><br><br><small style='font-size: 12px;'>You get notified via e-mail when your profile will be approved.</small>",
                // icon: "success",
                confirmButtonText: "OK"
            }).then(() => {
               window.location.href = "{{ route('seller.register') }}";
                // window.location.reload();
            });
        },
        error: function(xhr) {
    Swal.close();
    $('.error-message').remove();
    $('#phone_number_error').hide().text(''); // clear old phone error

    if (xhr.status === 422) {
        let errors = xhr.responseJSON.errors;

        $.each(errors, function(key, value) {
            if (key === 'phone') {
                // special handling for phone
                $('#phone_number_error').text(value[0]).show();
                $('#phone').addClass('is-invalid'); // optional red border
            } else {
                // other fields normal fallback
                let inputField = $('[name="' + key + '"]');
                inputField.after(
                    '<div class="error-message text-danger mb-1">' + value[0] + '</div>'
                );
            }
        });
    }
}
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
<script>
    $(function() {
        $('.selectpicker').selectpicker();
    });
</script>


@endpush