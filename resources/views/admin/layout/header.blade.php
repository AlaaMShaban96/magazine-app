<section>
    <div class="sidenav">
        <div  class="logo"><i class="fa fa-image"></i> المجلة  </div>
        <div class="subtext">القائمة</div>
        <a href="{{url('/dashboard')}}" class="item {{ (\Request::route()->getName() == 'dashboard') ? 'active' : '' }}"><i class="fa fa-dashboard"></i> الرئيسية </a>
        <a href="{{url('/magazines')}}" class="item {{ (\Request::route()->getName() == 'magazines') ? 'active' : '' }}"><i class="fa fa-map-o"></i> المجلات </a>
        <a href="{{url('/countries')}}" class="item {{ (\Request::route()->getName() == 'countries') ? 'active' : '' }}"><i class="fa fa-flag"></i>الدول </a>
        <a href="{{url('/corporations')}}" class="item {{ (\Request::route()->getName() == 'corporations') ? 'active' : '' }}"><i class="fa fa-briefcase"></i>المؤسسات </a>
        <a href="{{url('/ratings')}}" class="item {{ (\Request::route()->getName() == 'ratings') ? 'active' : '' }}"><i class="fa fa-star"></i>التصنيفات </a>
        <a href="{{url('/notes')}}" class="item {{ (\Request::route()->getName() == 'notes') ? 'active' : '' }}"><i class="fa fa-sticky-note-o"></i>ملاحظات </a>
        <a href="{{url('/magazines/chosen')}}" class="item {{ (\Request::route()->getName() == 'chosen') ? 'active' : '' }}"><i class="fa fa-sticky-note-o"></i>اخترنا لك </a>
    </div>
</section>
