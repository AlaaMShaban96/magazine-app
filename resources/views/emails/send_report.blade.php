<label for="">البريد المرسل   : </label>
<span>{{auth()->user()->email}}</span>
<br>
<label for="">نوع البلاغ  : </label>
@switch($title)
    @case('not_working')
        <span>التطبيق لا يعمل</span>
        @break
    @case('incomspanlete')
        <span>العدد ناقص</span>
        @break
    @case('wrong_info')
        <span>معلومات غير صحيحة</span>
        @break
    @case('other')
        <span>اخراء</span>
        @break
    @case(2)
        
        @break
    @default
        
@endswitch
<br>
<label for="">المجلة  : </label>
<span>{{$magazine}}</span>
<br>
<label for="">المجلد او السنة  : </label>
<span>{{$folder}}</span>
<br>
<label for="">العدد  : </label>
<span>{{$number}}</span>
<br>
<label for="">الرسالة : </label>
<span>{{$body}}</span>