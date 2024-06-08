@php
    $footerInfo = \App\Models\FooterInfo::first();
    $footerSocial = \App\Models\FooterSocialLink::all();
    $footerContact = \App\Models\FooterInfoContact::first();
    $footerUsefuls =  \App\Models\FooterUsefulLinks::all();
    $footerHelps =  \App\Models\FooterHelpLinks::all();

@endphp

<!-- Footer-Area-Start -->
<footer class="footer-area">
    <div class="container">
        <div class="row footer-widgets">
            <div class="col-md-12 col-lg-3 widget">
                <div class="text-box">
                    <figure class="footer-logo">
                        <img src="images/logo.png" alt="">
                    </figure>
                    <p>{{$footerInfo->info}}</p>
                    <ul class="d-flex flex-wrap">
                        @foreach ($footerSocial as $social)
                            <li><a href="{{$social->url}}"><i class="{{$social->icon}}"></i></a></li>
                        @endforeach
                        
                        
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-lg-2 offset-lg-1 widget">
                <h3 class="widget-title">Useful Link</h3>
                <ul class="nav-menu">
                    @foreach ($footerUsefuls as $footerUseful)
                        <li><a href="{{$footerUseful->url}}">{{$footerUseful->name}}</a></li>
                    @endforeach
                    
                    
                </ul>
            </div>
            <div class="col-md-4 col-lg-3 widget">
                <h3 class="widget-title">Contact Info</h3>
                <ul>
                    <li>{{$footerContact->address}}</li>
                    <li><a href="javascript:void(0)">{{$footerContact->phone}}</a></li>
                    <li><a href="javascript:void(0)">{{$footerContact->email}}</a></li>
                </ul>
            </div>
            <div class="col-md-4 col-lg-3 widget">
                <h3 class="widget-title">Help</h3>
                <ul class="nav-menu">
                    @foreach ($footerHelps as $footerHelp)
                        <li><a href="{{$footerHelp->url}}">{{$footerHelp->name}}</a></li>
                    @endforeach
                    
                   
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copyright">
                        <p>Copyright {{date('Y', strtotime($footerInfo->created_at))}} <span>{{$footerInfo->copyright}}</span>. All Rights Reserved.</p>
                        <p>Powered by {{$footerInfo->copyright}} &nbsp; | &nbsp; {{date('d M, Y', strtotime($footerInfo->created_at))}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer-Area-End -->